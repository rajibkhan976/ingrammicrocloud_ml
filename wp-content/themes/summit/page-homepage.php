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
<div class="platform-page"> 
<?php while ( have_posts() ) : the_post(); ?>
	
	<!--<section class="panel1" data-vide-bg="mp4: /wp-content/themes/summit/video/ocean, webm: /wp-content/themes/summit/video/ocean, ogv: /wp-content/themes/summit/video/ocean, poster: /wp-content/themes/summit/video/ocean"
  data-vide-options="position: 100% 50%">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<div class="logo">
						<img class="img-responsive" src="/wp-content/themes/summit/img/logo.png"></img>
					</div>
					<h1>Where Rainmakers Thrive</h1>
					<h2>April 11th - 13th 2016 - Phoenix AZ</h2>
					<div class="logos">
						<img id="ingram" src="http://ingrammicrocloudsummit.com/wp-content/themes/summit/img/white-logo.png"><img id="pipe" src="http://placehold.it/1x75"><img id="odin" style="margin-top: 12px;" src="http://ingrammicrocloudsummit.com/wp-content/themes/summit/img/header-odin-logo-white.png">
					</div>
<p>A rainmaker is defined as a person who generates income and has the foresight to create business opportunities. This exclusive event will connect you with over one thousand influential people in the cloud community and provide.</p>
				</div>
				<div class="col-sm-6">
					<div class="play-btn text-center">
						<a class="colorbox" href="https://www.youtube.com/embed/3FQFXt0QlNE?rel=0&amp;wmode=transparent&amp;autoplay=1&amp;color=white&amp;fs=1&amp;showinfo=0">
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
		-->
<section class="panel1 cloud-summit-page" style="display:block; clear:both; position: relative;">
        <div class="video-container" >
            <video poster="<?php echo get_template_directory_uri(); ?>/img/landing-page/landing_page_video.png" autoplay loop muted>
                <source type="video/mp4" src="<?php echo get_template_directory_uri(); ?>/video/ocean_2017.mp4">
                <source type="video/webm" src="<?php echo get_template_directory_uri(); ?>/video/ocean_2017.webm">
                <source type="video/ogg" src="<?php echo get_template_directory_uri(); ?>/video/ocean_2017.ogv">
            </video>
            <div class="video-content">
                <div class="container">
                    <div class="row">
                    	<div class="col-sm-1 col-xs-0"></div>
                        <div class="col-sm-5 col-xs-6">
                            <div class="logo">
                                <img class="img-responsive" src="/wp-content/uploads/2016/11/cloud-summit-2017-logo2.png">
                            </div>	
                        </div>
                        <div class="col-sm-6 col-xs-6">
                            <img class="img-responsive" src="/wp-content/uploads/2016/11/rise_above-1.png">
                        </div>				
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="play-btn-text text-center" style="text-align: center; margin:10px auto;">
                                <img class="img-responsive" src="/wp-content/uploads/2016/11/perspective-1.png" align="center" style="margin: auto;">
                                <a href="http://www.cvent.com/d/3fqj0t/8C?ct=b352e06e-1055-4907-9c5c-a2c67385b62d&RefID=Attendee" target="_blank" class="btn btn-outline-gray" role="button">REGISTER NOW</a>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
</section>
<hr class="cloud-blue-border">
	<section class="panel2 rise-above">
		<div class="container">
			<div class="row">
				<div class="col-sm-7">
						<h2>It’s your turn to Rise Above</h2>
						<p>&nbsp;</p>
						<!--h2>Cloud Summit</h2-->
						<!--h3>Where Rainmakers Thrive</h3-->
						<p>Business is evolving. As cloud becomes more complex every day, rising above the noise is increasingly challenging. </p>
						<p>Cloud Summit 2017 is the event to go to learn what’s new, what’s trending and what’s on the horizon in the world of cloud computing. Cloud is not just a single technology. It’s a foundational platform to run and drive a whole new way of doing business. </p>
                        <div class="leadership-list">
							<p>At Cloud Summit, you’ll learn to harness the power of transformational leadership while diving into:</p>
                            <br/>
                            <ul class="homeul">
                                <li><i class="fa fa-circle" aria-hidden="true"></i> Platform disruption and the “next wave” </li>
                                <li><i class="fa fa-circle" aria-hidden="true"></i>Internet of Things and industry trends </li>
                                <li><i class="fa fa-circle" aria-hidden="true"></i>Digital marketing, SEO and how to capitalize on social media</li>
                                <li><i class="fa fa-circle" aria-hidden="true"></i>Accelerating your cloud business through automation and innovation</div>
                                </li>
                            </ul>
                        
                        <p>It’s not just keynotes and track sessions, but unlimited networking opportunities, real workshops and interactive discussions with industry disrupters and change agents.</p>
                        <p>It’s where you’ll connect with more than 1,500 influential industry professionals, explore 100+ track sessions, discover the latest innovations and learn new strategies to transform your business.</p>
                        <p>Register today to Rise Above this April 19-21 at Cloud Summit 2017. </p>
				</div>
				<div class="col-sm-5">
					<img src="/wp-content/themes/summit/img/cloud-summi-ad.jpg" class="img-responsive" />
				</div>
			</div>
		</div>
	</section>	
<section class="register-by" style="display:none;">
	<div class="container">
		<div class="row">
			<div class="bottom-block">
					<h3 class="bottom-block-heading">
						<a href="http://www.cvent.com/d/nvq9qb/4W" target="_blank" style="color:#5a86b9;">Register by January 15, 2017, and save $100!</a>
					</h3>
					<div class="bottomcol1">
						Standard Registration: <strong>$699</strong><br/>
						Early Bird Registration: <strong>$599</strong><br/>
						<h4>Want to travel in style?</h4>
						All partners who register prior to December 23 will automatically be entered to win a complimentary AMEX gift card for the Cloud Summit (value $500)
						<h5>Contest details:</h5>
						<ul class="footerul">
							<li>Three winners will be randomly chosen</li>
							<li>Entrants must register before December 23 to be eligible*</li>
							<!--li>Winner will receive travel voucher in the form of AMEX travel voucher with a value of $500</li-->
							<li>Winner will receive a $500 AMEX gift card</li>
						</ul> 
					</div>
				</div>
		</div>
	</div>
</section>
<section class="panel2-1 whats-included">
	<h4 class="whats-include">What's Included:</h4>
	<div class="panel2-1-background">		
		<div class="container">
			<div class="row-fluid bg">
				<ul class="list-inline inline">
					<li class="wow bounceInUp" data-wow-offset="150" data-wow-delay=".1s">
						<div class="img">
							<img clas="img-responsive" src="<?php echo bloginfo('template_url'); ?>/img/icon-hotel.png"></img>
						</div>
						<div class="title">3 nights at a<br />4-star resort</div>
					</li>

					<li class="wow bounceInUp" data-wow-offset="150" data-wow-delay=".2s">
						<div class="img">
							<img clas="img-responsive" src="<?php echo bloginfo('template_url'); ?>/img/icon-group.png"></img>
						</div>
						<div class="title">Admission to all general<br /> breakout sessions</div>
					</li>

					<li class="wow bounceInUp" data-wow-offset="150" data-wow-delay=".3s">
						<div class="img">
							<img clas="img-responsive" src="<?php echo bloginfo('template_url'); ?>/img/icon-food-new.png"></img>
						</div>
						<div class="title">Food and beverages during<br />the event</div>
					</li>

					<li class="wow bounceInUp" data-wow-offset="150" data-wow-delay=".4s">
						<div class="img">
							<img clas="img-responsive" src="<?php echo bloginfo('template_url'); ?>/img/icon-golf.png"></img>
						</div>
						<div class="title">Golf tournament green<br />fees (while spots last)</div>
					</li>

					<li class="wow bounceInUp" data-wow-offset="150" data-wow-delay=".5s">
						<div class="img">
							<img clas="img-responsive" src="<?php echo bloginfo('template_url'); ?>/img/icon-music.png"></img>
						</div>
						<div class="title">Live music &amp;<br/> entertainment</div>
					</li>
				</ul>

			</div>
		</div>
	</div>
</section>
	
	<section class="panel3 panel2-1 whats-included">
		<h4 class="whats-include">2017 Speakers</h4>
		<div>
			<div class="grid ">
				<div class="row">
				  <!-- <div class="grid-sizer"></div> -->
                  <div class="col-md-2 col-sm-2 col-xs-2 no-padding" style="width: 20% !important;">
                      <div class="speaker grid-item grid-item--height2 grid-item1">
                        <a href="<?php echo bloginfo('url'); ?>/speakers/#marc-randolph">
                            <div class="speaker-info">
                            	<div>
                                	<div class="speaker-name">Marc Randolph</div>
                                	<div class="speaker-title">Former CEO of Netflix and Co-Founder of Looker Data Sciences</div>
                                </div>						  	
                            </div>
                        </a>
                      </div>
                  </div>
                  <div class="col-md-2 col-sm-2 col-xs-2 no-padding" style="width: 20% !important;">
                      <div class="speaker grid-item grid-item--height2 grid-item4">
                        <a href="<?php echo bloginfo('url'); ?>/speakers/#jim-mckelvey">
                            <div class="speaker-info">
                            	<div>
                                	<div class="speaker-name">Jim McKelvey</div>
                                	<div class="speaker-title">Co-Founder of  Square and Founder of LaunchCode</div>
                               </div>
                        	</div>
                        </a>
                      </div>
                  </div>
                  <div class="col-md-2 col-sm-2 col-xs-2 no-padding" style="width: 20% !important;">
                      <div class="speaker grid-item grid-item--height2 grid-item5">
                        <a href="<?php echo bloginfo('url'); ?>/speakers/#renee-bergeron">
                            <div class="speaker-info">
                            	<div>
                                	<div class="speaker-name">Ren&eacute;e Bergeron</div>
                                	<div class="speaker-title">SVP, Global Cloud Channel, Ingram Micro</div>
                                </div>
                            </div>
                           
                        </a>
                      </div>
                  </div>
                  <div class="col-md-2 col-sm-2 col-xs-2 no-padding" style="width: 20% !important;">
                      <div class="speaker grid-item grid-item--height2 grid-item2">
                        <a href="<?php echo bloginfo('url'); ?>/speakers/#nimesh-dave">
                            <div class="speaker-info">
                            	<div>
                                	<div class="speaker-name">Nimesh Dav&eacute;</div>
                               	 	<div class="speaker-title">EVP, Global Cloud, Ingram Micro</div>
                                </div>
                            </div>
                        </a>
                      </div>
                  </div>
                  <div class="col-md-2 col-sm-2 col-xs-2 no-padding" style="width: 20% !important;">
                      <div class="speaker grid-item grid-item--height2 grid-item3">
                        <a href="<?php echo bloginfo('url'); ?>/speakers/#pam-miller">
                            <div class="speaker-info">
                            	<div>
                                	<div class="speaker-name">Pam Miller</div>
                               	 	<div class="speaker-title">Director, Infrastructure Channels Research, IDC</div>
                                </div>
                            </div>
                        </a>
                      </div>
                  </div>
                 
				  <!-- <div class="speaker grid-item grid-item5">
				  	<a href="<?php echo bloginfo('url'); ?>/speakers/#renee-bergeron">
					  	<div class="speaker-info">
						  	<div class="speaker-name">Ren&eacute;e Bergeron</div>
							<div class="speaker-title">VP, Ingram Micro</div>
						</div>
					</a>
				  </div> -->
				  <!-- <div class="speaker grid-item grid-item2">
				  	<a href="<?php echo bloginfo('url'); ?>/speakers/#nimesh-dave">
					  	<div class="speaker-info">
					  		<div class="speaker-name">Nimesh Dav&eacute;</div>
						  	<div class="speaker-title">Exec VP, Ingram Micro</div>
					  	</div>
				  	</a>
				  </div> -->
				  
				  <!--<div class="grid-item grid-item6 grid-item"></div>
				  <div class="speaker grid-item grid-item7">
				  	<a href="<?php echo bloginfo('url'); ?>/speakers">
					  	<div class="speaker-info">
					  		<div class="speaker-name">Melanie Posey</div>
						  	<div class="speaker-title">Research VP, Hosting &amp;<br />Managed Network Services</div>
					  	</div>
				  	</a>
				  </div>
				  
				  <div class="grid-item grid-item8"></div>
				  
				  <div class="speaker grid-item grid-item9">
				  	<a href="<?php echo bloginfo('url'); ?>/speakers">
					  	<div class="speaker-info">
					  		<div class="speaker-name">Jonathan Rosenberg</div>
						  	<div class="speaker-title">Vice President & CTO, Cisco</div>
					  	</div>
				  	</a>
				  </div>
				  
				  <div class="speaker grid-item grid-item10 grid-item">
				  	<a href="<?php echo bloginfo('url'); ?>/speakers">
					  	<div class="speaker-info">
					  		<div class="speaker-name">Serguei Beloussov</div>
						  	<div class="speaker-title">CEO, Acronis</div>
					  	</div>
				  	</a>
				  </div>
				  
				  <div class="speaker grid-item grid-item11 grid-item">
				  	<a href="<?php echo bloginfo('url'); ?>/speakers">
					  	<div class="speaker-info">
					  		<div class="speaker-name">Bill Karpovich</div>
						  	<div class="speaker-title">General Manager, IBM Cloud</div>
					  	</div>
				  	</a>
				  </div>
				  
				  <div class="speaker grid-item grid-item12 grid-item">
				  	<a href="<?php echo bloginfo('url'); ?>/speakers">
					  	<div class="speaker-info">
					  		<div class="speaker-name">Thomas Hansen</div>
						  	<div class="speaker-title">Vice President Sales, Dropbox</div>
					  	</div>
				  	</a>
				  </div>
				  
				  <div class="speaker grid-item grid-item13 grid-item">
				  	<a href="<?php echo bloginfo('url'); ?>/speakers">
					  	<div class="speaker-info">
						  	<div class="speaker-name">Darren Bibby</div>
							<div class="speaker-title">Program VP, Channels &amp;<br />Alliances Research</div>
					  	</div>
				  	</a>
				  </div>
				  <div class="grid-item grid-item14 grid-item"></div>-->
				  
				  
				  
				  <!--<div class="grid-item grid-item--width2 grid-item10"></div>-->
				  
				  <!--<div class="grid-item grid-item--width2 grid-item11"></div>-->
				
				</div>
				
				
			</div>
		</div>
	</section>
	
	<!--<section class="panel4">-->
	<!--	<div class="arrows">-->
	<!--			<div class="prev"><i class="fa fa-angle-left"></i></div>-->
	<!--			<div class="next"><i class="fa fa-angle-right"></i></div>-->
	<!--		</div>-->
	<!--	<div class="session-slider">-->
			
	<!--		<div class="slide-1-container">-->
	<!--		  <div class="slide-text">-->
	<!--		  	<h2>Summit Sessions</h2>-->
	<!--		  	<h3>Women of the Cloud</h3>-->
	<!--		  	<p>Join us for an open discussion about the role of women in technology and the cloud industry.</p>-->
	<!--		  	<a href="/agenda"><button class="btn btn-primary">Learn More</button></a>-->
	<!--		  </div>-->
	<!--		</div>-->
			
	<!--		<div class="slide-2-container">-->
	<!--		  <div class="slide-text">-->
	<!--		  	<h2>Summit Sessions</h2>-->
	<!--		  	<h3>Cloud University</h3>-->
	<!--		  	<p>To help the channel embrace the cloud, Ingram Micro offers Cloud University as a benefit to its resellers. Ingram Micro Cloud University is filled with educational offerings and practical business knowledge designed to support resellers as they transition to the cloud.</p>-->
	<!--		  	<a href="/agenda"><button class="btn btn-primary">Learn More</button></a>-->
	<!--		  </div>-->
	<!--		</div>-->
			
	<!--		<div class="slide-3-container">-->
	<!--		  <div class="slide-text">-->
	<!--		  	<h2>Summit Sessions</h2>-->
	<!--		  	<h3>Buzz Aldrins Life</h3>-->
	<!--		  	<p>How Buzz went to the moon and back and how that single event changed the course of technology and the world forever. To inifinity and beyond!</p>-->
	<!--		  	<button class="btn btn-primary">Learn More</button>-->
	<!--		  </div>-->
	<!--		</div>-->
			
	<!--	</div>-->
	<!--</section>-->
	
	<section class="panel4">
		<div>
			<div class="row">
				<div id="card1">
					<div class="title text-center">Sessions</div>
					<div class="content">
						<p>Expert instructors will lead tracks specifically designed to help you build success in the cloud, including:</p>
						<ul>
							<li>Transformational Leadership </li>
							<li>Innovation</li>
							<li>Education</li>
						</ul>
						<div class="learn-more-div">
							<a href="/sessions" class="btn btn-primary btn-lg learn-more-btn">Learn More</a>
						</div>
					</div>
				</div>
				<div id="card2">
					<div class="title text-center">Why Attend</div>
					<div class="content">
						<ul class="fa-ul">
							<li><i class="fa-li fa fa-check"></i>96% satisfaction rate</li>
							<li><i class="fa-li fa fa-check"></i>Connect with 1,500+ professionals</li>
							<li><i class="fa-li fa fa-check"></i>Hear from the industry's best technical visionaries</li>
							<li><i class="fa-li fa fa-check"></i>Explore the latest tools & technologies</li>
							<li><i class="fa-li fa fa-check"></i>Learn how to grow your business with cloud</li>
							<li><i class="fa-li fa fa-check"></i>100+ Educational Sessions</li>
						</ul>
						<div class="learn-more-div">
							<a href="/why-attend" class="btn btn-primary btn-lg learn-more-btn">Learn More</a>
						</div>
					</div>
				</div>
				<div id="card3">
					<div class="title text-center">Agenda</div>
					<div class="content">
						<p><strong>Wednesday, April 19 &mdash; <br>Saturday, April 22</strong></p>
						<p class="second-p">The 2017 agenda for Cloud Summit includes:</p>
						<ul>
							<li>Welcome Reception</li>
							<li>General Sessions</li>
							<li>Educational Track Sessions</li>
							<li>Final Night Party</li>
							<li>Golf Tournament</li>
						</ul>
						<div class="learn-more-div">
							<a href="/agenda" class="btn btn-primary btn-lg learn-more-btn">Learn More</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section class="panel5">
		<div class="arrows">
				<div class="prev1"><i class="fa fa-angle-left"></i></div>
				<div class="next1"><i class="fa fa-angle-right"></i></div>
			</div>
		<div class="container">
			
			
			<div class="row testimonial-slider">
			
			  <!--div>
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
			  </div-->
			  
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
			  		"Great to participate in the Ingram Micro Cloud Summit. Thanks to Nimesh Dav&eacute; and team for hosting #IngramCloudSummit"</div>
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
	
	<!--section class="panel6">
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
	</section-->

<?php endwhile; // End of the loop. ?>
</div>
<?php get_footer(); ?>
