<?php
if ( ! class_exists( 'Am_Element_BaseRender' ) ) {
	class Am_Element_BaseRender {
		/**
		 * @var Am_Helper
		 */
		var $_;

		public function __construct( $cls ) {
			$this->elementSettings = $cls;
			$this->_               = $cls->_;
			$this->TAG_NAME        = $cls->TAG_NAME;
		}

		public function render( $atts, $content ) {
			return '';
		}
	}
}