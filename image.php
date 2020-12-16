<?php
/**
 * The template for displaying image attachments
 */

get_header();

// Retrieve attachment metadata.
$metadata       = wp_get_attachment_metadata();
$column_classes = cashelrie_get_columns_classes(); ?>
	<div id="content" class="col-xs-12 col-lg-10 col-lg-offset-1 content-area image-attachment">
		<?php
		// Start the Loop.
		while ( have_posts() ) : the_post();
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="entry-content">
					<div class="entry-attachment">
						<div class="attachment rounded overflow_hidden bottommargin_35">
                            <?php
                            $attachment_id = $post->ID;
                            printf( '<a href="%1$s" rel="attachment" class="prettyPhoto" data-gal="prettyPhoto[gal-<?php echo esc_attr( uniqid() ); ?>]">%2$s</a>',
                            wp_get_attachment_image_src( $attachment_id, 'full' )[0],
                            wp_get_attachment_image( $attachment_id, 'cashelrie-full-width' )
                            );
                            ?>
						</div><!-- .attachment -->

						<?php if ( has_excerpt() ) : ?>
							<div class="entry-caption">
								<?php the_excerpt(); ?>
							</div><!-- .entry-caption -->
						<?php endif; ?>
					</div><!-- .entry-attachment -->
					<header class="entry-header">
						<div class="entry-meta item-meta small-text content-justify vertical-center content-margins">
                            <span>
							    <?php cashelrie_posted_on( true, true ); ?>
	                            <?php esc_html_e( 'in', 'cashelrie' ); ?> <span class="parent-post-link darklinks"><a href="<?php echo esc_url( get_permalink( $post->post_parent ) ); ?>"><?php echo get_the_title( $post->post_parent ); ?></a></span>
                            </span>
						</div><!-- .entry-meta -->
					</header><!-- .entry-header -->

			        <?php if ( !empty( get_the_content() ) ) : ?>
                        <div class="entry-title">
					    <?php the_content(); ?>
                        </div>
                    <?php endif; ?>

					<div class="full-size-link tag-links"><a href="<?php echo esc_url( wp_get_attachment_url() ); ?>"><?php echo esc_html( $metadata['width'] ); ?> &times; <?php echo esc_html( $metadata['height'] ); ?></a></div>

                    <?php
					wp_link_pages( array(
						'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'cashelrie' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
					) );
					?>
				</div><!-- .entry-content -->
			</article><!-- #post-## -->

			<nav id="image-navigation"
			     class="navigation image-navigation page-nav row columns_padding_5 topmargin_60">
					<div class="col-xs-12 col-sm-6">
                        <div class="previous-image nav-item">
						<?php previous_image_link( false, esc_html__( 'Previous Image', 'cashelrie' ) ); ?>
                        </div>
					</div>
					<div class="col-xs-12 col-sm-6">
                        <div class="next-image nav-item">
							<?php next_image_link( false, esc_html__( 'Next Image', 'cashelrie' ) ); ?>
                        </div>
					</div>
			</nav><!-- #image-navigation -->

			<?php comments_template(); ?>

		<?php endwhile; // end of the loop. ?>
	</div><!--eof #content -->
<?php
get_footer();