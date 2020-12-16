<?php
/**
 * The template part for selected title (breadcrubms) section
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<section class="page_breadcrumbs cs gradient lighten_gradient section_padding_25 table_section table_section_md">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center text-md-left">
                <h1 class="small">
					<?php
					get_template_part( 'template-parts/breadcrumbs/page-title-text' );
					?>
                </h1>
            </div>
            <div class="col-md-6 text-center text-md-right">
				<?php
				if ( function_exists( 'fw_ext_breadcrumbs' ) ) {
					fw_ext_breadcrumbs();
				}
				?>
            </div><!-- eof .col-* -->
        </div><!-- eof .row -->
    </div><!-- eof .container -->
</section><!-- eof .page_breadcrumbs -->



