<?php

/**
 * Product Filter Settings Class
 */


class WC_Settings_Prdctfltr {

	public static function init() {
		add_action( 'admin_enqueue_scripts', __CLASS__ . '::prdctfltr_admin_scripts' );
		add_filter( 'woocommerce_settings_tabs_array', __CLASS__ . '::prdctfltr_add_settings_tab', 50 );
		add_action( 'woocommerce_settings_tabs_settings_products_filter', __CLASS__ . '::prdctfltr_settings_tab' );
		add_action( 'woocommerce_update_options_settings_products_filter', __CLASS__ . '::prdctfltr_update_settings' );
		add_action( 'woocommerce_admin_field_pf_filter', __CLASS__ . '::prdctfltr_pf_filter', 10 );

		add_action( 'wp_ajax_prdctfltr_admin_save', __CLASS__ . '::prdctfltr_admin_save' );
		add_action( 'wp_ajax_prdctfltr_admin_load', __CLASS__ . '::prdctfltr_admin_load' );
		add_action( 'wp_ajax_prdctfltr_admin_delete', __CLASS__ . '::prdctfltr_admin_delete' );
		add_action( 'wp_ajax_prdctfltr_or_add', __CLASS__ . '::prdctfltr_or_add' );
		add_action( 'wp_ajax_prdctfltr_or_remove', __CLASS__ . '::prdctfltr_or_remove' );
		add_action( 'wp_ajax_prdctfltr_c_fields', __CLASS__ . '::prdctfltr_c_fields' );
		add_action( 'wp_ajax_prdctfltr_c_terms', __CLASS__ . '::prdctfltr_c_terms' );
		add_action( 'wp_ajax_prdctfltr_r_fields', __CLASS__ . '::prdctfltr_r_fields' );
		add_action( 'wp_ajax_prdctfltr_r_terms', __CLASS__ . '::prdctfltr_r_terms' );
	}

	function prdctfltr_admin_scripts($hook) {

		if ( isset( $_GET['page'], $_GET['tab'] ) && ($_GET['page'] == 'wc-settings' || $_GET['page'] == 'woocommerce_settings' ) && $_GET['tab'] == 'settings_products_filter' ) {
			wp_register_style( 'prdctfltr-admin', WC_Prdctfltr::$url_path .'/lib/css/admin.css', false, '4.0.0' );
			wp_enqueue_style( 'prdctfltr-admin' );
			wp_register_script( 'prdctfltr-settings', WC_Prdctfltr::$url_path . '/lib/js/admin.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-sortable' ), '4.0.0', true );
			wp_enqueue_script( 'prdctfltr-settings' );

			$curr_args = array(
				'ajax' => admin_url( 'admin-ajax.php' )
			);
			wp_localize_script( 'prdctfltr-settings', 'prdctfltr', $curr_args );
		}

	}

	public static function prdctfltr_pf_filter($field) {

	global $woocommerce;
?>
	<tr valign="top">
		<th scope="row" class="titledesc">
			<label for="<?php echo esc_attr( $field['id'] ); ?>"><?php echo esc_html( $field['title'] ); ?></label>
			<?php echo '<img class="help_tip" data-tip="' . esc_attr( $field['desc'] ) . '" src="' . $woocommerce->plugin_url() . '/assets/images/help.png" height="16" width="16" />'; ?>
		</th>
		<td class="forminp forminp-<?php echo sanitize_title( $field['type'] ) ?>">
			<?php

				$pf_filters_selected = get_option('wc_settings_prdctfltr_active_filters');
				if ( $pf_filters_selected === false ) {
					$pf_filters_selected = array();
				}
				if ( empty($pf_filters_selected) ) {
					$curr_selected = get_option( 'wc_settings_prdctfltr_selected', array('sort','price','cat') );
					$curr_selected_attr = get_option( 'wc_settings_prdctfltr_attributes', array() );
					$pf_filters_selected = array_merge($curr_selected, $curr_selected_attr);
				}

				$curr_filters = array(
					'sort' => __('Sort By', 'prdctfltr'),
					'price' => __('By Price', 'prdctfltr'),
					'cat' => __('By Categories', 'prdctfltr'),
					'tag' => __('By Tags', 'prdctfltr'),
					'char' => __('By Characteristics', 'prdctfltr'),
					'instock' => __('In Stock Filter', 'prdctfltr'),
					'per_page' => __('Products Per Page', 'prdctfltr')
				);

				if ( $attribute_taxonomies = wc_get_attribute_taxonomies() ) {
				$curr_attr = array();
				foreach ( $attribute_taxonomies as $tax ) {
					$curr_label = ! empty( $tax->attribute_label ) ? $tax->attribute_label : $tax->attribute_name;
					$curr_attr['pa_' . $tax->attribute_name] = ucfirst($curr_label);
					}
				}

				$pf_filters = ( is_array($curr_filters) ? $curr_filters : array() ) + ( is_array($curr_attr) ? $curr_attr : array() );

			?>
			<p class="form-field prdctfltr_customizer_fields">
			<?php
				foreach ( $pf_filters as $k => $v ) {
					if ( in_array($k, $pf_filters_selected) ) {
						$add['class'] = ' pf_active';
						$add['icon'] = '<i class="prdctfltr-eye"></i>';
					}
					else {
						$add['class'] = '';
						$add['icon'] = '<i class="prdctfltr-eye-disabled"></i>';
					}
			?>
				<a href="#" class="prdctfltr_c_add_filter<?php echo $add['class']; ?>" data-filter="<?php echo $k; ?>">
					<?php echo $add['icon']; ?> 
					<span><?php echo $v; ?></span>
				</a>
			<?php
				}
			?>
				<a href="#" class="prdctfltr_c_add pf_advanced"><i class="prdctfltr-plus"></i> <span><?php _e('Add advanced filter', 'prdctfltr'); ?></span></a>
				<a href="#" class="prdctfltr_c_add pf_range"><i class="prdctfltr-plus"></i> <span><?php _e('Add range filter', 'prdctfltr'); ?></span></a>
			</p>

			<p class="form-field prdctfltr_customizer">
			<?php
				$pf_filters_advanced = get_option('wc_settings_prdctfltr_advanced_filters');

				if ( $pf_filters_advanced === false ) {
					$pf_filters_advanced = array();
				}

				$pf_filters_range = get_option('wc_settings_prdctfltr_range_filters');

				if ( $pf_filters_range === false ) {
					$pf_filters_range = array();
				}

				$i=0;$q=0;

				foreach ( $pf_filters_selected as $v ) {
					if ( $v == 'advanced' ) {
				?>
						<span class="pf_element adv" data-filter="advanced" data-id="<?php echo $i; ?>">
							<span><?php _e('Advanced Filter', 'prdctfltr'); ?></span>
							<a href="#" class="prdctfltr_c_delete"><i class="prdctfltr-delete"></i></a>
							<a href="#" class="prdctfltr_c_move"><i class="prdctfltr-move"></i></a>
							<span class="pf_options_holder">
						<?php
							$taxonomies = get_object_taxonomies( 'product', 'object' );

							$html = '';

							$html .= sprintf( '<label><input type="text" name="pfa_title[%1$s]" value="%2$s"/> %3$s</label>', $i, $pf_filters_advanced['pfa_title'][$i], __( 'Override title.', 'prdctfltr' ) );

							$html .= sprintf('<label><select class="prdctfltr_adv_select" name="pfa_taxonomy[%1$s]">', $i);

							foreach ( $taxonomies as $k => $v ) {
								if ( $k == 'product_type' ) {
									continue;
								}
								$html .= '<option value="' . $k . '"' . ( $pf_filters_advanced['pfa_taxonomy'][$i] == $k ? ' selected="selected"' : '' ) .'>' . $v->label . '</option>';
							}
							$html .= '</select></label>';

							$catalog_attrs = get_terms( $pf_filters_advanced['pfa_taxonomy'][$i] );
							$curr_options = '';
							if ( !empty( $catalog_attrs ) && !is_wp_error( $catalog_attrs ) ){
								foreach ( $catalog_attrs as $term ) {
									$decode_slug = WC_Prdctfltr::prdctfltr_utf8_decode($term->slug);
									$curr_options .= sprintf( '<option value="%1$s"%3$s>%2$s</option>', $decode_slug, $term->name, ( in_array($decode_slug, $pf_filters_advanced['pfa_include'][$i]) ? ' selected="selected"' : '' ) );
								}
							}

							$html .= sprintf( '<label><span>%3$s</span> <select name="pfa_include[%2$s][]" multiple="multiple">%1$s</select></label>', $curr_options, $i, __( 'Include terms', 'prdctfltr' ) );

							$curr_options = '';
							$orderby_params = array(
								'' => __( 'None', 'prdctfltr' ),
								'id' => __( 'ID', 'prdctfltr' ),
								'name' => __( 'Name', 'prdctfltr' ),
								'number' => __( 'Number', 'prdctfltr' ),
								'slug' => __( 'Slug', 'prdctfltr' ),
								'count' => __( 'Count', 'prdctfltr' )
							);
							$orderby_params_tax = array(
								'' => __( 'None', 'prdctfltr' ),
								'id' => __( 'ID', 'prdctfltr' ),
								'name' => __( 'Name', 'prdctfltr' ),
								'slug' => __( 'Slug', 'prdctfltr' ),
								'count' => __( 'Count', 'prdctfltr' )
							);
							foreach ( $orderby_params as $k => $v ) {
								$selected = ( isset($pf_filters_advanced['pfa_orderby'][$i]) && $pf_filters_advanced['pfa_orderby'][$i] == $k ? ' selected="selected"' : '' );
								$curr_options .= sprintf( '<option value="%1$s"%3$s>%2$s</option>', $k, $v, $selected );
							}
							$html .= sprintf( '<label><span>%3$s</span> <select name="pfa_orderby[%2$s]">%1$s</select></label>', $curr_options, $i, __( 'Term order by', 'prdctfltr' ) );

							$curr_options = '';
							$order_params = array(
								'ASC' => __( 'ASC', 'prdctfltr' ),
								'DESC' => __( 'DESC', 'prdctfltr' )
							);
							foreach ( $order_params as $k => $v ) {
								$selected = ( isset($pf_filters_advanced['pfa_order'][$i]) && $pf_filters_advanced['pfa_order'][$i] == $k ? ' selected="selected"' : '' );
								$curr_options .= sprintf( '<option value="%1$s"%3$s>%2$s</option>', $k, $v, $selected );
							}

							$html .= sprintf( '<label><span>%3$s</span> <select name="pfa_order[%2$s]">%1$s</select></label>', $curr_options, $i, __( 'Term order', 'prdctfltr' ) );

							$html .= sprintf( '<label><input type="checkbox" name="pfa_multiselect[%1$s]" value="yes" %2$s /> %3$s</label>', $i, ( $pf_filters_advanced['pfa_multiselect'][$i] == 'yes' ? ' checked="checked"' : '' ), __( 'Use multi select', 'prdctfltr' ) );

							$curr_options = '';
							$relation_params = array(
								'IN' => __( 'Filtered products have at least one term (IN)', 'prdctfltr' ),
								'AND' => __( 'Filtered products have selected terms (AND)', 'prdctfltr' )
							);
							foreach ( $relation_params as $k => $v ) {
								$selected = ( isset($pf_filters_advanced['pfa_relation'][$i]) && $pf_filters_advanced['pfa_relation'][$i] == $k ? ' selected="selected"' : '' );
								$curr_options .= sprintf( '<option value="%1$s"%3$s>%2$s</option>', $k, $v, $selected );
							}
							$html .= sprintf( '<label><span>%3$s</span> <select name="pfa_relation[%2$s]">%1$s</select></label>', $curr_options, $i, __( 'Term relation', 'prdctfltr' ) );

							$html .= sprintf( '<label><input type="checkbox" name="pfa_adoptive[%1$s]" value="yes" %2$s /> %3$s</label>', $i, ( $pf_filters_advanced['pfa_adoptive'][$i] == 'yes' ? ' checked="checked"' : '' ), __( 'Use adoptive filtering', 'prdctfltr' ) );

							$html .= sprintf( '<label><input type="checkbox" name="pfa_none[%1$s]" value="yes" %2$s /> %3$s</label>', $i, ( isset($pf_filters_advanced['pfa_none'][$i]) && $pf_filters_advanced['pfa_none'][$i] == 'yes' ? ' checked="checked"' : '' ), __( 'Disable None', 'prdctfltr' ) );

							echo $html;
						?>
							</span>
						</span>
					<?php
						$i++;
					}
					else if ( $v == 'range') {
				?>
						<span class="pf_element rng" data-filter="range" data-id="<?php echo $q; ?>">
							<span><?php _e('Range Filter', 'prdctfltr'); ?></span>
							<a href="#" class="prdctfltr_c_delete"><i class="prdctfltr-delete"></i></a>
							<a href="#" class="prdctfltr_c_move"><i class="prdctfltr-move"></i></a>
							<span class="pf_options_holder">
						<?php
							$taxonomies = wc_get_attribute_taxonomies();

							$html = '';

							$html .= sprintf( '<label><span>%3$s</span> <input type="text" name="pfr_title[%1$s]" value="%2$s"/></label>', $q, $pf_filters_range['pfr_title'][$q], __( 'Override title.', 'prdctfltr' ) );

							$html .= sprintf('<label><span>%2$s</span> <select class="prdctfltr_rng_select" name="pfr_taxonomy[%1$s]">', $q, __( 'Select range', 'prdctfltr' ));

							$html .= '<option value="price"' . ( $pf_filters_range['pfr_taxonomy'][$q] == 'price' ? ' selected="selected"' : '' ) . '>' . __( 'Price range', 'prdctfltr' ) . '</option>';

							foreach ( $taxonomies as $k => $v ) {
								$curr_label = ! empty( $v->attribute_label ) ? $v->attribute_label : $v->attribute_name;
								$html .= '<option value="pa_' . $v->attribute_name . '"' . ( $pf_filters_range['pfr_taxonomy'][$q] == 'pa_' . $v->attribute_name ? ' selected="selected"' : '' ) .'>' . $curr_label . '</option>';
							}
							$html .= '</select></label>';

							if ( $pf_filters_range['pfr_taxonomy'][$q] !== 'price' ) {

								$catalog_attrs = get_terms( $pf_filters_range['pfr_taxonomy'][$q] );
								$curr_options = '';
								if ( !empty( $catalog_attrs ) && !is_wp_error( $catalog_attrs ) ){
									foreach ( $catalog_attrs as $term ) {
										$decode_slug = WC_Prdctfltr::prdctfltr_utf8_decode($term->slug);
										$curr_options .= sprintf( '<option value="%1$s"%3$s>%2$s</option>', $decode_slug, $term->name, ( in_array($decode_slug, $pf_filters_range['pfr_include'][$q]) ? ' selected="selected"' : '' ) );
									}
								}

								$html .= sprintf( '<label><span>%3$s</span> <select name="pfr_include[%2$s][]" multiple="multiple">%1$s</select></label>', $curr_options, $q, __( 'Include terms', 'prdctfltr' ) );
								$add_disabled = '';

							}
							else {
								$html .= sprintf( '<label><span>%2$s</span> <select name="pfr_include[%1$s][]" multiple="multiple" disabled></select></label>', $q, __( 'Include terms', 'prdctfltr' ) );
								$add_disabled = ' disabled';

							}

							$curr_options = '';
							$orderby_params = array(
								'' => __( 'None', 'prdctfltr' ),
								'id' => __( 'ID', 'prdctfltr' ),
								'name' => __( 'Name', 'prdctfltr' ),
								'number' => __( 'Number', 'prdctfltr' ),
								'slug' => __( 'Slug', 'prdctfltr' ),
								'count' => __( 'Count', 'prdctfltr' )
							);
							foreach ( $orderby_params as $k => $v ) {
								$selected = ( isset($pf_filters_range['pfr_orderby'][$q]) && $pf_filters_range['pfr_orderby'][$q] == $k ? ' selected="selected"' : '' );
								$curr_options .= sprintf( '<option value="%1$s"%3$s>%2$s</option>', $k, $v, $selected );
							}
							$html .= sprintf( '<label><span>%3$s</span> <select name="pfr_orderby[%2$s]"%4$s>%1$s</select></label>', $curr_options, $q, __( 'Term order by', 'prdctfltr' ), $add_disabled );

							$curr_options = '';
							$order_params = array(
								'ASC' => __( 'ASC', 'prdctfltr' ),
								'DESC' => __( 'DESC', 'prdctfltr' )
							);
							foreach ( $order_params as $k => $v ) {
								$selected = ( isset($pf_filters_advanced['pfr_order'][$q]) && $pf_filters_advanced['pfr_order'][$q] == $k ? ' selected="selected"' : '' );
								$curr_options .= sprintf( '<option value="%1$s"%3$s>%2$s</option>', $k, $v, $selected );
							}

							$html .= sprintf( '<label><span>%3$s</span> <select name="pfr_order[%2$s]"%4$s>%1$s</select></label>', $curr_options, $q, __( 'Term order', 'prdctfltr' ), $add_disabled );

							$catalog_style = array( 'flat' => __( 'Flat', 'prdctfltr' ), 'modern' => __( 'Modern', 'prdctfltr' ), 'html5' => __( 'HTML5', 'prdctfltr' ), 'white' => __( 'White', 'prdctfltr' ) );
							$curr_options = '';
							foreach ( $catalog_style as $k => $v ) {
								$selected = ( $pf_filters_range['pfr_style'][$q] == $k ? ' selected="selected"' : '' );
								$curr_options .= sprintf( '<option value="%1$s"%3$s>%2$s</option>', $k, $v, $selected );
							}

							$html .= sprintf( '<label><span>%2$s</span> <select name="pfr_style[%3$s]">%1$s</select></label>', $curr_options, __( 'Select style', 'prdctfltr' ), $q );

							$selected = ( $pf_filters_range['pfr_grid'][$q] == 'yes' ? ' checked="checked"' : '' ) ;
							$html .= sprintf( '<label><input type="checkbox" name="pfr_grid[%3$s]" value="yes"%1$s /> %2$s</label>', $selected, __( 'Use grid', 'prdctfltr' ), $q );

							echo $html;
						?>
							</span>
						</span>
					<?php
						$q++;
					}
					else {
					?>
						<span class="pf_element" data-filter="<?php echo $v; ?>">
							<span><?php echo $pf_filters[$v]; ?></span>
							<a href="#" class="prdctfltr_c_delete"><i class="prdctfltr-delete"></i></a>
							<a href="#" class="prdctfltr_c_move"><i class="prdctfltr-move"></i></a>
						</span>
					<?php
					}
				}
			?>
			</p>

			<p class="form-field prdctfltr_hidden">
				<select name="wc_settings_prdctfltr_active_filters[]" id="wc_settings_prdctfltr_active_filters" class="hidden" multiple="multiple">
				<?php
					foreach ( $pf_filters_selected as $v ) {
						if ( $v !== 'advanced') {
					?>
						<option value="<?php echo $v; ?>" selected="selected"><?php echo $pf_filters[$v]; ?></option>
					<?php
						}
						else {
					?>
						<option value="<?php echo $v; ?>" selected="selected"><?php _e('Advanced Filter', 'prdctfltr'); ?></option>
					<?php
						}
					}
				?>
				</select>
			</p>

		</td>
	</tr><?php
	}

	public static function prdctfltr_add_settings_tab( $settings_tabs ) {
		$settings_tabs['settings_products_filter'] = __( 'Product Filter', 'prdctfltr' );
		return $settings_tabs;
	}

	public static function prdctfltr_settings_tab() {
		woocommerce_admin_fields( self::prdctfltr_get_settings( 'get' ) );
	}

	public static function prdctfltr_update_settings() {

		if ( isset($_POST['pfa_taxonomy']) ) {

			$adv_filters = array();

			for($i = 0; $i < count($_POST['pfa_taxonomy']); $i++ ) {
				$adv_filters['pfa_title'][$i] = $_POST['pfa_title'][$i];
				$adv_filters['pfa_taxonomy'][$i] = $_POST['pfa_taxonomy'][$i];
				$adv_filters['pfa_include'][$i] = ( isset($_POST['pfa_include'][$i]) ? $_POST['pfa_include'][$i] : array() );
				$adv_filters['pfa_orderby'][$i] = ( isset($_POST['pfa_orderby'][$i]) ? $_POST['pfa_orderby'][$i] : '' );
				$adv_filters['pfa_order'][$i] = ( isset($_POST['pfa_order'][$i]) ? $_POST['pfa_order'][$i] : '' );
				$adv_filters['pfa_multiselect'][$i] = ( isset($_POST['pfa_multiselect'][$i]) ? $_POST['pfa_multiselect'][$i] : 'no' );
				$adv_filters['pfa_relation'][$i] = ( isset($_POST['pfa_relation'][$i]) ? $_POST['pfa_relation'][$i] : 'IN' );
				$adv_filters['pfa_adoptive'][$i] = ( isset($_POST['pfa_adoptive'][$i]) ? $_POST['pfa_adoptive'][$i] : 'no' );
				$adv_filters['pfa_none'][$i] = ( isset($_POST['pfa_none'][$i]) ? $_POST['pfa_none'][$i] : 'no' );
			}

			update_option('wc_settings_prdctfltr_advanced_filters', $adv_filters);

		}

		if ( isset($_POST['pfr_taxonomy']) ) {

			$rng_filters = array();

			for($i = 0; $i < count($_POST['pfr_taxonomy']); $i++ ) {
				$rng_filters['pfr_title'][$i] = $_POST['pfr_title'][$i];
				$rng_filters['pfr_taxonomy'][$i] = $_POST['pfr_taxonomy'][$i];
				$rng_filters['pfr_include'][$i] = ( isset($_POST['pfr_include'][$i]) ? $_POST['pfr_include'][$i] : array() );
				$rng_filters['pfr_orderby'][$i] = ( isset($_POST['pfr_orderby'][$i]) ? $_POST['pfr_orderby'][$i] : '' );
				$rng_filters['pfr_order'][$i] = ( isset($_POST['pfr_order'][$i]) ? $_POST['pfr_order'][$i] : '' );
				$rng_filters['pfr_style'][$i] = ( isset($_POST['pfr_style'][$i]) ? $_POST['pfr_style'][$i] : 'flat' );
				$rng_filters['pfr_grid'][$i] = ( isset($_POST['pfr_grid'][$i]) ? $_POST['pfr_grid'][$i] : 'no' );
			}

			update_option('wc_settings_prdctfltr_range_filters', $rng_filters);

		}

		if ( isset($_POST['wc_settings_prdctfltr_active_filters']) ) {
			update_option('wc_settings_prdctfltr_active_filters', $_POST['wc_settings_prdctfltr_active_filters']);
		}

		woocommerce_update_options( self::prdctfltr_get_settings( 'update' ) );

	}

	public static function prdctfltr_get_settings( $action = 'get' ) {

		$catalog_categories = get_terms( 'product_cat' );
		$curr_cats = array();
		if ( !empty( $catalog_categories ) && !is_wp_error( $catalog_categories ) ){
			foreach ( $catalog_categories as $term ) {
				$curr_cats[$term->slug] = $term->name;
			}
		}

		$catalog_tags = get_terms( 'product_tag' );
		$curr_tags = array();
		if ( !empty( $catalog_tags ) && !is_wp_error( $catalog_tags ) ){
			foreach ( $catalog_tags as $term ) {
				$curr_tags[$term->slug] = $term->name;
			}
		}

		$catalog_chars = ( taxonomy_exists('characteristics') ? get_terms( 'characteristics' ) : array() );
		$curr_chars = array();
		if ( !empty( $catalog_chars ) && !is_wp_error( $catalog_chars ) ){
			foreach ( $catalog_chars as $term ) {
				$curr_chars[$term->slug] = $term->name;
			}
		}

		$attribute_taxonomies = wc_get_attribute_taxonomies();
		$curr_atts = array();
		if ( !empty( $attribute_taxonomies ) && !is_wp_error( $attribute_taxonomies ) ){
			foreach ( $attribute_taxonomies as $term ) {
				$curr_atts['pa_' . $term->attribute_name] = $term->attribute_name;
			}
		}

		if ( $action == 'get' ) {
	?>
	<ul class="subsubsub">
	<?php
		$sections = array(
			'presets' => __( 'Default Filter and Filter Presets', 'prdctfltr' ),
			'overrides' => __( 'Filter Overrides', 'prdctfltr' ),
			'advanced' => __( 'Advanced Options', 'prdctfltr' )
		);

		$i=0;
		foreach ( $sections as $k => $v ) {
			$curr_class = ( ( isset( $_GET['section'] ) && $_GET['section'] == $k ) || ( !isset($_GET['section'] ) && $k == 'presets' ) ? ' class="current"' : '' );
			printf( '<li>%3$s<a href="%1$s"%3$s>%2$s</a></li>', admin_url( 'admin.php?page=wc-settings&tab=settings_products_filter&section=' . $k ), $v, ( $i == 0 ? '' : ' | ' ), $curr_class );
			$i++;
		}
		printf( '<li> | <a href="%1$s" target="_blank">%2$s</a></li>', 'http://codecanyon.net/user/dzeriho/portfolio?ref=dzeriho', __( 'Get more awesome plugins for WooCommerce!', 'prdctfltr' ) );
	?>
	</ul>
	<br class="clear" />
	<?php
		}
		if ( isset($_GET['section']) && $_GET['section'] == 'advanced' ) {
			$curr_theme = wp_get_theme();

			$settings = array(
				'section_general_title' => array(
					'name' => __( 'Product Filter General Settings', 'prdctfltr' ),
					'type' => 'title',
					'desc' => __( 'General Settings - These settings will affect all filters.', 'prdctfltr' ),
					'id' => 'wc_settings_prdctfltr_general_title'
				),
				'prdctfltr_enable' => array(
					'name' => __( 'Enable/Disable Product Filter Template Overrides', 'prdctfltr' ),
					'type' => 'checkbox',
					'desc' => __( 'Uncheck this option in order to disable the Product Filter template override and use the default WooCommerce or', 'prdctfltr') . ' ' . $curr_theme->get('Name') . ' ' . __('theme filter. This options should be unchecked if you are using the widget version.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_enable',
					'default' => 'yes'
				),
				'prdctfltr_instock' => array(
					'name' => __( 'Show In Stock Products by Default', 'prdctfltr' ),
					'type' => 'checkbox',
					'desc' => __( 'Check this option to show the In Stock products by default.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_instock',
					'default' => 'no'
				),
				'section_general_end' => array(
					'type' => 'sectionend',
					'id' => 'wc_settings_prdctfltr_general_end'
				),

				'section_ajax_title' => array(
					'name' => __( 'Product Filter AJAX Product Archives Settings', 'prdctfltr' ),
					'type' => 'title',
					'desc' => __( 'AJAX Product Archives Settings - Setup this section to use AJAX on shop and product archive pages.', 'prdctfltr' ),
					'id' => 'wc_settings_prdctfltr_ajax_title'
				),
				'prdctfltr_use_ajax' => array(
					'name' => __( 'Use AJAX On Product Archives', 'prdctfltr' ),
					'type' => 'checkbox',
					'desc' => __( 'Check this option to use AJAX load on shop and product archive pages.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_use_ajax',
					'default' => 'no'
				),
				'prdctfltr_ajax_class' => array(
					'name' => __( 'Override AJAX Wrapper Class', 'prdctfltr' ),
					'type' => 'text',
					'desc' => __( 'Enter custom wrapper class if you are using a broken template the default setting is not working. Default class: .products', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_ajax_class',
					'default' => '',
					'css' => 'width:300px;margin-right:12px;'
				),
				'prdctfltr_ajax_columns' => array(
					'name' => __( 'AJAX Product Columns', 'prdctfltr' ),
					'type' => 'number',
					'desc' => __( 'In how many columns are your product displayed on the shop and product archive pages by default?', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_ajax_columns',
					'default' => '',
					'css' => 'width:300px;margin-right:12px;'
				),
				'prdctfltr_ajax_rows' => array(
					'name' => __( 'AJAX Product Rows', 'prdctfltr' ),
					'type' => 'number',
					'desc' => __( 'In how many rows are your product displayed on the shop and product archive pages by default?', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_ajax_rows',
					'default' => '',
					'css' => 'width:300px;margin-right:12px;'
				),
				'section_ajax_end' => array(
					'type' => 'sectionend',
					'id' => 'wc_settings_prdctfltr_ajax_end'
				),

				'section_advanced_title' => array(
					'name' => __( 'Product Filter Advanced Settings', 'prdctfltr' ),
					'type' => 'title',
					'desc' => __( 'Advanced Settings - These settings will affect all filters.', 'prdctfltr' ),
					'id' => 'wc_settings_prdctfltr_advanced_title'
				),
				'prdctfltr_disable_display' => array(
					'name' => __( 'Shop/Category Display Types And Product Filter', 'prdctfltr' ),
					'type' => 'multiselect',
					'desc' => __( 'Select what display types will not show the Product Filter.  Use CTRL+Click to select multiple display types or deselect all.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_disable_display',
					'options' => array(
						'subcategories' => __( 'Show Categories', 'prdctfltr' ),
						'both' => __( 'Show Both', 'prdctfltr' )
					),
					'default' => array( 'subcategories' ),
					'css' => 'width:300px;margin-right:12px;'
				),
				'prdctfltr_shop_disable' => array(
					'name' => __( 'Enable/Disable Shop Page Product Filter', 'prdctfltr' ),
					'type' => 'checkbox',
					'desc' => __( 'Check this option in order to disable the Product Filter on Shop page. This option can be useful for themes with custom Shop pages, if checked the default WooCommerce or', 'prdctfltr') . ' ' . $curr_theme->get('Name') . ' ' . __('filter template will be overriden only on product archives that support it.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_shop_disable',
					'default' => 'no'
				),
				'prdctfltr_default_templates' => array(
					'name' => __( 'Enable/Disable Default Filter Templates', 'prdctfltr' ),
					'type' => 'checkbox',
					'desc' => __( 'If you have disabled the Product Filter Override Templates option at the top, then your default WooCommerce or', 'prdctfltr') . ' ' . $curr_theme->get('Name') . ' ' . __('filter templates will be shown. If you want do disable these default templates too, check this option. This option can be usefull for the widget version of the Product Filter.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_default_templates',
					'default' => 'no'
				),
				'prdctfltr_disable_scripts' => array(
					'name' => __( 'Disable JavaScript Libraries', 'prdctfltr' ),
					'type' => 'multiselect',
					'desc' => __( 'Select JavaScript libraries to disable. Use CTRL+Click to select multiple libraries or deselect all. Selected libraries will not be loaded.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_disable_scripts',
					'options' => array(
						'ionrange' => __( 'Ion Range Slider', 'prdctfltr' ),
						'isotope' => __( 'Isotope', 'prdctfltr' ),
						'mcustomscroll' => __( 'Malihu jQuery Scrollbar', 'prdctfltr' )
					),
					'default' => '',
					'css' => 'width:300px;margin-right:12px;'
				),
				'prdctfltr_force_categories' => array(
					'name' => __( 'Force Filtering thru Categories', 'prdctfltr' ),
					'type' => 'checkbox',
					'desc' => __( 'Check this option if you are having issues with the redirects. This options should never be checked unless something is wrong with the template you are using. This option also limits your categories filter. The categories filter should not be used if this option is activated. (This option has changed since the 2.3.0 release. Now all installations should be compatible with the redirects by default. Test your installation before activating the option again)', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_force_categories',
					'default' => 'no'
				),
				'prdctfltr_force_product' => array(
					'name' => __( 'Force Post Type Variable', 'prdctfltr' ),
					'type' => 'checkbox',
					'desc' => __( 'Check this option if you are having issues with the searches. This options should never be checked unless something is wrong with the template you are using. Option will add the ?post_type=product parameter when filtering.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_force_product',
					'default' => 'no'
				),
				'prdctfltr_force_redirects' => array(
					'name' => __( 'Disable Product Filter Redirects', 'prdctfltr' ),
					'type' => 'checkbox',
					'desc' => __( 'Check this option if you are having issues with the shop page redirects.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_force_redirects',
					'default' => 'no'
				),
				'prdctfltr_force_emptyshop' => array(
					'name' => __( 'Disable Empty Shop Redirects', 'prdctfltr' ),
					'type' => 'checkbox',
					'desc' => __( 'Check this option if you are having issues with the shop page redirects.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_force_emptyshop',
					'default' => 'no'
				),
				'prdctfltr_use_variable_images' => array(
					'name' => __( 'Use Variable Images', 'prdctfltr' ),
					'type' => 'checkbox',
					'desc' => __( 'Check this option to use variable images override on shop and archive pages. CAUTION This setting does not work on all servers by default. Additional server setup might be needed.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_use_variable_images',
					'default' => 'no'
				),
				'prdctfltr_ajax_js' => array(
					'name' => __( 'AJAX jQuery and JS Refresh', 'prdctfltr' ),
					'type' => 'textarea',
					'desc' => __( 'Input jQuery or JS code to execute after AJAX calls. This option is usefull if the JS is broken after these calls.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_ajax_js',
					'default' => '',
					'css' 		=> 'min-width:600px;margin-top:12px;min-height:150px;',
				),
				'section_advanced_end' => array(
					'type' => 'sectionend',
					'id' => 'wc_settings_prdctfltr_advanced_end'
				),
			);
		}
		else if ( ( isset($_GET['section']) && $_GET['section'] == 'presets' ) || !isset($_GET['section']) ) {
			if ( $action == 'get' ) {

				printf( '<h3>%1$s</h3><p>%2$s</p><p>', __( 'Product Filter Preset Manager', 'prdctfltr' ), __( 'Manage filter presets. Load, delete and save presets. Saved filter presets can be used with shortcodes, filter overrides and widgets. Default filter preset will always be used unless the preset is specified by shortcode, filter override or the widget parameter.', 'prdctfltr' ) );
		?>
						<select id="prdctfltr_filter_presets">
							<option value="default"><?php _e('Default', 'wcwar'); ?></option>
							<?php
								$curr_presets = get_option('prdctfltr_templates');
								if ( $curr_presets === false ) {
									$curr_presets = array();
								}
								if ( !empty($curr_presets) ) {
									foreach ( $curr_presets as $k => $v ) {
								?>
										<option value="<?php echo $k; ?>"><?php echo $k; ?></option>
								<?php
									}
								}
							?>
						</select>
		<?php
				printf( '<a href="#" id="prdctfltr_save" class="button-primary">%1$s</a> <a href="#" id="prdctfltr_load" class="button-primary">%2$s</a> <a href="#" id="prdctfltr_delete" class="button-primary">%3$s</a> <a href="#" id="prdctfltr_reset_default" class="button-primary">%4$s</a> <a href="#" id="prdctfltr_save_default" class="button-primary">%5$s</a></p>', __( 'Save as preset', 'prdctfltr' ), __( 'Load', 'prdctfltr' ), __( 'Delete', 'prdctfltr' ), __( 'Reset to default', 'prdctfltr' ), __( 'Save as default preset', 'prdctfltr' ) );
			}

			$settings = array(
				'section_basic_title' => array(
					'name'     => __( 'Filter Basic Settings', 'prdctfltr' ),
					'type'     => 'title',
					'desc'     => __( 'Setup you Product Filter appearance.', 'prdctfltr' ),
					'id'       => 'wc_settings_prdctfltr_basic_title'
				),
				'prdctfltr_always_visible' => array(
					'name' => __( 'Always Visible', 'prdctfltr' ),
					'type' => 'checkbox',
					'desc' => __( 'This option will make Product Filter visible without the slide up/down animation at all times.', 'prdctfltr' ) . ' <em>' . __( '(Does not work with the Arrow presets as these presets are absolutely positioned and the widget version)', 'prdctfltr' ) . '</em>',
					'id'   => 'wc_settings_prdctfltr_always_visible',
					'default' => 'no',
				),
				'prdctfltr_click_filter' => array(
					'name' => __( 'Instant Filtering', 'prdctfltr' ),
					'type' => 'checkbox',
					'desc' => __( 'Check this option to disable the filter button and use instant product filtering.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_click_filter',
					'default' => 'no',
				),
				'prdctfltr_show_counts' => array(
					'name' => __( 'Show Term Products Count', 'prdctfltr' ),
					'type' => 'checkbox',
					'desc' => __( 'Check this option to show products count with the terms.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_show_counts',
					'default' => 'no',
				),
				'prdctfltr_show_search' => array(
					'name' => __( 'Show Term Search Fields', 'prdctfltr' ),
					'type' => 'checkbox',
					'desc' => __( 'Check this option to show search fields on supported terms.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_show_search',
					'default' => 'no',
				),
				'prdctfltr_adoptive' => array(
					'name' => __( 'Enable/Disable Adoptive Filtering', 'prdctfltr' ),
					'type' => 'checkbox',
					'desc' => __( 'Check this option to enable the adoptive filtering.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_adoptive',
					'default' => 'no',
				),
				'prdctfltr_adoptive_style' => array(
					'name' => __( 'Select Adoptive Filtering Style', 'prdctfltr' ),
					'type' => 'select',
					'desc' => __( 'Select style to use with the filtered terms.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_adoptive_style',
					'options' => array(
						'pf_adptv_default' => __( 'Hide Terms', 'prdctfltr' ),
						'pf_adptv_unclick' => __( 'Disabled and Unclickable', 'prdctfltr' ),
						'pf_adptv_click' => __( 'Disabled but Clickable', 'prdctfltr' )
					),
					'default' => 'pf_adptv_default',
					'css' => 'width:300px;margin-right:12px;'
				),
				'prdctfltr_disable_bar' => array(
					'name' => __( 'Disable Top Bar', 'prdctfltr' ),
					'type' => 'checkbox',
					'desc' => __( 'Check this option to hide the Product Filter top bar. This option will also make the filter always visible.', 'prdctfltr' ) . ' <em>' . __( '(Does not work with the Arrow presets as these presets are absolutely positioned and the widget version)', 'prdctfltr' ) . '</em>',
					'id'   => 'wc_settings_prdctfltr_disable_bar',
					'default' => 'no',
				),
				'prdctfltr_disable_showresults' => array(
					'name' => __( 'Disable Show Results Title', 'prdctfltr' ),
					'type' => 'checkbox',
					'desc' => __( 'Check this option to hide the show results text from the filter title.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_disable_showresults',
					'default' => 'no',
				),
				'prdctfltr_disable_sale' => array(
					'name' => __( 'Disable Sale Button', 'prdctfltr' ),
					'type' => 'checkbox',
					'desc' => __( 'Check this option to hide the Product Filter sale button.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_disable_sale',
					'default' => 'no',
				),
				'prdctfltr_disable_instock' => array(
					'name' => __( 'Disable In Stock Button', 'prdctfltr' ),
					'type' => 'checkbox',
					'desc' => __( 'Check this option to hide the Product Filter in stock button.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_disable_instock',
					'default' => 'no',
				),
				'prdctfltr_disable_reset' => array(
					'name' => __( 'Disable Reset Button', 'prdctfltr' ),
					'type' => 'checkbox',
					'desc' => __( 'Check this option to hide the Product Filter reset button.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_disable_reset',
					'default' => 'no',
				),
				'prdctfltr_noproducts' => array(
					'name' => __( 'Override No Products Action', 'prdctfltr' ),
					'type' => 'textarea',
					'desc' => __( 'Input HTML/Shortcode to override the default action when no products are found. Default action means that random products will be shown when there are no products within the filter query.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_noproducts',
					'default' => '',
					'css' 		=> 'min-width:600px;margin-top:12px;min-height:150px;',
				),
				'section_basic_end' => array(
					'type' => 'sectionend',
					'id' => 'wc_settings_prdctfltr_enable_end'
				),
				'section_style_title' => array(
					'name'     => __( 'Filter Style', 'prdctfltr' ),
					'type'     => 'title',
					'desc'     => __( 'Select style preset to use. Use custom preset for your own style. Use Disable CSS to disable all CSS for product filter.', 'prdctfltr' ),
					'id'       => 'wc_settings_prdctfltr_style_title'
				),
				'prdctfltr_style_preset' => array(
					'name' => __( 'Select Style', 'prdctfltr' ),
					'type' => 'select',
					'desc' => __( 'Select style. This option does not work with the widget version.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_style_preset',
					'options' => array(
						'pf_arrow' => __( 'Arrow', 'prdctfltr' ),
						'pf_arrow_inline' => __( 'Arrow Inline', 'prdctfltr' ),
						'pf_default' => __( 'Default', 'prdctfltr' ),
						'pf_default_inline' => __( 'Default Inline', 'prdctfltr' ),
						'pf_select' => __( 'Use Select Box', 'prdctfltr' ),
						'pf_sidebar' => __( 'Fixed Sidebar Left', 'prdctfltr' ),
						'pf_sidebar_right' => __( 'Fixed Sidebar Right', 'prdctfltr' ),
						'pf_sidebar_css' => __( 'Fixed Sidebar Left With Overlay', 'prdctfltr' ),
						'pf_sidebar_css_right' => __( 'Fixed Sidebar Righ With Overlay', 'prdctfltr' ),
						'pf_fullscreen' => __( 'Full Screen', 'prdctfltr' ),
					),
					'default' => 'pf_default',
					'css' => 'width:300px;margin-right:12px;'
				),
				'prdctfltr_style_mode' => array(
					'name' => __( 'Select Mode', 'prdctfltr' ),
					'type' => 'select',
					'desc' => __( 'Select mode to use with the filter. This option does not work with the widget version.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_style_mode',
					'options' => array(
						'pf_mod_row' => __( 'One Row', 'prdctfltr' ),
						'pf_mod_multirow' => __( 'Multiple Rows', 'prdctfltr' ),
						'pf_mod_masonry' => __( 'Masonry Filters', 'prdctfltr' )
					),
					'default' => 'pf_mod_multirow',
					'css' => 'width:300px;margin-right:12px;'
				),
				'prdctfltr_max_columns' => array(
					'name' => __( 'Max Columns', 'prdctfltr' ),
					'type' => 'number',
					'desc' => __( 'This option sets the number of columns for the filter. This option does not work with the widget version or the fixed sidebar layouts.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_max_columns',
					'default' => 3,
					'custom_attributes' => array(
						'min' 	=> 1,
						'max' 	=> 10,
						'step' 	=> 1
					),
					'css' => 'width:100px;margin-right:12px;'
				),
				'prdctfltr_limit_max_height' => array(
					'name' => __( 'Limit Max Height', 'prdctfltr' ),
					'type' => 'checkbox',
					'desc' => __( 'Check this option to limit the Max Height of for the filters.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_limit_max_height',
					'default' => 'no',
				),
				'prdctfltr_max_height' => array(
					'name' => __( 'Max Height', 'prdctfltr' ),
					'type' => 'number',
					'desc' => __( 'Set the Max Height value.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_max_height',
					'default' => 150,
					'custom_attributes' => array(
						'min' 	=> 100,
						'max' 	=> 300,
						'step' 	=> 1
					),
					'css' => 'width:100px;margin-right:12px;'
				),
				'prdctfltr_custom_scrollbar' => array(
					'name' => __( 'Use Custom Scroll Bars', 'prdctfltr' ),
					'type' => 'checkbox',
					'desc' => __( 'Check this option to override default browser scroll bars with javascrips scrollbars in Max Height mode.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_custom_scrollbar',
					'default' => 'yes',
				),
				'prdctfltr_style_checkboxes' => array(
					'name' => __( 'Select Checkbox Style', 'prdctfltr' ),
					'type' => 'select',
					'desc' => __( 'Select style for the term checkboxes.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_style_checkboxes',
					'options' => array(
						'prdctfltr_round' => __( 'Round', 'prdctfltr' ),
						'prdctfltr_square' => __( 'Square', 'prdctfltr' ),
						'prdctfltr_checkbox' => __( 'Checkbox', 'prdctfltr' ),
						'prdctfltr_system' => __( 'System Checkboxes', 'prdctfltr' )
					),
					'default' => 'pf_round',
					'css' => 'width:300px;margin-right:12px;'
				),
				'prdctfltr_style_hierarchy' => array(
					'name' => __( 'Select Hierarchy Style', 'prdctfltr' ),
					'type' => 'select',
					'desc' => __( 'Select style for hierarchy terms.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_style_hierarchy',
					'options' => array(
						'prdctfltr_hierarchy_circle' => __( 'Circle', 'prdctfltr' ),
						'prdctfltr_hierarchy_filled' => __( 'Circle Solid', 'prdctfltr' ),
						'prdctfltr_hierarchy_lined' => __( 'Lined', 'prdctfltr' ),
						'prdctfltr_hierarchy_arrow' => __( 'Arrows', 'prdctfltr' )
					),
					'default' => 'prdctfltr_hierarchy_circle',
					'css' => 'width:300px;margin-right:12px;'
				),
				'prdctfltr_button_position' => array(
					'name' => __( 'Select Filter Buttons Position', 'prdctfltr' ),
					'type' => 'select',
					'desc' => __( 'Select position of the filter buttons (Filter selected, Sale button..).', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_button_position',
					'options' => array(
						'bottom' => __( 'Bottom', 'prdctfltr' ),
						'top' => __( 'Top', 'prdctfltr' )
					),
					'default' => 'bottom',
					'css' => 'width:300px;margin-right:12px;'
				),
				'prdctfltr_icon' => array(
					'name' => __( 'Override Filter Icon', 'prdctfltr' ),
					'type' => 'text',
					'desc' => __( 'Input the icon class to override the default Product Filter icon. Use icon class e.g. prdctfltr-filter or FontAwesome fa fa-shopping-cart or any other.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_icon',
					'default' => '',
					'css' => 'width:300px;margin-right:12px;'
				),
				'prdctfltr_title' => array(
					'name' => __( 'Override Filter Title', 'prdctfltr' ),
					'type' => 'text',
					'desc' => __( 'Override Filter products, the default filter title.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_title',
					'default' => '',
					'css' => 'width:300px;margin-right:12px;'
				),
				'prdctfltr_submit' => array(
					'name' => __( 'Override Filter Submit Text', 'prdctfltr' ),
					'type' => 'text',
					'desc' => __( 'Override Filter selected, the default filter submit button text.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_submit',
					'default' => '',
					'css' => 'width:300px;margin-right:12px;'
				),
				'prdctfltr_loader' => array(
					'name' => __( 'Select AJAX Loader Icon', 'prdctfltr' ),
					'type' => 'select',
					'desc' => __( 'Select AJAX loader icon.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_loader',
					'options' => array(
						'audio' => __( 'Audio', 'prdctfltr' ),
						'ball-triangle' => __( 'Ball Triangle', 'prdctfltr' ),
						'bars' => __( 'Bars', 'prdctfltr' ),
						'circles' => __( 'Circles', 'prdctfltr' ),
						'grid' => __( 'Grid', 'prdctfltr' ),
						'hearts' => __( 'Hearts', 'prdctfltr' ),
						'oval' => __( 'Oval', 'prdctfltr' ),
						'puff' => __( 'Puff', 'prdctfltr' ),
						'rings' => __( 'Rings', 'prdctfltr' ),
						'spinning-circles' => __( 'Spining Circles', 'prdctfltr' ),
						'tail-spin' => __( 'Tail Spin', 'prdctfltr' ),
						'circles' => __( 'Circles', 'prdctfltr' ),
						'three-dots' => __( 'Three Dots', 'prdctfltr' )
					),
					'default' => 'oval',
					'css' => 'width:300px;margin-right:12px;'
				),
				'section_style_end' => array(
					'type' => 'sectionend',
					'id' => 'wc_settings_prdctfltr_style_end'
				),
				'section_title' => array(
					'name'     => __( 'Select Filters', 'prdctfltr' ),
					'type'     => 'title',
					'desc'     => __( 'Select filters to use on default template or current filter preset. For basic filters, shown in green and red depending on their use, the settings can be found bellow. Advanced and range filters, shown a blue, are set within the manager itself. Click and drag the filters to reorder.', 'prdctfltr' ),
					'id'       => 'wc_settings_prdctfltr_section_title'
				),
				'prdctfltr_filters' => array(
					'name' => __( 'Select Filters', 'prdctfltr' ),
					'type' => 'pf_filter',
					'desc' => __( 'Select filters. Click on a filter to activate or create advanced filters. Click and drag to reorder filters.', 'prdctfltr' )
				),
				'section_end' => array(
					'type' => 'sectionend',
					'id' => 'wc_settings_prdctfltr_section_end'
				),

				'section_perpage_filter_title' => array(
					'name'     => __( 'Products Per Filter Settings', 'prdctfltr' ),
					'type'     => 'title',
					'desc'     => __( 'Setup products per page filter.', 'prdctfltr' ),
					'id'       => 'wc_settings_prdctfltr_perpage_filter_title'
				),
				'prdctfltr_perpage_title' => array(
					'name' => __( 'Override Products Per Page Filter Title', 'prdctfltr' ),
					'type' => 'text',
					'desc' => __( 'Enter title for the products per page filter. If you leave this field blank default will be used.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_perpage_title',
					'default' => '',
					'css' => 'width:300px;margin-right:12px;'
				),
				'prdctfltr_perpage_label' => array(
					'name' => __( 'Override Products Per Page Filter Label', 'prdctfltr' ),
					'type' => 'text',
					'desc' => __( 'Enter label for the products per page filter. If you leave this field blank default will be used.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_perpage_label',
					'default' => '',
					'css' => 'width:300px;margin-right:12px;'
				),
				'prdctfltr_perpage_range' => array(
					'name' => __( 'Per Page Filter Initial', 'prdctfltr' ),
					'type' => 'number',
					'desc' => __( 'Initial products per page value.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_perpage_range',
					'default' => 20,
					'custom_attributes' => array(
						'min' 	=> 3,
						'max' 	=> 999,
						'step' 	=> 1
					),
					'css' => 'width:100px;margin-right:12px;'
				),
				'prdctfltr_perpage_range_limit' => array(
					'name' => __( 'Per Page Filter Values', 'prdctfltr' ),
					'type' => 'number',
					'desc' => __( 'Number of product per page values.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_perpage_range_limit',
					'default' => 5,
					'custom_attributes' => array(
						'min' 	=> 2,
						'max' 	=> 20,
						'step' 	=> 1
					),
					'css' => 'width:100px;margin-right:12px;'
				),
				'section_perpage_filter_end' => array(
					'type' => 'sectionend',
					'id' => 'wc_settings_prdctfltr_perpage_filter_end'
				),
				'section_instock_filter_title' => array(
					'name'     => __( 'In Stock Filter Settings', 'prdctfltr' ),
					'type'     => 'title',
					'desc'     => __( 'Setup in stock filter.', 'prdctfltr' ),
					'id'       => 'wc_settings_prdctfltr_instock_filter_title'
				),
				'prdctfltr_instock_title' => array(
					'name' => __( 'Override In Stock Filter Title', 'prdctfltr' ),
					'type' => 'text',
					'desc' => __( 'Enter title for the in stock filter. If you leave this field blank default will be used.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_instock_title',
					'default' => '',
					'css' => 'width:300px;margin-right:12px;'
				),
				'section_instock_filter_end' => array(
					'type' => 'sectionend',
					'id' => 'wc_settings_prdctfltr_instock_filter_end'
				),
				'section_orderby_filter_title' => array(
					'name'     => __( 'Sort By Filter Settings', 'prdctfltr' ),
					'type'     => 'title',
					'desc'     => __( 'Setup sort by filter.', 'prdctfltr' ),
					'id'       => 'wc_settings_prdctfltr_orderby_filter_title'
				),
				'prdctfltr_orderby_title' => array(
					'name' => __( 'Override Sort By Filter Title', 'prdctfltr' ),
					'type' => 'text',
					'desc' => __( 'Enter title for the sort by filter. If you leave this field blank default will be used.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_orderby_title',
					'default' => '',
					'css' => 'width:300px;margin-right:12px;'
				),
				'prdctfltr_include_orderby' => array(
					'name' => __( 'Select Sort By Terms', 'prdctfltr' ),
					'type' => 'multiselect',
					'desc' => __( 'Select Sort by terms to include. Use CTRL+Click to select multiple Sort by terms or deselect all to use all Sort by terms.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_include_orderby',
					'options' => array(
							'menu_order'    => __( 'Default', 'prdctfltr' ),
							'comment_count' => __( 'Review Count', 'prdctfltr' ),
							'popularity'    => __( 'Popularity', 'prdctfltr' ),
							'rating'        => __( 'Average rating', 'prdctfltr' ),
							'date'          => __( 'Newness', 'prdctfltr' ),
							'price'         => __( 'Price: low to high', 'prdctfltr' ),
							'price-desc'    => __( 'Price: high to low', 'prdctfltr' ),
							'rand'          => __( 'Random Products', 'prdctfltr' ),
							'title'         => __( 'Product Name', 'prdctfltr' )
						),
					'default' => array(),
					'css' => 'width:300px;margin-right:12px;'
				),
				'prdctfltr_orderby_none' => array(
					'name' => __( 'Order By Hide None', 'prdctfltr' ),
					'type' => 'checkbox',
					'desc' => __( 'Check this option to hide None on order by filter.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_orderby_none',
					'default' => 'no',
				),
				'section_orderby_filter_end' => array(
					'type' => 'sectionend',
					'id' => 'wc_settings_prdctfltr_orderby_filter_end'
				),

				'section_price_filter_title' => array(
					'name'     => __( 'By Price Filter Settings', 'prdctfltr' ),
					'type'     => 'title',
					'desc'     => __( 'Setup by price filter.', 'prdctfltr' ),
					'id'       => 'wc_settings_prdctfltr_price_filter_title'
				),
				'prdctfltr_price_title' => array(
					'name' => __( 'Override Price Filter Title', 'prdctfltr' ),
					'type' => 'text',
					'desc' => __( 'Enter title for the price filter. If you leave this field blank default will be used.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_price_title',
					'default' => '',
					'css' => 'width:300px;margin-right:12px;'
				),
				'prdctfltr_price_range' => array(
					'name' => __( 'Price Range Filter Initial Price', 'prdctfltr' ),
					'type' => 'number',
					'desc' => __( 'Initial price for the filter.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_price_range',
					'default' => 100,
					'custom_attributes' => array(
						'min' 	=> 0.5,
						'max' 	=> 9999999,
						'step' 	=> 0.1
					),
					'css' => 'width:100px;margin-right:12px;'
				),
				'prdctfltr_price_range_add' => array(
					'name' => __( 'Price Range Filter Price Add', 'prdctfltr' ),
					'type' => 'number',
					'desc' => __( 'Price to add.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_price_range_add',
					'default' => 100,
					'custom_attributes' => array(
						'min' 	=> 0.5,
						'max' 	=> 9999999,
						'step' 	=> 0.1
					),
					'css' => 'width:100px;margin-right:12px;'
				),
				'prdctfltr_price_range_limit' => array(
					'name' => __( 'Price Range Filter Intervals', 'prdctfltr' ),
					'type' => 'number',
					'desc' => __( 'Number of price intervals to use. E.G. You have set the initial price to 99.9, and the add price is set to 100, you will achieve filtering like 0-99.9, 99.9-199.9, 199.9- 299.9 for the number of times as set in the price intervals setting.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_price_range_limit',
					'default' => 6,
					'custom_attributes' => array(
						'min' 	=> 2,
						'max' 	=> 20,
						'step' 	=> 1
					),
					'css' => 'width:100px;margin-right:12px;'
				),
				'prdctfltr_price_none' => array(
					'name' => __( 'Price Range Hide None', 'prdctfltr' ),
					'type' => 'checkbox',
					'desc' => __( 'Check this option to hide None on price filter.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_price_none',
					'default' => 'no',
				),
				'section_price_filter_end' => array(
					'type' => 'sectionend',
					'id' => 'wc_settings_prdctfltr_price_filter_end'
				),
				'section_cat_filter_title' => array(
					'name'     => __( 'By Category Filter Settings', 'prdctfltr' ),
					'type'     => 'title',
					'desc'     => __( 'Setup by category filter.', 'prdctfltr' ),
					'id'       => 'wc_settings_prdctfltr_cat_filter_title'
				),
				'prdctfltr_cat_title' => array(
					'name' => __( 'Override Category Filter Title', 'prdctfltr' ),
					'type' => 'text',
					'desc' => __( 'Enter title for the category filter. If you leave this field blank default will be used.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_cat_title',
					'default' => '',
					'css' => 'width:300px;margin-right:12px;'
				),
				'prdctfltr_include_cats' => array(
					'name' => __( 'Select Categories', 'prdctfltr' ),
					'type' => 'multiselect',
					'desc' => __( 'Select categories to include. Use CTRL+Click to select multiple categories or deselect all.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_include_cats',
					'options' => $curr_cats,
					'default' => array(),
					'css' => 'width:300px;margin-right:12px;'
				),
				'prdctfltr_cat_orderby' => array(
					'name' => __( 'Categories Order By', 'prdctfltr' ),
					'type' => 'select',
					'desc' => __( 'Select the categories order.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_cat_orderby',
					'options' => array(
							'' => __( 'None', 'prdctfltr' ),
							'id' => __( 'ID', 'prdctfltr' ),
							'name' => __( 'Name', 'prdctfltr' ),
							'slug' => __( 'Slug', 'prdctfltr' ),
							'count' => __( 'Count', 'prdctfltr' )
						),
					'default' => array(),
					'css' => 'width:300px;margin-right:12px;'
				),
				'prdctfltr_cat_order' => array(
					'name' => __( 'Categories Order', 'prdctfltr' ),
					'type' => 'select',
					'desc' => __( 'Select ascending or descending order.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_cat_order',
					'options' => array(
							'ASC' => __( 'ASC', 'prdctfltr' ),
							'DESC' => __( 'DESC', 'prdctfltr' )
						),
					'default' => array(),
					'css' => 'width:300px;margin-right:12px;'
				),
				'prdctfltr_cat_limit' => array(
					'name' => __( 'Limit Categories', 'prdctfltr' ),
					'type' => 'number',
					'desc' => __( 'Limit number of categories to be shown. If limit is set categories with most posts will be shown first.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_cat_limit',
					'default' => 0,
					'custom_attributes' => array(
						'min' 	=> 0,
						'max' 	=> 100,
						'step' 	=> 1
					),
					'css' => 'width:100px;margin-right:12px;'
				),
				'prdctfltr_cat_hierarchy' => array(
					'name' => __( 'Use Category Hierarchy', 'prdctfltr' ),
					'type' => 'checkbox',
					'desc' => __( 'Check this option to enable category hierarchy.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_cat_hierarchy',
					'default' => 'no',
				),
				'prdctfltr_cat_hierarchy_mode' => array(
					'name' => __( 'Categories Hierarchy Mode', 'prdctfltr' ),
					'type' => 'checkbox',
					'desc' => __( 'Check this option to expand parent categories on load.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_cat_hierarchy_mode',
					'default' => 'no',
				),
				'prdctfltr_cat_mode' => array(
					'name' => __( 'Categories Hierarchy Filtering Mode', 'prdctfltr' ),
					'type' => 'select',
					'desc' => __( 'Select how to show categories upon filtering.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_cat_mode',
					'options' => array(
							'showall' => __( 'Show all', 'prdctfltr' ),
							'subcategories' => __( 'Keep only parent and children categories', 'prdctfltr' )
						),
					'default' => array(),
					'css' => 'width:300px;margin-right:12px;'
				),
				'prdctfltr_cat_multi' => array(
					'name' => __( 'Use Multi Select', 'prdctfltr' ),
					'type' => 'checkbox',
					'desc' => __( 'Check this option to enable multi-select on categories.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_cat_multi',
					'default' => 'no',
				),
				'prdctfltr_cat_relation' => array(
					'name' => __( 'Multi Select Categories Relation', 'prdctfltr' ),
					'type' => 'select',
					'desc' => __( 'Select categories relation when multiple terms are selected.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_cat_relation',
					'options' => array(
							'IN' => __( 'Filtered products have at least one term (IN)', 'prdctfltr' ),
							'AND' => __( 'Filtered products have selected terms (AND)', 'prdctfltr' )
						),
					'default' => array(),
					'css' => 'width:300px;margin-right:12px;'
				),
				'prdctfltr_cat_adoptive' => array(
					'name' => __( 'Use Adoptive Filtering', 'prdctfltr' ),
					'type' => 'checkbox',
					'desc' => __( 'Check this option to use adoptive filtering on categories.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_cat_adoptive',
					'default' => 'no',
				),
				'prdctfltr_cat_none' => array(
					'name' => __( 'Categories Hide None', 'prdctfltr' ),
					'type' => 'checkbox',
					'desc' => __( 'Check this option to hide None on categories.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_cat_none',
					'default' => 'no',
				),
				'section_cat_filter_end' => array(
					'type' => 'sectionend',
					'id' => 'wc_settings_prdctfltr_cat_filter_end'
				),
				'section_tag_filter_title' => array(
					'name'     => __( 'By Tag Filter Settings', 'prdctfltr' ),
					'type'     => 'title',
					'desc'     => __( 'Setup by tag filter.', 'prdctfltr' ),
					'id'       => 'wc_settings_prdctfltr_tag_filter_title'
				),
				'prdctfltr_tag_title' => array(
					'name' => __( 'Override Tag Filter Title', 'prdctfltr' ),
					'type' => 'text',
					'desc' => __( 'Enter title for the tag filter. If you leave this field blank default will be used.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_tag_title',
					'default' => '',
					'css' => 'width:300px;margin-right:12px;'
				),
				'prdctfltr_include_tags' => array(
					'name' => __( 'Select Tags', 'prdctfltr' ),
					'type' => 'multiselect',
					'desc' => __( 'Select tags to include. Use CTRL+Click to select multiple tags or deselect all.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_include_tags',
					'options' => $curr_tags,
					'default' => array(),
					'css' => 'width:300px;margin-right:12px;'
				),
				'prdctfltr_tag_orderby' => array(
					'name' => __( 'Tags Order By', 'prdctfltr' ),
					'type' => 'select',
					'desc' => __( 'Select the tags order.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_tag_orderby',
					'options' => array(
							'' => __( 'None', 'prdctfltr' ),
							'id' => __( 'ID', 'prdctfltr' ),
							'name' => __( 'Name', 'prdctfltr' ),
							'slug' => __( 'Slug', 'prdctfltr' ),
							'count' => __( 'Count', 'prdctfltr' )
						),
					'default' => array(),
					'css' => 'width:300px;margin-right:12px;'
				),
				'prdctfltr_tag_order' => array(
					'name' => __( 'Tags Order', 'prdctfltr' ),
					'type' => 'select',
					'desc' => __( 'Select ascending or descending order.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_tag_order',
					'options' => array(
							'ASC' => __( 'ASC', 'prdctfltr' ),
							'DESC' => __( 'DESC', 'prdctfltr' )
						),
					'default' => array(),
					'css' => 'width:300px;margin-right:12px;'
				),
				'prdctfltr_tag_limit' => array(
					'name' => __( 'Limit Tags', 'prdctfltr' ),
					'type' => 'number',
					'desc' => __( 'Limit number of tags to be shown. If limit is set tags with most posts will be shown first.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_tag_limit',
					'default' => 0,
					'custom_attributes' => array(
						'min' 	=> 0,
						'max' 	=> 100,
						'step' 	=> 1
					),
					'css' => 'width:100px;margin-right:12px;'
				),
				'prdctfltr_tag_multi' => array(
					'name' => __( 'Use Multi Select', 'prdctfltr' ),
					'type' => 'checkbox',
					'desc' => __( 'Check this option to enable multi-select on tags.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_tag_multi',
					'default' => 'no',
				),
				'prdctfltr_tag_relation' => array(
					'name' => __( 'Multi Select Tags Relation', 'prdctfltr' ),
					'type' => 'select',
					'desc' => __( 'Select tags relation when multiple terms are selected.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_tag_relation',
					'options' => array(
							'IN' => __( 'Filtered products have at least one term (IN)', 'prdctfltr' ),
							'AND' => __( 'Filtered products have selected terms (AND)', 'prdctfltr' )
						),
					'default' => array(),
					'css' => 'width:300px;margin-right:12px;'
				),
				'prdctfltr_tag_adoptive' => array(
					'name' => __( 'Use Adoptive Filtering', 'prdctfltr' ),
					'type' => 'checkbox',
					'desc' => __( 'Check this option to use adoptive filtering on tags.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_tag_adoptive',
					'default' => 'no',
				),
				'prdctfltr_tag_none' => array(
					'name' => __( 'Tags Hide None', 'prdctfltr' ),
					'type' => 'checkbox',
					'desc' => __( 'Check this option to hide None on tags.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_tag_none',
					'default' => 'no',
				),
				'section_tag_filter_end' => array(
					'type' => 'sectionend',
					'id' => 'wc_settings_prdctfltr_tag_filter_end'
				),
				'section_char_filter_title' => array(
					'name'     => __( 'By Characteristics Filter Settings', 'prdctfltr' ),
					'type'     => 'title',
					'desc'     => __( 'Setup by characteristics filter.', 'prdctfltr' ),
					'id'       => 'wc_settings_prdctfltr_char_filter_title'
				),
				'prdctfltr_custom_tax' => array(
					'name' => __( 'Use Characteristics', 'prdctfltr' ),
					'type' => 'checkbox',
					'desc' => __( 'Enable this option to get custom characteristics product meta box.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_custom_tax',
					'default' => 'yes',
				),
				'prdctfltr_custom_tax_title' => array(
					'name' => __( 'Override Characteristics Filter Title', 'prdctfltr' ),
					'type' => 'text',
					'desc' => __( 'Enter title for the characteristics filter. If you leave this field blank default will be used.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_custom_tax_title',
					'default' => '',
					'css' => 'width:300px;margin-right:12px;'
				),
				'prdctfltr_include_chars' => array(
					'name' => __( 'Select Characteristics', 'prdctfltr' ),
					'type' => 'multiselect',
					'desc' => __( 'Select characteristics to include. Use CTRL+Click to select multiple characteristics or deselect all.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_include_chars',
					'options' => $curr_chars,
					'default' => array(),
					'css' => 'width:300px;margin-right:12px;'
				),
				'prdctfltr_custom_tax_orderby' => array(
					'name' => __( 'Characteristics Order By', 'prdctfltr' ),
					'type' => 'select',
					'desc' => __( 'Select the characteristics order.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_custom_tax_orderby',
					'options' => array(
							'' => __( 'None', 'prdctfltr' ),
							'id' => __( 'ID', 'prdctfltr' ),
							'name' => __( 'Name', 'prdctfltr' ),
							'slug' => __( 'Slug', 'prdctfltr' ),
							'count' => __( 'Count', 'prdctfltr' )
						),
					'default' => array(),
					'css' => 'width:300px;margin-right:12px;'
				),
				'prdctfltr_custom_tax_order' => array(
					'name' => __( 'Characteristics Order', 'prdctfltr' ),
					'type' => 'select',
					'desc' => __( 'Select ascending or descending order.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_custom_tax_order',
					'options' => array(
							'ASC' => __( 'ASC', 'prdctfltr' ),
							'DESC' => __( 'DESC', 'prdctfltr' )
						),
					'default' => array(),
					'css' => 'width:300px;margin-right:12px;'
				),
				'prdctfltr_custom_tax_limit' => array(
					'name' => __( 'Limit Characteristics', 'prdctfltr' ),
					'type' => 'number',
					'desc' => __( 'Limit number of characteristics to be shown. If limit is set characteristics with most posts will be shown first.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_custom_tax_limit',
					'default' => 0,
					'custom_attributes' => array(
						'min' 	=> 0,
						'max' 	=> 100,
						'step' 	=> 1
					),
					'css' => 'width:100px;margin-right:12px;'
				),
				'prdctfltr_chars_multi' => array(
					'name' => __( 'Use Multi Select', 'prdctfltr' ),
					'type' => 'checkbox',
					'desc' => __( 'Check this option to enable multi-select on characteristics.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_chars_multi',
					'default' => 'no',
				),
				'prdctfltr_custom_tax_relation' => array(
					'name' => __( 'Multi Select Characteristics Relation', 'prdctfltr' ),
					'type' => 'select',
					'desc' => __( 'Select characteristics relation when multiple terms are selected.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_custom_tax_relation',
					'options' => array(
							'IN' => __( 'Filtered products have at least one term (IN)', 'prdctfltr' ),
							'AND' => __( 'Filtered products have selected terms (AND)', 'prdctfltr' )
						),
					'default' => array(),
					'css' => 'width:300px;margin-right:12px;'
				),
				'prdctfltr_chars_adoptive' => array(
					'name' => __( 'Use Adoptive Filtering', 'prdctfltr' ),
					'type' => 'checkbox',
					'desc' => __( 'Check this option to use adoptive filtering on characteristics.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_chars_adoptive',
					'default' => 'no',
				),
				'prdctfltr_chars_none' => array(
					'name' => __( 'Characteristics Hide None', 'prdctfltr' ),
					'type' => 'checkbox',
					'desc' => __( 'Check this option to hide None on characteristics.', 'prdctfltr' ),
					'id'   => 'wc_settings_prdctfltr_chars_none',
					'default' => 'no',
				),
				'section_char_filter_end' => array(
					'type' => 'sectionend',
					'id' => 'wc_settings_prdctfltr_char_filter_end'
				),

			);

			if ($attribute_taxonomies) {
				$settings = $settings + array (
					
				);
				foreach ($attribute_taxonomies as $tax) {

					$catalog_attrs = get_terms( 'pa_' . $tax->attribute_name );
					$curr_attrs = array();
					if ( !empty( $catalog_attrs ) && !is_wp_error( $catalog_attrs ) ){
						foreach ( $catalog_attrs as $term ) {
							$curr_attrs[ WC_Prdctfltr::prdctfltr_utf8_decode( $term->slug ) ] = $term->name;
						}
					}

					$tax->attribute_label = !empty( $tax->attribute_label ) ? $tax->attribute_label : $tax->attribute_name;

					$settings = $settings + array(
						'section_pa_'.$tax->attribute_name.'_title' => array(
							'name'     => __( 'By', 'prdctfltr' ) . ' ' . $tax->attribute_label . ' ' . __( 'Filter Settings', 'prdctfltr' ),
							'type'     => 'title',
							'desc'     => __( 'Select options for the current attribute.', 'prdctfltr' ),
							'id'       => 'wc_settings_prdctfltr_pa_'.$tax->attribute_name.'_title'
						),
						'prdctfltr_pa_'.$tax->attribute_name.'_title' => array(
							'name' => __( 'Override ' . $tax->attribute_label . ' Filter Title', 'prdctfltr' ),
							'type' => 'text',
							'desc' => __( 'Enter title for the characteristics filter. If you leave this field blank default will be used.', 'prdctfltr' ),
							'id'   => 'wc_settings_prdctfltr_pa_'.$tax->attribute_name.'_title',
							'default' => '',
							'css' => 'width:300px;margin-right:12px;'
						),
						'prdctfltr_include_pa_'.$tax->attribute_name => array(
							'name' => __( 'Select Terms', 'prdctfltr' ),
							'type' => 'multiselect',
							'desc' => __( 'Select terms to include. Use CTRL+Click to select multiple terms or deselect all.', 'prdctfltr' ),
							'id'   => 'wc_settings_prdctfltr_include_pa_'.$tax->attribute_name,
							'options' => $curr_attrs,
							'default' => array(),
							'css' => 'width:300px;margin-right:12px;'
						),
						'prdctfltr_pa_'.$tax->attribute_name.'_orderby' => array(
							'name' => __( 'Terms Order By', 'prdctfltr' ),
							'type' => 'select',
							'desc' => __( 'Select the term order.', 'prdctfltr' ),
							'id'   => 'wc_settings_pa_'.$tax->attribute_name.'_orderby',
							'options' => array(
									'' => __( 'None', 'prdctfltr' ),
									'id' => __( 'ID', 'prdctfltr' ),
									'name' => __( 'Name', 'prdctfltr' ),
									'slug' => __( 'Slug', 'prdctfltr' ),
									'count' => __( 'Count', 'prdctfltr' )
								),
							'default' => array(),
							'css' => 'width:300px;margin-right:12px;'
						),
						'prdctfltr_pa_'.$tax->attribute_name.'_order' => array(
							'name' => __( 'Terms Order', 'prdctfltr' ),
							'type' => 'select',
							'desc' => __( 'Select ascending or descending order.', 'prdctfltr' ),
							'id'   => 'wc_settings_prdctfltr_pa_'.$tax->attribute_name.'_order',
							'options' => array(
									'ASC' => __( 'ASC', 'prdctfltr' ),
									'DESC' => __( 'DESC', 'prdctfltr' )
								),
							'default' => array(),
							'css' => 'width:300px;margin-right:12px;'
						),
						'prdctfltr_pa_'.$tax->attribute_name => array(
							'name' => __( 'Appearance', 'prdctfltr' ),
							'type' => 'select',
							'desc' => __( 'Select style preset to use with the current attribute.', 'prdctfltr' ),
							'id'   => 'wc_settings_prdctfltr_pa_'.$tax->attribute_name,
							'options' => array(
								'pf_attr_text' => __( 'Text', 'prdctfltr' ),
								'pf_attr_imgtext' => __( 'Thumbnails with text', 'prdctfltr' ),
								'pf_attr_img' => __( 'Thumbnails only', 'prdctfltr' )
							),
							'default' => 'pf_attr_text',
							'css' => 'width:300px;margin-right:12px;'
						),
						'prdctfltr_pa_'.$tax->attribute_name.'_hierarchy' => array(
							'name' => __( 'Use Attribute Hierarchy', 'prdctfltr' ),
							'type' => 'checkbox',
							'desc' => __( 'Check this option to enable attribute hierarchy.', 'prdctfltr' ),
							'id'   => 'wc_settings_prdctfltr_pa_'.$tax->attribute_name.'_hierarchy',
							'default' => 'no',
						),
						'prdctfltr_pa_'.$tax->attribute_name.'_multi' => array(
							'name' => __( 'Use Multi Select', 'prdctfltr' ),
							'type' => 'checkbox',
							'desc' => __( 'Check this option to enable multi-select on current attribute.', 'prdctfltr' ),
							'id'   => 'wc_settings_prdctfltr_pa_'.$tax->attribute_name.'_multi',
							'default' => 'no',
						),
						'prdctfltr_pa_'.$tax->attribute_name.'_relation' => array(
							'name' => __( 'Multi Select Terms Relation', 'prdctfltr' ),
							'type' => 'select',
							'desc' => __( 'Select terms relation when multiple terms are selected.', 'prdctfltr' ),
							'id'   => 'wc_settings_prdctfltr_pa_'.$tax->attribute_name.'_relation',
							'options' => array(
									'IN' => __( 'Filtered products have at least one term (IN)', 'prdctfltr' ),
									'AND' => __( 'Filtered products have selected terms (AND)', 'prdctfltr' )
								),
							'default' => array(),
							'css' => 'width:300px;margin-right:12px;'
						),
						'prdctfltr_pa_'.$tax->attribute_name.'_adoptive' => array(
							'name' => __( 'Use Adoptive Filtering', 'prdctfltr' ),
							'type' => 'checkbox',
							'desc' => __( 'Check this option to use adoptive filtering on current attribute.', 'prdctfltr' ),
							'id'   => 'wc_settings_prdctfltr_pa_'.$tax->attribute_name.'_adoptive',
							'default' => 'no',
						),
						'prdctfltr_pa_'.$tax->attribute_name.'_none' => array(
							'name' => __( 'Hide None', 'prdctfltr' ),
							'type' => 'checkbox',
							'desc' => __( 'Check this option to hide None on current attribute.', 'prdctfltr' ),
							'id'   => 'wc_settings_prdctfltr_pa_'.$tax->attribute_name.'_none',
							'default' => 'no',
						),
						'section_pa_'.$tax->attribute_name.'_end' => array(
							'type' => 'sectionend',
							'id' => 'wc_settings_prdctfltr_pa_'.$tax->attribute_name.'_end'
						),
						
					);
				}
			}

		}
		else if ( isset($_GET['section']) && $_GET['section'] == 'overrides' ) {
			$settings = array();
			if ( $action == 'get' ) {
				$curr_or_settings = get_option( 'prdctfltr_overrides', array() );
			?>
				<h3><?php _e( 'Product Filter Shop Archives Override', 'prdctfltr' ); ?></h3>
				<p><?php _e( 'Override archive filters. Select the term you wish to override and the desired filter preset and click Add Override to enable the new filter preset on this archive page.', 'prdctfltr' ); ?></p>
			<?php
				$curr_overrides = array(
					'product_cat' => array( 'text' => __( 'Product Categories Overrides', 'prdctfltr' ), 'values' => $curr_cats ),
					'product_tag' => array( 'text' => __( 'Product Tags Overrides', 'prdctfltr' ), 'values' => $curr_tags ),
					'characteristics' => array( 'text' => __( 'Product Characteristics Overrides', 'prdctfltr' ), 'values' => $curr_chars )
				);
				foreach ( $curr_overrides as $n => $m ) {
					if ( empty($m['values']) ) {
						continue;
					}
			?>
					<h3><?php echo $m['text']; ?></h3>
					<p class="<?php echo $n; ?>">
					<?php
						if ( isset($curr_or_settings[$n]) ) {
							foreach ( $curr_or_settings[$n] as $k => $v ) {
						?>
						<span class="prdctfltr_override"><input type="checkbox" class="pf_override_checkbox" /> <?php echo __('Term slug', 'prdctfltr') . ' : <span class="slug">' . $k . '</span>'; ?> <?php echo __('Filter Preset', 'prdctfltr') . ' : <span class="preset">' . $v; ?></span> <a href="#" class="button prdctfltr_or_remove"><?php _e('Remove Override', 'prdctfltr'); ?></a><span class="clearfix"></span></span>
						<?php
							}
						}
					?>
						<span class="prdctfltr_override_controls">
							<a href="#" class="button prdctfltr_or_remove_selected"><?php _e('Remove Selected Overrides', 'prdctfltr'); ?></a> <a href="#" class="button prdctfltr_or_remove_all"><?php _e('Remove All Overrides', 'prdctfltr'); ?></a>
						</span>
						<select class="prdctfltr_or_select">
					<?php
						foreach ( $m['values'] as $k => $v ) {
							printf( '<option value="%1$s">%2$s</option>', $k, $v );
						}
					?>
						</select>
						<select class="prdctfltr_filter_presets">
							<option value="default"><?php _e('Default', 'wcwar'); ?></option>
							<?php
								$curr_presets = get_option('prdctfltr_templates');
								if ( $curr_presets === false ) {
									$curr_presets = array();
								}
								if ( !empty($curr_presets) ) {
									foreach ( $curr_presets as $k => $v ) {
								?>
										<option value="<?php echo $k; ?>"><?php echo $k; ?></option>
								<?php
									}
								}
							?>
						</select>
						<a href="#" class="button-primary prdctfltr_or_add"><?php _e( 'Add Override', 'prdctfltr' ); ?></a>
					</p>
			<?php
				}
			}
		}

		return apply_filters( 'wc_settings_products_filter_settings', $settings );
	}


	/*
	 * AJAX Save Preset
	 */
	function prdctfltr_admin_save() {

		$curr_name = $_POST['curr_name'];

		$curr_data = array();
		$curr_data[$curr_name] = $_POST['curr_settings'];

		$curr_presets = get_option('prdctfltr_templates');

		if ( $curr_presets === false ) {
			$curr_presets = array();
		}

		if ( isset($curr_presets) && is_array($curr_presets) ) {
			if ( array_key_exists($curr_name, $curr_presets) ) {
				unset($curr_presets[$curr_name]);
			}

			$curr_presets = $curr_presets + $curr_data;

			update_option('prdctfltr_templates', $curr_presets);

			die('1');
			exit;
		}

		die();
		exit;

	}

	/*
	 * AJAX Load Preset
	 */
	function prdctfltr_admin_load() {

		$curr_name = $_POST['curr_name'];

		$curr_presets = get_option('prdctfltr_templates');
		if ( isset($curr_presets) && !empty($curr_presets) && is_array($curr_presets) ) {
			if ( array_key_exists($curr_name, $curr_presets) ) {
				die(stripslashes($curr_presets[$curr_name]));
				exit;
			}
			die('1');
			exit;
		}

		die();
		exit;

	}

	/*
	 * AJAX Delete Preset
	 */
	function prdctfltr_admin_delete() {

		$curr_name = $_POST['curr_name'];

		$curr_presets = get_option('prdctfltr_templates');
		if ( isset($curr_presets) && !empty($curr_presets) && is_array($curr_presets) ) {
			if ( array_key_exists($curr_name, $curr_presets) ) {
				unset($curr_presets[$curr_name]);
				update_option('prdctfltr_templates', $curr_presets);
			}
			die('1');
			exit;
		}

		die();
		exit;

	}

	/*
	 * AJAX Override Add
	 */
	function prdctfltr_or_add() {
		$curr_tax = $_POST['curr_tax'];
		$curr_term = $_POST['curr_term'];
		$curr_override = $_POST['curr_override'];

		$curr_overrides = get_option('prdctfltr_overrides');

		if ( $curr_overrides === false ) {
			$curr_overrides = array();
		}

		$curr_data = array(
			$curr_tax => array( $curr_term => $curr_override )
		);

		if ( isset($curr_overrides) && is_array($curr_overrides) ) {
			if ( isset($curr_overrides[$curr_tax]) && isset($curr_overrides[$curr_tax][$curr_term])) {
				unset($curr_overrides[$curr_tax][$curr_term]);
			}
			$curr_overrides = array_merge_recursive($curr_overrides, $curr_data);
			update_option('prdctfltr_overrides', $curr_overrides);
			die('1');
			exit;
		}

		die();
		exit;

	}

	/*
	 * AJAX Override Remove
	 */
	function prdctfltr_or_remove() {
		$curr_tax = $_POST['curr_tax'];
		$curr_term = $_POST['curr_term'];
		$curr_overrides = get_option('prdctfltr_overrides');

		if ( $curr_overrides === false ) {
			$curr_overrides = array();
		}
		if ( isset($curr_overrides) && is_array($curr_overrides) ) {
			if ( isset($curr_overrides[$curr_tax]) && isset($curr_overrides[$curr_tax][$curr_term])) {
				unset($curr_overrides[$curr_tax][$curr_term]);
				update_option('prdctfltr_overrides', $curr_overrides);
				die('1');
				exit;
			}
		}

		die();
		exit;

	}

	/*
	 * AJAX Advanced Taxonomies
	 */
	function prdctfltr_c_fields() {
		$taxonomies = get_object_taxonomies( 'product', 'object' );
		$pf_id = ( isset( $_POST['pf_id'] ) ? $_POST['pf_id'] : 0 );

		$html = '';

		$html .= sprintf( '<label><span>%2$s</span> <input type="text" name="pfa_title[%3$s]" value="%1$s" /></label>', ( isset($_POST['pfa_title']) ? $_POST['pfa_title'] : '' ), __( 'Override title', 'prdctfltr' ), $pf_id );

		$html .= '<label><span>' . __( 'Select taxonomy','prdctfltr' ) . '</span> <select class="prdctfltr_adv_select" name="pfa_taxonomy[' . $pf_id . ']">';

		$i=0;

		foreach ( $taxonomies as $k => $v ) {
			if ( $k == 'product_type' ) {
				continue;
			}
			$selected = ( isset($_POST['pfa_taxonomy']) && $_POST['pfa_taxonomy'] == $k ? ' selected="selected"' : '' ) ;
			$html .= '<option value="' . $k . '"' . $selected . '>' . $v->label . '</option>';
			if ( !isset($_POST['pfa_taxonomy']) && $i==0 ) {
				$curr_fix = $k;
			}
			$i++;
		}
		if ( isset($_POST['pfa_taxonomy']) ) {
			$curr_fix = $_POST['pfa_taxonomy'];
		}

		$html .= '</select></label>';

		$catalog_attrs = get_terms( $curr_fix );
		$curr_options = '';
		if ( !empty( $catalog_attrs ) && !is_wp_error( $catalog_attrs ) ){
			foreach ( $catalog_attrs as $term ) {
				$selected = ( isset($_POST['pfa_include']) && is_array($_POST['pfa_include']) && in_array($term->slug, $_POST['pfa_include']) ? ' selected="selected"' : '' ) ;
				$curr_options .= sprintf( '<option value="%1$s"%3$s>%2$s</option>', $term->slug, $term->name, $selected );
			}
		}

		$html .= sprintf( '<label><span>%2$s</span> <select name="pfa_include[%3$s][]" multiple="multiple">%1$s</select></label>', $curr_options, __( 'Include terms', 'prdctfltr' ), $pf_id );

		$curr_options = '';
		$orderby_params = array(
			'' => __( 'None', 'prdctfltr' ),
			'id' => __( 'ID', 'prdctfltr' ),
			'name' => __( 'Name', 'prdctfltr' ),
			'number' => __( 'Number', 'prdctfltr' ),
			'slug' => __( 'Slug', 'prdctfltr' ),
			'count' => __( 'Count', 'prdctfltr' )
		);
		foreach ( $orderby_params as $k => $v ) {
			$selected = ( isset($_POST['pfa_orderby']) && $_POST['pfa_orderby'] == $k ? ' selected="selected"' : '' );
			$curr_options .= sprintf( '<option value="%1$s"%3$s>%2$s</option>', $k, $v, $selected );
		}
		$html .= sprintf( '<label><span>%3$s</span> <select name="pfa_orderby[%2$s]">%1$s</select></label>', $curr_options, $pf_id, __( 'Term order by', 'prdctfltr' ) );

		$curr_options = '';
		$order_params = array(
			'ASC' => __( 'ASC', 'prdctfltr' ),
			'DESC' => __( 'DESC', 'prdctfltr' )
		);
		foreach ( $order_params as $k => $v ) {
			$selected = ( isset($pf_filters_advanced['pfa_order'][$pf_id]) && $pf_filters_advanced['pfa_order'][$pf_id] == $k ? ' selected="selected"' : '' );
			$curr_options .= sprintf( '<option value="%1$s"%3$s>%2$s</option>', $k, $v, $selected );
		}

		$html .= sprintf( '<label><span>%3$s</span> <select name="pfa_order[%2$s]"%4$s>%1$s</select></label>', $curr_options, $pf_id, __( 'Term order', 'prdctfltr' ), $add_disable );

		$selected = ( isset($_POST['pfa_multiselect']) && $_POST['pfa_multiselect'] == 'yes' ? ' checked="checked"' : '' ) ;
		$html .= sprintf( '<label><input type="checkbox" name="pfa_multiselect[%3$s]" value="yes"%1$s /> %2$s</label>', $selected, __( 'Use multi select', 'prdctfltr' ), $pf_id );

		$curr_options = '';
		$relation_params = array(
			'IN' => __( 'Filtered products have at least one term (IN)', 'prdctfltr' ),
			'AND' => __( 'Filtered products have selected terms (AND)', 'prdctfltr' )
		);
		foreach ( $relation_params as $k => $v ) {
			$selected = ( isset($_POST['pfa_relation']) && $_POST['pfa_relation'] == $k ? ' selected="selected"' : '' );
			$curr_options .= sprintf( '<option value="%1$s"%3$s>%2$s</option>', $k, $v, $selected );
		}
		$html .= sprintf( '<label><span>%3$s</span> <select name="pfa_relation[%2$s]">%1$s</select></label>', $curr_options, $i, __( 'Term relation', 'prdctfltr' ) );

		$selected = ( isset($_POST['pfa_adoptive']) && $_POST['pfa_adoptive'] == 'yes' ? ' checked="checked"' : '' ) ;
		$html .= sprintf( '<label><input type="checkbox" name="pfa_adoptive[%3$s]" value="yes"%1$s /> %2$s</label>', $selected, __( 'Use adoptive filtering', 'prdctfltr' ), $pf_id );

		$selected = ( isset($_POST['pfa_none']) && $_POST['pfa_none'] == 'yes' ? ' checked="checked"' : '' ) ;
		$html .= sprintf( '<label><input type="checkbox" name="pfa_none[%3$s]" value="yes"%1$s /> %2$s</label>', $selected, __( 'Hide none', 'prdctfltr' ), $pf_id );

		die($pf_id . '%SPLIT%' . $html);
		exit;

	}

	/**
	 * AJAX Advanced Terms
	 */
	function prdctfltr_c_terms() {

		$curr_tax = ( isset($_POST['taxonomy']) ? $_POST['taxonomy'] : '' );

		if ( $curr_tax == '' ) {
			die();
			exit;
		}

		$html = '';

		$catalog_attrs = get_terms( $curr_tax );
		$curr_options = '';
		if ( !empty( $catalog_attrs ) && !is_wp_error( $catalog_attrs ) ){
			foreach ( $catalog_attrs as $term ) {
				$curr_options .= sprintf( '<option value="%1$s">%2$s</option>', $term->slug, $term->name );
			}
		}

		$html .= sprintf( '<label><span>%2$s</span> <select name="pfa_include[%%%%][]" multiple="multiple">%1$s</select></label>', $curr_options, __( 'Include terms', 'prdctfltr' ) );

		die($html);
		exit;

	}

	/**
	 * AJAX Range Taxonomies
	 */
	function prdctfltr_r_fields() {
		$taxonomies = wc_get_attribute_taxonomies();
		$pf_id = ( isset( $_POST['pf_id'] ) ? $_POST['pf_id'] : 0 );

		$html = '';

		$html .= sprintf( '<label><span>%2$s</span> <input type="text" name="pfr_title[%3$s]" value="%1$s" /></label>', ( isset($_POST['pfr_title']) ? $_POST['pfr_title'] : '' ), __( 'Override title', 'prdctfltr' ), $pf_id );

		$html .= '<label><span>' . __( 'Select attribute','prdctfltr' ) . '</span> <select class="prdctfltr_rng_select" name="pfr_taxonomy[' . $pf_id . ']">';

		$html .= '<option value="price"' . ( isset($_POST['pfr_taxonomy']) && $_POST['pfr_taxonomy'] == 'price' ? ' selected="selected"' : '' ) . '>' . __( 'Price range', 'prdctfltr' ) . '</option>';

		foreach ( $taxonomies as $k => $v ) {
			$selected = ( isset($_POST['pfr_taxonomy']) && $_POST['pfr_taxonomy'] == 'pa_' . $v->attribute_name ? ' selected="selected"' : '' ) ;
			$curr_label = !empty( $v->attribute_label ) ? $v->attribute_label : $v->attribute_name;
			$html .= '<option value="pa_' . $v->attribute_name . '"' . $selected . '>' . $curr_label . '</option>';
		}
		if ( isset($_POST['pfr_taxonomy']) ) {
			$curr_fix = $_POST['pfr_taxonomy'];
		}
		else {
			$curr_fix = 'price';
		}

		$html .= '</select></label>';

		if ( $curr_fix == 'price' ) {
			$html .= sprintf( '<label><span>%2$s</span> <select name="pfr_include[%3$s][]" multiple="multiple" disabled>%1$s</select></label>', array(), __( 'Include terms', 'prdctfltr' ), $pf_id );
			$add_disable = ' disabled';
		}
		else {
			$catalog_attrs = get_terms( $curr_fix );
			$curr_options = '';

			if ( !empty( $catalog_attrs ) && !is_wp_error( $catalog_attrs ) ){
				foreach ( $catalog_attrs as $term ) {
					$selected = ( isset($_POST['pfr_include']) && is_array($_POST['pfr_include']) && in_array($term->slug, $_POST['pfr_include']) ? ' selected="selected"' : '' ) ;
					$curr_options .= sprintf( '<option value="%1$s"%3$s>%2$s</option>', $term->slug, $term->name, $selected );
				}
			}

			$html .= sprintf( '<label><span>%2$s</span> <select name="pfr_include[%3$s][]" multiple="multiple">%1$s</select></label>', $curr_options, __( 'Include terms', 'prdctfltr' ), $pf_id );
			$add_disable = '';

		}

		$curr_options = '';
		$orderby_params = array(
			'' => __( 'None', 'prdctfltr' ),
			'id' => __( 'ID', 'prdctfltr' ),
			'name' => __( 'Name', 'prdctfltr' ),
			'number' => __( 'Number', 'prdctfltr' ),
			'slug' => __( 'Slug', 'prdctfltr' ),
			'count' => __( 'Count', 'prdctfltr' )
		);
		foreach ( $orderby_params as $k => $v ) {
			$selected = ( isset($_POST['pfr_orderby']) && $_POST['pfr_orderby'] == $k ? ' selected="selected"' : '' );
			$curr_options .= sprintf( '<option value="%1$s"%3$s>%2$s</option>', $k, $v, $selected );
		}
		$html .= sprintf( '<label><span>%3$s</span> <select name="pfr_orderby[%2$s]"%4$s>%1$s</select></label>', $curr_options, $pf_id, __( 'Term order by', 'prdctfltr' ), $add_disable );

		$curr_options = '';
		$order_params = array(
			'ASC' => __( 'ASC', 'prdctfltr' ),
			'DESC' => __( 'DESC', 'prdctfltr' )
		);
		foreach ( $order_params as $k => $v ) {
			$selected = ( isset($pf_filters_advanced['pfr_order'][$pf_id]) && $pf_filters_advanced['pfr_order'][$pf_id] == $k ? ' selected="selected"' : '' );
			$curr_options .= sprintf( '<option value="%1$s"%3$s>%2$s</option>', $k, $v, $selected );
		}

		$html .= sprintf( '<label><span>%3$s</span> <select name="pfr_order[%2$s]"%4$s>%1$s</select></label>', $curr_options, $pf_id, __( 'Term order', 'prdctfltr' ), $add_disable );

		$catalog_style = array( 'flat' => __( 'Flat', 'prdctfltr' ), 'modern' => __( 'Modern', 'prdctfltr' ), 'html5' => __( 'HTML5', 'prdctfltr' ), 'white' => __( 'White', 'prdctfltr' ) );
		$curr_options = '';
		foreach ( $catalog_style as $k => $v ) {
			$selected = ( isset($_POST['pfr_style']) && $_POST['pfr_style'] == $k ? ' selected="selected"' : '' ) ;
			$curr_options .= sprintf( '<option value="%1$s"%3$s>%2$s</option>', $k, $v, $selected );
		}

		$html .= sprintf( '<label><span>%2$s</span> <select name="pfr_style[%3$s]">%1$s</select></label>', $curr_options, __( 'Select style', 'prdctfltr' ), $pf_id );

		$selected = ( isset($_POST['pfr_grid']) && $_POST['pfr_grid'] == 'yes' ? ' checked="checked"' : '' ) ;
		$html .= sprintf( '<label><input type="checkbox" name="pfr_grid[%3$s]" value="yes"%1$s /> %2$s</label>', $selected, __( 'Use grid', 'prdctfltr' ), $pf_id );

		die($pf_id . '%SPLIT%' . $html);
		exit;

	}

	/**
	 * AJAX Range Terms
	 */
	function prdctfltr_r_terms() {

		$curr_tax = ( isset($_POST['taxonomy']) ? $_POST['taxonomy'] : '' );

		if ( $curr_tax == '' ) {
			die();
			exit;
		}

		$html = '';

		if ( !in_array( $curr_tax, array( 'price' ) ) ) {

			$catalog_attrs = get_terms( $curr_tax );
			$curr_options = '';
			if ( !empty( $catalog_attrs ) && !is_wp_error( $catalog_attrs ) ){
				foreach ( $catalog_attrs as $term ) {
					$curr_options .= sprintf( '<option value="%1$s">%2$s</option>', $term->slug, $term->name );
				}
			}

			$html .= sprintf( '<label><span>%2$s</span> <select name="pfr_include[%%%%][]" multiple="multiple">%1$s</select></label>', $curr_options, __( 'Include terms', 'prdctfltr' ) );

		}
		else {
			$html .= sprintf( '<label><span>%1$s</span> <select name="pfr_include[%%%%][]" multiple="multiple" disabled></select></label>', __( 'Include terms', 'prdctfltr' ) );
		}

		die($html);
		exit;

	}

}

add_action( 'init', 'WC_Settings_Prdctfltr::init');

?>