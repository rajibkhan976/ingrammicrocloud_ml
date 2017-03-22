<?php get_header();
/*
 Template name: UK Cloud Transformation Activate Template
 */
?>
<?php
get_template_part('navigation');
?>

<?php while (have_posts()) : the_post(); ?>


<div id="headerimage"><a href="https://uk.cloud.im/en/products/microsoft/office-365/"><img src="http://dev.ingrammicrocloud.com/wp-content/themes/viral/page-uk-cloud-transformation/images/activate_header.jpg" alt="Activate your Cloud success. Start transacting on the Ingram Micro Cloud Marketplace" width="1330" height="500" class="headerimage" /></a></div>
<div class="navfull">
<nav class="clearfix">
  <ul class="clearfix">
    <li><a href="/cloud-transformation/realise/" class="realise">REALISE</a></li>
    <li><a href="/cloud-transformation/transform/" class="transform">TRANSFORM</a></li>
    <li><a href="/cloud-transformation/activate/" class="activate current">ACTIVATE</a></li>
    <li><a href="/cloud-transformation/grow/" class="grow">GROW</a></li>
  </ul>
  <a href="#" id="pull">Menu</a>
	</nav>
</div>
 <div class="clear"></div>
<div id="wrapper">
  
  <div class="row">
    <h2>Deliver Cloud services with the Cloud Marketplace and make your business more profitable.</h2>
    <div class="main">
      <h4>Cloud technologies are evolving fast &mdash; and driving greater IT availability, affordability and speed that organisations rely on to thrive.</h4>
      <p>As a result, customers demand evermore Cloud, in place of traditional, physical IT products and services. As a solutions provider, you must adapt to deliver by changing your approach to sales, migration, training, support, and many other area of your business. It's a big ask - but thankfully help is at hand.</p>
      <p>Ingram Micro Cloud brings together an end-to-end portfolio of vetted Cloud solutions targeting the business needs of SMBs worldwide, and delivers a one-stop shop for all your Cloud-related needs; all hosted and supported whenever you need them.</p>
<br />
          <h4><a href="https://uk.cloud.im/en/products/microsoft/office-365/" class="linkbox" style="background-color:#FF7F2D; width: auto;">ACTIVATE on Cloud Marketplace</a></h4>
          <div style="clear:both"></div>
          <h4 style="margin-top:20px; color:#FF7F2D;"><strong>Research, buy, instantly provision, configure and manage on the Cloud Marketplace</strong></h4>
          <p>Through the Cloud Marketplace, you can make the most of our subscription-based Cloud services model to create an even more profitable business. Research, buy, instantly provision, configure and manage a wide range of Cloud solutions using a single, self-service portal with one contract and 24/7 global support.</p>
<br />
          <p>With over 30 dedicated Cloud associates &mdash; the UK's largest specialist team &mdash; and more than 60 Cloud vendor sales accreditations, there's no one better to help you and your customers take your Cloud business to the next level.
            <a href="https://youtu.be/M5I7gKJnNwU" target="_blank"  class="linkbox" style="margin-top:25px; width: auto;">Ingram Micro &mdash; your Microsoft CSP partner</a></p>
<br />          
<p>Discover how Ingram Micro Cloud can open the door for you to offer customers a vast catalogue of Microsoft Cloud servces which are easier, more affordable and flexible to run.</p>
<br />
          <p><a href="/grow/"> Find out more about the Ingram Micro CSP program.
          </a></p>
    </div>
        <div class="rail">

          <h4 style="color:#FF7F2D;"><strong>Watch the Cloud Marketplace Introductory video</strong></h4>
	
	  <p style="text-align: center;">
	  <?php
		echo do_shortcode('[video_lightbox_youtube video_id="JI-ks-q9888" width="640" height="480" anchor="http://dev.ingrammicrocloud.com/wp-content/themes/viral/page-uk-cloud-transformation/images/activate_screen.jpg"]');
	  ?>
	  </p>

          <div class="form" style="margin-top: 30px;">
            <h4 style="margin-top:15px; margin-bottom:0px;"><strong>Request a Call-Back</strong> to get activated on the Ingram Micro Cloud Markeplace.</h4>
            <iframe src="https://ingrammicro.marketing.dynamics.com/LeadManagement/MaintainLeadForm.aspx?SOURCEKEYOID=101739&LANGUAGECODE=en-US" width="100%" height="500px" style=""></iframe>

        </div>
        <div class="clear"></div>        
    </div>
        <div class="clear"></div>
</div>
</div>


<?php the_content(); endwhile; ?>

<?php get_footer(); ?>