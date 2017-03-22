<?php get_header();
/*
 Template name: Solutions (EN)
 */
?>
<?php
get_template_part('navigation');
?>

<?php

require_once(dirname(__FILE__).'/custom_functions/get_country_code.php');

// Initialize API URL and site language
$api_url = 'https://' . get_country_code() . '.cloud.im/api/megamenu/getmegamenuforalllang/';
$lang = ICL_LANGUAGE_CODE;

// Grab list of categories and services from correct country marketplace
$json_contents = (ini_get('allow_url_fopen') || !strstr($lang,'http')) ? strip_tags((string)file_get_contents($api_url)) : strip_tags((string)$this->file_get_contents($api_url));
$json_clean = json_decode($json_contents);
$object = json_decode($json_clean);

$category_names_list = '<ul class="bullet-points">';

// Loop through all columns in the marketplace JSON (3 columns + legacy catalog links / contact details)
foreach ($object->$lang->DisplayCategories as $column) {

	
	// Loop through each category in each column
	foreach ($column as $category) {

			$category_name = $category->CategoryName;
			$category_names_list .= '<li id="' . sanitize_title($category_name) . '-title">' . $category_name . '</li>';

			$category_markup .= '<div id="' . sanitize_title($category_name) . '" class="hidden">';
			$category_markup .= '<h1 class="h1-no-blue-line">' . $category_name . '</h1>';
			$category_markup .= '<ul>';

			$category_solutions = $category->SubCategories;
        
        		foreach ($category_solutions as $solutions) {
            			$solutions_category_name = $solutions->CategoryName;
            			$solutions_url = $solutions->Url;
            
            			$category_markup .= '<li><a target="_blank" href="https://' . get_country_code() . '.cloud.im' . $solutions_url . '">' . $solutions_category_name . '</a></li>';
			}

			$category_markup .= '</ul></div>';
	}
}

$category_names_list .= '</ul>';

?>


<div class="container">
	<div class="row">
		<?php echo $category_names_list ?>
	</div>
	<div class="row categories">
		<?php echo $category_markup ?>
	</div>
</div>

<script type="text/javascript" src="/wp-content/themes/viral/js/solutions-page.js"></script>

<?php get_footer(); ?>