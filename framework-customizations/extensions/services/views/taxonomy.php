<?php
/**
 * The template for displaying services taxonomy
 */
get_header();

//getting taxonomy name
$ext_services_settings = fw()->extensions->get( 'services' )->get_settings();
$taxonomy_name = $ext_services_settings['taxonomy_name'];

$categories = fw_ext_extension_get_listing_categories( array(), 'services' );
global $wp_query;
$sort_classes = fw_ext_extension_get_sort_classes( $wp_query->posts, $categories, '', 'services' );

//get taxonomy settings
$queried_object = get_queried_object();
$atts = fw_get_db_term_option( $queried_object->term_taxonomy_id, $queried_object->taxonomy );

$unique_id = uniqid();
?>
	<div id="content" class="col-xs-12 col-lg-10 col-lg-offset-1 topmargin_0 bottommargin_0">
		<?php
		//no need to show filters on category set check to 100 categories
		if ( count( $categories ) > 100 ) : ?>
			<div class="filters isotope_filters-<?php echo esc_attr( $unique_id ); ?> text-center">
				<a href="#" data-filter="*" class="selected"><?php esc_html_e( 'All', 'cashelrie' ); ?></a>
				<?php foreach ( $categories as $category ) : ?>
					<a href="#"
					   data-filter=".<?php echo esc_attr( $category->slug ); ?>"><?php echo esc_html( $category->name ); ?></a>
				<?php endforeach; ?>
			</div><!-- eof isotope_filters -->
		<?php endif; //count subcategories check ?>
		<?php if ( have_posts() ) : ?>
			<div class="isotope_container isotope row masonry-layout staggered-layout loop-colors columns_margin_bottom_20"
				<?php if ( count( $categories ) > 100 ) { ?>
					data-filters=".isotope_filters-<?php echo esc_attr( $unique_id ); ?>"
				<?php } ?>
			>
				<?php
				while ( have_posts() ) : the_post();
					?>
					<div
						class="isotope-item col-xs-12 col-md-6 <?php echo esc_attr( $sort_classes[get_the_ID()] ); ?>">
						<?php
						include( fw()->extensions->get( 'services' )->locate_view_path( 'loop-item' ) );
						?>
					</div>
				<?php endwhile; ?>
			</div><!-- eof isotope_container -->
			<?php
		else :
			// If no content, include the "No posts found" template.
			get_template_part( 'template-parts/content', 'none' );
		endif;
		?>
		<?php // Previous/next page navigation.
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