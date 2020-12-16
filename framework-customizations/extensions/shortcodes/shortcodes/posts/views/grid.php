<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var array $atts
 * @var array $posts
 */

$unique_id = uniqid();

if ( $atts['show_filters'] ) :
	//get all terms for filter - not need as not all posts showing
	//$terms = get_terms( array ('taxonomy ' => 'category' ) );

	//get unique terms only for posts that are showing
	$showing_terms = array();
	foreach ( $posts->posts as $post ) {
		foreach ( get_the_terms( $post->ID, 'category' ) as $post_term ) {
			$showing_terms[ $post_term->term_id ] = $post_term;
		}
	}
	?>
    <div class="filters isotope_filters-<?php echo esc_attr( $unique_id ); ?> text-center">
        <a href="#" data-filter="*" class="selected"><?php esc_html_e( 'All', 'cashelrie' ); ?></a>
		<?php
		foreach ( $showing_terms as $term_key => $term_id ) {
			$current_term = get_term( $term_id, 'category' );
			?>
            <a href="#"
               data-filter=".<?php echo esc_attr( $current_term->slug ); ?>"><?php echo esc_html( $current_term->name ); ?></a>
			<?php
		} //foreach
		?>
    </div>
	<?php
endif; //showfilters check
?>

<div class="posts-grid isotope_container isotope row masonry-layout columns_margin_bottom_20">
	<?php
    $counter = 1;
    while ( $posts->have_posts() ) : $posts->the_post();
	    $post_terms       = get_the_terms( get_the_ID(), 'category' );
	    $post_terms_class = '';
	    foreach ( $post_terms as $post_term ) {
		    $post_terms_class .= $post_term->slug . ' ';
	    }

	    $item_layout = 'item-horizontal';
        if ( $counter === 2 || $counter % 3 === 2 ) {
	        $column_class = "col-xs-12 col-md-8 col-lg-6";
        } else if ( $counter === 3 || ! ( $counter % 3 ) ) {
	        $column_class = "col-xs-12 col-md-12 col-lg-6";
        } else {
	        $column_class = "col-xs-12 col-md-4 col-lg-6";
	        $item_layout = 'item-square';
        }

    ?>
        <div class="isotope-item <?php echo esc_attr( $column_class . ' item-layout-' . $atts['item_layout'] . ' ' . $post_terms_class ); ?>">
			<?php
			//include item layout view file. If no thumbnail - layout is always extended
			$filepath  = CASHELRIE_THEME_PATH . '/framework-customizations/extensions/shortcodes/shortcodes/posts/views/' . $item_layout . '-grid.php';
			if ( ! ( has_post_thumbnail() ) ) {
				$filepath  = CASHELRIE_THEME_PATH . '/framework-customizations/extensions/shortcodes/shortcodes/posts/views/item-horizontal-grid.php';
			}
			if ( file_exists( $filepath ) ) {
				include( $filepath );
			} else {
				esc_html_e( 'View not found', 'cashelrie' );
			}
			?>
        </div>
	<?php $counter++;
    endwhile; ?>
	<?php wp_reset_postdata(); // reset the query ?>
</div>