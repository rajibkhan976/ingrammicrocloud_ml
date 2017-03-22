<?php

function get_country_code() {
	$url_paths = explode(".", get_bloginfo('url'));
	$end_of_url = end($url_paths);

	$country_code = explode("/", $end_of_url)[0];


	if ($country_code == 'com') {
		$country_code = 'us';
	}

	return $country_code;
}

?>