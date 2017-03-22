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