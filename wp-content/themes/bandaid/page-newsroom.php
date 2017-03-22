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

<div id="become-a-partner" class="platform-page newsroom">
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

    <div id="panel-tabs" class="container">
        <div class="bs-example bs-example-tabs" data-example-id="togglable-tabs">
            <ul class="nav nav-tabs" id="myTabs" role="tablist">
                <li role="presentation" class="active"><a href="#latest-news" id="latest-news-tab" role="tab" data-toggle="tab" aria-controls="latest-news" aria-expanded="true"><strong>News Releases</strong></a>
                </li>
                <li role="presentation" class=""><a href="#in-the-news" role="tab" id="in-the-news-tab" data-toggle="tab" aria-controls="in-the-news" aria-expanded="false"><strong>In The News</strong></a>
                </li>
            </ul>
            <div class="row">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active in" role="tabpanel" id="latest-news" aria-labelledby="latest-news-tab">
                        <div class="col-md-9 col-sm-12">
                            <p class="welcome-newsroom"><i>Welcome to the Ingram Micro Cloud Newsroom</i></p>
                            <h2>News Releases</h2>
                            <?php
                            $cat_id = get_cat_ID('Press Releases');
                            $paged1 = isset($_GET['paged1']) ? (int) $_GET['paged1'] : 1;
                            $the_query = new WP_Query('showposts=10&paged=' . $paged1 . '&cat=' . $cat_id . '');

                            if ($the_query->have_posts()): while ($the_query->have_posts()) : $the_query->the_post();
                                    ?>
                                    <div class="press-block">
                                        <div class="row">

                                            <div class="col-sm-12">
                                                <h4 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                <div class="post">
                                                    <?php the_excerpt(); ?>
                                                    <p class="read-more-link">
                                                        <a href="<?php the_permalink(); ?>">
                                                            <?php _e('Read more &gt;', 'exquisite'); ?>
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                endwhile;
                                wp_reset_postdata();
                                ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="pagination color-white">
                                            <?php
                                            $url = '/newsroom/';
                                            $pag_args1 = array(
                                                'prev_text' => __('<'),
                                                'next_text' => __('>'),
                                                'show_all' => true,
                                                'type' => 'list',
                                                'base' => '' . $url . '?paged1=%#%',
                                                'format' => '?paged1=%#%',
                                                'current' => $paged1,
                                                'total' => $the_query->max_num_pages);
                                            echo paginate_links($pag_args1);
                                            ?>
                                        </div>
                                        <div class="spacer"></div>
                                    </div>
                                </div>
                                <?php
                                wp_reset_query();
                            endif;
                            ?>
                            <div class="spacer"></div>
                        </div>
                    </div>
                    <div class="tab-pane fade" role="tabpanel" id="in-the-news" aria-labelledby="in-the-news-tab">
                        <div class="col-md-9 col-sm-9">
                            <div class="row" style="margin-bottom: 15px;">
                                <div class="col-sm-12">
                                    <h2>In The News</h2>
                                    <?php
                                    $cat_id2 = get_cat_ID('In The News');
                                    $paged2 = isset($_GET['paged2']) ? (int) $_GET['paged2'] : 1;
                                    $the_query2 = new WP_Query('showposts=10&paged=' . $paged2 . '&cat=' . $cat_id2 . '');

                                    if ($the_query2->have_posts()): while ($the_query2->have_posts()) : $the_query2->the_post();
                                            ?>
                                            <div class="news-block">
                                                <div class="row">
                                                    <div class="col-sm-4 col-md-3">
                                                        <?php get_template_part('post-formats/single-news', get_post_format()); ?>
                                                    </div>
                                                    <div class="col-sm-8 col-md-9">
                                                        <h4 class="post-title"><a class="open-window" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
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
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pagination color-white">
                                        <?php
                                        $catstring2 = get_query_var('cat');
                                        $url2 = get_category_link($catstring2);
                                        $pag_args2 = array(
                                            'prev_text' => __('<'),
                                            'next_text' => __('>'),
                                            'show_all' => true,
                                            'base' => '' . $url2 . '?paged2=%#%' . '/#in-the-news',
                                            'format' => '?paged2=%#%',
                                            'current' => $paged2,
                                            'type' => 'list',
                                            'total' => $the_query2->max_num_pages);
                                        echo paginate_links($pag_args2);
                                        ?>
                                    </div>
                                    <div class="spacer"></div>
                                </div>
                            </div>
<?php
if ($the_query2->max_num_pages > 20) {
    ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="newsroom-archived">
                                            <a href="/in-the-news" class="page-scroll">
                                                <button class="btn btn-default btn-outline-gray">View more &gt;</button>
                                            </a>
                                        </div>
                                        <div class="spacer"></div>
                                    </div>
                                </div>
<?php } ?>
                            <?php
                            wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12">
<?php dynamic_sidebar('newsroom-sidebar'); ?>
                </div>
            </div>
        </div>
    </div>

</div>
<?php get_footer(); ?>
