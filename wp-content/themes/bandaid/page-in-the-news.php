<?php
/**
 * Template Name: In The News
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
                            <h1 class="platform">Newsroom</h1>
                        </div>
                    </div>
                </div>
                <div id="right-column" class="col-md-9 col-sm-9"></div>
            </div>
        </div>        
    </section>   
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-9">                
                <h2>In The News</h2>
                <div class="row">
                    <div class="col-sm-12">	
                        <?php
                        query_posts("post_type=post &posts_per_page=20 &cat=" . get_cat_ID('In The News') . "&paged=" . get_query_var('paged').'&orderby=date&order=DESC');
                        if (have_posts()): while (have_posts()) : the_post();
                                $post_name = $post->post_name;
                                $post_id = get_the_ID();
                                ?>
                                <div class="news-block">
                                    <div class="row">                                            
                                        <div class="col-sm-3">                                                
                                            <?php get_template_part('post-formats/single', get_post_format()); ?>
                                        </div>
                                        <div class="col-sm-9">                                                
                                            <h4 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                            <div class="post">
                                                <?php echo get_the_date('d F, Y'); ?>             
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            endwhile;
                        endif;
                        ?>
                    </div>
                </div>
                <p>&nbsp;</p>
                <div class="row">
                    <div class="col-md-9">
                        <div class="archived-releases-pagination">
                            <?php
                            if (get_next_posts_link() || get_previous_posts_link()) {
                                paginate();
                            }
                            ?>
                        </div>                
                    </div>                
                    <div class="col-md-3">
                        <div class="newsroom-archived">
                            <a href="/newsroom/#in-the-news" class="page-scroll"><button class="btn btn-default btn-outline-gray">Latest In The News &gt;</button></a>
                        </div>
                    </div>
                </div>
                <p>&nbsp;</p>
                <?php
                wp_reset_query();
                ?>
            </div>
            <div class="col-md-3 col-sm-12">
                <?php dynamic_sidebar('newsroom-sidebar');//echo get_sidebar('newsroom'); ?>
            </div>
        </div>        
    </div>
</div>
<?php get_footer(); ?>