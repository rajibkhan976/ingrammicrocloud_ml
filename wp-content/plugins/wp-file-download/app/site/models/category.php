<?php
/**
 * WP File Download
 *
 * @package WP File Download
 * @author Joomunited
 * @version 1.0
 */

use Joomunited\WPFramework\v1_0_0\Model;

defined( 'ABSPATH' ) || die();

class wpfdModelCategory extends Model {


    public function getCategory($id){

        $result = get_term($id,'wpfd-category');

        $modelConfig =  $this->getInstance('Config');
        $main_config = $modelConfig->getGlobalConfig();

        if(!empty($result)){
            $term_meta = get_option( "taxonomy_$id" );
            //$result->params = isset($term_meta['params'])? $term_meta['params']: array();
            if ($result->description == 'null' || $result->description == '') {
                $result->params = array();
            } else {
                $result->params = json_decode($result->description,true);
            }

            if(!isset($result->params['theme'])) {
                $result->params['theme'] = $main_config['defaultthemepercategory'];
            }

            $ordering = isset($result->params['ordering'])? $result->params['ordering']: 'title';
            $orderingdir = isset($result->params['orderingdir'])? $result->params['orderingdir']: 'desc';

            if ($main_config['catparameters'] == '0') {
                $result->params = $modelConfig->getConfig($main_config['defaultthemepercategory']);
                $result->params['theme'] = $main_config['defaultthemepercategory'];
            }

            $result->roles =  isset($term_meta['roles'])? (array)$term_meta['roles']: array();
            $result->access=  isset($term_meta['access'])? (int)$term_meta['access']: 0;
            $result->ordering =  $ordering;
            $result->orderingdir =  $orderingdir;
        }

        return $result;
    }

}