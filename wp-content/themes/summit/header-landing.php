<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package summit
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<!-- Google Code for Remarketing Tag -->
<!--------------------------------------------------
Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. See more information and instructions on how to setup the tag on: http://google.com/ads/remarketingsetup
--------------------------------------------------->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 959482157;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/959482157/?value=0&amp;guid=ON&amp;script=0"/>
</div>
</noscript> 

<?php wp_head(); ?>

<script type="text/javascript"> 
    $(document).ready(function() {
    	console.log(location);
    	if (location.pathname == "/" && location.search == "?autoplay-video") {
	        $.colorbox({innerWidth:860,innerHeight:543,html:'<iframe width=856 height=538 src=https://www.youtube.com/embed/3FQFXt0QlNE?rel=0&amp;wmode=transparent&amp;autoplay=1&amp;color=white&amp;fs=1&amp;showinfo=0 frameborder=0 allowfullscreen></iframe>'});
    	}
    });
</script>

</head>

<body <?php body_class(); ?>>

<!--section class="mobile-header visible-xs-block">
	<div class="container">
		<div class="row micro-menu">
			<ul>
			<li><a href="<?php /* echo bloginfo('url'); */ ?>/why-attend">WHY ATTEND</a></li>
			<li><a href="<?php /* echo bloginfo('url'); */ ?>/agenda">AGENDA</a></li>
			<li><a href="<?php /* echo bloginfo('url'); */ ?>/sessions">SESSIONS</a></li>
			<li><a href="<?php /* echo bloginfo('url'); */ ?>/speakers">SPEAKERS</a></li>
			<li><a href="<?php /* echo bloginfo('url'); */ ?>/location">LOCATION</a></li>
			<li><a href="<?php /* echo bloginfo('url'); */ ?>/sponsors">SPONSORS</a></li>
			<li><a href="<?php /* echo bloginfo('url'); */ ?>/contact">CONTACT</a></li>
			<!--<li class="reg-btn"><a class="inline-pop" href="#inline-content">REGISTER</a>-->
<!--			</ul>
		</div>
		<div class="row">
			<a class="mini-menu" href="#"><i class="fa fa-bars"></i></a>
		</div>
	</div>
</section-->
