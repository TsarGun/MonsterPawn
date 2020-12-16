<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * Theme functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 */

define('CASHELRIE_THEME_VERSION', '1.0.0');

//Since WP v4.7 using new functions
//https://developer.wordpress.org/themes/basics/linking-theme-files-directories/#linking-to-theme-directories
define( 'CASHELRIE_THEME_URI', get_parent_theme_file_uri() );
define( 'CASHELRIE_THEME_PATH', get_parent_theme_file_path() );

// You may request this demo id from this theme author to get a colorized demo content.
// See the Theme support service contacts information.
define( 'CASHELRIE_REMOTE_DEMO_ID', '');
define( 'CASHELRIE_REMOTE_DEMO_VERSION', '1.0.0');

/**
 * Theme Includes
 */
require_once CASHELRIE_THEME_PATH . '/inc/init.php';

/**
 * TGM Plugin Activation
 */
require_once CASHELRIE_THEME_PATH . '/inc/tgm-plugin-activation/class-tgm-plugin-activation.php';

if ( ! function_exists( 'cashelrie_action_register_required_plugins' ) ):
	/** @internal */
	function cashelrie_action_register_required_plugins() {
		tgmpa( array (
			array (
				'name'             => 'Envato Market',
				'slug'             => 'envato-market',
				'source'           => esc_url('https://envato.github.io/wp-envato-market/dist/envato-market.zip'),
				'required'         => true,
			),
			array (
				'name'             => 'Unyson',
				'slug'             => 'unyson',
				'required'         => true,
			),
            array (
                'name'             => esc_html('MWTemplates Theme Helpers'),
                'slug'             => 'mwt-helpers',
                'source'           => esc_url('http://webdesign-finder.com/cashelrie/plugins/mwt-helpers.zip'),
                'required'         => true,
                'version'          => '1.0',
            ),
			array(
				'name'             => 'MWTemplates Unyson Extensions',
				'slug'             => 'mwp-unyson-extensions',
                'source'           => esc_url('http://webdesign-finder.com/cashelrie/plugins/mwt-unyson-extensions.zip'),
				'required'         => true,
                'version'          => '1.1',
			),
			array (
				'name'             => 'MWTemplates Theme Addons',
				'slug'             => 'mwt-addons',
                'source'           => esc_url('http://webdesign-finder.com/cashelrie/plugins/mwt-addons.zip'),
				'required'         => true,
                'version'          => '1.1.0',
			),
            array (
                'name'             => 'MWTemplates Theme Widgets',
                'slug'             => 'mwt-widgets',
                'source'           => esc_url('http://webdesign-finder.com/cashelrie/plugins/mwt-widgets.zip'),
                'required'         => true,
                'version'          => '1.2.0',
            ),
			array (
				'name'             => 'MailChimp',
				'slug'             => 'mailchimp-for-wp',
				'required'         => true,
			),
			array (
				'name'             => 'Snazzy Maps',
				'slug'             => 'snazzy-maps',
				'source'           => 'http://webdesign-finder.com/remote-demo-content/common-plugins-original/snazzy-maps.1.1.5.zip',
				'required'         => false,
				'version'          => '1.1.5',
			),
			array(
				'name'     		   => 'AccessPress Social Counter',
				'slug'     		   => 'accesspress-social-counter',
				'required'         => false
			),
			array(
				'name'     		   => 'WooCommerce',
				'slug'     		   => 'woocommerce',
				'required'         => false
			),
			array(
				'name'     		   => 'Instagram Feed',
				'slug'     		   => 'instagram-feed',
				'required'         => false
			),
		),
		array(
			'domain'       => 'cashelrie',
			'dismissable'  => false,
		) );
	}
endif;