<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$cfg = array(
	'sidebar_positions' => array(
		'right' => array(
			'icon_url'        => 'right.png',
			'sidebars_number' => 1
		),
		'left'  => array(
			'icon_url'        => 'left.png',
			'sidebars_number' => 1
		),
		'full'  => array(
			'icon_url'        => 'full.png',
			'sidebars_number' => 0
		),
		/*
		//uncomment to use two sidebars:
		'left_right' => array(
			'icon_url' => 'left_right.png',
			'sidebars_number' => 2
		),
		*/
	),

	'dynamic_sidebar_args' => array(
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	),

	//set to true to enable sidebar picker on page or post
	'show_in_post_types' => false

);