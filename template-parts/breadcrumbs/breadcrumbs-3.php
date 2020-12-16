<?php
/**
 * The template part for selected title (breadcrubms) section
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<section class="page_breadcrumbs cs main_color2 gradient lighten_gradient section_padding_top_25 section_padding_bottom_25">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-center">
				<h1 class="grey">
					<?php
					get_template_part( 'template-parts/breadcrumbs/page-title-text' );
					?>
				</h1>
			<?php
				if ( function_exists( 'fw_ext_breadcrumbs' ) ) {
					fw_ext_breadcrumbs();
				}
			?>
			</div><!-- eof .col-* -->
		</div><!-- eof .row -->
	</div><!-- eof .container -->
</section><!-- eof .page_breadcrumbs -->