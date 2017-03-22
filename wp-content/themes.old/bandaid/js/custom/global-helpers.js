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
  
  let categoryMarkup = '';
  
  currentLangJson.forEach(function(column) {
    column.forEach(function(category) {
      if (sanitize(category.CategoryName) == categoryName) {
        categoryMarkup = generateSolutionMarkup(category);
      }
    });
  });
  
  return categoryMarkup;
  
}

function renderCategorySolutions(options) {
  let markup = getCategoryJson(options.currentLangJson, options.categoryName);
  
  $('#category-solutions').html('');
  $(markup).hide().appendTo('#category-solutions').fadeIn(350);

  // Reinitialize SlickJS
  $('#category-solutions').slick({
    infinite: false,
    slidesToShow: options.slidesToShow,
    slidesToScroll: 1,
    responsive: [{
      breakpoint: 768,
      settings: {
        arrows: false,
        centerPadding: '40px',
        slidesToShow: 3
      }
    }, {
      breakpoint: 480,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 1
      }
    }]
  });

}

function generateSolutionMarkup(categoryJson) {
        let markup = '';

        categoryJson.SubCategories.forEach(function(solution, i) {

          const _options = {
            vendorName: solution.CategoryName.split(/ - (.+)?/)[0],
            sanitizedVendorName: sanitize(solution.CategoryName.split(/ - (.+)?/)[0]),
            solutionName: solution.CategoryName.split(/ - (.+)?/)[1],
            country,
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
                    <div class="title">' + _options.solutionName + '</div> \
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