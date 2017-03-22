<!DOCTYPE html>
<!--[if IE 8]><html lang="en" class="ie8"><![endif]-->
<!--[if !IE]><!--><html lang="en"><!--<![endif]-->

    <html <?php language_attributes(); ?>>
        <head>
            <meta http-equiv="x-ua-compatible" content="ie=edge">
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />            
            <?php
            wp_head();
           
$ver = '20170213';
$min = ".min";
?>
            
            <link rel="icon" href="/wp-content/uploads/2016/07/favicon.png" sizes="32x32" />
            <link rel="icon" href="/wp-content/uploads/2016/07/favicon.png" sizes="192x192" />
            <link rel="apple-touch-icon-precomposed" href="/wp-content/uploads/2016/07/favicon.png" />
            <meta name="msapplication-TileImage" content="/wp-content/uploads/2016/07/favicon.png" />
            <meta name="viewport" content="width=device-width, initial-scale=1">           
           <link rel='stylesheet' href='<?php echo get_template_directory_uri() . '/style' . $min . '.css' ?>' type='text/css' media='all' />
<link rel='stylesheet' href='<?php echo get_template_directory_uri() . '/build_css/font-awesome' . $min . '.css' ?>' type='text/css' media='all' />
<link rel='stylesheet' href='<?php echo get_template_directory_uri() . '/build_css/content' . $min . '.css' ?>' type='text/css' media='all' />
<link rel='stylesheet' href='<?php echo get_template_directory_uri() . '/build_css/bootstrap' . $min . '.css' ?>' type='text/css' media='all' />
<link rel='stylesheet' href='<?php echo get_template_directory_uri() . '/build_css/custom/general' . $min . '.css' ?>' type='text/css' media='all' />

        </head>
        <body <?php body_class(); ?>>