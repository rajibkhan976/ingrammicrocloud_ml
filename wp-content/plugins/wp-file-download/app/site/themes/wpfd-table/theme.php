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

class wpfdThemeTable
{
    
    public $name = 'table';
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
        if(wpfdBase::loadValue($this->options['params'],'table_showfoldertree',0)==1) {        
        wp_enqueue_style('wpfd-material-design', plugins_url( 'app/site/assets/css/material-design-iconic-font.min.css' , WPFD_PLUGIN_FILE ),array(),WPFD_VERSION);
        wp_enqueue_script('wpfd-foldertree', plugins_url( 'app/site/assets/js/jaofiletree.js' , WPFD_PLUGIN_FILE ),array(),WPFD_VERSION);
        wp_enqueue_style('wpfd-foldertree', plugins_url( 'app/site/assets/css/jaofiletree.css' , WPFD_PLUGIN_FILE ),array(),WPFD_VERSION);
        }
        wp_enqueue_script('wpfd-theme-table', plugins_url( 'js/script.js' , __FILE__ ),array(),WPFD_VERSION);
        wp_enqueue_script('wpfd-theme-table-mediatable', plugins_url( 'js/jquery.mediaTable.js' , __FILE__ ));
        wp_enqueue_script('wpfd-helper', plugins_url( 'assets/js/helper.js' , Application::getInstance('wpfd')->getPath().DIRECTORY_SEPARATOR.'site'.DIRECTORY_SEPARATOR.'foobar'));
        wp_localize_script('wpfd-theme-table','wpfdTableTheme',array('ajaxurl' => Application::getInstance('wpfd')->getAjaxUrl(),'columns'=>__('Columns','wpfd')));
        wp_enqueue_style('wpfd-theme-table', plugins_url( 'css/style.css' , __FILE__ ),array(),WPFD_VERSION);
        wp_enqueue_style('wpfd-theme-table-mediatable', plugins_url( 'css/jquery.mediaTable.css' , __FILE__ ));

        $content = '';
        $this->files = $this->options['files'];
        $this->category = $this->options['category'];
        $this->categories = $this->options['categories'];
        $this->params = $this->options['params'];
        if(!empty($this->options['files']) || wpfdBase::loadValue($this->params,'table_showsubcategories',1)==1){
            $this->tableclass = '';
            $this->wpfdclass = '';
            if(wpfdBase::loadValue($this->params,'table_styling',true)){
                $this->tableclass .= 'table table-bordered ';
                if(wpfdBase::loadValue($this->params,'table_styling',true)){
                    $this->tableclass .= 'table-striped';
                }
            }
            if(wpfdBase::loadValue($this->params,'table_stylingmenu',true)){
                $this->wpfdclass .= 'colstyle';
            }

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
        wp_localize_script('wpfd-theme-tree','wpfdTableTheme',array('ajaxurl' => Application::getInstance('wpfd')->getAjaxUrl(),'columns'=>__('Columns','wpfd')));
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
