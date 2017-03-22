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

class wpfdModelFile extends Model {
    
    public function getFile($id_file){
        $row = get_post($id_file,ARRAY_A);               
        if($row===false){
            return false;
        }
        $row['title'] = $row['post_title'];
        $row['description'] = $row['post_excerpt'];
        $metadata = get_post_meta($id_file,'_wpfd_file_metadata',true) ;
        if(count($metadata) ) {
            foreach ($metadata as $key => $value) {
                $row[$key] = $value;
            }
        }
        
        $term_list = wp_get_post_terms($id_file, 'wpfd-category', array("fields" => "ids"));        
        if( !is_wp_error($term_list) ) {
            $row['catid']= $term_list[0];
        }else {
            $row['catid']= 0;
        }
        
        return stripslashes_deep($row);
    }

    public function save($datas){
        
        $my_post = array(
            'ID'           => $datas['id'],
            'post_title'   => $datas['title'],
            'post_modified' => date('Y-m-d H:i:s'),
            'post_excerpt' => $datas['description']
        );

      // Update the post into the database
        wp_update_post( $my_post );
        
        $metadata = get_post_meta($datas['id'],'_wpfd_file_metadata',true)    ;
        if(!empty($datas['hits'])) {
            $metadata['hits'] = $datas['hits'];
        }
        $metadata['version'] = $datas['version'];                    
        update_post_meta( $datas['id'], '_wpfd_file_metadata', $metadata );
                          
        return true;
    }
    
    public function updateFile($id,$datas) {
          $my_post = array(
            'ID'           => $id,
            'post_title'   => $datas['title'],
            'post_modified' => date('Y-m-d H:i:s')            
        );

      // Update the post into the database
        wp_update_post( $my_post );
        
        $metadata = get_post_meta($id,'_wpfd_file_metadata',true)    ; 
        foreach ($datas as $key => $value) {
            if(isset($metadata[$key])) {
                $metadata[$key] = $value;
            }
        }
                     
        update_post_meta($id, '_wpfd_file_metadata', $metadata );
                          
        return true;
    }
    
    public function delete($id){
       if(!wp_delete_post( $id, true )) {
           return false;
       }      
        return true;
    }
}