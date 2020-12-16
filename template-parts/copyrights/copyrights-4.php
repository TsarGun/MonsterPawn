<?php
/**
 * The template part for selected copyrights section
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$social_icons = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'copyright_social' ) : '';

?>

<section class="ds ms page_copyright section_padding_top_15 section_padding_bottom_15">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-center">
				<p class="small-text big-spacing"><?php echo wp_kses_post( function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'copyrights_text' ) : esc_html__( 'Powered by WordPress', 'cashelrie' ) ); ?>
				</p>
			</div>
		</div>
	</div>
</section><!-- .copyrights -->

