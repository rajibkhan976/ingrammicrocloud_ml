/* global $, themeDir, country, language, renderCategorySolutions, slidesToShow_CategoryPages, getSvgIcon, getSelectedCategoryDescription, getCurrentPageSlug */

$(document).ready(function() {
  
  $('#icon').html(getSvgIcon(getCurrentPageSlug()));
  $('.category-page #category-description').text(getSelectedCategoryDescription(getCurrentPageSlug(), 'long', null));

  let currentLangJson;
  
  $.ajax({
    url: themeDir + '/custom_functions/get_solutions_list.php',
    type: 'POST',
    data: ({
      country
    }),
    success: function(result) {
      const marketplaceJson = JSON.parse(result);
      currentLangJson = marketplaceJson[language].DisplayCategories;

      let options = {
        currentLangJson,
        country,
        categoryName: getCurrentPageSlug(),
        slidesToShow: slidesToShow_CategoryPages
      };

      renderCategorySolutions(options);
      $('<a href="https://' + country + '.cloud.im" target="_blank"><button id="cta" class="btn btn-outline-gray">Shop Cloud Marketplace</button></a>').hide().appendTo('#category-solutions').delay(100).fadeIn(250);

      if (marketplaceJson[language].ExternalSites[0].Url !== '') {
        /*let markup = '<div id="header-text"> \
                        <h3><strong>Ingram Micro Catalog</strong></h3> \
  				              <h4>Additional cloud services are currently available with manual provisioning can be purchased here.  Simply pick a solution and contact us to buy or request more information.</h4> \
  			                <a href="http://us-cloud-new.ingrammicro.com/_layouts/CommerceServer/IM/search2.aspx#PNavDS=N:0&t=pTab" target="_blank"><button id="cta" class="btn btn-outline-gray">Browse Ingram Micro Catalog</button></a> \
  			              </div>';*/
  			let markup = '<div id="header-text"> \
                        <h3><strong>Ingram Micro Catalog</strong></h3> \
  				              <h4>Search additional business applications though the Ingram Micro Catalog.  Cloud services currently available with manual provisioning can be purchased here. Simply pick a solution and contact us to buy or request more information.</h4> \
  			                <a href="http://us-cloud-new.ingrammicro.com/_layouts/CommerceServer/IM/search2.aspx#PNavDS=N:0&t=pTab" target="_blank"><button id="cta" class="btn btn-outline-gray">Browse Ingram Micro Catalog</button></a> \
  			              </div>';
        $(markup).hide().appendTo('#catalog-container').delay(250).fadeIn(250);
        /* Markup for Communication & Collaboration */
        let markup_cc = '<div id="header-text"> \
                        <h3><strong>Ingram Micro Catalog</strong></h3> \
  				              <h4>Search additional cloud communication & collaboration software though the Ingram Micro Catalog. Cloud services currently available with manual provisioning can be purchased here. Simply pick a solution and contact us to buy or request more information.</h4> \
  			                <a href="http://us-cloud-new.ingrammicro.com/_layouts/CommerceServer/IM/search2.aspx#PNavDS=N:0&t=pTab" target="_blank"><button id="cta" class="btn btn-outline-gray">Browse Ingram Micro Catalog</button></a> \
  			              </div>';
        $(markup_cc).hide().appendTo('#catalog-container-cc').delay(250).fadeIn(250);
        /* Markup for Security */
        let markup_security = '<div id="header-text"> \
                        <h3><strong>Ingram Micro Catalog</strong></h3> \
  				              <h4>Search additional cloud security software though the Ingram Micro Catalog.  Cloud services currently available with manual provisioning can be purchased here.  Simply pick a solution and contact us to buy or request more information.</h4> \
  			                <a href="http://us-cloud-new.ingrammicro.com/_layouts/CommerceServer/IM/search2.aspx#PNavDS=N:0&t=pTab" target="_blank"><button id="cta" class="btn btn-outline-gray">Browse Ingram Micro Catalog</button></a> \
  			              </div>';
        $(markup_security).hide().appendTo('#catalog-container-security').delay(250).fadeIn(250);
        /* Markup for infrastructure */
        let markup_infrastructure = '<div id="header-text"> \
                        <h3><strong>Ingram Micro Catalog</strong></h3> \
  				              <h4>Search additional cloud infrastructure software though the Ingram Micro Catalog.  Cloud services currently available with manual provisioning can be purchased here.  Simply pick a solution and contact us to buy or request more information. </h4> \
  			                <a href="http://us-cloud-new.ingrammicro.com/_layouts/CommerceServer/IM/search2.aspx#PNavDS=N:0&t=pTab" target="_blank"><button id="cta" class="btn btn-outline-gray">Browse Ingram Micro Catalog</button></a> \
  			              </div>';
        $(markup_infrastructure).hide().appendTo('#catalog-container-infrastructure').delay(250).fadeIn(250);
        /* Markup for vertical solutions */
        let markup_vs = '<div id="header-text"> \
                        <h3><strong>Ingram Micro Catalog</strong></h3> \
  				              <h4>Search additional vertical cloud software though the Ingram Micro Catalog.  Cloud services currently available with manual provisioning can be purchased here.  Simply pick a solution and contact us to buy or request more information.</h4> \
  			                <a href="http://us-cloud-new.ingrammicro.com/_layouts/CommerceServer/IM/search2.aspx#PNavDS=N:0&t=pTab" target="_blank"><button id="cta" class="btn btn-outline-gray">Browse Ingram Micro Catalog</button></a> \
  			              </div>';
        $(markup_vs).hide().appendTo('#catalog-container-vs').delay(250).fadeIn(250);
        /* Markup for Cloud Management Services  */
        let markup_cms = '<div id="header-text"> \
                        <h3><strong>Ingram Micro Catalog</strong></h3> \
  				              <h4>Search additional cloud management software though the Ingram Micro Catalog.  Cloud services currently available with manual provisioning can be purchased here.  Simply pick a solution and contact us to buy or request more information.</h4> \
  			                <a href="http://us-cloud-new.ingrammicro.com/_layouts/CommerceServer/IM/search2.aspx#PNavDS=N:0&t=pTab" target="_blank"><button id="cta" class="btn btn-outline-gray">Browse Ingram Micro Catalog</button></a> \
  			              </div>';
        $(markup_cms).hide().appendTo('#catalog-container-cms').delay(250).fadeIn(250);
        
      }
    },
    fail: function(err) {
      console.error(err);
    }
  });
});