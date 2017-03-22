<?php

$absolute_path = __FILE__;
if (strpos($absolute_path, 'wp-content') === false) { $absolute_path = $_SERVER["SCRIPT_FILENAME"]; }
$path_to_file = explode( 'wp-content', $absolute_path );
$path_to_wp = $path_to_file[0];

// Access WordPress
require_once( $path_to_wp . '/wp-load.php' );

?>
