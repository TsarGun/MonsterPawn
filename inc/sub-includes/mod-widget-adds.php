<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

//additional fields to widgets
if (!function_exists('cashelrie_action_in_widget_form') ) :
	function cashelrie_action_in_widget_form( $t, $return, $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '', 'float' => 'none' ) );

		if ( ( $t->id_base === 'search' || $t->id_base === 'mc4wp_form_widget' ) && ! isset( $instance['custom_text'] ) ) {
			$instance['custom_text'] = null;
		}

		if ( ! isset( $instance['widget_background'] ) ) {
			$instance['widget_background'] = null;
		}

		if ( ! isset( $instance['bootstrap_width'] ) ) {
			$instance['bootstrap_width'] = null;
		}

		if ( ! isset( $instance['text_align'] ) ) {
			$instance['text_align'] = null;
		}

        if ( isset( $instance[ 'bootstrap_custom_width' ] ) ) {
            $custom_width = $instance[ 'bootstrap_custom_width' ];
        } else {
	        $custom_width = '';
        }

		if ( isset( $instance[ 'custom_text' ] ) ) {
			$custom_text = $instance[ 'custom_text' ];
		} else {
			$custom_text = '';
		}
		?>

        <?php if ( $t->id_base === 'search' || $t->id_base === 'mc4wp_form_widget' ) : ?>
            <p class="custom_text_option">
                <label
                        for="<?php echo esc_attr( $t->get_field_id( 'custom_text' ) ); ?>"><?php esc_html_e( 'Custom text that appear under title:', 'cashelrie' ); ?>
                </label><br>
                <textarea id="<?php echo esc_attr( $t->get_field_id( 'custom_text' ) ); ?>"
                      name="<?php echo esc_attr( $t->get_field_name( 'custom_text' ) ); ?>" class="widefat"><?php echo esc_html( $custom_text ); ?></textarea>
            </p>
        <?php endif; ?>


		<p class="widget_background_option">
			<label for="<?php echo esc_attr( $t->get_field_id( 'widget_background' ) ); ?>"><?php esc_html_e( 'Widget Background:', 'cashelrie' ); ?></label>
			<select id="<?php echo esc_attr( $t->get_field_id( 'widget_background' ) ); ?>"
			        name="<?php echo esc_attr( $t->get_field_name( 'widget_background' ) ); ?>" class="widefat">
				<option <?php selected( $instance['widget_background'], '' ); ?>
					value=""><?php esc_html_e( 'None', 'cashelrie' ); ?></option>
				<option
					<?php selected( $instance['widget_background'], 'with_background with_padding' ); ?>value="with_background with_padding"><?php esc_html_e( 'Muted Backgorund', 'cashelrie' ); ?></option>
                <option
					<?php selected( $instance['widget_background'], 'with_border with_padding' ); ?>value="with_border with_padding"><?php esc_html_e( 'Transparent With Border', 'cashelrie' ); ?></option>
                <option
					<?php selected( $instance['widget_background'], 'with_background with_border with_padding' ); ?>value="with_background with_border with_padding"><?php esc_html_e( 'Muted Backgorund With Border', 'cashelrie' ); ?></option>
				<option <?php selected( $instance['widget_background'], 'ds ms with_padding' ); ?>
					value="ds ms with_padding"><?php esc_html_e( 'Dark Background', 'cashelrie' ); ?></option>
                <option <?php selected( $instance['widget_background'], 'gradient_bg with_padding' ); ?>
                        value="gradient_bg with_padding"><?php esc_html_e( 'Gradient Background', 'cashelrie' ); ?></option>
                <option <?php selected( $instance['widget_background'], 'cs main_bg_color with_padding' ); ?>
                        value="cs main_bg_color with_padding"><?php esc_html_e( 'Accent Color 1', 'cashelrie' ); ?></option>
                <option <?php selected( $instance['widget_background'], 'cs main_bg_color2 with_padding' ); ?>
                        value="cs main_bg_color2 with_padding"><?php esc_html_e( 'Accent Color 2', 'cashelrie' ); ?></option>
			</select>
		</p>
		<p class="widget_bootstrap_width">
			<label
				for="<?php echo esc_attr( $t->get_field_id( 'bootstrap_width' ) ); ?>"><?php esc_html_e( 'Widget Column Width:', 'cashelrie' ); ?>
			</label>
			<select id="<?php echo esc_attr( $t->get_field_id( 'bootstrap_width' ) ); ?>"
			        name="<?php echo esc_attr( $t->get_field_name( 'bootstrap_width' ) ); ?>" class="widefat">
				<option <?php selected( $instance['bootstrap_width'], '' ); ?> value=""><?php esc_html_e( 'None', 'cashelrie' ); ?></option>
				<option <?php selected( $instance['bootstrap_width'], 'col-md-3 col-sm-6' ); ?>value="col-md-3 col-sm-6">1/4</option>
				<option <?php selected( $instance['bootstrap_width'], 'col-md-4 col-sm-6' ); ?> value="col-md-4 col-sm-6">1/3</option>
				<option <?php selected( $instance['bootstrap_width'], 'col-sm-6' ); ?> value="col-sm-6">1/2</option>
				<option <?php selected( $instance['bootstrap_width'], 'col-sm-12' ); ?>value="col-sm-12"><?php esc_html_e( 'Full Width', 'cashelrie' ); ?></option>
                <option <?php selected( $instance['bootstrap_width'], 'previous-column' ); ?>value="previous-column"><?php esc_html_e( 'Put in previous widget column', 'cashelrie' ); ?></option>
			</select>
		</p>
        <p class="widget_bootstrap_custom_width">
            <label
                    for="<?php echo esc_attr( $t->get_field_id( 'bootstrap_custom_width' ) ); ?>"><?php esc_html_e( 'Custom Column Width:', 'cashelrie' ); ?>
            </label>
            <input type="text" id="<?php echo esc_attr( $t->get_field_id( 'bootstrap_custom_width' ) ); ?>"
                    name="<?php echo esc_attr( $t->get_field_name( 'bootstrap_custom_width' ) ); ?>" value="<?php echo esc_attr( $custom_width ); ?>" class="widefat">
            </input><br>
            <?php echo esc_html__( 'Use bootstrap grid classes or left it empty.', 'cashelrie' ); ?>
        </p>
        <p class="widget_text_align">
            <label
                    for="<?php echo esc_attr( $t->get_field_id( 'text_align' ) ); ?>"><?php esc_html_e( 'Widget Text Align:', 'cashelrie' ); ?>
            </label>
            <select id="<?php echo esc_attr( $t->get_field_id( 'text_align' ) ); ?>"
                    name="<?php echo esc_attr( $t->get_field_name( 'text_align' ) ); ?>" class="widefat">
                <option <?php selected( $instance['text_align'], '' ); ?> value=""><?php esc_html_e( 'Left', 'cashelrie' ); ?></option>
                <option <?php selected( $instance['text_align'], 'text-center' ); ?>value="text-center"><?php esc_html_e( 'Center', 'cashelrie' ); ?></option>
                <option <?php selected( $instance['text_align'], 'text-right' ); ?> value="text-right"><?php esc_html_e( 'Right', 'cashelrie' ); ?></option>
            </select>
        </p>

		<?php
		$return = null;

		return array( $t, $return, $instance );
	} //cashelrie_action_in_widget_form()
endif;

if( !function_exists('cashelrie_filter_in_widget_form_update') ) :
	function cashelrie_filter_in_widget_form_update( $instance, $new_instance, $old_instance ) {
        if ( isset( $new_instance['custom_text'] ) ) {
	        $instance['custom_text'] = $new_instance['custom_text'];
        }
		$instance['widget_background'] = $new_instance['widget_background'];
		$instance['bootstrap_width']   = $new_instance['bootstrap_width'];
		$instance['bootstrap_custom_width']   = $new_instance['bootstrap_custom_width'];
		$instance['text_align']   = $new_instance['text_align'];

		return $instance;
	} //cashelrie_filter_in_widget_form_update()
endif;

if( !function_exists( 'cashelrie_filter_dynamic_sidebar_params' ) ):
	function cashelrie_filter_dynamic_sidebar_params( $params ) {
	
		//only for frontend
		if ( is_admin() ) {
			return $params;
		}
		global $wp_registered_widgets;
	
		//widget options
		$widget_id  = $params[0]['widget_id'];
		$widget_obj = $wp_registered_widgets[ $widget_id ];
		$widget_opt = get_option( $widget_obj['callback'][0]->option_name );
		$widget_num = $widget_obj['params'][0]['number'];
	
		//arrays with widgets that needs to modify they CSS classes
		$darklinks_widgets = array(
			'widget_recent_comments',
            'widget_recent_entries',
			'widget_categories',
			'widget_archive',
			'widget_recent_posts'
		);
	
		$greylinks_widgets = array(
			'widget_pages',
			'widget_nav_menu',
			'widget_meta'
		);
	
		$background_widgets = array();
	
		if ( in_array( $wp_registered_widgets[ $widget_id ]['classname'], $darklinks_widgets ) ) {
			$params[0]['before_widget'] = str_replace( 'class="widget ', 'class="darklinks widget ', $params[0]['before_widget'] );
		}

		if ( in_array( $wp_registered_widgets[ $widget_id ]['classname'], $greylinks_widgets ) ) {
			$params[0]['before_widget'] = str_replace( 'class="widget ', 'class="greylinks widget ', $params[0]['before_widget'] );
		}

		if ( in_array( $wp_registered_widgets[ $widget_id ]['classname'], $background_widgets ) ) {
			$params[0]['before_widget'] = str_replace( 'class="widget ', 'class="with_background widget ', $params[0]['before_widget'] );
		}
	
		if ( is_active_widget( false, false, 'monster' ) ) {
	
			foreach ( $wp_registered_widgets as $key => $widget_instance ) {
	
				//working inside monster but not outside
				if ( is_active_widget( false, false, 'monster' ) ) {
					if ( in_array( $widget_instance['callback'][0]->widget_options['classname'], $darklinks_widgets ) ) {
						$widget_instance['callback'][0]->widget_options['classname'] .= ' darklinks';
						continue;
					}
	
					if ( in_array( $widget_instance['callback'][0]->widget_options['classname'], $greylinks_widgets ) ) {
						$widget_instance['callback'][0]->widget_options['classname'] .= ' greylinks';
						continue;
					}
	
					if ( in_array( $wp_registered_widgets[ $key ]['classname'], $background_widgets ) ) {
						$widget_instance['callback'][0]->widget_options['classname'] .= ' with_background';
						continue;
					}
				}
	
			} //foreach
		} //if monster widget
	
		$custom_text = ( isset( $widget_opt[ $widget_num ]['custom_text'] ) && !empty( $widget_opt[ $widget_num ]['custom_text'] ) ) ? '<p><em>' . wp_kses_post( $widget_opt[ $widget_num ]['custom_text'] ) . '</em></p>' : '';
        $widget_background = ( !empty( $widget_opt[ $widget_num ]['widget_background'] ) ) ? $widget_opt[ $widget_num ]['widget_background'] : 'widget_no_background';
		$bootstrap_width   = ( !empty( $widget_opt[ $widget_num ]['bootstrap_width'] ) ) ? $widget_opt[ $widget_num ]['bootstrap_width'] : '';
		$bootstrap_custom_width   = ( !empty( $widget_opt[ $widget_num ]['bootstrap_custom_width'] ) ) ? $widget_opt[ $widget_num ]['bootstrap_custom_width'] : '';
		$text_align  = ( !empty( $widget_opt[ $widget_num ]['text_align'] ) ) ? $widget_opt[ $widget_num ]['text_align'] : '';
	
		//creating columns only in footer widget area
		if ( $bootstrap_width == 'none' || ( $params[0]['id'] !== 'sidebar-footer' && $params[0]['id'] !== 'sidebar-footer-secondary' ) ) {
			$bootstrap_width = '';
		}
		//if no width set in footer sidebar - set width to 'col-sm-12'
		if ( ( $bootstrap_width == 'none' || ! $bootstrap_width ) && $params[0]['id'] == 'sidebar-footer' ) {
			$bootstrap_width = 'col-sm-12';
		}
		//if custom width set
		if ( !empty( $bootstrap_custom_width ) ) {
			$bootstrap_width = $bootstrap_custom_width;
		}
	
		$params[0]['before_widget'] = '<div class="widget-theme-wrapper ' . esc_attr( $widget_background ) . ' ' . esc_attr( $text_align ) . '">' . $params[0]['before_widget'];
		$params[0]['after_widget']  = $params[0]['after_widget'] . $custom_text . '</div>';
//		$params[0]['after_title'] = $params[0]['after_title'] . $custom_text;
	
		if ( $bootstrap_width ) {
			$params[0]['before_widget'] = '<div class="' . esc_attr( $bootstrap_width ) . '">' . $params[0]['before_widget'];
			$params[0]['after_widget']  = $params[0]['after_widget'] . '</div>';
		}
	
		return $params;
	} //cashelrie_filter_dynamic_sidebar_params()
endif;

//Add input fields(priority 5, 3 parameters)
add_action( 'in_widget_form', 'cashelrie_action_in_widget_form', 5, 3 );
//Callback function for options update (priority 5, 3 parameters)
add_filter( 'widget_update_callback', 'cashelrie_filter_in_widget_form_update', 5, 3 );
//add class names (default priority, one parameter)
add_filter( 'dynamic_sidebar_params', 'cashelrie_filter_dynamic_sidebar_params', 1 );

//eof widgets additional fields