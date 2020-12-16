<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

class FW_Shortcode_Posts extends FW_Shortcode {
	protected function _render( $atts, $content = null, $tag = '' ) {
		if ( ! isset( $atts['layout'] ) ) {
			return $this->get_error_msg();
		}

		$posts = $this->fw_get_posts_with_info( array(
			'sort'  => 'post_date',
			'items' => $atts['number'],
			'cat'   => $atts['cat'],
		) );

		$view_path = $this->locate_path( '/views/' . $atts['layout'] . '.php' );

		return fw_render_view( $view_path, array(
				'atts'  => $atts,
				'posts' => $posts
			)
		);

	}

	/**
	 * @param array $args
	 *
	 * @return array
	 */
	public function fw_get_posts_with_info( $args = array() ) {
		$defaults = array(
			'sort'        => 'recent',
			'items'       => 5,
			'image_post'  => true,
			'date_post'   => true,
			'date_format' => 'F jS, Y',
			'post_type'   => 'post',
		);

		extract( wp_parse_args( $args, $defaults ) );

		$query = new WP_Query( array(
			'post_type'           => $post_type,
			'orderby'             => $sort,
			'order '              => 'DESC',
			'ignore_sticky_posts' => true,
			'posts_per_page'      => $items,
			'cat'                 => $cat
		) );

		//removed wp reset query

		return $query;
	}

	private function get_error_msg() {
		return '<p>' . esc_html__( 'No view found', 'cashelrie' ) . '</p>';
	}
}