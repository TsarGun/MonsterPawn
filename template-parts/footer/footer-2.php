<?php
/**
 * The template part for selected footer
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$background_image = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'footer_background_image' ) : '';
$background_image_url = isset( $background_image['url'] ) ? 'url(' . esc_url( $background_image['url'] ) . ')' : '';
?>

<?php if ( function_exists( 'fw_get_db_customizer_option') ) : ?>
	<style>
		.page_copyright.background_cover,
		.page_footer.background_cover {
			background-image: <?php echo !empty( $background_image_url ) ? esc_html( $background_image_url ) : 'none'; ?>;
		}
	</style>
<?php endif; ?>

<footer class="page_footer ls <?php echo !empty( $background_image ) ? 'background_cover overlay_color' : ''; ?> section_padding_top_150 section_padding_bottom_130 columns_padding_25">
	<div class="container">

		<div class="row">
			<?php dynamic_sidebar( 'sidebar-footer' ); ?>
		</div>

	</div>
</footer><!-- .page_footer -->