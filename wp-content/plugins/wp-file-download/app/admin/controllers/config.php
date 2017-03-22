<?php
/**
 * WP File Download
 *
 * @package WP File Download
 * @author Joomunited
 * @version 1.0
 */

use Joomunited\WPFramework\v1_0_0\Controller;
use Joomunited\WPFramework\v1_0_0\Form;
use Joomunited\WPFramework\v1_0_0\Utilities;
use Joomunited\WPFramework\v1_0_0\Factory;
use Joomunited\WPFramework\v1_0_0\Application;
defined( 'ABSPATH' ) || die();

class wpfdControllerConfig extends Controller {
    
    public function savetheme(){
        $model = $this->getModel();
        $themes = $model->getThemes();
        $theme = Utilities::getInput('selecttheme', 'POST');
        if(!in_array($theme, $themes)){
            $this->redirect('admin.php?page=wpfd-config&error=1');
        }
        if(!$model->savetheme($theme)){
            $this->redirect('admin.php?page=wpfd-config&error=2');
        }
        $this->redirect('admin.php?page=wpfd-config');
    }
    
    public function savethemeparams(){
        $model = $this->getModel();
        $theme = Utilities::getInput('theme', 'GET');
        if($theme==''){
            $theme = 'default';
        }
        $form = new Form();
        $formfile = Application::getInstance('wpfd')->getPath().DIRECTORY_SEPARATOR. 'site'.DIRECTORY_SEPARATOR.'themes'.DIRECTORY_SEPARATOR.'wpfd-'.$theme.DIRECTORY_SEPARATOR.'form.xml';
        if(!$form->load($formfile)){
            $this->redirect('admin.php?page=wpfd-config&error=1');
        }
        if(!$form->validate()){
            $this->redirect('admin.php?page=wpfd-config&error=2');
        }
        $datas = $form->sanitize(); 
        if(!$model->saveThemeParams($theme,$datas)){
            $this->redirect('admin.php?page=wpfd-config&error=3');
        }
        $this->redirect('admin.php?page=wpfd-config');
    }

    public function savetfileparams(){
        $model = $this->getModel();

        $form = new Form();
        $formfile = Application::getInstance('wpfd')->getPath().DIRECTORY_SEPARATOR. 'admin'.DIRECTORY_SEPARATOR.'forms'.DIRECTORY_SEPARATOR.'file_config.xml';
        if(!$form->load($formfile)){
            $this->redirect('admin.php?page=wpfd-config&error=1');
        }
        if(!$form->validate()){
            $this->redirect('admin.php?page=wpfd-config&error=2');
        }
        $datas = $form->sanitize();
        if(!$model->saveFileParams($datas)){
            $this->redirect('admin.php?page=wpfd-config&error=3');
        }
        $this->redirect('admin.php?page=wpfd-config');
    }

    public function saveconfig(){
        $model = $this->getModel();

        $form = new Form();
        if(!$form->load('config')){
            $this->redirect('admin.php?page=wpfd-config&error=1');
        }
        if(!$form->validate()){
            $this->redirect('admin.php?page=wpfd-config&error=2');
        }
        $datas = $form->sanitize();
        if(!$model->save($datas)){
            $this->redirect('admin.php?page=wpfd-config&error=3');
        }
        $this->redirect('admin.php?page=wpfd-config');
    }
    
    
}

?>
