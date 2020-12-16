<?php
/**
 * The template part for selected title (breadcrubms) section
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<section class="page_breadcrumbs ds section_padding_top_25 section_padding_bottom_25">
	<div class="container">
		<div class="col-sm-12 text-center text-md-left display_table_md">
			<h1 class="small display_table_cell_md">
				<?php
					get_template_part( 'template-parts/breadcrumbs/page-title-text' );
				?>
			</h1>
			<?php if ( function_exists( 'fw_ext_breadcrumbs' ) ) { ?>
			<div class="display_table_cell_md">
				<?php fw_ext_breadcrumbs();  ?>
			</div>
		<?php } ?>
		</div><!-- eof .col-* .display_table_md -->
	</div><!-- eof .container -->
</section><!-- eof .page_breadcrumbs -->