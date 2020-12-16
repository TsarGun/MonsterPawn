<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$map_shortcode = fw_ext('shortcodes')->get_shortcode('map');
$options = array(
	'data_provider' => array(
		'type'  => 'multi-picker',
		'label' => false,
		'desc'  => false,
		'picker' => array(
			'population_method' => array(
				'label'   => esc_html__('Population Method', 'cashelrie'),
				'desc'    => esc_html__( 'Select map population method (Ex: events, custom)', 'cashelrie' ),
				'type'    => 'select',
				'choices' => $map_shortcode->_get_picker_dropdown_choices(),
			)
		),
		'choices' => $map_shortcode->_get_picker_choices(),
		'show_borders' => false,
		'hide_picker' => true
	),
	'gmap-key' => array_merge(
		array(
			'label' => esc_html__( 'Google Maps API Key', 'cashelrie' ),
			'desc' => sprintf(
				__( 'Create an application in %sGoogle Console%s and add the Key here.', 'cashelrie' ),
				'<a href="https://console.developers.google.com/flows/enableapi?apiid=places_backend,maps_backend,geocoding_backend,directions_backend,distance_matrix_backend,elevation_backend&keyType=CLIENT_SIDE&reusekey=true">',
				'</a>'
			),
		),
		version_compare(fw()->manifest->get_version(), '2.5.7', '>=')
		? array(
			'type' => 'gmap-key',
		)
		: array(
			'type' => 'text',
			'fw-storage' => array(
				'type'      => 'wp-option',
				'wp_option' => 'fw-option-types:gmap-key',
			),
		)
	),
	'map_type' => array(
		'type'  => 'select',
		'label' => esc_html__('Map Type', 'cashelrie'),
		'desc'  => esc_html__('Select map type', 'cashelrie'),
		'choices' => array(
			'roadmap'   => esc_html__('Roadmap', 'cashelrie'),
			'terrain' => esc_html__('Terrain', 'cashelrie'),
			'satellite' => esc_html__('Satellite', 'cashelrie'),
			'hybrid'    => esc_html__('Hybrid', 'cashelrie')
		)
	),
	'map_height' => array(
		'label' => esc_html__('Map Height', 'cashelrie'),
		'desc'  => esc_html__('Set map height (Ex: 300)', 'cashelrie'),
		'type'  => 'text'
	),
	'disable_scrolling' => array(
		'type'  => 'switch',
		'value' => false,
		'label' => esc_html__('Disable zoom on scroll', 'cashelrie'),
		'desc'  => esc_html__('Prevent the map from zooming when scrolling until clicking on the map', 'cashelrie'),
		'left-choice' => array(
			'value' => false,
			'label' => esc_html__('Yes', 'cashelrie'),
		),
		'right-choice' => array(
			'value' => true,
			'label' => esc_html__('No', 'cashelrie'),
		),
	),
	'map_zoom' => array(
		'type'  => 'slider',
		'value' => 16,
		'properties' => array(
			/*
			'min' => 0,
			'max' => 100,
			'step' => 1, // Set slider step. Always > 0. Could be fractional.
			*/
		),
		'label' => esc_html__('Map zoom', 'cashelrie'),
	),
);