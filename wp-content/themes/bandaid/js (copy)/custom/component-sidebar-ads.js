/* global $, country, language, dashesToUnderscores, getCurrentPageSlug */
(function ($) {
    "use strict";
    $(window).load(function () {
        $(document).ready(function () {
            $('#sidebar-platform #ad-space').html('<div class="adplugg-tag" data-adplugg-zone="' + country + '_platform_' + dashesToUnderscores(getCurrentPageSlug()) + '_p1_' + language + '_' + country + '"></div>');
            $('#sidebar-category #ad-space').html('<div class="adplugg-tag" data-adplugg-zone="' + country + '_category_' + dashesToUnderscores(getCurrentPageSlug()) + '_p1_' + language + '_' + country + '"></div>');
        });

    });
})(jQuery);