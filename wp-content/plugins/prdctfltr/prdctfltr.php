<?php
/*
Plugin Name: WooCommerce Product Filter
Plugin URI: http://www.mihajlovicnenad.com/product-filter
Description: Advanced product filter for any Wordpress template! - mihajlovicnenad.com
Author: Mihajlovic Nenad
Version: 4.0.0
Author URI: http://www.mihajlovicnenad.com
*/

	class WC_Prdctfltr {

		public static $dir;
		public static $path;
		public static $url_path;
		public static $settings;

		public static function init() {
			$class = __CLASS__;
			new $class;
		}

		function __construct() {

			self::$dir = dirname( __FILE__ );
			self::$path = plugin_dir_path( __FILE__ );
			self::$url_path = plugins_url( basename( self::$dir ) );

			$this->settings['permalink_structure'] = get_option( 'permalink_structure' );
			$this->settings['wc_settings_prdctfltr_disable_scripts'] = get_option( 'wc_settings_prdctfltr_disable_scripts', array() );
			$this->settings['wc_settings_prdctfltr_ajax_js'] = get_option( 'wc_settings_prdctfltr_ajax_js', '' );
			$this->settings['wc_settings_prdctfltr_custom_tax'] = get_option( 'wc_settings_prdctfltr_custom_tax', 'no' );
			$this->settings['wc_settings_prdctfltr_enable'] = get_option( 'wc_settings_prdctfltr_enable', 'yes' );
			$this->settings['wc_settings_prdctfltr_default_templates'] = get_option( 'wc_settings_prdctfltr_default_templates', 'no' );
			$this->settings['wc_settings_prdctfltr_force_categories'] = get_option( 'wc_settings_prdctfltr_force_categories', 'no' );
			$this->settings['wc_settings_prdctfltr_instock'] = get_option( 'wc_settings_prdctfltr_instock', 'no' );
			$this->settings['wc_settings_prdctfltr_use_ajax'] = get_option( 'wc_settings_prdctfltr_use_ajax', 'no' );
			$this->settings['wc_settings_prdctfltr_ajax_class'] = get_option( 'wc_settings_prdctfltr_ajax_class', '' );
			$this->settings['wc_settings_prdctfltr_ajax_columns'] = get_option( 'wc_settings_prdctfltr_ajax_columns', '4' );
			$this->settings['wc_settings_prdctfltr_ajax_rows'] = get_option( 'wc_settings_prdctfltr_ajax_rows', '4' );
			$this->settings['wc_settings_prdctfltr_force_redirects'] = get_option( 'wc_settings_prdctfltr_force_redirects', 'no' );
			$this->settings['wc_settings_prdctfltr_force_emptyshop'] = get_option( 'wc_settings_prdctfltr_force_emptyshop', 'no' );

			$this->settings['wc_settings']['product_taxonomies'] = get_object_taxonomies( 'product' );

			if ( $this->settings['wc_settings_prdctfltr_custom_tax'] == 'yes' ) {
				add_action( 'init', 'prdctfltr_characteristics', 0 );
			}

			if ( $this->settings['wc_settings_prdctfltr_enable'] == 'yes') {
				add_filter( 'woocommerce_locate_template', array( &$this, 'prdctrfltr_add_loop_filter' ), 10, 3 );
				add_filter( 'wc_get_template_part', array( &$this, 'prdctrfltr_add_filter' ), 10, 3 );
			}

			if ( $this->settings['wc_settings_prdctfltr_enable'] == 'no' && $this->settings['wc_settings_prdctfltr_default_templates'] == 'yes' ) {
				add_filter( 'woocommerce_locate_template', array( &$this, 'prdctrfltr_add_loop_filter_blank' ), 10, 3 );
				add_filter( 'wc_get_template_part', array( &$this, 'prdctrfltr_add_filter_blank' ), 10, 3 );
			}

			if ( !is_admin() && $this->settings['wc_settings_prdctfltr_force_categories'] == 'no' ) {
				if ( $this->settings['wc_settings_prdctfltr_force_redirects'] !== 'yes' && $this->settings['permalink_structure'] !== '' ) {
					add_action( 'template_redirect', array( &$this, 'prdctfltr_redirect' ), 999 );
				}
				if ( $this->settings['wc_settings_prdctfltr_force_emptyshop'] !== 'yes' ) {
					add_action( 'template_redirect',array( &$this, 'prdctfltr_redirect_empty_shop' ), 998 );
				}
			}

			if ( $this->settings['wc_settings_prdctfltr_use_ajax'] == 'yes') {
				add_filter( 'woocommerce_pagination_args', array( &$this, 'prdctfltr_pagination_filter' ), 999, 1 );
			}

			add_action( 'init', array( &$this, 'prdctfltr_text_domain' ) );
			add_action( 'wp_enqueue_scripts', array( &$this, 'prdctfltr_scripts' ) );
			add_filter( 'pre_get_posts', array( &$this, 'prdctfltr_wc_query' ), 999999, 1 );

			add_action( 'prdctfltr_output', array( &$this, 'prdctfltr_get_filter' ), 10 );

		}

		/**
		 * Product Filter Translation
		 */
		function prdctfltr_text_domain() {
			$dir = trailingslashit( WP_LANG_DIR );
			load_plugin_textdomain( 'prdctfltr', false, $dir . 'plugins' );
		}

		/**
		 * Product Load Scripts
		 */
		function prdctfltr_scripts() {

			$curr_scripts = $this->settings['wc_settings_prdctfltr_disable_scripts'];

			wp_register_style( 'prdctfltr-main-css', self::$url_path .'/lib/css/prdctfltr.css', false, '4.0.0' );
			wp_enqueue_style( 'prdctfltr-main-css' );

			if ( !in_array( 'mcustomscroll', $curr_scripts ) ) {
				wp_register_style( 'prdctfltr-scrollbar-css', self::$url_path .'/lib/css/jquery.mCustomScrollbar.css', false, '4.0.0' );
				wp_enqueue_style( 'prdctfltr-scrollbar-css' );
				wp_register_script( 'prdctfltr-scrollbar-js', self::$url_path .'/lib/js/jquery.mCustomScrollbar.concat.min.js', array( 'jquery' ), '4.0.0', true );
				wp_enqueue_script( 'prdctfltr-scrollbar-js' );
			}

			if ( !in_array( 'isotope', $curr_scripts ) ) {
				wp_register_script( 'prdctfltr-isotope-js', self::$url_path .'/lib/js/isotope.js', array( 'jquery' ), '4.0.0', true );
				wp_enqueue_script( 'prdctfltr-isotope-js' );
			}

			if ( !in_array( 'ionrange', $curr_scripts ) ) {
				wp_register_style( 'prdctfltr-ionrange-css', self::$url_path .'/lib/css/ion.rangeSlider.css', false, '4.0.0' );
				wp_enqueue_style( 'prdctfltr-ionrange-css' );
				wp_register_script( 'prdctfltr-ionrange-js', self::$url_path .'/lib/js/ion.rangeSlider.min.js', array( 'jquery' ), '4.0.0', false );
				wp_enqueue_script( 'prdctfltr-ionrange-js' );
			}

			wp_register_script( 'prdctfltr-main-js', self::$url_path .'/lib/js/prdctfltr_main.js', array( 'jquery', 'hoverIntent' ), '4.0.0', true );
			wp_enqueue_script( 'prdctfltr-main-js' );

			$curr_args = array(
				'ajax' => admin_url( 'admin-ajax.php' ),
				'url' => self::$url_path,
				'js' => $this->settings['wc_settings_prdctfltr_ajax_js'],
				'use_ajax' => $this->settings['wc_settings_prdctfltr_use_ajax'],
				'ajax_class' => $this->settings['wc_settings_prdctfltr_ajax_class'],
				'localization' => array(
					'close_filter' => __( 'Close filter', 'prdctfltr' )
				)
			);

			wp_localize_script( 'prdctfltr-main-js', 'prdctfltr', $curr_args );
		}

		/*
		 * Product Filter Pre_Get_Posts
		*/
		function prdctfltr_wc_query( $query ) {
			global $prdctfltr_global;
			if ( is_admin() && ( defined('DOING_AJAX') && DOING_AJAX ) === false ) {
				return;
			}
			else if ( !is_admin() && ( isset( $query->query['prdctfltr'] ) && $query->query['prdctfltr'] == 'active' ) !== false ) {
				$pf_mode = 'shortcode';
			}
			else if ( !is_admin() && $query->is_main_query() && ( $query->is_tax( $this->settings['wc_settings']['product_taxonomies'] ) || !is_admin() && $query->is_main_query() && $query->is_post_type_archive( 'product' ) || !is_admin() && $query->is_main_query() && ( isset( $query->query_vars['page_id'] ) && $query->query_vars['page_id'] == ( self::prdctfltr_wpml_get_id( wc_get_page_id( 'shop' ) ) ) ) ) ) {
				$pf_mode = 'archive';
			}
			else if ( ( ( isset( $query->query['wc_query'] ) && $query->query['wc_query'] == 'product_query' ) !== false || ( isset( $query->query['post_type'] ) && $query->query['post_type'] == 'product' ) !== false ) && isset( $prdctfltr_global['ajax'] ) && ( defined('DOING_AJAX') && DOING_AJAX ) ) {
				$pf_mode = 'shortcode_ajax';
			}
			else {
				return;
			}

			$curr_args = array();
			$pf_next = array();
			$f_attrs = array();
			$f_terms = array();
			$rng_terms = array();

			$product_taxonomies = $this->settings['wc_settings']['product_taxonomies'];
			$pf_not_allowed = array( 'product_cat', 'product_tag', 'characteristics', 'product_type' );

			foreach ( $product_taxonomies as $pf_tax ) {
				if ( !in_array( $pf_tax, $pf_not_allowed ) ) {
					$pf_next[] = $pf_tax;
				}
			}

			$pf_allowed = array( 'products_per_page', 'instock_products', 'orderby' );

			if ( isset( $prdctfltr_global['ajax'] ) ) {
				foreach( $query->query as $k => $v ){
					if ( substr($k, 0, 4) == 'rng_' && $v !== '' ) {
						if ( substr($k, 0, 8) == 'rng_min_' ) {
							$rng_terms[str_replace('rng_min_', '', $k)]['min'] = $v;
						}
						else if ( substr($k, 0, 8) == 'rng_max_' ) {
							$rng_terms[str_replace('rng_max_', '', $k)]['max'] = $v;
						}
						else if ( substr($k, 0, 10) == 'rng_order_' ) {
							$rng_terms[str_replace('rng_order_', '', $k)]['order'] = $v;
						}
						$_GET[$k] = $v;
					}
					else if ( in_array($k, $pf_next) && substr($k, 0, 3) == 'pa_' ) {
						$_GET[$k] = $v;
					}
					else if ( in_array( $k, $product_taxonomies ) ) {
						$_GET[$k] = $v;
					}
					else if ( in_array( $k, $pf_allowed ) ) {
						$_GET[$k] = $v;
					}
				}
			}

			$pf_not_allowed = array( 'product_cat', 'product_tag', 'characteristics', 'min_price', 'max_price', 'sale_products', 'instock_products', 'products_per_page', 'widget_search', 'page_id', 'lang' );

			foreach( $_GET as $k => $v ){
				if ( !in_array($k, $pf_not_allowed) ) {
					if ( substr($k, 0, 4) == 'rng_' && $v !== '' ) {
						$curr_val = str_replace('rng_max_', '', $k);
						if ( substr($k, 0, 8) == 'rng_min_' ) {
							$rng_terms[str_replace('rng_min_', '', $k)]['min'] = $v;
						}
						else if ( substr($k, 0, 8) == 'rng_max_' ) {
							$rng_terms[str_replace('rng_max_', '', $k)]['max'] = $v;
						}
						else if ( substr($k, 0, 12) == 'rng_orderby_' ) {
							$rng_terms[str_replace('rng_orderby_', '', $k)]['orderby'] = $v;
						}
						else if ( substr($k, 0, 10) == 'rng_order_' ) {
							$rng_terms[str_replace('rng_order_', '', $k)]['order'] = $v;
						}
					}
					else if ( in_array($k, $pf_next) && substr($k, 0, 3) == 'pa_' ) {
						$curr_args = array_merge( $curr_args, array(
								$k => $v
							) );
						$f_attrs[] = '"attribute_'.$k.'"';
						if ( strpos($v, ',') ) {
							$v_val = explode(',', $v);
							foreach ( $v_val as $o => $z ) {
								$f_terms[] = '"'.self::prdctfltr_utf8_decode($z).'"';
							}
						}
						else if ( strpos($v, '+') ) {
							$v_val = explode('+', $v);
							foreach ( $v_val as $o => $z ) {
								$f_terms[] = '"'.self::prdctfltr_utf8_decode($z).'"';
							}
						}
						else {
							$f_terms[] = '"'.self::prdctfltr_utf8_decode($v).'"';
						}
					}
					else if ( in_array( $k, $product_taxonomies ) ) {
						$curr_args = array_merge( $curr_args, array(
								$k => $v
							) );
					}
				}
			}

			if ( !empty($rng_terms) ) {

				foreach ( $rng_terms as $rng_name => $rng_inside ) {

					if ( ( isset($rng_inside['min']) && isset($rng_inside['max']) ) === false ) {
						continue;
					}

					if ( !in_array( $rng_name, array( 'price' ) ) ) {

						if ( isset($rng_terms[$rng_name]['orderby']) && $rng_terms[$rng_name]['orderby'] == 'number' ) {
							$attr_args = array(
								'hide_empty' => 1,
								'orderby' => 'slug'
							);
							$sort_args = array(
								'order' => ( isset( $rng_terms[$rng_name]['order'] ) ? $rng_terms[$rng_name]['order'] : 'ASC' )
							);
							$curr_attributes = self::prdctfltr_get_terms( $rng_name, $attr_args );
							$curr_attributes = self::prdctfltr_sort_terms_naturally( $curr_attributes, $sort_args );
						}
						else if ( isset($rng_terms[$rng_name]['orderby']) && $rng_terms[$rng_name]['orderby'] !== '' ) {
							$attr_args = array(
								'hide_empty' => 1,
								'orderby' => $rng_terms[$rng_name]['orderby'],
								'order' => ( isset( $rng_terms[$rng_name]['order'] ) ? $rng_terms[$rng_name]['order'] : 'ASC' )
							);
							$curr_attributes = self::prdctfltr_get_terms( $rng_name, $attr_args );
						}
						else {
							$attr_args = array(
								'hide_empty' => 1
							);
							$curr_attributes = self::prdctfltr_get_terms( $rng_name, $attr_args );
						}

						if ( empty( $curr_attributes ) ) {
							continue;
						}

						$rng_found = false;
						$curr_ranges = array();
						foreach ( $curr_attributes as $c => $s ) {
							if ( $rng_found == true ) {
								$curr_ranges[] = $s->slug;
								if ( $s->slug == $rng_inside['max'] ) {
									$rng_found = false;
									continue;
								}
							}
							if ( $s->slug == $rng_inside['min'] && $rng_found === false ) {
								$rng_found = true;
								$curr_ranges[] = $s->slug;
							}
						}
						$curr_args = array_merge( $curr_args, array(
								$rng_name => implode( $curr_ranges, ',' )
							) );

						$f_attrs[] = '"attribute_' . $rng_name . '"';
						$f_terms_rng = array();
						foreach ( $curr_ranges as $c ) {
							$f_terms_rng[] = '"' . $c . '"';
						}
						$f_terms[] = implode( $f_terms_rng, ',' );
					}

				}
			}

			if ( !isset($_GET['orderby']) && isset($query->query['orderby']) && $query->query['orderby'] !== '' ) {
				$_GET['orderby'] = $query->query['orderby'];
			}

			if ( isset($_GET['orderby']) && $_GET['orderby'] !== '' ) {
				if ( $_GET['orderby'] == 'price' || $_GET['orderby'] == 'price-desc' ) {
					$orderby = 'meta_value_num';
					$order = ( $_GET['orderby'] == 'price-desc' ? 'DESC' : 'ASC' );
					$curr_args = array_merge( $curr_args, array(
							'meta_key' => '_price',
							'orderby' => $orderby,
							'order' => $order
						) );
				}
				else if ( $_GET['orderby'] == 'rating' ) {
					add_filter( 'posts_clauses', array( WC()->query, 'order_by_rating_post_clauses' ) );
				}
				else if ( $_GET['orderby'] == 'popularity' ) {
					$orderby = 'meta_value_num';
					$order = 'DESC';
					$curr_args = array_merge( $curr_args, array(
							'meta_key' => 'total_sales',
							'orderby' => $orderby,
							'order' => $order
						) );
				}
				else {
					$orderby = $_GET['orderby'];
					$order = ( isset($_GET['order']) ? $_GET['order'] : in_array( $orderby, array( 'date', 'comment_count' ) ) ? 'DESC' : 'ASC' );
					$curr_args = array_merge( $curr_args, array(
							'orderby' => $orderby,
							'order' => $order
						) );
				}
			}

			if ( isset($_GET['product_cat']) && $_GET['product_cat'] !== '' ) {
				$curr_args = array_merge( $curr_args, array(
							'product_cat' => $_GET['product_cat']
					) );
			}
			else if ( get_query_var('product_cat') !== '' ) {
				$curr_args = array_merge( $curr_args, array(
							'product_cat' => get_query_var('product_cat')
					) );
			}
			else if ( isset($query->query['product_cat']) ) {
				$curr_args = array_merge( $curr_args, array(
							'product_cat' => $query->query['product_cat']
					) );
			}

			if ( isset($_GET['product_tag']) && $_GET['product_tag'] !== '' ) {
				$curr_args = array_merge( $curr_args, array(
							'product_tag' => $_GET['product_tag']
					) );
			}
			else if ( get_query_var('product_tag') !== '' ) {
				$curr_args = array_merge( $curr_args, array(
							'product_tag' => get_query_var('product_tag')
					) );
			}
			else if ( isset($query->query['product_tag']) ) {
				$curr_args = array_merge( $curr_args, array(
							'product_tag' => $query->query['product_tag']
					) );
			}

			if ( isset($_GET['characteristics']) && $_GET['characteristics'] !== '' ) {
				$curr_args = array_merge( $curr_args, array(
							'characteristics' => $_GET['characteristics']
					) );
			}
			else if ( get_query_var('characteristics') !== '' ) {
				$curr_args = array_merge( $curr_args, array(
							'characteristics' => get_query_var('characteristics')
					) );
			}
			else if ( isset($query->query['product_characteristics']) ) {
				$curr_args = array_merge( $curr_args, array(
							'characteristics' => $query->query['product_characteristics']
					) );
			}

			if ( !isset($_GET['min_price']) && !isset($_GET['rng_min_price']) && isset($query->query['min_price']) && $query->query['min_price'] !== '' ) {
				$_GET['min_price'] = $query->query['min_price'];
			}
			if ( !isset($_GET['max_price']) && !isset($_GET['rng_max_price']) && isset($query->query['max_price']) && $query->query['max_price'] !== '' ) {
				$_GET['max_price'] = $query->query['max_price'];
			}

			if ( ( isset($_GET['min_price']) || isset($_GET['max_price']) ) !== false || ( isset($_GET['rng_min_price']) && isset($_GET['rng_max_price']) ) !== false || ( isset($_GET['sale_products']) || isset($query->query['sale_products']) ) !== false ) {
				add_filter( 'posts_join' , array( &$this, 'prdctfltr_join_price' ) );
				add_filter( 'posts_where' , array( &$this, 'prdctfltr_price_filter' ), 998, 2 );
			}

			if ( !isset($_GET['instock_products']) && isset($query->query['instock_products']) && $query->query['instock_products'] !== '' ) {
				$_GET['instock_products'] = $query->query['instock_products'];
			}

			$curr_instock = $this->settings['wc_settings_prdctfltr_instock'];

			if ( ( ( ( isset($_GET['instock_products']) && $_GET['instock_products'] !== '' && ( $_GET['instock_products'] == 'in' || $_GET['instock_products'] == 'out' ) ) || $curr_instock == 'yes' ) !== false ) && ( !isset($_GET['instock_products']) || $_GET['instock_products'] !== 'both' ) ) {
				
				if ( !isset($_GET['instock_products']) && $curr_instock == 'yes' ) {
					$i_arr['f_results'] = 'outofstock';
					$i_arr['s_results'] = 'instock';
				}
				else if ( $_GET['instock_products'] == 'in' ) {
					$i_arr['f_results'] = 'outofstock';
					$i_arr['s_results'] = 'instock';
				}
				else if ( $_GET['instock_products'] == 'out' ) {
					$i_arr['f_results'] = 'instock';
					$i_arr['s_results'] = 'outofstock';
				}

					if ( count($f_terms) == 0 ) {
						foreach($query->query as $k => $v){
							if (substr($k, 0, 3) == 'pa_') {
								$f_attrs[] = '"attribute_'.$k.'"';

								if ( strpos($v, ',') ) {
									$v_val = explode(',', $v);
									foreach ( $v_val as $o => $z ) {
										$f_terms[] = '"'.self::prdctfltr_utf8_decode($z).'"';
									}
								}
								else if ( strpos($v, '+') ) {
									$v_val = explode('+', $v);
									foreach ( $v_val as $o => $z ) {
										$f_terms[] = '"'.self::prdctfltr_utf8_decode($z).'"';
									}
								}
								else {
									$f_terms[] = '"'.self::prdctfltr_utf8_decode($v).'"';
								}

							}
						}
					}

					$curr_atts = join(',', $f_attrs);
					$curr_terms = join(',', $f_terms);
					$curr_count = count($f_attrs)+1;

					if ( $curr_count > 1 ) {

						global $wpdb;

						$pf_exclude_product = $wpdb->get_results( $wpdb->prepare( '
							SELECT DISTINCT(post_parent) FROM %1$s
							INNER JOIN %2$s ON (%1$s.ID = %2$s.post_id)
							WHERE %1$s.post_parent != "0"
							AND %2$s.meta_key IN ("_stock_status",'.$curr_atts.')
							AND %2$s.meta_value IN ("'.$i_arr['f_results'].'",'.$curr_terms.',"")
							GROUP BY %2$s.post_id
							HAVING COUNT(DISTINCT %2$s.meta_value) = ' . $curr_count .'
							ORDER BY %1$s.ID ASC
						', $wpdb->posts, $wpdb->postmeta ) );

						$curr_in = array();
						foreach ( $pf_exclude_product as $p ) {
							$curr_in[] = $p->post_parent;
						}

						$pf_exclude_product_out = $wpdb->get_results( $wpdb->prepare( '
							SELECT DISTINCT(post_parent) FROM %1$s
							INNER JOIN %2$s ON (%1$s.ID = %2$s.post_id)
							WHERE %1$s.post_parent != "0"
							AND %2$s.meta_key IN ("_stock_status",'.$curr_atts.')
							AND %2$s.meta_value IN ("'.$i_arr['s_results'].'",'.$curr_terms.',"")
							GROUP BY %2$s.post_id
							HAVING COUNT(DISTINCT %2$s.meta_value) = ' . $curr_count .'
							ORDER BY %1$s.ID ASC
						', $wpdb->posts, $wpdb->postmeta ) );

						$curr_in_out = array();
						foreach ( $pf_exclude_product_out as $p ) {
							$curr_in_out[] = $p->post_parent;
						}

						if ( $curr_instock == 'yes' || $_GET['instock_products'] == 'in' ) {

							foreach ( $curr_in as $q => $w ) {
								if ( in_array( $w, $curr_in_out) ) {
									unset($curr_in[$q]);
								}
							}
							$curr_args = array_merge( $curr_args, array(
										'post__not_in' => $curr_in
								) );

							add_filter( 'posts_join' , array( &$this, 'prdctfltr_join_instock' ) );
							add_filter( 'posts_where' , array( &$this, 'prdctfltr_instock_filter' ), 999, 2 );


						}
						else if ( $_GET['instock_products'] == 'out' ) {

							foreach ( $curr_in_out as $e => $r ) {
								if ( in_array( $r, $curr_in) ) {
									unset($curr_in_out[$e]);
								}
							}

							$pf_exclude_product_addon = $wpdb->get_results( $wpdb->prepare( '
								SELECT DISTINCT(ID) FROM %1$s
								INNER JOIN %2$s ON (%1$s.ID = %2$s.post_id)
								WHERE %1$s.post_parent = "0"
								AND %2$s.meta_key IN ("_stock_status",'.$curr_atts.')
								AND %2$s.meta_value IN ("outofstock",'.$curr_terms.')
								GROUP BY %2$s.post_id
								ORDER BY %1$s.ID ASC
							', $wpdb->posts, $wpdb->postmeta ) );

							$curr_in_out_addon = array();
							foreach ( $pf_exclude_product_addon as $a ) {
								$curr_in_out_addon[] = $a->ID;
							}

							$curr_in_out = $curr_in_out + $curr_in_out_addon;

							$curr_args = array_merge( $curr_args, array(
										'post__in' => $curr_in_out
								) );

						}

					}
					else {
						if ( !isset($_GET['instock_products']) && $curr_instock == 'yes' ) {
							add_filter( 'posts_join' , array( &$this, 'prdctfltr_join_instock' ) );
							add_filter( 'posts_where' , array( &$this, 'prdctfltr_instock_filter' ), 999, 2 );
						}
						else if ( isset($_GET['instock_products']) && $_GET['instock_products'] == 'in' ) {
							add_filter( 'posts_join' , array( &$this, 'prdctfltr_join_instock' ) );
							add_filter( 'posts_where' , array( &$this, 'prdctfltr_instock_filter' ), 999, 2 );
						}
						else if ( isset($_GET['instock_products']) && $_GET['instock_products'] == 'out' ) {
							add_filter( 'posts_join' , array( &$this, 'prdctfltr_join_instock' ) );
							add_filter( 'posts_where' , array( &$this, 'prdctfltr_outofstock_filter' ), 999, 2 );
						}
					}

			}

			if ( isset($_GET['products_per_page']) && $_GET['products_per_page'] !== '' ) {
				$curr_args = array_merge( $curr_args, array(
					'posts_per_page' => floatval( $_GET['products_per_page'] )
				) );
			}

			if ( isset($query->query_vars['http_query']) ) {
				parse_str(html_entity_decode($query->query['http_query']), $curr_http_args);
				$curr_args = array_merge( $curr_args, $curr_http_args );
			}

			$pf_tax_query = array ();

			foreach ( $curr_args as $k => $v ) {
				if ( in_array($k, $product_taxonomies ) ) {

					if ( strpos($v, ',') ) {
						$pf_tax_query[] = array( 'taxonomy' => $k, 'field' => 'slug', 'terms' => explode(',', $v), 'operator' => 'IN' );
					}
					else if ( strpos($v, '+') ) {
						if ( $k == 'product_cat' ) {
							$operator = 'IN';
						}
						else {
							$operator = 'AND';
						}
						$pf_tax_query[] = array( 'taxonomy' => $k, 'field' => 'slug', 'terms' => explode('+', $v), 'operator' => $operator );
					}
					else {
						$pf_tax_query[] = array( 'taxonomy' => $k, 'field' => 'slug', 'terms' => array( $v ) );
					}
					$query->set( $k, $v );

				}
				else {
					$query->set( $k, $v );
				}
			}

			if ( !empty($pf_tax_query) ) {

				$pf_tax_query['relation'] = 'AND';
				$query->set( 'tax_query', $pf_tax_query );

			}

		}

		/*
		 * Product Filter Join Sale Tables
		*/
		function prdctfltr_join_price($join){

			global $wpdb;

			$join .= " JOIN $wpdb->postmeta AS pf_price ON $wpdb->posts.ID = pf_price.post_id JOIN $wpdb->postmeta AS pf_price_max ON $wpdb->posts.ID = pf_price_max.post_id ";

			return $join;

		}

		/*
		 * Product Filter Join Instock Tables
		*/
		function prdctfltr_join_instock($join){
			global $wpdb;
			$join .= " JOIN $wpdb->postmeta AS pf_instock ON $wpdb->posts.ID = pf_instock.post_id ";
			return $join;
		}

		/*
		 * Product Filter Sale Filter
		*/
		function prdctfltr_price_filter ( $where, &$wp_query ) {
			global $wpdb;

			if ( ( isset( $_GET['sale_products'] ) && $_GET['sale_products'] == 'on' ) !== false || ( isset( $wp_query->query_vars['sale_products'] ) && $wp_query->query_vars['sale_products'] ) !== false ) {

				$pf_sale = true;
				$pf_where_keys = array(
					'"_sale_price","_min_variation_sale_price"',
					'"_sale_price","_max_variation_sale_price"',
					'meta_keys' => array( '_sale_price', '_min_variation_sale_price', '_max_variation_sale_price' )
				);

			}
			else {

				$pf_sale = false;
				$pf_where_keys = array(
					'"_price","_min_variation_price","_sale_price","_min_variation_sale_price"',
					'"_price","_max_variation_price","_sale_price","_max_variation_sale_price"',
					'meta_keys' => array( '_price', '_min_variation_price', '_max_variation_price' )
				);

			}

			if ( isset( $wp_query->query_vars['rng_min_price'] ) ) {
				$_min_price = $wp_query->query_vars['rng_min_price'];
			}
			if ( isset( $wp_query->query_vars['min_price'] ) ) {
				$_min_price =  $wp_query->query_vars['min_price'];
			}
			if ( isset( $_GET['rng_min_price'] ) ) {
				$_min_price = $_GET['rng_min_price'];
			}
			if ( isset( $_GET['min_price'] ) ) {
				$_min_price =  $_GET['min_price'];
			}
			if ( !isset( $_min_price ) ) {
				$_min = floor( $wpdb->get_var(
					$wpdb->prepare('
						SELECT min(meta_value + 0)
						FROM %1$s
						LEFT JOIN %2$s ON %1$s.ID = %2$s.post_id
						WHERE ( meta_key = \'%3$s\' OR meta_key = \'%4$s\' )
						AND meta_value != ""
						', $wpdb->posts, $wpdb->postmeta, $pf_where_keys['meta_keys'][0], $pf_where_keys['meta_keys'][1] )
					)
				);
			}

			if ( isset( $wp_query->query_vars['rng_max_price'] ) ) {
				$_max_price = $wp_query->query_vars['rng_max_price'];
			}
			if ( isset( $wp_query->query_vars['max_price'] ) ) {
				$_max_price =  $wp_query->query_vars['max_price'];
			}
			if ( isset( $_GET['rng_max_price'] ) ) {
				$_max_price = $_GET['rng_max_price'];
			}
			if ( isset( $_GET['max_price'] ) ) {
				$_max_price =  $_GET['max_price'];
			}

			if ( !isset( $_max_price ) ) {
				$_max = ceil( $wpdb->get_var(
					$wpdb->prepare('
						SELECT max(meta_value + 0)
						FROM %1$s
						LEFT JOIN %2$s ON %1$s.ID = %2$s.post_id
						WHERE ( meta_key = \'%3$s\' OR meta_key = \'%4$s\' )
						AND meta_value != ""
						', $wpdb->posts, $wpdb->postmeta, $pf_where_keys['meta_keys'][0], $pf_where_keys['meta_keys'][2] )
				) );
			}

			if ( ( isset($_min_price) || isset($_max_price) ) !== false ) {

				if ( !isset( $_min_price) ) {
					$_min_price = $_min;
				}

				if ( !isset( $_max_price) ) {
					$_max_price = $_max;
				}

				$where .= " AND ( pf_price.meta_key IN ($pf_where_keys[0]) AND pf_price.meta_value >= $_min_price AND pf_price.meta_value != \"\" ) AND ( pf_price_max.meta_key IN ($pf_where_keys[1]) AND pf_price_max.meta_value <= $_max_price AND pf_price_max.meta_value != \"\" ) ";
			}
			else if ( $pf_sale === true ) {
				$where .= " AND ( pf_price.meta_key IN (\"_sale_price\",\"_min_variation_sale_price\") AND pf_price.meta_value > 0 ) ";
			}

			remove_filter( 'posts_where' , 'prdctfltr_price_filter' );

			return $where;
			
		}

		/*
		 * Product Filter Instock Filter
		*/
		function prdctfltr_instock_filter ( $where, &$wp_query ) {

			global $wpdb;

			$where = str_replace("AND ( ($wpdb->postmeta.meta_key = '_visibility' AND CAST($wpdb->postmeta.meta_value AS CHAR) IN ('visible','catalog')) )", "", $where);

			$where .= " AND ( pf_instock.meta_key LIKE '_stock_status' AND pf_instock.meta_value = 'instock' ) ";

			remove_filter( 'posts_where' , 'prdctfltr_instock_filter' );

			return $where;

		}

		/*
		 * Product Filter Outofstock Filter
		*/
		function prdctfltr_outofstock_filter ( $where, &$wp_query ) {

			global $wpdb;

			$where = str_replace("AND ( ($wpdb->postmeta.meta_key = '_visibility' AND CAST($wpdb->postmeta.meta_value AS CHAR) IN ('visible','catalog')) )", "", $where);

			$where .= " AND ( pf_instock.meta_key LIKE '_stock_status' AND pf_instock.meta_value = 'outofstock' ) ";

			remove_filter( 'posts_where' , 'prdctfltr_outofstock_filter' );

			return $where;

		}

		/*
		 * Product Filter Register Characteristics
		*/
		function prdctfltr_characteristics() {

			$labels = array(
				'name'                       => _x( 'Characteristics', 'taxonomy general name', 'prdctfltr' ),
				'singular_name'              => _x( 'Characteristics', 'taxonomy singular name', 'prdctfltr' ),
				'search_items'               => __( 'Search Characteristics', 'prdctfltr' ),
				'popular_items'              => __( 'Popular Characteristics', 'prdctfltr' ),
				'all_items'                  => __( 'All Characteristics', 'prdctfltr' ),
				'parent_item'                => null,
				'parent_item_colon'          => null,
				'edit_item'                  => __( 'Edit Characteristics', 'prdctfltr' ),
				'update_item'                => __( 'Update Characteristics', 'prdctfltr' ),
				'add_new_item'               => __( 'Add New Characteristic', 'prdctfltr' ),
				'new_item_name'              => __( 'New Characteristic Name', 'prdctfltr' ),
				'separate_items_with_commas' => __( 'Separate Characteristics with commas', 'prdctfltr' ),
				'add_or_remove_items'        => __( 'Add or remove characteristics', 'prdctfltr' ),
				'choose_from_most_used'      => __( 'Choose from the most used characteristics', 'prdctfltr' ),
				'not_found'                  => __( 'No characteristics found.', 'prdctfltr' ),
				'menu_name'                  => __( 'Characteristics', 'prdctfltr' ),
			);

			$args = array(
				'hierarchical'          => false,
				'labels'                => $labels,
				'show_ui'               => true,
				'show_admin_column'     => true,
				'update_count_callback' => '_update_post_term_count',
				'query_var'             => true,
				'rewrite'               => array( 'slug' => 'characteristics' ),
			);

			register_taxonomy( 'characteristics', array('product'), $args );
		}

		/*
		 * Product Filter Override WooCommerce Template
		*/
		function prdctrfltr_add_filter ( $template, $slug, $name ) {

			if ( $name ) {
				$path = self::$path . WC()->template_path() . "{$slug}-{$name}.php";
			} else {
				$path = self::$path . WC()->template_path() . "{$slug}.php";
			}

			return file_exists( $path ) ? $path : $template;

		}

		/*
		 * Product Filter Override WooCommerce Template
		*/
		function prdctrfltr_add_loop_filter ( $template, $template_name, $template_path ) {

			$path = self::$path . $template_path . $template_name;
			return file_exists( $path ) ? $path : $template;

		}

		/*
		 * Product Filter Override WooCommerce Template - Blank
		*/
		function prdctrfltr_add_filter_blank ( $template, $slug, $name ) {

			if ( $name ) {
				$path = self::$path . 'blank/' . WC()->template_path() . "{$slug}-{$name}.php";
			} else {
				$path = self::$path . 'blank/' . WC()->template_path() . "{$slug}.php";
			}

			return file_exists( $path ) ? $path : $template;

		}

		/*
		 * Product Filter Override WooCommerce Template - Blank
		*/
		function prdctrfltr_add_loop_filter_blank ( $template, $template_name, $template_path ) {

			$path = self::$path . 'blank/' . $template_path . $template_name;
			return file_exists( $path ) ? $path : $template;

		}

		/**
		 * Product Filter Redirects
		 */
		function prdctfltr_redirect() {

			if ( is_post_type_archive( 'product' ) || is_tax( $this->settings['wc_settings']['product_taxonomies'] ) ) {

				if ( isset( $_REQUEST['product_cat'] ) ) {

					if ( strpos( $_REQUEST['product_cat'], ',' ) || strpos( $_REQUEST['product_cat'], '+' ) ) {
						global $wp_rewrite;
						$redirect = $wp_rewrite->get_extra_permastruct('product_cat');

						$redirect = get_bloginfo('url') . '/' . str_replace( '%product_cat%', $_REQUEST['product_cat'], $redirect);
					}
					else {
						$redirect = get_term_link( $_REQUEST['product_cat'], 'product_cat' );
					}

					if ( substr( $redirect, -1 ) != '/' ) {
						$redirect .= '/';
					}

					unset( $_REQUEST['product_cat'] );

					if ( !empty( $_REQUEST ) ) {

						$req = '';

						foreach( $_REQUEST as $k => $v ) {
							if ( strpos($v, ',') ) {
								$new_v = str_replace(',', '%2C', $v);
							}
							else if ( strpos($v, '+') ) {
								$new_v = str_replace('+', '%2B', $v);
							}
							else {
								$new_v = $v;
							}

							$req .= $k . '=' . $new_v . '&';
						}

						$redirect = $redirect . '?' . $req;

					}

					header("Location: $redirect", true, 302);
					exit;
				}

			}

		}

		/**
		 * Product Filter Redirects Empty Shop
		 */
		function prdctfltr_redirect_empty_shop() {

			$curr_display_disable = get_option( 'wc_settings_prdctfltr_disable_display', array( 'subcategories' ) );

			if ( !empty( $_REQUEST ) && ( !empty( $_GET ) && !isset($_GET['lang']) ) && is_shop() && !is_product_category() && in_array( get_option( 'woocommerce_shop_page_display' ), $curr_display_disable ) ) {

				$_REQUEST = array();

				$redirect = get_permalink( prdctfltr_wpml_get_id( wc_get_page_id( 'shop' ) ) );

				if ( substr( $redirect, -1 ) != '/' ) {
					$redirect .= '/';
				}

				remove_action( 'template_redirect', 'prdctfltr_redirect', 999 );

				header("Location: $redirect", true, 302);
				exit;
			}
			else if ( !empty( $_REQUEST ) && ( !empty( $_GET ) && !isset($_GET['lang']) ) && is_post_type_archive( 'product' ) || is_tax( $this->settings['wc_settings']['product_taxonomies'] ) ) {

				if ( isset( $_REQUEST['product_cat'] ) ) {

					if ( count($_REQUEST) == 1 ) return;

					$term = term_exists( $_REQUEST['product_cat'], 'product_cat' );

					if ($term !== 0 && $term !== null) {

						$display_type = get_woocommerce_term_meta( $term['term_id'], 'display_type', true );

						$display_type = ( $display_type == '' ? get_option( 'woocommerce_category_archive_display' ) : $display_type );

						if ( in_array( $display_type, $curr_display_disable ) ) {

							$redirect = get_term_link( $_REQUEST['product_cat'], 'product_cat' );

							$_REQUEST = array( 'product_cat', $_REQUEST['product_cat'] );

							remove_action( 'template_redirect', 'prdctfltr_redirect', 999 );

							header("Location: $redirect", true, 302);
							exit;

						}
					}
				}

			}

		}

		/*
		 * Product Filter Search Variable Products
		*/
		public static function prdctrfltr_search_array( $array, $attrs ) {
			$results = array();
			$found = 0;

			foreach ( $array as $subarray ) {

				if ( isset( $subarray['attributes'] ) ) {
					foreach ( $attrs as $k => $v ) {
						if ( in_array($v, $subarray['attributes'] ) ) {
							$found++;
						}
					}
				}
				if ( count($attrs) == $found ) {
					$results[] = $subarray;
				}
				else if ( $found > 0 ) {
					$results[] = $subarray;
				}
				$found = 0;

			}

			return $results;
		}

		/*
		 * Product Filter Sort Hierarchicaly
		 */
		public static function prdctfltr_sort_terms_hierarchicaly( Array &$cats, Array &$into, $parentId = 0 ) {
			foreach ($cats as $i => $cat) {
				if ($cat->parent == $parentId) {
					$into[$cat->term_id] = $cat;
					unset($cats[$i]);
				}
			}
			foreach ($into as $topCat) {
				$topCat->children = array();
				self::prdctfltr_sort_terms_hierarchicaly($cats, $topCat->children, $topCat->term_id);
			}
		}

		/**
		 * Product Filter Sort by Number
		 */
		public static function prdctfltr_sort_terms_naturally( $terms, $args ) {

			$sort_terms = array();

			foreach($terms as $term) {
				$sort_terms[$term->name] = $term;
			}

			uksort( $sort_terms, 'strnatcmp');

			if ( strtolower( $args['order'] ) == 'DESC' ) {
				$sort_terms = array_reverse( $sort_terms );
			}

			return $sort_terms;

		}

		/**
		 * Product Filter Action
		 */
		public static function prdctfltr_get_filter() {

			include_once( self::$dir . 'woocommerce/loop/product-filter.php' );

		}

		/**
		 * Product Filter Get Between
		 */
		public static function prdctfltr_get_between( $content, $start, $end ){
			$r = explode($start, $content);
			if (isset($r[1])){
				$r = explode($end, $r[1]);
				return $r[0];
			}
			return '';
		}

		/**
		 * Internatinal Support
		 */
		public static function prdctfltr_utf8_decode($str) {
			$str = preg_replace( "/%u([0-9a-f]{3,4})/i", "&#x\\1;", urldecode( $str ) );
			return html_entity_decode( $str, null, 'UTF-8' );
		}

		/**
		 * WPML Support
		 */
		public static function prdctfltr_wpml_get_id($id) {
			if( function_exists('icl_object_id') ) {
				return icl_object_id($id,'page',true);
			}
			else {
				return $id;
			}
		}


		/**
		 * Get Filter Settings
		 */
		public static function prdctfltr_check_appearance() {

			global $prdctfltr_global;

			if ( isset($prdctfltr_global['active']) && $prdctfltr_global['active'] == 'true' ) {
				if ( isset( $prdctfltr_global['woo_template'] ) ) {
					unset($prdctfltr_global['woo_template']);
				}
				if ( isset( $prdctfltr_global['widget_search'] ) && !isset( $prdctfltr_global['sc_query'] ) ) {
					echo '<span class="prdctfltr_error"><small>' . __( 'Product Filter was already activated on this page using a template override. Uncheck the Enable/Disable Product Filter Template Overrides in the product filter advanced options tab to use the widget version instead of the order by filter template override.', 'prdctfltr' ) . '</small></span>';
				}
				else if ( isset( $prdctfltr_global['widget_search'] ) && isset( $prdctfltr_global['sc_query'] ) ) {
					echo '<span class="prdctfltr_error"><small>' . __( 'Product Filter was already activated on this page using a shortcode. You cannot use the widget filter and the shortcode filter on a same page. If you want to use the widget filter with the shortcode then use the shortcode parameter', 'prdctfltr' ) . ' <code>use_filter="no"</code> ' . __( 'This parameter will hide the shortcode filter and the widget filter will appear.', 'prdctfltr' ) . '</small></span>';
				}
				else if ( isset( $prdctfltr_global['sc_query'] ) && !isset( $prdctfltr_global['sc_ajax'] ) ) {
					echo '<span class="prdctfltr_error"><small>' . __( 'Product Filter was already activated on this page using a non-ajax shortcode. Multiple shortcode instances are only possible when AJAX is activated for all shortcodes used in the page.', 'prdctfltr' ) . '</small></span>';
				}
				else if ( isset( $prdctfltr_global['sc_query'] ) && isset( $prdctfltr_global['sc_ajax'] ) ) {
					$pf_dont_return = true;
				}
				
				if ( !isset( $pf_dont_return ) ) {
					return false;
				}

			}

			$curr_shop_disable = get_option( 'wc_settings_prdctfltr_shop_disable', 'no' );

			if ( $curr_shop_disable == 'yes' && is_shop() && !is_product_category() ) {
				if ( isset( $prdctfltr_global['woo_template'] ) ) {
					unset($prdctfltr_global['woo_template']);
				}
				return false;
			}

			$curr_display_disable = get_option( 'wc_settings_prdctfltr_disable_display', array( 'subcategories' ) );

			if ( is_shop() && !is_product_category() && in_array( get_option( 'woocommerce_shop_page_display' ), $curr_display_disable ) ) {
				if ( isset( $prdctfltr_global['woo_template'] ) ) {
					unset($prdctfltr_global['woo_template']);
				}
				return false;
			}

			if ( is_product_category() ) {

				$pf_queried_term = get_queried_object();
				$display_type = get_woocommerce_term_meta( $pf_queried_term->term_id, 'display_type', true );
				
				$display_type = ( $display_type == '' ? get_option( 'woocommerce_category_archive_display' ) : $display_type );

				if ( in_array( $display_type, $curr_display_disable ) ) {
					if ( isset( $prdctfltr_global['woo_template'] ) ) {
						unset($prdctfltr_global['woo_template']);
					}
					return false;
				}

			}
		}

		/**
		 * Get Filter Settings
		 */
		public static function prdctfltr_get_styles( $curr_options, $curr_mod ) {

			$curr_styles = array(
				( in_array( $curr_options['wc_settings_prdctfltr_style_preset'], array( 'pf_arrow', 'pf_arrow_inline', 'pf_default', 'pf_default_inline', 'pf_select', 'pf_default_select', 'pf_sidebar', 'pf_sidebar_right', 'pf_sidebar_css', 'pf_sidebar_css_right', 'pf_fullscreen' ) ) ? ' ' . $curr_options['wc_settings_prdctfltr_style_preset'] : 'pf_default' ),
				( $curr_options['wc_settings_prdctfltr_always_visible'] == 'no' && $curr_options['wc_settings_prdctfltr_disable_bar'] == 'no' || in_array( $curr_options['wc_settings_prdctfltr_style_preset'], array( 'pf_sidebar', 'pf_sidebar_right', 'pf_sidebar_css', 'pf_sidebar_css_right', 'pf_fullscreen' ) ) ? 'prdctfltr_slide' : 'prdctfltr_always_visible' ),
				( $curr_options['wc_settings_prdctfltr_click_filter'] == 'no' ? 'prdctfltr_click' : 'prdctfltr_click_filter' ),
				( $curr_options['wc_settings_prdctfltr_limit_max_height'] == 'no' ? 'prdctfltr_rows' : 'prdctfltr_maxheight' ),
				( $curr_options['wc_settings_prdctfltr_custom_scrollbar'] == 'no' ? '' : 'prdctfltr_scroll_active' ),
				( $curr_options['wc_settings_prdctfltr_disable_bar'] == 'no' || in_array( $curr_options['wc_settings_prdctfltr_style_preset'], array( 'pf_sidebar', 'pf_sidebar_right', 'pf_sidebar_css', 'pf_sidebar_css_right' ) ) ? '' : 'prdctfltr_disable_bar' ),
				$curr_mod,
				( $curr_options['wc_settings_prdctfltr_adoptive'] == 'no' ? '' : $curr_options['wc_settings_prdctfltr_adoptive_style'] ),
				$curr_options['wc_settings_prdctfltr_style_checkboxes'],
				( $curr_options['wc_settings_prdctfltr_show_search'] == 'no' ? '' : 'prdctfltr_search_fields' ),
				$curr_options['wc_settings_prdctfltr_style_hierarchy']
			);

			return $curr_styles;

		}

		/**
		 * Get Filter Settings
		 */
		public static function prdctfltr_get_settings() {

			global $prdctfltr_global;

			if ( isset( $prdctfltr_global['preset'] ) ) {
				$get_options = $prdctfltr_global['preset'];
			}


			if ( !isset($prdctfltr_global['disable_overrides']) || ( isset($prdctfltr_global['disable_overrides']) && $prdctfltr_global['disable_overrides'] !== 'yes' ) ) {
				$curr_overrides = get_option( 'prdctfltr_overrides', array() );
				$pf_check_overrides = array( 'product_cat', 'product_tag', 'characteristics' );

				foreach ( $pf_check_overrides as $pf_check_override ) {
					if ( isset($_GET[$pf_check_override]) && $_GET[$pf_check_override] !== '' || get_query_var( $pf_check_override ) !== '' ) {
						if ( !isset( $_GET[$pf_check_override] ) ) {
							$_GET[$pf_check_override] = get_query_var( $pf_check_override );
						}
						if ( !term_exists( $_GET[$pf_check_override], $pf_check_override ) ) {
							continue;
						}
						if ( is_array($curr_overrides) && isset($curr_overrides[$pf_check_override]) ) {

							if ( array_key_exists($_GET[$pf_check_override], $curr_overrides[$pf_check_override]) ) {
								$get_options = $curr_overrides[$pf_check_override][$_GET[$pf_check_override]];
								break;
							}

							else if ( $pf_check_override == 'product_cat' ) {
								$curr_check = get_term_by( 'slug', $_GET[$pf_check_override], $pf_check_override );
								if ( $curr_check->parent !== 0 ) {
									$curr_check_parent = get_term_by( 'id', $curr_check->parent, $pf_check_override );
									if ( array_key_exists( $curr_check_parent->slug, $curr_overrides[$pf_check_override]) ) {
										$get_options = $curr_overrides[$pf_check_override][$curr_check_parent->slug];
										break;
									}
								}
							}

						}
					}
				}
			}

			if ( isset($get_options) ) {
				$curr_or_presets = get_option( 'prdctfltr_templates', array() );
				if ( isset($curr_or_presets) && is_array($curr_or_presets) ) {
					if ( array_key_exists($get_options, $curr_or_presets) ) {
						$get_curr_options = json_decode(stripslashes($curr_or_presets[$get_options]), true);
					}
				}
			}

			$pf_chck_settings = array(
				'wc_settings_prdctfltr_style_preset' => 'pf_default',
				'wc_settings_prdctfltr_always_visible' => 'no',
				'wc_settings_prdctfltr_click_filter' => 'no',
				'wc_settings_prdctfltr_limit_max_height' => 'no',
				'wc_settings_prdctfltr_max_height' => 150,
				'wc_settings_prdctfltr_custom_scrollbar' => 'no',
				'wc_settings_prdctfltr_disable_bar' => 'no',
				'wc_settings_prdctfltr_icon' => '',
				'wc_settings_prdctfltr_max_columns' => 6,
				'wc_settings_prdctfltr_adoptive' => 'no',
				'wc_settings_prdctfltr_cat_adoptive' => 'no',
				'wc_settings_prdctfltr_tag_adoptive' => 'no',
				'wc_settings_prdctfltr_chars_adoptive' => 'no',
				'wc_settings_prdctfltr_price_adoptive' => 'no',
				'wc_settings_prdctfltr_orderby_title' => '',
				'wc_settings_prdctfltr_price_title' => '',
				'wc_settings_prdctfltr_price_range' => 100,
				'wc_settings_prdctfltr_price_range_add' => 100,
				'wc_settings_prdctfltr_price_range_limit' => 6,
				'wc_settings_prdctfltr_cat_title' => '',
				'wc_settings_prdctfltr_cat_orderby' => '',
				'wc_settings_prdctfltr_cat_order' => '',
				'wc_settings_prdctfltr_cat_relation' => 'IN',
				'wc_settings_prdctfltr_cat_limit' => 0,
				'wc_settings_prdctfltr_cat_hierarchy' => 'no',
				'wc_settings_prdctfltr_cat_multi' => 'no',
				'wc_settings_prdctfltr_include_cats' => array(),
				'wc_settings_prdctfltr_tag_title' => '',
				'wc_settings_prdctfltr_tag_orderby' => '',
				'wc_settings_prdctfltr_tag_order' => '',
				'wc_settings_prdctfltr_tag_relation' => 'IN',
				'wc_settings_prdctfltr_tag_limit' => 0,
				'wc_settings_prdctfltr_tag_multi' => 'no',
				'wc_settings_prdctfltr_include_tags' => array(),
				'wc_settings_prdctfltr_custom_tax_title' => '',
				'wc_settings_prdctfltr_custom_tax_orderby' => '',
				'wc_settings_prdctfltr_custom_tax_order' => '',
				'wc_settings_prdctfltr_custom_tax_relation' => 'IN',
				'wc_settings_prdctfltr_custom_tax_limit' => 0,
				'wc_settings_prdctfltr_chars_multi' => 'no',
				'wc_settings_prdctfltr_include_chars' => array(),
				'wc_settings_prdctfltr_disable_sale' => 'no',
				'wc_settings_prdctfltr_noproducts' => '',
				'wc_settings_prdctfltr_advanced_filters' => array(),
				'wc_settings_prdctfltr_range_filters' => array(),
				'wc_settings_prdctfltr_disable_instock' => 'no',
				'wc_settings_prdctfltr_title' => '',
				'wc_settings_prdctfltr_style_mode' => 'pf_mod_multirow',
				'wc_settings_prdctfltr_instock_title' => '',
				'wc_settings_prdctfltr_disable_reset' => 'no',
				'wc_settings_prdctfltr_include_orderby' => array( 'menu_order', 'popularity', 'rating', 'date' ,'price', 'price-desc' ),
				'wc_settings_prdctfltr_adoptive_style' => 'pf_adptv_default',
				'wc_settings_prdctfltr_show_counts' => 'no',
				'wc_settings_prdctfltr_disable_showresults' => 'no',
				'wc_settings_prdctfltr_orderby_none' => 'no',
				'wc_settings_prdctfltr_price_none' => 'no',
				'wc_settings_prdctfltr_cat_none' => 'no',
				'wc_settings_prdctfltr_tag_none' => 'no',
				'wc_settings_prdctfltr_chars_none' => 'no',
				'wc_settings_prdctfltr_perpage_title' => '',
				'wc_settings_prdctfltr_perpage_label' => '',
				'wc_settings_prdctfltr_perpage_range' => 20,
				'wc_settings_prdctfltr_perpage_range_limit' => 5,
				'wc_settings_prdctfltr_cat_mode' => 'showall',
				'wc_settings_prdctfltr_style_checkboxes' => 'prdctfltr_round',
				'wc_settings_prdctfltr_cat_hierarchy_mode' => 'no',
				'wc_settings_prdctfltr_show_search' => 'no',
				'wc_settings_prdctfltr_style_hierarchy' => 'prdctfltr_hierarchy_circle',
				'wc_settings_prdctfltr_button_position' => 'bottom',
				'wc_settings_prdctfltr_submit' => '',
				'wc_settings_prdctfltr_loader' => 'spinning-circles'
			);

			if ( isset($get_curr_options) ) {
				$curr_options = $get_curr_options;

				foreach ( $pf_chck_settings as $z => $x) {
					if ( !isset($curr_options[$z]) ) {
						$curr_options[$z] = $x;
					}
				}

				$wc_settings_prdctfltr_active_filters = $curr_options['wc_settings_prdctfltr_active_filters'];

				if ( is_array($wc_settings_prdctfltr_active_filters) ) {
					$wc_settings_prdctfltr_selected = array();
					$wc_settings_prdctfltr_attributes = array();
					foreach ( $wc_settings_prdctfltr_active_filters as $k ) {
						if (substr($k, 0, 3) == 'pa_') {
							$wc_settings_prdctfltr_attributes[] = $k;
						}
					}
				}

				$curr_attrs = $wc_settings_prdctfltr_attributes;

				foreach ( $curr_attrs as $k => $attr ) {

					$curr_array = array(
						'wc_settings_prdctfltr_'.$attr.'_hierarchy' => 'no',
						'wc_settings_prdctfltr_'.$attr.'_none' => 'no',
						'wc_settings_prdctfltr_'.$attr.'_adoptive' => 'no',
						'wc_settings_prdctfltr_'.$attr.'_title' => '',
						'wc_settings_prdctfltr_'.$attr.'_orderby' => '',
						'wc_settings_prdctfltr_'.$attr.'_order' => '',
						'wc_settings_prdctfltr_'.$attr.'_relation' => 'IN',
						'wc_settings_prdctfltr_'.$attr => 'pf_attr_text',
						'wc_settings_prdctfltr_'.$attr.'_multi' => 'no',
						'wc_settings_prdctfltr_include_'.$attr => array()
					);

					foreach ( $curr_array as $dk => $dv ) {
						if ( !isset($curr_options[$dk]) ) {
							$curr_options[$dk] = $dv;
						}
					}

				}

			}
			else {
				$wc_settings_prdctfltr_active_filters = get_option( 'wc_settings_prdctfltr_active_filters' );

				if ( $wc_settings_prdctfltr_active_filters === false ) {
					$wc_settings_prdctfltr_selected = get_option( 'wc_settings_prdctfltr_selected', array('sort','price','cat') );
					$wc_settings_prdctfltr_attributes = get_option( 'wc_settings_prdctfltr_attributes', array() );
					$wc_settings_prdctfltr_active_filters = array();
					$wc_settings_prdctfltr_active_filters = array_merge( $wc_settings_prdctfltr_selected,  $wc_settings_prdctfltr_attributes );
				}
				else if ( is_array($wc_settings_prdctfltr_active_filters) ) {
					$wc_settings_prdctfltr_selected = array();
					$wc_settings_prdctfltr_attributes = array();
					foreach ( $wc_settings_prdctfltr_active_filters as $k ) {
						if (substr($k, 0, 3) == 'pa_') {
							$wc_settings_prdctfltr_attributes[] = $k;
						}
					}
				}

				$curr_attrs = $wc_settings_prdctfltr_attributes;

				$curr_options = array(
					'wc_settings_prdctfltr_selected' => $wc_settings_prdctfltr_selected,
					'wc_settings_prdctfltr_attributes' => $wc_settings_prdctfltr_attributes,
					'wc_settings_prdctfltr_active_filters' => $wc_settings_prdctfltr_active_filters
				);
				
				foreach ( $pf_chck_settings as $z => $x) {
					$curr_z = get_option( $z );
					if ( $curr_z === false ) {
						$curr_options[$z] = $x;
					}
					else {
						$curr_options[$z] = $curr_z;
					}
				}

				foreach ( $curr_attrs as $k => $attr ) {
					$curr_options['wc_settings_prdctfltr_'.$attr.'_hierarchy'] = get_option( 'wc_settings_prdctfltr_'.$attr.'_hierarchy', 'no' );
					$curr_options['wc_settings_prdctfltr_'.$attr.'_none'] = get_option( 'wc_settings_prdctfltr_'.$attr.'_none', 'no' );
					$curr_options['wc_settings_prdctfltr_'.$attr.'_adoptive'] = get_option( 'wc_settings_prdctfltr_'.$attr.'_adoptive', 'no' );
					$curr_options['wc_settings_prdctfltr_'.$attr.'_title'] = get_option( 'wc_settings_prdctfltr_'.$attr.'_title', '' );
					$curr_options['wc_settings_prdctfltr_'.$attr.'_orderby'] = get_option( 'wc_settings_prdctfltr_'.$attr.'_orderby', '' );
					$curr_options['wc_settings_prdctfltr_'.$attr.'_order'] = get_option( 'wc_settings_prdctfltr_'.$attr.'_order', '' );
					$curr_options['wc_settings_prdctfltr_'.$attr.'_relation'] = get_option( 'wc_settings_prdctfltr_'.$attr.'_relation', 'IN' );
					$curr_options['wc_settings_prdctfltr_' . $attr] = get_option( 'wc_settings_prdctfltr_' . $attr, 'pf_attr_text' );
					$curr_options['wc_settings_prdctfltr_' . $attr . '_multi'] = get_option( 'wc_settings_prdctfltr_' . $attr . '_multi', 'no' );
					$curr_options['wc_settings_prdctfltr_include_' . $attr] = get_option( 'wc_settings_prdctfltr_include_' . $attr, array() );
				}

			}

			if ( $curr_options['wc_settings_prdctfltr_button_position'] == 'top' ) {
				add_action( 'prdctfltr_filter_form_before', 'WC_Prdctfltr::prdctfltr_filter_buttons', 10, 2 );
				remove_action( 'prdctfltr_filter_form_after', 'WC_Prdctfltr::prdctfltr_filter_buttons');
			}
			else {
				add_action( 'prdctfltr_filter_form_after', 'WC_Prdctfltr::prdctfltr_filter_buttons', 10, 2 );
				remove_action( 'prdctfltr_filter_form_before', 'WC_Prdctfltr::prdctfltr_filter_buttons');
			}

			return $curr_options;

		}


		/**
		 * Get Filter Settings
		 */
		public static function prdctfltr_get_terms( $curr_term, $curr_term_args ) {

			if ( !isset($_GET['orderby']) && ( defined('DOING_AJAX') && DOING_AJAX ) === false || !isset($_GET['orderby']) ) {
				$curr_terms = get_terms( $curr_term, $curr_term_args );
			}
			else if ( isset($_GET['orderby']) ) {
				$curr_keep = $_GET['orderby'];
				unset($_GET['orderby']);
				$curr_terms = get_terms( $curr_term, $curr_term_args );
				$_GET['orderby'] = $curr_keep;
			}

			return $curr_terms;

		}


		/**
		 * WooCommerce Pagination Filter
		 */
		function prdctfltr_pagination_filter ( $args ) {
			global $prdctfltr_global;
			
			if ( isset($prdctfltr_global['sc_ajax']) || $this->settings['wc_settings_prdctfltr_use_ajax'] == 'yes' && is_woocommerce() ) {
				$args['base'] = esc_url( add_query_arg('paged','%#%') );
			}

			return $args;
		}


		/**
		 * Product Filter Form Buttons
		 */
		public static function prdctfltr_filter_buttons ( $curr_options, $pf_activated ) {
			global $prdctfltr_global;

			$curr_elements = ( $curr_options['wc_settings_prdctfltr_active_filters'] !== NULL ? $curr_options['wc_settings_prdctfltr_active_filters'] : array() );

			ob_start();
		?>
			<div class="prdctfltr_buttons">
			<?php
				if ( $curr_options['wc_settings_prdctfltr_click_filter'] == 'no' ) {
			?>
				<a <?php ( isset( $prdctfltr_global['active'] ) ? '' : 'id="prdctfltr_woocommerce_filter_submit" ' ); ?>class="button prdctfltr_woocommerce_filter_submit" href="#">
					<?php
						if ( $curr_options['wc_settings_prdctfltr_submit'] !== '' ) {
							echo $curr_options['wc_settings_prdctfltr_submit'];
						}
						else {
							_e('Filter selected', 'prdctfltr');
						}
					?>
				</a>
			<?php
				}
				if ( $curr_options['wc_settings_prdctfltr_disable_sale'] == 'no' ) {
				?>
				<span class="prdctfltr_sale">
					<?php
					printf('<label%2$s><input name="sale_products" type="checkbox"%3$s/><span>%1$s</span></label>', __('Show only products on sale' , 'prdctfltr'), ( isset($_GET['sale_products']) ? ' class="prdctfltr_active"' : '' ), ( isset($_GET['sale_products']) ? ' checked' : '' ) );
					?>
				</span>
				<?php
				}
				if ( $curr_options['wc_settings_prdctfltr_disable_instock'] == 'no' && !in_array('instock', $curr_elements) ) {
				?>
				<span class="prdctfltr_instock">
				<?php
					$curr_instock = get_option( 'wc_settings_prdctfltr_instock', 'no' );

					if ( $curr_instock == 'yes' ) {
						printf('<label%2$s><input name="instock_products" type="checkbox" value="both"%3$s/><span>%1$s</span></label>', __('Show out of stock products' , 'prdctfltr'), ( isset($_GET['instock_products']) ? ' class="prdctfltr_active"' : '' ), ( isset($_GET['instock_products']) ? ' checked' : '' ) );
					}
					else {
						printf('<label%2$s><input name="instock_products" type="checkbox" value="in"%3$s/><span>%1$s</span></label>', __('In stock only' , 'prdctfltr'), ( isset($_GET['instock_products']) ? ' class="prdctfltr_active"' : '' ), ( isset($_GET['instock_products']) ? ' checked' : '' ) );
					}
				?>
				</span>
				<?php
				}
				if ( $curr_options['wc_settings_prdctfltr_disable_reset'] == 'no' && isset($pf_activated) && !empty($pf_activated) ) {
				?>
				<span class="prdctfltr_reset">
				<?php
					printf('<label><input name="reset_filter" type="checkbox" /><span>%1$s</span></label>', __('Clear all filters' , 'prdctfltr') );
				?>
				</span>
				<?php
				}
			?>
			</div>
		<?php
			$out = ob_get_clean();

			echo $out;
		}

	}
	add_action( 'init', array( 'WC_Prdctfltr', 'init' ) );

	/**
	 * Product Filter Widget
	 */
	include_once ( WC_Prdctfltr::$dir . 'lib/pf-widget.php' );

	/**
	 * Product Filter Shortcode
	 */
	include_once ( WC_Prdctfltr::$dir . 'lib/pf-shortcode.php' );

	/**
	 * Product Filter Variable Image Override
	 */
	include_once ( WC_Prdctfltr::$dir . 'lib/pf-variable-override.php' );

	/**
	 * Admin
	 */
	if ( is_admin() ) {

		/**
		 * Product Filter Settings
		 */
		include_once ( WC_Prdctfltr::$dir . 'lib/pf-settings.php' );


		/**
		 * Product Filter Thumbnails Include
		 */
		include_once ( WC_Prdctfltr::$dir . 'lib/pf-attribute-thumbnails.php' );

	}

?>