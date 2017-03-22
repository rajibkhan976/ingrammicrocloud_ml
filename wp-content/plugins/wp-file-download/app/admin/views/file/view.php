<?php
/**
 * WP File Download
 *
 * @package WP File Download
 * @author Joomunited
 * @version 1.0
 */

use Joomunited\WPFramework\v1_0_0\View;
use Joomunited\WPFramework\v1_0_0\Utilities;
use Joomunited\WPFramework\v1_0_0\Form;

defined( 'ABSPATH' ) || die();

class wpfdViewFile extends View {
    public function render($tpl = null) {
        $model = $this->getModel('file');
        $datas = $model->getfile(Utilities::getInt('id'));
        
        $form = new Form();
        if($form->load('file',$datas)){
            $this->form = $form->render('link');
        }
        parent::render($tpl);
    }
}