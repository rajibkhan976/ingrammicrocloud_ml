<?php get_header();
/*
 Template name: Portfolio Template
 */
?>
<?php get_template_part('navigation');

	if (get_post_meta($post -> ID, "shiv_alt_title", true)) {
		$title = get_post_meta($post -> ID, "shiv_alt_title", true);
	} else {
		$title = get_the_title();
	}
	$subtitle = get_post_meta($post -> ID, "shiv_subtitle", true);
	$divid = $post -> ID;
	global $smof_data;
$disable_title = get_post_meta($post -> ID, "shiv_disable_titles", true);

$display_type = get_post_meta($post -> ID, "shiv_portfolio_type", true);
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


				
<?php if ($display_type == 'sidebar_two') { ?>
	
<div class="page-section-continued">
	<div class="container">	
		<div class="content">
		
	<div class="four columns">
		<div class="sidebar">
		<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('portfolio-sidebar') ) ?>
		</div>
	</div>
			
			
			
		<div class="twelve columns">
				<?php					
				$portfolio_categories = get_terms('portfolio_categories');
				if ($portfolio_categories):?>
					<ul class="portfolio-buttons" id="clearajax"><li class="active"><a href="#!" class="all">All</a></li>
					<?php foreach ($portfolio_categories as $portfolio_category):?>
						<li><a href="#!" class="filter-<?php echo $portfolio_category -> slug; ?>"><?php echo $portfolio_category -> name; ?></a></li>
					<?php endforeach; ?>
					</ul>
				<?php endif; ?>
				
				<div id="single-home-container"></div>
				
				
				
				
				
				
				<div id="owl-wrapper-folio">
<?php 

			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

			query_posts('post_type=portfolio &posts_per_page=6&paged=' . $paged); 
	
	if(have_posts()): while(have_posts()) : the_post(); 
					$portfolio_title = get_the_title($post->id);
					$portfolio_type = get_post_meta($post -> ID, "shiv_portfolio_item_type", true); 
					if ($portfolio_type == 'slider') {
					$type = '<i class="fa fa-files-o"></i>';
					$slides = get_post_meta( get_the_ID(), 'shiv_portfolio_slides', false );
									if ($slides) {
										$image_src = wp_get_attachment_image_src( $slides[0], 'full' );
										$image_src = $image_src[0];
										$glass_url = '<a data-rel="prettyPhoto" href="'.$image_src.'" title="'.$portfolio_title.'">
										<IMG SRC="'.get_template_directory_uri().'/images/glass.png" alt="Preview"></a>';}
					} else if ($portfolio_type == 'video') {
						$type = '<i class="fa fa-video-camera"></i>';
					  if (get_post_meta( get_the_ID(), 'shiv_portfolio_video_type', true ) == 'youtube') {
					  	$glass_url = '<a data-rel="prettyPhoto" href="http://www.youtube.com/watch?v='.get_post_meta( get_the_ID(), 'shiv_portfolio_video_embed', true ).'" title="'.$portfolio_title.'">
					<IMG SRC="'.get_template_directory_uri().'/images/glass.png" alt="Preview"></a>';  
					  
					         }
					 else if (get_post_meta( get_the_ID(), 'shiv_portfolio_video_type', true ) == 'vimeo') {  
					    $glass_url = '<a data-rel="prettyPhoto" href="http://vimeo.com/'.get_post_meta( get_the_ID(), 'shiv_portfolio_video_embed', true ).'" title="'.$portfolio_title.'">
					<IMG SRC="'.get_template_directory_uri().'/images/glass.png" alt="Preview"></a>'; 
							  }   

					} else {  //  image
					$type = '<i class="fa fa-picture-o"></i>';
					$glass_url = '<a data-rel="prettyPhoto" href="'.wp_get_attachment_url(get_post_thumbnail_id($post -> ID)).'" title="'.$portfolio_title.'">
					<IMG SRC="'.get_template_directory_uri().'/images/glass.png" alt="Preview"></a>';
					}
					$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'portfolio-thumb' );
					$url = $thumb['0'];
					
					
					
					$categories = get_the_terms( get_the_ID(), 'portfolio_categories' );
					if($categories) : 
						$slug = '';
						foreach ($categories as $category) {
						$slug .= 'filter-';
						$slug .= $category->slug;
						$slug .= ' ';
					} endif;					
							
						?>	
						
		<div class="six columns alpha omega" data-id="id-<?php echo $post -> ID; ?>" data-type="<?php echo $slug; ?>">
			<div class="p-item">
			<div class="recent-content-item fit radius" style="background:#fff url(<?php echo $url; ?>) no-repeat">
					<div class="overlay-add">
								<div class="overlay-title">
								<?php echo get_the_title($post -> ID); ?>
								</div>
								<div class="overlay-type">
								<?php echo $type; ?>
								</div>
							</div>
			 	<div class="recent-overlay"></div>
				<div class="recent-overlay-content">
   					 <div class="layer">
		             <?php echo $glass_url; ?>
		             <a rel="<?php the_permalink(); ?>" href="<?php the_permalink(); ?>">
		             <IMG SRC="<?php echo get_template_directory_uri(); ?>/images/link.png" alt="Details"></a>
	                 </div>

  				</div>
			</div>
			</div>
		</div>
				<?php	
				endwhile;
				endif;
				?>		
				</div>
				
		
				<div class="pagination">
					<?php if(get_next_posts_link() || get_previous_posts_link()) { paginate(); } ?>
				<div class="spacer"></div>
				</div>
				
				<?php 
				wp_reset_query();
				?>
				
				
				
			</div>
		</div>
		
	</div>
</div>
<?php } else if ($display_type == 'sidebar_three') { ?>
	
	
	
<div class="page-section-continued">
	<div class="container">	
		<div class="content">
		
	<div class="four columns">
		<div class="sidebar">
		<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('portfolio-sidebar') ) ?>
		</div>
	</div>
			
			
			
		<div class="twelve columns">
				<?php					
				$portfolio_categories = get_terms('portfolio_categories');
				if ($portfolio_categories):?>
					<ul class="portfolio-buttons" id="clearajax"><li class="active"><a href="#!" class="all">All</a></li>
					<?php foreach ($portfolio_categories as $portfolio_category):?>
						<li><a href="#!" class="filter-<?php echo $portfolio_category -> slug; ?>"><?php echo $portfolio_category -> name; ?></a></li>
					<?php endforeach; ?>
					</ul>
				<?php endif; ?>
				
				<div id="single-home-container"></div>

				
				<div id="owl-wrapper-folio">
<?php 

			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

			query_posts('post_type=portfolio &posts_per_page=9&paged=' . $paged); 
	
	if(have_posts()): while(have_posts()) : the_post(); 
					$portfolio_title = get_the_title($post->id);
					$portfolio_type = get_post_meta($post -> ID, "shiv_portfolio_item_type", true); 
					if ($portfolio_type == 'slider') {
					$type = '<i class="fa fa-files-o"></i>';
					$slides = get_post_meta( get_the_ID(), 'shiv_portfolio_slides', false );
									if ($slides) {
										$image_src = wp_get_attachment_image_src( $slides[0], 'full' );
										$image_src = $image_src[0];
										$glass_url = '<a data-rel="prettyPhoto" href="'.$image_src.'" title="'.$portfolio_title.'">
										<IMG SRC="'.get_template_directory_uri().'/images/glass.png" alt="Preview"></a>';}
					} else if ($portfolio_type == 'video') {
						$type = '<i class="fa fa-video-camera"></i>';
					  if (get_post_meta( get_the_ID(), 'shiv_portfolio_video_type', true ) == 'youtube') {
					  	$glass_url = '<a data-rel="prettyPhoto" href="http://www.youtube.com/watch?v='.get_post_meta( get_the_ID(), 'shiv_portfolio_video_embed', true ).'" title="'.$portfolio_title.'">
					<IMG SRC="'.get_template_directory_uri().'/images/glass.png" alt="Preview"></a>';  
					  
					         }
					 else if (get_post_meta( get_the_ID(), 'shiv_portfolio_video_type', true ) == 'vimeo') {  
					    $glass_url = '<a data-rel="prettyPhoto" href="http://vimeo.com/'.get_post_meta( get_the_ID(), 'shiv_portfolio_video_embed', true ).'" title="'.$portfolio_title.'">
					<IMG SRC="'.get_template_directory_uri().'/images/glass.png" alt="Preview"></a>'; 
							  }   

					} else {  //  image
					$type = '<i class="fa fa-picture-o"></i>';
					$glass_url = '<a data-rel="prettyPhoto" href="'.wp_get_attachment_url(get_post_thumbnail_id($post -> ID)).'" title="'.$portfolio_title.'">
					<IMG SRC="'.get_template_directory_uri().'/images/glass.png" alt="Preview"></a>';
					}
					$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'portfolio-thumb' );
					$url = $thumb['0'];
					
					
					
					$categories = get_the_terms( get_the_ID(), 'portfolio_categories' );
					if($categories) : 
						$slug = '';
						foreach ($categories as $category) {
						$slug .= 'filter-';
						$slug .= $category->slug;
						$slug .= ' ';
					} endif;					
							
						?>	
		<div class="four columns alpha omega" data-id="id-<?php echo $post -> ID; ?>" data-type="<?php echo $slug; ?>">
			<div class="p-item">
			<div class="recent-content-item radius" style="background:#fff url(<?php echo $url; ?>) no-repeat">
					<div class="overlay-add">
								<div class="overlay-title">
								<?php echo get_the_title($post -> ID); ?>
								</div>
								<div class="overlay-type">
								<?php echo $type; ?>
								</div>
							</div>
			 	<div class="recent-overlay"></div>
				<div class="recent-overlay-content">
   					 <div class="layer">
		             <?php echo $glass_url; ?>
		             <a rel="<?php the_permalink(); ?>" href="<?php the_permalink(); ?>">
		             <IMG SRC="<?php echo get_template_directory_uri(); ?>/images/link.png" alt="Details"></a>
	                 </div>
  				</div>
			</div>
			</div>
		</div>
				<?php	
				endwhile;
				endif;
				?>		
				</div>
				
		
				<div class="pagination">
					<?php if(get_next_posts_link() || get_previous_posts_link()) { paginate(); } ?>
				<div class="spacer"></div>
				</div>
				
				<?php 
				wp_reset_query();
				?>
				
				
				
			</div>
		</div>
		
	</div>
</div>


<?php } else if ($display_type == 'sidebar_list') { ?>
	
	
	<div class="page-section-continued">
	<div class="container">	
		<div class="content">
		
	<div class="four columns">
		<div class="sidebar">
		<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('portfolio-sidebar') ) ?>
		</div>
	</div>
			
			
			
		<div class="twelve columns">
		<div id="owl-wrapper-folio">
<?php 

			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

			query_posts('post_type=portfolio &posts_per_page=3&paged=' . $paged); 
	
	if(have_posts()): while(have_posts()) : the_post(); 
					$portfolio_title = get_the_title($post->id);
					$portfolio_type = get_post_meta($post -> ID, "shiv_portfolio_item_type", true); 
					if ($portfolio_type == 'slider') {
					$type = '<i class="fa fa-files-o"></i>';
					$slides = get_post_meta( get_the_ID(), 'shiv_portfolio_slides', false );
									if ($slides) {
										$image_src = wp_get_attachment_image_src( $slides[0], 'full' );
										$image_src = $image_src[0];
										$glass_url = '<a data-rel="prettyPhoto" href="'.$image_src.'" title="'.$portfolio_title.'">
										<IMG SRC="'.get_template_directory_uri().'/images/glass.png" alt="Preview"></a>';}
					} else if ($portfolio_type == 'video') {
						$type = '<i class="fa fa-video-camera"></i>';
					  if (get_post_meta( get_the_ID(), 'shiv_portfolio_video_type', true ) == 'youtube') {
					  	$glass_url = '<a data-rel="prettyPhoto" href="http://www.youtube.com/watch?v='.get_post_meta( get_the_ID(), 'shiv_portfolio_video_embed', true ).'" title="'.$portfolio_title.'">
					<IMG SRC="'.get_template_directory_uri().'/images/glass.png" alt="Preview"></a>';  
					  
					         }
					 else if (get_post_meta( get_the_ID(), 'shiv_portfolio_video_type', true ) == 'vimeo') {  
					    $glass_url = '<a data-rel="prettyPhoto" href="http://vimeo.com/'.get_post_meta( get_the_ID(), 'shiv_portfolio_video_embed', true ).'" title="'.$portfolio_title.'">
					<IMG SRC="'.get_template_directory_uri().'/images/glass.png" alt="Preview"></a>'; 
							  }   

					} else {  //  image
					$type = '<i class="fa fa-picture-o"></i>';
					$glass_url = '<a data-rel="prettyPhoto" href="'.wp_get_attachment_url(get_post_thumbnail_id($post -> ID)).'" title="'.$portfolio_title.'">
					<IMG SRC="'.get_template_directory_uri().'/images/glass.png" alt="Preview"></a>';
					}
					$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'portfolio-thumb' );
					$url = $thumb['0'];
					
					
					
					$categories = get_the_terms( get_the_ID(), 'portfolio_categories' );
					if($categories) : 
						$slug = '';
						foreach ($categories as $category) {
						$slug .= 'filter-';
						$slug .= $category->slug;
						$slug .= ' ';
					} endif;					
							
						?>	
						
		<div class="twelve columns alpha omega pushdown" data-id="id-<?php echo $post -> ID; ?>" data-type="<?php echo $slug; ?>">
			
		<div class="six columns alpha">
				<div class="recent-content-item radius" style="background:#fff url(<?php echo $url; ?>) no-repeat">
					<div class="overlay-add">
								<div class="overlay-title">
								<?php echo get_the_title($post -> ID); ?>
								</div>
								<div class="overlay-type">
								<?php echo $type; ?>
								</div>
							</div>
			 	<div class="recent-overlay"></div>
				<div class="recent-overlay-content">
   					 <div class="layer">
		             <?php echo $glass_url; ?>
		             <a rel="<?php the_permalink(); ?>" href="<?php the_permalink(); ?>">
		             <IMG SRC="<?php echo get_template_directory_uri(); ?>/images/link.png" alt="Details"></a>
	                 </div>
  				</div>
			</div>			
			</div>
			<div class="six columns omega portfolio-content push">
				<h1 class="portfolio-title"><?php the_title(); ?></h1>
				
				<?php
				echo the_content(); ?>
				<div class="clearfix"></div>
				<div class="portfolio-info">
				<?php
				if ($client) {
					echo '<span class="client">' . __('Client: ', 'exquisite') . ''.$client.'</span>';
				}
				if ($url) {
					echo '<a href="'.$url.'" class="launch">' . __('Launch project', 'exquisite') . '</a>';
				}
				?>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
				
				<?php	
				endwhile;
				endif;
				?>		
				</div>
				
					<div class="twelve columns alpha omega content">
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
</div>


<?php } else if ($display_type == 'fit_three') { ?>
<div class="page-section-continued">
	<div class="container">
		<div class="sixteen columns">
			<div class="content">
				<?php					
				$portfolio_categories = get_terms('portfolio_categories');
				if ($portfolio_categories):?>
					<ul class="portfolio-buttons" id="clearajax"><li class="active"><a href="#!" class="all">All</a></li>
					<?php foreach ($portfolio_categories as $portfolio_category):?>
						<li><a href="#!" class="filter-<?php echo $portfolio_category -> slug; ?>"><?php echo $portfolio_category -> name; ?></a></li>
					<?php endforeach; ?>
					</ul>
				<?php endif; ?>
				
				<div id="single-home-container"></div>
			</div>
		</div>
	</div>	
</div>
<div class="page-section-continued">
	<div class="container">	
		<div id="owl-wrapper-folio">
<?php 

			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

			query_posts('post_type=portfolio &posts_per_page=6&paged=' . $paged); 
	
	if(have_posts()): while(have_posts()) : the_post(); 
					$portfolio_title = get_the_title($post->id);
					$portfolio_type = get_post_meta($post -> ID, "shiv_portfolio_item_type", true); 
					if ($portfolio_type == 'slider') {
					$type = '<i class="fa fa-files-o"></i>';
					$slides = get_post_meta( get_the_ID(), 'shiv_portfolio_slides', false );
									if ($slides) {
										$image_src = wp_get_attachment_image_src( $slides[0], 'full' );
										$image_src = $image_src[0];
										$glass_url = '<a data-rel="prettyPhoto" href="'.$image_src.'" title="'.$portfolio_title.'">
										<IMG SRC="'.get_template_directory_uri().'/images/glass.png" alt="Preview"></a>';}
					} else if ($portfolio_type == 'video') {
						$type = '<i class="fa fa-video-camera"></i>';
					  if (get_post_meta( get_the_ID(), 'shiv_portfolio_video_type', true ) == 'youtube') {
					  	$glass_url = '<a data-rel="prettyPhoto" href="http://www.youtube.com/watch?v='.get_post_meta( get_the_ID(), 'shiv_portfolio_video_embed', true ).'" title="'.$portfolio_title.'">
					<IMG SRC="'.get_template_directory_uri().'/images/glass.png" alt="Preview"></a>';  
					  
					         }
					 else if (get_post_meta( get_the_ID(), 'shiv_portfolio_video_type', true ) == 'vimeo') {  
					    $glass_url = '<a data-rel="prettyPhoto" href="http://vimeo.com/'.get_post_meta( get_the_ID(), 'shiv_portfolio_video_embed', true ).'" title="'.$portfolio_title.'">
					<IMG SRC="'.get_template_directory_uri().'/images/glass.png" alt="Preview"></a>'; 
							  }   

					} else {  //  image
					$type = '<i class="fa fa-picture-o"></i>';
					$glass_url = '<a data-rel="prettyPhoto" href="'.wp_get_attachment_url(get_post_thumbnail_id($post -> ID)).'" title="'.$portfolio_title.'">
					<IMG SRC="'.get_template_directory_uri().'/images/glass.png" alt="Preview"></a>';
					}
					$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'portfolio-thumb' );
					$url = $thumb['0'];
					
					
					
					$categories = get_the_terms( get_the_ID(), 'portfolio_categories' );
					if($categories) : 
						$slug = '';
						foreach ($categories as $category) {
						$slug .= 'filter-';
						$slug .= $category->slug;
						$slug .= ' ';
					} endif;					
							
						?>	
						
		<div class="one-third column" data-id="id-<?php echo $post -> ID; ?>" data-type="<?php echo $slug; ?>">
			<div class="recent-content-item radius" style="background:#fff url(<?php echo $url; ?>) no-repeat">
					<div class="overlay-add">
								<div class="overlay-title">
								<?php echo get_the_title($post -> ID); ?>
								</div>
								<div class="overlay-type">
								<?php echo $type; ?>
								</div>
							</div>
			 	<div class="recent-overlay"></div>
				<div class="recent-overlay-content">
   					 <div class="layer">
		             <?php echo $glass_url; ?>
		             <a rel="<?php the_permalink(); ?>" href="<?php the_permalink(); ?>">
		             <IMG SRC="<?php echo get_template_directory_uri(); ?>/images/link.png" alt="Details"></a>
	                 </div>
  				</div>
			</div>
		</div>
				<?php	
				endwhile;
				endif;
				?>		
				</div>
				
					<div class="sixteen columns content">
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


<?php } else if ($display_type == 'fit_four') { ?>
	
<div class="page-section-continued">
	<div class="container">
		<div class="sixteen columns">
			<div class="content">
				<?php					
				$portfolio_categories = get_terms('portfolio_categories');
				if ($portfolio_categories):?>
					<ul class="portfolio-buttons" id="clearajax"><li class="active"><a href="#!" class="all">All</a></li>
					<?php foreach ($portfolio_categories as $portfolio_category):?>
						<li><a href="#!" class="filter-<?php echo $portfolio_category -> slug; ?>"><?php echo $portfolio_category -> name; ?></a></li>
					<?php endforeach; ?>
					</ul>
				<?php endif; ?>
				
				<div id="single-home-container"></div>
			</div>
		</div>
	</div>	
</div>	
	
	<div class="page-section-continued">
	<div class="container">	
		<div id="owl-wrapper-folio">
<?php 

			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

			query_posts('post_type=portfolio &posts_per_page=8&paged=' . $paged); 
	
	if(have_posts()): while(have_posts()) : the_post(); 
					$portfolio_title = get_the_title($post->id);
					$portfolio_type = get_post_meta($post -> ID, "shiv_portfolio_item_type", true); 
					if ($portfolio_type == 'slider') {
					$type = '<i class="fa fa-files-o"></i>';
					$slides = get_post_meta( get_the_ID(), 'shiv_portfolio_slides', false );
									if ($slides) {
										$image_src = wp_get_attachment_image_src( $slides[0], 'full' );
										$image_src = $image_src[0];
										$glass_url = '<a data-rel="prettyPhoto" href="'.$image_src.'" title="'.$portfolio_title.'">
										<IMG SRC="'.get_template_directory_uri().'/images/glass.png" alt="Preview"></a>';}
					} else if ($portfolio_type == 'video') {
						$type = '<i class="fa fa-video-camera"></i>';
					  if (get_post_meta( get_the_ID(), 'shiv_portfolio_video_type', true ) == 'youtube') {
					  	$glass_url = '<a data-rel="prettyPhoto" href="http://www.youtube.com/watch?v='.get_post_meta( get_the_ID(), 'shiv_portfolio_video_embed', true ).'" title="'.$portfolio_title.'">
					<IMG SRC="'.get_template_directory_uri().'/images/glass.png" alt="Preview"></a>';  
					  
					         }
					 else if (get_post_meta( get_the_ID(), 'shiv_portfolio_video_type', true ) == 'vimeo') {  
					    $glass_url = '<a data-rel="prettyPhoto" href="http://vimeo.com/'.get_post_meta( get_the_ID(), 'shiv_portfolio_video_embed', true ).'" title="'.$portfolio_title.'">
					<IMG SRC="'.get_template_directory_uri().'/images/glass.png" alt="Preview"></a>'; 
							  }   

					} else {  //  image
					$type = '<i class="fa fa-picture-o"></i>';
					$glass_url = '<a data-rel="prettyPhoto" href="'.wp_get_attachment_url(get_post_thumbnail_id($post -> ID)).'" title="'.$portfolio_title.'">
					<IMG SRC="'.get_template_directory_uri().'/images/glass.png" alt="Preview"></a>';
					}
					$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'portfolio-thumb' );
					$url = $thumb['0'];
					
					
					
					$categories = get_the_terms( get_the_ID(), 'portfolio_categories' );
					if($categories) : 
						$slug = '';
						foreach ($categories as $category) {
						$slug .= 'filter-';
						$slug .= $category->slug;
						$slug .= ' ';
					} endif;					
							
						?>		
		<div class="four columns" data-id="id-<?php echo $post -> ID; ?>" data-type="<?php echo $slug; ?>">
			<div class="recent-content-item radius" style="background:#fff url(<?php echo $url; ?>) no-repeat">
					<div class="overlay-add">
								<div class="overlay-title">
								<?php echo get_the_title($post -> ID); ?>
								</div>
								<div class="overlay-type">
								<?php echo $type; ?>
								</div>
							</div>
			 	<div class="recent-overlay"></div>
				<div class="recent-overlay-content">
   					 <div class="layer">
		             <?php echo $glass_url; ?>
		             <a rel="<?php the_permalink(); ?>" href="<?php the_permalink(); ?>">
		             <IMG SRC="<?php echo get_template_directory_uri(); ?>/images/link.png" alt="Details"></a>
	                 </div>
  				</div>
			</div>
		</div>
				<?php	
				endwhile;
				endif;
				?>		
				</div>
				
					<div class="sixteen columns content">
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


<?php } else if ($display_type == 'fit_two') { ?>
	
<div class="page-section-continued">
	<div class="container">
		<div class="sixteen columns">
			<div class="content">
				<?php					
				$portfolio_categories = get_terms('portfolio_categories');
				if ($portfolio_categories):?>
					<ul class="portfolio-buttons" id="clearajax"><li class="active"><a href="#!" class="all">All</a></li>
					<?php foreach ($portfolio_categories as $portfolio_category):?>
						<li><a href="#!" class="filter-<?php echo $portfolio_category -> slug; ?>"><?php echo $portfolio_category -> name; ?></a></li>
					<?php endforeach; ?>
					</ul>
				<?php endif; ?>
				
				<div id="single-home-container"></div>
			</div>
		</div>
	</div>	
</div>	
<div class="page-section-continued">
	<div class="container">	
		<div id="owl-wrapper-folio">
<?php 

			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

			query_posts('post_type=portfolio &posts_per_page=6&paged=' . $paged); 
	
	if(have_posts()): while(have_posts()) : the_post(); 
					$portfolio_title = get_the_title($post->id);
					$portfolio_type = get_post_meta($post -> ID, "shiv_portfolio_item_type", true); 
					if ($portfolio_type == 'slider') {
					$type = '<i class="fa fa-files-o"></i>';
					$slides = get_post_meta( get_the_ID(), 'shiv_portfolio_slides', false );
									if ($slides) {
										$image_src = wp_get_attachment_image_src( $slides[0], 'full' );
										$image_src = $image_src[0];
										$glass_url = '<a data-rel="prettyPhoto" href="'.$image_src.'" title="'.$portfolio_title.'">
										<IMG SRC="'.get_template_directory_uri().'/images/glass.png" alt="Preview"></a>';}
					} else if ($portfolio_type == 'video') {
						$type = '<i class="fa fa-video-camera"></i>';
					  if (get_post_meta( get_the_ID(), 'shiv_portfolio_video_type', true ) == 'youtube') {
					  	$glass_url = '<a data-rel="prettyPhoto" href="http://www.youtube.com/watch?v='.get_post_meta( get_the_ID(), 'shiv_portfolio_video_embed', true ).'" title="'.$portfolio_title.'">
					<IMG SRC="'.get_template_directory_uri().'/images/glass.png" alt="Preview"></a>';  
					  
					         }
					 else if (get_post_meta( get_the_ID(), 'shiv_portfolio_video_type', true ) == 'vimeo') {  
					    $glass_url = '<a data-rel="prettyPhoto" href="http://vimeo.com/'.get_post_meta( get_the_ID(), 'shiv_portfolio_video_embed', true ).'" title="'.$portfolio_title.'">
					<IMG SRC="'.get_template_directory_uri().'/images/glass.png" alt="Preview"></a>'; 
							  }   

					} else {  //  image
					$type = '<i class="fa fa-picture-o"></i>';
					$glass_url = '<a data-rel="prettyPhoto" href="'.wp_get_attachment_url(get_post_thumbnail_id($post -> ID)).'" title="'.$portfolio_title.'">
					<IMG SRC="'.get_template_directory_uri().'/images/glass.png" alt="Preview"></a>';
					}
					$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'portfolio-thumb' );
					$url = $thumb['0'];
					
					
					
					$categories = get_the_terms( get_the_ID(), 'portfolio_categories' );
					if($categories) : 
						$slug = '';
						foreach ($categories as $category) {
						$slug .= 'filter-';
						$slug .= $category->slug;
						$slug .= ' ';
					} endif;					
							
						?>	
						
		<div class="eight columns" data-id="id-<?php echo $post -> ID; ?>" data-type="<?php echo $slug; ?>">
			<div class="recent-content-item fit" style="background:#fff url(<?php echo $url; ?>) no-repeat">
					<div class="overlay-add">
								<div class="overlay-title">
								<?php echo get_the_title($post -> ID); ?>
								</div>
								<div class="overlay-type">
								<?php echo $type; ?>
								</div>
							</div>
			 	<div class="recent-overlay"></div>
				<div class="recent-overlay-content">
   					 <div class="layer">
		             <?php echo $glass_url; ?>
		             <a rel="<?php the_permalink(); ?>" href="<?php the_permalink(); ?>">
		             <IMG SRC="<?php echo get_template_directory_uri(); ?>/images/link.png" alt="Details"></a>
	                 </div>
  				</div>
			</div>
		</div>
				
				<?php	
				endwhile;
				endif;
				?>		
				</div>
				
					<div class="sixteen columns content">
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

<?php } else if ($display_type == 'fit_carousel_three') { ?>
<div class="page-section-continued">
	<div class="container">
		<div class="sixteen columns">
			<div class="content">
				<?php					
				$portfolio_categories = get_terms('portfolio_categories');
				if ($portfolio_categories):?>
					<ul class="portfolio-buttons" id="clearajax"><li class="active"><a href="#!" class="all">All</a></li>
					<?php foreach ($portfolio_categories as $portfolio_category):?>
						<li><a href="#!" class="filter-<?php echo $portfolio_category -> slug; ?>"><?php echo $portfolio_category -> name; ?></a></li>
					<?php endforeach; ?>
					</ul>
				<?php endif; ?>
				
				<div id="single-home-container"></div>
			</div>
		</div>
	</div>	
</div>	
<div class="page-section-continued">
	<div class="container">
		<div class="sixteen columns content">
			<div class="portfolioHolder"><div class="portfolio-carousel-outer-wrapper full"><div class="portfolio-carousel-wrapper">
				<div class="portfolio-carousel-full fit-width">
			<?php 
			query_posts("post_type=portfolio &paged=" . get_query_var('paged'));		
		if(have_posts()): while(have_posts()) : the_post(); 
					$portfolio_title = get_the_title($post->id);
					$portfolio_type = get_post_meta($post -> ID, "shiv_portfolio_item_type", true); 
					if ($portfolio_type == 'slider') {
					$type = '<i class="fa fa-files-o"></i>';
					$slides = get_post_meta( get_the_ID(), 'shiv_portfolio_slides', false );
									if ($slides) {
										$image_src = wp_get_attachment_image_src( $slides[0], 'full' );
										$image_src = $image_src[0];
										$glass_url = '<a data-rel="prettyPhoto" href="'.$image_src.'" title="'.$portfolio_title.'">
										<IMG SRC="'.get_template_directory_uri().'/images/glass.png" alt="Preview"></a>';}
					} else if ($portfolio_type == 'video') {
						$type = '<i class="fa fa-video-camera"></i>';
					  if (get_post_meta( get_the_ID(), 'shiv_portfolio_video_type', true ) == 'youtube') {
					  	$glass_url = '<a data-rel="prettyPhoto" href="http://www.youtube.com/watch?v='.get_post_meta( get_the_ID(), 'shiv_portfolio_video_embed', true ).'" title="'.$portfolio_title.'">
					<IMG SRC="'.get_template_directory_uri().'/images/glass.png" alt="Preview"></a>';  
					  
					         }
					 else if (get_post_meta( get_the_ID(), 'shiv_portfolio_video_type', true ) == 'vimeo') {  
					    $glass_url = '<a data-rel="prettyPhoto" href="http://vimeo.com/'.get_post_meta( get_the_ID(), 'shiv_portfolio_video_embed', true ).'" title="'.$portfolio_title.'">
					<IMG SRC="'.get_template_directory_uri().'/images/glass.png" alt="Preview"></a>'; 
							  }   

					} else {  //  image
					$type = '<i class="fa fa-picture-o"></i>';
					$glass_url = '<a data-rel="prettyPhoto" href="'.wp_get_attachment_url(get_post_thumbnail_id($post -> ID)).'" title="'.$portfolio_title.'">
					<IMG SRC="'.get_template_directory_uri().'/images/glass.png" alt="Preview"></a>';
					}
					$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'portfolio-thumb' );
					$url = $thumb['0'];
					
					
					
					$categories = get_the_terms( get_the_ID(), 'portfolio_categories' );
					if($categories) : 
						$slug = '';
						foreach ($categories as $category) {
						$slug .= 'filter-';
						$slug .= $category->slug;
						$slug .= ' ';
					} endif;					
							
						?>	
							<div class="owl-item itemcontainer full" data-id="id-<?php echo $post -> ID; ?>" data-type="<?php echo $slug; ?>">
								<div class="carousel-item-mini">			
									<div class="recent-content-item radius" style="background:#fff url(<?php echo $url; ?>) no-repeat">
										<div class="overlay-add">
								<div class="overlay-title">
								<?php echo get_the_title($post -> ID); ?>
								</div>
								<div class="overlay-type">
								<?php echo $type; ?>
								</div>
							</div>
			 							<div class="recent-overlay"></div>
										<div class="recent-overlay-content">
				   								 <div class="layer">
						                        <?php echo $glass_url; ?>
						                        <a rel="<?php the_permalink(); ?>" href="<?php the_permalink(); ?>">
						                        <IMG SRC="<?php echo get_template_directory_uri(); ?>/images/link.png" alt="Details"></a>
					                    		</div>
										</div>
									</div>
								</div>
							</div>	
							

				<?php	
				endwhile;
				endif;
				wp_reset_query();
				?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



<?php } else if ($display_type == 'fit_carousel_four') { ?>
	
<div class="page-section-continued">
	<div class="container">
		<div class="sixteen columns">
			<div class="content">
				<?php					
				$portfolio_categories = get_terms('portfolio_categories');
				if ($portfolio_categories):?>
					<ul class="portfolio-buttons" id="clearajax"><li class="active"><a href="#!" class="all">All</a></li>
					<?php foreach ($portfolio_categories as $portfolio_category):?>
						<li><a href="#!" class="filter-<?php echo $portfolio_category -> slug; ?>"><?php echo $portfolio_category -> name; ?></a></li>
					<?php endforeach; ?>
					</ul>
				<?php endif; ?>
				
				<div id="single-home-container"></div>
			</div>
		</div>
	</div>	
</div>	
<div class="page-section-continued">
	<div class="container">
		<div class="sixteen columns content">
			<div class="portfolioHolder"><div class="portfolio-carousel-outer-wrapper full"><div class="portfolio-carousel-wrapper">
				<div class="portfolio-carousel-full fit-width-four">
			<?php 
			query_posts("post_type=portfolio &paged=" . get_query_var('paged'));		
	if(have_posts()): while(have_posts()) : the_post(); 
					$portfolio_title = get_the_title($post->id);
					$portfolio_type = get_post_meta($post -> ID, "shiv_portfolio_item_type", true); 
					if ($portfolio_type == 'slider') {
					$type = '<i class="fa fa-files-o"></i>';
					$slides = get_post_meta( get_the_ID(), 'shiv_portfolio_slides', false );
									if ($slides) {
										$image_src = wp_get_attachment_image_src( $slides[0], 'full' );
										$image_src = $image_src[0];
										$glass_url = '<a data-rel="prettyPhoto" href="'.$image_src.'" title="'.$portfolio_title.'">
										<IMG SRC="'.get_template_directory_uri().'/images/glass.png" alt="Preview"></a>';}
					} else if ($portfolio_type == 'video') {
						$type = '<i class="fa fa-video-camera"></i>';
					  if (get_post_meta( get_the_ID(), 'shiv_portfolio_video_type', true ) == 'youtube') {
					  	$glass_url = '<a data-rel="prettyPhoto" href="http://www.youtube.com/watch?v='.get_post_meta( get_the_ID(), 'shiv_portfolio_video_embed', true ).'" title="'.$portfolio_title.'">
					<IMG SRC="'.get_template_directory_uri().'/images/glass.png" alt="Preview"></a>';  
					  
					         }
					 else if (get_post_meta( get_the_ID(), 'shiv_portfolio_video_type', true ) == 'vimeo') {  
					    $glass_url = '<a data-rel="prettyPhoto" href="http://vimeo.com/'.get_post_meta( get_the_ID(), 'shiv_portfolio_video_embed', true ).'" title="'.$portfolio_title.'">
					<IMG SRC="'.get_template_directory_uri().'/images/glass.png" alt="Preview"></a>'; 
							  }   

					} else {  //  image
					$type = '<i class="fa fa-picture-o"></i>';
					$glass_url = '<a data-rel="prettyPhoto" href="'.wp_get_attachment_url(get_post_thumbnail_id($post -> ID)).'" title="'.$portfolio_title.'">
					<IMG SRC="'.get_template_directory_uri().'/images/glass.png" alt="Preview"></a>';
					}
					$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'portfolio-thumb' );
					$url = $thumb['0'];
					
					
					
					$categories = get_the_terms( get_the_ID(), 'portfolio_categories' );
					if($categories) : 
						$slug = '';
						foreach ($categories as $category) {
						$slug .= 'filter-';
						$slug .= $category->slug;
						$slug .= ' ';
					} endif;					
							
						?>							
						<div class="owl-item itemcontainer four full" data-id="id-<?php echo $post -> ID; ?>" data-type="<?php echo $slug; ?>">
								<div class="carousel-item-mini">			
									<div class="recent-content-item radius" style="background:#fff url(<?php echo $url; ?>) no-repeat">
										<div class="overlay-add">
											<div class="overlay-title">
											<?php echo get_the_title($post -> ID); ?>
											</div>
											<div class="overlay-type">
											<?php echo $type; ?>
											</div>
										</div>
			 							<div class="recent-overlay"></div>
										<div class="recent-overlay-content">
				   								 <div class="layer">
						                        <?php echo $glass_url; ?>
						                        <a rel="<?php the_permalink(); ?>" href="<?php the_permalink(); ?>">
						                        <IMG SRC="<?php echo get_template_directory_uri(); ?>/images/link.png" alt="Details"></a>
					                    		</div>
										</div>
									</div>
								</div>
							</div>	
				<?php	
				endwhile;
				endif;
				wp_reset_query();
				?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php } else if ($display_type == 'fit_carousel_five') { ?>
	
<div class="page-section-continued">
	<div class="container">
		<div class="sixteen columns">
			<div class="content">
				<?php					
				$portfolio_categories = get_terms('portfolio_categories');
				if ($portfolio_categories):?>
					<ul class="portfolio-buttons" id="clearajax"><li class="active"><a href="#!" class="all">All</a></li>
					<?php foreach ($portfolio_categories as $portfolio_category):?>
						<li><a href="#!" class="filter-<?php echo $portfolio_category -> slug; ?>"><?php echo $portfolio_category -> name; ?></a></li>
					<?php endforeach; ?>
					</ul>
				<?php endif; ?>
				
				<div id="single-home-container"></div>
			</div>
		</div>
	</div>	
</div>	
<div class="page-section-continued">
	<div class="container">
		<div class="sixteen columns content">
			<div class="portfolioHolder"><div class="portfolio-carousel-outer-wrapper full"><div class="portfolio-carousel-wrapper">
				<div class="portfolio-carousel-full fit-width-five">
			<?php 
			query_posts("post_type=portfolio &paged=" . get_query_var('paged'));		
	if(have_posts()): while(have_posts()) : the_post(); 
					$portfolio_title = get_the_title($post->id);
					$portfolio_type = get_post_meta($post -> ID, "shiv_portfolio_item_type", true); 
					if ($portfolio_type == 'slider') {
					$type = '<i class="fa fa-files-o"></i>';
					$slides = get_post_meta( get_the_ID(), 'shiv_portfolio_slides', false );
									if ($slides) {
										$image_src = wp_get_attachment_image_src( $slides[0], 'full' );
										$image_src = $image_src[0];
										$glass_url = '<a data-rel="prettyPhoto" href="'.$image_src.'" title="'.$portfolio_title.'">
										<IMG SRC="'.get_template_directory_uri().'/images/glass.png" alt="Preview"></a>';}
					} else if ($portfolio_type == 'video') {
						$type = '<i class="fa fa-video-camera"></i>';
					  if (get_post_meta( get_the_ID(), 'shiv_portfolio_video_type', true ) == 'youtube') {
					  	$glass_url = '<a data-rel="prettyPhoto" href="http://www.youtube.com/watch?v='.get_post_meta( get_the_ID(), 'shiv_portfolio_video_embed', true ).'" title="'.$portfolio_title.'">
					<IMG SRC="'.get_template_directory_uri().'/images/glass.png" alt="Preview"></a>';  
					  
					         }
					 else if (get_post_meta( get_the_ID(), 'shiv_portfolio_video_type', true ) == 'vimeo') {  
					    $glass_url = '<a data-rel="prettyPhoto" href="http://vimeo.com/'.get_post_meta( get_the_ID(), 'shiv_portfolio_video_embed', true ).'" title="'.$portfolio_title.'">
					<IMG SRC="'.get_template_directory_uri().'/images/glass.png" alt="Preview"></a>'; 
							  }   

					} else {  //  image
					$type = '<i class="fa fa-picture-o"></i>';
					$glass_url = '<a data-rel="prettyPhoto" href="'.wp_get_attachment_url(get_post_thumbnail_id($post -> ID)).'" title="'.$portfolio_title.'">
					<IMG SRC="'.get_template_directory_uri().'/images/glass.png" alt="Preview"></a>';
					}
					$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'portfolio-thumb' );
					$url = $thumb['0'];
					
					
					
					$categories = get_the_terms( get_the_ID(), 'portfolio_categories' );
					if($categories) : 
						$slug = '';
						foreach ($categories as $category) {
						$slug .= 'filter-';
						$slug .= $category->slug;
						$slug .= ' ';
					} endif;					
							
						?>	
							<div class="owl-item itemcontainer five full" data-id="id-<?php echo $post -> ID; ?>" data-type="<?php echo $slug; ?>">
								<div class="carousel-item-mini">			
									<div class="recent-content-item radius" style="background:#fff url(<?php echo $url; ?>) no-repeat">
										<div class="overlay-add">
											<div class="overlay-title">
											<?php echo get_the_title($post -> ID); ?>
											</div>
										</div>
			 							<div class="recent-overlay"></div>
										<div class="recent-overlay-content">
				   								 <div class="layer">
						                        <?php echo $glass_url; ?>
						                        <a rel="<?php the_permalink(); ?>" href="<?php the_permalink(); ?>">
						                        <IMG SRC="<?php echo get_template_directory_uri(); ?>/images/link.png" alt="Details"></a>
					                    		</div>
					                    		
										</div>
									</div>
								</div>
							</div>	
				<?php	
				endwhile;
				endif;
				wp_reset_query();
				?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>
	
	

<div class="clear"></div>

<?php get_footer(); ?>