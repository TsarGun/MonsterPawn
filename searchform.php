<?php
/**
 * Template for displaying search forms
 *
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="form-group-wrap">
	<div class="form-group">
        <input type="search" class="search-field form-control"
			       placeholder="<?php echo esc_attr_x( 'Search keyword', 'placeholder', 'cashelrie' ); ?>"
			       value="<?php echo get_search_query(); ?>" name="s"
			       title="<?php echo esc_attr_x( 'Search for:', 'label', 'cashelrie' ); ?>"/>
	</div>
	<button type="submit" class="search-submit theme_button color1">
		<?php echo esc_html_x( 'ok', 'submit button', 'cashelrie' ); ?>
	</button>
    </div>
</form>