<?php get_header();?>
<?php 
get_template_part('navigation');
$main_slider = get_post_meta($post -> ID, "shiv_main_slider", true);
if (is_front_page()) { get_template_part('slider'); } else if ($main_slider == '1') {
	get_template_part('slider');
}
 ?>
<?php
if (have_posts()) : while (have_posts()) : the_post();
   $page_title = $post -> post_name;
	$divid = $post -> ID;
if (get_post_meta($post -> ID, "shiv_alt_title", true)) {
	$title = get_post_meta($post -> ID, "shiv_alt_title", true);
} else {
	$title = get_the_title();
}
$subtitle = get_post_meta($post -> ID, "shiv_subtitle", true);
$disable_title = get_post_meta($post -> ID, "shiv_disable_titles", true);


$page_bg = get_post_meta($post -> ID, "shiv_page_background", true);

if ($page_bg !== 0) {
	$parallax_bg_src = get_post_meta($post -> ID, "shiv_parallax_bg", true);
	$parallax_bg_img = wp_get_attachment_image_src($parallax_bg_src, 'full');
	$parallax_bg_img = $parallax_bg_img[0];
}
?>

<?php // Get country code of current site
require_once(dirname(__FILE__).'/custom_functions/get_country_code.php');
$country_code = get_country_code();
?>

<!-- --------------------------------------
  Microsoft Disty of the Year Award Panel
  ------------------------------------- -->
<div id="panel2" class="hidden">
  <div class="container">
    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7 left-column">
      <h5>Microsoft Distributor Partner of the Year</h5>
      The Distributor Partner of the Year award recognizes distributor excellence in comprehensive solution aggregation that enables channel partners to successfully grow their SMB customer relationships. <a href="http://phx.corporate-ir.net/phoenix.zhtml?c=98566&p=irol-newsArticle&ID=2180906" target="_blank" style="color: #fff;">
<strong>Read more</strong> <i class="fa fa-external-link"></i></a>
    </div>
    <a href="http://phx.corporate-ir.net/phoenix.zhtml?c=98566&p=irol-newsArticle&ID=2180906" target="_blank">
	<div class="col-xs-12 col-sm-3 col-md-4 col-lg-3 right-column">
      	    <h6>Microsoft Partner of the Year<br />
                <span class="winner">2016 Winner</span>
            </h6>
             <div class="award">Distributor Award</div>
    	</div>
    </a>
  </div>
</div>
<!-- --------------------------------------
  /Microsoft Disty of the Year Award Panel
  ------------------------------------- -->


<!-- --------------------------------------
  AdPlugg Panel
  ------------------------------------- -->

<?php
require_once(dirname(__FILE__).'/custom_functions/global_ad_placement.php');
$countries_with_global_ad_placement = require_once(dirname(__FILE__).'/custom_functions/get_global_ad_placement_countries.php');

if (in_array($country_code, $countries_with_global_ad_placement) && is_front_page()) {
  global_ad_placement($country_code);
}
?>

<!-- --------------------------------------
  /AdPlugg Panel
  ------------------------------------- -->


<div class="page-section" id="<?php echo $divid; ?>">
	<?php if ($disable_title !== '1') { ?>
	<div class="page-heading">
		<div class="container">
			<div class="sixteen columns table">
			<div class="twelve columns alpha cell">
			<h4><?php echo $title; ?></h4>
			<?php echo $subtitle; ?>
			</div>
			<div class="four columns omega cell">
			<?php the_breadcrumb(); ?>
			</div>
			</div>
		</div>
	</div>
	<?php } ?>
	<?php if ($page_bg == '1') { ?>
	<div class="image-background" style="background-image: url(<?php echo $parallax_bg_img; ?>)">
	<?php } ?>
	<div class="container">
		<div class="sixteen columns">
			<div class="content">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
	<?php if ($page_bg == '1') { ?></div><?php } ?>
</div>
	
<?php
endwhile;
endif;
wp_reset_query();
?>
<?php get_footer(); ?>