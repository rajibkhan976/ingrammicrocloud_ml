<?php

if ( class_exists( 'Am_Helper_FontLoader' ) ) {
	return;
}

class Am_Helper_FontLoader extends Am_Cls {
	var $googleFonts;
	var $subsets;

	function construct( ) {
		$this->googleFonts = array();
		$this->subsets     = array();
	}

	function setSubsets( $ss ) {
		if ( ! $ss || ! is_object( $ss ) ) {
			return;
		}

		foreach ( $ss as $name => $enabled ) {
			if ( ! $enabled ) {
				continue;
			}
			$this->subsets[] = $name;
		}

	}

	function add( $font ) {
		if ( ! $font ) {
			return;
		}

		if ( is_array( $font ) ) {
			$font = (object) $font;
		}

		if ( isset($font->google) && $font->google ) {
			$name = $font->{'font-family'};
			if(!$name) return;
			if ( ! isset( $this->googleFonts[ $name ] ) ) {
				$this->googleFonts[ $name ]['weight'] = array();
			}

			$variant = $font->{'font-weight'};
			if ( $variant ) {
				$this->googleFonts[ $name ]['weight'][] = $variant;
			}
		}
	}

	function enqueue() {
		$families = array();

		foreach ( $this->googleFonts as $name => $font ) {
			$name = preg_replace("/[\s_]/", "+", $name);
//			$name = str_replace( ' ', '+', $name );

			if ( count( $font['weight'] ) ) {
				$name .= ':' . join( ',', $font['weight'] );
			}

			$families[] = $name;
		}

		if ( ! count( $families ) ) {
			return;
		}

		$query = join( '|', $families );

		if ( count( $this->subsets ) ) {
			$query .= '&subset=' . join( ',', $this->subsets );
		}

		$this->_->proxyWpEnqueueStyle( intval($query, 36), '//fonts.googleapis.com/css' . '?family=' .  $query, array(), $this->_->baseFile->VERSION );

		//clear
		$this->googleFonts = array();
	}
}