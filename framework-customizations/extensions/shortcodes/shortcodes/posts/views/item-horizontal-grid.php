<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * Shortcode Posts - title item layout
 * Shortcode Posts - title item layout
 */
$terms          = get_the_terms( get_the_ID(), 'category' );
$filter_classes = '';
foreach ( $terms as $term ) {
	$filter_classes .= ' filter-' . $term->slug;
}

$show_post_thumbnail = ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) ? false : true;

//wrapping in div for carousel layout
?>

<?php
global $post;
$post_layout = 'post-layout-standard';
if ( function_exists( 'fw_get_db_post_option' ) ) {
$post_layout = fw_get_db_post_option( $post->ID, 'post-layout', 'post-layout-standard' );
}

//standard feed layout (image at the top or not image at all if option is standard or has no post thumbnail)
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'format-small-image ' . $filter_classes ); ?>>
    <div class="side-item side-sm content-padding with_border with_background <?php echo (int) $counter % 2 ? esc_attr( 'left' ) : esc_attr( 'right' ); ?>">
        <div class="row">
	        <?php cashelrie_post_thumbnail( true, false, 'col-xs-12 col-sm-5 col-md-6 col-lg-6' ); ?>
	        <?php if ( get_the_post_thumbnail() ) : ?>
            <div class="col-xs-12 col-sm-7 col-md-6 col-lg-6">
            <?php else: ?>
            <div class="col-xs-12">
            <?php endif; ?>

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

            <footer class="entry-meta darklinks grey">
                <div class="inline-content big-spacing">
                    <span>
                        <?php echo esc_html__( 'by', 'cashelrie' ) . ' ' . get_the_author_posts_link(); ?>
                    </span>
                </div>
            </footer>

            </div><!-- eof .col-md-6 -->
        </div><!-- eof .row -->
    </div><!-- eof .side-item -->

</article><!-- #post-## -->