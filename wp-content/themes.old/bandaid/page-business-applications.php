<?php
/**
 * Template Name: Category
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bandaid
 */

get_header(); ?>

	<div class="category-page">
		<section id="panel-header">
			<div class="container">
				<div class="row">
					<div id="left-column" class="col-md-4 col-sm-4">
						<div class="row">
							<div id="icon" class="col-md-4 col-sm-4"></div>
							<div class="col-md-8 col-sm-8">
								<h1><?php echo get_the_title(); ?></h1>
							</div>
						</div>
					</div>
					<div class="col-md-8 col-sm-8">
						<h2 id="category-description"></h2>
					</div>
				</div>
			</div>
		</section>
		
		<section id="panel-solutions" class="container">
			<div class="row">
				<div class="col-md-9 col-sm-9">
					<section id="panel-body">
						<div id="marketplace-container">
							<div id="header-text">
								<h3><strong>Cloud Marketplace</strong></h3>
								<!--<h4>Real-time ordering, provisioning, managing and invoicing</h4>-->
								<h4>Research and purchase cloud business applications with real-time ordering, provisioning, managing and invoicing though the Ingram Micro Cloud Marketplace.</h4>
							</div>
							<div id="category-solutions" class="text-center"><i class="fa fa-circle-o-notch fa-spin fa-3x"></i></div>
						</div>
						<div id="catalog-container" class="row"></div>
					</section>
				</div>
				<div class="col-md-3 col-sm-3">
					<?php echo get_sidebar('category-pages'); ?>
				</div>
			</div>
		</section>
		
	</div>

<?php get_footer(); ?>