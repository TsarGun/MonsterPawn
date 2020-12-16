<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

//custom template parts

//header that already chosen in customizer
$header_from_customizer = '1';
if ( function_exists( 'fw_get_db_customizer_option' ) ) {
	$header_from_customizer = fw_get_db_customizer_option( 'header' )['header_var'];
//	fw_print( $header_from_customizer );
	if ( empty ( $header_from_customizer ) ) {
		$header_from_customizer = '1';
	}
} else {
	$header_from_customizer = '1';
}


$options = array(
	'page-options-section' => array(
		'title'   => esc_html__( 'Featured Additional Options', 'cashelrie' ),
		'type'    => 'box',
		'context' => 'normal',
		'options' => array(
			'hide_breadcrumbs' => array(
				'type'  => 'switch',
				'value' => false,
				'label' => esc_html__('Hide Title section', 'cashelrie'),
				'desc'  => esc_html__('You can hide title section with breadcrumbs', 'cashelrie'),
				'left-choice' => array(
					'value' => false,
					'label' => esc_html__('Show', 'cashelrie'),
				),
				'right-choice' => array(
					'value' => true,
					'label' => esc_html__('Hide', 'cashelrie'),
				),
			),

			'header'       => array(
				'type'    => 'image-picker',
				'value'   => '',
				'attr'    => array(
					'class'    => 'header-thumbnail',
					'data-foo' => 'header',
				),
				'label'   => esc_html__( 'Template Header', 'cashelrie' ),
				'desc'    => esc_html__( 'Select one of predefined theme headers for this page', 'cashelrie' ),
				'help'    => esc_html__( 'You can override chosen header from customizer here', 'cashelrie' ),
				'choices' => array(
					'' => CASHELRIE_THEME_URI . '/img/theme-options/header0.png',
					'1' => CASHELRIE_THEME_URI . '/img/theme-options/header1.png',
					'2' => CASHELRIE_THEME_URI . '/img/theme-options/header2.png',
					'3' => CASHELRIE_THEME_URI . '/img/theme-options/header3.png',
					'4' => CASHELRIE_THEME_URI . '/img/theme-options/header4.png',
					'5' => CASHELRIE_THEME_URI . '/img/theme-options/header5.png',
					'10' => CASHELRIE_THEME_URI . '/img/theme-options/header10.png',
					'21' => CASHELRIE_THEME_URI . '/img/theme-options/header21.png',
					'22' => CASHELRIE_THEME_URI . '/img/theme-options/header22.png',
					'23' => CASHELRIE_THEME_URI . '/img/theme-options/header23.png',
					'24' => CASHELRIE_THEME_URI . '/img/theme-options/header24.png',
				),
				'blank'   => false, // (optional) if true, image can be deselected
			),
		),
	),

);


//page slider
$slider_extension = fw()->extensions->get( 'slider' );
//returning if no slider - only options for page is slider options
if ( empty ( $slider_extension ) ) {
	return;
}

$choices = '';
if ( ! empty ( $slider_extension ) ) {
	$choices = $slider_extension->get_populated_sliders_choices();
}

if ( ! empty( $choices ) ) {
	//adding empty value to disable slider
	$choices['0'] = esc_html__( 'No Slider', 'cashelrie' );

	array_push( $options['page-options-section']['options'], array(
			'slider_id' => array(
				'type'    => 'select',
				'value'   => '0',
				'label'   => esc_html__( 'Select Slider', 'cashelrie' ),
				'choices' => $choices
			),
		)
	);
} else {
	array_push( $options['page-options-section']['options'], array(
			'slider_id' => array( // make sure it exists to prevent notices when try to get ['slider_id'] somewhere in the code
				'type' => 'hidden',
			),
			'no-forms'  => array(
				'type'  => 'html-full',
				'label' => false,
				'desc'  => false,
				'html'  =>
					'<div>' .
					'<h1 style="font-weight:100; text-align:center;">' . esc_html__( 'No Sliders Available', 'cashelrie' ) . '</h1>' .
					'<p style="text-align:center">' .
					'<em>' .
					str_replace(
						array(
							'{br}',
							'{add_slider_link}'
						),
						array(
							'<br/>',
							fw_html_tag( 'a', array(
								'href'   => admin_url( 'post-new.php?post_type=' . fw()->extensions->get( 'slider' )->get_post_type() ),
								'target' => '_blank',
							), esc_html__( 'create a new Slider', 'cashelrie' ) )
						),
						esc_html__( 'No Sliders created yet. Please go to the {br}Sliders page and {add_slider_link}.', 'cashelrie' )
					) .
					'</em>' .
					'</p>' .
					'</div>'
			)
		)
	);
}
