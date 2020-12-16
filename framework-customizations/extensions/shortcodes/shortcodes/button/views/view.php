<?php
if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$button_type = ( isset( $atts['button_types']['button_type'] ) ) ? $atts['button_types']['button_type'] : 'simple_link';
$complex_button = ( strpos( $button_type, 'complex_button' ) !== false ) ? true : false;
$min_width = ( isset( $atts['button_types'][$button_type]['min_width'] ) && $atts['button_types'][$button_type]['min_width'] ) ? ' min_width_button' : '';
$small_button = ( isset( $atts['button_types'][$button_type]['small_button'] ) && $atts['button_types'][$button_type]['small_button'] ) ? ' small_button' : '';
$icon_side = ( isset( $atts['button_types'][$button_type]['button_icon']['use_icon'] ) && $atts['button_types'][$button_type]['button_icon']['use_icon'] ) ? $atts['button_types'][$button_type]['button_icon']['icon']['icon_side'] : '';
$icon = ( isset( $atts['button_types'][$button_type]['button_icon']['use_icon'] ) && $atts['button_types'][$button_type]['button_icon']['use_icon'] ) ? $atts['button_types'][$button_type]['button_icon']['icon']['icon_source'] : '';
$complex_left_icon = ( $complex_button && $atts['button_types'][$button_type]['icon_left']['type'] !== 'none' ) ? $atts['button_types'][$button_type]['icon_left'] : false;
$complex_right_icon = ( $complex_button && $atts['button_types'][$button_type]['icon_right']['type'] !== 'none' ) ? $atts['button_types'][$button_type]['icon_right'] : false;
?>
<a href="<?php echo esc_url( $atts['link'] ) ?>" target="<?php echo esc_attr( $atts['target'] ) ?>"
   class="<?php echo esc_attr( $button_type . $min_width . $small_button ); ?>">
    <?php if ( !$complex_button && $icon_side === 'left' && $icon['type'] !== 'none' ) : ?>
	    <?php if ( $icon['type'] === 'icon-font') : ?>
            <i class="<?php echo esc_attr( $icon['icon-class'] ); ?> rightpadding_10"></i>
	    <?php else:
		    echo wp_get_attachment_image( $icon['attachment-id'] );
	    endif; ?>
    <?php endif; ?>

    <?php if ( $complex_button ) : ?>
        <?php if ( $complex_left_icon ) : ?>
        <span class="left-icon">
	        <?php if ( $complex_left_icon['type'] !== 'none' ) :
		        if ( $complex_left_icon['type'] === 'icon-font') : ?>
                    <i class="<?php echo esc_attr( $complex_left_icon['icon-class'] ); ?>"></i>
		        <?php else:
			        echo wp_get_attachment_image( $complex_left_icon['attachment-id'] );
		        endif;
	        endif;
	        ?>
        </span>
        <?php endif; ?>
        <span><?php echo wp_kses( $atts['label'], array( 'br' => array() ) ); ?></span>
	    <?php if ( $complex_right_icon ) : ?>
            <span class="right-icon">
			    <?php if ( $complex_right_icon['type'] !== 'none' ) :
				    if ( $complex_right_icon['type'] === 'icon-font') : ?>
                        <i class="<?php echo esc_attr( $complex_right_icon['icon-class'] ); ?>"></i>
				    <?php else:
					    echo wp_get_attachment_image( $complex_right_icon['attachment-id'] );
				    endif;
			    endif;
			    ?>
        </span>
	    <?php endif; ?>
    <?php else: ?>
	    <span><?php echo wp_kses( $atts['label'], array( 'br' => array() ) ); ?></span>
    <?php endif; ?>

	<?php if ( !$complex_button && $icon_side === 'right' && $icon['type'] !== 'none' ) : ?>
		<?php if ( $icon['type'] === 'icon-font') : ?>
            <i class="<?php echo esc_attr( $icon['icon-class'] ); ?> leftpadding_10"></i>
		<?php else:
			echo wp_get_attachment_image( $icon['attachment-id'] );
		endif; ?>
	<?php endif; ?>
</a>