<?php
$ver = '20170213';
$min = ".min";
?>
<script type='text/javascript' src='<?php echo get_template_directory_uri() . '/build_js/custom/common' . $min . '.js'; ?>'></script>
<?php if (is_front_page()) { ?>
    <script type='text/javascript' src='<?php echo get_template_directory_uri() . '/build_js/custom/page-home' . $min . '.js'; ?>'></script>
    <?php
} else {
    if (is_page('blog') || is_page('newsroom') || is_single()) {
        ?>
        <script type='text/javascript' src='<?php echo get_template_directory_uri() . '/build_js/prettyPhoto' . $min . '.js'; ?>'></script>
        <script type='text/javascript'>
            (function ($) {
                "use strict";
                $(window).load(function () {
                    $(document).ready(function () {
                        $(function () {
                            $('a[data-rel]').each(function () {
                                $(this).attr('rel', $(this).data('rel'));
                            });
                        });
                        $("a[data-rel^='ingramPhoto']").ingramPhoto();
                    });
                });
            })(jQuery);
        </script>

        <?php
    }
    if (is_page('become-a-partner')) {
        ?>
        <script type='text/javascript' src='<?php echo get_template_directory_uri() . '/build_js/custom/page-become-a-partner' . $min . '.js'; ?>'></script>
    <?php } ?>
    <script type='text/javascript' src='<?php echo get_template_directory_uri() . '/build_js/custom/page-categories' . $min . '.js'; ?>'></script>             

    <?php if (is_page('newsroom') || is_page('newsroom-pagination')) { ?>            
        <script type='text/javascript' src='<?php echo get_template_directory_uri() . '/build_js/custom/page-newsroom' . $min . '.js'; ?>'></script>
    <?php } ?>    
<?php } ?>
<script type='text/javascript' src='<?php echo get_template_directory_uri() . '/build_js/slick' . $min . '.js'; ?>'></script>


