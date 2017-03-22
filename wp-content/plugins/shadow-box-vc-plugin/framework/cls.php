<?php

if ( class_exists( 'Am_Cls' ) ) {
	return;
}

class Am_Cls {
	/**
	 * @var Am_Helper
	 */
	var $_;
	var $arg;

	function __construct( &$helper, $arg = null ) {
		$this->_   = &$helper;
		$this->arg = $arg;

		$this->construct();
	}

	function construct() {
	}
} 