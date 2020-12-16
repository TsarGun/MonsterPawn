<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till main content section
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; //is_singular && pings_open ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
//page preloader
$preloader_enabled = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'preloader_enabled' ) : true;
$preloader_image   = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'preloader_image' ) : false;
if ( $preloader_enabled ) : ?>
	<!-- page preloader -->
	<div class="preloader">
        <div class="preloader_image pulse"<?php echo ( ! empty( $preloader_image ) ) ? ' style="background-image: url(' . esc_url( $preloader_image['url'] ) . ')"' : '' ?>></div>
	</div>
<?php endif; //preloader_enabled ?>

<!-- search modal -->
<div class="modal" tabindex="-1" role="dialog" aria-labelledby="search_modal" id="search_modal">
	<button type="button" class="close" data-dismiss="modal" aria-label="<?php echo esc_attr__( 'Close', 'cashelrie' ) ?>">
		<span aria-hidden="true">
			<i class="rt-icon2-cross2"></i>
		</span>
	</button>
	<div class="widget widget_search">
		<?php get_search_form(); ?>
	</div>
</div>
<?php if (defined('FW')) : ?>
	<!-- Unyson messages modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="messages_modal">
		<div class="fw-messages-wrap ls with_padding">
			<?php FW_Flash_Messages::_print_frontend(); ?>
		</div>
	</div><!-- eof .modal -->
<?php endif; ?>

<!-- wrappers for visual page editor and boxed version of template -->
<?php
//wide or boxed layout
$layout            = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'layout' ) : array();
$canvas_class      = "";
$box_wrapper_class = "";
if ( ! empty ( $layout['boxed'] ) ) {
	$canvas_class          = 'boxed';
	$box_wrapper_class     = 'container';
	$body_background_image = $layout['boxed_options']['body_background_image'];
	$body_cover            = $layout['boxed_options']['body_cover'];
	if ( $body_cover ) {
		$canvas_class .= ' parallax';
	}
}

//light or dark version
$version            = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'version' ) : 'light';
$main_section_class = 'ls';
?>
<div id="canvas" class="<?php echo esc_attr( $canvas_class ); ?>"<?php echo ( ! empty( $body_background_image ) ) ? ' style="background-image:url(' . esc_url( $body_background_image['url'] ) . ');"' : ''; ?>>
	<div id="box_wrapper" class="<?php echo esc_attr( $box_wrapper_class ); ?>">
		<!-- template sections -->
		<?php

		$header = cashelrie_get_predefined_template_part( 'header' );
		get_template_part( 'template-parts/header/' . esc_attr( $header ) );

		do_action( 'cashelrie_slider' );

		if ( ! is_front_page() && ! is_404()  ) {
			$breadcrumbs = cashelrie_get_predefined_template_part( 'breadcrumbs' );
			get_template_part( 'template-parts/breadcrumbs/' . esc_attr( $breadcrumbs ) );
		}

		if ( ! is_page_template( 'page-templates/full-width.php' ) ) : ?>

		<?php if ( is_404() ) :
		$background_image = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( '404_background_image' ) : '';
        ?>
        <section class="cs main_color2 gradient lighten_gradient page_content section_404 <?php echo !empty( $background_image ) ? 'background_cover' : ''; ?> section_padding_top_135 section_padding_bottom_150" <?php echo !empty( $background_image ) ? 'style="background-image: url(' . esc_url( $background_image['url'] ) . ')"' : ''; ?>>
        <?php else : ?>
        <section class="<?php echo esc_attr( $main_section_class ); ?> page_content section_padding_top_150 section_padding_bottom_150 columns_padding_40">
		<?php endif; ?>
			<div class="container">
				<div class="row">

					<?php if ( is_home() ) {
						$blog_slider_options = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'blog_slider_switch' ) : '';
						$blog_slider_enabled = false;
						if ( ! empty( $blog_slider_options ) ) {
							$blog_slider_enabled = $blog_slider_options['blog_slider_enabled'];
						}
						if ( $blog_slider_enabled ) {
							do_action( 'cashelrie_blog_slider');
						}
					} ?>

                    <?php if ( is_post_type_archive( 'give_forms' ) ) {
	                    $donations_slider_options = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'donations_slider_switch' ) : '';
	                    $donations_slider_enabled = false;
	                    if ( ! empty( $donations_slider_options ) ) {
		                    $donations_slider_enabled = $donations_slider_options['donations_slider_enabled'];
	                    }
	                    if ( $donations_slider_enabled ) {
		                    do_action( 'cashelrie_donations_slider');
	                    }
                    } ?>

<?php endif; //!full-width ?>