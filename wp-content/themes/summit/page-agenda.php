<?php
/**
 * Template Name: Agenda
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
					<h2 style="display: none;"><?php the_title();?></h2>
					<h2 style="display: inline-block;">Agenda at a Glance</h2>
					<p style="margin-top: 6px; font-size:smaller;"><em>*Subject to change.</em></p>
					<div class="pull-right">
						<a href="https://cloudsummit2017.sched.com/print/all" target="_blank"><button class="btn btn-info sched-agenda">See the full agenda</button></a>
					</div>	
					</div>
					<div id="agenda_register_now" class="text-center">
						<a href="http://www.cvent.com/d/nvq9qb/4W" target="_blank" class="btn btn-outline-gray" role="button">REGISTER NOW</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section class="agenda-panel3">
		<div class="container">
		  <div class="row">
		    <div class="col-md-3" >
		      <div class="box" id="box_one">
		        <div class="title">
		          <div class="day">WEDNESDAY</div>
		          <div class="date">April 19<sup>th</sup></div>
		        </div>
		        <div class="content">
		          <table class="table-striped table-hover">
		            <tr><td class="time-col">9:00am -<br />5:30pm</td><td class="event-col"><a href="http://ingrammicrocloudsummit.com/aps-partner-connect/" target="_blank">APS Partner Connect</a></td></tr>
		             <tr><td class="time-col">3:00pm -<br />6:30pm</td><td class="event-col">Check-In & Info</td></tr>
		            
		            <tr><td class="time-col">6:00pm -<br />9:00pm</td><td class="event-col">Welcome Reception <a title="Welcome Reception<hr>Kick off your Cloud Summit 2017 experience by joining us for cocktails, food and networking under the Arizona sky." rel="tooltip"><i class="fa fa-info-circle"></i></a></td></tr>
		          </table>
		        </div>
		      </div>
		    </div>
		    <div class="col-md-3">
			<div class="box" id="box_two">
		    	<div class="title">
		    		<div class="day">THURSDAY</div>
		    		<div class="date">April 20<sup>th</sup></div>
		    	</div>
		    	<div class="content">
		    		<table class="table-striped table-hover">
						<!--<tr><th>Time</th><th>Event</th></tr>-->
						<tr><td class="time-col">7:00am -<br />6:30pm</td><td class="event-col">Check-In & Info</td></tr>
						<tr><td class="time-col">8:00am -<br />12:00pm</td><td class="event-col"><strong>General Session</strong> <a title="General Session<hr>Participate in this extraordinary opportunity to hear thought-provoking and motivational presentations from leaders in the cloud industry and successful entrepreneurs." rel="tooltip"><i class="fa fa-info-circle"></i></a><br />Ren&eacute;e Bergeron, SVP, Global Cloud Channel, Ingram Micro<br><br>Marc Randolph, Co-Founder and Former CEO Netflix and Co-Founder of Looker Data Sciences</td></tr>
						<tr><td class="time-col">12:00pm -<br />12:50pm</td><td class="event-col">Lunch </td></tr>
						<tr><td class="time-col">1:00pm -<br />5:10pm</td><td class="event-col"><strong>Breakout Sessions</strong> <a title="Business Transformation<hr>Learn business transformation strategies and best practices from leaders in the cloud industry. Topics include Selling Cloud, Marketing Cloud, Cloud Programs and Cloud Strategy." rel="tooltip"><i class="fa fa-info-circle"></i></a></td></tr>
						<tr><td class="time-col">5:15pm</td><td class="event-col">Solutions Showcase <a title="Solutions Showcase<hr>Meet with vendors and experience product demonstrations while discussing their newest solutions and services." rel="tooltip"><i class="fa fa-info-circle"></i></a></td></tr>
					</table>
		    	</div>
		    </div>
			</div>
		    <div class="col-md-3">
		    	<div class="box" id="box_three">
			    	<div class="title">
			    		<div class="day">FRIDAY</div>
			    		<div class="date">April 21<sup>st</sup></div>
			    	</div>
			    	<div class="content">
			    		<table class="table-striped table-hover">
							<!--<tr><th>Time</th><th>Event</th></tr>-->
							<tr><td class="time-col">7:00am -<br />6:30pm</td><td class="event-col">Check-In & Info</td></tr>
							<tr><td class="time-col">8:00am -<br />12:00pm</td><td class="event-col"><strong>General Session</strong> <a title="General Session<hr>Participate in this extraordinary opportunity to hear thought-provoking and motivational presentations from leaders in the cloud industry and successful entrepreneurs." rel="tooltip"><i class="fa fa-info-circle"></i></a><br />Nimesh Dav&eacute;, EVP, Global Cloud, Ingram Micro <br><br>Pam Miller, Director, Infrastructure Channels Research, IDC.<br><br>Jim McKelvey, Co-Founder of Square and Founder of LaunchCode</td></tr>
							<tr><td class="time-col">12:00pm -<br />1:45pm</td><td class="event-col">Lunch & Solutions Showcase <a title="Solutions Showcase<hr>While enjoying lunch, you can experience vendor product demonstrations and discuss their newest solutions and services." rel="tooltip"><i class="fa fa-info-circle"></i></a></td></tr>
							<tr><td class="time-col">1:50pm -<br />5:10pm</td><td class="event-col"><strong>Breakout Sessions</strong> <a title="Business Transformation<hr>Learn business transformation strategies and best practices from leaders in the cloud industry. Topics include Selling Cloud, Marketing Cloud, Cloud Programs and Cloud Strategy." rel="tooltip"><i class="fa fa-info-circle"></i></a></td></tr>
							<tr style="height: 143px;"><td class="time-col">7:00pm -<br />10:00pm</td><td class="event-col"><strong>Closing Reception & Dinner</strong> <a title="Closing Reception & Dinner<hr>Join us for this high-energy Cloud Summit 2017 celebration as we enjoy cocktails, food, music and networking opportunities." rel="tooltip"><i class="fa fa-info-circle"></i></a></td></tr>
						</table>
			    	</div>
		    	</div>
		    </div>
			<div class="col-md-3">
		    	<div id="box_four" class="box">
			    	<div class="title">
			    		<div class="day">SATURDAY</div>
			    		<div class="date">April 22<sup>nd</sup></div>
			    	</div>
			    	<div class="content">
			    		<table class="table-striped table-hover">							
							<tr><td class="time-col">6:30 am</td><td class="event-col">Golf Breakfast</td></tr>
							<tr><td class="time-col">7:00 am</td><td class="event-col">Tee Off</td></tr>
							<tr><td class="time-col">12:30 pm</td><td class="event-col"> Golf Lunch</td></tr>							
						</table>
			    	</div>
		    	</div>
		    </div>
		  </div>
		</div>
		
	</section>


<?php endwhile; // End of the loop. ?>

<script type="text/javascript">
// $(window).load(function() {
// 	var = current_height;
// 	current_height = ("#box_two").height();
// 	console.log(current_height);
// 	console.log("Hello");
// }
</script>

<?php get_footer(); ?>
