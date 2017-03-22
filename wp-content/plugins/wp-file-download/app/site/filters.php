<?php
/**
 * WP File Download
 *
 * @package WP File Download
 * @author Joomunited
 * @version 1.0
 */

use Joomunited\WPFramework\v1_0_0\Filter;
use Joomunited\WPFramework\v1_0_0\Utilities;
use Joomunited\WPFramework\v1_0_0\Model;
use Joomunited\WPFramework\v1_0_0\Factory;
use Joomunited\WPFramework\v1_0_0\Application;
defined( 'ABSPATH' ) || die();

class wpfdFilter extends Filter {

    public function load(){
        add_filter('the_content', array($this,'wpfd_replace'));
        add_filter('template_include', array($this, 'include_template'), 99 );
    }



    function include_template( $template_path ) {

        if ( get_post_type() == 'wpfd_file' ) {
            if ( is_archive() ) {
                if ( $theme_file = locate_template( array ( 'archive-wpfd-category.php' ) ) ) {
                    $template_path = $theme_file;
                } else {
                    $template_path = plugin_dir_path( WPFD_PLUGIN_FILE ) . 'app/site/themes/archive-wpfd-category.php';
                }
            }
        }else {
            //empty category 
            $wpfd_category = Utilities::getInput('wpfd-category','GET','none');
            if(!empty($wpfd_category) ) {
                if ( $theme_file = locate_template( array ( 'empty-wpfd-category.php' ) ) ) {
                    $template_path = $theme_file;
                } else {
                    $template_path = plugin_dir_path( WPFD_PLUGIN_FILE ) . 'app/site/themes/empty-wpfd-category.php';
                }
            }
         
        }

        return $template_path;
    }

    public function wpfd_replace($content){
        $content = preg_replace_callback('@<img.*?data\-wpfdcategory="([0-9]+)".*?/>@', array($this,'replace'), $content);

        //Replace single file
        $content = preg_replace_callback('@<img.*?data\-wpfdfile="([0-9]+)".*?/>@', array($this,'replaceSingle'), $content);

        return $content;
    }

    private function replace($match){
        return $this->callTheme('category', $match[1]);
    }

    private function replaceSingle($match){
        return $this->callTheme('file', $match[1]);
    }

    private function callTheme($type,$param){
        global $wpdb;
        $app = Application::getInstance('wpfd') ;
        require_once $app->getPath().DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'classes'.DIRECTORY_SEPARATOR.'wpfdBase.php';
        $modelConfig = Model::getInstance('config');
        $global_settings = $modelConfig->getGlobalConfig();

        if($type=='category'){
            $modelCategory = Model::getInstance('category');
            $category = $modelCategory->getCategory($param);
            $themename = $category->params['theme'];

            if($category->access==1) {
                $user = wp_get_current_user();
                $roles = array();
                foreach($user->roles as $role){
                    $roles[] = strtolower($role);
                }
                $allows = array_intersect($roles, $category->roles);
                if(empty($allows))   return '';
            }

//            if ($global_settings['catparameters'] == '0') {
//                $params = $modelConfig->getConfig($themename);
//            } else {
                $params = $category->params ;
//            }
        }else {
            $themename ='default';
            $params = $modelConfig->getConfig(); 
        }
        $themefile = dirname(__FILE__).DIRECTORY_SEPARATOR.'themes'.DIRECTORY_SEPARATOR.'wpfd-'.strtolower($themename).DIRECTORY_SEPARATOR.'theme.php';
        if(file_exists($themefile)){
            include_once $themefile;
        }
        $class = 'wpfdTheme'.ucfirst($themename);
        $theme = new $class();

        if($type=='category'){
            $modelFiles = Model::getInstance('files');
            $modelCategories = Model::getInstance('categories');
            $modelCategory = Model::getInstance('category');

            $category = $modelCategory->getCategory($param);
            $ordering = Utilities::getInput('orderCol','GET','none') != null ? Utilities::getInput('orderCol','GET','none') : $category->ordering;
            $orderingdir = Utilities::getInput('orderDir','GET','none') != null ? Utilities::getInput('orderDir','GET','none') : $category->orderingdir;

            $files = $modelFiles->getFiles($param, $ordering, $orderingdir);
            $categories = $modelCategories->getCategories($param);

            $options =  array('files' => $files,'category'=>$category,'categories'=>$categories,'params'=>$params);
            
            return $theme->showCategory($options);
        }elseif($type=='file'){
            $modelFile = Model::getInstance('file');
            $file = $modelFile->getFile($param);
            $file_params = $modelConfig->getFileConfig();
            $options =  array('file' => $file,'params'=>$params, 'file_params' => $file_params);
            
            return $theme->showFile($options);
        }
        return '';
    }
}