<?php

function wr_update_params($hook) {
	if( 'toplevel_page_check_older_browser' != $hook ) return;
	$ver = '';
	$ver = get_option('wob_version');
	$in_ver = warning_old_browser::wr_version();
	if (!empty($ver)) {
		if ($ver < $in_ver) {
			update_option('wob_defaults', warning_old_browser::wr_get_defaults());
			update_option('wob_version',  warning_old_browser::wr_version());
		}
	}
}
add_action( 'admin_enqueue_scripts', 'wr_update_params', 99 );

function wr_parse_array_from_sql($arr_in = array()) {
	$arr = array();
	if (!empty($arr_in)) {
		foreach($arr_in as $val) {
			$arr[] = array( 'value' => $val, 'label' => $val);
		}
	}	
	return $arr;
}

function ie_list() {
	$ie_options = array();
	$data	= (array) get_option( 'wob_defaults' );
	$ie_options = wr_parse_array_from_sql($data['ie']['ie_ver']);
	
	return apply_filters( 'ie_list', $ie_options);
}

function ff_list() {
	$ff_options = array();
	$data	= (array) get_option( 'wob_defaults' );
	$ff_options = wr_parse_array_from_sql($data['ff']['ff_ver']);
	
	return apply_filters( 'ff_list', $ff_options);
}

function ch_list() {
	$ch_options = array();
	$data	= (array) get_option( 'wob_defaults' );
	$ch_options = wr_parse_array_from_sql($data['ch']['ch_ver']);
	
	return apply_filters( 'ch_list', $ch_options);
}

function sfr_list() {
	$sfr_options = array();
	$data	= (array) get_option( 'wob_defaults' );
	$sfr_options = wr_parse_array_from_sql($data['sfr']['sfr_ver']);
	
	return apply_filters( 'sfr_list', $sfr_options);
}
	
function opr_list() {
	$opr_options = array();
	$data	= (array) get_option( 'wob_defaults' );
	$opr_options = wr_parse_array_from_sql($data['opr']['opr_ver']);
	
	return apply_filters( 'opr_list', $opr_options);
}

function easing_list() {
	$easing_options = array(
		'0' => array( 'value' => 'Fade', 'label' => __( 'Fade', 'br_war_plugin' )),
		'1' => array( 'value' => 'SlideToggle',	'label' => __( 'SlideToggle', 'br_war_plugin' ))
	);

	return apply_filters( 'easing_list', $easing_options);
}

function panel_list() {
	$easing_options = array(
		'0' => array( 'value' => '0', 'label' => __( 'Top panel', 'br_war_plugin' )),
		'1' => array( 'value' => '1', 'label' => __( 'Modal Window', 'br_war_plugin' ))
	);

	return apply_filters( 'easing_list', $easing_options);
}

if ( ! function_exists( 'wr_get_current_browser' ) ) {		
	function wr_get_current_browser()	{
		$agent 		= $_SERVER['HTTP_USER_AGENT'];
		$bname   	= 'Unknown';
		$platform 	= 'Unknown';
		$version	= "";

		if (preg_match('/linux/i', $agent)) {
			$platform = 'linux';
		}
		elseif (preg_match('/macintosh|mac os x/i', $agent)) {
			$platform = 'mac';
		}
		elseif (preg_match('/windows|win32/i', $agent)) {
			$platform = 'windows';
		}

		if(preg_match('/MSIE/i',$agent) && !preg_match('/Opera/i',$agent))
		{
			$bname = 'msie';
			$ub = "MSIE";
		}
		elseif(preg_match('/Firefox/i',$agent))
		{
			$bname = 'firefox';
			$ub = "Firefox";
		}
		elseif(preg_match('/Chrome/i',$agent))
		{
			$bname = 'chrome';
			$ub = "Chrome";
		}
		elseif(preg_match('/Safari/i',$agent))
		{
			$bname = 'safari';
			$ub = "Safari";
		}
		elseif(preg_match('/Opera/i',$agent))
		{
			$bname = 'opera';
			$ub = "Opera";
		}
	   
		$known = array('Version', $ub, 'other');
		$pattern = '#(?<browser>' . join('|', $known) . ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
		if (!preg_match_all($pattern, $agent, $matches)) {}
	   
		$i = count($matches['browser']);
		if ($i != 1) {
			if (strripos($agent,"Version") < strripos($agent,$ub)){
				$version= $matches['version'][0];
			}
			else {
				$version= $matches['version'][1];
			}
		}
		else {
			$version= $matches['version'][0];
		}

		if ($version==null || $version=="") {$version="?";}
	   
		return array(
			'userAgent' 		=> $agent,
			'name'      		=> $bname,
			'version'   		=> $version,
			'platform'  		=> $platform,
			'pattern'    		=> $pattern
		);
	} 
}