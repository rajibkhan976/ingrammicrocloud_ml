<div class="portfolio-featured-image">
	<a data-rel="prettyPhoto" href="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post -> ID)); ?>" title="<?php the_title(); ?>">
	<?php the_post_thumbnail('portfolio-feat'); ?>
	</a>
</div>