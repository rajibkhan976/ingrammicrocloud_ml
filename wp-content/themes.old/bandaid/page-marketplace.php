<?php
/**
 * Template Name: Marketplace
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
						<img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/icons/platforms/marketplace-blue-circle.png"></img>
						<h1>
							<span class="platform">Cloud Marketplace</span>
						</h1>
					</div>
					<div id="right-column" class="col-md-9 col-sm-9">
						<p>Join nearly 200,000  solution providers around the world who look to Ingram Micro for their technology needs. The Ingram Micro Cloud Marketplace enables you to start realizing the opportunity in the cloud quickly, and with minimal effort or upfront cost. You can transform your business to start selling a broad range of cloud services within minutes, empowering you to grow revenue with existing customers and attract new ones.  The Ingram Micro Cloud Marketplace is part of an ecosystem of cloud that brings together buyers and sellers to conduct business on a single platform with confidence and ease.</p>
						<br />
						<a href="https://us.cloud.im"><button class="btn btn-outline-gray">Go to marketplace</button></a>
					</div>
				</div>
			</div>
			<div class="hidden">
				<div id="video" class="modal">
					<iframe width="1180" height="664" src="https://www.youtube.com/embed/rQd1lBAt14A" frameborder="0" allowfullscreen></iframe>
				</div>
			</div>
		</section>
		<div class="container">
			<div class="row">
				<div id="main-content" class="col-md-9 col-sm-12">
					<section id="panel-1" class="row">
						<div class="col-md-5 col-sm-5">
							<img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/page-cloud-store/screenshot.jpg"></img>
						</div>
						<div class="col-md-7 col-sm-7">
							<h2 class="blue-heading"><strong>Today’s Online Market for Leading Cloud Based Applications</strong></h2>
							<p>Cloud Marketplace makes it simple to purchase, provision, manage and invoice over 200 vetted cloud services using our automated ecommerce platform and integrated web store.  The Ingram Micro Cloud Marketplace enables cloud resellers to bill or invoice directly through the platform and collect payments from customers on their own terms.  Best of all, you’ll have 24/7 support, and it requires no hosting, maintenance, or complex technical infrastructure to get started.</p>
							<br />
							<a class="a-no-underline" href="<?php echo get_template_directory_uri(); ?>/uploads/page-marketplace/Ingram%20Micro%20Cloud%20Marketplace%20Datasheet_16-10-17.pdf" target="_blank"><button class="btn btn-outline-gray center-block">Download Cloud Marketplace Datasheet</button></a>
						</div>
					</section>
					<section id="panel-2">
						<div>
							<h2 class="blue-heading"><strong>Realize New Opportunities with Software as a Service (SaaS)</strong></h2>
							<p>Upsell, cross-sell and bundle cloud services with Cloud Marketplace’s secure and easy to manage SaaS platform.  Rapidly grow and add to your company’s offerings so you can best address new and existing customer demands, as a single point of contact. We offer business applications, security software, communication & collaboration tools, infrastructure, vertical solutions and cloud management services.</p>
						</div>
					</section>
					<section id="panel-3">
						<div>
							<h2 class="blue-heading"><strong>Cloud Services</strong></h2>
							<div id="icons" class="row text-center">
								<div class="col-md-2 col-sm-2">
									<a href="/business-applications">
										<img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/icons/categories/business-applications.png" />
										<p>Business Applications</p>
									</a>
								</div>
								<div class="col-md-2 col-sm-2">
									<a href="/security">
										<img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/icons/categories/cloud-management-services.png" />
										<p>Security</p>
									</a>
								</div>
								<div class="col-md-2 col-sm-2">
									<a href="/communication-collaboration">
										<img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/icons/categories/communication-collaboration.png" />
										<p>Communication & Collaboration</p>
									</a>
								</div>
								<div class="col-md-2 col-sm-2">
									<a href="/infrastructure">
										<img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/icons/categories/infrastructure.png" />
										<p>Infrastructure</p>
									</a>
								</div>
								<div class="col-md-2 col-sm-2">
									<a href="/cloud-management-services">
										<img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/icons/categories/security.png" />
										<p>Cloud Management Services</p>
									</a>
								</div>
								<div class="col-md-2 col-sm-2">
									<a href="/vertical-solutions">
										<img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/icons/categories/vertical-solutions.png" />
										<p>Vertical Solutions</p>
									</a>
								</div>
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