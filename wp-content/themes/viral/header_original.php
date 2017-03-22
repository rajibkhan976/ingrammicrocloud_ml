<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php bloginfo('name');
	wp_title('|', 'true', 'left');
?></title>
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

<?php get_template_part('inc/custom-styles'); ?>
</head>
<body <?php body_class(); ?>>
<div id="loading"> </div>
<?php
$pagetype = $smof_data['pagetype'];
if ($pagetype == "boxed") {echo '<div class="main-container">';
}
?>
