<?php

if ( !class_exists( 'Am_Redux_Settings' ) ) {
	class Am_Redux_Settings extends Am_Cls {
		var $IS_SUBMENU = true;

		public $args = array();
		public $sections = array();
		public $ReduxFramework;

		public function construct() {
			$this->_->requireFile( 'redux-tracking-remove.php', __FILE__ );

			$this->_->requireFile( 'ReduxCore/framework.php', __FILE__ );
			$this->_->requireFile( 'section.php', __FILE__ );

			add_action( 'redux-enqueue-' . $this->_->SLUG, array( $this, 'customCss' ) );

			$this->args = array_merge(
				array(
					'menu_type'          => $this->IS_SUBMENU ? 'submenu' : 'menu',
					'allow_sub_menu'     => true,
					'class'              => 'am_redux_theme',
					'opt_name'           => $this->_->SLUG,
					'display_version'    => $this->_->baseFile->VERSION,
					'dev_mode'           => $this->_->IS_DEBUG,
					'customizer'         => false,
					'page_parent'        => 'options-general.php',
					'page_permissions'   => 'manage_options',
					'last_tab'           => '',
					'page_slug'          => $this->_->SLUG,
					'save_defaults'      => true,
					'show_import_export' => true,
					'update_notice'      => false,
					'footer_credit'      => 'Made with love' .
					                        '<div style="display: inline-block;margin: 0px 7px;color:#e74c3c;">♥</div>' .
					                        ' by Amino-Studio. Version is '
					                        . $this->_->baseFile->VERSION . '.'
				),
				$this->getArguments() );


			if( !$this->IS_SUBMENU ) {
				$this->args['admin_bar_links'][] = array(
					'id'    => $this->_->SLUG . '-support',
					'href'  => 'mailto:support@amino-studio.com',
					'title' => __( 'Support', $this->_->SLUG ),
				);
			}

			if( !$this->_->baseFile->IS_THEME ) {
				add_filter( 'plugin_action_links_' . sprintf('%s-plugin/%s.php', $this->_->SLUG, $this->_->SLUG) , array($this, 'createPluginLinks') );
			}

			if( !$this->_->IS_DEBUG && $this->_->baseFile->UPDATER_ID > 0 ) {
				if ( $this->_->sget('auto_updates_key') && $this->_->sget('auto_updates_enable') ) {
					$this->_->requireFile( 'common/wp-updates-plugin.php', $this->_->frameworkFILE );
					new WPUpdatesPluginUpdater( $this->_->baseFile->UPDATER_ID, 'http://wp-updates.com/api/2/plugin', plugin_basename( $this->_->__FILE__ ) );
				} else {
					add_action( 'admin_notices', array( $this, 'noticeLicenseActivation' ) );
				}
			}
		}

		public function getArguments() {
			return array();
		}

		public function noticeLicenseActivation() {
			echo '<div class="updated activation-notice"><p>' .
			     sprintf( __( 'Please <a href="%s">activate your copy</a> of %s to receive automatic updates.', $this->_->SLUG ),
				     wp_nonce_url( admin_url( 'options-general.php?page=' . $this->_->SLUG . '&=1' ) ), $this->_->NAME ) . '</p></div>';
		}

		public function createPluginLinks( $links ) {
			$links[0] = '<a href="'. get_admin_url(null, $this->args['page_parent'] . '?page='.$this->_->SLUG) .'">' .
			                    __('Settings', $this->_->SLUG) . '</a>';
			$links[] = '<a href="http://amino-studio.com/" target="_blank">' .
			                    __('More plugins by Amino-Studio', $this->_->SLUG) .'</a>';
			return $links;
		}

		public function loadSections($sections) {
//			$sections = func_get_args();
			foreach ( $sections as $section ) {
				$this->_->requireClass( "Am_Settings_Section_" . $section,
					$section . '.php', $this->_FILE_, $this );
			}
		}

		public function init() {
			$this->_->baseFile->UPDATER_ID > 0 && $this->setActivationSection();

			if ( ! isset( $this->args['opt_name'] ) ) {
				return;
			}

			add_action( 'redux/loaded', array( $this, 'remove_demo' ) );
			$this->ReduxFramework = new ReduxFramework( $this->sections, $this->args );
		}

		public function customCss() {
			if ( get_current_screen()->id == ($this->IS_SUBMENU ? 'settings_page_' : 'toplevel_page_') . $this->_->SLUG ) {
				$this->_->style( 'assets/redux-custom', __FILE__ );
			}
		}

		public function setActivationSection() {
			$this->sections[] = array(
				'type' => 'divide',
			);

			$this->sections[] = array(
				'id'     => 'activation',
				'title'  => __( 'Activation', $this->_->SLUG ),
				'fields' => array(
					array(
						'id'       => 'auto_updates_enable',
						'type'     => 'switch',
						'title'    => __( 'Enable Auto Updates', $this->_->SLUG ),
						'subtitle' => __( 'You can toggle the automatic updates on or off.', $this->_->SLUG ),
						"default"  => '0',
						'on'       => __( 'On', $this->_->SLUG ),
						'off'      => __( 'Off', $this->_->SLUG ),
					),
					array(
						'id'       => 'auto_updates_key',
						'type'     => 'text',
						'title'    => __( 'Item Purchase Code', $this->_->SLUG ),
						'subtitle' => __( 'Enter your Envato license key here if you wish to receive auto updates.', $this->_->SLUG )
						              . '<br /<br /><br />' . $this->_->getDom()->div( array(
								'tag' => 'img',
								'src' => $this->_->getUrl( 'assets/license-key-hint.jpg', __FILE__ )
							) ),
						'required' => array( 'auto_updates_enable', 'equals', '1' ),
						'validate_callback' => array( $this, 'validatePurchaseCode' )
					)
				),
			);
		}

		function validatePurchaseCode( $field, $value, $existing_value ) {
			$error = false;

			if ( ! $value || ! preg_match( "/^\w{8}-\w{4}-\w{4}-\w{4}-\w{11,20}$/i", $value ) ) {
				$error        = true;
				$field['msg'] = __('Sorry, you enter invalid Purchase Code', $this->_->SLUG);
			}


			$return['value'] = $value;
			if ( $error == true ) {
				$return['error'] = $field;
			}

			return $return;
		}

		function remove_demo() {
			if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
				remove_filter( 'plugin_row_meta', array(
						ReduxFrameworkPlugin::instance(),
						'plugin_metalinks'
					), null, 2 );
				remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
			}
		}
	}
}