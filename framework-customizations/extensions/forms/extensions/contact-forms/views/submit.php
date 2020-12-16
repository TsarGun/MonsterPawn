<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var int $form_id
 * @var string $submit_button_text
 * @var array $extra_data
 */

?>
<div class="wrap-forms form-submit topmargin_20">
	<div class="row">
		<div class="col-sm-12 bottommargin_0">
            <button class="<?php echo esc_attr( $extra_data['submit_button_type'] ); ?> min_width_button" type="submit">
	            <?php echo esc_html( $submit_button_text ); ?>
            </button>
			<?php if ( $extra_data['reset_button_text'] ) : ?>
                <button class="theme_button inverse min_width_button" type="reset">
	                <?php echo esc_html( $extra_data['reset_button_text'] ); ?>
                </button>
			<?php endif; ?>
            <?php if ( !empty( $extra_data['custom_buttons'] ) ) : ?>
                <?php foreach( $extra_data['custom_buttons'] as $button ) : ?>
                    <?php echo fw()->extensions->get('shortcodes')->get_shortcode('button')->render($button); ?>
                <?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</div>