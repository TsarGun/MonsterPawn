<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * The template for displaying Events Category pages
 *
 */

get_header();
$column_classes = cashelrie_get_columns_classes();
?>

	<div id="content" class="<?php echo esc_attr( $column_classes['main_column_class'] ); ?>">

		<?php if ( have_posts() ) : ?>

			<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();

				/*
				 * Include the post format-specific template for the content. If you want to
				 * use this in a child theme, then include a file called called content-___.php
				 * (where ___ is the post format) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'event' );

			endwhile;
			?>

			<?php
			// Previous/next page navigation.
			cashelrie_paging_nav();

		else : // If no content, include the "No posts found" template.
		{
			get_template_part( 'content', 'none' );
		}

		endif;
		?>

	</div><!--eof #content -->
<?php if ( $column_classes['sidebar_class'] ): ?>
	<!-- main aside sidebar -->
	<aside class="<?php echo esc_attr( $column_classes['sidebar_class'] ); ?>">
		<?php get_sidebar(); ?>
	</aside>
	<!-- eof main aside sidebar -->
	<?php
endif;
get_footer();