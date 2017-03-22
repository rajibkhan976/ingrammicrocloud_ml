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
        
    public function addCategory($title){
        
        $title = trim(sanitize_text_field($title));
        if($title==''){
            return false;
        }
        $inserted = wp_insert_term($title, 'wpfd-category',array('slug'=>sanitize_title($title)));      
        if ( is_wp_error($inserted) ) {        
            //try again
            $inserted = wp_insert_term($title, 'wpfd-category',array('slug'=>sanitize_title($title).'-'.time() ));
            if ( is_wp_error($inserted) ) {
                    wp_send_json($inserted->get_error_message());
            }                    
        }
        $lastCats = get_terms( 'wpfd-category', 'orderby=term_group&order=DESC&hierarchical=0&hide_empty=0&parent=0&number=1');        
        if(is_array($lastCats)&& count($lastCats)) {
            $this->updateTermOrder($inserted['term_id'],$lastCats[0]->term_group+1);
        }
        return $inserted['term_id'];
              
    }

    
    //Update term order       
    function updateTermOrder($term_id,$order) {
         global $wpdb;
        $wpdb->query( $wpdb->prepare(
                                    "
                                        UPDATE $wpdb->terms SET term_group = '%d' WHERE term_id ='%d'
                                    ",
                                    $order,
                                    $term_id
                            ) 
                    );
       
    }


    public function changeOrder($tree) {
        $result = count($tree);
	for($i = 0; $i < $result; $i++) {
            $node = $tree[$i];
            $idCategory = $node['idCategory'];
            $children = isset($node['children']) ? (array)$node['children'] :  array();
            
            $this->updateOrder($idCategory,$children,$i);
        }
        return true;
    } 
    
    public function updateOrder($idCategory,$children,$order) {
        global $wpdb;
        $wpdb->query( $wpdb->prepare(
				"
					UPDATE $wpdb->terms SET term_group = '%d' WHERE term_id ='%d'
				",
				$order,
				$idCategory
			) );
			
                        
        if(count($children)) {
            for($i = 0; $i < count($children); $i++) {            
                wp_update_term($children[$i]['idCategory'], 'wpfd-category', array(
                    'parent' => $idCategory                 
                ));            
                $children1 = isset($children[$i]['children']) ? (array)$children[$i]['children'] :  array();
                $this->updateOrder($children[$i]['idCategory'],$children1,$i);
            }          
        }
    }
    
    public function delete($id_category){
        //delete custom post
        $args = array(
            'posts_per_page' => -1,
            'post_type' => 'wpfd_file' ,
            'tax_query' => array(
                array(
                 'taxonomy' => 'wpfd-category',                 
                 'terms' => (int)$id_category,
                 'include_children' => false
                )
            )           
        );
        $results = get_posts( $args ); //var_dump($results);
        if(count($results)) {
            foreach ($results as $result) {
                wp_delete_post($result->ID,true);
            }
        }
        
        //delete term
        $result = wp_delete_term( $id_category, 'wpfd-category' );
        return $result;
    }

   
    public function getChildren($id){      
        $results  = array(); 
        $this->getChildrenRecursive($id,$results);   
        return $results;
        
    }
    
     public function getChildrenRecursive($catid, &$results) {
        if(!is_array($results)){$results=array();}              
        $categories = get_terms( 'wpfd-category', 'orderby=term_group&hierarchical=1&hide_empty=0&parent='.$catid );
        if($categories) {           
           foreach ($categories as $category) {              
               $results[] = $category->term_id;  
               $this->getChildrenRecursive($category->term_id,$results);
           }
        }
    }

    public function getCategory($id){
      
        $result = get_term($id,'wpfd-category');
        
        $modelConfig =  $this->getInstance('Config');
        $main_config = $modelConfig->getConfig();

        if(!empty($result) && !is_wp_error( $result ) ){
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
                $result->params = $modelConfig->getThemeParams($main_config['defaultthemepercategory']);
                $result->params['theme'] = $main_config['defaultthemepercategory'];
            }

            $result->roles =  isset($term_meta['roles'])? (array)$term_meta['roles']: array();
            $result->access=  isset($term_meta['access'])? (int)$term_meta['access']: 0;
            $result->ordering =  $ordering;
            $result->orderingdir =  $orderingdir;
        }
                
        return $result;
    }    
    
    public function saveParams($id,$params) {
        
        $datas = json_encode($params);
        $updated = wp_update_term( $id, 'wpfd-category', array('description' => $datas) );
        if ( is_wp_error($updated) ) {
            return false;
        }
        return true;
    }

    public function save($id, $params) {

//        $term_meta = get_option( "taxonomy_$id" );
        $visibility = $params['visibility'];

        $params['access'] = $visibility;
        if (!isset($params['roles'])) {
            $roles = array();
        } else {
            $roles = $params['roles'];
        }
        if($visibility=='1'){
            $params['roles'] = $roles;
        }
        update_option( "taxonomy_$id", $params);

        return true;
    }

    public function saveTitle($category,$title){
        
        $result = wp_update_term($category, 'wpfd-category', array(
            'name' => $title,           
            'slug' => sanitize_title($title),
        ));
        if(is_wp_error($result)) { //try again with other slug
             $result = wp_update_term($category, 'wpfd-category', array(
                'name' => $title,           
                'slug' => sanitize_title($title).'-'.time(),
            ));            
        }
        if(is_wp_error($result)) {
          return false;
        }
        return true;
    }
    
}