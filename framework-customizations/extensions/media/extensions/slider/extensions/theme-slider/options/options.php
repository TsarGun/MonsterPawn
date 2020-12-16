<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'slider_background' => array(
		'type'        => 'select',
		'value'       => 'ls',
		'label'       => esc_html__( 'Slider background', 'cashelrie' ),
		'desc'        => esc_html__( 'Select slider background color', 'cashelrie' ),
		'choices'     => array(
			'ls'    => esc_html__( 'Light', 'cashelrie' ),
			'ls ms' => esc_html__( 'Light Muted', 'cashelrie' ),
			'ds'    => esc_html__( 'Dark', 'cashelrie' ),
			'ds ms' => esc_html__( 'Dark Muted', 'cashelrie' ),
			'cs'    => esc_html__( 'Accent Color 1', 'cashelrie' ),
			'cs gradient lighten_gradient'    => esc_html__( 'Accent Color 1 With White Lightening', 'cashelrie' ),
			'cs main_color2'    => esc_html__( 'Accent Color 2', 'cashelrie' ),
			'cs main_color2 gradient lighten_gradient'    => esc_html__( 'Accent Color 2 With White Lightening', 'cashelrie' ),
			'cs gradient'    => esc_html__( 'Accent Colors Gradient', 'cashelrie' ),
		),
		/**
		 * Allow save not existing choices
		 * Useful when you use the select to populate it dynamically from js
		 */
		'no-validate' => false,
	),
	'all_scr_cover' => array(
		'label'     => esc_html__( 'Image overlay on small screens', 'cashelrie' ),
		'desc'      => esc_html__( 'Leave image overlay on small screens same as it is on large resolution', 'cashelrie' ),
		'value'     => true,
		'type'      => 'switch',
	)
);
