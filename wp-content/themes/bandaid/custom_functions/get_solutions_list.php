<?php

require_once('get_country_code.php');

$api_url = 'https://us.cloud.im/api/megamenu/getmegamenuforalllang/';

// Grab list of categories and services from correct country marketplace
//$json_contents = (ini_get('allow_url_fopen') || !strstr($lang,'http')) ? strip_tags((string)file_get_contents($api_url)) : strip_tags((string)$this->file_get_contents($api_url));
//echo json_decode($json_contents);

//  Initiate curl
$ch = curl_init();
// Disable SSL verification
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// Will return the response, if false it print the response
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Set the url
curl_setopt($ch, CURLOPT_URL,$api_url);
// Execute
$result=curl_exec($ch);
// Closing
curl_close($ch);

// Will dump a beauty json :3
echo json_decode(strip_tags((string)$result), true);

?>