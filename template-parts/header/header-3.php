<?php
/**
 * The template part for selected header
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$social_icons = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'social_icons' ) : '';
?>

<header class="page_header header_white toggler_xs_right columns_margin_0">
    <div class="container-fluid">
        <div class="row">

            <div class="col-sm-12 display_table">
                <div class="header_left_logo display_table_cell">
					<?php get_template_part( 'template-parts/header/header-logo' ); ?>
                </div>

                <div class="header_mainmenu display_table_cell text-center">
                    <div class="mainmenu_wrapper primary-navigation">
						<?php wp_nav_menu( array(
							'theme_location' => 'primary',
							'menu_class'     => 'sf-menu nav-menu nav',
							'container'      => 'ul'
						) ); ?>
                    </div>
                    <!-- header toggler -->
                    <span class="toggle_menu"><span></span></span>
                </div>

                <div class="header_right_buttons display_table_cell text-right hidden-xs">
                    <ul class="inline-list menu darklinks">
		                <?php if ( class_exists( 'WooCommerce' ) ) : ?>

                            <li>
                                <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" class="header-button">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </a>
                            </li>

                            <li>
                                <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="cart-button header-button">
					                <?php if ( WC()->cart->get_cart_contents_count() ) : ?>
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
						                <?php
						                echo '<span class="total-price">' . WC()->cart->get_cart_subtotal() . '</span>';
					                else: ?>
                                        <i class="fa fa-shopping-cart empty" aria-hidden="true"></i>
					                <?php endif; ?>
                                </a>
                            </li>
		                <?php endif; ?>

                        <li>
                            <a href="#" class="search_modal_button header-button">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</header>
