<?php
/*
*Header for menu
*/
?>
<!DOCTYPE html>
<!--[if IE 8]><html lang="en" class="ie8"><![endif]-->
<!--[if !IE]><!--><html lang="en"><!--<![endif]-->

    <html <?php language_attributes(); ?>>
        <head>
            <meta http-equiv="x-ua-compatible" content="ie=edge">
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <link href='https://fonts.googleapis.com/css?family=Open+Sans:100,300' rel='stylesheet' type='text/css'>
            <!--link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>/wp-content/themes/bandaid/css/fonts.css" /-->
            <?php
            // Get country code of current site and current environment
            require_once(dirname(__FILE__) . '/custom_functions/get_country_code.php');
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

                    (function () {
                        var s = function () {
                            var e, t;
                            var n = 10;
                            var r = 0;
                            e = document.createElement("script");
                            e.type = "text/javascript";
                            e.async = true;
                            e.src = "//" + __sf_config.host + "/js/frs-next.js";
                            t = document.getElementsByTagName("script")[0];
                            t.parentNode.insertBefore(e, t);
                            var i = function () {
                                if (r < n) {
                                    r++;
                                    if (typeof frt !== "undefined") {
                                        frt(__sf_config);
                                    } else {
                                        setTimeout(function () {
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
                </script><script>utmx('url', 'A/B');</script>

            <?php endif; ?>



            <?php wp_head(); ?>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <?php
            global $smof_data;
            if ($smof_data['favicon']) {
                echo '<link rel="shortcut icon" href="' . $smof_data['favicon'] . '"/>';
            }
            ?>
             <!--[if lt IE 9]><script src="<?php get_template_directory_uri(); ?>/js/ie8-responsive-file-warning.js"></script><![endif]-->
            <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
            <script src="<?php echo get_template_directory_uri(); ?>/js/ie10-viewport-bug-workaround.js"></script>
            <script src="<?php echo get_template_directory_uri(); ?>/js/ie-emulation-modes-warning.js"></script>
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
            <?php
            if (function_exists('gtm4wp_the_gtm_tag')) {
                gtm4wp_the_gtm_tag();
            }
            ?>
            <?php
            $pagetype = $smof_data['pagetype'];
            if ($pagetype == "boxed") {
                echo '<div class="main-container">';
            }
            ?>
            <?php
            get_template_part('navigation');
            get_template_part('slider');
            ?>            
