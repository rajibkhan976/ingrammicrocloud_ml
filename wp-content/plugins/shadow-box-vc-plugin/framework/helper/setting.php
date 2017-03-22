<?php


if ( class_exists( 'Am_Helper_Setting' ) ) {
	return;
}

class Am_Helper_Setting {
	/**
	 * @var Am_Helper
	 */
	var $_;
	static $_options;

	function __construct( $helper ) {
		$this->_           = $helper;
	}

	function get( $key = null ) {
		if(!self::$_options) {
			self::$_options = get_option( $this->_->SLUG );
		}

		if( $key === null ) {
			return self::$_options;
		}

		$value = isset(self::$_options[$key]) ? self::$_options[$key] : null;

//		var_dump($data);
		if( $value && is_array($value)) {
			$value = (object) $value;
			$data[$key] = $value;
		}

		return $value;
	}
}