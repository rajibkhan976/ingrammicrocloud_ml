<?php
	
	if ( ! function_exists( 'wr_register_custom_menu_page' ) ) {
		function wr_register_custom_menu_page() {
			global	$wob_variable;
					$wob_variable->options_page = add_menu_page('Warning Old Browser Options', 'Warning Browser', 'activate_plugins', 'check_older_browser', 'wr_menu_page', WARNING_OLD_BROWSER_URL . 'images/icon.png', 112); 
					add_action( "admin_head-{$wob_variable->options_page}", 			'add_wr_metaboxes_scripts' );
					add_action( "admin_print_styles-{$wob_variable->options_page}",  'add_wr_scripts');
					add_action( "load-{$wob_variable->options_page}", 				'add_wr_add_meta_boxes' );
		}
		add_action('admin_menu', 'wr_register_custom_menu_page');	
	}		
	
	if ( ! function_exists( 'add_wr_add_meta_boxes' ) ) {		

		function add_wr_add_meta_boxes() {
			global	$wob_variable;
			do_action('add_meta_boxes', $wob_variable->options_page);
		}
	}	
	
	if ( ! function_exists( 'add_wr_metaboxes_scripts' ) ) {		
	
		function add_wr_metaboxes_scripts() {
			global $wob_variable; 
		?>
			<script type="text/javascript">
				//<![CDATA[
				jQuery(document).ready( function() {
					jQuery('.if-js-closed').removeClass('if-js-closed').addClass('closed');
					postboxes.add_postbox_toggles( '<?php echo esc_js($wob_variable->options_page); ?>' );
				});
				//]]>
			</script>
	<?php }	
	}
	
	if ( ! function_exists( 'add_wr_scripts' ) ) {		
		
		function add_wr_scripts() {
			if( function_exists( 'wp_enqueue_media' ) ){
				wp_enqueue_media();
			} else {
				wp_enqueue_script('media-upload');
				wp_enqueue_script('thickbox');
				wp_enqueue_style ('thickbox');
			}
				
			wp_enqueue_script( 'common' );
			wp_enqueue_script( 'wp-lists' );
			wp_enqueue_script( 'postbox' );
				
			wp_enqueue_style('ch-style', 	WARNING_OLD_BROWSER_JQS   . 'ch/ch.css');
			wp_enqueue_style('sl-style', 	WARNING_OLD_BROWSER_JQS   . 'sl/jquery.formstyler.css');
			wp_enqueue_style ('wp-color-picker' );
			wp_enqueue_style('admin-style', WARNING_OLD_BROWSER_ADMIN_STYLE . 'admin.css');
			
			
			wp_enqueue_script('chJq',			WARNING_OLD_BROWSER_JQS . "ch/ch.js", array('jquery'));
			wp_enqueue_script('slJq',			WARNING_OLD_BROWSER_JQS . "sl/jquery.formstyler.min.js", array('jquery'));
			wp_enqueue_script('admin-init-jq', 	WARNING_OLD_BROWSER_JQS . "init.js", array( 'wp-color-picker' ), false, true );
		}
	}
	
	/*Meatboxes*/
	if ( ! function_exists( 'wr_create_meta_boxes' ) ) {		
	
		function wr_create_meta_boxes() {
			global $wob_variable;
			add_meta_box( 'wr-general',  __( 'General Settings', 'warning-old-browser' ),  'wr_add_data_fields', $wob_variable->options_page, 'normal', 'default');
			add_meta_box( 'wr-styleing', __( 'Styling Settings', 'warning-old-browser' ),  'wr_add_styling_fields', $wob_variable->options_page, 'normal', 'default');
		}
		add_action('add_meta_boxes', 'wr_create_meta_boxes', 10);
	}	
	
	if ( ! function_exists( 'wr_add_data_fields' ) ) {		
		
		function wr_add_data_fields ($object, $box) {
			$options = get_option('wob_options');
		?>	
			<table class="form-table">
				<tbody>
					<tr valign="top">
						<th scope="row"><span class="ie" title="<?php _e('Internet Explorer', 'warning-old-browser'); ?>"><?php _e('Internet Explorer', 'warning-old-browser'); ?></span></th>
						<td>
							<filedset>
								<p><?php wr_get_options_fields('ie_ver', $options, ie_list(), 'select-ver_ie'); ?></p>
								<p><input type="text" class="text-url ie_url" name="wob_options[ie_url]" id="ie_url" value="<?php echo esc_url($options['ie_url']); ?>" placeholder="<?php _e('Enter your link','warning-old-browser'); ?>"/></p>
								<p class="description"><?php _e('Enter your custom download link','warning-old-browser'); ?></p>
							</filedset>
						</td>
					</tr>			
					
					<tr valign="top">
						<th scope="row"><span class="ff" title="<?php _e('Mozilla FireFox', 'warning-old-browser'); ?>"><?php _e('Mozilla FireFox', 'warning-old-browser'); ?> </span></th>
						<td>
							<filedset>
								<p><?php wr_get_options_fields('ff_ver', $options, ff_list(), 'select-ver_ff'); ?></p>
								<p><input type="text" class="text-url ff_url" name="wob_options[ff_url]" id="ff_url" value="<?php echo esc_url($options['ff_url']); ?>" placeholder="<?php _e('Enter your link','warning-old-browser'); ?>"/></p>
								<p class="description"><?php _e('Enter your custom download link','warning-old-browser'); ?></p>
							</fieldset>
						</td>
					</tr>			
					
					<tr valign="top">
						<th scope="row"><span class="ch" title="<?php _e('Google Chrome', 'warning-old-browser'); ?>"><?php _e('Google Chrome', 'warning-old-browser'); ?></span></th>
						<td>
							<filedset>
								<p><?php wr_get_options_fields('ch_ver', $options, ch_list(), 'select-ver_ch'); ?></p>
								<p><input type="text" class="text-url ch_url" name="wob_options[ch_url]" id="ch_url" value="<?php echo esc_url($options['ch_url']); ?>" placeholder="<?php _e('Enter your link','warning-old-browser'); ?>"/></p>
								<p class="description"><?php _e('Enter your custom download link','warning-old-browser'); ?></p>
							</filedset>
						</td>
					</tr>			
					
					<tr valign="top">
						<th scope="row"><span class="sfr" title="<?php _e('Safari', 'warning-old-browser'); ?>"><?php _e('Safari', 'warning-old-browser'); ?></span></th>
						<td>
							<filedset>
								<p><?php wr_get_options_fields('sfr_ver', $options, sfr_list(), 'select-ver_sfr'); ?></p>
								<p><input type="text" class="text-url sfr_url" name="wob_options[sfr_url]" id="sfr_url" value="<?php echo esc_url($options['sfr_url']); ?>" placeholder="<?php _e('Enter your link','warning-old-browser'); ?>"/></p>
								<p class="description"><?php _e('Enter your download link','warning-old-browser'); ?></p>
							</filedset>
						</td>
					</tr>			
					
					<tr valign="top">
						<th scope="row"><span class="opr" title="<?php _e('Opera', 'warning-old-browser'); ?>"><?php _e('Opera', 'warning-old-browser'); ?></span></th>
						<td>
							<filedset>
								<p><?php wr_get_options_fields('opr_ver', $options, opr_list(), 'select-ver_opr'); ?></p>
								<p><input type="text" class="text-url opr_url" name="wob_options[opr_url]" id="opr_url" value="<?php echo esc_url($options['opr_url']); ?>" placeholder="<?php _e('Enter your link','warning-old-browser'); ?>"/></p>
								<p class="description"><?php _e('Enter your download link','warning-old-browser'); ?></p>
							</filedset>
						</td>
					</tr>			
					
					<tr valign="top">
						<th scope="row"><?php _e('Message', 'warning-old-browser'); ?></span></th>
						<td>
							<filedset>
								<textarea class="message-text" type="text" name="wob_options[message_]" id="message-text" cols="50" rows="5" /><?php echo stripslashes($options['message_']); ?></textarea>
							</filedset>
						</td>
					</tr>			
					
					<tr valign="top">
						<th scope="row"><?php _e('Show panel notice once', 'warning-old-browser'); ?></span></th>
						<td>
							<filedset>
								<label for="is_every_time_vis_panel">
									<input type="checkbox" id="is_every_time_vis_panel" name="wob_options[is_every_time_vis_panel]" <?php checked( $options['is_every_time_vis_panel'], 'on'); ?> />
									<?php _e('Yes', 'warning-old-browser'); ?>	
								</label>
							</filedset>
						</td>
					</tr>			
				</tbody>
			</table>	
		<?php	
		}
	}
	
	if ( ! function_exists( 'wr_add_styling_fields' ) ) {		
		
		function wr_add_styling_fields($object, $box) {
			$options = get_option('wob_options');
		?>	
	
			<table class="form-table">
				<tbody>
					
					<tr valign="top">
						<th scope="row"><?php _e('Panel style', 'warning-old-browser'); ?></th>
						<td><filedset><?php wr_get_options_fields('panel_style', $options, panel_list(), 'select-panel-style'); ?></filedset></td>
					</tr>							
					
					<tr valign="top">
						<th scope="row"><?php _e('Background Color', 'warning-old-browser'); ?></th>
						<td><filedset><input type="text" id="bg_color" name="wob_options[bg_color]" data-default-color="#ffffff" value="<?php echo esc_attr($options['bg_color']); ?>"/></filedset></td>
					</tr>			
					
					<tr valign="top">
						<th scope="row"><?php _e('Font Color', 'warning-old-browser'); ?></th>
						<td><filedset><input type="text" id="font_color" name="wob_options[font_color]" data-default-color="#e34848" value="<?php echo esc_attr($options['font_color']); ?>"/></filedset></td>
					</tr>			
					
					<tr valign="top">
						<th scope="row"><?php _e('Font Size', 'warning-old-browser'); ?></th>
						<td><filedset><input type="text" id="font_size" name="wob_options[font_size]" value=<?php echo esc_attr($options['font_size']); ?> /></filedset></td>
					</tr>

					<tr valign="top">
						<th scope="row"><?php _e('jQuery Effect', 'warning-old-browser'); ?></th>
						<td><filedset><?php wr_get_options_fields('easing_effect', $options, easing_list(), 'select-easing-effect'); ?></filedset></td>
					</tr>							
				</tbody>	
			</table>		
		<?php
		
		}
	}
	
	if ( ! function_exists( 'wr_menu_page' ) ) {			
		function wr_menu_page() { 
			global $wob_variable;
			$options = get_option('wob_options');
		?>
			<div id="wr-options" class="wrap">	
				<h2></h2>						
				<form method="post" action="/" enctype="multipart/form-data" class="wr-options-form" id="wr-options-form" name="wr-options-form">
					<input type="hidden" name="action" value="wr_options_save_data_action" />
					<input type="hidden" name="security" value="<?php echo wp_create_nonce('br_war_theme_data'); ?>" />
					<?php wp_nonce_field('meta-box-order',  'meta-box-order-nonce', false ); ?>
					<?php wp_nonce_field('closedpostboxes', 'closedpostboxesnonce', false ); ?>
					<?php screen_icon(); ?>
					<h2><?php _e('Warning - Old Browser ', 'warning-old-browser'); ?></h2>						
					<input name="wob_options[state]" type="checkbox" id="ch_location" <?php checked($options['state'], 'on'); ?> />
					<div class="clear"></div>
					
					<div id="poststuff">
						 <div class="metabox-holder">
							 <div id="all-fileds" class="postbox-container column-1 normal">
								<?php do_meta_boxes($wob_variable->options_page,'normal',null); ?>
							 </div>
						 </div>		
					</div>	 
					<?php submit_button(); ?>
					<div class="save-options"></div>	
				</form>
			</div>
		
		<?php
		}
	}	
	
	if ( ! function_exists( 'wr_get_options_fields' ) ) {		
		function wr_get_options_fields($field_name, $options, $array_of_values, $class_name = "selected") {
			$out = '';
			$out .= '<select class="'. $class_name .'" name="wob_options['.$field_name.']" id="options-'.$field_name.'">' . chr(13);
			$selected = $options[$field_name];
			$p = $r = '';

			foreach ( $array_of_values as $option ) {
				$label = $option['label'];
				if ( $selected == $option['value'] ) // Make default first in list
					$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
				else
					$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";
			}
			$out .= $p . $r;
		
			$out .= '</select>' . chr(13);
			echo $out;
		}
	}	


	if ( ! function_exists( 'wr_save_plugin_data' ) ) {		
		function wr_save_plugin_data() {
			check_ajax_referer('br_war_theme_data', 'security');
			
			$data = $_POST['wob_options'];
			
			if (!isset($data['state'])) {
				$data['state'] = 'off';
			}
			
			if (!isset($data['is_every_time_vis_panel'])) {
				$data['is_every_time_vis_panel'] = 'off';
			}
			
			if(update_option('wob_options', $data)) {
			   die('1');
			} else {
			   die('0');
			}
		}
	}
	add_action('wp_ajax_wr_options_save_data_action', 'wr_save_plugin_data');
	
	if ( ! function_exists( 'wr_plugin_init_func' ) ) {		
		function wr_plugin_init_func() {
			$options 		= get_option('wob_options');
			$is_every_time_vis_panel = $options['is_every_time_vis_panel'];
			
			if ($is_every_time_vis_panel == 'on') {
				if (!isset($_COOKIE['is_vis_panel'])) {
					setcookie("is_vis_panel", 1, time() + (365 * 24 * 3600 * 1000));
					add_action('wp_enqueue_scripts', 'wr_print_warning_message');
				}
			}  else {
					add_action('wp_enqueue_scripts', 'wr_print_warning_message');
			}
		}
	}	
	add_action( 'init', 'wr_plugin_init_func');
	
	if ( ! function_exists( 'wr_print_warning_message' ) ) {		
		function wr_print_warning_message() {
			$out = $script= '';
			$pnlStyle = 0;
			$options  = array();
			$flags 			= false;
			$ver_browser 	= wr_get_current_browser();
			$options 		= get_option('wob_options');
			
			$name_br = strtolower($ver_browser['name']);
			$ver_br  = substr($ver_browser['version'],0,strpos($ver_browser['version'],'.'));
			
			$pnlStyle = $options['panel_style'];
			
			if ( !wp_is_mobile() ) {
				if ($pnlStyle == 0) {
					$script .= '<script type="text/javascript">';
						$script .= 'window.veffect_easing = "'.$options['easing_effect'] .'";'.chr(13);   
					$script .= '</script> ';   

					$out  = '<div class="container_warning" style="background-color:'.$options['bg_color'].'">';
						$out .= '<div class="wrap_message">';
							$out .= '<div class="text_container_br" style="color:'.esc_attr($options['font_color']).'; font-size:'.esc_attr($options['font_size']).'px;">';
								if (!empty($options['message_'])) $out .= stripslashes($options['message_']);
							$out .= '</div>';
					
							$out .= '<div class="icon-br">';
								if (!empty($options['ie_url']))  $out .= '<a href="'.esc_url($options['ie_url']).'" 	target="_blank" class="ie" title="Internet Explorer"></a>';
								if (!empty($options['ff_url']))  $out .= '<a href="'.esc_url($options['ff_url']).'" 	target="_blank" class="ff" title="Mozilla FireFox"></a>';
								if (!empty($options['ch_url']))  $out .= '<a href="'.esc_url($options['ch_url']).'" 	target="_blank" class="ch" title="Google Chrome"></a>';
								if (!empty($options['sfr_url'])) $out .= '<a href="'.esc_url($options['sfr_url']).'"	target="_blank" class="sfr" title="Safari"></a>';
								if (!empty($options['opr_url'])) $out .= '<a href="'.esc_url($options['opr_url']).'"	target="_blank" class="opr" title="Opera"></a>';
							$out .= '</div>';				
							$out .= '<span class="close-br"></span>';
						$out .= '</div>';
					$out .= '</div>';
				} else {
					wp_enqueue_style ('frontend-br-fnbox',  WARNING_OLD_BROWSER_JQS . "fnBox/jquery.fancybox.css");		
					wp_enqueue_script('frontend-br-fnbox',  WARNING_OLD_BROWSER_JQS . "fnBox/jquery.fancybox.pack.js", array('jquery'), true);		
					
					$out  = '<a id="mdoal-wr-open" href="#modal-wr"></a>';
					$out .= '<div id="modal-wr" class="modal-wr">';
						$out  .= '<div class="modal-wr-wrap">';
							$out .= '<div class="modal-message" style="color:'.esc_attr($options['font_color']).'; font-size:'.esc_attr($options['font_size']).'px;">';
								if (!empty($options['message_'])) $out .= stripslashes($options['message_']);
							$out .= '</div>';
							
							$out .= '<div class="icon-br">';
								if (!empty($options['ie_url']))  $out .= '<a href="'.esc_url($options['ie_url']).'" 	target="_blank" class="ie" title="Internet Explorer"></a>';
								if (!empty($options['ff_url']))  $out .= '<a href="'.esc_url($options['ff_url']).'" 	target="_blank" class="ff" title="Mozilla FireFox"></a>';
								if (!empty($options['ch_url']))  $out .= '<a href="'.esc_url($options['ch_url']).'" 	target="_blank" class="ch" title="Google Chrome"></a>';
								if (!empty($options['sfr_url'])) $out .= '<a href="'.esc_url($options['sfr_url']).'"	target="_blank" class="sfr" title="Safari"></a>';
								if (!empty($options['opr_url'])) $out .= '<a href="'.esc_url($options['opr_url']).'"	target="_blank" class="opr" title="Opera"></a>';
							$out .= '</div>';				
						$out .= '</div>';				
					$out .= '</div>';
						
				}
				
					
				if ($options['state'] == 'on')  {
					if (!is_user_logged_in()) {
						
					if ($name_br == 'msie') {
						if ($ver_br <= $options['ie_ver']) {
							$flags = true;
						}
					} elseif ($name_br == 'firefox') {
						if ($ver_br <= $options['ff_ver']) {
							$flags = true;
						}
					} elseif ($name_br == 'chrome') {
						if ($ver_br <= $options['ch_ver']) {
							$flags = true;
						}
					} elseif ($name_br == 'safari') {
						if ($ver_br <= $options['sfr_ver']) {
							$flags = true;
						}
					} elseif ($name_br == 'opera') {
						if ($ver_br <= $options['opr_ver']) {
							$flags = true;
						}
					}
				
					if ($flags) {
						echo $script;
						wp_enqueue_script('frontend-br-js', WARNING_OLD_BROWSER_JQS . "frontend-br.js", array('jquery'), true);		
						echo $out;
					}
					}
			
				}
			}	
		}
	}
	
	if ( ! function_exists( 'wr_add_my_stylesheet' ) ) {		
		function wr_add_my_stylesheet() {
			$myStyleUrl 	= WP_PLUGIN_URL . '/warning-old-browser/css/frontend.css';
			$myStyleFile 	= WP_PLUGIN_DIR . '/warning-old-browser/css/frontend.css';
    
			if ( file_exists($myStyleFile) ) {
				wp_register_style('frontend-b-style', $myStyleUrl);
				wp_enqueue_style( 'frontend-b-style');
			}
		}
		if ( !wp_is_mobile() ) {
			add_action('get_header', 'wr_add_my_stylesheet');	
		}	
	}