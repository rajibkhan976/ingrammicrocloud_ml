<?php
/**
 * Template Name: Newsroom
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

<div id="cloud-store" class="platform-page newsroom">
    <section id="panel-header">
        <div class="container">
            <div class="row">
                <div id="left-column" class="col-md-3 col-sm-3 text-center">
                    <div class="v-center">
                        <div class="v-in">                            
                            <h1 class="platform">132564Newsroom</h1>
                        </div>
                    </div>
                </div>
                <div id="right-column" class="col-md-9 col-sm-9"></div>
            </div>
        </div>        
    </section>
    <div class="container">
        <div class="row">
            <div id="main-content" class="col-md-9 col-sm-12">
                <p class="welcome-newsroom"><i>Welcome to the Ingram Micro Cloud Newsroom</i></p>
                <h2>Latest News Releases</h2>
                <?php
                if (have_posts()) : while (have_posts()) : the_post();
                 the_content(); 
                endwhile;
                endif;
                ?>
            </div>
            <div class="col-md-3 col-sm-12">
                <?php echo get_sidebar('newsroom'); ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>