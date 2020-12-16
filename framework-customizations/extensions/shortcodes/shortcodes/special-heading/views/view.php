<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var $atts
 */

if ( ! $atts['headings'] ) {
	return;
}
$counter = 0;

//check for single p element
if ( sizeof( $atts['headings'] ) === 1 && $atts['headings'][0]['heading_tag'] === 'p' ) {
	$heading = $atts['headings'][0];
    ?>
    <p class="section-big <?php echo esc_attr( $atts['heading_align'] ); ?> <?php echo esc_attr( $heading['heading_text_color'] ); ?>">
	    <?php echo wp_kses_post( $heading['heading_text'] ) ?>
    </p>
<?php
} else {

	foreach ( $atts['headings'] as $heading ) : ?>
		<?php if ( $heading['heading_tag'] === 'hr' ) : ?>
            <hr class="theme-divider <?php echo esc_attr( $heading['heading_text_color'] ); ?>">
		<?php elseif ( $heading['heading_tag'] === 'h2-small' ) : ?>

            <h2 class="<?php echo esc_attr( $atts['heading_align'] ); ?> <?php echo esc_attr( 'section_header small ' ); ?> <?php echo esc_attr( $heading['heading_text_color'] ); ?>">

		<?php else: ?>

            <<?php echo esc_html( $heading['heading_tag'] ); ?> class="<?php echo esc_attr( $atts['heading_align'] ); ?> <?php echo esc_attr( $heading['heading_tag'] !== 'p' ? 'section_header' : '' ); ?> <?php echo esc_attr( $heading['heading_tag'] === 'p' && $counter === 0 ? 'above_heading' : '' );
			echo esc_attr( $heading['heading_tag'] === 'p' && $counter !== 0 ? 'section-excerpt' : '' ); ?> <?php echo esc_attr( $heading['heading_text_color'] ); ?>">

		<?php endif; ?>

		<?php if ( $heading['heading_tag'] !== 'hr' ) : ?>

            <span class="<?php echo esc_attr( $heading['heading_text_weight'] ); ?> <?php echo esc_attr( $heading['heading_text_transform'] ); ?>">
		        <?php echo wp_kses_post( $heading['heading_text'] ) ?>
	        </span>

		<?php endif; ?>

		<?php //heading number
        if ( $heading['heading_tag'] === 'h2' && $atts['heading_number'] ) : ?>
            <span class="number">
		        <?php echo wp_kses_post( $atts['heading_number'] ) ?>
	        </span>
		<?php endif; //eof heading number
		?>

		<?php if ( $heading['heading_tag'] !== 'hr' ) : ?>
			<?php if ( $heading['heading_tag'] === 'h2-small' ) : ?>
                </h2>
			<?php else: ?>
                </<?php echo esc_html( $heading['heading_tag'] ); ?>>
			<?php endif; ?>
		<?php endif; ?>

		<?php
		$counter ++;
	endforeach;

}
?>