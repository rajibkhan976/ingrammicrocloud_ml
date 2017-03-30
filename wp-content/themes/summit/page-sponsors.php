<?php
/**
 * Template Name: Subpage
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

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

	<section class="sub-panel1">
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="logo">
						<a href="<?php echo get_bloginfo('url'); ?>"><img class="img-responsive" src="/wp-content/themes/summit/img/logo.png"></img></a>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section class="panel2">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<div class="left-border">
					<h2><?php the_title();?></h2>
					
					</div>
				</div>
				<div class="col-sm-6">
					
				</div>
			</div>
		</div>
	</section>
	
	<section class="sponsors-panel3">
		<div class="container">
			<div class="row">
				<h2>Titanium</h2>
				<div class="col-xs-3"><img style="max-width: 250px; margin: -20px 0 0 -30px;" class="img-responsive" src="https://s3-us-west-2.amazonaws.com/sponsordashboard/cs16/uploads/sHx7pqztFerFfAwxP-Internal%20Microsoft%20Logo%20PNG.png"></div>
			</div>
			<div class="row">
				<h2>Platinum</h2>
				<div class="col-xs-3"><img style="max-width: 200px; margin: -30px 0;" class="img-responsive" src="http://logo.acronis.com/logokit/acronis_logo.png"></div>
				<div class="col-xs-3"><img style="max-width: 180px; margin-bottom: 20px;" class="img-responsive" src="https://s3-us-west-2.amazonaws.com/sponsordashboard/cs16/uploads/PPnxvppoHkPuY8yKm-Dropbox_business_vertical_blue.jpg"><a style="color: #fff; background-color: #E92121; width: 100%; padding: 5px 20px;" title="Receive 12 months of Dropbox Business for the price of 11!<hr>Must attend Cloud Summit to receive discount.  Get all the specifics in the event mobile app!" rel="tooltip">Special promotion <i class="fa fa-info-circle"></i></a></div>
				<div class="col-xs-3"><img style="max-width: 130px;" class="img-responsive" src="/wp-content/themes/summit/img/logos/cisco.png"></div>
				<div class="col-xs-3"><img style="width: 200px;" class="img-responsive" src="https://s3-us-west-2.amazonaws.com/sponsordashboard/cs16/uploads/xn7mKsJ6AEiHceRs7-IBM%20Premier.jpg"></div>
				<br />
			</div>
			<div class="row">
				<h2>Gold</h2>
				<div class="col-xs-3"><img style="max-width: 200px; margin-top: -30px;" class="img-responsive" src="/wp-content/themes/summit/img/logos/connectwise.png"></div>
				<div class="col-xs-3"><img style="max-width: 200px;" class="img-responsive" src="https://s3-us-west-2.amazonaws.com/sponsordashboard/cs16/uploads/FheG42KtoSpx4ezyj-DB_WORDMARK_Tag_Pantone%20Center.jpg"></div>
				<div class="col-xs-3"><img style="max-width: 220px;" class="img-responsive" src="https://s3-us-west-2.amazonaws.com/sponsordashboard/cs16/uploads/KRbcBR9dTkSN7Kyk6-RCLogo_no_tag_rgb.png"></div>
				<div class="col-xs-3"><img style="max-width: 200px;" class="img-responsive" src="https://s3-us-west-2.amazonaws.com/sponsordashboard/cs16/uploads/egnbBoftD7ZfriQqB-SYM_Horiz_RGB.jpg"></div>
			</div>
			<div class="row">
				<h2>Silver</h2>
				<div class="col-xs-3" style="min-height: 135px;"><img style="max-width: 200px; margin-top: 20px;" class="img-responsive" src="https://s3-us-west-2.amazonaws.com/sponsordashboard/cs16/uploads/pyqzS5LuwKcWmoK28-AVG%20Business72.png"></div>
				<div class="col-xs-3" style="min-height: 135px;"><img style="max-width: 200px; margin-top: 20px;" class="img-responsive" src="https://s3-us-west-2.amazonaws.com/sponsordashboard/cs16/uploads/pAhGKcahboZWP6xwe-intermedia-logo-digital.png"></div>
				<div class="col-xs-3" style="min-height: 135px;"><img style="max-width: 150px; margin-top: -20px;" class="img-responsive" src="/wp-content/themes/summit/img/logos/livevhd.png"></div>
				<div class="col-xs-3" style="min-height: 135px;"><img style="max-width: 160px; margin-top: 20px" class="img-responsive" src="/wp-content/themes/summit/img/logos/netenrich.png"></div>
				<div class="col-xs-3" style="min-height: 135px;"><img style="max-width: 200px; margin-top: 60px;" class="img-responsive" src="https://s3-us-west-2.amazonaws.com/sponsordashboard/cs16/uploads/3p4kMTvxiGJZhqEaF-PLT_logo_black_1.5inch_jpg_for_Word.jpg"></div>
				<div class="col-xs-3" style="min-height: 135px;"><img style="max-width: 200px; margin-top: 30px;" class="img-responsive" src="/wp-content/themes/summit/img/logos/shoretel.png"></div>
				<div class="col-xs-3" style="min-height: 135px;"><img style="max-width: 200px; margin-top: 40px;" class="img-responsive" src="https://s3-us-west-2.amazonaws.com/sponsordashboard/cs16/uploads/ATQktpeZdSCQ25KQJ-TM_logo_red_2c_transparent_small.png"></div>
				<div class="col-xs-3" style="min-height: 135px;"><img style="max-width: 150px; margin-top: 60px;" class="img-responsive" src="https://s3-us-west-2.amazonaws.com/sponsordashboard/cs16/uploads/ntzjEWZkr8eujXxxT-Veritas_Logo_RED_1000x197.jpg"></div>
				<div class="col-xs-3" style="min-height: 135px;"><img style="max-width: 200px; margin-top: 60px;" class="img-responsive" src="https://s3-us-west-2.amazonaws.com/sponsordashboard/cs16/uploads/o6ibkhsPLmC2LNKMh-VMW_09Q3_LOGO_Corp_Gray.jpg"></div>
			</div>
			<div class="row">
				<h2>Bronze</h2>
				<div class="col-xs-3" style="min-height: 100px;"><img style="max-width: 200px;" class="img-responsive" src="https://s3-us-west-2.amazonaws.com/sponsordashboard/cs16/uploads/xtP8Qux5t6t5uxorN-AlertLogic_Logo_2C_RGB_H_Tag.png"></div>
				<div class="col-xs-3" style="min-height: 100px;"><img style="max-width: 160px; margin-top: -10px;" class="img-responsive" src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1d/AmazonWebservices_Logo.svg/2000px-AmazonWebservices_Logo.svg.png"></div>
				<div class="col-xs-3" style="min-height: 100px;"><img style="max-width: 200px;" class="img-responsive" src="https://s3-us-west-2.amazonaws.com/sponsordashboard/cs16/uploads/ZBLTT2oX23Jo8JiTE-AxcientWordmark.jpg"></div>
				<div class="col-xs-3" style="min-height: 100px;"><img style="max-width: 200px; margin-left: -10px;" class="img-responsive" src="https://s3-us-west-2.amazonaws.com/sponsordashboard/cs16/uploads/rLaAa2vTukNohCPyz-BitTitan_300.jpg"></div>
				<div class="col-xs-3" style="min-height: 100px;"><img style="max-width: 200px; margin-top: -30px;" class="img-responsive" src="https://s3-us-west-2.amazonaws.com/sponsordashboard/cs16/uploads/QhHLvsR2qEe47Du8d-HPE%20Logo.jpg"></div>
				<div class="col-xs-3" style="min-height: 100px;"><img style="max-width: 200px;" class="img-responsive" src="/wp-content/themes/summit/img/logos/intel.png"></div>
				<div class="col-xs-3" style="min-height: 100px;"><img style="max-width: 200px;" class="img-responsive" src="https://s3-us-west-2.amazonaws.com/sponsordashboard/cs16/uploads/FwbHYdgcwMFeBGv6k-Kaspersky_CMYK_POS.jpg"></div>
				<div class="col-xs-3" style="min-height: 100px;"><img style="max-width: 300px; margin: 10px 0px 0px -20px; max-width: 200px;" class="img-responsive" src="/wp-content/themes/summit/img/logos/lg.png"></div>
				<div class="col-xs-3" style="min-height: 100px;"><img style="max-width: 200px;" class="img-responsive" src="https://s3-us-west-2.amazonaws.com/sponsordashboard/cs16/uploads/iNX5tHGpJYXk8gYnA-Proofpoint-logo-K.png"></div>
				<div class="col-xs-3" style="min-height: 100px;"><img style="max-width: 200px; margin-top: 10px;" class="img-responsive" src="https://s3-us-west-2.amazonaws.com/sponsordashboard/cs16/uploads/vKgbbMJgRKscrZSE2-Sophos%20Logo%20&%20Strapline%20Center_RGB.png"></div>
				<div class="col-xs-3" style="min-height: 100px;"><img style="max-width: 200px; margin-top: -10px;" class="img-responsive" src="https://s3-us-west-2.amazonaws.com/sponsordashboard/cs16/uploads/k5Gye7CzeWTsTFY6K-VaultLogix-NoTag-Stacked.png"></div>
			</div>
		</div>
	</section>
	
<?php endwhile; // End of the loop. ?>

<?php get_footer(); ?>
