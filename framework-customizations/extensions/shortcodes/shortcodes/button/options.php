<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$regular_button_options = array(
	'button_icon' => array(
		'type'         => 'multi-picker',
		'label'        => false,
		'desc'         => false,
		'picker'       => array(
			'use_icon' => array(
				'type'  => 'switch',
				'value' => '',
				'label' => esc_html__('Add icon to button', 'cashelrie'),
				'left-choice' => array(
					'value' => '',
					'label' => esc_html__('No', 'cashelrie'),
				),
				'right-choice' => array(
					'value' => 'icon',
					'label' => esc_html__('Yes', 'cashelrie'),
				),
			),

		),
		'choices'      => array(
			''                  => array(),
			'icon'   => array(
				'icon_source'       => array(
					'type'  => 'icon-v2',
					'label' => esc_html__( 'Choose Icon', 'cashelrie' ),
				),
				'icon_side' => array(
					'type'  => 'switch',
					'value' => '',
					'label' => esc_html__('Icon Side.', 'cashelrie'),
					'desc' => esc_html__('Add icon before or after button Label', 'cashelrie'),
					'left-choice' => array(
						'value' => 'left',
						'label' => esc_html__('Left', 'cashelrie'),
					),
					'right-choice' => array(
						'value' => 'right',
						'label' => esc_html__('Right', 'cashelrie'),
					),
				),
			),
		),
	),
	'min_width' => array(
		'type'  => 'switch',
		'label' => esc_html__( 'Min width button', 'cashelrie' ),
		'desc'  => esc_html__( 'Switch to set min width for button. (170px for regular button and 230px for big button)', 'cashelrie' ),
	),
	'small_button' => array(
		'type'  => 'switch',
		'label' => esc_html__( 'Small button', 'cashelrie' )
	)
);

$complex_button_options = array(
	'icon_left'       => array(
		'type'  => 'icon-v2',
		'label' => esc_html__( 'Left Icon', 'cashelrie' ),
	),
	'icon_right'       => array(
		'type'  => 'icon-v2',
		'label' => esc_html__( 'Right Icon', 'cashelrie' ),
	),
);

$options = array(
	'label'       => array(
		'label' => esc_html__( 'Button Label', 'cashelrie' ),
		'desc'  => esc_html__( 'This is the text that appears on your button', 'cashelrie' ),
		'type'  => 'text',
		'value' => esc_html__( 'Submit', 'cashelrie' ),
	),
	'link'        => array(
		'label' => esc_html__( 'Button Link', 'cashelrie' ),
		'desc'  => esc_html__( 'Where should your button link to', 'cashelrie' ),
		'type'  => 'text',
		'value' => '#'
	),
	'target'      => array(
		'type'         => 'switch',
		'label'        => esc_html__( 'Open Link in New Window', 'cashelrie' ),
		'desc'         => esc_html__( 'Select here if you want to open the linked page in a new window', 'cashelrie' ),
		'right-choice' => array(
			'value' => '_blank',
			'label' => esc_html__( 'Yes', 'cashelrie' ),
		),
		'left-choice'  => array(
			'value' => '_self',
			'label' => esc_html__( 'No', 'cashelrie' ),
		),
	),

	'button_types' => array(
		'type'         => 'multi-picker',
		'label'        => false,
		'desc'         => false,
		'picker'       => array(
			'button_type' => array(
				'type'    => 'select',
				'value'   => 'theme_button color1',
				'label'   => esc_html__( 'Button Type', 'cashelrie' ),
				'desc'    => esc_html__( 'Choose a type for your button', 'cashelrie' ),
				'choices' => array(
					'simple_link'          => esc_html__( 'Just link', 'cashelrie' ),
					'more-link'          => esc_html__( 'Read More link', 'cashelrie' ),
					'theme_button'         => esc_html__( 'Default', 'cashelrie' ),
					'theme_button inverse' => esc_html__( 'Inverse', 'cashelrie' ),
					'theme_button color1'  => esc_html__( 'Accent Color 1', 'cashelrie' ),
					'theme_button color2'  => esc_html__( 'Accent Color 2', 'cashelrie' ),
					'theme_button color1 inverse'  => esc_html__( 'Accent Color 1 inverse', 'cashelrie' ),
					'theme_button color2 inverse'  => esc_html__( 'Accent Color 2 inverse', 'cashelrie' ),
				),
			),
		),
		'choices'      => array(
			'more-link'                             => array(),
			'simple_link'                           => $regular_button_options,
			'theme_button'                          => $regular_button_options,
			'theme_button inverse'                  => $regular_button_options,
			'theme_button color1'                   => $regular_button_options,
			'theme_button color1 inverse'           => $regular_button_options,
			'theme_button color2'                   => $regular_button_options,
			'theme_button color2 inverse'           => $regular_button_options,
		),
		'show_borders' => true,
	),
);