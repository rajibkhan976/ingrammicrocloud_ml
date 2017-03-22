<?php

if ( ! class_exists( 'Am_Element_Manager' ) ) {

	class Am_Element_Manager {
		static $_els = array();

		/**
		 * @param           $name
		 * @param Am_Helper $helper
		 * @param           $elements_dir
		 */
		static function register( $name, $helper, $elements_dir ) {
			$elementDir = $elements_dir . $name . '/';

			$helper->requireFile(
				array(
					$elementDir . 'render.php',
					$elementDir . 'settings.php',
				), true
			);

			$className = sprintf( 'VcElements_%s_Settings', $name );

			/** @var Am_Element_BaseSettings $settingsClass */
			$settingsClass = new $className( $name, $helper, $elementDir );

			self::$_els[ $settingsClass->TAG_NAME ] = $settingsClass;

			if ( method_exists( $settingsClass, 'init' ) ) {
				$settingsClass->init();
			}

			if ( $helper->isAdmin() && method_exists( $settingsClass, 'initAdmin' ) ) {
				$settingsClass->initAdmin();
			}

			$settingsClass->initParams();

			$helper->isVC() && Am_Element_VC_Manager::register($settingsClass, $helper);

			$renderer = new Am_Element_PreRenderer( $settingsClass );
			add_shortcode( $settingsClass->TAG_NAME, array( $renderer, 'doRender' ) );
		}
	}
}