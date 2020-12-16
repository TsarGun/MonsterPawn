<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var $atts The shortcode attributes
 */
$highlight = 'highlight' . $atts['accent_color'];
$main_bg_color = 'main_bg_color' . $atts['accent_color'];

?>
<ul class="price-table with_background with_border">
	<?php if( ! empty( $atts['title']) ) : ?>
	<li class="plan-name <?php echo esc_attr( $main_bg_color ); ?>">
		<h4 class="grey"><?php echo wp_kses_post( $atts['title'] ); ?></h4>
	</li>
	<?php endif; ?>
	<li class="plan-price <?php echo esc_attr( $highlight ); ?>">
        <span class="grey">
	<?php if( ! empty( $atts['currency']) ) : ?>
		<?php echo wp_kses_post( $atts['currency'] ); ?>
	<?php endif; ?>
	<?php if( ! empty( $atts['price']) ) : ?>
		<span class="big"><?php echo wp_kses_post( $atts['price'] ); ?></span><?php echo wp_kses_post( $atts['price_decimal'] ); ?>
	<?php endif; ?>
    <?php if( ! empty( $atts['description']) ) : ?>
        <div class="price-description <?php echo esc_attr( $highlight ); ?>"><?php echo wp_kses_post( $atts['description'] ); ?></div>
    <?php endif; ?>
	</li>
	<?php if( ! empty( $atts['features']) ) : ?>
	<li class="features-list">
		<ul>
		<?php foreach( ( $atts['features']) as $feature ) : ?>
			<li class="<?php echo esc_attr( $feature['feature_checked'] ); ?>">
				<?php echo wp_kses_post( $feature['feature_name'] ); ?>
			</li>
		<?php endforeach; ?>
		</ul>
	</li>
	<?php endif; ?>

	<?php if ( !empty( $atts['price_buttons'] ) ) : ?>
        <li class="call-to-action">
            <?php foreach( $atts['price_buttons'] as $button ) : ?>
                <?php echo fw()->extensions->get('shortcodes')->get_shortcode('button')->render($button); ?>
            <?php endforeach; ?>
        </li>
	<?php endif; ?>

</ul>
