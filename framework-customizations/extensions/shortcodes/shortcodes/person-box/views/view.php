<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

if ( empty( $atts['image'] ) ) {
	$image = fw_get_framework_directory_uri( '/static/img/no-image.png' );
} else {
	$image = $atts['image']['url'];
}
?>

<div class="person_bio">
    <div class="avatar <?php echo esc_attr( $atts['accent_color'] ); ?>">
        <img src="<?php echo esc_attr( $image ); ?>" alt="<?php echo esc_attr( $atts['name'] ); ?>"/>
    </div>
    <h4 class="person_name">
	    <?php echo wp_kses_post( $atts['name'] ); ?>
    </h4>
    <span class="small-text <?php echo esc_attr( $atts['accent_color'] ); ?>">
        <?php echo wp_kses_post( $atts['job'] ); ?>
    </span>
</div>