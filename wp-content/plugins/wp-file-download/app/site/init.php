<?php
/**
 * WP File Download
 *
 * @package WP File Download
 * @author Joomunited
 * @version 1.0
 */

use Joomunited\WPFramework\v1_0_0\Application;
use Joomunited\WPFramework\v1_0_0\Model;
use Joomunited\WPFramework\v1_0_0\Utilities;
defined( 'ABSPATH' ) || die();

$app = Application::getInstance('wpfd');
//load_plugin_textdomain( strtolower($app->getName()), null,$app->getPath(true).DIRECTORY_SEPARATOR.'languages');
load_plugin_textdomain( 'wpfd', null, dirname( plugin_basename( WPFD_PLUGIN_FILE ) ).DIRECTORY_SEPARATOR. 'app' .DIRECTORY_SEPARATOR.'languages');

add_action('wp_ajax_nopriv_wpfd', 'wpfd_ajax');
add_action('wp_ajax_wpfd', 'wpfd_ajax' );
add_action( 'init', 'wpfd_register_post_type' );
add_filter('woocommerce_prevent_admin_access', 'wpfd_disable_woo_login', 10, 1);

function wpfd_ajax(){
    $application = Application::getInstance('wpfd');
    require_once $application->getPath().DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'classes'.DIRECTORY_SEPARATOR.'wpfdBase.php';
    $application->execute('file.download');
}



function wpfd_register_post_type() {
    $labels = array(
        'label' => __( 'WP File Download' ),
        'rewrite' => array( 'slug' => 'wp-file-download' ),
        'menu_name'         => __( 'WP File Download' ),
        'hierarchical' => true,
        'show_in_nav_menus' => true,
        'show_ui' => false
    );

  register_taxonomy('wpfd-category', 'wpfd_file',$labels);
  
  register_post_type( 'wpfd_file',
    array(
      'labels' => array(
        'name' => __( 'Files','wpfd' ),
        'singular_name' => __( 'File','wpfd' )
      ),
      'public' => true,
      'taxonomies' => array('wpfd-category'),
      'has_archive' => false,
    )
  );
}

function wpfd_disable_woo_login($bool) {
    return false;
}

function wpfd_detail_category() {

    $term = get_queried_object();
    if ($term->taxonomy != 'wpfd-category' ) return;

    $application = Application::getInstance('wpfd');
    require_once $application->getPath().DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'classes'.DIRECTORY_SEPARATOR.'wpfdBase.php';

    $modelFiles = Model::getInstance('files');
    $modelCategories = Model::getInstance('categories');
    $modelCategory = Model::getInstance('category');

    $category = $modelCategory->getCategory($term->term_id);

    $ordering = Utilities::getInput('orderCol','GET','none') != null ? Utilities::getInput('orderCol','GET','none') : $category->ordering;
    $orderingdir = Utilities::getInput('orderDir','GET','none') != null ? Utilities::getInput('orderDir','GET','none') : $category->orderingdir;

    $files = $modelFiles->getFiles($term->term_id, $ordering, $orderingdir);
    $categories = $modelCategories->getCategories($term->term_id);

    $themename = $category->params['theme'];
    $params = $category->params ;


    $themefile = dirname(__FILE__).DIRECTORY_SEPARATOR.'themes'.DIRECTORY_SEPARATOR.'wpfd-'.strtolower($themename).DIRECTORY_SEPARATOR.'theme.php';
    if(file_exists($themefile)){
        include_once $themefile;
    }

    $class = 'wpfdTheme'.ucfirst($themename);
    $theme = new $class();

    $options =  array('files' => $files,'category'=>$category,'categories'=>$categories,'params'=>$params);

    echo $theme->showCategory($options);
}