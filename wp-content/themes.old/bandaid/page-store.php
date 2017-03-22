<?php
/**
 * Template Name: Store
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
						<img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/icons/platforms/store-blue-circle.png"></img>
						<h1>
							<span class="platform">Cloud Store</span>
						</h1>
					</div>
					<div id="right-column" class="col-md-9 col-sm-9">
						<p>Take your technology business to the next level using the fastest growing, and most cost effective sales channel in the world, the internet.The Ingram Micro Cloud Store empowers cloud resellers and cloud solution providers to attract new customers and accelerate revenue by deploying a self-branded ecommerce web store that integrates seamlessly with your company’s current website.</p>
						<br />
						<a href="#video" rel="modal:open"><button class="btn btn-outline-gray">Watch Video</button></a>
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
							<h2 class="blue-heading"><strong>Drive Greater Profitability with Ecommerce</strong></h2>
							<p>Cloud Store empowers you to sell and manage cloud services available through the Ingram Micro Cloud Marketplace, directly to your end-customers using your own web store. Bundle or cross-sell popular cloud solutions, with your own products and services, to meet unique customer requirements, boost average transaction size, and improve your bottom line. With a low monthly fee of only $199/month (waived with active 10k seat count), and no required hosting or complex technical infrastructure, the Ingram Micro Cloud Store makes ecommerce easy and cost efficient. </p>
							<br />
							<a class="a-no-underline" href="<?php echo get_template_directory_uri(); ?>/uploads/page-cloud-store/Ingram%20Micro%20Cloud%20Store%20Datasheet_16-10-17.pdf" target="_blank"><button class="btn btn-outline-gray center-block">Download Datasheet</button></a>
						</div>
					</section>
					<section id="panel-2" class="row">
						<div class="col-md-5 col-sm-5">
							<img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/page-cloud-store/cloud-w-hand-pointing.jpg"></img>
						</div>
						<div class="col-md-7 col-sm-7">
							<h3 class="blue-heading"><strong>Enhance Customer Loyalty and Retention Using Single Brand Service</strong></h3>
							<p>Cloud Store helps ensure end-customers and staff can research solutions, browse cloud service catalogs, and make purchases in real time, 24/7, all without leaving your website.  Intuitive, unified design allows for easy customization of content and graphics so you can match your brand’s identity.  Be the expert for your customers by taking advantage of our unlimited technical support for partners, with end-user support available as an additional option.  Best of all, with Cloud Store you own the complete customer life cycle, from provisioning and customer management to billing and support.</p>
						</div>
					</section>
					<section id="panel-3">
						<h4 class="blue-heading"><strong>Achieve More with Greater Flexibility in Cloud Store</strong></h4>
						<p>With Ingram Micro Cloud Marketplace, it’s never been easier to add new services to your Cloud Store portfolio and monetize every customer interaction with speed and efficiency. Determine your own pricing, directly bill or invoice, and collect payments from customers using your own payment experience. Manage recurring billing options through credit or debit card payments with a new or existing compatible payment gateway. When a purchase is made, resellers are paid directly to their merchant account. You can even target specific customer segments and interactions with personalized SKU's and promotional code discounts, to create a multitude of unique revenue generating opportunities. </p>
						<br />
						<a class="a-no-underline" href="#form" rel="modal:open"><button class="btn btn-outline-gray center-block">Start Your Cloud Store</button></a>
						<div class="hidden">
							<div id="form" class="modal">
								<h4><strong>Sign up for your own Cloud Store</strong></h4>
								<div id="wufoo-q1q4sp4x1ceyr0p">
									Fill out my <a href="https://channelmarketing.wufoo.com/forms/q1q4sp4x1ceyr0p">online form</a>.
								</div>
								<script type="text/javascript">var q1q4sp4x1ceyr0p;(function(d, t) {
									var s = d.createElement(t), options = {
									'userName':'channelmarketing',
									'formHash':'q1q4sp4x1ceyr0p',
									'autoResize':true,
									'height':'560',
									'async':true,
									'host':'wufoo.com',
									'header':'hide',
									'ssl':true};
									s.src = ('https:' == d.location.protocol ? 'https://' : 'http://') + 'www.wufoo.com/scripts/embed/form.js';
									s.onload = s.onreadystatechange = function() {
									var rs = this.readyState; if (rs) if (rs != 'complete') if (rs != 'loaded') return;
									try { q1q4sp4x1ceyr0p = new WufooForm();q1q4sp4x1ceyr0p.initialize(options);q1q4sp4x1ceyr0p.display(); } catch (e) {}};
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