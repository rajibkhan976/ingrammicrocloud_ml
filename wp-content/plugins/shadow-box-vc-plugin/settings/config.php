<?php

if ( !class_exists( 'shadow_box_vc_Settings_config' ) ) {
	class shadow_box_vc_Settings_config extends Am_Redux_Settings {
		var $IS_SUBMENU = true;
		var $_FILE_ = __FILE__;

		public function getArguments() {
			$args = array(
				'display_name'       => $this->_->NAME,
				'menu_title'         => $this->_->NAME,
				'show_import_export' => false,
			);
			return $args;
		}
	}
}