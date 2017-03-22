<div class="portfolio-featured-video">
	<?php
	if (get_post_meta(get_the_ID(), 'shiv_portfolio_video_type', true) == 'youtube') {
		echo '<div class="video"><iframe width="960" height="540"  src="http://www.youtube.com/embed/' . get_post_meta(get_the_ID(), 'shiv_portfolio_video_embed', true) . '?rel=0&amp;showinfo=0&amp;modestbranding=1&amp;hd=1&amp;autohide=1&amp;color=white" style="border:none;" allowfullscreen></iframe></div>';
	} else if (get_post_meta(get_the_ID(), 'shiv_portfolio_video_type', true) == 'vimeo') {
		echo '<div class="video"><iframe src="http://player.vimeo.com/video/' . get_post_meta(get_the_ID(), 'shiv_portfolio_video_embed', true) . '?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="960" height="540" style="border:none;" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>';
	}
	?>
</div>