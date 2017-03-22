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
<link rel="shortcut icon" href="http://www.dev.ingrammicrocloud.com/wp-content/uploads/sites/2/2014/09/favicon-2.png">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<section class="mobile-header visible-xs-block">
	<div class="container">
		<div class="row micro-menu">
			<ul>
			<li><a href="<?php echo bloginfo('url'); ?>">HOME</a></li>
			<li><a href="<?php echo bloginfo('url'); ?>/agenda">AGENDA</a></li>
			<li><a href="<?php echo bloginfo('url'); ?>/location">EVENT LOCATION</a></li>
			<li><a href="<?php echo bloginfo('url'); ?>/speakers">SPEAKERS</a></li>
			<li><a href="<?php echo bloginfo('url'); ?>/contact">CONTACT</a></li>
			<li class="reg-btn"><a class="inline-pop" href="#inline-content">REGISTER</a>
			</ul>
		</div>
		<div class="row">
			<a class="mini-menu" href="#"><i class="fa fa-bars"></i></a>
		</div>
	</div>
</section>

<section class="header">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-right">
				<ul class="nav">
					<li><a href="<?php echo bloginfo('url'); ?>">HOME</a></li>
					<li><a href="<?php echo bloginfo('url'); ?>/agenda">AGENDA</a></li>
					<li><a href="<?php echo bloginfo('url'); ?>/location">EVENT LOCATION</a></li>
					<li><a href="<?php echo bloginfo('url'); ?>/speakers">SPEAKERS</a></li>
					<li><a href="<?php echo bloginfo('url'); ?>/contact">CONTACT</a></li>
					<li class="reg-btn"><a class="inline-pop" href="#inline-content">REGISTER</a>
					<!--<ul class="sub-menu">-->
					<!--	<li><a target="_blank" href="https://www.cvent.com/events/ingram-micro-cloud-summit-us-2016/registration-7ae82a097bbc43ccbebeb62d80361814.aspx?i=a468b0a1-ffd8-4364-b3e5-b2a4490557f0">Solution Provider</a></li>-->
					<!--	<li><a target="_blank" href="https://www.cvent.com/events/ingram-micro-cloud-summit-us-2016/registration-7ae82a097bbc43ccbebeb62d80361814.aspx?i=e27a34d3-c3a0-4595-ae55-ec5dd2805058">Sponsor</a></li>-->
					<!--	<li><a target="_blank" href="http://www.cvent.com/events/ingram-micro-cloud-summit-us-2016/event-summary-7ae82a097bbc43ccbebeb62d80361814.aspx?i=62107dc8-a1e3-4453-bc76-74226fbeddaa">Speakers/Media</a></li>-->
					<!--	<li><a target="_blank" href="https://www.cvent.com/Pub/WebEmails/WebEmail.aspx?te=6AF10EEF-03D8-48FF-9AA9-D539F0CA6695&ti=8BA0F213-8320-4B3B-8FF6-55E9F72F5C10&tc=A7BD21D2-8AD8-4E62-8C18-E94323E4D264">Associate</a></li>-->
					<!--</ul>-->
					</li>
					<li><a target="_blank" href="https://www.linkedin.com/company/im_cloud"><i class="fa fa-linkedin"></i></a></li>
					<li><a target="_blank" href="https://twitter.com/IngramCloud"><i class="fa fa-twitter"></i></a></li>
					<li><a target="_blank" href="https://www.facebook.com/ingrammicrocloud"><i class="fa fa-facebook"></i></a></li>
				</ul>
			</div>
		</div>
	</div>
</section>
