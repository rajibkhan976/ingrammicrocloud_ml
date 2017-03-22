<?php
/*
Plugin Name: List Category Posts - Template "PR"
Plugin URI: http://picandocodigo.net/programacion/wordpress/list-category-posts-wordpress-plugin-english/
Description: Template file for List Category Post Plugin for Wordpress ingrammicrocloud.com/newsroom page
Version: 0.1
Author: Brian Wobst
Author URI: http://ingrammicrocloud.com
*/


/**
* The format for templates changed since version 0.17.  Since this
* code is included inside CatListDisplayer, $this refers to the
* instance of CatListDisplayer that called this file.
*/

/* This is the string which will gather all the information.*/
$lcp_display_output = '';

// Show category link:
$lcp_display_output .= $this->get_category_link('strong');

// Show the conditional title:
$lcp_display_output .= $this->get_conditional_title();

//Add 'starting' tag. Here, I'm using an unordered list (ul) as an example:
$lcp_display_output .= '<ul class="lcp_catlist">';

/* Posts Loop
 *
 * The code here will be executed for every post in the category.  As
 * you can see, the different options are being called from functions
 * on the $this variable which is a CatListDisplayer.
 *
 * CatListDisplayer has a function for each field we want to show.  So
 * you'll see get_excerpt, get_thumbnail, etc.  You can now pass an
 * html tag as a parameter. This tag will sorround the info you want
 * to display. You can also assign a specific CSS class to each field.
*/
global $post;
while ( have_posts() ):
  the_post();

  //Start a List Item for each post:
  $lcp_display_output .= "<li>";

  //Show the title and link to the post:
  $lcp_display_output .= "<strong>" . $this->get_post_title($post, 'p', 'lcp_post') . "</strong>";

  //Show date:
  $lcp_display_output .= "<em>" . $this->get_date($post) . "</em>";


  /**
   * Post content - Example of how to use tag and class parameters:
   * This will produce:<p class="lcp_content">The content</p>
   */
  $lcp_display_output .= $this->get_content($post, 'p', 'lcp_content');

  /**
   * Post content - Example of how to use tag and class parameters:
   * This will produce:<div class="lcp_excerpt">The content</div>
   */
  $lcp_display_output .= $this->get_excerpt($post, 'div', 'lcp_excerpt');

  // Get Posts "More" link:
  $lcp_display_output .= $this->get_posts_morelink($post);

  //Close li tag
  $lcp_display_output .= '</li><br /><br />';
endwhile;

// Close the wrapper I opened at the beginning:
$lcp_display_output .= '</ul>';

// If there's a "more link", show it:
$lcp_display_output .= $this->get_morelink();

// Get category posts count
$lcp_display_output .= $this->get_category_count();

//Pagination
$lcp_display_output .= $this->get_pagination();

$this->lcp_output = $lcp_display_output;