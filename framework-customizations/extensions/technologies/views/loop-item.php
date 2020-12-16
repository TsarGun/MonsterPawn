<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * Single technology loop item layout
 * also using as a default technology view in a shortcode
 */

$ext_technologies_settings = fw()->extensions->get( 'technologies' )->get_settings();
$taxonomy_name = $ext_technologies_settings['taxonomy_name'];

$icon_array = fw_ext_technologies_get_icon_array();

?>
<?php if ( $icon_array['icon_type'] ) : ?>
<article <?php post_class( 'bottommargin_30' ); ?>>
    <div class="media bottommargin_25">
        <div class="media-left media-middle">
            <?php echo wp_kses_post( $icon_array['icon_html']); ?>
        </div>
        <div class="media-body media-middle">
            <h4 class="entry-title">
                <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                </a>
            </h4>
        </div>
    </div>
    <div>
        <?php the_excerpt(); ?>
    </div>
</article>
<?php else: ?>
<article <?php post_class( 'vertical-item content-padding with_background rounded overflow_hidden' ) ?>>

    <div class="item-media">
        <?php the_post_thumbnail(); ?>
    </div>

    <div class="item-content">
        <h4 class="entry-title">
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </h4>
        <div>
            <?php the_excerpt(); ?>
        </div>
    </div>

</article>
<?php endif; ?>
