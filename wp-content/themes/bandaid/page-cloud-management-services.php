<?php
/**
 * Template Name: Cloud Management Services
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
<div id="cloud-management-services" class="category-page">
    <section id="panel-header">
        <div class="container">
            <div class="row">
                <div id="left-column" class="col-md-3 col-sm-3 text-center">
                    <div class="v-center">
                        <div class="v-in">
                            <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/icons/platforms/cloud-m-service.png" alt="Cloud Management Services">
                            <h1 class="bs-ap-title"><?php echo get_the_title(); ?></h1>
                        </div>
                    </div>                
                </div>
                <div id="right-column" class="col-md-9 col-sm-9">
                    <div class="v-center">
                        <div class="v-in">
                            <p class="category-description">
                                Deliver timely, responsive and effective global customer support and accelerate technical development, migration, onboarding and user adoption with popular cloud management applications. Cloud management software includes cloud solutions for IT, professional services, ITaaS, identity management, identity synchronizers, active directory and exchange synchronization, billing and invoicing integration tools, onboarding services, technical support and end-user requests.
                                <br><br>
                                Browse industry leading cloud services from IDSync, MaaXcloud, Service Desk and more through Ingram Micro Cloud Marketplace.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="panel-solutions" class="container">
        <div class="row">
            <div class="col-md-9 col-sm-9">
                <section id="panel-body">
                    <div id="marketplace-container">
                        <div id="header-text">
                            <h2><strong>Cloud Marketplace</strong></h2>                            
                            <p>Research and purchase cloud management applications with real-time ordering, provisioning, managing and invoicing through the Ingram Micro Cloud Marketplace.</p>
                        </div>
                        <div id="category-solutions" class="text-center"><i class="fa fa-circle-o-notch fa-spin fa-3x"></i></div>
                    </div>
                    <div id="catalog-container-cms"></div>
                </section>
            </div>
            <div class="col-md-3 col-sm-3">
                 <?php if (is_active_sidebar('sidebar-1')) : ?>			
                    <?php dynamic_sidebar('sidebar-1'); ?>			
                <?php endif; ?>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>