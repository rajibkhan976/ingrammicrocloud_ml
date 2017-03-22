<?php
/**
 * Template Name: Home
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package viral
 */
get_header();
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