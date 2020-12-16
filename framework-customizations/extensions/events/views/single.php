<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
get_header();
global $post;
$options        = fw_get_db_post_option( $post->ID, fw()->extensions->get( 'events' )->get_event_option_id() );
$event_location_array = array( $options['event_location']['venue'], $options['event_location']['city'], $options['event_location']['state'], $options['event_location']['country'], $options['event_location']['zip'] );
$event_location = implode( ', ', array_filter($event_location_array) );

$column_classes = cashelrie_get_columns_classes();

$option_events =  fw_get_db_post_option( $post->ID );
$gallery_images =  $option_events['post-featured-gallery'];
?>
    <div id="content" class="<?php echo esc_attr( $column_classes['main_column_class'] ); ?>">
		<?php
		// Start the Loop.
		while ( have_posts() ) : the_post(); ?>
            <article
                    id="post-<?php the_ID(); ?>" <?php post_class( 'vertical-item content-padding big-padding with_background rounded overflow_hidden'); ?>>
	            <?php if ( ! empty( $gallery_images ) ) : ?>
                <div class="item-media-wrap">
                    <div class="item-media entry-thumbnail">
                        <div class="owl-carousel"
                             data-items="1"
                             data-responsive-xs="1"
                             data-responsive-sm="1"
                             data-responsive-md="1"
                             data-responsive-lg="1"
                             data-nav="true"
                             data-dots="true"
                        >
			                <?php foreach ( $gallery_images as $image ) : ?>
                                <div>
                                    <img src="<?php echo esc_url($image['url']) ?>" alt="<?php echo esc_attr($post->title); ?>">
                                </div>
			                <?php endforeach; ?>
                        </div>
                    </div>
                </div>
	            <?php
	            else:
		            cashelrie_post_thumbnail();
	            endif;
	            ?>

                <div class="item-content">
                    <header class="entry-header">

                        <h1 class="entry-title bottommargin_10"><?php the_title(); ?></h1>

                        <div class="entry-meta inline-content with_dividers small-text highlight">
		                    <?php
		                    if ( ! empty( $options['event_children'][0] ) ) :
			                    if ( $options['event_children'][0]['event_date_range']['from'] ) : ?>
                                    <span>
                                        <?php echo esc_html( $options['event_children'][0]['event_date_range']['from'] ); ?>
                                    </span>
			                    <?php endif;
		                    endif;

		                    if ( $options['event_location']['venue'] ) : ?>
                                <span>
                                    <?php echo esc_html( $event_location  ); ?>
                                </span>
		                    <?php endif; ?>
                        </div>

                    </header><!-- .entry-header -->

                    <?php
                    //tags
                    echo get_the_term_list( $post->ID, 'fw-event-tag', '<span class="categories-links theme_buttons small_buttons inverse">', ' ', '</span>' );
                    ?>
                    <?php the_content(); ?>

                    <?php
                    $map = fw_ext_events_render_map();
                    if ( $map ):
                        ?>
                        <div class="event-map topmargin_40">
                            <?php echo fw_ext_events_render_map(); ?>
                        </div>
                        <?php
                    endif; //map
                    ?>

                    <?php do_action( 'cashelrie_ext_events_after_content' ); ?>

                </div><!-- .item-content -->
            </article>

			<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
		endwhile; ?>

    </div><!--eof #content -->
<?php if ( $column_classes['sidebar_class'] ): ?>
    <!-- main aside sidebar -->
    <aside class="<?php echo esc_attr( $column_classes['sidebar_class'] ); ?>">
		<?php get_sidebar(); ?>
    </aside>
    <!-- eof main aside sidebar -->
	<?php
endif;
get_footer();