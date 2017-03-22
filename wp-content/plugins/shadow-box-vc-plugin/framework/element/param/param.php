<?php

if ( ! class_exists( 'Am_Element_Param' ) ) {

	class Am_Element_Param {
		var $type = null;
		var $param_name = null;
		var $label = null;
		var $value = '';
		var $group = null;
		var $holder = 'hidden';
		var $admin_label = null;

		var $description;
		var $dependency = null;

		var $data;

		public function __construct( $group, $type, $param_name, $label = null ) {
			$this->group      = $group;
			$this->type       = $type;
			$this->param_name = $param_name;
			$this->label      = $label;

			$this->data = array();
		}


		function suffix( $suffix ) {
			$this->data['suffix'] = $suffix;

			return $this;
		}

		function range( $min, $max, $step = 1 ) {
			$this->data['min']  = $min;
			$this->data['max']  = $max;
			$this->data['step'] = $step;

			return $this;
		}


		public function holder( $holder ) {
			$this->holder = $holder;

			return $this;
		}

		public function adminLabel() {
			$this->admin_label = true;

			return $this;
		}

		public function depends( $name, $value ) {
			$this->dependency = array(
				"element" => $name,
				"value"   => $value
			);

			return $this;
		}

		public function dependsNotNull( $name ) {
			$this->dependency = array(
				"element"   => $name,
				"not_empty" => true
			);

			return $this;
		}

		public function value( $value ) {
			$this->value = $value;

			return $this;
		}

		public function desc( $description ) {
			$this->description = $description;

			return $this;
		}
	}
}