<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var array $atts
 * @var array $posts
 */

$unique_id = uniqid();

$categories = fw_ext_extension_get_listing_categories( $atts['cat'], 'team' );
$sort_classes = fw_ext_extension_get_sort_classes( $posts->posts, $categories, '', 'team' );

if ( $atts['show_filters'] ) : ?>
	<div class="filters carousel_filters-<?php echo esc_attr( $unique_id ); ?> text-center">
		<a href="#" data-filter="*" class="selected"><?php esc_html_e( 'All', 'cashelrie' ); ?></a>
		<?php
		foreach ( $categories as $category ) {
			?>
			<a href="#"
			   data-filter=".<?php echo esc_attr( $category->slug ); ?>"><?php echo esc_html( $category->name ); ?></a>
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
	data-margin="<?php echo esc_attr( $atts['margin'] ); ?>"
	data-responsive-xs="<?php echo esc_attr( $atts['responsive_xs'] ); ?>"
	data-responsive-sm="<?php echo esc_attr( $atts['responsive_sm'] ); ?>"
	data-responsive-md="<?php echo esc_attr( $atts['responsive_md'] ); ?>"
	data-responsive-lg="<?php echo esc_attr( $atts['responsive_lg'] ); ?>"
    data-autoplay="<?php echo esc_attr( $atts['carousel_autoplay'] ); ?>"
	<?php if ( $atts['show_filters'] ) : ?>
		data-filters=".carousel_filters-<?php echo esc_attr( $unique_id ); ?>"
	<?php endif; // filters ?>
>
	<?php
    $item_layout = $atts['item_layout'] === 'vertical' ? 'loop-item-vertical' : 'loop-item';
    while ( $posts->have_posts() ) : $posts->the_post(); ?>
	<div class="owl-carousel-item <?php echo esc_attr( $sort_classes[get_the_ID()] ); ?>">
		<?php
			include( fw()->extensions->get( 'team' )->locate_view_path( $item_layout ) );
		?>
	</div>
	<?php endwhile; ?>
	<?php wp_reset_postdata(); // reset the query ?>
</div>