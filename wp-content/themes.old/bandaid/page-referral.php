<?php
/**
 * Template Name: Referral
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

	<div id="cloud-store" class="platform-page">
		<section id="panel-header">
			<div class="container">
				<div class="row">
					<div id="left-column" class="col-md-3 col-sm-3 text-center">
						<img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/icons/platforms/referral.png"></img>
						<h1>
							<span class="platform">Cloud Referral Program</span>
						</h1>
					</div>
					<div id="right-column" class="col-md-9 col-sm-9">
						<p>The fastest and easiest entry to the Cloud service market is finally at your fingertips. The Ingram Micro Cloud Referral Program is a platform designed to provide your organization with a profitable and convenient solution to direct end-customers to Ingram Micro's referral website to make purchases, while you simply earn commissions. As a lucrative replacement to the Microsoft Advisor Program, scheduled to end soon, the Cloud Referral Program offers a quick and uncomplicated solution to access the growing opportunities within the Cloud service market, allowing partners to maintain or even increase earned commissions on products like Office 365.</p>
						<br />
						<a href="/become-a-partner" style="margin-right: 20px;"><button class="btn btn-outline-gray">Join Cloud Referral Program</button></a>
					</div>
				</div>
			</div>
		</section>
		<div class="container">
			<div class="row">
				<div id="main-content" class="col-md-9 col-sm-12">
					<section id="panel-1" class="row">
						<div class="col-md-5 col-sm-5">
							<img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/page-referral/microsoft.jpg"></img>
						</div>
						<div class="col-md-7 col-sm-7">
							<h2 class="blue-heading"><strong>The Logical Alternative to the Expiring Microsoft Advisor Program</strong></h2>
							<p>Microsoft is no longer paying incentives to partners for new subscriptions, and by June 2017 all existing Advisor partner incentives will also be eliminated. Now is the time to move your Microsoft Advisor subscriptions to the Cloud Referral Program. Ingram Micro has white glove services to help you transition quickly and seamlessly.</p>
							<br />
							<a class="a-no-underline" href="<?php echo get_template_directory_uri(); ?>/uploads/page-referral/" target="_blank"><button class="btn btn-outline-gray center-block">Download Datasheet</button></a>
						</div>
					</section>
					<section id="panel-2">
						<h2 class="blue-heading"><strong>3 Easy Steps to Get You Started</strong></h2>
						<div id="icons" class="row text-center">
							<div class="col-md-3 col-sm-3">
								<img src="<?php echo get_template_directory_uri(); ?>/img/page-referral/globe.png" class="img-responsive"/>
								<p>
									<span class="steps"><strong>Step 1</strong></span><br />
									Utilize a unique URL OR  place a web banner ad on your website
								</p>
							</div>
							<div class="col-md-3 col-sm-3">
								<img src="<?php echo get_template_directory_uri(); ?>/img/page-referral/cart.png" class="img-responsive"/>
								<p>
									<span class="steps"><strong>Step 2</strong></span><br />
									Referral client makes a purchase
								</p>
							</div>
							<div class="col-md-3 col-sm-3">
								<img src="<?php echo get_template_directory_uri(); ?>/img/page-referral/cash.png" class="img-responsive"/>
								<p>
									<span class="steps"><strong>Step 3</strong></span><br />
									You earn commissions
								</p>
							</div>
						</div>
						<p style="margin-top: 20px;">After registering, simply add a provided web banner or unique ecommerce URL to your website. These will link directly to your business' Ingram Micro Marketplace where customers can make purchases. We'll handle the rest, and enable you to track commissions without any set up costs, billing or onboarding required.</p>
					</section>
					<section id="panel-3">
						<h2 class="blue-heading"><strong>Scale Your Business with Zero Investment</strong></h2>
						<p>Ingram Micro provides you with the tools and resourcesto transform your business with Cloud. From billing and invoicing, payment collections, and expert customer support, Ingram Micro handles it all, while you focus on business growth. The result is higher earnings as you earn Ingram Micro commissions, and incentive rebates from the Microsoft CSP Program, simultaneously. With a user-friendly portal that allows you to manage and track earnings, navigate through customer orders, and calculate payouts, you are always in the know, and in control.</p>
						<p><strong>Ready To Get Started?</strong></p>
						<a href="/become-a-partner" style="margin-right: 20px;"><button class="btn btn-outline-gray">Apply To Become a Cloud Referral Partner</button></a>
						<a href="mailto:cloud@ingrammicro.com"><button class="btn btn-outline-gray">Contact us for more information</button></a>
					</section>
				</div>
				<div class="col-md-3 col-sm-12">
					<?php echo get_sidebar('platforms'); ?>
				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>