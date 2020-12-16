<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}


$events = fw()->extensions->get( 'events' );
if ( empty( $events ) ) {
	return;
}


$cfg = array(
	'page_builder' => array(
		'title'       => esc_html__( 'Events', 'cashelrie' ),
		'description' => esc_html__( 'Events in Tile view', 'cashelrie' ),
		'tab'         => esc_html__( 'Widgets', 'cashelrie' )
	)
);