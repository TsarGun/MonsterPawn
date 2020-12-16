<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'Contact form', 'cashelrie' ),
	'description' => esc_html__( 'Build contact forms', 'cashelrie' ),
	'tab'         => esc_html__( 'Content Elements', 'cashelrie' ),
	'popup_size'  => 'large',
	'type'        => 'special'
);