<?php

if ( !class_exists( 'Am_Element_VC_FieldBodyRenderer' ) ) {

	class Am_Element_VC_FieldBodyRenderer {
		/**
		 * @param Am_Fields_BaseField $fieldClass
		 * @param Am_Helper $helper
		 */
		function __construct( $fieldClass, $helper ) {
			$this->fieldClass = $fieldClass;
			$this->_ = $helper;
		}

		function render( $settings, $value ) {
			$settings               = (object) $settings;
			$settings->fieldClass   = $this->fieldClass;
			$settings->currentValue = $value;

			$settings->field = $this->fieldClass->render( $settings );

			return $this->_->template( '_field-body.tpl.php', __FILE__, $settings );
		}
	}
}