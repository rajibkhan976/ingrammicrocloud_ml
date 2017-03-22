<?php


if ( !class_exists( 'Am_Fields_BaseValue' ) ) {

	class Am_Fields_BaseValue extends Am_Cls {
		function __construct( $helper, $value, $default ) {
			parent::__construct( $helper );

			if ( is_array( $default ) ) {
				$default = array_shift( $default );
			}

			$this->default = $default;
			$this->value   = ( $value !== null ) ? $value : $this->default;
		}

		public function get() {
			return $this->value;
		}
	}
}