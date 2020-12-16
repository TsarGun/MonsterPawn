"use strict";

//owl carousel
if (jQuery().owlCarousel) {
	jQuery('.owl-carousel').each(function() {
		var $carousel = jQuery(this);
		var loop = $carousel.data('loop') ? $carousel.data('loop') : false;
		var margin = ($carousel.data('margin') || $carousel.data('margin') == 0) ? $carousel.data('margin') : 30;
		var nav = $carousel.data('nav') ? $carousel.data('nav') : false;
		var dots = $carousel.data('dots') ? $carousel.data('dots') : false;
		var themeClass = $carousel.data('themeclass') ? $carousel.data('themeclass') : 'owl-theme';
		var center = $carousel.data('center') ? $carousel.data('center') : false;
		var items = $carousel.data('items') ? $carousel.data('items') : 4;
		var autoplay = $carousel.data('autoplay') ? $carousel.data('autoplay') : false;
		var responsiveXs = $carousel.data('responsive-xs') ? $carousel.data('responsive-xs') : 1;
		var responsiveSm = $carousel.data('responsive-sm') ? $carousel.data('responsive-sm') : 2;
		var responsiveMd = $carousel.data('responsive-md') ? $carousel.data('responsive-md') : 3;
		var responsiveLg = $carousel.data('responsive-lg') ? $carousel.data('responsive-lg') : 4;
		// var responsive = $carousel.data('responsive') ? jQuery.parseJSON($carousel.data('responsive')) : {0:{items:1},767:{items:2},992:{items:2},1200:{items: 4}};

		$carousel.owlCarousel({
			loop: loop,
			margin: margin,
			nav: nav,
			autoplay: autoplay,
			dots: dots,
			themeClass: themeClass,
			center: center,
			items: items,
			responsive: {
				0:{
					items: responsiveXs
				},
				767:{
					items: responsiveSm
				},
				992:{
					items: responsiveMd
				},
				1200:{
					items: responsiveLg
				}
			},
		})
		//custom nav
		// .find('.owl-dots:not([style*="none"])')
		// .wrap('<div class="owl-custom-nav"/>')
		// .before('<div class="owl-custom-prev"><i class="arrow-icon-left-open-big"></i></div>')
		// .after('<div class="owl-custom-next"><i class="arrow-icon-right-open-big"></i></div>')
		// .end()
		// .find(".owl-custom-prev").on('click', function(){
		// 	$carousel.trigger('prev.owl.carousel');
		// })
		// .end()
		// .find(".owl-custom-next").on('click', function(){
		// 	$carousel.trigger('next.owl.carousel');
		// });
	});

} //eof owl-carousel