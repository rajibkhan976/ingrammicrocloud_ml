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

class WpfdModelFiles extends Model{       
    
	function getFiles($category, $ordering = 'menu_order', $ordering_dir = 'ASC'){

        $modelConfig = $this->getInstance('config');

        $params = $modelConfig->getGlobalConfig();

        $user = wp_get_current_user();
        $roles = array();
        foreach($user->roles as $role){
            $roles[] = strtolower($role);
        }

        $args = array(
            'posts_per_page' => -1,
            'post_type' => 'wpfd_file' ,
            'orderby' => $ordering,
            'order' => $ordering_dir,
            'tax_query' => array(
                array(
                 'taxonomy' => 'wpfd-category',
                 'terms' => (int)$category,
                 'include_children' => false
                )
            )
        );
        $results = get_posts( $args );
        $files =  array();
        foreach ($results as $result) {
            $metaData = get_post_meta($result->ID,'_wpfd_file_metadata',true);
            $result->ext = isset($metaData['ext'])? $metaData['ext']: '' ;
            $result->hits = isset($metaData['hits'])?(int)$metaData['hits']: 0 ;
            $result->version =  isset($metaData['version'])? $metaData['version']: '' ;
            $result->size =  isset($metaData['size'])?(int)$metaData['size']: 0 ;
            $result->created = mysql2date(wpfdBase::loadValue($params, 'date_format', get_option('date_format')), $result->post_date);
            $result->modified = mysql2date(wpfdBase::loadValue($params, 'date_format', get_option('date_format')), $result->post_modified);

            $files[] = $result;
        }

        $reverse = strtoupper($ordering_dir) == 'DESC' ? true : false;

        if ($ordering == 'size') {
            $files = wpfd_sort_by_property($files, 'ID', 'size', $reverse);
        } else if ($ordering == 'version') {
            $files = wpfd_sort_by_property($files, 'ID', 'version', $reverse);
        } else if ($ordering == 'hits') {
            $files = wpfd_sort_by_property($files, 'ID', 'hits', $reverse);
        } else if ($ordering == 'ext') {
            $files = wpfd_sort_by_property($files, 'ID', 'ext', $reverse);
        }


        return $files;
       // return  stripslashes_deep($result);

                        //a.created_time as created,
                       // a.modified_time as modified
                /*
                        access = 1 ';
                        if(!empty($roles)){
                            $query .= 'OR
                            (
                                access = 0 AND
                                r.role IN ('.  implode(',', $roles).')
                            )';
                        }
                        $query .= ')

                        ORDER BY a.ordering';
      */
        }

}