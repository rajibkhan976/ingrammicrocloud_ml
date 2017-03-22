<?php
/**
 * Template Name: Become a Partner
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

<div id="become-a-partner">
    <div id="panel-intro">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <h1>Become a Partner</h1>
                    <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/page-become-a-partner/become-a-reseller-vendor-pic.jpg" alt="group of people having a meeting" />
                </div>
                <div class="col-md-9 col-sm-9">
                    <h2 class="blue-heading"><strong>Transform Your Business With Cloud │ EVOLVE. ACHIEVE. SUCCEED.</strong></h2>
                    <p>At Ingram Micro, we view Cloud not just as a single technology, but as a foundational platform to run and drive a whole new way of doing business. Ingram Micro offers partners around the world a host of ways to leverage Cloud to evolve and achieve new levels of success.</p>
                    <p>We offer a complete catalog of vetted leading Cloud solutions with 24/7 support and supply a selection of six flexible and scalable multi-faceted platforms for partners to provide Cloud services. Each resale platform is defined by its unique capabilities of service automation, multi-channel selling, solution customization, integration and technical requirements.</p>
                    <p>Solution providers can use these platforms to launch and support distinct or hybrid business models, such as combining call centers and/or field service sales with ecommerce and to extend and enhance existing commerce systems in order to minimize costs, deployment timelines, user disruption and business risk.</p>
                    <p>Regardless if you are a small to mid-sized reseller, solution provider, enterprise, operator, carrier, telco, hoster, MSP or OEM, Ingram Micro Cloud has the relationships, infrastructure and expertise to help you monetize and manage any offerings. This includes business applications, communication &amp; collaboration tools, security software, vertical solutions, cloud management services, infrastructure and XaaS, all with confidence, speed and agility. Learn more about partnership opportunities below.</p>
                </div>
            </div>
        </div>
    </div>
    <div id="panel-tabs" class="container">
        <div class="bs-example bs-example-tabs" data-example-id="togglable-tabs">
            <ul class="nav nav-tabs" id="myTabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#reseller" id="reseller-tab" role="tab" data-toggle="tab" aria-controls="reseller" aria-expanded="true"><strong>Become a Reseller</strong></a>
                </li>
                <li role="presentation">
                    <a href="#vendor" role="tab" id="vendor-tab" data-toggle="tab" aria-controls="vendor" aria-expanded="false"><strong>Become a Vendor</strong></a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active in" role="tabpanel" id="reseller" aria-labelledby="reseller-tab">
                    <p>Ingram Micro Cloud delivers technology resellers, around the world and of all sizes, a complete selection of programs and services to help you evolve and achieve new levels of success.</p>
                    <div class="row" style="margin: 40px 0;">
                        <div class="col-md-6 col-sm-6">
                            <div class="row">
                                <div class="col-md-3 col-sm-3">
                                    <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/page-become-a-partner/education.png" alt="Education" />
                                </div>
                                <div class="col-md-9 col-sm-9" style="margin-bottom: 40px;">
                                    <p>
                                        <strong>Education &amp; Training</strong><br />
                                        Count on our expertise to deliver the knowledge and skills to integrate cloud into your business successfully, boost user adoption, and improve your bottom line.
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-sm-3">
                                    <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/page-become-a-partner/marketing.png" alt="Marketing" />
                                </div>
                                <div class="col-md-9 col-sm-9">
                                    <p>
                                        <strong>Marketing &amp; Business Development</strong><br />
                                        Utilize our extensive global resources for networking and building relationships, targeting high-conversion leads, communicating technology solutions and promoting your brand.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="row">
                                <div class="col-md-3 col-sm-3">
                                    <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/page-become-a-partner/tech-support.png" alt="Technical Support" />
                                </div>
                                <div class="col-md-9 col-sm-9" style="margin-bottom: 20px;">
                                    <p>
                                        <strong>Technical Support</strong><br/>
                                        Depend on our seasoned support professionals to assist you with selecting, deploying and maintaining cloud solutions, solving technical problems and providing advice on best practices.
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-sm-3">
                                    <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/page-become-a-partner/financing.png" alt="Financing" />
                                </div>
                                <div class="col-md-9 col-sm-9">
                                    <p>
                                        <strong>Financing</strong><br/>
                                        Leverage our financial strength to help purchase products and services for your cloud business on credit or net terms, sustain healthier cash flow and drive new opportunities.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <p>If you are interested in joining nearly 200,000 solutions providers around the world who look to Ingram Micro for their technology needs, please complete the reseller partner application form below and we will contact you within 48 hours. Click here to download our <a style="text-decoration:underline; font-weight:bold !important;" href="<?php echo get_template_directory_uri(); ?>/uploads/page-become-a-partner/cloud_portfolio_list_2016.pdf" target="_blank">cloud portfolio list</a></p>
                        <br />
                        <div class="text-center">
                            <a class="btn btn-outline-gray a-no-underline" href="/become-a-cloud-reseller-form/" id="request-pricing-form" rel="nofollow" data-modal="#popup-modal"><img src="<?php echo get_template_directory_uri(); ?>/img/page-become-a-partner/reseller-button-icon.png" alt="Become a Cloud Reseller Today" />Become a Cloud Reseller Today</a>
                        </div>
                        
                    </div>
                </div>
                <div class="tab-pane fade" role="tabpanel" id="vendor" aria-labelledby="vendor-tab">
                    <div class="row">
                        <div class="col-md-12">
                            <p>
                                As the largest technology distributor in the world, Ingram Micro connects industry leading Cloud vendors and ISVs with global and local markets to generate demand for your solutions, deliver automated cloud services and manage and support users on your behalf.
                            </p>
                        </div>
                    </div>
                    <div style="margin-top: 40px; margin-bottom: 40px;">
                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                                <img class="img-responsive center-block" src="<?php echo get_template_directory_uri(); ?>/img/page-become-a-partner/demand-gen.png" alt="Demand Generation" />
                                <br />
                                <p class="text-center"><strong>Demand Generation</strong></p>
                                <p>Position and promote your products and services through our international campaign initiatives, the largest reseller community in the world, including global telco's and large hosters and the industry's most complete ecommerce catalog of over 200 vetted cloud solutions.</p>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <img class="img-responsive center-block" src="<?php echo get_template_directory_uri(); ?>/img/page-become-a-partner/cloud-platforms.png" alt="Cloud Platforms" />
                                <br />
                                <p class="text-center"><strong>Cloud Platforms</strong></p>
                                <p>Supply cloud solutions using world class delivery platforms ranging from simple to fully customizable, with automated orders, billing, payments, configuration, provisioning, management and more.</p>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <img class="img-responsive center-block" src="<?php echo get_template_directory_uri(); ?>/img/page-become-a-partner/support.png" alt="Support" />
                                <br />
                                <p class="text-center"><strong>Reseller & End-User Support</strong></p>
                                <p>Concentrate on innovation and perfecting products and services while our trained and experienced professionals support the technical and business needs of your customers and end-users.</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <p>If you are interested in joining nearly 200,000 solutions providers around the world who look to Ingram Micro for their technology needs, please complete the vendor partner application form below and we will contact you within 48 hours. Click here to download our <a style="text-decoration:underline; font-weight:bold !important;" href="<?php echo get_template_directory_uri(); ?>/uploads/page-become-a-partner/cloud_portfolio_list_2016.pdf" target="_blank">cloud portfolio list</a></p>
                        <br/>
                        <div class="text-center">
                            <a href="/vendor-profile" class="a-no-underline btn btn-outline-gray">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/page-become-a-partner/vendor-button-icon.png" alt="Become a Cloud Vendor Today" />
                            Become a Cloud Vendor Today
                        </a>    
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
