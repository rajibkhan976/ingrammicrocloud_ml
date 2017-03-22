<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package bandaid
 */

get_header(); ?>

<?php
	if(get_field('featured_image')){
		$image = get_field('featured_image');
	}else{
		$image = get_field('featured_image', 145); 
	}
?>

<section class="sub-slider">
		<div class="slide" style="background: url('<?php echo $image; ?>') no-repeat top center; background-size: cover;">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<h1><?php echo the_title(); ?></h1>
						<!--<h2>Tools that enable business transformation<br/>in the cloud.</h2>-->
						<!--<p>Supporting paragraph copy goes right here.</p>-->
					</div>
				</div>
			</div>
		</div>	
	</section>
	
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
			        <?php 
			            if ( function_exists('yoast_breadcrumb') ) 
			            {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} 
			        ?>
        		</div>
        	</div>
        </div>
    </div>
	
	<section class="content-panel benefits-panel">
		
		<div class="container">
			<div class="row">
				
				<div class="col-sm-9">
					<div class="content-container">
						
						<?php while ( have_posts() ) : the_post(); 
						$x++;
						if($x == 1 ){
							//$classy = 'featured';
						}else{
							//$classy = '';
						}
						$pid = get_the_id();
						?>
							
							<div class="post-container <?php echo $classy; ?>">
								<!--<a href="<?php echo the_permalink(); ?>">-->
								<!--	<h2><?php echo the_title(); ?></h2>-->
								<!--</a>-->
								
								<div class="the-content"><?php echo the_content(); ?></div>
								<div class="user-info-container">
									
									<div class="hr">
										<div class="tags"><i class="fa fa-tag"></i> world, globe, politics, obama, president</div>
									</div>
									
									<div class="user-info float-left"><i class="fa fa-user"></i> <?php echo get_field('author'); ?> &nbsp;&nbsp; <i class="fa fa-calendar"></i> <?php echo get_the_date('F d, Y'); ?></div>
									
									<div class="social-info float-right">
										<ul class="inline list-inline">
											<li><a href="#"><i class="fa fa-twitter"></i></a></li>
											<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
											<li><a href="#"><i class="fa fa-facebook"></i></a></li>
											<li><a href="#"><i class="fa fa-rss"></i></a></li>
											<li><a href="#"><i class="fa fa-envelope-o"></i></a></li>
											<!--<li class="read-more"><a href="#">READ MORE</a></li>-->
										</ul>
									</div>
									<div class="clearfix"></div>
								</div>
								
							</div>
						
						<?php endwhile; // End of the loop. ?>
						
						<div class="row">
							<div class="col-sm-12">
								<div class="hr">
									<h3>Related Posts:</h3>
								</div>
								<br>
							</div>
						</div>
						<div class="row">
						<?php 
							$posts = get_posts('post_type=post&numberposts=3&orderby=rand&exclude='. $pid);
							foreach($posts as $post){ 
								$id = $post->ID;
						?>
						<div class="col-sm-4 related-posts">
							<?php //print_r($post); ?>
							
							<div class="post-container <?php echo $classy; ?> bordered" style="background: url('<?php echo get_field('featured_image', $id); ?>') top center no-repeat #999; background-size: cover; ?>">
								<a href="<?php echo the_permalink(); ?>">
									<h4><?php echo the_title(); ?></h4>
								</a>
								
								<!--<a href="#" class="btn btn-primary">READ MORE</a>-->
								
								<div class="tags">
									<i class="fa fa-tag"></i>
									<?php
										$posttags = get_the_tags();
										if ($posttags) {
										  foreach($posttags as $tag) {
										    echo $tag->name . ', '; 
										  }
										}
									?>
								</div>
								
							</div>
							
							<ul class="inline list-inline">
								<li class="read-more"><a href="<?php echo the_permalink(); ?>">READ MORE</a></li>
							</ul>
						</div>
						
						<?php } ?>
					</div>
						
					</div>
					
				</div>
				
				<div class="col-sm-3">
					<?php get_sidebar('blog'); ?>
					<?php get_sidebar('subpage'); ?>
				</div>
				
			</div>	
		</div>	
	</section>
	
<?php get_footer(); ?>
