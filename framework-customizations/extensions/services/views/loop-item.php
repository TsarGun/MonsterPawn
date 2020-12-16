<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * Single service loop item layout
 * also using as a default service view in a shortcode
 */

$ext_services_settings = fw()->extensions->get( 'services' )->get_settings();
$taxonomy_name = $ext_services_settings['taxonomy_name'];

$icon_array = fw_ext_services_get_icon_array();

?>
<?php if ( has_post_thumbnail() ) : ?>
    <article <?php post_class( 'vertical-item content-padding big-padding with_background rounded overflow_hidden text-center' ); ?>>

        <div class="item-media entry-thumbnail">
	        <?php the_post_thumbnail( 'cashelrie-square-width' ); ?>
        </div>

        <div class="item-content">
            <div class="entry-content">
                <h3 class="entry-title">
                    <a href="<?php the_permalink(); ?>">
			            <?php the_title(); ?>
                    </a>
                </h3>
                <div class="content-3lines-ellipsis">
		            <?php the_excerpt(); ?>
                </div>
            </div>
            <p class="topmargin_30">
                <a href="<?php echo get_permalink(); ?>" class="theme_button color1 small_button">
                    <?php echo esc_html__( 'Read More', 'cashelrie' ); ?>
                </a>
            </p>
        </div>

    </article>
<?php else: ?>
<div class="teaser text-center">

    <?php if ( $icon_array['icon_type'] === 'image' ) : ?>
        <?php echo wp_kses_post( $icon_array['icon_html']); ?>
    <?php else: //icon ?>
        <div class="teaser_icon black size_big border_icon">
            <?php echo wp_kses_post( $icon_array['icon_html']); ?>
        </div>
    <?php endif; ?>
	<h3>
		<a href="<?php the_permalink(); ?>">
			<?php the_title(); ?>
		</a>
	</h3>
	<div class="theme_buttons small_buttons color1">
	<?php
		echo get_the_term_list( get_the_ID(), $taxonomy_name, '', ' ', '' );
	?>
	</div>
	<div>
		<?php the_excerpt(); ?>
	</div>
</div><!-- eof .teaser -->
<?php endif; ?>
