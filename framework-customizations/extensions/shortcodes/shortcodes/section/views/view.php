<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$bg_image = '';
$section_id = '';
if ( ! empty( $atts['background_image'] ) && ! empty( $atts['background_image']['data']['icon'] ) ) {
	$bg_image = 'background-image:url(' . $atts['background_image']['data']['icon'] . ');';
}
if ( ! empty( $atts['section_id'] ) ) {
	$section_id = $atts['section_id'];
}

$section_extra_classes = '';
$section_extra_classes .= ( isset( $atts['section_class'] ) && $atts['section_class'] ) ? ' ' . $atts['section_class'] : '';
$section_extra_classes .= ( isset( $atts['background_color'] ) && $atts['background_color'] ) ? ' ' . $atts['background_color'] : '';
$section_extra_classes .= ( isset( $atts['top_padding'] ) && $atts['top_padding'] ) ? ' ' . $atts['top_padding'] : '';
$section_extra_classes .= ( isset( $atts['bottom_padding'] ) && $atts['bottom_padding'] ) ? ' ' . $atts['bottom_padding'] : '';
$section_extra_classes .= ( isset( $atts['columns_padding'] ) && $atts['columns_padding'] ) ? ' ' . $atts['columns_padding'] : '';
$section_extra_classes .= ( isset( $atts['columns_top_margin'] ) && $atts['columns_top_margin'] ) ? ' ' . $atts['columns_top_margin'] : '';
$section_extra_classes .= ( isset( $atts['columns_bottom_margin'] ) && $atts['columns_bottom_margin'] ) ? ' ' . $atts['columns_bottom_margin'] : '';
$section_extra_classes .= ( isset( $atts['parallax'] ) && $atts['parallax'] ) ? ' parallax' : '';
$section_extra_classes .= ( isset( $atts['background_cover'] ) && $atts['background_cover'] ) ? ' background_cover' : '';
$section_extra_classes .= ( isset( $atts['overlay_color'] ) && $atts['overlay_color'] ) ? ' overlay_color' : '';
$section_extra_classes .= ( ! empty( $atts['side_media_image'] ) ) ? ' half_section' : '';
$section_extra_classes .= ( ! empty( $atts['side_media_image'] ) ) ? ' overflow_hidden' : '';
$section_extra_classes .= ( ! empty( $atts['section_borders'] ) ) ? ' ' . implode( " ", $atts['section_borders'] ) : '';
$section_extra_classes .= ( $atts['container_type']['fullwidth']['side_paddings'] ) ? '' : ' fluid_padding_0';

$row_extra_classes = '';
$row_extra_classes .= ( $atts['is_flex_wrap'] && !$atts['is_vertical_center'] && !$atts['is_content_vertical_center']  ) ? ' flex-wrap' : '';
$row_extra_classes .= ( $atts['is_vertical_center'] && !$atts['is_content_vertical_center'] ) ? ' flex-wrap v-center' : '';
//$row_extra_classes .= ( $atts['is_vertical_center'] ) && ( $atts['is_content_vertical_center'] ) ? ' flex-wrap' : '';
$row_extra_classes .= ( $atts['is_content_vertical_center'] ) ? ' flex-wrap v-center-content' : '';

$container_class = ( isset( $atts['container_type']['is_fullwidth'] ) && $atts['container_type']['is_fullwidth'] ) ? 'container-fluid' : 'container';


$link = $atts['side_media_link'];
$video = $atts['side_media_video'];
if ( $video ) {
	$link = $video;
}
$unique_id = uniqid();
?>
<section class="fw-main-row <?php echo esc_attr( $section_extra_classes ) ?>" <?php echo ( !empty($bg_image) )? 'style="' .  $bg_image  . '"' : ''; ?><?php echo ( !empty( $section_id )  ) ? ' id="' . esc_attr( $section_id ) . '"' : '' ;?>>

	<?php
		if ( ! empty( $atts['side_media_image'] ) ) :
	?>
		<div class="image_cover <?php echo ( ! empty( $atts['side_media_position'] ) ) ? esc_attr( $atts['side_media_position'] ) : '' ; ?>">
			<?php if ( $link ): ?>
			<a href="<?php echo esc_url( $link ); ?>" <?php echo esc_attr( $video ? ' data-gal="prettyPhoto[gal-video-'. $unique_id .']"' : ''); ?>></a>
			<?php endif; //$link ?>
			<img src="<?php echo esc_attr($atts['side_media_image']['url'] )?>" alt="<?php echo esc_attr__('image','cashelrie') ?>">
		</div>
	<?php
		endif;
	?>
	<div class="<?php echo esc_attr( $container_class ); ?>">
		<div class="row<?php echo esc_attr( $row_extra_classes ); ?>">
			<?php echo do_shortcode( $content ); ?>
		</div>
	</div>
</section>
