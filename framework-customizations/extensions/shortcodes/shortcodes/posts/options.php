<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'number'        => array(
		'type'       => 'text',
		'value'      => '6',
		'label'      => esc_html__( 'Items number', 'cashelrie' ),
		'desc'       => esc_html__( 'Number of members to display', 'cashelrie' ),
	),
	'margin'        => array(
		'label'   => esc_html__( 'Horizontal item margin (px)', 'cashelrie' ),
		'desc'    => esc_html__( 'Select horizontal item margin', 'cashelrie' ),
		'value'   => '30',
		'type'    => 'select',
		'choices' => array(
			'0'  => esc_html__( '0', 'cashelrie' ),
			'1'  => esc_html__( '1px', 'cashelrie' ),
			'2'  => esc_html__( '2px', 'cashelrie' ),
			'10' => esc_html__( '10px', 'cashelrie' ),
			'30' => esc_html__( '30px', 'cashelrie' ),
		)
	),
	'layout'        => array(
		'label'   => esc_html__( 'Post Layout', 'cashelrie' ),
		'desc'    => esc_html__( 'Choose post layout', 'cashelrie' ),
		'value'   => 'carousel',
		'type'    => 'select',
		'choices' => array(
			'carousel' => esc_html__( 'Carousel', 'cashelrie' ),
			'isotope'  => esc_html__( 'Masonry Grid', 'cashelrie' ),
			'grid'     => esc_html__( 'Grid', 'cashelrie' ),
		)
	),
	'item_layout'   => array(
		'label'   => esc_html__( 'Item layout', 'cashelrie' ),
		'desc'    => esc_html__( 'Choose Item layout', 'cashelrie' ),
		'value'   => 'item-regular',
		'type'    => 'select',
		'choices' => array(
			'item-square'    => esc_html__( 'Square item', 'cashelrie' ),
			'item-vertical'   => esc_html__( 'Vertical item', 'cashelrie' ),
			'item-horizontal' => esc_html__( 'Horizontal item', 'cashelrie' ),
		)
	),
	'responsive_lg' => array(
		'label'   => esc_html__( 'Columns on large screens', 'cashelrie' ),
		'desc'    => __( 'Select items number on wide screens (>1200px)', 'cashelrie' ),
		'value'   => '4',
		'type'    => 'select',
		'choices' => array(
			'1' => esc_html__( '1', 'cashelrie' ),
			'2' => esc_html__( '2', 'cashelrie' ),
			'3' => esc_html__( '3', 'cashelrie' ),
			'4' => esc_html__( '4', 'cashelrie' ),
			'6' => esc_html__( '6', 'cashelrie' ),
		)
	),
	'responsive_md' => array(
		'label'   => esc_html__( 'Columns on middle screens', 'cashelrie' ),
		'desc'    => __( 'Select items number on middle screens (>992px)', 'cashelrie' ),
		'value'   => '3',
		'type'    => 'select',
		'choices' => array(
			'1' => esc_html__( '1', 'cashelrie' ),
			'2' => esc_html__( '2', 'cashelrie' ),
			'3' => esc_html__( '3', 'cashelrie' ),
			'4' => esc_html__( '4', 'cashelrie' ),
			'6' => esc_html__( '6', 'cashelrie' ),
		)
	),
	'responsive_sm' => array(
		'label'   => esc_html__( 'Columns on small screens', 'cashelrie' ),
		'desc'    => __( 'Select items number on small screens (>768px)', 'cashelrie' ),
		'value'   => '2',
		'type'    => 'select',
		'choices' => array(
			'1' => esc_html__( '1', 'cashelrie' ),
			'2' => esc_html__( '2', 'cashelrie' ),
			'3' => esc_html__( '3', 'cashelrie' ),
			'4' => esc_html__( '4', 'cashelrie' ),
			'6' => esc_html__( '6', 'cashelrie' ),
		)
	),
	'responsive_xs' => array(
		'label'   => esc_html__( 'Columns on extra small screens', 'cashelrie' ),
		'desc'    => esc_html__( 'Select items number on extra small screens (<767px)', 'cashelrie' ),
		'value'   => '1',
		'type'    => 'select',
		'choices' => array(
			'1' => esc_html__( '1', 'cashelrie' ),
			'2' => esc_html__( '2', 'cashelrie' ),
			'3' => esc_html__( '3', 'cashelrie' ),
			'4' => esc_html__( '4', 'cashelrie' ),
			'6' => esc_html__( '6', 'cashelrie' ),
		)
	),
	'show_filters'  => array(
		'type'         => 'switch',
		'value'        => false,
		'label'        => esc_html__( 'Show filters', 'cashelrie' ),
		'desc'         => esc_html__( 'Hide or show categories filters', 'cashelrie' ),
		'left-choice'  => array(
			'value' => false,
			'label' => esc_html__( 'No', 'cashelrie' ),
		),
		'right-choice' => array(
			'value' => true,
			'label' => esc_html__( 'Yes', 'cashelrie' ),
		),
	),
	'cat' => array(
		'type'  => 'multi-select',
		'label' => esc_html__('Select categories', 'cashelrie'),
		'desc'  => esc_html__('You can select one or more categories', 'cashelrie'),
		'population' => 'taxonomy',
		'source' => 'category',
		'prepopulate' => 10,
		'limit' => 100,
	)
);