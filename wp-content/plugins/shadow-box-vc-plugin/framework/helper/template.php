<?php

if ( !class_exists( 'Am_Helper_Template' ) ) {

	class Am_Helper_Template extends Am_Cls {
		function echoTemplate( $path, $file, $data = null ) {
			$path = plugin_dir_path( $file ) . $path;

			$data = (array) $data;
			$data['_'] = &$this->_;
			if ( is_array( $data ) ) {
				extract( $data );
			}

			if ( file_exists( $path ) ) {
				require( $path );
			}
		}

		function template( $path, $file, $data = null ) {
			ob_start();
			$this->echoTemplate( $path, $file, $data );

			return ob_get_clean();
		}
	}
}