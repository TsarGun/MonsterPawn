<?php
/**
 * The template part for selected header
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$header_variant = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'header' )['header_var'] : '';
$social_icons = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'social_icons' ) : '';
$topline_teasers = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'header' )[$header_variant]['topline_combined_teasers'] : '';

if ( ( ! empty( $social_icons ) ) || ( ! empty( $topline_teasers ) ) ) : ?>
<section class="page_topline ls section_padding_top_5 section_padding_bottom_5 table_section table_section_md">
	<div class="container">
		<div class="row">
			<div class="col-md-3 text-center text-md-left">
			<?php if ( ! empty( $social_icons ) ) : ?>
				<div class="page_social_icons darklinks">
					<?php
					//get icons-social shortcode to render icons in team member item
					$shortcodes_extension = fw()->extensions->get( 'shortcodes' );
					if ( ! empty( $shortcodes_extension ) ) {
						echo fw_ext( 'shortcodes' )->get_shortcode( 'icons_social' )->render( array( 'social_icons' => $social_icons ) );
					}
					?>
				</div><!-- eof social icons -->
			<?php endif; //social icons ?>
			</div><!-- eof .col- -->
			<div class="col-md-9 text-center text-md-right">
				<?php
				if ( ! empty( $topline_teasers ) ) : ?>
                    <div class="inline-content big-spacing greylinks">
						<?php foreach ( $topline_teasers as $teaser ) : ?>
                            <span>
	                            <?php if ( $teaser['teaser_icon']['type'] !== 'none' ) :
		                            if ( $teaser['teaser_icon']['type'] === 'icon-font') : ?>
                                        <i class="<?php echo esc_attr( $teaser['teaser_icon']['icon-class'] ); ?> highlight rightpadding_5"></i>
		                            <?php else:
			                            echo wp_get_attachment_image( $teaser['teaser_icon']['attachment-id'] );
		                            endif;
	                            endif;
	                            ?>
								<?php if ( $teaser['teaser_text_link'] ) : ?>
                                <a href="<?php echo esc_url( $teaser['teaser_text_link'] ) ?>">
                                <?php endif;
                                echo wp_kses_post( $teaser['teaser_text'] );
                                if ( $teaser['teaser_text_link'] ) : ?>
                                    </a>
							<?php endif; ?>
                            </span>
						<?php endforeach; ?>
                    </div>
				<?php endif; //topline teasers?>
			</div><!-- eof .col- -->
		</div>
	</div>
</section><!-- .page_topline -->
<?php endif; ?>
<header class="page_header header_white toggler_right">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="display_table_md">
                    <div class="display_table_cell_md">
                        <div class="header_left_logo">
							<?php
							get_template_part( 'template-parts/header/header-logo' );
							?>
                        </div><!-- eof .header_left_logo -->
                    </div>
                    <div class="display_table_cell_md">
                        <nav class="mainmenu_wrapper primary-navigation text-md-right">
							<?php wp_nav_menu( array (
								'theme_location' => 'primary',
								'menu_class'     => 'sf-menu nav-menu nav',
								'container'      => 'ul'
							) ); ?>
                        </nav>
                        <span class="toggle_menu"><span></span></span>
                    </div>
                </div>
            </div><!--	eof .col-sm-* -->
        </div><!--	eof .row-->
    </div> <!--	eof .container-->
</header><!-- eof .page_header -->