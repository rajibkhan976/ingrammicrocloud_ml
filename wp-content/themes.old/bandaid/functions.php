<?php
/**
 * bandaid functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bandaid
 */

if ( ! function_exists( 'bandaid_setup' ) ) :
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
	load_theme_textdomain( 'bandaid', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'bandaid' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'bandaid_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // bandaid_setup
add_action( 'after_setup_theme', 'bandaid_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bandaid_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bandaid_content_width', 640 );
}
add_action( 'after_setup_theme', 'bandaid_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bandaid_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar 1', 'bandaid' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar 2', 'bandaid' ),
		'id'            => 'sidebar-2',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'bandaid_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function bandaid_scripts() {
	
	// Styles
	wp_enqueue_style( 'bandaid-bootstrap4alpha-style', get_template_directory_uri() . '/css/bootstrap.css' );
	wp_enqueue_style( 'bandaid-slick-style', get_template_directory_uri() . '/css/slick.css' );
	wp_enqueue_style( 'bandaid-slicktheme-style', get_template_directory_uri() . '/css/slick-theme.css' );
	wp_enqueue_style( 'bandaid-jquery-modal-style', get_template_directory_uri() . '/css/jquery.modal.min.css' );
	wp_enqueue_style( 'bandaid-custom-general-style', get_template_directory_uri() . '/css/custom/general.css' );
	wp_enqueue_style( 'bandaid-custom-nav-style', get_template_directory_uri() . '/css/custom/component-nav.css' );
	wp_enqueue_style( 'bandaid-custom-component-sidebar-category-style', get_template_directory_uri() . '/css/custom/component-sidebar-category.css' );
	wp_enqueue_style( 'bandaid-custom-component-sidebar-platform-style', get_template_directory_uri() . '/css/custom/component-sidebar-platform.css' );
	wp_enqueue_style( 'bandaid-custom-component-footer-style', get_template_directory_uri() . '/css/custom/component-footer.css' );
	
	// Scripts
	wp_enqueue_script( 'bandaid-jquery-js', get_template_directory_uri() . '/js/jquery.js' );
	wp_enqueue_script( 'bandaid-bootstrap4alpha-js', get_template_directory_uri() . '/js/bootstrap.min.js' );
	wp_enqueue_script( 'bandaid-slick-js', get_template_directory_uri() . '/js/slick.min.js' );
	wp_enqueue_script( 'bandaid-jquery-modal-js', get_template_directory_uri() . '/js/jquery.modal.min.js' );
	wp_enqueue_script( 'bandaid-font-awesome-js', '//use.fontawesome.com/adfe0ff28b.js' );
	wp_enqueue_script( 'bandaid-custom-global-helpers-js', get_template_directory_uri() . '/js/custom/global-helpers.js' );
	wp_enqueue_script( 'bandaid-custom-component-nav-js', get_template_directory_uri() . '/js/custom/component-nav.js' );
	wp_enqueue_script( 'bandaid-custom-config-vars-js', get_template_directory_uri() . '/js/custom/config-vars.js' );
	wp_enqueue_script( 'bandaid-custom-footer-js', get_template_directory_uri() . '/js/custom/component-footer.js' );
	
	// Page-Specific Styles & Scripts
	if(is_front_page()) {
		wp_enqueue_style( 'bandaid-custom-page-home-style', get_template_directory_uri() . '/css/custom/page-home.css' );
		wp_enqueue_script( 'bandaid-custom-page-home-js', get_template_directory_uri() . '/js/custom/page-home.js' );
	} else {
		wp_enqueue_style( 'bandaid-custom-page-become-a-partner-style', get_template_directory_uri() . '/css/custom/page-become-a-partner.css' );
		
		wp_enqueue_script( 'bandaid-custom-page-categories-js', get_template_directory_uri() . '/js/custom/page-categories.js' );
		wp_enqueue_style( 'bandaid-custom-page-categories-style', get_template_directory_uri() . '/css/custom/page-categories.css' );
		wp_enqueue_style( 'bandaid-custom-page-about-style', get_template_directory_uri() . '/css/custom/page-about.css' );
		wp_enqueue_style( 'bandaid-custom-page-odin-automation-premium-style', get_template_directory_uri() . '/css/custom/page-odin-automation-premium.css' );
		wp_enqueue_style( 'bandaid-custom-page-platforms-style', get_template_directory_uri() . '/css/custom/page-platforms.css' );
		if(is_page( 313 )){
			wp_enqueue_style( 'bandaid-custom-page-landing-style', get_template_directory_uri() . '/css/custom/page-landing.css' );
		}
		
		wp_enqueue_script( 'bandaid-custom-component-sidebar-ads-js', get_template_directory_uri() . '/js/custom/component-sidebar-ads.js' );
	}
	
}
add_action( 'wp_enqueue_scripts', 'bandaid_scripts' );

// Register Custom Navigation Walker
require_once('wp_bootstrap_navwalker.php');

register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'bandaid' ),
) );

/* Newsletter submission*/
require_once("custom_functions/submit_footer_newsletter_signup_form.php");
