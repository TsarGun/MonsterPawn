<?php
/**
 * The template for default displaying portfolio taxonomy
 */
get_header();
//no columns on this page - giving true as a parameter to get column classes function
$column_classes = fw_ext_extension_get_columns_classes( true );

//getting taxonomy name
$ext_technologies_settings = fw()->extensions->get( 'technologies' )->get_settings();
$taxonomy_name = $ext_technologies_settings['taxonomy_name'];

$categories = fw_ext_extension_get_listing_categories( array(), 'technologies' );
global $wp_query;
$sort_classes = fw_ext_extension_get_sort_classes( $wp_query->posts, $categories, '', 'technologies' );

$unique_id = uniqid();
?>
	<div id="content" class="<?php echo esc_attr( $column_classes['main_column_class'] ); ?> margin_0">
		<?php
		if ( count( $categories ) > 1 ) : ?>
			<div class="filters isotope_filters-<?php echo esc_attr( $unique_id ); ?> text-center">
				<a href="#" data-filter="*" class="selected"><?php esc_html_e( 'All', 'cashelrie' ); ?></a>
				<?php foreach ( $categories as $category ) : ?>
					<a href="#"
					   data-filter=".<?php echo esc_attr( $category->slug ); ?>"><?php echo esc_html( $category->name ); ?></a>
				<?php endforeach; ?>
			</div><!-- eof isotope_filters -->
		<?php endif; //count subcategories check ?>
		<?php if ( have_posts() ) : ?>
			<div class="isotope_container isotope row masonry-layout columns_padding_30"
				<?php if ( count( $categories ) > 1 ) { ?>
					data-filters=".isotope_filters-<?php echo esc_attr( $unique_id ); ?>"
				<?php } ?>
			>
				<?php
				while ( have_posts() ) : the_post();

					?>
					<div
						class="isotope-item col-sm-6 col-xs-12 <?php echo esc_attr( $sort_classes[get_the_ID()] ); ?>">
						<?php
						include( fw()->extensions->get( 'technologies' )->locate_view_path( 'loop-item' ) );
						?>
					</div>
				<?php endwhile; ?>
			</div><!-- eof isotope_container -->
			<?php
		else :
			// If no content, include the "No posts found" template.
			get_template_part( 'template-parts/content', 'none' );
		endif; ?>
		<?php // Pagination.
			$pagination = paginate_links( array(
				'prev_text' => esc_html__( 'Prev', 'cashelrie' ),
				'next_text' => esc_html__( 'Next', 'cashelrie' ),
				'type'      => 'list',
			));
			if ($pagination) {
				echo '<nav class="pagination-nav">' . wp_kses_post( str_replace( 'page-numbers', 'page-numbers pagination', $pagination ) ) . '</nav>';
			}
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