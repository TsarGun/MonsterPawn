<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

//1 - col-*-12
//2 - col-*-6
//3 - col-*-4
//4 - col-*-3
//6 - col-*-2

//bootstrap col-lg-* class
$lg_class = '';
switch ( $atts['responsive_lg'] ) :
	case ( 1 ) :
		$lg_class = 'col-lg-12';
		break;

	case ( 2 ) :
		$lg_class = 'col-lg-6';
		break;

	case ( 3 ) :
		$lg_class = 'col-lg-4';
		break;

	case ( 4 ) :
		$lg_class = 'col-lg-3';
		break;
	//6
	default:
		$lg_class = 'col-lg-2';
endswitch;

//bootstrap col-md-* class
$md_class = '';
switch ( $atts['responsive_md'] ) :
	case ( 1 ) :
		$md_class = 'col-md-12';
		break;

	case ( 2 ) :
		$md_class = 'col-md-6';
		break;

	case ( 3 ) :
		$md_class = 'col-md-4';
		break;

	case ( 4 ) :
		$md_class = 'col-md-3';
		break;
	//6
	default:
		$md_class = 'col-md-2';
endswitch;

//bootstrap col-sm-* class
$sm_class = '';
switch ( $atts['responsive_sm'] ) :
	case ( 1 ) :
		$sm_class = 'col-sm-12';
		break;

	case ( 2 ) :
		$sm_class = 'col-sm-6';
		break;

	case ( 3 ) :
		$sm_class = 'col-sm-4';
		break;

	case ( 4 ) :
		$sm_class = 'col-sm-3';
		break;
	//6
	default:
		$sm_class = 'col-sm-2';
endswitch;

//bootstrap col-xs-* class
$xs_class = '';
switch ( $atts['responsive_xs'] ) :
	case ( 1 ) :
		$xs_class = 'col-xs-12';
		break;

	case ( 2 ) :
		$xs_class = 'col-xs-6';
		break;

	case ( 3 ) :
		$xs_class = 'col-xs-4';
		break;

	case ( 4 ) :
		$xs_class = 'col-xs-3';
		break;
	//6
	default:
		$xs_class = 'col-xs-2';
endswitch;

$id = uniqid( 'testimonials-' );

//fw_print($atts);

switch ( $atts['layout'] ):
	case 'owlcarousel': ?>
        <div class="owl-carousel testimonials-owl-carousel"
             data-responsive-lg="<?php echo esc_attr( $atts['responsive_lg'] ); ?>"
             data-responsive-md="<?php echo esc_attr( $atts['responsive_md'] ); ?>"
             data-responsive-sm="<?php echo esc_attr( $atts['responsive_sm'] ); ?>"
             data-responsive-xs="<?php echo esc_attr( $atts['responsive_xs'] ); ?>"
             data-dots="true"
             data-nav="false"
        >

			<?php
			foreach ( $atts['testimonials'] as $testimonial ):
				$avatar = $testimonial['review_avatar']['url'];

				$alt = get_post_meta($testimonial['review_avatar']['attachment_id'], '_wp_attachment_image_alt', true);

				$img_attributes = array(
					'src' => $avatar,
					'alt' => $alt ? $alt : $avatar
				);
				?>
                <blockquote class="text-center">
                    <div class="item-meta topmargin_0">
                        <div class="avatar">
	                        <?php echo fw_html_tag('img', $img_attributes); ?>
                        </div>
                        <h4><?php echo esc_html( $testimonial['review_name'] ); ?></h4>
                        <span class="small-text highlight2">
                            <?php echo esc_html( $testimonial['review_position'] ); ?>
                        </span>
                        <?php
                            $stars = round( $testimonial['review_rating'] * 5 / 100, 1 );
                        ?>
                        <div class="star-rating" title="<?php echo esc_attr__('Rated', 'cashelrie' ) . esc_attr( $stars ) . esc_attr__('out of', 'cashelrie' ) . 5.0; ?>">
                            <span style="width:<?php echo esc_attr( $testimonial['review_rating'] ); ?>%">
                                <strong class="rating"><?php esc_html( $stars ); ?></strong> <?php echo esc_attr__('out of', 'cashelrie' ); ?> 5
                            </span>
                        </div>
                    </div>
	                <?php echo wp_kses_post( $testimonial['review_content'] ); ?>
                </blockquote>
				<?php
			endforeach; ?>

        </div>
		<?php
		break; //eof big flexslider layout

	//default bootstrap layout
	default: ?>
        <div class="isotope_container isotope row masonry-layout"
             data-filters=".isotope_filters-<?php echo esc_attr( $unique_id ); ?>">

            <?php foreach ( $atts['testimonials'] as $testimonial ) :
	            $avatar = $testimonial['review_avatar']['url'];

	            $alt = get_post_meta($testimonial['review_avatar']['attachment_id'], '_wp_attachment_image_alt', true);

	            $img_attributes = array(
		            'src' => $avatar,
		            'alt' => $alt ? $alt : $avatar
	            );
                ?>
            <div class="isotope-item <?php echo esc_attr( $lg_class . ' ' . $md_class . ' ' . $sm_class . ' ' . $xs_class ); ?>">
                <blockquote class="text-center margin_0">
                    <div class="item-meta topmargin_0">
                        <div class="avatar">
				            <?php echo fw_html_tag('img', $img_attributes); ?>
                        </div>
                        <h4><?php echo esc_html( $testimonial['review_name'] ); ?></h4>
                        <span class="small-text highlight2">
                            <?php echo esc_html( $testimonial['review_position'] ); ?>
                        </span>
			            <?php
			            $stars = round( $testimonial['review_rating'] * 5 / 100, 1 );
			            ?>
                        <div class="star-rating" title="<?php echo esc_attr__('Rated', 'cashelrie' ) . esc_attr( $stars ) . esc_attr__('out of', 'cashelrie' ) . 5.0; ?>">
                            <span style="width:<?php echo esc_attr( $testimonial['review_rating'] ); ?>%">
                                <strong class="rating"><?php esc_html( $stars ); ?></strong> <?php echo esc_attr__('out of', 'cashelrie' ); ?> 5
                            </span>
                        </div>
                    </div>
		            <?php echo wp_kses_post( $testimonial['review_content'] ); ?>
                </blockquote>
            </div>
            <?php endforeach; ?>

        </div><!-- eof .isotope_container -->
        <?php
		break; //eof bootstrap layout
endswitch;

