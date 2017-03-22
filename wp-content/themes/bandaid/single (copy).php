<?php get_header(); ?>

<?php
if (have_posts()) : while (have_posts()) : the_post();
        $post_name = $post->post_name;
        $post_id = get_the_ID();
        $cat_slug = get_the_category($post_id);
        if ($cat_slug[0]->slug == "press-releases") {
            ?>
            <div id="cloud-store" class="platform-page newsroom">
                <section id="panel-header">
                    <div class="container">
                        <div class="row">
                            <div id="left-column" class="col-md-3 col-sm-3 text-center">
                                <div class="v-center">
                                    <div class="v-in">                            
                                        <h1 class="bs-ap-title">
                                            <span class="platform">Newsroom</span>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                            <div id="right-column" class="col-md-9 col-sm-9">

                            </div>
                        </div>
                    </div>        
                </section>
            </div>
            <div <?php post_class(); ?>>           
                <div class="page-section-continued blog-page blog-page-details single-blog">
                    <div class="container">
                        <div class="row content">
                            <div class="col-md-9">
                                <div class="blog-left">
                                    <div class="row">                                        
                                        <div class="col-md-12 col-sm-12">
                                            <div class="blog-in-right">
                                                <h2>News Release</h2>
                                                <h4 class="post-title"><?php the_title(); ?></h4>                                                    
                                                <div class="post">
                                                    <?php the_content('', FALSE); ?>

                                                    <span class="archived-releases-pagination-span">
                                                        <?php previous_post_link('%link', '&lt;', TRUE); ?>
                                                        <?php next_post_link('%link', '&gt;', TRUE); ?>
                                                    </span>

                                                    <a href="/newsroom" class="page-scroll pull-right"><button class="btn btn-default btn-outline-gray">Newsroom &gt;</button></a>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <?php
                                echo get_sidebar('newsroom');
                                ?>
                            </div>
                        </div>                        

                    </div>
                </div>
            </div>
        <?php } else { ?>
            <div id="blog" class="platform-page">
                <section id="panel-header">
                    <div class="container">
                        <div class="row">
                            <div id="left-column" class="col-md-3 col-sm-3">
                                <div class="v-center">
                                    <div class="v-in">
                                        <h1>
                                            <span class="platform">Blog</span>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                            <div id="right-column" class="col-md-9 col-sm-9">

                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div <?php post_class(); ?>>           
                <div class="page-section-continued blog-page blog-page-details single-blog">
                    <div class="container">
                        <div class="row content">
                            <div class="col-md-9">
                                <div class="blog-left">
                                    <div class="row">
                                        <div class="col-md-2 col-sm-3">
                                            <div class="the-blog-date">

                                                <h2><?php echo get_the_date('M d'); ?></h2>
                                                <h3><?php echo get_the_date('Y'); ?></h3>
                                            </div>
                                        </div>
                                        <div class="col-md-10 col-sm-9">
                                            <div>
                                                <div class="blog-in-right">
                                                    <?php get_template_part('post-formats/single', get_post_format()); ?>
                                                    <h4 class="post-title"><?php the_title(); ?></h4>
                                                    <div class="postinfo">
                                                        <div class="post-author"><i class="fa fa-pencil"> </i><b>
                                                                <?php echo '' . __('Posted by: ', 'exquisite') . ' <span>' . get_the_author_link() . '</span>'; ?> </b>
                                                        </div>
                                                        <div class="post-category"><i class="fa fa-folder-open"> </i>
                                                            <?php echo '' . __('in ', 'exquisite') . ' <span>' . get_the_category_list(', ', 'single', $post->ID) . '</span>'; ?>
                                                        </div>
                                                        <div class="comments-links"><i class="fa fa-comments"> </i>
                                                            <a href="<?php comments_link(); ?>" title="<?php comments_number(); ?>"><?php comments_number(); ?></a>
                                                        </div>
                                                        <?php
                                                        if (has_tag()) {
                                                            the_tags('<div class="posttags"><i class="fa fa-tags"> </i><p class="post-tags">Tags: ', ', ', '</p></div>');
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="post">
                                                        <?php the_content('', FALSE); ?>
                                                    </div>
                                                    <?php wp_link_pages(); ?>
                                                    <?php //comments_template(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <?php
                                dynamic_sidebar('blog-sidebar');
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php
    endwhile;
else :
    ?>
    <p><?php _e('No posts found', 'exquisite'); ?></p>
<?php
endif;
wp_reset_query();
?>
<?php get_footer(); ?>