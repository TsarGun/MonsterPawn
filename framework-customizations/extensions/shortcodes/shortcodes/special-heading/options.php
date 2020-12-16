<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'heading_align' => array(
		'type'    => 'select',
		'value'   => '',
		'label'   => esc_html__( 'Text alignment', 'cashelrie' ),
		'desc'    => esc_html__( 'Select heading text alignment', 'cashelrie' ),
		'choices' => array(
			''   => esc_html__( 'Left', 'cashelrie' ),
			'text-center' => esc_html__( 'Center', 'cashelrie' ),
			'text-right'  => esc_html__( 'Right', 'cashelrie' ),
		),
	),
	'heading_number'         => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__( 'Heading number', 'cashelrie' ),
		'desc'  => esc_html__( 'Number that appear in heading. You can leave it empty', 'cashelrie' ),
	),
	'headings'      => array(
		'type'        => 'addable-box',
		'value'       => '',
		'label'       => esc_html__( 'Headings', 'cashelrie' ),
		'desc'        => esc_html__( 'Choose a tag and text inside it', 'cashelrie' ),
		'box-options' => array(
			'heading_tag'            => array(
				'type'    => 'select',
				'value'   => 'h3',
				'label'   => esc_html__( 'Heading tag', 'cashelrie' ),
				'desc'    => esc_html__( 'Select a tag for your ', 'cashelrie' ),
				'choices' => array(
					'h2' => esc_html__( 'H2 tag', 'cashelrie' ),
					'h3' => esc_html__( 'H3 tag', 'cashelrie' ),
					'h4' => esc_html__( 'H4 tag', 'cashelrie' ),
					'h5' => esc_html__( 'H5 tag', 'cashelrie' ),
					'p'  => esc_html__( 'P tag', 'cashelrie' ),
				),
			),
			'heading_text'           => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Heading text', 'cashelrie' ),
				'desc'  => esc_html__( 'Text to appear in slide layer', 'cashelrie' ),
			),
			'heading_text_color'     => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Heading text color', 'cashelrie' ),
				'desc'    => esc_html__( 'Select a color for your text in layer', 'cashelrie' ),
				'choices' => array(
					''           => esc_html__( 'Inherited', 'cashelrie' ),
					'highlight'  => esc_html__( 'Accent Color1', 'cashelrie' ),
					'highlight2' => esc_html__( 'Accent Color2', 'cashelrie' ),
					'grey'       => esc_html__( 'Dark grey theme color', 'cashelrie' ),
					'black'      => esc_html__( 'Dark theme color', 'cashelrie' ),
				),
			),
			'heading_text_weight'    => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Heading text weight', 'cashelrie' ),
				'desc'    => esc_html__( 'Select a weight for your text in layer', 'cashelrie' ),
				'choices' => array(
					''     => esc_html__( 'Normal', 'cashelrie' ),
					'bold' => esc_html__( 'Bold', 'cashelrie' ),
					'thin' => esc_html__( 'Thin', 'cashelrie' ),

				),
			),
			'heading_text_transform' => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Heading text transform', 'cashelrie' ),
				'desc'    => esc_html__( 'Select a weight for your text in layer', 'cashelrie' ),
				'choices' => array(
					''                => esc_html__( 'None', 'cashelrie' ),
					'text-lowercase'  => esc_html__( 'Lowercase', 'cashelrie' ),
					'text-uppercase'  => esc_html__( 'Uppercase', 'cashelrie' ),
					'text-capitalize' => esc_html__( 'Capitalize', 'cashelrie' ),

				),
			),
		),
		'template'    => '{{- heading_text }}',
	)
);
