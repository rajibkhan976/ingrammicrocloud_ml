<?php
/**
 * summit functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package summit
 */

if ( ! function_exists( 'summit_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function summit_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on summit, use a find and replace
	 * to change 'summit' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'summit', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary Menu', 'summit' ),
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
	add_theme_support( 'custom-background', apply_filters( 'summit_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // summit_setup
add_action( 'after_setup_theme', 'summit_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function summit_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'summit_content_width', 640 );
}
add_action( 'after_setup_theme', 'summit_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function summit_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'summit' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'summit_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function summit_scripts() {
	wp_enqueue_style( 'summit-style', get_stylesheet_uri() );
	wp_enqueue_style( 'summit-font-open-sans', '//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' );
	wp_enqueue_style( 'summit-bootstrap-css', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css' );
	wp_enqueue_style( 'summit-bootstraptheme-css', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css' );
	wp_enqueue_style( 'summit-slick-css', '//cdn.jsdelivr.net/jquery.slick/1.5.8/slick.css' );
	wp_enqueue_style( 'summit-slick-default-css', get_template_directory_uri() . '/css/slick-theme.css' );
	wp_enqueue_style( 'summit-fontawesome-css', '//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'summit-style-colorbox', get_template_directory_uri() . '/css/colorbox.css' );
	wp_enqueue_style( 'summit-style-animate', get_template_directory_uri() . '/css/animate.min.css' );
	wp_enqueue_style( 'summit-style-custom', get_template_directory_uri() . '/css/custom.css' );

	//wp_enqueue_script( 'summit-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	//wp_enqueue_script( 'summit-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_script( 'summit-jquery', '//code.jquery.com/jquery-2.1.4.min.js' );
	wp_enqueue_script( 'summit-jquery-migrate', '//code.jquery.com/jquery-migrate-1.2.1.min.js' );
	wp_enqueue_script( 'summit-bootstrap-js', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js' );
	wp_enqueue_script( 'summit-isotope-js', '//cdnjs.cloudflare.com/ajax/libs/jquery.isotope/2.2.2/isotope.pkgd.min.js' );
	wp_enqueue_script( 'summit-slick-js', '//cdn.jsdelivr.net/jquery.slick/1.5.8/slick.min.js' );
	wp_enqueue_script( 'summit-vide-js', get_template_directory_uri() . '/js/jquery.vide.js' );
	wp_enqueue_script('summitcolorbox-js', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.colorbox/1.6.3/jquery.colorbox-min.js');
	wp_enqueue_script( 'summit-wow-js', get_template_directory_uri() . '/js/wow.min.js' );
	wp_enqueue_script( 'summit-js-custom', get_template_directory_uri() . '/js/custom.js' );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		//wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'summit_scripts' );

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}