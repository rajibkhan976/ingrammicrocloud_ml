<?php

if ( ! function_exists( 'am_is_empty' ) ) {
	function am_is_empty( $element ) {
		$element = trim( $element );

		return ! empty( $element );
	}
}
if ( ! function_exists( 'am_id' ) ) {
	function am_id( $prefix = '_' ) {
		static $id;

		return $prefix . ++ $id;
	}
}

if ( ! function_exists( 'am_font_styles' ) ) {
	function am_font_styles( $arr ) {
		if ( is_object( $arr ) ) {
			$arr = (array) $arr;
		}
		if ( ! is_array( $arr ) ) {
			return array();
		}
		$allowed = array(
			'font-family',
			'font-weight',
			'font-size',
			'text-transform',
			'font-style',
			'line-height',
			'letter-spacing',
			'color'
		);
		$new     = array();

		foreach ( $arr as $k => $v ) {
			if ( ! in_array( $k, $allowed ) || ! $v ) {
				continue;
			}
			$new[ $k ] = $v;
		}

		return $new;
	}
}

if ( ! function_exists( 'am_js_remove_wpautop' ) ) {
	function am_js_remove_wpautop( $content, $autop = false ) {
		if ( $autop ) {
			$content = wpautop( preg_replace( '/<\/?p\>/', "\n", $content ) . "\n" );
		}
		return do_shortcode( shortcode_unautop( $content) );
	}
}

if ( ! function_exists( 'am_is_integer' ) ) {
	function am_is_integer( $input ) {
		return ( ctype_digit( strval( $input ) ) );
	}
}

if ( ! function_exists( 'am_array_param_search' ) ) {
	function am_array_param_search( $key, $value, $array ) {
		foreach ( $array as $k => $v ) {
			if ( is_array( $v ) && $v[ $key ] === $value ) {
				return $k;
			}
			if ( is_object( $v ) && $v->$key === $value ) {
				return $k;
			}
		}

		return null;
	}
}

if ( ! function_exists( 'am_join' ) ) {
	function am_join( $glue ) {
		$args = func_get_args();
		array_shift( $args );

		return join( $glue, $args );
	}
}

if ( ! function_exists( 'am_if' ) ) {
	function am_if( $val, $if, $else = null ) {
		if ( ! empty( $val ) || $val === 0 || $val === '0' ) { //  || $val === false
//		if( $val || $val === false || $val === 0 || $val === '0' ) {
			return $if;
		} else {
			return $else;
		}
	}
}

if ( ! function_exists( 'am_e_if' ) ) {
	function am_e_if( $val, $if, $else = null ) {
		echo am_if( $val, $if, $else );
	}
}


if ( ! function_exists( 'am_adjust_brightness' ) ) {
	function am_adjust_brightness( $hex, $steps ) {
		$steps = max( - 255, min( 255, $steps ) );

		$hex = str_replace( '#', '', $hex );
		if ( strlen( $hex ) == 3 ) {
			$hex = str_repeat( substr( $hex, 0, 1 ), 2 ) . str_repeat( substr( $hex, 1, 1 ), 2 ) . str_repeat( substr( $hex, 2, 1 ), 2 );
		}

		$r = hexdec( substr( $hex, 0, 2 ) );
		$g = hexdec( substr( $hex, 2, 2 ) );
		$b = hexdec( substr( $hex, 4, 2 ) );

		$r = max( 0, min( 255, $r + $steps ) );
		$g = max( 0, min( 255, $g + $steps ) );
		$b = max( 0, min( 255, $b + $steps ) );

		$r_hex = str_pad( dechex( $r ), 2, '0', STR_PAD_LEFT );
		$g_hex = str_pad( dechex( $g ), 2, '0', STR_PAD_LEFT );
		$b_hex = str_pad( dechex( $b ), 2, '0', STR_PAD_LEFT );

		return '#' . $r_hex . $g_hex . $b_hex;
	}
}

if ( ! function_exists( 'am_hex2rgb' ) ) {
	function am_hex2rgb( $hex ) {
		$hex = str_replace( "#", "", $hex );

		if ( strlen( $hex ) == 3 ) {
			$r = hexdec( substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) );
			$g = hexdec( substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) );
			$b = hexdec( substr( $hex, 2, 1 ) . substr( $hex, 2, 1 ) );
		} else {
			$r = hexdec( substr( $hex, 0, 2 ) );
			$g = hexdec( substr( $hex, 2, 2 ) );
			$b = hexdec( substr( $hex, 4, 2 ) );
		}
		$rgb = array( $r, $g, $b );

		//return implode(",", $rgb); // returns the rgb values separated by commas
		return $rgb; // returns an array with the rgb values
	}
}

if ( ! function_exists( 'am_hex2rgb_css' ) ) {
	function am_hex2rgb_css( $hex ) {
		$css = am_hex2rgb( $hex );

		return 'rgb(' . join( ', ', $css ) . ')';
	}
}

if ( ! function_exists( 'am_parse_multi_attribute' ) ) {
	function am_parse_multi_attribute( $value, $default = array() ) {
		$result       = $default;
		$params_pairs = explode( '|', $value );
		foreach ( $params_pairs as $pair ) {
			$param = preg_split( '/\:/', $pair );
			if ( ! empty( $param[0] ) && isset( $param[1] ) ) {
				$result[ $param[0] ] = rawurldecode( $param[1] );
			}
		}

		return $result;
	}
}

if ( ! function_exists( 'am_array_is_assoc' ) ) {
	function am_array_is_assoc( $arr ) {
		return ! array_key_exists( 0, $arr );
	}
}