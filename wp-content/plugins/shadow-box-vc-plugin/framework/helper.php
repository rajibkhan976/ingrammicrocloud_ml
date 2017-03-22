<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

if ( ! class_exists( 'Am_Helper' ) ) {
	class Am_Helper {
		public $baseFile;
		public $NAME;
		public $SLUG;
		public $IS_DEBUG;
		public $_FILE_;
		public $frameworkFILE;

		/**
		 * @param Am_BaseFile $baseFile
		 */
		function __construct( &$baseFile ) {
			$this->baseFile = &$baseFile;

			$this->NAME          = $baseFile->NAME;
			$this->SLUG          = $baseFile->SLUG;
			$this->IS_DEBUG      = $baseFile->IS_DEBUG;
			$this->__FILE__      = $baseFile->_FILE_;
			$this->frameworkFILE = __FILE__;

			if ( $this->baseFile->IS_THEME ) {
				global $wp;
				$wp->_ = $this;
			}

			require_once( 'cls.php' );
			require_once( 'helper/common.php' );

			$this->addAction( array( 'wp_enqueue_scripts', 'admin_enqueue_scripts' ),
				array( $this, 'enqueueScriptsOn' ) );
		}

		/**
		 * @param     $tag
		 * @param     $function_to_add
		 * @param int $priority
		 * @param int $accepted_args
		 *
		 * @return bool|null
		 *
		 * Alias for array support
		 */
		function addAction( $tag, $function_to_add, $priority = 10, $accepted_args = 1 ) {
			if ( is_array( $tag ) ) {
				$l = null;
				foreach ( $tag as $t ) {
					$l = add_action( $t, $function_to_add, $priority, $accepted_args );
				}

				return $l;
			}

			return add_action( $tag, $function_to_add, $priority, $accepted_args );
		}

		private $_isAdmin = null;

		function isAdmin() {
			if ( $this->_isAdmin === null ) {
				$this->_isAdmin = is_admin();
			}

			return $this->_isAdmin;
		}

		private $_isVC = null;

		function isVC() {
			if ( $this->_isVC === null ) {
				$this->_isVC = $this->isAdmin() && defined( 'WPB_VC_VERSION' );
			}

			return $this->_isVC;
		}

		private $_isVCFrontEditor = null;

		function isVCFrontEditor() {
			if ( $this->_isVCFrontEditor === null ) {
				$this->_isVCFrontEditor = ! function_exists( 'vc_is_inline' ) ? false : vc_is_inline();
			}

			return $this->_isVCFrontEditor;
		}

		var $_enqueueOn = false;
		var $_enqueueStyleQueue = array();
		var $_enqueueScriptQueue = array();
		var $_enqueueInlineStyleQueue = array();

		function enqueueScriptsOn() {
			$this->_enqueueOn = true;

			if ( count( $this->_enqueueStyleQueue ) ) {
				foreach ( $this->_enqueueStyleQueue as $params ) {
					call_user_func_array( array( $this, 'proxyWpEnqueueStyle' ), $params );
				}
				$this->_enqueueStyleQueue = array();
			}
			if ( count( $this->_enqueueInlineStyleQueue ) ) {
				foreach ( $this->_enqueueInlineStyleQueue as $params ) {
					call_user_func_array( array( $this, 'proxyWpAddInlineStyle' ), $params );
				}
				$this->_enqueueInlineStyleQueue = array();
			}
			if ( count( $this->_enqueueScriptQueue ) ) {
				foreach ( $this->_enqueueScriptQueue as $params ) {
					call_user_func_array( array( $this, 'proxyWpEnqueueScript' ), $params );
				}
				$this->_enqueueScriptQueue = array();
			}

			if ( self::$_fontLoader ) {
				self::$_fontLoader->enqueue();
			}
		}

//		function newStyles() {
//			return new Am_Styles( $this );
//		}

		function newAttributes($atts = null) {
			return new Am_Attributes( $this, $atts );
		}

		/**
		 * @var Am_Helper_Setting
		 */
		static $_setting;

		function getSetting() {
			if ( ! self::$_setting ) {
				self::$_setting = $this->requireClass( 'Am_Helper_Setting', 'helper/setting.php', __FILE__ );
			}

			return self::$_setting;
		}

		// alias
		function sget( $key = null ) {
			return $this->getSetting()->get( $key );
		}

		/**
		 * @var Am_Helper_Template
		 */
		static $_template;

		function getTemplate() {
			if ( ! self::$_template ) {
				require_once( 'helper/template.php' );
				self::$_template = new Am_Helper_Template( $this );
			}

			return self::$_template;
		}

		// alias
		function template( $path, $file, $data = null ) {
			return $this->getTemplate()->template( $path, $file, $data );
		}

		/**
		 * @var Am_Helper_FontLoader
		 */
		static $_fontLoader;

		function getFontLoader() {
			if ( ! self::$_fontLoader ) {
				require_once( 'helper/font-loader.php' );
				self::$_fontLoader = new Am_Helper_FontLoader( $this );
			}

			return self::$_fontLoader;
		}

		/**
		 * @var Am_Helper_Dom
		 */
		static $_dom;

		function getDom() {
			if ( ! self::$_dom ) {
				require_once( 'helper/dom.php' );
				self::$_dom = new Am_Helper_Dom( $this );
			}

			return self::$_dom;
		}

		function isFileExists( $path, $__FILE__ = null ) {
			if ( $__FILE__ === null ) {
				$__FILE__ = $this->__FILE__;
			}

			if ( $__FILE__ !== true ) {
				$path = plugin_dir_path( $__FILE__ ) . $path;
			}

			return file_exists( $path ) ? $path : null;
		}

		function requireFile( $path, $__FILE__ = null ) {
			if ( is_array( $path ) ) {
				$r = array();

				foreach ( $path as $p ) {
					$r[] = $this->requireFile( $p, $__FILE__ );
				}

				return $r;
			}

			$pathFinal = $this->isFileExists( $path, $__FILE__ );

			if ( $pathFinal ) {
				require_once( $pathFinal );

				return $pathFinal;
			} else {
				trigger_error( "requireFile file not found: " . $path . ' - ' . $pathFinal . '; path = ' . $__FILE__, E_USER_NOTICE );
			}

			return false;
		}

		function requireClass( $className, $path, $__FILE__ = null, $arg = null ) {
			if ( ! class_exists( $className ) ) {
				$r = $this->requireFile( $path, $__FILE__ );
			} else {
				$r = true;
			}
			if ( $r ) {
				if ( $arg ) {
					return new $className( $this, $arg );
				} else {
					return new $className( $this );
				}
			}

			return false;
		}

		private $__themeUrlCache = array();

		private function __themeUrl( $path = '', $file = '' ) {
			if ( isset( $this->__themeUrlCache[ $path . '_' . $file ] ) ) {
				return $this->__themeUrlCache[ $path . '_' . $file ];
			}
			$path       = wp_normalize_path( $path );
			$contentDir = wp_normalize_path( WP_CONTENT_DIR );
			$file       = wp_normalize_path( dirname( $file ) );

			$url = WP_CONTENT_URL;
			$url = set_url_scheme( $url );

			$url = str_replace( $contentDir, $url, $file );

			$this->__themeUrlCache[ $path . '_' . $file ] = $url . '/' . $path;

			return $url . '/' . $path;
		}


		function getUrl( $fileName = '', $__FILE__ = null ) {
			if ( $__FILE__ === null ) {
				$__FILE__ = $this->__FILE__;
			}

			return $this->baseFile->IS_THEME ? $this->__themeUrl( $fileName, $__FILE__ ) : plugins_url( $fileName, $__FILE__ );
		}

		function proxyWpEnqueueStyle( $handle, $src = false, $deps = array(), $ver = false, $media = 'all' ) {
			if ( ! $this->_enqueueOn ) {
				$this->_enqueueStyleQueue[] = func_get_args();

				return;
			}

			wp_enqueue_style( $handle, $src, $deps, $ver, $media );
		}

		function proxyWpEnqueueScript( $handle, $src = false, $deps = array(), $ver = false, $in_footer = false ) {
			if ( ! $this->_enqueueOn ) {
				$this->_enqueueScriptQueue[] = func_get_args();

				return;
			}

			wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer );
		}

		function proxyWpAddInlineStyle( $handle, $data ) {
			if ( ! $this->_enqueueOn ) {
				$this->_enqueueInlineStyleQueue[] = func_get_args();

				return;
			}

			wp_add_inline_style( $handle, $data );
		}

		function style( $file, $__FILE__ = null, $options = array() ) {
			if ( $__FILE__ === null ) {
				$__FILE__ = $this->__FILE__;
			}

			$deps     = isset( $options['deps'] ) ? $options['deps'] : array();
			$min      = isset( $options['force_min'] ) ? $options['force_min'] : $this->baseFile->USE_MIN;
			$handle   = isset( $options['handle'] ) ? $options['handle'] : md5($file . $__FILE__);
			$fileName = $file . ( $min ? '.min' : '' ) . '.css';
			//http://stackoverflow.com/questions/959957/php-short-hash-like-url-shortening-websites

			$this->proxyWpEnqueueStyle( $handle, $this->getUrl( $fileName, $__FILE__ ), $deps, $this->baseFile->VERSION );

			return $handle;
		}

		function script( $file, $__FILE__ = null, $options = array() ) {
			if ( $__FILE__ === null ) {
				$__FILE__ = $this->__FILE__;
			}

			$deps      = isset( $options['deps'] ) ? $options['deps'] : array();
			$in_footer = isset( $options['in_footer'] ) ? $options['in_footer'] : false;
			$handle    = isset( $options['handle'] ) ? $options['handle'] : md5($file . $__FILE__);
			$min       = isset( $options['force_min'] ) ? $options['force_min'] : $this->baseFile->USE_MIN;

			$fileName = $file . ( $min ? '.min' : '' ) . '.js';

			$this->proxyWpEnqueueScript( $handle, $this->getUrl( $fileName, $__FILE__ ), $deps, $this->baseFile->VERSION, $in_footer );

			return $handle;
		}

		function inlineStyle( $rule, $styles, $handle = 'root' ) {
			$st = $this->getDom()->__arrayToHTMLStyles( $styles );
			if ( ! $st ) {
				return '';
			}

			$css = sprintf( '%s { %s }', $rule, $st );

			$this->proxyWpAddInlineStyle( $handle, $css );

			return $css;
		}

		function styles( $files, $__FILE__, $options = array() ) {
			$hls = array();

			foreach ( $files as $file ) {
				$hls[] = $this->style( $file, $__FILE__, $options );
			}

			return $hls;
		}

		function scripts( $files, $__FILE__, $options = array() ) {
			$hls = array();

			foreach ( $files as $file ) {
				$hls[] = $this->script( $file, $__FILE__, $options );
			}

			return $hls;
		}
	}
}