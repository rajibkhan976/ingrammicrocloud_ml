<?php
/*
Plugin Name: NS Cloner Add-on: Search and Replace
Plugin URI: http://neversettle.it
Description: Perform global search & replace on an existing site, or easily run unlimited custom search & replace values when cloning new sites.
Author: Never Settle
Version: 1.0.4.1
Network: true
Author URI: http://neversettle.it
License: GPLv2 or later
*/

/*
Copyright 2014 Never Settle (email : dev@neversettle.it)

This program is free software; you can redistribute it and/or 
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
} 

// Support plugin auto-updates
require_once( plugin_dir_path(__FILE__).'lib/wp-updates-plugin.php' );
new WPUpdatesPluginUpdater_602( 'http://wp-updates.com/api/2/plugin', plugin_basename(__FILE__));

// Show notice if cloner isn't active
require_once( plugin_dir_path(__FILE__).'lib/ns-cloner-check.php' );
new ns_cloner_check( "NS Cloner Search and Replace" );

// Load the plugin
add_action( 'ns_cloner_before_construct', 'ns_cloner_addon_search_replace_init' );
function ns_cloner_addon_search_replace_init(){
	require_once( plugin_dir_path(__FILE__).'addons/ns-cloner-addon-search-replace.php' );
	new ns_cloner_addon_search_replace();
}

?>