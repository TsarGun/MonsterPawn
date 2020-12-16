<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var array $atts
 */

$container_type = $atts['container_type']['container'];

$class = '';
$class .= $container_type;

if ( $container_type === 'inline-content' ) {
	$class .= ' ' . $atts['container_type']['inline-content']['big_spacing'];
	$class .= ' ' . $atts['container_type']['inline-content']['vertical_spacing'];
}

if ( $container_type === 'content-justify' ) {
	$class .= ' ' . $atts['container_type']['inline-content']['vertical_align'];
	$class .= ' ' . $atts['container_type']['inline-content']['vertical_spacing'];
}

if ( $container_type === 'flex-wrap' ) {
	$class .= ' ' . $atts['container_type']['inline-content']['vertical_align'];
}

$class .= ( $atts['custom_class']['add_custom_class'] && isset( $atts['custom_class']['custom']['class'] ) ) ? ' ' .  $atts['custom_class']['custom']['class'] : '';
?>

<div class="<?php echo esc_attr( $class ); ?>">
