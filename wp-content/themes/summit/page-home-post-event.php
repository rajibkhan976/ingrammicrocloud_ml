<?php
/**
 * Template Name: Homepage Post Event
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
get_header('landing');
//get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
	
	<section class="panel1" data-vide-bg="mp4: /wp-content/themes/summit/video/ocean, webm: /wp-content/themes/summit/video/ocean, ogv: /wp-content/themes/summit/video/ocean, poster: /wp-content/themes/summit/video/ocean"
  data-vide-options="position: 100% 50%">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<div class="logo">
						<img class="img-responsive" src="/wp-content/themes/summit/img/logo.png"></img>
					</div>
					<h1>Where Rainmakers Thrive</h1>
					<h2>April 11th - 13th 2016 - Phoenix AZ</h2>
					<div class="logos">
						<img id="ingram" src="http://ingrammicrocloudsummit.com/wp-content/themes/summit/img/white-logo.png"><img id="pipe" src="http://placehold.it/1x75"><img id="odin" style="margin-top: 12px;" src="http://ingrammicrocloudsummit.com/wp-content/themes/summit/img/header-odin-logo-white.png">
					</div>
				</div>
				<div class="col-sm-6">
					<div class="play-btn text-center">
						<h3>Thanks to all of our sponsors, speakers, and attendees for making Cloud Summit 2016 <br>a huge success!</h3>
						<a href="#major-announcements"><h4><i class="fa fa-arrow-down"></i> View the post event resources below</h4></a>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<div class="bar"></div>
	<div class="tri-overlay">
		
	</div>
		
	<section class="panel2">
		 <a name="major-announcements"></a>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="left-border">
						<h2>Major Announcements</h2>
					</div>
					<ul class="bullets">
						<li><i class="fa fa-check"></i> <strong>NEW PROGRAM &mdash; Cloud Referral</strong>.  Refer clients and earn commissions without the need for a full ecommerce platform. <a href="http://www.ingrammicrocloud.com/referral" target="_blank"><button class="btn btn-info btn-xs">Learn more</button></a></li>
						<li><i class="fa fa-check"></i> <strong>AVAILABLE NOW &mdash; Cloud Echo</strong>.  Build your brand and drive new business with this unique social marketing platform. <a href="https://echo.ingrammicrocloud.com/" target="_blank"><button class="btn btn-info btn-xs">Register now</button></a></li>
						<li><i class="fa fa-check"></i> <strong>NEW PLATFORM &mdash; Cloud Store</strong>.  White label ecommerce store integrated directly into your website. <a href="http://www.ingrammicrocloud.com/cloud-store/" target="_blank"><button class="btn btn-info btn-xs">Learn more</button></a></li>
						<li><i class="fa fa-check"></i> <strong>NEW PLATFORM &mdash; Odin Automation Essentials</strong>.  Cloud and billing automation in-a-box. <a href="http://www.odin.com/products/oae/" target="_blank"><button class="btn btn-info btn-xs">Learn more</button></a></li>
						<li><i class="fa fa-check"></i> <strong>BLOG</strong>. Review all the highlights from Cloud Summit 2016. <a href="http://www.ingrammicroadvisor.com/cloud/topic/cloud-summit" target="_blank"><button class="btn btn-info btn-xs">Read now</button></a></li>
						<li><i class="fa fa-check"></i> <strong>PRESS RELEASE</strong>. Ingram Micro Adds Three Cloud Delivery Platforms to Ecosystem of Cloud. <a href="http://phx.corporate-ir.net/phoenix.zhtml?c=98566&p=irol-newsArticle&ID=2156426" target="_blank"><button class="btn btn-info btn-xs">Read now</button></a></li>
						<li><i class="fa fa-check"></i> <strong>PRESS RELEASE</strong>. Ingram Micro Announces 2016 Cloud Partner Award Winners. <a href="http://phx.corporate-ir.net/phoenix.zhtml?c=98566&p=irol-newsArticle&ID=2156129" target="_blank"><button class="btn btn-info btn-xs">Read now</button></a></li>
					</ul>
				</div>
			</div>

		</div>
	</section>
	
	<section class="keynotes">
		<div class="container">
			<div class="row">
				<div class="left-border">
					<h2>Keynotes</h2>
				</div>
			</div>
			
			<div class="row">
				<div class="col-sm-6">
					<div class="row">
						<div class="col-sm-3">
							<img class="img-responsive center-block" src="<?php echo bloginfo('template_url'); ?>/img/nimesh-small.jpg"></img>
						</div>
						<div class="col-sm-9">
							<h2>Nimesh Dav&eacute; <span>Ingram Micro<br>EVP, Global Cloud</span></h2>
							<a href="https://www.dropbox.com/sh/1g0iprhpc15vq2x/AAATujp9kRJPAlSm2lAu3Xw9a?dl=0" target="_blank"><button class="btn btn-primary">Download the presentation</button></a>
							<a href="https://www.youtube.com/watch?v=G7ZsST_aVg8&index=1&list=PLUKxgLYO_jH-M-PFu894HjlUN6r0KcqQW" target="_blank"><button class="btn btn-primary">Watch the recording</button></a>
						</div>
					</div>
				</div> <!-- Nimesh Dave -->
				<div class="col-sm-6">
					<div class="row">
						<div class="col-sm-3">
							<img class="img-responsive center-block" src="<?php echo bloginfo('template_url'); ?>/img/renee-small.jpg"></img>
						</div>
						<div class="col-sm-9">
							<h2>Ren&eacute;e Bergeron <span>Ingram Micro<br>Vice President, Global Cloud Computing</span></h2>
							<a href="https://www.dropbox.com/sh/bph9qdtsrvj2qs3/AABlKahI-6NNt1bkBZUzddYba?dl=0" target="_blank"><button class="btn btn-primary">Download the presentation</button></a>
							<a href="https://www.youtube.com/watch?v=PRY3EjpLu6I&list=PLUKxgLYO_jH-M-PFu894HjlUN6r0KcqQW&index=2" target="_blank"><button class="btn btn-primary">Watch the recording</button></a>
						</div>
					</div>
				</div> <!-- Renee Bergeron -->
			</div> 
		
			<br><br>
			
			<div class="row">
				<div class="col-sm-6">
					<div class="row">
						<div class="col-sm-3">
							<img class="img-responsive center-block" src="<?php echo bloginfo('template_url'); ?>/img/serguei.png"></img>
						</div>
						<div class="col-sm-9">
							<h2>Serguei Beloussov <span>Acronis<br>CEO</span></h2>
							<a href="https://www.dropbox.com/sh/njbd2ia4h19kbu7/AAAPbxEOGsoXCiWFzjvrJgfoa?dl=0" target="_blank"><button class="btn btn-primary">Download the presentation</button></a>
							<a href="https://www.youtube.com/watch?v=c2o97VwPgqM&list=PLUKxgLYO_jH-M-PFu894HjlUN6r0KcqQW&index=3" target="_blank"><button class="btn btn-primary">Watch the recording</button></a>
						</div>
					</div>
				</div> <!-- Serguei Beloussov -->
				<div class="col-sm-6">
					<div class="row">
						<div class="col-sm-3">
							<img class="img-responsive center-block" src="<?php echo bloginfo('template_url'); ?>/img/BillKarpovich2.jpg"></img>
						</div>
						<div class="col-sm-9">
							<h2>Bill Karpovich <span>IBM Cloud<br>General Manager</span></h2>
							<a href="https://www.dropbox.com/sh/5mq34aa401tp6d4/AAAkjwf4VjDDvljQhXIRhVG9a?dl=0" target="_blank"><button class="btn btn-primary">Download the presentation</button></a>
							<a href="https://www.youtube.com/watch?v=2yAerfc_OOQ&index=6&list=PLUKxgLYO_jH-M-PFu894HjlUN6r0KcqQW" target="_blank"><button class="btn btn-primary">Watch the recording</button></a>
						</div>
					</div>
				</div> <!-- Bill Karpovich -->
			</div>
			
			<br><br>
			
			<div class="col-sm-6">
					<div class="row">
						<div class="col-sm-3">
							<img class="img-responsive" src="https://media.licdn.com/mpr/mpr/shrinknp_200_200/AAEAAQAAAAAAAAaJAAAAJDY5NDYzMzBlLWU5ZGEtNDYwNS04NjVlLTZlMDNmYmZlYzZlNQ.jpg"></img>
						</div>
						<div class="col-sm-9">
							<h2>Hank Humphreys <span>Dropbox<br>Head of Global Channel Sales</span></h2>
							<a href="https://www.dropbox.com/sh/786btt06i731692/AACfCmANH0V2ZNFHb5xpRAbTa?dl=0" target="_blank"><button class="btn btn-primary">Download the presentation</button></a>
							<a href="https://www.youtube.com/watch?v=TYgGNMgJjAI&index=8&list=PLUKxgLYO_jH-M-PFu894HjlUN6r0KcqQW" target="_blank"><button class="btn btn-primary">Watch the recording</button></a>
						</div>
					</div>
				</div> <!-- Hank Humphreys -->
				
			<div class="row">
				<div class="col-sm-6">
					<div class="row">
						<div class="col-sm-3">
							<img class="img-responsive" src="<?php echo bloginfo('template_url'); ?>/img/MarkoPerisic.jpg"></img>
						</div>
						<div class="col-sm-9">
							<h2>Marko Perisic <span>Microsoft<br>General Manager</span></h2>
							<a href="https://www.dropbox.com/sh/i7shwocqsr1bw01/AADc2ir0PQfJVpl2TmkgRg5oa?dl=0" target="_blank"><button class="btn btn-primary">Download the presentation</button></a>
							<a href="https://www.youtube.com/watch?v=Etq39JXu1dM&list=PLUKxgLYO_jH-M-PFu894HjlUN6r0KcqQW&index=6" target="_blank"><button class="btn btn-primary">Watch the recording</button></a>
						</div>
					</div>
				</div> <!-- Jonathan Rosenberg -->
				
			</div>
			<div><br><br>*Unfortunately due to contractual arrangements we are not able to share presentations or videos from our celebrity keynote speakers.</div>
			<!-- Pending approval from IDC - 
			<br><br>
			
			<div class="row">
				<div class="col-sm-6">
					<div class="row">
						<div class="col-sm-3">
							<img class="img-responsive center-block" src="<?php echo bloginfo('template_url'); ?>/img/melanie.jpg"></img>
						</div>
						<div class="col-sm-9">
							<h2>Melanie Posey <span>IDC<br>Research Vice President</span></h2>
							<a href="https://www.dropbox.com/sh/igyfd7l12uenj90/AAAioIYLV5hCLnejB96sc4Cja?dl=0" target="_blank"><button class="btn btn-primary">Download the presentation</button></a>
							<a href="https://www.youtube.com/watch?v=wSeLd57tzzY&index=8&list=PLUKxgLYO_jH-M-PFu894HjlUN6r0KcqQW" target="_blank"><button class="btn btn-primary">Watch the recording</button></a>
						</div>
					</div>
				</div> <!-- Melanie Posey -->
				<!-- Pending approval from IDC -
				<div class="col-sm-6">
					<div class="row">
						<div class="col-sm-3">
							<img class="img-responsive center-block" src="<?php echo bloginfo('template_url'); ?>/img/darren.jpg"></img>
						</div>
						<div class="col-sm-9">
							<h2>Darren Bibby <span>IDC<br>Program Vice-President</span></h2>
							<a href="https://www.dropbox.com/sh/aatm1e080bcxqy8/AAAVXw58M0e2Qpan_uFhi7JQa?dl=0" target="_blank"><button class="btn btn-primary">Download the presentation</button></a>
							<a href="https://www.youtube.com/watch?v=z6lbIWPY3JM&list=PLUKxgLYO_jH-M-PFu894HjlUN6r0KcqQW&index=4" target="_blank"><button class="btn btn-primary">Watch the recording</button></a>
						</div>
					</div>
				</div> <!-- Darren Bibby -->
			</div>
		<hr>
		</div>
	</section>
	
	<section class="breakouts">
		<div class="container">
			<div class="row">
				<div class="left-border">
					<h2>Breakout Sessions</h2> <a href="https://www.dropbox.com/sh/ducbq99gzj31iom/AAB9Hq5ulJ-IGENrLlI1FUC6a?dl=0" target="_blank"><button class="btn btn-primary">Browse the presentations</button></a>
				</div>
			</div>
			<hr>
		</div>
	</section>
	
	<section class="breakouts">
		<div class="container">
			<div class="row">
				<div class="left-border">
					<h2>Cloud University</h2> <a href="https://www.dropbox.com/sh/44pp05pz04yaqxb/AACTnWgGWVOdEw3S2hdi5qcda?dl=0" target="_blank"><button class="btn btn-primary">Browse the presentations</button></a>
				</div>
			</div>
			<hr>
		</div>
	</section>
	
	<section class="pictures">
		<div class="container">
			<div class="row">
				<div class="left-border">
					<h2>Photo Gallery</h2> <a href="https://www.dropbox.com/sh/ua11fhh37zrugmq/AABB63rJcY5zaNsvZ7WepBHWa?dl=0" target="_blank"><button class="btn btn-primary">Browse Photos</button></a>
				</div>
			</div>
			<div class="row">
				<?php
					do_shortcode('[outofthebox dir="/Cloud Summit 2016/CS16 - Photos" mode="files" ext="gif|jpg|jpeg|png|bmp" viewrole="administrator|editor|author|contributor|subscriber|guest" downloadrole="administrator|editor|author|contributor|subscriber|guest"]');
				?>
			</div>
		</div>
	</section>
	


<?php endwhile; // End of the loop. ?>

<?php get_footer(); ?>
