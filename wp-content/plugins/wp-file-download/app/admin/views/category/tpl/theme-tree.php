<?php
/**
 * WP File Download
 *
 * @package WP File Download
 * @author Joomunited
 * @version 1.0
 */

// No direct access.
defined( 'ABSPATH' ) || die();

?>

<div class="control-group">
    <label class="control-label" for="tree_showbgtitle"><?php _e('background title','wpfd'); ?></label>
    <div class="controls">
        <select name="params[tree_showbgtitle]" class="inline">
            <option value="1" <?php if($this->params["tree_showbgtitle"]=="1") { echo 'selected="selected"';}?> ><?php _e('Yes','wpfd'); ?></option>
            <option value="0" <?php if($this->params["tree_showbgtitle"]=="0") { echo 'selected="selected"';}?> ><?php _e('No','wpfd'); ?></option>
        </select>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="tree_showtreeborder"><?php _e('Show tree border','wpfd'); ?></label>
    <div class="controls">
        <select name="params[tree_showtreeborder]" class="inline">
            <option value="1" <?php if($this->params["tree_showtreeborder"]=="1") { echo 'selected="selected"';}?> ><?php _e('Yes','wpfd'); ?></option>
            <option value="0" <?php if($this->params["tree_showtreeborder"]=="0") { echo 'selected="selected"';}?> ><?php _e('No','wpfd'); ?></option>
        </select>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="showtitle"><?php _e('Show title','wpfd'); ?></label>
    <div class="controls">
        <select name="params[tree_showtitle]" class="inline">
            <option value="1" <?php if($this->params["tree_showtitle"]=="1") { echo 'selected="selected"';}?> ><?php _e('Yes','wpfd'); ?></option>
            <option value="0" <?php if($this->params["tree_showtitle"]=="0") { echo 'selected="selected"';}?> ><?php _e('No','wpfd'); ?></option>
        </select>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="showsize"><?php _e('Show weight','wpfd'); ?></label>
    <div class="controls">
        <select name="params[tree_showsize]" class="inline">
            <option value="1" <?php if($this->params["tree_showsize"]=="1") { echo 'selected="selected"';}?> ><?php _e('Yes','wpfd'); ?></option>
            <option value="0" <?php if($this->params["tree_showsize"]=="0") { echo 'selected="selected"';}?> ><?php _e('No','wpfd'); ?></option>
        </select>
    </div>
</div>

<div class="control-group">
    <label class="control-label" for="showversion"><?php _e('Show version','wpfd'); ?></label>
    <div class="controls">
        <select name="params[tree_showversion]" class="inline">
            <option value="1" <?php if($this->params["tree_showversion"]=="1") { echo 'selected="selected"';}?> ><?php _e('Yes','wpfd'); ?></option>
            <option value="0" <?php if($this->params["tree_showversion"]=="0") { echo 'selected="selected"';}?> ><?php _e('No','wpfd'); ?></option>
        </select>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="showhits"><?php _e('Show hits','wpfd'); ?></label>
    <div class="controls">
        <select name="params[tree_showhits]" class="inline">
            <option value="1" <?php if($this->params["tree_showhits"]=="1") { echo 'selected="selected"';}?> ><?php _e('Yes','wpfd'); ?></option>
            <option value="0" <?php if($this->params["tree_showhits"]=="0") { echo 'selected="selected"';}?> ><?php _e('No','wpfd'); ?></option>
        </select>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="showdownload"><?php _e('Show download link','wpfd'); ?></label>
    <div class="controls">
        <select name="params[tree_showdownload]" class="inline">
            <option value="1" <?php if($this->params["tree_showdownload"]=="1") { echo 'selected="selected"';}?>><?php _e('Yes','wpfd'); ?></option>
            <option value="0" <?php if($this->params["tree_showdownload"]=="0") { echo 'selected="selected"';}?> ><?php _e('No','wpfd'); ?></option>
        </select>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="tree_bgdownloadlink"><?php _e('Background download link','wpfd'); ?></label>
    <div class="controls">
        <input name="params[tree_bgdownloadlink]" value="<?php echo $this->params["tree_bgdownloadlink"]; ?>" class="inputbox input-block-level wp-color-field" type="text">
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="table_colordownloadlink"><?php _e('Color download link','wpfd'); ?></label>
    <div class="controls">
        <input name="params[tree_colordownloadlink]" value="<?php echo $this->params["tree_colordownloadlink"]; ?>" class="inputbox input-block-level wp-color-field" type="text">
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="showdateadd"><?php _e('Show date added','wpfd'); ?></label>
    <div class="controls">
        <select name="params[tree_showdateadd]" class="inline">
            <option value="1" <?php if($this->params["tree_showdateadd"]=="1") { echo 'selected="selected"';}?> ><?php _e('Yes','wpfd'); ?></option>
            <option value="0" <?php if($this->params["tree_showdateadd"]=="0") { echo 'selected="selected"';}?> ><?php _e('No','wpfd'); ?></option>
        </select>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="showdatemodified"><?php _e('Show date modified','wpfd'); ?></label>
    <div class="controls">
        <select name="params[tree_showdatemodified]" class="inline">
            <option value="1" <?php if($this->params["tree_showdatemodified"]=="1") { echo 'selected="selected"';}?>><?php _e('Yes','wpfd'); ?></option>
            <option value="0" <?php if($this->params["tree_showdatemodified"]=="0") { echo 'selected="selected"';}?> ><?php _e('No','wpfd'); ?></option>
        </select>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="showsubcategories"><?php _e('Show subcategories','wpfd'); ?></label>
    <div class="controls">
        <select name="params[tree_showsubcategories]" class="inline">
            <option value="1" <?php if($this->params["tree_showsubcategories"]=="1") { echo 'selected="selected"';}?>><?php _e('Yes','wpfd'); ?></option>
            <option value="0" <?php if($this->params["tree_showsubcategories"]=="0") { echo 'selected="selected"';}?> ><?php _e('No','wpfd'); ?></option>
        </select>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="tree_showcategorytitle"><?php _e('Show category title','wpfd'); ?></label>
    <div class="controls">
        <select name="params[tree_showcategorytitle]" class="inline">
            <option value="1" <?php if($this->params["tree_showcategorytitle"]=="1") { echo 'selected="selected"';}?>><?php _e('Yes','wpfd'); ?></option>
            <option value="0" <?php if($this->params["tree_showcategorytitle"]=="0") { echo 'selected="selected"';}?> ><?php _e('No','wpfd'); ?></option>
        </select>
    </div>
</div>
