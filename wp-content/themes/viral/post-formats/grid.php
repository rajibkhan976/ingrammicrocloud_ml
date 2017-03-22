<?php if ( has_post_thumbnail() ) { 
	?>
	<?php 
	$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'post-featured-image-grids' );
	$thumbnail = $thumbnail[0];
	?>
	
<div class="recent-content-item radius grid" style="background:#fff url('<?php echo $thumbnail; ?>') no-repeat">
	<div class="overlay-add">
	<div class="overlay-title-blog">
		<?php echo get_the_title($post -> ID);
		?>
	</div>
	<div class="overlay-date">
		<?php echo get_the_date('F j, Y');
		?>
	</div>
	</div>
	<div class="recent-overlay"></div>
	<div class="recent-overlay-content">
		<div class="layer">
			<a rel="<?php the_permalink(); ?>" href="<?php the_permalink(); ?>"> <IMG SRC="<?php echo get_template_directory_uri(); ?>/images/link.png" alt="Details"></a>
		</div>
	</div>
</div>
<?php } ?>