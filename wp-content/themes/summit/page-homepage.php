<?php
/**
 * Template Name: Home
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
	
	<section class="panel1" data-vide-bg="mp4: /wp-content/themes/summit/video/ocean, webm: /wp-content/themes/summit/video/ocean, ogv: /wp-content/themes/summit/video/ocean, poster: /wp-content/themes/summit/video/ocean"
  data-vide-options="position: 100% 50%">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<div class="logo">
						<img class="img-responsive" src="/wp-content/themes/summit//img/logo.png"></img>
					</div>
					<h1>Where Rainmakers Thrive</h1>
					<h2>April 11th - 13th 2016 - Phoenix AZ</h2>
					<!--<p>A rainmaker is defined as a person who generates income and has the foresight to create business opportunities. This exclusive event will connect you with over one thousand influential people in the cloud community and provide.</p>-->
				</div>
				<div class="col-sm-6">
					<div class="play-btn text-center">
						<a class="colorbox" href="https://www.youtube.com/embed/MLJH021Fk5c?rel=0&amp;wmode=transparent&amp;autoplay=1&amp;color=white&amp;fs=1&amp;showinfo=0">
							<img class="img-responsive center-block" src="/wp-content/themes/summit/img/icon-large-play.png"></img>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<div class="bar"></div>
	<div class="tri-overlay">
		
	</div>
		
	<section class="panel2">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<div class="left-border">
					<h2>Cloud Summit</h2>
					<h3>Where Rainmakers Thrive</h3>
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
					<div class="cloud-graphs">
						<div class="col-sm-6 wow bounceInUp" data-wow-offset="250" data-wow-delay=".4s">
							<div class="col1">
							<div class="desc">
								Early Bird Registration
							</div>
							<div class="price"><span class="usd">$</span>499</div>
							<div class="expires">Expires: January 31, 2016</div>
							</div>
							<div class="register-now">
							<a class="inline-pop" href="#inline-content">REGISTER TODAY</a>
							</div>
						</div>
						<!--<i class="fa fa-caret-right"></i>-->
						<div class="col-sm-6 wow bounceInUp" data-wow-offset="250" data-wow-delay=".1s">
							<div class="col2">
								<div class="desc">
									General Registration
							<div class="price"><span class="usd">$</span>599</div>
							<div class="expires">Expires: February 28, 2016</div>
							<!--<div class="expires expires-alt">DEADLINE: March 18, 2016 </div>-->
							</div>
							</div>
							<div class="light-gray-box"></div>
						</div>
						
						<div class="single-cloud wow slideInRight" data-wow-offset="0" data-wow-delay=".7s" data-wow-duration="3.5s">
							<img class="img-responsive" src="/wp-content/themes/summit/img/cloud.png"/>
						</div>
						<!--<i class="fa fa-caret-left"></i>-->
						<!--<img class="img-responsive" src="wp-content/themes/summit/img/cloud-graphs.png"></img>-->
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section class="panel3">
		<div class="container">
			<div class="row">
				<div class="grid">
				  <div class="grid-sizer"></div>
				  <div class="speaker grid-item grid-item--height2 grid-item1">
				  	<a href="<?php echo bloginfo('url'); ?>/speakers">
				  	<div class="speaker-info">
				  		<div class="speaker-name">Buzz Aldrin</div>
					  	<div class="speaker-title">Astronaut</div>
					  	
				  	</div>
				  	</a>
				  </div>
				  
				  <div class="speaker grid-item grid-item2">
				  	<a href="<?php echo bloginfo('url'); ?>/speakers">
				  	<div class="speaker-info">
					  	<div class="speaker-name">Renee Bergeron</div>
					  	<div class="speaker-title">VP Ingram Micro</div>
				  	</div>
				  	</a>
				  </div>
				  
				  <div class="speakers-headline grid-item grid-item--width2 grid-item3">
				  	<div class="content">
				  		<span class="bit-lighter">2016</span> Speakers
				  	</div>
				  </div>
				  
				  <div class="speaker grid-item grid-item4">
				  	
				  </div>
				  
				  <div class="grid-item grid-item5"></div>
				  
				  <div class="grid-item grid-item6 grid-item--height2"></div>
				  
				  <div class="grid-item grid-item7"></div>
				  
				  <div class="speaker grid-item grid-item8">
				  	<a href="<?php echo bloginfo('url'); ?>/speakers">
				  	<div class="speaker-info">
				  			<div class="speaker-name">Nimesh Dave</div>
					  	<div class="speaker-title">Exec VP Ingram Micro</div>
					  
				  	</div>
				  	</a>
				  </div>
				  
				  <div class="grid-item grid-item9"></div>
				  
				  <div class="grid-item grid-item--width2 grid-item10"></div>
				  
				  <div class="grid-item grid-item--width2 grid-item11"></div>
				
				<div class="grid-item grid-item--width2 grid-item--chopped grid-item12"></div>
				<div class="grid-item grid-item--width2 grid-item--chopped grid-item13">
					<div class="agenda-now"><a href="<?php echo get_bloginfo('url'); ?>/agenda">VIEW FULL AGENDA</a> </div></div>
				</div>
				
				
			</div>
		</div>
	</section>
	
	<section class="panel4">
		<div class="arrows">
				<div class="prev"><i class="fa fa-angle-left"></i></div>
				<div class="next"><i class="fa fa-angle-right"></i></div>
			</div>
		<div class="session-slider">
			
			<div class="slide-1-container">
			  <div class="slide-text">
			  	<h2>Summit Sessions</h2>
			  	<h3>Women of the Cloud</h3>
			  	<p>Join us for an open discussion about the role of women in technology and the cloud industry.</p>
			  	<a href="/agenda"><button class="btn btn-primary">Learn More</button></a>
			  </div>
			</div>
			
			<div class="slide-2-container">
			  <div class="slide-text">
			  	<h2>Summit Sessions</h2>
			  	<h3>Cloud University</h3>
			  	<p>To help the channel embrace the cloud, Ingram Micro offers Cloud University as a benefit to its resellers. Ingram Micro Cloud University is filled with educational offerings and practical business knowledge designed to support resellers as they transition to the cloud.</p>
			  	<a href="/agenda"><button class="btn btn-primary">Learn More</button></a>
			  </div>
			</div>
			
			<!--<div class="slide-3-container">-->
			<!--  <div class="slide-text">-->
			<!--  	<h2>Summit Sessions</h2>-->
			<!--  	<h3>Buzz Aldrins Life</h3>-->
			<!--  	<p>How Buzz went to the moon and back and how that single event changed the course of technology and the world forever. To inifinity and beyond!</p>-->
			<!--  	<a href="/agenda"><button class="btn btn-primary">Learn More</button></a>-->
			<!--  </div>-->
			<!--</div>-->
			
		</div>
	</section>
	
	<section class="panel5">
		<div class="arrows">
				<div class="prev1"><i class="fa fa-angle-left"></i></div>
				<div class="next1"><i class="fa fa-angle-right"></i></div>
			</div>
		<div class="container">
			
			
			<div class="row testimonial-slider">
			
			  <div>
			  	<div class="col-sm-4">
			  		<span class="fa-stack fa-lg source">
			          <i class="fa fa-circle fa-stack-2x"></i>
			          <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
			        </span>
				  	<img src="/wp-content/themes/summit/img/randy.jpg" class="img-circle"></img>
			  	</div>
			  	<div class="col-sm-8">
			  		<div class="testimonial">
			  		"Great times at #IngramCloudSummit coming to an end. Picked up great info and some new vendors! "</div>
			  		<div class="author">- Randy Rowe</div>
			  	</div>
			  </div>
			  
			  <div>
			  	<div class="col-sm-4">
			  		<span class="fa-stack fa-lg source">
			          <i class="fa fa-circle fa-stack-2x"></i>
			          <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
			        </span>
				  	<img src="/wp-content/themes/summit/img/carrie.jpg" class="img-circle"></img>
			  	</div>
			  	<div class="col-sm-8">
			  		<div class="testimonial">
			  		"first time ever I managed to stay up for a channel after party! Great event from start to the very end! #IngramCloudSummit"</div>
			  		<div class="author">- Carrie Simpson</div>
			  	</div>
			  </div>
			  
			  <div>
			  	<div class="col-sm-4">
			  		<span class="fa-stack fa-lg source">
			          <i class="fa fa-circle fa-stack-2x"></i>
			          <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
			        </span>
				  	<img src="/wp-content/themes/summit/img/judson.jpg" class="img-circle"></img>
			  	</div>
			  	<div class="col-sm-8">
			  		<div class="testimonial">
			  		"Great to participate in the Ingram Micro Cloud Summit. Thanks to Nimesh Dave and team for hosting #IngramCloudSummit"</div>
			  		<div class="author">- Judson Althoff</div>
			  	</div>
			  </div>
			  
			  <div>
			  	<div class="col-sm-4">
			  		<span class="fa-stack fa-lg source">
			          <i class="fa fa-circle fa-stack-2x"></i>
			          <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
			        </span>
				  	<img src="/wp-content/themes/summit/img/newman.png" class="img-circle"></img>
			  	</div>
			  	<div class="col-sm-8">
			  		<div class="testimonial">
			  		"On my list for next year... #IngramCloudSummit Looks like a great place to talk about where tech is going."</div>
			  		<div class="author">- Daniel Newman</div>
			  	</div>
			  </div>
			  
			
			
			 <div>
			  	<div class="col-sm-4">
			  		<span class="fa-stack fa-lg source">
			          <i class="fa fa-circle fa-stack-2x"></i>
			          <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
			        </span>
				  	<img src="/wp-content/themes/summit/img/orisko.jpg" class="img-circle"></img>
			  	</div>
			  	<div class="col-sm-8">
			  		<div class="testimonial">
			  		"Goodbye Phoenix! Thanks @IngramCloud for an amazing experience at #IngramCloudSummit"</div>
			  		<div class="author">- Tracie Orisko</div>
			  	</div>
			 </div>
			  
			 <div>
			  	<div class="col-sm-4">
			  		<span class="fa-stack fa-lg source">
			          <i class="fa fa-circle fa-stack-2x"></i>
			          <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
			        </span>
				  	<img src="/wp-content/themes/summit/img/craig.jpg" class="img-circle"></img>
			  	</div>
			  	<div class="col-sm-8">
			  		<div class="testimonial">
			  		"Highlights from #IngramCloudSummit include inspiring speech from @CaptSully http://bit.ly/1FbcPwL  @ReneeIMCloud @IBMCloud"</div>
			  		<div class="author">- Craig Galbraith</div>
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
