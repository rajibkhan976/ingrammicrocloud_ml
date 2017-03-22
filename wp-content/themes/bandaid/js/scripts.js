
/*----------------------------------------------------*/
// NAVIGATION HANDLING
/*----------------------------------------------------*/
(function ($) {
    "use strict";
    $(window).load(function () {
        $(document).ready(function () {

            $('.sub-menu > li:first-child').addClass('first-submenu-item');

            var ww = exquisite_viewport().width;
            var section = $('[class$=section]'), menuLink = $('.nav a');
            var ubermenuToggle = $('.ubermenu-responsive-toggle');

            $(function () {
                if (varOnePage == '1') {
                    section.waypoint({
                        handler: function (event, direction) {
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
                        offset: '20%'
                    });
                }

            });

            // check if element has parent
            $(".nav li a").each(function () {
                if ($(this).next().length > 0) {
                    $(this).addClass("parent");
                }
                ;
            })
            $(".toggleMenu").click(function (e) {
                e.preventDefault();
                $(this).toggleClass("active");
                if (ubermenuToggle.length) {
                    ubermenuToggle.click();
                } else {
                    $(".nav").toggle();
                }
            });
            exquisite_adjustMenu();

            $(window).resize(function () {

                ww = exquisite_viewport().width;
                exquisite_adjustMenu();

            });

            function exquisite_viewport() {
                var e = window, a = 'inner';
                if (!('innerWidth' in window)) {
                    a = 'client';
                    e = document.documentElement || document.body;
                }
                return {
                    width: e[a + 'Width'],
                    height: e[a + 'Height']
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
                    $(".nav li a.parent").unbind('click').bind('click', function (e) {
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
                    $(".nav li").hover(function () {
                        $(this).addClass('hover', 1000);
                    }, function () {
                        $(this).removeClass("hover", 1000);
                    });

                }
            }

            //  onClick: menu item

            $(function () {

                var navMain = $(".nav li");
                $(".nav li").on("click", "a", null, function () {

                    var href = $(this).attr("href");
                    if (href.indexOf('#') > -1) {
                        var hash = href.substring(href.indexOf('#'));
                        if (hash.length > 1) {
                            //var offset = $(hash).offset().top;
                        }
                    }

                    var $clicked = $(this);

                });

            });



        });
        loadAjaxModal();

    });
})(jQuery);
//FUNCTION TO MODAL FROM DATATAG
function loadAjaxModal() {
    jQuery('a[data-modal]').on('click', function (event) {
        event.preventDefault();
        var modal_id = this.id;
        
        jQuery(this).modal({
            modalClass: "modal "+modal_id,
            spinnerHtml:'Please wait...',
            showSpinner: false,
        });        
        return false;
    });
}