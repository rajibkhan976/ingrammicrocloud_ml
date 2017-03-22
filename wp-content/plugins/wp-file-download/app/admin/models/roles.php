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

class wpfdModelRoles extends Model {
    
    public function save($id_cat,$visibility,$roles){
        global $wpdb;
       
        $term_meta = get_option( "taxonomy_$id_cat" );
        $term_meta['access'] = $visibility;
        //if($visibility=='1'){
            $term_meta['roles'] = $roles;
        //}
        update_option( "taxonomy_$id_cat", $term_meta);
        
        return true;
    }
}