<?php
/**
 * The template part for selected header
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<section class="page_toplogo table_section table_section_md ls section_padding_top_5 section_padding_bottom_5">
	<div class="container">
		<div class="row">
			<div class="col-md-3 text-center text-md-left header_left_logo">
				<?php get_template_part( 'template-parts/header/header-logo' ); ?>

                <!-- header toggler -->
                <span class="toggle_menu"><span></span></span>
			</div>
			<div class="col-md-9 text-center text-md-right">
				<?php
				$header_variant = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'header' )['header_var'] : '';
				$toplogo_teasers = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'header' )[$header_variant]['topline_combined_teasers'] : '';
				if ( ! empty( $toplogo_teasers ) ) : ?>
                    <div class="inline-teasers-wrap">
						<?php foreach ( $toplogo_teasers as $teaser ) : ?>
                            <div class="media teaser inline-block text-left">
                                <div class="media-left media-middle">
                                    <div class="teaser_icon size_small with_background highlight round">
										<?php if ( $teaser['teaser_icon']['type'] === 'icon-font') : ?>
                                            <i class="<?php echo esc_attr( $teaser['teaser_icon']['icon-class'] ); ?>"></i>
										<?php else:
											echo wp_get_attachment_image( $teaser['teaser_icon']['attachment-id'] );
										endif; ?>
                                    </div>
                                </div>
                                <div class="media-body media-middle grey darklinks">
									<?php if ( $teaser['teaser_text_link'] ) : ?>
                                    <a href="<?php echo esc_url( $teaser['teaser_text_link'] ) ?>">
										<?php endif;
										echo wp_kses_post( $teaser['teaser_text'] );
										if ( $teaser['teaser_text_link'] ) : ?>
                                    </a>
								<?php endif; ?>
                                </div>
                            </div>
						<?php endforeach; ?>
                    </div>
				<?php endif; //toplogo teasers?>
			</div>
		</div>
	</div>
</section>