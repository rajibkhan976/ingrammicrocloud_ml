<div class="post-featured-quote">
	<?php $quote = get_post_meta(get_the_ID(), 'shiv_featured_quote', true);
	$source = get_post_meta(get_the_ID(), 'shiv_featured_source', true);
	?>
	<blockquote class="featured-quote">
	<?php echo $quote; ?>
		<cite><?php echo $source; ?></cite>
	</blockquote>
</div>
	
	