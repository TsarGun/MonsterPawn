<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

?>
<div class="bootstrap-tabs <?php echo esc_attr( $atts['small_tabs'] ); ?>">
	<ul class="nav nav-tabs <?php echo esc_attr( $atts['half_width'] . ' ' . $atts['tab_color'] ); ?>" role="tablist">
		<?php foreach ( $atts['tabs'] as $index => $tab ) : ?>
            <li class="<?php echo esc_attr( $index === 0  ? 'active' : '' )?>">
				<a href="#tab-<?php echo esc_attr( $atts['id'] ) . '-' . $index ?>" role="tab" data-toggle="tab">
					<?php if ( $tab['tab_icon'] ) : ?>
						<i class="<?php echo esc_attr( $tab['tab_icon'] ); ?>"></i>
					<?php endif; //tab icon ?>
					<?php echo esc_html( $tab['tab_title'] ); ?>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
	<div class="tab-content <?php echo esc_attr( $atts['top_border'] . ' ' . $atts['tab_color'] ); ?>">
		<?php foreach ( $atts['tabs'] as $index => $tab ) : ?>
            <div class="tab-pane fade <?php echo esc_attr( $index === 0  ? 'in active' : '') ?>"
			     id="tab-<?php echo esc_attr( $atts['id'] ) . '-' . $index ?>">
				<?php
				if ( $tab['tab_featured_image'] ) :
					?>
					<p class="featured-tab-image">
						<img src="<?php echo esc_url( $tab['tab_featured_image']['url'] ); ?>"
						     alt="<?php echo esc_attr( $tab['tab_title'] ); ?>">
					</p>
					<?php
				endif; //tab featured image
				?>
				<?php
                echo wp_kses_post( $tab['tab_content'] );

                if ( $tab['tab_form']['add_form'] ) {
	                $form_options = $tab['tab_form']['form']['form_options'];
	                echo fw()->extensions->get('shortcodes')->get_shortcode('contact_form')->render($form_options);
                }
                ?>

			</div><!-- .eof tab-pane -->
		<?php endforeach; ?>
	</div>
</div>