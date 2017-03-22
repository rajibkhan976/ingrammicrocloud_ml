<?php
/**
 * WP File Download
 *
 * @package WP File Download
 * @author Joomunited
 * @version 1.0
 */

use Joomunited\WPFramework\v1_0_0\Controller;
use Joomunited\WPFramework\v1_0_0\Utilities;

defined( 'ABSPATH' ) || die();

class wpfdControllerFiles extends Controller {
    
    private $allowed_ext = array('jpg','jpeg','png','gif','pdf','doc','docx','xls','xlsx','zip','tar','rar','odt','ppt','pps','txt');
    
    public function upload(){
        $id_category = Utilities::getInt('id_category','POST');        
        if($id_category<=0){
            $this->exit_status(__('Wrong Category','wpfd'));
        }
        //todo: vérifier les erreurs de création de fichier
        $file_dir = wpfdBase::getFilesPath($id_category);
        if(!file_exists($file_dir)){
            mkdir($file_dir,0777,true);
            $data = '<html><body bgcolor="#FFFFFF"></body></html>';
            $file = fopen($file_dir.'index.html', 'w');
            fwrite($file, $data);
            fclose($file);
            $data = 'deny from all';
            $file = fopen($file_dir.'.htaccess', 'w');
            fwrite($file, $data);
            fclose($file);
        }

        if(strtolower($_SERVER['REQUEST_METHOD']) != 'post'){            
            $this->exit_status(__('Wrong http response','wpfd'));
        }

        $configModel = $this->getModel('config');
        $allowed = $configModel->getAllowedExt();
        if(!empty($allowed)){
            $this->allowed_ext = $allowed;
        }
        
        if(array_key_exists('pic',$_FILES) && $_FILES['pic']['error'] == 0 ){
                $pic = $_FILES['pic'];
                $ext = strtolower(pathinfo($pic['name'], PATHINFO_EXTENSION));
                if(!in_array($ext,$this->allowed_ext)){
                    $this->exit_status(__('Wrong file extension','wpfd'),array('allowed '=> $this->allowed_ext));
                }

                $newname = uniqid().'.'.$ext;
                if(!move_uploaded_file($pic['tmp_name'], $file_dir.$newname)){
                    $this->exit_status(__('Cant move uploaded file','wpfd'));
                }
                chmod($file_dir.$newname, 0777);
                
                //Insert new image into databse
                $model = $this->getModel();
                $id_file = $model->addFile(array(
                    'title' => strtolower(pathinfo($pic['name'], PATHINFO_FILENAME)),
                    'id_category' => (int)$id_category,
                    'file' => $newname,
                    'ext' => $ext,
                    'size' => filesize($file_dir.$newname)
                    ));
                if(!$id_file){
                    unlink($file_dir.$newname);
                    $this->exit_status(__('Cant save to database','wpfd'));
                }
                $this->exit_status(true,array('id_file'=>$id_file,'name'=>$newname));
        }
        $this->exit_status(__('Error while uploading')); //todo : translate
    }
    
    /**
     * Reorder category
     */
    public function reorder(){
        $files = Utilities::getInput('order','GET','string');
        
        $files = json_decode(stripslashes_deep($files));
        $model = $this->getModel();
        if($model->reorder($files)){
                $return = true;
        }else{
            $return = false;
        }
        $return = json_encode($return);
        $this->exit_status($return);
    }

    
    public function version(){
        $id_file = Utilities::getInt('id_file','POST');
        if($id_file<=0){
            $this->exit_status(__('Wrong file','wpfd'));
        }

        if(strtolower($_SERVER['REQUEST_METHOD']) != 'post'){
            $this->exit_status(__('Wrong http response','wpfd'));
        }

        if(array_key_exists('pic',$_FILES) && $_FILES['pic']['error'] == 0 ){
                $pic = $_FILES['pic'];
                $ext = strtolower(pathinfo($pic['name'], PATHINFO_EXTENSION));
                if(!in_array(strtolower($ext),$this->allowed_ext)){
                    $this->exit_status(__('Wrong file extension','wpfd'),array('allowed '=> $this->allowed_ext));
                }

                $model=$this->getModel('file');
                $file = $model->getFile($id_file);
                if(file_exists(wpfdBase::getFilesPath($file['catid']).$file['file'])){
                    unlink(wpfdBase::getFilesPath($file['catid']).$file['file']);
                }
                $newname = uniqid().'.'.strtolower($ext);
                if(!move_uploaded_file($pic['tmp_name'], wpfdBase::getFilesPath($file['catid']).$newname)){
                    $this->exit_status(__('Cant move uploaded file','wpfd'));
                }
                chmod(wpfdBase::getFilesPath($file['catid']).$newname, 0777);
                $id_file = $model->updateFile($id_file,array(
                    'title' => strtolower(pathinfo($pic['name'], PATHINFO_FILENAME)),
                    'file' => $newname,
                    'ext' => $ext,
                    'size' => filesize(wpfdBase::getFilesPath($file['catid']).$newname)
                ));
               
                if(!$id_file){
                    unlink(wpfdBase::getFilesPath($file['catid']).$newname);
                    $this->exit_status(__('Cant save to database','wpfd'));
                }

                $this->exit_status(true,array('id_file'=>$id_file,'name'=>$newname));
        }
    }

    public function import(){

        if(!is_admin()){
            $this->exit_status(__('You don\'t have the sufficient permissions', 'wpfd'));
        }
        $id_category = Utilities::getInt('id_category');

        if($id_category<=0){
            $this->exit_status(__('Category not found', 'wpfd'));
        }


        $modelCat = $this->getModel('category');
        $category = $modelCat->getCategory($id_category);


        $file_dir = wpfdBase::getFilesPath($id_category);
        if(!file_exists($file_dir)){
            if(!file_exists($file_dir)){
                mkdir($file_dir,0777,true);
                $data = '<html><body bgcolor="#FFFFFF"></body></html>';
                $file = fopen($file_dir.'index.html', 'w');
                fwrite($file, $data);
                fclose($file);
                $data = 'deny from all';
                $file = fopen($file_dir.'.htaccess', 'w');
                fwrite($file, $data);
                fclose($file);
            }
        }

        $files = Utilities::getInput('files','GET', 'none');

        if(!empty($files)){
            $count = 0;

            $configModel = $this->getModel('config');
            $allowed = $configModel->getAllowedExt();
            if(!empty($allowed)){
                $this->allowed_ext = $allowed;
            }

            foreach ($files as $file) {
                $file = get_home_path() . $file;

                if(!in_array(wpfd_getext($file),$this->allowed_ext)){
                    $this->exit_status(__('Wrong file extension','wpfd'),array('allowed '=> $this->allowed_ext));
                }

                $newname = uniqid().'.'.strtolower(wpfd_getext($file));

                if(!copy($file, $file_dir.$newname)){
                    $this->exit_status(__('Cant move uploaded file','wpfd'));
                }
                chmod($file_dir.$newname, 0777);
                //Insert new image into databse
                $model = $this->getModel();
                $id_file = $model->addFile(array(
                    'title' => preg_replace('#\.[^.]*$#', '', basename($file)),
                    'id_category' => $id_category,
                    'file' => $newname,
                    'ext' => strtolower(wpfd_getext($file)),
                    'size' => filesize($file_dir.$newname)
                ));

                if(!$id_file){
                    unlink($file_dir.$newname);
                    $this->exit_status(__('Cannot save file to DB'));
                }

                $count++;
            }
            $this->exit_status(true,array('nb'=>$count));
        }

        $this->exit_status(__('Error while importing', 'wpfd'));
    }

}

?>
