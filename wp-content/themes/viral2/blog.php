<?php get_header();
/*
 Template name: Blog Template
 */
get_template_part('navigation' );
	if (get_post_meta($post -> ID, "shiv_alt_title", true)) {
	$title = get_post_meta($post -> ID, "shiv_alt_title", true);
	} else {
	$title = get_the_title();
	}
	$subtitle = get_post_meta($post -> ID, "shiv_subtitle", true);
	$divid = $post -> ID;
	global $smof_data;
$disable_title = get_post_meta($post -> ID, "shiv_disable_titles", true);
$display_type = get_post_meta($post -> ID, "shiv_blog_type", true);
?>


<div class="page-section" id="<?php echo $divid; ?>">
	<?php if ($disable_title !== '1') { ?>
	<div class="page-heading">
		<div class="container">
			<div class="sixteen columns table">
			<div class="ten columns alpha cell">
			<h4><?php echo $title; ?></h4>
			</div>
			<div class="six columns omega cell">
			<?php the_breadcrumb(); ?>
			</div>
			</div>
		</div>
	</div>
	<?php } ?>
</div>

<?php if ($display_type == 'sidebar_grid_two') { ?>
	
<div class="page-section-continued">
	<div class="container">	
		<div class="content">
		<div class="twelve columns alpha">
		<div class="blogwrap" id="blogmasonry">
			<?php
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			query_posts('post_type=post &posts_per_page=6&paged=' . $paged); 
			if(have_posts()): while(have_posts()) : the_post(); 
			$post_name = $post->post_name;
			$post_id = get_the_ID();
			?>	
			<div class="six columns alpha omega onepage-blog">
				<div class="recent-post-preview">
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
			<?php
			endwhile;
			endif;
			?>
		</div>
		<div class="twelve columns alpha omega">
		<div class="pagination">
		<?php if(get_next_posts_link() || get_previous_posts_link()) { paginate(); } ?>
		</div>
		<div class="spacer"></div>
		</div>
		<?php 
		wp_reset_query();
		?>
		</div>
		<div class="four columns omega">
		<?php get_sidebar('blog'); ?>
		</div>
	</div>
</div>
</div>	
<?php } else if ($display_type == 'sidebar_grid_three') { ?>
	
<div class="page-section-continued">
	<div class="container">	
		<div class="content">
		<div class="twelve columns alpha">
		<div class="blogwrap" id="blogmasonry">
			<?php
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			query_posts('post_type=post &posts_per_page=9&paged=' . $paged); 
			if(have_posts()): while(have_posts()) : the_post(); 
			$post_name = $post->post_name;
			$post_id = get_the_ID();
			?>
			
	<div class="four columns alpha omega onepage-blog">
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
	<?php
	endwhile;
	endif;
	?>
		</div>
		<div class="twelve columns alpha omega">
		<div class="pagination">
		<?php if(get_next_posts_link() || get_previous_posts_link()) { paginate(); } ?>
		</div>
		<div class="spacer"></div>
		</div>
			<?php 
			wp_reset_query();
			?>
			</div>
			<div class="four columns omega">
			<?php get_sidebar('blog'); ?>
			</div>
		</div>
	</div>
</div>	

<?php } else if ($display_type == 'grid_two') { ?>
	
<div class="page-section-continued">
	<div class="container">	
	<div class="content">
			<?php
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			query_posts('post_type=post &posts_per_page=6&paged=' . $paged); 
			if(have_posts()): while(have_posts()) : the_post(); 
			$post_name = $post->post_name;
			$post_id = get_the_ID();
			?>
	<div class="eight columns onepage-blog">
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
	<?php
	endwhile;
	endif;
	?>
		<div class="sixteen columns">
		<div class="pagination">
		<?php if(get_next_posts_link() || get_previous_posts_link()) { paginate(); } ?>
		</div>
		<div class="spacer"></div>
		</div>
		<?php 
		wp_reset_query();
		?>
		</div>
	</div>
</div>

<?php } else if ($display_type == 'grid_three') { ?>
	
<div class="page-section-continued">
	<div class="container">	
	<div class="content">
			<?php
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			query_posts('post_type=post &posts_per_page=6&paged=' . $paged); 
			if(have_posts()): while(have_posts()) : the_post(); 
			$post_name = $post->post_name;
			$post_id = get_the_ID();
			?>
	<div class="one-third column onepage-blog">
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
	<?php
	endwhile;
	endif;
	?>
	<div class="sixteen columns">
		<div class="pagination">
		<?php if(get_next_posts_link() || get_previous_posts_link()) { paginate(); } ?>
		</div>
		<div class="spacer"></div>
	</div>
	<?php 
	wp_reset_query();
	?>
	</div>
	</div>
</div>
<?php } else if ($display_type == 'grid_four') { ?>
	
<div class="page-section-continued">
	<div class="container">	
	<div class="content">
			<?php
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			query_posts('post_type=post &posts_per_page=8&paged=' . $paged); 
			if(have_posts()): while(have_posts()) : the_post(); 
			$post_name = $post->post_name;
			$post_id = get_the_ID();
			?>
	<div class="four columns onepage-blog">
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
	<?php
	endwhile;
	endif;
	?>
	<div class="sixteen columns">
	<div class="pagination">
	<?php if(get_next_posts_link() || get_previous_posts_link()) { paginate(); } ?>
	</div>
	<div class="spacer"></div>
	</div>
		<?php 
		wp_reset_query();
		?>
	</div>
	</div>
</div>

<?php } else if ($display_type == 'sidebar_list') { ?>
	
	<div class="page-section" id="<?php echo $divid; ?>">
	<div class="container">
		<div class="sixteen columns content">
			<div class="twelve columns alpha">	
				<?php query_posts("post_type=post &posts_per_page=3 &paged=" . get_query_var('paged')); 
				if(have_posts()): while(have_posts()) : the_post(); 
				 $post_name = $post->post_name;
    			$post_id = get_the_ID();
				?>
			<div class="two columns alpha">
				<div class="the-date">
				<h2><?php echo get_the_date('d'); ?></h2>
				<h3><?php echo get_the_date('M, y'); ?></h3>
				</div>
			</div>
			<div class="ten columns omega">
				<?php get_template_part( 'post-formats/single', get_post_format() );  ?>
					<h4 class="post-title"><?php the_title(); ?></h4>
					<div class="postinfo">
						<div class="post-author"><i class="fa fa-pencil"> </i><b>
						<?php echo '' . __('Posted by: ', 'exquisite') . ' <span>' . get_the_author_link() . '</span>'; ?> </b>
						</div>
						<div class="post-category"><i class="fa fa-folder-open"> </i>
						<?php echo '' . __('in ', 'exquisite') . ' <span>' . get_the_category_list(', ', 'single', $post -> ID) . '</span>'; ?>
						</div>
						<div class="comments-links"><i class="fa fa-comments"> </i>
						<a href="<?php comments_link(); ?>" title="<?php comments_number(); ?>"><?php comments_number(); ?></a>
						</div>
						<?php
						if (has_tag()) {
										the_tags('<div class="posttags"><i class="fa fa-tags"> </i><p class="post-tags">Tags: ', ', ', '</p></div>');
			
							}
							?>
					</div>
					<div class="post">
						<?php the_excerpt(); ?>
						<p class="read-more-link"><a href="<?php the_permalink();?>"><?php _e('Read more...','exquisite');?></a></p>
					
					</div>
			</div>
			<?php
			endwhile;
			endif;
			?>
		<div class="twelve columns alpha omega">
		<div class="pagination">
		<?php if(get_next_posts_link() || get_previous_posts_link()) { paginate(); } ?>
		</div>
		<div class="spacer"></div>
		</div>
		<?php 
		wp_reset_query();
		?>
		</div>
		<div class="four columns omega">
			<?php get_sidebar('blog'); ?>
		</div>
		</div>
	</div>
</div>

<?php } ?>	

<?php get_footer(); ?>