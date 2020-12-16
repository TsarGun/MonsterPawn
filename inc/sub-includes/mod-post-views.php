<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

if ( ! function_exists( 'cashelrie_show_post_views_count' ) ) :
	function cashelrie_show_post_views_count( $only_number = true ) {
		if ( function_exists( 'mwt_show_post_views_count' ) ) {
			mwt_show_post_views_count( $only_number );
		}
	} //cashelrie_show_post_views_count()
endif;
