<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
} ?>
<?php

$slider_background = isset( $data['settings']['extra']['slider_background'] ) ? $data['settings']['extra']['slider_background'] : '';
$all_src_cover = $data['settings']['extra']['all_scr_cover'] ? ' all-scr-cover' : '';

$page_mainslider = '';
$vertical_nav = '';

if ( is_front_page() ) {
	$page_mainslider = 'page_mainslider';
	$vertical_nav = 'vertical-nav';
}

if ( isset( $data['slides'] ) ): ?>
	<section class="intro_section <?php echo esc_attr( $page_mainslider . ' ' . $slider_background . $all_src_cover ); ?>">
		<div class="flexslider <?php echo esc_attr( $vertical_nav ); ?>" data-nav="false" data-dots="true">
			<ul class="slides">
				<?php foreach ( $data['slides'] as $id => $slide ):
				$slide_image_custom_class  = isset( $slide['extra']['slide_image_class'] ) ? $slide['extra']['slide_image_class'] : '';
				$slide_align      = isset( $slide['extra']['slide_align'] ) ? $slide['extra']['slide_align'] : false;
				$slide_layers     = isset( $slide['extra']['slide_layers'] ) ? $slide['extra']['slide_layers'] : false;
				$slide_buttons           = isset( $slide['extra']['slide_buttons'] ) ? $slide['extra']['slide_buttons'] : false;
				$slide_button_animation = isset( $slide['extra']['slide_button_animation'] ) ? $slide['extra']['slide_button_animation'] : false;

				$slide_media_layers = !empty( $slide['extra']['slide_media_layers'] ) ? $slide['extra']['slide_media_layers'] : false;
				$slide_media_layers_before = array();
				$slide_media_layers_after = array();

				if ( $slide_media_layers ) {
					$slide_media_layers_before = array_filter( $slide_media_layers, function($v, $k) {
                        return $v['media_layer_position'] === 'before';
					}, ARRAY_FILTER_USE_BOTH );

					$slide_media_layers_after = array_filter( $slide_media_layers, function($v, $k) {
						return $v['media_layer_position'] === 'after';
					}, ARRAY_FILTER_USE_BOTH );
                }
				?>

				<li class="<?php echo esc_attr( $slide_align ); ?>">

                    <?php //Media Layers before main image
                    if ( !empty( $slide_media_layers_before ) ) :
                        foreach ( $slide_media_layers_before as $layer ) :
                        ?>
                        <div class="slide-image-wrap <?php echo esc_attr( $layer['media_layer_animation'] ? 'to_animate ' : ''); echo esc_attr( $layer['media_layer_class'] ); ?>" data-animation="<?php echo esc_attr( $layer['media_layer_animation'] ); ?>">
	                        <?php
	                        if ( !empty( $layer['media_layer_image'] ) ) {
		                        echo wp_get_attachment_image( $layer['media_layer_image']['attachment_id'], 'full' );
	                        }
	                        ?>
                        </div>
                    <?php endforeach;
                    endif; ?>

                    <div class="slide-image-wrap <?php echo esc_attr( $slide_image_custom_class ); ?>">
                        <?php echo wp_get_attachment_image( $slide['attachment_id'], 'full' ) ?>
                    </div>

					<?php //Media Layers after main image
					if ( !empty( $slide_media_layers_after ) ) :
						foreach ( $slide_media_layers_after as $layer ) :
							?>
                            <div class="slide-image-wrap <?php echo esc_attr( $layer['media_layer_animation'] ? 'to_animate ' : ''); echo esc_attr( $layer['media_layer_class'] ); ?>" data-animation="<?php echo esc_attr( $layer['media_layer_animation'] ); ?>">
								<?php
                                if ( !empty( $layer['media_layer_image'] ) ) {
	                                echo wp_get_attachment_image( $layer['media_layer_image']['attachment_id'], 'full' );
                                }
                                ?>
                            </div>
						<?php endforeach;
					endif; ?>

					<div class="container">
						<div class="row">
							<div class="col-sm-12">
								<div class="slide_description_wrapper">
									<?php if ( $slide_layers || $slide_buttons ) : ?>
                                        <div class="slide_description">

                                            <?php foreach ( $slide_layers as $layer ): ?>
                                                <div class="intro-layer" data-animation="<?php echo esc_attr( $layer['layer_animation'] ); ?>">
                                                    <?php if ( $layer['layer_tag'] === 'hr' ) : ?>
                                                        <hr class="theme-divider big <?php echo esc_attr( $layer['layer_text_color'] ); ?>" />
                                                    <?php else: ?>
                                                        <<?php echo esc_html( $layer['layer_tag'] ); ?> class="<?php echo esc_attr( $layer['layer_text_color'] ); ?> <?php echo esc_attr( $layer['layer_text_weight'] ); ?> <?php echo esc_attr( $layer['layer_text_transform'] ); ?>">
                                                            <?php echo wp_kses_post( $layer['layer_text'] ) ?>
                                                        </<?php echo esc_html( $layer['layer_tag'] ); ?>>
                                                    <?php endif; ?>
                                                </div>
                                            <?php endforeach; ?>
                                            <?php if ( !empty( $slide_buttons ) ) : ?>
                                                <div class="intro-layer" data-animation="<?php echo esc_attr( $slide_button_animation ); ?>">
                                                    <div class="slide_buttons inline-content v-spacing">
                                                        <?php foreach( $slide_buttons as $button ) : ?>
                                                            <?php echo fw()->extensions->get('shortcodes')->get_shortcode('button')->render($button); ?>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                             <?php endif; ?>
                                        </div> <!-- eof .slide_description -->
                                    <?php endif; ?>
                                </div> <!-- eof .slide_description_wrapper -->
                            </div> <!-- eof .col-* -->
                        </div><!-- eof .row -->
                    </div><!-- eof .container -->
                </li>
		        <?php endforeach; ?>
		    </ul>
		</div> <!-- eof flexslider -->
	</section> <!-- eof intro_section -->
<?php endif; ?>