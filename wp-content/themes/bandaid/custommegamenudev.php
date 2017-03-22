<?php

$settings = get_option(UBERMENU_PREFIX.main);
$blog_url = get_bloginfo('url');
$url = parse_url($blog_url);
$url_paths = explode(".", $blog_url);

switch ($_SERVER['SERVER_NAME']){
    case 'ingrammicrocloud.com.bg':
    case 'imc.com.bg': 
    case 'ingrammicrocloud.ml': $settings['ingram_json_content'] = 'https://us.cloud.im/api/megamenu/getmegamenuforalllang/'; break;        
}

$country_code = explode(".", $settings['ingram_json_content'])[0]; // https://xx
$lang = ICL_LANGUAGE_CODE;

if ($country_code == "https://be" || $country_code == "https://nl") {
	$lang = "en";
}

$json_contents = (ini_get('allow_url_fopen') || !strstr($lang,'http')) ? strip_tags((string)file_get_contents($settings['ingram_json_content'])) : strip_tags((string)$this->file_get_contents($settings['ingram_json_content']));
$json_clean = json_decode($json_contents);
$object = json_decode($json_clean);

$col0 = $object->$lang->DisplayCategories[0];
$col1 = $object->$lang->DisplayCategories[1];
$col2 = $object->$lang->DisplayCategories[2];
$rightcol = $object->$lang->ExternalSites;
$header1_temp = $object->$lang->ExtraInfo->Header1;
$header2 = $object->$lang->ExtraInfo->Header2;
$caption_temp = $object->$lang->ExtraInfo->Caption;
$header1 = $header1_temp . '<span>' . $caption_temp . '</span>';


    $col0_structure_menu .= '';
    foreach ($col0 as $c0) {
        $category_name = $c0->CategoryName;
        
        $col0_structure_menu .= '<li id="category" class="ubermenu-item ubermenu-item-type-custom ubermenu-item-object-ubermenu-custom ubermenu-item-has-children ubermenu-item-auto ubermenu-item-normal ubermenu-item-level-7 ubermenu-column ubermenu-column-auto ubermenu-has-submenu-stack">';
        $col0_structure_menu .= '<div class="ubermenu-content-block ubermenu-custom-content ubermenu-custom-content-padded"><h6>' . $category_name . '</h6></div>';
        $col0_structure_menu .= '<ul id="categoryContainer" class="ubermenu-submenu ubermenu-submenu-type-auto ubermenu-submenu-type-stack">';
        
        
        //These need to be looped through
        $category_subs = $c0->SubCategories;
        
        foreach ($category_subs as $csubs) {
            $csubs_category_name = $csubs->CategoryName;
            $csubs_url           = $csubs->Url;
            
            $col0_structure_menu .= '<li class="ubermenu-item ubermenu-item-type-custom ubermenu-item-object-custom ubermenu-item-auto ubermenu-item-normal ubermenu-item-level-9 ubermenu-column ubermenu-column-auto"><a class="ubermenu-target ubermenu-item-layout-default ubermenu-item-layout-text_only" href="' . $country_code . '.cloud.im' . $csubs_url . '"><span class="ubermenu-target-title ubermenu-target-text">' . $csubs_category_name . '</span></a></li>';
            
        }
        
        
        //Keep this one!!
        $col0_structure_menu .= '</ul></li>';
    }
    
    
    $col1_structure_menu .= '';
    foreach ($col1 as $c1) {
        $category_name = $c1->CategoryName;
        
        $col1_structure_menu .= '<ul class="ubermenu-submenu ubermenu-submenu-type-stack">';
        $col1_structure_menu .= '<li id="category" class="ubermenu-item ubermenu-item-type-custom ubermenu-item-object-ubermenu-custom ubermenu-item-has-children ubermenu-item-auto ubermenu-item-normal ubermenu-item-level-7 ubermenu-column ubermenu-column-auto ubermenu-has-submenu-stack">';
        $col1_structure_menu .= '<div class="ubermenu-content-block ubermenu-custom-content ubermenu-custom-content-padded"><h6>' . $category_name . '</h6></div>';
        $col1_structure_menu .= '<ul id="categoryContainer" class="ubermenu-submenu ubermenu-submenu-type-auto ubermenu-submenu-type-stack">';
        
        
        //These need to be looped through
        $category_subs = $c1->SubCategories;
        
        foreach ($category_subs as $csubs) {
            $csubs_category_name = $csubs->CategoryName;
            $csubs_url           = $csubs->Url;
            
            $col1_structure_menu .= '<li class="ubermenu-item ubermenu-item-type-custom ubermenu-item-object-custom ubermenu-item-auto ubermenu-item-normal ubermenu-item-level-9 ubermenu-column ubermenu-column-auto"><a class="ubermenu-target ubermenu-item-layout-default ubermenu-item-layout-text_only" href="' . $country_code . '.cloud.im' . $csubs_url . '"><span class="ubermenu-target-title ubermenu-target-text">' . $csubs_category_name . '</span></a></li>';
            
        }
        
        
        //Keep this one!!
        $col1_structure_menu .= '</ul></li></ul>';
    }
    
    
    $col2_structure_menu .= '';
    foreach ($col2 as $c2) {
        $category_name = $c2->CategoryName;
        
        $col2_structure_menu .= '<ul class="ubermenu-submenu ubermenu-submenu-type-stack">';
        $col2_structure_menu .= '<li id="category" class="ubermenu-item ubermenu-item-type-custom ubermenu-item-object-ubermenu-custom ubermenu-item-has-children ubermenu-item-auto ubermenu-item-normal ubermenu-item-level-7 ubermenu-column ubermenu-column-auto ubermenu-has-submenu-stack">';
        $col2_structure_menu .= '<div class="ubermenu-content-block ubermenu-custom-content ubermenu-custom-content-padded"><h6>' . $category_name . '</h6></div>';
        $col2_structure_menu .= '<ul id="categoryContainer" class="ubermenu-submenu ubermenu-submenu-type-auto ubermenu-submenu-type-stack">';
        
        
        //These need to be looped through
        $category_subs = $c2->SubCategories;
        
        foreach ($category_subs as $csubs) {
            $csubs_category_name = $csubs->CategoryName;
            $csubs_url           = $csubs->Url;
            
            $col2_structure_menu .= '<li class="ubermenu-item ubermenu-item-type-custom ubermenu-item-object-custom ubermenu-item-auto ubermenu-item-normal ubermenu-item-level-9 ubermenu-column ubermenu-column-auto"><a class="ubermenu-target ubermenu-item-layout-default ubermenu-item-layout-text_only" href="' . $country_code . '.cloud.im' . $csubs_url . '"><span class="ubermenu-target-title ubermenu-target-text">' . $csubs_category_name . '</span></a></li>';
            
        }
        
        
        //Keep this one!!
        $col2_structure_menu .= '</ul></li></ul>';
    }
    
//

    $col0_structure_page .= '';
    foreach ($col0 as $c0) {
        $category_name = $c0->CategoryName;
        
        $col0_structure_page .= '<li id="category" class="ubermenu-item ubermenu-item-type-custom ubermenu-item-object-ubermenu-custom ubermenu-item-has-children ubermenu-item-auto ubermenu-item-normal ubermenu-item-level-7 ubermenu-column ubermenu-column-auto ubermenu-has-submenu-stack" style="list-style: none;">';
        $col0_structure_page .= '<div class="ubermenu-content-block ubermenu-custom-content ubermenu-custom-content-padded"><h6 style="font-weight: bold; font-size: 15px; margin-top: 10px; color: #131313;">' . $category_name . '</h6></div>';
        $col0_structure_page .= '<ul id="categoryContainer" class="ubermenu-submenu ubermenu-submenu-type-auto ubermenu-submenu-type-stack">';
        
        
        //These need to be looped through
        $category_subs = $c0->SubCategories;
        
        foreach ($category_subs as $csubs) {
            $csubs_category_name = $csubs->CategoryName;
            $csubs_url           = $csubs->Url;
            
            $col0_structure_page .= '<li class="ubermenu-item ubermenu-item-type-custom ubermenu-item-object-custom ubermenu-item-auto ubermenu-item-normal ubermenu-item-level-9 ubermenu-column ubermenu-column-auto"><a class="ubermenu-target ubermenu-item-layout-default ubermenu-item-layout-text_only" href="' . $country_code . '.cloud.im' . $csubs_url . '"><span class="ubermenu-target-title ubermenu-target-text" style="font-size: 15px; color: #131313;">' . $csubs_category_name . '</span></a></li>';
            
        }
        
        
        //Keep this one!!
        $col0_structure_page .= '</ul></li>';
    }

    $col1_structure_page .= '';
    foreach ($col1 as $c0) {
        $category_name = $c0->CategoryName;
        
        $col1_structure_page .= '<li id="category" class="ubermenu-item ubermenu-item-type-custom ubermenu-item-object-ubermenu-custom ubermenu-item-has-children ubermenu-item-auto ubermenu-item-normal ubermenu-item-level-7 ubermenu-column ubermenu-column-auto ubermenu-has-submenu-stack" style="list-style: none;">';
        $col1_structure_page .= '<div class="ubermenu-content-block ubermenu-custom-content ubermenu-custom-content-padded"><h6 style="font-weight: bold; font-size: 15px; margin-top: 10px; color: #131313;">' . $category_name . '</h6></div>';
        $col1_structure_page .= '<ul id="categoryContainer" class="ubermenu-submenu ubermenu-submenu-type-auto ubermenu-submenu-type-stack">';
        
        
        //These need to be looped through
        $category_subs = $c0->SubCategories;
        
        foreach ($category_subs as $csubs) {
            $csubs_category_name = $csubs->CategoryName;
            $csubs_url           = $csubs->Url;
            
            $col1_structure_page .= '<li class="ubermenu-item ubermenu-item-type-custom ubermenu-item-object-custom ubermenu-item-auto ubermenu-item-normal ubermenu-item-level-9 ubermenu-column ubermenu-column-auto"><a class="ubermenu-target ubermenu-item-layout-default ubermenu-item-layout-text_only" href="' . $country_code . '.cloud.im' . $csubs_url . '"><span class="ubermenu-target-title ubermenu-target-text" style="font-size: 15px; color: #131313;">' . $csubs_category_name . '</span></a></li>';
            
        }
        
        
        //Keep this one!!
        $col1_structure_page .= '</ul></li>';
    }

    $col2_structure_page .= '';
    foreach ($col2 as $c0) {
        $category_name = $c0->CategoryName;
        
        $col2_structure_page .= '<li id="category" class="ubermenu-item ubermenu-item-type-custom ubermenu-item-object-ubermenu-custom ubermenu-item-has-children ubermenu-item-auto ubermenu-item-normal ubermenu-item-level-7 ubermenu-column ubermenu-column-auto ubermenu-has-submenu-stack" style="list-style: none;">';
        $col2_structure_page .= '<div class="ubermenu-content-block ubermenu-custom-content ubermenu-custom-content-padded"><h6 style="font-weight: bold; font-size: 15px; margin-top: 10px; color: #131313;">' . $category_name . '</h6></div>';
        $col2_structure_page .= '<ul id="categoryContainer" class="ubermenu-submenu ubermenu-submenu-type-auto ubermenu-submenu-type-stack">';
        
        
        //These need to be looped through
        $category_subs = $c0->SubCategories;
        
        foreach ($category_subs as $csubs) {
            $csubs_category_name = $csubs->CategoryName;
            $csubs_url           = $csubs->Url;
            
            $col2_structure_page .= '<li class="ubermenu-item ubermenu-item-type-custom ubermenu-item-object-custom ubermenu-item-auto ubermenu-item-normal ubermenu-item-level-9 ubermenu-column ubermenu-column-auto"><a class="ubermenu-target ubermenu-item-layout-default ubermenu-item-layout-text_only" href="' . $country_code . '.cloud.im' . $csubs_url . '"><span class="ubermenu-target-title ubermenu-target-text" style="font-size: 15px; color: #131313;">' . $csubs_category_name . '</span></a></li>';
            
        }
        
        
        //Keep this one!!
        $col2_structure_page .= '</ul></li>';
    }

//


    $rightcol_structure .= '';
    foreach ($rightcol as $rcol) {
        $category_name = $rcol->Title;
        $category_url  = $rcol->Url;
        $rightcol_structure .= '<li class="ubermenu-item ubermenu-item-type-custom ubermenu-item-object-custom ubermenu-item-auto ubermenu-item-normal ubermenu-item-level-7 ubermenu-column ubermenu-column-auto">';
        
        if ($category_url == '') {
            $rightcol_structure .= '<div class="ubermenu-target ubermenu-item-layout-default ubermenu-item-layout-text_only" style="font-family: \'Open Sans\' sans-serif; font-size: 13px; font-weight: 300; white-space: normal; color: #333;">';
        } else {
            $rightcol_structure .= '<a class="ubermenu-target ubermenu-item-layout-default ubermenu-item-layout-text_only" href="' . $category_url . '" target="_blank">';
        }
        
        $rightcol_structure .= '<span class="ubermenu-target-title ubermenu-target-text">' . $category_name . '</span>';
        
        if ($category_url == '') {
            $rightcol_structure .= '</div>';
        } else {
            $rightcol_structure .= '</a>';
        }
        $rightcol_structure .= '</li>';
    }

echo '<div id="col0_structure_menu" style="display: none;">' . $col0_structure_menu . '</div>';
echo '<div id="col1_structure_menu" style="display: none;">' . $col1_structure_menu . '</div>';
echo '<div id="col2_structure_menu" style="display: none;">' . $col2_structure_menu . '</div>';

echo '<div id="col0_structure_page" style="display: none;">' . $col0_structure_page . '</div>';
echo '<div id="col1_structure_page" style="display: none;">' . $col1_structure_page . '</div>';
echo '<div id="col2_structure_page" style="display: none;">' . $col2_structure_page . '</div>';

echo '<div id="rightcol_structure" style="display: none;">' . $rightcol_structure . '</div>';
echo '<div id="header1" style="display: none;">' . $header1 . '</div>';
echo '<div id="header2" style="display: none;">' . $header2 . '</div>';

?>