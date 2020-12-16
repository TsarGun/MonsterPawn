<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

if ( ! fw()->extensions->get( 'events' ) ) {
	return;
}


class FW_Shortcode_Events extends FW_Shortcode {
	protected function _render( $atts, $content = null, $tag = '' ) {

		if ( ! isset( $atts['layout'] ) ) {
			return $this->get_error_msg();
		}

		$next_event_post_ids_list = $this->fw_get_next_event_id();

		$next_event_post_id = false;

		$ids_counter = 0;
		while ( $ids_counter < count($next_event_post_ids_list) ) {
			if ( get_post( $next_event_post_ids_list[$ids_counter] )->post_status == 'publish' ) {
				$next_event_post_id = $next_event_post_ids_list[$ids_counter];
				break;
			}
			$ids_counter++;
		}

		//only published event
		$next_event_post = false;

		if ( !empty ($next_event_post_id ) ) {
			$next_event_post = get_post( $next_event_post_id );
		}

		//get post type dynamically
		$taxonomy_name = fw()->extensions->get( 'events' )->get_taxonomy_name();
		$terms = $atts['cat'];
		$tax_query = false;
		//if some terms are selected in options - creating tax_query
		if ( ! empty( $terms ) ) {
			$tax_query = array(
				array(
					'taxonomy' => $taxonomy_name,
					'terms' => $atts['cat'],
				),
			);
		}

		//get regular posts
		$posts_with_next_inserted = $this->fw_get_posts_with_info( array(
			'sort'		  	=> 'post_date',
			'items'			=> $atts['number'],
			'post__not_in'	=> array( $next_event_post_id ),
			'tax_query'     => $tax_query
		) );

		//get all posts
		$posts = $this->fw_get_posts_with_info( array(
			'sort'		  	=> 'post_date',
			'items'			=> $atts['number'],
			'tax_query'     => $tax_query
		) );

		if ( $next_event_post ) {
			array_splice( $posts_with_next_inserted->posts, 2, 0, array( $next_event_post ) );
			$posts_with_next_inserted->post_count++;
		}


		$view_path = $this->locate_path( '/views/' . $atts['layout'] . '.php' );

		return fw_render_view( $view_path, array(
				'atts'  			=> $atts,
				'posts' 			=> $posts,
				'next_event_post' 	=> $next_event_post,
				'posts_with_next_inserted'=> $posts_with_next_inserted,
			)
		);
	}

	/**
	 * @param array $args
	 *
	 * @return WP_Query
	 */
	public function fw_get_posts_with_info( $args = array() ) {
		$defaults = array(
			'sort'        => 'recent',
			'items'       => 5,
			'image_post'  => true,
			'date_post'   => true,
			'post_type'   => 'fw-event',
			'post__not_in'=> false

		);

		$query = new WP_Query( wp_parse_args( $args, $defaults ) );

		//wp reset query removed

		return $query;
	}

	/**
	 * @return array - next event post_id
	 */
	public function fw_get_next_event_id() {

		$next_event_child_post_query = new WP_Query( array(
			'posts_per_page'      => 0,
			'post_status'		  => 'publish',
			'post_type'           => 'fw-event-search',
			'orderby'             => 'event-from-date',
			'order'               => 'ASC',
			'meta_query' => array(
				array(
					'key'=> 'event-from-date',
					'value' => time(),
					'compare' => '>'
				),
			)
		) );

		$next_event_post_ids = [];

		foreach ( $next_event_child_post_query->posts as $event ) {
			array_push( $next_event_post_ids, $event->post_parent );
		}

		return $next_event_post_ids;
	}

	private function get_error_msg() {
		return '<p>' . esc_html__( 'No view found', 'cashelrie' ) . '</p>';
	}
}