<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$portfolio = fw()->extensions->get( 'portfolio' );
if ( empty( $portfolio ) ) {
	return;
}

/**
 * @var array $atts
 * @var array $posts
 */

$unique_id = uniqid();

//get all terms for filter
$terms = get_terms( array( 'post_type ' => 'fw-portfolio-category' ) );

if ( count( $terms ) > 1 && $atts['show_filters'] ) { ?>
<div class="filters-wrapper">
    <div class="filters carousel_filters-<?php echo esc_attr( $unique_id ); ?>">
        <a href="#" data-filter="*" class="selected"><?php esc_html_e( 'All', 'cashelrie' ); ?></a>
        <?php
        foreach ( $terms as $term_key => $term_id ) {
            $current_term = get_term( $term_id, 'fw-portfolio-category' );
            ?>
            <a href="#"
               data-filter=".<?php echo esc_attr( $current_term->slug ); ?>"><?php echo esc_html( $current_term->name ); ?></a>
            <?php
        } //foreach
        ?>
    </div>
</div>
	<?php
} //count subcategories check

?>
<div id="widget_portfolio_carousel_<?php echo esc_attr( $unique_id ); ?>"
     class="owl-carousel gallery-carousel"
     data-nav="false"
     data-dots="true"
     data-margin="<?php echo esc_attr( $atts['margin'] ); ?>"
     data-responsive-xxs="<?php echo esc_attr( $atts['responsive_xxs'] ); ?>"
     data-responsive-xs="<?php echo esc_attr( $atts['responsive_xs'] ); ?>"
     data-responsive-sm="<?php echo esc_attr( $atts['responsive_sm'] ); ?>"
     data-responsive-md="<?php echo esc_attr( $atts['responsive_md'] ); ?>"
     data-responsive-lg="<?php echo esc_attr( $atts['responsive_lg'] ); ?>"
	<?php if ( count( $terms ) > 1 && $atts['show_filters'] ) { ?>
        data-filters=".carousel_filters-<?php echo esc_attr( $unique_id ); ?>"
    <?php } ?>
    >
    <?php while ( $posts->have_posts() ) : $posts->the_post();
		$post_terms       = get_the_terms( get_the_ID(), 'fw-portfolio-category' );
		$post_terms_class = '';
		foreach ( $post_terms as $post_term ) {
			$post_terms_class .= $post_term->slug . ' ';
		}
	?>
    <div class="owl-carousel-item <?php echo esc_attr( 'item-layout-' . $atts['item_layout'] . ' ' . $post_terms_class ); ?>">
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
	<?php //removed reset the query ?>
</div>