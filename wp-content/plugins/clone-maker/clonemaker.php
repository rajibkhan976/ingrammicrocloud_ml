<?php

defined('ABSPATH') or die("No script kiddies please!");

/**

 * Plugin Name: Clone Maker

 * Plugin URI:https://github.com/nosstradamus/Clonemaker

 * Description: "Clonemaker" is an wordpress plugin. Main target of this plugin is to insert in new page content from another page, simulate a copy - paste action.

 * Version: 3.0

 * Author:Sitnic Victor

 * Author URI: https://github.com/nosstradamus

 * Text Domain: #

 * Domain Path: #

 * Network: #

 * License: GPL2

 *Copyright 2014  SITNIC VICTOR  (email : sitnic.victor@gmail.com)



    This program is free software; you can redistribute it and/or modify

    it under the terms of the GNU General Public License, version 2, as 

    published by the Free Software Foundation.



    This program is distributed in the hope that it will be useful,

    but WITHOUT ANY WARRANTY; without even the implied warranty of

    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the

    GNU General Public License for more details.



    You should have received a copy of the GNU General Public License

    along with this program; if not, write to the Free Software

*/
function vgm_style() {
    wp_register_style( 'vgm_style', plugins_url('vgm_style.css',__FILE__) );
    wp_enqueue_style('vgm_style');
}

add_action( 'admin_enqueue_scripts', 'vgm_style' );

function vgm_create_box(){
    $screens = array( 'post', 'page' );
    foreach ($screens as $screen){

        add_meta_box(
            'vgm_clone_box',
            __('Clonemaker','vgm_lang'),
            'vgm_display_html',
            $screen);
    }
}
add_action( 'add_meta_boxes', 'vgm_create_box' );

function vgm_display_html(){
    $screen = get_current_screen();

    $args = array(
        'sort_order' => 'asc',
        'sort_column' => 'post_title',
        'hierarchical' => 1,
        'exclude' => '',
        'include' => '',
        'meta_key' => '',
        'meta_value' => '',
        'authors' => '',
        'child_of' => 0,
        'parent' => -1,
        'exclude_tree' => '',
        'number' => '',
        'offset' => 0,
        'post_type' => $screen->id,
        'post_status' => 'publish'
    );
    if($screen->id=='post'){
        $pages = get_posts($args);
    } elseif ($screen->id =='page'){
        $pages = get_pages($args);
    }

    echo "<ul class='vgm_box_hold'>";
    foreach($pages as $key=>$value){
        echo "<li><a class='vgm_box_clone' href='".$value->ID."'>".$value->post_title."</a></li>";
    }
    echo "</ul>";

    ?>
    <script>
        jQuery('.vgm_box_clone').live('click',function(e){
            e.preventDefault();
            $xhrx = '';
            post_id = jQuery(this).attr('href');
            console.log(post_id);

           $xhrx = jQuery.ajax({
                url:'<?php echo admin_url('admin-ajax.php'); ?>',
                async:'true',
                    data:{
                    action:'vgm_get_post_content',
                    post:post_id
                },
                success:function(data,response){
                    console.log(data);
                    jQuery("#content").attr('value',data);
                    tinymce.activeEditor.execCommand('mceSetContent', true, data);

                }
            })

        })
    </script>


<?php
}

function vgm_get_post_content(){
    $postid = $_REQUEST['post'];
    $post = get_post( $postid );
    echo $post->post_content;

    wp_die();

}
add_action( 'wp_ajax_vgm_get_post_content', 'vgm_get_post_content' );
add_action( 'wp_ajax_nopriv_vgm_get_post_content', 'vgm_get_post_content' );