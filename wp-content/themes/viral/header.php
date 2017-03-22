<!DOCTYPE html>

<!--[if IE 8]><html lang="en" class="ie8"><![endif]-->
<!--[if !IE]><!--><html lang="en"><!--<![endif]-->

<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php bloginfo('name');
	wp_title('|', 'true', 'left');
?></title>

<link href='https://fonts.googleapis.com/css?family=Raleway:100' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:100,300' rel='stylesheet' type='text/css'>

<?php // Get country code of current site and current environment
require_once(dirname(__FILE__).'/custom_functions/get_country_code.php');
$country_code = get_country_code();
$env = explode(".", get_bloginfo('url'))[1];
?>

<!-- -----------------------------------------------------------------
SalesFusion Tracking Code
------------------------------------------------------------------ -->

<?php if ($country_code == 'us' && $env !== "dev" && $env !== "stg") : ?>

<script type="text/javascript">
    __sf_config = {
        customer_id: 96987,
        host: 'www.msgapp.com',
        ip_privacy: 0,
        subsite: '',

        __img_path: "/web-next.gif?"
    };

    (function() {
        var s = function() {
            var e, t;
            var n = 10;
            var r = 0;
            e = document.createElement("script");
            e.type = "text/javascript";
            e.async = true;
            e.src = "//" + __sf_config.host + "/js/frs-next.js";
            t = document.getElementsByTagName("script")[0];
            t.parentNode.insertBefore(e, t);
            var i = function() {
                if (r < n) {
                    r++;
                    if (typeof frt !== "undefined") {
                        frt(__sf_config);
                    } else {
                        setTimeout(function() {
                            i();
                        }, 500);
                    }
                }
            };
            i();
        };
        if (window.attachEvent) {
            window.attachEvent("onload", s);
        } else {
            window.addEventListener("load", s, false);
        }
    })();
</script>

<?php endif; ?>

<!-- -----------------------------------------------------------------
/SalesFusion Tracking Code
------------------------------------------------------------------ --> 



<!-- -----------------------------------------------------------------
Google Content Experiments
------------------------------------------------------------------ --> 

<?php
$settings = get_option(UBERMENU_PREFIX.main);
?>

<!-- US Homepage -->
<?php if ($country_code == "us" && is_front_page() && $env !== "dev" && $env !== "stg") : ?>
<script>function utmx_section(){}function utmx(){}(function(){var
k='94177559-0',d=document,l=d.location,c=d.cookie;
if(l.search.indexOf('utm_expid='+k)>0)return;
function f(n){if(c){var i=c.indexOf(n+'=');if(i>-1){var j=c.
indexOf(';',i);return escape(c.substring(i+n.length+1,j<0?c.
length:j))}}}var x=f('__utmx'),xx=f('__utmxx'),h=l.hash;d.write(
'<sc'+'ript src="'+'http'+(l.protocol=='https:'?'s://ssl':
'://www')+'.google-analytics.com/ga_exp.js?'+'utmxkey='+k+
'&utmx='+(x?x:'')+'&utmxx='+(xx?xx:'')+'&utmxtime='+new Date().
valueOf()+(h?'&utmxhash='+escape(h.substr(1)):'')+
'" type="text/javascript" charset="utf-8"><\/sc'+'ript>')})();
</script><script>utmx('url','A/B');</script>

<?php endif; ?>
<!-- End of US Homepage -->


<!-- -----------------------------------------------------------------
/Google Content Experiments
------------------------------------------------------------------ -->


<!-- -----------------------------------------------------------------
Custom Landing Page Header Content
------------------------------------------------------------------ -->

<!-- UK RingCentral *.co.uk/ringcentral -->


<?php if ($country_code == "uk" && is_page(5583)) : ?>

    <link href="http://www.ringcentral.com/content/dam/ringcentral/images/favicon.ico" rel="shortcut icon">
    <!-- Latest compiled and minified CSS -->
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery library -->
    <link href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet">
    <!-- <script src="http://code.jquery.com/jquery-1.10.2.js"> -->
    <style>
      div.ui-datepicker{
        font-size:12px;
      }
      .navbar .navbar-nav {
        display: inline-block;
        float: none;
        vertical-align: top;
      }
      .navbar .navbar-collapse {
        text-align: center!important;
      }
      .navbar {
        margin-bottom: 0;
      }
      .btn-primary {
        background-color:#FF8800;
        border-color:#FF8800;
      }
      .btn-primary:hover {
        background-color:#FFFFFF!important;
        border-color:#00A1DE!important;
        color:#00A1DE!important;
      }
      li a {
        color:#FFFFFF!important;
        font-weight:bold!important;
        font-size:16px!important;
      }
      h1, h2, h3, h4, p {
        font-family: Segoe UI, Arial;
      }
      p {
        font-size: 16px;
      }
      input {
        border-radius:2px!important;
        color:#757575;
        box-shadow:none!important;
        font-family:Segoe UI, sans-serif;
        border: 2px solid #FFFFFF;
      }
      input:hover[type="submit"] {

        background-color: #FF8800!important;
        color:#FFFFFF!important;
        border:2px solid #FFFFFF;
      }
      label {
        font-size:14px!important;
        font-weight:normal!important;
      }
      a.info:hover {
        color:#85FF8C!important;
      }
      @media only screen and (max-width: 700px) {
        .mobileCenter {
          text-align:center!important;
          margin:auto!important;
        }
        .mobilePadding {
          padding-left:0px!important;
          padding-right:0px!important;
        }
        .video-container {
          height:320px!important;
        }
        .mobileHeightPadding {
          padding-bottom:10px!important;
        }
        .mobileHeight {
          padding-top:20px!important;
          padding-bottom:20px!important;
        }
        .mobileAddPadding {
          padding-right:15px!important;
          padding-left:15px!important;
        }
        .extendedHeight {
          height:300px!important;
        }
        .btn-adjust {
          width:100%!important;
        }
        .hides {
          display: none!important;
        }
      }
      @media only screen and (max-width: 413px) {
        .textSize {
          font-size:24px!important;
        }
        .video-container {
          height:220px!important;
        }
        .imageWidth {
          width:100%!important;
        }
      }
    </style>
    <style media="screen" type="text/css">
      /* RESET */ .elq-form * {
        margin: 0;
        padding: 0;
      }
      .elq-form input, textarea {
        -webkit-box-sizing:content-box;
        -moz-box-sizing:content-box;
        box-sizing:content-box;
      }
      .elq-form button,input[type=reset],input[type=button],input[type=submit],input[type=checkbox],input[type=radio],select {
        -webkit-box-sizing:border-box;
        -moz-box-sizing:border-box;
        box-sizing:border-box;
      }
      /* GENERIC */.elq-form input {
        height: 16px;
        line-height: 16px;
      }
      .elq-form .item-padding {
        padding:6px 5px 9px 9px;
      }
      .elq-form .pp-group {
        padding:0px 5px 0px 9px;
      }
      .elq-form .pp-field {
        padding:6px 0px 9px 0px;
      }
      .elq-form .field-wrapper.individual {
        float: left;
        width: 100%;
        clear: both;
      }
      .elq-form .field-p {
        position: relative;
        margin: 0;
        padding: 0;
      }
      .elq-form .zIndex-fix {
        position: absolute;
        z-index: 1;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
      }
      .elq-form .field-design {
        position:absolute;
        z-index:2;
        top:0;
        left:0;
        right:0;
        bottom:0;
        margin:0;
        padding:0;
      }
      .elq-form .no-fields-prompt {
        float: left;
        width: 100%;
        height: 150px;
        padding-top: 50px;
        clear: both;
      }
      /* SECTION BREAKS */.elq-form .section-break {
        float:left;
        width: 97%;
        margin-right:2%;
        margin-left:1%;
        padding-bottom:6px;
      }
      .elq-form .section-break .heading {
        width:100%;
        font-weight: bold;
        margin:0;
        padding:0;
      }
      /* LABEL */.elq-form .required {
        color: red !important;
        display: inline;
        float: none;
        font-weight: bold;
        margin: 0pt 0pt 0pt;
        padding: 0pt 0pt 0pt;
      }
      /* FIELD GROUP */.elq-form .field-group {
        float: left;
        clear: both;
      }
      .elq-form .field-group.large {
        width:100%;
      }
      .elq-form .field-group.medium {
        width:51%;
      }
      .elq-form .field-group.small {
        width:31%;
      }
      .elq-form .field-group .label {
        float:left;
        width:97%;
        margin-right:2%;
        margin-left:1%;
        padding-bottom:6px;
        font-weight: bold;

      }
      .elq-form .progressive-profile .pp-inner {
        float: left;
        clear: both;
      }
      .elq-form .progressive-profile .pp-inner.large {
        width:100%;
      }
      .elq-form .progressive-profile .pp-inner.medium {
        width:51%;
      }
      .elq-form .progressive-profile .pp-inner.small {
        width:31%;
      }
      /* RADIO */.elq-form .radio-option {
        display: inline-block;
      }
      .elq-form .radio-option .label {
        display:block;
        float:left;
        padding-right:10px;
        padding-left:22px;
        text-indent:-22px;
      }
      .elq-form .radio-option .input {
        vertical-align:middle;
        margin-right:7px;
      }
      .elq-form .radio-option .inner {
        vertical-align:middle;
      }
      /* CHECKBOX */.elq-form .checkbox-span {
        display:inline-block;
        width:100%!important;
      }
      .elq-form .checkbox-label {
        margin-left:10px;
      }
      /* INPUT */.elq-form .accept-default {
        width:100%;
      }
      /* SIZING */.elq-form .field-style {
        float:left;
        margin-right:2%;
        margin-left:2%;
      }
      .elq-form .field-style._25 {
        width:21%;
      }
      .elq-form .field-style._50 {
        width:46%;
      }
      .elq-form .field-style._50_left {
        clear:left;
        width:46%;
      }
      .elq-form .field-style._75 {
        width:71%;
      }
      .elq-form .field-style._100 {
        width:96%}
      .elq-form .field-size-top-small {
        width:30%;
      }
      .elq-form .field-size-top-medium {
        width:75%;
      }
      .elq-form .field-size-top-large {
        width:100%;
      }
      .elq-form .field-size-left-small {
        width:21%;
      }
      .elq-form .field-size-left-medium {
        width:46%;
      }
      .elq-form .field-size-left-large {
        width:60%;
      }
      /* INSTRUCTIONS */.elq-form .instructions.default {
        color:#444444;
        display:block;
        font-size:10px;
        padding:6px 0pt 3px;
      }
      .elq-form .instructions.group {
        float:left;
        width:97%;
        margin-right:2%;
        margin-left:2%;
        padding:6px 0pt 3px;
        color:#444444;
        display:block;
        font-size:10px;
      }
      .elq-form .instructions.left-single {
        margin:0 0 0 33%;
      }
      .elq-form .instructions-other {
        margin:0;
      }
      /* POSITIONING */.elq-form .label-position.left {
        display:block;
        line-height:150%;
        padding:1px 0pt 3px;
        float:left;
        width:31%;
        margin:0pt 15px 0pt 0pt;
        word-wrap:break-word;
      }
      .elq-form .label-position.top {
        display:block;
        line-height:150%;
        padding:1px 0pt 3px;
        white-space:nowrap;
      }
      .elq-form .label-position.alignment-left {
        text-align: left;
      }
      .elq-form .label-position.alignment-right {
        text-align: right;
      }
      /* LIST ORDER */.elq-form .list-order {
        display:block;
      }
      .elq-form .list-order.oneColumn {
        margin:0pt 7px 0pt 0pt;
        width:100%;
        clear:both;
      }
      .elq-form .list-order.twoColumn {
        float:left;
        margin:0pt 7px 0pt 0pt;
        width:38%;
      }
      .elq-form .list-order.threeColumn {
        float:left;
        margin:0pt 7px 0pt 0pt;
        width:30%;
      }
      .elq-form .list-order.oneColumnLeft {
        float:left;
        margin:0pt 7px 0pt 0pt;
        width:100%;
      }
      .elq-form .list-order.twoColumnLeft {
        float:left;
        margin:0pt 7px 0pt 0pt;
        width:38%;
      }
      .elq-form .list-order.threeColumnLeft {
        float:left;
        margin:0pt 7px 0pt 0pt;
        width:30%;
      }
      /* GRID STYLE */.elq-form .grid-style {
        display:inline;
        float:left;
        margin-left:2%;
        margin-right:2%;
      }
      .elq-form .grid-style._25 {
        width:21%;
      }
      .elq-form .grid-style._50 {
        width:46%;
      }
      .elq-form .grid-style._75 {
        width:71%;
      }
      .elq-form .grid-style._100 {
        width:96%;
      }
    </style>

<?php endif; ?>


<!-- End of UK RingCentral -->


<!-- UK RingCentral *.co.uk/ringcentral -->


<!-- UK Cloud Transformation -->

<?php if ($country_code == "uk" && (is_page(5591) || is_page(5599) || is_page(5601) || is_page(5595) || is_page(5597) || is_page(5623))) : ?>

<link href="http://dev.ingrammicrocloud.com/uk/wp-content/themes/viral/page-uk-cloud-transformation/css/core.css" rel="stylesheet" type="text/css"  />

<!--
<link href="http://dev.ingrammicrocloud.com/uk/wp-content/themes/viral/page-uk-cloud-transformation/css/reset.css" rel="stylesheet" type="text/css" />
<link href="http://dev.ingrammicrocloud.com/uk/wp-content/themes/viral/page-uk-cloud-transformation/css/flexslider.css" rel="stylesheet" type="text/css"  />
<link href="http://dev.ingrammicrocloud.com/uk/wp-content/themes/viral/page-uk-cloud-transformation/css/media.css" rel="stylesheet" type="text/css"  />
-->

<?php endif; ?>


<!-- End of Cloud Transformation -->



<!-- -----------------------------------------------------------------
/Custom Landing Page Header Content
------------------------------------------------------------------ -->



<?php wp_head(); ?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php


global $smof_data;
if ($smof_data['favicon']) {
	echo '<link rel="shortcut icon" href="' . $smof_data['favicon'] . '"/>';
}
?>
<!--[if IE 6]>
<link rel="stylesheet" href="<?php get_template_directory_uri(); ?>/css/ie6.css" media="screen" type="text/css" />
<![endif]-->
<!--[if IE 7]>
<link rel="stylesheet" href="<?php get_template_directory_uri(); ?>/css/ie7.css" media="screen" type="text/css" />
<![endif]-->
<!--[if IE 8]>
<link rel="stylesheet" href="<?php get_template_directory_uri(); ?>/css/ie8.css" media="screen" type="text/css" />
<![endif]-->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<link rel="stylesheet" type="text/css" href="<?php get_template_directory_uri(); ?>/css/ie-style.css" />
<![endif]-->

<?php
require('custommegamenudev.php');
?>

<?php get_template_part('inc/custom-styles'); ?>
<?php wp_head(); ?>



<?php

$blog_url = get_bloginfo('url');
$url = parse_url($blog_url);
$url_paths = explode(".", $blog_url);

if ($country_code === 'uk') {
  echo '<!-- Start of Async HubSpot Analytics Code -->
 <script type="text/javascript">
   (function(d,s,i,r) {
     if (d.getElementById(i)){return;}
     var n=d.createElement(s),e=d.getElementsByTagName(s)[0];
     n.id=i;n.src=\'//js.hs-analytics.net/analytics/\'+(Math.ceil(new Date()/r)*r)+\'/1919944.js\';
     e.parentNode.insertBefore(n, e);
   })(document,"script","hs-analytics",300000);
 </script>
<!-- End of Async HubSpot Analytics Code -->';
}

?>



</head>
<body <?php body_class(); ?>>
<?php if ( function_exists( 'gtm4wp_the_gtm_tag' ) ) { gtm4wp_the_gtm_tag(); } ?>
<div id="loading"> </div>
<?php
$pagetype = $smof_data['pagetype'];
if ($pagetype == "boxed") {echo '<div class="main-container">';
}
?>
