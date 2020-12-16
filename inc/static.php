<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * Include static files: javascript and css
 */

//removing default font awesome css style - we using our "fonts.css" file which contain font awesome
wp_deregister_style( 'fw-font-awesome' );

//Add Theme Fonts
wp_enqueue_style(
	'cashelrie-icon-fonts',
	CASHELRIE_THEME_URI . '/css/fonts.css',
	array(),
	CASHELRIE_THEME_VERSION
);

if ( is_admin_bar_showing() ) {
	//Add Frontend admin styles
	wp_register_style(
		'cashelrie-admin_bar',
		CASHELRIE_THEME_URI . '/css/admin-frontend.css',
		array(),
		CASHELRIE_THEME_VERSION
	);
	wp_enqueue_style( 'cashelrie-admin_bar' );
}

//styles and scripts below only for frontend: if in dashboard - exit
if ( is_admin() ) {
	return;
}

/**
 * Enqueue scripts and styles for the front end.
 */
// Add theme google font, used in the main stylesheet.
wp_enqueue_style(
	'cashelrie-font',
	cashelrie_google_font_url(),
	array(),
	CASHELRIE_THEME_VERSION
);

if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	wp_enqueue_script( 'comment-reply' );
}

if ( is_singular() && wp_attachment_is_image() ) {
	wp_enqueue_script(
		'cashelrie-keyboard-image-navigation',
		CASHELRIE_THEME_URI . '/js/keyboard-image-navigation.js',
		array( 'jquery' ),
		CASHELRIE_THEME_VERSION
	);
}

//plugins theme script
wp_enqueue_script(
	'cashelrie-modernizr',
	CASHELRIE_THEME_URI . '/js/vendor/modernizr-2.6.2.min.js',
	false,
	'2.6.2',
	false
);

//plugins theme script
wp_enqueue_script(
	'cashelrie-compressed',
	CASHELRIE_THEME_URI . '/js/compressed.js',
	array( 'jquery' ),
	CASHELRIE_THEME_VERSION,
	true
);
//custom plugins theme script
wp_enqueue_script(
	'cashelrie-plugins',
	CASHELRIE_THEME_URI . '/js/plugins.js',
	array( 'jquery' ),
	CASHELRIE_THEME_VERSION,
	true
);


//getting theme color scheme number
$color_scheme_number = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'color_scheme_number' ) : '';

//if WooCommerce - remove prettyPhoto - we have one in "compressed.js"
if ( class_exists( 'WooCommerce' ) ) :
	wp_dequeue_script( 'prettyPhoto' );
	wp_dequeue_script( 'prettyPhoto-init' );
	wp_deregister_style( 'woocommerce_prettyPhoto_css' );

	// Add Theme Woo Styles and Scripts
	wp_enqueue_style(
		'cashelrie-woo',
		CASHELRIE_THEME_URI . '/css/woo' . esc_attr( $color_scheme_number ) . '.css',
		array(),
		CASHELRIE_THEME_VERSION
	);

	wp_enqueue_script(
		'cashelrie-woo',
		CASHELRIE_THEME_URI . '/js/woo.js',
		array( 'jquery' ),
		CASHELRIE_THEME_VERSION,
		true
	);
endif; //WooCommerce

//selectize script
wp_enqueue_script(
	'selectize',
	CASHELRIE_THEME_URI . '/js/selectize.min.js',
	array( 'jquery' ),
	CASHELRIE_THEME_VERSION,
	true
);

//main theme script
wp_enqueue_script(
	'cashelrie-main',
	CASHELRIE_THEME_URI . '/js/main.js',
	array( 'jquery' ),
	CASHELRIE_THEME_VERSION,
	true
);

wp_localize_script('cashelrie-main', 'WPURLS', array( 'siteurl' => get_option('siteurl') ));

//Add Theme Booked Styles
if( class_exists('booked_plugin')) {
	wp_dequeue_style('booked-styles');
	wp_dequeue_style('booked-responsive');
	wp_enqueue_style(
		'cashelrie-booked',
		CASHELRIE_THEME_URI . '/css/booked' . esc_attr( $color_scheme_number ) . '.css',
		array(),
		'1.0.1'
	);
}//Booked

// Add Theme stylesheet.
wp_enqueue_style( 'cashelrie-css-style', get_stylesheet_uri() );

// Add Bootstrap Style
wp_enqueue_style(
	'bootstrap',
	CASHELRIE_THEME_URI . '/css/bootstrap.min.css',
	array(),
	CASHELRIE_THEME_VERSION
);

// Add Animations Style
wp_enqueue_style(
	'cashelrie-animations',
	CASHELRIE_THEME_URI . '/css/animations.css',
	array(),
	CASHELRIE_THEME_VERSION
);

// Add Theme Style
wp_enqueue_style(
	'cashelrie-main',
	CASHELRIE_THEME_URI . '/css/main' . esc_attr( $color_scheme_number ) . '.css',
	array(),
	CASHELRIE_THEME_VERSION
);

wp_add_inline_style( 'cashelrie-main', cashelrie_add_font_styles_in_head() );
