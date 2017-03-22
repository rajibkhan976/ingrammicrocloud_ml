<?php
define('DOING_AJAX', true);

if (!isset($_POST['action']))
    die('-1 no action');

ini_set('html_errors', 0);

//make sure we skip most of the loading which we might not need
//http://core.trac.wordpress.org/browser/branches/3.4/wp-settings.php#L99
define('SHORTINIT', true);
require_once('../../../../wp-load.php');

//Typical headers
header('Content-Type: text/html');
send_nosniff_header();

//Disable caching
header('Cache-Control: no-cache');
header('Pragma: no-cache');

//Include only the files and function we need
require( ABSPATH . WPINC . '/formatting.php' );

$action = esc_attr(trim($_POST['action']));
$allowed_actions = array(
    'adbutler_slick_slider'
);

if (in_array($action, $allowed_actions)) {
    //do_action('BGIMC_AJAX_HANDLER_nopriv_' . $action);
    echo adbutler_slick_slider();
} else {
    die('-1');
}
//
//add_action('BGIMC_AJAX_HANDLER_adbutler_slick_slider', 'adbutler_slick_slider');
//add_action('BGIMC_AJAX_HANDLER_nopriv_adbutler_slick_slider', 'adbutler_slick_slider');

function adbutler_slick_slider() {

    $zone_id = esc_attr(get_option('ab_zone_id'));
    $a['zones_array'] = explode(",", $zone_id);
    $a['account_id'] = esc_attr(get_option('ab_account_id'));
    $a['type'] = 'json';
    $a['size'] = '323x255';

    if (is_array($a['zones_array']) && count($a['zones_array']) > 0) {
        bg_build_ad_tag($a);
    }
    die();
}

function bg_build_ad_tag($params) {
    echo bg_fetch_json_data($params);
}

function bg_fetch_json_data($params) {
    $api_url = 'https://servedbyadbutler.com/adserve/;ID=' . $params['account_id'] . ';size=' . $params['size'] . ';type=' . $params['type'];

    $return_data = '';
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
// Will return the response, if false it print the response
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
    curl_setopt($ch, CURLOPT_ENCODING, '');
    foreach ($params['zones_array'] as $key => $value) {
        $data[] = $api_url . ';setID=' . trim($value) . ";click=CLICK_MACRO_PLACEHOLDER";
    }


    $results = multiRequest($data);
    return $json_array = json_encode($results);
//    foreach ($results as $result) {
//        $json_array = json_decode($result, true);
//        if ($json_array['status'] == 'SUCCESS') {
//            $return_data.='<div data-thumb="' . $json_array['placements']['placement_1']['image_url'] . '">';
//            $return_data.='<a href="' . $json_array['placements']['placement_1']['redirect_url'] . '"';
//            if (isset($json_array['placements']['placement_1']['target']))
//                $return_data.='target="' . $json_array['placements']['placement_1']['target'] . '">';
//            $return_data.='<img src="' . $json_array['placements']['placement_1']['image_url'] . '" alt="' . $json_array['placements']['placement_1']['alt_text'] . '"></a>';
//            $return_data.='<img src="' . $json_array['placements']['placement_1']['accupixel_url'] . '" alt="' . $json_array['placements']['placement_1']['alt_text'] . '">';
//            $return_data.='</div>';
//        }
//    }
    return $return_data;
}

function multiRequest($data, $options = array()) {

    // array of curl handles
    $curly = array();
    // data to be returned
    $result = array();

    // multi handle
    $mh = curl_multi_init();

    // loop through $data and create curl handles
    // then add them to the multi-handle
    foreach ($data as $id => $d) {

        $curly[$id] = curl_init();

        $url = (is_array($d) && !empty($d['url'])) ? $d['url'] : $d;
        curl_setopt($curly[$id], CURLOPT_URL, $url);
        curl_setopt($curly[$id], CURLOPT_HEADER, 0);
        curl_setopt($curly[$id], CURLOPT_RETURNTRANSFER, 1);

        // post?
        if (is_array($d)) {
            if (!empty($d['post'])) {
                curl_setopt($curly[$id], CURLOPT_POST, 1);
                curl_setopt($curly[$id], CURLOPT_POSTFIELDS, $d['post']);
            }
        }

        // extra options?
        if (!empty($options)) {
            curl_setopt_array($curly[$id], $options);
        }

        curl_multi_add_handle($mh, $curly[$id]);
    }

    // execute the handles
    $running = null;
    do {
        curl_multi_exec($mh, $running);
    } while ($running > 0);


    // get content and remove handles
    foreach ($curly as $id => $c) {
        $result[$id] = curl_multi_getcontent($c);
        curl_multi_remove_handle($mh, $c);
    }

    // all done
    curl_multi_close($mh);

    return $result;
}
