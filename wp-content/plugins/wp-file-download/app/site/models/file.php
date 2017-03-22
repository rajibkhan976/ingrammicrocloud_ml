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

class WpfdModelFile extends Model
{       
    
    function getFile($id_file){

        $modelConfig = $this->getInstance('config');
        $params = $modelConfig->getGlobalConfig();


        $user = wp_get_current_user();
        $roles = array();
        foreach($user->roles as $role){
            $roles[] = strtolower($role);
        }
      
        $row = get_post($id_file,OBJECT);          
        if($row==false){ 
            return false;
        }
      
        $row->title = $row->post_title;
        $row->description = $row->post_excerpt;

        $row->created = mysql2date(wpfdBase::loadValue($params, 'date_format', get_option('date_format')), $row->post_date);
        $row->modified = mysql2date(wpfdBase::loadValue($params, 'date_format', get_option('date_format')), $row->post_modified);
                
        $metadata = get_post_meta($id_file,'_wpfd_file_metadata',true) ;
        if(count($metadata) ) {
            foreach ($metadata as $key => $value) {
                $row->$key = $value;
            }
        }
        
        $term_list = wp_get_post_terms($id_file, 'wpfd-category', array("fields" => "ids"));        
        if( !is_wp_error($term_list) ) {
            $row->catid= $term_list[0];
        }else {
            $row->catid= 0;
        }
        
        return $row;
    }
    
    function getFullFile($id_file){

        $modelConfig = $this->getInstance('config');
        $params = $modelConfig->getGlobalConfig();

        //$user = wp_get_current_user();
        //$roles = array();
        //foreach($user->roles as $role){
        //    $roles[] = strtolower($role);
        //}

        $row = get_post($id_file,OBJECT);               
        if($row===false){
            return false;
        }
        $row->title = $row->post_title;
        $row->description = $row->post_excerpt;
        $row->created = mysql2date(wpfdBase::loadValue($params, 'date_format', get_option('date_format')), $row->post_date);
        $row->modified = mysql2date(wpfdBase::loadValue($params, 'date_format', get_option('date_format')), $row->post_modified);
        $metadata = get_post_meta($id_file,'_wpfd_file_metadata',true) ;
        if(count($metadata) ) {
            foreach ($metadata as $key => $value) {
                $row->$key = $value;
            }
        }
        
        $term_list = wp_get_post_terms($id_file, 'wpfd-category', array("fields" => "ids"));        
        if( !is_wp_error($term_list) ) {
            $row->catid= $term_list[0];
        }else {
            $row->catid= 0;
        }
        
        return $row;
        
    }
    
    public function hit($id_file){
        
        $metadata = get_post_meta($id_file,'_wpfd_file_metadata',true) ;   
        $hits = (int)$metadata['hits'];
        $metadata['hits'] = $hits+1;          
        update_post_meta( $id_file, '_wpfd_file_metadata', $metadata );
        return true;
    }

}