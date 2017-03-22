/* global $, scrollForVendor */

function scrollForVendor() {
    //become a vendor tab
    var hash = document.location.hash;

    if (hash) {
        jQuery('.nav-tabs a[href=' + hash + ']').tab('show');
    }
    if (hash == '#vendor') {
        console.log(jQuery("#vendor-tab").offset().top);
       jQuery('body, html').animate({scrollTop: 550}, 800);
    }
    if (hash == '#reseller') {
        console.log(jQuery("#reseller-tab").offset().top);
        jQuery('body, html').animate({scrollTop: 550}, 800);

    }

}

jQuery(document).ready(function () {
    var hash = document.location.hash;

//    if (hash) {
//        $('.nav-tabs a[href=' + hash + ']').tab('show');
//    }
    scrollForVendor();
    jQuery('#big-footer a.page-scroll').click(function (e) {
		window.location = this.href;
        window.location.reload();
    });
});