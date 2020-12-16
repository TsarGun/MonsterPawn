<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
?>
<div class="bootstrap-accordion">
	<div class="panel-group <?php echo esc_attr( $atts['accordion_color'] ); ?>" id="accordion-<?php echo esc_attr( $atts['id'] ); ?>">
		<?php foreach ( $atts['tabs'] as $index => $tab ) : ?>
            <?php if ( $atts['accordion_color'] === 'collapse-unstyled' ) : ?>
			<div class="panel">
                <h4>
            <?php else : ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
            <?php endif; ?>
                        <a class="<?php echo esc_attr( $index !== 0 ? 'collapsed' : '') ?>"
						   href="#collapse-<?php echo esc_attr( $atts['id'] ) . '-' . $index ?>" data-toggle="collapse"
						   data-parent="#accordion-<?php echo esc_attr( $atts['id'] ); ?>">
							<?php if ( $tab['tab_icon'] ) : ?>
								<i class="<?php echo esc_attr( $tab['tab_icon'] ); ?>"></i>
							<?php endif; //tab icon ?>
							<?php echo esc_html( $tab['tab_title'] ); ?>
						</a>
					</h4>
                <?php if ( $atts['accordion_color'] !== 'collapse-unstyled' ) : ?>
                </div>
                <?php endif; ?>
				<div id="collapse-<?php echo esc_attr( $atts['id'] ) . '-' . $index ?>"
                     class="panel-collapse collapse <?php echo esc_attr( $index === 0  ? 'in' : '' )?>">
                    <div class="<?php echo esc_attr( $atts['accordion_color'] === 'collapse-unstyled' ? 'panel-content' : 'panel-body'); ?>">
						<?php if ( $tab['tab_featured_image'] ): ?>
							<div class="media">
								<div class="media-left">
									<a href="#">
										<img src="<?php echo esc_url( $tab['tab_featured_image']['url'] ); ?>"
										     alt="<?php echo esc_attr( $tab['tab_title'] ); ?>">
									</a>
								</div>
								<div class="media-body">
									<?php echo wp_kses_post( $tab['tab_content'] ); ?>
								</div>
							</div>
						<?php else : //no featured image ?>
							<?php echo wp_kses_post( $tab['tab_content'] ); ?>
						<?php endif; //featured image ?>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>