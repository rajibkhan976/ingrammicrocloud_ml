<?php
/**
 * WP File Download
 *
 * @package WP File Download
 * @author Joomunited
 * @version 1.0
 */

use Joomunited\WPFramework\v1_0_0\Application;
use Joomunited\WPFramework\v1_0_0\Filesystem;
use Joomunited\WPFramework\v1_0_0\Model;

// Prohibit direct script loading
defined( 'ABSPATH' ) || die( 'No direct script access allowed!' );

register_activation_hook( WPFD_PLUGIN_FILE, 'wpfd_install' );

register_uninstall_hook( WPFD_PLUGIN_FILE, 'wpfd_uninstall');

function wpfd_install() {

         // Check for required PHP version
        if (version_compare(PHP_VERSION, '5.3', '<'))
        {
            deactivate_plugins( basename( WPFD_PLUGIN_FILE ) );
            exit(sprintf('WP File Download requires PHP 5.3 or higher. You’re still on %s.',PHP_VERSION));
        }
        
        add_option( 'wpfd_version', '1.1.0' );

    // Set permissions for editors and admins so they can do stuff with WPFD
    $wpfd_roles = array( 'editor', 'administrator' );
    foreach ( $wpfd_roles as $role_name ) {
        $role = get_role( $role_name );
        $role->add_cap('wpfd_create_category');
        $role->add_cap('wpfd_edit_category');
        $role->add_cap('wpfd_edit_own_category');
        $role->add_cap('wpfd_delete_category');
        $role->add_cap('wpfd_manage_file');
    }

}
function wpfd_uninstall() {
        $app = Application::getInstance('wpfd',WPFD_PLUGIN_FILE);
        $app->init();
        require_once $app->getPath().DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'classes'.DIRECTORY_SEPARATOR.'wpfdBase.php';
        require_once $app->getPath().DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'models'.DIRECTORY_SEPARATOR.'config.php';
        $modelConfig = new wpfdModelConfig;
        $params = $modelConfig->getConfig();

        if(wpfdBase::loadValue($params,'deletefiles',0)){
             
            require_once $app->getPath().DIRECTORY_SEPARATOR.$app->getType().DIRECTORY_SEPARATOR.'classes'.DIRECTORY_SEPARATOR.'wpfdTool.php';
            $wpfdTool = new wpfdTool;
            $wpfdTool->deleteAllData();
           
             WP_Filesystem_Base::rmdir(wpfdBase::getFilesPath(),true);

             delete_option('wpfd_version');
        }
}