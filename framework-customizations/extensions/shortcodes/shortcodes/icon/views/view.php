<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var array $atts
 */

$icon_size = ' ' . $atts['icon_size'];

if ( !empty( $atts['content'] ) ) :
	?>
	<p>
		<?php if ( $atts['icon'] ): ?>

            <?php if ( $atts['icon']['type'] !== 'none' ) :
                if ( $atts['icon']['type'] === 'icon-font') : ?>
                    <i class="<?php echo esc_attr( $atts['icon']['icon-class'] . ' ' . $atts['icon_style'] . $icon_size ); ?> rightpadding_10"></i>
                <?php else:
                    echo wp_get_attachment_image($atts['icon']['attachment-id'] );
                endif;
            endif;
            ?>

		<?php endif; //icon 
		?>

		<?php if ( !empty( $atts['link'] ) ) : ?>
            <a href="<?php echo esc_attr( $atts['link'] ); ?>">
        <?php endif;
                echo wp_kses_post( $atts['content'] );
        if ( !empty( $atts['link'] ) ) : ?>
            </a>
        <?php endif; ?>

	</p>
	<?php
//only icon
else:
	?>
	<span class="theme-icon">
        <?php if ( $atts['icon']['type'] !== 'none' ) :
            if ( $atts['icon']['type'] === 'icon-font') : ?>
                <i class="<?php echo esc_attr( $atts['icon']['icon-class'] . ' ' . $atts['icon_style'] . $icon_size ); ?>"></i>
            <?php else:
                echo wp_get_attachment_image($atts['icon']['attachment-id'] );
            endif;
        endif;
        ?>
    </span>
	<?php
endif;