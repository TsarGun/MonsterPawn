<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(

	'layout' => array(
		'type'    => 'select',
		'value'   => 'owlcarousel',
		'label'   => esc_html__( 'Testimonials Layout', 'cashelrie' ),
		'desc'    => esc_html__( 'Select one of predefined testimonials layout', 'cashelrie' ),
		'choices' => array(
			'owlcarousel'  => esc_html__( 'Owl Carousel', 'cashelrie' ),
			'isotope' => esc_html__( 'Isotope Layout', 'cashelrie' ),
		),
	),
	'responsive_lg' => array(
		'type'        => 'select',
		'value'       => '3',
		'label'       => __( 'Items count on <1200px', 'cashelrie' ),
		'choices'     => array(
			'4' => '4',
			'3' => '3',
			'2' => '2',
			'1' => '1',
		),
		'no-validate' => false,
	),
	'responsive_md' => array(
		'type'        => 'select',
		'value'       => '2',
		'label'       => __( 'Items count on 992px-1200px', 'cashelrie' ),
		'choices'     => array(
			'4' => '4',
			'3' => '3',
			'2' => '2',
			'1' => '1',
		),
		'no-validate' => false,
	),
	'responsive_sm' => array(
		'type'        => 'select',
		'value'       => '2',
		'label'       => __( 'Items count on 768px-992px', 'cashelrie' ),
		'choices'     => array(
			'3' => '3',
			'2' => '2',
			'1' => '1',

		),
		'no-validate' => false,
	),
	'responsive_xs' => array(
		'type'        => 'select',
		'value'       => '1',
		'label'       => __( 'Items count on >768px', 'cashelrie' ),
		'choices'     => array(
			'2' => '2',
			'1' => '1',
		),
		'no-validate' => false,
	),

	'testimonials'        => array(
		'label'         => esc_html__( 'Testimonials', 'cashelrie' ),
		'popup-title'   => esc_html__( 'Add/Edit Testimonial', 'cashelrie' ),
		'desc'          => esc_html__( 'Here you can add, remove and edit your Testimonials.', 'cashelrie' ),
		'type'          => 'addable-popup',
		'template'      => '{{=review_name}}',
		'popup-options' => array(
			'review_rating'       => array(
				'type'       => 'slider',
			    'label'      => esc_html__( 'Review star rating in %', 'cashelrie' ),
				'value'      => 80,
				'properties' => array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
				),
			),
			'review_content'       => array(
				'label' => esc_html__( 'Quote', 'cashelrie' ),
				'desc'  => esc_html__( 'Enter the testimonial here', 'cashelrie' ),
				'type'  => 'textarea',
			),
			'review_avatar' => array(
				'type'  => 'upload',
				'label' => esc_html__( 'Choose avatar image', 'cashelrie' ),
			),
			'review_name'   => array(
				'label' => esc_html__( 'Review author name', 'cashelrie' ),
				'desc'  => esc_html__( 'Enter the Name of the Person to quote', 'cashelrie' ),
				'type'  => 'text'
			),
			'review_position'   => array(
				'label' => esc_html__( 'Review author position', 'cashelrie' ),
				'desc'  => esc_html__( 'Enter the Position of the Person to quote', 'cashelrie' ),
				'type'  => 'text'
			),
		)
	)
);