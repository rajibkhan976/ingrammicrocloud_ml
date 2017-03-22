<?php get_header();
/*
 Template name: Solutions Categories (EN)
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

// Loop through all columns in the marketplace JSON (3 columns + legacy catalog links / contact details)
foreach ($object->$lang->DisplayCategories as $column) {
	
	// Loop through each category in each column
	foreach ($column as $category) {

		if (sanitize_title($category->CategoryName) == sanitize_title(get_the_title())) {
			$category_name = $category->CategoryName;
			$category_markup .= '<ul>';

			$category_solutions = $category->SubCategories;
        
        		foreach ($category_solutions as $solutions) {
            			$solutions_category_name = $solutions->CategoryName;
            			$solutions_url = $solutions->Url;
            
            			$category_markup .= '<li><a target="_blank" href="https://' . get_country_code() . '.cloud.im' . $solutions_url . '">' . $solutions_category_name . '</a></li>';
			}

			$category_markup .= '</ul>';
		}
	}
}

?>


<div class="container">
	<div class="row">
		<h1 class="h1-no-blue-line"><?php echo $category_name ?></h1>
		<br />
		<div><?php echo $category_markup ?></div>
	</div>
</div>

<?php get_footer(); ?>