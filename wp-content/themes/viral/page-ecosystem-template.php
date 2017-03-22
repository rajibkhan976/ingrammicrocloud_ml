<?php get_header();
/*
 Template name: Ecosystem Template
 */
?>
<?php
get_template_part('navigation');
?>

<?php while (have_posts()) : the_post(); ?>
<div id="page-content" style="background-color:#d3d3d3; text-align: center; padding: 40px 0 0;">
	<?php the_content(); endwhile; ?>
<div id="test-div" style="height: 40px;"></div>
<?php get_footer(); ?>