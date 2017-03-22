<?php
/**
 * Template Name: Odin Automation Premium
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

get_header(); ?>

	<div id="odin-automation-premium" class="platform-page">
		<section id="panel-header">
			<div class="container">
				<div class="row">
					<div id="left-column" class="col-md-3 col-sm-3 text-center">
						<img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/icons/platforms/oap.png"></img>
						<h1>
							<span class="platform">Odin Automation Premium</span>
						</h1>
					</div>
					<div id="right-column" class="col-md-9 col-sm-9">
						<p>Odin Automation Premium is the leading automation platform for modern Cloud commerce that empowers top Cloud service providers worldwide to succeed in the digital and Cloud economy.The platform enables you to elevate customer relationships, run more efficient Cloud businesses, and sell more services with innovative scenarios through its advanced, contemporary user experience.</p>
						<br />
						<a href="/become-a-partner"><button class="btn btn-outline-gray">Become a Partner</button></a>
					</div>
				</div>
			</div>
		</section>
		<div class="container">
			<div class="row">
				<div id="main-content" class="col-md-9 col-sm-12">
					<section id="panel-1">
						<h2 class="blue-heading"><strong>Accelerate, Profit, and Scale with the Modern Cloud Commerce Platform</strong></h2>
						<p>Odin Automation Premium automates all aspects of Cloud services management, including service orchestration, Cloud marketplace enablement, billing automation, and reseller management in one platform. Bring new services to market rapidly by leveraging the most complete ecosystem of hundreds of platform ready services, and sell integrated Cloud solutions across multi-sales channels–online marketplace, multi-tier reseller, direct or inbound sales team, and more.</p>
					</section>
					<section id="panel-2">
						<h2 class="blue-heading"><strong>Expand Your Portfoliowith the Most Comprehensive Services Catalog</strong></h2>
						<p>Select and sell from a leading catalog of hundreds of solutions powered by one of the largest ISV ecosystems. Support end-to-end business models, including the delivery of hosted, syndicated, and hybrid cloud solutions. Take advantage of the best Microsoft services portfolio empowering more than 2.3 million Office 365 and Hosted Exchange users. Our Application Packaging Standard (APS) offers the industry's most popular open standard for packaging cloud services, and makes deployment faster and easier.</p>
					</section>
					<section id="panel-3">
						<h2 class="blue-heading"><strong>Trusted by the World's Leading Cloud Service Providers</strong></h2>
						<p>Odin Automation Premium – an Ingram Micro Cloud platform – delivers the relationships, infrastructure and expertise that simplifies the success of partners in the Cloud. Together, Ingram Micro and Odin enable our partners to thrive by lifting their customers' businesses to the Cloud with the power of Ingram Micro's Ecosystem of Cloud.</p>
						<br />
						<img class="img-responsive center-block" src="<?php echo get_template_directory_uri(); ?>/img/page-oap/logos.png"></img>
						<div id="blocks" class="row">
							<div class="col-md-2 col-sm-2">
								<div class="block">
									<div class="red-text">5M+</div>
									<div class="gray-text">Over 5 million end users worldwide</div>
								</div>
							</div>
							<div class="col-md-2 col-sm-2">
								<div class="block">
									<div class="red-text">2.7M+</div>
									<div class="gray-text">Serving more than 2.7 million SMBs</div>
								</div>
							</div>
							<div class="col-md-2 col-sm-2">
								<div class="block">
									<div class="red-text">2.3M+</div>
									<div class="gray-text">Exchange and Office 365 users</div>
								</div>
							</div>
							<div class="col-md-2 col-sm-2">
								<div class="block">
									<div class="red-text">100's</div>
									<div class="gray-text">Pre-packaged APS solutions in APS ecosystem</div>
								</div>
							</div>
							<div class="col-md-2 col-sm-2">
								<div class="block">
									<div class="red-text">1/3</div>
									<div class="gray-text">1/3 of World's top 25 Telcos</div>
								</div>
							</div>
						</div>
						<br />
						<a class="a-no-underline" href="http://www.odin.com/products/premium/" target="_blank"><button class="btn btn-outline-gray center-block">Learn more</button></a>
					</section>
				</div>
				<div class="col-md-3 col-sm-12">
					<?php echo get_sidebar('platforms'); ?>
				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>