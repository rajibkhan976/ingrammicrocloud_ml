<select class="wpb_vc_param_value am-select2"
        name="<?php echo $param_name; ?>"
	>
	<?php foreach($value as $option=>$optionKey) { ?>
		<option value="<?php echo $optionKey; ?>" <?php am_e_if($currentValue == $optionKey, 'selected') ?>><?php echo $option; ?></option>
	<?php } ?>
</select>