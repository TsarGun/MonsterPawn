<?php
/**
 * The template for displaying a "No posts found" message
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
	<p><?php printf( esc_html__( 'Ready to publish your first post?', 'cashelrie') . '<a href="%1$s">' . esc_html__( 'Get started here', 'cashelrie' ). '</a>.', admin_url( 'post-new.php' ) ); ?></p>
<?php elseif ( is_search() ) : ?>
	<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'cashelrie' ); ?></p>
	<div class="widget widget_search">
		<?php get_search_form(); ?>
	</div>
<?php else : ?>
	<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'cashelrie' ); ?></p>
	<div class="widget widget_search">
		<?php get_search_form(); ?>
	</div>
<?php endif;