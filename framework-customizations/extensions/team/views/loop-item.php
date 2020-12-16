<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * Single service loop item layout
 * also using as a default service view in a shortcode
 */

$ext_team_settings = fw()->extensions->get( 'team' )->get_settings();
$taxonomy_name = $ext_team_settings['taxonomy_name'];

$pID = get_the_ID();
$atts = fw_get_db_post_option($pID);
global $post;

?>
<article <?php post_class( "side-item side-sm content-padding big-padding with_background rounded overflow_hidden" ); ?> >
    <div class="row">
	    <?php if ( has_post_thumbnail() ) : ?>
        <div class="col-xs-12 col-sm-5 col-lg-4">
            <div class="item-media-wrap">
                <div class="item-media">
			        <?php the_post_thumbnail( 'cashelrie-square-width' ); ?>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-7 col-lg-8">
	    <?php else: ?>
        <div class="col-xs-12">
        <?php endif; //has_post_thumbnail ?>

            <div class="item-content">
                <header class="entry-header">
                    <h3 class="entry-title bottommargin_5">
                        <a href="<?php the_permalink(); ?>">
					        <?php the_title(); ?>
                        </a>
                    </h3>
			        <?php if ( ! empty( $atts['position'] ) ) : ?>
                        <span class="small-text highlight"><?php echo wp_kses_post( $atts['position'] ); ?></span>
			        <?php endif; //position ?>
                </header>

                <?php if ( !empty( $post->post_content ) || !empty( $post->post_excerpt ) ) {
                    the_excerpt();
                } ?>

		        <?php if ( ! empty( $atts['social_icons'] ) ) : ?>
                    <div class="member-social topmargin_30">
				        <?php
				        //get icons-social shortcode to render icons in team member item
				        $shortcodes_extension = fw()->extensions->get( 'shortcodes' );
				        if ( ! empty( $shortcodes_extension ) ) {
					        echo fw_ext( 'shortcodes' )->get_shortcode( 'icons_social' )->render( array( 'social_icons' => $atts['social_icons'] ) );
				        }
				        ?>
                    </div><!-- eof social icons -->
		        <?php endif; //social icons ?>
            </div>

        <div>
    </div>
</article><!-- eof .vertical-item -->
