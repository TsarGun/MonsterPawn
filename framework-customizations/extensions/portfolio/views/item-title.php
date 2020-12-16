<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * Widget Portfolio - title item layout
 */

?>
<div class="vertical-item content-padding text-center gallery-title-item loop-color">
    <div class="item-media">
        <?php
        $full_image_src = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
        the_post_thumbnail();
        ?>
        <div class="media-links">
            <div class="links-wrap">
                <a class="p-view prettyPhoto "
                   data-gal="prettyPhoto[gal-<?php echo esc_attr( $unique_id ); ?>]"
                   href="<?php echo esc_url( $full_image_src ); ?>"></a>
            </div>
        </div>
    </div>
    <div class="item-content">
        <div class="categories-links small-text highlightlinks">
            <?php
            echo get_the_term_list( get_the_ID(), 'fw-portfolio-category', '', ' ', '' );
            ?>
        </div>
        <h3 class="entry-title">
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </h3>
    </div>
</div>