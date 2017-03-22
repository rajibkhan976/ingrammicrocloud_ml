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
    <label class="control-label" for="marginleft"><?php _e('Margin left','wpfd'); ?></label>
    <div class="controls"><input name="params[ggd_marginleft]" value="<?php echo $this->params["ggd_marginleft"]; ?>" class="inputbox input-block-level" type="text"></div>
</div>
<div class="control-group">
    <label class="control-label" for="marginright"><?php _e('Margin right','wpfd'); ?></label>
    <div class="controls"><input name="params[ggd_marginright]" value="<?php echo $this->params["ggd_marginright"]; ?>" class="inputbox input-block-level" type="text"></div>
</div>
<div class="control-group">
    <label class="control-label" for="margintop"><?php _e('Margin top','wpfd'); ?></label>
    <div class="controls"><input name="params[ggd_margintop]" value="<?php echo $this->params["ggd_margintop"]; ?>" class="inputbox input-block-level" type="text"></div>
</div>
<div class="control-group">
    <label class="control-label" for="marginbottom"><?php _e('Margin bottom','wpfd'); ?></label>
    <div class="controls"><input name="params[ggd_marginbottom]" value="<?php echo $this->params["ggd_marginbottom"]; ?>" class="inputbox input-block-level" type="text"></div>
</div>
<div class="control-group">
    <label class="control-label" for="showtitle"><?php _e('Show title','wpfd'); ?></label>
    <div class="controls">
        <select name="params[ggd_showtitle]" class="inline">
            <option value="1" <?php if($this->params["ggd_showtitle"]=="1") { echo 'selected="selected"';}?> ><?php _e('Yes','wpfd'); ?></option>
            <option value="0" <?php if($this->params["ggd_showtitle"]=="0") { echo 'selected="selected"';}?> ><?php _e('No','wpfd'); ?></option>
        </select>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="showsize"><?php _e('Show weight','wpfd'); ?></label>
    <div class="controls">
        <select name="params[ggd_showsize]" class="inline">
            <option value="1" <?php if($this->params["ggd_showsize"]=="1") { echo 'selected="selected"';}?> ><?php _e('Yes','wpfd'); ?></option>
            <option value="0" <?php if($this->params["ggd_showsize"]=="0") { echo 'selected="selected"';}?> ><?php _e('No','wpfd'); ?></option>
        </select>
    </div>
</div>

<div class="control-group">
    <label class="control-label" for="showversion"><?php _e('Show version','wpfd'); ?></label>
    <div class="controls">
        <select name="params[ggd_showversion]" class="inline">
            <option value="1" <?php if($this->params["ggd_showversion"]=="1") { echo 'selected="selected"';}?> ><?php _e('Yes','wpfd'); ?></option>
            <option value="0" <?php if($this->params["ggd_showversion"]=="0") { echo 'selected="selected"';}?> ><?php _e('No','wpfd'); ?></option>
        </select>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="showhits"><?php _e('Show hits','wpfd'); ?></label>
    <div class="controls">
        <select name="params[ggd_showhits]" class="inline">
            <option value="1" <?php if($this->params["ggd_showhits"]=="1") { echo 'selected="selected"';}?> ><?php _e('Yes','wpfd'); ?></option>
            <option value="0" <?php if($this->params["ggd_showhits"]=="0") { echo 'selected="selected"';}?> ><?php _e('No','wpfd'); ?></option>
        </select>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="showdownload"><?php _e('Show download link','wpfd'); ?></label>
    <div class="controls">
        <select name="params[ggd_showdownload]" class="inline">
            <option value="1" <?php if($this->params["ggd_showdownload"]=="1") { echo 'selected="selected"';}?>><?php _e('Yes','wpfd'); ?></option>
            <option value="0" <?php if($this->params["ggd_showdownload"]=="0") { echo 'selected="selected"';}?> ><?php _e('No','wpfd'); ?></option>
        </select>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="ggd_bgdownloadlink"><?php _e('Background download link','wpfd'); ?></label>
    <div class="controls">
        <input name="params[ggd_bgdownloadlink]" value="<?php echo $this->params["ggd_bgdownloadlink"]; ?>" class="inputbox input-block-level wp-color-field" type="text">
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="ggd_colordownloadlink"><?php _e('Color download link','wpfd'); ?></label>
    <div class="controls">
        <input name="params[ggd_colordownloadlink]" value="<?php echo $this->params["ggd_colordownloadlink"]; ?>" class="inputbox input-block-level wp-color-field" type="text">
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="showdateadd"><?php _e('Show date added','wpfd'); ?></label>
    <div class="controls">
        <select name="params[ggd_showdateadd]" class="inline">
            <option value="1" <?php if($this->params["ggd_showdateadd"]=="1") { echo 'selected="selected"';}?> ><?php _e('Yes','wpfd'); ?></option>
            <option value="0" <?php if($this->params["ggd_showdateadd"]=="0") { echo 'selected="selected"';}?> ><?php _e('No','wpfd'); ?></option>
        </select>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="showdatemodified"><?php _e('Show date modified','wpfd'); ?></label>
    <div class="controls">
        <select name="params[ggd_showdatemodified]" class="inline">
            <option value="1" <?php if($this->params["ggd_showdatemodified"]=="1") { echo 'selected="selected"';}?>><?php _e('Yes','wpfd'); ?></option>
            <option value="0" <?php if($this->params["ggd_showdatemodified"]=="0") { echo 'selected="selected"';}?> ><?php _e('No','wpfd'); ?></option>
        </select>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="showsubcategories"><?php _e('Show subcategories','wpfd'); ?></label>
    <div class="controls">
        <select name="params[ggd_showsubcategories]" class="inline">
            <option value="1" <?php if($this->params["ggd_showsubcategories"]=="1") { echo 'selected="selected"';}?>><?php _e('Yes','wpfd'); ?></option>
            <option value="0" <?php if($this->params["ggd_showsubcategories"]=="0") { echo 'selected="selected"';}?> ><?php _e('No','wpfd'); ?></option>
        </select>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="ggd_showbreadcrumb"><?php _e('Show Breadcrumb','wpfd'); ?></label>
    <div class="controls">
        <select name="params[ggd_showbreadcrumb]" class="inline">
            <option value="1" <?php if($this->params["ggd_showbreadcrumb"]=="1") { echo 'selected="selected"';}?>><?php _e('Yes','wpfd'); ?></option>
            <option value="0" <?php if($this->params["ggd_showbreadcrumb"]=="0") { echo 'selected="selected"';}?> ><?php _e('No','wpfd'); ?></option>
        </select>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="ggd_showfoldertree"><?php _e('Show folder tree','wpfd'); ?></label>
    <div class="controls">
        <select name="params[ggd_showfoldertree]" class="inline">
            <option value="1" <?php if($this->params["ggd_showfoldertree"]=="1") { echo 'selected="selected"';}?>><?php _e('Yes','wpfd'); ?></option>
            <option value="0" <?php if($this->params["ggd_showfoldertree"]=="0") { echo 'selected="selected"';}?> ><?php _e('No','wpfd'); ?></option>
        </select>
    </div>
</div>
