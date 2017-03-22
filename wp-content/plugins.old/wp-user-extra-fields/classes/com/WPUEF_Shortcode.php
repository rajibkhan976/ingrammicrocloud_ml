<?php 
class WPUEF_Shortcode
{
	public function __construct()
	{
		add_shortcode( 'wpuef_show_field_value', array(&$this, 'wpuef_show_field_value' ));
	}
	public function wpuef_show_field_value($atts, $content = null)
	{
		
		 $a = shortcode_atts( array(
			'user_id' => get_current_user_id(),
			'field_id' => "",
			), $atts );
	
		if(!isset($a['field_id']) || !isset($a['user_id']))
			return "";
		
		$result = wpuef_get_field($a['field_id'], $a['user_id']);
		$value = isset($result->value) ? $result->value : "";
		$original_value = null;
		if(isset($result->field_type) && ($result->field_type == "dropdown" || $result->field_type == "checkboxes" || $result->field_type == "radio")) 
		{
			if(!is_array($result->value))
				$value = isset($result->field_options->options[$result->value]) ? $result->field_options->options[$result->value]->label : "";
			else
			{
				$value = array();
				foreach((array)$result->value as $index)
					$value[] = isset($result->field_options->options[$index]) ? $result->field_options->options[$index]->label : "";
			}
		}
		else if(isset($result->field_type) && $result->field_type == "date" ) 
		{
			$date = "";
			if(isset($result->value))
			{
				$date = DateTime::createFromFormat("Y/m/d", $result->value );
				$date = $date->format(get_option( 'date_format' ));
			}
			$value = $date;
		}
		else if(isset($result->field_type) && $result->field_type == "file" ) 
		{
			//wpuef_var_dump($result);
			if($result->value['url'] != "")
			{
				$value = '<a href="'.$result->value['url'].'">'.__('View/Download', 'wp-user-extra-fields').'</a>';
				$original_value = $result->value['url'];
			}
		}
		
		if(isset($content))
		{
			$value = is_array($value) ? implode(",", $value):$value;
			$value = isset($original_value) ? $original_value : $value;
			$value = '<a href="'.$value.'">'.$content.'</a>';
		}
		
		ob_start();
		//wpuef_var_dump($result);
		if(!is_array($value))
			echo $value;
		else 
			//foreach($value as $string_value)
					echo implode(", ", $value);
		return ob_get_clean();
	}
}
?>