<?php
if ( !class_exists( 'Am_Element_Param_Collection' ) ) {

	class Am_Element_Param_Collection {
		/**
		 * @var Am_Element_Param[]
		 */
		var $params = array();
		var $currentGroup = null;

		function __construct( &$params = null, $currentGroup = null ) {
			is_array($params) && $this->params = &$params;
			$this->currentGroup = $currentGroup;
		}

		function add( $type, $param_name, $label ) {
			$property = new Am_Element_Param( $this->currentGroup, $type, $param_name, $label );
			$this->params[] = $property;
			return $property;
		}

		function addGroup( $groupName ) {
			return new Am_Element_Param_Collection( $this->params, $groupName );
		}


		/**
		 * @return Am_Element_Param[]
		 */
		function get() {
			return $this->params;
		}
	}
}