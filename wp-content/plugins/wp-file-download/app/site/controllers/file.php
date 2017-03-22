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

class wpfdControllerFile extends Controller {

    public function download(){
        $model = $this->getModel();
        $id = Utilities::getInt('id');
      
        $file = $model->getFullFile($id);
       
        $model->hit($id);
        
        //todo : verifier les droits d'acces à la catéorgie du fichier
        if(!empty($file) && $file->ID){
            $filename = preg_replace('/[^a-zA-Z0-9-_\.]/','', $file->title);
            if($filename==''){
                $filename = 'download';
            }
            $sysfile = wpfdBase::getFilesPath($file->catid).'/'.$file->file; 
            if(file_exists($sysfile)) {
		@ob_end_clean();
		ob_start();
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename='.basename($filename.'.'.$file->ext));
                header('Content-Transfer-Encoding: binary');
                header('Expires: 0');
                header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                header('Pragma: public');
                header('Content-Length: ' . filesize($sysfile));
                ob_clean();
                flush();
                readfile($sysfile);
            }
        }
        exit();
    }

}

?>