<?php
/**
 * Template Name: Full Width Page
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header();

//If Unyson not installed - adding regular section with full width column
if ( ! defined( 'FW' ) ) :
	global $main_section_class;
	?>
	<section class="<?php echo esc_attr( $main_section_class ); ?> ms page_content section_padding_top_100 section_padding_bottom_75 columns_padding_25">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
	<?php
endif; //FW check
// Start the Loop.
while ( have_posts() ) : the_post();
	// Include the page content template.
	if ( is_search() ) : ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php
	else :
		//hidding "more link" in content
		the_content();

		wp_link_pages( array(
			'before'      => '<div class="page-links topmargin_30"><span class="page-links-title">' . esc_html__( 'Pages:', 'cashelrie' ) . '</span>',
			'after'       => '</div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
		) );
	endif; //is_search

	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		//comments_template();
	}
endwhile;

if ( ! defined( 'FW' ) ) : ?>
				</div><!-- eof .col-sm-12 -->
			</div><!-- eof .row -->
		</div><!-- eof .container -->
	</section><!-- eof section -->
	<?php
endif; //FW check

get_footer();