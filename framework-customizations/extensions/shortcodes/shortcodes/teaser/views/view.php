<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var array $atts
 */

$teaser_type = isset( $atts['teaser_types']['teaser_type'] ) ? $atts['teaser_types']['teaser_type'] : false;
$teaser_accent_color = isset( $atts['teaser_accent_color'] ) ? $atts['teaser_accent_color'] : '';
$icon_style = isset( $atts['teaser_types'][ $teaser_type ]['icon_style'] ) ? $atts['teaser_types'][ $teaser_type ]['icon_style'] : false;
$icon_class = '';

switch ( $icon_style ) {
    case 'default_icon':
        switch ( $teaser_accent_color ) {
            case 'dark':
	            $icon_class = 'grey';
                break;
            case 'color1':
	            $icon_class = 'highlight';
                break;
            case 'color2':
	            $icon_class = 'highlight2';
                break;
            case 'color3':
	            $icon_class = 'highlight3';
                break;
            case 'color4':
	            $icon_class = 'highlight4';
                break;
            default:
	            $icon_class = 'default_icon';
        }
        break;
	case 'border_icon':
		switch ( $teaser_accent_color ) {
			case 'dark':
				$icon_class = 'border_icon grey';
				break;
			case 'color1':
				$icon_class = 'border_icon highlight';
				break;
			case 'color2':
				$icon_class = 'border_icon highlight2';
				break;
			case 'color3':
				$icon_class = 'border_icon highlight3';
				break;
			case 'color4':
				$icon_class = 'border_icon highlight4';
				break;
			default:
				$icon_class = 'border_icon';
		}
		break;
	case 'background_icon':
		switch ( $teaser_accent_color ) {
			case 'dark':
				$icon_class = 'darkgrey_bg_color';
				break;
			case 'color1':
				$icon_class = 'main_bg_color';
				break;
			case 'color2':
				$icon_class = 'main_bg_color2';
				break;
			case 'color3':
				$icon_class = 'main_bg_color3';
				break;
			case 'color4':
				$icon_class = 'main_bg_color4';
				break;
			default:
				$icon_class = 'grey_bg_color';
		}
		break;
	case 'border_icon round':
		switch ( $teaser_accent_color ) {
			case 'dark':
				$icon_class = 'border_icon round grey';
				break;
			case 'color1':
				$icon_class = 'border_icon round highlight';
				break;
			case 'color2':
				$icon_class = 'border_icon round highlight2';
				break;
			case 'color3':
				$icon_class = 'border_icon round highlight3';
				break;
			case 'color4':
				$icon_class = 'border_icon round highlight4';
				break;
			default:
				$icon_class = 'border_icon round';
		}
		break;
	case 'background_icon round':
		switch ( $teaser_accent_color ) {
			case 'dark':
				$icon_class = 'darkgrey_bg_color round';
				break;
			case 'color1':
				$icon_class = 'main_bg_color round';
				break;
			case 'color2':
				$icon_class = 'main_bg_color2 round';
				break;
			case 'color3':
				$icon_class = 'main_bg_color3 round';
				break;
			case 'color4':
				$icon_class = 'main_bg_color4 round';
				break;
			default:
				$icon_class = 'grey_bg_color round';
		}
		break;
	case 'round light_bg_color thick_border_icon':
		switch ( $teaser_accent_color ) {
			case 'dark':
				$icon_class = 'round light_bg_color big_wrapper thick_border_icon grey';
				break;
			case 'color1':
				$icon_class = 'round light_bg_color big_wrapper thick_border_icon highlight';
				break;
			case 'color2':
				$icon_class = 'round light_bg_color big_wrapper thick_border_icon highlight2';
				break;
			case 'color3':
				$icon_class = 'round light_bg_color big_wrapper thick_border_icon highlight3';
				break;
			case 'color4':
				$icon_class = 'round light_bg_color big_wrapper thick_border_icon highlight4';
				break;
			default:
				$icon_class = 'round light_bg_color big_wrapper thick_border_icon';
		}
		break;
}

$teaser_image  = isset( $atts['teaser_types'][ $teaser_type ]['teaser_image'] ) ? $atts['teaser_types'][ $teaser_type ]['teaser_image'] : false;
$teaser_banner  = isset( $atts['teaser_types'][ $teaser_type ]['teaser_banner'] ) ? $atts['teaser_types'][ $teaser_type ]['teaser_banner'] : false;
$icon          = isset( $atts['teaser_types'][ $teaser_type ]['icon'] ) ? $atts['teaser_types'][ $teaser_type ]['icon'] : false;
$icon_size     = isset( $atts['teaser_types'][ $teaser_type ]['icon_size'] ) ? $atts['teaser_types'][ $teaser_type ]['icon_size'] : 'size_small';
$image_icon = $icon['type'] === 'custom-upload' ? ' image_icon' : false;
$teaser_center = isset( $atts['teaser_types'][ $teaser_type ]['teaser_center'] ) ? $atts['teaser_types'][ $teaser_type ]['teaser_center'] : false;
$teaser_vertical_center   = ( isset( $atts['teaser_types'][ $teaser_type ]['is_vertical_center'] ) && $atts['teaser_types'][ $teaser_type ]['is_vertical_center'] ) ? ' media-middle' : false;
$teaser_offset_icon = ( isset( $atts['teaser_types'][ $teaser_type ]['teaser_offset_icon'] ) && $atts['teaser_types'][ $teaser_type ]['teaser_offset_icon'] ) ? ' top_offset_icon' : '';

//for counter teaser
$number                  = isset( $atts['teaser_types'][ $teaser_type ]['number'] ) ? ( int ) $atts['teaser_types'][ $teaser_type ]['number'] : false;
$counter_additional_text = isset( $atts['teaser_types'][ $teaser_type ]['counter_additional_text'] ) ? $atts['teaser_types'][ $teaser_type ]['counter_additional_text'] : false;
$speed                   = isset( $atts['teaser_types'][ $teaser_type ]['speed'] ) ? $atts['teaser_types'][ $teaser_type ]['speed'] : false;

//common teaser properties for all teaser types
$title        = $atts['title'];
$teaser_style = $atts['teaser_style'];
$title_tag    = $atts['title_tag'];
$title_transform    = $atts['title_text_transform'];
$title_weight    = $atts['title_text_wight'];
$link         = $atts['link'];
$content      = $atts['content'];
$title_hover_color = '';
switch ( $teaser_accent_color ) {
	case 'color2':
		$title_hover_color = ' hover-color2';
		break;
	case 'color3':
		$title_hover_color = ' hover-color3';
		break;
	case 'color4':
		$title_hover_color = ' hover-color4';
		break;
}

$button_options = isset( $atts['teaser_types'][ $teaser_type ]['button']['show_button'] ) ? $atts['teaser_types'][ $teaser_type ]['button']['button'] : false;
$button_label = isset( $atts['teaser_types'][ $teaser_type ]['button']['show_button'] ) ? $atts['teaser_types'][ $teaser_type ]['button']['button']['label'] : false;
$button_color = isset( $atts['teaser_types'][ $teaser_type ]['button']['button']['color'] ) ? $atts['teaser_types'][ $teaser_type ]['button']['button']['color'] : 'theme_button';

//available teaser layouts:
//icon_left
//icon_right
//image_top
//image_left
//image_right
//counter
//icon_image_bg
//icon_top - default

switch ( $teaser_type ) :

	case 'icon_image_bg': ?>

		<div class="bg_teaser with_padding big-padding <?php echo esc_attr( $teaser_style ); ?>">
			<?php if ( $teaser_image ) : ?>
                <img src="<?php echo esc_url( $teaser_image['url'] ); ?>" alt="<?php echo esc_attr( $title ); ?>">
			<?php endif; //teaser_image ?>

            <div class="teaser_content">
                <?php if ( ( $icon_class && $icon['type'] === 'icon-font' ) || ( $icon['type'] === 'custom-upload' ) ): ?>
                    <div class="teaser_icon <?php echo esc_attr( $icon_size . $image_icon ); ?>">
                        <?php if ( $icon['type'] === 'icon-font') : ?>
                            <i class="<?php echo esc_attr( $icon['icon-class'] ); ?>"></i>
                        <?php else:
                            echo wp_get_attachment_image( $icon['attachment-id'] );
                        endif; ?>
                    </div>
                <?php endif; //icon ?>

                <?php if ( $title ): ?>
                    <<?php echo esc_html( $title_tag ); //h3 ?>>
                        <?php if ( $link ): ?>
                        <a href="<?php echo esc_url( $link ); ?>">
                            <?php endif; //$link ?>

                            <?php echo wp_kses_post( $title ); ?>

                            <?php if ( $link ): ?>
                        </a>
                    <?php endif; //$link ?>
                    </<?php echo esc_html( $title_tag ); //h3 ?>>
                <?php endif; //$title ?>

                <?php if ( $content ) : ?>
                    <?php echo wp_kses_post( $content ); ?>
                <?php endif; //$content ?>

                <?php if ( $button_options ) :
                    $button_options['link'] = $link;
                    ?>
                    <p class="topmargin_30 bottommargin_0">
                        <?php echo fw()->extensions->get('shortcodes')->get_shortcode('button')->render( $button_options ); ?>
                    </p>
                <?php endif; ?>

                <?php if ( $teaser_banner ) : ?>
                    <div class="media-links">
                        <a href="<?php echo esc_url( $link ); ?>" class="abs-link"></a>
                    </div>
                <?php endif; ?>

            </div>
		</div>

		<?php
		break; //icon_image_bg

	//left icon layout
	case 'icon_left':
		?>
		<div class="teaser media <?php echo esc_attr( $teaser_style ); ?>">
			<?php if ( ( $icon_class && $icon['type'] === 'icon-font' ) || ( $icon['type'] === 'custom-upload' ) ) : ?>
				<div class="media-left<?php echo esc_attr( $teaser_vertical_center ); ?>">
					<div class="teaser_icon <?php echo esc_attr( $icon_size . ' ' . $icon_class . $image_icon ); ?>">
						<?php if ( $icon['type'] === 'icon-font') : ?>
                            <i class="<?php echo esc_attr( $icon['icon-class'] ); ?>"></i>
						<?php else:
							echo wp_get_attachment_image( $icon['attachment-id'] );
						endif; ?>
					</div>
				</div>
			<?php endif; //$icon_class check
			?>
			<div class="media-body<?php echo esc_attr( $teaser_vertical_center ); ?>">
				<?php if ( $title ): ?>
				<<?php echo esc_html( $title_tag ); //h3 ?> class="<?php echo esc_attr( $title_transform . ' ' . $title_weight . $title_hover_color ); ?>">
				<?php if ( $link ): ?>
				<a href="<?php echo esc_url( $link ); ?>">
					<?php endif; //$link ?>

					<?php echo wp_kses_post( $title ); ?>

					<?php if ( $link ): ?>
				</a>
			<?php endif; //$link ?>
			</<?php echo esc_html( $title_tag ); //h3 ?>>
		<?php endif; //$title 
		?>
			<?php if ( $content ) : ?>

					<?php echo wp_kses_post( $content ); ?>

			<?php endif; //$content 
			?>
			<?php if ( $button_label && $link ) : ?>
				<a href="<?php echo esc_url( $link ); ?>"
				   class="<?php echo esc_attr( $button_color ); ?>"><?php echo esc_html( $button_label ); ?></a>
			<?php endif; ?>
		</div><!-- eof .media-body -->
		</div><!-- eof .teaser -->
		<?php
		break; //icon_left

	//right icon layout
	case 'icon_right':
		?>
		<div class="teaser media text-right <?php echo esc_attr( $teaser_style ); ?>">
			<div class="media-body<?php echo esc_attr( $teaser_vertical_center ); ?>">
				<?php if ( $title ): ?>
				<<?php echo esc_html( $title_tag ); //h3 ?> class="<?php echo esc_attr( $title_transform . ' ' . $title_weight . $title_hover_color ); ?>">
				<?php if ( $link ): ?>
				<a href="<?php echo esc_url( $link ); ?>">
					<?php endif; //$link ?>

					<?php echo wp_kses_post( $title ); ?>

					<?php if ( $link ): ?>
				</a>
			<?php endif; //$link ?>
			</<?php echo esc_html( $title_tag ); //h3 ?>>
			<?php endif; //$title 
			?>
			<?php if ( $content ) : ?>

					<?php echo wp_kses_post( $content ); ?>

			<?php endif; //$content 
			?>
			<?php if ( $button_label && $link ) : ?>
				<a href="<?php echo esc_url( $link ); ?>"
				   class="<?php echo esc_attr( $button_color ); ?>"><?php echo esc_html( $button_label ); ?></a>
			<?php endif; ?>
		</div><!-- eof .media-body -->
		<?php if ( ( $icon_class && $icon['type'] === 'icon-font' ) || ( $icon['type'] === 'custom-upload' ) ) : ?>
		<div class="media-right<?php echo esc_attr( $teaser_vertical_center ); ?>">
			<div class="teaser_icon <?php echo esc_attr( $icon_size . ' ' . $icon_class . $image_icon ); ?>">
				<?php if ( $icon['type'] === 'icon-font') : ?>
                    <i class="<?php echo esc_attr( $icon['icon-class'] ); ?>"></i>
				<?php else:
					echo wp_get_attachment_image( $icon['attachment-id'] );
				endif; ?>
			</div>
		</div>
	<?php endif; //icon_style 
		?>
		</div><!-- eof .teaser -->

		<?php
		break; //icon_right

	case 'counter' :

		?>
		<div class="teaser text-center <?php echo esc_attr( $teaser_style ); ?>">
			<?php if ( ( $icon_class && $icon['type'] === 'icon-font' ) || ( $icon['type'] === 'custom-upload' ) ) : ?>
				<div class="teaser_icon <?php echo esc_attr( $icon_size . ' ' . $icon_class . $image_icon ); ?>">
					<?php if ( $icon['type'] === 'icon-font') : ?>
                        <i class="<?php echo esc_attr( $icon['icon-class'] ); ?>"></i>
					<?php else:
						echo wp_get_attachment_image( $icon['attachment-id'] );
					endif; ?>
				</div>
			<?php endif; //icon_style 
			?>
			<?php if ( $counter_additional_text ) : ?>
				<h3 class="counter-wrap">
					<span class="counter" data-from="0" data-to="<?php echo esc_attr( $number ); ?>"
					      data-speed="<?php echo esc_attr( $speed ); ?>">0</span><span
						class="counter-add"><?php echo esc_html( $counter_additional_text ); ?></span>
				</h3>
			<?php else : //no counter adds ?>
				<h3 class="counter" data-from="0" data-to="<?php echo esc_attr( $number ); ?>"
				    data-speed="<?php echo esc_attr( $speed ); ?>">
					0
				</h3>
			<?php endif; //$counter_additional_text 
			?>

			<?php if ( $title ) : ?>
				<p>
					<?php echo wp_kses_post( $title ); ?>
				</p>
			<?php endif; //$name 
			?>
		</div>
		<?php
		break; //count

    case 'icon_background' : ?>

        <div class="teaser icon-bg-teaser darklinks grey <?php echo esc_attr( $teaser_accent_color ); ?> text-center">
	        <?php if ( ( $icon_class && $icon['type'] === 'icon-font' ) || ( $icon['type'] === 'custom-upload' ) ) : ?>

			        <?php if ( $icon['type'] === 'icon-font') : ?>
                        <i class="<?php echo esc_attr( $icon['icon-class'] ); ?> icon-background"></i>
			        <?php else:
				        echo wp_get_attachment_image( $icon['attachment-id'], 'thumbnail', false, array( 'class' => 'icon-background' ) );
			        endif; ?>
	        <?php endif; //icon_style
	        ?>

	        <?php echo wp_kses_post( $content ); ?>
        </div>
     <?php break;

	//default layout - icon_top
	default:
		?>
	<div class="teaser <?php echo esc_attr( $teaser_center . ' ' . $teaser_style . $teaser_offset_icon ); ?>">
		<?php if ( ( $icon_class && $icon['type'] === 'icon-font' ) || ( $icon['type'] === 'custom-upload' ) ) : ?>
		<div class="teaser_icon <?php echo esc_attr( $icon_size . ' ' . $icon_class . $image_icon ); ?>">
			<?php if ( $icon['type'] === 'icon-font') : ?>
                <i class="<?php echo esc_attr( $icon['icon-class'] ); ?>"></i>
			<?php else:
				echo wp_get_attachment_image( $icon['attachment-id'] );
			endif; ?>
		</div>
	<?php endif; //icon_style 
		?>
		<?php if ( $title ): ?>
		<<?php echo esc_html( $title_tag ); //h3 ?> class="<?php echo esc_attr( $title_transform . ' ' . $title_weight . $title_hover_color ); ?> ">
		<?php if ( $link ): ?>
			<a href="<?php echo esc_url( $link ); ?>">
		<?php endif; //$link ?>

		<?php echo wp_kses_post( $title ); ?>

		<?php if ( $link ): ?>
			</a>
		<?php endif; //$link ?>
		</<?php echo esc_html( $title_tag ); //h3 ?>>
	<?php endif; //$title 
		?>
		<?php if ( $content ) : ?>

			<?php echo wp_kses_post( $content ); ?>

	<?php endif; //$content 
		?>
		<?php if ( $button_label && $atts['teaser_types'][ $teaser_type ]['button']['show_button'] ) : ?>
		<a href="<?php echo esc_url( $link ); ?>"
		   class="<?php echo esc_attr( $button_color ); ?>"><?php echo esc_html( $button_label ); ?></a>
	<?php endif; ?>
		</div>
	<?php endswitch; ?>