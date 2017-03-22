<?php get_header();
/*
 Template name: Cloud Referral Step 1 Confirmation
 */
?>


<?php /*
get_template_part('navigation');
*/ ?>
<div style="background-color: #00A9F4; margin-top: -50px; padding: 60px 20px; height: 100%;">

<h1 class="h1-no-blue-line" style="color: #ffffff; text-align: center; line-height: 1;">Form submitted successfully!</h1>
<h5 style="color: #ffffff; text-align: center;">Step 2: <a style="color: #ffffff; text-decoration: underline;" href="/referral/step-2/" target="_blank">Submit payment forms</a>.</h5>

<?php while (have_posts()) : the_post(); ?>
<div id="page-content">
	<?php the_content(); endwhile; ?>

</div>
<?php /* get_footer(); */ ?>
