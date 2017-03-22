<?php
$ver = '20170213';
$min = ".min";
?>
<link rel='stylesheet' href='<?php echo get_template_directory_uri() . '/style' . $min . '.css' ?>' type='text/css' media='all' />
<link rel='stylesheet' href='<?php echo get_template_directory_uri() . '/build_css/font-awesome' . $min . '.css' ?>' type='text/css' media='all' />
<link rel='stylesheet' href='<?php echo get_template_directory_uri() . '/build_css/content' . $min . '.css' ?>' type='text/css' media='all' />
<link rel='stylesheet' href='<?php echo get_template_directory_uri() . '/build_css/bootstrap' . $min . '.css' ?>' type='text/css' media='all' />
<link rel='stylesheet' href='<?php echo get_template_directory_uri() . '/build_css/slick' . $min . '.css' ?>' type='text/css' media='all' />
<link rel='stylesheet' href='<?php echo get_template_directory_uri() . '/build_css/slick-theme' . $min . '.css' ?>' type='text/css' media='all' />
<link rel='stylesheet' href='<?php echo get_template_directory_uri() . '/build_css/modal.min.css' ?>' type='text/css' media='all' />
<link rel='stylesheet' href='<?php echo get_template_directory_uri() . '/build_css/custom/general' . $min . '.css' ?>' type='text/css' media='all' />
<link rel='stylesheet' href='<?php echo get_template_directory_uri() . '/build_css/menu' . $min . '.css' ?>' type='text/css' media='all' />            
<link rel='stylesheet' href='<?php echo get_template_directory_uri() . '/build_css/skeleton1200' . $min . '.css' ?>' type='text/css' media='all' />

<?php if (is_front_page()) { ?>
    <link rel='stylesheet' href='<?php echo get_template_directory_uri() . '/build_css/custom/page-home' . $min . '.css' ?>' type='text/css' media='all' />                
<?php } else { ?>
    <link rel='stylesheet' href='<?php echo get_template_directory_uri() . '/build_css/custom/page-categories' . $min . '.css' ?>' type='text/css' media='all' />                    
    <link rel='stylesheet' href='<?php echo get_template_directory_uri() . '/build_css/custom/component-sidebar' . $min . '.css' ?>' type='text/css' media='all' />            
    <?php if (is_page('become-a-partner')) { ?>
        <link rel='stylesheet' href='<?php echo get_template_directory_uri() . '/build_css/custom/page-become-a-partner' . $min . '.css' ?>' type='text/css' media='all' />                    
    <?php } ?>
    <?php if (is_page('resources')) { ?>
        <link rel='stylesheet' href='<?php echo get_template_directory_uri() . '/build_css/custom/page-resources' . $min . '.css' ?>' type='text/css' media='all' />
    <?php } ?>
    <?php if (is_page('blog') || is_page('newsroom') || is_single()) { ?>
        <link rel='stylesheet' href='<?php echo get_template_directory_uri() . '/build_css/custom/page-blog' . $min . '.css' ?>' type='text/css' media='all' />                    
        <link rel='stylesheet' href='<?php echo get_template_directory_uri() . '/build_css/prettyPhoto' . $min . '.css' ?>' type='text/css' media='all' />
    <?php } ?>
    <?php if (is_page('about')) { ?>
        <link rel='stylesheet' href='<?php echo get_template_directory_uri() . '/build_css/custom/page-about' . $min . '.css' ?>' type='text/css' media='all' />                    
    <?php } ?>
<?php } ?>