<?php
/**
 * Template Name: LiveVault Classic
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
				<h1>Multiplatform Cloud Backup and Restore Solutions for Your Customer</h1>
			</div>
		</header>
		
		<section class="bg-primary">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-md-3 col-lg-3 col-lg-offset-1 text-center">
						<img src="<?php echo get_template_directory_uri(); ?>/img/page-livevault/livevault-classic-blue.png" height="200" width="200" alt="LiveVault® Classic" class="img-responsive">
						<h2 class="text-primary">LiveVault<sup>&reg;</sup><br>
						Classic</h2>
						<br>
					</div>
					<div class="col-xs-12 col-md-9 col-lg-7">
						<h3 class="margin-top-0 text-primary">With LiveVault<sup>&reg;</sup> Classic you can offer your customers one of the industry’s most secure, efficient and reliable solutions for backing up their data organization-wide — automatically and continuously.</h3>
						<p class="text-faded">A simple web browser can be used to configure and easily update your customers’ desired backup policies and to monitor their data 24/7.</p>
						<p class="text-faded">With LiveVault’s flexible retention options and tiers of service, you can customize the right cloud backup and restore strategy to meet each customer’s needs.</p>
						<h3 class="text-primary">With LiveVault Classic, your portfolio includes:</h3>
						<ul class="text-faded">
							<li>Multiplatform, business-class cloud backup solution</li>
							<li>Secure, reliable protection in state-of-the-art data centers</li>
							<li>Bare-metal backup and restore plugin</li>
							<li>Scalable, automatic data protection</li>
							<li>Easy centralized management</li>
							<li>Regulatory compliance</li>
							<li>Granular-level data restore for VMware and Hyper-V environments</li>
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
