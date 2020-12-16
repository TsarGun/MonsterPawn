<?php
/**
 * The template for displaying 404 pages (Not Found)
 */

get_header();
//true - no sidebar on 404 page
$column_classes = cashelrie_get_columns_classes( true ); ?>
	<div id="content" class="<?php echo esc_attr( $column_classes['main_column_class'] ); ?> text-right">
        <div class="inline-block text-center">
            <p class="not_found">
                <span class="highlight"><?php esc_html_e( '404', 'cashelrie' ); ?></span>
            </p>
            <h1 class="grey"><?php esc_html_e( 'Oops, page not found!', 'cashelrie' ); ?></h1>
            <p>
		        <?php esc_html_e( 'You can search what interested:', 'cashelrie' ); ?>
            </p>
            <div class="widget widget_search">
		        <?php get_search_form(); ?>
            </div>
            <p>
		        <?php esc_html_e( 'or', 'cashelrie' ); ?>
            </p>
            <p>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="theme_button color1 min_width_button">
			        <?php esc_html_e( 'Back To Home', 'cashelrie' ); ?>
                </a>
            </p>
        </div>
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