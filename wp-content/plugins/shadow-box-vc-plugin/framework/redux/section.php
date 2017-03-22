<?php

class Am_Redux_Section extends Am_Cls {
	var $section;

	function construct() {
		$this->id = am_id('section_');

		$this->section = $this->sectionArgs();
		$this->section['id'] = $this->id;

		$this->init();

		$this->arg->sections[] = $this->section;

		$this->after();
	}

	function sectionArgs() {
		return array();
	}
	function init() {}
	function after() {}
	function front() {}

	function addDivide() {
		$this->arg->sections[] = array(
			'type' => 'divide',
		);
	}

	function addField($id, $type, $args) {
		$args['id'] = $id;
		$args['type'] = $type;

		$this->section['fields'][] = $args;
	}
}