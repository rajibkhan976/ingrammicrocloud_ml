<?php
/**
 * WP File Download
 *
 * @package WP File Download
 * @author Joomunited
 * @version 1.0W
 */

use Joomunited\WPFramework\v1_0_0\Factory;
use Joomunited\WPFramework\v1_0_0\Utilities;
use Joomunited\WPFramework\v1_0_0\Model;
use Joomunited\WPFramework\v1_0_0\Application;
// No direct access.
defined( 'ABSPATH' ) || die();

if (!current_user_can('wpfd_manage_file')) {
    wp_die(__('You don\'t have permission to view this page', 'wpfd'));
}

$modelConfig = Model::getInstance('config');
$params = $modelConfig->getConfig();

wp_localize_script('wpfd-main','l10n',array(
                'Drop files here to upload'=>__('Drop files here to upload','wpfd'),                
                'Or use the button below'=>__('Or use the button below','wpfd'),
                'Or use the button below'=>__('Or use the button below','wpfd'),
                'Are you sure'=>__('Are you sure','wpfd'),
                'Delete'=>__('Delete','wpfd'),
                'Edit'=>__('Edit','wpfd'),
                'Your browser does not support HTML5 file uploads'=>__('Your browser does not support HTML5 file uploads','wpfd'),
                'Too many files'=>__('Too many files','wpfd'),
                'is too large'=>__('is too large','wpfd'),
                'Only images are allowed'=>__('Only images are allowed','wpfd'),
                'Do you want to delete &quot;'=>__('Do you want to delete &quot;','wpfd'),
                'Select files'=>__('Select files','wpfd'),
                'Image parameters'=>__('Image parameters','wpfd'),
                'Cancel'=>__('Cancel','wpfd'),
                'Ok'=>__('Ok','wpfd'),
                'Confirm'=>__('Confirm','wpfd'),
                'Save'=>__('Save','wpfd'),
                'close_categories' => wpfdBase::loadValue($params, 'close_categories', 0),
                'show_file_import' => wpfdBase::loadValue($params, 'show_file_import', 0)
        ));

if (isset($_GET['noheader'])){
    global $hook_suffix;
    _wp_admin_html_begin();
    do_action( 'admin_enqueue_scripts', $hook_suffix );
    do_action( "admin_print_scripts-$hook_suffix" );
    do_action( 'admin_print_scripts' );
}

$alone = '';
?>
<script type="text/javascript">
    ajaxurl = "<?php echo Application::getInstance('wpfd')->getAjaxUrl(); ?>";
    dir = "<?php echo Application::getInstance('wpfd')->getBaseUrl(); ?>";
<?php if(Utilities::getInput('caninsert','GET','bool')): ?>
    gcaninsert=true;
    <?php $alone = 'wpfdalone wp-core-ui '; ?>
<?php else: ?>
    gcaninsert=false;
<?php endif; ?>

    var Wpfd = {}; Wpfd.maxfilesize = <?php echo apply_filters('wpfd_max_file_size', 300); ?>;
    if(typeof(addLoadEvent)==='undefined'){addLoadEvent = function(func){if(typeof jQuery!="undefined")jQuery(document).ready(func);else if(typeof wpOnload!='function'){wpOnload=func;}else{var oldonload=wpOnload;wpOnload=function(){oldonload();func();}}};};
</script>

<div id="mybootstrap" class="<?php echo $alone; ?>">

    <div id="leftcol" class="wpfd-column">

        <div id="mycategories">
            <div id="df-panel-toggle"><span class="icon-circle-arrow-left" style="right: 0px;"></span></div>
            <?php if (current_user_can('wpfd_create_category')) { ?>
            <a id="newcategory" class="button button-primary button-big" title="<?php _e('','wpfd'); ?>" href=""><span class="dashicons dashicons-category"></span> <?php _e('New category','wpfd'); ?></a>
            <?php } ?>
            <div class="nested dd">
                <ol id="categorieslist" class="dd-list nav bs-docs-sidenav2 ">
                    <?php $content = '';
                    if(!empty($this->categories)){
                        $previouslevel = 1;
                        for ($index = 0; $index < count($this->categories); $index++) {
                            if($index+1!=count($this->categories)){
                                $nextlevel = $this->categories[$index+1]->level;
                            }else{
                                $nextlevel = 0;
                            }
                            $content .= openItem($this->categories[$index],$index);
                            if($nextlevel>$this->categories[$index]->level){
                                $content .= openlist($this->categories[$index]);
                            }elseif($nextlevel==$this->categories[$index]->level){
                                $content .= closeItem($this->categories[$index]);
                            }else{
                                $c = '';
                                $c .= closeItem($this->categories[$index]);
                                $c .= closeList($this->categories[$index]);
                                $content .= str_repeat($c,$this->categories[$index]->level-$nextlevel);
                            }
                            $previouslevel = $this->categories[$index]->level;
                        }
                    }
                    echo $content;
                    ?>
                </ol>
                <input type="hidden" id="categoryToken" name="" />
            </div>
        </div>
        <div id="pwrapper">
            <div id="wpreview">
                <div id="preview" class="<?php if (current_user_can('wpfd_edit_category') || current_user_can('wpfd_edit_own_category')) echo 'has-dropfile'; else echo 'no-dropfile';?>"></div>
            </div>
            <input type="hidden" name="id_category" value="" />
        </div>
    </div>

    <?php if (current_user_can('wpfd_edit_category') || current_user_can('wpfd_edit_own_category') || Utilities::getInput('caninsert', 'GET', 'bool')) { ?>
    <div id="rightcol" class="wpfd-column">
        <?php if(Utilities::getInput('caninsert', 'GET', 'bool')): ?>
            <a id="insertcategory" class="button button-primary button-big" href="#" onclick="if (window.parent) insertCategory();"><?php _e('Insert this category','wpfd'); ?></a>
            <a id="insertfile" class="button button-primary button-big" style="display: none;" href="#" onclick="if (window.parent) insertFile();"><?php _e('Insert this file','wpfd'); ?></a>
        <?php endif; ?>


        <?php if (current_user_can('wpfd_edit_category') || current_user_can('wpfd_edit_own_category')) { ?>
            <div class="categoryblock">


                <div class="well">
                    <h4><?php _e('Parameters','wpfd'); ?></h4>
                    <div id="galleryparams">

                    </div>
                </div>
                <?php if (wpfdBase::loadValue($params, 'show_file_import', 0)) { ?>
                    <div class="well">
                        <h4><?php echo __('Import into category', 'wpfd'); ?></h4>
                        <div id="filesimport">
                            <div id="wpfd-jao"></div>
                            <div class="center category-btn-footer">
                                <button class="button btn-mini" id="selectAllImportFiles" type="button"><?php echo __('Select all', 'wpfd'); ?></button>
                                <button class="button button-primary" id="importFilesBtn" type="button"><?php echo __('Import', 'wpfd'); ?></button>
                                <button class="button btn-mini" id="unselectAllImportFiles" type="button"><?php echo __('Unselect all', 'wpfd'); ?></button>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>

        <div class="fileblock" style="display: none;">


            <div class="well">
                <h4><?php _e('Parameters','wpfd'); ?></h4>
                <div id="fileparams">

                </div>
            </div>
            <div id="fileversion">
                <div class="well">
                    <h4><?php _e('Send a new version','wpfd'); ?></h4>
                        <div id="dropbox_version">
                            <div class="upload">
                                <span class="message"><?php _e('Drop files here to upload','wpfd'); ?></span>
                                <input class="hide" type="file" id="upload_input_version">
                                <a href="" id="upload_button_version" class="button button-primary button-big">
                                    <?php _e('Select files','wpfd'); ?>
                                </a>
                            </div>
                            <div class="progress progress-striped active hide">
                                <div class="bar" style="width: 0%;"></div>
                            </div>
                        </div>
                    <div class="clr"></div>
                </div>
            </div>
        </div>

    </div>
    <?php } ?>
</div>


<?php
function openItem($category,$key){
    $item = '<li class="dd-item dd3-item '.($key?'':'active').'" data-id-category="'.$category->term_id.'">
        <div class="dd-handle dd3-handle"></div>
        <div class="dd-content dd3-content">';
        if (current_user_can('wpfd_edit_category') || current_user_can('wpfd_edit_own_category')) {
            $item .= '<a class="edit"><i class="icon-edit"></i></a>';
        }
        if (current_user_can('wpfd_delete_category')) {
            $item .= '<a class="trash"><i class="icon-trash"></i></a>';
        }
        $item .= '<a href="" class="t"> <span class="title">'.$category->name.'</span> </a> </div>';
        return $item;
}

function closeItem($category){
    return '</li>';
}

function itemContent($category){
    $item = '<div class="dd-handle dd3-handle"></div>
    <div class="dd-content dd3-content"
        <i class="icon-chevron-right"></i>';
        if (current_user_can('wpfd_edit_category') || current_user_can('wpfd_edit_own_category')) {
            $item .= '<a class="edit"><i class="icon-edit"></i></a>';
        }
        $item .= '<a href="" class="t"> <span class="title">'.$category->name.'</span> </a>
    </div>';

    return $item;
}

function openlist($category){
    return '<ol class="dd-list">';
}

function closelist($category){
    return '</ol>';
}
?>