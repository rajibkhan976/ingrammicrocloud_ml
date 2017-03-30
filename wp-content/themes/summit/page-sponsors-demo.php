<?php
/**
 * Template Name: Blank 2
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package summit
 */

get_header();
?>
<?php  #$aps_partner ="aps_partner"; ?>
<div style="clear: both; margin:0;padding: 0;"></div>
<?php
    // TO SHOW THE PAGE CONTENTS
    while ( have_posts() ) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->
    <section class="sub-panel1 why-attend-banner">
		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<div class="logo">
						<a href="<?php echo get_bloginfo('url'); ?>"><img class="img-responsive" src="/wp-content/uploads/2016/11/cloud-summit-2017-logo2.png"></img></a>    
					</div>
				</div>
                	<div class="col-sm-4 pull-right">
                 <a href="http://www.cvent.com/d/3fqj0t/8C?ct=b352e06e-1055-4907-9c5c-a2c67385b62d&RefID=Attendee" target="_blank" class="btn btn-outline-gray" role="button">REGISTER NOW</a>
                 </div>
			</div>
		</div>
	</section>
        <div>
            <?php the_content(); ?> <!-- Page Content -->
        </div><!-- .entry-content-page -->

    <?php
    endwhile; //resetting the page loop
    wp_reset_query(); //resetting the page query
    ?>
<?php get_footer(); ?>


<div class="hidden">
    <div class="reg-pop" id="inline-content">
        <div class="title-bar">
            <h3>Select Registration Type:</h3>
        </div>
        <ul class="reg-list pull-left">
            <li><a target="_blank" href="http://www.cvent.com/d/9rqbg3/4W">SOLUTION PROVIDER</a></li>
            <li><a target="_blank" href="http://www.cvent.com/d/krqbg3/4W">VENDOR SPONSOR</a></li>
        <!--</ul>-->
        <!--<ul class="reg-list reg-list2 pull-left">-->
            <!--<li><a target="_blank" href="https://www.cvent.com/Pub/WebEmails/WebEmail.aspx?te=2446398D-86A4-4EF7-A32C-58051A7BBC93&ti=DAB313A6-F0AD-435F-93BC-7A9D7E793C18&tc=7E5FAD5C-4CFD-4002-970A-F0BA2F0CF954">INGRAM MICRO DIRECTORS</a></li>-->
            <li><a target="_blank" href="http://www.cvent.com/d/mrqbgx/4W">SPEAKERS</a></li>
            <li><a target="_blank" href="http://www.cvent.com/d/8rqbgx/4W">MEDIA/PRESS</a></li>
            <li>INGRAM MICRO ASSOCIATES<br/><small>An Invitation Will Be Sent To You Directly</small></li>
        </ul>
        <div class="clear clearfix"></div>
    </div>
</div>
</body>
</html>
