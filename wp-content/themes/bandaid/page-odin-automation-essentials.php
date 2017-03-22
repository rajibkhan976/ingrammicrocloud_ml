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
get_header();
?>

<div id="oidin-automation-essentials" class="platform-page odin-automation-essentials">
    <section id="panel-header">
        <div class="container">
            <div class="row">
                <div id="left-column" class="col-md-3 col-sm-3 text-center">
                	<div class="v-center">
                    	<div class="v-in">
                            <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/icons/platforms/oae.png" alt="Odin Automation Essentials" />
                            <h1 class="platform">Odin Automation Essentials</h1>
                        </div>
                    </div>
                </div>
                <div id="right-column" class="col-md-9 col-sm-9">
                	<div class="v-center">
                    	<div class="v-in">
                        	<div id="category-description">
                           	 	<div class="pannel-header-right">
                                    <p>Building a scalable and successful cloud practice can be complex and challenging due to the inefficiencies and high costs of manual-based processes commonly associated with the purchase, resale and provisioning of cloud technology.  Until now.  Introducing Ingram Micro’s Odin Automation Essentials, a preconfigured, self-branded web store and service automation platform that automates the end-to-end delivery of Microsoft 1-Tier CSP services and related product offerings.</p>
                                 
                                </div>
                                <div class="pannel-header-right-button">
                                    <a class="btn btn-outline-gray" href="/odin-automation-essentials-video/" id="video" rel="nofollow" data-modal="#popup-modal" role="button">Watch Video</a>
                                </div>
                            </div>
                        </div>
                     </div>
                </div>
            </div>
        </div>        
    </section>
    <div class="container">
        <div class="row">
            <div id="main-content" class="col-md-9 col-sm-12">
                <section id="panel-1" class="row">
                    <div class="col-md-5 col-sm-5">
                        <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/page-oae/screenshot.png" alt="Service PRO" />
                    </div>
                    <div class="col-md-7 col-sm-7">
                        <h2 class="blue-heading"><strong>Scale Your Cloud Service Delivery</strong></h2>
                        <p>Odin Automation Essentials automates the work previously done by hiring developers, system managers and ecommerce and billing specialists. Through automation, you’ll now be able to achieve more with less by focusing your limited bandwidth and resources on customer service, marketing and business development rather than building and maintaining a costly infrastructure.  Maximize every business opportunity by managing all stages of the customer lifecycle including order management, provisioning, billing and end-to-end processes of cloud service delivery with a streamlined, scalable end user experience that delivers one login, one bill and self-service control panels.</p>
                        <br />
                        <div class="text-center">
                            <a class="a-no-underline btn btn-outline-gray" href="<?php echo get_template_directory_uri(); ?>/uploads/page-odin-automation-essentials/IM-Odin-Essentials-Datasheet-16-12-07_Published.pdf" target="_blank" role="button">Download Datasheet</a>
                        </div>
                    </div>
                </section>
                <section id="panel-2" class="row">
                    <div class="col-md-5 col-sm-5">
                        <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/page-oae/revenue_opportunites.jpg" alt="men discussing revenue graph" />
                    </div>
                    <div class="col-md-7 col-sm-7">
                        <h2 class="blue-heading"><strong>Create New Revenue Opportunities</strong></h2>
                        <p>Clients continue to demand new SaaS offerings to help them drive greater productivity and attract new customers. With the flexibility of Odin Automation Essentials, you’ll be able to generate additional revenue by bundling Microsoft Cloud Services with your own professional services, all on the same platform.  This will enable you to expand and add products and services as your clients demand them, such as email migration, support, file sharing and collaboration, security, as well as dedicated servers and ISP services.  Leverage the revolutionary end customer control panel to easily upsell and cross sell services without expensive acquisition costs.</p>
                    </div>
                </section>
                <section id="panel-3">
                    <h2 class="blue-heading"><strong>Go To Market Faster</strong></h2>
                    <p>Bypass the costs, challenges and extended timelines traditionally required to enter Microsoft CSP markets.  Odin Automation Essentials is equipped with Microsoft Cloud Services ready for sale out of the box using existing contracts. Other features include automated billing, invoicing, payment processing, configuration and provisioning. And set up is a breeze.  You’ll instantly have a web store that can support up to 30,000 accounts to connect services with targeted segments. Rapidly add new services with ongoing product updates, minimizing IT needs and exceeding customer expectations and requirements.</p>
                    <div>
                        <br/>
                        <a class="a-no-underline btn btn-outline-gray mobile-margin" href="http://www.odin.com/products/oae/" style="margin-right:20px;" target="_blank" role="button">Learn more</a>
                        <a class="a-no-underline btn btn-outline-gray" id="request-pricing-form" rel="nofollow" data-modal="#popup-modal" href="/request-demo-or-pricing/" role="button">Request Demo or Pricing</a>
                    </div>                    
                </section>
            </div>
            <div class="col-md-3 col-sm-12">                
                <?php if (is_active_sidebar('sidebar-1')) : ?>			
                    <?php dynamic_sidebar('sidebar-1'); ?>			
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>