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
<div class="wrap wpfd-config">
    <div id="icon-options-general" class="icon32"></div>
    <h2><?php _e("WP File Download Configuration",'wpfd'); ?></h2>
    <div id="dashboard-widgets-wrap">
        <div id="dashboard-widgets" class="metabox-holder columns-2">
            <div id="postbox-container-1" class="postbox-container">
                <div class="metabox-holder">
                    <div id="dashboard_recent_drafts" class="postbox ">
                        <h3 class="hndle"><span><?php _e("Main parameters",'wpfd'); ?></span></h3>
                        <div class="inside">
                            <?php echo $this->configform; ?>
                        </div>
                    </div>
                </div>
            </div>
        
            <div id="postbox-container-2" class="postbox-container">
                <div class="tab-header">
                  <ul class="nav-tab-wrapper" id="wpfd-tabs">
                    <a id="tab-default" class="nav-tab active" data-tab-id="default" href="#default"><?php _e('Default theme','wpfd'); ?></a>
                    <a id="tab-ggd" class="nav-tab" data-tab-id="ggd" href="#ggd"><?php _e('Ggd theme','wpfd');  ?></a>
                    <a id="tab-table" class="nav-tab" data-tab-id="table" href="#table"><?php _e('Table theme','wpfd');   ?></a>
                    <a id="tab-tree" class="nav-tab" data-tab-id="tree" href="#tree"><?php _e('Tree theme','wpfd');   ?></a>
                    <a id="tab-file" class="nav-tab" data-tab-id="file" href="#file"><?php _e('Single file','wpfd');   ?></a>
                  </ul>
                </div>
                <div class="tab-content" id="wpfd-tabs-content">
                    <div id="wpfd-theme-default" class="tab-pane active">
                        <?php echo $this->themeforms['default']; ?>
                    </div>
                    <div id="wpfd-theme-ggd" class="tab-pane ">
                         <?php echo $this->themeforms['ggd']; ?>
                    </div>
                    <div id="wpfd-theme-table" class="tab-pane "> <?php echo $this->themeforms['table']; ?></div>
                    <div id="wpfd-theme-tree" class="tab-pane "> <?php echo $this->themeforms['tree']; ?></div>
                    <div id="wpfd-theme-file" class="tab-pane "> <?php echo $this->file_configform; ?></div>
                </div>
               
            </div>
        </div>
    </div>
</div>
<style>
    #wpfd-tabs { margin-bottom: 1px;}
    .wpfdparams { }
    #wpfd-tabs .nav-tab.active {
        background-color: #FFF;
        color: #464646;
    }
    #wpfd-tabs-content { background: #fff; border-left:1px solid #CCC; padding: 10px 10px 30px 10px}
    #wpfd-tabs-content .tab-pane { display: none}
    #wpfd-tabs-content .tab-pane.active { display: block}
</style>
<script type="text/javascript">
jQuery(document).ready(function($) {
    $("#wpfd-tabs .nav-tab").click(function(e) {
        e.preventDefault();
        $("#wpfd-tabs .nav-tab").removeClass('active');        
        id_tab = $(this).data('tab-id'); 
        $("#tab-"+ id_tab).addClass('active');
        $("#wpfd-tabs-content .tab-pane").removeClass('active');
        $("#wpfd-theme-"+ id_tab).addClass('active');
    })
  
});
</script>