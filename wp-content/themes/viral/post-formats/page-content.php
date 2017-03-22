<?php $page_title = $post -> post_name;

if (get_post_meta($post -> ID, "shiv_alt_title", true)) {
	$title = get_post_meta($post -> ID, "shiv_alt_title", true);
} else {
	$title = get_the_title();
}
$subtitle = get_post_meta($post -> ID, "shiv_subtitle", true);
$divid=$post->ID;

global $smof_data;
$disable_title = get_post_meta($post -> ID, "shiv_disable_titles", true);
?>
		
<div class="page-section" id="<?php echo $divid; ?>">
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