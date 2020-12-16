<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
?>
<div class="row <?php echo esc_attr( $atts['teaser_columns_padding'] ); ?>">
	<?php foreach ( $atts['teasers'] as $teaser ): ?>
		<div class="<?php echo esc_attr( $atts['teaser_columns_width'] ); ?>">
			<?php
			//get teaser shortcode to render teasers inside a row
			echo fw_ext( 'shortcodes' )->get_shortcode( 'teaser' )->render( $teaser );
			?>
		</div><!-- eof teaser -->
	<?php endforeach; //progress_teaser ?>
</div> <!-- eof teasers row -->