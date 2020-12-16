<?php
/**
 * The template for displaying the footer and copyrights
 *
 * Contains footer content and the closing of the main container, row and section. Also closing #canvas and #box_wrapper
 */
if ( ! is_page_template( 'page-templates/full-width.php' ) ) : ?>
				</div><!-- eof .row-->
			</div><!-- eof .container -->
		</section><!-- eof .page_content -->
	<?php
endif;

if ( ( is_active_sidebar( 'sidebar-footer' ) && ! is_404() ) ) {
	$footer = cashelrie_get_predefined_template_part( 'footer' );
	get_template_part( 'template-parts/footer/' . esc_attr( $footer ) );
}

$copyrights = cashelrie_get_predefined_template_part( 'copyrights' );

if ( is_404() ) {
	get_template_part( 'template-parts/copyrights/copyrights-3' );
} else {
	get_template_part( 'template-parts/copyrights/' . esc_attr( $copyrights ) );
}

?>
	</div><!-- eof #box_wrapper -->
</div><!-- eof #canvas -->
<?php wp_footer(); ?>
</body>
</html>