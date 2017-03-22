/*----------------------------------------------------*/
// WOO COMMERCE
/*----------------------------------------------------*/

jQuery('.woocommerce ul.products li.product .add_to_cart_button, .woocommerce-page ul.products li.product .add_to_cart_button').each(function() {
	jQuery(this).html('<i class="fa fa-plus"></i>');
	
	
	var src = jQuery(this).parents().parents().children('a').attr('href');
	jQuery(this).wrapAll('<div class="layer-wrapper">');
	
	
});

jQuery('.woocommerce ul.products li.product, .woocommerce-page ul.products li.product').each(function() {
	var src = jQuery(this).children('a').attr('href');
	jQuery('<div class="woo-hover"></div>').appendTo(jQuery(this));
	
	//jQuery(this).children().children('img').wrapAll('<div class="woo-hover">');
	//jQuery(this).children().children('h3').after(jQuery(this).children().children('.price'));
	jQuery(this).children().children('.price').insertBefore(jQuery(this).children().children('h3'));
 
	jQuery('<a class="button view-buttons" href="'+src+'"><i class="fa fa-link"></i></a>').appendTo(jQuery(this).children('.layer-wrapper'));
	
});

/*----------------------------------------------------*/
// ANIMATIONS
/*----------------------------------------------------*/
function animate_me(){
	jQuery('h1, h6, .zilla-button').each(function() {
			if ((!(jQuery(this).parents('.teamwrapper').length)) && (!(jQuery(this).parents('.agenda').length))) {

				jQuery(this).addClass('hide-animation');

				jQuery(this).waypoint(function(event, direction) {
					jQuery(this).removeClass('hide-animation').addClass('animated bounceIn');

				}, {
					triggerOnce : true,
					offset : '90%'
				});
			}
		});
		/*
			jQuery('.agenda-icon').each(function() {
			if (!(jQuery(this).parents('.teamwrapper').length)) {

				jQuery(this).addClass('hide-animation');

				jQuery(this).waypoint(function(event, direction) {
					jQuery(this).removeClass('hide-animation').addClass('animated bounceIn');

				}, {
					triggerOnce : true,
					offset : '90%'
				});
			}
		});
		
		jQuery('.agenda-left-content').each(function() {
			if (!(jQuery(this).parents('.teamwrapper').length)) {

				jQuery(this).addClass('hide-animation');

				jQuery(this).waypoint(function(event, direction) {
					jQuery(this).removeClass('hide-animation').addClass('animated fadeInLeft');

				}, {
					triggerOnce : true,
					offset : '90%'
				});
			}
		});


		jQuery('.agenda-right-content').each(function() {
			if (!(jQuery(this).parents('.teamwrapper').length)) {

				jQuery(this).addClass('hide-animation');

				jQuery(this).waypoint(function(event, direction) {
					jQuery(this).removeClass('hide-animation').addClass('animated fadeInRight');

				}, {
					triggerOnce : true,
					offset : '90%'
				});
			}
		});
	*/
		jQuery('.service-box').each(function() {
			if ((!(jQuery(this).parents('.teamwrapper').length)) && (!(jQuery(this).parents('.agenda').length))) {
				jQuery(this).addClass('hide-animation');

				jQuery(this).waypoint(function(event, direction) {
					jQuery(this).removeClass('hide-animation').addClass('animated fadeInUp');

				}, {
					triggerOnce : true,
					offset : '90%'
				});
			}
		});

		jQuery('.recent-post-preview, .testimonial').each(function() {
			if ((!(jQuery(this).parents('.teamwrapper').length)) && (!(jQuery(this).parents('.agenda').length))) {
				jQuery(this).addClass('hide-animation');

				jQuery(this).waypoint(function(event, direction) {
					jQuery(this).removeClass('hide-animation').addClass('animated fadeIn');

				}, {
					triggerOnce : true,
					offset : '90%'
				});
			}
		});
}


/*----------------------------------------------------*/
// COUNTER
/*----------------------------------------------------*/

function exquisite_counter(numbers) {"use strict";

	var currentNumber = 0;
	var number = numbers.attr('data-number');
	//console.log(number);
	jQuery({
		numberValue : currentNumber
	}).animate({
		numberValue : number
	}, {
		duration : 3500,
		easing : 'linear',
		step : function() {
			numbers.html('<h3>' + Math.round(this.numberValue) + '</h3>');
		},
		complete : function(){
        numbers.html('<h3>' + number + '</h3>');
    }
	});
}

(function($) {"use strict";

	$(window).load(function() {

		$(document).ready(function() {
			
/*----------------------------------------------------*/
// AGENDA
/*----------------------------------------------------*/

			$(".agenda-left, .agenda-right").each(function() {
				if ($(this).is(':last-child')) {
					$(this).addClass('last-agenda-item');
				}
			});

			
/*----------------------------------------------------*/
// COUNTER
/*----------------------------------------------------*/
			$(".counter-number").each(function() {
				$(this).waypoint(function(event, direction) {
					var numbers = $(this);
					exquisite_counter(numbers);

				}, {
					triggerOnce : true,
					offset : '90%'
				});

			});
			
/*----------------------------------------------------*/
// COUNTDOWN
/*----------------------------------------------------*/

			$('.countdown').each(function() {
   var year = $(this).attr('data-year');
   var month = $(this).attr('data-month');
   var day = $(this).attr('data-day');
   var color = $(this).css('color');


	var austDay = new Date(year, month - 1, day);
	$('.countdown').countdown({until: austDay});

	$(this).children("*").css('color', color);

      
});

			$(".exquisite-bar").each(function() {
				$(this).waypoint(function(event, direction) {
					var width = $(this).attr('data-width');
					$(this).animate({
						width : width
					}, 1500, function() {
					});

				}, {
					triggerOnce : true,
					offset : '90%'
				});

			});

			/*----------------------------------------------------*/
			// TEAM CAROUSEL
			/*----------------------------------------------------*/
			$(function() {
				var cWrap = $('<div class="teamcarousel"/>');
				$('.teamwrapper').each(function() {
					var o = $(this).next('.teamwrapper').length;
					$(this).replaceWith(cWrap).appendTo(cWrap);
					if (!o)
						cWrap = $('<div class="teamcarousel"/>');
				});

			});

			$('#blogmasonry').insertBefore('#blogcontent');

			/*----------------------------------------------------*/
			// PRETTYPHOTO HACK
			/*----------------------------------------------------*/

			$('a[data-rel]').each(function() {
				$(this).attr('rel', $(this).data('rel'));
			});



		});
	});
})(jQuery);

/*----------------------------------------------------*/
//  PRETTYPHOTO
/*----------------------------------------------------*/
jQuery("a[data-rel^='prettyPhoto']").prettyPhoto();

(function($) {"use strict";
	$(document).ready(function() {

		/*----------------------------------------------------*/
		// LOADER ANIMATION
		/*----------------------------------------------------*/

		$("body").queryLoader2({
			barColor : varAccent,
			backgroundColor : varBgColor,
			percentage : true,
			barHeight : 1,
			completeAnimation : "fade",
			minimumTime : 1000
		});

		/*----------------------------------------------------*/
		// ZILLA TABS, TOGGLES
		/*----------------------------------------------------*/

		$(".zilla-tabs").tabs();
		$(".zilla-toggle").each(function() {"use strict";
			var $this = $(this);
			if ($this.attr('data-id') == 'closed') {
				$this.accordion({
					header : '.zilla-toggle-title',
					collapsible : true,
					active : false
				});
			} else {
				$this.accordion({
					header : '.zilla-toggle-title',
					collapsible : true
				});
			}

			$this.on('accordionactivate', function(e, ui) {
				$this.accordion('refresh');
			});

			$(window).on('resize', function() {
				$this.accordion('refresh');
			});
		});

	});

	/*----------------------------------------------------*/
	// ON LOAD
	/*----------------------------------------------------*/

	$(window).load(function() {


		/*----------------------------------------------------*/
		// FITVIDS
		/*----------------------------------------------------*/

		$(".video").fitVids();

		/*----------------------------------------------------*/
		// FLEXSLIDER
		/*----------------------------------------------------*/

		$('.flexslider').flexslider({

			animation : "fade",
			slideDirection : "horizontal",
			slideshow : true,
			slideshowSpeed : 3500,
			animationDuration : 500,
			directionNav : true,
			controlNav : true
		});

		/*----------------------------------------------------*/
		// CAROUSEL
		/*----------------------------------------------------*/

		$(".carousel").owlCarousel({
			autoPlay : 3000,
			transitionStyle : "fade",
			items : 6,
			itemsDesktopSmall : [979, 4],
			itemsTablet : [768, 2],
			itemsTabletSmall : false,
			itemsMobile : false,
			pagination : false,
		});
		
		/*----------------------------------------------------*/
		// CAROUSEL - SINGLE
		/*----------------------------------------------------*/

		$(".carousel-single").owlCarousel({
			autoPlay : 2500,
			transitionStyle : "goDown",
			singleItem : true,
			navigation : false,
			pagination : false,
		});

		/*----------------------------------------------------*/
		// TEAM CAROUSEL
		/*----------------------------------------------------*/

		$(".teamcarousel").owlCarousel({
			autoPlay : 5000,
			slideSpeed : 3000,
			pagination : false,
			navigationText : ["<i class='fa fa-chevron-left icon-white'> </i>", "<i class='fa fa-chevron-right icon-white'> </i>"],
			transitionStyle : "fadeUp",
			singleItem : true,
			navigation : true
		});

		/*----------------------------------------------------*/
		// TESTIMOBIAL CAROUSEL
		/*----------------------------------------------------*/

		$(".testimonialcarousel").owlCarousel({
			autoPlay : 6000,
			transitionStyle : "fade",
			navigation : true,
			singleItem : true,
			pagination : false,
			navigationText : ["<i class='fa fa-chevron-left icon-white'> </i>", "<i class='fa fa-chevron-right icon-white'> </i>"],
		});

		/*----------------------------------------------------*/
		// PORTFOLIO CAROUSEL
		/*----------------------------------------------------*/

		$(".portfolio-carousel").owlCarousel({
			transitionStyle : "fade",
			items : 3,
			itemsDesktopSmall : [979, 2],
			itemsTablet : [600, 1],
			itemsTabletSmall : false,
			itemsMobile : false,
			navigation : true,
			pagination : false,
			navigationText : ["<i class='fa fa-chevron-left icon-white'> </i>", "<i class='fa fa-chevron-right icon-white'> </i>"],
		});

		$(".full-width").owlCarousel({
			transitionStyle : "fade",
			items : 5,
			itemsDesktopSmall : [979, 4],
			itemsTablet : [600, 2],
			itemsTabletSmall : false,
			itemsMobile : false,
			navigation : true,
			pagination : false,
			navigationText : ["<i class='fa fa-chevron-left icon-white'> </i>", "<i class='fa fa-chevron-right icon-white'> </i>"],
		});

		$(".full-width-three").owlCarousel({
			transitionStyle : "fade",
			items : 3,
			itemsDesktopSmall : [979, 2],
			itemsTablet : [600, 1],
			itemsTabletSmall : false,
			itemsMobile : false,
			navigation : true,
			pagination : false,
			navigationText : ["<i class='fa fa-chevron-left icon-white'> </i>", "<i class='fa fa-chevron-right icon-white'> </i>"],
		});

		$(".full-width-four").owlCarousel({
			transitionStyle : "fade",
			items : 4,
			itemsDesktopSmall : [979, 2],
			itemsTablet : [600, 1],
			itemsTabletSmall : false,
			itemsMobile : false,
			navigation : true,
			pagination : false,
			navigationText : ["<i class='fa fa-chevron-left icon-white'> </i>", "<i class='fa fa-chevron-right icon-white'> </i>"],
		});

		$(".full-width-five").owlCarousel({
			transitionStyle : "fade",
			items : 4,
			itemsDesktopSmall : [979, 2],
			itemsTablet : [600, 1],
			itemsTabletSmall : false,
			itemsMobile : false,
			navigation : true,
			pagination : false,
			navigationText : ["<i class='fa fa-chevron-left icon-white'> </i>", "<i class='fa fa-chevron-right icon-white'> </i>"],
		});

		$(".fit-width").owlCarousel({
			transitionStyle : "fade",
			items : 3,
			itemsDesktopSmall : [979, 2],
			itemsTablet : [600, 1],
			itemsTabletSmall : false,
			itemsMobile : false,
			navigation : true,
			pagination : false,
			navigationText : ["<i class='fa fa-chevron-left icon-white'> </i>", "<i class='fa fa-chevron-right icon-white'> </i>"],
		});

		$(".fit-width-four").owlCarousel({
			transitionStyle : "fade",
			items : 4,
			itemsDesktopSmall : [979, 2],
			itemsTablet : [600, 1],
			itemsTabletSmall : false,
			itemsMobile : false,
			navigation : true,
			pagination : false,
			navigationText : ["<i class='fa fa-chevron-left icon-white'> </i>", "<i class='fa fa-chevron-right icon-white'> </i>"],
		});

		$(".fit-width-five").owlCarousel({
			transitionStyle : "fade",
			items : 5,
			itemsDesktopSmall : [979, 3],
			itemsTablet : [600, 2],
			itemsTabletSmall : false,
			itemsMobile : false,
			navigation : true,
			pagination : false,
			navigationText : ["<i class='fa fa-chevron-left icon-white'> </i>", "<i class='fa fa-chevron-right icon-white'> </i>"],
		});

		/*----------------------------------------------------*/
		// HEADER FLEXSLIDER
		/*----------------------------------------------------*/

		$('.header-slider').flexslider({
			animation : "fade",
			slideDirection : "horizontal",
			slideshow : true,
			slideshowSpeed : 3500,
			animationDuration : 500,
			directionNav : true,
			controlNav : true
		});

		/*----------------------------------------------------*/
		// PRE-LOADER
		/*----------------------------------------------------*/

		$('#loading').fadeOut().remove();
	});

})(jQuery);
;

/*----------------------------------------------------*/
// AJAX LOADING
/*----------------------------------------------------*/

(function($) {"use strict";
	$(window).load(function() {
		$(document).ready(function() {

			$.ajax({
				cache : false
			});

			$('.trick').off().on('click', exquisite_loadAjax);
			$('.next_post a').off().on('click', exquisite_loadAjax);
			$('.prev_post a').off().on('click', exquisite_loadAjax);

		});
	});
})(jQuery);


function exquisite_loadAjax() {"use strict";
	var post_link = jQuery(this).attr("href") + " #ajaxContainer";
	//jQuery("#single-home-container").html("loading...");
	
	jQuery("#single-home-container").addClass("active");

	
	
	var loading = '<div class="loader-pushdown"><div id="floatingCirclesG"><div class="f_circleG" id="frotateG_01"></div><div class="f_circleG" id="frotateG_02"></div><div class="f_circleG" id="frotateG_03"></div><div class="f_circleG" id="frotateG_04"></div><div class="f_circleG" id="frotateG_05"></div><div class="f_circleG" id="frotateG_06"></div><div class="f_circleG" id="frotateG_07"></div><div class="f_circleG" id="frotateG_08"></div></div>';


	jQuery("#single-home-container").html(loading);
	
	jQuery("#single-home-container").load(post_link, function(responseTxt, statusTxt, xhr) {
		if (statusTxt == "success") {//  callback
			jQuery('.flexslider').flexslider({

				animation : "fade",
				slideDirection : "horizontal",
				slideshow : true,
				slideshowSpeed : 3500,
				animationDuration : 500,
				directionNav : true,
				controlNav : true
			});

			jQuery('.trick').off().on('click', exquisite_loadAjax);
			jQuery('.next_post a').off().on('click', exquisite_loadAjax);
			jQuery('.prev_post a').off().on('click', exquisite_loadAjax);

			jQuery(".video").fitVids();

			jQuery("a[data-rel^='prettyPhoto']").prettyPhoto();

			jQuery('a[data-rel]').each(function() {"use strict";
				jQuery(this).attr('rel', jQuery(this).data('rel'));
			});

			jQuery('.close').click(function() {"use strict";
				jQuery("#single-home-container").html("");
				jQuery("#single-home-container").removeClass("active");
				return false;
			});

		}
		if (statusTxt == "error")
			alert("Error: " + xhr.status + ": " + xhr.statusText);
	});

	return false;
}

/*----------------------------------------------------*/
// SCROLL UP
/*----------------------------------------------------*/

jQuery(document).ready(function($) {"use strict";
	$(window).scroll(function() {
		if ($(this).scrollTop() < 200) {
			$('#smoothup').fadeOut();
		} else {
			$('#smoothup').fadeIn();
		}
	});
	$('#smoothup').on('click', function() {
		$('html, body').animate({
			scrollTop : 0
		}, 'fast');
		return false;
	});
}); 


/*----------------------------------------------------*/
// NAVIGATION HANDLING
/*----------------------------------------------------*/

(function($) {"use strict";
	$(window).load(function() {
		$(document).ready(function() {

			$('.sub-menu > li:first-child').addClass('first-submenu-item');

			var ww = exquisite_viewport().width;
			var section = $('[class$=section]'), menuLink = $('.nav a');
			var ubermenuToggle = $('.ubermenu-responsive-toggle');

			$(function() {
				if (varOnePage == '1') {
					section.waypoint({
						handler : function(event, direction) {
							var activeSection = $(this);
							if (direction === "up") {
								activeSection = activeSection.prev();
							}

							if (activeSection.attr('id')) {
								if (activeSection.attr('id').length > 1) {
									//	alert(activeSection.attr('id').length);
									var activeMenuLink = $('.nav a[href$=#' + activeSection.attr('id') + ']');
									menuLink.removeClass('active');

									activeMenuLink.addClass('active');
								}
							}

						},
						offset : '20%'
					});
				}

			});

			// check if element has parent
			$(".nav li a").each(function() {
				if ($(this).next().length > 0) {
					$(this).addClass("parent");
				};
			})
			$(".toggleMenu").click(function(e) {
				e.preventDefault();
				$(this).toggleClass("active");
				if (ubermenuToggle.length) {
					ubermenuToggle.click();
				} else {
					$(".nav").toggle();
				}
			});
			exquisite_adjustMenu();

			$(window).resize(function() {

				ww = exquisite_viewport().width;
				exquisite_adjustMenu();

			});

			function exquisite_viewport() {
				var e = window, a = 'inner';
				if (!('innerWidth' in window )) {
					a = 'client';
					e = document.documentElement || document.body;
				}
				return {
					width : e[a + 'Width'],
					height : e[a + 'Height']
				};
			}

			function exquisite_adjustMenu() {
				if (ww < 960) {
					if ($('#mobile').hasClass('three')) {
						$('#mobile').removeClass('three').addClass('sixteen');
					}
					if ($('#menu').hasClass('thirteen')) {
						$('#menu').removeClass('thirteen').addClass('sixteen');
					}

					$(".upper-nav-bar").hide();
					$(".toggleMenu").css("display", "block");
					if (!$(".toggleMenu").hasClass("active")) {

						$(".nav").hide();
					} else {
						$(".nav").show();
					}
					$(".nav li").unbind('mouseenter mouseleave');
					$(".nav li a.parent").unbind('click').bind('click', function(e) {
						// must be attached to anchor element to prevent bubbling
						e.preventDefault();

						$(this).parent("li").toggleClass("hover");

					});

				} else if (ww >= 960) {
					//	$('#mobile').removeClass('sixteen').addClass('thirteen');

					if ($('#mobile').hasClass('sixteen')) {
						$('#mobile').removeClass('sixteen').addClass('three');
					}

					if ($('#menu').hasClass('sixteen')) {
						$('#menu').removeClass('sixteen').addClass('thirteen');
					}

					$(".upper-nav-bar").show();
					$(".toggleMenu").css("display", "none");
					$(".nav").show();
					$(".nav li").removeClass("hover");
					$(".nav li a").unbind('click');
					$(".nav li").hover(function() {
						$(this).addClass('hover', 1000);
					}, function() {
						$(this).removeClass("hover", 1000);
					});

				}
			}

			//  onClick: menu item

			$(function() {

				var navMain = $(".nav li");
				$(".nav li").on("click", "a", null, function() {

					var href = $(this).attr("href");
					if (href.indexOf('#') > -1) {
						var hash = href.substring(href.indexOf('#'));
						if (hash.length > 1) {
							var offset = $(hash).offset().top;
						}
					}

					var $clicked = $(this);
					if ($clicked.next('ul').length) {
						//if (ww < 768) {
						//	$(this).addClass('hover', 1000);
						//	event.preventDefault();
						//	}
					} else {
						$(".nav li").removeClass("hover", 1000);
						if (ww < 960) {
							$(".nav").hide();
							$(".toggleMenu").removeClass("active");
						}
						// scroll the page below navbar
						if (href.indexOf('#') > -1) {
							$('html, body').stop().animate({
								scrollTop : offset - 60
							}, 500);
						}
					}
				});
			});

		});

	});
})(jQuery);

(function($) {
	"use strict";
	$(window).load(function() {
		$(document).ready(function() {

			// get height of header element
			var height = $('.header').outerHeight();
			// update the height on window resize
			$(window).resize(function() {
				height = $('.header').height();
			});
			// set the nav-bar position depending on page scroll
			var ww = exquisite_viewport().width;
			
					function exquisite_viewport() {
				var e = window, a = 'inner';
				if (!('innerWidth' in window )) {
					a = 'client';
					e = document.documentElement || document.body;
				}
				return {
					width : e[a + 'Width'],
					height : e[a + 'Height']
				};
			}
			
			
			if (ww >= 960) {
			$(window).scroll(function() {
				if ($(this).scrollTop() > height) {

					$('.nav-bar').css('position', 'fixed');
					$('.pagecontent').css('padding-top', '70px');
			
			
				} else if ($(this).scrollTop() <= height) {
					$('.nav-bar').css('position', 'static');
					$('.pagecontent').css('padding-top', '0px');

				}
			});
			$(window).scroll();
			} else if (ww < 960) {
				$('.nav-bar').css('position', 'static');
			}
			
			
		});
	});
})(jQuery); 



/*----------------------------------------------------*/
// COMMENTS HANDLING
/*----------------------------------------------------*/

var author_box_instructions = "Name";
var email_box_instructions = "E-mail";


function blur_search(box) {"use strict";
	if (box.name == "author" && box.value == "") {
		box.value = author_box_instructions;
	}
	if (box.name == "email" && box.value == "") {
		box.value = email_box_instructions;
	}
}

function focus_search(box) {"use strict";
	if (box.value == author_box_instructions) {
		box.value = "";
	}
	if (box.value == email_box_instructions) {
		box.value = "";
	}

}

/*----------------------------------------------------*/
// PORTFOLIO
/*----------------------------------------------------*/

(function($) {"use strict";
	$(window).load(function() {

		$(document).ready(function() {
			// filter option item on page load
			
			$('div.portfolio-carousel-wrapper').children().children().children().attr('id', 'owl-wrapper-folio');
			var $filterType = $('.portfolio-buttons li.active a').attr('class');
			// assign holder element
			var $holder = $('#owl-wrapper-folio');
	
			
			// clone all items within the pre-assigned $holder element
			var $data = $holder.clone();
			// on click
		//	$('#container').on("click",".hello",function(e){
			$('.portfolio-buttons').on('click', 'li a', function(e){
			//	$('.flexslider').flexslider({
			//	e.preventDefault();
				$("#single-home-container").html("");
				// remove the active class from all buttons
				$('.portfolio-buttons li').removeClass('active');
				// assign the class of the clicked filter option element to $filterType variable
				var $filterType = $(this).attr('class');
				$(this).parent().addClass('active');
				if ($filterType == 'all') {
					// assign all li items to the $filteredData var when
					// the 'All' filter option is clicked
					var $filteredData = $data.find('div');
					$('.pagination').show();
				} else {
					// find all li elements that have our required $filterType
					// values for the data-type element
					var $filteredData = $data.find('div[data-type~=' + $filterType + ']');
					$('.pagination').hide();
				}

				// call quicksand and assign transition parameters
				$holder.quicksand($filteredData, {
					duration : 800,
					easing : 'easeInOutQuad'
				}, function() {// quickstand callback
					$("a[data-rel^='prettyPhoto']").prettyPhoto();
					$('a[data-rel]').each(function() {
						$(this).attr('rel', $(this).data('rel'));
					});

					$('.trick').off().on('click', exquisite_loadAjax);

				});
				 
				return false;
			});
		});

	});

})(jQuery);
