<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
//get teaser to add in teasers row:
$icon = fw_ext( 'shortcodes' )->get_shortcode( 'icon' );

$options = array(
	'icons' => array(
		'type'          => 'addable-popup',
		'label'         => esc_html__( 'Icons in list', 'cashelrie' ),
		'popup-title'   => esc_html__( 'Add/Edit Icons in list', 'cashelrie' ),
		'desc'          => esc_html__( 'Add your icons with descriptions', 'cashelrie' ),
		'template'      => '{{=content}}',
		'popup-options' => $icon->get_options(),
	),
);