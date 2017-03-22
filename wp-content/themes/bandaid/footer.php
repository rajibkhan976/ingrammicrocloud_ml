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
                    <a href="/become-a-partner/#reseller" class="page-scroll btn btn-primary" role="button">Become a Reseller</a>
                    <a href="/become-a-partner/#vendor" class="page-scroll btn btn-primary" role="button">Become a Vendor</a>
                </div>
                <div class="col-md-4 col-sm-4">
                    <h6>&nbsp;</h6>
                    <a href="https://us.cloud.im/home/" target="_blank" class="page-scroll btn btn-primary" role="button">SHOP MARKETPLACE</a>
                    <h6>Contact Us</h6>
                    <p>Phone: +1 (800) 705 7057</p>
                    <p>Address: 3351 Michelson Drive, Suite 100<br />Irvine, CA 92612, United States</p>
                </div>
                <div class="col-md-4 col-sm-4">
                    <h6>Newsletter Sign Up</h6>                    
                    <form method="post" action="<?php echo admin_url('admin-ajax.php'); ?>" class="newsletter-ajax-form">
                        <p class="bg-success"></p>
                        <p class="bg-danger"></p>
                        <input name="email" id="email_address" type="email" placeholder="Email Address" />
                        <input type="hidden" name="action" value="newsletter_submit_action">
                        <?php wp_nonce_field('newsletter_action_nonce', 'newsletter_nonce'); ?>
                        <input type="submit" value="Submit" />
                    </form>
                    <br />
                    <h6>Follow Us</h6>                    
                    <ul class="social-icons">
                        <li><a class="icon-linkedin" href="https://www.linkedin.com/company/im_cloud" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        <li><a class="icon-twitter" href="https://twitter.com/IngramCloud" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a class="icon-facebook" href="https://www.facebook.com/ingrammicrocloud" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a class="icon-youtube" href="https://www.youtube.com/user/IngramMicroServices" target="_blank"><i class="fa  fa-youtube" aria-hidden="true"></i></a></li>
                        <li><a class="icon-google-plus" href="https://plus.google.com/u/0/b/114901709326239147387/+Ingrammicrocloud" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                        <li><a class="icon-instagram" href="https://www.instagram.com/ingrammicrocloud/?hl=en" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="corporate-footer">
        <div class="container">
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="copyright">&copy; <?php echo date('Y'); ?>. All Rights Reserved. Ingram Micro Inc.</div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8">
                <a href="/about">About Us</a> | 
                <a href="/blog/">Blog</a> |
                <a href="http://phx.corporate-ir.net/phoenix.zhtml?c=98566&p=irol-IRHome">Investor Relations</a> | 
                <a href="/cloud-careers/">Careers</a> |
                <a href="/newsroom/">Newsroom</a> |
                <a href="http://corp.ingrammicro.com/Terms-of-Use/Privacy-Statement.aspx">Privacy</a>
            </div>
        </div>
    </div>
</footer>
</div>
<?php
wp_footer();
get_template_part('footer_script');
?>
<div class="hidden"><div id="popup-modal" class="modal"></div></div>
</body>
</html>
