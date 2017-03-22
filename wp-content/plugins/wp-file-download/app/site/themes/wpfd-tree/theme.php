<?php
/**
 * WP File Download
 *
 * @package WP File Download
 * @author Joomunited
 * @version 1.0.3
 */

use Joomunited\WPFramework\v1_0_0\Factory;
use Joomunited\WPFramework\v1_0_0\Application;
//-- No direct access
defined( 'ABSPATH' ) || die();

class wpfdThemeTree
{
    
    public $name = 'tree';
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
        wp_enqueue_script('wpfd-theme-tree', plugins_url( 'js/script.js' , __FILE__ ));
        wp_enqueue_script('wpfd-helper', plugins_url( 'assets/js/helper.js' , Application::getInstance('wpfd')->getPath().DIRECTORY_SEPARATOR.'site'.DIRECTORY_SEPARATOR.'foobar'));
        wp_localize_script('wpfd-theme-tree','wpfdTreeTheme',array('ajaxurl' => Application::getInstance('wpfd')->getAjaxUrl()));
        wp_enqueue_style('wpfd-theme-tree', plugins_url( 'css/style.css' , __FILE__ ));

        $content = '';
        $this->files = $this->options['files'];
        $this->category = $this->options['category'];
        $this->categories = $this->options['categories'];
        $this->params = $this->options['params']; 
        if(!empty($this->options['files']) || wpfdBase::loadValue($this->params,'tree_showsubcategories',1)==1){
            $style = '';
            if(wpfdBase::loadValue($this->params,'tree_showbgtitle',true)==false){
                $style  .= '.wpfd-content h2, #tree-wpfd-box h2 {border:none;background:none;}';
            }
            if(wpfdBase::loadValue($this->params,'tree_showtreeborder',true)==false){
                $style  .= '.wpfd-content-multi, .wpfd-content-tree-single .dropblock {border:none;-webkit-box-shadow:none;-moz-box-shadow:none,-box-shadow}';
            }
            wp_add_inline_style('wpfd-theme-tree',$style);

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
        wp_enqueue_script('wpfd-theme-tree', plugins_url( 'js/script.js' , __FILE__ ));
        wp_localize_script('wpfd-theme-tree','wpfdTreeTheme',array('ajaxurl' => Application::getInstance('wpfd')->getAjaxUrl()));
        wp_enqueue_script('wpfd-helper', plugins_url( 'assets/js/helper.js' , Application::getInstance('wpfd')->getPath().DIRECTORY_SEPARATOR.'site'.DIRECTORY_SEPARATOR.'foobar'));
        wp_enqueue_style('wpfd-theme-tree', plugins_url( 'css/style.css' , __FILE__ ));
        
        $content = '';
        if(!empty($this->options['file'])){
            $this->file = $this->options['file'];
            $this->params = $this->options['params'];
            $this->file_params = $this->options['file_params'];
            ob_start();
            require dirname(__FILE__).DIRECTORY_SEPARATOR.'tplsingle.php';
            $content = ob_get_contents();
            ob_end_clean();
        }
        return $content;
    }
        
}
