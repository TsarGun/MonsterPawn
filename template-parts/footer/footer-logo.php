<?php
/**
 *    The Footer Logo for our theme
 *
 *    Displays logo in footer section
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$logo_image = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_customizer_option( 'logo_image' ) : '';
$footer_logo_image = ( function_exists( 'fw_get_db_settings_option' ) && !empty( fw_get_db_customizer_option( 'footer_logo_image' ) ) ) ? fw_get_db_customizer_option( 'footer_logo_image' ) : '';
if ( $footer_logo_image ) {
	$logo_image = $footer_logo_image;
}

$logo_text  = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_customizer_option( 'logo_text' ) : get_option( 'blogname' );
$logo_class = 'logo';
if ( ! $logo_text ) {
	$logo_class .= ' logo_image_only';
}
if ( ! $logo_image ) {
	$logo_class .= ' logo_text_only';
}
if ( $logo_image && $logo_text ) {
	$logo_class .= ' logo_with_text';
}
?>
<div class="<?php echo esc_attr( $logo_class ); ?>">
	<?php if ( $logo_image ) : ?>
		<img src="<?php echo esc_attr( $logo_image['url'] ); ?>" alt="<?php echo esc_attr( $logo_text ); ?>">
	<?php endif; //logo_image	?>
	<?php if ( $logo_text ) : ?>
		<span class="logo_text">
			<?php echo wp_kses_post( $logo_text ); ?>
		</span>
	<?php endif; //logo_text	?>
</div>