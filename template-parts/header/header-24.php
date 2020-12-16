<?php
/**
 * The template part for selected header
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<header class="page_header_side header_side_right ls">
	<span class="toggle_menu_side"><span></span></span>
	<div class="scrollbar-macosx">
		<div class="side_header_inner">
			<div class="text-center">
				<?php get_template_part( 'template-parts/header/header-logo' ); ?>
			</div>
			<div class="widget widget_nav_menu greylinks color2">
				<nav class="mainmenu_side_wrapper">
					<?php wp_nav_menu( array(
						'theme_location' => 'primary',
						'menu_class'     => 'nav sf-menu-side',
						'container'      => 'ul'
					) ); ?>
				</nav>
			</div>
			<?php
			$header_variant = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'header' )['header_var'] : '';
			$topline_teasers = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'header' )[$header_variant]['topline_combined_teasers'] : '';
			if ( ! empty( $topline_teasers ) ) : ?>
                <div class="logo-meta greylinks">
					<?php foreach ( $topline_teasers as $teaser ) : ?>
                        <p>
							<?php if ( $teaser['teaser_icon']['type'] !== 'none' ) :
								if ( $teaser['teaser_icon']['type'] === 'icon-font') : ?>
                                    <i class="<?php echo esc_attr( $teaser['teaser_icon']['icon-class'] ); ?> cons-width highlight rightpadding_5"></i>
								<?php else:
									echo wp_get_attachment_image( $teaser['teaser_icon']['attachment-id'] );
								endif;
							endif; ?>
							<?php if ( $teaser['teaser_text_link'] ) : ?>
                            <a href="<?php echo esc_url( $teaser['teaser_text_link'] ) ?>">
								<?php endif;
								echo wp_kses_post( $teaser['teaser_text'] );
								if ( $teaser['teaser_text_link'] ) : ?>
                            </a>
						<?php endif; ?>
                        </p>
					<?php endforeach; ?>
                </div>
			<?php endif; //topline teasers?>

			<?php
			$social_icons = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'social_icons' ) : '';
			if ( ! empty( $social_icons ) ) : ?>
                <div>
					<?php
					//get icons-social shortcode to render icons in team member item
					$shortcodes_extension = fw()->extensions->get( 'shortcodes' );
					if ( ! empty( $shortcodes_extension ) ) {
						echo fw_ext( 'shortcodes' )->get_shortcode( 'icons_social' )->render( array( 'social_icons' => $social_icons ) );
					}
					?>
                </div>
			<?php endif; //social icons ?>

		</div><!-- eof .side_header_inner -->
	</div><!-- eof .scrollbar-macosx-->
</header><!-- eof .page_header_side-->