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

class wpfdViewFiles extends View {

    public function render($tpl = null) {

        $id_category = Utilities::getInt('id');

        $modelFiles = $this->getModel('files');
        $modelCat = $this->getModel('category');
        $category = $modelCat->getCategory($id_category);
        $ordering = Utilities::getInput('orderCol','GET','none') != null ? Utilities::getInput('orderCol','GET','none') : $category->ordering;
        $orderingdir = Utilities::getInput('orderDir','GET','none') != null ? Utilities::getInput('orderDir','GET','none') : $category->orderingdir;

        $content = new stdClass();
        $content->files = $modelFiles->getFiles($id_category, $ordering, $orderingdir);
        $content->category = $category;

        echo json_encode($content);
        die();
    }
}