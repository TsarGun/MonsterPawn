<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var string $form_id
 * @var string $form_html
 * @var array $extra_data
 */

global $allowedposttags;
$form_tags = $allowedposttags;
$form_tags['input'] = array(
	'type' => true,
	'id' => true,
	'class' => true,
	'name' => true,
	'value' => true,
	'placeholder' => true,
	'required' => true,
	'data-pick-time' => true,
	'data-pick-date' => true,
	'data-language' => true,
	'data-constraint' => true,
);
$form_tags['form']['data-fw-form-id'] = true;
$form_tags['form']['data-fw-ext-forms-type'] = true;
$form_tags['form']['data-pick-time'] = true;
$form_tags['form']['data-pick-date'] = true;
$form_tags['form']['data-language'] = true;
$form_tags['form']['data-fw-form-id'] = true;
$form_tags['textarea']['placeholder'] = true;
$form_tags['textarea']['required'] = true;
$form_tags['select'] = array(
	'type' => true,
	'id' => true,
	'class' => true,
	'name' => true,
	'value' => true,
	'placeholder' => true,
	'required' => true,
	'data-pick-time' => true,
	'data-pick-date' => true,
	'data-language' => true,
	'data-constraint' => true,
);
$form_tags['option']['value'] = true;

?>
<div class="form-wrapper <?php echo esc_attr( $extra_data['background_color'] . ' ' . $extra_data['columns_padding'] . ' ' . $extra_data['input_text_center'] ); ?>">
	<?php echo wp_kses($form_html, $form_tags); ?>
</div>