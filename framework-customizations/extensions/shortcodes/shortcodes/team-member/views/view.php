<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

if ( empty( $atts['image'] ) ) {
	$image = fw_get_framework_directory_uri( '/static/img/no-image.png' );
} else {
	$image = $atts['image']['url'];
}
?>
<div class="thumbnail">
	<img src="<?php echo esc_attr( $image ); ?>" alt="<?php echo esc_attr( $atts['name'] ); ?>"/>
	<div class="caption">
		<h3><?php echo wp_kses_post( $atts['name'] ); ?></h3>
		<p><?php echo wp_kses_post( $atts['job'] ); ?></p>
		<div class="member-description">
			<p><?php echo wp_kses_post( $atts['desc'] ); ?></p>
		</div>
		<?php if ( ! empty( $atts['social_icons'] ) ) : ?>
			<?php
			//get icons-social shortcode to render icons in team member item
			echo fw_ext( 'shortcodes' )->get_shortcode( 'icons_social' )->render( array( 'social_icons' => $atts['social_icons'] ) );
			?>
		<?php endif; //social icons ?>
	</div>
</div>