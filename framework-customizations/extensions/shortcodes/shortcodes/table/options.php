<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'table'      => array(
		'type'  => 'table',
		'label' => false,
		'desc'  => false,
	),
	'table_type' => array(
		'type'    => 'select',
		'value'   => 'table',
		'label'   => esc_html__( 'Tabular table style', 'cashelrie' ),
		'choices' => array(
			'table'                => esc_html__( 'Bootstrap Default', 'cashelrie' ),
			'table table-striped'  => esc_html__( 'Bootstrap Striped', 'cashelrie' ),
			'table table-bordered' => esc_html__( 'Bootstrap Bordered', 'cashelrie' ),
			'table_template'  => esc_html__( 'Theme style', 'cashelrie' ),

		),
	),
);