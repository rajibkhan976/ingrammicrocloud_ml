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
global $wp_roles;

$options=array();

foreach ($wp_roles->roles as $role){
    $selected = '';
    if(in_array(strtolower($role['name']), $this->category->roles)){
        $selected = 'checked="checked"';
    }
    $options[] = '<input type="checkbox" name="params[roles][]" value="'. strtolower($role['name']).'" '.$selected.'/>'.$role['name'].'<br/>';
}

$ordering_options = array(
    'ordering' => __('Ordering','wpfd'),
    'ext' => __('Type','wpfd'),
    'title' => __('Title','wpfd'),
    'description' => __('Description','wpfd'),
    'size' => __('Filesize','wpfd'),
    'created_time' => __('Date added','wpfd'),
    'modified_time' => __('Date modified','wpfd'),
    'version' => __('Version','wpfd'),
    'hits' => __('Hits','wpfd'),
);

if($this->mainConfig['catparameters']=='0'): ?>
<style type="text/css">
    #category-theme-params{display: none;}
</style>
<?php endif; ?>

<div class="wpfdparams">
    <form id="category_params">

        <div class="control-group <?php if ($this->mainConfig['catparameters'] == 0) echo 'hidden'?>">
            <label class="control-label" for="wpfd-theme"><?php _e('Theme','wpfd'); ?></label>
            <div class="controls">
                <select name="params[theme]" id="wpfd-theme" >
                    <?php foreach($this->themes as $theme) {
                        if($this->category->params['theme']==$theme) {
                            $selected = 'selected="selected"';
                        }else {
                            $selected = '';
                        }
                        echo '<option value="'.$theme.'" '.$selected. ' >'.$theme.'</option>';
                    }?>
                </select>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="visibility"><?php _e('Visibility','wpfd'); ?></label>
            <div class="controls">
                <select name="params[visibility]" id="visibility">
                    <option value="0" <?php if( $this->category->access==0){echo 'selected="selected"';} ?>><?php _e('Public','wpfd'); ?></option>
                    <option value="1" <?php if( $this->category->access==1){echo 'selected="selected"';} ?>><?php _e('Private','wpfd'); ?></option>
                </select>
            </div>
            <div id="visibilitywrap">
                <?php echo implode('',$options); ?>
            </div>
        </div>

        <div class="control-group">
            <label for="ordering" class="control-label"><?php _e('Ordering','wpfd'); ?></label>
            <div class="controls">
                <select name="params[ordering]" id="ordering" >
                    <?php foreach ($ordering_options as $order_key => $order_text) { ?>
                        <option value="<?php echo $order_key;?>" <?php selected($this->category->ordering, $order_key);?>><?php echo $order_text; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="control-group">
            <label for="orderingdir" class="control-label"><?php _e('Ordering direction','wpfd'); ?></label>
            <div class="controls">
                <select name="params[orderingdir]" id="orderingdir">
                    <option value="asc" <?php selected($this->category->orderingdir, 'asc');?>><?php _e('Ascending','wpfd'); ?></option>
                    <option value="desc" <?php selected($this->category->orderingdir, 'desc');?>><?php _e('Descending','wpfd'); ?></option>
                </select>
            </div>
        </div>

        <div id="category-theme-params">
             <?php echo $this->loadTemplate('theme-'. $this->category->params['theme']); ?>
        </div>

    <button class="button button-primary" type="submit"><?php _e('Save','wpfd'); ?></button>
   </form>
</div>