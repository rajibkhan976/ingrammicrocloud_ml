<?php get_header();
/*
 Template name: UK Cloud Transformation Home Template
 */
?>
<?php
get_template_part('navigation');
?>

<?php while (have_posts()) : the_post(); ?>


<section class="slider">
        <div class="flexslider">
          <ul class="slides">
                <li> <a href="realise/"><img src="http://dev.ingrammicrocloud.com/wp-content/themes/viral/page-uk-cloud-transformation/images/realise_header.jpg" alt="Realise your Cloud potential. Download the latest research from The Cloud Industry Forum." width="1330" height="auto" /></a>
  	    		</li>
                <li> <a href="transform/"><img src="http://dev.ingrammicrocloud.com/wp-content/themes/viral/page-uk-cloud-transformation/images/transform_header.jpg" alt="Transform your digital business. Register for the CompTIA10 Part Cloud Education Program" width="1330" height="auto"  /></a>
  	    		</li>
                <li> <a href="activate/"><img src="http://dev.ingrammicrocloud.com/wp-content/themes/viral/page-uk-cloud-transformation/images/activate_header.jpg" alt="Activate your Cloud success. Start transacting on the Ingram Micro Cloud Marketplace" width="1330" height="auto"  /></a>
  	    		</li>
                <li> <a href="grow/"><img src="http://dev.ingrammicrocloud.com/wp-content/themes/viral/page-uk-cloud-transformation/images/grow_header.jpg" alt="Grow your Cloud opportunity with Microsoft CSP. Register today to attend our latest CSP Webinar" width="1330" height="auto" /></a>
  	    		</li>
          </ul>
        </div>
</section>
<div class="navfull">
  <nav class="clearfix">
  <ul class="clearfix">
    <li><a href="realise/" class="realise">REALISE</a></li>
    <li><a href="transform/" class="transform">TRANSFORM</a></li>
    <li><a href="activate/" class="activate">ACTIVATE</a></li>
    <li><a href="grow/" class="grow">GROW</a></li>
  </ul>
  <a href="#" id="pull">Menu</a>
	</nav>
  </div>
 <div class="clear"></div>
<div id="wrapper">
  
  <div class="row">
	<h2>Realise, transform, activate &amp; grow.</h2>
	<h4><strong>Build your journey through the Cloud</strong> with Ingram Micro Cloud and our innovative Cloud Marketplace.</h4>
	<p>Ingram Micro helps businesses maximize the value of their technology. Our vast global infrastructure and focus on cloud, mobility, supply chain and technology solutions enables business partners to operate more successfully.</p>
<br />	
<p>As a Microsoft Cloud Solutions Provider, Ingram Micro can give you the resources, advice and support you need to make the most of your cloud service offering, with the benefit of by-as-you-go products and full control over your customer lifecycle - through direct billing, provisioning, management and support.</p>
	<hr />
    	<div class="main">
          <h5><a href="cloud-transformation/realise" class="realise">REALISE</a></h5>
          <p>Digital Transformation is essential for today's businesses to maintain competitive advantage, drive innovation and meet commercial demands. Cloud services provide a flexible framework to drive this change, by saving time and money while improving customer engagement and employee satisfaction.</p>
<br />          
<p><strong>The Cloud Industry Forum's new report 'Cloud and the digital imperative'</strong> looks at how UK businesses are using the cloud to make their Digital Transformation journey.</p>
<br />          
<p><strong><a href="realise/">Download it here</a></strong></p>
    </div>
        <div class="rail">
       	  <h5><a href="cloud-transformation/activate" class="activate">ACTIVATE</a></h5>
          <p>Cloud technologies enable the availability, affordability and speed that organisations need to succeed. More and more customers are bringing cloud to their business. Solutions providers must adapt to survive.</p>
<br />          
<p>Ingram Micro Cloud eases your journey to the cloud and digital transformation, providing over 200 cloud services for you to offer your customers, whenever you need them. Through our Cloud Marketplace, you can use our subscription-based model to make your business even more profitable.</p>
<br />          
<p><a href="activate/" style="color: #555;"><strong>Discover Ingram Micro Cloud &amp; the Marketplace here
          </strong></a></p>
    </div>
    <div class="clear"></div>
</div>
    <div class="row">
    	<div class="main">
          <h5><a href="cloud-transformation/transform" class="transform">TRANSFORM</a></h5>
          <p><strong>CompTIA's Cloud Education Program</strong> helps you grow your cloud business and maximise your revenues. Its 10-week webinar series covers a range of key topics, including opportunities, challenges, best practice and sales strategies: in short, everything you need to create a truly cloud-driven workplace.</p>
<br />          
<p><strong><a href="transform/">Register here</a></strong></p>
      </div>
      <div class="rail">
   	    <h5><a href="cloud-transformation/grow" class="grow">GROW</a></h5>
        <p>Bundle, support and bill all your Cloud services from a single pane of glass &mdash; the Ingram Micro Cloud CSP program. Create the ultimate bundles for your clients by combining value-added services with those offered on the Ingram Micro Cloud Marketplace. Make it easy for your clients to decide which services they want.</p>
<br />          
<p><strong><a href="grow/" style="color: #555;">Find out more about Ingram Micro CSP and how you can grow your Cloud business.</a></strong></p>
      </div>
    <div class="clear"></div>
    </div>
</div>

<div style="background-color: darkgray; padding: 20px 0;">
<div class="row">
  <div class="baselogos"><img src="http://dev.ingrammicrocloud.com/wp-content/themes/viral/page-uk-cloud-transformation/images/base_logos.png" width="313" height="34" alt="" style="margin-top: 10px; margin-bottom: -10px;" /></div>
</div>
</div>

<!-- FlexSlider
<script defer src="http://dev.ingrammicrocloud.com/wp-content/themes/viral/page-uk-cloud-transformation/js/jquery.flexslider.js"></script>  
-->

<script type="text/javascript">
    
    $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "slide",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>
  
<script type="text/javascript">
    $(function() {
		if ($.browser.msie && $.browser.version.substr(0,1)<7)
		{
		$('li').has('ul').mouseover(function(){
			$(this).children('ul').css('visibility','visible');
			}).mouseout(function(){
			$(this).children('ul').css('visibility','hidden');
			})
		}

		/* Mobile */
		$('#menu-wrap').prepend('<div id="menu-trigger">Menu</div>');		
		$("#menu-trigger").on("click", function(){
			$("#menu").slideToggle();
		});

		/ iPad
		var isiPad = navigator.userAgent.match(/iPad/i) != null;
		if (isiPad) $('#menu ul').addClass('no-transition');      
    });          
</script>



<?php the_content(); endwhile; ?>

<?php get_footer(); ?>