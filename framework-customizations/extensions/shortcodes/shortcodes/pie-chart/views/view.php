<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var array $atts
 */
$size       = $atts['size'];
$line       = $atts['line'];
$trackcolor = $atts['trackcolor'];
$bgcolor    = $atts['bgcolor'];
$percent    = $atts['percent'];
$speed      = $atts['speed'];
$name       = $atts['name'];

?>

<div class="chart"
     data-size="<?php echo esc_attr( $size ); ?>"
     data-percent="<?php echo esc_attr( $percent ); ?>"
     data-line="<?php echo esc_attr( $line ); ?>"
     data-bgcolor="<?php echo esc_attr( $bgcolor ); ?>"
     data-trackcolor="<?php echo esc_attr( $trackcolor ); ?>"
     data-speed="<?php echo esc_attr( $speed ); ?>"
>
	<div class="chart-meta">
		<span class="percent grey"></span>
        <h5><?php echo esc_html( $name ); ?></h5>
	</div>
</div>

