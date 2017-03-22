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
get_header();
?>
<div id="cloud-store" class="platform-page referral">
    <section id="panel-header">
        <div class="container">
            <div class="row">
                <div id="left-column" class="col-md-3 col-sm-3 text-center">
                    <div class="v-center">
                        <div class="v-in">
                            <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/icons/platforms/referral.png" alt="Cloud Referral Program" />
                            <h1 class="platform">Cloud <br> Referral Program</h1>
                        </div>
                    </div>
                </div>
                <div id="right-column" class="col-md-9 col-sm-9">
                    <div class="v-center">
                        <div class="v-in">
                            <div class="category-description">
                                <div class="pannel-header-right">
                                    <p>The fastest and easiest entry to the cloud services market is finally at your fingertips. The Ingram Micro Cloud Referral Program is a platform designed to provide your organization with a profitable and convenient solution to direct end-customers to Ingram Micro's referral website to make purchases, while you simply earn commissions. As a lucrative replacement to the Microsoft Advisor Program, scheduled to end soon, the Cloud Referral Program offers a quick and uncomplicated solution to access the growing opportunities within the cloud service market, allowing partners to maintain or even increase earned commissions on products like Microsoft Office 365.</p>
                                </div>
                                <a class="btn btn-outline-gray" href="/referral/" style="margin-right: 20px;" role="button">Join Cloud Referral Program</a>
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
                    <div class="col-md-4 col-sm-5">
                        <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/page-referral/microsoft.jpg" alt="Microsoft" />
                    </div>
                    <div class="col-md-7 col-sm-7">
                        <h2 class="blue-heading"><strong>The Logical Alternative to the Expiring Microsoft Advisor Program</strong></h2>
                        <p>Microsoft is no longer paying incentives to partners for new subscriptions and by June 2017 all existing Advisor partner incentives will also be eliminated. Now is the time to move your Microsoft Advisor subscriptions to the Cloud Referral Program. Ingram Micro has white glove services to help you transition quickly and seamlessly.</p>
                        <br />
                        <div class="text-center">
                            <a class="a-no-underline btn btn-outline-gray" href="<?php echo get_template_directory_uri(); ?>/uploads/page-referral/Cloud-Referral-Program-Datasheet.pdf" target="_blank" role="button">Download Datasheet</a>
                        </div>
                    </div>
                </section>
                <section id="panel-2">
                    <h2 class="blue-heading"><strong>3 Easy Steps to Get You Started</strong></h2>
                    <div id="icons" class="row text-center">
                        <div class="col-md-4 col-sm-4">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/page-referral/globe.png" class="img-responsive center-block" alt="Globe" />
                            <p>
                                <span class="steps">Step 1</span>
                                <br /> Utilize a unique URL
                                <br> or place a web banner
                                <br> ad on your website
                            </p>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/page-referral/cart.png" class="img-responsive center-block" alt="Cart" />
                            <p>
                                <span class="steps">Step 2</span>
                                <br /> Referral client makes
                                <br> a purchase
                            </p>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/page-referral/cash.png" class="img-responsive center-block" alt="Cash" />
                            <p>
                                <span class="steps">Step 3</span>
                                <br /> You earn commissions
                            </p>
                        </div>
                    </div>
                    <p class="margin-top-20">After registering, simply add a provided web banner or unique ecommerce URL to your website. These will link directly to your business' Ingram Micro Marketplace where customers can make purchases. We'll handle the rest and enable you to track commissions without any set up costs, billing or onboarding required.</p>
                </section>
                <section id="panel-3">
                    <h2 class="blue-heading"><strong>Scale Your Business with Zero Investment</strong></h2>
                    <p>Ingram Micro provides you with the tools and resources to transform your business with Cloud. From billing and invoicing, payment collections and expert customer support, Ingram Micro handles it all, while you focus on business growth. The result is higher earnings as you earn Ingram Micro commissions and incentive rebates from the Microsoft CSP Program, simultaneously. With a user-friendly portal that allows you to manage and track commisions, navigate through customer orders and calculate payouts, you are always in the know and in control.</p>
                    <br/>
                    <p><strong>Ready To Get Started?</strong></p>
                    <a class="btn btn-outline-gray" href="/referral" role="button">Apply To Become a Cloud Referral Partner</a>
                    <a class="btn btn-outline-gray" href="mailto:cloud@ingrammicro.com?subject=Cloud Referral Program Website Inquiry" role="button">Contact us for more information</a>                    
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