<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$contact_form = fw_ext( 'shortcodes' )->get_shortcode( 'contact_form' )->get_options();

$options = array(
	'tabs'       => array(
		'type'          => 'addable-popup',
		'label'         => esc_html__( 'Tabs', 'cashelrie' ),
		'popup-title'   => esc_html__( 'Add/Edit Tabs', 'cashelrie' ),
		'desc'          => esc_html__( 'Create your tabs', 'cashelrie' ),
		'template'      => '{{=tab_title}}',
		'popup-options' => array(
			'tab_title'          => array(
				'type'  => 'text',
				'label' => esc_html__( 'Tab Title', 'cashelrie' )
			),
			'tab_content'        => array(
				'type'  => 'wp-editor',
				'label' => esc_html__( 'Tab Content', 'cashelrie' ),
			),
			'tab_featured_image' => array(
				'type'        => 'upload',
				'value'       => '',
				'label'       => esc_html__( 'Tab Featured Image', 'cashelrie' ),
				'image'       => esc_html__( 'Featured image for your tab', 'cashelrie' ),
				'help'        => esc_html__( 'Image for your tab. It appears on the top of your tab content', 'cashelrie' ),
				'images_only' => true,
			),
			'tab_icon'           => array(
				'type'  => 'icon',
				'label' => esc_html__( 'Icon in tab title', 'cashelrie' ),
				'set'   => 'rt-icons-2',
			),
			'tab_form' => array(
				'type'         => 'multi-picker',
				'label'        => false,
				'desc'         => false,
				'picker'       => array(
					'add_form' => array(
						'type'      => 'switch',
						'value'     => '',
						'label' => esc_html__('Add Form in Tab', 'cashelrie'),


						'left-choice' => array(
							'value' => '',
							'label' => esc_html__('No', 'cashelrie'),
						),
						'right-choice' => array(
							'value' => 'form',
							'label' => esc_html__('Yes', 'cashelrie'),
						),


					),

				),
				'choices'      => array(
					''                  => array(),
					'form'   => array(
						'form_options'  => array(
							'type' => 'popup',
							'button' => esc_html__('Form', 'cashelrie'),
							'size' => 'large', // small, medium, large
							'popup-options' => array(
								$contact_form
							),
						),
					)
				),
			),
		),
	),
	'small_tabs' => array(
		'type'         => 'switch',
		'value'        => '',
		'label'        => esc_html__( 'Small Tabs', 'cashelrie' ),
		'desc'         => esc_html__( 'Decrease tabs size', 'cashelrie' ),
		'left-choice'  => array(
			'value' => '',
			'label' => esc_html__( 'No', 'cashelrie' ),
		),
		'right-choice' => array(
			'value' => 'small-tabs',
			'label' => esc_html__( 'Yes', 'cashelrie' ),
		),
	),
	'half_width' => array(
		'type'         => 'switch',
		'value'        => '',
		'label'        => esc_html__( 'Half Width Tabs', 'cashelrie' ),
		'desc'         => esc_html__( 'Two tabs per line', 'cashelrie' ),
		'left-choice'  => array(
			'value' => '',
			'label' => esc_html__( 'No', 'cashelrie' ),
		),
		'right-choice' => array(
			'value' => 'half-width-tabs',
			'label' => esc_html__( 'Yes', 'cashelrie' ),
		),
	),
	'top_border' => array(
		'type'         => 'switch',
		'value'        => '',
		'label'        => esc_html__( 'Top color border', 'cashelrie' ),
		'desc'         => esc_html__( 'Add top color border to tab content', 'cashelrie' ),
		'left-choice'  => array(
			'value' => '',
			'label' => esc_html__( 'No top border', 'cashelrie' ),
		),
		'right-choice' => array(
			'value' => 'top-color-border',
			'label' => esc_html__( 'Color top border', 'cashelrie' ),
		),
	),
	'id'         => array( 'type' => 'unique' ),
	'tab_color'     => array(
		'type'    => 'select',
		'value'   => '',
		'label'   => esc_html__( 'Accent Color', 'cashelrie' ),
		'choices' => array(
			''       => esc_html__( 'Accent Color 1', 'cashelrie' ),
			'color2' => esc_html__( 'Accent Color 2', 'cashelrie' ),
			'color3' => esc_html__( 'Accent Color 3', 'cashelrie' ),
			'color4' => esc_html__( 'Accent Color 4', 'cashelrie' ),
		),
	),
);