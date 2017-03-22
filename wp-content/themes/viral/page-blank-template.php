<?php get_header();
/*
 Template name: Blank Template
 */
?>
<?php
get_template_part('navigation');
?>

<?php while (have_posts()) : the_post(); ?>
<div id="page-content">
	<?php the_content(); endwhile; ?>

<?php get_footer(); ?>