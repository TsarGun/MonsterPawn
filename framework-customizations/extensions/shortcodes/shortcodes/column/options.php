<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$custom_column_classes = array(
	'custom_classes'    => array(
		'type'  => 'text',
		'label' => esc_html__( 'Custom column classes', 'cashelrie' ),
		'desc'  => esc_html__( 'Enter custom column classes', 'cashelrie' ),
	),
);

$options = array(
	'column_align'     => array(
		'type'    => 'select',
		'value'   => '',
		'label'   => esc_html__( 'Text alignment in column', 'cashelrie' ),
		'desc'    => esc_html__( 'Select text alignment inside your column', 'cashelrie' ),
		'choices' => array(
			''            => esc_html__( 'Inherit', 'cashelrie' ),
			'text-left'   => esc_html__( 'Left', 'cashelrie' ),
			'text-center' => esc_html__( 'Center', 'cashelrie' ),
			'text-right'  => esc_html__( 'Right', 'cashelrie' ),
		),
	),
	'column_padding'   => array(
		'type'    => 'select',
		'value'   => '',
		'label'   => esc_html__( 'Column padding', 'cashelrie' ),
		'desc'    => esc_html__( 'Select optional internal column paddings', 'cashelrie' ),
		'choices' => array(
			''           => esc_html__( 'No padding', 'cashelrie' ),
			'padding_10' => esc_html__( '10px', 'cashelrie' ),
			'padding_20' => esc_html__( '20px', 'cashelrie' ),
			'padding_30' => esc_html__( '30px', 'cashelrie' ),
			'padding_40' => esc_html__( '40px', 'cashelrie' ),
            'with_padding' => esc_html__( 'Theme style padding', 'cashelrie' ),
            'with_padding big-padding' => esc_html__( 'Theme style big padding', 'cashelrie' ),

		),
	),
	'background_color' => array(
		'type'    => 'select',
		'value'   => '',
		'label'   => esc_html__( 'Background color', 'cashelrie' ),
		'desc'    => esc_html__( 'Select background color', 'cashelrie' ),
		'help'    => esc_html__( 'Select one of predefined background colors', 'cashelrie' ),
		'choices' => array(
			''                      => esc_html__( 'Transparent (No Background)', 'cashelrie' ),
			'with_background'      => esc_html__( 'Muted', 'cashelrie' ),
			'ds'                    => esc_html__( 'Dark Grey', 'cashelrie' ),
			'ds ms'                 => esc_html__( 'Dark', 'cashelrie' ),
			'main_bg_color'         => esc_html__( 'Accent color 1', 'cashelrie' ),
			'main_bg_color2'        => esc_html__( 'Accent color 2', 'cashelrie' ),
		),
	),
	'column_border' => array(
		'type'    => 'select',
		'value'   => '',
		'label'   => esc_html__( 'Column border', 'cashelrie' ),
		'desc'    => esc_html__( 'Select optional border for column', 'cashelrie' ),
		'choices' => array(
			''                      => esc_html__( 'Transparent (No Background)', 'cashelrie' ),
			'with_background'       => esc_html__( 'No border', 'cashelrie' ),
			'with_border'           => esc_html__( 'With thin border', 'cashelrie' ),
			'with_border thick_border'  => esc_html__( 'With thick border', 'cashelrie' ),
		),
	),
	'background_image' => array(
		'label'   => esc_html__( 'Background Image', 'cashelrie' ),
		'desc'    => esc_html__( 'Select the background image', 'cashelrie' ),
		'type'    => 'background-image',
		'choices' => array(//	in future may will set predefined images
		)
	),
	'column_inner_box_custom_class'    => array(
		'type'  => 'text',
		'label' => esc_html__( 'Custom class', 'cashelrie' ),
		'desc'  => esc_html__( 'This class will be applied to the inner "div" of the column', 'cashelrie' ),
	),
	'column_animation' => array(
		'type'    => 'select',
		'value'   => '',
		'label'   => esc_html__( 'Animation type', 'cashelrie' ),
		'desc'    => esc_html__( 'Select one of predefined animations', 'cashelrie' ),
		'choices' => array(
			''               => esc_html__( 'None', 'cashelrie' ),
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
	'animation_delay'    => array(
		'type'  => 'text',
		'label' => esc_html__( 'Animation delay (milliseconds)', 'cashelrie' ),
		'desc'  => esc_html__( 'You can leave it empty, default values would be used', 'cashelrie' ),
	),
	'custom_column' => array(
		'type'    => 'multi-picker',
		'label'   => false,
		'desc'    => false,
		'picker'  => array(
			'custom' => array(
				'type'         => 'switch',
				'label'        => esc_html__( 'Custom column layout', 'cashelrie' ),
				'desc'        => esc_html__( 'Set your own column classes. It overrides other options. Use it only if you know what you doing', 'cashelrie' ),
				'left-choice'  => array(
					'value' => '',
					'label' => esc_html__( 'No', 'cashelrie' ),
				),
				'right-choice' => array(
					'value' => 'custom_cl',
					'label' => esc_html__( 'Yes', 'cashelrie' ),
				),
			),
		),
		'choices' => array(
			''       => array(),
			'custom_cl' => $custom_column_classes,
		),
        'show_borders' => true,
	)

);
