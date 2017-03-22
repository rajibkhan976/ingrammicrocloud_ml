<?php
/**
 * Template Name: About
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

<div id="contact-us" class="platform-page">
    <div class="container">
        <div class="row">
            <div id="main-content" class="col-md-7 col-sm-12">
                <section id="panel-1">
                    <div class="contact-form" id="request-demo-form">
                        <div class="header-logo">
                            <img src="/wp-content/themes/bandaid/img/logos/ingram-micro-white.png" alt="Ingram Micro Cloud" />
                        </div>
                        <div id="wufoo-qao3oh90ap544v">
                            Fill out my <a href="https://globalcloudmarketing.wufoo.com/forms/qao3oh90ap544v">online form</a>.
                        </div>
                        <script type="text/javascript">var qao3oh90ap544v;
                            (function (d, t) {
                                var s = d.createElement(t), options = {
                                    'userName': 'globalcloudmarketing',
                                    'formHash': 'qao3oh90ap544v',
                                    'autoResize': true,
                                    'height': '728',
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
                                        qao3oh90ap544v = new WufooForm();
                                        qao3oh90ap544v.initialize(options);
                                        qao3oh90ap544v.display();
                                    } catch (e) {
                                    }
                                };
                                var scr = d.getElementsByTagName(t)[0], par = scr.parentNode;
                                par.insertBefore(s, scr);
                            })(document, 'script');</script>

                    </div>
                </section>
            </div>
            <div class="col-md-5 col-sm-12">
                <div class="contact-right text-left">
                    <h5 class="margin-top-0">Ingram Micro Cloud Site Administrator</h5>
                    <p>+1 (800) 705 7057</p>
                    <p><a href="mailto:cloud@ingrammicro.com">cloud@ingrammicro.com</a></p>
                    <h5>Services Sales Team</h5>
                    <p>+1 (800) 705 7057<br>
                        <a href="mailto:servicessales@ingrammicro.com">servicessales@ingrammicro.com</a></p>
                    <h5>Technical Support</h5>
                    <p>+1 (844) CLOUDIM (256 8346)<br>
                        <a href="mailto:IMCloudServiceDesk@cloud.im">IMCloudServiceDesk@cloud.im</a>
                    </p>
                    <h5>Cloud Management Services</h5>
                    <p>+1 (800) 705 7057, option 1<br>
                        <a href="mailto:cloud.management@ingrammicro.com">cloud.management@ingrammicro.com</a>
                    </p>
                    <h5>Security Sales Team</h5>
                    <p>+1 (800) 705 7057, option 2</p>
                    <p>
                        <a href="mailto:cloud.security@ingrammicro.com">cloud.security@ingrammicro.com</a>
                    </p>
                    <h5>Business Applications Sales Team</h5>
                    <p>+1 (800) 705 7057, option 3</p>
                    <p>
                        <a href="mailto:cloud.applications@ingrammicro.com">cloud.applications@ingrammicro.com</a>
                    </p>
                    <h5>Infrastructure Sales Team</h5>
                    <p>+1 (800) 705 7057, option 4</p>
                    <p>
                        <a href="mailto:cloud.infrastructure@ingrammicro.com">cloud.infrastructure@ingrammicro.com</a>
                    </p>
                    <h5>Communication &amp; Collaboration Sales Team</h5>
                    <p>+1 (800) 705 7057, option 5</p>
                    <p>
                        <a href="mailto:cloud.communication@ingrammicro.com">cloud.communication@ingrammicro.com</a>
                    </p>
                    <h5>Professional &amp; Training Services</h5>
                    <p>+1 (800) 456-8000, option 76094</p>
                    <p>
                        <a href="mailto:proservices@ingrammicro.com">proservices@ingrammicro.com</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>