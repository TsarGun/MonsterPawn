<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

//find fw_ext
$shortcodes_extension = fw()->extensions->get( 'shortcodes' );
$button_options = array();
if ( ! empty( $shortcodes_extension ) ) {
	$button_options = $shortcodes_extension->get_shortcode( 'button' )->get_options();
}

$options = array(

	'slide_image_class' => array(
		'label' => esc_html__('Image Custom Class', 'cashelrie'),
		'type' => 'text',
	),

	'slide_media_layers'     => array(
		'type'        => 'addable-box',
		'value'       => '',
		'label'       => esc_html__( 'Slide Media Layers', 'cashelrie' ),
		'desc'        => esc_html__( 'Add slide media layers before of after main image', 'cashelrie' ),
		'box-options' => array(
			'media_layer_position'     => array(
				'label' => esc_html__( 'Before / After Main Image', 'cashelrie' ),
				'desc'  => esc_html__( 'Choose where to put media layer, before of after main slide image', 'cashelrie' ),
				'type'  => 'switch',
				'left-choice' => array(
					'value' => 'before',
					'label' => esc_html__('Before', 'cashelrie'),
				),
				'right-choice' => array(
					'value' => 'after',
					'label' => esc_html__('After', 'cashelrie'),
				),
			),
			'media_layer_class' => array(
				'label' => esc_html__('Layer Class', 'cashelrie'),
				'type' => 'text',
			),
			'media_layer_image' => array(
				'label' => esc_html__('Layer Image', 'cashelrie'),
				'type' => 'upload',
			),
			'media_layer_animation'      => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Layer Animation', 'cashelrie' ),
				'desc'    => esc_html__( 'Select one of predefined animations', 'cashelrie' ),
				'choices' => array(
					''               => esc_html__( 'Default', 'cashelrie' ),
					'slideDown'      => esc_html__( 'slideDown', 'cashelrie' ),
					'scaleAppear'    => esc_html__( 'scaleAppear', 'cashelrie' ),
					'fadeInLeft'     => esc_html__( 'fadeInLeft', 'cashelrie' ),
					'fadeInUp'       => esc_html__( 'fadeInUp', 'cashelrie' ),
					'fadeInRight'    => esc_html__( 'fadeInRight', 'cashelrie' ),
					'fadeInDown'     => esc_html__( 'fadeInDown', 'cashelrie' ),
					'fadeIn'         => esc_html__( 'fadeIn', 'cashelrie' ),
					'slideRight'     => esc_html__( 'slideRight', 'cashelrie' ),
					'slideUp'        => esc_html__( 'slideUp', 'cashelrie' ),
					'slideLeft'      => esc_html__( 'slideLeft', 'cashelrie' ),
					'expandUp'       => esc_html__( 'expandUp', 'cashelrie' ),
					'slideExpandUp'  => esc_html__( 'slideExpandUp', 'cashelrie' ),
					'expandOpen'     => esc_html__( 'expandOpen', 'cashelrie' ),
					'bigEntrance'    => esc_html__( 'bigEntrance', 'cashelrie' ),
					'hatch'          => esc_html__( 'hatch', 'cashelrie' ),
					'tossing'        => esc_html__( 'tossing', 'cashelrie' ),
					'pulse'          => esc_html__( 'pulse', 'cashelrie' ),
					'floating'       => esc_html__( 'floating', 'cashelrie' ),
					'bounce'         => esc_html__( 'bounce', 'cashelrie' ),
					'pullUp'         => esc_html__( 'pullUp', 'cashelrie' ),
					'pullDown'       => esc_html__( 'pullDown', 'cashelrie' ),
					'stretchLeft'    => esc_html__( 'stretchLeft', 'cashelrie' ),
					'stretchRight'   => esc_html__( 'stretchRight', 'cashelrie' ),
					'fadeInUpBig'    => esc_html__( 'fadeInUpBig', 'cashelrie' ),
					'fadeInDownBig'  => esc_html__( 'fadeInDownBig', 'cashelrie' ),
					'fadeInLeftBig'  => esc_html__( 'fadeInLeftBig', 'cashelrie' ),
					'fadeInRightBig' => esc_html__( 'fadeInRightBig', 'cashelrie' ),
					'slideInDown'    => esc_html__( 'slideInDown', 'cashelrie' ),
					'slideInLeft'    => esc_html__( 'slideInLeft', 'cashelrie' ),
					'slideInRight'   => esc_html__( 'slideInRight', 'cashelrie' ),
					'moveFromLeft'   => esc_html__( 'moveFromLeft', 'cashelrie' ),
					'moveFromRight'  => esc_html__( 'moveFromRight', 'cashelrie' ),
					'moveFromBottom' => esc_html__( 'moveFromBottom', 'cashelrie' ),
				),
			),
		),
		'template'    => esc_html__( 'Slider Media Layer', 'cashelrie' ),

		'limit'           => 5, // limit the number of boxes that can be added
		'add-button-text' => esc_html__( 'Add', 'cashelrie' ),
	),

	'slide_align'      => array(
		'type'        => 'select',
		'value'       => 'text-left',
		'label'       => esc_html__( 'Slide text alignment', 'cashelrie' ),
		'desc'        => esc_html__( 'Select slide text alignment', 'cashelrie' ),
		'choices'     => array(
			'text-left'   => esc_html__( 'Left', 'cashelrie' ),
			'text-center' => esc_html__( 'Center', 'cashelrie' ),
			'text-right'  => esc_html__( 'Right', 'cashelrie' ),
		),
		/**
		 * Allow save not existing choices
		 * Useful when you use the select to populate it dynamically from js
		 */
		'no-validate' => false,
	),

	'slide_layers'     => array(
		'type'        => 'addable-box',
		'value'       => '',
		'label'       => esc_html__( 'Slide Layers', 'cashelrie' ),
		'desc'        => esc_html__( 'Choose a tag and text inside it', 'cashelrie' ),
		'box-options' => array(
			'layer_tag'            => array(
				'type'    => 'select',
				'value'   => 'h3',
				'label'   => esc_html__( 'Layer tag', 'cashelrie' ),
				'desc'    => esc_html__( 'Select a tag for your ', 'cashelrie' ),
				'choices' => array(
					'h3' => esc_html__( 'H3 tag', 'cashelrie' ),
					'h2' => esc_html__( 'H2 tag', 'cashelrie' ),
					'h4' => esc_html__( 'H4 tag', 'cashelrie' ),
					'h5' => esc_html__( 'H5 tag', 'cashelrie' ),
					'p'  => esc_html__( 'P tag', 'cashelrie' ),
					'hr'  => esc_html__( 'Divider tag', 'cashelrie' ),

				),
			),
			'layer_animation'      => array(
				'type'    => 'select',
				'value'   => 'fadeIn',
				'label'   => esc_html__( 'Animation type', 'cashelrie' ),
				'desc'    => esc_html__( 'Select one of predefined animations', 'cashelrie' ),
				'choices' => array(
					''               => esc_html__( 'Default', 'cashelrie' ),
					'slideDown'      => esc_html__( 'slideDown', 'cashelrie' ),
					'scaleAppear'    => esc_html__( 'scaleAppear', 'cashelrie' ),
					'fadeInLeft'     => esc_html__( 'fadeInLeft', 'cashelrie' ),
					'fadeInUp'       => esc_html__( 'fadeInUp', 'cashelrie' ),
					'fadeInRight'    => esc_html__( 'fadeInRight', 'cashelrie' ),
					'fadeInDown'     => esc_html__( 'fadeInDown', 'cashelrie' ),
					'fadeIn'         => esc_html__( 'fadeIn', 'cashelrie' ),
					'slideRight'     => esc_html__( 'slideRight', 'cashelrie' ),
					'slideUp'        => esc_html__( 'slideUp', 'cashelrie' ),
					'slideLeft'      => esc_html__( 'slideLeft', 'cashelrie' ),
					'expandUp'       => esc_html__( 'expandUp', 'cashelrie' ),
					'slideExpandUp'  => esc_html__( 'slideExpandUp', 'cashelrie' ),
					'expandOpen'     => esc_html__( 'expandOpen', 'cashelrie' ),
					'bigEntrance'    => esc_html__( 'bigEntrance', 'cashelrie' ),
					'hatch'          => esc_html__( 'hatch', 'cashelrie' ),
					'tossing'        => esc_html__( 'tossing', 'cashelrie' ),
					'pulse'          => esc_html__( 'pulse', 'cashelrie' ),
					'floating'       => esc_html__( 'floating', 'cashelrie' ),
					'bounce'         => esc_html__( 'bounce', 'cashelrie' ),
					'pullUp'         => esc_html__( 'pullUp', 'cashelrie' ),
					'pullDown'       => esc_html__( 'pullDown', 'cashelrie' ),
					'stretchLeft'    => esc_html__( 'stretchLeft', 'cashelrie' ),
					'stretchRight'   => esc_html__( 'stretchRight', 'cashelrie' ),
					'fadeInUpBig'    => esc_html__( 'fadeInUpBig', 'cashelrie' ),
					'fadeInDownBig'  => esc_html__( 'fadeInDownBig', 'cashelrie' ),
					'fadeInLeftBig'  => esc_html__( 'fadeInLeftBig', 'cashelrie' ),
					'fadeInRightBig' => esc_html__( 'fadeInRightBig', 'cashelrie' ),
					'slideInDown'    => esc_html__( 'slideInDown', 'cashelrie' ),
					'slideInLeft'    => esc_html__( 'slideInLeft', 'cashelrie' ),
					'slideInRight'   => esc_html__( 'slideInRight', 'cashelrie' ),
					'moveFromLeft'   => esc_html__( 'moveFromLeft', 'cashelrie' ),
					'moveFromRight'  => esc_html__( 'moveFromRight', 'cashelrie' ),
					'moveFromBottom' => esc_html__( 'moveFromBottom', 'cashelrie' ),
				),
			),
			'layer_text'           => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Layer text', 'cashelrie' ),
				'desc'  => esc_html__( 'Text to appear in slide layer', 'cashelrie' ),
			),
			'layer_text_color'     => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Layer text color', 'cashelrie' ),
				'desc'    => esc_html__( 'Select a color for your text in layer', 'cashelrie' ),
				'choices' => array(
					''           => esc_html__( 'Inherited', 'cashelrie' ),
					'highlight'  => esc_html__( 'Accent Color 1', 'cashelrie' ),
					'highlight2' => esc_html__( 'Accent Color 2', 'cashelrie' ),
					'grey'       => esc_html__( 'Dark grey theme color', 'cashelrie' ),
					'black'      => esc_html__( 'Dark theme color', 'cashelrie' ),

				),
			),
			'layer_text_weight'    => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Layer text weight', 'cashelrie' ),
				'desc'    => esc_html__( 'Select a weight for your text in layer', 'cashelrie' ),
				'choices' => array(
					''     => esc_html__( 'Normal', 'cashelrie' ),
					'bold' => esc_html__( 'Bold', 'cashelrie' ),
					'thin' => esc_html__( 'Thin', 'cashelrie' ),

				),
			),
			'layer_text_transform' => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Layer text transform', 'cashelrie' ),
				'desc'    => esc_html__( 'Select a text transformation for your layer', 'cashelrie' ),
				'choices' => array(
					''                => esc_html__( 'None', 'cashelrie' ),
					'text-lowercase'  => esc_html__( 'Lowercase', 'cashelrie' ),
					'text-uppercase'  => esc_html__( 'Uppercase', 'cashelrie' ),
					'text-capitalize' => esc_html__( 'Capitalize', 'cashelrie' ),

				),
			),
		),
		'template'    => esc_html__( 'Slider Layer', 'cashelrie' ),

		'limit'           => 5, // limit the number of boxes that can be added
		'add-button-text' => esc_html__( 'Add', 'cashelrie' ),
	),
	'slide_buttons'     => array(
		'type'        => 'addable-box',
		'value'       => '',
		'label'       => esc_html__( 'Slide Buttons', 'cashelrie' ),
		'desc'        => esc_html__( 'Choose a button, link for it and text inside it', 'cashelrie' ),
		'template'    => 'Button',
		'box-options' => array(
			$button_options
		),
		'limit'           => 5, // limit the number of boxes that can be added
		'add-button-text' => esc_html__( 'Add', 'cashelrie' ),
	),
	'slide_button_animation' => array(
		'type'    => 'select',
		'value'   => 'fadeIn',
		'label'   => esc_html__( 'Buttons animation type', 'cashelrie' ),
		'desc'    => esc_html__( 'Select one of predefined animations', 'cashelrie' ),
		'choices' => array(
			''               => esc_html__( 'Default', 'cashelrie' ),
			'slideDown'      => esc_html__( 'slideDown', 'cashelrie' ),
			'scaleAppear'    => esc_html__( 'scaleAppear', 'cashelrie' ),
			'fadeInLeft'     => esc_html__( 'fadeInLeft', 'cashelrie' ),
			'fadeInUp'       => esc_html__( 'fadeInUp', 'cashelrie' ),
			'fadeInRight'    => esc_html__( 'fadeInRight', 'cashelrie' ),
			'fadeInDown'     => esc_html__( 'fadeInDown', 'cashelrie' ),
			'fadeIn'         => esc_html__( 'fadeIn', 'cashelrie' ),
			'slideRight'     => esc_html__( 'slideRight', 'cashelrie' ),
			'slideUp'        => esc_html__( 'slideUp', 'cashelrie' ),
			'slideLeft'      => esc_html__( 'slideLeft', 'cashelrie' ),
			'expandUp'       => esc_html__( 'expandUp', 'cashelrie' ),
			'slideExpandUp'  => esc_html__( 'slideExpandUp', 'cashelrie' ),
			'expandOpen'     => esc_html__( 'expandOpen', 'cashelrie' ),
			'bigEntrance'    => esc_html__( 'bigEntrance', 'cashelrie' ),
			'hatch'          => esc_html__( 'hatch', 'cashelrie' ),
			'tossing'        => esc_html__( 'tossing', 'cashelrie' ),
			'pulse'          => esc_html__( 'pulse', 'cashelrie' ),
			'floating'       => esc_html__( 'floating', 'cashelrie' ),
			'bounce'         => esc_html__( 'bounce', 'cashelrie' ),
			'pullUp'         => esc_html__( 'pullUp', 'cashelrie' ),
			'pullDown'       => esc_html__( 'pullDown', 'cashelrie' ),
			'stretchLeft'    => esc_html__( 'stretchLeft', 'cashelrie' ),
			'stretchRight'   => esc_html__( 'stretchRight', 'cashelrie' ),
			'fadeInUpBig'    => esc_html__( 'fadeInUpBig', 'cashelrie' ),
			'fadeInDownBig'  => esc_html__( 'fadeInDownBig', 'cashelrie' ),
			'fadeInLeftBig'  => esc_html__( 'fadeInLeftBig', 'cashelrie' ),
			'fadeInRightBig' => esc_html__( 'fadeInRightBig', 'cashelrie' ),
			'slideInDown'    => esc_html__( 'slideInDown', 'cashelrie' ),
			'slideInLeft'    => esc_html__( 'slideInLeft', 'cashelrie' ),
			'slideInRight'   => esc_html__( 'slideInRight', 'cashelrie' ),
			'moveFromLeft'   => esc_html__( 'moveFromLeft', 'cashelrie' ),
			'moveFromRight'  => esc_html__( 'moveFromRight', 'cashelrie' ),
			'moveFromBottom' => esc_html__( 'moveFromBottom', 'cashelrie' ),
		),
	),
);