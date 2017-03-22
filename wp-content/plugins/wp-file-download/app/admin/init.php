<?php
/**
 * WP File Download
 *
 * @package WP File Download
 * @author Joomunited
 * @version 1.0
 */

use Joomunited\WPFramework\v1_0_0\Application;
use Joomunited\WPFramework\v1_0_0\Utilities;

defined( 'ABSPATH' ) || die();


$app = Application::getInstance('wpfd');
require_once $app->getPath().DIRECTORY_SEPARATOR.$app->getType().DIRECTORY_SEPARATOR.'classes'.DIRECTORY_SEPARATOR.'wpfdBase.php';

 if(!get_option('_wpfd_import_notice_flag', false)){
    require_once $app->getPath().DIRECTORY_SEPARATOR.$app->getType().DIRECTORY_SEPARATOR.'classes'.DIRECTORY_SEPARATOR.'wpfdTool.php';
    $wpfdTool = new wpfdTool;
    add_action( 'admin_notices', array($wpfdTool,'wpfd_import_notice'), 3 );
 }

add_action( 'admin_menu', 'wpfd_menu' );
add_action( 'wp_ajax_wpfd_import', array('wpfdTool', 'wpfd_import_categories') );
add_action( 'wp_ajax_wpfd', 'wpfd_ajax' );
add_action( 'media_buttons_context', 'wpfd_button');

add_action( 'init', 'wpfd_register_post_type' );
function wpfd_register_post_type() {

    $labels = array(
        'label' => __( 'WP File Download' ),
        'rewrite' => array( 'slug' => 'wp-file-download' ),
        'menu_name'         => __( 'WP File Download' ),
        'hierarchical' => true,
        'show_in_nav_menus' => true,
        'show_ui' => false
    );

    register_taxonomy('wpfd-category', 'wpfd_file', $labels);

    register_post_type('wpfd_file',
        array(
            'labels' => array(
                'name' => __('Files', 'wpfd'),
                'singular_name' => __('File', 'wpfd')
            ),
            'public' => true,
            'taxonomies' => array('wpfd-category'),
            'has_archive' => false,
            'show_in_menu' => false,
            'capability_type' => 'wpfd_file',
            'map_meta_cap' => false,
            'capabilities' => array(
                'wpfd_create_category' => __('Create category', 'wpfd'),
                'wpfd_edit_category' => __('Edit category', 'wpfd'),
                'wpfd_edit_own_category' => __('Edit own category', 'wpfd'),
                'wpfd_delete_category' => __('Delete category', 'wpfd'),
                'wpfd_manage_file' => __('Access WP File Download', 'wpfd'),
            ),
        )
    );
    
     //force the WPFD menu box alway show on screen
    $hidden_nav_boxes = (array)get_user_option( 'metaboxhidden_nav-menus' );

    $post_type = 'wpfd-category'; //Can also be a taxonomy slug
    $post_type_nav_box = 'add-'.$post_type;

    if(is_array($hidden_nav_boxes) && in_array($post_type_nav_box, $hidden_nav_boxes)):
        foreach ($hidden_nav_boxes as $i => $nav_box):
            if($nav_box == $post_type_nav_box)
                unset($hidden_nav_boxes[$i]);
        endforeach;
        update_user_option(get_current_user_id(), 'metaboxhidden_nav-menus', $hidden_nav_boxes);
    endif;
        //Ensure the $wp_rewrite global is loaded
    global $wp_rewrite;
    //Call flush_rules() as a method of the $wp_rewrite object
    $wp_rewrite->flush_rules( false );

}


add_action( 'wp_update_nav_menu_item', 'wpfd_update_custom_nav_fields', 10, 3 );
function wpfd_update_custom_nav_fields( $menu_id, $menu_item_db_id, $args ) {
    
    // Check if element is properly sent
    if ( $args['menu-item-db-id'] == "0" &&  $args['menu-item-object']=='wpfd-category') {
        
        $my_post = array(
            'ID'           => $menu_item_db_id,         
            'post_content' => '',
        );

        // Update the post into the database
        wp_update_post( $my_post );       
    }
}


function wpfd_menu() {
        $app = Application::getInstance('wpfd');
        add_object_page( 'WP File Download', 'WP File Download', 'wpfd_manage_file', 'wpfd', 'wpfd_call','dashicons-category' );
        add_submenu_page( 'wpfd', 'WP File Download config', 'Config','manage_options', 'wpfd-config', 'wpfd_call_config' );
        add_submenu_page( 'wpfd', 'User Role', 'User Role','manage_options', 'wpfd-role', 'wpfd_call_role' );
}

function wpfd_ajax(){
    define( 'WPFD_AJAX', 'true');
    wpfd_call();
}

function wpfd_call($ref=null,$default_task='wpfd.display') {
	
    $application = Application::getInstance('wpfd');

    wpfd_init();

    $application->execute($default_task);
}

function wpfd_call_config() {

        wpfd_call(null,'config.display');
}

function wpfd_call_role() {

        wpfd_call(null,'role.display');
}

function wpfd_init(){
        $application = Application::getInstance('wpfd'); 
        load_plugin_textdomain( 'wpfd', null, dirname( plugin_basename( WPFD_PLUGIN_FILE ) ).DIRECTORY_SEPARATOR. 'app' .DIRECTORY_SEPARATOR.'languages');

        wp_enqueue_script('jquery');
        wp_enqueue_script('jquery-migrate');
        wp_enqueue_script('jquery-ui-core');
        wp_enqueue_script('jquery-ui-sortable');
        wp_enqueue_style( 'dashicons' );
        wp_enqueue_script('wpfd-bootstrap',plugins_url('assets/js/bootstrap.min.js',__FILE__));
        wp_enqueue_style('wpfd-bootstrap',plugins_url('assets/css/bootstrap.min.css',__FILE__));

        wp_enqueue_script('wpfd-bootstrap',plugins_url('assets/js/jquery.ui.touch-punch.min.js',__FILE__));
        
        wp_enqueue_style('buttons');
        wp_enqueue_style('wp-admin');
        wp_enqueue_style('colors-fresh');

        wp_enqueue_style('wpfd-upload',plugins_url('assets/css/upload.min.css',__FILE__));
        wp_enqueue_style('wpfd-style',plugins_url('assets/css/style.css',__FILE__));
        wp_enqueue_script('l10n');

        wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_script( 'wp-color-picker' );
        wp_enqueue_script('jquery-filedrop',plugins_url('assets/js/jquery.filedrop.min.js',__FILE__));
        wp_enqueue_script('jquery-textselect',plugins_url('assets/js/jquery.textselect.min.js',__FILE__));
        wp_enqueue_script('jquery-nestable',plugins_url('assets/js/jquery.nestable.js',__FILE__));
        wp_enqueue_style('jquery.restable',plugins_url('assets/css/jquery.restable.css',__FILE__));
        wp_enqueue_script('jquery.restable',plugins_url('assets/js/jquery.restable.js',__FILE__));
        wp_enqueue_style('jquery-jaofiletree',plugins_url('assets/css/jaofiletree.css',__FILE__));
        wp_enqueue_script('jquery-jaofiletree',plugins_url('assets/js/jaofiletree.js',__FILE__));
        wp_enqueue_script('jquery-bootbox',plugins_url('assets/js/bootbox.js',__FILE__));
        wp_enqueue_script('wpfd-main',plugins_url('assets/js/wpfd.js',__FILE__) );
        wp_localize_script('wpfd-main','wpfd_permissions',array(
            'can_create_category' => current_user_can('wpfd_create_category'),
            'can_edit_category' => (current_user_can('wpfd_edit_category') || current_user_can('wpfd_edit_own_category')) ? true : false,
            'can_delete_category' => current_user_can('wpfd_delete_category'),
            'translate' => array(
                'wpfd_create_category' => __('You don\'t have permission to create new category', 'wpfd'),
                'wpfd_edit_category' => __('You don\'t have permission to edit category', 'wpfd')
            ),
        ));
        wp_enqueue_style('buttons');
	
	if(Utilities::getInput('noheader', 'GET', 'bool')){
	    //remove script loaded in bottom of page
	    wp_dequeue_script( 'sitepress-scripts' );
	    wp_dequeue_script( 'wpml-tm-scripts' );
	}
    
}

function wpfd_button($context){
    wp_enqueue_style('wpfd-modal',plugins_url('assets/css/leanmodal.css',__FILE__));
    wp_enqueue_script('wpfd-modal',plugins_url('assets/js/jquery.leanModal.min.js',__FILE__));
    wp_enqueue_script('wpfd-modal-init',plugins_url('assets/js/leanmodal.init.js',__FILE__));

    $context .= "<a href='#wpfdmodal' class='button' id='wpfdlaunch' title='WP File Download'><span class='dashicons dashicons-download' style='line-height: inherit;'></span> ".__('WP File Download', 'wpfd')."</a>";
    return $context;
}