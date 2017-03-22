<style>
    .radio_image_cnt [type=radio] {
	    display: none;
    }
    .radio_image_cnt {
        float: left;
	    margin-right: 3px;
    }
    .radio_image_cnt img {
	    border: 3px solid transparent;
	    padding: 3px;
    }
    .radio_image_cnt .checked img {
	    border: 3px solid #2980b9;
	    background-color: #e1e1e1;
    }
    .radio_image_cnt:hover img {
	    border: 3px solid #3498db;
    }
</style>
<?php
    if(empty($currentValue)) {
        reset($value);
        $currentValue = array_shift(array_slice($value, 0, 1));
    }
?>
<!--<div class="radio_image_wrap">-->
<?php foreach($value as $option=>$optionKey) { ?>
    <?php $id = am_id(); ?>
    <div class="radio_image_cnt">
        <input id="<?php echo $id;?>" type="radio" name="<?php echo $param_name; ?>_radio" value="<?php echo $optionKey; ?>" <?php am_e_if($currentValue == $optionKey, 'checked') ?>>
        <label for="<?php echo $id;?>" data-value="<?php echo $optionKey; ?>" class="radio-image-label <?php am_e_if($currentValue == $optionKey, 'checked') ?>"><img src="<?php echo $option; ?>" /></label>
    </div>
<?php } ?>
<!--</div>-->