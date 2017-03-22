<?php get_header(); ?> 

<div class="page-section">
    <div class="page-heading">
        <div class="container">
            <div class="sixteen columns table">
                <div class="twelve columns alpha cell">
                    <h4><?php if (is_category()) { ?>
                            <?php _e('Category: ', 'exquisite'); ?><?php single_cat_title(); ?>
                        <?php } elseif (is_tag()) { ?>
                            <?php _e('Posts tagged: ', 'exquisite'); ?><?php single_tag_title(); ?>
                        <?php } elseif (is_day()) { ?>
                            <?php _e('Archive for: ', 'exquisite'); ?><?php the_time('F jS, Y'); ?>
                        <?php } elseif (is_month()) { ?>
                            <?php _e('Archive for: ', 'exquisite'); ?><?php the_time('F, Y'); ?>
                        <?php } elseif (is_year()) { ?>
                            <?php _e('Archive for: ', 'exquisite'); ?><?php the_time('Y'); ?>
                        <?php } else _e('Archives', 'exquisite'); ?></h4>
                </div>
                <div class="four columns omega cell">

                </div>
            </div>
        </div>
    </div>
</div>	
<div class="page-section-continued blog-page blog-page-details">
    <div class="container">
        <div class="row content">
            <div class="col-md-9 col-sm-9">
                <div class="row">
                    <div class="col-sm-12">
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                <div class="blog-left">
                                    <div class="row">
                                        <div class="col-md-2 col-sm-3">
                                            <div class="the-blog-date">
                                                <h2><?php echo get_the_date('M d'); ?></h2>
                                                <h3><?php echo get_the_date('Y'); ?></h3>
                                            </div>
                                        </div>
                                        <div class="col-md-10 col-sm-9">
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
                                                    <?php the_excerpt(); ?>
                                                    <p class="read-more-link"><a href="<?php the_permalink(); ?>"><?php _e('Read more...', 'exquisite'); ?></a></p>
                                                </div>
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
                        <div class="pagination">
                            <?php
                            if (get_next_posts_link() || get_previous_posts_link()) {
                                paginate();
                            }
                            ?>
                        </div>
                        <div class="spacer"></div>

                    </div>
                </div>
                <?php
                wp_reset_query();
                ?>
            </div>
            <div class="col-md-3 col-sm-3">
                <?php dynamic_sidebar('blog-sidebar'); ?>
            </div>
        </div>
    </div>
</div>	
<?php get_footer(); ?>