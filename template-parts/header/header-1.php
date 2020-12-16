<?php
/**
 * The template part for selected header
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$header_variant = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'header' )['header_var'] : '';
$toplogo_left_teaser = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'header' )[$header_variant]['toplogo_left_teaser'] : false;
$toplogo_right_teaser = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'header' )[$header_variant]['toplogo_right_teaser'] : false;
$header_right_teaser = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'header' )[$header_variant]['header_right_teaser'] : false;
$social_icons = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'social_icons' ) : '';
?>

<section class="page_toplogo ls ms section_padding_md">
    <div class="container-fluid">
        <div class="row">

            <div class="col-xs-12 col-md-4 col-md-push-4 text-center">
	            <?php get_template_part( 'template-parts/header/header-logo' ); ?>
            </div>

            <div class="col-xxs-12 col-xs-6 col-md-4 col-md-pull-4 text-center text-md-left topmargin_0">

	            <?php if ( $toplogo_left_teaser['teaser_top_text'] || $toplogo_left_teaser['teaser_bottom_text'] ) : ?>
                <div class="teaser icon-bg-teaser darklinks color2 grey text-center">

                    <?php cashelrie_get_icon_v2( $toplogo_left_teaser['teaser_icon'], 'icon-background' ); ?>

                    <?php if ( $toplogo_left_teaser['teaser_top_text'] ) : ?>

                        <?php if ( $toplogo_left_teaser['teaser_top_text_link'] ) : ?>
                            <a href="<?php echo esc_url( $toplogo_left_teaser['teaser_top_text_link'] ); ?>" class="small-text">
                        <?php else: ?>
                            <span class="small-text">
                        <?php endif; ?>

                        <?php echo wp_kses_post( $toplogo_left_teaser['teaser_top_text'] ); ?>

                        <?php if ( $toplogo_left_teaser['teaser_top_text_link'] ) : ?>
                            </a>
                        <?php else: ?>
                            </span>
                        <?php endif; ?>

                    <?php endif; ?>

	                <?php if ( $toplogo_left_teaser['teaser_bottom_text'] ) : ?>
                        <div class="big vidaloka">
                            <?php if ( $toplogo_left_teaser['teaser_bottom_text_link'] ) : ?>
                                <a href="<?php echo esc_url( $toplogo_left_teaser['teaser_bottom_text_link'] ); ?>" class="small-text">
                            <?php endif; ?>

                            <?php echo wp_kses_post( $toplogo_left_teaser['teaser_bottom_text'] ); ?>

                            <?php if ( $toplogo_left_teaser['teaser_bottom_text_link'] ) : ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                </div>
                <?php endif; ?>
            </div>

            <div class="col-xxs-12 col-xs-6 col-md-4 text-center text-md-right topmargin_0">

                <?php if ( $toplogo_right_teaser['teaser_top_text'] || $toplogo_right_teaser['teaser_bottom_text'] ) : ?>
                <div class="teaser icon-bg-teaser darklinks grey text-center">

		            <?php cashelrie_get_icon_v2( $toplogo_right_teaser['teaser_icon'], 'icon-background' ); ?>

		            <?php if ( $toplogo_right_teaser['teaser_top_text'] ) : ?>

			            <?php if ( $toplogo_right_teaser['teaser_top_text_link'] ) : ?>
                            <a href="<?php echo esc_url( $toplogo_right_teaser['teaser_top_text_link'] ); ?>" class="small-text">
			            <?php else: ?>
                            <span class="small-text">
			            <?php endif; ?>

			            <?php echo wp_kses_post( $toplogo_right_teaser['teaser_top_text'] ); ?>

			            <?php if ( $toplogo_right_teaser['teaser_top_text_link'] ) : ?>
                            </a>
			            <?php else: ?>
                            </span>
			            <?php endif; ?>

		            <?php endif; ?>

		            <?php if ( $toplogo_right_teaser['teaser_bottom_text'] ) : ?>
                        <div class="big vidaloka">
				            <?php if ( $toplogo_right_teaser['teaser_bottom_text_link'] ) : ?>
                            <a href="<?php echo esc_url( $toplogo_right_teaser['teaser_bottom_text_link'] ); ?>" class="small-text">
					            <?php endif; ?>

					            <?php echo wp_kses_post( $toplogo_right_teaser['teaser_bottom_text'] ); ?>

					            <?php if ( $toplogo_right_teaser['teaser_bottom_text_link'] ) : ?>
                            </a>
			            <?php endif; ?>
                        </div>
		            <?php endif; ?>

                </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</section>

<header class="page_header header_white intro_overlap dotted_items toggler_xs_right">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 display_table">
                <?php
                $has_social_icons = '';
                if ( empty( $social_icons ) ) {
	                $has_social_icons = 'no-social-icons';
                }
                ?>
                <div class="header_left_logo display_table_cell <?php echo esc_attr( $has_social_icons ); ?>">
                    <div class="affix-visible">
                        <?php get_template_part( 'template-parts/header/header-logo' ); ?>
                    </div>

	                <?php if ( ! empty( $social_icons ) ) : ?>
                        <div class="page_social_icons darklinks affix-hidden">
			                <?php
			                //get icons-social shortcode to render icons in team member item
			                $shortcodes_extension = fw()->extensions->get( 'shortcodes' );
			                if ( ! empty( $shortcodes_extension ) ) {
				                echo fw_ext( 'shortcodes' )->get_shortcode( 'icons_social' )->render( array( 'social_icons' => $social_icons ) );
			                }
			                ?>
                        </div><!-- eof social icons -->
	                <?php endif; //social icons ?>
                </div>

                <div class="header_mainmenu display_table_cell text-center <?php echo esc_attr( $has_social_icons ); ?>">
                    <div class="mainmenu_wrapper primary-navigation">
		                <?php wp_nav_menu( array(
			                'theme_location' => 'primary',
			                'menu_class'     => 'sf-menu nav-menu nav',
			                'container'      => 'ul'
		                ) ); ?>
                    </div>
                    <!-- header toggler -->
                    <span class="toggle_menu"><span></span></span>
                </div>

                <div class="header_right_buttons display_table_cell text-right hidden-xs">
	                <?php
	                $affix_hidden = '';
                    if ( $header_right_teaser['teaser_text'] ) : ?>
                        <div class="affix-visible big vidaloka grey">

                        <?php if ( $header_right_teaser['teaser_text_link'] ) : ?>
                            <a href="<?php echo esc_url( $toplogo_left_teaser['teaser_text_link'] ); ?>">
                        <?php endif; ?>

                            <?php echo wp_kses_post( $header_right_teaser['teaser_text'] ); ?>

                        <?php if ( $header_right_teaser['teaser_text_link'] ) : ?>
                            </a>
                        <?php endif; ?>

                        </div>
	                <?php
                    $affix_hidden = 'affix-hidden';
                    endif; ?>
                    <div class="widget widget_search <?php echo esc_attr( $affix_hidden ); ?>">
                        <?php get_search_form(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>