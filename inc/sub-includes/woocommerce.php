<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}


//remove page title in shop page
add_filter( 'woocommerce_show_page_title', 'cashelrie_filter_remove_shop_title_in_content' );
if ( ! function_exists( 'cashelrie_filter_remove_shop_title_in_content' ) ) :
	function cashelrie_filter_remove_shop_title_in_content() {
		return false;
	}
endif;

//remove wrappers
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

//wrap in col-sm- and .columns-2 all products on shop page
add_action( 'woocommerce_before_shop_loop', 'cashelrie_action_echo_div_wraps_before_shop_loop' );
if ( ! function_exists( 'cashelrie_action_echo_div_wraps_before_shop_loop' ) ) :
	function cashelrie_action_echo_div_wraps_before_shop_loop() {
		$column_classes = cashelrie_get_columns_classes();
		$columns_amount = ( $column_classes[ 'main_column_class' ] === 'col-xs-12' ) ? 3 : 2;
		if ( function_exists( 'wc_get_loop_prop' ) ) {
			$columns_amount = wc_get_loop_prop( 'columns' );
			if ( $column_classes[ 'main_column_class' ] === 'col-xs-12' &&  $columns_amount > 4 ) {
				$columns_amount = 4;
			} else if ( $column_classes[ 'main_column_class' ] !== 'col-xs-12' && $columns_amount > 3 ) {
				$columns_amount = 3;
			}
		}

		echo '<div id="content_products" class="' . esc_attr( $column_classes[ 'main_column_class' ] ) . '">';
		echo '<div class="columns-' . $columns_amount . '">';
		echo '<div class="form-inline content-justify v-center">';
	}
endif;

//before shop loop - removing breadcrumbs and results count
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
//wrapping sort form in div and adding view toggle button
add_action( 'woocommerce_before_shop_loop', 'cashelrie_action_before_shop_loop_wrap_form', 15 );
if ( ! function_exists( 'cashelrie_action_before_shop_loop_wrap_form' ) ) :
	function cashelrie_action_before_shop_loop_wrap_form() {
		echo '<div class="storefront-sorting">';
	}
endif;

if ( ! function_exists( 'cashelrie_action_before_shop_loop_wrap_form_close_first' ) ) :
	function cashelrie_action_before_shop_loop_wrap_form_close_first() {
		woocommerce_result_count();
	}
endif;

add_action( 'woocommerce_before_shop_loop', 'cashelrie_action_before_shop_loop_wrap_form_close_first', 10 );

if ( ! function_exists( 'cashelrie_action_before_shop_loop_wrap_form_close_second' ) ) :
	function cashelrie_action_before_shop_loop_wrap_form_close_second() {
		echo '</div>';
		echo '</div>';
	}
endif;

add_action( 'woocommerce_before_shop_loop', 'cashelrie_action_before_shop_loop_wrap_form_close_second', 40 );

//start loop - adding classes to products ul
if ( ! function_exists( 'woocommerce_product_loop_start' ) ) :
	function woocommerce_product_loop_start( $echo = true ) {
		//id products is necessary for scripts

		$html  = '<ul class="products list-unstyled loop-colors">';
		$GLOBALS[ 'woocommerce_loop' ][ 'loop' ] = 0;
		if ( $echo ) {
			echo wp_kses_post( $html );
		} else {
			return $html;
		}
	}
endif;

//loop pagination
//closing main column and getting sidebar if exist
remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination' );
add_action( 'woocommerce_after_shop_loop', 'cashelrie_action_echo_div_columns_after_shop_loop' );
if ( ! function_exists( 'cashelrie_action_echo_div_columns_after_shop_loop' ) ):
	function cashelrie_action_echo_div_columns_after_shop_loop() {
		echo '</div><!-- eof .columns-2 -->';
		$pagination_html = cashelrie_bootstrap_paginate_links();
		if ( $pagination_html ) {
			echo '<div class="text-center">';
			echo wp_kses_post( $pagination_html );
			echo '</div>';
		}
		echo '</div><!-- eof #content_products -->';
		$column_classes = cashelrie_get_columns_classes();
		if ( $column_classes[ 'sidebar_class' ] ): ?>
			<!-- main aside sidebar -->
			<aside class="<?php echo esc_attr( $column_classes[ 'sidebar_class' ] ); ?>">
				<?php get_sidebar(); ?>
			</aside>
			<!-- eof main aside sidebar -->
			<?php
		endif;
	}
endif;

// single product in shop loop
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
//start of loop item
add_action( 'woocommerce_before_shop_loop_item', 'cashelrie_action_echo_markup_before_shop_loop_item' );
if ( ! function_exists( 'cashelrie_action_echo_markup_before_shop_loop_item' ) ):
	function cashelrie_action_echo_markup_before_shop_loop_item() {
		echo '<div class="vertical-item text-center">';
		echo '<div class="item-media-wrap">';
		echo '<div class="item-media">';
		woocommerce_template_loop_product_link_open();

	}
endif;

add_action( 'woocommerce_before_shop_loop_item_title', 'cashelrie_action_echo_markup_before_shop_loop_item_title' );
if ( ! function_exists( 'cashelrie_action_echo_markup_before_shop_loop_item_title' ) ):
	function cashelrie_action_echo_markup_before_shop_loop_item_title() {
		woocommerce_template_loop_product_link_close();
		echo '</div> <!-- eof .item-media -->';
		echo '</div> <!-- eof .item-media-wrap -->';
		echo '<div class="item-content">';
		woocommerce_template_loop_product_link_open();
	}
endif;

add_action( 'woocommerce_after_shop_loop_item_title', 'cashelrie_action_echo_markup_after_shop_loop_item_title' );
if ( ! function_exists( 'cashelrie_action_echo_markup_after_shop_loop_item_title' ) ):
	function cashelrie_action_echo_markup_after_shop_loop_item_title() {
		woocommerce_template_loop_product_link_close();
	}
endif;

//end of loop item
add_action( 'woocommerce_after_shop_loop_item', 'cashelrie_action_echo_markup_after_shop_loop_item' );
if ( ! function_exists( 'cashelrie_action_echo_markup_after_shop_loop_item' ) ):
	function cashelrie_action_echo_markup_after_shop_loop_item() {
		//product short description
		global $post;
		woocommerce_template_loop_rating();
		woocommerce_template_loop_price();
		echo '<p class="topmargin_15">';
		woocommerce_template_loop_add_to_cart();
        echo '</p>';
		echo '</div> <!-- eof .item-content -->';
		echo '</div> <!-- eof .vertical-item -->';
	}
endif;

//single product view
//single product image and summary layout
//wrap in col-sm- and .columns-2 all products on shop page
add_action( 'woocommerce_before_single_product', 'cashelrie_action_echo_div_columns_before_single_product' );
if ( ! function_exists( 'cashelrie_action_echo_div_columns_before_single_product' ) ):
	function cashelrie_action_echo_div_columns_before_single_product() {
		$column_classes = cashelrie_get_columns_classes();
		echo '<div id="content_product" class="' . esc_attr( $column_classes[ 'main_column_class' ] ) . '">';
	}
endif;

add_action( 'woocommerce_after_single_product', 'cashelrie_action_echo_div_columns_after_single_product' );
if ( ! function_exists( 'cashelrie_action_echo_div_columns_after_single_product' ) ):
	function cashelrie_action_echo_div_columns_after_single_product() {
		echo '</div> <!-- eof .col- -->';
		$column_classes = cashelrie_get_columns_classes();
		if ( $column_classes[ 'sidebar_class' ] ): ?>
			<!-- main aside sidebar -->
			<aside class="<?php echo esc_attr( $column_classes[ 'sidebar_class' ] ); ?>">
				<?php get_sidebar(); ?>
			</aside>
			<!-- eof main aside sidebar -->
			<?php
		endif;
	}
endif;

remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
//add_action('woocommerce_product_thumbnails', 'woocommerce_show_product_sale_flash', 9 );
add_filter( 'woocommerce_single_product_image_html', 'cashelrie_filter_put_onsale_span_in_main_image' );
if ( ! function_exists( 'cashelrie_filter_put_onsale_span_in_main_image' ) ):
	function cashelrie_filter_put_onsale_span_in_main_image( $html ) {
		return $html . woocommerce_show_product_sale_flash();
	}
endif;

add_action( 'woocommerce_product_thumbnails', 'cashelrie_action_echo_closing_div_before_single_product_thumbnails', 9 );
if ( ! function_exists( 'cashelrie_action_echo_closing_div_before_single_product_thumbnails' ) ):
	function cashelrie_action_echo_closing_div_before_single_product_thumbnails() {
		echo '</div><!--eof .images -->';
		echo '<div class="thumbnails-wrap">';
	}
endif;

add_action( 'woocommerce_before_single_product_summary', 'cashelrie_action_echo_div_columns_before_single_product_summary', 9 );
if ( ! function_exists( 'cashelrie_action_echo_div_columns_before_single_product_summary' ) ):
	function cashelrie_action_echo_div_columns_before_single_product_summary() {
		echo '<div class="row columns_margin_bottom_30">';
		echo '<div class="col-sm-6">';
	}
endif;

add_action( 'woocommerce_before_single_product_summary', 'cashelrie_action_echo_div_close_first_column_before_single_product_summary', 21 );
if ( ! function_exists( 'cashelrie_action_echo_div_close_first_column_before_single_product_summary' ) ):
	function cashelrie_action_echo_div_close_first_column_before_single_product_summary() {
		echo '</div><!-- eof .col-sm- with single product images -->';
		echo '<div class="col-sm-6 bottommargin_0">';
	}
endif;

add_action( 'woocommerce_after_single_product_summary', 'cashelrie_action_echo_div_close_columns_after_single_product_summary', 9 );
if ( ! function_exists( 'cashelrie_action_echo_div_close_columns_after_single_product_summary' ) ):
	function cashelrie_action_echo_div_close_columns_after_single_product_summary() {
		echo '</div> <!--eof .col-sm- .summary -->';
		echo '</div> <!--eof .row -->';
	}
endif;

//elements in single product summary
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

add_action( 'woocommerce_single_product_summary', 'cashelrie_action_echo_template_single_rating', 5 );
if ( ! function_exists( 'cashelrie_action_echo_template_single_rating' ) ):
	function cashelrie_action_echo_template_single_rating() {
		echo '<div class="darklinks color4">';
		woocommerce_template_single_rating();
		echo '</div>';
	}
endif;
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 15 );

add_action( 'woocommerce_single_product_summary', 'cashelrie_action_echo_template_single_meta', 25 );
if ( ! function_exists( 'cashelrie_action_echo_template_single_meta' ) ):
	function cashelrie_action_echo_template_single_meta() {
		echo '<div class="small-text weight-black greylinks">';
		woocommerce_template_single_meta();
		echo '</div>';
	}
endif;

add_action( 'woocommerce_after_add_to_cart_button', 'cashelrie_action_echo_open_div_after_add_to_cart_button' );
if ( ! function_exists( 'cashelrie_action_echo_open_div_after_add_to_cart_button' ) ):
	function cashelrie_action_echo_open_div_after_add_to_cart_button() {
	}
endif;