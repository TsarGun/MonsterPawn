<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * Template for displaying content of post format fw-event
 *
 * Used for archive/search/shortcodes
 */

$terms          = get_the_terms( get_the_ID(), 'fw-event-taxonomy-name' );
$filter_classes = '';
if ( !empty($terms) ) {
	foreach ( $terms as $term ) {
		$filter_classes .= ' filter-' . $term->slug;
	}
}

global $post;
$options = ( function_exists( 'fw_get_db_post_option' ) ) ? fw_get_db_post_option( $post->ID, fw()->extensions->get( 'events' )->get_event_option_id() ) : false;

$event_location_array = array( $options['event_location']['venue'], $options['event_location']['city'], $options['event_location']['state'], $options['event_location']['country'], $options['event_location']['zip'] );

$event_location = implode( ', ', array_filter($event_location_array) );
?>
<article <?php post_class( "side-item side-sm content-padding big-padding with_background rounded overflow_hidden " . $filter_classes ); ?>>
    <div class="row">
        <?php if ( has_post_thumbnail() ) : ?>
        <div class="col-xs-12 col-sm-5">
            <div class="item-media-wrap">
                <div class="item-media">
                    <?php the_post_thumbnail( 'cashelrie-square-width' ); ?>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-7">
        <?php else: ?>
            <div class="col-xs-12">
        <?php endif; //has_post_thumbnail ?>

            <div class="item-content">
                <header class="entry-header">

                    <?php
                    the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
                    ?>

                    <div class="entry-meta inline-content with_dividers small-text highlight">
                        <?php
                        if ( ! empty( $options['event_children'][0] ) ) :
                            if ( $options['event_children'][0]['event_date_range']['from'] ) : ?>
                                <span>
                                    <?php echo date_i18n(get_option('date_format') . '  ' . get_option('time_format') ,strtotime( $options['event_children'][0]['event_date_range']['from'] )) ?>
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

                <div class="entry-content content-3lines-ellipsis">
                    <?php the_excerpt(); ?>
                </div><!-- .entry-content -->

            </div>

        </div>
    </div>
</article><!-- eof vertical-item -->
