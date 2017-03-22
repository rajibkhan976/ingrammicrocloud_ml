<?php get_header();

/*
 Template name: Frontpage Template
 */
?>
<?php
get_template_part('navigation');
get_template_part('slider');
?>
<div class="pagecontent">
	<?php $pages = array('posts_per_page' => '-1', 'post_type' => 'page', 'orderby' => 'menu_order', 'order' => 'ASC');
	$pages_query = new WP_Query($pages);
	while ($pages_query -> have_posts()) : $pages_query -> the_post();

		$onepage = get_post_meta($post -> ID, "shiv_include", true);
		$page_bg = get_post_meta($post -> ID, "shiv_page_background", true);

		$template = get_post_meta($post -> ID, '_wp_page_template', true);

		if ($onepage == 1) :

			if ($template == 'portfolio.php') {
				get_template_part('onepage', 'portfolio');
			} else if ($template == 'blog.php') {
				get_template_part('onepage', 'blog');
			} else {

				if ($page_bg == 0) {
					get_template_part('post-formats/page', 'content');
				} else {
					get_template_part('post-formats/page', 'parallax');
				}

			}
		endif;
	endwhile;
	wp_reset_query();
?>
</div>
<?php get_footer(); ?>