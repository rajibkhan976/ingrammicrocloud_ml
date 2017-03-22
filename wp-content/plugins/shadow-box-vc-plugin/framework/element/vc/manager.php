<?php

if ( ! class_exists( 'Am_Element_VC_Manager' ) ) {


	if(!function_exists('_am_oldVC_holderClassFilter')) {
		function _am_oldVC_holderClassFilter( $param ) {
			if ( isset( $param['is_am_type'] ) && $param['is_am_type'] ) {
				$param['vc_single_param_edit_holder_class'][] = 'am_vc_shortcode_param';
			}
			return $param;
		}
	}

	class Am_Element_VC_Manager {
		static $standardTypes = array(
			'Link'   => 'vc_link',
			'Input'  => 'textfield',
			'Color'  => 'colorpicker',
			'Image'  => 'attach_image',
			'Images' => 'attach_images',
			'Html'   => 'textarea_html'
		);

		static function isModernUI() {
			return version_compare('4.3', WPB_VC_VERSION) <= 0;
		}

		/**
		 * @param Am_Element_BaseSettings $settingsClass
		 * @param Am_Helper $helper
		 */
		static function register( $settingsClass, $helper ) {
			if(version_compare('4', WPB_VC_VERSION) > 0) return;

			$elementDir = $settingsClass->elementDir;

			if(file_exists( $elementDir . 'icon.png' )) {
				if(self::isModernUI()) {
					$helper->inlineStyle( '#' . $settingsClass->TAG_NAME . ' i.vc_element-icon,' .
					                      '.' . 'vc_element-icon_' . $settingsClass->TAG_NAME,
						array(
							'background-image'    => $helper->getUrl( 'icon.png', $elementDir . 'icon.png' ),
							'background-position' => '0px !important'
						),
						'js_composer'
					);
				} else {
					$helper->inlineStyle(
						'[data-element_type="' . $settingsClass->TAG_NAME . '"].vc_shortcodes_container' .
						',[data-element_type="' . $settingsClass->TAG_NAME . '"].wpb_content_element > .wpb_element_wrapper',
						array(
							'background-image-important'    => $helper->getUrl( 'icon.png', $elementDir . 'icon.png' )
						),
						'js_composer'
					);
					$helper->inlineStyle( 'li[data-element="' . $settingsClass->TAG_NAME . '"] #' . $settingsClass->TAG_NAME . ' i.vc-element-icon',
						array(
							'background-image'    => $helper->getUrl( 'icon.png', $elementDir . 'icon.png' ),
							'background-position' => '0px !important',
						),
						'js_composer'
					);
				}
			}

			$mapSettings = array(
				"name"        => $settingsClass->title,
				"description" => $settingsClass->description,
				"category"    => $settingsClass->category,
				"base"        => $settingsClass->TAG_NAME,
				"icon"        => 'vc_element-icon_' . $settingsClass->TAG_NAME,
			);
			$mapSettings = array_merge( $mapSettings, $settingsClass->getSettings() );

			if ( $helper->isFileExists( $elementDir . 'admin.js', true ) ) {
				$helper->addAction( array('vc_frontend_editor_render', 'vc_backend_editor_render'),
					array( $settingsClass, '_loadAdminJsScript' ));
			}
			if ( $helper->isFileExists( $elementDir . 'admin.css', true ) ) {
				$helper->addAction( array('vc_frontend_editor_render', 'vc_backend_editor_render'),
					array( $settingsClass, '_loadAdminCssScript' ));
			}


			$params = $settingsClass->getParams();
			$vcParams = array();


			foreach ( $params as $param ) {
				if(isset(self::$standardTypes[$param->type])) {
					$type = self::$standardTypes[$param->type];
				} else {
					self::registerField( $param->type, $helper );
					$type = 'Am' . $param->type;
				}

				$vcParam = array_merge(
					$param->data,
					array(
						'type'             => $type,
						'is_am_type'       => true,
						'heading'          => $param->label,
						'param_name'       => $param->param_name,
						'value'            => $param->value,
						'dependency'       => $param->dependency,
					) );

				if(self::isModernUI()) {
					$vcParam['edit_field_class'] = 'am_vc_shortcode_param vc_column';
				} else {
					add_filter('vc_single_param_edit', '_am_oldVC_holderClassFilter');
					$vcParam['param_holder_class'] = 'am_vc_shortcode_param';
				}

				$param->dependency  && $vcParam['dependency']   = $param->dependency;
				$param->group       && $vcParam['group']        = $param->group;
				$param->description && $vcParam['description']  = $param->description;
				$param->holder      && $vcParam['holder']       = $param->holder;
				$param->admin_label && $vcParam['admin_label']       = $param->admin_label;
				$vcParams[] = $vcParam;
			}


			if ( ! shortcode_exists( $settingsClass->TAG_NAME ) ) {
				$mapSettings['params'] = $vcParams;
				vc_map( $mapSettings );
			} else {
				foreach ( $mapSettings as $k => $v ) {
					if($k == 'base') continue;
					vc_map_update( $settingsClass->TAG_NAME, $k, $v );
				}
				foreach ( $vcParams as $param ) {
					vc_update_shortcode_param( $settingsClass->TAG_NAME, $param );
				}
			}

			$settingsClass->afterMap();
		}

		static $fields = array();
		/**
		 * @param $type
		 * @param Am_Helper $helper
		 */
		static function registerField($type, $helper) {
			if(isset(self::$fields[ $type ])) return;

			/** @var Am_Helper $helper */

			$fieldClassName = $helper->isFileExists( 'fields/' . $type . '/field.php', $helper->frameworkFILE )
			                  && $helper->requireFile( 'fields/' . $type . '/field.php', $helper->frameworkFILE )
				? sprintf( 'Am_Fields_%s_Field', $type ) : 'Am_Fields_BaseField';

			$fieldClass = new $fieldClassName( $type, $helper );
			if ( $helper->isAdmin() && method_exists( $fieldClass, 'loadScripts' ) ) {
				if(self::isModernUI()) {
					$helper->addAction( array('vc_frontend_editor_render', 'vc_backend_editor_render'), array( $fieldClass, 'loadScripts' ));
				} else {
					$fieldClass->loadScripts();
				}
			}

			if ( method_exists( $fieldClass, 'init' ) ) {
				$fieldClass->init();
			}

			self::$fields[ $type ] = $fieldClass;

			$touchScriptFileName = sprintf('fields/%s/touch%s.js', $type, $helper->baseFile->USE_MIN ? '.min' : '' );

			$renderer = new Am_Element_VC_FieldBodyRenderer( $fieldClass, $helper );

			add_shortcode_param(
				'Am' . $type,
				array( $renderer, 'render' ),
				$helper->isFileExists( $touchScriptFileName, $helper->frameworkFILE ) ? $helper->getUrl( $touchScriptFileName, $helper->frameworkFILE ) : null
			);
		}
	}
}