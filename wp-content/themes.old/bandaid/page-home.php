<?php
/**
 * Template Name: Home
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

<div id="home">
	
	<section id="panel-hero">
	  <div class="container">
	  	<div class="bn-txt"><h1>Transform your business with <strong>Cloud</strong></h1>
				<p>Security. Business Application. Cloud Services</p>
				<p>Communication &amp; Collaboration. Infrastructure.</p>
				<h3><strong>We’ve got you covered.</strong></h3>
				<a href="/become-a-partner"><button class="btn btn-outline-gray">BECOME A PARTNER</button></a>
			</div>
		</div>
	</section>
	
	<section id="panel-promotions" class="container"></section>
	
	<section id="panel-cloud-services">
	  <div class="container">
	    <h2>Cloud Services</h2>
	    <h3>Ingram Micro offers a full range of business technology solutions.  Partners can use our convenient category list to explore both traditional Ingram Micro and Cloud Marketplace solutions, and then drill down to assemble and purchase unique product and service offerings. </h3>
	    <div id="category-list" class="seven-cols text-center"></div>
	    <div id="category-description" class="row">
	      <p>Streamline business processes, improve organizational workflows and efficiencies, and drive project deliverables with popular cloud business applications including Microsoft Office 365, AutoCAD, BitTitan, Dun & Bradstreet, LawToolBox, Microsoft Enterprise Mobility Suite and more.</p>
	    </div>
	    <div id="category-solutions" class="text-center"></div>
	    <div id="cta-section" class="row">
	      <div class="col-lg-5 col-md-5 col-sm-5">
	        <div id="see-all-button-container"></div>
	      </div>
	      <div class="col-lg-7  col-md-7 col-sm-7">
	      	<div class="row">
		        <div class="col-lg-4 col-md-4 col-sm-4">
		          <a href="#cta-form" rel="modal:open"><button id="more-information" class="btn btn-outline-white">More Information</button></a>
		        </div>
		        <div class="col-lg-8 col-md-8 col-sm-8" style="margin-top: 10px;">
		          Lifting your business into the Cloud? Need help choosing the right solutions? Our team of experts is here to help.
		        </div>
	        </div>
	      </div>
	    </div>
	  </div>
  	<div class="hidden">
			<div id="cta-form" class="modal">
				<h4><strong>How can we help?</strong></h4>
				<div id="wufoo-q1u2rila04e057u">
					Fill out my <a href="https://channelmarketing.wufoo.com/forms/q1u2rila04e057u">online form</a>.
					</div>
					<script type="text/javascript">var q1u2rila04e057u;(function(d, t) {
					var s = d.createElement(t), options = {
					'userName':'channelmarketing',
					'formHash':'q1u2rila04e057u',
					'autoResize':true,
					'height':'560',
					'async':true,
					'host':'wufoo.com',
					'header':'hide',
					'ssl':true};
					s.src = ('https:' == d.location.protocol ? 'https://' : 'http://') + 'www.wufoo.com/scripts/embed/form.js';
					s.onload = s.onreadystatechange = function() {
					var rs = this.readyState; if (rs) if (rs != 'complete') if (rs != 'loaded') return;
					try { q1u2rila04e057u = new WufooForm();q1u2rila04e057u.initialize(options);q1u2rila04e057u.display(); } catch (e) {}};
					var scr = d.getElementsByTagName(t)[0], par = scr.parentNode; par.insertBefore(s, scr);
					})(document, 'script');</script>
			</div>
		</div>
	</section>
	

	<!-- Cloud Services Platforms SVG version-->
	<section id="panel-delivery-models">
	  <div class="container">
	  	<div id="header-text" class="row text-center">
		    <h2>Cloud Services Platforms</h2>
		    <h3>Choose from six flexible and scalable options with the most advanced technologies for bundling, cross-selling and upselling cloud solutions with other product and service offerings through the web.</h3>
	  	</div>
	    <div id="content" class="row">
	      <div id="legend-top" class="row text-center">
	        <p id="saas"><i class="fa fa-circle"></i> SaaS</p>
	        <p id="software-licensing"><i class="fa fa-circle"></i> Software Licensing</p>
	      </div>
	      <div id="spectrum" class="row text-center">
	      	<div class="col-lg-2 col-md-2 col-sm-2">
	      		<!--<a href="/marketplace">
		      		<img src="<?php echo get_template_directory_uri(); ?>/img/page-home/marketplace.png" class="platform img-responsive img-circle center-block saas delivery-model-saas-active"></img>
		      		</a>-->
      		<!-- SVG version -->
      		<a href="/marketplace" class="a-no-underline">
      			<div id="marketplace-icon-container">
      			<div id="marketplace-icon" class="icon platform saas delivery-model-saas-active"></div>
      			</div>
      		</a>
	      	</div>
	      	<div class="col-lg-2 col-md-2 col-sm-2">
	      		<!--<a href="/referral">
		      		<img src="<?php echo get_template_directory_uri(); ?>/img/page-home/referral.png" class="platform img-responsive img-circle center-block saas delivery-model-saas-active"></img>
		      	</a>-->
		      	<a href="/referral" class="a-no-underline">
      			<div id="marketplace-icon-container">
      			<div id="referral-icon" class="icon platform saas delivery-model-saas-active"></div>
      			</div>
      		</a>
	      	</div>
	      	<div class="col-lg-2 col-md-2 col-sm-2">
	      	<!--	<a href="/store">
		      		<img src="<?php echo get_template_directory_uri(); ?>/img/page-home/store.png" class="platform img-responsive img-circle center-block saas delivery-model-saas-active"></img>
		      	</a>-->
		      		<a href="/store" class="a-no-underline">
      			<div id="marketplace-icon-container">
      			<div id="store-icon" class="icon platform saas delivery-model-saas-active"></div>
      			</div>
      		</a>
	      	</div>
	      	<div class="col-lg-2 col-md-2 col-sm-2">
	      		<!--<a href="/odin-automation-essentials">
		      		<img src="<?php echo get_template_directory_uri(); ?>/img/page-home/oae.png" class="platform img-responsive img-circle center-block software-licensing"></img>
	      		</a>-->
			      		<a href="/odin-automation-essentials" class="a-no-underline">
		      			<div id="marketplace-icon-container">
		      			<div id="oae-icon" class="icon platform software-licensing"></div>
		      			</div>
		      		</a>
	      	</div>
	      	<div class="col-lg-2 col-md-2 col-sm-2">
	      		<!--<a href="/ensim-automation-suite">
		      		<img src="<?php echo get_template_directory_uri(); ?>/img/page-home/ensim.png" class="platform img-responsive img-circle center-block software-licensing"></img>
		      	</a>-->
		      		<a href="/ensim-automation-suite" class="a-no-underline">
      					<div id="marketplace-icon-container">
      						<div id="ensim-icon" class="icon platform software-licensing"></div>
      					</div>
      				</a>
	      	</div>
	      	<div class="col-lg-2 col-md-2 col-sm-2">
	      		<!--<a href="/odin-automation-premium">
		      		<img src="<?php echo get_template_directory_uri(); ?>/img/page-home/oap.png" class="platform img-responsive img-circle center-block software-licensing"></img>
		      	</a>-->
		      		<a href="/odin-automation-premium" class="a-no-underline">
      					<div id="marketplace-icon-container">
      						<div id="oap-icon" class="icon platform software-licensing"></div>
      					</div>
      				</a>
	      	</div>
	      </div>
	      <div id="legend-bottom" class="row">
	      	<div class="col-lg-6 col-md-6 col-sm-6 pull-left">
		      	<div id="arrow-left" class="active"></div>
		      	<div id="arrow-left-text" class="active">
		      		<strong>Ingram Micro Cloud hosted/managed</strong><br />
		      		Simple management - Fast deployment - Core services portfolio
		      	</div>
	      	</div>
	      	<div class="col-lg-6 col-md-6 col-sm-6 pull-right">
		      	<div id="arrow-right-text">
		      		<strong>Provider self-hosted/managed</strong><br />
		      		High scalability - Full control - Broad services portfolio
		      	</div>
		      	<div id="arrow-right"></div>
	      	</div>
	      </div>
	    </div>
	  </div>
	</section>
	<section id="panel-testimonials">
	  <div class="container">
	    <div class="testimonial-slider">
	    	<div class="testimonial">
	      	<div class="row">
		        <div class="col-lg-5 col-md-5 col-sm-5">
		          <img src="<?php echo get_template_directory_uri(); ?>/img/page-home/testimonials/david-smith.jpg" class="img-circle center-block img-responsive" />
		        </div>
		        <div class="col-lg-6 col-md-6 col-sm-6">
		          <h5>David Smith</h5>
		          <h6>Vice President, Worldwide Microsoft SMB</h6>
		          <p>"Together with leading Cloud Solution Providers like Ingram Micro, we continue to build on our commitment of providing our mutual channel partners and their customers with the best-in-breed solutions and resources needed to fully thrive in the cloud."</p>
		        </div>
		     </div>
	      </div>
	      
	      <div class="testimonial">
	      	<div class="row">
		        <div class="col-lg-5 col-md-5 col-sm-5">
		          <img src="<?php echo get_template_directory_uri(); ?>/img/page-home/testimonials/kevin-mccarthy.jpg" class="img-circle center-block img-responsive" />
		        </div>
		        <div class="col-lg-6 col-md-6 col-sm-6">
		          <h5>Kevin J. McCarthy</h5>
		          <h6>President/COO, Afinety, Inc.</h6>
		          <p>"Partnering with Ingram Micro Cloud has helped us broaden our reach in the cloud service market by providing the tools, resources and infrastructure we need to quickly and successfully grow our practice, and continuously exceed customer expectations."</p>
		        </div>
		     </div>
	      </div>
	      <div class="testimonial">
	      	<div class="row">
		        <div class="col-lg-5 col-md-5 col-sm-5">
		          <img src="<?php echo get_template_directory_uri(); ?>/img/page-home/testimonials/patrick-vardeman.jpg" class="img-circle center-block img-responsive" />
		        </div>
		        <div class="col-lg-6 col-md-6 col-sm-6">
		          <h5>Patrick Vardeman</h5>
		          <h6>President & CEO, Accudata Systems</h6>
		          <p>"Ingram Micro Cloud has been a key strategic partner, helping us with our cloud offering, pricing, sales plan, marketing programs and service delivery. Ingram has helped us to expand our customer relationships and bring more value to our customers."</p>
		        </div>
		      </div>
	      </div>
	      <div class="testimonial">
	      	<div class="row">
		        <div class="col-lg-5 col-md-5 col-sm-5">
		          <img src="<?php echo get_template_directory_uri(); ?>/img/page-home/testimonials/brian-dipaolo.jpg" class="img-circle center-block img-responsive" />
		        </div>
		        <div class="col-lg-6 col-md-6 col-sm-6">
		          <h5>Brian DiPaolo</h5>
		          <h6>Director, Integrated Managed Services, Accudata Systems, Inc.</h6>
		          <p>"Ingram Micro simplifies remote management and gives us greater flexibility."</p>
		        </div>
		     </div>
	      </div>
	      <div class="testimonial">
	      	<div class="row">
		        <div class="col-lg-5 col-md-5 col-sm-5">
		          <img src="<?php echo get_template_directory_uri(); ?>/img/page-home/testimonials/steve-bargiacchi.jpg" class="img-circle center-block img-responsive" />
		        </div>
		        <div class="col-lg-6 col-md-6 col-sm-6">
		          <h5>Steve Bargiacchi</h5>
		          <h6>CEO, ProTech</h6>
		          <p>"There's no question Ingram has helped us to move quickly and to lower the barriers of entry to the cloud. It's really nice to walk into a customer and know there's almost nothing we can't offer them working with Ingram as our partner."</p>
		        </div>
		      </div>
	      </div>
	      <div class="testimonial">
	      	<div class="row">
		        <div class="col-lg-5 col-md-5 col-sm-5">
		          <img src="<?php echo get_template_directory_uri(); ?>/img/page-home/testimonials/hank-humphreys.jpg" class="img-circle center-block img-responsive" />
		        </div>
		        <div class="col-lg-6 col-md-6 col-sm-6">
		          <h5>Hank Humphreys</h5>
		          <h6>Channel Chief at Dropbox</h6>
		          <p>"Ingram Micro's impressive commitment to the channel has set the pace for a great partnership and we look forward to driving new business opportunities for our mutual channel partners. We're excited at the ease with which all channel segments, such as MSPs, SIs, VARs, resellers, telcos, and hosters can now access our services through Ingram Micro. By working together, we can help channel partners deliver an affordable offering that allows companies to speed up collaboration and increase productivity."</p>
		        </div>
		      </div>
	      </div>
	    </div>
	  </div>
	</section>
	
	<section id="panel-about">
		<div class="container">
			<div class="row text-center">
				<h2>About Ingram Micro Cloud</h2>
				<h3>Ingram Micro Cloud is a global division of Ingram Micro. With more than 1,500 dedicated cloud specialists, we've built the largest cloud ecosystem in the world to empower organizations to monetize and manage the entire lifecycle of cloud services.</h3>
			</div>
			<div id="video-row" class="row">
				<a href="#video" rel="modal:open"><img src="<?php echo get_template_directory_uri(); ?>/img/page-home/video-image.png" class="center-block img-responsive"></img></a>
			</div>
			<div id="cta" class="row text-center">
				<a href="/about"><button class="btn btn-outline-gray">Learn more</button></a>
			</div>
		</div>
		<div class="hidden">
			<div id="video" class="modal">
				<iframe width="1180" height="664" src="https://www.youtube.com/embed/sQuN90AQ2sM" frameborder="0" allowfullscreen></iframe>
			</div>
		</div>
	</section>
	

	

</div>

<?php get_footer(); ?>