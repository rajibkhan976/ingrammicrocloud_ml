<?php


if ( !class_exists( 'Am_Fields_Margins4_Value' ) ) {

	class Am_Fields_Margins4_Value extends Am_Fields_BaseValue {
		public function get() {
			return $this;
		}

		public function parse() {
			$v = $this->value;

			if ( ! $v || $v == "null" ) {
				return array(
					'top'    => null,
					'right'  => null,
					'bottom' => null,
					'left'   => null,
				);
			}

			$values = explode( ' ', $v );

			return array(
				'top'    => isset( $values[0] ) ? $values[0] : null,
				'right'  => isset( $values[1] ) ? $values[1] : null,
				'bottom' => isset( $values[2] ) ? $values[2] : null,
				'left'   => isset( $values[3] ) ? $values[3] : null,
			);
		}

		public function css() {
			$data = $this->parse();
			if ( $data['top'] === null && $data['right'] === null && $data['bottom'] === null && $data['left'] === null ) {
				return null;
			}

			return join( ' ', array(
				( isset( $data['top'] ) ? $data['top'] : 0 ) . 'px',
				( $data['right'] ? $data['right'] : 0 ) . 'px',
				( $data['bottom'] ? $data['bottom'] : 0 ) . 'px',
				( $data['left'] ? $data['left'] : 0 ) . 'px'
			) );
		}

		public function styles( $prefix = '' ) {
			$data   = $this->parse();
			$styles = array();

			foreach ( $data as $k => $v ) {
				if ( $v === null ) {
					continue;
				}

				$styles[ $prefix . '-' . $k ] = $v . 'px';
			}

			return $styles;
		}
	}
}