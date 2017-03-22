function scrollForVendor() {
    //become a vendor tab
    var hash = document.location.hash;

    if (hash) {
        jQuery('.nav-tabs a[href=' + hash + ']').tab('show');
    }
    if (hash == '#vendor') {
        console.log(jQuery("#vendor-tab").offset().top);
        jQuery('body, html').animate({scrollTop: 420}, 800);
        return false;
    }
    if (hash == '#reseller') {
        console.log(jQuery("#reseller-tab").offset().top);
        jQuery('body, html').animate({scrollTop: 420}, 800);
        return false;
    }
}

jQuery(document).ready(function () {
    var hash = document.location.hash;
    scrollForVendor();
    jQuery('#big-footer a.page-scroll').click(function (e) {
        scrollForVendor();
    });
});