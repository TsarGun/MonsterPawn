<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$shortcodes_extension = fw_ext( 'shortcodes' );

{
	$query_params = array(
		'v'         => '3.25',
		'language'  => substr( get_locale(), 0, 2 ),
		'libraries' => 'places',
	);

	if ( method_exists( 'FW_Option_Type_Map', 'api_key' ) ) {
		$query_params['key'] = FW_Option_Type_Map::api_key();
	}

	wp_enqueue_script(
		'google-maps-api-v3',
		'https://maps.googleapis.com/maps/api/js?' . http_build_query( $query_params ),
		array(),
		$query_params['v'],
		true
	);
}

$uri = fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/map');

wp_enqueue_style(
	'fw-shortcode-map',
	$uri . '/static/css/styles.css'
);

wp_enqueue_script(
	'fw-shortcode-map-script',
	fw_get_template_customizations_directory_uri( '/extensions/shortcodes/shortcodes//map/static/js/scripts.js' ),
	array( 'jquery', 'underscore', 'google-maps-api-v3' ),
	fw()->manifest->get_version(),
	true
);