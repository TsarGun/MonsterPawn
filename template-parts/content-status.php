<?php
/**
 * The default template for displaying status content
 *
 * Used for both single and index/archive/search.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post;
$postID = get_the_ID();
$show_post_thumbnail = ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) ? false : true;

$post_thumbnail = get_the_post_thumbnail( get_the_ID() );
$additional_post_class = ( $post_thumbnail ) ? 'bg_teaser after_cover darkgrey_bg ds ms' : 'with_background';
?>

<?php
//single item layout
if ( is_single() ) : ?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'vertical-item'); ?>>

    <div class="item-content">
        <header class="entry-header text-center">
			<?php cashelrie_the_post_meta(); ?>
        </header>

		<?php if ( !empty( get_the_content() ) ) : ?>
            <div class="entry-content text-center">
	            <?php
	            printf( '<div class="author vcard bottommargin_30"><a class="url fn n post-author" href="%1$s" rel="author">%2$s</a></div>',
		            esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		            get_avatar( get_the_author_meta( 'ID' ) )
	            );
	            ?>
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

</article><!-- #post-## -->
<?php
// Prev / Next post navigation
cashelrie_post_nav();
?>
<?php else: ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class( 'vertical-item content-padding big-padding text-center rounded overflow_hidden ' . $additional_post_class ); ?>>
		<?php
		echo wp_kses_post ( $post_thumbnail );
		?>

        <div class="item-content">

            <header class="entry-header">
				<?php
				printf( '<div class="author vcard"><a class="url fn n post-author" href="%1$s" rel="author">%2$s</a></div>',
					esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
					get_avatar( get_the_author_meta( 'ID' ) )
				);
				?>
				<?php
				the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
				?>
				<?php cashelrie_the_post_meta(); ?>
            </header><!-- .entry-header -->

			<?php if ( !empty( get_the_content() ) ) : ?>
				<?php if ( is_search() ) : ?>
                    <div class="entry-summary content-3lines-ellipsis">
						<?php the_excerpt(); ?>
                    </div><!-- .entry-summary -->
				<?php else : ?>
                    <div class="entry-content">
						<?php
						//hidding "more link" in content
						the_content( esc_html__( 'Read More', 'cashelrie' ) );
						wp_link_pages( array(
							'before'      => '<div class="page-links highlightlinks topmargin_30"><span class="page-links-title">' . esc_html__( 'Pages:', 'cashelrie' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
						) );
						?>
                    </div><!-- .entry-content -->

				<?php endif; //is_search
			endif; //has content
			?>
        </div><!-- eof .item-content -->

    </article><!-- #post-## -->
<?php endif; ?>
