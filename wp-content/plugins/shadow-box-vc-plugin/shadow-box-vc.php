<?php
/*
Plugin Name: Shadow Box for Visual Composer
Plugin URI: http://amino-studio.com/shadow-box/
Description:
Version: 1.0.1
Text Domain: shadow_box_vc
Author: Amino-Studio <support@amino-studio.com>
Author URI: http://amino-studio.com/
License: http://amino-studio.com/license/
*/

if ( ! defined( 'ABSPATH' ) ) { die( '-1' ); }

require_once( dirname( __FILE__ ) . '/framework/loader.php' );

class ShadowBoxVC_Plugin_File extends Am_BaseFile {
	var $VERSION    = '1.0.1';
	var $NAME       = 'Shadow Box for Visual Composer';
	var $SLUG       = 'shadow_box_vc';
	var $UPDATER_ID = 796;
	var $_FILE_     = __FILE__;

	function initialize() {
		//$this->USE_MIN = false;
		$this->registerElement( 'ShadowBox', dirname( __FILE__ ) . '/elements/' );
	}

	function initializeAdmin() {

	}
}

new ShadowBoxVC_Plugin_File();