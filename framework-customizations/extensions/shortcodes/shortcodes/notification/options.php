<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'message' => array(
		'label' => esc_html__( 'Message', 'cashelrie' ),
		'desc'  => esc_html__( 'Notification message', 'cashelrie' ),
		'type'  => 'text',
		'value' => esc_html__( 'Message!', 'cashelrie' ),
	),
	'type'    => array(
		'label'   => esc_html__( 'Type', 'cashelrie' ),
		'desc'    => esc_html__( 'Notification type', 'cashelrie' ),
		'type'    => 'select',
		'choices' => array(
			'success' => esc_html__( 'Congratulations', 'cashelrie' ),
			'info'    => esc_html__( 'Information', 'cashelrie' ),
			'warning' => esc_html__( 'Alert', 'cashelrie' ),
			'danger'  => esc_html__( 'Error', 'cashelrie' ),
		)
	),
	'icon'       => array(
		'type'  => 'icon',
		'label' => esc_html__( 'Icon', 'cashelrie' ),
		'set'   => 'rt-icons-2',
	),
);