=== NS Cloner Add-on: Search and Replace ===
Contributors: neversettle
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=53JXD4ENC8MM2&rm=2
Requires at least: 3.0.1
Tested up to: 3.9.1

== Description ==

This add-on brings a powerful Search and Replace mode to the Cloner. It can be used during cloning to find and update unlimited text pairs on the new site. But it doesn't stop there - it can also search and replace on unlimited values inside existing sites and even your entire WordPress Multisite Network. It works at the database level and is serial-array safe for settings and other data that is store that way in WordPress.
<h2>Search and Replace Add-on Features:</h2>
<ol>
	<li>Adds a Search and Replace Mode</li>
	<li>Search &amp; Replace values during cloning</li>
	<li>Search &amp; Replace values in existing site</li>
	<li>Search &amp; Replace values in entire multisite</li>
	<li><strong>** All new, simplified interface</strong></li>
	<li><strong>** Unlimited Search &amp; Replace rules</strong></li>
	<li><strong>** Automatic Updates just like WP.org</strong></li>
</ol>
(** New functionality in V3 as compared to the NS Cloner Pro V2)

If you want even more functionality, [check out all our Add-ons and Bundles](http://neversettle.it/ns-cloner-add-ons-features)!

== Installation ==

= How to install NS Cloner Add-ons =

1. The NS Cloner V3 must be installed first for add-ons to work.
1. Log in to your WordPress network as a multisite super admin and go to /wp-admin/network
1. Use the Dashboard > Plugins > Add New tools to install the add-on by uploading its zip file that you downloaded from NeverSettle.it
1. Network Activate the add-on in the Plugins area
1. You must do this for each add-on even if you purchased a Bundle
1. Some plugins add new functionality to the NS Cloner and do not necessarily have their own menu items

== Frequently Asked Questions ==

= How do I contact Support, provide Feedback, or make a Feature Request? =
You can browse our Knowledge Base, add or vote on Feature Requests, or contact us with an issue at <a title="Never Settle Support and Feedback" href="http://support.neversettle.it" target="_blank">http://support.neversettle.it</a>

= Does the NS Cloner work on subdomain networks as well as subfolder networks? = 
YES!

= Why do I get a white screen after cloning a site? = 
Usually this means that the clone operation did not complete successfully. The most common cause for this is a script timeout. By default, PHP script execution for a single script is set to 30 seconds. This might not be enough time for larger sites with numerous posts, pages, and users to complete cloning - especially since the Cloner runs advanced search and replace operations against every table cloned to the new site to make sure that it reflects the new site url and title throughout all its data. Try increasing the max_execution_time in php.ini or wherever your host supports updating PHP configuration settings. You can <a title="Cloning White Screen Issue" href="http://support.neversettle.it/knowledgebase/articles/379601-white-screen-or-404-and-blank-site-after-cloning" target="_blank">read more detailed troubleshooting tips for this issue</a> on our support site.

== Changelog ==

= 1.0.4.1 =
* Added compatibility fix for CSS & Javascript Toolbox plugin

= 1.0.4 =
* Added additional logging

= 1.0.3 =
* Added case sensitive/insensitive control for performing searches
* Added pre WP 3.7 compatibility
* Revamped logs for better utility/readability
* Centralized ns_cloner_addon class for maintability

= 1.0.2 =
* Bugfixes for edge cases and validation

= 1.0.0 =
* First public release

== Upgrade Notice ==

= 1.0.0 =
* First public release

= 1.0.2 =
* Bugfixes for edge cases and validation

= 1.0.3 =
* Added case sensitive/insensitive control for performing searches
* Added pre WP 3.7 compatibility
* Revamped logs for better utility/readability
* Centralized ns_cloner_addon class for maintability

