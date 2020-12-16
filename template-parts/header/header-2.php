<?php
/**
 * The template part for selected header
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$header_variant = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'header' )['header_var'] : '';
$social_icons = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'social_icons' ) : '';
$toplogo_teasers = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'header' )[$header_variant]['topline_combined_teasers'] : '';
?>


<section class="page_toplogo table_section table_section_md ls section_padding_top_5 section_padding_bottom_5 columns_margin_0">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 display_table padding_0">
                <div class="header_left_logo display_table_cell">
                    <?php get_template_part( 'template-parts/header/header-logo' ); ?>
                </div>
                <div class="header_mainmenu display_table_cell text-right hidden-xxs">
                    <div class="inline-teasers-wrap">
                        <?php if ( !empty( $toplogo_teasers ) ) : ?>
                        <?php foreach ( $toplogo_teasers as $teaser ) : ?>
                            <div class="media teaser inline-block text-left loop-color darklinks">
                                <div class="media-left media-middle">
                                    <?php if ( $teaser['teaser_icon']['type'] !== 'none' ) : ?>
                                    <div class="teaser_icon size_small main_bg_color round">
                                        <?php if ( $teaser['teaser_icon']['type'] === 'icon-font') : ?>
                                            <i class="<?php echo esc_attr( $teaser['teaser_icon']['icon-class'] ); ?>"></i>
                                        <?php else:
                                            echo wp_get_attachment_image( $teaser['teaser_icon']['attachment-id'] );
                                        endif; ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <div class="media-body media-middle grey">
                                    <?php if ( $teaser['teaser_text_link'] ) : ?>
                                    <a href="<?php echo esc_url( $teaser['teaser_text_link'] ) ?>">
                                        <?php endif;
                                        echo wp_kses_post( $teaser['teaser_text'] );
                                        if ( $teaser['teaser_text_link'] ) : ?>
                                    </a>
                                <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<header class="page_header header_white thin_header toggler_left columns_margin_0">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 display_table">

                <div class="header_mainmenu display_table_cell">
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

                <div class="header_right_buttons display_table_cell text-right">
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
