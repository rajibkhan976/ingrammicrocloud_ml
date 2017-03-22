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
                            <h1 class="bs-ap-title platform">Careers</h1>
                        </div>
                    </div>
                </div>
                <div id="right-column" class="col-md-9 col-sm-9">
                    <div class="v-center">
                        <div class="v-in">
                            <div id="category-description">
                                <div class="pannel-header-right">
                                    <p>We recognize that our people are our most important resource which is why we hire and retain only the best in the industry. We are committed to creating a positive environment with a well cultivated corporate culture and inspiring leadership. We encourage creativity and reward superior performance.</p>
                                    <p>Ingram Micro Cloud offers a stimulating, positive and fulfilling working environment, driven by ideas and fresh thinking. You will enjoy the challenges you need to achieve your full potential - and you will be able to feel part of the company's progress. We are committed to developing our employees throughout their careers with us. After all, by equipping our employees with the skills and expertise needed to achieve their best, we will grow the business and help our employees more.</p>
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