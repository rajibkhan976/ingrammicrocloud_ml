<?php
global $smof_data;
$boxed = $smof_data['pagetype'];
$bg_image = $smof_data['bg_image'];
$bg_pattern = $smof_data['bg_pattern'];
$onepage = $smof_data['onepage'];
$darktheme = $smof_data['dark_theme'];
$navigation_color = $smof_data['menu_color'];
$submenu_color = $smof_data['submenu_color'];
$menu_font_color = $smof_data['menu_font_color'];
$submenu_font_color = $smof_data['submenu_font_color'];
$accent_color = $smof_data['accent_color'];
$secondary_accent_color = $smof_data['secondary_accent_color'];
$outer_background_color = $smof_data['outer_background_color'];
$menu_font_face = $smof_data['menu_font_face'];
$menu_font_size = $smof_data['menu_font_size'];
$menu_font_color = $smof_data['menu_font_color'];
$submenu_font_color = $smof_data['submenu_font_color'];
$footer_bg_color = $smof_data['footer_bg_color'];
$footer2_bg_color = $smof_data['footer2_color'];
$footer2_font_color = $smof_data['footer2_font_color'];
$footer2_headings_color = $smof_data['footer2_headings_color'];

$heading_bg_color = $smof_data['heading_bg_color'];
$topbar_background = $smof_data['topbar_background'];
$topbar_font = $smof_data['topbar_font'];
$social_icons_color = $smof_data['social_icons_color'];
$social_icons_hover_color = $smof_data['social_icons_hover_color'];
$headings_font_face = $smof_data['headings_font_face'];
$headlines_font_face = $smof_data['headlines_font_face'];
$page_subheadlines_font_color = $smof_data['page_subheadlines_font_color'];
$body_font_face = $smof_data['body_font_face'];
$body_font_color = $smof_data['body_font_color'];
$body_font_size = $smof_data['body_font_size'];
$h1_font_size = $smof_data['h1_font_size'];
$h1_font_color = $smof_data['h1_font_color'];
$h2_font_size = $smof_data['h2_font_size'];
$h2_font_color = $smof_data['h2_font_color'];
$h3_font_size = $smof_data['h3_font_size'];
$h3_font_color = $smof_data['h3_font_color'];
$h4_font_size = $smof_data['h4_font_size'];
$h4_font_color = $smof_data['h4_font_color'];
$h5_font_size = $smof_data['h5_font_size'];
$h5_font_color = $smof_data['h5_font_color'];
$h6_font_size = $smof_data['h6_font_size'];
$h6_font_color = $smof_data['h6_font_color'];
$custom_css = $smof_data['custom_css_code'];
$custom_js = $smof_data['custom_js'];
$used_fonts = array($smof_data['menu_font_face'], $smof_data['body_font_face'], $smof_data['headings_font_face'], );

$default_font1 = 'Roboto Condensed';
$default_font2 = 'PT Sans';
foreach ($used_fonts as $font) {
	if (($font !== $default_font1) AND ($font !== $default_font2)) {
		$linkfont = str_replace(' ', '+', $font) . ':300italic,400italic,600italic,700italic,800italic,400,300,600,700,800%7C';
		echo "<link href='http://fonts.googleapis.com/css?family=" . $linkfont . "&amp;subset=latin,latin-ext,cyrillic,cyrillic-ext,greek-ext,greek,vietnamese' rel='stylesheet' type='text/css' />";
		}
	}



// STYLE SWITCHER 


if (isset($_GET['style'])){
    $skin = $_GET['style'];
	
	if ($skin == 'blue') {
		$menu_font_color = '#1e81d8';
		$accent_color = '#1e81d8';
	
	echo '<style type="text/css">
			.tp-caption.viral_2, 
			.tp-caption.viral_6, 
			.tp-caption.viral_7{
			color: #1e81d8 !important;
			} </style>';

	} elseif ($skin == 'orange') {
		$menu_font_color = '#f29721';
		$accent_color = '#f29721';
	
	echo '<style type="text/css">
			.tp-caption.viral_2, 
			.tp-caption.viral_6, 
			.tp-caption.viral_7{
			color: #f29721 !important;
			} </style>';

	} elseif ($skin == 'hotpink') {
		$menu_font_color = '#ef2181';
		$accent_color = '#ef2181';
	
	echo '<style type="text/css">
			.tp-caption.viral_2, 
			.tp-caption.viral_6, 
			.tp-caption.viral_7{
			color: #ef2181 !important;
			} </style>';

	} elseif ($skin == 'lightpink') {
		$menu_font_color = '#f2abbe';
		$accent_color = '#f2abbe';
	
	echo '<style type="text/css">
			.tp-caption.viral_2, 
			.tp-caption.viral_6, 
			.tp-caption.viral_7{
			color: #f2abbe !important;
			} </style>';

	} elseif ($skin == 'gray') {
		$menu_font_color = '#39414B';
		$accent_color = '#39414B';
	
	echo '<style type="text/css">
			.tp-caption.viral_2, 
			.tp-caption.viral_6, 
			.tp-caption.viral_7{
			color: #39414B !important;
			} </style>';

	} elseif ($skin == 'sunny') {
		$menu_font_color = '#efd421';
		$accent_color = '#efd421';
	
	echo '<style type="text/css">
			.tp-caption.viral_2, 
			.tp-caption.viral_6, 
			.tp-caption.viral_7{
			color: #efd421 !important;
			} </style>';

	}
	elseif ($skin == 'green') {
		$menu_font_color = '#3f9684';
		$accent_color = '#3f9684';
	
	echo '<style type="text/css">
			.tp-caption.viral_2, 
			.tp-caption.viral_6, 
			.tp-caption.viral_7{
			color: #3f9684 !important;
			} </style>';

	}
}

// STYLE SWITCHER END


?>
<script type="text/javascript">
<?php if ($onepage) { ?>
var varOnePage = '<?php echo $onepage; ?>';
<?php } else {?>
var varOnePage = '0';
<?php } ?>
</script>
<?php if ($custom_js) {
?>
<script type="text/javascript"><?php echo $custom_js; ?>;</script>
<?php } ?>
<script type="text/javascript">
<?php if ($darktheme == '1') { ?>
var varBgColor = '#171717';
<?php } else { ?>
var varBgColor = '#fff';
<?php } ?>

<?php if ($accent_color) { ?>
var varAccent = '<?php echo $accent_color; ?>';
<?php } else { ?>
var varAccent = '#fff';
<?php } ?>
</script>
<style type="text/css">
<?php
if ($boxed == "boxed") {
	?>
.nav-bar.sticky{
	margin: 0 auto;
	width: 100%;
	max-width: 1260px;
	left:auto;
}
<?php 
if ($bg_image) {
?>
	
body{
	background:url('<?php echo $bg_image; ?>') no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
	
	
<?php  } elseif ($bg_pattern) {
?>	

body{
	background:url('<?php echo $bg_pattern; ?>');
	background-repeat: repeat;
}

<?php 	
}
}
?>
<?php
if ($custom_css) { echo $custom_css; }
?>
<?php if ($heading_bg_color) { ?>
.page-heading{ background-color: <?php echo $heading_bg_color; ?>; }
<?php } ?>
<?php if ($topbar_background) { ?>
.upper-nav-bar{ background-color: <?php echo $topbar_background; ?>; }
<?php } ?>
<?php if ($topbar_font) { ?>
.upper-nav-bar, .bar-item{ color: <?php echo $topbar_font; ?>; }
<?php } ?>
<?php if ($social_icons_color) { ?>
.upper-nav-bar i{ color: <?php echo $social_icons_color; ?>; }
<?php } ?>
<?php if ($social_icons_hover_color) { ?>
.upper-nav-bar i:hover{ color: <?php echo $social_icons_hover_color; ?>; }
<?php } ?>
<?php if ($menu_font_face) { ?>
.nav a { font-family: <?php echo $menu_font_face; ?>; }
<?php } ?>
<?php if ($outer_background_color) { ?>
body { background-color: <?php echo $outer_background_color; ?>; }
<?php } ?>
<?php if ($menu_font_size) { ?>
.nav a { font-size: <?php echo $menu_font_size; ?>; }
<?php } ?>
<?php if ($menu_font_color) { ?>
.nav a, .nav li, #logo h2{ color: <?php echo $menu_font_color; ?>; }
<?php } ?>

<?php if ($footer_bg_color) { ?>
.footer-section { background-color: <?php echo $footer_bg_color; ?>; }
<?php } ?>
<?php if ($footer2_bg_color) { ?>
.footer-widgetized-section { background-color: <?php echo $footer2_bg_color; ?>; }
<?php } ?>
<?php if ($footer2_font_color) { ?>
.footer-widgetized-section div, .footer-widgetized-section span{ color: <?php echo $footer2_font_color; ?> !important; }
<?php } ?>
<?php if ($footer2_headings_color) { ?>
.footer-widgetized-section h5{ color: <?php echo $footer2_headings_color; ?>; }
<?php } ?>
<?php if ($headings_font_face) { ?>
h1, h2, h3, h4, h5, h6, h1 span, h2 span, h3 span, h4 span, h5 span, h6 span, .flex-slider-title,
.month, .day, .year, .zilla-tabs .zilla-nav li a, .sidebar h3, .skillset .progress, .skillset h2,
.comments h3, .blog-heading h1, .blog-heading h1 a, .blog  { font-family: <?php echo $headings_font_face;?>; }
<?php } ?>
<?php if ($page_subheadlines_font_color) { ?>	
.page-heading h4{ color: <?php echo $page_subheadlines_font_color;?>; }
<?php } ?>
<?php if ($headlines_font_face) { ?>
.headline h1, .headline h1 span, .headline h2, .headline h2 span, .headline h3, .headline h3 span,
.headline h4, .headline h4 span, .headline h5, .headline h5 span, .headline h6, .headline h6 span, 
a.zilla-button { font-family: <?php echo $headlines_font_face;?>; }
<?php } ?>
<?php if ($h1_font_size) { ?>
h1, h1 a, h1 span { font-size: <?php echo $h1_font_size; ?>; }
<?php } ?>
<?php if ($h1_font_color) { ?>
h1, h1 a, h1 span { color: <?php echo $h1_font_color; ?>; }
<?php } ?>
<?php if ($h2_font_size) { ?>
h2, h2 a, h2 span { font-size: <?php echo $h2_font_size; ?>; }
<?php } ?>
<?php if ($h2_font_color) { ?>
h2, h2 a, h2 span { color: <?php echo $h2_font_color; ?>; }
<?php } ?>
<?php if ($h3_font_size) { ?>
h3, h3 a, h3 span { font-size: <?php echo $h3_font_size; ?>; }
<?php } ?>
<?php if ($h3_font_color) { ?>
h3, h3 a, h3 span { color: <?php echo $h3_font_color; ?>; }
<?php } ?>
<?php if ($h4_font_size) { ?>
h4, h4 a, h4 span { font-size: <?php echo $h4_font_size; ?>; }
<?php } ?>
<?php if ($h4_font_color) { ?>
h4, h4 a, h4 span { color: <?php echo $h4_font_color; ?>; }
<?php } ?>
<?php if ($h5_font_size) { ?>
h5, h5 a, h5 span { font-size: <?php echo $h5_font_size; ?>; }
<?php } ?>
<?php if ($h5_font_color) { ?>
h5, h5 a, h5 span { color: <?php echo $h5_font_color; ?>; }
<?php } ?>
<?php if ($h6_font_size) { ?>
h6, h6 a, h6 span { font-size: <?php echo $h6_font_size; ?>; }
<?php } ?>
<?php if ($h6_font_color) { ?>
h6, h6 a, h6 span { color: <?php echo $h6_font_color; ?>; }
<?php } ?>
<?php if ($secondary_accent_color) { ?>	
.pre-read-more, .comments-bubble, .zilla-toggle .ui-state-active .ui-icon:after, 
.exquisite1-toggle .ui-state-active .ui-icon:after, .portfolio-buttons li, .owl-next
{ background: <?php echo $secondary_accent_color; ?> !important; }
<?php } ?>
<?php if ($body_font_face) { ?>
p, div, b, a, body, html, .container, .parallax-content p, .parallax-content h1, .parallax-content h2, 
.parallax-content h3, .portfolio-buttons a, .parallax-content h4, .parallax-content h5, .parallax-content h6, 
.header-slider .flex-caption, .headline h2, .headline span { font-family: <?php echo $body_font_face; ?>; }
<?php } ?>
<?php if ($body_font_size) { ?>
p, div, b, a, body, html, .container{ font-size: <?php echo $body_font_size; ?>; }
<?php } ?>
<?php if ($body_font_color) { ?>
p, span, div, b, body, html, .container, .blog-heading h1, .blog-heading  h1:before, .blog-heading  h1:after, .zilla-nav a,
.exquisite2-nav a, .sidebar .recent-widget-permalink i, .sidebar a, .portfolio-buttons a,
.footer #right-bar .social, .woocommerce .woocommerce-breadcrumb, .woocommerce-page .woocommerce-breadcrumb{ color: <?php echo $body_font_color; ?>; }
.blog-heading  h1:before, .blog-heading  h1:after{ background-color: <?php echo $body_font_color; ?>; }
<?php } ?>
<?php if ($accent_color) { ?>
::selection, ::-moz-selection { background: <?php echo $accent_color; ?>; }
.recent-content-item .recent-overlay { border-bottom: 75px solid <?php echo $accent_color; ?>; }
.recent-content-post .recent-overlay, .eight.columns .recent-content-post .recent-overlay { border-bottom: 80px solid <?php echo $accent_color; ?>; }
.recent-content-item:hover .recent-overlay { border-bottom: 800px solid <?php echo $accent_color; ?>; }
.eight.columns .recent-content-item:hover .recent-overlay { border-bottom: 1000px solid <?php echo $accent_color; ?>; }
.zilla-tabs .zilla-nav .ui-tabs-active a{ border-top: 5px solid <?php echo $accent_color; ?>; color: <?php echo $accent_color; ?>; }
.counter-border{ border: 5px solid <?php echo $accent_color; ?>; }
.date-bubble:after { border-left: 12px solid <?php echo $accent_color; ?>; }
.read-more:after { border-top: 10px solid <?php echo $accent_color; ?>; }
.exquisite2-tabs .exquisite2-tab { border-bottom: <?php echo $accent_color; ?>; }
.exquisite2-tabs .exquisite2-nav .ui-tabs-selected a, .exquisite2-tabs .exquisite2-nav .ui-tabs-active a{ border-bottom: 5px solid <?php echo $accent_color; ?>; }
.nav .first-submenu-item a, .nav li li .first-submenu-item a { border-top: 3px solid <?php echo $accent_color; ?>; }
h1:after, .teamheadline:after{ border-bottom: 3px solid <?php echo $accent_color; ?>; }
.service-description h5:after{ border-bottom: 3px solid <?php echo $accent_color; ?>; }
.exquisite2-toggle .exquisite2-toggle-title{ border-bottom: 5px solid <?php echo $accent_color; ?>; }
.woocommerce ul.products li.product:hover .woo-hover, .woocommerce-page ul.products li.product:hover .woo-hover{
	border-bottom: 500px solid <?php echo $accent_color; ?>;
}
.upsells.products ul.products li.product:hover .woo-hover, .upsells.products ul.products li.product:hover .woo-hover
.related.products ul.products li.product:hover .woo-hover, .related.products ul.products li.product:hover .woo-hover{
	 border-bottom: 900px solid <?php echo $accent_color; ?>;
}
.woo-hover{
	  border-bottom: 0px solid <?php echo $accent_color; ?>; }

.toggleMenu span, .toggleMenu span:after, .toggleMenu span:before, .owl-prev, 
.exquisite1-tabs .exquisite1-nav .ui-tabs-active a, .zilla-toggle span.ui-icon:after,
.exquisite1-toggle span.ui-icon:after, .flex-direction-nav li .flex-prev, .portfolio-content .navigation .prev, 
.portfolio-content .navigation .next, .flex-control-nav li a.flex-active,
.img-button-hover a, .portfolio-buttons li.active, .portfolio-buttons li:hover, #submit, #cf_send, .wpcf7-submit,
.skill-chart.hover, .chart.hover, .date-bubble, .read-more, .pricetable-button.active, .pricetable-subheader.active, .pricetable-header.active, 
.pricetable.active, .the-date h2, .highlight, .socials i,
.overlay-type, .overlay-date, .exquisite-bar, .testimonial-icon, .tp_recent_tweets span:before, .iconbox2 i,
ul.page-numbers a,.woocommerce .woocommerce-result-count, .woocommerce-page .woocommerce-result-count
 { background-color: <?php echo $accent_color; ?> !important; }

.nav a.active,.woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit, 
.woocommerce #content input.button, .woocommerce-page a.button, .woocommerce-page button.button, .woocommerce-page input.button, 
.woocommerce-page #respond input#submit, .woocommerce-page #content input.button,
.woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price,
.woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce-page .widget_price_filter .ui-slider .ui-slider-range
 { background-color: <?php echo $accent_color; ?>; }
 
a.woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce #respond input#submit.alt:hover, 
.woocommerce #content input.button.alt:hover, .woocommerce-page a.button.alt:hover, .woocommerce-page button.button.alt:hover, .woocommerce-page input.button.alt:hover, 
.woocommerce-page #respond input#submit.alt:hover, .woocommerce-page #content input.button.alt:hover{
	background: <?php echo $accent_color; ?>;
	background: -moz-linear-gradient(center top , <?php echo $accent_color; ?> 0%, <?php echo $accent_color; ?> 0%) repeat scroll 0% 0% transparent;
} 
.woo-hover{
	border-bottom: 0px solid <?php echo $accent_color; ?>;
}
.woocommerce .widget_price_filter .ui-slider .ui-slider-handle, .woocommerce-page .widget_price_filter .ui-slider .ui-slider-handle{
 	background: -moz-linear-gradient(center top , <?php echo $accent_color; ?> 0%, <?php echo $accent_color; ?> 0%) repeat scroll 0% 0% transparent;
    background:<?php echo $accent_color; ?>;	
}
.woocommerce span.onsale, .woocommerce-page span.onsale{
	background: -moz-linear-gradient(center top , <?php echo $accent_color; ?> 0%, <?php echo $accent_color; ?> 0%) repeat scroll 0% 0% transparent;
}
.woocommerce ul.products li.product:hover .woo-hover, .woocommerce-page ul.products li.product:hover .woo-hover,
.upsells.products ul.products li.product:hover .woo-hover, .upsells.products ul.products li.product:hover .woo-hover,
.related.products ul.products li.product:hover .woo-hover, .related.products ul.products li.product:hover .woo-hover{
  border-bottom: 1200px solid <?php echo $accent_color; ?>; }
  
.nav li:hover, .nav li:hover a { background-color: <?php echo $accent_color; ?>; }
.agenda-icon .icon i { border:2px solid <?php echo $accent_color; ?>; color: <?php echo $accent_color; ?>;  }
.agenda-left.icons:after{ border-right: 2px dashed <?php echo $accent_color; ?>; }
.agenda-right.icons:after{ border-left: 2px dashed <?php echo $accent_color; ?>; }
.exquisite2-tabs .exquisite2-nav .ui-tabs-active a, .tp_recent_tweets li a, .sidebar .recent-widget-permalink, .sidebar .recent-widget-permalink i,
.portfolio-content a, .error h1, .error h2, .pagination .previous a, .pagination .next a, .featured-quote cite:before, .inner-quote cite:before,
.featured-quote cite, .inner-quote cite, .featured-quote:before, .inner-quote:before, .sidebar .widget_recent_comments a, .comments .reply a,
.comment-author .fn, .comment-author .fn a, .post .post-tags a, .post .read-more a, .day, .highlight, .headline span, a,
.header-slider .flex-slider-url, .header-slider .flex-slider-title,  .upper-nav-bar .bar-item i, .nav li:hover,
ul.bullet-points li:before, #breadcrumbs .separator, .star-colored, .parallax-background .testimonial-description cite,
span.colored, .function, .service-box i, .exquisite-skilltitle, .more, .countdown-section, .countdown-amount, .countdown-period, .countdown-descr,
.zilla-toggle .zilla-toggle-title, .exquisite1-toggle .exquisite1-toggle-title, .exquisite2-toggle .exquisite2-toggle-title,
.exquisite2-toggle span.ui-icon, .exquisite2-toggle .ui-state-active .ui-icon:after, #woo-crums i, #woo-crums a,
.woocommerce-review-link span,.woocommerce .star-rating span:before, .woocommerce-page .star-rating span:before
 { color: <?php echo $accent_color; ?>; }

.recent-post-header h5, .recent-post-header a{
	color: <?php echo $accent_color; ?> !important;
}
.woocommerce ul.products li.product h3:after, .woocommerce-page ul.products li.product h3:after, .product_title:after{ border-bottom: 3px solid <?php echo $accent_color; ?>; }


<?php if ($secondary_accent_color) { ?>

span.tooltip:after{ border-color: <?php echo $secondary_accent_color; ?> transparent transparent transparent; }
.exquisite2-toggle .exquisite2-toggle-title.ui-accordion-header-active{ border-bottom: 5px solid <?php echo $secondary_accent_color; ?>; }

.zilla-toggle .ui-state-active.zilla-toggle-title,
.exquisite1-toggle .ui-state-active.exquisite1-toggle-title,
.exquisite2-toggle .ui-state-active.exquisite2-toggle-title,
.exquisite2-toggle .ui-state-active .ui-icon:after,
.zilla-tabs .zilla-nav a, .exquisite1-nav a,
.social-big a:hover, .social-small a:hover, 
.post-title, .sidebar h3, .comments h3, .exquisite2-tabs .exquisite2-nav li a,
.price del, .price ins,
.price_label, .price_label .from, .price_label .to,
.post-preview-info, .post-preview-info span, .post-preview-info i{
color: <?php echo $secondary_accent_color; ?> !important;
}
.woocommerce .widget_price_filter .price_slider_wrapper .ui-widget-content, .woocommerce-page .widget_price_filter .price_slider_wrapper .ui-widget-content {
background: <?php echo $secondary_accent_color; ?>;
background: -webkit-gradient(linear,left top,left bottom,from(<?php echo $secondary_accent_color; ?>),to(<?php echo $secondary_accent_color; ?>));
background: -webkit-linear-gradient(<?php echo $secondary_accent_color; ?>,<?php echo $secondary_accent_color; ?>);
background: -moz-linear-gradient(center top,<?php echo $secondary_accent_color; ?> 0%,<?php echo $secondary_accent_color; ?> 0%);
background: -moz-gradient(center top,<?php echo $secondary_accent_color; ?> 0%,<?php echo $secondary_accent_color; ?> 0%);
}
a.woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit.alt, 
.woocommerce #content input.button.alt, .woocommerce-page a.button.alt, .woocommerce-page button.button.alt, .woocommerce-page input.button.alt, 
.woocommerce-page #respond input#submit.alt, .woocommerce-page #content input.button.alt{
	background:<?php echo $secondary_accent_color; ?>;
	background: -moz-linear-gradient(center top , <?php echo $secondary_accent_color; ?> 0%, <?php echo $secondary_accent_color; ?> 0%) repeat scroll 0% 0% transparent;
}
.iconbox2 i:hover, .flex-direction-nav li .flex-next, .flex-control-nav li a, .the-date h3,
ul.page-numbers span.current, ul.page-numbers a:hover, .socials i:hover, .overlay-title, 
.overlay-title-blog, .recent-content-item .layer a, span.tooltip, .portfolio-content .navigation .exit,
.woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit:hover, 
.woocommerce #content input.button:hover, .woocommerce-page a.button:hover, .woocommerce-page button.button:hover, .woocommerce-page input.button:hover, 
.woocommerce-page #respond input#submit:hover, .woocommerce-page #content input.button:hover,.woocommerce nav.woocommerce-pagination ul li span.current, .woocommerce nav.woocommerce-pagination ul li a:hover, 
.woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce #content nav.woocommerce-pagination ul li span.current, 
.woocommerce #content nav.woocommerce-pagination ul li a:hover, .woocommerce #content nav.woocommerce-pagination ul li a:focus, 
.woocommerce-page nav.woocommerce-pagination ul li span.current, .woocommerce-page nav.woocommerce-pagination ul li a:hover, 
.woocommerce-page nav.woocommerce-pagination ul li a:focus, .woocommerce-page #content nav.woocommerce-pagination ul li span.current, 
.woocommerce-page #content nav.woocommerce-pagination ul li a:hover, .woocommerce-page #content nav.woocommerce-pagination ul li a:focus{
	background: <?php echo $secondary_accent_color; ?>;
}
.exquisite2-tabs .exquisite2-nav li a{
border-bottom: 5px solid <?php echo $secondary_accent_color; ?>;
}

.agenda-right:after{ border-left: 2px dashed <?php echo $secondary_accent_color; ?>;}
.agenda-left:after{ border-right: 2px dashed <?php echo $secondary_accent_color; ?>;}
.agenda-icon .image{ border: 1px solid <?php echo $secondary_accent_color; ?>;}
<?php } ?>

ul.page-numbers span.current, ul.page-numbers a{
	color: #fff !important;
}
.sub-menu a{
	font-size:12px !important;
}
.nav li:hover a, .nav a.active{
	color: #fff;
}
<?php } ?>
<?php if ($navigation_color) { ?>
.nav-bar { background-color: <?php echo $navigation_color; ?>; }
<?php } ?>
<?php if ($submenu_color) { ?>
.nav li li a, .nav li li li a, .nav a.active a.active{
background-color: <?php echo $submenu_color; ?>;
}
.nav li:hover li a, .nav li:hover li li a{
background-color: <?php echo $submenu_color; ?>;
}
<?php } ?>
<?php if ($menu_font_color) { ?>
.nav a {
color: <?php echo $menu_font_color; ?>;
}
<?php } ?>
<?php if ($submenu_font_color) { ?>
.nav li li a, .nav li li li a{
color: <?php echo $submenu_font_color; ?>;
}
.nav li:hover li a, .nav li:hover li li a{
	color: <?php echo $submenu_font_color; ?>;
}





<?php } ?>
</style>