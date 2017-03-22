<?php

if ( ! class_exists( 'Am_Fields_BaseField' ) ) {
	class Am_Fields_BaseField extends Am_Cls {
		var $name = '';

		/**
		 * @param           $name
		 * @param Am_Helper $helper
		 */
		public function __construct( $name, $helper ) {
			$this->name = $name;
			$this->_    = $helper;
		}

		function loadScripts() {
			$this->_->script( 'assets/am_vc', __FILE__ );
			$this->_->style( 'assets/am_vc', __FILE__ );

			if(!Am_Element_VC_Manager::isModernUI()) {
				$this->_->style( 'assets/am_vc_old', __FILE__ );
			}
		}

		function render( $settings ) {
			return $this->_->template(
				sprintf( 'fields/%s/%s.tmpl.php', $this->name, $this->name ),
				$this->_->frameworkFILE,
				$settings );
		}
	}
}