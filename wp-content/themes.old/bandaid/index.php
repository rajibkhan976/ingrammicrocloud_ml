<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bandaid
 */
 
 

get_header(); ?>


<?php 
	if( get_field('featured_image', 145) ) {
		$featured_image = get_field('featured_image', 145); 
	}else{
		
	}
?>
	
	<section class="sub-slider">
		<div class="slide" style="background: url('<?php echo $featured_image;?>') no-repeat top center; background-size: cover;">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<h1>Cloud Elevate Blog</h1>
						<h2>Awesome awesomeness that makes reading<br/>awesomely awesome.</h2>
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
						
						<?php 
							$sticky = get_option( 'sticky_posts' );
							
							$args = array(
								'posts_per_page' => -1,
								'post__in'  => get_option( 'sticky_posts' ),
							);
							
							$query = new WP_Query( $args );
							//query_posts('post_type=post&post__in='. $sticky); 
						?>
						<?php while ( have_posts() ) : the_post(); 
							$x++;
							$pid = get_the_id();
							//print_r($sticky);
							
							foreach($sticky as $stick){
								//echo $stick;
							if($pid == $stick){
								
								$classy = 'featured';
								$display = 'show';	
								break;
							}else{
								$classy = '';
								$display = 'hidden';	
							}
							}
							
							$text = get_the_content();
							$trimmed = wp_trim_words( $text, $num_words = 55, $more = null ); 
						?>
							
							<div class="featured-tab <?php echo $display; ?>">
								FEATURED
							</div>
							
							<div class="post-container <?php echo $classy; ?>">
							
							<div class="row">
							<div class="col-md-2">
								<img src="//placehold.it/125x125/"></img>
							</div>
							<div class="col-md-10">
							<!-- -->
							
								<a href="<?php echo the_permalink(); ?>">
									<h2><?php echo the_title(); ?></h2>
								</a>
								
								<div class="the-content"><?php echo $trimmed; ?></div>
								
						
							<!-- -->
							</div>
								
								
							</div>
							<div class="user-info-container">
											
											<div class="hr">
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
											
											<div class="user-info float-left"><i class="fa fa-user"></i> <?php echo get_field('author'); ?> &nbsp;&nbsp; <i class="fa fa-calendar"></i> <?php echo get_the_date('F d, Y'); ?></div>
											
											<div class="social-info float-right">
												<ul class="inline list-inline">
													<li><a href="#"><i class="fa fa-twitter"></i></a></li>
													<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
													<li><a href="#"><i class="fa fa-facebook"></i></a></li>
													<li><a href="#"><i class="fa fa-rss"></i></a></li>
													<li><a href="#"><i class="fa fa-envelope-o"></i></a></li>
													<li class="read-more"><a href="<?php echo the_permalink(); ?>">READ MORE</a></li>
												</ul>
											</div>
											<div class="clearfix"></div>
										</div>

							</div>
						
						<?php endwhile; // End of the loop. ?>
						
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
