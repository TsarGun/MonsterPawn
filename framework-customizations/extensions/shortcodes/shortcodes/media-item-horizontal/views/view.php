<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var array $atts
 */

//building item column classes:
$item_lg_image_css_class = 'col-lg-6';
$item_lg_text_css_class  = 'col-lg-6';

$item_md_image_css_class = 'col-md-6';
$item_md_text_css_class  = 'col-md-6';

$item_sm_image_css_class = 'col-sm-6';
$item_sm_text_css_class  = 'col-sm-6';

$item_xs_image_css_class = 'col-xs-12';
$item_xs_text_css_class  = 'col-xs-12';

$text_lg = ( 12 - (int) $atts['responsive_lg'] ) ? ( 12 - (int) $atts['responsive_lg'] ) : 12;
$text_md = ( 12 - (int) $atts['responsive_md'] ) ? ( 12 - (int) $atts['responsive_md'] ) : 12;
$text_sm = ( 12 - (int) $atts['responsive_sm'] ) ? ( 12 - (int) $atts['responsive_sm'] ) : 12;
$text_xs = ( 12 - (int) $atts['responsive_xs'] ) ? ( 12 - (int) $atts['responsive_xs'] ) : 12;


//detecting right image
if ( ! $atts['image_right'] ) :

	$item_lg_image_css_class = 'col-lg-' . $atts['responsive_lg'];
	$item_lg_text_css_class  = 'col-lg-' . $text_lg;

	$item_md_image_css_class = 'col-md-' . $atts['responsive_md'];
	$item_md_text_css_class  = 'col-md-' . $text_md;

	$item_sm_image_css_class = 'col-sm-' . $atts['responsive_sm'];
	$item_sm_text_css_class  = 'col-sm-' . $text_sm;

	$item_xs_image_css_class = 'col-xs-' . $atts['responsive_xs'];
	$item_xs_text_css_class  = 'col-xs-' . $text_xs;

else:

	$item_lg_image_css_class = ( $atts['responsive_lg'] != 12 ) ? 'col-lg-' . $atts['responsive_lg'] . ' col-lg-push-' . $text_lg : 'col-lg-12';
	$item_lg_text_css_class  = ( $text_lg != 12 ) ? 'col-lg-' . $text_lg . ' col-lg-pull-' . $atts['responsive_lg'] : 'col-lg-12';

	$item_md_image_css_class = ( $atts['responsive_md'] != 12 ) ? 'col-md-' . $atts['responsive_md'] . ' col-md-push-' . $text_md : 'col-md-12';
	$item_md_text_css_class  = ( $text_md != 12 ) ? 'col-md-' . $text_md . ' col-md-pull-' . $atts['responsive_md'] : 'col-md-12';

	$item_sm_image_css_class = ( $atts['responsive_sm'] != 12 ) ? 'col-sm-' . $atts['responsive_sm'] . ' col-sm-push-' . $text_sm : 'col-sm-12';
	$item_sm_text_css_class  = ( $text_sm != 12 ) ? 'col-sm-' . $text_sm . ' col-sm-pull-' . $atts['responsive_sm'] : 'col-sm-12';

	$item_xs_image_css_class = ( $atts['responsive_xs'] != 12 ) ? 'col-xs-' . $atts['responsive_xs'] . ' col-xs-push-' . $text_xs : 'col-xs-12';
	$item_xs_text_css_class  = ( $text_xs != 12 ) ? 'col-xs-' . $text_xs . ' col-xs-pull-' . $atts['responsive_xs'] : 'col-xs-12';

endif;


//detecting no image
if ( ! $atts['item_image'] ) :
	//building item column classes:
	$item_lg_text_css_class = 'col-lg-12';
	$item_md_text_css_class = 'col-md-12';
	$item_sm_text_css_class = 'col-sm-12';
	$item_xs_text_css_class = 'col-xs-12';
endif;
?>
<div class="side-item <?php echo esc_attr( $atts['item_style'] ); ?>">
	<div class="row">
		<?php if ( $atts['item_image'] ) : ?>
			<div
				class="<?php echo esc_attr( $item_lg_image_css_class . ' ' . $item_md_image_css_class . ' ' . $item_sm_image_css_class . ' ' . $item_xs_image_css_class ) ?>">
				<div class="item-media">
					<img src="<?php echo esc_url( $atts['item_image']['url'] ); ?>"
					     alt="<?php echo esc_attr( $atts['title'] ); ?>">
					<?php if ( $atts['link'] ) : ?>
						<div class="media-links">
							<a class="abs-link" href="<?php echo esc_url( $atts['link'] ); ?>"></a>
						</div>
					<?php endif; //link ?>
				</div>
			</div> <!-- eof image .col-* -->
		<?php endif; //item image check ?>
		<div
			class="<?php echo esc_attr( $item_lg_text_css_class . ' ' . $item_md_text_css_class . ' ' . $item_sm_text_css_class . ' ' . $item_xs_text_css_class ) ?>">
			<div class="item-content">
				<?php if ( $atts['title'] ) : ?>
				<<?php echo esc_html( $atts['title_tag'] ) ?>>
				<?php if ( $atts['link'] ) : ?>
				<a href="<?php echo esc_url( $atts['link'] ); ?>">
					<?php endif; //link ?>
					<?php echo esc_html( $atts['title'] ); ?>
					<?php if ( $atts['link'] ) : ?>
				</a>
			<?php endif; //link ?>
			</<?php echo esc_html( $atts['title_tag'] ) ?>>
			<?php endif; //title ?>
			<?php echo wp_kses_post( $atts['content'] ); ?>
			<?php
			//additional info
			if ( $atts['icons'] ) :
				?>
				<div class="row">
					<?php
					//split icons array in two columns
					foreach ( array_chunk( $atts['icons'], ( ceil( count( $atts['icons'] ) / 2 ) ) ) as $split_icons ) :
						?>
						<div class="col-lg-6">
							<ul class="list1 no-bullets">
								<?php foreach ( $split_icons as $icon ) : ?>
									<li>
										<?php
										echo fw_ext( 'shortcodes' )->get_shortcode( 'icon' )->render( $icon );
										?>
									</li>
								<?php endforeach; //icon 
								?>
							</ul>
						</div><!-- eof col-lg-6 -->
					<?php endforeach; //array_chunk 
					?>
				</div>
			<?php endif; //icons; ?>
			<?php if ( $atts['social_icons'] ) :
				//get icons-social shortcode to render icons in item
				echo fw_ext( 'shortcodes' )->get_shortcode( 'icons_social' )->render( array( 'social_icons' => $atts['social_icons'] ) );
			endif; //social_icons ?>
		</div>
	</div><!-- eof text .col-* -->
</div><!-- eof .row -->
</div><!-- eof .side-item -->
