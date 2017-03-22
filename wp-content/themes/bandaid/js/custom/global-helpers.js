/* global $, slidesToShow, country, categoryDescriptions, backgroundColors, icons */
/*eslint no-unused-vars: 0 */

function sanitize(title) {
    return title.toLowerCase().replace(/ |&/g, '-').replace(/(-)\1+/g, '-');
}

function dashesToUnderscores(str) {
    return str.replace(/-/g, '_');
}

function getSvgIcon(categoryName) {
    return icons[categoryName];
}

function getCurrentPageSlug() {
    return window.location.href.split('/')[window.location.href.split('/').length - 2];
}

function getCategoryJson(currentLangJson, categoryName) {

    var categoryMarkup = '';

    currentLangJson.forEach(function (column) {
        column.forEach(function (category) {
            if (sanitize(category.CategoryName) == categoryName) {
                categoryMarkup = generateSolutionMarkup(category);
            }
        });
    });

    return categoryMarkup;
}

function renderCategorySolutions(options) {
    var markup = getCategoryJson(options.currentLangJson, options.categoryName);

    jQuery('#category-solutions').html('');
    jQuery(markup).appendTo('#category-solutions');

    // Reinitialize SlickJS   
    jQuery('#category-solutions').hide().fadeIn(350).slick({
        slidesToShow: 3,
        //slidesToShow: options.slidesToShow,
        dots: true,
        slidesToScroll: 1,
        autoplay: true,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            }, {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }]
    });

}

function generateSolutionMarkup(categoryJson) {
    var markup = '';

    categoryJson.SubCategories.forEach(function (solution, i) {

        var _options = {
            CategoryName: solution.CategoryName,
            vendorName: solution.CategoryName.split(/ - (.+)?/)[0],
            sanitizedVendorName: sanitize(solution.CategoryName.split(/ - (.+)?/)[0]),
            solutionName: solution.CategoryName.split(/ - (.+)?/)[1],
            country: country,
            url: solution.Url
        };

        markup +=
                '<div class="solution"> \
              <a href="https://' + _options.country + '.cloud.im' + _options.url + '" target="_blank"> \
                <div class="solution-container"> \
                  <div class="top-half"> \
                    <div class="logo" data-vendor="' + _options.sanitizedVendorName + '"><img class="img-responsive" src="/wp-content/themes/bandaid/img/logos/' + _options.sanitizedVendorName + '.png" onError="this.style.display=\'none\';" /></div> \
                  </div> \
                  <div class="bottom-half" style="background-color: #' + backgroundColors[i] + '"> \
                    <div class="vendor"><strong>' + _options.vendorName + '</strong></div> \
                    <div class="title">';
        if (typeof _options.solutionName == "undefined")
            markup += _options.CategoryName;
        else
            markup += _options.solutionName;
        markup += '</div> \
                  </div> \
                </div> \
              </a> \
            </div>';

        markup = markup.replace('undefined', '');
    });

    return markup;
}

function getSelectedCategoryDescription(categoryName, type, language) {
    if (typeof categoryDescriptions[categoryName] == 'undefined') {
        return;
    }

    return categoryDescriptions[categoryName][type];
}

/* global $ */

(function ($) {
    "use strict";
    $(window).load(function () {
        $(document).ready(function () {
            jQuery('nav #business-applications-icon').append(getSvgIcon('business-applications'));
            jQuery('nav #communication-collaboration-icon').append(getSvgIcon('communication-collaboration'));
            jQuery('nav #infrastructure-icon').append(getSvgIcon('infrastructure'));
            jQuery('nav #cloud-management-services-icon').append(getSvgIcon('cloud-management-services'));
            jQuery('nav #security-icon').append(getSvgIcon('security'));
            jQuery('nav #vertical-solutions-icon').append(getSvgIcon('vertical-solutions'));
            jQuery('nav #marketplace-icon').append(getSvgIcon('marketplace'));
            jQuery('nav #referral-icon').append(getSvgIcon('referral'));
            jQuery('nav #store-icon').append(getSvgIcon('store'));
            jQuery('nav #oae-icon').append(getSvgIcon('oae'));
            jQuery('nav #oap-icon').append(getSvgIcon('oap'));
            jQuery('nav #ensim-icon').append(getSvgIcon('ensim'));

            $('nav .service-platform').hover(function () {
                $(this).find('svg .cls-1').css({'fill': '#2375bb'});
            }, function () {
                $(this).find('svg .cls-1').css({'fill': '#333'});
            });

            jQuery('.newsletter-ajax-form').on('submit', function (e) {
                e.preventDefault();

                var $form = $(this);

                jQuery.post($form.attr('action'), $form.serialize(), function (data) {
                    if (data.error) {
                        jQuery("#email_address").css('border', "1px solid red");
                        jQuery(".bg-success").html('').hide();
                        jQuery(".bg-danger").html(data.error_message).show('slow');

                    } else {
                        jQuery(".bg-danger").html('').hide();
                        jQuery(".bg-success").html(data.success_message).show('slow');
                        jQuery("#email_address").css('border', "1px solid #ffffff");
                        jQuery("#email_address").val('');
                        setTimeout('jQuery(".bg-success").html("").hide("slow");', 3000);
                    }

                }, 'json');
            });

            jQuery('#super-menu input[type="radio"]').on(
                    'change',
                    function (e) {
                        //location.reload();
                        var url = $(this).val();
                        var RegExp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;

                        if (RegExp.test(url)) {
                            window.location.href = url;
                        } else {
                            return false;
                        }
                    }
            );
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