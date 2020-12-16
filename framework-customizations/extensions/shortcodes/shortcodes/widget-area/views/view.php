<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var array $atts ;
 * @var string $content ;
 * @var string $tag ;
 */
?>
<aside class="shortcode-widget-area"><?php dynamic_sidebar( $atts['sidebar'] ); ?></aside>
