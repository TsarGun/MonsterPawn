<?php
/**
 * The default template for displaying content
 *
 * Used for index/archive/search.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post;
$pID = get_the_ID();
//detecting featured video
$embed_url = function_exists( 'fw_get_db_post_option' ) ? fw_get_db_post_option( $pID, 'post-featured-video', '' ) : '';

//show posts with featured video vertically of horizontally
$show_post_thumbnail = ( post_password_required() || is_attachment() || ( ! has_post_thumbnail() && empty( $embed_url ) ) ) ? false : true;
//$show_post_thumbnail = ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) ? false : true;

$post_layout = 'post-layout-standard';
if ( function_exists( 'fw_get_db_customizer_option' ) ) {
    $post_layout = fw_get_db_customizer_option( 'posts_side_image' );
}

$small_layout = ( $post_layout == 'post-layout-standard' || ! $show_post_thumbnail || get_post_format( $pID ) === 'image' ) ? false : true;
if ( $small_layout && $show_post_thumbnail ) : //additional markup for small layout post ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class( 'format-small-image' ); ?>>
        <div class="side-item side-sm">
            <div class="row">
    <?php cashelrie_post_thumbnail( $small_layout ); ?>
    <div class="col-xs-12 col-sm-7 col-lg-7">

<?php else : //standard layout markup ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class( 'vertical-item' ); ?>>
    <?php
    cashelrie_post_thumbnail();
endif; //small_format check
?>

<div class="item-content">

    <header class="entry-header">
        <?php
        the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3> <hr>' );
        ?>

	    <?php cashelrie_the_post_meta(); ?>
    </header><!-- .entry-header -->

    <?php if ( !empty( get_the_content() ) ) : ?>
        <?php if ( $small_layout ) : ?>
            <div class="entry-summary content-3lines-ellipsis">
                <?php the_excerpt(); ?>
            </div><!-- .entry-summary -->
        <?php elseif ( is_search() || $post_layout !== 'post-layout-standard' ) : ?>
            <div class="entry-summary">
			    <?php the_excerpt(); ?>
            </div><!-- .entry-summary -->
        <?php else : ?>
            <div class="entry-content">
                <?php
                //hidding "more link" in content
                the_content( '', true );
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

    <div class="topmargin_30">
        <a href="<?php echo get_permalink(); ?>" class="theme_button inverse small_button min_width_button"><?php echo esc_html__( 'Read More', 'cashelrie' ); ?></a>
    </div>

</div><!-- eof .item-content -->

<?php if ( $small_layout && $show_post_thumbnail ) : //additional markup for small format post  ?>
        </div><!-- eof .col-md-7 -->
    </div><!-- eof .row -->
</div><!-- eof .side-item -->
<?php endif; //small_format
?>
</article><!-- #post-## -->
