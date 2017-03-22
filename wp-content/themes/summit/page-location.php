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

	<section class="sub-panel1 location">
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
					<h2>Event <?php the_title();?></h2>
					<h3>JW Marriott Desert Ridge Resort & Spa</h3>
					<p>	<strong>5350 E Marriott Dr, Phoenix, AZ 85054</strong> <br>
					<a href="tel:4802935000">Tel: (480) 293-5000</a></p>
					</div>
				</div>
				<div class="col-sm-6">
					
				</div>
			</div>
		</div>
	</section>
	
	<section class="location-panel3">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<img class="img-responsive" src="<?php echo bloginfo('template_url'); ?>/img/hotel-slim.jpg"></img>
				</div>
				<div class="col-sm-6">
					<img class="img-responsive" src="<?php echo bloginfo('template_url'); ?>/img/golf-1.jpg"></img>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-sm-4">
					<img class="img-responsive" src="<?php echo bloginfo('template_url'); ?>/img/patio.jpg"></img>
				</div>
				<div class="col-sm-4">
					<img class="img-responsive" src="<?php echo bloginfo('template_url'); ?>/img/cabana.jpg"></img>
				</div>
				<div class="col-sm-4">
					<img class="img-responsive" src="<?php echo bloginfo('template_url'); ?>/img/theatre.jpg"></img>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-sm-6">
					<a class="" target="_blank" href="<?php echo bloginfo('template_url'); ?>/img/event-location-map2.jpg">
						<img class="img-responsive" src="<?php echo bloginfo('template_url'); ?>/img/event-location-map.jpg"></img>
					</a>
				</div>
				<div class="col-sm-6">
					<a class="" target="_blank" href="<?php echo bloginfo('template_url'); ?>/img/resort-map2.jpg">
						<img class="img-responsive" src="<?php echo bloginfo('template_url'); ?>/img/resort-map.jpg"></img>
					</a>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-sm-12">
					<h3>Registration; Hotel Questions or Changes to your Reservation</h3>
					<p><strong>Ingram Micro Registration Headquarters</strong> <br>
					Toll-free: <a href="tel:1-866-400-0310">1-866-400-0310</a><br>
					Outside the U.S.: <a href="tel:1-312-396-2100">1-312-396-2100</a><br>
					E-mail: <a href="mailto:CloudSummit@bcdme.com">CloudSummit@bcdme.com</a><br>
					Hours of Operation: 08:00 AM – 06:00 PM C.S.T. (Monday - Friday)</p>
					<p>Through your online registration, you will be able to indicate your housing requirements. <strong>Please do not contact the hotel directly.</strong></p>
					<hr>
					<h3>Hotel Extension Information</h3>
					<p>If you require arrangements for additional nights you will be able to indicate that during the registration process. In order to guarantee your hotel extension request you will be required to enter valid credit card information. All costs associated with your extension will be at your personal expense.  You will need to present your credit card at check-in to the hotel.</p>
					<p>All requests must be confirmed by the hotel and are based on availability. Once the hotel confirms your extension, you will receive an updated registration confirmation via e-mail from Ingram Micro Registration Headquarters.</p>
					<hr>
					<h3>Early Departure Fee</h3>
					<p>An early departure fee of one night’s room and tax will apply, if you check out prior to your confirmed check-out date.</p>
					<hr>
					<h3>Cancellation Policies, Fees & Deadlines</h3>
					<p><strong>Event Registration:</strong> You may cancel your registration through March 11, 2016 without penalty. Cancellation after that date will incur a $299 registration cancellation fee. All cancellation requests must be submitted in writing, via e-mail to cloudsummit@bcdme.com. Canceling your event registration does not automatically cancel any hotel payment obligations.</p>
					<p><strong>Hotel:</strong> In order to avoid a one night room and tax charge, hotel reservation cancellations must be communicated to Ingram Micro Registration Headquarters by  March 11, 2016. All cancellation requests must be submitted in writing, via e-mail to cloudsummit@bcdme.com (Cancellations cannot be made and will not be accepted through your Ingram Micro Sales representative). Any applicable hotel cancellation charges will be billed by the hotel directly to the credit card you provide during the registration process. Cancelling your hotel registration does not automatically cancel any event registration payment obligations.</p>
					<p><strong>No Show Policy:</strong> In the event you do not cancel your event registration and do not attend the event, you will incur a $299 no-show fee (regardless of whether or not you reserved a hotel room). Any applicable hotel cancellation charges will be billed by the hotel directly to the credit card you provide during the registration process.</p>
					<hr>
					<h3>Air Accommodations</h3>
					<p>You are responsible for making your own travel arrangements to Phoenix AZ. Air travelers should fly into the Phoenix Sky Harbor Airport.</p>
					<hr>
					<h3>Ground Transportation</h3>
					<p>Transportation between the airport and hotel is on your own.</p>
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
