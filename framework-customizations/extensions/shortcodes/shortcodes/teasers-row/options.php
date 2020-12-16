<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
//get teaser to add in teasers row:
$teaser = fw_ext( 'shortcodes' )->get_shortcode( 'teaser' );

$options = array(

	'teaser_columns_width'   => array(
		'type'    => 'select',
		'label'   => esc_html__( 'Column width for teasers row', 'cashelrie' ),
		'value'   => 'col-sm-4',
		'desc'    => esc_html__( 'Choose teaser width inside teasers row', 'cashelrie' ),
		'choices' => array(
			'col-md-12' => esc_html__( '1/1', 'cashelrie' ),
			'col-md-6'  => esc_html__( '1/2', 'cashelrie' ),
			'col-md-4 col-sm-6'  => esc_html__( '1/3', 'cashelrie' ),
			'col-md-3 col-sm-6'  => esc_html__( '1/4', 'cashelrie' ),
		),
	),
	'teaser_columns_padding' => array(
		'type'    => 'select',
		'value'   => 'columns_padding_15',
		'label'   => esc_html__( 'Column paddings', 'cashelrie' ),
		'desc'    => esc_html__( 'Choose columns horizontal paddings value', 'cashelrie' ),
		'choices' => array(
			'columns_padding_0'  => esc_html__( '0', 'cashelrie' ),
			'columns_padding_1'  => esc_html__( '1 px', 'cashelrie' ),
			'columns_padding_2'  => esc_html__( '2 px', 'cashelrie' ),
			'columns_padding_5'  => esc_html__( '5 px', 'cashelrie' ),
			'columns_padding_15' => esc_html__( '15 px - default', 'cashelrie' ),
			'columns_padding_25' => esc_html__( '25 px', 'cashelrie' ),
		),
	),
	'teasers'                => array(
		'type'          => 'addable-popup',
		'label'         => esc_html__( 'Teasers in row', 'cashelrie' ),
		'popup-title'   => esc_html__( 'Add/Edit Teasers in tabs', 'cashelrie' ),
		'desc'          => esc_html__( 'Create your tabs', 'cashelrie' ),
		'template'      => '{{=title}}',
		'popup-options' => $teaser->get_options(),

	),

);