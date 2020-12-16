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
$column_classes = cashelrie_get_columns_classes( true );

//getting taxonomy name
$ext_services_settings = fw()->extensions->get( 'services' )->get_settings();
$taxonomy_name = $ext_services_settings['taxonomy_name'];

$image_alt = get_post_meta(get_post_thumbnail_id($pID), '_wp_attachment_image_alt', true);

?>
    <div id="content" class="<?php echo esc_attr( $column_classes['main_column_class'] ); ?>">
		<?php
		// Start the Loop.
		while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class( "toppadding_5" ); ?>>

                <?php echo wp_get_attachment_image( get_post_thumbnail_id(), 'cashelrie-full-width', false, array( 'class' => 'alignright' ) ); ?>

                <h1 class="entry-title section_header topmargin_0">
					<?php the_title(); ?>
                </h1>

				<?php the_content(); ?>

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