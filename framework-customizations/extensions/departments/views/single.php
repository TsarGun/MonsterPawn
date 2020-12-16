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
$ext_departments_settings = fw()->extensions->get( 'departments' )->get_settings();
$taxonomy_name = $ext_departments_settings['taxonomy_name'];

$atts = fw_get_db_post_option(get_the_ID());

$shortcodes_extension = fw()->extensions->get( 'shortcodes' );

$unique_id = uniqid();
?>
	<div id="content" class="<?php echo esc_attr( $column_classes['main_column_class'] ); ?>">
		<?php
		// Start the Loop.
		while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class('row columns_padding_25'); ?>>
				<div class="col-md-5">

					<div class="vertical-item content-padding with_border rounded">

						<?php if ( has_post_thumbnail() ) : ?>
							<div class="item-media top_rounded overflow_hidden">
								<?php
								$full_image_src = wp_get_attachment_url( get_post_thumbnail_id( $pID ) );
								the_post_thumbnail();
								?>
							</div>
						<?php endif; //has_post_thumbnail ?>
						<div class="item-content">

							<h4>
                                <?php the_title(); ?>
							</h4>

							<?php the_excerpt(); ?>

						</div>

						<?php if ( ! empty( $atts['icons'] ) ) : ?>
							<div class="item-content with_top_border">
								<?php
								if ( ! empty( $shortcodes_extension ) ) {
									foreach ( $atts['icons'] as $icon ): ?>
										<?php
										//get teaser shortcode to render teasers inside a row
										echo fw_ext( 'shortcodes' )->get_shortcode( 'icon' )->render( $icon );
										?>
									<?php endforeach;
								}
								?>
							</div><!-- eof social icons -->
						<?php endif; //social icons ?>

						<?php if ( ! empty( $atts['social_icons'] ) ) : ?>
							<div class="item-content with_top_border text-center">
								<?php
								//get icons-social shortcode to render icons in department item
								$shortcodes_extension = fw()->extensions->get( 'shortcodes' );
								if ( ! empty( $shortcodes_extension ) ) {
									echo fw_ext( 'shortcodes' )->get_shortcode( 'icons_social' )->render( array( 'social_icons' => $atts['social_icons'] ) );
								}
								?>
							</div><!-- eof social icons -->
						<?php endif; //social icons ?>
					</div><!-- eof .vertical-item -->

				</div>
				<!-- .col-md-5 -->
				<div class="col-md-7">

							<?php the_content(); ?>

							<?php
								//department meta tabs start
								if (
									! empty( $atts['history'] )
									||
									! empty( $atts['services'] )
									||
									! empty( json_decode($atts['form']['json'])[1] )
								) :
								$tab_num = 0;
							?>
								<div class="bootstrap-tabs topmargin_50 bottommargin_60">
									<ul class="nav nav-tabs" role="tablist">
										<?php
											if ( ! empty( $atts['history'] ) ) :
										?>
                                                <li class="<?php echo esc_attr( $tab_num === 0 ? 'active' : '') ?>">
												<a href="#tab-<?php echo esc_attr( $unique_id . '-' . $tab_num ); ?>" role="tab" data-toggle="tab">
													<?php esc_html_e( 'History', 'cashelrie' ); ?>
												</a>
											</li>
										<?php
											$tab_num++;
											endif; //history check

											if ( ! empty( $atts['services'] ) ) :
										?>
                                            <li class="<?php echo esc_attr( $tab_num === 0 ? 'active' : '') ?>">
												<a href="#tab-<?php echo esc_attr( $unique_id . '-' . $tab_num ); ?>" role="tab" data-toggle="tab">
													<?php esc_html_e( 'Services', 'cashelrie' ); ?>
												</a>
											</li>
										<?php
											$tab_num++;
											endif; //history check

											if ( ! empty( json_decode($atts['form']['json'])[1] ) ) :
										?>
                                            <li class="<?php echo esc_attr( $tab_num === 0 ? 'active' : '') ?>">
												<a href="#tab-<?php echo esc_attr( $unique_id . '-' . $tab_num ); ?>" role="tab" data-toggle="tab">
													<?php esc_html_e( 'Send Message', 'cashelrie' ); ?>
												</a>
											</li>
										<?php
											$tab_num++;
											endif; //form check
										?>
									</ul>
									<div class="tab-content top-color-border">
										<?php
											$tab_num = 0;
											if ( ! empty( $atts['history'] ) ) :
										?>
                                        <div class="tab-pane tab-member-bio fade <?php echo esc_attr( $tab_num === 0 ? 'in active' : '' ) ?>"
											id="tab-<?php echo esc_attr( $unique_id ) . '-' . $tab_num ?>">
											<?php echo wp_kses_post( $atts['history'] ); ?>
										</div><!-- .eof tab-pane -->
										<?php
											$tab_num++;
											endif; //history check

											if ( ! empty( $atts['services'] ) ) :
										?>
                                        <div class="tab-pane tab-member-bio fade <?php echo esc_attr( $tab_num === 0 ? 'in active' : '' ) ?>"
										     id="tab-<?php echo esc_attr( $unique_id ) . '-' . $tab_num ?>">
											<?php echo wp_kses_post( $atts['services'] ); ?>
										</div><!-- .eof tab-pane -->
										<?php
											$tab_num++;
											endif; //services check

											if ( ! empty( json_decode($atts['form']['json'])[1] ) ) :
										?>
                                        <div class="tab-pane tab-member-bio fade <?php echo esc_attr( $tab_num === 0 ? 'in active' : '' ) ?>"
										     id="tab-<?php echo esc_attr( $unique_id ) . '-' . $tab_num ?>">
											<?php echo fw_ext( 'shortcodes' )->get_shortcode( 'contact_form' )->render( $atts ); ?>
										</div><!-- .eof tab-pane -->
										<?php
											$tab_num++;
											endif; //form check
										?>
									</div>
								</div>
							<?php endif; //tab content check ?>

							<?php if ( ! empty( $atts['additional_content'] ) ) : ?>
								<div class="department-additional-content topmargin_30">
									<?php echo wp_kses_post( $atts['additional_content'] ); ?>
								</div>
							<?php endif; //additional content ?>

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