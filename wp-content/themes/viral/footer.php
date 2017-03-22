<?php
global $smof_data;
$animations = $smof_data['frontpage_animations'];
if ($smof_data['widgetized'] == 1) {
?>
<div class="footer-widgetized-section">	
	<div class="container">
		<div class="sixteen columns">
			<div class="one-third column alpha">
				<div class="padder-one-third-alpha">
				<?php
    if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-widget-1'))
?>
				</div>
			</div>
			<div class="one-third column">
				<div class="padder-one-third">
				<?php
    if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-widget-2'))
?>
				</div>
			</div>
			<div class="one-third column omega">
				<div class="padder-one-third-omega">
				<?php
    if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-widget-3'))
?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
}
?>
<a href="#top" id="smoothup" title="Back to top"><i class="fa fa-arrow-up"> </i></a>
<div class="footer-section">
	<div class="container">
		<div class="sixteen columns">
			<div class="footer">
				<div id="left-bar">
				<?php
if ($smof_data['footer_copyright']) {
?>
				<p class="footer-text"><?php
    echo $smof_data['footer_copyright'];
?></p>
				<?php
}
?>	
			</div>
			<div id="right-bar">
				<?php
if ($smof_data['linkedin_url'])
    echo '<a href="' . $smof_data['linkedin_url'] . '" class="social" target="_blank"><i class="fa  fa-linkedin"></i></a>';
?>
				<?php
if ($smof_data['facebook_url'])
    echo '<a href="' . $smof_data['facebook_url'] . '" class="social" target="_blank"><i class="fa  fa-facebook"></i></a>';
?>
				<?php
if ($smof_data['twitter_url'])
    echo '<a href="' . $smof_data['twitter_url'] . '" class="social" target="_blank"><i class="fa  fa-twitter"></i></a>';
?>
				<?php
if ($smof_data['youtube_url'])
    echo '<a href="' . $smof_data['youtube_url'] . '" class="social" target="_blank"><i class="fa  fa-youtube"></i></a>';
?>
				<?php
if ($smof_data['google_url'])
    echo '<a href="' . $smof_data['google_url'] . '" class="social" target="_blank"><i class="fa  fa-google-plus"></i></a>';
?>
				<?php
if ($smof_data['dribbble_url'])
    echo '<a href="' . $smof_data['dribbble_url'] . '" class="social" target="_blank"><i class="fa  fa-dribbble"></i></a>';
?>
				<?php
if ($smof_data['rss_url'])
    echo '<a href="' . $smof_data['rss_url'] . '" class="social" target="_blank"><i class="fa  fa-rss"></i></a>';
?>
				<?php
if ($smof_data['flickr_url'])
    echo '<a href="' . $smof_data['flickr_url'] . '" class="social" target="_blank"><i class="fa  fa-flickr"></i></a>';
?>
				<?php
if ($smof_data['vimeo_url'])
    echo '<a href="' . $smof_data['vimeo_url'] . '" class="social" target="_blank"><i class="fa  fa-vimeo-square"></i></a>';
?>
				<?php
if ($smof_data['tumblr_url'])
    echo '<a href="' . $smof_data['tumblr_url'] . '" class="social" target="_blank"><i class="fa  fa-tumblr"></i></a>';
?>
				<?php
if ($smof_data['pinterest_url'])
    echo '<a href="' . $smof_data['pinterest_url'] . '" class="social" target="_blank"><i class="fa  fa-pinterest"></i></a>';
?>
				<?php
if ($smof_data['github_url'])
    echo '<a href="' . $smof_data['github_url'] . '" class="social" target="_blank"><i class="fa  fa-github"></i></a>';
?>
				<?php
if ($smof_data['instagram_url'])
    echo '<a href="' . $smof_data['instagram_url'] . '" class="social" target="_blank"><i class="fa  fa-instagram"></i></a>';
?>
				<?php
if ($smof_data['email_url'])
    echo '<a href="mailto:' . $smof_data['email_url'] . '" class="social" target="_blank"><i class="fa  fa-envelope-o"></i></a>';
?>
				<?php
if ($smof_data['website_url'])
    echo '<a href="' . $smof_data['website_url'] . '" class="social" target="_blank"><i class="fa  fa-align-justify"></i></a>';
?>
				
			</div>
		
			</div>
		</div>
	</div>
</div>

<!-- STYLE SWITCHER -->
<div id="switch">
	<i class="fa fa-gear"></i>
</div>
<div id="switcher">
	<div class="options">
		<span class="head">COLOR SCHEME</span>
	<ul>
		<li class="default">
			<a href="<?php
echo home_url();
?>?style=default" id="col-default" title="default"> </a>
		</li>
		
		<li class="blue">
			<a href="<?php
echo home_url();
?>?style=blue" id="col-blue" title="blue"> </a>
		</li>
		
		<li class="blue">
			<a href="<?php
echo home_url();
?>?style=orange" id="col-orange" title="orange"> </a>
		</li>
		
		<li class="blue">
			<a href="<?php
echo home_url();
?>?style=hotpink" id="col-hotpink" title="hotpink"> </a>
		</li>
		
		<li class="blue">
			<a href="<?php
echo home_url();
?>?style=lightpink" id="col-lightpink" title="lightpink"> </a>
		</li>
		
		<li class="blue">
			<a href="<?php
echo home_url();
?>?style=gray" id="col-gray" title="gray"> </a>
		</li>
		
		<li class="blue">
			<a href="<?php
echo home_url();
?>?style=sunny" id="col-sunny" title="sunny"> </a>
		</li>
		
		<li class="blue">
			<a href="<?php
echo home_url();
?>?style=green" id="col-green" title="green"> </a>
		</li>
		
	</ul>
	<span class="foot">Unlimited color options are avaliable via Options Panel.</span>
	

	</div>
</div>

<!-- STYLE SWITCHER END -->
<?php
wp_footer();
?>

<script type="text/javascript">
jQuery.noConflict();
	(function($) {
		"use strict";
	$(document).ready(function() {
			
    var col0_content_menu = $('#col0_structure_menu').html();
    var col1_content_menu = $('#col1_structure_menu').html();
    var col2_content_menu = $('#col2_structure_menu').html();

	var col0_content_page = $('#col0_structure_page').html();
	var col1_content_page = $('#col1_structure_page').html();
	var col2_content_page = $('#col2_structure_page').html();


    var rightcol_content = $('#rightcol_structure').html();
    var header1_content = $('#header1').html();
    var header2_content = $('#header2').html();


      $('.ubermenu-column-1-3:eq(0)').empty().append(col0_content_menu);
      $('.ubermenu-column-1-3:eq(1)').empty().append(col1_content_menu);
      $('.ubermenu-column-1-3:eq(2)').empty().append(col2_content_menu);
      $('#all-cloud-services').closest('ul').append(rightcol_content);

      $('#col0').html(col0_content_page);
      $('#col1').html(col1_content_page);
      $('#col2').html(col2_content_page);

      $('#cloud-marketplace-solutions').empty().html(header1_content);
      $('#all-cloud-services').empty().html(header2_content);



<!-- Cloud Store -->

    $('#play').on('click', function() {
        $('#video-iframe').attr('src', 'https://www.youtube.com/embed/rQd1lBAt14A?rel=0&showinfo=0&autoplay=1');
        $('.videoWrapper').removeClass('invisible');
        setTimeout(function() {
            $('#lights-out').removeClass('invisible');
        }, 500);
        $('.relative').addClass('invisible');
    });

    $('#video-close').on('click', function() {
        $('#video-iframe').attr('src', '');
        $('.videoWrapper, #lights-out').addClass('invisible');
        $('.relative').removeClass('invisible');
    })

<!-- /Cloud Store -->


				// STYLE SWITCHER
		$(function($){
    	$('#switch').on('click', function(){
        $(this).toggleClass('active');
    });
})
		
	<?php
if ($animations == 1) {
?>
		animate_me();
	<?php
}
?>
	
	// hide empty containers
	function isEmpty( el ){
      return !$.trim(el.html())
 	}
	$('.content').each(function() {
		
		 if (isEmpty($(this))) {
      $(this).css('display', 'none');
  	}
	});
	
	<?php
if (is_front_page()) {
?>
		$('.menu-item-first a').addClass('test');
	<?php
}
?>
		$('.flexslider').flexslider({
			animation : "fade",
			slideDirection : "horizontal",
			slideshow : true,
			slideshowSpeed : 3500,
			animationDuration : 500,
			directionNav : true,
			controlNav : true
		});
	});
})(jQuery);
</script>
<?php
$pagetype = $smof_data['pagetype'];
if ($pagetype == "boxed") {
    echo '</div>';
}
?>
<?php
wp_footer();
?>

</body>
</html>