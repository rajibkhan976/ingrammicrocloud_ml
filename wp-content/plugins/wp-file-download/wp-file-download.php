<?php
/*
Plugin Name: WP File Download
Plugin URI: http://www.joomunited.com/wordpress-products/wp-file-download
Description: WP File Download, a new way to manage files in WordPress
Author: Joomunited
Version: 2.2.0
Author URI: http://www.joomunited.com
*/

use Joomunited\WPFramework\v1_0_0\Application;

//Check if the framework is installed
$frameworkInstalled = false;
if(function_exists('juLibrariesCheck')){
    $frameworkInstalled = juLibrariesCheck('1.0.0');
}else{    
    if(!file_exists(WPMU_PLUGIN_DIR)){
	wp_mkdir_p(WPMU_PLUGIN_DIR);
    }
    copy(dirname(__FILE__).DIRECTORY_SEPARATOR.'framework'.DIRECTORY_SEPARATOR.'ju-libraries.php', WPMU_PLUGIN_DIR.DIRECTORY_SEPARATOR.'ju-libraries.php');
    $content = file_get_contents(WPMU_PLUGIN_DIR.DIRECTORY_SEPARATOR.'ju-libraries.php');
    $content = str_replace('JUPlugin Name', 'Plugin Name',$content,$count);
    if($count){
	file_put_contents(WPMU_PLUGIN_DIR.DIRECTORY_SEPARATOR.'ju-libraries.php', $content);
    }
}
if(!$frameworkInstalled){
    require_once(ABSPATH . 'wp-admin/includes/file.php');
    WP_Filesystem();
    if(!file_exists(WPMU_PLUGIN_DIR.DIRECTORY_SEPARATOR.'ju-libraries'.DIRECTORY_SEPARATOR.'WPFramework'.DIRECTORY_SEPARATOR.'v1_0_0')){
	wp_mkdir_p(WPMU_PLUGIN_DIR.DIRECTORY_SEPARATOR.'ju-libraries'.DIRECTORY_SEPARATOR.'WPFramework'.DIRECTORY_SEPARATOR.'v1_0_0');
    }
    copy_dir(dirname(__FILE__).DIRECTORY_SEPARATOR.'framework'.DIRECTORY_SEPARATOR.'ju-libraries'.DIRECTORY_SEPARATOR.'WPFramework'.DIRECTORY_SEPARATOR.'v1_0_0', WPMU_PLUGIN_DIR.DIRECTORY_SEPARATOR.'ju-libraries'.DIRECTORY_SEPARATOR.'WPFramework'.DIRECTORY_SEPARATOR.'v1_0_0'.DIRECTORY_SEPARATOR);
    include_once(WPMU_PLUGIN_DIR.DIRECTORY_SEPARATOR.'ju-libraries.php');
}

if(!defined('WPFD_PLUGIN_FILE')) {
    define('WPFD_PLUGIN_FILE',__FILE__);
}
define( 'WPFD_VERSION', '2.2.0' );
// Prohibit direct script loading
defined( 'ABSPATH' ) || die( 'No direct script access allowed!' );

include_once('app'.DIRECTORY_SEPARATOR.'autoload.php');
include_once('app'.DIRECTORY_SEPARATOR.'install.php');
include_once('app'.DIRECTORY_SEPARATOR.'functions.php');

//Initialise the application        
$app = Application::getInstance('wpfd',__FILE__);
$app->init();

if(is_admin()) {
    //config section        
    if(!defined('JU_BASE')){
        define( 'JU_BASE', 'https://www.joomunited.com/' );
    }

    $remote_updateinfo =   JU_BASE.'juupdater_files/wp-file-download.json';
     //end config

    require 'juupdater/juupdater.php';
    $UpdateChecker = Jufactory::buildUpdateChecker(
           $remote_updateinfo,
            __FILE__
    );
}
