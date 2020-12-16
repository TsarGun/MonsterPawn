<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$portfolio = fw()->extensions->get( 'portfolio' );
if ( empty( $portfolio ) ) {
	return;
}

$options = array(
	'layout'        => array(
		'label'   => esc_html__( 'Portfolio Layout', 'cashelrie' ),
		'desc'    => esc_html__( 'Choose projects layout', 'cashelrie' ),
		'value'   => 'isotope',
		'type'    => 'select',
		'choices' => array(
			'carousel' => esc_html__( 'Carousel', 'cashelrie' ),
			'isotope'  => esc_html__( 'Masonry Grid', 'cashelrie' ),
			'tile'  => esc_html__( 'Tile Grid', 'cashelrie' ),
		)
	),
	'item_layout'   => array(
		'label'   => esc_html__( 'Item layout', 'cashelrie' ),
		'desc'    => esc_html__( 'Choose Item layout', 'cashelrie' ),
		'value'   => 'item-regular',
		'type'    => 'select',
		'choices' => array(
			'item-regular'  => esc_html__( 'Image with hovering title', 'cashelrie' ),
			'item-title'    => esc_html__( 'Image with title', 'cashelrie' ),
			'item-extended' => esc_html__( 'Image with title and excerpt', 'cashelrie' ),
		)
	),
	'number'        => array(
		'type'       => 'text',
		'value'      => '6',
		'label'      => esc_html__( 'Items number', 'cashelrie' ),
		'desc'       => esc_html__( 'Number of portfolio projects tu display', 'cashelrie' ),
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
	'responsive_lg' => array(
		'label'   => esc_html__( 'Columns on wide screens', 'cashelrie' ),
		'desc'    => esc_html__( 'Select items number on wide screens (>=1200px)', 'cashelrie' ),
		'value'   => '4',
		'type'    => 'select',
		'choices' => array(
			'1' => esc_html__( '1', 'cashelrie' ),
			'2' => esc_html__( '2', 'cashelrie' ),
			'3' => esc_html__( '3', 'cashelrie' ),
			'4' => esc_html__( '4', 'cashelrie' ),
			'5' => esc_html__( '5', 'cashelrie' ),
			'6' => esc_html__( '6', 'cashelrie' ),
		)
	),
	'responsive_md' => array(
		'label'   => esc_html__( 'Columns on middle screens', 'cashelrie' ),
		'desc'    => esc_html__( 'Select items number on middle screens (>=992px)', 'cashelrie' ),
		'value'   => '3',
		'type'    => 'select',
		'choices' => array(
			'1' => esc_html__( '1', 'cashelrie' ),
			'2' => esc_html__( '2', 'cashelrie' ),
			'3' => esc_html__( '3', 'cashelrie' ),
			'4' => esc_html__( '4', 'cashelrie' ),
			'5' => esc_html__( '5', 'cashelrie' ),
			'6' => esc_html__( '6', 'cashelrie' ),
		)
	),
	'responsive_sm' => array(
		'label'   => esc_html__( 'Columns on small screens', 'cashelrie' ),
		'desc'    => esc_html__( 'Select items number on small screens (>=768px)', 'cashelrie' ),
		'value'   => '2',
		'type'    => 'select',
		'choices' => array(
			'1' => esc_html__( '1', 'cashelrie' ),
			'2' => esc_html__( '2', 'cashelrie' ),
			'3' => esc_html__( '3', 'cashelrie' ),
			'4' => esc_html__( '4', 'cashelrie' ),
			'5' => esc_html__( '5', 'cashelrie' ),
		)
	),
	'responsive_xs' => array(
		'label'   => esc_html__( 'Columns on extra small screens', 'cashelrie' ),
		'desc'    => esc_html__( 'Select items number on extra small screens (>=500px)', 'cashelrie' ),
		'value'   => '1',
		'type'    => 'select',
		'choices' => array(
			'1' => esc_html__( '1', 'cashelrie' ),
			'2' => esc_html__( '2', 'cashelrie' ),
			'3' => esc_html__( '3', 'cashelrie' ),
			'4' => esc_html__( '4', 'cashelrie' ),
		)
	),
	'responsive_xxs' => array(
		'label'   => esc_html__( 'Columns on extra small screens', 'cashelrie' ),
		'desc'    => esc_html__( 'Select items number on extra small screens (<500px)', 'cashelrie' ),
		'value'   => '1',
		'type'    => 'select',
		'choices' => array(
			'1' => esc_html__( '1', 'cashelrie' ),
			'2' => esc_html__( '2', 'cashelrie' ),
			'3' => esc_html__( '3', 'cashelrie' ),
			'4' => esc_html__( '4', 'cashelrie' ),
		)
	),
	'show_filters'  => array(
		'type'         => 'switch',
		'value'        => '',
		'label'        => esc_html__( 'Show filters', 'cashelrie' ),
		'desc'         => esc_html__( 'Hide or show categories filters', 'cashelrie' ),
		'left-choice'  => array(
			'value' => '',
			'label' => esc_html__( 'No', 'cashelrie' ),
		),
		'right-choice' => array(
			'value' => 'true',
			'label' => esc_html__( 'Yes', 'cashelrie' ),
		),
	),
);