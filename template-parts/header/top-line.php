<?php
/**
 * The template part for selected header
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$left_teaser = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'tl_left_teaser' ) : '';

?>

<section class="page_topline cs main_color2 table_section table_section_sm section_padding_top_5 section_padding_bottom_5">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 text-center text-sm-left">
                <?php if ( $left_teaser['text'] ) : ?>
                <div>
                    <i class="<?php echo esc_attr( $left_teaser['icon'] ) ?> rightpadding_5" aria-hidden="true"></i>
                    <?php echo esc_html( $left_teaser['text'] ); ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-sm-4 text-center text-sm-right greylinks">
	            <?php
	            $social_icons = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'social_icons' ) : '';
	            if ( ! empty( $social_icons ) ) : ?>
                    <span class="rightpadding_10"><?php echo esc_html__( 'Follow Us:', 'cashelrie' ); ?></span>
			            <?php
			            //get icons-social shortcode to render icons in team member item
			            $shortcodes_extension = fw()->extensions->get( 'shortcodes' );
			            if ( ! empty( $shortcodes_extension ) ) {
				            echo fw_ext( 'shortcodes' )->get_shortcode( 'icons_social' )->render( array( 'social_icons' => $social_icons ) );
			            } ?>

	            <?php endif; //social icons?>
            </div>
        </div>
    </div>
</section>