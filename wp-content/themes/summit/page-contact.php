<?php
/**
 * Template Name: Contact
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package summit
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

	<section class="sub-panel1">
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="logo">
						<a href="<?php echo get_bloginfo('url'); ?>"><img class="img-responsive" src="/wp-content/themes/summit//img/logo.png"></img></a>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section class="panel2">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<div class="left-border">
					<h2><?php the_title();?></h2>
					<br><br>
					<p>
					<strong>Ingram Micro Registration Headquarters</strong> <br>
					Toll-free: <a href="tel:1-866-400-0310">1-866-400-0310</a><br>
					Outside the U.S.: <a href="tel:1-312-396-2100">1-312-396-2100</a><br>
					E-mail: <a href="mailto:CloudSummit@bcdme.com">CloudSummit@bcdme.com</a><br>
					Hours of Operation: 08:00 AM – 06:00 PM C.S.T. (Monday - Friday)
					</p>
					
					</div>
				</div>
				<div class="col-sm-6">
					
				</div>
			</div>
		</div>
	</section>
	
	
	
	
	<section class="panel6">
		<div class="container">
			<div class="row">
			<div class="col-sm-9 sponsor-slider">
			  <div><img src="https://placehold.it/300x400"></img></div>
			  <div><img src="https://placehold.it/300x400"></img></div>
			  <div><img src="https://placehold.it/300x400"></img></div>
			  <div><img src="https://placehold.it/300x400"></img></div>
			  <div><img src="https://placehold.it/300x400"></img></div>
			  <div><img src="https://placehold.it/300x400"></img></div>
			  <div><img src="https://placehold.it/300x400"></img></div>
			  <div><img src="https://placehold.it/300x400"></img></div>
			  <div><img src="https://placehold.it/300x400"></img></div>
			  <div><img src="https://placehold.it/300x400"></img></div>
			  <div><img src="https://placehold.it/300x400"></img></div>
			  <div><img src="https://placehold.it/300x400"></img></div>
			</div>
			<div class="col-sm-3">
				YOUR LOGO HERE
				<button class="btn">BECOME A SPONSOR</button>
				<i class="fa fa-right-caret"></i>
			</div>
		</div>
		</div>
	</section>
	
	

<?php endwhile; // End of the loop. ?>


<?php get_footer(); ?>
