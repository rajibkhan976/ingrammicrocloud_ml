<?php
/**
 * Template Name: APS Partner Connect
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package summit
 */
//get_header('aps');
require("aps_header.php");
?>
<?php  $aps_partner ="aps_partner"; ?>

<div class="platform-page">    
    <section class="panel1 cloud-summit-page" style="display:block; clear:both; position: relative;">
    </section>
<div class="container">
	<div class="row">
    <div id="main-content" class="cloud-inner col-md-8">
        <section id="panel-1">
			<p><b class="text-blue">Are you a service provider looking to expand your portfolio of services and accelerate go-to-market success?</b></p>
            <p><b class="text-blue">Are you an ISV looking to expand your channels to new markets?</b></p>
            <p>Join us for the APS Partner Connect Event as we bring together service providers and ISVs from across the community to discuss new business opportunities and share best practices to drive business growth. </p>
            <div class="text-center" style="margin-top: 50px;">
                <a class="btn btn-primary" href="/wp-content/uploads/2016/11/APS-prospectus-11-21-16-v5.pdf" target="_blank" style="display: inline-block;">DOWNLOAD THE 2017 APS PARTNER <br/> CONNECT PROSPECTUS
                </a>  
            </div>
            <div class="why-should">
<p>Secure Your Registration Today – Spaces Are Limited  <a href="http://www.cvent.com/events/aps-cloud-summit-2017-cvent-registration/event-summary-efb2d7d888034b6c92744bb40827bbe4.aspx?ct=e0786517-2235-4b47-a053-6ce062b21afc&RefID=Ingram%20Registration" target="_blank" class="btn btn-outline-gray" role="button">REGISTER NOW</a></p>

<p>New this year, APS Partner Connect is an exclusive one day track prior to the Ingram Micro Cloud Summit. Together, the APS Partner Connect and Cloud Summit events provide a unique networking opportunity to connect with other cloud service providers and ISVs to help grow your market, learn best practices and create new revenue opportunities. </p>
<h4>Why Attend APS Partner Connect?</h4>
<p>In its 12th event showcase, APS Partner Connect continues to provide value and business opportunity to its attendees. From the most recent event, 80% of respondents generated up to 5 new business opportunities and 95% of respondents found the event “valuable” or “very valuable”.</p>
<p>The format of the event combines an array of presentation slots, a unique speed dating cocktail hour and plenty of networking time to create new connections between yourself and key service provider partners. </p>

<h4>Ingram Micro Cloud Summit – April 19-21, 2017 JW Marriott Desert Ridge Resort & Spa, Phoenix, AZ</h4>
<p>Continue the networking and learning with over 1500 professionals at Cloud Summit. Throughout this three day event, you’ll hear from industry experts leading the way in digital transformation speaking in over 100 educational sessions about what’s on the horizon in the world of Cloud Computing. Cloud Summit combines sessions that are focused on specific topics targeted towards the reseller community. </p>
<div class="text-center" style="margin:30px 0px 50px 0px;">
                <a class="btn btn-primary" href="/wp-content/uploads/2017/01/Cloud-Summit-2017-Prospectus_v11117.pdf" target="_blank" style="display: inline-block;">DOWNLOAD THE 2017 CLOUD SUMMIT PROSPECTUS
                </a>  
            </div>
            </div>
            <div class="custom-form">
                <div class="row">
                    <div class="col-md-9 col-centered">
               		</div>
            </div>
        </section>
    </div>
    <div class="col-md-4">
    	<h3 class="text-center">Event Sponsors</h3>
    	<div class="row eventimg">
            <div class="col-md-12">
        		<div class="col-md-6">
                    <img class="img-responsive" src="http://ingrammicrocloudsummit.com/wp-content/uploads/2017/02/docusign-logo_0.png">
                </div>

                <div class="col-md-6">
                    <img class="img-responsive" src="http://ingrammicrocloudsummit.com/wp-content/uploads/2017/02/Dropbox_business_vertical_blue.png">
                </div>

            </div>
            <div class="col-md-12">

                <div class="col-md-4">
                    <img class="img-responsive" src="http://ingrammicrocloudsummit.com/wp-content/uploads/2017/02/yola_logo.png">
                </div>

                <div class="col-md-4">
                    <img class="img-responsive" src="http://ingrammicrocloudsummit.com/wp-content/uploads/2017/02/ecwid_logo.png">
                </div>


        		<div class="col-md-4">
        			<img class="img-responsive" src="http://ingrammicrocloudsummit.com/wp-content/uploads/2017/02/sitewit-logo-1.png">
    		    </div>
          
    	   </div>

    </div>
    </div><!--end of row div-->
</div>
</div>
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
