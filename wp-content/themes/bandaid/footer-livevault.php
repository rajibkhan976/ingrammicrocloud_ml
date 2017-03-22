<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bandaid
 */
?>
<footer>
			<div id="big-footer">
				<div class="container">
					<div class="row">
						<div class="col-md-4 col-sm-4">
							<h6>Join Us</h6>
							<p><a href="/become-a-partner/#reseller" class="page-scroll btn btn-primary btn-lg" role="button">Become a Reseller</a></p>
							<p><a href="/become-a-partner/#vendor" class="page-scroll btn btn-primary btn-lg" role="button">Become a Vendor</a></p>
						</div>
						<div class="col-md-4 col-sm-4">
							<h6>&nbsp;</h6>
							<p><a href="https://us.cloud.im/home/" target="_blank" class="page-scroll btn btn-primary btn-lg" role="button">SHOP MARKETPLACE</a></p>
							<h6>Contact Us</h6>
							<p>Phone: +1 (800) 705 7057</p>
							<p>Address: 3351 Michelson Drive, Suite 100<br>Irvine, CA 92612, United States</p>
						</div>
						<div class="col-md-4 col-sm-4">
							<h6>Newsletter Sign Up</h6>                    
							<form method="post" action="http://www.ingrammicrocloud.com/wp-admin/admin-ajax.php" class="newsletter-ajax-form">
								<p class="bg-success"></p>
								<p class="bg-danger"></p>
								<input type="hidden" name="action" value="newsletter_submit_action">
								<input type="hidden" id="newsletter_nonce" name="newsletter_nonce" value="63b03085cb">
								<input type="hidden" name="_wp_http_referer" value="/templates/microsite/">
								<div class="form-group">
									<input name="email" id="email_address" type="email" placeholder="Email Address" class="form-control">
								</div>
								<button type="submit" class="btn btn-primary btn-lg">Submit</button>
							</form>
							<br>
							<h6>Follow Us</h6>                    
							<ul class="nav nav-pills">
								<li><a href="https://www.linkedin.com/company/im_cloud" target="_blank"><i class="icon-md ion-social-linkedin-outline" aria-hidden="true"></i></a></li>
								<li><a href="https://twitter.com/IngramCloud" target="_blank"><i class="icon-md ion-social-twitter-outline" aria-hidden="true"></i></a></li>
								<li><a href="https://www.facebook.com/ingrammicrocloud" target="_blank"><i class="icon-md ion-social-facebook-outline" aria-hidden="true"></i></a></li>
								<li><a href="https://www.youtube.com/user/IngramMicroServices" target="_blank"><i class="icon-md ion-social-youtube-outline" aria-hidden="true"></i></a></li>
								<li><a href="https://plus.google.com/u/0/b/114901709326239147387/+Ingrammicrocloud" target="_blank"><i class="icon-md ion-social-googleplus-outline" aria-hidden="true"></i></a></li>
								<li><a href="https://www.instagram.com/ingrammicrocloud/?hl=en" target="_blank"><i class="icon-md ion-social-instagram-outline" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div id="corporate-footer">
				<div class="container">
					<div class="col-lg-4 col-md-4 col-sm-4">
						<div class="copyright">© 2017. All Rights Reserved. Ingram Micro Inc.</div>
					</div>
					<div class="col-lg-8 col-md-8 col-sm-8">
						<a href="/about">About Us</a> | <a href="/blog/">Blog</a> | <a href="http://phx.corporate-ir.net/phoenix.zhtml?c=98566&amp;p=irol-IRHome">Investor Relations</a> | <a href="/cloud-careers/">Careers</a> | <a href="/newsroom/">Newsroom</a> | <a href="http://corp.ingrammicro.com/Terms-of-Use/Privacy-Statement.aspx">Privacy</a>
					</div>
				</div>
			</div>
		</footer>

		<!--scripts loaded here --> 
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
		<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script> 
		<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script> 
		<script type='text/javascript' src='<?php echo get_template_directory_uri() . '/js/custom/page-livevault.js'; ?>'></script>
		
	</body>
	</html>
