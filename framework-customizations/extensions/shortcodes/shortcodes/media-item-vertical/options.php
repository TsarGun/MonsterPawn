<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
//get social icons to add in item:
$icon = fw_ext( 'shortcodes' )->get_shortcode( 'icon' );
//get social icons to add in item:
$icons_social = fw_ext( 'shortcodes' )->get_shortcode( 'icons_social' );

$options = array(
	'title'      => array(
		'type'  => 'text',
		'label' => esc_html__( 'Title of the Box', 'cashelrie' ),
	),
	'title_tag'  => array(
		'type'    => 'select',
		'value'   => 'h3',
		'label'   => esc_html__( 'Title Tag', 'cashelrie' ),
		'choices' => array(
			'h2' => esc_html__( 'H2', 'cashelrie' ),
			'h3' => esc_html__( 'H3', 'cashelrie' ),
			'h4' => esc_html__( 'H4', 'cashelrie' ),
		)
	),
	'content'    => array(
		'type'          => 'wp-editor',
		'label'         => esc_html__( 'Item text', 'cashelrie' ),
		'desc'          => esc_html__( 'Enter desired item content', 'cashelrie' ),
		'size'          => 'small', // small, large
		'editor_height' => 400,
	),
	'item_style' => array(
		'type'    => 'select',
		'label'   => esc_html__( 'Item Box Style', 'cashelrie' ),
		'choices' => array(
			''                                => esc_html__( 'Default (no border or background)', 'cashelrie' ),
			'content-padding with_border'     => esc_html__( 'Bordered', 'cashelrie' ),
			'content-padding with_background' => esc_html__( 'Muted Background', 'cashelrie' ),
			'content-padding with_border with_background' => esc_html__( 'Bordered Muted Background', 'cashelrie' ),
			'content-padding ls ms'           => esc_html__( 'Grey background', 'cashelrie' ),
			'content-padding ds'              => esc_html__( 'Darkgrey background', 'cashelrie' ),
			'content-padding ds ms'           => esc_html__( 'Dark background', 'cashelrie' ),
			'content-padding cs'              => esc_html__( 'Main color background', 'cashelrie' ),
			'content-padding big-padding with_border'        => esc_html__( 'Bordered with Padding', 'cashelrie' ),
			'content-padding big-padding with_background'    => esc_html__( 'Muted Background with Padding', 'cashelrie' ),
			'content-padding big-padding with_border with_background'    => esc_html__( 'Bordered Muted Background with Padding', 'cashelrie' ),
			'content-padding big-padding ls ms'              => esc_html__( 'Grey background with Padding', 'cashelrie' ),
			'content-padding big-padding ds'                 => esc_html__( 'Darkgrey background with Padding', 'cashelrie' ),
			'content-padding big-padding ds ms'              => esc_html__( 'Dark background with Padding', 'cashelrie' ),
			'content-padding big-padding cs'                 => esc_html__( 'Main color background with Padding', 'cashelrie' ),
		)
	),
	'link'       => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__( 'Item link', 'cashelrie' ),
		'desc'  => esc_html__( 'Link on title and optional button', 'cashelrie' ),
	),
	'item_image' => array(
		'type'        => 'upload',
		'value'       => '',
		'label'       => esc_html__( 'Item Image', 'cashelrie' ),
		'image'       => esc_html__( 'Image for your item. Not all item layouts show image', 'cashelrie' ),
		'help'        => esc_html__( 'Image for your item. Image can appear as an element, or background or even can be hidden depends from chosen item type', 'cashelrie' ),
		'images_only' => true,
	),
	'text_align' => array(
		'type'    => 'select',
		'label'   => esc_html__( 'Text Alignment', 'cashelrie' ),
		'choices' => array(
			'text-left'   => esc_html__( 'Left', 'cashelrie' ),
			'text-center' => esc_html__( 'Center', 'cashelrie' ),
			'text-right'  => esc_html__( 'Right', 'cashelrie' ),
		)
	),
	'icons'      => array(
		'type'            => 'addable-box',
		'value'           => '',
		'label'           => esc_html__( 'Additional info', 'cashelrie' ),
		'desc'            => esc_html__( 'Add icons with title and text', 'cashelrie' ),
		'box-options'     => $icon->get_options(),
		'add-button-text' => esc_html__( 'Add New', 'cashelrie' ),
		'template'        => '{{=title}}',
		'sortable'        => true,
	),
	$icons_social->get_options(),

);