<?php
/**
 * The template for displaying page title in page title section
 *
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( is_search() ) :
	printf( esc_html__( 'Search Results for: %s', 'cashelrie' ), get_search_query() );
	return;
endif;

if ( is_home() ) :
	$title = function_exists( 'fw_get_db_ext_settings_option' && function_exists( 'fw_ext_breadcrumbs' ) ) ? fw_get_db_ext_settings_option( 'breadcrumbs', 'blogpage-title' ) : esc_html__( 'Blog', 'cashelrie' );
	echo esc_html( $title );
	return;
endif;

if ( is_404() ) :
	$title = function_exists( 'fw_get_db_ext_settings_option' && function_exists( 'fw_ext_breadcrumbs' ) ) ? fw_get_db_ext_settings_option( 'breadcrumbs', '404-title' ) : esc_html__( '404', 'cashelrie' );
	echo esc_html( $title );
	return;
endif;

//buddypress
if ( function_exists('bp_is_active') && bp_is_user() ) :
	$title = bp_get_displayed_user_fullname();
//	$title = 'test';
	echo esc_html( $title );
	return;
endif;

if ( function_exists('bp_is_active') && bp_is_group() ) :
	$title = bp_get_current_group_name();
//	$title = 'test';
	echo esc_html( $title );
	return;
endif;

if ( is_singular() ) :
	single_post_title();
	return;
endif;

if ( is_archive() ) :
	the_archive_title();
	return;
endif;