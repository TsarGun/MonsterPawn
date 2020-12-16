<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
//get social icons to add in member item:
$icons_social = fw_ext( 'shortcodes' )->get_shortcode( 'icons_social' );

$options = array(
	'image' => array(
		'label' => esc_html__( 'Person Image', 'cashelrie' ),
		'desc'  => esc_html__( 'Either upload a new, or choose an existing image from your media library', 'cashelrie' ),
		'type'  => 'upload'
	),
	'name'  => array(
		'label' => esc_html__( 'Person Name', 'cashelrie' ),
		'desc'  => esc_html__( 'Name of the person', 'cashelrie' ),
		'type'  => 'text',
		'value' => ''
	),
	'job'   => array(
		'label' => esc_html__( 'Person Position Title', 'cashelrie' ),
		'type'  => 'text',
		'value' => ''
	),
	'accent_color'  => array(
		'type'    => 'select',
		'value'   => 'highlight',
		'label'   => esc_html__( 'Accent Color', 'cashelrie' ),
		'choices' => array(
			'highlight'  => esc_html__( 'Accent Color 1', 'cashelrie' ),
			'highlight2'  => esc_html__( 'Accent Color 2', 'cashelrie' ),
			'highlight3'  => esc_html__( 'Accent Color 3', 'cashelrie' ),
			'highlight4'  => esc_html__( 'Accent Color 4', 'cashelrie' ),
		)
	),
);