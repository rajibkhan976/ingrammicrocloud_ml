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

class wpfdModelCategories extends Model
{
	public function getCategories($idcategory){
        $user = wp_get_current_user();
        $roles = array();
        foreach($user->roles as $role){
            $roles[] = strtolower($role);
        }
        $result =  array();
        $categories = get_terms( 'wpfd-category', 'orderby=term_group&hierarchical=1&hide_empty=0&parent='.$idcategory);
        if($categories) {
           foreach ($categories as $category) {
               //$category->level = $cat->level + 1;
               $term_meta = get_option( "taxonomy_".$category->term_id );
               $cat_roles =  isset($term_meta['roles'])? (array)$term_meta['roles']: array();
               $cat_access=  isset($term_meta['access'])? (int)$term_meta['access']: 0;
               if($cat_access == 1) {
                    $allows = array_intersect($roles, $cat_roles);
                    if($allows) $result[] = $category;
               }else {
                   $result[] = $category;
               }
           }
        }

        return stripslashes_deep($result);
    }

    public function getSubCategoriesCount($idcategory) {
        $count = wp_count_terms( 'wpfd-category', 'orderby=term_group&hierarchical=1&hide_empty=0&parent='.$idcategory);
        return $count;
    }
   
}
