<style>
	.am_vc_field_AmBorder.am_vc_field_box .am_label {
		margin-top: 9px;
	}

    .wpb-edit-form .am-border-width {
        display: inline-block;
        width: 63px;
        text-align: right;
	    height: 35px;
    }
    .wpb-edit-form .am-border-color-div {
        display: inline-block;
        width: 70px;
    }
    .am-border-color-div .iris-picker .iris-square, .am-border-color-div .iris-picker .iris-slider, .am-border-color-div .iris-picker .iris-square-inner, .am-border-color-div .iris-picker .iris-palette {
        border-radius: 0px;
    }
    .wpb-edit-form .am-border-color-div .iris-border {
        border-radius: 0px;
        border: 1px solid #ddd;
        -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,.07);
        box-shadow: inset 0 1px 2px rgba(0,0,0,.07);
        background-color: #fff;
    }
    .wpb-edit-form .am-border-color {
        display: inline-block;
        width: 75px;
	    height: 35px;
    }

    .wpb-edit-form .am-border-style {
        vertical-align: top;
        width: 100px;
	    height: 35px;
    }

    .ab-border-example {
        background-color: #f2f2f2;
        color: #808080;
        display: inline-block;
        width: 100px;
        height: 30px;
        vertical-align: middle;
        text-align: center;
        line-height: 30px;
        float: right;
        font-size: 11px;
        /*top: 10px;*/
        /*position: absolute;*/
        /*right: 5px;*/
    }
</style>
<input class="am-border-width"
       type="number"
       min="0"
       max="1000"
       step="1"
       placeholder="width"
    />

<?php $styles = array('solid', 'double', 'dotted', 'dashed', 'groove', 'ridge', 'inset', 'outset'); ?>
<select class="am-border-style">
    <?php foreach($styles as $style) { ?>
        <option value="<?php echo $style; ?>"><?php echo $style; ?></option>
    <?php } ?>
</select>

<div class="am-border-color-div">
    <input class="am-border-color"
           type="text"
        />
</div>


<div class="ab-border-example">Border Example</div>