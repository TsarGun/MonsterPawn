<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
?>
<div class="bootstrap-tabs">
	<ul class="nav nav-tabs" role="tablist">
		<?php foreach ( $atts['tabs'] as $index => $tab ) : ?>
            <li class="<?php echo esc_attr( $index === 0  ? 'active' : '' )?>">
				<a href="#tab-<?php echo esc_attr( $atts['id'] ) . '-' . $index ?>" role="tab" data-toggle="tab">
					<?php echo esc_html( $tab['tab_title'] ); ?>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
	<div class="tab-content no-border <?php echo esc_attr( $atts['top_border'] ); ?>">
		<?php foreach ( $atts['tabs'] as $index => $tab ) : ?>
            <div class="tab-pane fade <?php echo esc_attr( $index === 0  ? 'in active' : '') ?>"
			     id="tab-<?php echo esc_attr( $atts['id'] ) . '-' . $index ?>">
				<div class="row <?php echo esc_attr( $tab['tab_columns_padding'] ); ?>">
					<?php foreach ( $tab['tab_teasers'] as $teaser ): ?>

						<div class="<?php echo esc_attr( $tab['tab_columns_width'] ); ?>">
							<?php
							//get teaser extension to render teasers inside a tabs
							echo fw_ext( 'shortcodes' )->get_shortcode( 'teaser' )->render( $teaser );
							?>
						</div>
					<?php endforeach; //tab_teaser ?>
				</div>
			</div> <!-- .eof tab-pane -->
		<?php endforeach; //tab ?>
	</div><!-- eof .tab-content -->
</div><!-- eof .bootstrap-tabs -->