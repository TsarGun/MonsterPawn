<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

//find fw_ext
$shortcodes_extension = fw()->extensions->get( 'shortcodes' );
$button_options = array();
if ( ! empty( $shortcodes_extension ) ) {
	$button_options = $shortcodes_extension->get_shortcode( 'button' )->get_options();
}

$options = array(
	'main' => array(
		'type'    => 'box',
		'title'   => '',
		'options' => array(
			'id'       => array(
				'type' => 'unique',
			),
			'builder'  => array(
				'type'    => 'tab',
				'title'   => esc_html__( 'Form Fields', 'cashelrie' ),
				'options' => array(
					'form' => array(
						'label'        => false,
						'type'         => 'form-builder',
						'value'        => array(
							'json' => apply_filters( 'fw:ext:forms:builder:load-item:form-header-title', true )
								? json_encode( array(
									array(
										'type'      => 'form-header-title',
										'shortcode' => 'form_header_title',
										'width'     => '',
										'options'   => array(
											'title'    => '',
											'subtitle' => '',
										)
									)
								) )
								: '[]'
						),
						'fixed_header' => true,
					),
				),
			),
			'settings' => array(
				'type'    => 'tab',
				'title'   => esc_html__( 'Settings', 'cashelrie' ),
				'options' => array(
					'settings-options' => array(
						'title'   => esc_html__( 'Contact Form Options', 'cashelrie' ),
						'type'    => 'tab',
						'options' => array(
							'background_color'    => array(
								'type'    => 'select',
								'value'   => 'ls',
								'label'   => esc_html__( 'Form Background color', 'cashelrie' ),
								'desc'    => esc_html__( 'Select background color', 'cashelrie' ),
								'help'    => esc_html__( 'Select one of predefined background colors', 'cashelrie' ),
								'choices' => array(
									''                              => esc_html__( 'No background', 'cashelrie' ),
									'with_padding muted_background' => esc_html__( 'Muted', 'cashelrie' ),
									'with_padding with_border'      => esc_html__( 'With Border', 'cashelrie' ),
									'with_padding ls'               => esc_html__( 'Light', 'cashelrie' ),
									'with_padding ls ms'            => esc_html__( 'Light Grey', 'cashelrie' ),
									'with_padding ds'               => esc_html__( 'Dark Grey', 'cashelrie' ),
									'with_padding ds ms'            => esc_html__( 'Dark', 'cashelrie' ),
									'with_padding cs'               => esc_html__( 'Main color', 'cashelrie' ),
									'with_padding cs main_color2'   => esc_html__( 'Second Main color', 'cashelrie' ),
								),
							),
							'columns_padding'     => array(
								'type'    => 'select',
								'value'   => 'columns_padding_15',
								'label'   => esc_html__( 'Column paddings in form', 'cashelrie' ),
								'desc'    => esc_html__( 'Choose columns horizontal paddings value', 'cashelrie' ),
								'choices' => array(
									'columns_padding_15' => esc_html__( '15 px - default', 'cashelrie' ),
									'columns_padding_0'  => esc_html__( '0', 'cashelrie' ),
									'columns_padding_1'  => esc_html__( '1 px', 'cashelrie' ),
									'columns_padding_2'  => esc_html__( '2 px', 'cashelrie' ),
									'columns_padding_5'  => esc_html__( '5 px', 'cashelrie' ),
									'columns_padding_10'  => esc_html__( '10 px', 'cashelrie' ),
								),
							),
							'input_text_center'     => array(
								'type'  => 'switch',
								'value' => '',
								'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
								'label' => esc_html__('Input Text Center', 'cashelrie'),
								'desc'  => esc_html__('Center Text in Form Fields', 'cashelrie'),
								'left-choice' => array(
									'value' => '',
									'label' => esc_html__('No', 'cashelrie'),
								),
								'right-choice' => array(
									'value' => 'input-text-center',
									'label' => esc_html__('Yes', 'cashelrie'),
								),
							),
							'form_email_settings' => array(
								'type'    => 'group',
								'options' => array(
									'email_to' => array(
										'type'  => 'text',
										'label' => esc_html__( 'Email To', 'cashelrie' ),
										'help'  => esc_html__( 'We recommend you to use an email that you verify often', 'cashelrie' ),
										'desc'  => esc_html__( 'The form will be sent to this email address.', 'cashelrie' ),
									),
								),
							),
							'form_text_settings'  => array(
								'type'    => 'group',
								'options' => array(
									'subject-group'       => array(
										'type'    => 'group',
										'options' => array(
											'subject_message' => array(
												'type'  => 'text',
												'label' => esc_html__( 'Subject Message', 'cashelrie' ),
												'desc'  => esc_html__( 'This text will be used as subject message for the email', 'cashelrie' ),
												'value' => esc_html__( 'Contact Form', 'cashelrie' ),
											),
										)
									),
									'submit-button-group' => array(
										'type'    => 'group',
										'options' => array(
											'submit_button_text' => array(
												'type'  => 'text',
												'label' => esc_html__( 'Submit Button', 'cashelrie' ),
												'desc'  => esc_html__( 'This text will appear in submit button', 'cashelrie' ),
												'value' => esc_html__( 'Send Message', 'cashelrie' ),
											),
											'submit_button_type' => array(
												'type'    => 'select',
												'value'   => 'theme_button color1',
												'label'   => esc_html__( 'Button Type', 'cashelrie' ),
												'desc'    => esc_html__( 'Choose a type for your button', 'cashelrie' ),
												'choices' => array(
													'simple_link'          => esc_html__( 'Just link', 'cashelrie' ),
													'more-link'          => esc_html__( 'Read More link', 'cashelrie' ),
													'theme_button'         => esc_html__( 'Default', 'cashelrie' ),
													'theme_button inverse' => esc_html__( 'Inverse', 'cashelrie' ),
													'theme_button color1'  => esc_html__( 'Accent Color 1', 'cashelrie' ),
													'theme_button color2'  => esc_html__( 'Accent Color 2', 'cashelrie' ),
												),
											),
											'reset_button_text'  => array(
												'type'  => 'text',
												'label' => esc_html__( 'Reset Button', 'cashelrie' ),
												'desc'  => esc_html__( 'This text will appear in reset button. Leave blank if reset button not needed', 'cashelrie' ),
												'value' => esc_html__( 'Clear', 'cashelrie' ),
											),
											'custom_buttons'     => array(
												'type'        => 'addable-box',
												'value'       => '',
												'label'       => esc_html__( 'Custom button', 'cashelrie' ),
												'desc'        => esc_html__( 'Add Custom Buttons', 'cashelrie' ),
												'box-options' => array(
													$button_options
												),
												'template'    => esc_html__( 'Button', 'cashelrie' ),
												'limit'           => 5, // limit the number of boxes that can be added
												'add-button-text' => esc_html__( 'Add', 'cashelrie' ),
											),
										)
									),
									'success-group'       => array(
										'type'    => 'group',
										'options' => array(
											'success_message' => array(
												'type'  => 'text',
												'label' => esc_html__( 'Success Message', 'cashelrie' ),
												'desc'  => esc_html__( 'This text will be displayed when the form will successfully send', 'cashelrie' ),
												'value' => esc_html__( 'Message sent!', 'cashelrie' ),
											),
										)
									),
									'failure_message'     => array(
										'type'  => 'text',
										'label' => esc_html__( 'Failure Message', 'cashelrie' ),
										'desc'  => esc_html__( 'This text will be displayed when the form will fail to be sent', 'cashelrie' ),
										'value' => esc_html__( 'Oops something went wrong.', 'cashelrie' ),
									),
								),
							),
						)
					),
					'mailer-options'   => array(
						'title'   => esc_html__( 'Mailer Options', 'cashelrie' ),
						'type'    => 'tab',
						'options' => array(
							'mailer' => array(
								'label' => false,
								'type'  => 'mailer'
							)
						)
					)
				),
			),
		),
	)
);