<?php

/*
 * Product Filter Widget
 */
class prdctfltr extends WP_Widget {

	function prdctfltr() {
		$widget_ops = array(
			'classname' => 'prdctfltr-widget',
			'description' => __( 'Product Filter widget version.', 'prdctfltr' )
		);
		$this->WP_Widget( 'prdctfltr', '+ Product Filter', $widget_ops );
	}

	function widget( $args, $instance ) {
		extract( $args, EXTR_SKIP );

		global $prdctfltr_global;

		$prdctfltr_global['widget_search'] = true;
		$prdctfltr_global['widget_style'] = $instance['preset'];
		$prdctfltr_global['preset'] = $instance['template'];
		$prdctfltr_global['disable_overrides'] = ( isset( $instance['disable_overrides'] ) ? $instance['disable_overrides'] : 'false' );

		if ( isset( $instance['widget_action'] ) && $instance['widget_action'] !== '' ) {
			$prdctfltr_global['action'] = $instance['widget_action'];
		}

		echo $before_widget;

		include( WC_Prdctfltr::$dir . '/woocommerce/loop/product-filter.php' );

		echo $after_widget;

	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['preset'] = $new_instance['preset'];
		$instance['template'] = $new_instance['template'];
		$instance['disable_overrides'] = ( isset( $new_instance['disable_overrides'] ) ? $new_instance['disable_overrides'] : 'no' );
		$instance['widget_action'] = esc_url( $new_instance['widget_action'] );

		return $instance;
	}

	function form( $instance ) {
		$vars = array( 'preset' => 'pf_default', 'template' => '', 'disable_overrides' => 'no', 'widget_action' => '' );
		$instance = wp_parse_args( (array) $instance, $vars );

		$preset = strip_tags($instance['preset']);
		$template = strip_tags($instance['template']);
		$disable_overrides = strip_tags($instance['disable_overrides']);
		$widget_action = strip_tags($instance['widget_action']);

?>
		<div>
			<p class="prdctfltr-box">
				<label for="<?php echo $this->get_field_id('preset'); ?>" class="prdctfltr-label"><?php _e('Style', 'prdctfltr'); ?> :</label>
				<select name="<?php echo $this->get_field_name('preset'); ?>" id="<?php echo $this->get_field_id('preset'); ?>" class="widefat">
					<option value="pf_default_inline"<?php echo ( $preset == 'pf_default_inline' ? ' selected="selected"' : '' ); ?>><?php _e('Flat Inline', 'prdctfltr'); ?></option>
					<option value="pf_default"<?php echo ( $preset == 'pf_default' ? ' selected="selected"' : '' ); ?>><?php _e('Flat Block', 'prdctfltr'); ?></option>
					<option value="pf_default_select"<?php echo ( $preset == 'pf_default_select' ? ' selected="selected"' : '' ); ?>><?php _e('Flat Select', 'prdctfltr'); ?></option>
				</select>
			</p>
			<p class="prdctfltr-box"> 
				<label for="<?php echo $this->get_field_id('template'); ?>" class="prdctfltr-label"><?php _e('Preset', 'prdctfltr'); ?> :</label>
				<select name="<?php echo $this->get_field_name('template'); ?>" id="<?php echo $this->get_field_id('template'); ?>" class="widefat">
					<option value="default"<?php echo ( $template == 'default' ? ' selected="selected"' : '' ); ?>><?php _e('Default', 'prdctfltr'); ?></option>
				<?php
					$curr_templates = get_option( 'prdctfltr_templates', array() );
					foreach ( $curr_templates as $k => $v ) {
				?>
					<option value="<?php echo $k; ?>"<?php echo ( $template == $k ? ' selected="selected"' : '' ); ?>><?php echo $k; ?></option>
				<?php
					}
				?>
				</select>
			</p>
			<p class="prdctfltr-box">
				<label for="<?php echo $this->get_field_id('disable_overrides'); ?>" class="prdctfltr-label"><?php _e('Disable Overrides', 'prdctfltr'); ?> :</label>
				<input type="checkbox" name="<?php echo $this->get_field_name('disable_overrides'); ?>" id="<?php echo $this->get_field_id('disable_overrides'); ?>" value="yes" <?php echo ( $disable_overrides == 'yes' ? ' checked' : '' ); ?> />
			</p>
			<p class="prdctfltr-box">
				<label for="<?php echo $this->get_field_id('widget_action'); ?>" class="prdctfltr-label"><?php _e('Widget Action URL', 'prdctfltr'); ?> :</label>
				<input type="text" name="<?php echo $this->get_field_name('widget_action'); ?>" id="<?php echo $this->get_field_id('widget_action'); ?>" value="<?php echo $widget_action; ?>" class="widefat" /><br/>
				<small><?php _e( 'Custom action is used if the widget is not used in shop, product archives or pages with Product Filter shortcodes. This way you can redirect filtering to your shop page or a custom page. Enter URL to redirect. For example your shop page URL', 'prdctfltr' ); ?> <?php echo get_permalink( WC_Prdctfltr::prdctfltr_wpml_get_id ( woocommerce_get_page_id( 'shop' ) ) ); ?></small>
			</p>

		</div>

<?php
	}
}
add_action( 'widgets_init', create_function('', 'return register_widget("prdctfltr");' ) );


/**
 * Widget AJAX Respond
 */
function prdctfltr_widget_respond() {

	if ( isset($_POST['pf_filters']) ) {
		foreach( $_POST['pf_filters'] as $k => $v ) {
			$_GET[$k] = $v;
		}
	}

	global $prdctfltr_global;

	$shortcode_params = explode('|', $_POST['pf_shortcode']);

	$columns = ( $shortcode_params[1] !== 'false' ? $shortcode_params[1] : 4 );
	$rows = ( $shortcode_params[2] !== 'false' ? $shortcode_params[2] : 4 );

	$prdctfltr_global['posts_per_page'] = $columns*$rows;

	if ( isset($_POST['pf_widget_title']) ) {
		$curr_title = explode('%%%', $_POST['pf_widget_title']);
	}

	if ( empty( $_GET ) ) {
		parse_str(html_entity_decode($_POST['pf_query']), $pf_args);
		$prdctfltr_global['sc_query'] = $pf_args;
	}

	ob_start();

	the_widget('prdctfltr', 'preset=' . $_POST['pf_preset'] . '&template=' . $_POST['pf_template'], array('before_title'=>stripslashes($curr_title[0]),'after_title'=>stripslashes($curr_title[1])) );

	$out = ob_get_clean();

	die($out);
	exit;
}
add_action('wp_ajax_nopriv_prdctfltr_widget_respond', 'prdctfltr_widget_respond' );
add_action('wp_ajax_prdctfltr_widget_respond', 'prdctfltr_widget_respond' );

?>