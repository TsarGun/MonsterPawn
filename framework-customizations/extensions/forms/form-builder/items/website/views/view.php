<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var array $item
 * @var array $attr
 */

$options = $item['options'];
?>
<div
	class="<?php echo esc_attr( fw_ext_builder_get_item_width( 'form-builder', $item['width'] . '/frontend_class' ) ); ?>">
	<div class="form-group">
		<label
			for="<?php echo esc_attr( $attr['id'] ); ?>"><?php echo fw_htmlspecialchars( $item['options']['label'] ); ?>
			<?php if ( $options['required'] ): ?><sup>*</sup><?php endif; ?>
		</label>
		<input class="form-control" <?php echo fw_attr_to_html( $attr ); ?>>
		<?php if ( $options['info'] ): ?>
			<p><em><?php echo wp_kses_post( $options['info'] ); ?></em></p>
		<?php endif; ?>
	</div>
</div>