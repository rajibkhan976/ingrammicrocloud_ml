/* global $ */

(function ($) {
    "use strict";
    $(window).load(function () {
        $(document).ready(function () {
    $('nav #cloud-services span').html(
    '<span id="title"><strong>Cloud Services</strong></span><br /> \
     <span id="subtitle">Browse and purchase cloud products</span>'
  );
  $('nav #platforms span').html(
    '<span id="title"><strong>Cloud Services Platforms</strong></span><br /> \
     <span id="subtitle">Select the best way to resell</span>'
  );
  
  $('nav .service-platform').hover(function() {
    $(this).find('svg .cls-1').css({'fill': '#2375bb'});
  }, function() {
    $(this).find('svg .cls-1').css({'fill': '#333'});
  });
 });

    });

  $(window).scroll(function () {
    if ($(window).scrollTop() >= 150) {
      $('.sticky').css("transition", "all 0.7s ease-in-out").addClass('sticky-fixed');
    }
   else {
    $('.sticky').css("transition", "all 0.7s ease-in-out").removeClass('sticky-fixed');
   }
  });

})(jQuery);