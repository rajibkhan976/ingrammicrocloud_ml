<?php

if ( ! class_exists( 'Am_Styles' ) ) {
	class Am_Styles {
		var $data = array();
		/**
		 * @var Am_Helper
		 */
		var $_;

		function __construct( $helper ) {
			$this->_ = $helper;
		}

		function count() {
			return count( $this->data );
		}

		function __get( $k ) {
			return $this->data[ $k ];
		}

		function __set( $k, $v ) {
			$this->data[ $k ] = $v;
		}

		function __toString() {
			return $this->_->getDom()->style( $this->data );
		}

		function getImportant() {
			return $this->_->getDom()->style( $this->data, true );
		}
	}
}

if ( ! class_exists( 'Am_Css' ) ) {
	class Am_Css {
		var $data = array();

		function add( $v ) {
			$this->data[] = $v;
			return $this;
		}

		function __toString() {
			return join( ' ', $this->data );
		}
	}
}

if ( ! class_exists( 'Am_Data' ) ) {
	class Am_Data {
		var $atts;

		function __construct( &$atts ) {
			$this->atts = &$atts;
		}

		function __get( $k ) {
			return $this->atts[ 'data-' . $k ];
		}

		function __set( $k, $v ) {
			$this->atts[ 'data-' . $k ] = $v;
		}
	}
}

if ( ! class_exists( 'Am_Attributes' ) ) {
	class Am_Attributes extends Am_Cls {
		var $atts   = array();
		var $_style = null;
		var $_css   = null;
		var $_data  = null;

		function __construct( &$helper, $args = null ) {
			$this->_   = &$helper;

			$args && $this->atts = $args;
		}

		function __get( $k ) {
			if ( $k == 'css' ) {
				$this->_css === null && $this->_css = new Am_Css();

				return $this->_css;
			}
			if ( $k == 'style' ) {
				$this->_style === null && $this->_style = new Am_Styles( $this->_ );

				return $this->_style;
			}
			if ( $k == 'data' ) {
				$this->_data === null && $this->_data = new Am_Data( $this->atts );

				return $this->_data;
			}

			return $this->atts[ $k ];
		}

		function __set( $k, $v ) {
			$this->atts[ $k ] = $v;
		}
		function __isset( $k ) {
			return isset($this->atts[ $k ]);
		}
		function removeAttr( $k ) {
			unset($this->atts[ $k ]);
		}

		function __toString() {
			$r = $this->atts;
			$this->_style   && $r['style'] = $this->_style;
			$this->_css     && $r['class'] = $this->_css;

			return $this->_->getDom()->attr( $r );
		}
	}
}
