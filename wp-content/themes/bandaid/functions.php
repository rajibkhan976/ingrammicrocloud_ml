<?php
/**
 * bandaid functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bandaid
 */
if (!function_exists('bandaid_setup')) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function bandaid_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on bandaid, use a find and replace
         * to change 'bandaid' to the name of your theme in all the template files.
         */
        load_theme_textdomain('bandaid', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
//        register_nav_menus(array(
//            'primary' => esc_html__('Primary', 'bandaid'),
//        ));
        register_nav_menus(array('primary' => 'Primary Navigation Menu', 'onepage-menu' => 'Onepage Menu', 'super-menu' => 'Super Menu'));
        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        /*
         * Enable support for Post Formats.
         * See https://developer.wordpress.org/themes/functionality/post-formats/
         */
        add_theme_support('post-formats', array(
            'aside',
            'image',
            'video',
            'quote',
            'link',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('bandaid_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));
    }

endif; // bandaid_setup
add_action('after_setup_theme', 'bandaid_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bandaid_content_width() {
    $GLOBALS['content_width'] = apply_filters('bandaid_content_width', 640);
}

add_action('after_setup_theme', 'bandaid_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bandaid_widgets_init() {
    register_sidebar(array(
        'name' => esc_html__('Sidebar 1', 'bandaid'),
        'id' => 'sidebar-1',
        'description' => '',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Sidebar 2', 'bandaid'),
        'id' => 'sidebar-2',
        'description' => '',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'bandaid_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function bandaid_scripts() {
    $ver = '20161209';
    $min = '.min';
    // Scripts
    //wp_enqueue_script('bandaid-jquery-js', get_template_directory_uri() . '/js/jquery.js');
//    wp_localize_script('adbutler_ajax_script', 'ajax_object', array(
//        'ajax_url' => admin_url('admin-ajax.php')
//    ));

//    wp_enqueue_script('scripts', get_template_directory_uri() . '/build_js/scripts' . $min . '.js?ver=' . $ver, array('jquery'), null, true);
//    wp_enqueue_script('scripts');
//    wp_enqueue_script('bandaid-bootstrap4alpha-js', get_template_directory_uri() . '/build_js/bootstrap.min.js', array('jquery'), '1.0.0', true);
    //wp_enqueue_script('bandaid-slick-js', get_template_directory_uri() . '/build_js/slick.min.js', array('jquery'), '1.0.0', true);
//    wp_enqueue_script('bandaid-jquery-modal-js', get_template_directory_uri() . '/build_js/modal' . $min . '.js', array('jquery'), '1.0.0', true);
//    wp_enqueue_script('bandaid-font-awesome-js', '//use.fontawesome.com/adfe0ff28b.js', array('jquery'), '1.0.0', true);
//    wp_enqueue_script('bandaid-custom-global-helpers-js', get_template_directory_uri() . '/js/custom/global-helpers.js?ver='.$ver, array('jquery'), null, true);
//    wp_enqueue_script('bandaid-custom-component-nav-js', get_template_directory_uri() . '/js/custom/component-nav.js?ver='.$ver, array('jquery'), null, true);
//    wp_enqueue_script('bandaid-custom-config-vars-js', get_template_directory_uri() . '/js/custom/config-vars.js?ver='.$ver, array('jquery'), null, true);
//    wp_enqueue_script('bandaid-custom-footer-js', get_template_directory_uri() . '/js/custom/component-footer.js?ver='.$ver, array('jquery'), null, true);
    //wp_enqueue_script('retina', get_template_directory_uri() . '/js/retina.js', true);
    //wp_enqueue_script('retina');
    //wp_enqueue_script('count', get_template_directory_uri() . '/js/jquery.plugin.min.js', true);
    //wp_enqueue_script('count');
    //wp_enqueue_script('countdown', get_template_directory_uri() . '/js/jquery.countdown.min.js', true);
    //wp_enqueue_script('countdown');
//    wp_enqueue_script('loader', get_template_directory_uri() . '/js/jquery.queryloader2.js?ver='.$ver, array('jquery'), null, true);
//    wp_enqueue_script('loader');
//    wp_enqueue_script('prettyPhoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.js?ver='.$ver, array('jquery'), null, true);
//    wp_enqueue_script('prettyPhoto');
    // wp_enqueue_script('fitVids', get_template_directory_uri() . '/js/jquery.fitvids.js', array('jquery'), '1.0.3', true);
    //wp_enqueue_script('fitVids');
    // wp_enqueue_script('flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js', array('jquery'), '2.2.0', true);
    //wp_enqueue_script('flexslider');
    // wp_enqueue_script('easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array('jquery'), '1.3.0', true);
    //wp_enqueue_script('easing');
    //  wp_enqueue_script('quicksand', get_template_directory_uri() . '/js/jquery.quicksand.js', array('jquery'), '1.0.0', true);
    //wp_enqueue_script('quicksand');
    // wp_enqueue_script('waypoints', get_template_directory_uri() . '/js/waypoints.min.js', array('jquery'), '1.0.0', true);
    //wp_enqueue_script('waypoints');
    // wp_enqueue_script('carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '1.0.0', true);
    //wp_enqueue_script('carousel');
    //wp_enqueue_script('jquery-modal', get_template_directory_uri() . '/js/jquery.modal.min.js', true);
    //wp_enqueue_script('template-brazil-custom-landing-page', get_template_directory_uri() . '/js/template-brazil-custom-landing-page.js', true);
    // Page-Specific Styles & Scripts
//    if (is_front_page()) {
//        wp_enqueue_script('bandaid-custom-page-home-js', get_template_directory_uri() . '/js/custom/page-home.js?ver='.$ver, array('jquery'), null, true);
//    } else {
//        if (is_page('become-a-partner')) {
//        
//        wp_enqueue_script('bandaid-custom-page-become-a-partner-js', get_template_directory_uri() . '/js/custom/page-become-a-partner.js?ver='.$ver, array('jquery'), null, true);
//        }
//
//        wp_enqueue_script('bandaid-custom-page-categories-js', get_template_directory_uri() . '/js/custom/page-categories.js?ver='.$ver, array('jquery'), null, true);
//        
//       
//        if (is_page('newsroom') || is_page('newsroom-pagination')) {
//            wp_enqueue_script('bandaid-newsroom-new-window', get_template_directory_uri() . '/js/custom/page-newsroom.js?ver='.$ver, array('jquery'), null, true);
//        }
//       
//        wp_enqueue_script('bandaid-custom-component-sidebar-ads-js', get_template_directory_uri() . '/js/custom/component-sidebar-ads.js?ver='.$ver, array('jquery'), null, true);
//        
//    }
    global $smof_data;
    $darktheme = $smof_data['dark_theme'];
    if ($darktheme == 1) {
        wp_register_style('dark_theme', get_template_directory_uri() . '/build_css/darktheme' . $min . '.css');
        wp_enqueue_style('dark_theme');
    }
}

add_action('wp_enqueue_scripts', 'bandaid_scripts');

// Register Custom Navigation Walker
require_once('wp_bootstrap_navwalker.php');

register_nav_menus(array(
    'primary' => __('Primary Menu', 'bandaid'),
));

/* Newsletter submission */
require_once("custom_functions/submit_footer_newsletter_signup_form.php");



// Display 12 products per page
add_filter('loop_shop_per_page', create_function('$cols', 'return 20;'), 20);

add_theme_support('woocommerce');
/**
 * Hook in on activation
 */
// Change number or products per row to 3
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {

    function loop_columns() {
        return 3; // 3 products per row
    }

}

global $pagenow;
if (is_admin() && isset($_GET['activated']) && $pagenow == 'themes.php')
    add_action('init', 'yourtheme_woocommerce_image_dimensions', 1);

/**
 * Define image sizes
 */
function yourtheme_woocommerce_image_dimensions() {
    $catalog = array(
        'width' => '500', // px
        'height' => '500', // px
        'crop' => 1   // true
    );

    $single = array(
        'width' => '700', // px
        'height' => '700', // px
        'crop' => 1   // true
    );

    $thumbnail = array(
        'width' => '300', // px
        'height' => '300', // px
        'crop' => 0   // false
    );

    // Image sizes
    update_option('shop_catalog_image_size', $catalog);   // Product category thumbs
    update_option('shop_single_image_size', $single);   // Single product image
    update_option('shop_thumbnail_image_size', $thumbnail);  // Image gallery thumbs
}

// set up textdomain
load_theme_textdomain('exquisite', get_template_directory() . '/lang');

//Viral theme code
// Display 12 products per page
add_filter('loop_shop_per_page', create_function('$cols', 'return 20;'), 20);

add_theme_support('woocommerce');
/**
 * Hook in on activation
 */
// Change number or products per row to 3
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {

    function loop_columns() {
        return 3; // 3 products per row
    }

}

// set up textdomain
load_theme_textdomain('exquisite', get_template_directory() . '/lang');

/* Flush rewrite rules */

function shiv_flush_rewrite_rules() {
    flush_rewrite_rules();
}

add_action('after_switch_theme', 'shiv_flush_rewrite_rules');

function pagination($pages = '', $range = 1) {
    $showitems = ($range * 2) + 1;
    global $paged;
    if (empty($paged))
        $paged = 1;
    if ($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if (!$pages) {
            $pages = 1;
        }
    }
    if (1 != $pages) {
        echo "<div class=\"pagination\">";
        if ($paged > 2 && $paged > $range + 1 && $showitems < $pages)
            echo "<a href='" . get_pagenum_link(1) . "'>&laquo; First</a>";
        if ($paged > 1 && $showitems < $pages)
            echo "<span><a href='" . get_pagenum_link($paged - 1) . "'>&lsaquo; Previous</a></span>";

        for ($i = 1; $i <= $pages; $i++) {
            if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems )) {
                echo ($paged == $i) ? "<span class=\"current\">" . $i . "</span>" : "<a href='" . get_pagenum_link($i) . "' class=\"inactive\">" . $i . "</a>";
            }
        }

        if ($paged < $pages && $showitems < $pages)
            echo "<span><a href=\"" . get_pagenum_link($paged + 1) . "\">Next &rsaquo;</a></span>";
        if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages)
            echo "<span><a href='" . get_pagenum_link($pages) . "'>Last &raquo;</a></span>";
        echo "</div>\n";
    }
}

function paginate_news() {
    global $wp_query, $wp_rewrite;
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

    $pagination = array(
        'base' => @add_query_arg('page', '%#%'),
        'format' => '',
        'total' => $wp_query->max_num_pages,
        'current' => $current,
        'show_all' => false,
        'type' => 'list',
        'next_text' => '&raquo;',
        'prev_text' => '&laquo;',
        'prev_next' => false
    );

    if ($wp_rewrite->using_permalinks())
        $pagination['base'] = user_trailingslashit(trailingslashit(remove_query_arg('s', get_pagenum_link(1))) . 'page/%#%/', 'paged');

    if (!empty($wp_query->query_vars['s']))
        $pagination['add_args'] = array('s' => get_query_var('s'));

    echo paginate_links($pagination);
}

function paginate() {
    global $wp_query, $wp_rewrite;
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

    $pagination = array(
        'base' => @add_query_arg('page', '%#%'),
        'format' => '',
        'total' => $wp_query->max_num_pages,
        'current' => $current,
        'show_all' => false,
        'type' => 'list',
        'next_text' => '&raquo;',
        'prev_text' => '&laquo;'
    );

    if ($wp_rewrite->using_permalinks())
        $pagination['base'] = user_trailingslashit(trailingslashit(remove_query_arg('s', get_pagenum_link(1))) . 'page/%#%/', 'paged');

    if (!empty($wp_query->query_vars['s']))
        $pagination['add_args'] = array('s' => get_query_var('s'));

    echo paginate_links($pagination);
}

function get_onepage_excerpt() {
//	$permalink = get_permalink($post->ID);
    $excerpt = get_the_content();
    $excerpt = preg_replace(" (\[.*?\])", '', $excerpt);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, 130);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = trim(preg_replace('/\s+/', ' ', $excerpt));
    $excerpt = $excerpt . '';
    return $excerpt;
}

function get_widget_excerpt() {
//	$permalink = get_permalink($post->ID);
    $excerpt = get_the_content();
    $excerpt = preg_replace(" (\[.*?\])", '', $excerpt);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, 60);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = trim(preg_replace('/\s+/', ' ', $excerpt));
    $excerpt = $excerpt . ' [...]';
    return $excerpt;
}

function get_portfolio_excerpt() {
//	$permalink = get_permalink($post->ID);
    $excerpt = get_the_content();
    $excerpt = preg_replace(" (\[.*?\])", '', $excerpt);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, 150);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = trim(preg_replace('/\s+/', ' ', $excerpt));
    $excerpt = $excerpt . ' [...]';
    return $excerpt;
}

// load admin-only scripts
if (is_admin()) {

    function exquisite_scripts() {
        wp_register_script('metabox', get_template_directory_uri() . '/inc/metaboxes/js/metabox.js', array('jquery'));
        wp_enqueue_script('metabox');
    }

}
add_action('admin_enqueue_scripts', 'exquisite_scripts');

// custom portfolio link to trigger ajax in multipage mode
function custom_previous_post_link($format, $link, $in_same_cat = false, $excluded_categories = '', $previous = true) {
    if ($previous && is_attachment())
        $post = & get_post($GLOBALS['post']->post_parent);
    else
        $post = get_adjacent_post($in_same_cat, $excluded_categories, $previous);

    if (!$post)
        return;

    $link = get_permalink($post) . '?ajax=1';

    $format = str_replace('%link', $link, $format);

    $adjacent = $previous ? 'previous' : 'next';
    echo apply_filters("{$adjacent}_post_link", $format, $link);
}

// custom portfolio link to trigger ajax in multipage mode
function custom_next_post_link($format, $link, $in_same_cat = false, $excluded_categories = '', $previous = true) {
    if ($previous && is_attachment())
        $post = & get_post($GLOBALS['post']->post_parent);
    else
        $post = get_adjacent_post($in_same_cat, $excluded_categories, $previous);

    if (!$post)
        return;

    $link = get_permalink($post) . '?ajax=1';

    $format = str_replace('%link', $link, $format);

    $adjacent = $previous ? 'previous' : 'next';
    echo apply_filters("{$adjacent}_post_link", $format, $link);
}

// load google fonts
function add_google_fonts() {
    wp_register_style('PTSans', 'https://fonts.googleapis.com/css?family=PT+Sans');
    wp_enqueue_style('PTSans');
    wp_register_style('RobotoCondensed', 'https://fonts.googleapis.com/css?family=Roboto+Condensed');
    wp_enqueue_style('RobotoCondensed');
}

//add_action('wp_print_styles', 'add_google_fonts');

// Disable admin bar display
//add_filter('show_admin_bar', '__return_false');
//Slightly Modified Options Framework

require_once ('admin/index.php');

// metaboxes
define('RWMB_URL', trailingslashit(get_template_directory_uri() . '/inc/metaboxes'));
define('RWMB_DIR', trailingslashit(get_template_directory() . '/inc/metaboxes'));
include_once (get_template_directory() . '/inc/metaboxes.php');
include_once (get_template_directory() . '/inc/metaboxes/meta-box.php');

// shortcodes
//include_once (get_template_directory() . '/inc/zilla-shortcodes/zilla-shortcodes.php');
//include_once (get_template_directory() . '/inc/zilla-shortcodes/shortcodes.php');

// plugin activator
//include_once (get_template_directory() . '/inc/class-tgm-plugin-activation.php');
//include_once (get_template_directory() . '/inc/plugin-activator.php');
//Home page slider
//include_once (get_template_directory() . '/inc/home_page_carousel.php');
// post types
add_theme_support('post-formats', array('gallery', 'quote', 'audio', 'video'));

// Sidebar 3 
register_sidebar(array('name' => __('Sidebar 3', 'bandaid'), 'id' => 'sidebar-3', 'description' => __('Sidebar 3 .', 'bandaid'), 'before_widget' => '<div id="%1$s" class="widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<h3>', 'after_title' => '</h3>'));
// blog sidebar
register_sidebar(array('name' => __('Blog Sidebar', 'bandaid'), 'id' => 'blog-sidebar', 'description' => __('Blog widgets.', 'bandaid'), 'before_widget' => '<div id="%1$s" class="widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<h3>', 'after_title' => '</h3>'));

// store sidebar
//register_sidebar(array('name' => __('Store Sidebar', 'bandaid'), 'id' => 'store-sidebar', 'description' => __('Store widgets.', 'exquisite'), 'before_widget' => '<div id="%1$s" class="widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<h3>', 'after_title' => '</h3>'));
// portfolio sidebar
//register_sidebar(array('name' => __('Portfolio Sidebar', 'bandaid'), 'id' => 'portfolio-sidebar', 'description' => __('Portfolio widgets.', 'exquisite'), 'before_widget' => '<div id="%1$s" class="widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<h3>', 'after_title' => '</h3>'));
//register_sidebar(array(
//    'name' => __('Footer Widget 1', 'bandaid'),
//    'id' => 'footer-widget-1',
//    'description' => 'Appears in the footer area',
//    'before_widget' => '<div id="%1$s" class="widget %2$s">',
//    'after_widget' => '</div>',
//    'before_title' => '<h5 class="footer-widget-title">',
//    'after_title' => '</h5>',
//));
//
//
//register_sidebar(array(
//    'name' => __('Footer Widget 2', 'bandaid'),
//    'id' => 'footer-widget-2',
//    'description' => 'Appears in the footer area',
//    'before_widget' => '<div id="%1$s" class="widget %2$s">',
//    'after_widget' => '</div>',
//    'before_title' => '<h5 class="footer-widget-title">',
//    'after_title' => '</h5>',
//));
//
//register_sidebar(array(
//    'name' => __('Footer Widget 3', 'bandaid'),
//    'id' => 'footer-widget-3',
//    'description' => 'Appears in the footer area',
//    'before_widget' => '<div id="%1$s" class="widget %2$s">',
//    'after_widget' => '</div>',
//    'before_title' => '<h5 class="footer-widget-title">',
//    'after_title' => '</h5>',
//));
// Newsroom sidebar
register_sidebar(array(
    'name' => __('Newsroom Sidebar', 'bandaid'),
    'id' => 'newsroom-sidebar',
    'description' => __('Newsroom widgets.', 'exquisite'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>'
));

// post thumbnails
if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
}

// thumbnails sizes
set_post_thumbnail_size(880, 330, true);
add_image_size('post-featured-image', 890, 380, false);
add_image_size('post-featured-image-grids', 580, 300, true);
add_image_size('portfolio-feat', 900, 600, true);
add_image_size('portfolio-thumb', 600, 400, true);
add_image_size('recent-widget-thumb', 75, 75, true);

function nav_menu_add_classes($items, $args) {
    //Add first item class
    $items[1]->classes[] = 'menu-item-first';

    //Add last item class
    $i = count($items);
    while ($items[$i]->menu_item_parent != 0 && $i > 0) {
        $i--;
    }
    $items[$i]->classes[] = 'menu-item-last';

    return $items;
}

add_filter('wp_nav_menu_objects', 'nav_menu_add_classes', 10, 2);


// adjust navigation for one-page display

global $smof_data;
$onepage = $smof_data['onepage'];
if ($onepage == 1) {

    function adjusts_navigation($output) {

        $slugs_array = array();

        //  Get all pages included in single page display
        $menu = array('posts_per_page' => '-1', 'post_type' => array('page'));
        $menu_query = new WP_Query($menu);
        //  query all pages
        while ($menu_query->have_posts()) : $menu_query->the_post();
            //  for each page
            $getid = get_the_ID();
            $onepage = get_post_meta($getid, "shiv_include", true);
            if ($onepage == 1) :
                array_push($slugs_array, $getid);
            endif;
        endwhile;
        wp_reset_query();


        $menu_name = 'onepage-menu';
        //  assign primary menu as home page menu

        if (has_nav_menu($menu_name)) {//  if primary menu exists
            $locations = get_nav_menu_locations();
            $menu = wp_get_nav_menu_object($locations[$menu_name]);
            $menu_items = wp_get_nav_menu_items($menu->term_id);

            $menu_counter = 0;
            global $menu_counter;

            foreach ($menu_items as $menu_item) {
                $menu_counter++;
                $title = $menu_item->title;
                $url = $menu_item->url;

                $homeurl = get_home_url();
                $name = $menu_item->object_id;

                $slugs = $name;
                $type = $menu_item->type;

                if ($type != 'custom') {

                    foreach ($slugs_array as $slug2) {
                        if ($slug2 == $slugs) {
                            $output = str_replace($url, get_home_url() . '/#' . $slugs, $output);
                        }
                    }
                }
            }
            return $output;
        }
    }

#add_filter('walker_nav_menu_start_el', 'adjusts_navigation');
}

// portfolio

function portfolio_posttype() {
    $labels = array('name' => __('Portfolio', 'exquisite'), 'singular_name' => __('Portfolio Item', 'exquisite'), 'add_new' => __('Add New Item', 'exquisite'), 'edit_item' => __('Edit Portfolio Item', 'exquisite'), 'new_item' => __('Add New Portfolio Item', 'exquisite'), 'add_new_item' => __('Add New Item', 'exquisite'), 'view_item' => __('View Portfolio Item', 'exquisite'), 'not_found' => __('Nothing to display', 'exquisite'),);
    $args = array('labels' => $labels, 'public' => true, 'show_ui' => true, 'capability_type' => 'post', 'hierarchical' => false, 'rewrite' => array('slug' => 'portfolio-item'), 'supports' => array('title', 'editor', 'thumbnail'));
    register_post_type('portfolio', $args);
}

add_action('init', 'portfolio_posttype');

// portfolio caregories
function portfolio_categories() {
    $labels = array('name' => __('Portfolio Categories', 'exquisite'), 'singular_name' => __('Portfolio Category', 'exquisite'), 'search_items' => __('Search Portfolio Categories', 'exquisite'), 'popular_items' => __('Popular Portfolio Categories', 'exquisite'), 'all_items' => __('All Portfolio Categories', 'exquisite'), 'parent_item' => null, 'parent_item_colon' => null, 'edit_item' => __('Edit Portfolio Categories', 'exquisite'), 'update_item' => __('Update Portfolio Category', 'exquisite'), 'add_new_item' => __('Add New Category', 'exquisite'), 'new_item_name' => __('New Category Name', 'exquisite'), 'separate_items_with_commas' => __('Separate Categories With Commas', 'exquisite'), 'add_or_remove_items' => __('Add or Remove Categories', 'exquisite'), 'choose_from_most_used' => __('Choose from Most Used Categories', 'exquisite'), 'not_found' => __('No Caategories Found', 'exquisite'), 'menu_name' => __('Portfolio Categories', 'exquisite'),);
    $args = array('labels' => $labels, 'hierarchical' => true, 'show_ui' => true, 'show_admin_column' => true, 'query_var' => true, 'rewrite' => true,);
    register_taxonomy('portfolio_categories', 'portfolio', $args);
}

add_action('init', 'portfolio_categories', 0);



//  feed links
add_theme_support('automatic-feed-links');


// content max width
if (!isset($content_width))
    $content_width = 960;

function exquisite_enqueue_comments_reply() {
    if (get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('comment_form_before', 'exquisite_enqueue_comments_reply');

/*
 * RECENT POSTS
 * WIDGET
 */

class exquisite_Widget_Recent_Posts extends WP_Widget {

    function __construct() {
        $widget_ops = array('classname' => 'widget_recent_entries', 'description' => __("Your site&#8217;s most recent Posts.", "exquisite"));
        parent::__construct('recent-posts', __('Recent Posts', "exquisite"), $widget_ops);
        $this->alt_option_name = 'widget_recent_entries';

        add_action('save_post', array($this, 'flush_widget_cache'));
        add_action('deleted_post', array($this, 'flush_widget_cache'));
        add_action('switch_theme', array($this, 'flush_widget_cache'));
    }

    function widget($args, $instance) {
        $cache = wp_cache_get('widget_recent_posts', 'widget');

        if (!is_array($cache))
            $cache = array();

        if (!isset($args['widget_id']))
            $args['widget_id'] = $this->id;

        if (isset($cache[$args['widget_id']])) {
            echo $cache[$args['widget_id']];
            return;
        }

        ob_start();
        extract($args);

        $title = (!empty($instance['title']) ) ? $instance['title'] : __('Recent Posts', "exquisite");
        $title = apply_filters('widget_title', $title, $instance, $this->id_base);
        $number = (!empty($instance['number']) ) ? absint($instance['number']) : 10;
        if (!$number)
            $number = 10;
        $show_date = isset($instance['show_date']) ? $instance['show_date'] : false;

        $r = new WP_Query(apply_filters('widget_posts_args', array('posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true)));
        if ($r->have_posts()) :
            ?>
            <?php echo $before_widget; ?>
            <?php if ($title) echo $before_title . $title . $after_title; ?>
            <ul>
                <?php while ($r->have_posts()) : $r->the_post(); ?>
                    <li>

                        <a href="<?php the_permalink(); ?>" class="recent-widget-permalink"><i class="fa fa-pencil"> </i> <?php the_title(); ?></a>
                        <span class="widget-exceprt"><?php echo get_widget_excerpt(); ?></span><br>
                        <?php if ($show_date) : ?>
                            <span class="post-date"><?php echo get_the_date(); ?></span>
                        <?php endif; ?>
                    </li>
                <?php endwhile; ?>
            </ul>
            <?php echo $after_widget; ?>
            <?php
            // Reset the global $the_post as this query will have stomped on it
            wp_reset_postdata();

        endif;

        $cache[$args['widget_id']] = ob_get_flush();
        wp_cache_set('widget_recent_posts', $cache, 'widget');
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = (int) $new_instance['number'];
        $instance['show_date'] = isset($new_instance['show_date']) ? (bool) $new_instance['show_date'] : false;
        $this->flush_widget_cache();

        $alloptions = wp_cache_get('alloptions', 'options');
        if (isset($alloptions['widget_recent_entries']))
            delete_option('widget_recent_entries');

        return $instance;
    }

    function flush_widget_cache() {
        wp_cache_delete('widget_recent_posts', 'widget');
    }

    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $number = isset($instance['number']) ? absint($instance['number']) : 5;
        $show_date = isset($instance['show_date']) ? (bool) $instance['show_date'] : false;
        ?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'exquisite'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

        <p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:', 'exquisite'); ?></label>
            <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>

        <p><input class="checkbox" type="checkbox" <?php checked($show_date); ?> id="<?php echo $this->get_field_id('show_date'); ?>" name="<?php echo $this->get_field_name('show_date'); ?>" />
            <label for="<?php echo $this->get_field_id('show_date'); ?>"><?php _e('Display post date?', 'exquisite'); ?></label></p>
        <?php
    }

}

add_action('widgets_init', create_function('', 'register_widget( "exquisite_Widget_Recent_Posts" );'));

function the_breadcrumb() {
    global $post;
    echo '<ul id="breadcrumbs">';
    if (!is_home()) {
        echo '<li><a href="';
        echo home_url();
        echo '">';
        echo 'Home';
        echo '</a></li> / ';
        if ($post->post_type == "portfolio") {
            echo '<li> ' . get_the_title() . '</li>';
        } elseif (is_woocommerce && is_category() || is_single()) {
            echo '<li>';
            the_category(' </li> / <li> ');
            if (is_single()) {
                echo '</li> // <li>';
                the_title();
                echo '</li>';
            }
        } elseif (is_page()) {
            if ($post->post_parent) {
                $anc = get_post_ancestors($post->ID);
                $title = get_the_title();
                foreach ($anc as $ancestor) {
                    $output = '<li><a href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li> / ';
                }
                echo $output;
                echo $title;
            } else {
                echo '<li>' . get_the_title() . '</li> / ';
            }
        } elseif (is_tag()) {
            single_tag_title();
        } elseif (is_day()) {
            echo"<li>";
            _e('Archive for: ', 'exquisite');
            the_time('F jS, Y');
            echo'</li>';
        } elseif (is_month()) {
            echo"<li>";
            _e('Archive for: ', 'exquisite');
            the_time('F, Y');
            echo'</li>';
        } elseif (is_year()) {
            echo"<li>";
            _e('Archive for: ', 'exquisite');
            the_time('Y');
            echo'</li>';
        } elseif (is_author()) {
            echo"<li>";
            _e('Author Archive', 'exquisite');
            echo'</li>';
        } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
            echo "<li>";
            _e('Blog Archives', 'exquisite');
            echo'</li>';
        } elseif (is_search()) {
            echo"<li>";
            _e('Search results ', 'exquisite');
            echo'</li>';
        }
        echo '</ul>';
    }
}

add_action('wp_enqueue_scripts', 'addcssAndScripts');

function addcssAndScripts() {
    if (is_page('free-margin-assessment')) {
        wp_enqueue_style('margin-calculator-core-style', get_template_directory_uri() . '/build_css/margin-calculator-core' . $min . '.css');
    }
}

function shortcode_to_add_global_ad_placement_to_EU_homepages() {
    // Get country code of current site
    require_once(dirname(__FILE__) . '/custom_functions/get_country_code.php');
    require_once(dirname(__FILE__) . '/custom_functions/global_ad_placement.php');

    $country_code = get_country_code();

    echo global_ad_placement($country_code);
}

add_shortcode('add_global_ad_placement_to_EU_homepages', 'shortcode_to_add_global_ad_placement_to_EU_homepages');
add_filter('wp_get_attachment_url', 'roots_root_relative_url');

function roots_root_relative_url($input) {
    preg_match('/(https?:\/\/[^\/|"]+)/', $input, $matches);
    // make sure we aren't making external links relative
    if (isset($matches[0]) && strpos($matches[0], site_url()) === false) {
        return $input;
    } else {
        return str_replace(end($matches), '', $input);
    }
}

if (is_admin()) {
    add_action('admin_menu', 'create_admin_menu');
    add_action('admin_init', 'register_ab_slick_slider');
}

function create_admin_menu() {
    add_submenu_page('adbutler_plugin', 'Slick Slider', 'Slick Slider', 'manage_options', 'ab_slick_slider', 'ab_slick_slider');
}

function register_ab_slick_slider() {
    register_setting('bg_ab_slick_slider', 'ab_account_id');
    register_setting('bg_ab_slick_slider', 'ab_zone_id');
}

function ab_slick_slider() {
    ?>
    <div class="wrap">
        <form method="post" action="options.php">
            <?php settings_fields('bg_ab_slick_slider'); ?>
            <?php do_settings_sections('bg_ab_slick_slider'); ?>
            <h1>Home page carousel settings</h1>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Account ID</th>
                    <td><input type="text" name="ab_account_id" value="<?php echo esc_attr(get_option('ab_account_id')); ?>" /></td>
                </tr>

                <tr valign="top">
                    <th scope="row">Zone ID</th>
                    <td><span>Use comma(,) as separator for multiple zone ID. Also this sequence of zone ID is the sorting order of the slider.</span><br><textarea name="ab_zone_id" cols="40"><?php echo esc_attr(get_option('ab_zone_id')); ?> </textarea></td>
                </tr>       

            </table>

            <?php submit_button(); ?>

        </form>
    </div>
<?php } ?>