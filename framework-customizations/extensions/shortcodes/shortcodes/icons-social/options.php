<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'social_icons' => array(
		'type'            => 'addable-box',
		'value'           => '',
		'label'           => esc_html__( 'Social Buttons', 'cashelrie' ),
		'desc'            => esc_html__( 'Optional social buttons', 'cashelrie' ),
		'template'        => '{{=icon}}',
		'box-options'     => array(
			'icon'       => array(
				'type'  => 'icon',
				'label' => esc_html__( 'Social Icon', 'cashelrie' ),
				'set'   => 'social-icons',
			),
			'icon_class' => array(
				'type'        => 'select',
				'value'       => '',
				'label'       => esc_html__( 'Icon type', 'cashelrie' ),
				'desc'        => esc_html__( 'Select one of predefined social button types', 'cashelrie' ),
				'choices'     => array(
					''                                    => esc_html__( 'Default', 'cashelrie' ),
					'border-icon'                         => esc_html__( 'Simple Bordered Icon', 'cashelrie' ),
					'border-icon rounded-icon'            => esc_html__( 'Rounded Bordered Icon', 'cashelrie' ),
					'bg-icon'                             => esc_html__( 'Simple Background Icon', 'cashelrie' ),
					'bg-icon rounded-icon'                => esc_html__( 'Rounded Background Icon', 'cashelrie' ),
					'color-icon bg-icon'                  => esc_html__( 'Color Light Background Icon', 'cashelrie' ),
					'color-icon bg-icon rounded-icon'     => esc_html__( 'Color Light Background Rounded Icon', 'cashelrie' ),
					'color-icon'                          => esc_html__( 'Color Icon', 'cashelrie' ),
					'color-icon border-icon'              => esc_html__( 'Color Bordered Icon', 'cashelrie' ),
					'color-icon border-icon rounded-icon' => esc_html__( 'Rounded Color Bordered Icon', 'cashelrie' ),
					'color-bg-icon'                       => esc_html__( 'Color Background Icon', 'cashelrie' ),
					'color-bg-icon rounded-icon'          => esc_html__( 'Rounded Color Background Icon', 'cashelrie' ),

				),
				/**
				 * Allow save not existing choices
				 * Useful when you use the select to populate it dynamically from js
				 */
				'no-validate' => false,
			),
			'icon_url'   => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Icon Link', 'cashelrie' ),
				'desc'  => esc_html__( 'Provide a URL to your icon', 'cashelrie' ),
			)
		),
		'limit'           => 0, // limit the number of boxes that can be added
		'add-button-text' => esc_html__( 'Add', 'cashelrie' ),
		'sortable'        => true,
	)
);