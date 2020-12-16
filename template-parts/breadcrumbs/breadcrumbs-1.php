<?php
/**
 * The template part for selected title (breadcrubms) section
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$background_image = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'breadcrumbs_background_image' ) : '';
$background_image_url = isset( $background_image['url'] ) ? 'url(' . esc_url( $background_image['url'] ) . ')' : 'none';
?>
<section class="page_breadcrumbs cs main_color2 gradient lighten_gradient background_cover section_padding_top_75 section_padding_bottom_75" <?php echo function_exists( 'fw_get_db_customizer_option' ) ? 'style="background-image: ' . $background_image_url . '"' : ''; ?>>
	<div class="container">
		<div class="row">
            <div class="col-sm-12 col-md-8">
                    <h1 class="grey">
                        <?php
                        get_template_part( 'template-parts/breadcrumbs/page-title-text' );
                        ?>
                    </h1>

                    <?php
                    if ( function_exists( 'woocommerce_breadcrumb123' ) ) {
                        woocommerce_breadcrumb( array(
                            'delimiter'   => '',
                            'wrap_before' => '<nav class="woocommerce-breadcrumb" ' . ( is_single() ? 'itemprop="breadcrumb"' : '' ) . '><ol class="breadcrumb big-spacing darklinks">',
                            'wrap_after'  => '</ol></nav>',
                            'before'      => '<li>',
                            'after'       => '</li>',
                            'home'        => esc_html_x( 'Home', 'breadcrumb', 'cashelrie' )
                        ) );
                    } elseif ( function_exists( 'fw_ext_breadcrumbs' ) ) {
                        fw_ext_breadcrumbs();
                    }

	            ?>
            </div>
		</div>
	</div>
</section>