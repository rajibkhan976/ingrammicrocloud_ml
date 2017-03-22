<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
						
						<?php if ( have_posts() ) : ?>
						
						<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'elevate' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
						<br>
						<?php while ( have_posts() ) : the_post(); 
							$x++;
							if($x == 1 ){
								$classy = 'featured';
								$display = 'show';
							}else{
								$classy = '';
								$display = 'hidden';
							}
							
							$text = get_the_content();
							$trimmed = wp_trim_words( $text, $num_words = 55, $more = null ); 
						?>
							
							<div class="featured-tab <?php echo $display; ?>">
								FEATURED
							</div>
							<div class="post-container <?php echo $classy; ?>">
								<a href="<?php echo the_permalink(); ?>">
									<h2><?php echo the_title(); ?></h2>
								</a>
								
								<div class="the-content"><?php echo $trimmed; ?></div>
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
									
									<div class="user-info float-left"><i class="fa fa-user"></i> <?php echo get_field('author'); ?> &nbsp;&nbsp; <i class="fa fa-calendar"></i> <?php echo get_the_date('F d Y'); ?></div>
									
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
						
						<?php else : ?>

						<?php endif; ?>
						
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
