<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Used for blog page
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 */

get_header();

$column_classes = cashelrie_get_columns_classes(); ?>

	<div id="content" class="<?php echo esc_attr( $column_classes['main_column_class'] ); ?>">
		<?php
		if ( have_posts() ) :
			// Start the Loop.
            $posts_counter = 1;
			while ( have_posts() ) : the_post();

				/*
				 * Include the post format-specific template for the content. If you want to
				 * use this in a child theme, then include a file called called content-___.php
				 * (where ___ is the post format) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );
				$posts_counter++;

			endwhile;
			// Previous/next post navigation.
			cashelrie_paging_nav();

		else :
			// If no content, include the "No posts found" template.
			get_template_part( 'template-parts/content', 'none' );

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