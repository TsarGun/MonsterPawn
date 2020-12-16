<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'url'    => array(
		'type'  => 'text',
		'label' => esc_html__( 'Insert Video URL', 'cashelrie' ),
		'desc'  => esc_html__( 'Insert Video URL to embed this video', 'cashelrie' )
	),
	'video_sizes' => array(
		'type'         => 'multi-picker',
		'label'        => false,
		'desc'         => false,
		'picker'       => array(
			'video_size' => array(
				'type'    => 'select',
				'value'   => 'embed-responsive-3by2',
				'label'   => esc_html__( 'Video Size', 'cashelrie' ),
				'choices' => array(
					'embed-responsive-16by9'          => esc_html__( 'Responsive 16 by 9', 'cashelrie' ),
					'embed-responsive-4by3'         => esc_html__( 'Responsive 4 by 3', 'cashelrie' ),
					'embed-responsive-3by2' => esc_html__( 'Responsive 3 by 2', 'cashelrie' ),
					'custom'  => esc_html__( 'Custom sizes', 'cashelrie' ),
				),
			),
		),
		'choices'      => array(
			'embed-responsive-16by9'   => array(),
			'embed-responsive-4by3'    => array(),
			'embed-responsive-3by2'    => array(),
			'custom'                   => array(
				'width'  => array(
					'type'  => 'text',
					'label' => esc_html__( 'Video Width', 'cashelrie' ),
					'desc'  => esc_html__( 'Enter a value for the width', 'cashelrie' ),

				),
				'height' => array(
					'type'  => 'text',
					'label' => esc_html__( 'Video Height', 'cashelrie' ),
					'desc'  => esc_html__( 'Enter a value for the height', 'cashelrie' ),

				)
			),
		),
		'show_borders' => true,
	),
	'cover_image'            => array(
		'type'  => 'upload',
		'label' => esc_html__( 'Choose Cover Image', 'cashelrie' ),
		'desc'  => esc_html__( 'Only for responsive video sizes', 'cashelrie' )
	),
);
