<?php
/**
 * Template Name: LiveVault Mobile
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
get_header('livevault');
get_template_part('navigation_livevault');
?>
		
		
		
		<header class="jumbotron">
			<div class="container">
				<h1>A Unified, Cloud-Based Approach to Endpoint Data Management</h1>
			</div>
		</header>
		
		<section class="bg-primary">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-md-3 col-lg-3 col-lg-offset-1 text-center">
						<img src="<?php echo get_template_directory_uri(); ?>/img/page-livevault/livevault-mobile-blue.png" height="200" width="200" alt="LiveVault® Mobile" class="img-responsive">
						<h2 class="text-primary">LiveVault<sup>&reg;</sup><br>
						Mobile</h2>
						<br>
					</div>
					<div class="col-xs-12 col-md-9 col-lg-7">
						<h3 class="margin-top-0 text-primary">With LiveVault<sup>&reg;</sup> Mobile, offer your customers a comprehensive solution for backing up and protecting company data on laptops, smartphones and other endpoint devices — while empowering their employees with anywhere/anytime access to lost or corrupted data on our secure cloud.</h3>
						<p class="text-faded">LiveVault Mobile is infinitely scalable, growing to meet the needs of even your most demanding customers, while offering the highest  IT efficiency through simplified management. Using the powerful central management console, combined with its flexible client-deployment options, agents can be deployed at each endpoint, enabling all tasks across all devices to be controlled from this central location.</p>
						<p class="text-faded">And with LiveVault Mobile’s flexible licensing options and partner programs, you can find solutions that fit your customers’ needs and help you reach your revenue targets.</p>
						<h3 class="text-primary">With LiveVault Mobile, you can offer your customers:</h3>
						<ul class="text-faded">
							<li>Data protection for the mobile workforce</li>
							<li>OS migration and device refresh</li>
							<li>Prevention of data breach caused by consumerization of IT (BYOD)</li>
							<li>eDiscovery and data governance</li>
							<li>Anytime, anywhere access and easy collaboration</li>
							<li>Centralized admin from a unified interface</li>
							<li>Intuitive bandwidth, resource usage and scheduling settings</li>
						</ul>
					</div>
				</div>
			</div>
		</section>
		
		<section class="bg-dark-blue">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 text-center">
						<a class="btn btn-default btn-red btn-xl caps" title="Download the Datasheet" href="<?php bloginfo('url'); ?>/livevault-free-trial">Download the Datasheet <i class="ion-ios-arrow-forward"></i></a>
						&nbsp;
						<a class="btn btn-default btn-blue btn-xl caps" title="Get a free trial" href="<?php bloginfo('url'); ?>/livevault-free-trial">Get a free trial <i class="ion-ios-arrow-forward"></i></a>
					</div>
				</div>
			</div>
		</section>
		
		<?php get_footer('livevault'); ?>
