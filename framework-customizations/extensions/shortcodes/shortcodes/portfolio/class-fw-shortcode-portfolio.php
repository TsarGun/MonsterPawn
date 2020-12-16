<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

if ( ! fw()->extensions->get( 'portfolio' ) ) {
	return;
}


class FW_Shortcode_Portfolio extends FW_Shortcode {
	protected function _render( $atts, $content = null, $tag = '' ) {
		if ( ! isset( $atts['layout'] ) ) {
			return $this->get_error_msg();
		}

		$intger = intval ( $atts['number'], 10 );
		$number = ( is_int( $intger ) && $intger > 0 ) ? $intger : 6;

		$posts = $this->fw_get_posts_with_info( array(
			'sort'  => 'post_date',
			'items' => $number,
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
	 * @return WP_Query
	 */
	public function fw_get_posts_with_info( $args = array() ) {
		$defaults = array(
			'sort'        => 'recent',
			'items'       => 6,
			'image_post'  => true,
			'date_post'   => true,
			'date_format' => 'F jS, Y',
			'post_type'   => 'fw-portfolio',

		);

		extract( wp_parse_args( $args, $defaults ) );

		$query = new WP_Query( array(
			'post_type'           => $post_type,
			'orderby'             => $sort,
			'order '              => 'DESC',
			'ignore_sticky_posts' => true,
			'posts_per_page'      => $items,
		) );

		//wp reset query removed

		return $query;
	}

	private function get_error_msg() {
		return '<p>' . esc_html__( 'No view found', 'cashelrie' ) . '</p>';
	}
}