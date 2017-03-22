<?php
/**
 * WP File Download
 *
 * @package WP File Download
 * @author Joomunited
 * @version 1.0
 */

use Joomunited\WPFramework\v1_0_0\Factory;
use Joomunited\WPFramework\v1_0_0\Application;
//-- No direct access
defined( 'ABSPATH' ) || die();

class wpfdThemeDefault
{
    
    public $name = 'default';
    protected $options;

    public function getThemeName(){
        return $this->name;
    }
    
    public function showCategory($options){
        if(empty($options['files']) && empty($options['categories'])){
            return '';
        }
        $this->options = $options;
        wp_enqueue_script('jquery');
        wp_enqueue_script('handlebars', plugins_url( 'js/handlebars-1.0.0-rc.3.js' , __FILE__ ));
        wp_enqueue_style('wpfd-material-design', plugins_url( 'app/site/assets/css/material-design-iconic-font.min.css' , WPFD_PLUGIN_FILE ),array(),WPFD_VERSION);
        wp_enqueue_script('wpfd-foldertree', plugins_url( 'app/site/assets/js/jaofiletree.js' , WPFD_PLUGIN_FILE ),array(),WPFD_VERSION);
        wp_enqueue_style('wpfd-foldertree', plugins_url( 'app/site/assets/css/jaofiletree.css' , WPFD_PLUGIN_FILE ),array(),WPFD_VERSION);
        wp_enqueue_script('wpfd-theme-default', plugins_url( 'js/script.js' , __FILE__ ),array(),WPFD_VERSION);
        wp_localize_script('wpfd-theme-default','wpfdparams',array('ajaxurl' => Application::getInstance('wpfd')->getAjaxUrl()));
        wp_enqueue_style('wpfd-theme-default', plugins_url( 'style.css' , __FILE__ ),array(),WPFD_VERSION);


        $content = '';
        $this->files = $this->options['files'];
        $this->category = $this->options['category'];
        $this->categories = $this->options['categories'];
        $this->params = $this->options['params'];
        if(!empty($this->options['files']) || wpfdBase::loadValue($this->params,'showsubcategories',1)==1){
            $this->style  = 'margin : '.wpfdBase::loadValue($this->params,'margintop',5).'px '.wpfdBase::loadValue($this->params,'marginright',5).'px '.wpfdBase::loadValue($this->params,'marginbottom',5).'px '.wpfdBase::loadValue($this->params,'marginleft',5).'px;';

            ob_start();
            require dirname(__FILE__).DIRECTORY_SEPARATOR.'tpl.php';
            $content = ob_get_contents();
            ob_end_clean();
        }
        return $content;
    }    

    public function showFile($options){
        $this->options = $options;
        wp_enqueue_script('jquery');
        wp_enqueue_script('handlebars', plugins_url( 'js/handlebars-1.0.0-rc.3.js' , __FILE__ ));
        wp_enqueue_style('wpfd-theme-default', plugins_url( 'style.css' , __FILE__ ));
        
        $content = '';
        if(!empty($this->options['file'])){
            $this->file = $this->options['file'];
            $this->params = $this->options['params'];
            $this->file_params = $this->options['file_params'];

            $this->style  = 'margin : '.wpfdBase::loadValue($this->params,'margintop',5).'px '.wpfdBase::loadValue($this->params,'marginright',5).'px '.wpfdBase::loadValue($this->params,'marginbottom',5).'px '.wpfdBase::loadValue($this->params,'marginleft',5).'px;';
            
            
            ob_start();
            require dirname(__FILE__).DIRECTORY_SEPARATOR.'tplsingle.php';
            $content = ob_get_contents();
            ob_end_clean();
        }
        return $content;
    }
    
//    /*
//     * Load the form fields for the plugin
//     */
//    public function getConfigForm($theme,&$form){
//        if($theme!='' && $theme!= $this->name){
//            return null;
//        }
//        $formfile = dirname(__FILE__).'/form.xml';
//        $form->loadFile($formfile);
//        return ;
//    }


    
}
