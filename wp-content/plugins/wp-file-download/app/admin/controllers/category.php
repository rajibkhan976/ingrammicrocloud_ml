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
use Joomunited\WPFramework\v1_0_0\Filesystem;

defined( 'ABSPATH' ) || die();

class wpfdControllerCategory extends Controller {
    
    public function addCategory(){
        $model = $this->getModel();        
        $id = $model->addCategory(__('New category','wpfd'));

        if($id){

            $user_id = get_current_user_id();

            if ($user_id) {

                $user_categories = get_user_meta($user_id, 'wpfd_user_categories', true);

                if (is_array($user_categories)) {
                    if (!in_array($id, $user_categories)) {
                        $user_categories[] = $id;
                    }
                } else {
                    $user_categories[] = $id;
                }

                update_user_meta($user_id, 'wpfd_user_categories', $user_categories);
            }

            $this->exit_status(true,array('id_category'=> $id ,'name'=>__('New category','wpfd')));
        }
        $this->exit_status('error while adding category'); //todo: translate
    }
    
    public function setTitle(){
        $model = $this->getModel();
        if($model->saveTitle(Utilities::getInt('id_category'),Utilities::getInput('title', 'GET', 'string'))){
            $this->exit_status(true);
        }
        $this->exit_status('error while saving title'); //todo: translate
    }

    public function saveparams(){
        $modelRoles = $this->getModel('roles');
        $params = Utilities::getInput('params','POST','none');
        $id = Utilities::getInput('id','GET','int');
        $roles = isset($params['roles']) ? $params['roles'] : array();
        if(!$modelRoles->save($id, $params['visibility'],$roles)){
            $this->exit_status(false,'error while saving');
        }
        
        $model = $this->getModel();
        if(!$model->saveParams($id,$params)) {
            $this->exit_status(false,'error while saving params');
        }
         
        $this->exit_status(true);
    }
        
    public function changeOrder() {
        $tree = $_POST['dto']; //var_dump($tree) ;
        $model = $this->getModel();
        if($model->changeOrder($tree)){
            $this->exit_status(true);
        }
        $this->exit_status('problem');                    
    }
    
    public function order() {
        if(Utilities::getInput('position')=='after'){
            $position = 'after';
        }else{
            $position = 'first-child';
        }
        $pk = Utilities::getInt('pk');
        $ref = Utilities::getInt('ref');
        if($ref==0){
            $ref=1;
        }
        $model = $this->getModel();
        if($model->move($pk,$ref,$position)){
            $this->exit_status(true,$pk.' '.$position.' '.$ref);
        }
        $this->exit_status('problem'); 
    }
    
    public function delete(){
        $category = Utilities::getInt('id_category');
        $model = $this->getModel();
        
        $children = $model->getChildren($category);
        
        if($model->delete($category)){
            $children[] = $category;
            foreach ($children as $child) {
                $dir = wpfdBase::getFilesPath($child);
                Filesystem::rmdir($dir);
                if($child==$category){
                    continue;
                }
                $model->delete($child);
            }
            $this->exit_status(true);
        }
        $this->exit_status('error while deletting category');
    }

    public function listdir(){

        if(!is_admin()){
            return json_encode(array());
        }

        $modelConfig = $this->getModel('config');
        $config = $modelConfig->getConfig();
        $allowed_ext = explode(',', $config['allowedext']);
        foreach ($allowed_ext as $key => $value) {
            $allowed_ext[$key] = strtolower(trim($allowed_ext[$key]));
            if($allowed_ext[$key]==''){
                unset($allowed_ext[$key]);
            }
        }

        $path = get_home_path(). DIRECTORY_SEPARATOR;

        $dir = Utilities::getInput('dir', 'GET', 'none');

        $return = $dirs = $fi = array();

        if( file_exists($path.$dir) ) {
            $files = scandir($path.$dir);

            natcasesort($files);
            if( count($files) > 2 ) {
                // All dirs
                foreach( $files as $file ) {

                    if( file_exists($path . $dir . DIRECTORY_SEPARATOR . $file) && $file != '.' && $file != '..' && is_dir($path . $dir. DIRECTORY_SEPARATOR . $file) ) {
                        $dirs[] = array('type'=>'dir','dir'=>$dir,'file'=>$file);
                    }elseif( file_exists($path . $dir . DIRECTORY_SEPARATOR . $file) && $file != '.' && $file != '..' && !is_dir($path . $dir . DIRECTORY_SEPARATOR . $file) && in_array(wpfd_getext($file), $allowed_ext) ) {
                        $fi[] = array('type'=>'file','dir'=>$dir,'file'=>$file,'ext'=>strtolower(wpfd_getext($file)));
                    }
                }

                $return = array_merge($dirs,$fi);
            }
        }
        echo json_encode( $return );
        wp_die();
    }

}

?>
