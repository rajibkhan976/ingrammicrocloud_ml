<?php
/**
 * Template Name: Careers
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

<div id="cloud-store" class="platform-page cloud-careers">
    <section id="panel-header">
        <div class="container">
            <div class="row">
                <div id="left-column" class="col-md-3 col-sm-3 text-center">
                    <div class="v-center">
                        <div class="v-in">                            
                            <h1 class="platform">Careers</h1>
                        </div>
                    </div>
                </div>
                <div id="right-column" class="col-md-9 col-sm-9">
                    <div class="v-center">
                        <div class="v-in">
                            <div id="category-description">
                                <div class="pannel-header-right">
                                    <p>Looking to help companies transform their businesses and achieve new levels of success? At Ingram Micro Cloud, we’re revolutionizing the cloud computing industry – and we want passionate, talented people by our side as we do it.</p>
                                    <p>We recognize that our people are our most important resource, which is why we’re committed to making Ingram Micro Cloud a great place to work. Our employees enjoy a stimulating, positive environment, with a well-cultivated corporate culture and inspiring leadership. We’re driven by ideas and fresh thinking, encouraging our team members’ creativity and rewarding superior performance. We’re also committed to developing our employees throughout their careers with Ingram Micro, because we know equipping our employees with the skills and expertise needed to achieve <i>their best</i> means we're at <i>our best</i>.</p>
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
            <div id="main-content" class="col-sm-10">
                <?php
                if (have_posts()) : while (have_posts()) : the_post();
                        the_content();
                    endwhile;
                endif;
                ?>
            </div>            
        </div>
    </div>
</div>
<?php get_footer(); ?>