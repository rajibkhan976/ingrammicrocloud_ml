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

defined( 'ABSPATH' ) || die();

class wpfdControllerFile extends Controller {

    public function save(){
        $model = $this->getModel();

        $form = new Form();
        if(!$form->load('file')){
            $this->exit_status('error');
        }
        if(!$form->validate()){
            $this->exit_status('error validating');
        }
        $datas = $form->sanitize();
        $datas['id'] = Utilities::getInt('id');
        if(!$model->save($datas)){
            $this->exit_status('error saving');
        }
        $this->exit_status(true);
    }
    
    public function delete(){
        $id_file = Utilities::getInt('id_file');
        $model = $this->getModel();
        $file = $model->getFile($id_file);
        if(!empty($file)){
            if($model->delete($id_file)){
                $file_dir = wpfdBase::getFilesPath($file['catid']);
                if(file_exists($file_dir.$file['file'])){
                    unlink($file_dir.$file['file']);
                    $this->exit_status(true);
                }
            }
        }
        $this->exit_status('error while deleting');
    }
}

?>