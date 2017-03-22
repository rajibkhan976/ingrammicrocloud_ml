<?php get_header(); 
get_template_part('navigation');
?> 

<?php
if (have_posts()) : while (have_posts()) : the_post();

$portfolio_title = get_the_title($post->id);
$portfolio_type = get_post_meta($post -> ID, "shiv_portfolio_item_type", true); 

$client = get_post_meta($post -> ID, "shiv_portfolio_client_name", true); 
$url = get_post_meta($post -> ID, "shiv_portfolio_project_url", true); 

$previous_posts_image = '<i class="fa fa-chevron-left"> </i>';
$next_posts_image = '<i class="fa fa-chevron-right"> </i>';

$carousel = get_post_meta($post -> ID, "shiv_portfolio_carousel", true); 
$carousel_name = get_post_meta($post -> ID, "shiv_portfolio_carousel_name", true); 
$carousel_width = get_post_meta($post -> ID, "shiv_portfolio_carousel_width", true); 

global $smof_data;
$onepage = $smof_data['onepage'];


if (!(isset($_GET['ajax']))){
    $onepager = '0';
}else{
    $onepager = $_GET['ajax'];
}
?>
<?php if ($onepage == 0) { ?>
	<div class="page-section">
		<div class="page-heading">
			<div class="container">
			<div class="sixteen columns table">
			<div class="ten columns alpha cell">
			<h4><?php the_title(); ?></h4>
			</div>
			<div class="six columns omega cell">
			<?php the_breadcrumb(); ?>
			</div>
			</div>
			</div>
		</div>
	</div>
<?php
}?>
<div class="page-section-continued">
	<div class="container">
		<div class="sixteen columns content" id="ajaxContainer">
			<div class="four columns alpha">
				<?php
					if ($portfolio_type == 'slider') { get_template_part( 'post-formats/portfolio', 'slider');
					} else if ($portfolio_type == 'video') { get_template_part( 'post-formats/portfolio', 'video');
					} else { get_template_part( 'post-formats/portfolio', 'image');
					}
				?>					
			</div>

			<div class="one column"></div>
			<div class="eleven columns omega portfolio-content" style="float: right;">
                	     <h1 class="portfolio-title h1-no-blue-line" style="text-align: left;"><?php the_title(); ?></h1>
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
				<div class="navigation">
					<?php if(get_previous_post()) { ?>
					<?php if ($onepager == '1')  { ?>	
						<div class="prev prev_post">
						<a href="<?php custom_previous_post_link('%link',  $previous_posts_image );?>" rel="prev"><i class="fa fa-chevron-left"></i></a>
					</div>
					<?php } elseif ($onepage == 1)  { ?>
						<div class="prev prev_post">
						<?php previous_post_link('%link',  $previous_posts_image );?>
					</div>
					<?php } else { ?>
						<div class="prev">
						<?php previous_post_link('%link',  $previous_posts_image );?>
					</div>
					<?php } ?>
					<?php } ?>
				<?php if ($onepage == 1 or $onepager == '1') { ?>
				<div class="exit">
				<a href="#" class="close"><i class="fa fa-times"> </i></a>
				</div>
				<?php } ?>
				<?php if(get_next_post()) { ?>
					<?php if ($onepager == '1')  { ?>	
						<div class="prev prev_post">
						<a href="<?php custom_next_post_link('%link',  $previous_posts_image );?>" rel="next"><i class="fa fa-chevron-right"></i></a>
					</div>
					<?php } elseif ($onepage == 1)  { ?>
						<div class="next next_post">
						<?php next_post_link('%link',  $next_posts_image );?>
					</div>
					<?php } else { ?>
						<div class="next">
						<?php next_post_link('%link',  $next_posts_image );?>
					</div>
					<?php } ?>
					
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php endwhile;
endif;
wp_reset_query();  
?> 

<?php if ($onepage == 0) {
	if ($carousel == 1) { ?>	
<div class="page-section-continued">
	<div class="container">
		<div class="sixteen columns">
			<h1 class="related"><?php echo $carousel_name;?></h1>
			<?php if ($carousel_width == 'fit') { ?>
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
					} endif;?>	
						
				<!-- full carousel -->
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
<?php } else { ?>
	</div>
</div>
	<div class="portfolioHolder"><div class="portfolio-carousel-outer-wrapper full"><div class="portfolio-carousel-wrapper">
		<div class="portfolio-carousel-full full-width">
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
	<?php } 
}
}
?>
<div class="page-section-continued">
	<div class="container">
		<div class="sixteen columns">
			<div class="spacer"></div>
		</div>
	</div>
</div>
<?php get_footer(); ?>