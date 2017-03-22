<?php class WPUEF_HtmlHelper
{
	public function __construct()
	{
		
	}
	//BuddyPress 
	public function buddypress_profile_extra_field_values_table($user_id)
	{
		global $wpuef_option_model, $wpuef_shortcodes;
		$extra_fields = $wpuef_option_model->get_option('json_fields_string');
		foreach($extra_fields->fields as $extra_field): ?>
			<tr>
				<td class="label"><?php echo $extra_field->label; ?></td>
				<td class="data"><?php echo $wpuef_shortcodes->wpuef_show_field_value(array("user_id"=>$user_id, "field_id" =>$extra_field->cid)) ?></td>
			</tr>
		 <?php
	 endforeach;
	}
	//WP, BuddyPress & WooCommerce Register form
	public function render_register_form_extra_fields()
	{
		global $wpuef_option_model;
		//$fields_json_string = $wpuef_option_model->get_option('json_fields_string');
		$extra_fields = $wpuef_option_model->get_option('json_fields_string');
		if($extra_fields)
		{
			wp_enqueue_style('wpuef-datepicker-classic', WPUEF_PLUGIN_PATH.'/css/datepicker/classic.css');   
			wp_enqueue_style('wpuef-datepicker-date-classic', WPUEF_PLUGIN_PATH.'/css/datepicker/classic.date.css');   
			wp_enqueue_style('wpuef-datepicker-time-classic', WPUEF_PLUGIN_PATH.'/css/datepicker/classic.time.css');  
			wp_enqueue_style('wpuef-common-styles', WPUEF_PLUGIN_PATH.'/css/wpuef-common-html-styles.css'); 
			
			wp_enqueue_script('wpuef-ui-picker', WPUEF_PLUGIN_PATH.'/js/picker.js', array( 'jquery' ));
			wp_enqueue_script('wpuef-ui-datepicker', WPUEF_PLUGIN_PATH.'/js/picker.date.js', array( 'jquery' ));
			wp_enqueue_script('wpuef-ui-timepicker', WPUEF_PLUGIN_PATH.'/js/picker.time.js', array( 'jquery' ));
			wp_enqueue_script('wpuef-file-manager', WPUEF_PLUGIN_PATH.'/js/wpuef-file-manager.js', array( 'jquery' ));
			wp_enqueue_script('wpuef-registration-fields-check', WPUEF_PLUGIN_PATH.'/js/wpuef-registration-fields-check.js', array( 'jquery' ));
		
			//Defaul registration page
			if(strpos($_SERVER['REQUEST_URI'],"wp-login.php?action=register") !== false): ?>
			<style>
			.wpuef_label
			{
				display:block;
				clear:both;
				margin-top: 10px;
			}
			</style>
			
			<?php endif; ?>
			<div id="wpuef-file-container" style="display:none"></div> <!--file upload -->
			<?php foreach($extra_fields->fields as $extra_field):
				
				$read_only = !current_user_can( 'manage_options' ) && isset($extra_field->editable_only_by_admin) && $extra_field->editable_only_by_admin ? true : false;
				$placeholder = !isset($extra_field->field_options->placeholder) ? "": str_replace('"', "", $extra_field->field_options->placeholder);
				
				
				if( (!isset($extra_field->hide_in_the_register_page) || !$extra_field->hide_in_the_register_page) &&				
					(!isset($extra_field->invisible) || !$extra_field->invisible) &&  
					!$read_only && 
					( !isset($extra_field->woocommerce_checkout_only_editable) || !$extra_field->woocommerce_checkout_only_editable)
				  ):
					$required = isset($extra_field->required) && $extra_field->required ? true:false;
			
				//wpuef_var_dump($extra_field);
				?>
				<p class="form-row form-row-wide wpuef_field_row">
				<label class="wpuef_label <?php if($required) echo "wpuef_required";?> "><?php echo $extra_field->label; ?></label>
				<?php 
					
					//Types
					if($extra_field->field_type == "dropdown"): ?>
					<select class="wpuef_input_select" name="wpuef_options[<?php echo $extra_field->cid; ?>]" <?php //if($extra_field->required) echo 'required="required"';?>>
						<?php if($extra_field->field_options->include_blank_option): ?>
						   <option value="-1"> </option>
						<?php endif; 
							foreach($extra_field->field_options->options as $index => $extra_option): ?>
						  <option value="<?php echo $index; ?>" <?php if($extra_option->checked) echo 'selected';?>><?php echo $extra_option->label; ?></option>
						<?php endforeach; ?>
					</select>
				<?php elseif($extra_field->field_type == "file"): ?>
					<input class="wpuef_field wpuef_input_file input-text" type="file" value=""  
						   data-id="<?php echo $extra_field->cid; ?>"  
						   <?php if($required) echo 'required="required"';?> 
						   <?php if(isset($extra_field->file_types) && $extra_field->file_types) echo 'accept="'.$extra_field->file_types.'"';?> 
						   data-size="<?php if(isset($extra_field->file_size) && $extra_field->file_size) echo $extra_field->file_size*1048576; ?>" 
						   value="<?php if(isset($extra_field->file_size) && $extra_field->file_size) echo $extra_field->file_size*1048576; ?>">
						   </input>
						   <strong><?php if(isset($extra_field->file_size) && $extra_field->file_size) echo __('( Max size: ', 'woocommerce-files-upload').$extra_field->file_size." MB )"; ?></strong>
					<input type="hidden" id="wpuef-filename-<?php echo $extra_field->cid; ?>" name="wpuef_files[<?php echo $extra_field->cid; ?>][file_name]" value=""></input>
					
				<?php elseif($extra_field->field_type == "checkboxes"): ?>
					<?php foreach($extra_field->field_options->options as $index => $extra_option): ?>
						<input type="checkbox" class="wpuef_field " name="wpuef_options[<?php echo $extra_field->cid; ?>][<?php echo $index ?>]" value="<?php echo $index ?>" <?php if($extra_option->checked) echo 'checked';?>  <?php if($required) echo 'required="required"';?> ><span class="wpuef_checkbox_label"><?php echo $extra_option->label; ?></span></input><br/>
					<?php endforeach; ?>
					
					
				<?php elseif($extra_field->field_type == "radio"): ?>
					<?php foreach($extra_field->field_options->options as $index => $extra_option): ?>
						<input type="radio" class="wpuef_field " name="wpuef_options[<?php echo $extra_field->cid; ?>]" value="<?php echo $index; ?>" <?php if($extra_option->checked) echo 'checked';?>  <?php if($required) echo 'required="required"';?> ><span class="wpuef_checkbox_label"><?php echo $extra_option->label; ?></span></input><br/>
					<?php endforeach; ?>

					
				<?php elseif($extra_field->field_type == "date"): ?>
					 <input class="wpuef_field wpuef_input_date" type="text" placeholder="<?php echo $placeholder; ?>" value="" name="wpuef_options[<?php echo $extra_field->cid; ?>]"  <?php if($required) echo 'required="required"';?> ></input>
				<?php elseif($extra_field->field_type == "time"): ?>
					 <input class="wpuef_field wpuef_input_time " type="text" placeholder="<?php echo $placeholder; ?>" value="" name="wpuef_options[<?php echo $extra_field->cid; ?>]"  <?php if($required) echo 'required="required"';?> ></input>
				
							
				<?php elseif($extra_field->field_type == "website"): ?>
					<input class="wpuef_field wpuef_input_url input-text" type="url" placeholder="<?php echo $placeholder; ?>" value="" name="wpuef_options[<?php echo $extra_field->cid; ?>]"  <?php if($required) echo 'required="required"';?>  ></input>
		
				<?php elseif($extra_field->field_type == "paragraph"): ?>
					<textarea  class="wpuef_field wpuef_input_textarea" name="wpuef_options[<?php echo $extra_field->cid; ?>]"  placeholder="<?php echo $placeholder; ?>" <?php if($required) echo 'required="required"';?> ></textarea>
				
				<?php elseif($extra_field->field_type == "number"): ?>
					<input class="wpuef_field wpuef_input_number input-text" type="<?php echo $extra_field->field_type; ?>" placeholder="<?php echo $placeholder; ?>" value="" name="wpuef_options[<?php echo $extra_field->cid; ?>]" <?php if(isset($extra_field->field_options->min)) echo 'min="'.$extra_field->field_options->min.'"'?>  <?php if(isset($extra_field->field_options->max)) echo 'max="'.$extra_field->field_options->max.'"'?>  <?php if($required) echo 'required="required"';?> />
				<?php else: 
					// Text type?>
					<input class="wpuef_field wpuef_input_text input-text" type="<?php echo $extra_field->field_type; ?>" placeholder="<?php echo $placeholder; ?>" value="" name="wpuef_options[<?php echo $extra_field->cid; ?>]"  <?php if($required) echo 'required="required"';?> />
				<?php endif; 
				//End types
				?>
				
				<?php //Description
					if( isset($extra_field->field_options->description)): ?>
						<p class="wpuef_description"><?php echo $extra_field->field_options->description; ?></p>
					<?php endif; ?>
				</p>
			<?php endif; endforeach; ?>
			<script>
			var delete_pending_message = ""; //file upload
			var delete_popup_warning_message ="";  //file upload
			var file_check_popup_browser = "<?php _e("Please upgrade your browser, because your current browser lacks some new features we need!", 'wp-user-extra-fields'); ?>";  
			var file_check_popup_size = "<?php _e("Choosen file is too big and will not be uploaded!", 'wp-user-extra-fields'); ?>";  
			var file_check_popup_api = "<?php _e("The File APIs are not fully supported in this browser.", 'wp-user-extra-fields'); ?>";  
			var wpuef_required_fields_error = "<?php _e("Required fields cannot be left empty.", 'wp-user-extra-fields'); ?>";  
			jQuery(document).ready(function()
			{
				jQuery( ".wpuef_input_date" ).pickadate({formatSubmit: 'yyyy/mm/dd', format: 'yyyy/mm/dd',selectMonths: true,  selectYears: true, selectYears: 100, max: [<?php echo date('Y', strtotime('+10 years'))  ?>,11,31] } );
				jQuery( ".wpuef_input_time" ).pickatime({formatSubmit: 'HH:i', format: 'HH:i'});
			});
			</script>
			<?php 
		}
	}
	public function render_register_form_extra_fields_wccm()
	{
		global $wpuef_option_model;
		//$fields_json_string = $wpuef_option_model->get_option('json_fields_string');
		$extra_fields = $wpuef_option_model->get_option('json_fields_string');
		if($extra_fields)
		{
			wp_enqueue_style('wpuef-datepicker-classic', WPUEF_PLUGIN_PATH.'/css/datepicker/classic.css');   
			wp_enqueue_style('wpuef-datepicker-date-classic', WPUEF_PLUGIN_PATH.'/css/datepicker/classic.date.css');   
			wp_enqueue_style('wpuef-datepicker-time-classic', WPUEF_PLUGIN_PATH.'/css/datepicker/classic.time.css');  
			
			wp_enqueue_script('wpuef-ui-picker', WPUEF_PLUGIN_PATH.'/js/picker.js', array( 'jquery' ));
			wp_enqueue_script('wpuef-ui-datepicker', WPUEF_PLUGIN_PATH.'/js/picker.date.js', array( 'jquery' ));
			wp_enqueue_script('wpuef-ui-timepicker', WPUEF_PLUGIN_PATH.'/js/picker.time.js', array( 'jquery' ));
			wp_enqueue_script('wpuef-file-manager', WPUEF_PLUGIN_PATH.'/js/wpuef-file-manager.js', array( 'jquery' ));
		
			 ?>
			<div id="wpuef-file-container" style="display:none"></div> <!--file upload -->
			<table class="form-table">
			<?php foreach($extra_fields->fields as $extra_field):
				$read_only = !current_user_can( 'manage_options' ) && isset($extra_field->editable_only_by_admin) && $extra_field->editable_only_by_admin ? true : false;
				if( (!isset($extra_field->invisible) || !$extra_field->invisible) &&  !$read_only &&  ( !isset($extra_field->woocommerce_checkout_only_editable) || !$extra_field->woocommerce_checkout_only_editable)):
				$required = isset($extra_field->required) && $extra_field->required ? true:false;
				$placeholder = !isset($extra_field->field_options->placeholder) ? "": str_replace('"', "", $extra_field->field_options->placeholder);
			?>
				<tr>
				<th><label class="wpuef_label <?php if($required) echo "wpuef_required";?> "><?php echo $extra_field->label; ?></label></th>
				<td>
				<?php 
					
					//Types
					if($extra_field->field_type == "dropdown"): ?>
					<select class="wpuef_input_select" name="wpuef_options[<?php echo $extra_field->cid; ?>]" <?php //if($extra_field->required) echo 'required="required"';?>>
						<?php if($extra_field->field_options->include_blank_option): ?>
						   <option value="-1"> </option>
						<?php endif; 
							foreach($extra_field->field_options->options as $index => $extra_option): ?>
						  <option value="<?php echo $index; ?>" <?php if($extra_option->checked) echo 'selected';?>><?php echo $extra_option->label; ?></option>
						<?php endforeach; ?>
					</select>
				<?php elseif($extra_field->field_type == "file"): ?>
					<input class="wpuef_input_file input-text" type="file" value=""  
						   data-id="<?php echo $extra_field->cid; ?>"  
						   <?php if($required) echo 'required="required"';?> 
						   <?php if(isset($extra_field->file_types) && $extra_field->file_types) echo 'accept="'.$extra_field->file_types.'"';?> 
						   data-size="<?php if(isset($extra_field->file_size) && $extra_field->file_size) echo $extra_field->file_size*1048576; ?>" 
						   value="<?php if(isset($extra_field->file_size) && $extra_field->file_size) echo $extra_field->file_size*1048576; ?>">
						   </input>
						   <strong><?php if(isset($extra_field->file_size) && $extra_field->file_size) echo __('( Max size: ', 'woocommerce-files-upload').$extra_field->file_size." MB )"; ?></strong>
					<input type="hidden" id="wpuef-filename-<?php echo $extra_field->cid; ?>" name="wpuef_files[<?php echo $extra_field->cid; ?>][file_name]" value=""></input>
					
				<?php elseif($extra_field->field_type == "checkboxes"): ?>
					<?php foreach($extra_field->field_options->options as $index => $extra_option): ?>
						<input type="checkbox" name="wpuef_options[<?php echo $extra_field->cid; ?>][<?php echo $index ?>]" value="<?php echo $index ?>" <?php if($extra_option->checked) echo 'checked';?>  <?php if($required) echo 'required="required"';?> ><span class="wpuef_checkbox_label"><?php echo $extra_option->label; ?></span></input><br/>
					<?php endforeach; ?>
					
					
				<?php elseif($extra_field->field_type == "radio"): ?>
					<?php foreach($extra_field->field_options->options as $index => $extra_option): ?>
						<input type="radio" name="wpuef_options[<?php echo $extra_field->cid; ?>]" value="<?php echo $index; ?>" <?php if($extra_option->checked) echo 'checked';?>  <?php if($required) echo 'required="required"';?> ><span class="wpuef_checkbox_label"><?php echo $extra_option->label; ?></span></input><br/>
					<?php endforeach; ?>

					
				<?php elseif($extra_field->field_type == "date"): ?>
					 <input class="wpuef_input_date" type="text" value="" placeholder="<?php echo $placeholder; ?>" name="wpuef_options[<?php echo $extra_field->cid; ?>]"  <?php if($required) echo 'required="required"';?> ></input>
				<?php elseif($extra_field->field_type == "time"): ?>
					 <input class="wpuef_input_time " type="text" value="" placeholder="<?php echo $placeholder; ?>" name="wpuef_options[<?php echo $extra_field->cid; ?>]"  <?php if($required) echo 'required="required"';?> ></input>
				
							
				<?php elseif($extra_field->field_type == "website"): ?>
					<input class="wpuef_input_url input-text" type="url" value="" placeholder="<?php echo $placeholder; ?>" name="wpuef_options[<?php echo $extra_field->cid; ?>]"  <?php if($required) echo 'required="required"';?>  ></input>
		
				<?php elseif($extra_field->field_type == "paragraph"): ?>
					<textarea  class="wpuef_input_textarea" name="wpuef_options[<?php echo $extra_field->cid; ?>]"  placeholder="<?php echo $placeholder; ?>" <?php if($required) echo 'required="required"';?> ></textarea>
				
				<?php elseif($extra_field->field_type == "number"): ?>
					<input class="wpuef_input_number input-text" type="<?php echo $extra_field->field_type; ?>" placeholder="<?php echo $placeholder; ?>" value="" name="wpuef_options[<?php echo $extra_field->cid; ?>]" <?php if(isset($extra_field->field_options->min)) echo 'min="'.$extra_field->field_options->min.'"'?>  <?php if(isset($extra_field->field_options->max)) echo 'max="'.$extra_field->field_options->max.'"'?>  <?php if($required) echo 'required="required"';?> />
				<?php else: ?>
					<input class="wpuef_input_text input-text" type="<?php echo $extra_field->field_type; ?>" placeholder="<?php echo $placeholder; ?>" value="" name="wpuef_options[<?php echo $extra_field->cid; ?>]"  <?php if($required) echo 'required="required"';?> />
				<?php endif; 
				//End types
				?>
				
				<?php //Description
					if( isset($extra_field->field_options->description)): ?>
					<span class="description">
						<p class="wpuef_description"><?php echo $extra_field->field_options->description; ?></p>
					</span>
					<?php endif; ?>
			</td>
			</tr>			
			<?php endif; endforeach; ?>
			</table>
			
			<script>
			var delete_pending_message = ""; //file upload
			var delete_popup_warning_message ="";  //file upload
			var file_check_popup_browser = "<?php _e("Please upgrade your browser, because your current browser lacks some new features we need!", 'wp-user-extra-fields'); ?>";  
			var file_check_popup_size = "<?php _e("Choosen file is too big and will not be uploaded!", 'wp-user-extra-fields'); ?>";  
			var file_check_popup_api = "<?php _e("The File APIs are not fully supported in this browser.", 'wp-user-extra-fields'); ?>";  
			jQuery(document).ready(function()
			{
				jQuery( ".wpuef_input_date" ).pickadate({formatSubmit: 'yyyy/mm/dd', format: 'yyyy/mm/dd', selectMonths: true,  selectYears: true, selectYears: 100, max: [<?php echo date('Y', strtotime('+10 years'))  ?>,11,31] });
				jQuery( ".wpuef_input_time" ).pickatime({formatSubmit: 'HH:i', format: 'HH:i'});
			});
			</script>
			<?php 
		}
	}
	function woocommerce_render_extra_fields_wccm($user_id = null)
	{
		//$edit_page_type: 0 my account, 1 billing address edit, 2 shipping address edit
		
		global $wpuef_option_model, $wpuef_user_model;
		//$fields_json_string = $wpuef_option_model->get_option('json_fields_string');
		$extra_fields = $wpuef_option_model->get_option('json_fields_string');
		if($extra_fields)
		{
			
			
			//$extra_fields = json_decode(stripcslashes($fields_json_string));
			?>

			<div id="wpuef-file-container" style="display:none"></div> <!--file upload -->
			<?php foreach($extra_fields->fields as $extra_field): ?>
				<p class="form-row form-row-wide">
				<label class="wpuef_label "><?php echo $extra_field->label; ?></label>
				<?php
				$field_value = $wpuef_user_model->get_field( $extra_field->cid, $user_id );
						
					//Types
					if($extra_field->field_type == "dropdown"): 
						foreach($extra_field->field_options->options as $index => $extra_option): 
							if($field_value == $index) echo $extra_option->label;
						endforeach; 
					
					elseif($extra_field->field_type == "file"): 
						if(isset($field_value)): ?> 
					<a  target="_blank" href="<?php echo $field_value["url"]; ?>"><?php _e('Download / View', 'wp-user-extra-fields') ?></a> 
					<?php endif; 
					
					elseif($extra_field->field_type == "checkboxes"):
						  foreach($extra_field->field_options->options as $index => $extra_option): 
								if(isset($field_value[$index])) echo $extra_option->label." "; 
							endforeach; 
		
					elseif($extra_field->field_type == "radio"):
						 foreach($extra_field->field_options->options as $index => $extra_option):
							if($field_value == $index) echo $extra_option->label." ";
						 endforeach;
						
					elseif($extra_field->field_type == "date"):
						$date = "";
						if(isset($field_value))
						{
							$date = DateTime::createFromFormat("Y/m/d", $field_value );
							$date = $date->format(get_option( 'date_format' ));
						}
						echo $date;
					elseif($extra_field->field_type == "time"): 
						 echo $field_value;
					
					elseif($extra_field->field_type == "website"): 
						echo $field_value;
			
					elseif($extra_field->field_type == "paragraph"): 
						 echo $field_value;
					
					elseif($extra_field->field_type == "number"): 
						echo $field_value;
					 else: 
						echo $field_value;
					endif; ?>
			
			</p>			
			<?php endforeach; 
		}
		
	}
	//WP Add new user
	function render_add_table_with_extra_fields()
	{
		$this->render_edit_table_with_extra_fields();
	}
	//WP Edit my account page (admin & frontend)
	function render_edit_table_with_extra_fields($user_id = null)
	{
		global $wpuef_option_model, $wpuef_user_model;
		//$fields_json_string = $wpuef_option_model->get_option('json_fields_string');
		$extra_fields = $wpuef_option_model->get_option('json_fields_string');
		if($extra_fields)
		{
			wp_enqueue_style('wpuef-datepicker-classic', WPUEF_PLUGIN_PATH.'/css/datepicker/classic.css');   
			wp_enqueue_style('wpuef-datepicker-date-classic', WPUEF_PLUGIN_PATH.'/css/datepicker/classic.date.css');   
			wp_enqueue_style('wpuef-datepicker-time-classic', WPUEF_PLUGIN_PATH.'/css/datepicker/classic.time.css');  
			wp_enqueue_style('wpuef-common-styles', WPUEF_PLUGIN_PATH.'/css/wpuef-common-html-styles.css'); 
			
			wp_enqueue_script('wpuef-ui-picker', WPUEF_PLUGIN_PATH.'/js/picker.js', array( 'jquery' ));
			wp_enqueue_script('wpuef-ui-datepicker', WPUEF_PLUGIN_PATH.'/js/picker.date.js', array( 'jquery' ));
			wp_enqueue_script('wpuef-ui-timepicker', WPUEF_PLUGIN_PATH.'/js/picker.time.js', array( 'jquery' ));
			wp_enqueue_script('wpuef-file-manager', WPUEF_PLUGIN_PATH.'/js/wpuef-file-manager.js', array( 'jquery' ));
			
			//$extra_fields = json_decode(stripcslashes($fields_json_string));
			?>
			<div id="wpuef-file-container" style="display:none"></div> <!--file upload -->
			<table class="form-table"><?php
			foreach($extra_fields->fields as $extra_field):
				if( current_user_can( 'manage_options' ) || ( (!isset($extra_field->invisible) || !$extra_field->invisible) && (!isset($extra_field->visible_only_at_register_page) || !$extra_field->visible_only_at_register_page ))):
				$required = isset($extra_field->required) && $extra_field->required ? true:false;
				$read_only = !current_user_can( 'manage_options' ) && isset($extra_field->editable_only_by_admin) && $extra_field->editable_only_by_admin ? true : false;
				$placeholder = !isset($extra_field->field_options->placeholder) ? "": str_replace('"', "", $extra_field->field_options->placeholder);
			?>
				<tr>
				<th><label class="wpuef_label <?php if($required) echo "wpuef_required";?> "><?php echo $extra_field->label; ?></label></th>
				<td>
				<?php 
					$field_value = $wpuef_user_model->get_field( $extra_field->cid, $user_id );
					//wpuef_var_dump($field_value);
					//Types
					if($extra_field->field_type == "dropdown"): ?>
					<select class="wpuef_input_select" name="wpuef_options[<?php echo $extra_field->cid; ?>]" <?php if($read_only) echo 'disabled="true"';//if($extra_field->required) echo 'required="required"';?>>
						<?php if($extra_field->field_options->include_blank_option): ?>
						   <option value="-1"> </option>
						<?php endif; 
							foreach($extra_field->field_options->options as $index => $extra_option): ?>
						  <option value="<?php echo $index; ?>" <?php if($field_value == $index) echo 'selected';?>><?php echo $extra_option->label; ?></option>
						<?php endforeach; ?>
					</select>
				
				<?php elseif($extra_field->field_type == "file"): ?>
					<div id="wpuef-file-box-<?php echo $extra_field->cid; ?>"> <!--  //file upload edit --><?php
						
						/* Format:
						array(3) {
							  ["absolute_path"]=>
							  string(115) "/var/hostdata/public_html/site/wp-content/uploads/wpuef/8/288888_test.pdf"
							  ["url"]=>
							  string(82) "http:/site.com/wp-content/uploads/wpuef/8/288888_test.pdf"
							  ["id"]=>
							  string(3) "c32"
							} */
						if(isset($field_value)): ?> 
							<button class="button button-primary wpuef_view_download_file_button" target="_blank" data-href="<?php echo $field_value["url"]; ?>"><?php _e('Download / View', 'wp-user-extra-fields') ?></button> 
						<?php endif; 
							 if(isset($field_value) && (is_admin() || (isset($extra_field->can_delete_file) && $extra_field->can_delete_file )) ): ?> 	
							<button class="button wpuef_delete_file_button" target="_blank" data-id="<?php echo $extra_field->cid; ?>" ><?php _e('Delete', 'wp-user-extra-fields') ?></button><br/>
						<?php endif; 
							if(!$read_only && (is_admin() || (!isset($field_value) || (isset($field_value) && isset($extra_field->re_upload) && $extra_field->re_upload)))): ?>
							<input class="wpuef_input_file input-text" type="file" value=""  
							   data-id="<?php echo $extra_field->cid; ?>"  
							   <?php if($required) echo 'required="required"';?> 
							   <?php if(isset($extra_field->file_types) && $extra_field->file_types) echo 'accept="'.$extra_field->file_types.'"';?> 
							   data-size="<?php if(isset($extra_field->file_size) && $extra_field->file_size) echo $extra_field->file_size*1048576; ?>" 
							   value="<?php if(isset($extra_field->file_size) && $extra_field->file_size) echo $extra_field->file_size*1048576; ?>">
							   </input>
							   <strong><?php if(isset($extra_field->file_size) && $extra_field->file_size) echo __('( Max size: ', 'woocommerce-files-upload').$extra_field->file_size." MB )"; ?></strong>
							<input type="hidden" id="wpuef-filename-<?php echo $extra_field->cid; ?>" name="wpuef_files[<?php echo $extra_field->cid; ?>][file_name]" value=""></input>
						<?php endif ?>
					</div>
				
				<?php elseif($extra_field->field_type == "checkboxes"): ?>
					<?php foreach($extra_field->field_options->options as $index => $extra_option): ?>
						<input type="checkbox" <?php if(isset($field_value[$index])) echo 'checked';?> name="wpuef_options[<?php echo $extra_field->cid; ?>][<?php echo $index ?>]" value="<?php echo $index ?>" <?php if($required) echo 'required="required"';?> <?php if($read_only) echo 'readonly="readonly"';?>><span class="wpuef_checkbox_label"><?php echo $extra_option->label; ?></span></input><br/>
					<?php endforeach; ?>
					
					
				<?php elseif($extra_field->field_type == "radio"): ?>
					<?php foreach($extra_field->field_options->options as $index => $extra_option): ?>
						<input type="radio" name="wpuef_options[<?php echo $extra_field->cid; ?>]" value="<?php echo $index; ?>" <?php if($field_value == $index) echo 'checked';?> <?php if($required) echo 'required="required"';?> <?php if($read_only) echo 'disabled="true" readonly="readonly"';?>><span class="wpuef_checkbox_label"><?php echo $extra_option->label; ?></span></input><br/>
					<?php endforeach; ?>

					
				<?php elseif($extra_field->field_type == "date"): ?>
					 <input class="<?php if(!$read_only) echo 'wpuef_input_date'?>" type="text" placeholder="<?php echo $placeholder; ?>" value="<?php echo $field_value; ?>" name="wpuef_options[<?php echo $extra_field->cid; ?>]" <?php if($required) echo 'required="required"';?> <?php if($read_only) echo 'readonly="readonly"';?>></input>
				<?php elseif($extra_field->field_type == "time"): ?>
					 <input class="<?php if(!$read_only) echo 'wpuef_input_time'?> " type="text" placeholder="<?php echo $placeholder; ?>" value="<?php echo $field_value; ?>" name="wpuef_options[<?php echo $extra_field->cid; ?>]" <?php if($required) echo 'required="required"';?> <?php if($read_only) echo 'readonly="readonly"';?>></input>
				
				<?php elseif($extra_field->field_type == "website"): ?>
					<input class="wpuef_input_url" type="url" value="<?php echo $field_value; ?>" placeholder="<?php echo $placeholder; ?>" name="wpuef_options[<?php echo $extra_field->cid; ?>]" <?php if($required) echo 'required="required"';?>  <?php if($read_only) echo 'readonly="readonly"';?>></input>
		
				<?php elseif($extra_field->field_type == "paragraph"): ?>
					<textarea  class="wpuef_input_textarea" name="wpuef_options[<?php echo $extra_field->cid; ?>]" placeholder="<?php echo $placeholder; ?>" <?php if($required) echo 'required="required"';?>  <?php if($read_only) echo 'readonly="readonly"';?>><?php echo $field_value; ?></textarea>
				
				<?php elseif($extra_field->field_type == "number"): ?>
					<input class="wpuef_input_number" type="<?php echo $extra_field->field_type; ?>" placeholder="<?php echo $placeholder; ?>" value="<?php echo $field_value; ?>" name="wpuef_options[<?php echo $extra_field->cid; ?>]" <?php if(isset($extra_field->field_options->min)) echo 'min="'.$extra_field->field_options->min.'"'?>  <?php if(isset($extra_field->field_options->max)) echo 'max="'.$extra_field->field_options->max.'"'?>  <?php if($required) echo 'required="required"';?> <?php if($read_only) echo 'readonly="readonly"';?> />
				<?php else: ?>
					<input class="wpuef_input_text" type="<?php echo $extra_field->field_type; ?>" placeholder="<?php echo $placeholder; ?>" value="<?php echo $field_value; ?>" name="wpuef_options[<?php echo $extra_field->cid; ?>]" <?php if($required) echo 'required="required"';?> <?php if($read_only) echo 'readonly="readonly"';?>/>
				<?php endif; 
				//End types
				?>
				<span class="description">
				<?php //Description
					if( isset($extra_field->field_options->description)): ?>
						<p class="wpuef_description"><?php echo $extra_field->field_options->description; ?></p>
					<?php endif; ?>
				</span>
			</td>
			</tr>			
			<?php endif; endforeach; ?>
			</table>
			<script>
			var delete_pending_message = "<?php _e('Click on the update user profile button to delete the file.', 'wp-user-extra-fields'); ?>";  //file upload
			var delete_popup_warning_message = "<?php _e('Are you sure to delete the file?', 'wp-user-extra-fields'); ?>";  //file upload
			var file_check_popup_browser = "<?php _e("Please upgrade your browser, because your current browser lacks some new features we need!", 'wp-user-extra-fields'); ?>";  
			var file_check_popup_size = "<?php _e("Choosen file is too big and will not be uploaded!", 'wp-user-extra-fields'); ?>";  
			var file_check_popup_api = "<?php _e("The File APIs are not fully supported in this browser.", 'wp-user-extra-fields'); ?>"; 
			jQuery(document).ready(function()
			{
				jQuery( ".wpuef_input_date" ).pickadate({formatSubmit: 'yyyy/mm/dd', format: 'yyyy/mm/dd',selectMonths: true,  selectYears: true, selectYears: 100, max: [<?php echo date('Y', strtotime('+10 years'))  ?>,11,31] });
				jQuery( ".wpuef_input_time" ).pickatime({formatSubmit: 'HH:i', format: 'HH:i'});
			});
			</script>
			<?php 
		}
	}
	//WooCommerce Edit my account page - shipping address or billing address edit page (frontend)
	function woocommerce_render_edit_form_extra_fields($user_id = null, $render_form = false, $edit_page_type = 0)
	{
		//$edit_page_type: 0 my account, 1 billing address edit, 2 shipping address edit
		
		global $wpuef_option_model, $wpuef_user_model;
		//$fields_json_string = $wpuef_option_model->get_option('json_fields_string');
		$extra_fields = $wpuef_option_model->get_option('json_fields_string');
		if($extra_fields)
		{
			wp_enqueue_style('wpuef-datepicker-classic', WPUEF_PLUGIN_PATH.'/css/datepicker/classic.css');   
			wp_enqueue_style('wpuef-datepicker-date-classic', WPUEF_PLUGIN_PATH.'/css/datepicker/classic.date.css');   
			wp_enqueue_style('wpuef-datepicker-time-classic', WPUEF_PLUGIN_PATH.'/css/datepicker/classic.time.css');  
			wp_enqueue_style('wpuef-common-styles', WPUEF_PLUGIN_PATH.'/css/wpuef-common-html-styles.css'); 
			
			wp_enqueue_script('wpuef-ui-picker', WPUEF_PLUGIN_PATH.'/js/picker.js', array( 'jquery' ));
			wp_enqueue_script('wpuef-ui-datepicker', WPUEF_PLUGIN_PATH.'/js/picker.date.js', array( 'jquery' ));
			wp_enqueue_script('wpuef-ui-timepicker', WPUEF_PLUGIN_PATH.'/js/picker.time.js', array( 'jquery' ));
			wp_enqueue_script('wpuef-file-manager', WPUEF_PLUGIN_PATH.'/js/wpuef-file-manager.js', array( 'jquery' ));
			
			//$extra_fields = json_decode(stripcslashes($fields_json_string));
			$rendered_elements = 0;
			?>
			<?php if($render_form): ?>
				<!-- <header class="title">
					<h3><?php _e('Extra Info','woocommerce-files-upload');?></h3>
				</header> -->
				<form action="" method="post">
				<style>
				.wpuef_label
				{
					display:block;
					margin-top: 20px;
				}
				</style>
			<?php endif; ?>
			<div id="wpuef-file-container" style="display:none"></div> <!--file upload -->
			<?php foreach($extra_fields->fields as $extra_field): 
					if( (!isset($extra_field->invisible) || !$extra_field->invisible) &&
						(!isset($extra_field->woocommerce_checkout_only_editable) || !$extra_field->woocommerce_checkout_only_editable) &&
						(!isset($extra_field->visible_only_at_register_page) || !$extra_field->visible_only_at_register_page ) && 
					    ( //($edit_page_type == 0 && (!isset($extra_field->woocommerce_edit_on_billing_address_page) || !$extra_field->woocommerce_edit_on_billing_address_page) && (!isset($extra_field->woocommerce_edit_on_shipping_address_page) || !$extra_field->woocommerce_edit_on_shipping_address_page)) ||
					      ($edit_page_type == 0 && isset($extra_field->woocommerce_edit_on_my_account_page) && $extra_field->woocommerce_edit_on_my_account_page) ||
						  ($edit_page_type == 1 && isset($extra_field->woocommerce_edit_on_billing_address_page) && $extra_field->woocommerce_edit_on_billing_address_page) ||
						  ($edit_page_type == 2 && isset($extra_field->woocommerce_edit_on_shipping_address_page) && $extra_field->woocommerce_edit_on_shipping_address_page)
					    )
					  ):
					 
				/* wpuef_var_dump($extra_field->woocommerce_edit_on_billing_address_page);
						wpuef_var_dump($extra_field->woocommerce_edit_on_shipping_address_page); */	 
				$rendered_elements++;
				$required = isset($extra_field->required) && $extra_field->required ? true:false; 
				$read_only = !current_user_can( 'manage_options' ) && isset($extra_field->editable_only_by_admin) && $extra_field->editable_only_by_admin ? true : false;
				$placeholder = !isset($extra_field->field_options->placeholder) ? "": str_replace('"', "", $extra_field->field_options->placeholder);
				?>
				<?php // echo "page type: ".$edit_page_type.", ".empty($extra_field->woocommerce_edit_on_billing_address_page).", ".empty($extra_field->woocommerce_edit_on_shipping_address_page); ?>
				<p class="form-row form-row-wide">
				<label class="wpuef_label <?php if($required) echo "wpuef_required";?>"><?php echo $extra_field->label; ?></label>
				
				<?php 
					$field_value = $wpuef_user_model->get_field( $extra_field->cid, $user_id );
					//wpuef_var_dump($field_value);
					//Types
					if($extra_field->field_type == "dropdown"): ?>
					<select class="wpuef_input_select" name="wpuef_options[<?php echo $extra_field->cid; ?>]" <?php if($read_only) echo 'disabled="true"'; //if($extra_field->required) echo 'required="required"';?>>
						<?php if($extra_field->field_options->include_blank_option): ?>
						   <option value="-1"> </option>
						<?php endif; 
							foreach($extra_field->field_options->options as $index => $extra_option): ?>
						  <option value="<?php echo $index; ?>" <?php if($field_value == $index) echo 'selected';?>><?php echo $extra_option->label; ?></option>
						<?php endforeach; ?>
					</select>
					
				<?php elseif($extra_field->field_type == "file"): ?>
					<div id="wpuef-file-box-<?php echo $extra_field->cid; ?>"> <!--  //file upload edit -->
					<?php  //wpuef_var_dump($extra_field);
						if(isset($field_value)): ?> 
							<button class="button button-primary wpuef_view_download_file_button" target="_blank" data-href="<?php echo $field_value["url"]; ?>"><?php _e('Download / View', 'wp-user-extra-fields') ?></button> 
						<?php endif; 
						if(isset($field_value) &&  (isset($extra_field->can_delete_file) && $extra_field->can_delete_file ) ): ?> 	
							<button class="button wpuef_delete_file_button" target="_blank" data-id="<?php echo $extra_field->cid; ?>" ><?php _e('Delete', 'wp-user-extra-fields') ?></button><br/>
						<?php endif; 
						if (!$read_only && (!isset($field_value) || (isset($extra_field->re_upload) && $extra_field->re_upload && isset($field_value)))): ?>
							<input class="wpuef_input_file input-text" type="file" value=""  
								   data-id="<?php echo $extra_field->cid; ?>"  
								   <?php if($required) echo 'required="required"';?> 
								   <?php if(isset($extra_field->file_types) && $extra_field->file_types) echo 'accept="'.$extra_field->file_types.'"';?> 
								   data-size="<?php if(isset($extra_field->file_size) && $extra_field->file_size) echo $extra_field->file_size*1048576; ?>" 
								   value="<?php if(isset($extra_field->file_size) && $extra_field->file_size) echo $extra_field->file_size*1048576; ?>">
								   </input>
								   <strong><?php if(isset($extra_field->file_size) && $extra_field->file_size) echo __('( Max size: ', 'woocommerce-files-upload').$extra_field->file_size." MB )"; ?></strong>
							<input type="hidden" id="wpuef-filename-<?php echo $extra_field->cid; ?>" name="wpuef_files[<?php echo $extra_field->cid; ?>][file_name]" value=""></input>
						<?php endif ?>
					</div>
					
				<?php elseif($extra_field->field_type == "checkboxes"): ?>
					<?php foreach($extra_field->field_options->options as $index => $extra_option): ?>
						<input type="checkbox" <?php if(isset($field_value[$index])) echo 'checked';?> name="wpuef_options[<?php echo $extra_field->cid; ?>][<?php echo $index ?>]" value="<?php echo $index ?>" <?php if($required) echo 'required="required"';?> <?php if($read_only) echo 'readonly="readonly"';?>><span class="wpuef_checkbox_label"><?php echo $extra_option->label; ?></span></input><br/>
					<?php endforeach; ?>
					
					
				<?php elseif($extra_field->field_type == "radio"): ?>
					<?php foreach($extra_field->field_options->options as $index => $extra_option): ?>
						<input type="radio" name="wpuef_options[<?php echo $extra_field->cid; ?>]" value="<?php echo $index; ?>" <?php if($field_value == $index) echo 'checked';?> <?php if($required) echo 'required="required"';?> <?php if($read_only) echo 'disabled="true" readonly="readonly"';?>><span class="wpuef_checkbox_label"><?php echo $extra_option->label; ?></span></input><br/>
					<?php endforeach; ?>

					
				<?php elseif($extra_field->field_type == "date"): ?>
					 <input class="<?php if(!$read_only) echo 'wpuef_input_date'?> " type="text" placeholder="<?php echo $placeholder; ?>" value="<?php echo $field_value; ?>" name="wpuef_options[<?php echo $extra_field->cid; ?>]" <?php if($required) echo 'required="required"';?> <?php if($read_only) echo 'readonly="readonly"';?>></input>
				<?php elseif($extra_field->field_type == "time"): ?>
					 <input class="<?php if(!$read_only) echo 'wpuef_input_time'?> " type="text" placeholder="<?php echo $placeholder; ?>" value="<?php echo $field_value; ?>" name="wpuef_options[<?php echo $extra_field->cid; ?>]" <?php if($required) echo 'required="required"';?> <?php if($read_only) echo 'readonly="readonly"';?>></input>
				
				<?php elseif($extra_field->field_type == "website"): ?>
					<input class="input-text wpuef_input_url" type="url" value="<?php echo $field_value; ?>" placeholder="<?php echo $placeholder; ?>" name="wpuef_options[<?php echo $extra_field->cid; ?>]" <?php if($required) echo 'required="required"';?> <?php if($read_only) echo 'readonly="readonly"';?>></input>
		
				<?php elseif($extra_field->field_type == "paragraph"): ?>
					<textarea  class="wpuef_input_textarea" name="wpuef_options[<?php echo $extra_field->cid; ?>]" placeholder="<?php echo $placeholder; ?>" <?php if($required) echo 'required="required"';?> <?php if($read_only) echo 'readonly="readonly"';?>><?php echo $field_value; ?></textarea>
				
				<?php elseif($extra_field->field_type == "number"): ?>
					<input class="wpuef_input_number" type="<?php echo $extra_field->field_type; ?>" placeholder="<?php echo $placeholder; ?>" value="<?php echo $field_value; ?>" name="wpuef_options[<?php echo $extra_field->cid; ?>]" <?php if(isset($extra_field->field_options->min)) echo 'min="'.$extra_field->field_options->min.'"'?>  <?php if(isset($extra_field->field_options->max)) echo 'max="'.$extra_field->field_options->max.'"'?>  <?php if($required) echo 'required="required"';?> <?php if($read_only) echo 'readonly="readonly"';?> />
				<?php else: ?>
					<input class="input-text wpuef_input_text" type="<?php echo $extra_field->field_type; ?>" placeholder="<?php echo $placeholder; ?>" value="<?php echo $field_value; ?>" name="wpuef_options[<?php echo $extra_field->cid; ?>]" <?php if($required) echo 'required="required"';?> <?php if($read_only) echo 'readonly="readonly"';?>/>
				<?php endif; 
				//End types
				?>
				<span class="description">
				<?php //Description
					if( isset($extra_field->field_options->description)): ?>
						<p class="wpuef_description"><?php echo $extra_field->field_options->description; ?></p>
					<?php endif; ?>
				</span>
			
			</p>			
			<?php endif; endforeach; ?>
			<?php if($render_form && $rendered_elements > 0): ?>
				<p>
					<input type="submit" value="<?php _e('Save changes', 'wp-user-extra-fields'); ?>" name="save_account_details" class="button wpuef_save_button_my_account">
				</p>
				</form>
			<?php endif; ?>
			<script>
			var delete_pending_message = "<?php _e('Click on the update user profile button to delete the file.', 'wp-user-extra-fields'); ?>";  //file upload
			var delete_popup_warning_message = "<?php _e('Are you sure to delete the file?', 'wp-user-extra-fields'); ?>";  //file upload
			var file_check_popup_browser = "<?php _e("Please upgrade your browser, because your current browser lacks some new features we need!", 'wp-user-extra-fields'); ?>";  
			var file_check_popup_size = "<?php _e("Choosen file is too big and will not be uploaded!", 'wp-user-extra-fields'); ?>";  
			var file_check_popup_api = "<?php _e("The File APIs are not fully supported in this browser.", 'wp-user-extra-fields'); ?>"; 
			jQuery(document).ready(function()
			{
				jQuery( ".wpuef_input_date" ).pickadate({formatSubmit: 'yyyy/mm/dd', format: 'yyyy/mm/dd',selectMonths: true,  selectYears: true, selectYears: 100, max: [<?php echo date('Y', strtotime('+10 years'))  ?>,11,31] });
				jQuery( ".wpuef_input_time" ).pickatime({formatSubmit: 'HH:i', format: 'HH:i'});
			});
			</script>
			<?php 
		}
		
	}
	//WooCommerce Checkout page
	function woocommerce_render_checkout_form_extra_fields($user_id = null)
	{
		global $wpuef_option_model, $wpuef_user_model;
		//$fields_json_string = $wpuef_option_model->get_option('json_fields_string');
		$extra_fields = $wpuef_option_model->get_option('json_fields_string');
		if($extra_fields)
		{
			wp_enqueue_style('wpuef-datepicker-classic', WPUEF_PLUGIN_PATH.'/css/datepicker/classic.css');   
			wp_enqueue_style('wpuef-datepicker-date-classic', WPUEF_PLUGIN_PATH.'/css/datepicker/classic.date.css');   
			wp_enqueue_style('wpuef-datepicker-time-classic', WPUEF_PLUGIN_PATH.'/css/datepicker/classic.time.css');  
			wp_enqueue_style('wpuef-common-styles', WPUEF_PLUGIN_PATH.'/css/wpuef-common-html-styles.css'); 
			
			wp_enqueue_script('wpuef-ui-picker', WPUEF_PLUGIN_PATH.'/js/picker.js', array( 'jquery' ));
			wp_enqueue_script('wpuef-ui-datepicker', WPUEF_PLUGIN_PATH.'/js/picker.date.js', array( 'jquery' ));
			wp_enqueue_script('wpuef-ui-timepicker', WPUEF_PLUGIN_PATH.'/js/picker.time.js', array( 'jquery' ));
			wp_enqueue_script('wpuef-file-manager', WPUEF_PLUGIN_PATH.'/js/wpuef-file-manager.js', array( 'jquery' ));
			//$extra_fields = json_decode(stripcslashes($fields_json_string));
			?>
			<div id="wpuef-file-container" style="display:none"></div> <!--file upload -->
			<?php 
			foreach($extra_fields->fields as $extra_field):
			$read_only = !current_user_can( 'manage_options' ) && isset($extra_field->editable_only_by_admin) && $extra_field->editable_only_by_admin ? true : false;
				
				if( (!isset($extra_field->invisible) || !$extra_field->invisible) &&
					 (!$read_only && (!isset($extra_field->visible_only_at_register_page) || !$extra_field->visible_only_at_register_page ) &&
								     ((isset($extra_field->woocommerce_visible_on_checkout) && $extra_field->woocommerce_visible_on_checkout == true )
										|| (isset($extra_field->woocommerce_save_on_checkout_as_order_field) && $extra_field->woocommerce_save_on_checkout_as_order_field == true) 
									 )
					  )
				):
			
				$required = isset($extra_field->required) && $extra_field->required ? true:false;
				$placeholder = !isset($extra_field->field_options->placeholder) ? "": str_replace('"', "", $extra_field->field_options->placeholder);
				?>
				<p class="form-row form-row-wide">
				<label class="wpuef_label <?php if($required) echo "wpuef_required";?>"><?php echo $extra_field->label; ?></label>
				<?php 
					$field_value = $wpuef_user_model->get_field( $extra_field->cid, $user_id );
					//wpuef_var_dump($field_value);
					//Types
					if($extra_field->field_type == "dropdown"): ?>
					<select class="wpuef_input_select" name="wpuef_options[<?php echo $extra_field->cid; ?>]" <?php //if($extra_field->required) echo 'required="required"';?>>
						<?php if($extra_field->field_options->include_blank_option): ?>
						   <option value="-1"> </option>
						<?php endif; 
							foreach($extra_field->field_options->options as $index => $extra_option): ?>
						  <option value="<?php echo $index; ?>" <?php if($field_value == $index) echo 'selected';?>><?php echo $extra_option->label; ?></option>
						<?php endforeach; ?>
					</select>
				
				<?php elseif($extra_field->field_type == "file"): ?>
					<div id="wpuef-file-box-<?php echo $extra_field->cid; ?>"> <!--  //file upload edit -->
					<?php  //wpuef_var_dump($extra_field);
						if(isset($field_value)): ?> 
							<button class="button button-primary wpuef_view_download_file_button" target="_blank" data-href="<?php echo $field_value["url"]; ?>"><?php _e('Download / View', 'wp-user-extra-fields') ?></button> <br/>
						<?php endif; ?>
						<input class="wpuef_input_file input-text" type="file" value=""  
							   data-id="<?php echo $extra_field->cid; ?>"  
							   <?php if($required) echo 'required="required"';?>
							   <?php if(isset($extra_field->file_types) && $extra_field->file_types) echo 'accept="'.$extra_field->file_types.'"';?> 
							   data-size="<?php if(isset($extra_field->file_size) && $extra_field->file_size) echo $extra_field->file_size*1048576; ?>" 
							   value="<?php if(isset($extra_field->file_size) && $extra_field->file_size) echo $extra_field->file_size*1048576; ?>">
							   </input>
							   <strong><?php if(isset($extra_field->file_size) && $extra_field->file_size) echo __('( Max size: ', 'woocommerce-files-upload').$extra_field->file_size." MB )"; ?></strong>
						<input type="hidden" id="wpuef-filename-<?php echo $extra_field->cid; ?>" name="wpuef_files[<?php echo $extra_field->cid; ?>][file_name]" value=""></input>
					</div>
					
				<?php elseif($extra_field->field_type == "checkboxes"): ?>
					<?php foreach($extra_field->field_options->options as $index => $extra_option): ?>
						<input type="checkbox" <?php if(isset($field_value[$index])) echo 'checked';?> name="wpuef_options[<?php echo $extra_field->cid; ?>][<?php echo $index ?>]" value="<?php echo $index ?>" <?php if($required) echo 'required="required"';?>><span class="wpuef_checkbox_label"><?php echo $extra_option->label; ?></span></input><br/>
					<?php endforeach; ?>
					
					
				<?php elseif($extra_field->field_type == "radio"): ?>
					<?php foreach($extra_field->field_options->options as $index => $extra_option): ?>
						<input type="radio" name="wpuef_options[<?php echo $extra_field->cid; ?>]" value="<?php echo $index; ?>" <?php if($field_value == $index) echo 'checked';?> <?php if($required) echo 'required="required"';?>><span class="wpuef_checkbox_label"><?php echo $extra_option->label; ?></span></input><br/>
					<?php endforeach; ?>

					
				<?php elseif($extra_field->field_type == "date"): ?>
					 <input class="wpuef_input_date" type="text" value="<?php echo $field_value; ?>" placeholder="<?php echo $placeholder; ?>" name="wpuef_options[<?php echo $extra_field->cid; ?>]" <?php if($required) echo 'required="required"';?>></input>
				<?php elseif($extra_field->field_type == "time"): ?>
					 <input class="wpuef_input_time " type="text" value="<?php echo $field_value; ?>" placeholder="<?php echo $placeholder; ?>"  name="wpuef_options[<?php echo $extra_field->cid; ?>]" <?php if($required) echo 'required="required"';?>></input>
				
				<?php elseif($extra_field->field_type == "website"): ?>
					<input class="input-text wpuef_input_url" type="url" value="<?php echo $field_value; ?>" placeholder="<?php echo $placeholder; ?>" name="wpuef_options[<?php echo $extra_field->cid; ?>]" <?php if($required) echo 'required="required"';?>></input>
		
				<?php elseif($extra_field->field_type == "paragraph"): ?>
					<textarea  class="wpuef_input_textarea" name="wpuef_options[<?php echo $extra_field->cid; ?>]" placeholder="<?php echo $placeholder; ?>"  <?php if($required) echo 'required="required"';?>><?php echo $field_value; ?></textarea>
				
				<?php elseif($extra_field->field_type == "number"): ?>
					<input class="wpuef_input_number" type="<?php echo $extra_field->field_type; ?>" placeholder="<?php echo $placeholder; ?>"  value="<?php echo $field_value; ?>" name="wpuef_options[<?php echo $extra_field->cid; ?>]" <?php if(isset($extra_field->field_options->min)) echo 'min="'.$extra_field->field_options->min.'"'?>  <?php if(isset($extra_field->field_options->max)) echo 'max="'.$extra_field->field_options->max.'"'?>  <?php if($required) echo 'required="required"';?>/>
				<?php else: ?>
					<input class="input-text wpuef_input_text" type="<?php echo $extra_field->field_type; ?>" placeholder="<?php echo $placeholder; ?>"  value="<?php echo $field_value; ?>" name="wpuef_options[<?php echo $extra_field->cid; ?>]" <?php if($required) echo 'required="required"';?>/>
				<?php endif; 
				//End types
				?>
				<span class="description">
				<?php //Description
					if( isset($extra_field->field_options->description)): ?>
						<p class="wpuef_description"><?php echo $extra_field->field_options->description; ?></p>
					<?php endif; ?>
				</span>
			
			</p>			
			<?php endif; endforeach; ?>
			<script>
			var delete_pending_message = ""; //file upload
			var delete_popup_warning_message ="";  //file upload
			var file_check_popup_browser = "<?php _e("Please upgrade your browser, because your current browser lacks some new features we need!", 'wp-user-extra-fields'); ?>";  
			var file_check_popup_size = "<?php _e("Choosen file is too big and will not be uploaded!", 'wp-user-extra-fields'); ?>";  
			var file_check_popup_api = "<?php _e("The File APIs are not fully supported in this browser.", 'wp-user-extra-fields'); ?>"; 
			jQuery(document).ready(function()
			{
				jQuery( ".wpuef_input_date" ).pickadate({formatSubmit: 'yyyy/mm/dd', format: 'yyyy/mm/dd',selectMonths: true,  selectYears: true, selectYears: 100, max: [<?php echo date('Y', strtotime('+10 years'))  ?>,11,31] });
				jQuery( ".wpuef_input_time" ).pickatime({formatSubmit: 'HH:i', format: 'HH:i'});
			});
			</script>
			<?php 
		}
		
	}
	//WooCommerce Order details meta box addon (backend)
	function woocommerce_render_order_edit_form_extra_fields($user_id = null)
	{
		global $wpuef_option_model, $wpuef_user_model;
		//$fields_json_string = $wpuef_option_model->get_option('json_fields_string');
		$extra_fields = $wpuef_option_model->get_option('json_fields_string');
		if($extra_fields)
		{
			wp_enqueue_style('wpuef-datepicker-classic', WPUEF_PLUGIN_PATH.'/css/datepicker/classic.css');   
			wp_enqueue_style('wpuef-datepicker-date-classic', WPUEF_PLUGIN_PATH.'/css/datepicker/classic.date.css');   
			wp_enqueue_style('wpuef-datepicker-time-classic', WPUEF_PLUGIN_PATH.'/css/datepicker/classic.time.css');  
			wp_enqueue_style('wpuef-common-styles', WPUEF_PLUGIN_PATH.'/css/wpuef-common-html-styles.css'); 
			
			wp_enqueue_script('wpuef-ui-picker', WPUEF_PLUGIN_PATH.'/js/picker.js', array( 'jquery' ));
			wp_enqueue_script('wpuef-ui-datepicker', WPUEF_PLUGIN_PATH.'/js/picker.date.js', array( 'jquery' ));
			wp_enqueue_script('wpuef-ui-timepicker', WPUEF_PLUGIN_PATH.'/js/picker.time.js', array( 'jquery' ));
			wp_enqueue_script('wpuef-file-manager', WPUEF_PLUGIN_PATH.'/js/wpuef-file-manager.js', array( 'jquery' ));
			//$extra_fields = json_decode(stripcslashes($fields_json_string));
			
			echo "<div id='wpuef-order-meta-box'>";
			echo '<div id="wpuef-file-container" style="display:none"></div> <!--file upload -->';
			echo "<h4>".__('Customer extra fields', 'wp-user-extra-fields')."</h4>";
			echo "<small>".__('NOTE: click on "Save order" button to save changes.', 'wp-user-extra-fields')."</small>";
			foreach($extra_fields->fields as $extra_field):
			
				$placeholder = !isset($extra_field->field_options->placeholder) ? "": str_replace('"', "", $extra_field->field_options->placeholder); 
				?>
				<p class="form-row form-row-wide">
					<label class="wpuef_label"><?php echo $extra_field->label; ?></label>
				
					<?php 
						$field_value = $wpuef_user_model->get_field( $extra_field->cid, $user_id );
						//wpuef_var_dump($field_value);
						//Types
						if($extra_field->field_type == "dropdown"): ?>
						<select class="wpuef_input_select" name="wpuef_options[<?php echo $extra_field->cid; ?>]" <?php //if($extra_field->required) echo 'required="required"';?>>
							<?php if($extra_field->field_options->include_blank_option): ?>
							   <option value="-1"> </option>
							<?php endif; 
								foreach($extra_field->field_options->options as $index => $extra_option): ?>
							  <option value="<?php echo $index; ?>" <?php if($field_value == $index) echo 'selected';?>><?php echo $extra_option->label; ?></option>
							<?php endforeach; ?>
						</select>
					<?php elseif($extra_field->field_type == "file"): ?>
					<div id="wpuef-file-box-<?php echo $extra_field->cid; ?>"> <!--  //file upload edit -->
					<?php
						if(isset($field_value) && isset($field_value["url"])): ?> 
							<button class="button button-primary wpuef_view_download_file_button" target="_blank" data-href="<?php if(isset($field_value["url"])) echo $field_value["url"]; else echo "#"; ?>"><?php _e('Download / View', 'wp-user-extra-fields') ?></button> 
						<?php endif; if( (isset($field_value) && isset($field_value["url"])) && ( current_user_can( 'manage_options' ) ||  ( isset($extra_field->can_delete_file) && $extra_field->can_delete_file )) ): ?> 	
							<button class="button wpuef_delete_file_button" target="_blank" data-id="<?php echo $extra_field->cid; ?>" ><?php _e('Delete', 'wp-user-extra-fields') ?></button><br/>
						<?php endif; 
						if(current_user_can( 'manage_options' ) || (!isset($field_value) || (isset($field_value) && isset($extra_field->re_upload) && $extra_field->re_upload))):?>
						<input class="wpuef_input_file input-text" type="file" value=""  
							   data-id="<?php echo $extra_field->cid; ?>"  
							   <?php if(isset($extra_field->required) && $extra_field->required) echo 'required="required"';?> 
							   <?php if(isset($extra_field->file_types) && $extra_field->file_types) echo 'accept="'.$extra_field->file_types.'"';?> 
							   data-size="<?php if(isset($extra_field->file_size) && $extra_field->file_size) echo $extra_field->file_size*1048576; ?>" 
							   value="<?php if(isset($extra_field->file_size) && $extra_field->file_size) echo $extra_field->file_size*1048576; ?>">
							   </input>
							   <strong><?php if(isset($extra_field->file_size) && $extra_field->file_size) echo __('( Max size: ', 'woocommerce-files-upload').$extra_field->file_size." MB )"; ?></strong>
						<input type="hidden" id="wpuef-filename-<?php echo $extra_field->cid; ?>" name="wpuef_files[<?php echo $extra_field->cid; ?>][file_name]" value=""></input>
						<?php endif; ?>
					</div>
					
					<?php elseif($extra_field->field_type == "checkboxes"): ?>
						<?php foreach($extra_field->field_options->options as $index => $extra_option): ?>
							<input type="checkbox" <?php if(isset($field_value[$index])) echo 'checked';?> name="wpuef_options[<?php echo $extra_field->cid; ?>][<?php echo $index ?>]" value="<?php echo $index ?>" ><span class="wpuef_checkbox_label"><?php echo $extra_option->label; ?></span></input><br/>
						<?php endforeach; ?>
						
						
					<?php elseif($extra_field->field_type == "radio"): ?>
						<?php foreach($extra_field->field_options->options as $index => $extra_option): ?>
							<input type="radio" name="wpuef_options[<?php echo $extra_field->cid; ?>]" value="<?php echo $index; ?>" <?php if($field_value == $index) echo 'checked';?>><span class="wpuef_checkbox_label"><?php echo $extra_option->label; ?></span></input><br/>
						<?php endforeach; ?>

						
					<?php elseif($extra_field->field_type == "date"): ?>
						 <input class="wpuef_input_date" type="text" placeholder="<?php echo $placeholder; ?>"  value="<?php echo $field_value; ?>" name="wpuef_options[<?php echo $extra_field->cid; ?>]" <?php if(isset($extra_field->required) && $extra_field->required) echo 'required="required"';?>></input>
					<?php elseif($extra_field->field_type == "time"): ?>
						 <input class="wpuef_input_time " type="text" placeholder="<?php echo $placeholder; ?>" value="<?php echo $field_value; ?>" name="wpuef_options[<?php echo $extra_field->cid; ?>]" <?php if(isset($extra_field->required) && $extra_field->required) echo 'required="required"';?>></input>
					
					<?php elseif($extra_field->field_type == "website"): ?>
						<input class="input-text wpuef_input_url" type="url" value="<?php echo $field_value; ?>" placeholder="<?php echo $placeholder; ?>"  name="wpuef_options[<?php echo $extra_field->cid; ?>]" <?php if(isset($extra_field->required) && $extra_field->required) echo 'required="required"';?> ></input>
			
					<?php elseif($extra_field->field_type == "paragraph"): ?>
						<textarea  class="wpuef_input_textarea" name="wpuef_options[<?php echo $extra_field->cid; ?>]" placeholder="<?php echo $placeholder; ?>"  <?php if(isset($extra_field->required) && $extra_field->required) echo 'required="required"';?> ><?php echo $field_value; ?></textarea>
					
					<?php elseif($extra_field->field_type == "number"): ?>
						<input class="wpuef_input_number" type="<?php echo $extra_field->field_type; ?>" placeholder="<?php echo $placeholder; ?>" value="<?php echo $field_value; ?>" name="wpuef_options[<?php echo $extra_field->cid; ?>]" <?php if(isset($extra_field->field_options->min)) echo 'min="'.$extra_field->field_options->min.'"'?>  <?php if(isset($extra_field->field_options->max)) echo 'max="'.$extra_field->field_options->max.'"'?>  <?php if(isset($extra_field->required) && $extra_field->required) echo 'required="required"';?>/>
					<?php else: ?>
						<input class="input-text wpuef_input_text" type="<?php echo $extra_field->field_type; ?>" placeholder="<?php echo $placeholder; ?>" value="<?php echo $field_value; ?>" name="wpuef_options[<?php echo $extra_field->cid; ?>]" <?php if(isset($extra_field->required) && $extra_field->required) echo 'required="required"';?>/>
					<?php endif; 
					//End types
					?>
				
				</p>			
			<?php endforeach; ?>
			</div>
			<script>
			var delete_pending_message = "<?php _e('Click on the update user profile button to delete the file.', 'wp-user-extra-fields'); ?>";  //file upload
			var delete_popup_warning_message = "<?php _e('Are you sure to delete the file?', 'wp-user-extra-fields'); ?>";  //file upload
			var file_check_popup_browser = "<?php _e("Please upgrade your browser, because your current browser lacks some new features we need!", 'wp-user-extra-fields'); ?>";  
			var file_check_popup_size = "<?php _e("Choosen file is too big and will not be uploaded!", 'wp-user-extra-fields'); ?>";  
			var file_check_popup_api = "<?php _e("The File APIs are not fully supported in this browser.", 'wp-user-extra-fields'); ?>"; 
			var file_required_error = "<?php _e("Fill all the required fields", 'wp-user-extra-fields'); ?>"; 
			jQuery(document).ready(function()
			{
				jQuery( ".wpuef_input_date" ).pickadate({formatSubmit: 'yyyy/mm/dd', format: 'yyyy/mm/dd',selectMonths: true,  selectYears: true, selectYears: 100, max: [<?php echo date('Y', strtotime('+10 years'))  ?>,11,31] });
				jQuery( ".wpuef_input_time" ).pickatime({formatSubmit: 'HH:i', format: 'HH:i'});
			});
			</script>
			<?php 
		}
		
	}
	//Woocommerce email
	function woocommerce_render_fields_on_emails($user_id)
	{
		global $wpuef_option_model, $wpuef_user_model;
		//$fields_json_string = $wpuef_option_model->get_option('json_fields_string');
		$extra_fields = $wpuef_option_model->get_option('json_fields_string');
		if($extra_fields)
		{
			foreach($extra_fields->fields as $extra_field):
			if( (isset($extra_field->woocommerce_include_on_woocommerce_emails) && $extra_field->woocommerce_include_on_woocommerce_emails == true )):
			
			?>
					<strong><?php echo $extra_field->label; ?>: </strong>
					<span>
					<?php 
					$field_value = $wpuef_user_model->get_field( $extra_field->cid, $user_id );
						
					//Types
					if($extra_field->field_type == "dropdown"): 
						foreach($extra_field->field_options->options as $index => $extra_option): 
							if($field_value == $index) echo $extra_option->label;
						endforeach; 
					
					elseif($extra_field->field_type == "file"): 
						if(isset($field_value)): ?> 
							<a  target="_blank" href="<?php echo $field_value["url"]; ?>"><?php _e('Download / View', 'wp-user-extra-fields') ?></a> 
					<?php endif; 
					
					elseif($extra_field->field_type == "checkboxes"):
						  foreach($extra_field->field_options->options as $index => $extra_option): 
								if(isset($field_value[$index])) echo $extra_option->label." "; 
							endforeach; 
		
					elseif($extra_field->field_type == "radio"):
						 foreach($extra_field->field_options->options as $index => $extra_option):
							if($field_value == $index) echo $extra_option->label." ";
						 endforeach;
						
					elseif($extra_field->field_type == "date"):
						$date = "";
						if(isset($field_value))
						{
							$date = DateTime::createFromFormat("Y/m/d", $field_value );
							$date = $date->format(get_option( 'date_format' ));
						}
						echo $date;
						//echo $field_value;
					elseif($extra_field->field_type == "time"): 
						 echo $field_value;
					
					elseif($extra_field->field_type == "website"): 
						echo $field_value;
			
					elseif($extra_field->field_type == "paragraph"): 
						 echo $field_value;
					
					elseif($extra_field->field_type == "number"): 
						echo $field_value;
					 else: 
						echo $field_value;
					endif; ?>
					</span>
				<br/><br/>
				
			<?php endif; endforeach; 
		} 
	}
}
?>