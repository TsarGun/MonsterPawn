<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(

	'title' => array(
		'type'       => 'text',
		'value'      => '',
		'label'      => esc_html__( 'Progress Bar title', 'cashelrie' ),
	),
	'percent' => array(
		'type'       => 'slider',
		'value'      => 80,
		'properties' => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		),
		'label'      => esc_html__( 'Count To', 'cashelrie' ),
		'desc'       => esc_html__( 'Choose percent to count to', 'cashelrie' ),
	),
	'background_class' => array(
		'type'    => 'select',
		'value'   => '',
		'label'   => esc_html__( 'Context background color', 'cashelrie' ),
		'desc'    => esc_html__( 'Select one of predefined background colors', 'cashelrie' ),
		'choices' => array(
			'' => esc_html__( 'Accent Color', 'cashelrie' ),
			'progress-bar-color2' => esc_html__( 'Accent Color 2', 'cashelrie' ),
			'progress-bar-success' => esc_html__( 'Success', 'cashelrie' ),
			'progress-bar-info'    => esc_html__( 'Info', 'cashelrie' ),
			'progress-bar-warning' => esc_html__( 'Warning', 'cashelrie' ),
			'progress-bar-danger'  => esc_html__( 'Danger', 'cashelrie' ),

		),
	),
);