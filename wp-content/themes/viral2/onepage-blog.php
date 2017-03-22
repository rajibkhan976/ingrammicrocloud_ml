<?php
if (get_post_meta($post -> ID, "shiv_alt_title", true)) {
	$title = get_post_meta($post -> ID, "shiv_alt_title", true);
} else {
	$title = get_the_title();
}
$subtitle = get_post_meta($post -> ID, "shiv_subtitle", true);
$divid = $post -> ID;
global $smof_data;
$disable_title = get_post_meta($post -> ID, "shiv_disable_titles", true);
?>

<div class="page-section" id="<?php echo $divid; ?>">
	<div class="container">
		<div class="sixteen columns content">
			<?php if ($disable_title !== '1') { ?>
			<div class="onepage-heading">
			<h1><?php echo $title; ?></h1>
			<h6><?php echo $subtitle; ?></h6>
			</div>
			<?php } ?>
			<div id="blogcontent">
			<?php the_content();?>
			</div>
		</div>
	</div>
</div>
<div class="page-section" id="<?php echo $divid; ?>">
	<div class="container">			
	<?php query_posts("post_type=post &posts_per_page=3 &ignore_sticky_posts=1"); 
	if(have_posts()): while(have_posts()) : the_post(); 
	$post_name = $post->post_name;
	$post_id = get_the_ID();
	?>
			
<div class="one-third column">
	<div class="content">
		<div class="recent-post-preview">
  			<div class="recent-preview">
 			<?php get_template_part('post-formats/grid'); ?>
  			</div>
			<div class="recent-post-header">
			<a href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a>
   			</div>
			<div class="recent-post-content">
  			<p><?php echo get_onepage_excerpt(); ?> <a href="<?php the_permalink(); ?>" class="more">More...</a></p>
  			<div class="post-preview-info">
  				<span><i class="fa fa-user"></i>Posted by: <?php the_author(); ?></span> 
  				<span><i class="fa fa-comments"></i><?php comments_number(); ?></span>
  			</div>
			</div>
		</div>
	</div>
</div>	
<?php
endwhile;
endif;
?>
<?php 
wp_reset_query();
?>
</div>
</div>