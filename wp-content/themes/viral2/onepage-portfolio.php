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
		<div class="sixteen columns">
			<div class="content">
			<?php if ($disable_title !== '1') { ?>
			<div class="onepage-heading">
			<h1><?php echo $title; ?></h1>
			<h6><?php echo $subtitle; ?></h6>
			</div>
			<?php } ?>
			<!--portfolio query-->							
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
	<div class="portfolioHolder"><div class="portfolio-carousel-outer-wrapper"><div class="portfolio-carousel-wrapper">
		<div class="portfolio-carousel">
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
				<div class="owl-item itemcontainer full-three full" data-id="id-<?php echo $post -> ID; ?>" data-type="<?php echo $slug; ?>">
					<div class="carousel-item-mini">			
						<div class="recent-content-item" style="background:#fff url(<?php echo $url; ?>) no-repeat">
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
						    <a class="trick" rel="<?php the_permalink(); ?>" href="<?php the_permalink(); ?>">
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
		</div>
	</div>
</div>
<?php
wp_reset_query();
?>
</div><div class="clear"></div>