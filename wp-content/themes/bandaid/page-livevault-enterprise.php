<?php
/**
 * Template Name: LiveVault Enterprise
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
				<h1>Secure Cloud and Hybrid-Cloud Data Protection for Your Customers</h1>
			</div>
		</header>
		
		<section class="bg-primary">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-md-3 col-lg-3 col-lg-offset-1 text-center">
						<img src="<?php echo get_template_directory_uri(); ?>/img/page-livevault/livevault-enterprise-blue.png" height="200" width="200" alt="LiveVault® Enterprise" class="img-responsive">
						<h2 class="text-primary">LiveVault<sup>&reg;</sup><br>
						Enterprise</h2>
						<br>
					</div>
					<div class="col-xs-12 col-md-9 col-lg-7">
						<h3 class="margin-top-0 text-primary">LiveVault<sup>&reg;</sup> Enterprise allows you to provide your customers an automated and continuous backup, with protection intervals as frequent as every fifteen minutes, ensuring data is protected as created.</h3>
						<p class="text-faded">LiveVault delivers fully automated backup over the Internet or a private network connection for uninterrupted remote data protection. Data is moved offsite to secure, mirrored data centers and is completely secure and protected at every step of the way using stringent procedures, protocols, and standards. LiveVault encrypts all data at the source using 256-bit AES encryption with a unique private/public key pair. For an additional layer of protection, LiveVault uses the Secure Sockets Layer (SSL) protocol to establish a secure, resilient communication tunnel to offsite data centers.</p>
						<p class="text-faded">Recovery is simple and straightforward. Organizations can select which data to recover from a catalog of archived file versions, and LiveVault automatically restores the data to the location of your choice. LiveVault uses the cloud to automatically transfer data offsite for disaster recovery. Data is backed up off-premise (optionally to an on-premise, hybrid-cloud device) shortly after being updated, allowing you to restore data from moments before a disaster occurs.</p>
						<h3 class="text-primary">With LiveVault Enterprise, you can offer your customers:</h3>
						<ul class="text-faded">
							<li>Easy-to-use, automatic, secure, and reliable server cloud-based data protection</li>
							<li>Managed service with administration, monitoring, and proactive notification</li>
							<li>Flexible and long-term data retention options — from 14 days to 10 years</li>
							<li>Virtualized environment support</li>
							<li>VMware vSphere support, VADP integrated cloud backup</li>
							<li>Fast and easy recovery with DeltaRestore&trade;</li>
							<li>Native, embedded storage optimization</li>
							<li>Hybrid-cloud onsite TurboRestore Appliance (sold separately)</li>
							<li>Application support for Microsoft Exchange and Microsoft SQL Server</li>
							<li>Data shuttle service for seeding and large data restores (sold separately)</li>
							<li>Legal hold supportZ</li>
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
