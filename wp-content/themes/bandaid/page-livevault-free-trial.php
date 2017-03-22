<?php
/**
 * Template Name: LiveVault Free Trial
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bandaid
 */
get_header('livevault');
get_template_part('navigation_livevault_free_trial');
?>
		
		
		<header class="jumbotron">
			<div class="container">
				<h1>Try LiveVault<sup>&trade;</sup> Cloud Backup for Free — Before Offering it to Your Customers</h1>
			</div>
		</header>
		
		<section class="bg-primary">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-lg-8">
						<h2 class="margin-top-0 text-primary">Start Your Cloud Backup Reseller Free Trial</h2>
						<br>
						<div class="col-lg-10 col-lg-offset-1">
							<p class="text-faded">We know you want to offer your customers only the best technology solutions. With that in mind, LiveVault and Ingram are eager for your company to try our cloud backup services free —before you add them to your line card.</p>
							<p class="text-faded">So complete this short form and you can begin enjoying the industry’s most robust and powerful cloud backup solution available, with reseller benefits including:</p>
							<ul class="text-faded">
								<li>Lucrative partner programs</li>
								<li>Recurring revenue models</li>
								<li>Flexible deal margins</li>
								<li>Full suite of behind-the-scenes support</li>
							</ul>
							<p class="text-faded"><strong>And then start offering your customers:</strong></p>
							<ul class="text-faded">
								<li>Automated, streamlined data protection</li>
								<li>A comprehensive backup service</li>
								<li>Virtual and physical server support</li>
								<li>Rapid data recovery</li>
								<li>Data protection for the mobile workforce</li>
								<li>… and more</li>
							</ul>
						</div>
					</div>
					
					<div class="col-lg-4 col-md-4">
						<form class="bg-dark-blue col-xs-12 text-center">
							<h3>Request your Free Trial</h3>

							<div class="form-group">
								<label class="sr-only" for="firstName">First Name</label>
								<input type="text" class="form-control" id="firstName" placeholder="First Name">
							</div>
							<div class="form-group">
								<label class="sr-only" for="lastName">Last Name</label>
								<input type="text" class="form-control" id="lastName" placeholder="Last Name">
							</div>
							<div class="form-group">
								<label class="sr-only" for="email">Email</label>
								<input type="text" class="form-control" id="email" placeholder="Email">
							</div>
							<div class="form-group">
								<label class="sr-only" for="phone">Phone</label>
								<input type="text" class="form-control" id="phone" placeholder="Phone">
							</div>
							<div class="form-group">
								<label class="sr-only" for="company">Company</label>
								<input type="text" class="form-control" id="company" placeholder="Company">
							</div>
							<div class="form-group">
								<label class="sr-only" for="industry">Industry</label>
								<select name="industry" id="industry" class="form-control" required>
									<option value="" selected="" disabled="">Select Your Industry</option>
									<option value="Accounting/Finance/Banking">Accounting/Finance/Banking</option>
									<option value="Administration/Human Resources">Administration/Human Resources</option>
									<option value="Automotive">Automotive</option>
									<option value="Consulting">Consulting</option>
									<option value="Education">Education</option>
									<option value="Entertainment/Media">Entertainment/Media</option>
									<option value="Government">Government</option>
									<option value="Healthcare">Healthcare</option>
									<option value="Hospitality">Hospitality</option>
									<option value="Insurance">Insurance</option>
									<option value="Legal">Legal</option>
									<option value="Manufacturing">Manufacturing</option>
									<option value="Real Estate">Real Estate</option>
									<option value="Retail">Retail</option>
									<option value="Transportation">Transportation</option>
									<option value="Other  (blank)">Other  (blank)</option>
								</select>
							</div>
							<div class="form-group">
								<label class="sr-only" for="companySize">Company Size</label>
								<select name="companySize" id="companySize" class="form-control" required>
									<option value="" selected="" disabled="">Select Your Company Size</option>
									<option value="1-50">1-50</option>
									<option value="51-100">51-100</option>
									<option value="101-500">101-500</option>
									<option value="501-1,000">501-1,000</option>
									<option value="1,101-5,000">1,101-5,000</option>
									<option value="5,001-10,000">5,001-10,000</option>
									<option value="10,001-50,000">10,001-50,000</option>
									<option value="50,001-100,000">50,001-100,000</option>
									<option value="100,001+">100,001+</option>
								</select>
							</div>
							<div class="form-group">
								<label for="email">&nbsp;</label>
								<input class="btn btn-default" type="submit" value="Try LiveVault Free »">
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>

		<?php get_footer('livevault'); ?>
