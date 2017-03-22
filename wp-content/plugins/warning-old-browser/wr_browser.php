<?php
/*
	Plugin Name: Warning Old Browser
	Plugin URI: http://plugins.fruitfulcode.com/warning/
	Description: Displays a warning message to the user who is using an old browser. The plugin does not block website and displays a message that appears at the top of the screen and can be easily closed.
	Version: 1.5
	Author: fruitfulcode
	Author URI: http://fruitfulcode.com
*/
	
class warning_old_browser {
		function __construct() {
			global	$wob_variable;
					$wob_variable = new stdClass;

			add_action( 'plugins_loaded', array( &$this, 'constants'), 	1);
			add_action( 'plugins_loaded', array( &$this, 'lang'),		2);
			add_action( 'plugins_loaded', array( &$this, 'includes'), 	3);
			
			register_activation_hook  ( __FILE__, array( &$this,  'activation' ));
			register_deactivation_hook( __FILE__, array( &$this,'deactivation') );
		}
		
		function constants() {
			define( 'WARNING_OLD_BROWSER_DIR', trailingslashit( plugin_dir_path( __FILE__ ))); 
			define( 'WARNING_OLD_BROWSER_URL', trailingslashit( plugin_dir_url( __FILE__ )));
			define( 'WARNING_OLD_BROWSER_ADMIN_STYLE', 		WARNING_OLD_BROWSER_URL . '/css/' );
			define( 'WARNING_OLD_BROWSER_JQS', 				WARNING_OLD_BROWSER_URL . '/js/' );
		}
		
		function lang() {
			load_plugin_textdomain( 'warning-old-browser', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
		}	
		
		
		public static function wr_get_defaults() {
			$wr_ver_xml  = '';
			$completeurl = "http://plugins.fruitfulcode.com/warning/ver.browsers.xml";
			if (@fopen($completeurl, "r")) {
				$wr_ver_xml  = file_get_contents ($completeurl);
			}	
		
			$xml   = simplexml_load_string($wr_ver_xml);
			$json  = json_encode($xml);		
			$array = json_decode($json,TRUE);
			return $array; 
		}
		
		public static function wr_version() {
			$array = array();
			$array = self::wr_get_defaults();
			return $array['@attributes']['ver'];
			
		}
		
		public static function wr_get_plugin_options() {
				$saved  = (array) get_option( 'wob_options' );
				$data	= (array) get_option( 'wob_defaults' );
				$defaults = array(
						'state' 		=> 'off',
						'message_' 		=> __('Attention! You are using an old browser. Please upgrade or download a new version', 'warning-old-browser'), 
						'ie_ver' 		=> $data['defaults']['ie_ver'],
						'ie_url' 		=> 'http://windows.microsoft.com/en-US/internet-explorer/products/ie/home',
						'ff_ver'  		=> $data['defaults']['ff_ver'],
						'ff_url'  		=> 'http://www.mozilla.org/en-US/firefox/new',
						'ch_ver' 		=> $data['defaults']['ch_ver'],
						'ch_url' 		=> 'https://www.google.com/intl/uk/chrome/browser',
						'sfr_ver'		=> $data['defaults']['sfr_ver'],
						'sfr_url'		=> 'http://www.apple.com/safari',
						'opr_ver' 		=> $data['defaults']['opr_ver'],
						'opr_url' 		=> 'http://www.opera.com/download',
						'panel_style'	=> '0',
						'bg_color' 		=> '#ffffff',
						'font_color' 	=> '#e34848',
						'font_size'  	=> '14',
						'easing_effect' => 'Fade',
						'is_every_time_vis_panel'   => 'off'
				);

				$defaults = apply_filters( 'warning_old_browser_add_options', $defaults );
				$options  = wp_parse_args( $saved, $defaults );
				$options  = array_intersect_key( $options, $defaults );
		
				return $options;
		}
		
		function includes() {
			require_once( WARNING_OLD_BROWSER_DIR . '/inc/admin.php' ); 
			require_once( WARNING_OLD_BROWSER_DIR . '/inc/defaults.php' ); 
		}
	
		function activation() {
			add_option( 'wob_defaults',  self::wr_get_defaults()); 
			add_option( 'wob_version',   self::wr_version()); 
			add_option( 'wob_options',   self::wr_get_plugin_options()); 
		}
		
		function deactivation() {
			delete_option('wob_version');
			delete_option('wob_defaults');
			delete_option('wob_options');
		}
}

$warning_old_browser = new warning_old_browser();