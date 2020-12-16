<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
} ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'vertical-item' ); ?>>

    <?php cashelrie_post_thumbnail(); ?>

    <div class="item-content">
        <header class="entry-header">
	        <?php cashelrie_the_post_meta(); ?>
        </header>

        <?php if ( !empty( get_the_content() ) ) : ?>
            <div class="entry-content">
                <?php
                the_content( esc_html__( 'Read More', 'cashelrie' ) );
                ?>
            </div><!-- .entry-content -->
        <?php endif; //has content ?>

        <?php
        wp_link_pages( array(
            'before'      => '<div class="page-links highlightlinks"><span class="page-links-title">' . esc_html__( 'Pages:', 'cashelrie' ) . '</span>',
            'after'       => '</div>',
            'link_before' => '<span>',
            'link_after'  => '</span>',
        ) );
        ?>

        <div class="entry-meta content-justify v-center v-spacing">
            <?php the_tags( '<div><div class="tag-links">', ' ', '</div></div>' ); ?>
	        <?php if ( function_exists( 'mwt_share_this' ) ) {
		        cashelrie_share_this( true, '', 'color-icon' );
	        } ?>
        </div>

    </div>

</article>

<?php
// Prev / Next post navigation
cashelrie_post_nav();
?>

