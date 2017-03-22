<?php get_header(); ?>
<?php get_template_part('navigation');?>

<div class="page-section">
	<div class="container">
		<div class="twelve columns">
			<div class="content">
				<div class="error">
					<h1><?php _e('404', 'exquisite'); ?></h1>
					<h2><?php _e('Page not found', 'exquisite'); ?></h2>
				</div>
			</div>	
		</div>
		<div class="four columns"><div class="content">
			<?php get_sidebar('blog'); ?></div>
		</div>	
	</div>
</div>
			
<?php get_footer(); ?>