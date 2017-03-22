<?php
/**
 * Template Name: Subpage
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
					
					</div>
				</div>
				<div class="col-sm-6">
					
				</div>
			</div>
		</div>
	</section>
	
	<section class="speakers-panel3">
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<img class="img-responsive" src="<?php echo bloginfo('template_url'); ?>/img/buzz-small.jpg"></img>
				</div>
				<div class="col-sm-9">
					<h2>Buzz Aldrin</h2>
					<h3>Astronaut</h3>
					<p>Edwin Eugene Aldrin Jr., known as Buzz Aldrin, is an American engineer and former astronaut, and the second person to walk on the Moon. He was the Lunar Module Pilot on Apollo 11, the first manned lunar landing in history. Upon returning from the moon, Buzz was decorated with the Presidential Medal of Freedom, the highest American peacetime award. A 45-day international goodwill tour followed, where he received numerous distinguished awards and medals from 23 other countries. Named after Buzz are Asteroid “6470 Aldrin” and the “Aldrin Crater” on the moon. Buzz and his Apollo 11 crew have four “stars” on each corner of Hollywood and Vine streets on the renowned Hollywood Walk of Fame.</p>
				</div>
			</div> 
			<br><br>
			<div class="row">
				<div class="col-sm-3">
					<img class="img-responsive" src="<?php echo bloginfo('template_url'); ?>/img/nimesh-small.jpg"></img>
				</div>
				<div class="col-sm-9">
					<h2>Nimesh Davé</h2>
					<h3>EVP, Global Cloud, Ingram Micro</h3>
					<p>Nimesh Davé serves as executive vice president, global business process and cloud computing of Ingram Micro Inc., the world’s largest technology distributor and supply-chain services provider based in Irvine, Calif. As a member of the Ingram Micro worldwide executive team, Davé is responsible for designing and implementing harmonized global business practices throughout the organization and architecting world class solutions to meet our diverse customer needs. He joined the company in September 2012. Prior to joining Ingram Micro, Davé served most recently as senior vice president, commercial operations, strategy and supply-chain solutions for Tech Data Europe. While in this role he led several major transformation initiatives and spearheaded the formation of a supply chain services division. Prior to taking on the operations and strategy role, Dave’ held senior executive roles in Information Technology in the America’s and Europe, where he led major ERP, infrastructure and commerce application deployments.</p>
				</div>
			</div>
			<br><br>
			<div class="row">
				<div class="col-sm-3">
					<img class="img-responsive" src="<?php echo bloginfo('template_url'); ?>/img/renee-small.jpg"></img>
				</div>
				<div class="col-sm-9">
					<h2>Renée Bergeron</h2>
					<h3>Vice President, Global Cloud Computing, Ingram Micro</h3>
					<p>Renée Bergeron serves as Vice President, Global Cloud Computing, Ingram Micro. She leads the Ingram Micro Cloud Division and has responsibility for the division’s organizational management as well as its strategic direction, sales growth and business development activities. With more than 25 years of business-unit leadership experience, Bergeron is a driving force behind identifying and cultivating new opportunities in cloud computing for Ingram Micro. Bergeron joined Ingram Micro in September 2010. Most recently, she led the $300 million IT Services Solutions business at Fujitsu America. At Fujitsu America Bergeron oversaw the development of innovative solutions, most notably the company’s managed security, data center virtualization and cloud computing offerings. Prior to joining Fujitsu, she led information technology divisions at media and banking companies and was a director at a prominent international technology consulting firm. Bergeron holds a bachelor of science degree in computer science from Sherbrooke University in Sherbrooke, Canada, and a master’s degree from McGill University in Montreal, Canada. She is based at Ingram Micro’s headquarters in Irvine, Calif.</p>
				</div>
			</div>
			<br><br>
			
		</div>
	</section>
	
<?php endwhile; // End of the loop. ?>

<?php get_footer(); ?>
