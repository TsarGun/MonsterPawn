<?php
/**
 * The template part for selected header
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<?php get_template_part( 'template-parts/header/top-logo' ); ?>

<header class="page_header header_white bordered_items columns_margin_0">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<nav class="mainmenu_wrapper primary-navigation">
					<?php wp_nav_menu( array(
						'theme_location' => 'primary',
						'menu_class'     => 'sf-menu nav-menu nav',
						'container'      => 'ul'
					) ); ?>
				</nav>
			</div><!--	eof .col-sm-* -->
		</div><!--	eof .row-->
	</div> <!--	eof .container-->
</header><!-- eof .page_header -->