//Wrapping all JavaScript code into a IIFE function for prevent global variables creation
(function(){
"use strict";

function initShopTables() {

    jQuery('div.quantity').each(function () {
        var $this = jQuery(this);

        if ($this.find('.plus').length) {
            return;
        }

        $this.find('[type="number"]')
            .before('<input type="button" value="-" class="minus">')
            .after('<input type="button" value="+" class="plus">');
    });

    jQuery('.single_add_to_cart_button').addClass('theme_button color1 min_width_button');

    jQuery('.plus, .minus').on('click', function (e) {
        var numberField = jQuery(this).parent().find('[type="number"]');
        var currentVal = numberField.val();
        var sign = jQuery(this).val();
        if (sign === '-') {
            if (currentVal > 1) {
                numberField.val(parseFloat(currentVal) - 1);
            }
        } else {
            numberField.val(parseFloat(currentVal) + 1);
        }
        numberField.trigger('change');
    });
}

//quantity arrows
function addQuantityArrows() {
    jQuery('<i class="fa fa-angle-down"></i>').insertAfter('input.minus');
    jQuery('<i class="fa fa-angle-up"></i>').insertAfter('input.plus');
}

//cart widget buttons
function addCartButtonsClasses() {
    jQuery('.widget_shopping_cart').find('.buttons a').addClass('theme_button small_button min_width_button').end().find('.wc-forward:not(.checkout)').addClass('color1').end().find('.checkout').addClass('color1 inverse');
}

jQuery(document).ready(function () {

    //////////
    //layout//
    //layout//
    //////////

    //tables - reloaded - needs CSS
    initShopTables();
    jQuery('.shop_attributes').addClass('table table-striped');

    //woo cart update events:
    //- update_checkout
    //- updated_wc_div
    //- updated_cart_totals
    //- updated_shipping_method
    //- applied_coupon
    //- removed_coupon

    jQuery('body').on('updated_cart_totals', function (e) {
        initShopTables();
    });


    jQuery('.woocommerce-review-link').wrap('<span class="review-links pull-right darklinks" />');

    //single products variants table
    jQuery('td.label').removeClass('label');

    //sinlge product tabs
    jQuery('.woocommerce-tabs ul.wc-tabs').addClass('nav nav-tabs color4');
    jQuery('.woocommerce-tabs .wc-tab')
        .removeClass('panel')
        .wrapAll('<div class="tab-content big-padding top-color-border color4 bottommargin_30" />');


    //woocommerce pagination
    jQuery('.woocommerce-pagination')
        .addClass('comment-navigation')
        .find('ul.page-numbers')
        .addClass('pagination')
        .find('.current')
        .parent().addClass('active');

    //woo widgets
    jQuery('.widget_layered_nav_filters, .widget_rating_filter').addClass('widget_nav_menu darklinks');
    jQuery('.widget_shopping_cart, .widget_top_rated_products, .widget_products, .widget_recent_reviews, .widget_recently_viewed_products').addClass('darklinks');
    jQuery('.product_list_widget').addClass('loop-colors');
    jQuery('.widget_product_categories, .widget_layered_nav').addClass('widget_nav_menu greylinks');

    jQuery('.woocommerce-product-search').find('.search-field').addClass('form-control');

    jQuery('.widget_product_tag_cloud').addClass('widget_tag_cloud');

    //cart widget buttons
    addCartButtonsClasses();

    jQuery('.price_slider_amount').find('.button').addClass('theme_button color1 small_button min_width_button');

    //woocommerce comment form
    jQuery('#review_form .comment-form').find('input, textarea').each(function () {
        var $this = jQuery(this);
        var placeholder = $this.parent().find('label').text().replace('*', '');
        $this.attr('placeholder', placeholder);
    });


    //view toggler
    jQuery('#toggle_shop_view').on('click', function (e) {
        e.preventDefault();
        jQuery(this).toggleClass('grid-view');
        jQuery('#products, ul.products').toggleClass('grid-view list-view');
        if (jQuery.cookie) {
            if (jQuery('#products, ul.products').hasClass('list-view')) {
                jQuery.cookie('grid-view', 'list-view');
            } else {
                jQuery.cookie('grid-view', 'grid-view');
            }
        }
    });
    if (jQuery.cookie) {
        if (jQuery.cookie('grid-view') == 'list-view') {
            jQuery('#toggle_shop_view').trigger('click');
        }
    }

    //color filter
    jQuery(".color-filters").find("a[data-background-color]").each(function () {
        jQuery(this).css({"background-color": jQuery(this).data("background-color")});
    });

    /////////////
    //Carousels//
    /////////////

    //woocommerce thumbnails
    var thumbnailsCarouselWide = jQuery('.thumbnails-wrap, .thumbnails').closest('.col-xs-12').hasClass('col-md-8');
    var thumbnailsColumnsLg = thumbnailsCarouselWide ? 4 : 5;
    var thumbnailsColumnsMd = thumbnailsCarouselWide ? 3 : 4;
    jQuery('.thumbnails, .thumbnails-wrap').addClass('owl-carousel').owlCarousel({
        loop: false,
        margin: 10,
        nav: false,
        dots: true,
        items: 3,
        responsive: {
            0: {
                items: 3
            },
            767: {
                items: 4
            },
            992: {
                items: thumbnailsColumnsMd
            },
            1200: {
                items: thumbnailsColumnsLg
            }
        },
    });
    //single product gallery
    jQuery('[data-thumb]').find('a').each(function () {
        jQuery(this).attr('data-gal', 'prettyPhoto[gal]');
    });

    //woocommerce related products, upsells products
    var $relatedProductsCarousel = jQuery('.related.products ul.products, .upsells.products ul.products, .cross-sells ul.products');
    var relatedProductsCarouselWide = $relatedProductsCarousel.closest('.col-xs-12').hasClass('col-md-8');
    var relatedColumnsLg = relatedProductsCarouselWide ? 2 : 3;
    var relatedColumnsMd = relatedProductsCarouselWide ? 2 : 3;
    var relatedColumnSm = relatedProductsCarouselWide ? 1 : 2;
    $relatedProductsCarousel.addClass('owl-carousel loop-colors').owlCarousel({
        loop: false,
        margin: 30,
        nav: true,
        dots: false,
        items: 3,
        responsive: {
            0: {
                items: 1
            },
            767: {
                items: 2
            },
            992: {
                items: relatedColumnsMd
            },
            1200: {
                items: relatedColumnsLg
            }
        },
    })

    //add quantity arrows
    addQuantityArrows();
    jQuery( document.body ).on( 'updated_cart_totals', addQuantityArrows);

    //cart widget buttons
    jQuery( document.body ).on( 'added_to_cart removed_from_cart', function() {
        addCartButtonsClasses();
    })
});

//end of IIFE function
})();