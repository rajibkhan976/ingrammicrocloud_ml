<?php if ( has_post_thumbnail() ) {
?>
<div class="post-featured-image">
	<a data-rel="ingramPhoto" href="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post -> ID)); ?>" title="<?php the_title(); ?>"> <?php the_post_thumbnail('post-featured-image'); ?></a>
</div>
<?php } ?>