<?php
/**
 * Template Name: Vertical Solutions
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

<div id="vertical-solutions" class="category-page">
    <section id="panel-header">        
        <div class="container">
            <div class="row">
                <div id="left-column" class="col-md-3 col-sm-3 text-center">
                    <div class="v-center">
                        <div class="v-in">
                            <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/icons/platforms/vertical-solution.png" alt="Vertical Solutions" />
                            <h1 class="bs-ap-title"><?php echo get_the_title(); ?></h1>
                        </div>
                    </div>                
                </div>
                <div id="right-column" class="col-md-9 col-sm-9">
                    <div class="v-center">
                        <div class="v-in">
                            <p class="category-description">
                                Provide industry-specific cloud applications developed by domain experts that address technology and regulatory compliance requirements for Government, Healthcare, Legal Services, Small Business, Retail and more. Vertical market software includes cloud solutions for IT consumerization, encryption, user management, device management, application management, information management, email tracking, secure messaging, document verification, data protection, hourly billing, online productivity tools and mobile device security.
                                <br><br>
                                Browse popular cloud services from Microsoft Office 365, Enterprise Mobility Suite, Exchange, Rmail, LawToolBox, Cirius Encryption, SkyKick, Trend Micro and more through Ingram Micro Cloud Marketplace.
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
                            <p>Research and purchase vertical cloud solutions with real-time ordering, provisioning, managing and invoicing through the Ingram Micro Cloud Marketplace.</p>
                        </div>
                        <div id="category-solutions" class="text-center"><i class="fa fa-circle-o-notch fa-spin fa-3x"></i></div>
                    </div>
                    <div id="catalog-container-vs"></div>
                </section>
            </div>
            <div class="col-md-3 col-sm-3">
                <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>			
		<?php dynamic_sidebar( 'sidebar-1' ); ?>			
		<?php endif; ?>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>