<?php
if ( ! class_exists( 'Am_Element_BaseSettings' ) ) {
	class Am_Element_BaseSettings {
		var $TAG_NAME;
		var $name;

		var $title;
		var $description;
		var $category;

		/**
		 * @var Am_Helper
		 */
		var $_;
		var $elementDir;

		public function __construct( $name, $helper, $elementDir ) {
			$this->_          = $helper;
			$this->SLUG       = $helper->SLUG;

			$this->_->isAdmin() && $this->initMeta();

			$this->name = $name;
			! $this->title && $this->title = $name;
			$this->elementDir = $elementDir;

			$this->params = new Am_Element_Param_Collection();
		}

		public function _loadAdminJsScript() {
			$this->_->script( 'admin', $this->elementDir . 'admin.js' );
		}

		public function _loadAdminCssScript() {
			$this->_->style( 'admin', $this->elementDir . 'admin.css' );
		}

		public function getSettings() {
			return array();
		}

		public function initMeta() {}
		public function init() {
		}

		public function initAdmin() {
		}

		public function initParams() {
		}

		public function afterMap() {
		}

		public function getParams() {
			return $this->params->get();
		}
	}
}