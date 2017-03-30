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
						<a href="<?php echo get_bloginfo('url'); ?>"><img class="img-responsive" src="/wp-content/uploads/2016/11/cloud-summit-2017-logo2.png"></img></a>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section class="panel2">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="left-border">
					<h2><?php the_title();?></h2>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="sessions-panel3">
		<div class="container sessions-main">
			<div class="row">
				<div class="col-md-6">
					<h3></h3>
					<p id="session_para_one">All sessions are delivered by leaders in the cloud <br> industry, subject matter experts and vendor partners,<br> providing attendees with real-world experiences and<br> best practices to help transform their business.</p>
					<div id="sessions_register_now" class="text-center">
						<a href="http://www.cvent.com/d/3fqj0t/8C?ct=b352e06e-1055-4907-9c5c-a2c67385b62d&amp;RefID=Attendee" target="_blank" class="btn btn-outline-gray" role="button">REGISTER NOW</a>
					</div>
				</div>
				<div class="col-md-6">
					<h3 class="title">100+ Breakout Sessions</h3>
					<p>The Summit features various levels of breakout sessions so whether you are a president/CEO, CTO, CIO, product manager/product head, cloud strategist, business development manager, operations executive—you’ll be sure to find numerous options based on for your  level of cloud knowledge and expertise. Whether you’re preparing to sell cloud solutions or you have an established business you’re looking to grow, Cloud Summit has the widest range of informative sessions to help you transform your cloud business.</p>
				</div>
			</div>
		</div>
	</section>

	
	<section class="sessions panel5">
		<div class="container track-descriptions">
			<div class="row">
				<div class="col-md-12">
					<h3 class="title">Track Descriptions</h3>
					<br />
					<div class="row">
						<div class="col-md-6">
							<h5>Transformational Leadership</h5>							<p>
								<ul class="mobile-ul-margin">
									<li>Leave the hype behind and move beyond buzzwords</li>
									<li>Find out how to lead change through disruption and leverage the evolving cloud opportunity in highly focused sessions</li>
									<li>Gain insight on becoming a change agent in your company to drive new levels of success</li>
								</ul>
							</p>
						</div>
						<div class="col-md-6">
							<h5>Innovation</h5>
							<p>
								<ul class="mobile-ul-margin">
									<li>Witness real-world examples of what innovation means to enterprise buyers</li>
									<li>Focus on case studies, industry trends, best practices and innovation</li>
									<li>Learn how to push the envelope as well as gain insight on strengthening and evolving your business</li>
								</ul>
							</p>
						</div>
					</div>
					<br />
					<div class="row">
						<div class="col-md-6">
							<h5>Education</h5>
							<p>
								<ul class="mobile-ul-margin">
									<li>Learn why cloud is the fastest-growing segment of the technology market</li>
									<li>Acquire valuable knowledge on the latest tools and technologies in the Ingram Micro Cloud Marketplace</li>
									<li>See how you can automate and transform productivity while reducing time-to-market</li>
								</ul>
							</p>
						</div>
						<div class="col-md-6">
							<h5>General Session</h5>
							<ul class="mobile-ul-margin">
							<li>Find out what's in store for the future of Ingram Micro Cloud and learn about our holistic ecosystem approach to simplifying our partner’s success</li>
							<li>Participate in an extraordinary opportunity to hear thought-provoking and motivational presentations from leaders in the cloud industry</li>
							<li>Hear from accomplished technology disruptors and gain insight into what drives success in the industry</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
<?php endwhile; // End of the loop. ?>

<?php get_footer(); ?>
