<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'style' => array(
		'type'     => 'multi-picker',
		'label'    => false,
		'desc'     => false,
		'picker' => array(
			'ruler_type' => array(
				'type'    => 'select',
				'label'   => esc_html__( 'Ruler Type', 'cashelrie' ),
				'desc'    => esc_html__( 'Here you can set the styling and size of the HR element', 'cashelrie' ),
				'choices' => array(
					'line'  => esc_html__( 'Line', 'cashelrie' ),
					'space' => esc_html__( 'Whitespace', 'cashelrie' ),
				)
			)
		),
		'choices'     => array(
			'space' => array(
				'height' => array(
					'label' => esc_html__( 'Height', 'cashelrie' ),
					'desc'  => esc_html__( 'How much whitespace do you need? Enter a pixel value. Positive value will increase the whitespace, negative value will reduce it. eg: \'50\', \'-25\', \'200\'', 'cashelrie' ),
					'type'  => 'text',
					'value' => '50'
				)
			)
		)
	),
	'responsive'         => array(
		'attr'          => array( 'class' => 'fw-advanced-button' ),
		'type'          => 'popup',
		'label'         => esc_html__( 'Responsive visibility', 'cashelrie' ),
		'button'        => esc_html__( 'Settings', 'cashelrie' ),
		'size'          => 'medium',
		'popup-options' => array(
			'hidden_lg'     => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
					'selected' => array(
						'type'         => 'switch',
						'value'        => 'yes',
						'label'        => __( 'Large ( > 1199px)', 'cashelrie' ),
						'desc'         => esc_html__( 'Display on large screen?', 'cashelrie' ),
						'left-choice'  => array(
							'value' => 'no',
							'label' => esc_html__( 'No', 'cashelrie' ),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__( 'Yes', 'cashelrie' ),
						)
					),
				),
			),
			'hidden_md'     => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
					'selected' => array(
						'type'         => 'switch',
						'value'        => 'yes',
						'label'        => __( 'Medium ( > 991px )', 'cashelrie' ),
						'desc'         => esc_html__( 'Display on medium screen?', 'cashelrie' ),
						'left-choice'  => array(
							'value' => 'no',
							'label' => esc_html__( 'No', 'cashelrie' ),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__( 'Yes', 'cashelrie' ),
						)
					),
				),
			),
			'hidden_sm'     => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
					'selected' => array(
						'type'         => 'switch',
						'value'        => 'yes',
						'label'        => __( 'Small ( > 767px )', 'cashelrie' ),
						'desc'         => esc_html__( 'Display on small screen?', 'cashelrie' ),
						'left-choice'  => array(
							'value' => 'no',
							'label' => esc_html__( 'No', 'cashelrie' ),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__( 'Yes', 'cashelrie' ),
						)
					),
				),
			),
			'hidden_xs' => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
					'selected' => array(
						'type'         => 'switch',
						'value'        => 'yes',
						'label'        => __( 'Extra small ( < 768px )', 'cashelrie' ),
						'desc'         => esc_html__( 'Display on extra small screen?', 'cashelrie' ),
						'left-choice'  => array(
							'value' => 'no',
							'label' => esc_html__( 'No', 'cashelrie' ),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__( 'Yes', 'cashelrie' ),
						)
					),
				),
				'choices' => array(),
			),
		),
	),
);
