<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

?>
<div class="alert alert-<?php echo esc_attr( $atts['type'] ); ?>">
    <?php if ( $atts['icon'] ) : ?>
        <i class="<?php echo esc_attr( $atts['icon'] ) ?>"></i>
    <?php endif; ?>
	<?php
	echo wp_kses_post( $atts['message'] );
	?>
</div>