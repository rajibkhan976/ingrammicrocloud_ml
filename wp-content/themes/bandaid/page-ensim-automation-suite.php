<?php
/**
 * Template Name: Ensim Automation Suite
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
<div id="ensim" class="platform-page">
    <section id="panel-header">
        <div class="container">
            <div class="row">
                <div id="left-column" class="col-md-3 col-sm-3 text-center">
                    <div class="v-center">
                        <div class="v-in">
                            <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/icons/platforms/ensim.png" alt="Ensim Automation Suite" />
                            <h1 class="platform">Ensim Automation Suite</h1>
                        </div>
                    </div>
                </div>
                <div id="right-column" class="col-md-9 col-sm-9">
                    <div class="v-center">
                        <div class="v-in">
                            <div class="category-description">
                                <div class="pannel-header-right-small">
                                    <p>The Ensim Automation Suite is a comprehensive cloud service platform that allows service providers, MSPs and enterprises to monetize and manage their technology business with an integrated and customizable self-service solution, to deliver cloud services and business applications across a variety of industries and technical requirements.</p>
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
            <div id="main-content" class="col-md-9 col-sm-9">
                <section id="panel-1" class="row">
                    <div class="col-md-5 col-sm-5">
                        <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/page-cloud-store/Ensim-screenshot.jpg" alt="Ensim" />
                    </div>
                    <div class="col-md-7 col-sm-7">
                        <h2 class="blue-heading"><strong>Launch Clients into the Cloud in Days</strong></h2>
                        <p>The Ensim Automation Suite offers feature rich modules for a marketplace, subscription management, service catalog, provisioning, usage collection, billing & invoicing, taxation, payments and more, as well as 40+ connectors for a range of popular applications, services and infrastructure. Whether systems reside on premise or in a colocation facility, Ensim supports both multi-tenant and dedicated modes and can provide automated storefront capabilities in a matter of days.</p>
                        <br />
                        <div class="text-center">
                            <a class="a-no-underline btn btn-outline-gray" href="<?php echo get_template_directory_uri(); ?>/uploads/page-ensim-automation-suite/Ensim-Automation-Suite-CSP-Datasheet_16-10-31.pdf" target="_blank" role="button">Download Datasheet</a>
                        </div>                        
                    </div>
                </section>
                <section id="panel-2" class="row">
                    <div class="col-md-5 col-sm-5">
                        <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/page-ensim/ensim-sec2.jpg" alt="people looking at a tablet" />
                    </div>
                    <div class="col-md-7 col-sm-7">
                        <h2 class="blue-heading"><strong>Customize and Integrate to Work with Existing Infrastructure</strong></h2>
                        <p>Ensim Automation Suite allows service providers and enterprises to extend and enhance existing systems to minimize costs, deployment timeline, user disruption and business risk.  The platform is very flexible and can be easily integrated with back office systems like IDM, CRM, ERP, BI, or other OSS and BSS platforms.  The Ensim SDK also allows rapid creation of new connectors for any application, cloud service, device, or infrastructure system.  With advanced out-of-the-box functionality, Ensim can be configured, extended and customized to connect to even the most complex legacy environments.</p>
                    </div>
                </section>
                <section id="panel-3">
                    <h2 class="blue-heading"><strong>Grow Infinitely with a Scalable Distributed Architecture</strong></h2>
                    <p>The Ensim Automation Suite enables service providers and enterprises to profit from the cloud by selling a comprehensive set of services through multiple sales channels. Ensim offers a secure, modular, scalable and highly available, carrier-grade / enterprise-class architecture that is specifically designed to address the most critical operational challenges in deploying and managing users in a secure and compliant manner. Users benefit from a consistent ordering and self-service management portal across all types of services and applications. Administrators benefit from enabling only the services and features which are appropriate on a granular level.   </p>
                    <br />
                    <a class="a-no-underline btn btn-outline-gray margin-right-20 mobile-margin" href="http://www.ensim.com" target="_blank" role="button">Learn more</a>
                    <a class="a-no-underline btn btn-outline-gray" id="request-pricing-form" rel="nofollow" data-modal="#popup-modal" href="/request-demo-or-pricing/" role="button">Request Demo or Pricing</a>
                </section>
            </div>
            <div class="col-md-3 col-sm-3">
                <?php if (is_active_sidebar('sidebar-1')) : ?>			
                    <?php dynamic_sidebar('sidebar-1'); ?>			
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>