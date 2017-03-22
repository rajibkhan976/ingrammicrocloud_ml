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
		$linkfont = str_replace(' ', '+', $font) . ':300,300italic,400,400italic,600,600italic,700,700italic,800,800italic%7C';
		//echo "<link href='http://fonts.googleapis.com/css?family=" . $linkfont . "&amp;subset=latin,latin-ext,cyrillic,cyrillic-ext,greek-ext,greek,vietnamese' rel='stylesheet' type='text/css' />";
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

<?php if ($page_subheadlines_font_color) { ?>	
.page-heading h4{ color: <?php echo $page_subheadlines_font_color;?>; }
<?php } ?>
<?php if ($headlines_font_face) { ?>
.headline h1, .headline h1 span, .headline h2, .headline h2 span, .headline h3, .headline h3 span,
.headline h4, .headline h4 span, .headline h5, .headline h5 span, .headline h6, .headline h6 span, 
a.zilla-button { font-family: <?php echo $headlines_font_face;?>; }
<?php } ?>

<?php if ($secondary_accent_color) { ?>	
.pre-read-more, .comments-bubble, .zilla-toggle .ui-state-active .ui-icon:after, 
.exquisite1-toggle .ui-state-active .ui-icon:after, .portfolio-buttons li, .owl-next
{ background: <?php echo $secondary_accent_color; ?> !important; }
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