<?php get_header();
/*
 Template name: UK Cloud Transformation Grow Template
 */
?>
<?php
get_template_part('navigation');
?>

<?php while (have_posts()) : the_post(); ?>


<div id="headerimage"><img src="http://dev.ingrammicrocloud.com/wp-content/themes/viral/page-uk-cloud-transformation/images/grow_header.jpg" alt="Grow your Cloud opportunity with Microsoft CSP. Register today to attend our latest CSP Webinar" width="1330" height="500" class="headerimage" /></div>
<div class="navfull">
<nav class="clearfix">
  <ul class="clearfix">
    <li><a href="/cloud-transformation/realise/" class="realise">REALISE</a></li>
    <li><a href="/cloud-transformation/transform/" class="transform">TRANSFORM</a></li>
    <li><a href="/cloud-transformation/activate/" class="activate">ACTIVATE</a></li>
    <li><a href="/cloud-transformation/grow/" class="grow current">GROW</a></li>
  </ul>
  <a href="#" id="pull">Menu</a>
	</nav>
    </div>

<div class="clear"></div>
<div id="wrapper">
  
  <div class="row">
    <h2>Ingram Micro Cloud: your trusted Microsoft CSP partner.</h2>

    <div class="main">
    <h4>Over 30,000 channel partners worldwide choose to use the Ingram Micro Cloud Marketplace to purchase, provision and manage their Microsoft CSP business. </h4>
    <p>With a vast catalogue of Microsoft cloud services available, establishing, growing and maintaining your growth in the Cloud has never been easier, more affordable and flexible.</p>
<br />
    <p>Partners can instantly shop on the Cloud Marketplace, create bundled offerings, provision multiple services and stay in control of their customer's billing &mdash; 24x7 from the Cloud Marketplace.</p>
<br />    
<p>All our Cloud partners not only benefit from the straightforward procurement and management process that Cloud Marketplace provides, they also have access to our large, dedicated Cloud team of Microsoft CSP experts &mdash; and these are just a few reasons why Ingram Micro Cloud was awarded the CRN Cloud Distributor of the Year 2015.</p>
<br />
    <h4 class="linkbox"><strong>CSP from Ingram Micro Cloud</strong></h4>
    <h4 style="color:#02A79E"><strong>The CSP program from Ingram Micro Cloud provides:</strong></h4>
    <p><strong>ACCESS</strong><br />
      Offer customers new Cloud solutions and services, break into new markets and build new capabilities.</p>
<br/ >    
<p><strong>BUNDLE</strong><br />
      Create the ultimate bundles for your clients by combining value-added services with those offered on the Ingram Micro Cloud Marketplace. Make it easy for your clients to decide which services they want.</p>
<br/ >    
<p><strong>SUPPORT</strong><br />
      When you sell cloud solutions through the Ingram Micro CSP program, you can support your customers directly, whilst taking advantage of Ingram Micro Cloud's sales, technical and marketing support.</p>
<br/ >    
<p><strong>BILL</strong><br />
      You set your own prices and margins. You bill your customers directly and own the customer relationship. It really couldn't be any easier for you to succeed in the Cloud. </p>
    <div class="clear"></div>    
    </div>
    <div class="rail">
      <h4 style="color:#02A79E;"><strong>Learn about Microsoft CSP: Are you leaving money on the table?</strong></h4>
      
	<p style="text-align: center;">
	  <?php
		echo do_shortcode('[video_lightbox_youtube video_id="pwJwmKd5-SA" width="640" height="480" anchor="http://dev.ingrammicrocloud.com/wp-content/themes/viral/page-uk-cloud-transformation/images/csp_video.jpg"]');
	  ?>
	  </p>

    <div class="form" style="margin-top: 30px;">
<h4 style="margin-top:15px; margin-bottom:0px;"><strong>Register today</strong> to attend our latest free CSP program webinar.</h4>
<iframe src="https://ingrammicro.marketing.dynamics.com/LeadManagement/MaintainLeadForm.aspx?SOURCEKEYOID=101740&LANGUAGECODE=en-US" width="100%" height="500px" style=""></iframe>
    </div>
    <img src="http://dev.ingrammicrocloud.com/wp-content/themes/viral/page-uk-cloud-transformation/images/grow_logos_hor.jpg" width="100%" height="auto" alt="Logos" class="growlogos"/> </div>
        <div class="clear"></div>
</div>
</div>


<?php the_content(); endwhile; ?>

<?php get_footer(); ?>