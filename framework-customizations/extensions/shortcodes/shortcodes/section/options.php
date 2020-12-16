<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(

	'tab_main_options' => array(
		'type' => 'tab',
		'title' => esc_html__('Main Options', 'cashelrie'),
		'options' => array(

			'container_type' => array(
				'type'         => 'multi-picker',
				'label'        => false,
				'desc'         => false,
				'picker'       => array(
					'is_fullwidth'     => array(
						'label' => esc_html__( 'Full Width', 'cashelrie' ),
						'type'  => 'switch',
						'left-choice' => array(
							'value' => '',
							'label' => esc_html__('No', 'cashelrie'),
						),
						'right-choice' => array(
							'value' => 'fullwidth',
							'label' => esc_html__('Yes', 'cashelrie'),
						),
					),

				),
				'choices'      => array(
					''                  => array(),
					'fullwidth'   => array(
						'side_paddings' => array(
							'type'  => 'switch',
							'value' => true,
							'label' => esc_html__('Side paddings', 'cashelrie'),
							'desc' => esc_html__('Show Fullwidth container side paddings', 'cashelrie'),
						),
					),
				),
			),

			'background_color' => array(
				'type'    => 'select',
				'value'   => 'ls',
				'label'   => esc_html__( 'Background color', 'cashelrie' ),
				'desc'    => esc_html__( 'Select background color', 'cashelrie' ),
				'help'    => esc_html__( 'Select one of predefined background colors', 'cashelrie' ),
				'choices' => array(
					'ls'             => esc_html__( 'Light', 'cashelrie' ),
					'ls ms'          => esc_html__( 'Light Grey', 'cashelrie' ),
					'ds'             => esc_html__( 'Dark Grey', 'cashelrie' ),
					'ds ms'          => esc_html__( 'Dark', 'cashelrie' ),
					'cs'             => esc_html__( 'Main color', 'cashelrie' ),
					'cs gradient lighten_gradient'  => esc_html__( 'Main color with white lightening', 'cashelrie' ),
					'cs main_color2' => esc_html__( 'Main color 2', 'cashelrie' ),
					'cs main_color2 gradient lighten_gradient' => esc_html__( 'Main color 2 with white lightening', 'cashelrie' ),
					'cs gradient' => esc_html__( 'Main colors gradient', 'cashelrie' ),
				),
			),
			'section_borders' => array(
				'type'  => 'multi-select',
				'value' => array(),
				'label' => esc_html__('Section borders', 'cashelrie'),
				'help'  => esc_html__('You can select multiple choices', 'cashelrie'),
				'prepopulate' => false,
				'choices' => array(
					'with_top_border' => esc_html__('Top section border', 'cashelrie'),
					'with_bottom_border' => esc_html__('Bottom section border', 'cashelrie'),
					'with_top_border_container' => esc_html__('Top container border', 'cashelrie'),
					'with_bottom_border_container' => esc_html__('Bottom container border', 'cashelrie'),
				),
				'limit' => 100,
			),
			'top_padding'      => array(
				'type'    => 'select',
				'value'   => 'section_padding_top_50',
				'label'   => esc_html__( 'Top padding', 'cashelrie' ),
				'desc'    => esc_html__( 'Choose top padding value', 'cashelrie' ),
				'choices' => array(
					'section_padding_top_0'   => esc_html__( '0', 'cashelrie' ),
					'section_padding_top_5'   => esc_html__( '5 px', 'cashelrie' ),
					'section_padding_top_15'  => esc_html__( '15 px', 'cashelrie' ),
					'section_padding_top_25'  => esc_html__( '25 px', 'cashelrie' ),
					'section_padding_top_30'  => esc_html__( '30 px', 'cashelrie' ),
					'section_padding_top_40'  => esc_html__( '40 px', 'cashelrie' ),
					'section_padding_top_50'  => esc_html__( '50 px', 'cashelrie' ),
					'section_padding_top_65'  => esc_html__( '65 px', 'cashelrie' ),
					'section_padding_top_75'  => esc_html__( '75 px', 'cashelrie' ),
					'section_padding_top_90'  => esc_html__( '90 px', 'cashelrie' ),
					'section_padding_top_100' => esc_html__( '100 px', 'cashelrie' ),
					'section_padding_top_105' => esc_html__( '105 px', 'cashelrie' ),
					'section_padding_top_110' => esc_html__( '110 px', 'cashelrie' ),
					'section_padding_top_115' => esc_html__( '115 px', 'cashelrie' ),
					'section_padding_top_120' => esc_html__( '120 px', 'cashelrie' ),
					'section_padding_top_125' => esc_html__( '125 px', 'cashelrie' ),
					'section_padding_top_130' => esc_html__( '130 px', 'cashelrie' ),
					'section_padding_top_135' => esc_html__( '135 px', 'cashelrie' ),
					'section_padding_top_140' => esc_html__( '140 px', 'cashelrie' ),
					'section_padding_top_145' => esc_html__( '145 px', 'cashelrie' ),
					'section_padding_top_150' => esc_html__( '150 px', 'cashelrie' ),
				),
			),
			'bottom_padding'   => array(
				'type'    => 'select',
				'value'   => 'section_padding_bottom_50',
				'label'   => esc_html__( 'Bottom padding', 'cashelrie' ),
				'desc'    => esc_html__( 'Choose bottom padding value', 'cashelrie' ),
				'choices' => array(
					'section_padding_bottom_0'   => esc_html__( '0', 'cashelrie' ),
					'section_padding_bottom_5'   => esc_html__( '5 px', 'cashelrie' ),
					'section_padding_bottom_15'  => esc_html__( '15 px', 'cashelrie' ),
					'section_padding_bottom_25'  => esc_html__( '25 px', 'cashelrie' ),
					'section_padding_bottom_30'  => esc_html__( '30 px', 'cashelrie' ),
					'section_padding_bottom_40'  => esc_html__( '40 px', 'cashelrie' ),
					'section_padding_bottom_50'  => esc_html__( '50 px', 'cashelrie' ),
					'section_padding_bottom_65'  => esc_html__( '65 px', 'cashelrie' ),
					'section_padding_bottom_75'  => esc_html__( '75 px', 'cashelrie' ),
					'section_padding_bottom_90'  => esc_html__( '90 px', 'cashelrie' ),
					'section_padding_bottom_100' => esc_html__( '100 px', 'cashelrie' ),
					'section_padding_bottom_105' => esc_html__( '105 px', 'cashelrie' ),
					'section_padding_bottom_110' => esc_html__( '110 px', 'cashelrie' ),
					'section_padding_bottom_115' => esc_html__( '115 px', 'cashelrie' ),
					'section_padding_bottom_120' => esc_html__( '120 px', 'cashelrie' ),
					'section_padding_bottom_125' => esc_html__( '125 px', 'cashelrie' ),
					'section_padding_bottom_130' => esc_html__( '130 px', 'cashelrie' ),
					'section_padding_bottom_135' => esc_html__( '135 px', 'cashelrie' ),
					'section_padding_bottom_140' => esc_html__( '140 px', 'cashelrie' ),
					'section_padding_bottom_145' => esc_html__( '145 px', 'cashelrie' ),
					'section_padding_bottom_150' => esc_html__( '150 px', 'cashelrie' ),
				),
			),
			'background_image' => array(
				'label'   => esc_html__( 'Background Image', 'cashelrie' ),
				'desc'    => esc_html__( 'Please select the background image', 'cashelrie' ),
				'type'    => 'background-image',
				'choices' => array(//	in future may will set predefined images
				)
			),
			'background_cover' => array(
				'label' => esc_html__( 'Background Cover', 'cashelrie' ),
				'type'  => 'switch',
			),
			'parallax'         => array(
				'label' => esc_html__( 'Parallax', 'cashelrie' ),
				'type'  => 'switch',
			),
			'overlay_color'    => array(
				'label' => esc_html__( 'Overlay color', 'cashelrie' ),
				'desc'  => esc_html__( 'Overlay background image with semitransparent section background color', 'cashelrie' ),
				'value' => false,
				'type'  => 'switch',
			),
			'section_id' => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__('ID attribute', 'cashelrie'),
				'desc'  => esc_html__('Add ID attribute to section. Useful for single page menu', 'cashelrie'),
			),
			'section_class' => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__('Custom class for section', 'cashelrie'),
				'desc'  => esc_html__('Add custom class to section. Useful for custom styling', 'cashelrie'),
			),
		),
	),

	'tab_alignment_spacing' => array(
		'type' => 'tab',
		'title' => esc_html__('Columns Alignment and Spacing', 'cashelrie'),
		'options' => array(

			'columns_padding'  => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Column paddings', 'cashelrie' ),
				'desc'    => esc_html__( 'Choose columns horizontal paddings value', 'cashelrie' ),
				'choices' => array(
					'columns_padding_0'  => esc_html__( '0', 'cashelrie' ),
					'columns_padding_1'  => esc_html__( '1 px', 'cashelrie' ),
					'columns_padding_2'  => esc_html__( '2 px', 'cashelrie' ),
					'columns_padding_5'  => esc_html__( '5 px', 'cashelrie' ),
					'columns_padding_10' => esc_html__( '10 px', 'cashelrie' ),
					'' => esc_html__( '15 px - default', 'cashelrie' ),
					'columns_padding_30' => esc_html__( '30 px', 'cashelrie' ),
					'columns_padding_50' => esc_html__( '50 px', 'cashelrie' ),
					'columns_padding_60' => esc_html__( '60 px', 'cashelrie' ),
					'columns_padding_80' => esc_html__( '80 px', 'cashelrie' ),
				),
			),
			'columns_top_margin'  => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Column Top Margin', 'cashelrie' ),
				'desc'    => esc_html__( 'Choose columns top margin value', 'cashelrie' ),
				'choices' => array(
					'columns_margin_top_0'  => esc_html__( '0 px', 'cashelrie' ),
					'columns_margin_top_5'  => esc_html__( '5 px', 'cashelrie' ),
					''  => esc_html__( '10 px - default', 'cashelrie' ),
					'columns_margin_top_15'  => esc_html__( '15 px', 'cashelrie' ),
					'columns_margin_top_20'  => esc_html__( '20 px', 'cashelrie' ),
					'columns_margin_top_30'  => esc_html__( '30 px', 'cashelrie' ),
					'columns_margin_top_40'  => esc_html__( '40 px', 'cashelrie' ),
					'columns_margin_top_50'  => esc_html__( '50 px', 'cashelrie' ),
					'columns_margin_top_60'  => esc_html__( '60 px', 'cashelrie' ),
				),
			),
			'columns_bottom_margin'  => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Column Bottom Margin', 'cashelrie' ),
				'desc'    => esc_html__( 'Choose columns bottom margin value', 'cashelrie' ),
				'choices' => array(
					'columns_margin_bottom_0'   => esc_html__( '0 px', 'cashelrie' ),
					'columns_margin_bottom_5'   => esc_html__( '5 px', 'cashelrie' ),
					''  => esc_html__( '10 px - default', 'cashelrie' ),
					'columns_margin_bottom_15'  => esc_html__( '15 px', 'cashelrie' ),
					'columns_margin_bottom_20'  => esc_html__( '20 px', 'cashelrie' ),
					'columns_margin_bottom_30'  => esc_html__( '30 px', 'cashelrie' ),
					'columns_margin_bottom_40'  => esc_html__( '40 px', 'cashelrie' ),
					'columns_margin_bottom_50'  => esc_html__( '50 px', 'cashelrie' ),
					'columns_margin_bottom_60'  => esc_html__( '60 px', 'cashelrie' ),
				),
			),
			'is_flex_wrap'         => array(
				'label' => esc_html__( 'Equalize columns height', 'cashelrie' ),
				'type'  => 'switch',
			),
			'is_vertical_center'         => array(
				'label' => esc_html__( 'Vertical align columns', 'cashelrie' ),
				'desc'  => esc_html__( 'Align columns vertically', 'cashelrie' ),
				'type'  => 'switch',
			),
			'is_content_vertical_center'         => array(
				'label' => esc_html__( 'Vertical align content in columns', 'cashelrie' ),
				'desc'  => esc_html__( 'Stretch columns height and align content vertically', 'cashelrie' ),
				'type'  => 'switch',
			),
		),
	),

	'tab_onehalf_media_options' => array(
		'type' => 'tab',
		'title' => esc_html__('One half width Media', 'cashelrie'),
		'options' => array(
			'side_media_image' => array(
				'type'  => 'upload',
				'value' => array(),
				'label' => esc_html__('Side media image', 'cashelrie'),
				'desc'  => esc_html__('Select image that you want to appear as one half side image', 'cashelrie'),
				'images_only' => true,
			),
			'side_media_link' => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__('Link to your side media', 'cashelrie'),
				'desc'  => esc_html__('You can add a link to your side media. If YouTube link will be provided, video will play in LightBox', 'cashelrie'),
			),
			'side_media_video' => array(
				'type'    => 'oembed',
				'value'   => '',
				'label'   => esc_html__( 'Video', 'cashelrie' ),
				'desc'    => esc_html__( 'Adds video player. Works only when side media image is set', 'cashelrie' ),
				'help'    => esc_html__( 'Leave blank if no needed', 'cashelrie' ),
				'preview' => array(
					'width'      => 278, // optional, if you want to set the fixed width to iframe
					'height'     => 185, // optional, if you want to set the fixed height to iframe
					/**
					 * if is set to false it will force to fit the dimensions,
					 * because some widgets return iframe with aspect ratio and ignore applied dimensions
					 */
					'keep_ratio' => true
				),
			),
			'side_media_position'  => array(
				'type'  => 'switch',
				'value' => 'image_cover_left',
				'label' => esc_html__('Media position', 'cashelrie'),
				'desc'  => esc_html__('Left or right media position', 'cashelrie'),
				'left-choice' => array(
					'value' => 'image_cover_left',
					'label' => esc_html__('Left', 'cashelrie'),
				),
				'right-choice' => array(
					'value' => 'image_cover_right',
					'label' => esc_html__('Right', 'cashelrie'),
				),
			),
		),

	),

);
