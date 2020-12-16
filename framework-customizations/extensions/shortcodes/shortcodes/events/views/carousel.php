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
		foreach ( get_the_terms( $post->ID, 'fw-event-taxonomy-name' ) as $post_term ) {
			$showing_terms[ $post_term->term_id ] = $post_term;
		}
	}
	?>
	<div class="filters carousel_filters-<?php echo esc_attr( $unique_id ); ?> text-center">
		<a href="#" data-filter="*" class="selected"><?php esc_html_e( 'All', 'cashelrie' ); ?></a>
		<?php
		foreach ( $showing_terms as $term_key => $term_id ) {
			$current_term = get_term( $term_id, 'fw-event-taxonomy-name' );
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
<div
	class="owl-carousel loop-colors"
    data-nav="true"
    data-dots="false"
	data-margin="<?php echo esc_attr( $atts['margin'] ); ?>"
	data-responsive-xs="<?php echo esc_attr( $atts['responsive_xs'] ); ?>"
	data-responsive-sm="<?php echo esc_attr( $atts['responsive_sm'] ); ?>"
	data-responsive-md="<?php echo esc_attr( $atts['responsive_md'] ); ?>"
	data-responsive-lg="<?php echo esc_attr( $atts['responsive_lg'] ); ?>"
	<?php if ( $atts['show_filters'] ) : ?>
		data-filters=".carousel_filters-<?php echo esc_attr( $unique_id ); ?>"
	<?php endif; // filters ?>
>
	<?php
	$item_layout = $atts['item_layout'] === 'vertical' ? 'event' : 'event-horizontal';
    while ( $posts->have_posts() ) : $posts->the_post();
        $post_terms       = get_the_terms( get_the_ID(), 'fw-event-taxonomy-name' );
        $post_terms_class = '';
        foreach ( $post_terms as $post_term ) {
            $post_terms_class .= $post_term->slug . ' ';
        }
	?>
	<div class="owl-carousel-item <?php echo esc_attr( 'item-layout-' . $atts['item_layout'] . ' ' . $post_terms_class ); ?>">
		<?php
		get_template_part( 'template-parts/content', $item_layout );
		?>
	</div>
	<?php endwhile; ?>
	<?php wp_reset_postdata(); // reset the query ?>
</div>