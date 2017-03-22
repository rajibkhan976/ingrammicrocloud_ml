<?php

require_once('get_country_code.php');

$api_url = 'https://' . get_country_code() . '.cloud.im/api/megamenu/getmegamenuforalllang/';

// Grab list of categories and services from correct country marketplace
$json_contents = (ini_get('allow_url_fopen') || !strstr($lang,'http')) ? strip_tags((string)file_get_contents($api_url)) : strip_tags((string)$this->file_get_contents($api_url));
echo json_decode($json_contents);

?>