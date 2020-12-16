<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var array $item
 * @var array $choices
 * @var array $value
 */

$options = $item['options'];

switch ( $options['layout'] ) {
	case 'one-column':
		$columns = 1;
		break;
	case 'two-columns':
		$columns = 2;
		break;
	case 'three-columns':
		$columns = 3;
		break;
	default:
		$columns = 0;
}
?>
<?php if ( empty( $choices ) ): ?>
	<!-- radio not displayed: no choices -->
<?php else: ?>
	<div class="<?php echo esc_attr( fw_ext_builder_get_item_width( 'form-builder', $item['width'] . '/frontend_class' ) ); ?>">
		<div class="field-radio input-styled">
			<label><?php echo fw_htmlspecialchars( $options['label'] ); ?>
				<?php if ( $options['required'] ): ?><sup>*</sup><?php endif; ?>
			</label>
			<div class="custom-radio field-columns-<?php echo esc_attr( $columns ); ?>">
				<?php if ( $columns === 0 ): //side by side ?>
					<?php while ( $choice = array_shift( $choices ) ): ?>
						<label class="radio-inline">
							<input <?php echo fw_attr_to_html( $choice ); ?> />
							<?php echo wp_kses_post( $choice['value'] ); ?>
						</label>
					<?php endwhile; ?>
				<?php elseif ( $columns > 1 ): //multi columns?>
					<div class="row">
						<?php while ( $choice = array_shift( $choices ) ): ?>
							<div class="col-sm-<?php echo esc_attr( 12 / $columns ); ?>">
								<div class="options radio">
									<label>
										<input <?php echo fw_attr_to_html( $choice ); ?> />
										<?php echo wp_kses_post( $choice['value'] ); ?>
									</label>
								</div>
							</div><!-- eof .col-sm-* -->
						<?php endwhile; ?>
					</div><!-- eof .row -->
				<?php else: //single column ?>
					<?php foreach ( $choices as $choice ): ?>
						<div class="options radio">
							<label>
								<input <?php echo fw_attr_to_html( $choice ); ?> />
								<?php echo wp_kses_post( $choice['value'] ); ?>
							</label>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
			<?php if ( $options['info'] ): ?>
				<p><em><?php echo wp_kses_post( $options['info'] ); ?></em></p>
			<?php endif; ?>
		</div>
	</div>
<?php endif; ?>