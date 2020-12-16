<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
//get social icons to add in member item:
$icons_social = fw_ext( 'shortcodes' )->get_shortcode( 'icons_social' );

$options = array(
	'image' => array(
		'label' => esc_html__( 'Team Member Image', 'cashelrie' ),
		'desc'  => esc_html__( 'Either upload a new, or choose an existing image from your media library', 'cashelrie' ),
		'type'  => 'upload'
	),
	'name'  => array(
		'label' => esc_html__( 'Team Member Name', 'cashelrie' ),
		'desc'  => esc_html__( 'Name of the person', 'cashelrie' ),
		'type'  => 'text',
		'value' => ''
	),
	'job'   => array(
		'label' => esc_html__( 'Team Member Job Title', 'cashelrie' ),
		'desc'  => esc_html__( 'Job title of the person.', 'cashelrie' ),
		'type'  => 'text',
		'value' => ''
	),
	'desc'  => array(
		'label' => esc_html__( 'Team Member Description', 'cashelrie' ),
		'desc'  => esc_html__( 'Enter a few words that describe the person', 'cashelrie' ),
		'type'  => 'textarea',
		'value' => ''
	),
	$icons_social->get_options(),
);