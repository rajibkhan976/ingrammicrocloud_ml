<?php

if ( !class_exists( 'Am_BaseFile' ) ) {
	class Am_BaseFile {
		var $VERSION    = '0.0.0';
		var $NAME       = '';
		var $SLUG       = '';
		var $UPDATER_ID = null;

		var $IS_THEME   = false;
		var $USE_MIN    = true;
		var $IS_DEBUG   = false;
		var $VC_REQUIRED_NOTICE = true;

		/**
		 * @var Am_Helper
		 */
		var $_;
		var $_FILE_;

		function __construct() {
			$this->USE_MIN  = isset( $_REQUEST['nomin'] ) ? false : true;
			$this->IS_DEBUG = defined( 'WP_ENV' ) && WP_ENV === 'development';
			$this->IS_DEBUG && $this->USE_MIN = false;

//			$this->IS_DEBUG = false;
//		$this->USE_MIN = false;

			add_action( 'init', array( $this, '_init' ), $this->IS_THEME ? 10 : 15 );
		}

		public function _init() {
			$this->_ = &Am_Loader::load( $this );

			if ( $this->VC_REQUIRED_NOTICE ) {
				if( ! defined( 'WPB_VC_VERSION' ) ) {
					add_action( 'admin_notices', array( $this, '_vcNotice' ) );
				} else if( version_compare('4', WPB_VC_VERSION) > 0 ) {
					add_action( 'admin_notices', array( $this, '_vcOldNotice' ) );
				}
			}

			$this->initialize();
			$this->_->isAdmin() && $this->initializeAdmin();
			$this->_->isAdmin() && $this->_initializeAdminSettings();
		}

		function initialize() {}
		function initializeAdmin() {}

		public function _initializeAdminSettings() {
			if(!$this->_->isFileExists('settings/config.php')) return;

			$this->_->requireFile( 'redux/settings.php', $this->_->frameworkFILE );
			$this->_->requireFile( 'settings/config.php' );

			$name = sprintf('%s_Settings_config', $this->_->SLUG);
			if(class_exists($name)) {
				$config = new $name( $this->_ );
				$config->init();
			}
		}

		public function registerElement( $name, $elements_dir ) {
			if(is_array($name)) {
				foreach($name as $n) {
					Am_Element_Manager::register( $n, $this->_, $elements_dir );
				}
				return;
			}
			Am_Element_Manager::register( $name, $this->_, $elements_dir );
		}


		function _vcNotice() {
			echo '<div class="updated"><p>'.
			     sprintf(__('<strong>%s</strong> requires <strong>' .
			                '<a href="http://codecanyon.net/item/visual-composer-page-builder-for-wordpress/242431?ref=Amino-Studio" target="_blank">Visual Composer</a>' .
			                '</strong> plugin to be installed and activated on your site.', $this->_->SLUG), $this->_->NAME).
			     '</p></div>';
		}
		function _vcOldNotice() {
			echo '<div class="updated"><p>'.
			     sprintf(__('<strong>%s</strong> requires <strong>' .
			                '<a href="http://codecanyon.net/item/visual-composer-page-builder-for-wordpress/242431?ref=Amino-Studio" target="_blank">Visual Composer</a>' .
			                '</strong> plugin <strong>4.0.0 or newer</strong>, need update.', $this->_->SLUG), $this->_->NAME).
			     '</p></div>';
		}
	}
}