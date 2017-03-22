<?php

if ( !class_exists( 'Am_Fields_Switch_Field' ) ) {

	class Am_Fields_Switch_Field extends Am_Fields_BaseField {
		function loadScripts() {
			$this->_->script( 'assets/switchery', __FILE__ );
			$this->_->style( 'assets/switchery', __FILE__ );
		}
	}
}