/* global $ */

$(document).ready(function() {
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