<?php if ( has_post_thumbnail() ) {
?>
<div class="post-featured-image">
	<a class="open-window" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"> <?php the_post_thumbnail('post-featured-image'); ?></a>
</div>
<?php } ?>


		
		
		
	