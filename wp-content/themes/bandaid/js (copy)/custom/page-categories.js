/* global $, themeDir, country, language, renderCategorySolutions, slidesToShow_CategoryPages, getSvgIcon, getSelectedCategoryDescription, getCurrentPageSlug */
(function ($) {
"use strict";
        $(window).load(function () {
$(document).ready(function () {
$('#icon').html(getSvgIcon(getCurrentPageSlug()));
        $('.category-page #category-description').html(getSelectedCategoryDescription(getCurrentPageSlug(), 'long', null));
        var currentLangJson;
        //console.log(country);
        //var country ='us';
        $.ajax({
        url: themeDir + '/custom_functions/get_solutions_list.php',
                type: 'POST',
                data: ({
                country:country
                }),
                success: function(result) {
                var marketplaceJson = JSON.parse(result);
                        currentLangJson = marketplaceJson[language].DisplayCategories;
                        //console.log(currentLangJson);
                        var options = {
                        		currentLangJson:currentLangJson,
                                country:country,
                                categoryName: getCurrentPageSlug(),
                                slidesToShow: slidesToShow_CategoryPages
                        };
                        renderCategorySolutions(options);
                        //$('<a id="cta" class="btn btn-outline-gray" href="https://' + country + '.cloud.im" target="_blank" role="button">Shop Cloud Marketplace</a>').hide().appendTo('#category-solutions').delay(100).fadeIn(250);
                        if (marketplaceJson[language].ExternalSites[0].Url !== '') {
                /*var markup = '<div id="header-text"> \
                 <h3><strong>Ingram Micro Catalog</strong></h3> \
                 <h4>Additional cloud services are currently available with manual provisioning can be purchased here.  Simply pick a solution and contact us to buy or request more information.</h4> \
                 <a href="http://us-cloud-new.ingrammicro.com/_layouts/CommerceServer/IM/search2.aspx#PNavDS=N:0&t=pTab" target="_blank"><button id="cta" class="btn btn-outline-gray">Browse Ingram Micro Catalog</button></a> \
                 </div>';*/
                var markup = '<div id="header-text"> \
                        <h2><strong>Ingram Micro Catalog</strong></h2> \
  				              <p>Search additional business applications through the Ingram Micro Catalog.  Cloud services currently available with manual provisioning can be purchased here. Simply pick a solution and contact us to buy or request more information.</p> \
  			                <a id="cta" class="btn btn-outline-gray" href="http://us-cloud-new.ingrammicro.com/_layouts/CommerceServer/IM/search2.aspx#PNavDS=N:0&t=pTab" target="_blank" role="button">Browse Ingram Micro Catalog</a> \
  			              </div>';
                        $(markup).hide().appendTo('#catalog-container').delay(250).fadeIn(250);
                        /* Markup for Communication & Collaboration */
                        var markup_cc = '<div id="header-text"> \
                        <h2><strong>Ingram Micro Catalog</strong></h2> \
  				              <p>Search additional cloud communication & collaboration software through the Ingram Micro Catalog. Cloud services currently available with manual provisioning can be purchased here. Simply pick a solution and contact us to buy or request more information.</p> \
  			                <a id="cta" class="btn btn-outline-gray" href="http://us-cloud-new.ingrammicro.com/_layouts/CommerceServer/IM/search2.aspx#PNavDS=N:0&t=pTab" target="_blank" role="button">Browse Ingram Micro Catalog</a> \
  			              </div>';
                        $(markup_cc).hide().appendTo('#catalog-container-cc').delay(250).fadeIn(250);
                        /* Markup for Security */
                        var markup_security = '<div id="header-text"> \
                        <h2><strong>Ingram Micro Catalog</strong></h2> \
  				              <p>Search additional cloud security software through the Ingram Micro Catalog.  Cloud services currently available with manual provisioning can be purchased here.  Simply pick a solution and contact us to buy or request more information.</p> \
  			                <a id="cta" class="btn btn-outline-gray" href="http://us-cloud-new.ingrammicro.com/_layouts/CommerceServer/IM/search2.aspx#PNavDS=N:0&t=pTab" target="_blank" role="button">Browse Ingram Micro Catalog</a> \
  			              </div>';
                        $(markup_security).hide().appendTo('#catalog-container-security').delay(250).fadeIn(250);
                        /* Markup for infrastructure */
                        var markup_infrastructure = '<div id="header-text"> \
                        <h2><strong>Ingram Micro Catalog</strong></h2> \
  				              <p>Search additional cloud infrastructure software through the Ingram Micro Catalog.  Cloud services currently available with manual provisioning can be purchased here.  Simply pick a solution and contact us to buy or request more information. </p> \
  			                <a id="cta" class="btn btn-outline-gray" href="http://us-cloud-new.ingrammicro.com/_layouts/CommerceServer/IM/search2.aspx#PNavDS=N:0&t=pTab" target="_blank" role="button">Browse Ingram Micro Catalog</a> \
  			              </div>';
                        $(markup_infrastructure).hide().appendTo('#catalog-container-infrastructure').delay(250).fadeIn(250);
                        /* Markup for vertical solutions */
                        var markup_vs = '<div id="header-text"> \
                        <h2><strong>Ingram Micro Catalog</strong></h2> \
  				              <p>Search additional vertical cloud software through the Ingram Micro Catalog.  Cloud services currently available with manual provisioning can be purchased here.  Simply pick a solution and contact us to buy or request more information.</p> \
  			                <a id="cta" class="btn btn-outline-gray" href="http://us-cloud-new.ingrammicro.com/_layouts/CommerceServer/IM/search2.aspx#PNavDS=N:0&t=pTab" target="_blank" role="button">Browse Ingram Micro Catalog</a> \
  			              </div>';
                        $(markup_vs).hide().appendTo('#catalog-container-vs').delay(250).fadeIn(250);
                        /* Markup for Cloud Management Services  */
                        var markup_cms = '<div id="header-text"> \
                        <h2><strong>Ingram Micro Catalog</strong></h2> \
  				              <p>Search additional cloud management software through the Ingram Micro Catalog.  Cloud services currently available with manual provisioning can be purchased here.  Simply pick a solution and contact us to buy or request more information.</p> \
  			                <a id="cta" class="btn btn-outline-gray" href="http://us-cloud-new.ingrammicro.com/_layouts/CommerceServer/IM/search2.aspx#PNavDS=N:0&t=pTab" target="_blank" role="button">Browse Ingram Micro Catalog</a> \
  			              </div>';
                        $(markup_cms).hide().appendTo('#catalog-container-cms').delay(250).fadeIn(250);
                }
                },
                fail: function(err) {
                console.error(err);
                }
        });
});
});
        })(jQuery);