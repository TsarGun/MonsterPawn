<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'container_type' => array(
		'type'         => 'multi-picker',
		'label'        => false,
		'desc'         => false,
		'picker'       => array(
			'container' => array(
				'type'      => 'select',
				'value'     => '',
				'choices'   => array(
					''   => esc_html__('Unstyled container', 'cashelrie'),
					'inline-content'   => esc_html__('Inline content', 'cashelrie'),
					'content-justify'   => esc_html__('Space between elements', 'cashelrie'),
					'flex-wrap'   => esc_html__('Flex container', 'cashelrie'),
				),
			),

		),
		'choices'      => array(
			''                  => array(),
			'inline-content'    => array(
				'big_spacing'  => array(
					'type'  => 'switch',
					'value' => '',
					'label' => esc_html__('Big spacing', 'cashelrie'),
					'desc'  => esc_html__('Increase horizontal spacing between elements on wide screens', 'cashelrie'),
					'left-choice' => array(
						'value' => '',
						'label' => esc_html__('No', 'cashelrie'),
					),
					'right-choice' => array(
						'value' => 'big-spacing',
						'label' => esc_html__('Yes', 'cashelrie'),
					),
				),
				'vertical_spacing'  => array(
					'type'  => 'switch',
					'value' => 'v-spacing',
					'label' => esc_html__('Vertical spacing between elements', 'cashelrie'),
					'desc'  => esc_html__('Adds bottom margin for elements, useful when elements breaks to a new line', 'cashelrie'),
					'left-choice' => array(
						'value' => '',
						'label' => esc_html__('No', 'cashelrie'),
					),
					'right-choice' => array(
						'value' => 'v-spacing',
						'label' => esc_html__('Yes', 'cashelrie'),
					),
				)
			),
			'content-justify'   => array(
				'vertical_align' => array(
					'type'  => 'switch',
					'value' => '',
					'label' => esc_html__('Align elements vertically', 'cashelrie'),
					'left-choice' => array(
						'value' => '',
						'label' => esc_html__('No', 'cashelrie'),
					),
					'right-choice' => array(
						'value' => 'v-center',
						'label' => esc_html__('Yes', 'cashelrie'),
					),
				),
				'vertical_spacing' => array(
					'type'  => 'switch',
					'value' => '',
					'label' => esc_html__('Vertical spacing between elements', 'cashelrie'),
					'desc'  => esc_html__('Adds 10px top and bottom margin for elements, useful when elements breaks to a new line', 'cashelrie'),
					'left-choice' => array(
						'value' => '',
						'label' => esc_html__('No', 'cashelrie'),
					),
					'right-choice' => array(
						'value' => 'v-spacing',
						'label' => esc_html__('Yes', 'cashelrie'),
					),
				),
			),
			'flex-wrap'  => array(
				'vertical_align' => array(
					'type'  => 'switch',
					'value' => '',
					'label' => esc_html__('Align elements vertically', 'cashelrie'),
					'left-choice' => array(
						'value' => '',
						'label' => esc_html__('No', 'cashelrie'),
					),
					'right-choice' => array(
						'value' => 'v-center',
						'label' => esc_html__('Yes', 'cashelrie'),
					),
				),
			)
		),
	),
	'custom_class' => array(
		'type'         => 'multi-picker',
		'label'        => false,
		'desc'         => false,
		'picker'       => array(
			'add_custom_class' => array(
				'type'  => 'switch',
				'value' => '',
				'label' => esc_html__('Custom class', 'cashelrie'),
				'desc'  => esc_html__('Add custom class to container', 'cashelrie'),
				'left-choice' => array(
					'value' => '',
					'label' => esc_html__('No', 'cashelrie'),
				),
				'right-choice' => array(
					'value' => 'custom',
					'label' => esc_html__('Yes', 'cashelrie'),
				),
			),

		),
		'choices'      => array(
			''         => array(),
			'custom'   => array(
				'class' => array(
					'type'  => 'text',
					'value' => '',
					'label' => esc_html__('Enter your custom classes', 'cashelrie'),
				),
			)
		),
	),
);