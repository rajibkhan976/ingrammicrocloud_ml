<?php /**
 * Template Name: IMC AJAX modal
 * The main template file.
 *
 * This is the template for Ingrammicro about us video popup modal
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bandaid
 */ ?>

<?php

if (have_posts()) : while (have_posts()) : the_post();
        the_content();
    endwhile;
endif;
wp_reset_query();

?>   