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
get_header();
?>

<div id="cloud-store" class="platform-page cloud-store">
    <section id="panel-header">
        <div class="container">
            <div class="row">
                <div id="left-column" class="col-md-3 col-sm-3 text-center">
                    <div class="v-center">
                        <div class="v-in">                        		
                            <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/icons/platforms/store-blue-circle.png" alt="Cloud Store" />
                            <h1 class="platform">Cloud Store</h1>
                        </div>
                    </div>
                </div>
                <div id="right-column" class="col-md-9 col-sm-9">
                    <div class="v-center">
                        <div class="v-in">
                            <div class="category-description">
                                <div class="pannel-header-right">
                                    <p>Take your technology business to the next level using the fastest growing and most cost effective sales channel in the world, the internet. The Ingram Micro Cloud Store empowers cloud resellers and cloud solution providers to attract new customers and accelerate revenue by deploying a self-branded ecommerce web store that integrates with your company’s current website.</p>
                                    <br />
                                </div>
                                <div class="pannel-header-right-button">
                                    <a class="btn btn-outline-gray" href="/cloud-store-video/" rel="nofollow" data-modal="#popup-modal" id="video" role="button">Watch Video</a>
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
                    <div class="col-md-4 col-sm-4">
                        <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/page-cloud-store/screenshot.jpg" alt="Tech-IT" />
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <h2 class="blue-heading"><strong>Drive Greater Profitability with Ecommerce</strong></h2>
                        <p>Cloud Store empowers you to sell and manage cloud services available through the Ingram Micro Cloud Marketplace, directly to your end-customers using your own web store. Bundle or cross-sell popular cloud solutions, with your own products and services, to meet unique customer requirements, boost average transaction size and improve your bottom line. With a low monthly fee of only $199/month (waived with active 10k seat count) and no required hosting or complex technical infrastructure, the Ingram Micro Cloud Store makes e-commerce easy and cost efficient. </p>
                        <br />
                        <div class="text-center">
                            <a class="a-no-underline btn btn-outline-gray" href="<?php echo get_template_directory_uri(); ?>/uploads/page-cloud-store/Ingram%20Micro%20Cloud%20Store%20Datasheet_16-10-17.pdf" target="_blank" role="button">Download Datasheet</a>
                        </div>
                    </div>
                </section>
                <section id="panel-2" class="row">
                    <div class="col-md-4 col-sm-4">
                        <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/page-cloud-store/enhance.jpg" alt="man and woman looking at tablet." />
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <h2 class="blue-heading"><strong>Enhance Customer Loyalty and Retention Using Single Brand Service</strong></h2>
                        <p>Cloud Store helps ensure end-customers and staff can research solutions, browse cloud service catalogs and make purchases in real time, 24/7, all without leaving your website.  Intuitive, unified design allows for easy customization of content and graphics so you can match your brand’s identity.  Be the expert for your customers by taking advantage of our unlimited technical support for partners, with end-user support available as an additional option.  Best of all, with Cloud Store you own the complete customer life cycle, from provisioning and customer management to billing and support.</p>
                    </div>
                </section>
                <section id="panel-3">
                    <h2 class="blue-heading"><strong>Achieve More with Greater Flexibility in Cloud Store</strong></h2>
                    <p>With Ingram Micro Cloud Marketplace, it’s never been easier to add new services to your Cloud Store portfolio and monetize every customer interaction with speed and efficiency. Determine your own pricing, directly bill or invoice and collect payments from customers using your own payment experience. Manage recurring billing options through credit or debit card payments with a new or existing compatible payment gateway. When a purchase is made, resellers are paid directly to their merchant account. You can even target specific customer segments and interactions with personalized SKU's and promotional code discounts, to create a multitude of unique revenue generating opportunities. </p>
                    <br />
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