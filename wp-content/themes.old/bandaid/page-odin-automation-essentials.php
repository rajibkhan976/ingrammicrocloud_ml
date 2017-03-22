<?php
/**
 * Template Name: Odin Automation Essentials
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
						<img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/icons/platforms/oae.png"></img>
						<h1>
							<span class="platform">Odin Automation Essentials</span>
						</h1>
					</div>
					<div id="right-column" class="col-md-9 col-sm-9">
						<p>Building a scalable and successful cloud practice can be a complex and challenging due to the inefficiencies and high costs of manual-based processes commonly associated with the purchase, resell and provisioning of cloud technology.  Until now.  Introducing Ingram Micro’s Odin Automation Essentials Cloud Provider Edition, a preconfigured, self-branded web store and service automation platform that automates the end-to-end delivery of Microsoft 1-Tier CSP services and related product offerings.</p>
						<br />
						<a href="#video" rel="modal:open"><button class="btn btn-outline-gray">Watch Video</button></a>
					</div>
				</div>
			</div>
			<div class="hidden">
				<div id="video" class="modal">
					<iframe width="1180" height="664" src="https://www.youtube.com/embed/hncRUBaR7HA" frameborder="0" allowfullscreen></iframe>
				</div>
			</div>
		</section>
		<div class="container">
			<div class="row">
				<div id="main-content" class="col-md-9 col-sm-12">
					<section id="panel-1" class="row">
						<div class="col-md-5 col-sm-5">
							<img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/page-oae/screenshot.png"></img>
						</div>
						<div class="col-md-7 col-sm-7">
							<h2 class="blue-heading"><strong>Scale Your Cloud Service Delivery</strong></h2>
							<p>Odin Automation Essentials automates the work previously done by hiring developers, system managers, and ecommerce and billing specialists.  Through automation, you’ll now be able to achieve more with less by focusing your limited bandwidth and resources on customer service, marketing, and business development rather than building and maintaining a costly infrastructure.  Maximize every business opportunity by managing all stages of the customer lifecycle including order management, provisioning, billing, and end-to-end processes of cloud service delivery with a streamlined, scalable end user experience that delivers one login, one bill, and self-service control panels.</p>
							<br />
							<a class="a-no-underline" href="<?php echo get_template_directory_uri(); ?>/uploads/page-odin-automation-essentials/IM-Odin%20Essentials-Datasheet-16-10-06_Published.pdf" target="_blank"><button class="btn btn-outline-gray center-block">Download Datasheet</button></a>
						</div>
					</section>
					<section id="panel-2" class="row">
						<div class="col-md-5 col-sm-5"><!--//placehold.it/300x300-->
							<img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/page-oae/financial-chart-with-hand.png"></img>
						</div>
						<div class="col-md-7 col-sm-7">
							<h3 class="blue-heading"><strong>Create New Revenue Opportunities</strong></h3>
							<p>Customers continue to demand new SaaS offerings to help them drive greater productivity and attract new customers. With the flexibility of Odin Automation Essentials, you’ll be able to generate additional revenue by bundling Microsoft Cloud Services with your own professional services, all on the same platform.  This will enable you to expand and add products and services as your clients demand them, such as email migration, support, file sharing and collaboration, security, as well as dedicated servers and ISP services.  Leverage the revolutionary end customer control panel toeasily upsell and cross sell services without expensive acquisition costs.</p>
						</div>
					</section>
					<section id="panel-3">
						<h4 class="blue-heading"><strong>Go To Market Faster</strong></h4>
						<p>Bypass the costs, challenges and extended timelines traditionally required to enter Microsoft CSP markets.  Odin Automation Essentials is equipped with Microsoft Cloud Services ready for sale out of the box using existing contracts. Other features include automated billing, invoicing, payment processing, configuration and provisioning.And set up is a breeze.  You’ll instantly have a web store that can support up to 30,000 accounts to connect services with targeted segments. Rapidly add new serviceswith ongoing product updates, minimizing IT needs and exceeding customer expectations and requirements.</p>
						<br />
						<a class="a-no-underline" href="#form" rel="modal:open"><button class="btn btn-outline-gray center-block">Request Demo or Pricing</button></a>
						<div class="hidden">
							<div id="form" class="modal">
								<h4><strong>Request Demo or Pricing</strong></h4>
								<div id="wufoo-q11zquol1yv8tws">
									Fill out my <a href="https://channelmarketing.wufoo.com/forms/q11zquol1yv8tws">online form</a>.
								</div>
								<script type="text/javascript">var q11zquol1yv8tws;(function(d, t) {
									var s = d.createElement(t), options = {
									'userName':'channelmarketing',
									'formHash':'q11zquol1yv8tws',
									'autoResize':true,
									'height':'640',
									'async':true,
									'host':'wufoo.com',
									'header':'hide',
									'ssl':true};
									s.src = ('https:' == d.location.protocol ? 'https://' : 'http://') + 'www.wufoo.com/scripts/embed/form.js';
									s.onload = s.onreadystatechange = function() {
									var rs = this.readyState; if (rs) if (rs != 'complete') if (rs != 'loaded') return;
									try { q11zquol1yv8tws = new WufooForm();q11zquol1yv8tws.initialize(options);q11zquol1yv8tws.display(); } catch (e) {}};
									var scr = d.getElementsByTagName(t)[0], par = scr.parentNode; par.insertBefore(s, scr);
									})(document, 'script');
								</script>
							</div>
						</div>
					</section>
				</div>
				<div class="col-md-3 col-sm-12">
					<?php echo get_sidebar('platforms'); ?>
				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>