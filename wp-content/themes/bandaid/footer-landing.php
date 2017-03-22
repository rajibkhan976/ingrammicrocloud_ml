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
<footer style="background-color:#286caf;">
    <div id="big-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4">
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
                <div class="col-md-4 col-sm-4">                    
                </div>
                <div class="col-md-4 col-sm-4">
					<div class="text-right">
                    <p>Brought to you by: &nbsp;&nbsp;<img src="/wp-content/uploads/2017/02/ingram-micro-white.png"></p>                    
                    <div class="copyright">&copy; <?php echo date('Y'); ?>. All Rights Reserved. Ingram Micro Inc.</div>
                    <br />
                    <a href="/about">About Us</a> | 
                <a href="/blog/">Blog</a> |
                <a href="/newsroom/">Newsroom</a> 
                </div>
            </div>
        </div>
    </div>    
</footer>
<?php
wp_footer();

?>
</body>
</html>
