/* global $, renderCategorySolutions, country, language, themeDir, sanitize, getSelectedCategoryDescription, slidesToShow_Home, getSvgIcon */

function renderPromotions() {
  let markup = '';
  
  for (var i = 1; i < 6; i++) {
    markup += '<div class="adplugg-tag" data-adplugg-zone="' + country + '_home_p' + i + '_' + language + '_' + country + '"></div>'; }

  $('#panel-promotions').html(markup);

  $('#panel-promotions').slick({
    autoplay: true,
    autoplaySpeed: 3500,
    centerMode: true,
    centerPadding: '0px',
    slidesToShow: 3,
    dots: true,
    customPaging: function(slider, i) {
      return '<a><div class="adplugg-tag" data-adplugg-zone="' + country + '_home_p' + (i + 1) + '_' + language + '_' + country + '"></div></a>';
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
}

function renderCategories(currentLangJson) {
  let markup = '';

  currentLangJson.forEach(function(column) {
    column.forEach(function(category) {

      let icon = getSvgIcon(sanitize(category.CategoryName));

      markup += '<div id="' + sanitize(category.CategoryName) + '" class="category"> \
              	  <div class="icon">' + icon + '</div> \
              		<div class="name">' + category.CategoryName + '</div> \
              	</div>';
    });
  });

  $('#category-list').html(markup);
}


$(document).ready(function() {
  
  $('#panel-delivery-models #marketplace-icon').html(getSvgIcon('marketplace') + '<div class="icon-name">Cloud<br>Marketplace</div>');
  $('#panel-delivery-models #referral-icon').html(getSvgIcon('referral') + '<div class="icon-name">Referral<br>Programm</div>');
  $('#panel-delivery-models #store-icon').html(getSvgIcon('store') + '<div class="icon-name">Cloud Store</div>');
  $('#panel-delivery-models #oae-icon').html(getSvgIcon('oae') + '<div class="icon-name">Odin Automation<br>Essentials</div>');
  $('#panel-delivery-models #ensim-icon').html(getSvgIcon('ensim') + '<div class="icon-name">Ensim</div>');
  $('#panel-delivery-models #oap-icon').html(getSvgIcon('oap') + '<div class="icon-name">Odin Automation<br>Premium</div>');
  renderPromotions();

  // Get All Categories and Solutions & Render Categories
  let currentLangJson;

  $.ajax({
    url: '/wp-content/themes/bandaid/custom_functions/get_solutions_list.php',
    type: 'POST',
    // data: ({
    //   country
    // }),
    success: function(result) {
      const marketplaceJson = JSON.parse(result);
      currentLangJson = marketplaceJson[language].DisplayCategories;
      renderCategories(currentLangJson);

      let options = {
        currentLangJson,
        country,
        categoryName: 'business-applications',
        slidesToShow: slidesToShow_Home
      };

      $('#business-applications').addClass('selected-category');
      $('#panel-cloud-services #cta-section #see-all-button-container').html('<a href="/business-applications"><button id="see-all" class="btn btn-outline-white">See All<br />Business Applications</button></a>');
      renderCategorySolutions(options);
    },
    fail: function(err) {
      console.error(err);
    }
  });
  // /Get All Categories and Solutions & Render Categories

  // Initialize SlickJS
  $('.testimonial-slider').slick();
  // /Initialize SlickJS

  // Cloud Services Panel
  $('#category-list').on('click', '.category', function(evt) {

    const selectedCategoryName = evt.currentTarget.id;

    // If SlickJS is already initialized, uninitialize (because we're loading in new content and losing the previous initialization as a result)
    $('#category-solutions.slick-initialized').slick("unslick");

    // Clear out HTML
    $('#category-solutions, #category-description').html('');

    // Set background colors
    $('.category').removeClass('selected-category');
    $(evt.currentTarget).addClass('selected-category');

    // Set cateogry description and button text
    $('#category-description').html('<p>' + getSelectedCategoryDescription(selectedCategoryName, 'short', null) + '</p>');

    $('#panel-cloud-services #cta-section #see-all-button-container').html('<a href="/' + selectedCategoryName + '"><button id="see-all" class="btn btn-outline-white">See All<br />' + evt.currentTarget.innerText + '</button></a>');


    // Build out the HTML for the solutions within the selected category and append on page
    let options = {
      currentLangJson,
      country,
      categoryName: selectedCategoryName,
      slidesToShow: slidesToShow_Home
    };

    renderCategorySolutions(options);

  });
  // /Cloud Services Panel

  // Delivery Models Panel
  $('#panel-delivery-models #content #legend-top #saas').hover(function(evt) {
    $('.saas').addClass('delivery-model-saas-active');
    $('.software-licensing').removeClass('delivery-model-software-licensing-active');
    $('#arrow-left, #arrow-left-text').addClass('active');
    $('#arrow-right, #arrow-right-text').removeClass('active');
  }, function(evt) {
    $('.saas').removeClass('delivery-model-saas-active');
    $('#arrow-left, #arrow-left-text, #arrow-right, #arrow-right-text').removeClass('active');
  });
  
  $('#panel-delivery-models #content #legend-top #software-licensing').hover(function(evt) {
    $('.software-licensing').addClass('delivery-model-software-licensing-active');
    $('.saas').removeClass('delivery-model-saas-active');
    $('#arrow-right, #arrow-right-text').addClass('active');
    $('#arrow-left, #arrow-left-text').removeClass('active');
  }, function(evt) {
    $('.software-licensing').removeClass('delivery-model-software-licensing-active');
    $('#arrow-left, #arrow-left-text, #arrow-right, #arrow-right-text').removeClass('active');
  });
  
  $('#panel-delivery-models #content #spectrum .platform.saas').hover(function(evt) {
    $('#panel-delivery-models #content #spectrum .platform.saas').removeClass('delivery-model-saas-active');
    $(this).addClass('delivery-model-saas-active delivery-model-current');
    $('#arrow-left, #arrow-left-text').addClass('active');
    $('#arrow-right, #arrow-right-text').removeClass('active');
  }, function(evt) {
    $(this).removeClass('delivery-model-saas-active delivery-model-current');
    $('#arrow-left, #arrow-left-text, #arrow-right, #arrow-right-text').removeClass('active');
  });
  
  $('#panel-delivery-models #content #spectrum .platform.software-licensing').hover(function(evt) {
    $(this).addClass('delivery-model-software-licensing-active delivery-model-current');
    $('#arrow-right, #arrow-right-text').addClass('active');
    $('#arrow-left, #arrow-left-text').removeClass('active');
  }, function(evt) {
    $(this).removeClass('delivery-model-software-licensing-active delivery-model-current');
    $('#arrow-left, #arrow-left-text, #arrow-right, #arrow-right-text').removeClass('active');
  });
  // /Delivery Models Panel

});