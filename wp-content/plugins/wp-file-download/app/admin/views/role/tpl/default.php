<?php
/**
 * WP File Download
 *
 * @package WP File Download
 * @author Joomunited
 * @version 1.0
 */

// No direct access.
defined('ABSPATH') || die();

global $wp_roles;

if (!isset($wp_roles)) {
    $wp_roles = new WP_Roles();
}

$roles = $wp_roles->role_objects;
$roles_names = $wp_roles->role_names;

$post_type = get_post_type_object('wpfd_file');
$post_type_caps = $post_type->cap;

?>
<div id="mybootstrap" class="wrap wpfd-role">
    <div id="icon-options-general" class="icon32"></div>
    <h3><?php _e("User Role", 'wpfd'); ?></h3>

    <form id="wpfd-role-form" method="post" action="admin.php?page=wpfd-role&amp;task=role.save">
        <?php wp_nonce_field('wpfd_role_settings', 'wpfd_role_nonce'); ?>
        <ul class="nav nav-tabs">
            <?php
            $tab_count = 0;
            foreach ($roles_names as $key => $name) {
                $li_class = '';
                if ($tab_count == 0) {
                    $li_class = 'active';
                }
                echo '<li class="' . $li_class . '"><a href="#role-' . $key . '" data-toggle="tab"> ' . $name . ' </a> </li>';
                $tab_count++;
            }
            ?>
        </ul>
        <div class="tab-content">
            <?php
            $role_count = 0;
            foreach ($roles as $role_name => $role) {
                ?>
                <div class="tab-pane <?php echo ($role_count == 0) ? 'active' : ''; ?>"
                     id="role-<?php echo $role_name; ?>">
                    <?php
                    $caps = (array)$post_type_caps;
                    $wp_default_caps = array('read','read_post','read_private_posts','create_posts','edit_posts','edit_post','edit_others_posts','delete_post','publish_posts');
                    foreach ($wp_default_caps as $default_cap) {
                           unset($caps[$default_cap]);
                    }                 

                    foreach ($caps as $post_key => $post_cap) {
                        ?>
                        <label for="wpfd-<?php echo $role_name; ?>-<?php echo $post_key; ?>-edit">
                            <input type="checkbox" id="wpfd-<?php echo $role_name; ?>-<?php echo $post_cap; ?>-edit"
                                   name="<?php echo $role_name . '[' . $post_key . ']'; ?>"<?php checked(isset($role->capabilities[$post_key]), 1); ?> />
                            <?php echo $post_cap; ?>
                        </label>
                    <?php }
                    $role_count++;
                    ?>
                </div>
            <?php } ?>

        </div>

        <p class="submit">
            <input type="submit" name="submit" class="button button-primary" value="<?php _e('Save', 'wpfd'); ?>"/>
        </p>
    </form>

</div>
