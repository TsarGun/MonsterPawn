<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * Helper functions and classes with static methods for usage in theme
 */

/**
 * Register Theme Google font.
 *
 * @return string
 */

if ( ! function_exists( 'cashelrie_google_font_url' ) ) :
	function cashelrie_google_font_url() {
		$fonts_url = '';
		$fonts     = array();

		/* Standard Theme Fonts */
		$fonts['Playfair Display'] = array(
			'google_font'    => true,
			'subset'         => 'latin',
			'variation'      => '400',
			'variants'       => array( '400', '400i', '700', '900' ),
			'family'         => 'Playfair Display',
			'style'          => false,
			'weight'         => false,
			'size'           => '16',
			'line-height'    => '30',
			'letter-spacing' => '0',
			'color'          => false,
		);

		$fonts['Poppins'] = array(
			'google_font'    => true,
			'subset'         => 'latin',
			'variation'      => '300',
			'variants'       => array( '300', '300i', '500', '600', '900' ),
			'family'         => 'Poppins',
			'style'          => false,
			'weight'         => false,
			'size'           => '16',
			'line-height'    => '30',
			'letter-spacing' => '0',
			'color'          => false,
		);

		$fonts['Vidaloka'] = array(
			'google_font'    => true,
			'subset'         => 'latin',
			'variation'      => '400',
			'variants'       => array( '400' ),
			'family'         => 'Vidaloka',
			'style'          => false,
			'weight'         => false,
			'size'           => '16',
			'line-height'    => '30',
			'letter-spacing' => '0',
			'color'          => false,
		);

		//checking fonts from customizer if Unyson exists
		if ( function_exists( 'fw_get_google_fonts' ) ) {
			//grabbing all available fonts
			$google_fonts = fw_get_google_fonts();

			$font_body_options = fw_get_db_customizer_option( 'body_font_picker_switch' );
			$font_body_enabled = (boolean) $font_body_options['main_font_enabled'];
			$font_body         = $font_body_options['main_font_options']['main_font'];

			$font_headings_options = fw_get_db_customizer_option( 'h_font_picker_switch' );
			$font_headings_enabled = (boolean) $font_headings_options['h_font_enabled'];
			$font_headings         = $font_headings_options['h_font_options']['h_font'];

			//including fonts from theme in main fonts array
			if ( $font_body_enabled ) {
				$fonts[ $font_body['family'] ] = $font_body;
				// adding font variations to main fonts array to create link to Google Fonts below
				if ( isset( $google_fonts[ $font_body['family'] ] ) ) {
					$fonts[ $font_body['family'] ]['variants'] = $google_fonts[ $font_body['family'] ]['variants'];
				}
			}
			if ( $font_headings_enabled ) {
				$fonts[ $font_headings['family'] ] = $font_headings;
				if ( isset( $google_fonts[ $font_headings['family'] ] ) ) {
					$fonts[ $font_headings['family'] ]['variants'] = $google_fonts[ $font_headings['family'] ]['variants'];
				}
			}
		}

		$fonts_url = '//fonts.googleapis.com/css?family=';
		$subsets   = array();
		foreach ( $fonts as $font => $styles ) {
			if ( ! empty ( $styles['variants'] ) ) {

				$fonts_url .= str_replace( ' ', '+', $font ) . ':' . implode( ',', $styles['variants'] ) . '|';
				$subsets[] = $styles['subset'];
			}

		}
		$fonts_url = substr( $fonts_url, 0, - 1 );
		$fonts_url .= '&subset=' . implode( ',', array_unique( $subsets ) );

		return urldecode( $fonts_url );
	} //cashelrie_google_font_url()
endif;

if ( ! function_exists( 'cashelrie_add_font_styles_in_head' ) ) :
	function cashelrie_add_font_styles_in_head() {
		if ( function_exists( 'fw_get_db_customizer_option' ) ) {

			$font_body_options = fw_get_db_customizer_option( 'body_font_picker_switch' );
			$font_body_enabled = (boolean) $font_body_options['main_font_enabled'];
			$font_body         = $font_body_options['main_font_options']['main_font'];

			$font_headings_options = fw_get_db_customizer_option( 'h_font_picker_switch' );
			$font_headings_enabled = (boolean) $font_headings_options['h_font_enabled'];
			$font_headings         = $font_headings_options['h_font_options']['h_font'];

			$output = "";
			if ( $font_body_enabled ) {
				$output .= "body {
								font-family : \"{$font_body['family']}\", sans-serif;
								font-weight: {$font_body['variation']};
								font-size: {$font_body['size']}px;
								line-height: {$font_body['line-height']}px;
								letter-spacing: {$font_body['letter-spacing']}px;
							}";
			}
			if ( $font_headings_enabled ) {

				$output .= "h1, h2, h3, h4, h5, h6 {
								font-family : \"{$font_headings['family']}\", sans-serif;
								letter-spacing: {$font_headings['letter-spacing']}px;
							}";
			}

			return ( wp_kses( $output, false ) );

		} else {
			return false;
		}
	} //cashelrie_add_font_styles_in_head()

endif;

/**
 *
 * checking for Unyson installed and returning walker for change comments HTML
 */

if ( ! function_exists( 'cashelrie_return_comments_walker' ) ) :
	function cashelrie_return_comments_walker() {
		return new Cachelrie_Comments_Walker;
	}
endif;


if ( ! function_exists( 'cashelrie_the_attached_image' ) ) :
	/**
	 * Print the attached image with a link to the next attached image.
	 */
	function cashelrie_the_attached_image() {
		$post = get_post();
		/**
		 * Filter the default attachment size.
		 *
		 * @param array $dimensions {
		 *     An array of height and width dimensions.
		 *
		 * @type int $height Height of the image in pixels. Default 810.
		 * @type int $width Width of the image in pixels. Default 810.
		 * }
		 */
		$attachment_size     = apply_filters( 'cashelrie_attachment_size', array( 810, 810 ) );
		$next_attachment_url = wp_get_attachment_url();

		/*
		 * Grab the IDs of all the image attachments in a gallery so we can get the URL
		 * of the next adjacent image in a gallery, or the first image (if we're
		 * looking at the last image in a gallery), or, in a gallery of one, just the
		 * link to that image file.
		 */
		$attachment_ids = get_posts( array(
			'post_parent'    => $post->post_parent,
			'fields'         => 'ids',
			'numberposts'    => - 1,
			'post_status'    => 'inherit',
			'post_type'      => 'attachment',
			'post_mime_type' => 'image',
			'order'          => 'ASC',
			'orderby'        => 'menu_order ID',
		) );

		// If there is more than 1 attachment in a gallery...
		if ( count( $attachment_ids ) > 1 ) {
			foreach ( $attachment_ids as $attachment_id ) {
				if ( $attachment_id == $post->ID ) {
					$next_id = current( $attachment_ids );
					break;
				}
			}

			// get the URL of the next image attachment...
			if ( $next_id ) {
				$next_attachment_url = get_attachment_link( $next_id );
			} // or get the URL of the first image attachment.
			else {
				$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
			}
		}

		printf( '<a href="%1$s" rel="attachment">%2$s</a>',
			esc_url( $next_attachment_url ),
			wp_get_attachment_image( $post->ID, $attachment_size )
		);
	} //cashelrie_the_attached_image()

endif;

if ( ! function_exists( 'cashelrie_list_authors' ) ) :
	/**
	 * Print a list of all site authors who published at least one post.
	 */
	function cashelrie_list_authors($only_post_author = true) {
		if ( $only_post_author ) {
			$author_id = get_the_author_meta('ID');
			$author_ids = get_users( array(
				'fields'  => 'ID',
				'include' => array(
					$author_id
				)
			) );
		} else {
			// all authors with at least one post.
			$author_ids = get_users( array(
				'fields'  => 'ID',
				'orderby' => 'post_count',
				'order'   => 'DESC',
				'who'     => 'authors',
			) );
		}

		foreach ( $author_ids as $author_id ) :
			$post_count = count_user_posts( $author_id );

			// Move on if user has not published a post (yet).
			if ( ! $post_count ) {
				continue;
			}
			$twitter_url     = get_the_author_meta( 'twitter', $author_id );
			$facebook_url    = get_the_author_meta( 'facebook', $author_id );
			$google_plus_url = get_the_author_meta( 'google_plus', $author_id );
			$youtube         = get_the_author_meta( 'youtube', $author_id );
			$author_bio      = get_the_author_meta( 'description', $author_id );
			$author_position = get_the_author_meta( 'position', $author_id );
			// Not showing meta if no author bio
			if ( ! $author_bio ) {
				continue;
			}
			?>
			<div class="author-meta side-item side-md content-padding big-padding with_border">
				<div class="row">
					<div class="col-xs-12 col-sm-5 col-md-4">
						<div class="item-media">
							<?php echo get_avatar( $author_id, 700 ); ?>
						</div><!-- eof .item-media -->
					</div><!-- eof .col-md-* -->
					<div class="col-xs-12 col-sm-7 col-md-8">
						<div class="item-content">
                            <header class="entry-header content-justify v-center">
                                <h3 class="margin_0">
		                            <?php the_author_posts_link(); ?>
                                </h3>

	                            <?php if ( $author_position ) : ?>
                                    <p class="small-text small highlight3">
			                            <?php echo wp_kses_post( $author_position ); ?>
                                    </p>
	                            <?php endif; ?>
                            </header>
                            <?php if ( $author_bio ) : ?>
								<p class="author-bio">
									<?php echo wp_kses_post( $author_bio ); ?>
								</p>
							<?php endif; //author_bio
							if ( $twitter_url || $facebook_url || $google_plus_url || $google_plus_url ) :
								?>
								<span class="author-social">
									<?php if ( $twitter_url ) : ?>
                                         <a href="<?php echo esc_url( $twitter_url ) ?>"
                                               class="social-icon socicon-twitter"></a>
									<?php endif; ?>
									<?php if ( $facebook_url ) : ?>
                                         <a href="<?php echo esc_url( $facebook_url ) ?>"
                                               class="social-icon socicon-facebook"></a>
									<?php endif; ?>
									<?php if ( $google_plus_url ) : ?>
                                         <a href="<?php echo esc_url( $google_plus_url ) ?>"
                                               class="social-icon socicon-google"></a>
									<?php endif; ?>
									<?php if ( $youtube ) : ?>
                                         <a href="<?php echo esc_url( $youtube ) ?>"
                                               class="social-icon socicon-youtube"></a>
									<?php endif; ?>
								</span><!-- eof .author-social -->
								<?php
							endif; //author social
							?>
						</div><!-- eof .item-content -->
					</div><!-- eof .col-md-* -->
				</div>
				<!-- .author-info -->
			</div><!-- eof author-meta -->
			<?php
		endforeach;
	} //cashelrie_list_authors()

endif;

if ( ! function_exists( 'cashelrie_is_active_widgets_in_main_sidebar_exists' ) ) :
	/**
	 * Define is sidebar that must be shown has active widgets
	 */
	function cashelrie_is_active_widgets_in_main_sidebar_exists() {
		//default value
		$return = true;

		//if Unyson exists
		if ( function_exists( 'fw_ext_sidebars_show' ) ) {
			//if custom sidebar is set for current page
			if ( fw_ext_sidebars_show( 'blue' ) ) {
				//if custom sidebar is not empty - see theme/framework-customizations/extensions/sidebars/views/frontend-no-widgets.php
				if ( fw_ext_sidebars_show( 'blue' ) !== '1' ) {
					$return = true;
				} else {
					$return = false;
				}
				//if no custom sidebar but Unyson exists
			} else {
				//if no default sidebar
				if ( ! is_active_sidebar( 'sidebar-main' ) ) {
					$return = false;
				} else {
					$return = true;
				}
			}
			//no Unyson and empty sidebar
		} else {
			if ( ! is_active_sidebar( 'sidebar-main' ) ) {
				$return = false;
			} else {
				$return = true;
			}
		}
		return $return;
	}
endif;

if ( ! function_exists( 'cashelrie_get_columns_classes' ) ) :
	/**
	 * Define a sidebar position for manage main column CSS class, sidebar CSS class and visibility of sidebar.
	 * return array
	 */
	function cashelrie_get_columns_classes( $full_width = false ) {
		//default values
		$column_classes = array(
			'main_column_class' => 'col-xs-12 col-md-8 col-lg-9',
			'sidebar_class'     => 'col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-0 col-lg-3'
		);
		if ( is_page() ) {
			$column_classes['main_column_class'] = "col-xs-12";
			$column_classes['sidebar_class']     = false;

			//if no Unyson installed - return - no sidebar on pages by default
			if ( ! function_exists( 'fw_ext_sidebars_show' ) ) {
				return $column_classes;
			}
		}

		//check for unyson
		if ( function_exists( 'fw_ext_sidebars_get_current_position' ) ) {

			//full width
			if ( in_array( fw_ext_sidebars_get_current_position(), array( 'full' ) ) ) {

				$column_classes['main_column_class'] = "col-xs-12";
				$column_classes['sidebar_class']     = false;

				//left sidebar
			} elseif ( in_array( fw_ext_sidebars_get_current_position(), array( 'left' ) ) ) {
				$column_classes['main_column_class'] = "col-xs-12 col-md-8 col-lg-9 col-md-push-4 col-lg-push-3";
				$column_classes['sidebar_class']     = "col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-0 col-lg-3 col-md-pull-8 col-lg-pull-9";

			} elseif ( in_array( fw_ext_sidebars_get_current_position(), array( 'right' ) ) ) {
				$column_classes['main_column_class'] = "col-xs-12 col-md-8 col-lg-9";
				$column_classes['sidebar_class']     = "col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-0 col-lg-3";

			}
			//no catching right sidebar. Right sidebar is default
			else {

				//default - right sidebar
				$column_classes['main_column_class'] = "col-xs-12 col-md-8 col-lg-9";
				$column_classes['sidebar_class']     = "col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-0 col-lg-3";

				//default for page is fullwidth - do we need this?
				if ( is_page() ) {
					$column_classes['main_column_class'] = "col-xs-12";
					$column_classes['sidebar_class']     = false;
				}

			}
		}

		if ( $full_width || !cashelrie_is_active_widgets_in_main_sidebar_exists() ) {
			$column_classes['main_column_class'] = "col-xs-12";
			$column_classes['sidebar_class']     = false;
		}

		return $column_classes;

	} //cashelrie_get_columns_classes()

endif;

if ( ! function_exists( 'cashelrie_get_columns_classes_for_unyson_extended' ) ) :
	/**
	 * Define a sidebar position for manage main column CSS class, sidebar CSS class and visibility of sidebar.
	 * return array
	 */
	function cashelrie_get_columns_classes_for_unyson_extended( $full_width = false ) {

		// Sidebar Position

		// default
		$sidebar_position = apply_filters( 'cashelrie_default_sidebar_position', 'right' );

		// get position
		if ( function_exists( 'fw_ext_sidebars_get_current_position' ) ) {
			$unyson_position = fw_ext_sidebars_get_current_position();
			if ( null != $unyson_position ) {
				$sidebar_position = $unyson_position;
			}
		}

		// is unyson sidebar
		$unyson_sidebar = false;
		if ( function_exists( 'fw_ext_sidebars_get_current_preset' ) ) {
			$unyson_sidebar = fw_ext_sidebars_get_current_preset();
		}

		// is sidebar empty ( no widgets )
		$empty = false;
		if ( apply_filters( 'cashelrie_check_for_widgets', true ) ) {
			if ( is_array( $unyson_sidebar ) ) {
				if ( array_key_exists( 'sidebars', (array) $unyson_sidebar ) ) {
					if ( array_key_exists( 'blue', $unyson_sidebar['sidebars'] ) ) {
						$sidebars_widgets = wp_get_sidebars_widgets();
						if ( is_array( $sidebars_widgets ) ) {
							if ( empty( $sidebars_widgets[ $unyson_sidebar['sidebars']['blue'] ] ) ) {
								$empty = true;
							}
						}
					}
				}
			} elseif ( ! is_active_sidebar( 'sidebar-main' ) ) {
				$empty = true;
			}
		}

		// URL parameter
		if ( isset( $_GET['sidebar_position'] ) && ! $empty ) {
			$sidebar_position = esc_attr ( $_GET['sidebar_position'] );
		}

		// direct forbidden
		if ( $empty || is_page() || $full_width || 'attachment' == get_post_type() ) {
			$sidebar_position = 'full';
		}


		// Content/Sidebar width

		$s = apply_filters( 'cashelrie_sidebar_width', 4 );             // sidebar width

		$c = 12 - $s;       // content width


		// Content/Sidebar Classes

		// Sidebar Right
		$column_classes['main_column_class'] = 'col-sm-7 col-md-' . $c . ' col-lg-' . $c;
		$column_classes['sidebar_class']     = 'col-sm-5 col-md-' . $s . ' col-lg-' . $s;

		// Sidebar Left
		if ( 'left' == $sidebar_position ) {
			$column_classes['main_column_class'] = 'col-sm-7 col-md-' . $c . ' col-lg-' . $c . ' col-sm-push-5 col-md-push-' . $s . ' col-lg-push-' . $s;
			$column_classes['sidebar_class']     = 'col-sm-5 col-md-' . $s . ' col-lg-' . $s . ' col-sm-pull-7 col-md-pull-' . $c . ' col-lg-pull-' . $c;
		}

		// No Sidebar
		if ( 'full' == $sidebar_position ) {
			$column_classes['main_column_class'] = 'col-sm-12';
			$column_classes['sidebar_class']     = false;
		}

		return $column_classes;

	} //cashelrie_get_columns_classes()

endif;

/**
 * Custom template tags
 */

/**
 * Retrieve paginated link for archive post pages.
 *
 * Modification of standard WordPress paginate_links function to create Twitter Bootstrap pagination
 *
 * @global WP_Query $wp_query
 * @global WP_Rewrite $wp_rewrite
 *
 * @param string|array $args {
 *     Optional. Array or string of arguments for generating paginated links for archives.
 *
 * @type string $base Base of the paginated url. Default empty.
 * @type string $format Format for the pagination structure. Default empty.
 * @type int $total The total amount of pages. Default is the value WP_Query's
 *                                      `max_num_pages` or 1.
 * @type int $current The current page number. Default is 'paged' query var or 1.
 * @type bool $show_all Whether to show all pages. Default false.
 * @type int $end_size How many numbers on either the start and the end list edges.
 *                                      Default 1.
 * @type int $mid_size How many numbers to either side of the current pages. Default 2.
 * @type bool $prev_next Whether to include the previous and next links in the list. Default true.
 * @type bool $prev_text The previous page text. Default '« Previous'.
 * @type bool $next_text The next page text. Default '« Previous'.
 * @type string $type Controls format of the returned value. Possible values are 'plain',
 *                                      'array' and 'list'. Default is 'plain'.
 * @type array $add_args An array of query args to add. Default false.
 * @type string $add_fragment A string to append to each link. Default empty.
 * @type string $before_page_number A string to appear before the page number. Default empty.
 * @type string $after_page_number A string to append after the page number. Default empty.
 * }
 * @return array|string|void String of page links or array of page links.
 */
if ( ! function_exists( 'cashelrie_bootstrap_paginate_links' ) ) {
	function cashelrie_bootstrap_paginate_links( $args = '' ) {
		global $wp_query, $wp_rewrite;

		// Setting up default values based on the current URL.
		$pagenum_link = html_entity_decode( get_pagenum_link() );
		$url_parts    = explode( '?', $pagenum_link );

		// Get max pages and current page out of the current query, if available.
		$total   = isset( $wp_query->max_num_pages ) ? $wp_query->max_num_pages : 1;
		$current = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;

		// Append the format placeholder to the base URL.
		$pagenum_link = trailingslashit( $url_parts[0] ) . '%_%';

		// URL base depends on permalink settings.
		$format = $wp_rewrite->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
		$format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';

		$defaults = array(
			'base'               => $pagenum_link,
			// http://example.com/all_posts.php%_% : %_% is replaced by format (below)
			'format'             => $format,
			// ?page=%#% : %#% is replaced by the page number
			'total'              => $total,
			'current'            => $current,
			'show_all'           => false,
			'prev_next'          => true,
			'prev_text'          => '<span class="sr-only">' . esc_html__( 'Prev', 'cashelrie' ) . '</span><i class="fa fa-angle-left"></i>',
			'next_text'          => '<span class="sr-only">' . esc_html__( 'Next', 'cashelrie' ) . '</span><i class="fa fa-angle-right"></i>',
			'end_size'           => 1,
			'mid_size'           => 2,
			'type'               => 'plain',
			'add_args'           => array(),
			// array of query args to add
			'add_fragment'       => '',
			'before_page_number' => '',
			'after_page_number'  => ''
		);

		$args = wp_parse_args( $args, $defaults );

		if ( ! is_array( $args['add_args'] ) ) {
			$args['add_args'] = array();
		}

		// Merge additional query vars found in the original URL into 'add_args' array.
		if ( isset( $url_parts[1] ) ) {
			// Find the format argument.
			$format       = explode( '?', str_replace( '%_%', $args['format'], $args['base'] ) );
			$format_query = isset( $format[1] ) ? $format[1] : '';
			wp_parse_str( $format_query, $format_args );

			// Find the query args of the requested URL.
			wp_parse_str( $url_parts[1], $url_query_args );

			// Remove the format argument from the array of query arguments, to avoid overwriting custom format.
			foreach ( $format_args as $format_arg => $format_arg_value ) {
				unset( $url_query_args[ $format_arg ] );
			}

			$args['add_args'] = array_merge( $args['add_args'], urlencode_deep( $url_query_args ) );
		}

		// Who knows what else people pass in $args
		$total = (int) $args['total'];
		if ( $total < 2 ) {
			return;
		}
		$current  = (int) $args['current'];
		$end_size = (int) $args['end_size']; // Out of bounds?  Make it the default.
		if ( $end_size < 1 ) {
			$end_size = 1;
		}
		$mid_size = (int) $args['mid_size'];
		if ( $mid_size < 0 ) {
			$mid_size = 2;
		}
		$add_args   = $args['add_args'];
		$r          = '';
		$page_links = array();
		$dots       = false;

		//PREV button
		if ( $args['prev_next'] && $current ) :
			$link = str_replace( '%_%', 2 == $current ? '' : $args['format'], $args['base'] );
			$link = str_replace( '%#%', $current - 1, $link );

			if ( $add_args && 1 < $current ) {
				$link = add_query_arg( $add_args, $link );
			}

			$link .= $args['add_fragment'];

			$link_html = '<a class="prev page-numbers" href="' . esc_url( apply_filters( 'paginate_links', $link ) ) . '">' . $args['prev_text'] . '</a>';
			$disabled  = '';
			if ( 1 >= $current ) {
				$disabled  = ' active disabled';
				$link_html = '<span class="prev page-numbers">' . $args['prev_text'] . '</span>';
			}

			/**
			 * Filter the paginated links for the given archive pages.
			 *
			 * @since 3.0.0
			 *
			 * @param string $link The paginated link URL.
			 */
			$page_links[] = '<li class="prev' . $disabled . '">' . $link_html . '</li>';
		endif;
		for ( $n = 1; $n <= $total; $n ++ ) :
			if ( $n == $current ) :
				$page_links[] = "<li class='active'><span class='page-numbers current'>" . $args['before_page_number'] . number_format_i18n( $n ) . $args['after_page_number'] . "</span></li>";
				$dots         = true;
			else :
				if ( $args['show_all'] || ( $n <= $end_size || ( $current && $n >= $current - $mid_size && $n <= $current + $mid_size ) || $n > $total - $end_size ) ) :
					$link = str_replace( '%_%', 1 == $n ? '' : $args['format'], $args['base'] );
					$link = str_replace( '%#%', $n, $link );
					if ( $add_args ) {
						$link = add_query_arg( $add_args, $link );
					}
					$link .= $args['add_fragment'];

					/** This filter is documented in wp-includes/general-template.php */
					$page_links[] = "<li><a class='page-numbers' href='" . esc_url( apply_filters( 'paginate_links', $link ) ) . "'>" . $args['before_page_number'] . number_format_i18n( $n ) . $args['after_page_number'] . "</a></li>";
					$dots         = true;
				elseif ( $dots && ! $args['show_all'] ) :
					$page_links[] = '<li class="disabled"><span class="page-numbers dots">&hellip;</span></li>';
					$dots         = false;
				endif;
			endif;
		endfor;

		//NEXT button
		if ( $args['prev_next'] && $current ) :
			$link = str_replace( '%_%', $args['format'], $args['base'] );
			$link = str_replace( '%#%', $current + 1, $link );
			if ( $add_args ) {
				$link = add_query_arg( $add_args, $link );
			}
			$link .= $args['add_fragment'];
			$link_html = '<a class="next page-numbers" href="' . esc_url( apply_filters( 'paginate_links', $link ) ) . '">' . $args['next_text'] . '</a>';
			$disabled  = '';
			if ( $current >= $total || - 1 == $total ) {
				$disabled  = ' disabled active';
				$link_html = '<span class="next page-numbers">' . $args['next_text'] . '</span>';
			}

			/** This filter is documented in wp-includes/general-template.php */
			$page_links[] = '<li class="next ' . $disabled . '"> ' . $link_html . ' </li>';
		endif;
		//ignoring type as bootstrap prints only in UL
		$r .= '<ul class="pagination">';
		$r .= join( "\n", $page_links );
		$r .= '</ul>';

		return $r;
	} //cashelrie_bootstrap_paginate_links()
}

if ( ! function_exists( 'cashelrie_paging_nav' ) ) :
	/**
	 * Display navigation to next/previous set of posts when applicable.
	 */
	function cashelrie_paging_nav( $wp_query = null, $wrapper = null ) {

		if ( ! $wp_query ) {
			$wp_query = $GLOBALS['wp_query'];
		}

		// Don't print empty markup if there's only one page.

		if ( $wp_query->max_num_pages < 2 ) {
			return;
		}

		$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
		$pagenum_link = html_entity_decode( get_pagenum_link() );
		$query_args   = array();
		$url_parts    = explode( '?', $pagenum_link );

		if ( isset( $url_parts[1] ) ) {
			wp_parse_str( $url_parts[1], $query_args );
		}

		$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
		$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

		$format = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link,
			'index.php' ) ? 'index.php/' : '';
		$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%',
			'paged' ) : '?paged=%#%';

		// Set up paginated links.
		$links = cashelrie_bootstrap_paginate_links( array(
			'base'      => $pagenum_link,
			'format'    => $format,
			'show_all'  => false,
			'total'     => $wp_query->max_num_pages,
			'current'   => $paged,
			'mid_size'  => 1,
			'type'      => 'list',
			'add_args'  => array_map( 'urlencode', $query_args ),
			'prev_text' => '<i class="fa fa-angle-left" aria-hidden="true"></i>',
			'next_text' => '<i class="fa fa-angle-right" aria-hidden="true"></i>',
		) );

		if ( $links ) :
			if ( $wrapper ) : ?>
				<div class="muted_background">
				<?php
			endif;
			?>
			<nav class="loop-pagination text-center">
				<?php
				echo wp_kses_post( $links );
				?>
			</nav><!-- .navigation -->
			<?php
			if ( $wrapper ) : ?>
				</div>
				<?php
			endif;
		endif;
	} //cashelrie_paging_nav()

endif;

if ( ! function_exists( 'cashelrie_paging_comments_nav ' ) ) :
	/**
	 * Display navigation to next/previous set of posts when applicable.
	 */
	function cashelrie_paging_comments_nav( $args = array() ) {

		global $wp_rewrite;

		//for checker
		$comments_pagination = paginate_comments_links( array( 'echo' => false ) );

		if ( ! is_singular() ) {
			return;
		}

		$page = get_query_var( 'cpage' );
		if ( ! $page ) {
			$page = 1;
		}
		$max_page = get_comment_pages_count();
		$defaults = array(
			'base'         => add_query_arg( 'cpage', '%#%' ),
			'format'       => '',
			'total'        => $max_page,
			'current'      => $page,
			'echo'         => true,
			'add_fragment' => '#comments',
			'prev_text' => '<i class="fa fa-angle-left" aria-hidden="true"></i>',
			'next_text' => '<i class="fa fa-angle-right" aria-hidden="true"></i>',
		);
		if ( $wp_rewrite->using_permalinks() ) {
			$defaults['base'] = user_trailingslashit( trailingslashit( get_permalink() ) . $wp_rewrite->comments_pagination_base . '-%#%', 'commentpaged' );
		}

		$args       = wp_parse_args( $args, $defaults );
		$page_links = cashelrie_bootstrap_paginate_links( $args );

		if ( $args['echo'] ) {
			echo wp_kses_post ( $page_links );
		} else {
			return $page_links;
		}
	} //cashelrie_paging_comments_nav()

endif;

/**
 * Find out if blog has more than one category.
 *
 * @return boolean true if blog has more than 1 category
 */
if ( ! function_exists( 'cashelrie_categorized_blog' ) ) :
	function cashelrie_categorized_blog() {
		if ( false === ( $all_categories = get_transient( 'cashelrie_category_count' ) ) ) {
			// Create an array of all the categories that are attached to posts
			$all_categories = get_categories( array(
				'hide_empty' => 1,
			) );

			// Count the number of categories that are attached to the posts
			$all_categories = count( $all_categories );

			set_transient( 'cashelrie_category_count', $all_categories );
		}

		if ( 1 !== (int) $all_categories ) {
			// This blog has more than 1 category so cashelrie_categorized_blog should return true
			return true;
		} else {
			// This blog has only 1 category so cashelrie_categorized_blog should return false
			return false;
		}
	} //cashelrie_categorized_blog()
endif;

if ( ! function_exists( 'cashelrie_post_nav' ) ) :
	/**
	 * Display navigation to next/previous post when applicable.
	 */
	function cashelrie_post_nav() {
		// Don't print empty markup if there's nowhere to navigate.
		$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '',
			true );
		$next     = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous ) {
			return;
		}
		?>

        <div class="row page-nav columns_padding_5">
            <div class="col-xs-12 col-sm-6">
				<?php if ( $previous ) : ?>
                    <div class="nav-item prev-item">
                        <a class="theme_button color1 inverse block_button" href="<?php echo esc_url( get_permalink( $previous ) ); ?>"><?php echo esc_html__( 'Previous Post', 'cashelrie' ); ?></a>
                    </div>
				<?php endif; ?>
            </div>
            <div class="col-xs-12 col-sm-6 text-center">
				<?php if ( $next ) : ?>
                    <div class="nav-item next-item">
                        <a class="theme_button color1 inverse block_button" href="<?php echo esc_url( get_permalink( $next ) ); ?>"><?php echo esc_html__( 'Next Post', 'cashelrie' ); ?></a>
                    </div>
				<?php endif; ?>
            </div>
        </div>

	<?php } //cashelrie_post_nav
endif;

if ( ! function_exists( 'cashelrie_related_posts' ) ) :
	/**
	 * Display related posts.
	 */
	function cashelrie_related_posts() {
		global $post;
		$orig_post = $post;
        $tags = wp_get_post_tags($post->ID);

        if ($tags) {
	        $tag_ids = array();
	        foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
	        $args=array(
		        'tag__in' => $tag_ids,
		        'post__not_in' => array($post->ID),
		        'posts_per_page'=> 4, // Number of related posts to display.
		        'ignore_sticky_posts '=> true
	        );

	        $my_query = new wp_query( $args );

	        if ( !empty( $my_query->posts ) ) { ?>

                <?php
		        $hasSidebar = ( cashelrie_get_columns_classes()['main_column_class'] === 'col-xs-12' ) ? false : true;
		        $carousel_lg = 3;
		        $carousel_md = 2;
		        $carousel_sm = 2;
		        if ( !$hasSidebar ) {
			        $carousel_lg = 3;
			        $carousel_md = 3;
			        $carousel_sm = 2;
		        }
                ?>

                <div class="post-related">
                    <h2 class="text-center">
                        <?php echo esc_html__( 'You May Also Like', 'cashelrie' ); ?>
                    </h2>
                    <div class="owl-carousel loop-colors"
                         data-responsive-lg="<?php echo esc_attr( $carousel_lg ); ?>"
                         data-responsive-md="<?php echo esc_attr( $carousel_md ); ?>"
                         data-responsive-sm="<?php echo esc_attr( $carousel_sm ); ?>"
                         data-responsive-xs="2"
                         data-nav="true"
                         data-loop="true"
                         data-margin="10"
                         data-autoplay="true"

                    >
	                    <?php while( $my_query->have_posts() ) {
		                    $my_query->the_post();
		                    ?>
                                <article id="post-<?php the_ID(); ?>" <?php post_class( 'vertical-item content-padding with_border with_background text-center' ); ?>>

				                    <?php
                                    //detecting featured video
		                            $embed_url = function_exists( 'fw_get_db_post_option' ) ? fw_get_db_post_option( get_the_ID(), 'post-featured-video', '' ) : '';
		                            cashelrie_post_thumbnail( false, true ); ?>
                                    <div class="item-content">
                                        <header class="entry-header">
                                            <?php
                                            the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
                                            ?>
                                            <div class="entry-meta">
                                                <?php cashelrie_posted_on( true ); ?>
                                            </div>
                                        </header>
                                    </div>
                                </article>
	                    <?php } ?>
                    </div>
                </div>
            <?php }
        }
        $post = $orig_post;
        wp_reset_postdata();
	}
 endif; //cashelrie_related_posts

if ( ! function_exists( 'cashelrie_posted_on' ) ) : /**
 * Print HTML with meta information for the current post-date/time and author.
 */
	function cashelrie_posted_on( $short = false, $linkcolor = "" ) {
		if ( ! $short ) {

			// Set up and print post meta information.
			printf( '<span class="entry-date"><a href="%5$s" rel="bookmark"><time class="entry-date" datetime="%6$s">%7$s</time></a></span>, <span class="author vcard"><a class="url fn n" href="%2$s" rel="author">%1$s %3$s</a></span>,',
				esc_html_x( 'by ', 'Used before post author name.', 'cashelrie' ),
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				get_the_author(),
				esc_html_x( 'on ', 'Used before post date.', 'cashelrie' ),
				esc_url( get_permalink() ),
				esc_attr( get_the_date( 'c' ) ),
				esc_html( get_the_date() )
			);

		} else {

			// Set up and print post meta information.
			printf( '<span class="' . $linkcolor . ' post-date"><a href="%1$s" rel="bookmark"><time class="entry-date" datetime="%2$s">%3$s</time></a></span>',
				esc_url( get_permalink() ),
				esc_attr( get_the_date( 'c' ) ),
				esc_html( get_the_date() )
			);
		}
	}

endif; //cashelrie_posted_on


function get_gallery_image_ids( $post ) {
	$post = get_post( $post );
	if ( ! $post ) {
		return array();
	}
	if ( ! has_shortcode( $post->post_content, 'gallery' ) ) {
		return array();
	}
	$images_ids = array();
	if ( preg_match_all( '/' . get_shortcode_regex() . '/s', $post->post_content, $matches, PREG_SET_ORDER ) ) {
		foreach ( $matches as $shortcode ) {
			if ( 'gallery' === $shortcode[2] ) {
				$data = shortcode_parse_atts( $shortcode[3] );
				if ( ! empty( $data['ids'] ) ) {
					$images_ids = explode( ',', $data['ids'] );
				}
			}
		}
	}
	return $images_ids;
}


/**
 * Display an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index
 * views, or a div element when on single views.
 */
if ( ! function_exists( 'cashelrie_post_thumbnail' ) ) :
	function cashelrie_post_thumbnail( $small_image = false, $square_thumb = false, $col_class = '"col-xs-12 col-sm-5 col-lg-5' ) {
		$pID = get_the_ID();

		//detecting featured video
		$embed_url = function_exists( 'fw_get_db_post_option' ) ? fw_get_db_post_option( $pID, 'post-featured-video', '' ) : '';
		$iframe    = '';
		if ( $embed_url ) {
			global $wp_embed;

			$width  = '1170';
			$height = '780';
			$iframe = $wp_embed->run_shortcode( '[embed  width="' . $width . '" height="' . $height . '"]' . trim( $embed_url ) . '[/embed]' );

		}// embed_url

		//detecting gallery
		$is_gallery = false;
		if ( get_post_format( $pID ) == 'gallery' ) {

			cashelrie_shortcode_atts_gallery_trigger();
            $post_gallery = get_post_gallery( $pID, false );
            $galleries_image_ids = array();
            if ( isset( $post_gallery['ids'] ) ) {
			    $galleries_image_ids = explode( ',', get_post_gallery( $pID, false )['ids'] );
            }
			$galleries_images = get_post_galleries_images( $pID );
			cashelrie_shortcode_atts_gallery_trigger( false );
			$galleries_images_count = count( $galleries_images );

			if ( $galleries_images_count ) {
				$is_gallery = true;
			}
		} //gallery post format

		if ( post_password_required() || is_attachment() || ( ! has_post_thumbnail() && ! $is_gallery && ! $iframe ) ) {
			return false;
		}

		//adding additional wrap for small image layout feed
		if ( ! is_single() && $small_image ) :
			?>
			<div class="<?php echo esc_attr( $col_class ); ?>">
			<?php
		endif; //!is_singular and small image
		?>
	<div class="item-media-wrap entry-thumbnail">
		<div class="item-media post-thumbnail<?php if ( !$is_gallery && !$iframe ) echo ' inline-block' ?>">
			<?php
			//featured image only for post
			if ( ! $is_gallery ) :
				if ( $iframe ) : ?>
                    <?php if ( $small_image || $square_thumb ) : ?>
					    <div class="embed-responsive embed-responsive-1by1">
                    <?php else: ?>
                        <div class="embed-responsive embed-responsive-theme">
                    <?php endif; ?>
					<?php if ( has_post_thumbnail() ): ?>
						<a href="" data-iframe="<?php echo esc_attr( $iframe ) ?>" class="embed-placeholder">
						<?php
					else:
						echo wp_kses( $iframe, array( 'iframe' => array(
							'width' => true,
							'height' => true,
							'src' => true,
							'frameborder' => true,
							'allowfullscreen' => true,
						), ) );
					endif; //has_post_thumbnail inside iframe check
				endif; // iframe check

				if ( $square_thumb || $small_image ) {
					the_post_thumbnail( 'cashelrie-square-width' );
				} else {
					the_post_thumbnail();
				} //$current_position

				// creating post link for whole featured image
				if ( ! is_single() && ! $iframe && ! ( 'fw-portfolio' === get_post_type() ) ) : ?>
                    <div class="media-links">
                        <a class="abs-link"  href="<?php the_permalink(); ?>"></a>
                    </div>
				<?php endif; //!is_singular check

				if ( $iframe ):
					if ( has_post_thumbnail() ) :
						?>
						</a><!-- eof image link -->
					<?php endif; //post thumbnail check for closing A tag ?>
					</div>
				<?php endif; //iframe check

			// gallery
			else :
				//featured image url
				$post_featured_image_src = wp_get_attachment_url( get_post_thumbnail_id( $pID ) );
			    $post_thumbnail_id = get_post_thumbnail_id( $pID )
				?>
				<div id="owl-carousel-<?php echo esc_attr( $pID ); ?>" class="owl-carousel"
				     data-loop="true"
				     data-margin="0"
				     data-nav="false"
				     data-dots="true"
				     data-themeclass="owl-theme entry-thumbnail-carousel"
				     data-center="false"
				     data-items="1"
				     data-responsive-xs="1"
				     data-responsive-sm="1"
				     data-responsive-md="1"
				     data-responsive-lg="1"
				>
					<?php
					//adding featured image as a first element in carousel
					if ( $post_featured_image_src ) : ?>
						<div class="item">
                            <?php
                            if ( $square_thumb || $small_image ) {
                                echo wp_get_attachment_image( $post_thumbnail_id, 'cashelrie-square-width' );
                            } else {
                                echo wp_get_attachment_image( $post_thumbnail_id, 'post-thumbnail' );
                            } //$current_position
                            ?>
						</div>
					<?php endif;
					$count = 1;
					if ( !empty( $galleries_image_ids ) ) {
                        foreach ( $galleries_image_ids as $image_id ) :
                                //showing only 3 images from gallery
                                if ( $count > 3 ) {
                                    break;
                                }
                                ?>
                                <div class="item">
                                    <?php
                                    if ( $square_thumb || $small_image ) {
                                        echo wp_get_attachment_image( $image_id, 'cashelrie-square-width' );
                                    } else {
                                        echo wp_get_attachment_image( $image_id, 'post-thumbnail' );
                                    } //$current_position
                                    ?>
                                </div>
                                <?php
                                $count ++;
                        endforeach;
					} else {
                        foreach ( $galleries_images as $gallerie ) :
                            foreach ( $gallerie as $src ) :
                                //showing only 3 images from gallery
                                if ( $count > 2 ) {
                                    break 2;
                                }
                                ?>
                                <div class="item">
                                    <img src="<?php echo esc_attr( $src ); ?>"
                                         alt="<?php echo esc_attr( get_the_title( $pID ) ); ?>">
                                </div>
                                <?php
                                $count ++;
                            endforeach;
                        endforeach;
					}
					?>
				</div>
				<?php
			endif; // $is_gallery
			?>
		</div> <!-- .item-media -->

	</div> <!-- .item-media-wrap -->
		<?php
		//closing additional wrap for small image layout feed
		if ( ! is_single() && $small_image ) : ?>
			</div> <!-- eof .col-md-6 -->
		<?php endif; //!is_singular and small image ?>

	<?php } //cashelrie_post_thumbnail()
endif;

//show post date in content area of post in loop
if ( ! function_exists( 'cashelrie_show_post_date_in_content' ) ) :
    function cashelrie_show_post_date_in_content() {
        $pID = get_the_ID();
        //detecting featured video
	    $embed_url = function_exists( 'fw_get_db_post_option' ) ? fw_get_db_post_option( $pID, 'post-featured-video', '' ) : '';

        //detecting gallery
	    $is_gallery = false;
	    if ( get_post_format( $pID ) == 'gallery' ) {

		    cashelrie_shortcode_atts_gallery_trigger();
		    $galleries_images = get_post_galleries_images( $pID );
		    cashelrie_shortcode_atts_gallery_trigger( false );
		    $galleries_images_count = count( $galleries_images );

		    if ( $galleries_images_count ) {
			    $is_gallery = true;
		    }
	    } //gallery post format

	    $show_date = false;

	    if ( !has_post_thumbnail() && empty( $embed_url) && !$is_gallery || get_post_format() === 'quote' || get_post_format() === 'status' ) {
	        $show_date = true;
	    }

	    return $show_date;
    } //cashelrie_show_post_date_in_content()
endif;

// share buttons
if ( ! function_exists( 'cashelrie_share_this' ) ) :
	/**
	 * Share article through social networks.
	 * bool $only_buttons
	 */
	function cashelrie_share_this( $only_buttons = false, $share_word = '', $icon_style = 'color-bg-icon' ) {
		if ( function_exists( 'mwt_share_this' ) ) {
			mwt_share_this( $only_buttons, $share_word, $icon_style );
		}

	} //cashelrie_share_this()
endif; //function_exists

//get predefined template part from theme options
if ( ! function_exists( 'cashelrie_get_predefined_template_part' ) ) :
	/**
	 * Return propper template part from options or default.
	 * string $template_part_name
	 */
	function cashelrie_get_predefined_template_part( $template_part_name ) {
		$template_part_name = sanitize_title_with_dashes( $template_part_name );
		if ( function_exists( 'fw_get_db_customizer_option' ) ) {
		    if ( $template_part_name === 'header' ) {
		        $option_value = fw_get_db_customizer_option( $template_part_name )['header_var'];
		    } else {
			    $option_value = fw_get_db_customizer_option( $template_part_name );
		    }
			if ( $option_value ) {
				$template_part = $template_part_name . '-' . $option_value;
			} else {
				$template_part = $template_part_name . '-2';
			}
			//no unyson - return default (1) template part
		} else {
			$template_part = $template_part_name . '-2';
		}

		//hide breadcrumbs and override header for certain page - for demo and custom pages
		if ( is_page() && function_exists( 'fw_get_db_post_option' ) ) {
			global $post;

			//show or hide breadcrumbs
			if ( 'breadcrumbs' == $template_part_name && fw_get_db_post_option( $post->ID, 'hide_breadcrumbs' ) ) {
				//non-existent part
				$template_part = $template_part_name . '-999';
			}

			//custom header for certain page
			if ( 'header' == $template_part_name && fw_get_db_post_option( $post->ID, 'header' ) ) {
				//non-existent part
				$template_part = $template_part_name . '-' . fw_get_db_post_option( $post->ID, 'header' );
			}
		}

		//get template part from ULR - for demo
		if ( isset( $_GET[ $template_part_name ] ) ) {
			$template_part = $template_part_name . '-' . ( int ) $_GET[ $template_part_name ];
		}

		return $template_part;
	} //cashelrie_get_predefined_template_part()

endif;//function_exists

//get ids of showing widgets
if ( ! function_exists( 'cashelrie_get_showing_widgets_ids' ) ) :
	/**
	 * Return array of id's of all widgets that are showing.
	 */

	function cashelrie_get_showing_widgets_ids() {
		$showing_widgets     = wp_get_sidebars_widgets();
		$showing_widgets_ids = array();
		foreach ( $showing_widgets as $sidebar_name => $sidebar_widgets ) {
			foreach ( $sidebar_widgets as $sidebar_widget_id ) {
				if ( $sidebar_name !== 'wp_inactive_widgets' ) {
					$showing_widgets_ids[] = $sidebar_widget_id;
				}
			}
		}
		return $showing_widgets_ids;
	}
endif;

//returning first taxonomy of displayed archive or taxonomy
if ( ! function_exists( 'cashelrie_get_posts_single_taxonomy_name' ) ) :
	function cashelrie_get_posts_single_taxonomy_name() {
		$queried_object = get_queried_object();
		$taxonomy_name = '';
		if ( is_tax() ) {
			$taxonomy_name = $queried_object->taxonomy;
		} elseif ( is_singular()) {
			$taxonomies_array = get_object_taxonomies( $queried_object );
			$taxonomy_name = $taxonomies_array[0];
		} else {
			$taxonomies_array = get_object_taxonomies( $queried_object->name );
			$taxonomy_name = $taxonomies_array[0];
		}
		return $taxonomy_name;
	}
endif;

//get all unique categories for all showing posts
if ( ! function_exists( 'cashelrie_get_post_categories' ) ) :
	function cashelrie_get_post_categories( $taxonomy_name = 'category' ) {
		//get all terms for filter
		if ( have_posts() ) :

			$all_categories = array();
			$categories     = array();
			// Start the Loop.
			while ( have_posts() ) : the_post();
				$all_categories[] = get_the_terms( get_the_ID(), $taxonomy_name );
			endwhile;
			wp_reset_postdata();

			foreach ( $all_categories as $post_categories ) :
				foreach ( $post_categories as $category ) :
					$categories[] = $category;
				endforeach;
			endforeach;

			$categories = array_unique( $categories, SORT_REGULAR );

			return $categories;

		endif; //have_posts
	}
endif;

//get all taxonomies slug for single post. Used inside loop
if ( ! function_exists( 'cashelrie_get_categories_slugs_for_single_post' ) ) :
	function cashelrie_get_categories_slugs_for_single_post( $taxonomy_name = 'category' ) {
		$term_objects      = get_the_terms( get_the_ID(), $taxonomy_name );
		$item_filter_class = '';
		foreach ( $term_objects as $term_object ) {
			$item_filter_class .= ' ' . $term_object->slug;
		}

		return $item_filter_class;
	}
endif;

//get the excerpt for page on search page even if only Unyson builder used - using in loop
if ( ! function_exists( 'cashelrie_get_excerpt_for_page_with_unyson_builder' ) ) :
	function cashelrie_get_excerpt_for_page_with_unyson_builder() {
		$excerpt = get_the_excerpt();
		if ( empty( $excerpt ) ) {

			$content = get_the_content();
			$content = strip_tags( str_replace( ']]>', ']]&gt;', apply_filters( 'the_content', get_the_content() ) ) );
			$excerpt = substr( $content, 0, 200) . ' [...]';
		}
		return $excerpt;
	}
endif;

//post meta
if ( ! function_exists( 'cashelrie_the_post_meta' ) ) :
	function cashelrie_the_post_meta( $post_format = 'standart' ) {
        $postID = get_the_ID();
        if ( 'post' === get_post_type() ) { ?>

            <div class="entry-meta inline-content with_dividers small-text highlightlinks">
                <span>
                    <?php echo get_the_author_posts_link(); ?>
                </span>
                <span>
                    <?php cashelrie_posted_on( true ); ?>
                </span>
                <?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) ) : ?>
                    <span class="categories-links">
                        <?php echo get_the_category_list( esc_html_x( ' ', 'Used between list items, there is a space after the comma.', 'cashelrie' ) ); ?>
                    </span>
                <?php endif; ?>
            </div>
        <?php }
	}
endif;

//unyson icon-v2 display
if ( !function_exists( 'cashelrie_get_icon_v2' ) ) {
    function cashelrie_get_icon_v2( $icon, $icon_class = '', $icon_container_class = '' ) {
	if ( $icon['type'] !== 'none' ) : ?>

	    <?php //wrap icon in container with custom class
	    if ( !empty( $icon_container_class ) ) : ?>
        <div class="<?php echo esc_attr( $icon_container_class ); ?>">
        <?php endif; //end of container with custom class ?>

			<?php if ( $icon['type'] === 'icon-font') : ?>
                <i class="<?php echo esc_attr( $icon['icon-class'] ); ?> <?php echo esc_attr( $icon_class ); ?>"></i>
			<?php else:
				echo wp_get_attachment_image( $icon['attachment-id'], 'thumbnail', false, array( 'class' => esc_html( $icon_class ) ) );
			endif; ?>

        <?php //wrap icon in container with custom class
         if ( !empty( $icon_container_class ) ) : ?>
        </div>
        <?php endif; //end of container with custom class ?>

	<?php endif;
    }
}
