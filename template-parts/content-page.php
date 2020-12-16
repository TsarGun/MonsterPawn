<?php
/**
 * The template used for displaying page content
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( is_singular() ) :
?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if ( has_post_thumbnail() ) : ?>
            <header class="entry-header">
				<?php
				// Page thumbnail and title.
				cashelrie_post_thumbnail();
				?>
            </header><!-- .entry-header -->
			<?php
		endif; //has_post_thumbnail
		?>

        <div class="entry-content">
            <?php
            //hidding "more link" in content
            the_content();
            ?>
        </div><!-- .entry-content -->
        <?php
        wp_link_pages( array(
            'before'      => '<div class="page-links topmargin_30"><span class="page-links-title">' . esc_html__( 'Pages:', 'cashelrie' ) . '</span>',
            'after'       => '</div>',
            'link_before' => '<span>',
            'link_after'  => '</span>',
        ) );
        ?>

    </article><!-- #post-## -->
<?php else: ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class( 'with_padding big-padding with_background rounded'); ?>>

        <header class="entry-header">
            <?php
            // Page thumbnail and title.
            cashelrie_post_thumbnail();
            the_title( '<h3 class="entry-title bottommargin_0"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
            ?>
        </header><!-- .entry-header -->

		<?php if ( is_search() ) : ?>
			<?php if ( get_the_excerpt() ) : ?>
                <div class="entry-summary">
					<?php the_excerpt(); ?>
                </div><!-- .entry-summary -->
			<?php endif; ?>
		<?php else : ?>
			<?php if ( cashelrie_get_excerpt_for_page_with_unyson_builder() ) : ?>
                <div class="entry-summary">
					<?php echo wp_kses_post( cashelrie_get_excerpt_for_page_with_unyson_builder() ); ?>
                </div><!-- .entry-summary -->
			<?php endif; ?>
			<?php
			wp_link_pages( array(
				'before'      => '<div class="page-links topmargin_30"><span class="page-links-title">' . esc_html__( 'Pages:', 'cashelrie' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
			?>
		<?php endif; ?>
    </article><!-- #post-## -->

<?php endif; ?>

