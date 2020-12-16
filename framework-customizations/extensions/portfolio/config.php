<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['image_sizes'] = array(
	'featured-image' => array(
		'width'  => 775,
		'height' => 517,
		'crop'   => true
	),
	'gallery-image'  => array(
		'width'  => 1170,
		'height' => 780,
		'crop'   => true
	)
);

$cfg['has-gallery'] = true;