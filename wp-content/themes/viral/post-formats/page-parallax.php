<?php $parallax_bg_src = get_post_meta($post -> ID, "shiv_parallax_bg", true);
$parallax_bg_img = wp_get_attachment_image_src($parallax_bg_src, 'full');
$parallax_bg_img = $parallax_bg_img[0];
$divid=$post->ID;

$page_title = $post -> post_name;

if (get_post_meta($post -> ID, "shiv_alt_title", true)) {
	$title = get_post_meta($post -> ID, "shiv_alt_title", true);
} else {
	$title = get_the_title();
}
$subtitle = get_post_meta($post -> ID, "shiv_subtitle", true);
global $smof_data;
$disable_title = get_post_meta($post -> ID, "shiv_disable_titles", true);
?>

<div class="background-image-section" id="<?php echo $divid;?>">
	<div class="image-background" style="background-image: url(<?php echo $parallax_bg_img; ?>)">
		<div class="container">
			<div class="sixteen columns">
				<div class="content">
					<?php if ($disable_title !== '1') { ?>
					<div class="onepage-heading">
					<h1><?php echo $title; ?></h1>
					<h6><?php echo $subtitle; ?></h6>
					</div>
					<?php } ?>
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</div>
</div>