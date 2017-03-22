	</div>
</div>

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

<div class="sixteen columns">
	<div class="content">