<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 */

get_header();
$pID = get_the_ID();

$fw_ext_projects_gallery_image = fw()->extensions->get( 'portfolio' )->get_config( 'image_sizes' );
$fw_ext_projects_gallery_image = $fw_ext_projects_gallery_image['gallery-image'];
//no columns on single gallery page
$column_classes = cashelrie_get_columns_classes( true );

?>
	<div id="content" class="col-sm-10 col-sm-push-1">
		<?php
		// Start the Loop.
		while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class( 'text-center' ); ?>>
				<!-- .entry-header -->
				<div class="vertical-item content-padding big-padding with_border with_background">
                    <div class="item-media-wrap">
                        <div class="item-media">
		                    <?php
		                    $thumbnails = fw_ext_portfolio_get_gallery_images();
		                    if ( has_post_thumbnail() ) {
			                    $thumbnail_id = get_post_thumbnail_id();
			                    $thumbnail = array(
				                    'attachment_id' => $thumbnail_id,
				                    'url'            => wp_get_attachment_url( $thumbnail_id )
			                    );
			                    array_unshift ( $thumbnails, $thumbnail );
		                    }
		                    $captions   = array();
		                    if ( sizeof($thumbnails) > 1 ) :
			                    $loop = ( count( $thumbnails ) > 1 ) ? "true" : "false";
			                    ?>
                                <div id="owl-carousel-<?php echo esc_attr( $pID ); ?>" class="owl-carousel"
                                     data-loop="<?php echo esc_attr( $loop ); ?>"
                                     data-margin="0"
                                     data-nav="<?php echo esc_attr( $loop ); ?>"
                                     data-dots="false"
                                     data-themeclass="owl-theme entry-thumbnail-carousel"
                                     data-center="false"
                                     data-items="1"
                                     data-autoplay="true"
                                     data-responsive-xs="1"
                                     data-responsive-sm="1"
                                     data-responsive-md="1"
                                     data-responsive-lg="1"
                                >
				                    <?php foreach ( $thumbnails as $thumbnail ) :
					                    $attachment = get_post( $thumbnail['attachment_id'] );
					                    $captions[ $thumbnail['attachment_id'] ] = $attachment->post_title;
					                    $image = fw_resize( $thumbnail['attachment_id'], $fw_ext_projects_gallery_image['width'], $fw_ext_projects_gallery_image['height'], $fw_ext_projects_gallery_image['crop'] );
					                    ?>
                                        <div class="item">
                                            <img src="<?php echo esc_attr( $image ); ?>"
                                                 class="portfolio-gallery-image"
                                                 alt="<?php echo esc_attr( $attachment->post_title ); ?>"
                                                 title="portfolio-gallery-image-<?php echo esc_attr( $attachment->ID ); ?>"
                                                 width="<?php echo esc_attr( $fw_ext_projects_gallery_image['width'] ); ?>"
                                                 height="<?php echo esc_attr( $fw_ext_projects_gallery_image['height'] ); ?>"
                                            >
                                        </div>
				                    <?php endforeach ?>
                                </div>
			                    <?php
		                    else: ?>

                                <a href="<?php echo get_the_post_thumbnail_url( null, 'cashelrieify-full-width'); ?>" class="prettyPhoto" data-gal="prettyPhoto[gal-<?php echo esc_attr( uniqid() ); ?>]">
				                    <?php the_post_thumbnail( 'cashelrieify-full-width' ); ?>
                                </a>
			                    <?php
		                    endif; //more than one thumbnail check
		                    ?>
                        </div><!-- .item-media -->
                    </div>
					<div class="item-content entry-content">
                        <header class="entry-header">
                            <div class="categories-links small-text highlight2links">
		                        <?php
		                        echo get_the_term_list( $pID, 'fw-portfolio-category', '', ' ', '' );
		                        ?>
                            </div>
                            <h1 class="entry-title"><?php the_title(); ?></h1>
                        </header><!-- .entry-header -->
			            <?php if ( !empty( get_the_content() ) ) : ?>
                        <div class="entry-content bottommargin_30">
                            <?php the_content(); ?>
                        </div>
                        <?php endif; ?>

                        <?php
						//buttons_share
						cashelrie_share_this( true, false, 'color-bg-icon rounded-icon' )
						?>
					</div>
					<!-- .entry-content -->
				</div>
				<!-- .entry-content -->
			</article><!-- #post-## -->

		<?php endwhile;

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}

		?>

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