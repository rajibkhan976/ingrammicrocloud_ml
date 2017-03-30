<?php
/**
 * Template Name: Blank
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

require("aps_header.php");
?>
<?php  $aps_partner ="aps_partner"; ?>
<div style="clear: both; margin:0;padding: 0;"></div>
<?php
    // TO SHOW THE PAGE CONTENTS
    while ( have_posts() ) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->
        <div>
            <?php the_content(); ?> <!-- Page Content -->
        </div><!-- .entry-content-page -->

    <?php
    endwhile; //resetting the page loop
    wp_reset_query(); //resetting the page query
    ?>
<?php // get_footer(); ?>
<section class="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div id="right-bar-footer">
                    <h3>Follow Us</h3>
                        <a href="https://www.linkedin.com/company/im_cloud" class="social" target="_blank"><i class="fa fa-linkedin"></i></a>
                        <a href="https://twitter.com/IngramCloud" class="social" target="_blank"><i class="fa fa-twitter"></i></a>
                        <a href="https://www.facebook.com/ingrammicrocloud" class="social" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="https://www.youtube.com/user/IngramMicroServices" class="social" target="_blank"><i class="fa fa-youtube"></i></a>
                        <a href="https://plus.google.com/u/0/b/114901709326239147387/+Ingrammicrocloud" class="social" target="_blank"><i class="fa fa-google-plus"></i></a>
                        <a href="https://www.instagram.com/ingrammicrocloud/?hl=en" class="social" target="_blank"><i class="fa fa-instagram"></i></a>
                </div>  
            </div>
            <div class="col-sm-4">
                <div class="regbtn">
                    <div class="contact-info">
                        <?php if(isset($aps_partner)){ echo"<a href='http://www.cvent.com/events/aps-cloud-summit-2017-cvent-registration/event-summary-efb2d7d888034b6c92744bb40827bbe4.aspx?ct=e0786517-2235-4b47-a053-6ce062b21afc&RefID=Ingram%20Registration' target='_blank' class='btn btn-outline-gray footer-btn' role='button'>REGISTER NOW</a>";}else{
                            echo"<a href='http://www.cvent.com/events/cloud-summit-2017/event-summary-3c16f1e8be1d4a4d852b3a82eb33dec7.aspx?ct=b352e06e-1055-4907-9c5c-a2c67385b62d&RefID=Attendee' target='_blank' class='btn btn-outline-gray footer-btn' role='button'>REGISTER NOW</a>";
                        } ?>
                            
            <p style="font-size:10px; margin-top:10px;">*Attendance is subject to Ingram Micro’s approval.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 text-right">
                
                <div class="brought-to-you">
                    <p>
                    Brought to you by: 
                        <img src="/wp-content/themes/summit/img/ingram-logo-white.png"></img></p>
                </div>
                <div class="detailsblock">
                    <p>&copy; <?php echo date('Y'); ?> All Rights Reserved. <a href="http://www.ingrammicrocloud.com/" target="_blank" style="color:#fff;">Ingram Micro Inc. </a></p>
                    <a id="about_us" href="http://www.ingrammicrocloud.com/about/" target="_blank" style="color:#fff;">About Us</a>&nbsp;|&nbsp;<a href="http://www.ingrammicrocloud.com/blog/" target="_blank"  style="color:#fff;">Blog</a>&nbsp;|&nbsp;<a href="http://www.ingrammicrocloud.com/newsroom/" target="_blank"  style="color:#fff;">Newsroom</a> 
                </div>
            </div>
        </div>
    </div>
</section>

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