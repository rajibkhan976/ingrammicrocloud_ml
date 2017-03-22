<?php
/**
 * Template Name: Subpage
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package summit
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

	<section class="sub-panel1">
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="logo">
						<a href="<?php echo get_bloginfo('url'); ?>"><img class="img-responsive" src="/wp-content/themes/summit//img/logo.png"></img></a>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section class="panel2">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<div class="left-border">
					<h2><?php the_title();?></h2>
					<br><br>
					<p>
					A rainmaker is defined as a person who generates income and has the foresight to create business opportunities. This exclusive event will connect you with over one thousand influential people in the cloud community and provide learning opportunities around solution selling techniques, financial modeling and mitigation, as well as dynamic cloud growth marketing strategies…and much more
					</p>
					
					<h4>Cloud Summit Highlights:</h4>
					<ul class="bullets">
						<li><a href="#"><i class="fa fa-check"></i> Connect with over 1,000 Influential People</a></li>
						<li><a href="#"><i class="fa fa-check"></i> Learn the Latest Tools and Technology</a></li>
						<li><a href="#"><i class="fa fa-check"></i> Experience Solutions Selling Techniques</a></li>
						<li><a href="#"><i class="fa fa-check"></i> Grow with Cloud Marketing Strategies</a></li>
					</ul>
					</div>
				</div>
				<div class="col-sm-6">
					
				</div>
			</div>
		</div>
	</section>
	
	
	<section class="panel5">
		<div class="container">
			
			<div class="row testimonial-slider">
			  <div>
			  	<div class="col-sm-4">
			  		<span class="fa-stack fa-lg source">
			          <i class="fa fa-circle fa-stack-2x"></i>
			          <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
			        </span>
				  	<img src="/wp-content/themes/summit/img/bio-1.jpg" class="img-circle"></img>
			  	</div>
			  	<div class="col-sm-6">
			  		<div class="testimonial">
			  		"Highlights from #IngramCloudSummit include inspiring speech from @CaptSully http://bit.ly/1FbcPwL  @ReneeIMCloud @IBMCloud"</div>
			  		<div class="author">- Craig Galbraith</div>
			  	</div>
			  </div>
			  <div>
			  	<div class="col-sm-4">
			  		<span class="fa-stack fa-lg source">
			          <i class="fa fa-circle fa-stack-2x"></i>
			          <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
			        </span>
				  	<img src="/wp-content/themes/summit/img/bio-2.jpg" class="img-circle"></img>
			  	</div>
			  	<div class="col-sm-6">
			  		<div class="testimonial">
			  		"On behalf of #Parallels, thank you Ingram for putting yet another top notch event!  #IngramCloudSummit"</div>
			  		<div class="author">- Wendy Cassady</div>
			  	</div>
			  </div>
			  <div>
			  	<div class="col-sm-4">
			  		<span class="fa-stack fa-lg source">
			          <i class="fa fa-circle fa-stack-2x"></i>
			          <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
			        </span>
				  	<img src="/wp-content/themes/summit/img/bio-1.jpg" class="img-circle"></img>
			  	</div>
			  	<div class="col-sm-6">
			  		<div class="testimonial">
			  		"Highlights from #IngramCloudSummit include inspiring speech from @CaptSully http://bit.ly/1FbcPwL  @ReneeIMCloud @IBMCloud"</div>
			  		<div class="author">- Craig Galbraith</div>
			  	</div>
			  </div>
			  <div>
			  	<div class="col-sm-4">
			  		<span class="fa-stack fa-lg source">
			          <i class="fa fa-circle fa-stack-2x"></i>
			          <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
			        </span>
				  	<img src="/wp-content/themes/summit/img/bio-2.jpg" class="img-circle"></img>
			  	</div>
			  	<div class="col-sm-6">
			  		<div class="testimonial">
			  		"On behalf of #Parallels, thank you Ingram for putting yet another top notch event!  #IngramCloudSummit"</div>
			  		<div class="author">- Wendy Cassady</div>
			  	</div>
			  </div>
			</div>
		</div>
	</section>
	
	<section class="panel6">
		<div class="container">
			<div class="row">
			<div class="col-sm-9 sponsor-slider">
			  <div><img src="https://placehold.it/300x400"></img></div>
			  <div><img src="https://placehold.it/300x400"></img></div>
			  <div><img src="https://placehold.it/300x400"></img></div>
			  <div><img src="https://placehold.it/300x400"></img></div>
			  <div><img src="https://placehold.it/300x400"></img></div>
			  <div><img src="https://placehold.it/300x400"></img></div>
			  <div><img src="https://placehold.it/300x400"></img></div>
			  <div><img src="https://placehold.it/300x400"></img></div>
			  <div><img src="https://placehold.it/300x400"></img></div>
			  <div><img src="https://placehold.it/300x400"></img></div>
			  <div><img src="https://placehold.it/300x400"></img></div>
			  <div><img src="https://placehold.it/300x400"></img></div>
			</div>
			<div class="col-sm-3">
				YOUR LOGO HERE
				<button class="btn">BECOME A SPONSOR</button>
				<i class="fa fa-right-caret"></i>
			</div>
		</div>
		</div>
	</section>

<?php endwhile; // End of the loop. ?>

<?php get_footer(); ?>
