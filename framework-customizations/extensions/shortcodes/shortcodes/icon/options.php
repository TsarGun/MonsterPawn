<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'icon'       => array(
		'type'  => 'icon-v2',
		'label' => esc_html__( 'Icon', 'cashelrie' ),
	),
	'icon_style' => array(
		'type'    => 'select',
		'value'   => 'default_icon',
		'label'   => esc_html__( 'Icon Color', 'cashelrie' ),
		'desc'    => esc_html__( 'Select one of predefined colors.', 'cashelrie' ),
		'choices' => array(
			'default_icon' => esc_html__( 'Default Font Color', 'cashelrie' ),
			'black'        => esc_html__( 'Dark Color', 'cashelrie' ),
			'highlight'    => esc_html__( 'Accent Color 1', 'cashelrie' ),
			'highlight2'   => esc_html__( 'Accent Color 2', 'cashelrie' ),
		),
	),
	'icon_size'       => array(
		'label'   => esc_html__( 'Icon Size', 'cashelrie' ),
		'desc'    => esc_html__( 'Choose icon size', 'cashelrie' ),
		'type'    => 'select',
		'choices' => array(
			''         => esc_html__( 'Regular font size', 'cashelrie' ),
			'size_small' => esc_html__( 'Small Icon Size (28px)', 'cashelrie' ),
			'size_normal'  => esc_html__( 'Normal Icon Size (42px)', 'cashelrie' ),
			'size_big'  => esc_html__( 'Big Icon Size (64px)', 'cashelrie' ),
		)
	),
	'content'       => array(
		'type'  => 'text',
		'label' => esc_html__('Icon text', 'cashelrie'),
	),
	'link'       => array(
		'type'  => 'text',
		'label' => esc_html__('Icon text link', 'cashelrie'),
	)
);