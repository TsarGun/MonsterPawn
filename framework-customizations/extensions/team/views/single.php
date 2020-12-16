<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * The template for displaying single service
 *
 */

get_header();
$pID = get_the_ID();

//no columns on single service page
$column_classes = fw_ext_extension_get_columns_classes( true );

//getting taxonomy name
$ext_team_settings = fw()->extensions->get( 'team' )->get_settings();
$taxonomy_name = $ext_team_settings['taxonomy_name'];

$atts = fw_get_db_post_option(get_the_ID());

$shortcodes_extension = fw()->extensions->get( 'shortcodes' );

$unique_id = uniqid();
?>
    <div id="content" class="<?php echo esc_attr( $column_classes['main_column_class'] ); ?>">
		<?php
		// Start the Loop.
		while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('row columns_padding_30'); ?>>
                <div class="col-xs-12 col-md-4 topmargin_0">
                    <div class="vertical-item">
                        <div class="item-media bottommargin_50">
							<?php the_post_thumbnail( 'cashelrieify-square-width' ); ?>
                        </div>
                        <div class="item-content">

                            <?php if ( ! empty( $atts['skills'] ) ) :
		                        foreach($atts['skills'] as $skill) :
			                        echo fw_ext( 'shortcodes' )->get_shortcode( 'progress_bar' )->render( $skill );
		                        endforeach;
	                        endif; //skills check ?>

                        </div>
                    </div>
                </div>
                <!-- .col-md-5 -->
                <div class="col-xs-12 col-sm-12 col-md-8 bottommargin_0 topmargin_0">

                    <header class="entry-header">
                        <div class="content-justify v-center v-spacing">
                            <div class="topmargin_0 rightmargin_20">
	                            <?php the_title( '<h1 class="entry-title bottommargin_5">', '</h1>' ); ?>
	                            <?php if ( ! empty( $atts['position'] ) ) : ?>
                                    <span class="small-text highlight"><?php echo wp_kses_post( $atts['position'] ); ?></span>
	                            <?php endif; //position ?>
                            </div>
	                        <?php if ( ! empty( $atts['social_icons'] ) ) : ?>
                                <div class="topmargin_0">
                                    <div class="member-social">
		                                <?php
		                                //get icons-social shortcode to render icons in team member item
		                                $shortcodes_extension = fw()->extensions->get( 'shortcodes' );
		                                if ( ! empty( $shortcodes_extension ) ) {
			                                echo fw_ext( 'shortcodes' )->get_shortcode( 'icons_social' )->render( array( 'social_icons' => $atts['social_icons'] ) );
		                                }
		                                ?>
                                    </div><!-- eof social icons -->
                                </div>
	                        <?php endif; //social icons ?>
                        </div>

	                    <?php if ( ! empty( $atts['icons'] ) ) : ?>
                            <div class="entry-meta inline-content grey darklinks fontsize_14">
			                    <?php
			                    if ( ! empty( $shortcodes_extension ) ) {

				                    foreach ( $atts['icons'] as $icon ) : ?>
                                        <span>
					                    <?php echo fw_ext( 'shortcodes' )->get_shortcode( 'icon' )->render( $icon ); ?>
                                        </span>
                                    <?php endforeach;
			                    }
			                    ?>
                            </div><!-- eof social icons -->
	                    <?php endif; //social icons ?>
                    </header>

					<?php the_content(); ?>

                    <?php if ( ! empty( json_decode($atts['form']['json'])[1] ) ) {
	                    echo fw_ext( 'shortcodes' )->get_shortcode( 'contact_form' )->render( $atts );
                    } //form check ?>

                </div>
            </article><!-- #post-## -->
		<?php endwhile; ?>
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