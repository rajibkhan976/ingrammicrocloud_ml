<?php get_header();
/*
 Template name: UK Cloud Transformation Transform Downloads Template
 */
?>
<?php
get_template_part('navigation');
?>

<?php while (have_posts()) : the_post(); ?>


<div id="headerimage"><img src="http://dev.ingrammicrocloud.com/wp-content/themes/viral/page-uk-cloud-transformation/images/transform_header.jpg" alt="Transform your digital business. Register for the CompTIA10 Part Cloud Education Program" width="1330" height="500" class="headerimage" /></div>
<div class="navfull">
<nav class="clearfix">
  <ul class="clearfix">
    <li><a href="/cloud-transformation/realise/" class="realise">REALISE</a></li>
    <li><a href="/cloud-transformation/transform/" class="transform current">TRANSFORM</a></li>
    <li><a href="/cloud-transformation/activate/" class="activate">ACTIVATE</a></li>
    <li><a href="/cloud-transformation/grow/" class="grow">GROW</a></li>
  </ul>
  <a href="#" id="pull">Menu</a>
	</nav>
    </div>
 <div class="clear"></div>
<div id="wrapper">
  
  <div class="row" style="margin-top: 50px; padding-bottom: 50px;">
    <h2 style="margin-bottom: 20px;">Ingram Micro Webinar Series</h2>
    

<ol>
<li><a href="http://syndication.comptia.org/Ingram/QS_Cloud_1/html" target="_blank">Quick Start to Cloud Computing</a></li>
<li><a href="http://syndication.comptia.org/Ingram/QS_Accelerating_2/html" target="_blank">Quick Start Session to Accelerating your Cloud Business</a></li>
<li><a href="http://syndication.comptia.org/Ingram/ExecutiveSum_3/html" target="_blank">Executive Summary of the Cloud Opportunity</a></li>
<li><a href="http://syndication.comptia.org/Ingram/Marketing_4/html" target="_blank">Marketing Cloud Advantages</a></li>
<li><a href="http://syndication.comptia.org/Ingram/selling_5/html" target="_blank">Selling your Cloud Solutions</a></li>
<li><a href="http://syndication.comptia.org/Ingram/deliveringCloud_6/html" target="_blank">Delivering Cloud Services</a></li>
<li><a href="http://syndication.comptia.org/Ingram/Managing_7/html" target="_blank">Cloud Operations</a></li>
<li><a href="http://syndication.comptia.org/Ingram/BuildingCloud_8/html" target="_blank">Building Cloud Solution Success</a></li>
<li><a href="http://syndication.comptia.org/Ingram/Playbook_9/html" target="_blank">Developing Cloud Playbooks</a></li>
<li><a href="http://syndication.comptia.org/Ingram/transforming_10/html" target="_blank">Transforming Your Business</a></li>
</ol>
    </div>
        <div class="clear"></div>
</div>
</div>


<?php the_content(); endwhile; ?>

<?php get_footer(); ?>