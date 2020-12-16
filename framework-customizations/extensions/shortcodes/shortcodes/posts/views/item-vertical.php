<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * Shortcode Posts - vertical item layout type 2
 */

$terms          = get_the_terms( get_the_ID(), 'category' );
$filter_classes = '';
foreach ( $terms as $term ) {
	$filter_classes .= ' filter-' . $term->slug;
}

$show_post_thumbnail = ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) ? false : true;

?>
<article <?php post_class( "vertical-item content-padding with_border with_background text-center " . $filter_classes ); ?>>
    <?php cashelrie_post_thumbnail( ); ?>
    <div class="item-content">
	    <?php if ( cashelrie_show_post_date_in_content() ) : ?>
            <div class="entry-meta-corner main_bg_color">
			    <?php cashelrie_posted_on( true ); ?>
            </div>
	    <?php endif; ?>

	    <?php if ( get_the_title() ) : ?>
            <header class="entry-header">
			    <?php
			    the_title( '<h3 class="entry-title small"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
			    ?>
            </header><!-- .entry-header -->
	    <?php endif; ?>

	    <?php if ( !empty( get_the_content() ) ) : ?>
            <div class="entry-content content-3lines-ellipsis">
			    <?php the_excerpt(); ?>
            </div><!-- .entry-content -->
	    <?php endif; ?>
    </div>

	<?php cashelrie_the_post_meta(); ?>

</article><!-- eof vertical-item -->
