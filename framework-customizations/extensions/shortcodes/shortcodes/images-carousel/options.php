<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(

	'items'         => array(
		'type'            => 'addable-box',
		'value'           => '',
		'label'           => esc_html__( 'Carousel items', 'cashelrie' ),
		'box-options'     => array(
			'image' => array(
				'type'        => 'upload',
				'value'       => '',
				'label'       => esc_html__( 'Image', 'cashelrie' ),
				'images_only' => true,
			),
			'url'   => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Image link', 'cashelrie' ),
			),
			'title' => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Title and Alt text', 'cashelrie' ),
			),
			'class' => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Class for link element', 'cashelrie' ),
			),
		),
		'template'        => '{{=image.url}}',
		'limit'           => 0, // limit the number of boxes that can be added
		'add-button-text' => esc_html__( 'Add', 'cashelrie' ),
		'sortable'        => true,
	),
	'loop'          => array(
		'type'         => 'switch',
		'value'        => 'false',
		'label'        => esc_html__( 'Loop carousel', 'cashelrie' ),
		'left-choice'  => array(
			'value' => 'false',
			'label' => esc_html__( 'No', 'cashelrie' ),
		),
		'right-choice' => array(
			'value' => 'true',
			'label' => esc_html__( 'Yes', 'cashelrie' ),
		),
	),
	'nav'           => array(
		'type'         => 'switch',
		'value'        => 'false',
		'label'        => esc_html__( 'Show Arrows', 'cashelrie' ),
		'left-choice'  => array(
			'value' => 'false',
			'label' => esc_html__( 'No', 'cashelrie' ),
		),
		'right-choice' => array(
			'value' => 'true',
			'label' => esc_html__( 'Yes', 'cashelrie' ),
		),
	),
	'dots'          => array(
		'type'         => 'switch',
		'value'        => 'false',
		'label'        => esc_html__( 'Show Nav', 'cashelrie' ),
		'left-choice'  => array(
			'value' => 'false',
			'label' => esc_html__( 'No', 'cashelrie' ),
		),
		'right-choice' => array(
			'value' => 'true',
			'label' => esc_html__( 'Yes', 'cashelrie' ),
		),
	),
	'center'        => array(
		'type'         => 'switch',
		'value'        => 'false',
		'label'        => esc_html__( 'Center carousel', 'cashelrie' ),
		'left-choice'  => array(
			'value' => 'false',
			'label' => esc_html__( 'No', 'cashelrie' ),
		),
		'right-choice' => array(
			'value' => 'true',
			'label' => esc_html__( 'Yes', 'cashelrie' ),
		),
	),
	'autoplay'      => array(
		'type'         => 'switch',
		'value'        => 'false',
		'label'        => esc_html__( 'Autoplay', 'cashelrie' ),
		'left-choice'  => array(
			'value' => 'false',
			'label' => esc_html__( 'No', 'cashelrie' ),
		),
		'right-choice' => array(
			'value' => 'true',
			'label' => esc_html__( 'Yes', 'cashelrie' ),
		),
	),
	'responsive_xlg' => array(
		'type'        => 'select',
		'value'       => '4',
		'label'       => __( 'Items count on <1600px', 'cashelrie' ),
		'choices'     => array(
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
			'6' => '6',
			'7' => '7',
			'8' => '8',
			'9' => '9',

		),
		'no-validate' => false,
	),
	'responsive_lg' => array(
		'type'        => 'select',
		'value'       => '4',
		'label'       => __( 'Items count on <1200px', 'cashelrie' ),
		'choices'     => array(
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
			'6' => '6',
			'7' => '7',
			'8' => '8',
			'9' => '9',
		),
		'no-validate' => false,
	),
	'responsive_md' => array(
		'type'        => 'select',
		'value'       => '4',
		'label'       => __( 'Items count on 992px-1200px', 'cashelrie' ),
		'choices'     => array(
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
			'6' => '6',

		),
		'no-validate' => false,
	),
	'responsive_sm' => array(
		'type'        => 'select',
		'value'       => '3',
		'label'       => __( 'Items count on 768px-992px', 'cashelrie' ),
		'choices'     => array(
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
			'6' => '6',

		),
		'no-validate' => false,
	),
	'responsive_xs' => array(
		'type'        => 'select',
		'value'       => '2',
		'label'       => __( 'Items count on 500px-767px', 'cashelrie' ),
		'choices'     => array(
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
			'6' => '6',

		),
		'no-validate' => false,
	),
	'responsive_xxs' => array(
		'type'        => 'select',
		'value'       => '2',
		'label'       => __( 'Items count on < 500px', 'cashelrie' ),
		'choices'     => array(
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
			'6' => '6',

		),
		'no-validate' => false,
	),
	'margin'        => array(
		'type'        => 'select',
		'value'       => '30',
		'label'       => esc_html__( 'Margin between items', 'cashelrie' ),
		'choices'     => array(
			'30' => '30px',
			'0'  => '0px',
			'5'  => '5px',
			'10' => '10px',
			'15' => '15px',
			'20' => '20px',

		),
		'no-validate' => false,
	),

);