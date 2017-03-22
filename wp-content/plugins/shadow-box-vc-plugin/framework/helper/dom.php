<?php

if ( ! class_exists( 'Am_Helper_Dom___arrayToHTMLAttributesInstance' ) ) {
	class Am_Helper_Dom___arrayToHTMLAttributesInstance {
		function __construct( $attributes ) {
			$this->attributes = $attributes;
		}

		function _do( $key ) {
			$attributes = $this->attributes;

			if ( is_bool( $attributes[ $key ] ) ) {

				return $key . '="' . ( $attributes[ $key ] ? 1 : 0 ) . '"';
//						return $attributes[$key]?$key:'';
			}

			return $key . '="' . $attributes[ $key ] . '"';
		}
	}
}
if ( ! class_exists( 'Am_Helper_Dom___arrayToHTMLStylesInstance' ) ) {
	class Am_Helper_Dom___arrayToHTMLStylesInstance {
		function __construct( $attributes ) {
			$this->attributes = $attributes;
		}

		function _do( $key ) {
			$v = $this->attributes[ $key ];

			$keys = array(
				'backgroundImage'      => 'background-image',
				'backgroundAttachment' => 'background-attachment',
				'backgroundColor'      => 'background-color',
				'borderColor'          => 'border-color',
				'borderRadius'         => 'border-radius',
				'maxWidth'             => 'max-width',
				'paddingTop'           => 'padding-top',
				'paddingBottom'        => 'padding-bottom',
				'paddingLeft'          => 'padding-left',
				'paddingRight'         => 'padding-right',
				'borderTop'            => 'border-top',
				'borderBottom'         => 'border-bottom',
				'borderLeft'           => 'border-left',
				'borderRight'          => 'border-right',
				'marginTop'            => 'margin-top',
				'marginBottom'         => 'margin-bottom',
				'marginLeft'           => 'margin-left',
				'marginRight'          => 'margin-right',
				'backgroundSize'       => 'background-size',
				'backgroundPosition'   => 'background-position',
				'backgroundRepeat'     => 'background-repeat',
				'fontFamily'           => 'font-family',
				'fontSize'             => 'font-size',
				'fontWeight'           => 'font-weight',
				'fontVariant'          => 'font-variant',
				'fontStyle'            => 'font-style',
				'textAlign'            => 'text-align',
				'textDecoration'       => 'text-decoration',
				'textTransform'        => 'text-transform',
				'lineHeight'           => 'line-height',
				'letterSpacing'        => 'letter-spacing',
				'minWidth'             => 'min-width',
				'minHeight'            => 'min-height',
			);
			if ( isset( $keys[ $key ] ) ) {
				$key = $keys[ $key ];
			}

			if ( am_is_integer( $v ) && in_array( $key, array(
					'max-width',
					'font-size',
					'padding-top',
					'padding-bottom',
					'padding-left',
					'padding-right',
					'margin-top',
					'margin-bottom',
					'margin-left',
					'margin-right'
				) )
			) {
				$v .= 'px';
			}

			if ( $key == 'background-image' ) {
				$v = "url('" . $v . "')";
			}

			if ( $key == 'background-image-important' ) {
				$key = 'background-image';
				$v = "url('" . $v . "') !important";
			}

			return $key . ':' . $v;
		}
	}
}

if ( ! class_exists( 'Am_Helper_Dom' ) ) {

	class Am_Helper_Dom extends Am_Cls {
		function div( $attrs, $content = '' ) {
			$tag = 'div';

			if( is_string($attrs)) {
				$attrs = $this->_->newAttributes( array('tag'=>$attrs));
			}

			if( is_array($attrs) ) {
				$attrs = $this->_->newAttributes($attrs);
			}

			if ( isset( $attrs->tag ) ) {
				$tag = $attrs->tag;
			}

			if ( is_array( $content ) ) {
				$content = join( '', $content );
			}

			if ( in_array( $tag, array( 'input', 'img' ) ) ) {
				$html = '<' . $tag . ' ' . $attrs . ' />';
			} else {
				$html = '<' . $tag . ' ' . $attrs . '>' . $content . '</' . $tag . '>';
			}


			return $html;
		}

		function input( $name, $value, $attrs ) {
			$attrs['tag']  = 'input';
			$attrs['name'] = $name;
			if ( $value ) {
				$attrs['value'] = $value;
			}

			return $this->div( $attrs );
		}

		function divClass( $cls, $content ) {
			return $this->div( array( 'class' => $cls ), $content );
		}

		function attr( $styles ) {
			return $this->__arrayToHTMLAttributes( $styles );
		}

		function style( $styles, $isImportant = false ) {
			return $this->__arrayToHTMLStyles( $styles, $isImportant );
		}

////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////

		private function __arrayToHTMLAttributes( $attributes ) {
			if ( ! $attributes || ! is_array( $attributes ) ) {
				return '';
			}
//var_dump($attributes);
			foreach ( $attributes as $key => $attribute ) {
				if( $key == 'tag' ) {
					unset( $attributes[ $key ] );
					continue;
				}
				if ( $attributes[ $key ] === false || $attributes[ $key ] === true ) {
					continue;
				}

				if ( ( ! $attributes[ $key ] && $attributes[ $key ] !== '0' && $attributes[ $key ] !== 0 ) || $attributes[ $key ] == '') { //
					unset( $attributes[ $key ] );
				} else if ( is_array( $attribute ) ) {
					$attributes[ $key ] = join( ' ', $attribute );
				}
			}

			$i = new Am_Helper_Dom___arrayToHTMLAttributesInstance( $attributes );

			return join(
				' ',
				array_map(
					array( $i, '_do' ),
					array_keys( $attributes )
				)
			);
		}

		function __arrayToHTMLStyles( $attributes, $isImportant = false ) {
			if ( ! $attributes ) {
				return '';
			}
			if ( ! is_array( $attributes ) ) {
				return $attributes;
			}

			$toMerge = array();

			foreach ( $attributes as $key => $attribute ) {
				if ( is_array( $attribute ) ) {
					$toMerge[] = $attribute;
					unset( $attributes[ $key ] );
					continue;
				}
				if ( ( ! $attributes[ $key ] && $attributes[ $key ] !== '' && $attributes[ $key ] !== 0 && $attributes[ $key ] !== '0' )) {// || $attributes[ $key ] === ''
					unset( $attributes[ $key ] );
					continue;
				}

				if($isImportant) {
					$attributes[ $key ] .= ' !important';
				}
			}
//var_dump($attributes);

			if ( count( $toMerge ) ) {
				foreach ( $toMerge as $key => $merge ) {
					$attributes = array_merge( $attributes, $merge );
				}
			}

			$i = new Am_Helper_Dom___arrayToHTMLStylesInstance( $attributes );

			if ( ! count( $i->attributes ) ) {
				return '';
			}

			return join(
				       '; ',
				       array_map(
					       array( $i, '_do' ),
					       array_keys( $attributes )
				       )
			       ) . '; ';
		}
	}
}