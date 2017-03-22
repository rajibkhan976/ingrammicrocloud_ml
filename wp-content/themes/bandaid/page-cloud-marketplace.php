<?php
/**
 * Template Name: Cloud Marketplace
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

<div id="cloud-store" class="platform-page cloud-marketplace">
    <section id="panel-header">
        <div class="container">
            <div class="row">
                <div id="left-column" class="col-md-3 col-sm-3 text-center">
                    <div class="v-center">
                        <div class="v-in">
                            <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/icons/platforms/marketplace-blue-circle.png" alt="Cloud Marketplace" />                            
                            <h1 class="platform">Cloud<br>Marketplace</h1>
                        </div>
                    </div>
                </div>
                <div id="right-column" class="col-md-9 col-sm-9">
                    <div class="v-center">
                        <div class="v-in">
                            <div class="category-description">
                                <div class="pannel-header-right">
                                    <p>Join nearly 200,000  solution providers around the world who look to Ingram Micro for their technology needs. The Ingram Micro Cloud Marketplace enables you to start realizing the opportunity in the cloud quickly and with minimal effort or upfront cost. You can transform your business to start selling a broad range of cloud services within minutes, empowering you to grow revenue with existing customers and attract new ones. The Ingram Micro Cloud Marketplace is part of an ecosystem that brings together buyers and sellers to conduct business on a single platform with confidence and ease.</p>
                                </div>
                                <div class="btn-section">
                                    <a class="btn-right-margin btn btn-outline-gray" href="/cloud-marketplace-video/" id="video" rel="nofollow" data-modal="#popup-modal" role="button">Watch Video</a>
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
                    <div class="col-md-3 col-sm-3">
                        <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/page-marketplace/Marketplace-screenshot-300x300.png" alt="Marketplace" />
                    </div>
                    <div class="col-md-9 col-sm-9">
                        <h2 class="blue-heading"><strong>Today’s Online Market for Leading Cloud Based Applications</strong></h2>
                        <p>The Ingram Micro Cloud Marketplace makes it simple to purchase, provision, manage and invoice over 200 vetted cloud services using our automated ecommerce platform and integrated web store. Cloud Marketplace enables cloud resellers to bill or invoice directly through the platform and collect payments from customers on their own terms.  Best of all, you’ll have 24/7 support and it requires no hosting, maintenance, or complex technical infrastructure to get started.</p>
                        <br />
                        <div class="text-center">
                            <a class="a-no-underline btn btn-outline-gray" href="/wp-content/uploads/sites/2/2017/02/Cloud-Marketplace-Cloud-Services-Delivery-Platform-Datasheet-US.pdf" target="_blank" role="button">Download Datasheet</a>
                        </div>
                    </div>
                </section>
                <section id="panel-2">
                    <h2 class="blue-heading"><strong>Realize New Opportunities with Software as a Service (SaaS)</strong></h2>
                    <p>Upsell, cross-sell and bundle cloud services with Cloud Marketplace’s secure and easy to manage SaaS platform.  Rapidly grow and add to your company’s offerings so you can best address new and existing customer demands, as a single point of contact. We offer a portfolio of solutions that covers all major categories including: infrastructure, security, communication and collaboration, business applications, vertical solutions and cloud management services.</p>
                    <div class="request-demo-form-margin">
                        <a class="a-no-underline btn btn-outline-gray" href="/request-demo-or-pricing/" id="request-pricing-form" rel="nofollow" data-modal="#popup-modal" role="button">Request Demo or Pricing</a>
                    </div>
                </section>
                <section id="panel-3" class="border-top-none padding-top-none">
                    <div class="row text-center icon">
                        <div class="col-md-12 row">
                            <div class="col-md-2 col-sm-2">
                                <a href="/business-applications">
                                    <img class="img-responsive center-block" src="<?php echo get_template_directory_uri(); ?>/img/icons/categories/business-applications.png" alt="Business Applications"/>
                                    <p>Business Applications</p>
                                </a>
                            </div>
                            <div class="col-md-2 col-sm-2">
                                <a href="/security">
                                    <img class="img-responsive center-block" src="<?php echo get_template_directory_uri(); ?>/img/icons/categories/security-b.png" alt="Security" />
                                    <p>Security</p>
                                </a>
                            </div>
                            <div class="col-md-2 col-sm-2">
                                <a href="/communication-collaboration">
                                    <img class="img-responsive center-block" src="<?php echo get_template_directory_uri(); ?>/img/icons/categories/communication-collaboration.png" alt="Communication Collaboration" />
                                    <p>Communication <br> & Collaboration</p>
                                </a>
                            </div>
                            <div class="col-md-2 col-sm-2">
                                <a href="/infrastructure">
                                    <img class="img-responsive center-block" src="<?php echo get_template_directory_uri(); ?>/img/icons/categories/infrastructure-b.png" alt="Infrastructure" />
                                    <p>Infrastructure</p>
                                </a>
                            </div>
                            <div class="col-md-2 col-sm-2">
                                <a href="/cloud-management-services">
                                    <img class="img-responsive center-block" src="<?php echo get_template_directory_uri(); ?>/img/icons/categories/cloud-management-services.png" alt="Cloud Management Services" />

                                    <p>Cloud Management Services</p>
                                </a>
                            </div>
                            <div class="col-md-2 col-sm-2">
                                <a href="/vertical-solutions">
                                    <img class="img-responsive center-block" src="<?php echo get_template_directory_uri(); ?>/img/icons/categories/vertical-solutions.png" alt="Vertical Solutions" />
                                    <p>Vertical Solutions</p>
                                </a>
                            </div>
                        </div>
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