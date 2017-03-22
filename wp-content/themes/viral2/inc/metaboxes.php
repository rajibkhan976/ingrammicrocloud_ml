<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/docs/define-meta-boxes
 */

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */

$prefix = 'shiv_';

global $meta_boxes;

$meta_boxes = array();

global $smof_data;





/*  PORTFOLIO SETTINGS */
$meta_boxes[] = array(
	'id'		=> $prefix . 'page-portfolio',
	'title'		=> 'Portfolio Options',
	'pages'		=> array( 'page' ),
	'context' => 'normal',

	'fields'	=> array(
		
	array(
			'name'		=> 'Display Type',
			'id'		=> $prefix . 'portfolio_type',
			'type'		=> 'select',
			'options'	=> array(
				'sidebar_two'	=> 'Sidebar + 2 columns',
				'sidebar_three'	=> 'Sidebar + 3 columns',
				'sidebar_list'	=> 'Sidebar + list',
				'fit_two'	=> 'Fit to container - 2 columns',
				'fit_three'	=> 'Fit to container - 3 columns',
				'fit_four'	=> 'Fit to container - 4 columns',
				'fit_carousel_three'	=> 'Fit to container Carousel - 3 columns',
				'fit_carousel_four'	=> 'Fit to container Carousel - 4 columns',
				'fit_carousel_five'	=> 'Fit to container Carousel - 5 columns',
			),
			'multiple'	=> false,
			'std'		=> array( 'fit_four' )
		),
		
		
		
		
	)
);

/*  BLOG SETTINGS */

$meta_boxes[] = array(
	'id' => $prefix . 'page-blog',
	'title' => 'Blog Options',
	'pages' => array( 'page'),
	'context' => 'normal',

	'fields'	=> array(
		
	array(
			'name'		=> 'Display Type',
			'id'		=> $prefix . 'blog_type',
			'type'		=> 'select',
			'options'	=> array(
				
		
				'sidebar_grid_two'	=> 'Grid + Sidebar - 2 columns',
				'sidebar_grid_three'	=> 'Grid + Sidebar - 3 columns',
				'grid_two'	=> 'Grid - 2 columns',
				'grid_three'	=> 'Grid - 3 columns',
				'grid_four'	=> 'Grid - 4 columns',
				'sidebar_list'	=> 'Sidebar + List',
			),
			'multiple'	=> false,
			'std'		=> array( 'sidebar_list' )
		),
		
		
		
		
	)
);




/* ----------------------------------------------------- */
// PAGE SETTINGS
/* ----------------------------------------------------- */

$meta_boxes[] = array(
	'id' => 'pagesettings',
	'title' => 'Page Settings',
	'pages' => array( 'page' ),
	'context' => 'normal',
	'priority' => 'high',


	'fields' => array(

		array(
			'name'		=> 'Include in Single-Page display',
			'id'		=> $prefix . 'include',
			'type' => 'checkbox',
			'std'  => 0,
		),
	
		array(
			'name'		=> 'Alternate Page Title',
			'desc'		=> 'Use < span class="colored" > < / span >, < span class="highlight" > < / span >, < strong > </strong > to spice things up',
			'id'		=> $prefix . "alt_title",
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),

		array(
			'name'		=> 'Subtitle',
			'desc'		=> 'Use < span class="colored" > < / span >, < span class="highlight" > < / span >, < strong > </strong > to spice things up',
			'id'		=> $prefix . "subtitle",
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> ''
		),	
		
		array(
			'name'		=> 'Include Main Slider',
			'id'		=> $prefix . "main_slider",
			'clone'		=> false,
			'type' => 'checkbox',
			'std'  => 0,
		),
		
		array(
			'name'		=> 'Disable page titles',
			'id'		=> $prefix . "disable_titles",
			'clone'		=> false,
			'type' => 'checkbox',
			'std'  => 0,
		),
		
			array(
			'name'		=> 'Enable Page Background',
			'id'		=> $prefix . "page_background",
			'clone'		=> false,
			'type' => 'checkbox',
			'std'  => 0,
		),
		
		
		array(
			'name'	=> 'Background Image',
			'desc'	=> 'Image will be displayed as section background if background image option is exabled',
			'id'	=> $prefix . 'parallax_bg',
			'type'	=> 'plupload_image',
			'max_file_uploads' => 1,
		)
	
	
	)
);



/* ----------------------------------------------------- */
// BLOG SETTINGS
/* ----------------------------------------------------- */


/*  FEATURED SLIDER */
$meta_boxes[] = array(
	'id'		=> $prefix . 'blog-gallery',
	'title'		=> 'Featured Slider Settings',
	'pages'		=> array( 'post' ),
	'context' => 'normal',

	'fields'	=> array(
		array(
			'name'	=> 'Slider Imaes',
			'id'	=> $prefix . 'featured_slides',
			'type'	=> 'plupload_image',
			'max_file_uploads' => 10,
		)
		
	)
);

/*  FEATURED QUOTE */

$meta_boxes[] = array(
	'id' => $prefix . 'blog-quote',
	'title' => 'Featured Quote Settings',
	'pages' => array( 'post'),
	'context' => 'normal',

	'fields' => array(	
		array(
			'name'		=> 'Quote',
			'id'		=> $prefix . 'featured_quote',
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> ''
		),
		array(
			'name'		=> 'Source',
			'id'		=> $prefix . 'featured_source',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
	)
);
/*  FEATURED AUDIO */

$meta_boxes[] = array(
	'id' => $prefix . 'blog-audio',
	'title' => 'Featured Audio Settings',
	'pages' => array( 'post'),
	'context' => 'normal',

	'fields' => array(	
		array(
			'name'		=> 'Audio Code',
			'id'		=> $prefix . 'featured_audio',
			'desc'		=> 'Enter Audio Embed Code.',
			'clone'		=> false,
			'type' 	=> 'textarea',
			'std' 	=> ""
		),
	)
);

/*  FEATURED VIDEO */

$meta_boxes[] = array(
	'id'		=> $prefix . 'blog-video',
	'title'		=> 'Featured Video Settings',
	'pages'		=> array( 'post' ),
	'context' => 'normal',

	'fields'	=> array(
		array(
			'name'		=> 'Type',
			'id'		=> $prefix . 'featured_video',
			'type'		=> 'select',
			'options'	=> array(
				'vimeo'		=> 'Vimeo',
				'youtube'	=> 'Youtube',
				'other'		=> 'Own Embed Code'
			),
			'multiple'	=> false,
			'std'		=> array( 'no' )
		),
		array(
			'name'	=> 'Video ID / Embed Code',
			'id'	=> $prefix . 'video_embed',
			'desc'	=> 'Paste video ID (http://www.youtube.com/watch?v=<b>nzY2Qcu5i2A</b>) or your own Embed Code.',
			'type' 	=> 'textarea',
			'std' 	=> ""
		)
	)
);



/* ----------------------------------------------------- */
/* PORTFOLIO SETTINGS
/* ----------------------------------------------------- */

// Portfolio Main settings 

$meta_boxes[] = array(
	'id' => 'portfolio_page',
	'title' => 'Portfolio Page Options',
	'pages' => array( 'portfolio' ),
	'context' => 'normal',	

	'fields' => array(
	
		array(
			'name'		=> 'Enable Portfolio Items Carousel',
			'id'		=> $prefix . "portfolio_carousel",
			'clone'		=> false,
			'type' => 'checkbox',
			'std'  => 1,
		),
		array(
			'name'		=> 'Portfolio Carousel Name',
			'id'		=> $prefix . 'portfolio_carousel_name',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
		
		array(
			'name'		=> 'Portfolio Carousel Width',
			'id'		=> $prefix . 'portfolio_carousel_width',
			'type'		=> 'select',
			'options'	=> array(
				'full'		=> 'Full Width',
				'fit'	=> 'Fit to Container',
			),
			'multiple'	=> false,
			'std'		=> array( 'fit' )
		),
	)
);

$meta_boxes[] = array(
	'id' => 'portfolio_item',
	'title' => 'Portfolio Item Details',
	'pages' => array( 'portfolio' ),
	'context' => 'normal',	

	'fields' => array(
	
		array(
			'name'		=> 'Item Type',
			'id'		=> $prefix . 'portfolio_item_type',
			'type'		=> 'select',
			'options'	=> array(
				'image'		=> 'Image',
				'slider'	=> 'Slider',
				'video'		=> 'Video'
			),
			'multiple'	=> false,
			'std'		=> array( 'no' )
		),
		
		array(
			'name'		=> 'Client Name',
			'id'		=> $prefix . 'portfolio_client_name',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
		array(
			'name'		=> 'Project Url',
			'id'		=> $prefix . 'portfolio_project_url',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		)
	)
);


// Portfolio Slider Settings

$meta_boxes[] = array(
	'id'		=> $prefix . 'portfolio-gallery',
	'title'		=> 'Project Slider Settings',
	'pages'		=> array( 'portfolio' ),
	'context' => 'normal',

	'fields'	=> array(
		array(
			'name'	=> 'Slider Imaes',
			'id'	=> $prefix . 'portfolio_slides',
			'type'	=> 'plupload_image',
			'max_file_uploads' => 10,
		)
		
	)
);


// Portfolio Video settings

$meta_boxes[] = array(
	'id'		=> $prefix . 'fortfolio-video',
	'title'		=> 'Portfolio Video Settings',
	'pages'		=> array( 'portfolio' ),
	'context' => 'normal',

	'fields'	=> array(
		array(
			'name'		=> 'Type',
			'id'		=> $prefix . 'portfolio_video_type',
			'type'		=> 'select',
			'options'	=> array(
				'vimeo'		=> 'Vimeo',
				'youtube'	=> 'Youtube',
			),
			'multiple'	=> false,
			'std'		=> array( 'no' )
		),
		array(
			'name'	=> 'Video ID / Embed Code',
			'id'	=> $prefix . 'portfolio_video_embed',
			'desc'	=> 'Paste video ID only (http://www.youtube.com/watch?v=<b>nzY2Qcu5i2A</b>)',
			'type' 	=> 'textarea',
			'std' 	=> ""
		)
	)
);




function exquisite_metaboxes()
{
	global $meta_boxes;
	if ( class_exists( 'RW_Meta_Box' ) )
	{
		foreach ( $meta_boxes as $meta_box )
		{
			new RW_Meta_Box( $meta_box );
		}
	}
}
add_action( 'admin_init', 'exquisite_metaboxes' );