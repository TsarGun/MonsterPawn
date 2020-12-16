<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

/**
 * Filters and Actions
 */

if ( ! function_exists( 'cashelrie_action_setup' ) ) :
	/**
	 * Theme setup.
	 *
	 * Set up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support post thumbnails.
	 * @internal
	 */
	function cashelrie_action_setup() {

		/*
		 * Make Theme available for translation.
		 */
		load_theme_textdomain( 'cashelrie', CASHELRIE_THEME_PATH . '/languages' );

		add_editor_style( array( 'css/main.css' ) );

		// Add RSS feed links to <head> for posts and comments.
		add_theme_support( 'automatic-feed-links' );

		// Enable support for Post Thumbnails, and declare two sizes.
		add_theme_support( 'post-thumbnails' );

		//Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		set_post_thumbnail_size( 970, 485, true );
		add_image_size( 'cashelrie-full-width', 1170, 780, true );
		add_image_size( 'cashelrie-square-width', 600, 600, true );

		//content width
		$GLOBALS['content_width'] = apply_filters( 'cashelrie_filter_content_width', 891 );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption'
		) );

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'standard',
			'aside',
			'chat',
			'gallery',
			'link',
			'image',
			'quote',
			'status',
			'video',
			'audio',
		) );

		// Declare WooCommerce support
		add_theme_support( 'woocommerce' );

        // Add support for Block Styles.
        add_theme_support( 'wp-block-styles' );
	} //cashelrie_action_setup()

endif;
add_action( 'after_setup_theme', 'cashelrie_action_setup' );


/**
 * Extend the default WordPress body classes.
 *
 * Adds body classes to denote:
 * 1. Single or multiple authors.
 * 2. Presence of header image.
 * 3. Index views.
 * 4. Full-width content layout.
 * 5. Presence of footer widgets.
 * 6. Single views.
 * 7. Featured content layout.
 *
 * @param array $classes A list of existing body class values.
 *
 * @return array The filtered body class list.
 * @internal
 */
if ( !function_exists( 'cashelrie_filter_body_classes' ) ) :
	function cashelrie_filter_body_classes( $classes ) {
		if ( is_multi_author() ) {
			$classes[] = 'group-blog';
		}

		if ( get_header_image() ) {
			$classes[] = 'header-image';
		} else {
			$classes[] = 'masthead-fixed';
		}

		if ( is_archive() || is_search() || is_home() ) {
			$classes[] = 'archive-list-view';
		}

		if ( function_exists( 'fw_ext_sidebars_get_current_position' ) ) {
			$current_position = fw_ext_sidebars_get_current_position();
			if ( in_array( $current_position, array( 'full', 'left' ) )
			     || empty( $current_position )
			     || is_page_template( 'page-templates/full-width.php' )
			     || is_attachment()
			) {
				$classes[] = 'full-width';
			}
		} else {
			$classes[] = 'full-width';
		}

		if ( is_active_sidebar( 'sidebar-footer' ) ) {
			$classes[] = 'footer-widgets';
		}

		if ( is_singular() && ! is_front_page() ) {
			$classes[] = 'singular';
		}

		if ( is_front_page() && 'slider' == get_theme_mod( 'featured_content_layout' ) ) {
			$classes[] = 'slider';
		} elseif ( is_front_page() ) {
			$classes[] = 'grid';
		}

		return $classes;
	} //cashelrie_filter_body_classes()
endif;
add_filter( 'body_class', 'cashelrie_filter_body_classes' );

//changing default comment form
if ( ! function_exists( 'cashelrie_filter_cashelrie_contact_form_fields' ) ) :
	function cashelrie_filter_cashelrie_contact_form_fields( $fields ) {
		$commenter     = wp_get_current_commenter();
		$user          = wp_get_current_user();
		$user_identity = $user->exists() ? $user->display_name : '';
		$req           = get_option( 'require_name_email' );
		$aria_req      = ( $req ? " aria-required='true'" : '' );
		$html_req      = ( $req ? " required='required'" : '' );
		$html5         = 'html5';
		$fields        = array(
			'author'        => '<div class="col-xs-12"><p class="comment-form-author">' . '<label for="author">' . esc_html__( 'Name', 'cashelrie' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
			                   '<input id="author" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . $html_req . ' placeholder="' . esc_attr__( 'Your Name', 'cashelrie' ) . '"></p></div>',
			'email'         => '<div class="col-xs-12"><p class="comment-form-email"><label for="email">' . esc_html__( 'Email', 'cashelrie' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
			                   '<input id="email" class="form-control" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" ' . $aria_req . $html_req . ' placeholder="' . esc_attr__( 'Email Address', 'cashelrie' ) . '"/></p></div>',
			'comment_field' => '<div class="col-xs-12"><p class="comment-form-comment"><label for="comment">' . esc_html_x( 'Comment', 'noun', 'cashelrie' ) . '</label> <textarea id="comment"  class="form-control" name="comment" cols="45" rows="4"  aria-required="true" required="required"  placeholder="' . esc_attr__( 'Your Message', 'cashelrie' ) . '"></textarea></p></div>',
		);

		return $fields;
	} //cashelrie_filter_cashelrie_contact_form_fields()

endif;
add_filter( 'comment_form_default_fields', 'cashelrie_filter_cashelrie_contact_form_fields' );


//changing gallery thumbnail size for entry-thumbnail display
if ( ! function_exists( 'cashelrie_filter_fw_shortcode_atts_gallery' ) ) :
	function cashelrie_filter_fw_shortcode_atts_gallery( $out, $pairs, $atts ) {
		$out['size'] = 'post-thumbnail';
		return $out;

	} //cashelrie_filter_fw_shortcode_atts_gallery()
endif;

if ( ! function_exists( 'cashelrie_shortcode_atts_gallery_trigger' ) ) :
	function cashelrie_shortcode_atts_gallery_trigger( $add_filter = true ) {
		if ( $add_filter ) {
			add_filter( 'shortcode_atts_gallery', 'cashelrie_filter_fw_shortcode_atts_gallery', 10, 3 );
		} else {
			false;
		}
	} //cashelrie_shortcode_atts_gallery_trigger()
endif;

//changing events slug
if ( ! function_exists( 'cashelrie_filter_fw_ext_events_post_slug' ) ) :
	function cashelrie_filter_fw_ext_events_post_slug( $slug ) {
		return 'event';
	} //cashelrie_filter_fw_ext_events_post_slug()
endif;
add_filter( 'fw_ext_events_post_slug', 'cashelrie_filter_fw_ext_events_post_slug' );

if ( ! function_exists( 'cashelrie_filter_fw_ext_events_taxonomy_slug' ) ) :
	function cashelrie_filter_fw_ext_events_taxonomy_slug( $slug ) {
		return 'events';
	} //cashelrie_filter_fw_ext_events_taxonomy_slug()
endif;
add_filter( 'fw_ext_events_taxonomy_slug', 'cashelrie_filter_fw_ext_events_taxonomy_slug' );

//wrapping in a span categories and archives items count
if ( !function_exists('cashelrie_filter_add_span_to_arhcive_widget_count') ) :
	function cashelrie_filter_add_span_to_arhcive_widget_count( $links ) {
		//for categories widget
		$links = str_replace( '</a> (', '</a> <span>(', $links );
		//for archive widget
		$links = str_replace( '&nbsp;(', '</a> <span>(', $links );
		$links = preg_replace( '/([0-9]+)\)/', '$1)</span>', $links );

		return $links;
	} //cashelrie_filter_add_span_to_arhcive_widget_count()
endif;

//categories
add_filter( 'wp_list_categories', 'cashelrie_filter_add_span_to_arhcive_widget_count' );
//arhcive
add_filter( 'get_archives_link', 'cashelrie_filter_add_span_to_arhcive_widget_count' );


if ( !function_exists( 'cashelrie_filter_monster_widget_text' ) ) :
	function cashelrie_filter_monster_widget_text( $text ) {
		$text = str_replace( 'name="monster-widget-just-testing"', 'name="monster-widget-just-testing"', $text );

		return $text;
	}
endif;
add_filter( 'monster-widget-get-text', 'cashelrie_filter_monster_widget_text' );


/**
 * Extend the default WordPress post classes.
 *
 * Adds a post class to denote:
 * Non-password protected page with a post thumbnail.
 *
 * @param array $classes A list of existing post class values.
 *
 * @return array The filtered post class list.
 * @internal
 */
if ( !function_exists( 'cashelrie_filter_post_classes' ) ) :
	function cashelrie_filter_post_classes( $classes ) {
		if ( ! post_password_required() && ! is_attachment() && has_post_thumbnail() ) {
			$classes[] = 'has-post-thumbnail';
		}
		return $classes;
	} //cashelrie_filter_post_classes()
endif;
add_filter( 'post_class', 'cashelrie_filter_post_classes' );


/**
 * Add bootstrap CSS classes to default password protected form.
 *
 *
 * @return string HTML code of password form
 * @internal
 */
if ( !function_exists( 'cashelrie_filter_password_form' ) ) :
	function cashelrie_filter_password_form( $html ) {
		$label = esc_html__( 'Password', 'cashelrie' );
		$html  = str_replace( 'input name="post_password"', 'input class="form-control" name="post_password" placeholder="' . $label . '"', $html );
		$html  = str_replace( 'input type="submit"', 'input class="theme_button color1" type="submit"', $html );

		return $html;
	} //cashelrie_filter_password_form()
endif;
add_filter( 'the_password_form', 'cashelrie_filter_password_form' );


/**
 * Add bootstrap CSS class to readmore blog feed anchor.
 *
 *
 * @return string HTML code of password form
 * @internal
 */
if ( !function_exists( 'cashelrie_filter_gallery_post_style_owl') ) :
	function cashelrie_filter_gallery_post_style_owl( $gallery_html ) {
		if ( $gallery_html && ! is_admin() ) {
			$gallery_html = str_replace( 'gallery ', 'isotope_container ', $gallery_html );
			//if page is current
		}

		return $gallery_html;
	} //cashelrie_filter_gallery_post_style_owl()
endif;
add_filter( 'gallery_style', 'cashelrie_filter_gallery_post_style_owl' );

/**
 * Flush out the transients used in cashelrie_categorized_blog.
 * @internal
 */
if ( !function_exists( 'cashelrie_action_category_transient_flusher' ) ) :
	function cashelrie_action_category_transient_flusher() {
		delete_transient( 'cashelrie_category_count' );
	} //cashelrie_action_category_transient_flusher()
endif;
add_action( 'edit_category', 'cashelrie_action_category_transient_flusher' );
add_action( 'save_post', 'cashelrie_action_category_transient_flusher' );


/**
 * Register widget areas.
 * @internal
 */

if ( !function_exists( 'cashelrie_action_widgets_init' ) ) :
	function cashelrie_action_widgets_init() {
		register_sidebar( array(
			'name'          => esc_html__( 'Main Widget Area', 'cashelrie' ),
			'id'            => 'sidebar-main',
			'description'   => esc_html__( 'Appears in the content section of the site.', 'cashelrie' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer Widget Area', 'cashelrie' ),
			'id'            => 'sidebar-footer',
			'description'   => esc_html__( 'Appears in the footer section of the site.', 'cashelrie' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	} //cashelrie_action_widgets_init()
endif;
add_action( 'widgets_init', 'cashelrie_action_widgets_init' );

/**
 * Processing google fonts customizer options
 */

if ( ! function_exists( 'cashelrie_action_process_google_fonts' ) ) :
	function cashelrie_action_process_google_fonts() {
		$google_fonts        = fw_get_google_fonts();
		$include_from_google = array();

		$font_body     = fw_get_db_customizer_option( 'main_font' );
		$font_headings = fw_get_db_customizer_option( 'h_font' );

		// if is google font
		if ( isset( $google_fonts[ $font_body['family'] ] ) ) {
			$include_from_google[ $font_body['family'] ] = $google_fonts[ $font_body['family'] ];
		}

		if ( isset( $google_fonts[ $font_headings['family'] ] ) ) {
			$include_from_google[ $font_headings['family'] ] = $google_fonts[ $font_headings['family'] ];
		}

		$google_fonts_links = cashelrie_get_remote_fonts( $include_from_google );
		// set a option in db for save google fonts link
		update_option( 'cashelrie_google_fonts_link', $google_fonts_links );
	} //cashelrie_action_process_google_fonts()

endif;
add_action( 'customize_save_after', 'cashelrie_action_process_google_fonts', 999, 2 );

if ( ! function_exists( 'cashelrie_get_remote_fonts' ) ) :
	function cashelrie_get_remote_fonts( $include_from_google ) {
		/**
		 * Get remote fonts
		 *
		 * @param array $include_from_google
		 */
		if ( ! sizeof( $include_from_google ) ) {
			return '';
		}

		$html = "<link href='http://fonts.googleapis.com/css?family=";

		foreach ( $include_from_google as $font => $styles ) {
			$html .= str_replace( ' ', '+', $font ) . ':' . implode( ',', $styles['variants'] ) . '|';
		}

		$html = substr( $html, 0, - 1 );
		$html .= "' rel='stylesheet' type='text/css'>";

		return $html;
	} //cashelrie_get_remote_fonts()
endif;

if ( ! function_exists( 'cashelrie_action_add_login_page_script_and_styles' ) ) :
	function cashelrie_action_add_login_page_script_and_styles( $page ) {
		wp_enqueue_style(
			'cashelrie-login-page-style',
			CASHELRIE_THEME_URI . '/css/login-page.css',
			array(),
			'1.0'
		);
		wp_enqueue_script(
			'cashelrie-login-page-script',
			CASHELRIE_THEME_URI . '/js/login-page.js',
			array( 'jquery' ),
			'1.0',
			false
		);
	}
endif;
add_action( 'login_enqueue_scripts', 'cashelrie_action_add_login_page_script_and_styles' );


//admin dashboard styles and scripts
if ( ! function_exists( 'cashelrie_action_load_custom_wp_admin_style' ) ) :
	function cashelrie_action_load_custom_wp_admin_style() {
		wp_register_style( 'cashelrie_custom_wp_admin_css', CASHELRIE_THEME_URI . '/css/admin-style.css', false, '1.0.0' );
		wp_enqueue_style( 'cashelrie_custom_wp_admin_css' );

		wp_register_style( 'cashelrie_custom_wp_admin_fonts', CASHELRIE_THEME_URI . '/css/fonts.css', false, '1.0.0' );
		wp_enqueue_style( 'cashelrie_custom_wp_admin_fonts' );

		if ( defined( 'FW' ) ) {
			wp_enqueue_script(
				'cashelrie-dashboard-widget-script',
				CASHELRIE_THEME_URI . '/js/dashboard-widget-script.js',
				array( 'jquery' ),
				'1.0',
				false
			);
		}
	} //cashelrie_action_load_custom_wp_admin_style()
endif;
add_action( 'admin_enqueue_scripts', 'cashelrie_action_load_custom_wp_admin_style' );

// removing woo styles
// Remove each style one by one
if ( !function_exists('cashelrie_filter_cashelrie_dequeue_styles')) :
	function cashelrie_filter_cashelrie_dequeue_styles( $enqueue_styles ) {
		unset( $enqueue_styles['woocommerce-general'] );    // Remove the gloss
		unset( $enqueue_styles['woocommerce-layout'] );        // Remove the layout
		unset( $enqueue_styles['woocommerce-smallscreen'] );    // Remove the smallscreen optimisation
		return $enqueue_styles;
	} //cashelrie_filter_cashelrie_dequeue_styles()
endif;
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

//this action defined in functions.php
add_action( 'tgmpa_register', 'cashelrie_action_register_required_plugins' );

if ( !function_exists('cashelrie_filter_wrap_cat_title_before_colon_in_span')) :
	function cashelrie_filter_wrap_cat_title_before_colon_in_span($title) {
		return preg_replace('/^.*: /', '<span class="taxonomy-name-title">${0}</span>', $title );
	}
endif;
add_filter('get_the_archive_title', 'cashelrie_filter_wrap_cat_title_before_colon_in_span');


//if Unyson installed - managing main slider and contact form scripts, sidebars
if ( defined( 'FW' ) ):
	//display main slider
	if ( ! function_exists( 'cashelrie_action_slider' ) ):

		function cashelrie_action_slider() {
			if(is_search()) {
				return;
			}
			$slider_id = fw_get_db_post_option( get_the_ID(), 'slider_id', false );
			if ( fw_ext( 'slider' ) ) {
				echo fw()->extensions->get( 'slider' )->render_slider( $slider_id, false );
			}

		}

		add_action( 'cashelrie_slider', 'cashelrie_action_slider' );

	endif;

	//display blog slider
	if ( ! function_exists( 'cashelrie_action_blog_slider' ) ):

		function cashelrie_action_blog_slider() {

			$blog_slider_options = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'blog_slider_switch' ) : '';
			$blog_slider_enabled = $blog_slider_options['yes'];
			if( $blog_slider_enabled ) {
				$slider_id= $blog_slider_enabled['slider_id'];
				if ( fw_ext( 'slider' ) ) {
					$slider_html = fw()->extensions->get( 'slider' )->render_slider( $slider_id, false );
					if( !empty( $slider_html ) ) {
						?>
						<div class="blog-slider col-sm-12">
							<?php
							echo fw()->extensions->get( 'slider' )->render_slider( $slider_id, false );
							?>
						</div>
						<?php
					}
				}
			}
		}

		add_action( 'cashelrie_blog_slider', 'cashelrie_action_blog_slider' );
	endif;

	//display donations slider
	if ( ! function_exists( 'cashelrie_action_donations_slider' ) ):

		function cashelrie_action_donations_slider() {

			$donations_slider_options = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'donations_slider_switch' ) : '';
			$donations_slider_enabled = $donations_slider_options['yes'];
			if( $donations_slider_enabled ) {
				$slider_id= $donations_slider_enabled['slider_id'];
				if ( fw_ext( 'slider' ) ) {
					$slider_html = fw()->extensions->get( 'slider' )->render_slider( $slider_id, false );
					if( !empty( $slider_html ) ) {
						?>
                        <div class="donations-slider col-sm-12">
							<?php
							echo fw()->extensions->get( 'slider' )->render_slider( $slider_id, false );
							?>
                        </div>
						<?php
					}
				}
			}
		}

		add_action( 'cashelrie_donations_slider', 'cashelrie_action_donations_slider' );
	endif;

	/**
	 * Display current submitted FW_Form errors
	 * @return array
	 */
	if ( ! function_exists( 'cashelrie_action_display_form_errors' ) ):
		function cashelrie_action_display_form_errors() {
			$form = FW_Form::get_submitted();

			if ( ! $form || $form->is_valid() ) {
				return;
			}

			wp_enqueue_script(
				'cashelrie-show-form-errors',
				CASHELRIE_THEME_URI . '/js/form-errors.js',
				array( 'jquery' ),
				'1.0',
				true
			);

			wp_localize_script( 'cashelrie-show-form-errors', '_localized_form_errors', array(
				'errors'  => $form->get_errors(),
				'form_id' => $form->get_id()
			) );
		}
	endif;
	add_action( 'wp_enqueue_scripts', 'cashelrie_action_display_form_errors' );


	//removing standard sliders from Unyson - we use our theme slider
	if ( !function_exists( 'cashelrie_filter_disable_sliders' ) ) :
		function cashelrie_filter_disable_sliders( $sliders ) {
			foreach ( array( 'owl-carousel', 'bx-slider', 'nivo-slider' ) as $name ) {
				$key = array_search( $name, $sliders );
				unset( $sliders[ $key ] );
			}

			return $sliders;
		}
	endif;

	add_filter( 'fw_ext_slider_activated', 'cashelrie_filter_disable_sliders' );

	//removing standard fields from Unyson slider - we use our own slider fields
	if ( !function_exists( 'cashelrie_slider_population_method_custom_options' ) ) :
		function cashelrie_slider_population_method_custom_options( $arr ) {
			/**
			 * Filter for disable standard slider fields for carousel slider
			 *
			 * @param array $arr
			 */
			unset(
				$arr['wrapper-population-method-custom']['options']['custom-slides']['slides_options']['title'],
				$arr['wrapper-population-method-custom']['options']['custom-slides']['slides_options']['desc']
			);

			return $arr;
		}
	endif;
	add_filter( 'fw_ext_theme_slider_population_method_custom_options', 'cashelrie_slider_population_method_custom_options' );

	//adding custom sidebar for shop page if WooCommerce active
	if ( class_exists( 'WooCommerce' ) ) :
		if ( !function_exists( 'cashelrie_filter_fw_ext_sidebars_add_conditional_tag' ) ) :
			function cashelrie_filter_fw_ext_sidebars_add_conditional_tag($conditional_tags) {
				$conditional_tags['is_archive_page_slug'] = array(
					'order_option' => 2, // (optional: default is 1) position in the 'Others' lists in backend
					'check_priority' => 'last', // (optional: default is last, can be changed to 'first') use it to change priority checking conditional tag
					'name' => esc_html__('Products Type - Shop', 'cashelrie'), // conditional tag title
					'conditional_tag' => array(
						'callback' => 'is_shop', // existing callback
						'params' => array('products') //parameters for callback
					)
				);

				return $conditional_tags;
			}
		endif;
		add_filter('fw_ext_sidebars_conditional_tags', 'cashelrie_filter_fw_ext_sidebars_add_conditional_tag' );

		remove_theme_support( 'wc-product-gallery-zoom' );
		remove_theme_support( 'wc-product-gallery-lightbox' );
		remove_theme_support( 'wc-product-gallery-slider' );
	endif; //WooCommerce

	//theme icon fonts
	if ( ! function_exists( 'cashelrie_filter_custom_packs_list' ) ) :
		function cashelrie_filter_custom_packs_list($current_packs) {
			/**
			 * $current_packs is an array of pack names.
			 * You should return which one you would like to show in the picker.
			 */
			return array('social_icons', 'cashelrie_icons', 'font-awesome');
		}
	endif;
	add_filter('fw:option_type:icon-v2:filter_packs', 'cashelrie_filter_custom_packs_list');

	if ( ! function_exists( 'cashelrie_filter_add_my_icon_pack' ) ) :
		function cashelrie_filter_add_my_icon_pack($default_packs) {
			/**
			 * No fear. Defaults packs will be merged in back. You can't remove them.
			 * Changing some flags for them is allowed.
			 */
			return array(
				'cashelrie_icons' => array(
					'name'             => 'cashelrie_icons', // same as key
					'title'            => 'Cachelrie Icons',
					'css_class_prefix' => 'rt-icon2',
					'css_file'         => CASHELRIE_THEME_PATH . '/css/fonts.css',
					'css_file_uri'     => CASHELRIE_THEME_URI . '/css/fonts.css',
				),
				'social_icons' => array(
					'name'             => 'social_icons', // same as key
					'title'            => 'Social Icons',
					'css_class_prefix' => 'socicon',
					'css_file'         => CASHELRIE_THEME_PATH . '/css/fonts.css',
					'css_file_uri'     => CASHELRIE_THEME_URI . '/css/fonts.css',
				)
			);
		}
	endif;
	add_filter('fw:option_type:icon-v2:packs', 'cashelrie_filter_add_my_icon_pack');

	if ( ! function_exists( 'cashelrie_breadcrumbs_blank_search_query_fix' ) ) :
		/**
		 * Breadcrumbs modifications
		 */
		function cashelrie_breadcrumbs_blank_search_query_fix( $items ) {

			if ( is_search() ) {
				if ( trim ( get_search_query() ) == false ) {
					$items[ sizeof( $items ) - 1 ]['name'] = esc_html__( 'Search', 'cashelrie' );
				}
			}

			return $items;
		}
	endif;

	add_filter( 'fw_ext_breadcrumbs_build', 'cashelrie_breadcrumbs_blank_search_query_fix' );

	//enable tags for events
	if ( ! function_exists( 'cashelrie_add_tags_for_events_unyson_extension' ) ) :
		function cashelrie_add_tags_for_events_unyson_extension() {
			return true;
		}
	endif;

	add_filter('fw:ext:events:enable-tags', 'cashelrie_add_tags_for_events_unyson_extension');

endif; //defined('FW')

//adding custom styles to TinyMCE
// Callback function to insert 'styleselect' into the $buttons array
if ( ! function_exists( 'cashelrie_filter_mce_theme_format_insert_button' ) ) :
	function cashelrie_filter_mce_theme_format_insert_button( $buttons ) {
		array_unshift( $buttons, 'styleselect' );

		return $buttons;
	} //cashelrie_filter_mce_theme_format_insert_button()
endif;
// Register our callback to the appropriate filter
add_filter( 'mce_buttons_2', 'cashelrie_filter_mce_theme_format_insert_button' );
// Callback function to filter the MCE settings
if ( ! function_exists( 'cashelrie_filter_mce_theme_format_add_styles' ) ) :
	function cashelrie_filter_mce_theme_format_add_styles( $init_array ) {
		// Define the style_formats array
		$style_formats = array(
			// Each array child is a format with it's own settings
			array(
				'title'   => esc_html__( 'Excerpt', 'cashelrie' ),
				'block'   => 'p',
				'classes' => 'entry-excerpt',
				'wrapper' => false,
			),
			array(
				'title'   => esc_html__( 'Paragraph with dropcap', 'cashelrie' ),
				'block'   => 'p',
				'classes' => 'big-first-letter',
				'wrapper' => false,
			),
			array(
				'title'   => esc_html__( 'Main theme color', 'cashelrie' ),
				'inline'  => 'span',
				'classes' => 'highlight',
				'wrapper' => false,
			),

		);
		// Insert the array, JSON ENCODED, into 'style_formats'
		$init_array['style_formats'] = json_encode( $style_formats );

		return $init_array;

	} //cashelrie_filter_mce_theme_format_add_styles()
endif;
// Attach callback to 'tiny_mce_before_init'
add_filter( 'tiny_mce_before_init', 'cashelrie_filter_mce_theme_format_add_styles', 1 );


//demo content on remote hosting
/**
 * @param FW_Ext_Backups_Demo[] $demos
 *
 * @return FW_Ext_Backups_Demo[]
 */


if ( ! function_exists( 'cashelrie_filter_theme_fw_ext_backups_demos' ) ) :

	function cashelrie_filter_theme_fw_ext_backups_demos( $demos ) {
		$demo_version_suffix = '-v' . CASHELRIE_REMOTE_DEMO_VERSION; // '-v1.0.0'

		$demos_array = array (
			'cashelrie-demo' . $demo_version_suffix => array (
				'title'        => esc_html__( 'Cachelrie Demo', 'cashelrie' ),
				'screenshot'   => esc_url('http://webdesign-finder.com/remote-demo-content/cashelrie/demo/screenshot.png'),
				'preview_link' => esc_url('http://webdesign-finder.com/cashelrie/'),
			),
		);

		// You may request this demo id from this theme author to get a colorized demo content. See the author contacts information.
		$secret_demo_id = CASHELRIE_REMOTE_DEMO_ID;
		if ( $secret_demo_id ) {
			$demos_array['cashelrie-demo-colorized-' . $secret_demo_id . $demo_version_suffix] = array(
				'title' => esc_html__('Cachelrie Demo Colorized', 'cashelrie'),
				'screenshot' => esc_url('http://webdesign-finder.com/remote-demo-content/cashelrie/demo-colorized/screenshot.png'),
				'preview_link' => esc_url('http://webdesign-finder.com/cashelrie/'),
			);
		}

		// remote demo URL
		$download_url = esc_url('http://webdesign-finder.com/remote-demo-content/cashelrie');

		foreach ( $demos_array as $id => $data ) {
			$demo = new FW_Ext_Backups_Demo( $id, 'piecemeal', array (
				'url'     => $download_url,
				'file_id' => $id,
			) );
			$demo->set_title( $data[ 'title' ] );
			$demo->set_screenshot( $data[ 'screenshot' ] );
			$demo->set_preview_link( $data[ 'preview_link' ] );

			$demos[ $demo->get_id() ] = $demo;

			unset( $demo );
		}

		return $demos;
	} //cashelrie_filter_theme_fw_ext_backups_demos()
endif;
add_filter( 'fw:ext:backups-demo:demos', 'cashelrie_filter_theme_fw_ext_backups_demos' );


//////////
//Booked//
//////////
//Remove Booked plugin front-end color theme (color-theme.php)
if( class_exists('booked_plugin')) {
	remove_action( 'wp_enqueue_scripts', array('booked_plugin', 'front_end_color_theme'));
}//Booked

//renaming projects to gallery
if ( ! function_exists( 'cashelrie_projects_change_post_names' ) ):
	function cashelrie_projects_change_post_names() {
		return array(
			'singular' => esc_html__( 'Project', 'cashelrie' ),
			'plural'   => esc_html__( 'Gallery', 'cashelrie' )
		);
	}
endif;

add_action( 'fw_ext_projects_post_type_name', 'cashelrie_projects_change_post_names' );
