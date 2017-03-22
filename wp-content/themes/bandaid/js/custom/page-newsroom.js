(function ($) {
    "use strict";
    $(window).load(function () {
        $(document).ready(function () {
            $('a.open-window').on('click', function (e) {
                e.preventDefault();
                var url = $(this).attr("href");
                var w = 1000;
                var h = 600;
                var left = (screen.width / 2) - (w / 2);
                var top = (screen.height / 2) - (h / 2);
                window.open(url, '', 'toolbar=0,location=0,menubar=0,scrollbars=yes,resizable=yes,width=' + w + ',height=' + h + ', top=' + top + ', left=' + left);
                return false;
            });
        });

        var hash = document.location.hash;

        if (hash) {            
            jQuery('.nav-tabs a[href=' + hash + ']').tab('show');
        }
        if (hash == '#in-the-news') {
            //$('html, body').scrollTop($("#vendor-tab").offset().top);
           // jQuery('body, html').animate({scrollTop: jQuery("#in-the-news-tab").offset().top}, 800);
        }
        if (hash == '#latest-news') {
            //window.scrollTo(0);
           // jQuery('body, html').animate({scrollTop: jQuery("#latest-news-tab").offset().top}, 800);

        }


    });
})(jQuery);