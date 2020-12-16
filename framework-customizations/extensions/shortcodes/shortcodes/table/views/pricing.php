<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var array $atts
 */

$class_width = 'col-sm-' . ceil( 12 / count( $atts['table']['cols'] ) );

?>
<div class="row fw-pricing">
	<?php foreach ( $atts['table']['cols'] as $col_key => $col ): ?>
	<div class="fw-package-wrap <?php echo esc_attr( $class_width . ' ' . $col['name'] ); ?> ">
		<?php if ( $col['name'] == 'desc-col' ) : //description column main div ?>
		<div class="fw-package text-right">
			<?php else: //price table col div ?>
			<div
				class="fw-package price-table after_cover bg_teaser <?php echo esc_attr( $col['name'] == 'highlight-col' ?  'color_bg_2'  :  'color_bg_1'  ); ?>">
				<?php endif; ?>
				<?php foreach ( $atts['table']['rows'] as $row_key => $row ): ?>
					<?php if ( $row['name'] === 'heading-row' ): ?>
						<div class="fw-heading-row plan-name">
							<?php $value = $atts['table']['content'][ $row_key ][ $col_key ]['textarea']; ?>
							<h3>
								<?php echo ( empty( $value ) && $col['name'] === 'desc-col' ) ? '&nbps;' : $value; ?>
							</h3>
						</div>
					<?php elseif ( $row['name'] === 'pricing-row' ): ?>
						<div class="fw-pricing-row plan-price">
							<?php
							if ( $col['name'] == 'desc-col' ) : ?>
								<?php $value = $atts['table']['content'][ $row_key ][ $col_key ]['textarea']; ?>
								<?php echo wp_kses_post( $value ); ?>

							<?php else: ?>
								<?php $amount = $atts['table']['content'][ $row_key ][ $col_key ]['amount'] ?>
								<?php $desc = $atts['table']['content'][ $row_key ][ $col_key ]['description']; ?>
								<span>&nbsp;</span>
								<span><?php echo ( empty( $value ) && $col['name'] === 'desc-col' ) ? '&nbps;' : $amount; ?></span>
								<p><?php echo ( empty( $value ) && $col['name'] === 'desc-col' ) ? '&nbps;' : $desc; ?></p>
							<?php endif; ?>
						</div>
					<?php elseif ( $row['name'] == 'button-row' ) : ?>
						<div class="fw-button-row call-to-action">
							<?php if ( $col['name'] == 'desc-col' ) : ?>
								<?php continue; ?>
							<?php else: ?>
								<?php $button = fw_ext( 'shortcodes' )->get_shortcode( 'button' ); ?>

								<?php if ( false === empty( $atts['table']['content'][ $row_key ][ $col_key ]['button'] ) and false === empty( $button ) ) : ?>
									<?php echo wp_kses_post( $button->render( $atts['table']['content'][ $row_key ][ $col_key ]['button'] ) ); ?>
								<?php else : ?>
									<span>&nbsp;</span>
								<?php endif; ?>

							<?php endif; ?>
						</div>
					<?php elseif ( $row['name'] === 'switch-row' ) : ?>
						<div class="fw-switch-row">
							<?php if ( $col['name'] == 'desc-col' ) : ?>
								<?php $value = $atts['table']['content'][ $row_key ][ $col_key ]['textarea']; ?>
								<?php echo wp_kses_post( $value ); ?>
							<?php else: ?>

								<?php $value = ( $atts['table']['content'][ $row_key ][ $col_key ]['switch'] == 'yes' ) ? 'rt-icon2-check2' : 'rt-icon2-cross2'; ?>
								<span>
								<i class="grey <?php echo esc_attr( $value ) ?>"></i>
							</span>
							<?php endif; ?>
						</div>
					<?php elseif ( $row['name'] === 'default-row' ) : ?>
						<div class="fw-default-row">
							<?php if ( $col['name'] == 'desc-col' ) : ?>
								<?php $value = $atts['table']['content'][ $row_key ][ $col_key ]['textarea']; ?>
								<?php echo wp_kses_post( $value ); ?>
							<?php else: ?>

								<?php $value = $atts['table']['content'][ $row_key ][ $col_key ]['textarea']; ?>
								<?php echo wp_kses_post( $value ); ?>

							<?php endif; ?>
						</div>
						<hr>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		</div>
		<?php endforeach; ?>
	</div>