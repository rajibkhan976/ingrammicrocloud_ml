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

defined( 'ABSPATH' ) || die();

class wpfdViewFile extends View {
    public function render($tpl = null) {


        $model = $this->getModel('file');
        $file = $model->getfile(Utilities::getInt('id'));
        if (!$file) {
            return json_encode(new stdClass());
        }

        //fix : access check

        $content = new stdClass();
        $content->file = $file;

        echo json_encode($content);
        exit();

    }
}