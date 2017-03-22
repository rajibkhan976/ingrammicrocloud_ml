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
    <label class="control-label" for="table_styling"><?php _e('Stylize table','wpfd'); ?></label>
    <div class="controls">
        <select name="params[table_styling]" class="inline">
            <option value="1" <?php if($this->params["table_styling"]=="1") { echo 'selected="selected"';}?> ><?php _e('Yes','wpfd'); ?></option>
            <option value="0" <?php if($this->params["table_styling"]=="0") { echo 'selected="selected"';}?> ><?php _e('No','wpfd'); ?></option>
        </select>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="table_stylingmenu"><?php _e('Stylize menu','wpfd'); ?></label>
    <div class="controls">
        <select name="params[table_stylingmenu]" class="inline">
            <option value="1" <?php if($this->params["table_stylingmenu"]=="1") { echo 'selected="selected"';}?> ><?php _e('Yes','wpfd'); ?></option>
            <option value="0" <?php if($this->params["table_stylingmenu"]=="0") { echo 'selected="selected"';}?> ><?php _e('No','wpfd'); ?></option>
        </select>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="showtitle"><?php _e('Show title','wpfd'); ?></label>
    <div class="controls">
        <select name="params[table_showtitle]" class="inline">
            <option value="1" <?php if($this->params["table_showtitle"]=="1") { echo 'selected="selected"';}?> ><?php _e('Yes','wpfd'); ?></option>
            <option value="0" <?php if($this->params["table_showtitle"]=="0") { echo 'selected="selected"';}?> ><?php _e('No','wpfd'); ?></option>
        </select>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="showsize"><?php _e('Show weight','wpfd'); ?></label>
    <div class="controls">
        <select name="params[table_showsize]" class="inline">
            <option value="1" <?php if($this->params["table_showsize"]=="1") { echo 'selected="selected"';}?> ><?php _e('Yes','wpfd'); ?></option>
            <option value="0" <?php if($this->params["table_showsize"]=="0") { echo 'selected="selected"';}?> ><?php _e('No','wpfd'); ?></option>
        </select>
    </div>
</div>

<div class="control-group">
    <label class="control-label" for="showversion"><?php _e('Show version','wpfd'); ?></label>
    <div class="controls">
        <select name="params[table_showversion]" class="inline">
            <option value="1" <?php if($this->params["table_showversion"]=="1") { echo 'selected="selected"';}?> ><?php _e('Yes','wpfd'); ?></option>
            <option value="0" <?php if($this->params["table_showversion"]=="0") { echo 'selected="selected"';}?> ><?php _e('No','wpfd'); ?></option>
        </select>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="showhits"><?php _e('Show hits','wpfd'); ?></label>
    <div class="controls">
        <select name="params[table_showhits]" class="inline">
            <option value="1" <?php if($this->params["table_showhits"]=="1") { echo 'selected="selected"';}?> ><?php _e('Yes','wpfd'); ?></option>
            <option value="0" <?php if($this->params["table_showhits"]=="0") { echo 'selected="selected"';}?> ><?php _e('No','wpfd'); ?></option>
        </select>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="showdownload"><?php _e('Show download link','wpfd'); ?></label>
    <div class="controls">
        <select name="params[table_showdownload]" class="inline">
            <option value="1" <?php if($this->params["table_showdownload"]=="1") { echo 'selected="selected"';}?>><?php _e('Yes','wpfd'); ?></option>
            <option value="0" <?php if($this->params["table_showdownload"]=="0") { echo 'selected="selected"';}?> ><?php _e('No','wpfd'); ?></option>
        </select>
    </div>
</div>

<div class="control-group">
    <label class="control-label" for="table_bgdownloadlink"><?php _e('Background download link','wpfd'); ?></label>
    <div class="controls">
        <input name="params[table_bgdownloadlink]" value="<?php echo $this->params["table_bgdownloadlink"]; ?>" class="inputbox input-block-level wp-color-field" type="text">
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="table_colordownloadlink"><?php _e('Color download link','wpfd'); ?></label>
    <div class="controls">
        <input name="params[table_colordownloadlink]" value="<?php echo $this->params["table_colordownloadlink"]; ?>" class="inputbox input-block-level wp-color-field" type="text">
    </div>
</div>

<div class="control-group">
    <label class="control-label" for="showdateadd"><?php _e('Show date added','wpfd'); ?></label>
    <div class="controls">
        <select name="params[table_showdateadd]" class="inline">
            <option value="1" <?php if($this->params["table_showdateadd"]=="1") { echo 'selected="selected"';}?> ><?php _e('Yes','wpfd'); ?></option>
            <option value="0" <?php if($this->params["table_showdateadd"]=="0") { echo 'selected="selected"';}?> ><?php _e('No','wpfd'); ?></option>
        </select>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="showdatemodified"><?php _e('Show date modified','wpfd'); ?></label>
    <div class="controls">
        <select name="params[table_showdatemodified]" class="inline">
            <option value="1" <?php if($this->params["table_showdatemodified"]=="1") { echo 'selected="selected"';}?>><?php _e('Yes','wpfd'); ?></option>
            <option value="0" <?php if($this->params["table_showdatemodified"]=="0") { echo 'selected="selected"';}?> ><?php _e('No','wpfd'); ?></option>
        </select>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="showsubcategories"><?php _e('Show subcategories','wpfd'); ?></label>
    <div class="controls">
        <select name="params[table_showsubcategories]" class="inline">
            <option value="1" <?php if($this->params["table_showsubcategories"]=="1") { echo 'selected="selected"';}?>><?php _e('Yes','wpfd'); ?></option>
            <option value="0" <?php if($this->params["table_showsubcategories"]=="0") { echo 'selected="selected"';}?> ><?php _e('No','wpfd'); ?></option>
        </select>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="table_showcategorytitle"><?php _e('Show category title','wpfd'); ?></label>
    <div class="controls">
        <select name="params[table_showcategorytitle]" class="inline">
            <option value="1" <?php if($this->params["table_showcategorytitle"]=="1") { echo 'selected="selected"';}?>><?php _e('Yes','wpfd'); ?></option>
            <option value="0" <?php if($this->params["table_showcategorytitle"]=="0") { echo 'selected="selected"';}?> ><?php _e('No','wpfd'); ?></option>
        </select>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="table_showbreadcrumb"><?php _e('Show Breadcrumb','wpfd'); ?></label>
    <div class="controls">
        <select name="params[table_showbreadcrumb]" class="inline">
            <option value="1" <?php if($this->params["table_showbreadcrumb"]=="1") { echo 'selected="selected"';}?>><?php _e('Yes','wpfd'); ?></option>
            <option value="0" <?php if($this->params["table_showbreadcrumb"]=="0") { echo 'selected="selected"';}?> ><?php _e('No','wpfd'); ?></option>
        </select>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="table_showfoldertree"><?php _e('Show folder tree','wpfd'); ?></label>
    <div class="controls">
        <select name="params[table_showfoldertree]" class="inline">
            <option value="1" <?php if($this->params["table_showfoldertree"]=="1") { echo 'selected="selected"';}?>><?php _e('Yes','wpfd'); ?></option>
            <option value="0" <?php if($this->params["table_showfoldertree"]=="0") { echo 'selected="selected"';}?> ><?php _e('No','wpfd'); ?></option>
        </select>
    </div>
</div>
