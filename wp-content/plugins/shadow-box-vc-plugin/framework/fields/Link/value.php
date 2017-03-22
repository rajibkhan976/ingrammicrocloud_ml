<?php


if ( !class_exists( 'Am_Fields_Link_Value' ) ) {

	class Am_Fields_Link_Value extends Am_Fields_BaseValue {
		public function get() {
			return $this;
		}

		public function getLinkData() {
			$value = $this->value;

			return (object) vc_build_link( $value );
		}

		/**
		 * @param Am_Attributes $a
		 *
		 * @return object
		 */
		public function putData( $a ) {
			$data = $this->getLinkData();

			$data->url     && $a->href = $data->url;
			$data->title   && $a->title = $data->title;
			$data->target   && $a->target = $data->target;
		}
	}
}