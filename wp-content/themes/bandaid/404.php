<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package bandaid
 */
get_header();
?>
<style type="text/css">
    h1, h2{ color: #0071ba; }
    h1 { font-size: 30px; }
    h2 { font-size: 28px; }
    h1,h2{line-height: 175%; margin-bottom: 15px !important; font-weight: 200 !important;}
    h1:after {
    display: block;
    margin: 0 auto;
    content: "";
    width: 30px;
    height: 4px;
    border-bottom: 3px solid #1eabd9;
}
</style>
<div class="page-section blog-page">
    <div class="container" style="margin-top:50px;margin-bottom:50px;">
        <div class="row">
            <div class="col-md-9 col-sm-9">
                <div class="error">
                    <h1>404</h1>
                    <h2>Page not found</h2>
                </div>
            </div>
            <div class="col-md-3 col-sm-3">
                <?php dynamic_sidebar('blog-sidebar'); ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
