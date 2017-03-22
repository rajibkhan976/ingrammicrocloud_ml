<div class="am_vc_field_box am_vc_field_<?php echo $type; ?>">
	<input class="wpb_vc_param_value"
	       type="hidden"
	       name="<?php echo $param_name; ?>"
	       value="<?php echo $currentValue; ?>"
		/>
	<?php if ( @$prefix ) : ?>
		<span class="prefix suffix">
	        <?php echo $prefix; ?>
	    </span>
	<?php endif; ?>
	<?php echo $field; ?>
	<?php if ( @$suffix ) : ?>
		<span class="suffix <?php am_e_if( @$suffix_bold, 'bold' ); ?>">
            <?php echo $suffix; ?>
        </span>
	<?php endif; ?>
</div>