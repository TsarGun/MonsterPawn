<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'tabs' => array(
		'type'          => 'addable-popup',
		'label'         => esc_html__( 'Panels', 'cashelrie' ),
		'popup-title'   => esc_html__( 'Add/Edit Accordion Panels', 'cashelrie' ),
		'desc'          => esc_html__( 'Create your accordion panels', 'cashelrie' ),
		'template'      => '{{=tab_title}}',
		'popup-options' => array(
			'tab_title'          => array(
				'type'  => 'text',
				'label' => esc_html__( 'Title', 'cashelrie' )
			),
			'tab_content'        => array(
				'type'  => 'textarea',
				'label' => esc_html__( 'Content', 'cashelrie' )
			),
			'tab_featured_image' => array(
				'type'        => 'upload',
				'value'       => '',
				'label'       => esc_html__( 'Panel Featured Image', 'cashelrie' ),
				'image'       => esc_html__( 'Image for your panel.', 'cashelrie' ),
				'help'        => esc_html__( 'It appears to the left from your content', 'cashelrie' ),
				'images_only' => true,
			),
			'tab_icon'           => array(
				'type'  => 'icon',
				'label' => esc_html__( 'Icon in panel title', 'cashelrie' ),
				'set'   => 'rt-icons-2',
			),
		)
	),
	'id'   => array( 'type' => 'unique' ),
	'accordion_color'     => array(
		'type'    => 'select',
		'value'   => '',
		'label'   => esc_html__( 'Accent Color', 'cashelrie' ),
		'choices' => array(
			''       => esc_html__( 'Accent Color 1', 'cashelrie' ),
			'color2' => esc_html__( 'Accent Color 2', 'cashelrie' ),
			'collapse-unstyled' => esc_html__( 'Unstyled', 'cashelrie' ),
		),
	),
);