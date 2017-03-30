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
<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
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
    jQuery(document).ready(function() {
        console.log(location);
        if (location.pathname == "/" && location.search == "?autoplay-video") {
            $.colorbox({innerWidth:860,innerHeight:543,html:'<iframe width=856 height=538 src=https://www.youtube.com/embed/3FQFXt0QlNE?rel=0&amp;wmode=transparent&amp;autoplay=1&amp;color=white&amp;fs=1&amp;showinfo=0 frameborder=0 allowfullscreen></iframe>'});
        }
    });
</script>

</head>

<body <?php body_class(); ?>>
<div class="upper-nav-bar">
        <div class="container">
            <div class="sixteen columns">
                <div id="left-bar-top">                    
                    <div class="bar-item"><i class="fa fa-phone"></i><a href="#">+1 (877) 646 2988</a></div>
                    <div class="bar-item"><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:cloudsummit@ingrammicro.com">cloudsummit@ingrammicro.com</a></div>
                                            
                </div>
                <div id="super-menu">
                    <?php //wp_nav_menu(array('theme_location' => 'super-menu', 'menu_id' => 'country-mega-menu', 'container' => false, 'menu_class' => 'nav')); ?>                    
                </div><!-- /super-menu -->
                
                <div style="float:right;" class="right-menu">
					<div id="socioicondiv">
                    <a href="https://www.linkedin.com/company/im_cloud" class="social" target="_blank"><i class="fa fa-linkedin"></i></a>
                    <a href="https://twitter.com/IngramCloud" class="social" target="_blank"><i class="fa fa-twitter"></i></a>
                    <a href="https://www.facebook.com/ingrammicrocloud" class="social" target="_blank"><i class="fa fa-facebook"></i></a>
                    <a href="https://www.youtube.com/user/IngramMicroServices" class="social" target="_blank"><i class="fa fa-youtube"></i></a>
                    <a href="https://plus.google.com/u/0/b/114901709326239147387/+Ingrammicrocloud" class="social" target="_blank"><i class="fa fa-google-plus"></i></a>
                    <a href="https://www.instagram.com/ingrammicrocloud/?hl=en" class="social" target="_blank"><i class="fa fa-instagram"></i></a>
                    <!--a href="' . $smof_data['vimeo_url'] . '" class="social" target="_blank"><i class="fa fa-vimeo-square"></i></a>
                    <a href="' . $smof_data['dribbble_url'] . '" class="social" target="_blank"><i class="fa fa-dribbble"></i></a>
                    <a href="' . $smof_data['rss_url'] . '" class="social" target="_blank"><i class="fa fa-rss"></i></a>
                   <a href="' . $smof_data['flickr_url'] . '" class="social" target="_blank"><i class="fa fa-flickr"></i></a>
                   <a href="' . $smof_data['tumblr_url'] . '" class="social" target="_blank"><i class="fa fa-tumblr"></i></a>
                   <a href="' . $smof_data['pinterest_url'] . '" class="social" target="_blank"><i class="fa fa-pinterest"></i></a>
                    <a href="' . $smof_data['github_url'] . '" class="social" target="_blank"><i class="fa fa-github"></i></a>
                    <a href="mailto:' . $smof_data['email_url'] . '" class="social" target="_blank"><i class="fa fa-envelope-o"></i></a>
                  <a href="' . $smof_data['website_url'] . '" class="social" target="_blank"><i class="fa fa-align-justify"></i></a-->
                </div>
                	<span><a href="http://www.cvent.com/d/3fqj0t/8C?ct=b352e06e-1055-4907-9c5c-a2c67385b62d&RefID=Attendee" target="_blank" class="btn btn-outline-gray" role="button">SOLUTION PROVIDERS REGISTER NOW</a></span>
                	<span><a href="http://www.cvent.com/d/3fqj0t/8C?ct=7d255523-8346-43b0-aeee-3dc286bbf267&RefID=Media-Press" target="_blank" class="btn btn-outline-gray" role="button">PRESS/MEDIA REGISTER NOW</a></span>
                    
                    </div>
            </div>
        </div>
    </div>
<div class="nav-bar sticky">
    <div class="container">
        <div class="three columns" id="mobile">
            <div id="logo">
                
                    <a href="http://www.ingrammicrocloudsummit.com/"><img src="http://ingrammicrocloudsummit.com/wp-content/uploads/2016/11/IM-Logo-topnavFINAL.png"/></a>
                
            </div>
            <div class="toggle">
                <a href="#menu" class="toggleMenu"><span></span></a></div>
        </div>
        <div id="menu" class="thirteen columns">
            <div class="container-menu fa">
                <?php                       
                        wp_nav_menu(array('container' => '', 'menu_id' => 'primary-menu', 'menu_class' => 'nav', 'theme_location' => 'primary'));
                    
                    ?>
                
            </div>
        </div>
    </div>
</div>
<hr class="nav-blue-border">
