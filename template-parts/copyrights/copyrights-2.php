<?php
/**
 * The template part for selected copyrights section
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$social_icons = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'copyright_social' ) : '';

$copyright_top_padding = ( ! empty( $social_icons ) ) ? 'section_padding_top_90' : 'section_padding_top_40';

?>

<section class="page_copyright ls <?php echo esc_attr( $copyright_top_padding ); ?> section_padding_bottom_40">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">

				<?php get_template_part( 'template-parts/footer/footer-logo' ); ?>

                <p class="small-text big-spacing"><?php echo wp_kses_post( function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'copyrights_text' ) : esc_html__( 'Powered by WordPress', 'cashelrie' ) ); ?></p>
            </div>
        </div>
    </div>

	<?php if ( ! empty( $social_icons ) ) : ?>
        <div class="page_social_icons big_icons slide_icons text-center">
			<?php
			//get icons-social shortcode to render icons in team member item
			$shortcodes_extension = fw()->extensions->get( 'shortcodes' );
			if ( ! empty( $shortcodes_extension ) ) {
				echo fw_ext( 'shortcodes' )->get_shortcode( 'icons_social' )->render( array( 'social_icons' => $social_icons ) );
			}
			?>
        </div><!-- eof social icons -->
	<?php endif; //social icons ?>
</section>

