<?php

require_once( 'base-file.php' );
require_once( 'helper.php' );
require_once( 'functions/base.php' );

if ( ! class_exists( 'Am_Loader' ) ) {
	class Am_Loader {
		/**
		 * @param Am_BaseFile $baseFile
		 *
		 * @return Am_Helper
		 */
		static function load( $baseFile ) {
			$helper = new Am_Helper( $baseFile );

			$helper->requireFile( array(
				'element/base-settings.php',
				'element/base-render.php',
				'element/pre-renderer.php',
				'element/param/param.php',
				'element/param/collection.php',
				'element/vc/field-body-renderer.php',
				'element/vc/manager.php',
				'element/manager.php',
				'fields/Base/value.php',
				'fields/Base/field.php',
			), __FILE__ );

			return $helper;
		}
	}
}