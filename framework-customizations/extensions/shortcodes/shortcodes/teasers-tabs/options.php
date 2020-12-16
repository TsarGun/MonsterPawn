<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$teaser = fw_ext( 'shortcodes' )->get_shortcode( 'teaser' );

$options = array(
	'tabs'       => array(
		'type'          => 'addable-popup',
		'label'         => esc_html__( 'Tabs', 'cashelrie' ),
		'popup-title'   => esc_html__( 'Add/Edit Tabs', 'cashelrie' ),
		'desc'          => esc_html__( 'Create your tabs', 'cashelrie' ),
		'template'      => '{{=tab_title}}',
		'popup-options' => array(
			'tab_title'           => array(
				'type'  => 'text',
				'label' => esc_html__( 'Title', 'cashelrie' )
			),
			'tab_columns_width'   => array(
				'type'    => 'select',
				'label'   => esc_html__( 'Column width in tab content', 'cashelrie' ),
				'value'   => 'col-sm-4',
				'desc'    => esc_html__( 'Choose teaser width inside tab content', 'cashelrie' ),
				'choices' => array(
					'col-sm-12' => esc_html__( '1/1', 'cashelrie' ),
					'col-sm-6'  => esc_html__( '1/2', 'cashelrie' ),
					'col-sm-4'  => esc_html__( '1/3', 'cashelrie' ),
					'col-sm-3'  => esc_html__( '1/4', 'cashelrie' ),
				),
			),
			'tab_columns_padding' => array(
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
			'tab_teasers'         => array(
				'type'          => 'addable-popup',
				'label'         => esc_html__( 'Teasers in tabs', 'cashelrie' ),
				'popup-title'   => esc_html__( 'Add/Edit Teasers in tabs', 'cashelrie' ),
				'desc'          => esc_html__( 'Create your teasers in tabs', 'cashelrie' ),
				'template'      => '{{=title}}',
				'popup-options' => $teaser->get_options(),

			),
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
);