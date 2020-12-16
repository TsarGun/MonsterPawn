<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * Framework options
 *
 * @var array $options Fill this array with options to generate framework settings form in WordPress customizer
 */

//find fw_ext
$shortcodes_extension = fw()->extensions->get( 'shortcodes' );
$header_social_icons  = array();
if ( ! empty( $shortcodes_extension ) ) {
	$header_social_icons = $shortcodes_extension->get_shortcode( 'icons_social' )->get_options();
}

$slider_extension = fw()->extensions->get( 'slider' );
$choices = '';
if ( ! empty ( $slider_extension ) ) {
	$choices = $slider_extension->get_populated_sliders_choices();
}

//adding empty value to disable slider
$choices['0'] = esc_html__( 'No Slider', 'cashelrie' );

//$icon = fw_ext( 'shortcodes' )->get_shortcode( 'icon' ) -> get_options();

//header options

$header_teasers_common = array(
	'topline_combined_teasers' => array(
		'type'  => 'addable-box',
		'label' => esc_html__('Top line teasers', 'cashelrie'),
		'desc'  => esc_html__('Chose icon and enter teaser text', 'cashelrie'),
		'template'    => '{{=teaser_text}}',
		'box-options' => array(
			'teaser_icon' => array(
				'type' => 'icon-v2',
				'label' => esc_html__( 'Icon', 'cashelrie' ),
			),
			'teaser_text' => array(
				'type' => 'text',
				'label' => esc_html__( 'Teaser text' , 'cashelrie' ),
			),
			'teaser_text_link' => array(
				'type' => 'text',
				'label' => esc_html__( 'Teaser link' , 'cashelrie' ),
			),
		),
	),
);

$header1_options = array(
	'toplogo_left_teaser' => array(
		'type'  => 'popup',
		'label' => esc_html__('Top logo left teaser', 'cashelrie'),
		'desc'  => esc_html__('Chose icon and enter teaser text', 'cashelrie'),
		'popup-options' => array(
			'teaser_icon' => array(
				'type' => 'icon-v2',
				'label' => esc_html__( 'Icon', 'cashelrie' ),
			),
			'teaser_top_text' => array(
				'type' => 'text',
				'label' => esc_html__( 'Teaser first line text' , 'cashelrie' ),
			),
			'teaser_top_text_link' => array(
				'type' => 'text',
				'label' => esc_html__( 'Teaser first line link' , 'cashelrie' ),
			),
			'teaser_bottom_text' => array(
				'type' => 'text',
				'label' => esc_html__( 'Teaser second line text' , 'cashelrie' ),
			),
			'teaser_bottom_text_link' => array(
				'type' => 'text',
				'label' => esc_html__( 'Teaser second line link' , 'cashelrie' ),
			),
		),
	),
	'toplogo_right_teaser' => array(
		'type'  => 'popup',
		'label' => esc_html__('Top logo right teaser', 'cashelrie'),
		'desc'  => esc_html__('Chose icon and enter teaser text', 'cashelrie'),
		'popup-options' => array(
			'teaser_icon' => array(
				'type' => 'icon-v2',
				'label' => esc_html__( 'Icon', 'cashelrie' ),
			),
			'teaser_top_text' => array(
				'type' => 'text',
				'label' => esc_html__( 'Teaser first line text' , 'cashelrie' ),
			),
			'teaser_top_text_link' => array(
				'type' => 'text',
				'label' => esc_html__( 'Teaser first line link' , 'cashelrie' ),
			),
			'teaser_bottom_text' => array(
				'type' => 'text',
				'label' => esc_html__( 'Teaser second line text' , 'cashelrie' ),
			),
			'teaser_bottom_text_link' => array(
				'type' => 'text',
				'label' => esc_html__( 'Teaser second line link' , 'cashelrie' ),
			),
		),
	),
	'header_right_teaser' => array(
		'type'  => 'popup',
		'label' => esc_html__('Header right teaser', 'cashelrie'),
		'desc'  => esc_html__('Visible in affix position.', 'cashelrie'),
		'popup-options' => array(
			'teaser_text' => array(
				'type' => 'text',
				'label' => esc_html__( 'Teaser text' , 'cashelrie' ),
			),
			'teaser_text_link' => array(
				'type' => 'text',
				'label' => esc_html__( 'Teaser link' , 'cashelrie' ),
			),
		),
	),
);

$header_button = array(
	'header_button_label' => array(
		'type'  => 'text',
		'value' => esc_html__( 'Donate us now!', 'cashelrie' ),
		'label' => esc_html__( 'Top line button label', 'cashelrie' ),
	),
	'header_button_link' => array(
		'type'  => 'text',
		'value' => esc_url( '/index.php/appointment' ),
		'label' => esc_html__( 'Top line button link', 'cashelrie' ),
	)
);

$options = array(
	'logo_section'    => array(
		'title'   => esc_html__( 'Site Logo', 'cashelrie' ),
		'options' => array(
			'logo_image'             => array(
				'type'        => 'upload',
				'value'       => array(),
				'attr'        => array( 'class' => 'logo_image-class', 'data-logo_image' => 'logo_image' ),
				'label'       => esc_html__( 'Main logo image that appears in header', 'cashelrie' ),
				'desc'        => esc_html__( 'Select your logo', 'cashelrie' ),
				'help'        => esc_html__( 'Choose image to display as a site logo', 'cashelrie' ),
				'images_only' => true,
				'files_ext'   => array( 'png', 'jpg', 'jpeg', 'gif' ),
			),
			'logo_text'              => array(
				'type'  => 'text',
				'value' => 'Cashelrie',
				'attr'  => array( 'class' => 'logo_text-class', 'data-logo_text' => 'logo_text' ),
				'label' => esc_html__( 'Logo Text', 'cashelrie' ),
				'desc'  => esc_html__( 'Text that appears near logo image', 'cashelrie' ),
				'help'  => esc_html__( 'Type your text to show it in logo', 'cashelrie' ),
			),
			'footer_logo_image'             => array(
				'type'        => 'upload',
				'value'       => array(),
				'attr'        => array( 'class' => 'logo_image-class', 'data-logo_image' => 'logo_image' ),
				'label'       => esc_html__( 'Logo image that appears in footer', 'cashelrie' ),
				'desc'        => esc_html__( 'Select your logo', 'cashelrie' ),
				'help'        => esc_html__( 'Choose image to display as a site logo in footer section. If not set main logo image used', 'cashelrie' ),
				'images_only' => true,
				'files_ext'   => array( 'png', 'jpg', 'jpeg', 'gif' ),
			),
		),
	),
	'layout'          => array(
		'title'   => esc_html__( 'Theme Layout', 'cashelrie' ),
		'options' => array(
			'layout' => array(
				'type'    => 'multi-picker',
				'value'   => 'wide',
				'attr'    => array( 'class' => 'theme-layout-class', 'data-theme-layout' => 'layout' ),
				'label'   => esc_html__( 'Theme layout', 'cashelrie' ),
				'desc'    => esc_html__( 'Wide or Boxed layout', 'cashelrie' ),
				'picker'  => array(
					'boxed' => array(
						'type'         => 'switch',
						'value'        => '',
						'label'        => false,
						'desc'         => false,
						'left-choice'  => array(
							'value' => '',
							'label' => esc_html__( 'Wide', 'cashelrie' ),
						),
						'right-choice' => array(
							'value' => 'boxed_options',
							'label' => esc_html__( 'Boxed', 'cashelrie' ),
						),
					),
				),
				'choices' => array(
					'boxed_options' => array(
						'body_background_image' => array(
							'type'        => 'upload',
							'value'       => '',
							'label'       => esc_html__( 'Body background image', 'cashelrie' ),
							'help'        => esc_html__( 'Choose body background image if needed.', 'cashelrie' ),
							'images_only' => true,
						),
						'body_cover'            => array(
							'type'         => 'switch',
							'value'        => '',
							'label'        => esc_html__( 'Parallax background', 'cashelrie' ),
							'desc'         => esc_html__( 'Enable full width background for body', 'cashelrie' ),
							'left-choice'  => array(
								'value' => '',
								'label' => esc_html__( 'No', 'cashelrie' ),
							),
							'right-choice' => array(
								'value' => 'yes',
								'label' => esc_html__( 'Yes', 'cashelrie' ),
							),
						),
					),
				),

			),
		),
	),
	'blog_posts' => array(
		'title'   => esc_html__( 'Theme Blog', 'cashelrie' ),
		'options' => array(
			'blog_slider_switch' => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
					'blog_slider_enabled' => array(
						'type'         => 'switch',
						'value'        => '',
						'label'        => esc_html__( 'Post slider', 'cashelrie' ),
						'desc'         => esc_html__( 'Enable slider on blog page', 'cashelrie' ),
						'left-choice'  => array(
							'value' => '',
							'label' => esc_html__( 'No', 'cashelrie' ),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__( 'Yes', 'cashelrie' ),
						),
					),
				),
				'choices' => array(
					'yes' => array(
						'slider_id' => array(
							'type'    => 'select',
							'value'   => '',
							'label'   => esc_html__( 'Select Slider', 'cashelrie' ),
							'choices' => $choices
						),
					),
				),
			),

			'posts_side_image' => array(
				'type'         => 'switch',
				'value'        => 'post-layout-standard',
				'label'        => esc_html__( 'Side Image Layout', 'cashelrie' ),
				'desc'         => esc_html__( 'Enable blog post layout with side image', 'cashelrie' ),
				'left-choice'  => array(
					'value' => 'post-layout-standard',
					'label' => esc_html__( 'No', 'cashelrie' ),
				),
				'right-choice' => array(
					'value' => 'post-layout-side',
					'label' => esc_html__( 'Yes', 'cashelrie' ),
				),
			),
		)
	),

	'headers'     => array(
		'title'   => esc_html__( 'Theme Header', 'cashelrie' ),
		'options' => array(
			'header' => array(
				'type'         => 'multi-picker',
				'label'        => false,
				'desc'         => false,
				'picker'       => array(
					'header_var' => array(
						'type'    => 'image-picker',
						'value'   => '2',
						'attr'    => array(
							'class'    => 'header-thumbnail',
							'data-foo' => 'header',
						),
						'label'   => esc_html__( 'Template Header', 'cashelrie' ),
						'desc'    => esc_html__( 'Select one of predefined theme headers', 'cashelrie' ),
						'help'    => esc_html__( 'You can select one of predefined theme headers', 'cashelrie' ),
						'choices' => array(
							'1' => CASHELRIE_THEME_URI . '/img/theme-options/header1.png',
							'2' => CASHELRIE_THEME_URI . '/img/theme-options/header2.png',
							'3' => CASHELRIE_THEME_URI . '/img/theme-options/header3.png',
							'4' => CASHELRIE_THEME_URI . '/img/theme-options/header4.png',
							'10' => CASHELRIE_THEME_URI . '/img/theme-options/header10.png',
							'21' => CASHELRIE_THEME_URI . '/img/theme-options/header21.png',
							'22' => CASHELRIE_THEME_URI . '/img/theme-options/header22.png',
							'23' => CASHELRIE_THEME_URI . '/img/theme-options/header23.png',
							'24' => CASHELRIE_THEME_URI . '/img/theme-options/header24.png',
						),
						'blank'   => false, // (optional) if true, image can be deselected
					),
				),
				'choices'      => array(
					'1'     => $header1_options,
					'2'     => $header_teasers_common,
					'3'     => array(),
					'4'     => $header_teasers_common,
					'10'     => $header_teasers_common,
					'21'     => $header_teasers_common,
					'22'     => $header_teasers_common,
					'23'     => $header_teasers_common,
					'24'     => $header_teasers_common,
				),
				'show_borders' => true,
			),

			$header_social_icons,
		),
	),
	'breadcrumbs'     => array(
		'title'   => esc_html__( 'Theme Title Section', 'cashelrie' ),
		'options' => array(

			'breadcrumbs' => array(
				'type'    => 'image-picker',
				'value'   => '1',
				'attr'    => array(
					'class'    => 'breadcrumbs-thumbnail',
					'data-foo' => 'breadcrumbs',
				),
				'label'   => esc_html__( 'Page title sections with optional breadcrumbs', 'cashelrie' ),
				'desc'    => esc_html__( 'Select one of predefined page title sections. Install Unyson Breadcrumbs extension to display breadcrumbs', 'cashelrie' ),
				'help'    => esc_html__( 'You can select one of predefined theme title sections', 'cashelrie' ),
				'choices' => array(
					'1' => CASHELRIE_THEME_URI . '/img/theme-options/breadcrumbs1.png',
					'2' => CASHELRIE_THEME_URI . '/img/theme-options/breadcrumbs2.png',
					'3' => CASHELRIE_THEME_URI . '/img/theme-options/breadcrumbs3.png',
					'4' => CASHELRIE_THEME_URI . '/img/theme-options/breadcrumbs4.png',
					'5' => CASHELRIE_THEME_URI . '/img/theme-options/breadcrumbs5.png',
					'6' => CASHELRIE_THEME_URI . '/img/theme-options/breadcrumbs6.png',
				),
				'blank'   => false, // (optional) if true, image can be deselected
			),

			'breadcrumbs_background_image' => array(
				'type'        => 'upload',
				'value'       => array(),
				'attr'        => array( 'class' => 'logo_image-class', 'data-logo_image' => 'logo_image' ),
				'label'       => esc_html__( 'Background Image', 'cashelrie' ),
				'images_only' => true,
				'files_ext'   => array( 'png', 'jpg', 'jpeg', 'gif' ),
			),

		),
	),

	'footer'          => array(
		'title'   => esc_html__( 'Theme Footer', 'cashelrie' ),
		'options' => array(

			'footer' => array(
				'type'    => 'image-picker',
				'value'   => '1',
				'attr'    => array(
					'class'    => 'footer-thumbnail',
					'data-foo' => 'footer',
				),
				'label'   => esc_html__( 'Page footer', 'cashelrie' ),
				'desc'    => esc_html__( 'Select one of predefined page footers.', 'cashelrie' ),
				'help'    => esc_html__( 'You can select one of predefined theme footers', 'cashelrie' ),
				'choices' => array(
					'1' => CASHELRIE_THEME_URI . '/img/theme-options/footer1.png',
					'2' => CASHELRIE_THEME_URI . '/img/theme-options/footer2.png',
				),
				'blank'   => false, // (optional) if true, image can be deselected
			),

			'footer_background_image' => array(
				'type'        => 'upload',
				'value'       => array(),
				'label'       => esc_html__( 'Background Image', 'cashelrie' ),
				'images_only' => true,
				'files_ext'   => array( 'png', 'jpg', 'jpeg', 'gif' ),
			),
		),
	),

	'copyrights'      => array(
		'title'   => esc_html__( 'Theme Copyrights', 'cashelrie' ),
		'options' => array(

			'copyrights'      => array(
				'type'    => 'image-picker',
				'value'   => '1',
				'attr'    => array(
					'class'    => 'copyrights-thumbnail',
					'data-foo' => 'copyrights',
				),
				'label'   => esc_html__( 'Page copyrights', 'cashelrie' ),
				'desc'    => esc_html__( 'Select one of predefined page copyrights.', 'cashelrie' ),
				'help'    => esc_html__( 'You can select one of predefined theme copyrights', 'cashelrie' ),
				'choices' => array(
					'1' => CASHELRIE_THEME_URI . '/img/theme-options/copyrights1.png',
					'2' => CASHELRIE_THEME_URI . '/img/theme-options/copyrights2.png',
					'3' => CASHELRIE_THEME_URI . '/img/theme-options/copyrights3.png',
					'4' => CASHELRIE_THEME_URI . '/img/theme-options/copyrights4.png',
				),
				'blank'   => false, // (optional) if true, image can be deselected
			),
			'copyrights_text' => array(
				'type'  => 'textarea',
				'value' => '&copy; Copyright 2018. All Rights Reserved',
				'label' => esc_html__( 'Copyrights text', 'cashelrie' ),
				'desc'  => esc_html__( 'Please type your copyrights text', 'cashelrie' ),
			),
			'copyright_social' => array(
				'type'            => 'addable-box',
				'value'           => '',
				'label'           => esc_html__( 'Social Buttons', 'cashelrie' ),
				'desc'            => esc_html__( 'Optional social buttons', 'cashelrie' ),
				'template'        => '{{=icon}}',
				'box-options'     => array(
					'icon'       => array(
						'type'  => 'icon',
						'label' => esc_html__( 'Social Icon', 'cashelrie' ),
						'set'   => 'social-icons',
					),
					'icon_class' => array(
						'type'        => 'select',
						'value'       => '',
						'label'       => esc_html__( 'Icon type', 'cashelrie' ),
						'desc'        => esc_html__( 'Select one of predefined social button types', 'cashelrie' ),
						'choices'     => array(
							''                                    => esc_html__( 'Default', 'cashelrie' ),
							'border-icon'                         => esc_html__( 'Simple Bordered Icon', 'cashelrie' ),
							'border-icon rounded-icon'            => esc_html__( 'Rounded Bordered Icon', 'cashelrie' ),
							'bg-icon'                             => esc_html__( 'Simple Background Icon', 'cashelrie' ),
							'bg-icon rounded-icon'                => esc_html__( 'Rounded Background Icon', 'cashelrie' ),
							'color-icon bg-icon'                  => esc_html__( 'Color Light Background Icon', 'cashelrie' ),
							'color-icon bg-icon rounded-icon'     => esc_html__( 'Color Light Background Rounded Icon', 'cashelrie' ),
							'color-icon'                          => esc_html__( 'Color Icon', 'cashelrie' ),
							'color-icon border-icon'              => esc_html__( 'Color Bordered Icon', 'cashelrie' ),
							'color-icon border-icon rounded-icon' => esc_html__( 'Rounded Color Bordered Icon', 'cashelrie' ),
							'color-bg-icon'                       => esc_html__( 'Color Background Icon', 'cashelrie' ),
							'color-bg-icon rounded-icon'          => esc_html__( 'Rounded Color Background Icon', 'cashelrie' ),

						),
						/**
						 * Allow save not existing choices
						 * Useful when you use the select to populate it dynamically from js
						 */
						'no-validate' => false,
					),
					'icon_url'   => array(
						'type'  => 'text',
						'value' => '',
						'label' => esc_html__( 'Icon Link', 'cashelrie' ),
						'desc'  => esc_html__( 'Provide a URL to your icon', 'cashelrie' ),
					)
				),
				'limit'           => 0, // limit the number of boxes that can be added
				'add-button-text' => esc_html__( 'Add', 'cashelrie' ),
				'sortable'        => true,
			),
		),
	),
	'not_found_page'    => array(
		'title'   => esc_html__( 'Theme 404 page', 'cashelrie' ),
		'options' => array(
			'404_background_image'             => array(
				'type'        => 'upload',
				'value'       => array(),
				'attr'        => array( 'class' => 'logo_image-class', 'data-logo_image' => 'logo_image' ),
				'label'       => esc_html__( 'Background Image', 'cashelrie' ),
				'images_only' => true,
				'files_ext'   => array( 'png', 'jpg', 'jpeg', 'gif' ),
			),
		),
	),
	'fonts_panel'     => array(
		'title'   => esc_html__( 'Theme Fonts', 'cashelrie' ),
		'options' => array(
			'body_fonts_section' => array(
				'title'   => esc_html__( 'Font for body', 'cashelrie' ),
				'options' => array(
					'body_font_picker_switch' => array(
						'type'    => 'multi-picker',
						'label'   => false,
						'desc'    => false,
						'picker'  => array(
							'main_font_enabled' => array(
								'type'         => 'switch',
								'value'        => '',
								'label'        => esc_html__( 'Enable', 'cashelrie' ),
								'desc'         => esc_html__( 'Enable custom body font', 'cashelrie' ),
								'left-choice'  => array(
									'value' => '',
									'label' => esc_html__( 'Disabled', 'cashelrie' ),
								),
								'right-choice' => array(
									'value' => 'main_font_options',
									'label' => esc_html__( 'Enabled', 'cashelrie' ),
								),
							),
						),
						'choices' => array(
							'main_font_options' => array(
								'main_font' => array(
									'type'       => 'typography-v2',
									'value'      => array(
										'family'         => 'Roboto',
										// For standard fonts, instead of subset and variation you should set 'style' and 'weight'.
										// 'style' => 'italic',
										// 'weight' => 700,
										'subset'         => 'latin-ext',
										'variation'      => 'regular',
										'size'           => 14,
										'line-height'    => 24,
										'letter-spacing' => 0,
										'color'          => '#0000ff'
									),
									'components' => array(
										'family'         => true,
										// 'style', 'weight', 'subset', 'variation' will appear and disappear along with 'family'
										'size'           => true,
										'line-height'    => true,
										'letter-spacing' => true,
										'color'          => false
									),
									'attr'       => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
									'label'      => esc_html__( 'Custom font', 'cashelrie' ),
									'desc'       => esc_html__( 'Select custom font for headings', 'cashelrie' ),
									'help'       => esc_html__( 'You should enable using custom heading fonts above at first', 'cashelrie' ),
								),
							),
						),
					),
				),
			),

			'headings_fonts_section' => array(
				'title'   => esc_html__( 'Font for headings', 'cashelrie' ),
				'options' => array(
					'h_font_picker_switch' => array(
						'type'    => 'multi-picker',
						'label'   => false,
						'desc'    => false,
						'picker'  => array(
							'h_font_enabled' => array(
								'type'         => 'switch',
								'value'        => '',
								'label'        => esc_html__( 'Enable', 'cashelrie' ),
								'desc'         => esc_html__( 'Enable custom heading font', 'cashelrie' ),
								'left-choice'  => array(
									'value' => '',
									'label' => esc_html__( 'Disabled', 'cashelrie' ),
								),
								'right-choice' => array(
									'value' => 'h_font_options',
									'label' => esc_html__( 'Enabled', 'cashelrie' ),
								),
							),
						),
						'choices' => array(
							'h_font_options' => array(
								'h_font' => array(
									'type'       => 'typography-v2',
									'value'      => array(
										'family'         => 'Roboto',
										// For standard fonts, instead of subset and variation you should set 'style' and 'weight'.
										// 'style' => 'italic',
										// 'weight' => 700,
										'subset'         => 'latin-ext',
										'variation'      => 'regular',
										'size'           => 28,
										'line-height'    => '100%',
										'letter-spacing' => 0,
										'color'          => '#0000ff'
									),
									'components' => array(
										'family'         => true,
										// 'style', 'weight', 'subset', 'variation' will appear and disappear along with 'family'
										'size'           => false,
										'line-height'    => false,
										'letter-spacing' => true,
										'color'          => false
									),
									'attr'       => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
									'label'      => esc_html__( 'Custom font', 'cashelrie' ),
									'desc'       => esc_html__( 'Select custom font for headings', 'cashelrie' ),
									'help'       => esc_html__( 'You should enable using custom heading fonts above at first', 'cashelrie' ),
								),
							),
						),
					),
				),
			),

		),
	),
	'preloader_panel' => array(
		'title' => esc_html__( 'Theme Preloader', 'cashelrie' ),

		'options' => array(
			'preloader_enabled' => array(
				'type'         => 'switch',
				'value'        => '1',
				'label'        => esc_html__( 'Enable Preloader', 'cashelrie' ),
				'left-choice'  => array(
					'value' => '1',
					'label' => esc_html__( 'Enabled', 'cashelrie' ),
				),
				'right-choice' => array(
					'value' => '0',
					'label' => esc_html__( 'Disabled', 'cashelrie' ),
				),
			),

			'preloader_image' => array(
				'type'        => 'upload',
				'value'       => '',
				'label'       => esc_html__( 'Custom preloader image', 'cashelrie' ),
				'help'        => esc_html__( 'GIF image recommended. Recommended maximum preloader width 150px, maximum preloader height 150px.', 'cashelrie' ),
				'images_only' => true,
			),


		),
	),
	'share_buttons'   => array(
		'title' => esc_html__( 'Theme Share Buttons', 'cashelrie' ),

		'options' => array(
			'share_facebook'    => array(
				'type'         => 'switch',
				'value'        => '1',
				'label'        => esc_html__( 'Enable Facebook Share Button', 'cashelrie' ),
				'left-choice'  => array(
					'value' => '1',
					'label' => esc_html__( 'Enabled', 'cashelrie' ),
				),
				'right-choice' => array(
					'value' => '0',
					'label' => esc_html__( 'Disabled', 'cashelrie' ),
				),
			),
			'share_twitter'     => array(
				'type'         => 'switch',
				'value'        => '1',
				'label'        => esc_html__( 'Enable Twitter Share Button', 'cashelrie' ),
				'left-choice'  => array(
					'value' => '1',
					'label' => esc_html__( 'Enabled', 'cashelrie' ),
				),
				'right-choice' => array(
					'value' => '0',
					'label' => esc_html__( 'Disabled', 'cashelrie' ),
				),
			),
			'share_google_plus' => array(
				'type'         => 'switch',
				'value'        => '1',
				'label'        => esc_html__( 'Enable Google+ Share Button', 'cashelrie' ),
				'left-choice'  => array(
					'value' => '1',
					'label' => esc_html__( 'Enabled', 'cashelrie' ),
				),
				'right-choice' => array(
					'value' => '0',
					'label' => esc_html__( 'Disabled', 'cashelrie' ),
				),
			),
			'share_pinterest'   => array(
				'type'         => 'switch',
				'value'        => '1',
				'label'        => esc_html__( 'Enable Pinterest Share Button', 'cashelrie' ),
				'left-choice'  => array(
					'value' => '1',
					'label' => esc_html__( 'Enabled', 'cashelrie' ),
				),
				'right-choice' => array(
					'value' => '0',
					'label' => esc_html__( 'Disabled', 'cashelrie' ),
				),
			),
			'share_linkedin'    => array(
				'type'         => 'switch',
				'value'        => '1',
				'label'        => esc_html__( 'Enable LinkedIn Share Button', 'cashelrie' ),
				'left-choice'  => array(
					'value' => '1',
					'label' => esc_html__( 'Enabled', 'cashelrie' ),
				),
				'right-choice' => array(
					'value' => '0',
					'label' => esc_html__( 'Disabled', 'cashelrie' ),
				),
			),
			'share_tumblr'      => array(
				'type'         => 'switch',
				'value'        => '1',
				'label'        => esc_html__( 'Enable Tumblr Share Button', 'cashelrie' ),
				'left-choice'  => array(
					'value' => '1',
					'label' => esc_html__( 'Enabled', 'cashelrie' ),
				),
				'right-choice' => array(
					'value' => '0',
					'label' => esc_html__( 'Disabled', 'cashelrie' ),
				),
			),
			'share_reddit'      => array(
				'type'         => 'switch',
				'value'        => '1',
				'label'        => esc_html__( 'Enable Reddit Share Button', 'cashelrie' ),
				'left-choice'  => array(
					'value' => '1',
					'label' => esc_html__( 'Enabled', 'cashelrie' ),
				),
				'right-choice' => array(
					'value' => '0',
					'label' => esc_html__( 'Disabled', 'cashelrie' ),
				),
			),

		),
	),

);