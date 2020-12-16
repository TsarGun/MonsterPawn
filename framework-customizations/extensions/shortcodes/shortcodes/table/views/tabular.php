<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var array $atts
 */
?>
<div class="table-responsive">
	<table class="<?php echo esc_attr( $atts['table_type'] ); ?>">
		<?php foreach ( $atts['table']['rows'] as $row_key => $row ) : ?>
			<?php if ( $row['name'] == 'heading-row' ) : ?>
				<thead>
				<tr class="<?php echo esc_attr( $row['name'] ); ?>">
					<?php foreach ( $atts['table']['cols'] as $col_key => $col ) : ?>
						<th class="<?php echo esc_attr( $col['name'] ); ?>">
							<?php echo wp_kses_post( $atts['table']['content'][ $row_key ][ $col_key ]['textarea'] ); ?>
						</th>
					<?php endforeach; ?>
				</tr>
				</thead>
			<?php elseif ( $row['name'] == 'default-row' ) : ?>
				<tr class="<?php echo esc_attr( $row['name'] ); ?>">
					<?php foreach ( $atts['table']['cols'] as $col_key => $col ) : ?>
						<td class="<?php echo esc_attr( $col['name'] ); ?>">
							<?php echo wp_kses_post( $atts['table']['content'][ $row_key ][ $col_key ]['textarea'] ); ?>
						</td>
					<?php endforeach; ?>
				</tr>
			<?php endif; ?>
		<?php endforeach; ?>
	</table>
</div>