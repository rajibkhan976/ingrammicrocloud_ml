<div class="portfolio-featured-slider">
	<?php
	$slides = get_post_meta(get_the_ID(), 'shiv_portfolio_slides', false);
	if ($slides) {
		echo '<div class="flexslider"><ul class="slides">';
		foreach ($slides as $slide) {
			$image_src = wp_get_attachment_image_src($slide, 'full');
			$image_src2 = wp_get_attachment_image_src($slide, 'portfolio-feat');
			$image_src = $image_src[0];
			$image_src2 = $image_src2[0];
			echo '<li><a href="' . $image_src . '" data-rel="prettyPhoto[ex-' . get_the_ID() . ']"><img src="' . $image_src2 . '" class="radius"></a></li>';
		};
		echo '</ul></div>';
	}
?>
</div>