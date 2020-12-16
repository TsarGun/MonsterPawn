<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

//get button to add in a teaser:
$button         = fw_ext( 'shortcodes' )->get_shortcode( 'button' );
$button_options = $button->get_options();
unset( $button_options['link'] );
//unset( $button_options['target'] );
$button_array = array(
	'button' => array(
		'type'    => 'multi-picker',
		'label'   => false,
		'desc'    => false,
		'value'   => false,
		'picker'  => array(
			'show_button' => array(
				'type'         => 'switch',
				'label'        => esc_html__( 'Show teaser button', 'cashelrie' ),
				'left-choice'  => array(
					'value' => '',
					'label' => esc_html__( 'No', 'cashelrie' ),
				),
				'right-choice' => array(
					'value' => 'button',
					'label' => esc_html__( 'Yes', 'cashelrie' ),
				),
			),
		),
		'choices' => array(
			''       => array(),
			'button' => $button_options,
		),
	)
);

$teaser_center_array = array(
	'teaser_offset_icon' => array(
		'type'         => 'switch',
		'value'        => '',
		'label'        => esc_html__( 'Top offset icon', 'cashelrie' ),
		'left-choice'  => array(
			'value' => '',
			'label' => esc_html__( 'No', 'cashelrie' ),
		),
		'right-choice' => array(
			'value' => 'text-center',
			'label' => esc_html__( 'Yes', 'cashelrie' ),
		),
	),
	'teaser_center' => array(
		'type'         => 'switch',
		'value'        => '',
		'label'        => esc_html__( 'Center teaser contents', 'cashelrie' ),
		'left-choice'  => array(
			'value' => '',
			'label' => esc_html__( 'No', 'cashelrie' ),
		),
		'right-choice' => array(
			'value' => 'text-center',
			'label' => esc_html__( 'Yes', 'cashelrie' ),
		),
	),
);

$icon_options = array(
	'type'    => 'group',
	'options' => array(
		'icon'       => array(
			'type'  => 'icon-v2',
			'label' => esc_html__( 'Choose an Icon', 'cashelrie' ),
		),
		'icon_size'  => array(
			'type'    => 'select',
			'value'   => 'size_normal',
			'label'   => esc_html__( 'Icon Size', 'cashelrie' ),
			'choices' => array(
				'size_small'  => esc_html__( 'Small', 'cashelrie' ),
				'size_normal' => esc_html__( 'Normal', 'cashelrie' ),
				'size_big'    => esc_html__( 'Big', 'cashelrie' ),
			)
		),
		'icon_style' => array(
			'type'    => 'image-picker',
			'value'   => '',
			'label'   => esc_html__( 'Icon Style', 'cashelrie' ),
			'desc'    => esc_html__( 'Select one of predefined icon styles. If not set - no icon will appear.', 'cashelrie' ),
			'help'    => esc_html__( 'If not set - no icon will appear.', 'cashelrie' ),
			'choices' => array(
				''                            => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/icon_teaser_00.png',
				'default_icon'                => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/icon_teaser_01.png',
				'border_icon'                 => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/icon_teaser_02.png',
				'background_icon'               => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/icon_teaser_03.png',
				'border_icon round'           => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/icon_teaser_04.png',
				'background_icon round'         => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/icon_teaser_05.png',
				'round light_bg_color thick_border_icon' => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/icon_teaser_06.png',
			),
			'blank' => false, // (optional) if true, images can be deselected
		),
	),
);

$image_options = array(
	'type'        => 'upload',
	'value'       => '',
	'label'       => esc_html__( 'Teaser Image', 'cashelrie' ),
	'image'       => esc_html__( 'Image for your teaser.', 'cashelrie' ),
	'help'        => esc_html__( 'Image for your teaser. Image can appear as an element, or background or even can be hidden depends from chosen teaser type', 'cashelrie' ),
	'images_only' => true,
);

$option_teaser_icon = array(
	'icon_options' => $icon_options,
);

$option_teaser_image = array(
	'teaser_image' => $image_options,
);

$option_teaser_square = array(
	'teaser_image' => $image_options,
	'teaser_banner' => array(
		'type'  => 'switch',
		'label' => esc_html__( 'Teaser Banner', 'cashelrie' ),
		'desc' => esc_html__( 'Put whole teaser in a link', 'cashelrie' )
	)
);

$option_teaser_vertical_center = array(
	'is_vertical_center'         => array(
		'label' => esc_html__( 'Vertical center', 'cashelrie' ),
		'desc'  => esc_html__( 'Align vertically icon and content in side teasers', 'cashelrie' ),
		'type'  => 'switch',
	),
);

$option_teaser_counter = array(
	'icon_options'    => $icon_options,
	'counter_options' => array(
		'type'    => 'group',
		'options' => array(

			'number'                  => array(
				'type'  => 'text',
				'value' => 10,
				'label' => esc_html__( 'Count To Number', 'cashelrie' ),
				'desc'  => esc_html__( 'Choose value to count to', 'cashelrie' ),
			),
			'counter_additional_text' => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Add some text after counter', 'cashelrie' ),
				'desc'  => esc_html__( 'You can add "+", "%", decimal values etc.', 'cashelrie' ),
			),
			'speed'                   => array(
				'type'       => 'slider',
				'value'      => 1000,
				'properties' => array(
					'min'  => 500,
					'max'  => 5000,
					'step' => 100,
				),
				'label'      => esc_html__( 'Counter Speed (counter teaser only)', 'cashelrie' ),
				'desc'       => esc_html__( 'Choose counter speed (in milliseconds)', 'cashelrie' ),
			),
		),
	),
);

$options = array(
	'title'        => array(
		'type'  => 'text',
		'label' => esc_html__( 'Teaser Title', 'cashelrie' ),
	),

	'link'         => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__( 'Teaser link', 'cashelrie' ),
		'desc'  => esc_html__( 'Link on title and optional button', 'cashelrie' ),
	),

	'teaser_types' => array(
		'type'         => 'multi-picker',
		'label'        => false,
		'desc'         => false,
		'picker'       => array(
			'teaser_type' => array(
				'type'    => 'image-picker',
				'value'   => 'icon_top',
				'label'   => esc_html__( 'Teaser Type', 'cashelrie' ),
				'desc'    => esc_html__( 'Select one of predefined teaser types', 'cashelrie' ),
				'choices' => array(
					'icon_top'      => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/icon_top.png',
					'icon_left'     => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/icon_left.png',
					'icon_right'    => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/icon_right.png',
					'icon_image_bg' => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/icon_image_bg.png',
					'counter'       => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/icon_counter.png',
					'icon_background' => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/icon_background.png',
				),
				'blank'   => false, // (optional) if true, images can be deselected
			),
		),
		'choices'      => array(
			'icon_top'      => array_merge( $option_teaser_icon, $teaser_center_array, $button_array ),
			'icon_left'     => array_merge( $option_teaser_icon, $option_teaser_vertical_center ),
			'icon_right'    => array_merge( $option_teaser_icon, $option_teaser_vertical_center ),
			'icon_image_bg' => array_merge( $option_teaser_icon, $option_teaser_square, $button_array ),
			'counter'       => $option_teaser_counter,
			'icon_background' => $option_teaser_icon
		),
		'show_borders' => true,
	),

	'teaser_style' => array(
		'type'    => 'select',
		'label'   => esc_html__( 'Teaser Box Style', 'cashelrie' ),
		'choices' => array(
			''                             => esc_html__( 'Default (no border or background)', 'cashelrie' ),
			'with_padding with_border'     => esc_html__( 'Bordered', 'cashelrie' ),
			'with_padding with_background' => esc_html__( 'Muted Background', 'cashelrie' ),
			'with_padding ls ms'           => esc_html__( 'Grey background', 'cashelrie' ),
			'with_padding ds'              => esc_html__( 'Dark background', 'cashelrie' ),
			'with_padding ds ms'           => esc_html__( 'Darkgrey background', 'cashelrie' ),
			'with_padding main_bg_color'              => esc_html__( 'Accent color 1', 'cashelrie' ),
			'with_padding main_bg_color2'              => esc_html__( 'Accent color 2', 'cashelrie' ),
		)
	),

	'teaser_accent_color' => array(
		'type'    => 'select',
		'value'   => '',
		'label'   => esc_html__( 'Teaser accent color', 'cashelrie' ),
		'desc'    => esc_html__( 'Color of the title on mouse hover', 'cashelrie' ),
		'choices' => array(
			''       => esc_html__( 'Grey (default)', 'cashelrie' ),
			'dark'   => esc_html__( 'Dark', 'cashelrie' ),
			'color1' => esc_html__( 'Accent Color 1', 'cashelrie' ),
			'color2' => esc_html__( 'Accent Color 2', 'cashelrie' ),
		)
	),

	'content'      => array(
		'type'  => 'wp-editor',
		'label' => esc_html__( 'Teaser text', 'cashelrie' ),
		'desc'  => esc_html__( 'Enter desired teaser content', 'cashelrie' ),
	),

	'title_tag' => array(
		'type'    => 'select',
		'value'   => 'h3',
		'label'   => esc_html__( 'Title Tag', 'cashelrie' ),
		'choices' => array(
			'h2' => esc_html__( 'H2', 'cashelrie' ),
			'h3' => esc_html__( 'H3', 'cashelrie' ),
			'h4' => esc_html__( 'H4', 'cashelrie' ),
			'h5' => esc_html__( 'H5', 'cashelrie' ),
			'h6' => esc_html__( 'H6', 'cashelrie' ),
		)
	),

	'title_text_wight' => array(
		'type'    => 'select',
		'value'   => '',
		'label'   => esc_html__( 'Title text weight', 'cashelrie' ),
		'choices' => array(
			''      => esc_html__( 'Regular', 'cashelrie' ),
			'thin'  => esc_html__( 'Thin', 'cashelrie' ),
			'semibold'  => esc_html__( 'Semibold', 'cashelrie' ),
			'bold'  => esc_html__( 'Bold', 'cashelrie' ),
		),
	),

	'title_text_transform' => array(
		'type'    => 'select',
		'value'   => '',
		'label'   => esc_html__( 'Title text transform', 'cashelrie' ),
		'choices' => array(
			''                => esc_html__( 'None', 'cashelrie' ),
			'text-lowercase'  => esc_html__( 'Lowercase', 'cashelrie' ),
			'text-uppercase'  => esc_html__( 'Uppercase', 'cashelrie' ),
			'text-capitalize' => esc_html__( 'Capitalize', 'cashelrie' ),

		),
	),
);