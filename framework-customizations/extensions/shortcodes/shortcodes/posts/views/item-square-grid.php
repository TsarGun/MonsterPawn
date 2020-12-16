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
<article <?php post_class( "vertical-item content-absolute content-padding ds " . $filter_classes ); ?>>

    <div class="item-media">
		<?php the_post_thumbnail( 'cashelrie-square-width' ); ?>
        <div class="media-links">
            <a href="<?php the_permalink(); ?>" class="abs-link"></a>
        </div>
        <div class="entry-meta-corner main_bg_color">
		    <?php cashelrie_posted_on( true ); ?>
        </div>
    </div>

    <div class="item-content darken_gradient">

		<?php if ( get_the_title() ) : ?>
            <header class="entry-header">
				<?php
				the_title( '<h3 class="entry-title small"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
				?>
            </header><!-- .entry-header -->
		<?php endif; ?>

        <div class="entry-meta inline-content big-spacing greylinks">
            <span>
                <?php echo esc_html__( 'by', 'cashelrie' ) . ' ' . get_the_author_posts_link(); ?>
            </span>
        </div>

    </div>

</article><!-- eof vertical-item -->
