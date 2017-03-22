<?php
/**
 * @package SharedVue Syndication
 * @author SharedVue Marketing Technologies
 * @version 1.3.0
 */
/*
Plugin Name: SharedVue Syndication
Plugin URI: http://www.sharedvue.com/
Description: This plugin allows you to add one or more SharedVue content syndication feeds to a WordPress website.
Author: SharedVue Marketing Technologies
Version: 1.3.0
Author URI: http://www.sharedvue.com/
*/

function insertSyndicationContent($content) {

$matches = array();

preg_match("({{ \w* }})", $content, $matches);

$SVQuerystring = "";
foreach (($_GET) as $SVGetKey => $SVGetValue) {
  $SVQuerystring = $SVQuerystring.$SVGetKey."=".$SVGetValue."&";
}

for ($x=0;$x<=(count($matches)-1);$x++) {
	$poolName = strtolower(trim(trim($matches[$x]," }}"),"{{ "));

	$SVURL = "http://$poolName.sharedvue.net/sharedvue/pull/";
	$SVURL = $SVURL . "?svhost=" . $_SERVER["HTTP_HOST"];
	
	if (!empty($_SERVER["PHP_SELF"])) {
		if ((isset($_SERVER['REDIRECT_URL'])) && (strpos($_SERVER['REDIRECT_URL'], $_SERVER['PHP_SELF']) === FALSE)) $SVURL = $SVURL . $_SERVER['REDIRECT_URL'];
		else $SVURL = $SVURL . $_SERVER['PHP_SELF'];
	}
	
	else if (!empty($_SERVER['SCRIPT_NAME'])) {
		if ((isset($_SERVER['REDIRECT_URL'])) && (strpos($_SERVER['REDIRECT_URL'], $_SERVER['SCRIPT_NAME']) === FALSE)) $SVURL = $SVURL . $_SERVER['REDIRECT_URL'];
		else $SVURL = $SVURL . $_SERVER['SCRIPT_NAME'];
	}

	if (strlen($SVQuerystring) > 0) {
		$SVURL = $SVURL . "?" . urlencode($SVQuerystring);
	}
  
  if (function_exists('curl_init')) {
  	$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_URL, $SVURL);
		$SVContent = curl_exec($ch);
		curl_close($ch);
	}
	
	else $SVContent = file_get_contents($SVURL);
  
	$content = str_replace($matches[$x], $SVContent, $content);
}

return $content;

}

add_Filter( "the_content", "insertSyndicationContent" );
?>