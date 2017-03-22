<?php
/*
Plugin Name: ZillaShortcodes
Plugin URI: http://www.themezilla.com/plugins/zillashortcodes
Description: A simple shortcode generator. Add buttons, columns, tabs, toggles and alerts to your theme.
Version: 1.1
Author: ThemeZilla
Author URI: http://www.themezilla.com
*/

class ZillaShortcodes {

    function __construct() 
    {	
    //	require_once( plugin_dir_path( __FILE__ ) .'shortcodes.php' );

		
		define('ZILLA_TINYMCE_DIR', get_template_directory_uri().'/inc/zilla-shortcodes/tinymce');
	//	define('ZILLA_TINYMCE_DIR', get_template_directory_uri().'/inc/zilla-shortcodes/tinymce');
		
        add_action('init', array(&$this, 'init'));
        add_action('admin_init', array(&$this, 'admin_init'));
	}
	
	/**
	 * Registers TinyMCE rich editor buttons
	 *
	 * @return	void
	 */
	function init()
	{
		if( ! is_admin() )
		{
	    wp_enqueue_style( 'zilla-shortcodes', get_template_directory_uri().'/inc/zilla-shortcodes/shortcodes.css');
	//	wp_enqueue_style( 'exquisite-shortcodes', get_template_directory_uri().'/css/shortcodes.css');
	    wp_enqueue_script( 'jquery-ui-accordion' );
		wp_enqueue_script( 'jquery-ui-tabs' );
		wp_enqueue_script( 'zilla-shortcodes-lib', get_template_directory_uri().'/inc/zilla-shortcodes/js/zilla-shortcodes-lib.js', array('jquery', 'jquery-ui-accordion', 'jquery-ui-tabs') );
	}
		
		
		if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
			return;
	
		if ( get_user_option('rich_editing') == 'true' )
		{
			add_filter( 'mce_external_plugins', array(&$this, 'add_rich_plugins') );
			add_filter( 'mce_buttons', array(&$this, 'register_rich_buttons') );
		}
	}
	
	// --------------------------------------------------------------------------
	
	/**
	 * Defins TinyMCE rich editor js plugin
	 *
	 * @return	void
	 */
//	function add_rich_plugins( $plugin_array )
//	{
//		$plugin_array['zillaShortcodes'] = get_template_directory_uri().'/inc/zilla-shortcodes/tinymce/plugin.js';
//		return $plugin_array;
//	}
	
	
	
	
	
			function add_rich_plugins( $plugin_array )
		{
		if ( floatval(get_bloginfo('version')) >= 3.9){
		$plugin_array['zillaShortcodes'] = get_template_directory_uri(). '/inc/zilla-shortcodes/tinymce/plugin.js';
		}else{
		$plugin_array['zillaShortcodes'] = get_template_directory_uri(). '/inc/zilla-shortcodes/tinymce/plugin.old.js'; // For old versions of WP
		}
		return $plugin_array;
		}


	
	// --------------------------------------------------------------------------
	
	/**
	 * Adds TinyMCE rich editor buttons
	 *
	 * @return	void
	 */
	function register_rich_buttons( $buttons )
	{
		array_push( $buttons, "|", 'zilla_button' );
		return $buttons;
	}
	
	/**
	 * Enqueue Scripts and Styles
	 *
	 * @return	void
	 */
	function admin_init()
	{
		// css
		wp_enqueue_style( 'zilla-popup', get_template_directory_uri().'/inc/zilla-shortcodes/tinymce/css/popup.css', false, '1.0', 'all' );
		
		// js
		wp_enqueue_script( 'jquery-ui-sortable' );
		wp_enqueue_script( 'jquery-livequery', get_template_directory_uri().'/inc/zilla-shortcodes/tinymce/js/jquery.livequery.js', false, '1.1.1', false );
		wp_enqueue_script( 'jquery-appendo', get_template_directory_uri().'/inc/zilla-shortcodes/tinymce/js/jquery.appendo.js', false, '1.0', false );
		wp_enqueue_script( 'base64', get_template_directory_uri().'/inc/zilla-shortcodes/tinymce/js/base64.js', false, '1.0', false );
		
		wp_enqueue_script( 'zilla-popup', get_template_directory_uri().'/inc/zilla-shortcodes/tinymce/js/popup.js', false, '1.0', false );
		
		
		if ( floatval(get_bloginfo('version')) >= 3.9){
			wp_enqueue_script( 'zilla-popup', get_template_directory_uri().'/inc/zilla-shortcodes/tinymce/js/popup.js', false, '1.0', false );
			}else{
			wp_enqueue_script( 'zilla-popup', get_template_directory_uri().'/inc/zilla-shortcodes/tinymce/js/popup.old.js', false, '1.0', false );
			//For older versions of WP
			}
		
		wp_localize_script( 'jquery', 'ZillaShortcodes', array('plugin_folder' => get_template_directory_uri() .'/inc/zilla-shortcodes') );
	}
    
}
$zilla_shortcodes = new ZillaShortcodes();

?>