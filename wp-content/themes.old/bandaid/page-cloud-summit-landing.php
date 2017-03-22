<?php
/**
 * Template Name: Cloud Summit Landing Page
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
get_header();
?>

<div class="platform-page">
    <div class="container">
            <div id="main-content" class="col-md-8 col-sm-12">
                <section id="panel-1">
                    <img class="img-responsive hero-banner" src="<?php echo get_template_directory_uri(); ?>/img/landing-page/hero-banner.jpg" />
                    <div class="blue-heading text-center">
                        <h3>Secure Your Early Bird Discount</h3>
                        <h4>Ingram Micro Cloud  Summit 2017</h4>
                    </div>
                    <p>Are you ready to transform your business? Join us as we tackle the challenges created by a constantly evolving global marketplace where disruption is the norm.</p>
                    <br/>
                    <p>At Ingram Micro Cloud Summit 2017, you’ll connect with cloud service providers to see what’s new on the cutting-edge of technology. Learn to leverage our partner solutions, collaborate in ways you’ve never imagined, and use the Cloud to evolve and achieve new levels of success.</p>
                    <br/>
                    <div class="text-center">
                        <h5><strong>Register by January 15, 2017 and save $100!</strong></h5>
                        <p>Standard Registration: <strong>$699</strong></p>
                        <p>Early Bird Registration: <strong>$599</strong></p>
                    </div>
                    <br/>

                    <div class="custom-form">
                        <div class="row">
                            <div class="col-md-7 col-md-offset-3">
                                <div id="wufoo-q1phwy5f0p11a84">
Fill out my <a href="https://channelmarketing.wufoo.com/forms/q1phwy5f0p11a84">online form</a>.
</div>
<script type="text/javascript">var q1phwy5f0p11a84;(function(d, t) {
var s = d.createElement(t), options = {
'userName':'channelmarketing',
'formHash':'q1phwy5f0p11a84',
'autoResize':true,
'height':'500',
'async':true,
'host':'wufoo.com',
'header':'show',
'ssl':true};
s.src = ('https:' == d.location.protocol ? 'https://' : 'http://') + 'www.wufoo.com/scripts/embed/form.js';
s.onload = s.onreadystatechange = function() {
var rs = this.readyState; if (rs) if (rs != 'complete') if (rs != 'loaded') return;
try { q1phwy5f0p11a84 = new WufooForm();q1phwy5f0p11a84.initialize(options);q1phwy5f0p11a84.display(); } catch (e) {}};
var scr = d.getElementsByTagName(t)[0], par = scr.parentNode; par.insertBefore(s, scr);
})(document, 'script');</script>

                                
                                <p>We’ll notify you when registration opens to complete your transaction.</p>
                                <p>Registration fee includes all meals, events at the conference, and your hotel room.</p>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <h4><strong>Why Should I Attend Ingram Micro Cloud Summit 2017?</strong></h4>
                    <ul style="padding-left: 18px;">
                        <li>Enjoy unlimited networking opportunities with technology professionals and cloud service providers</li>
                        <li>Learn what’s new, what’s trending, and what’s on the horizon in the world of Cloud Computing.</li>
                        <li>Attend focused sessions in role-based tracks designed to meet your specific needs and interests:</li>
                        <ul>
                            <li><strong>Transformational Leadership - </strong>Transcend the hype and go beyond the buzzwords. Attendees will gain valuable insight on how to become change agents and drive new levels of success with the evolving cloud opportunity.</li>
                            <li><strong>Innovation Track - </strong>Witness real-world examples of true innovation. Focusing on case studies, industry trends, best practices, and new product innovations, attendees will discover new ways to achieve innovation by pushing the envelope.</li>
                            <li><strong>Education Track - </strong>Learn why Cloud is the fastest growing segment of the technology market. Attendees of these sessions will acquire valuable knowledge on the latest tools and technologies in the Ingram Micro Cloud Marketplace that help automate and transform productivity.</li>
                        </ul>
                        <li>Hear from keynote speakers experienced in shifting the paradigm and driving their industries through profound disruption:</li>
                    </ul>
                    <div class="row">
                        <div class="col-md-12 image-section">
                            <div class="col-md-2">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/landing-page/pic-01.jpg" alt=""/>
                            </div>
                            <div class="row col-md-3">
                                <p><strong>Marc Randolph</strong><br/> Co-founder and<br>former CEO of Netflix<br>and Co-founder<br>Looker Data Sciences</p>
                            </div>
                            <div class="col-md-2">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/landing-page/pic-02.jpg" alt=""/>
                            </div>
                            <div class="row col-md-3">
                                <p><strong>Jim McKelvey</strong><br>Co-founder of Square<br>and Founder of<br>LaunchCode</p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-3 col-sm-12 col-md-offset-1">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/landing-page/work-smarter.jpg" alt=""/><br><br>
                        <img src="<?php echo get_template_directory_uri(); ?>/img/landing-page/work-smarter.jpg" alt=""/>
                    <?php echo get_sidebar('platforms'); ?>
                </div>
            </div>
        </div>
    </div>


<?php get_footer(); ?>