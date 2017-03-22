<?php
/**
 * Template Name: Agenda
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
				<div class="col-sm-12">
					<div class="left-border">
					<h2><?php the_title();?></h2>
					
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section class="agenda-panel3">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<iframe frameborder="0" id="sched-iframed" scrolling="no" allowtransparency="true" src="https://cloudsummit2016.sched.org/?iframe=yes&amp;w=100%&amp;sidebar=yes&amp;bg=false&amp;mobileoff=Y"></iframe>
				</div>
			</div>
		</div>
	</section>


<?php endwhile; // End of the loop. ?>

<?php get_footer(); ?>
