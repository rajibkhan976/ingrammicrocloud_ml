(function($) {
	"use strict";
	
	$('body').scrollspy({
		target: '.navbar-fixed-top',
		offset: 60
	});
	
	$('#topNav').affix({
		offset: {
		top: 200
		}
	});
	
	$('#freeTrialTopNav').affix({
		offset: {
		top: 1
		}
	});
	
	//new WOW().init();
	
	$('a.page-scroll').bind('click', function(event) {
		var $ele = $(this);
	
		$('html, body').stop().animate({
			scrollTop: ($($ele.attr('href')).offset().top - 60)
		}, 1450, 'easeInOutExpo');
		
		event.preventDefault();
	});

	$('.navbar-toggle').click(function() {
		$('.navbar.navbar-default').toggleClass("white-bg");
		$('.navbar-brand').toggleClass("color-logo");
	});
	
	$('.navbar-collapse ul li a').click(function() {
		/* always close responsive nav after click */
		$('.navbar-toggle:visible').click();
	});

})(jQuery);