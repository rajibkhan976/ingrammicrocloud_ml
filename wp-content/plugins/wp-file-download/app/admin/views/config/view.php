<?php
/**
 * WP File Download
 *
 * @package WP File Download
 * @author Joomunited
 * @version 1.0
 */

use Joomunited\WPFramework\v1_0_0\View;
use Joomunited\WPFramework\v1_0_0\Factory;
use Joomunited\WPFramework\v1_0_0\Form;
use Joomunited\WPFramework\v1_0_0\Application;
defined( 'ABSPATH' ) || die();

class wpfdViewConfig extends View {
    public function render($tpl = null) {
        $modelConf = $this->getModel('config');
        $this->theme = $modelConf->getThemeConfig();
        if($this->theme==''){
            $this->theme = 'default';
        }
        $this->config = $modelConf->getConfig();
        $this->file_config = $modelConf->getFileConfig();
        $this->themes = $modelConf->getThemes();
        
        $form = new Form();
        foreach ($this->themes as $themName) {
            $formfile = Application::getInstance('wpfd')->getPath().DIRECTORY_SEPARATOR. 'site'.DIRECTORY_SEPARATOR.'themes'.DIRECTORY_SEPARATOR.'wpfd-'.$themName.DIRECTORY_SEPARATOR.'form.xml';
            $themeConfig = $modelConf->getThemeParams($themName);
            if($form->load($formfile, $themeConfig)){
                $this->themeforms[$themName] = $form->render();
            }else {
                $this->themeforms[$themName] = '';
            }
        }
        
        $form = new Form();
        if($form->load('config',$this->config)){
            $this->configform = $form->render();
        }

        $file_form = new Form();
        if($file_form->load('file_config', $this->file_config)){
            $this->file_configform = $file_form->render();
        }
        parent::render($tpl);
    }
}