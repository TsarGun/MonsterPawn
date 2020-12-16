<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var array $atts
 */

$cover_image = !empty( $atts['cover_image']['url'] ) ? $atts['cover_image']['url'] : '';

$alt = !empty( $atts['cover_image'] ) ? get_post_meta($atts['cover_image']['attachment_id'], '_wp_attachment_image_alt', true) : '';

$img_attributes = array(
	'src' => $cover_image,
	'alt' => $alt ? $alt : $cover_image
);

$responsive_layout = $atts['video_sizes']['video_size'] === 'custom' ? false : $atts['video_sizes']['video_size'];

global $wp_embed;

$width  = ( is_numeric( $atts['video_sizes']['custom']['width'] ) && ( $atts['video_sizes']['custom']['width'] > 0 ) ) ? $atts['video_sizes']['custom']['width'] : '300';
$height = ( is_numeric( $atts['video_sizes']['custom']['height'] ) && ( $atts['video_sizes']['custom']['height'] > 0 ) ) ? $atts['video_sizes']['custom']['height'] : '200';
$iframe = $wp_embed->run_shortcode( '[embed  width="' . $width . '" height="' . $height . '"]' . trim( $atts['url'] ) . '[/embed]' );
?>

<?php if ( $responsive_layout ) : ?>
<div class="embed-responsive <?php echo esc_attr( $responsive_layout ); ?>">
	<?php if ( !empty ( $cover_image ) ): ?>
    <a href="" data-iframe="<?php echo esc_attr( $iframe ) ?>" class="embed-placeholder">
	<?php else:
        echo wp_kses( $iframe, array( 'iframe' => array(
            'width' => true,
            'height' => true,
            'src' => true,
            'frameborder' => true,
            'allowfullscreen' => true,
        ), ) );
    endif; //has_post_thumbnail inside iframe check

	if ( !empty ( $cover_image ) ) :?>
        <?php echo fw_html_tag('img', $img_attributes); ?>
    </a><!-- eof image link -->
    <?php endif; //post thumbnail check for closing A tag ?>
</div>
<?php else: ?>
<div class="video-wrapper shortcode-container">
	<?php echo do_shortcode( $iframe ); ?>
</div>
<?php endif; ?>


<!--echo fw_html_tag('img', $img_attributes);-->
