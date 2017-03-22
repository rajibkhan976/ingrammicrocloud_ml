<?php

/*
 * [prdctfltr_sc_products]
 */
function prdctfltr_sc_products( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'preset' => '',
		'rows' => 4,
		'columns' => 4,
		'ajax' => 'no',
		'pagination' => 'yes',
		'use_filter' => 'yes',
		'no_products' => 'no',
		'show_products' => 'yes',
		'min_price' => '',
		'max_price' => '',
		'orderby' => '',
		'order' => '',
		'meta_key'=> '',
		'product_cat'=> '',
		'product_tag'=> '',
		'product_characteristics'=> '',
		'product_attributes'=> '',
		'sale_products' => '',
		'instock_products' => '',
		'http_query' => '',
		'disable_overrides' => 'yes',
		'action' => '',
		'bot_margin' => 36,
		'class' => '',
		'shortcode_id' => ''
	), $atts ) );


	global $paged;
	$args = array();
	if ( empty( $paged ) ) $paged = ( get_query_var('paged') ? get_query_var('paged') : 1 );

	if ( $no_products == 'no' ) {
		$args = $args + array (
			'prdctfltr' => 'active'
		);
	}
	else {
		$use_filter = 'no';
		$pagination = 'no';
		$orderby = 'rand';
	}

	global $prdctfltr_global;

	if ( $action !== '' ) {
		$prdctfltr_global['action'] = $action;
	}
	else {
		$prdctfltr_global['action'] = '';
	}
	if ( $preset !== '' ) {
		$prdctfltr_global['preset'] = $preset;
	}
	else {
		$prdctfltr_global['preset'] = '';
	}

	if ( $disable_overrides !== '' ) {
		$prdctfltr_global['disable_overrides'] = $disable_overrides;
	}
	else {
		$prdctfltr_global['disable_overrides'] = '';
	}

	$args = $args + array (
		'post_type'				=> 'product',
		'post_status'			=> 'publish',
		'posts_per_page' 		=> $columns*$rows,
		'paged' 				=> $paged,
		'meta_query' 			=> array(
			array(
				'key' 			=> '_visibility',
				'value' 		=> array('catalog', 'visible'),
				'compare' 		=> 'IN'
			)
		)
	);

	if ( $orderby !== '' ) {
		$args['orderby'] = $orderby;
	}
	if ( $order !== '' ) {
		$args['order'] = $order;
	}
	if ( $order !== '' ) {
		$args['meta_key'] = $meta_key;
	}
	if ( $min_price !== '' ) {
		$args['min_price'] = $min_price;
	}
	if ( $max_price !== '' ) {
		$args['max_price'] = $max_price;
	}
	if ( $product_cat !== '' ) {
		$args['product_cat'] = $product_cat;
	}
	if ( $product_tag !== '' ) {
		$args['product_tag'] = $product_tag;
	}
	if ( $product_characteristics !== '' ) {
		$args['product_characteristics'] = $product_characteristics;
	}
	if ( $product_attributes !== '' ) {
		$args['product_attributes'] = $product_attributes;
	}
	if ( $instock_products !== '' ) {
		$args['instock_products'] = $instock_products;
	}
	if ( $sale_products !== '' ) {
		$args['sale_products'] = $sale_products;
	}
	if ( $http_query !== '' ) {
		$args['http_query'] = $http_query;
	}

	if ( $ajax == 'yes' ) {

		$ajax_params =  array(
			( $preset !== '' ? $preset : 'false' ),
			( $columns !== '' ? $columns : 'false' ),
			( $rows !== '' ? $rows : 'false' ),
			( $pagination !== '' ? $pagination : 'false' ),
			( $no_products !== '' ? $no_products : 'false' ),
			( $show_products !== '' ? $show_products : 'false' ),
			( $use_filter !== '' ? $use_filter : 'false' ),
			( $action !== '' ? $action : 'false' ),
			( $bot_margin !== '' ? $bot_margin : 'false' ),
			( $class !== '' ? $class : 'false' ),
			( $shortcode_id !== '' ? $shortcode_id : 'false' ),
			( $disable_overrides !== '' ? $disable_overrides : 'false' )
		);
		$pf_params = implode( '|', $ajax_params );

		$add_ajax = ' data-query="' . http_build_query( $args ) . '" data-page="' . $paged . '" data-shortcode="' . $pf_params . '"';

		$prdctfltr_global['sc_ajax'] = true;

	}

	$prdctfltr_global['sc_query'] = $args;

	$bot_margin = (int)$bot_margin;
	$margin = " style='margin-bottom:".$bot_margin."px'";

	$out = '';

	global $woocommerce, $woocommerce_loop;
	
	$woocommerce_loop['columns'] = $columns;

	$products = new WP_Query( $args );

	ob_start();

	if ( $products->have_posts() ) : ?>

		<?php
			if ( $use_filter == 'yes' ) {
				include( WC_Prdctfltr::$dir . '/woocommerce/loop/product-filter.php' );
			}
		?>
		
		<?php if ( $show_products == 'yes' ) { ?>

		<?php woocommerce_product_loop_start(); ?>

			<?php while ( $products->have_posts() ) : $products->the_post(); ?>

				<?php wc_get_template_part( 'content', 'product' ); ?>

			<?php endwhile; ?>

		<?php woocommerce_product_loop_end(); ?>

		<?php
			}
			else {
				$pagination = 'no';
			}
		?>

	<?php
	
	else :
		wc_get_template( 'loop/no-products-found.php' );
	endif;

	$shortcode = ob_get_clean();

	$out .= '<div' . ( $shortcode_id != '' ? ' id="'.$shortcode_id.'"' : '' ) . ' class="prdctfltr_sc_products woocommerce'.($ajax=='yes'? ' prdctfltr_ajax' : '' ).'' . ( $class != '' ? ' '.$class.'' : '' ) . '"'.$margin.($ajax=='yes' ? $add_ajax : '' ).'>';
	$out .= do_shortcode($shortcode);

	if ( $pagination == 'yes' ) {

		ob_start();

		global $wp_query;
		$wp_query->max_num_pages = $products->max_num_pages;

		wc_get_template( 'loop/pagination.php' );

		$pagination = ob_get_clean();

		$out .= $pagination;
	}

	$out .= '</div>';

	wp_reset_postdata();
	wp_reset_query();

	return $out;

}
add_shortcode( 'prdctfltr_sc_products', 'prdctfltr_sc_products' );


/**
 * Shortcode AJAX Respond
 */
function prdctfltr_respond() {

	global $prdctfltr_global;

	$shortcode_params = explode('|', $_POST['pf_shortcode']);

	$preset = ( $shortcode_params[0] !== 'false' ? $shortcode_params[0] : '' );
	$columns = ( $shortcode_params[1] !== 'false' ? $shortcode_params[1] : 4 );
	$rows = ( $shortcode_params[2] !== 'false' ? $shortcode_params[2] : 4 );
	$pagination = ( $shortcode_params[3] !== 'false' ? $shortcode_params[3] : '' );
	$no_products = ( $shortcode_params[4] !== 'false' ? $shortcode_params[4] : '' );
	$show_products = ( $shortcode_params[5] !== 'false' ? $shortcode_params[5] : '' );
	$use_filter = ( $shortcode_params[6] !== 'false' ? $shortcode_params[6] : '' );
	$action = ( $shortcode_params[7] !== 'false' ? $shortcode_params[7] : '' );
	$bot_margin = ( $shortcode_params[8] !== 'false' ? $shortcode_params[8] : '' );
	$class = ( $shortcode_params[9] !== 'false' ? $shortcode_params[9] : '' );
	$shortcode_id = ( $shortcode_params[10] !== 'false' ? $shortcode_params[10] : '' );
	$disable_overrides = ( $shortcode_params[11] !== 'false' ? $shortcode_params[11] : '' );

	$res_paged = ( isset( $_POST['pf_paged'] ) ? $_POST['pf_paged'] : $_POST['pf_page'] );

	$ajax_query = $_POST['pf_query'];

	$current_page = WC_Prdctfltr::prdctfltr_get_between( $ajax_query, 'paged=', '&' );
	$page = $res_paged;

	$args = str_replace( 'paged=' . $current_page . '&', 'paged=' . $page . '&', $ajax_query );

	$prdctfltr_global['ajax_query'] = $args;

	if ( $no_products == 'yes' ) {
		$use_filter = 'no';
		$pagination = 'no';
		$orderby = 'rand';
	}

	$add_ajax = ' data-query="' . $args . '" data-page="' . $res_paged . '" data-shortcode="' . $_POST['pf_shortcode'] . '"';

	$bot_margin = (int)$bot_margin;
	$margin = " style='margin-bottom:" . $bot_margin . "px'";

	if ( isset($_POST['pf_filters']) ) {
		$curr_filters = $_POST['pf_filters'];
	}
	else {
		$curr_filters = array();
	}

	$filter_args = '';
	foreach ( $curr_filters as $k => $v ) {

		if ( strpos($v, ',') ) {
			$new_v = str_replace(',', '%2C', $v);
		}
		else if ( strpos($v, '+') ) {
			$new_v = str_replace('+', '%2B', $v);
		}
		else {
			$new_v = $v;
		}

		$filter_args .= '&' . $k . '=' . $new_v;
	}

	$args = $args . $filter_args;

	$prdctfltr_global['ajax_paged'] = $res_paged;
	$prdctfltr_global['active_filters'] = $curr_filters;

	if ( $action !== '' ) {
		$prdctfltr_global['action'] = $action;
	}
	if ( $preset !== '' ) {
		$prdctfltr_global['preset'] = $preset;
	}
	if ( $disable_overrides !== '' ) {
		$prdctfltr_global['disable_overrides'] = $disable_overrides;
	}

	$out = '';

	global $woocommerce, $woocommerce_loop;

	$woocommerce_loop['columns'] = $columns;

	$prdctfltr_global['ajax'] = true;
	$prdctfltr_global['sc_ajax'] = $_POST['pf_mode'] == 'no' ? 'no' : null;

	$products = new WP_Query( $args . '&prdctfltr=active' );

	ob_start();

	if ( $use_filter == 'yes' ) {
		include_once( WC_Prdctfltr::$dir . '/woocommerce/loop/product-filter.php' );
	}

	if ( $products->have_posts() ) {

		if ( $show_products == 'yes' ) {

			woocommerce_product_loop_start();

			while ( $products->have_posts() ) : $products->the_post();

				wc_get_template_part( 'content', 'product' );

			endwhile;

			woocommerce_product_loop_end();
		}
		else {
			$pagination = 'no';
		}
	}
	else if ( $_POST['pf_widget'] == 'yes' ) {
		$prdctfltr_global['widget_search'] = $_POST['pf_widget'];

		include_once( WC_Prdctfltr::$dir . '/woocommerce/loop/product-filter.php' );
	}

	$prdctfltr_global['ajax'] = null;

	$shortcode = str_replace( 'type-product', 'product type-product', ob_get_clean() );

	$out .= '<div' . ( $shortcode_id != '' ? ' id="'.$shortcode_id.'"' : '' ) . ' class="prdctfltr_sc_products woocommerce prdctfltr_ajax' . ( $class != '' ? ' '.$class.'' : '' ) . '"'.$margin.$add_ajax.'>';
	$out .= do_shortcode($shortcode);

	if ( $pagination == 'yes' ) {

		ob_start();

		global $wp_query;
		$wp_query = $products;

		wc_get_template( 'loop/pagination.php' );

		$pagination = ob_get_clean();

		$out .= $pagination;

	}

	$out .= '</div>';

	die($out);
	exit;
}
add_action('wp_ajax_nopriv_prdctfltr_respond', 'prdctfltr_respond' );
add_action('wp_ajax_prdctfltr_respond', 'prdctfltr_respond' );


/*
 * [prdctfltr_sc_get_filter]
 */
function prdctfltr_sc_get_filter( $atts, $content = null ) {
	return include_once( WC_Prdctfltr::$dir . '/woocommerce/loop/orderby.php' );
}
add_shortcode( 'prdctfltr_sc_get_filter', 'prdctfltr_sc_get_filter' );
?>