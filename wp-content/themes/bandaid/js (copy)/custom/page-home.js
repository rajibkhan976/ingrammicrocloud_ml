/* global $, renderCategorySolutions, country, language, themeDir, sanitize, getSelectedCategoryDescription, slidesToShow_Home, getSvgIcon */

function renderPromotions() {
    jQuery('#panel-promotions').slick({
        autoplay: true,
        autoplaySpeed: 3500,
        centerMode: true,
        centerPadding: '0px',
        slidesToShow: 3,
        dots: true,
        customPaging: function (slider, i) {
            var thumb = jQuery(slider.$slides[i]).data('thumb');
            return '<a><div class="adbutler-image-wrapper"><img src="' + thumb + '"></div></a>';
        },
        responsive: [{
                breakpoint: 992,
                settings: {
                    arrows: false,
                    dots: false,
                    slidesToShow: 3
                }
            }, {
                breakpoint: 726,
                settings: {
                    arrows: false,
                    dots: false,
                    slidesToShow: 2
                }
            }, {
                breakpoint: 676,
                settings: {
                    arrows: false,
                    dots: false,
                    slidesToShow: 3
                }
            }, {
                breakpoint: 462,
                settings: {
                    arrows: false,
                    dots: false,
                    slidesToShow: 1
                }
            }]
    });
    fixPromotionsNav();
}

function fixPromotionsNav() {
    if (jQuery('#panel-promotions li[id^=\'slick-slide0\'] img').length == jQuery('#panel-promotions li[id^=\'slick-slide0\']').length) {
        jQuery('#panel-promotions li[id^=\'slick-slide\'] img').unwrap();
    } else {
        setTimeout("fixPromotionsNav()", 100);
    }
}

function renderCategories(currentLangJson) {
    var markup = '';

    currentLangJson.forEach(function (column) {
        column.forEach(function (category) {

            var icon = getSvgIcon(sanitize(category.CategoryName));

            markup += '<div id="' + sanitize(category.CategoryName) + '" class="category"> \
              	  <div class="icon">' + icon + '</div> \
              		<div class="name">' + category.CategoryName + '</div> \
              	</div>';
        });
    });

    jQuery('#category-list').html(markup);
}

//FUNCTION TO GET AND AUTO PLAY YOUTUBE VIDEO FROM DATATAG

jQuery(document).ready(function () {   

    jQuery('#panel-delivery-models #marketplace-icon .icons-in').html(getSvgIcon('marketplace') + '<div class="icon-name">Cloud<br>Marketplace</div>');
    jQuery('#panel-delivery-models #referral-icon .icons-in').html(getSvgIcon('referral') + '<div class="icon-name">Cloud Referral<br>Program</div>');
    jQuery('#panel-delivery-models #store-icon .icons-in').html(getSvgIcon('store') + '<div class="icon-name">Cloud Store</div>');
    jQuery('#panel-delivery-models #oae-icon .icons-in').html(getSvgIcon('oae') + '<div class="icon-name">Odin Automation<br>Essentials</div>');
    jQuery('#panel-delivery-models #ensim-icon .icons-in').html(getSvgIcon('ensim') + '<div class="icon-name">Ensim Automation<br>Suite</div>');
    jQuery('#panel-delivery-models #oap-icon .icons-in').html(getSvgIcon('oap') + '<div class="icon-name">Odin Automation<br>Premium</div>');

    
    jQuery.ajax({
        url: ubermenu_data.ajax_url,
        beforeSend: function () {
            jQuery("#panel-promotions").html("<div class='text-center'><img src='/wp-content/themes/bandaid/inc/metaboxes/img/loader.gif'></div>");
        },
        data: {
            'action': 'adbutler_slick_slider'
        },
        dataType: 'html',
        success: function (data) {
            jQuery('#panel-promotions').html(data);
            renderPromotions();
        },
        error: function (errorThrown) {
            console.log(errorThrown);
        }
        
    });



    // Get All Categories and Solutions & Render Categories
    var currentLangJson;

    jQuery.ajax({
        url: '/wp-content/themes/bandaid/custom_functions/get_solutions_list.php',
        type: 'POST',
        success: function (result) {
            var marketplaceJson = JSON.parse(result);
            currentLangJson = marketplaceJson[language].DisplayCategories;
            renderCategories(currentLangJson);

            var options = {
                currentLangJson: currentLangJson,
                country: country,
                categoryName: 'business-applications',
                slidesToShow: slidesToShow_Home
            };

            jQuery('#business-applications').addClass('selected-category');
            jQuery('#panel-cloud-services #cta-section #see-all-button-container').html('<a href="/business-applications" id="see-all" class="btn btn-outline-white" role="button">See All<br />Business Applications</a>');
            renderCategorySolutions(options);
        },
        fail: function (err) {
            console.error(err);
        }
    });
    // /Get All Categories and Solutions & Render Categories

    // Initialize SlickJS
    jQuery('.testimonial-slider').slick({autoplay: true, autoplaySpeed: 25000});
    // /Initialize SlickJS

    // Cloud Services Panel
    jQuery('#category-list').on('click', '.category', function (evt) {

        var selectedCategoryName = evt.currentTarget.id;

        // If SlickJS is already initialized, uninitialize (because we're loading in new content and losing the previous initialization as a result)
        jQuery('#category-solutions.slick-initialized').slick("unslick");

        // Clear out HTML
        jQuery('#category-solutions, #category-description').html('');

        // Set background colors
        jQuery('.category').removeClass('selected-category');
        jQuery(evt.currentTarget).addClass('selected-category');

        // Set cateogry description and button text
        jQuery('#category-description').html('<p>' + getSelectedCategoryDescription(selectedCategoryName, 'short', null) + '</p>');

        jQuery('#panel-cloud-services #cta-section #see-all-button-container').html('<a href="/' + selectedCategoryName + '"><button id="see-all" class="btn btn-outline-white">See All<br />' + evt.currentTarget.innerText + '</button></a>');


        // Build out the HTML for the solutions within the selected category and append on page
        var options = {
            currentLangJson: currentLangJson,
            country: country,
            categoryName: selectedCategoryName,
            slidesToShow: slidesToShow_Home
        };

        renderCategorySolutions(options);

    });
    // /Cloud Services Panel

    // Delivery Models Panel
    jQuery('#panel-delivery-models #content #legend-top #saas').hover(function (evt) {
        jQuery('.saas').addClass('delivery-model-saas-active delivery-model-current');
        jQuery('.software-licensing').removeClass('delivery-model-software-licensing-active');
        jQuery('#blue-arrow').addClass('active');
        jQuery('#arrow-right, #arrow-right-text').removeClass('active');
    }, function (evt) {
        jQuery('.saas').removeClass('delivery-model-saas-active  delivery-model-current');
        jQuery('#blue-arrow').removeClass('active');
    });

    jQuery('#panel-delivery-models #content #legend-top #software-licensing').hover(function (evt) {
        jQuery('.software-licensing').addClass('delivery-model-software-licensing-active delivery-model-current');
        jQuery('.saas').removeClass('delivery-model-saas-active');
        jQuery('#orange-arrow').addClass('active');
        jQuery('#arrow-left, #arrow-left-text').removeClass('active');
    }, function (evt) {
        jQuery('.software-licensing').removeClass('delivery-model-software-licensing-active delivery-model-current');
        jQuery('#orange-arrow').removeClass('active');
    });

    jQuery('#panel-delivery-models #content #spectrum .platform.saas').hover(function (evt) {
        jQuery('#panel-delivery-models #content #spectrum .platform.saas').removeClass('delivery-model-saas-active');
        jQuery(this).addClass('delivery-model-saas-active delivery-model-current');
        jQuery('#blue-arrow').addClass('active');
        jQuery('#arrow-right, #arrow-right-text').removeClass('active');
    }, function (evt) {
        jQuery(this).removeClass('delivery-model-saas-active delivery-model-current');
        jQuery('#blue-arrow').removeClass('active');
    });

    jQuery('#panel-delivery-models #content #spectrum .platform.software-licensing').hover(function (evt) {
        jQuery(this).addClass('delivery-model-software-licensing-active delivery-model-current');
        jQuery('#orange-arrow').addClass('active');
        jQuery('#arrow-left, #arrow-left-text').removeClass('active');
    }, function (evt) {
        jQuery(this).removeClass('delivery-model-software-licensing-active delivery-model-current');
        jQuery('#orange-arrow').removeClass('active');
    });

    jQuery('#orange-arrow').hover(function (evt) {
        jQuery('#orange-arrow').addClass('active');
        jQuery('#arrow-left, #arrow-left-text').removeClass('active');
        jQuery('.software-licensing').addClass('delivery-model-software-licensing-active delivery-model-current');
    }, function (evt) {
        jQuery('#orange-arrow').removeClass('active');
        jQuery('.software-licensing').removeClass('delivery-model-software-licensing-active delivery-model-current');
    });

    jQuery('#arrow-right-text').hover(function (evt) {
        jQuery('#arrow-right, #arrow-right-text').addClass('active');
        jQuery('#arrow-left, #arrow-left-text').removeClass('active');
        jQuery('.software-licensing').addClass('delivery-model-software-licensing-active delivery-model-current');
    }, function (evt) {
        jQuery('#arrow-left, #arrow-left-text, #arrow-right, #arrow-right-text').removeClass('active');
        jQuery('.software-licensing').removeClass('delivery-model-software-licensing-active delivery-model-current');
    });

    jQuery('#blue-arrow').hover(function (evt) {
        jQuery('#blue-arrow').addClass('active');
        jQuery('#arrow-right, #arrow-right-text').removeClass('active');
        jQuery('.saas').addClass('delivery-model-saas-active delivery-model-current');
    }, function (evt) {
        jQuery('#blue-arrow').removeClass('active');
        jQuery('.saas').removeClass('delivery-model-saas-active delivery-model-current');
    });

    jQuery('#arrow-left-text').hover(function (evt) {
        jQuery('#arrow-left, #arrow-left-text').addClass('active');
        jQuery('#arrow-right, #arrow-right-text').removeClass('active');
        jQuery('.saas').addClass('delivery-model-saas-active delivery-model-current');
    }, function (evt) {
        jQuery('#arrow-left, #arrow-left-text, #arrow-right, #arrow-right-text').removeClass('active');
        jQuery('.saas').removeClass('delivery-model-saas-active delivery-model-current');
    });
    // /Delivery Models Panel

});
//become a reseller button scroll
jQuery(function () {
    jQuery("a.page-scroll").bind("click", function (event) {
        var $anchor = jQuery(this);
        jQuery("html, body").stop().animate({
            scrollTop: jQuery($anchor.attr("href")).offset().top
        }, 1500, "easeInOutExpo");
        event.preventDefault();
    });
});
