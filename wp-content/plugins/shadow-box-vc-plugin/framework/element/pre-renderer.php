<?php

if ( ! class_exists( 'Am_Element_PreRenderer_Atts' ) ) {

	class Am_Element_PreRenderer_Atts extends stdClass {
		public function __set( $property, $value ) {
			$this->$property = $value;
		}

		public function __get( $property ) {
			if ( ! property_exists( $this, $property ) ) {
				return null;
			}

			return $this->$property;
		}
	}
}

if ( ! class_exists( 'Am_Element_PreRenderer' ) ) {
	class Am_Element_PreRenderer {
		static $loadedValueClasses = array();

		/**
		 * @param Am_Element_BaseSettings $settingsClass
		 */
		function __construct( $settingsClass ) {
			$this->settingsClass = $settingsClass;
		}

		function doRender( $atts, $content ) {
			$renderClassName = sprintf( 'VcElements_%s_Render', $this->settingsClass->name );

			/** @var Am_Element_BaseRender $renderer */
			$renderer   = new $renderClassName( $this->settingsClass );
			$data       = new Am_Element_PreRenderer_Atts();
			$data->atts = $atts;


			foreach ( $this->settingsClass->getParams() as $param ) {
				$paramName = $param->param_name;
				$value     = isset( $atts[ $paramName ] ) ? $atts[ $paramName ] : null;

				$helper         = $this->settingsClass->_;
				$valueClassName = isset( self::$loadedValueClasses[ $param->type ] ) ? self::$loadedValueClasses[ $param->type ] : null;
				if ( $valueClassName || $helper->isFileExists( 'fields/' . $param->type . '/value.php', $helper->frameworkFILE ) ) {
					if ( $valueClassName === null ) {
						$helper->requireFile( 'fields/' . $param->type . '/value.php', $helper->frameworkFILE );
						self::$loadedValueClasses[ $param->type ] = $valueClassName = 'Am_Fields_' . $param->type . '_Value';
					}

					/** @var Am_Fields_BaseValue $valueClass */
					$valueClass = new $valueClassName( $helper, $value, $param->value );
					$value      = $valueClass->get();
				}

				$data->{$paramName} = $value;
			}

//			$id       = am_id( $this->settingsClass->TAG_NAME );
//			$data->id = $id;

			$elementHTML = $renderer->render( $data, $content );

			return $elementHTML;
		}
	}
}