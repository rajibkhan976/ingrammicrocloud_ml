<?php
/**
 * WP File Download
 *
 * @package WP File Download
 * @author Joomunited
 * @version 1.0
 */

use Joomunited\WPFramework\v1_0_0\Controller;
use Joomunited\WPFramework\v1_0_0\Utilities;

defined('ABSPATH') || die();

class wpfdControllerRole extends Controller
{

    public function save()
    {

        global $wp_roles;

        if (!isset($_POST['wpfd_role_nonce']) || !check_admin_referer('wpfd_role_settings', 'wpfd_role_nonce') || !current_user_can('manage_options'))
            return;

        $role_caps = get_option('wpfd_role_caps', array());

        if (!isset($wp_roles)) {
            $wp_roles = new WP_Roles();
        }

        $roles = $wp_roles->role_objects;
        $roles_names = $wp_roles->role_names;

        $post_type = get_post_type_object('wpfd_file'); 
        $post_type_caps = (array)$post_type->cap; 
        $wp_default_caps = array('read','read_post','read_private_posts','create_posts','edit_posts','edit_post','edit_others_posts','delete_post','publish_posts');
        foreach ($wp_default_caps as $default_cap) {
            unset($post_type_caps[$default_cap]);
        }

        foreach ($roles as $user_role => $role) {

            $user_role_caps = Utilities::getInput($user_role, 'POST', 'none');
            foreach ($post_type_caps as $post_key => $post_cap) {

                if (isset($user_role_caps[$post_key]) && $user_role_caps[$post_key] == 'on') {
                    $role->add_cap($post_key);
                } else {
                    $role->remove_cap($post_key);
                }

            }

        }

        $this->redirect('admin.php?page=wpfd-role&updated=1');
        wp_die();
    }

}

?>
