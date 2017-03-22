<?php

function global_ad_placement($country_code) {

  $language = str_replace('-', '_', ICL_LANGUAGE_CODE);

  echo '<style>
          .adplugg-container {
            background-color: #00AEEF;
          }

          .adplugg-container .left-column {
            text-align: center;
            background-color: #0080AF;
            height: 119px;
          }

          .adplugg-container .left-column h5 {
            margin-top: 40px;
            font-size: 26px;
            font-family: "Gotham SSm A","Gotham SSm B","Open Sans", sans-serif;
            color: #fff;
            font-weight: 300;
          }

          .adplugg-container .right-column div {
            padding: 4px 0;
          }

          #vc-adplugg-row>.vc_column_container {
            max-width: none !important;
          }

          #vc-adplugg-row>.vc_column_container>.vc_column-inner {
            padding-left: 0 !important;
            padding-right: 0 !important;
          }

          #vc-adplugg-row>.vc_column_container>.vc_column-inner>.wpb_wrapper>.wpb_content_element {
            margin-bottom: 0px !important;
          }
        </style>';

  echo '<div class="adplugg-container">
          <div class="container">
            <div class="col-xs-12 col-sm-3 col-md-4 col-lg-3 left-column">
              <h5>Solution Spotlight</h5>
            </div>
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7 right-column">
              <div class="adplugg-tag" data-adplugg-zone="solution_spotlight_' . $language . '_' . $country_code . '"></div>
            </div>
          </div>
        </div>';

}

?>