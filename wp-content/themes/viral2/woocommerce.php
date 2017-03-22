<?php get_header(); ?>
<?php
get_template_part('navigation');
$main_slider = get_post_meta($post -> ID, "shiv_main_slider", true);
if (is_front_page()) { get_template_part('slider'); } else if ($main_slider == '1') {
	get_template_part('slider');
}
?>


<div class="page-section">
	<div class="page-heading">
		<div class="container">
			<div class="sixteen columns table">
			<div class="ten columns alpha cell">
			 <h4><?php woocommerce_page_title(); ?></h4>
			</div>
			<div class="sex columns omega cell" id="woo-crums">
			</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="twelve columns">
			<div class="content">
			<?php woocommerce_breadcrumb(); ?>
				<?php woocommerce_content(); ?>
			</div>
		</div>
	
	
<div class="four columns" id="store-sidebar">
				<div class="content">
				<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('store-sidebar') ) ?>
				</div>
			</div>
	</div>
</div>
<?php get_footer(); ?>