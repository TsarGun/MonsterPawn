<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * @var array $atts
 * @var array $posts
 */

//item layout view file path

$unique_id = uniqid();

//getting query object
$queried_object = get_queried_object();

$requested_category = fw_get_db_term_option( $queried_object->term_taxonomy_id, $queried_object->taxonomy );

//getting subcategories for filters
$subcategories = get_term_children( $queried_object->term_taxonomy_id, $queried_object->taxonomy );

if ( $atts['show_filters'] ) :
	$categories = array();
	// Start the Loop.
	while ( have_posts() ) : the_post();
		$project_categories = get_the_terms( get_the_ID(), $queried_object->taxonomy );
		foreach ( $project_categories as $category ) :
			if ( in_array( $category->term_id, $subcategories ) ) :
				$categories[] = $category;
			endif;
		endforeach;
	endwhile;
	wp_reset_postdata();

	$categories = array_unique( $categories, SORT_REGULAR );

	if ( count( $categories ) > 1 ) : ?>
        <div class="filters carousel_filters-<?php echo esc_attr( $unique_id ); ?> text-center">
            <a href="#" data-filter="*" class="selected"><?php esc_html_e( 'All', 'cashelrie' ); ?></a>
			<?php foreach ( $categories as $category ) : ?>
                <a href="#"
                   data-filter=".<?php echo esc_attr( $category->slug ); ?>"><?php echo esc_html( $category->name ); ?></a>
			<?php endforeach; ?>
        </div><!-- eof isotope_filters -->
	<?php endif; //count subcategories check
	?>
<?php endif; //show filters check ?>

<div id="widget_portfolio_carousel_<?php echo esc_attr( $unique_id ); ?>"
     class="owl-carousel"
     data-margin="<?php echo esc_attr( $atts['margin'] ); ?>"
     data-responsive-xs="<?php echo esc_attr( $atts['responsive_xs'] ); ?>"
     data-responsive-sm="<?php echo esc_attr( $atts['responsive_sm'] ); ?>"
     data-responsive-md="<?php echo esc_attr( $atts['responsive_md'] ); ?>"
     data-responsive-lg="<?php echo esc_attr( $atts['responsive_lg'] ); ?>"
    <?php if ( count( $categories ) > 1 && $atts['show_filters'] ) { ?>
        data-filters=".carousel_filters-<?php echo esc_attr( $unique_id ); ?>"
    <?php } ?>
>
	<?php
	while ( have_posts() ) : the_post();
	$post_terms       = get_the_terms( get_the_ID(), 'fw-portfolio-category' );
	$post_terms_class = '';
	foreach ( $post_terms as $post_term ) {
		$post_terms_class .= $post_term->slug . ' ';
	}
	?>
    <div class="owl-carousel-item <?php echo esc_attr( 'item-layout-' .  $atts['item_layout']  . ' ' . $post_terms_class ); ?>">
    <?php
		//include item layout view file
		if ( has_post_thumbnail() ) {
			include( fw()->extensions->get( 'portfolio' )->locate_view_path( esc_attr( $atts['item_layout'] ) ) );
		} else {
			include( fw()->extensions->get( 'portfolio' )->locate_view_path( 'item-extended' ) );
		}
    ?>
    </div>
	<?php endwhile; ?>
</div><!-- eof portfolio -->