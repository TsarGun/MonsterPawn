<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

//find fw_ext
$shortcodes_extension = fw()->extensions->get( 'shortcodes' );
$button_options = array();
if ( ! empty( $shortcodes_extension ) ) {
	$button_options = $shortcodes_extension->get_shortcode( 'button' )->get_options();
}

$options = array(
	'tab_main' => array(
		'type' => 'tab',
		'options' => array(
			'title'   => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Pricing plan title', 'cashelrie' ),
			),
			'currency'   => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Currency Sign', 'cashelrie' ),
			),
			'price'   => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Integer Price', 'cashelrie' ),
			),
			'price_decimal'   => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Decimal Price', 'cashelrie' ),
			),
			'accent_color' => array(
				'type'        => 'select',
				'value'       => '',
				'label'       => esc_html__( 'Accent Color', 'cashelrie' ),
				'choices'     => array(
					'' => esc_html__( 'Accent Color 1', 'cashelrie' ),
					'2' => esc_html__( 'Accent Color 2', 'cashelrie' ),
				),
				'no-validate' => false,
			),
			'description'   => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Pricing description', 'cashelrie' ),
			),
			'features'         => array(
				'type'            => 'addable-box',
				'value'           => '',
				'label'           => esc_html__( 'Pricing plan features', 'cashelrie' ),
				'box-options'     => array(
					'feature_name'   => array(
						'type'  => 'text',
						'value' => '',
						'label' => esc_html__( 'Feature name', 'cashelrie' ),
					),
					'feature_checked' => array(
						'type'        => 'select',
						'value'       => '',
						'label'       => esc_html__( 'Default, checked or unchecked', 'cashelrie' ),
						'choices'     => array(
							'default' => esc_html__( 'Default', 'cashelrie' ),
							'enabled' => esc_html__( 'Enabled', 'cashelrie' ),
							'disabled' => esc_html__( 'Disabled', 'cashelrie' ),
						),
						'no-validate' => false,
					),
				),
				'template'        => '{{=feature_name}}',
				'limit'           => 0, // limit the number of boxes that can be added
				'add-button-text' => esc_html__( 'Add', 'cashelrie' ),
				'sortable'        => true,
			),
		),
		'title' => esc_html__('Info', 'cashelrie'),
	),

	'tab_button' => array(
		'type' => 'tab',
		'options' => array(
			'price_buttons'     => array(
				'type'        => 'addable-box',
				'value'       => '',
				'label'       => esc_html__( 'Price Buttons', 'cashelrie' ),
				'desc'        => esc_html__( 'Choose a button, link for it and text inside it', 'cashelrie' ),
				'template'    => 'Button',
				'box-options' => array(
					$button_options
				),
				'limit'           => 5, // limit the number of boxes that can be added
				'add-button-text' => esc_html__( 'Add', 'cashelrie' ),
			),
		),
		'title' => esc_html__('Button', 'cashelrie'),
	),



);