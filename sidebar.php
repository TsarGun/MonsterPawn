<?php
/**
 * The Sidebar containing the main widget area
 */

if ( function_exists( 'fw_ext_sidebars_show' ) ) {
	if ( fw_ext_sidebars_show( 'blue' ) ) {
		echo fw_ext_sidebars_show( 'blue' );
	} else {
		dynamic_sidebar( 'sidebar-main' );
	}
} else {
	dynamic_sidebar( 'sidebar-main' );
}