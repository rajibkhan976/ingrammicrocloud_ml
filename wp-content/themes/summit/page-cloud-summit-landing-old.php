<?php
/**
 * Template Name: 2017 Cloud Summit Landing Page
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
get_header('landing');
?>
  <div class="platform-page">        
        <section class="panel1" style="display:block; clear:both; position: relative; height:533px;">
            <div style="position: absolute;top: 0px;left: 0px;bottom: 0px;right: 0px;overflow: hidden;background-size: cover;background-color: transparent;background-repeat: no-repeat;background-position: 100% 50%;height:100%;">
                <video poster="<?php echo get_template_directory_uri(); ?>/img/landing-page/landing_page_video.png" autoplay loop muted style="margin: auto;
                  position: relative;top: 41%; left: 100%; transform: translate(-100%, -38%);  width: 100%; height: auto;">
                    <source type="video/mp4" src="<?php echo get_template_directory_uri(); ?>/video/ocean_2017.mp4">
                    <source type="video/webm" src="<?php echo get_template_directory_uri(); ?>/video/ocean_2017.webm">
                    <source type="video/ogg" src="<?php echo get_template_directory_uri(); ?>/video/ocean_2017.ogv">
                </video>
                <div class="video-content" style="position: absolute; top: 0px; margin: auto; width:100%; display:block;">
                    <div class="container">
                        <div class="col-sm-12">
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="logo" style="float:right;">
                                    <img class="img-responsive" src="/wp-content/uploads/2016/11/cloud-summit-2017-logo.png">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <img class="img-responsive" src="/wp-content/uploads/2016/11/rise_above-1.png">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="play-btn-text text-center" style="text-align: center; margin: 0px auto 0 auto;">
                                    <img class="img-responsive" src="/wp-content/uploads/2016/11/perspective-1.png" align="center" style="margin: auto;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
    <div class="container">
        <div id="main-content" class="col-md-10 col-md-offset-1">
            <section id="panel-1">
                <div class="text-center">
                    <h1 class="landing-page-h1 text-blue">Secure Your Early Bird Discount</h1>
                </div>
                <div class="row">
                    <div class="col-md-8 landing-page-left-side">
                        <p>&nbsp;</p>
                        <p>Are you ready to transform your business? Join us as we tackle the challenges created by a
                            constantly evolving global marketplace where disruption is the norm.</p>

                        <p style="padding-bottom:20px;">At Ingram Micro Cloud Summit 2017, you’ll connect with cloud service providers to see what’s new
                            on the cutting-edge of technology. Learn to leverage our partner solutions, collaborate in ways
                            you’ve never imagined, and use the Cloud to evolve and achieve new levels of success.</p>


                        <div class="registration-section">
                            <h4><strong>Register by January 31, 2017 and save $100!</strong></h4>
                            <p class="margin-bottom-none">Standard Registration: <strong>$699</strong></p>
                            <p>Early Bird Registration: <strong>$599</strong></p>
                        </div>
                        <p>All registrations prior to December 16 will also be entered into a drawing to win a $500 AMEX travel voucher.*</p>
                    </div>
                    <div class="col-md-4 landing-page-right-side">
                        <h4 style="font-size:18px;"><strong>Want to travel in style?</strong></h4>
                        <p >All partners who register prior to December 16 will automatically be entered to win a complimentary AMEX travel voucher for the Cloud Summit (value $500).</p>
                        <p><strong style="font-size:15px;">Contest details:</strong></p>
                        <ul>
                            <li>3 winners will be randomly chosen</li>
                            <li>Entrants must register before 12/16 to be eligible*</li>
                            <li>Winner will receive travel voucher in the form of AMEX gift card with a value of $500.</li>
                        </ul>
                    </div>
                </div>

            <div class="custom-form">
                <div class="row">
                    <div class="col-md-9 col-centered">

                        <p>&nbsp;</p>
                        <div id="wufoo-q1phwy5f0p11a84">
                            Fill out my <a href="https://channelmarketing.wufoo.com/forms/q1phwy5f0p11a84">online form</a>.
                        </div>
                        <script type="text/javascript">var q1phwy5f0p11a84;
                            (function (d, t) {
                                var s = d.createElement(t), options = {
                                    'userName': 'channelmarketing',
                                    'formHash': 'q1phwy5f0p11a84',
                                    'autoResize': true,
                                    'height': '500',
                                    'async': true,
                                    'host': 'wufoo.com',
                                    'header': 'show',
                                    'ssl': true};
                                s.src = ('https:' == d.location.protocol ? 'https://' : 'http://') + 'www.wufoo.com/scripts/embed/form.js';
                                s.onload = s.onreadystatechange = function () {
                                    var rs = this.readyState;
                                    if (rs)
                                        if (rs != 'complete')
                                            if (rs != 'loaded')
                                                return;
                                    try {
                                        q1phwy5f0p11a84 = new WufooForm();
                                        q1phwy5f0p11a84.initialize(options);
                                        q1phwy5f0p11a84.display();
                                    } catch (e) {
                                    }
                                };
                                var scr = d.getElementsByTagName(t)[0], par = scr.parentNode;
                                par.insertBefore(s, scr);
                            })(document, 'script');</script>

                    </div>
                </div>
            </div>

                <div class="row">
                    <div class="col-md-12">
                        <h3 class="text-blue text-center"><strong>Why Should I Attend Ingram Micro Cloud Summit 2017?</strong></h3>
                        <ul style="padding-left: 18px;" class="cloud-list-item">
                            <li>Enjoy unlimited networking opportunities with technology professionals and cloud service providers</li>
                            <li>Learn what’s new, what’s trending, and what’s on the horizon in the world of Cloud Computing</li>
                            <li>Attend focused sessions in role-based tracks designed to meet your specific needs and interests:</li>
                            <ul style="padding-left: 38px;">
                                <li><strong>Transformational Leadership</strong> - Transcend the hype and go beyond the buzzwords. Attendees will gain valuable insight on how to become change agents and drive new levels of success with the evolving cloud opportunity.</li>
                                <li><strong>Innovation Track</strong> - Witness real-world examples of true innovation. Focusing on case studies, industry trends, best practices, and new product innovations, attendees will discover new ways to achieve innovation by pushing the envelope.</li>
                                <li><strong>Education Track</strong> - Learn why Cloud is the fastest growing segment of the technology market. Attendees of these sessions will acquire valuable knowledge on the latest tools and technologies in the Ingram Micro Cloud Marketplace that help automate and transform productivity.</li>
                            </ul>
                            <li>Hear from keynote speakers experienced in shifting the paradigm and driving their industries through profound disruption:</li>
                        </ul>
                    </div>
                </div>
                <div class="image-section">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="col-md-6">
                                <div class="col-md-4">
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/landing-page/Marc-Randolph.jpg" alt="Marc Randolph">
                                </div>
                                <div class="col-md-8">
                                    <p><strong>Marc Randolph</strong><br> Co-founder and former <br>CEO of Netflix and <br>
                                        Co-founder Looker <br>Data Sciences</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-4">
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/landing-page/Jim-McKelvey.png" alt="">
                                </div>
                                <div class="col-md-8">
                                    <p><strong>Jim McKelvey</strong><br>Co-founder of Square and <br>Founder of LaunchCode
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="text-center">
                                <a href="/wp-content/uploads/2016/11/Cloud-Summit-2017-Brochure-Web.pdf">
                                    <button class="btn btn-primary">DOWNLOAD THE CLOUD SUMMIT 2017 BROCHURE</button>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="text-center" style=" margin-bottom: 20px;">
                                <a href="http://ingrammicrocloudsummit.com/highlights-of-2016-cloud-summit/" target="_blank" style="color:#2b75b4; text-decoration: underline; font-weight:700 !important; ">See highlights of Cloud Summit 2016</a>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="text-center">
                                <div class="text-left" style="font-size:11px; margin-bottom:30px;">
                                    T&Cs: &copy; 2016 Ingram Micro Inc. All rights reserved. Ingram Micro and the Ingram Micro logo are trademarks used under license by Ingram Micro Inc. All other trademarks are the property of their respective companies. Products available while supplies last. Prices subject to change without notice. Promotion winners must accept prizes by completing a Customer Prize Acceptance form. Promotions are subject to Ingram Micro Prize Winner Qualifications and Terms as published on our <a href="http://corp.ingrammicro.com/Terms-of-Use.aspx" target="_blank">website</a>.

                                    <br>
                                    <br>
                                    *Conference registration must be paid in full in order to qualify to win the AMEX travel voucher. All applicable taxes are the responsibility of the winner.

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>    
</div>

<?php get_footer(); ?>