<!DOCTYPE html>
<!--[if IE 8]><html lang="en" class="ie8"><![endif]-->
<!--[if !IE]><!--><html lang="en"><!--<![endif]-->

    <html <?php language_attributes(); ?>>
        <head>
            <meta http-equiv="x-ua-compatible" content="ie=edge">
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

            <?php
            // Get country code of current site and current environment
            require_once(dirname(__FILE__) . '/custom_functions/get_country_code.php');
            $country_code = get_country_code();
            $env = explode(".", get_bloginfo('url'))[1];
            ?>


            <?php
            $settings = get_option(UBERMENU_PREFIX . main);
            ?>

            <!-- US Homepage -->
            <?php if ($country_code == "us" && is_front_page() && $env !== "dev" && $env !== "stg") : ?>
                <script>function utmx_section() {
                    }
                    function utmx() {
                    }
                    (function () {
                        var
                                k = '94177559-0', d = document, l = d.location, c = d.cookie;
                        if (l.search.indexOf('utm_expid=' + k) > 0)
                            return;
                        function f(n) {
                            if (c) {
                                var i = c.indexOf(n + '=');
                                if (i > -1) {
                                    var j = c.
                                            indexOf(';', i);
                                    return escape(c.substring(i + n.length + 1, j < 0 ? c.
                                            length : j))
                                }
                            }
                        }
                        var x = f('__utmx'), xx = f('__utmxx'), h = l.hash;
                        d.write(
                                '<sc' + 'ript src="' + 'http' + (l.protocol == 'https:' ? 's://ssl' :
                                        '://www') + '.google-analytics.com/ga_exp.js?' + 'utmxkey=' + k +
                                '&utmx=' + (x ? x : '') + '&utmxx=' + (xx ? xx : '') + '&utmxtime=' + new Date().
                                valueOf() + (h ? '&utmxhash=' + escape(h.substr(1)) : '') +
                                '" type="text/javascript" charset="utf-8"><\/sc' + 'ript>')
                    })();
                </script>
                <script>utmx('url', 'A/B');</script>

            <?php endif; ?>
            <?php
            wp_head();
            get_template_part('header_css');
            ?>

            <link rel="icon" href="/wp-content/uploads/2016/07/favicon.png" sizes="32x32" />
            <link rel="icon" href="/wp-content/uploads/2016/07/favicon.png" sizes="192x192" />
            <link rel="apple-touch-icon-precomposed" href="/wp-content/uploads/2016/07/favicon.png" />
            <meta name="msapplication-TileImage" content="/wp-content/uploads/2016/07/favicon.png" />
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <?php
            global $smof_data;
            if ($smof_data['favicon']) {
                echo '<link rel="shortcut icon" href="' . $smof_data['favicon'] . '"/>';
            }
            ?>
             <!--[if lt IE 9]><script src="<?php get_template_directory_uri(); ?>/js/ie8-responsive-file-warning.js"></script><![endif]-->
            <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
            <script src="<?php echo get_template_directory_uri(); ?>/build_js/ie10-viewport-bug-workaround.min.js"></script>
            <script src="<?php echo get_template_directory_uri(); ?>/build_js/ie-emulation-modes-warning.min.js"></script>
            <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!--[if lt IE 9]>
                      <script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.min.js"></script>
                      <script src="<?php echo get_template_directory_uri(); ?>/js/respond.min.js"></script>          
                    <![endif]-->

            <!--[if IE 6]>
            <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/ie6.css" media="screen" type="text/css" />
            <![endif]-->
            <!--[if IE 7]>
            <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/ie7.css" media="screen" type="text/css" />
            <![endif]-->
            <!--[if IE 8]>
            <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/ie8.css" media="screen" type="text/css" />
            <![endif]-->
            <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
            <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/ie-style.css" />
            <![endif]-->

            <?php require('custommegamenudev.php'); ?>

            <?php get_template_part('inc/custom-styles'); ?>

            <?php
            $blog_url = get_bloginfo('url');
            $url = parse_url($blog_url);
            $url_paths = explode(".", $blog_url);
            ?>
        </head>
        <body <?php body_class(); ?>>           
            <?php
            $pagetype = $smof_data['pagetype'];
            if ($pagetype == "boxed") {
                echo '<div class="main-container">';
            }

            get_template_part('navigation');
            ?>            
