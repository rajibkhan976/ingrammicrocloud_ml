<?php get_header();
/*
 Template name: Blank (with container) Template
 */
?>
<?php
get_template_part('navigation');
?>

<?php while (have_posts()) : the_post(); ?>
<div class="container">
  <div class="sixteen columns">
    <div class="content">
      <?php the_content(); endwhile; ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>