<?php
/**
 * Template Name: LiveVault
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


		<header id="first">
			<div class="header-content">
				<div class="inner">
					<h1>LiveVault<sup>&trade;</sup> Cloud Backup Solutions and Partner Program</h1>
				</div>
			</div>
			<div id="video-container">
				<video autoplay loop class="fillWidth fadeIn wow collapse in" data-wow-delay="0.5s" poster="<?php echo get_template_directory_uri(); ?>/img/page-livevault/1845043.jpg" id="video-background">
					<source src="<?php echo get_template_directory_uri(); ?>/img/page-livevault/1845043.mp4" type="video/mp4">
					Your browser does not support the video tag. I suggest you upgrade your browser.
				</video>
			</div>
		</header>

		<section class="bg-primary" id="one">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-lg-offset-0 col-md-8 col-md-offset-2 text-center">
						<h2 class="margin-top-0 text-primary">LiveVault<sup>&reg;</sup> offers a suite of solutions to cover every cloud backup need:<br>
						from virtual or physical servers though to laptops and mobile devices</h2>
						<br>
						<div class="col-lg-8 col-lg-offset-2">
							<p class="text-faded">Resellers choose an individual solution from LiveVault’s product suite or bundle solutions to create their own service offering for their customers.</p>
							<p class="text-faded">Ingram Micro resellers confidently offer mission-critical cloud backup solutions knowing they have access to LiveVault’s 24x7 Technical Support and world-class infrastructure, backed by personalized Partner Sales and Account Management.</p>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section id="two" class="bg-dark-blue">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-center">
						<h2 class="margin-top-0 text-primary">Comprehensive Suite of Cloud Backup Solutions</h2>
						<hr class="primary">
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-4 text-center">
						<div class="feature">
							<img src="<?php echo get_template_directory_uri(); ?>/img/page-livevault/livevault-enterprise.png" height="150" width="150" alt="LiveVault® Enterprise" class="img-responsive">
							<h3 class="text-primary">LiveVault<sup>&reg;</sup> Enterprise</h3>
							<hr class="primary">
							<p class="text-faded">This complete cloud backup platform offers the industry’s most flexible and long-term retention options, allowing resellers to create a customized backup strategy for even the most demanding customers.</p>
							<p class="text-faded">LiveVault Enterprise can be provisioned in both physical and virtual environments as a cloud-only solution or as a hybrid cloud/local backup using LiveVault’s onsite Turbo Restore Appliances (TRA).</p>
							<p><a href="<?php bloginfo('url'); ?>/livevault-enterprise" class="btn btn-default btn-sm wow flipInX">Learn More <i class="ion-ios-arrow-forward"></i></a></p>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 text-center">
						<div class="feature">
							<img src="<?php echo get_template_directory_uri(); ?>/img/page-livevault/livevault-classic.png" height="150" width="150" alt="LiveVault® Enterprise" class="img-responsive">
							<h3 class="text-primary">LiveVault<sup>&reg;</sup> Classic</h3>
							<hr class="primary">
							<p class="text-faded">LiveVault Classic offers resellers a cloud backup solution to unify data protection across their entire customer base — no matter how diverse or unique the operating systems or applications their customers need to backup from both physical and virtual environments.</p>
							<p><a href="<?php bloginfo('url'); ?>/livevault-classic" class="btn btn-default btn-sm wow flipInX">Learn More <i class="ion-ios-arrow-forward"></i></a></p>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 text-center">
						<div class="feature">
							<img src="<?php echo get_template_directory_uri(); ?>/img/page-livevault/livevault-mobile.png" height="150" width="150" alt="LiveVault® Enterprise" class="img-responsive">
							<h3 class="text-primary">LiveVault<sup>&reg;</sup> Mobile</h3>
							<hr class="primary">
							<p class="text-faded">LiveVault Mobile is one of the industry’s most comprehensive endpoint protection products. This allows resellers the ability to both backup and secure data for their customer’s mobile fleet of laptops, tablets and smart devices.</p>
							<p class="text-faded">Sensitive data can be recovered from the cloud or remotely deleted from devices if stolen or lost.</p>
							<p><a href="<?php bloginfo('url'); ?>/livevault-mobile" class="btn btn-default btn-sm wow flipInX">Learn More <i class="ion-ios-arrow-forward"></i></a></p>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section id="three" class="bg-dark">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-6 text-center">
						<div class="feature"> <i class="icon-lg ion-ios-world-outline wow fadeIn" data-wow-delay=".3s"></i>
							<h3>Robust Network Infrastructure</h3>
							<p class="text-faded">LiveVault offers resellers access to a robust and geographically diverse network with state-of-the-art, highly secure data centers across North America and Europe.</p>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 text-center">
						<div class="feature"> <i class="icon-lg ion-ios-settings fadeIn" data-wow-delay=".3s"></i>
							<h3>Lucrative Partner Programs</h3>
							<p class="text-faded">The LiveVault partner program allows resellers to purchase online backup services at a wholesale rate — with the flexibility to establish your own pricing and margin levels for your customers.</p>
							<p class="text-faded">LiveVault provides an easy-to-use reseller portal for customer activation, marketing, reporting, billing, and support for all of our reseller partners.</p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section id="last" class="bg-primary">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 text-center">
						<a class="btn btn-default btn-blue btn-xl caps" title="Get a free trial" href="<?php bloginfo('url'); ?>/livevault-free-trial">Get a free trial <i class="ion-ios-arrow-forward"></i></a>
					</div>
				</div>
			</div>
		</section>
	<?php get_footer('livevault'); ?>
