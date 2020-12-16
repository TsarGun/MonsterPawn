<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var array $atts
 */


?>
<div class="vertical-item <?php echo esc_attr( $atts['item_style'] . ' ' . $atts['text_align'] ); ?>">

	<?php if ( $atts['item_image'] ) : ?>

		<div class="item-media entry-thumbnail">
			<img src="<?php echo esc_url( $atts['item_image']['url'] ); ?>"
			     alt="<?php echo esc_attr( $atts['title'] ); ?>">
			<?php if ( $atts['link'] ) : ?>
				<div class="media-links">
					<a class="abs-link" href="<?php echo esc_url( $atts['link'] ); ?>"></a>
				</div>
			<?php endif; //link ?>
		</div>

	<?php endif; //item image check ?>

	<div class="item-content">
		<?php if ( $atts['title'] ) : ?>
		<<?php echo esc_html( $atts['title_tag'] ) ?> class="entry-title">
		<?php if ( $atts['link'] ) : ?>
		<a href="<?php echo esc_url( $atts['link'] ); ?>">
			<?php endif; //link ?>
			<?php echo esc_html( $atts['title'] ); ?>
			<?php if ( $atts['link'] ) : ?>
		</a>
	<?php endif; //link ?>
	</<?php echo esc_html( $atts['title_tag'] ) ?>>
<?php endif; //title ?>
	<?php echo wp_kses_post( $atts['content'] ); ?>
	<?php
	//additional info
	if ( $atts['icons'] ):
		?>
		<ul class="list1 no-bullets">
			<?php foreach ( $atts['icons'] as $icon ) : ?>
				<li>
					<?php
					echo fw_ext( 'shortcodes' )->get_shortcode( 'icon' )->render( $icon );
					?>
				</li>
			<?php endforeach; //icon 
			?>
		</ul>
	<?php endif; //icons; ?>
	<?php if ( $atts['social_icons'] ):
		//get icons-social shortcode to render icons in item
		echo fw_ext( 'shortcodes' )->get_shortcode( 'icons_social' )->render( array( 'social_icons' => $atts['social_icons'] ) );
	endif; //social_icons ?>
</div>

</div><!-- eof .vertical-item -->
