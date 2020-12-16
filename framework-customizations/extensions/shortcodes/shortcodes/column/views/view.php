<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

//$class = fw_ext_builder_get_item_width( 'page-builder', $atts['width'] . '/frontend_class' );

$custom_frontend_class = ( fw_akg('custom_column/custom', $atts) === 'custom_cl' ) ? fw_akg('custom_column/custom_cl', $atts) : '';

$class = (fw_akg('custom_column/custom', $atts) === 'custom_cl' && ! empty( $custom_frontend_class['custom_classes'] ) ) ? $custom_frontend_class['custom_classes'] : fw_ext_builder_get_item_width( 'page-builder', $atts['width'] . '/frontend_class' );

$class .= ( ! empty( $atts['column_animation'] ) && $atts['column_animation'] ) ? ' to_animate' : '';
$class .= ( ! empty( $atts['column_align'] ) ) ? ' ' . $atts['column_align'] : '';
$data_animation = ( ! empty( $atts['column_animation'] ) && $atts['column_animation'] ) ? 'data-animation="' . esc_attr( $atts['column_animation'] ) . '"' : '';
$data_animation_delay = ( ! empty( $atts['animation_delay'] ) && $atts['animation_delay'] ) ? ' data-delay="' . esc_attr( $atts['animation_delay'] ) . '"' : '';

$bg_image = '';
if ( ! empty( $atts['background_image'] ) && ! empty( $atts['background_image']['data']['icon'] ) ) {
	$bg_image = $atts['background_image']['custom'];
}

?>

    <div class="<?php echo esc_attr( $class ); ?>" <?php echo wp_kses_post( $data_animation . $data_animation_delay ); ?>>
        <?php
        if ( ! empty( $atts['column_padding'] ) || ! empty( $atts['background_color'] ) || !empty( $bg_image ) || !empty( $atts['column_inner_box_custom_class'] ) ) :
        ?>
        <div class="<?php echo esc_attr( $atts['column_padding'] . ' ' . $atts['column_border'] . ' ' . $atts['background_color'] ); echo !empty( $bg_image ) ? 'ds bg_teaser' : ''; ?> <?php echo esc_attr( $atts['column_inner_box_custom_class'] ); ?>">
            <?php endif; //column_padding
            if ( !empty( $bg_image ) ) :
	            echo wp_get_attachment_image( $bg_image, 'full' );
            endif;
            //shoing column content
            echo do_shortcode( $content );
            if ( ! empty( $atts['column_padding'] ) || ! empty( $atts['background_color'] ) || !empty( $bg_image ) ) : //closing optional column_padding div
            ?>
        </div>
    <?php endif; ?>
    </div>


