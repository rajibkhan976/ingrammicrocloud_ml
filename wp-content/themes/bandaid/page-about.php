<?php
/**
 * Template Name: About
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
<div id="about" class="platform-page">
    <section id="panel-header">
        <div class="container">
            <div class="row">
                <div id="left-column" class="col-md-3 col-sm-3">
                    <h1 class="aboutus-title platform">Welcome to <br > Ingram Micro Cloud</h1>
                    <img src="<?php echo get_template_directory_uri(); ?>/img/page-about/about-top-pic.jpg" class="img-responsive about-img" alt="Welcome to Ingram Micro Cloud" />
                </div>
                <div id="right-column" class="col-md-9 col-sm-9">
                    <p class="aboutp">Headquartered in Irvine, CA, Ingram Micro Inc. (NYSE: IM) is a Fortune 100 corporation that has more than 300 facilities and more than 29,000 associates doing business in 160 countries on six continents. For more than 35 years, we have helped businesses Realize the Promise of Technology&trade;, with 80% of the world’s technology products touched by Ingram Micro in some way.</p>
                    <p class="aboutp">Ingram Micro Cloud is a global division of Ingram Micro, with more than 1,500 dedicated cloud specialists worldwide. Among this large pool of expertise includes more than 400 cloud sales associates and 700 engineers.  As a cloud service provider, Ingram Micro views cloud not just as a single technology, but as a foundational platform to run and drive a whole new way of doing business.</p>
                    <div class="pannel-header-right-button pannel-header-watch-video-btn">
                        <a class="btn btn-outline-gray" href="/welcome-to-ingram-micro-cloud-video/" id="about-video" rel="nofollow" data-modal="#popup-modal" role="button">Watch Video</a>
                    </div>
                </div>
            </div>
        </div>       
    </section>
    <div class="container">
        <div class="row">
            <div id="main-content" class="col-md-9 col-sm-12">
                <section id="panel-1">
                    <h2 class="blue-heading"><strong>An Ecosystem Where Everyone Thrives</strong></h2>
                    <p>By leveraging a series of recent acquisitions, together with existing assets of more than 200,000 resellers, 4,000 hosters, 300 telcos, US$46 billion dollars in global revenue and deep relationships with the world’s leading cloud vendors, we have broadened our addressable market and built the largest cloud ecosystem in the world, where everyone thrives.</p>
                    <p>We start by simplifying the commercial relationships with leading vendors so our partners don’t have to deal with hundreds of contracts, terms and negotiations. Then, we integrate all cloud solutions into a single source to make it easy to consume, manage and sell on an automated basis. We help define those offerings into marketable products, evaluating the pricing, service plans and operations to ensure our partners are selling the most comprehensive solutions on the market.</p>
                    <p>Next, we help securely migrate existing customers to the cloud, simplify the entire billing process with a single consolidated invoice for all cloud services and provide a single point of contact for technical support. All of this is automated and managed through a centrally accessible and easy-to-use interface for partners and end-users.</p>
                    <p>In addition, our ecosystem continuously cultivates growth through global awareness campaigns, educational tools and events and high-conversion lead generation. This helps resellers quickly evolve and achieve new levels of success, while preserving their relationships as trusted IT advisors to end customers.</p>
                    <br />
                    <div id="video-row" class="text-center">
                        <a href="/about-ingram-micro-cloud-video/" id="video" rel="nofollow" data-modal="#popup-modal"><img src="<?php echo get_template_directory_uri(); ?>/img/page-home/video-image-b.png" class="img-responsive center-block" alt="Ecosystem video"></a>
                    </div>                    
                </section>
                <section id="panel-2">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/page-about/about-us-transform-sec.jpg" alt="group of people having a business meeting" />
                        </div>
                        <div class="col-md-7 col-sm-7">
                            <h3 class="blue-heading"><strong>Transforming Business with Cloud</strong></h3>
                            <p>By supplying access to a global marketplace, industry expertise, solutions and enablement programs, we empower organizations to purchase, provision, manage and invoice cloud technologies with confidence and ease. Businesses can get up and running with cloud in minutes, with little to no investment, enabling them to deliver bundled services, up-sell and cross sell and manage their systems more efficiently.</p>
                            <p>Ingram Micro Cloud invites resellers and vendors to partner with us and join this exciting digital revolution. We offer solutions for security, business applications, cloud management services, communication & collaboration and infrastructure to help our partners monetize and manage the entire lifecycle of Cloud services, business systems and IoT subscriptions and simplify digital transformation with confidence, speed and agility.</p>
                            <p><a href="mailto:cloud@ingrammicro.com?subject=IMC Website Visitor Inquiry from About Us page">Contact us</a> today for help getting started!</p>
                            <br />
                            <a class="margin-right a-no-underline btn btn-outline-gray" role="button" href="/become-a-partner/#reseller">Become a Reseller</a>
                            <a class="a-no-underline btn btn-outline-gray" href="/become-a-partner/#vendor" role="button">Become a Vendor</a>
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