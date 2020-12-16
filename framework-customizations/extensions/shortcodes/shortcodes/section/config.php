<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array(
	'page_builder' => array(
		'tab'         => esc_html__( 'Layout Elements', 'cashelrie' ),
		'title'       => esc_html__( 'Section', 'cashelrie' ),
		'description' => esc_html__( 'Add a Section', 'cashelrie' ),
		'type'        => 'section', // WARNING: Do not edit this
	)
);