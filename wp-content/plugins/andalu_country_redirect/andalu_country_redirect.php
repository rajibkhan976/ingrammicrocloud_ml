<?php
/*

Plugin Name: ANDA.lu Country Redirect
Plugin URI: http://anda.lu/design

Description: Adds a soft redirect dialog based on the IP of the visitor

Version: 1.1
Author: ANDA.lu
Author URI: http://anda.lu/design

*/

if (!class_exists('Andalu_Country_Redirect')) :
class Andalu_Country_Redirect {

	static $url, $dir;
	static $settings, $settingsName = 'andalu_country_redirect';
	static $table = 'country_lookup';
	static $values = array();
	static $updating = false;


	// Initialize plugin
	static function init() {

		self::$url = plugins_url('', __FILE__);
		self::$dir = plugin_dir_path(__FILE__);
		
		load_plugin_textdomain('andalu_country_redirect', false, self::$dir.'/languages');

		if (is_admin()) {
			add_action('admin_enqueue_scripts', array(__CLASS__, 'adminScripts'));
			add_action('admin_init', array(__CLASS__, 'adminInit'));
			add_action('admin_menu', array(__CLASS__, 'addSettingsPage'));
			add_action('wp_ajax_andalu_import_country_db', array(__CLASS__, 'importDB'));
			add_action('wp_ajax_andalu_update_country_db', array(__CLASS__, 'updateDBAjax'));
		} else {
			add_action('wp_enqueue_scripts', array(__CLASS__, 'enqueueScripts'));
		}
		
		add_action('andalu_country_redirect_update_db', array(__CLASS__, 'updateDBCron'));

		register_activation_hook(__FILE__, array(__CLASS__, 'activate'));		
		register_deactivation_hook(__FILE__, array(__CLASS_, 'deactivate'));
	}
	
	
	// Initialize on activate
	static function activate() {
		$options = self::getOptions();
		if (!empty($options['update']['interval']) && !wp_next_scheduled('andalu_country_redirect_update_db')) {
			wp_schedule_event(time(), 'daily', 'andalu_country_redirect_update_db');
		}
	}


	// Clean up when we deactivate the plugin
	static function deactivate() {
		wp_clear_scheduled_hook('andalu_country_redirect_update_db');
	}


	// Enqueue scripts in the frontend (only if we need to redirect)
	static function enqueueScripts() {
		$redirect = self::checkRedirect();
		if ($redirect) {
			wp_enqueue_style('andalu_country_redirect', self::$url.'/css/redirect.css');
			wp_enqueue_script('andalu_country_redirect', self::$url.'/js/redirect.js', array('jquery'), '1.0', true);
			
			$options = self::getOptions();
			$to = self::cleanDomain($redirect['url']);
			$stay = self::cleanDomain(home_url('/'));
			wp_localize_script('andalu_country_redirect', 'andalu_country_redirect', array(
				'url' => $redirect['url'],
				'title' => sprintf(__('Looking for the %s?', 'andalu_country_redirect'), $redirect['name']),
				'message' => sprintf(__('This is the international website. If you are looking for specific information, we will gladly redirect you.', 'andalu_country_redirect'), $to),
				'donotshow' => __('Do not show again (your browser must accept cookies).', 'andalu_country_redirect'),
				'switch' => sprintf(__('Switch to the %s', 'andalu_country_redirect'), empty($options['sitename'])?$to:$redirect['name']),
				'stay' => sprintf(__('Stay on the %s', 'andalu_country_redirect'), empty($options['sitename'])?$stay:$options['sitename']),
			));
		}
	}
	
	
	// Clean a domain string for nicer display
	static function cleanDomain($domain) {
		$domain = trim($domain, '/\\');
		return preg_replace('#^(https?://)#', '', $domain);
	}
	
	// Check if are on the active page and if a redirect rule matches
	static function checkRedirect() {
		$options = self::getOptions();
		
		// Skip check if cookie is set
		if (!empty($_COOKIE['andalu_redirect_donotshow'])) return false;

		// Check if we are the active page
		if (!empty($options['activepage'])) {
			switch($options['activepage']) {
				case 'front':
					if (!is_front_page()) return false;
				break;
				case 'all':
				break;
				default:
					if (!is_page($options['activepage'])) return false;
			}
			
			// Check if any of the rules match
			$country_code = self::countryCode();
			if (!empty($country_code) && !empty($options['redirect'])) {
				foreach($options['redirect'] as $rule) {
					if ($rule['country'] == $country_code) return $rule;
				}
			}
		}
		
		return false;
	}

	
	// Get country code from visitors ip
	static function countryCode() {
		global $wpdb;
		$table_name = $wpdb->prefix . self::$table;
		$ip = empty($_SERVER['HTTP_X_CLIENT_IP'])?$_SERVER['REMOTE_ADDR']:$_SERVER['HTTP_X_CLIENT_IP'];
		$ip = ip2long($ip);
		
		return $wpdb->get_var($wpdb->prepare("SELECT country_code FROM $table_name WHERE %d >= begin_ip_num AND %d <= end_ip_num", $ip, $ip));
	}


	// Load scripts for wp admin (only on option page)
	static function adminScripts($hook) {
		if ($hook == 'settings_page_andalu_country_redirect') {
			wp_enqueue_style('andalu_country_redirect', self::$url.'/css/admin.css');
			wp_enqueue_script('andalu_country_redirect', self::$url.'/js/admin.js', array('jquery'), '1.0', true);
			wp_localize_script('andalu_country_redirect', 'andalu_country_redirect', array(
				'ajax_url' => admin_url('admin-ajax.php'),
			));
		}
	}


	// Register settings to use on admin option page
	static function adminInit() {
		register_setting(self::$settingsName, self::$settingsName, array(__CLASS__, 'validate'));
	}	


	// Validate settings on admin option page
	static function validate($input) {
		$valid = array();
		$valid['activepage'] = sanitize_text_field($input['activepage']);
		$valid['sitename'] = sanitize_text_field($input['sitename']);
		$valid['redirect'] = array();
		
		foreach($input['redirect'] as $i => $rule) {
			$country = empty($rule['country'])?null:sanitize_text_field($rule['country']);
			$url = empty($rule['url'])?null:esc_url($rule['url']);
			$name = empty($rule['name'])?null:sanitize_text_field($rule['name']);
			if (!empty($rule['country']) || !empty($rule['url'])) {
				$valid['redirect'][$i] = array('country' => $country, 'url' => $url, 'name' => $name);
			}
		}
		
		$valid['update'] = array(
			'url' => empty($input['update']['url'])?null:esc_url($input['update']['url']),
			'key' => empty($input['update']['key'])?null:sanitize_text_field($input['update']['key']),
			'interval' => empty($input['update']['interval'])?null:absint($input['update']['interval']),
		);
		
		// Check if we need to schedule updates
		if (empty($valid['update']['interval'])) {
			wp_clear_scheduled_hook('andalu_country_redirect_update_db');
			delete_option(self::$settingsName.'_updating');
		} else {
			if (!wp_next_scheduled('andalu_country_redirect_update_db')) {
				wp_schedule_event(time(), 'daily', 'andalu_country_redirect_update_db');
				delete_option(self::$settingsName.'_updating');
			}
		}

		return $valid;
	}


	// Add a new settings page
	static function addSettingsPage() {
		add_options_page(__('Country Redirect', 'andalu_country_redirect'), __('Country Redirect', 'andalu_country_redirect'), 'manage_options', self::$settingsName, array(__CLASS__, 'settingsPage'));
	}


	// Render the settings page
	static function settingsPage() {
		$dbVersion = get_option('andalu_country_redirect_db');
		$options = self::getOptions();
		
	?>
		<div class="wrap">
			<h2><?php _e('Country Redirect Options', 'andalu_country_redirect'); ?></h2>
			<form method="post" action="options.php">
				<?php settings_fields(self::$settingsName); ?>
				<table class="form-table">
					<tbody>
						<tr>
							<th scope="row"><label for="activepage"><?php _e('Active Page', 'andalu_country_redirect'); ?></label></th>
							<td>
								<select id="activepage" name="<?php echo self::$settingsName; ?>[activepage]"> 
 									<option value=""><?php _e('Disabled'); ?></option> 
 									<option value="all" <?php selected('all', $options['activepage']); ?>><?php _e('All Pages'); ?></option> 
 									<option value="front" <?php selected('front', $options['activepage']); ?>><?php _e('Front Page'); ?></option> 
 									<?php 
										$pages = get_pages();
										if (!empty($pages)) {
											foreach($pages as $page) {
												echo '<option value="', $page->ID, '" ', selected($page->ID, $options['activepage'], false), '>', $page->post_title, '</option>';
											}
										}
									?>
								</select><br />
								<span class="description"><?php _e('Select the page on which you would like the redirect to popup', 'andalu_country_redirect'); ?></span>
							</td>
						</tr>
						<tr>
							<th scope="row"><label for="sitename"><?php _e('Site Name', 'andalu_country_redirect'); ?></label></th>
							<td>
								<input class="regular-text" type="text" name="<?php echo self::$settingsName; ?>[sitename]" value="<?php echo $options['sitename']; ?>" />
								<span class="description"><?php _e('Enter the user friendly sitename', 'andalu_country_redirect'); ?></span>
							</td>
						</tr>
						<tr>
							<th scope="row"><label><?php _e('Redirect Rules', 'andalu_country_redirect'); ?></label></th>
							<td>
								<span class="description"><?php _e('Enter the country code, url and name for each redirect rule (Ex. IE - http://domain.ie - Irish Site)', 'andalu_country_redirect'); ?></span>
								<?php for($i = 1, $count = count($options['redirect']); $i <= $count; $i++) : ?>
								<div class="redirect-rule">
									<input type="text" size="2" name="<?php echo self::$settingsName; ?>[redirect][<?php echo $i; ?>][country]" value="<?php echo $options['redirect'][$i]['country']; ?>" />
									<input class="regular-text" type="text" name="<?php echo self::$settingsName; ?>[redirect][<?php echo $i; ?>][url]" value="<?php echo $options['redirect'][$i]['url']; ?>" />
									<input class="regular-text" type="text" name="<?php echo self::$settingsName; ?>[redirect][<?php echo $i; ?>][name]" value="<?php echo $options['redirect'][$i]['name']; ?>" />
								</div>
								<?php endfor; ?>
								<a class="add-another" href="#"><?php _e('Add another rule', 'andalu_country_redirect'); ?></a>
							</td>
						</tr>
						<tr>
							<th colspan="2">
								<h3><?php _e('Update DB options'); ?></h3>
							</th>
						</tr>
						<tr>
							<th scope="row"><label for="url"><?php _e('Update URL', 'andalu_country_redirect'); ?></label></th>
							<td>
								<input class="regular-text" type="text" id="url" name="<?php echo self::$settingsName; ?>[update][url]" value="<?php echo $options['update']['url']; ?>" />
								<span class="description"><?php _e('URL for updating the DB from GeoIP', 'andalu_country_redirect'); ?></span>
							</td>
						</tr>
						<tr>
							<th scope="row"><label for="key"><?php _e('License Key', 'andalu_country_redirect'); ?></label></th>
							<td>
								<input class="regular-text" type="text" id="key" name="<?php echo self::$settingsName; ?>[update][key]" value="<?php echo $options['update']['key']; ?>" />
								<span class="description"><?php _e('License Key for retrieving update file', 'andalu_country_redirect'); ?></span>
							</td>
						</tr>
						<tr>
							<th scope="row"><label for="interval"><?php _e('Update Interval', 'andalu_country_redirect'); ?></label></th>
							<td>
								<input size=2 type="text" id="interval" name="<?php echo self::$settingsName; ?>[update][interval]" value="<?php echo $options['update']['interval']; ?>" />
								<span class="description"><?php _e('Enter how often you would like to update (number of days), leaving this blank will disable automatic updates', 'andalu_country_redirect'); ?></span>
							</td>
						</tr>
					</tbody>
				</table>
	
				<?php submit_button(); ?>
			</form>

			<br/><hr/><br/>

			<h2><?php _e('Database Import/Update', 'andalu_country_redirect'); ?></h2>
			<form method="post" id="andalu-import">
				<?php if (empty($dbVersion)) : ?>

				<p class="submit">
					<input type="hidden" name="action" value="andalu_import_country_db" />
					<input type="hidden" name="andalu_import_country_db" value="<?php echo wp_create_nonce(self::$settingsName); ?>" />
					<input name="submit" id="submit" class="button button-primary" value="<?php _e('Import DB', 'andalu_country_redirect'); ?>" type="submit">
				</p>

				<?php else : ?>
				
				<table class="form-table">
					<tbody>
						<tr>
							<th scope="row"><label><?php _e('Installed DB version', 'andalu_country_redirect'); ?></label></th>
							<td><?php echo $dbVersion; ?></td>
						</tr>
					</tbody>
				</table>

				<p class="submit">
					<input type="hidden" name="action" value="andalu_update_country_db" />
					<input type="hidden" name="andalu_update_country_db" value="<?php echo wp_create_nonce(self::$settingsName); ?>" />
					<input name="submit" id="submit" class="button button-primary" value="<?php _e('Update DB', 'andalu_country_redirect'); ?>" type="submit">
				</p>

				<?php endif; ?>
			</form>
			
			<div id="andalu-import-results"></div>
		</div>
	<?php
	}


	// Retrieve plugin options
	static function getOptions() {
		if (!empty(self::$settings)) { return self::$settings; } 
		self::$settings = get_option(self::$settingsName);

		if (empty(self::$settings)) {
			self::$settings = array(
				'activepage' => '',
				'sitename' => '',
				'redirect' => array(
					array('country' => '', 'url' => '', 'name' => '')
				),
				'update' => array('url' => 'https://download.maxmind.com/app/geoip_download', 'key' => '', 'interval' => 0)
			);
		}
		
		return self::$settings;
	}


	// Import the DB from a zip file
	static function importDB() {
		check_ajax_referer(self::$settingsName, 'andalu_import_country_db');

		// Check db version
		$dbVersion = get_option('andalu_country_redirect_db');
		if (empty($dbVersion)) {
			self::createCountryTable();

			$filename = self::getDBFile();
			echo 'Zip file: '.$filename."\n";
	
			// Open zip file
			$zip = zip_open($filename);
			if (!$zip) { self::stop('Unable to open zipfile: '.$filename); }
	
			while ($entry = zip_read($zip)) {
				$name = zip_entry_name($entry);
				$extension = pathinfo($name, PATHINFO_EXTENSION);
				if ($extension != 'csv') continue;
				
				self::readZipFile($zip, $entry, $name);
			}
			zip_close($zip);

		} else {
			echo 'DB already installed: '.$dbVersion."\n"; 
		}

		self::stop();
	} 


	// Respond to update from wp cron
	static function updateDBCron() {
		
		// Check if we are already updating
		$updating = get_option(self::$settingsName.'_updating');
		if (empty($updating)) {
			// Block updating to prevent other update calls
			update_option(self::$settingsName.'_updating', 1);
			self::$updating = true;

			// Get last update time and update interval			
			$options = self::getOptions();
			$update_time = absint(get_option(self::$settingsName.'_update_time'));
			$interval = empty($options['update']['interval'])?0:$options['update']['interval'];
			
			// Check if we passed interval * days since the last update
			$seconds = $interval * 24 * 60 * 60;
			if (!empty($interval) && (time() - $update_time) > $seconds) {
				update_option(self::$settingsName.'_update_time', time());
				echo 'Running automatic update'."\n";
				self::retrieveUpdate();
				self::updateDB();
			}

			// Unblock updating
			delete_option(self::$settingsName.'_updating');
		}
		die();
	}


	// Respond to update from ajax call
	static function updateDBAjax() {
		check_ajax_referer(self::$settingsName, 'andalu_update_country_db');
		self::retrieveUpdate();		
		self::updateDB();
	}


	// Retrieve the latest zip file and save it locally
	static function retrieveUpdate() {
		$options = self::getOptions();
		$url = add_query_arg(array('edition_id' => 108, 'suffix' => 'zip', 'license_key' => $options['update']['key']), $options['update']['url']);

		// Get upload directory and make sure we can write to it
		$uploads = wp_upload_dir();
		$dir = $uploads['basedir'].'/country_redirect';
		if (!is_dir($dir) || !is_writeable($dir)) { mkdir($dir, 0777, true); }
		if (!is_dir($dir) || !is_writeable($dir)) { self::stop('We do not have write permission in the upload directory: '.$dir); }
		
		// Get file info of remote file
		list($name, $length) = self::getFilename($url);
		if (empty($name) || empty($length)) { self::stop('Unable to get file info: '.$url); }
		$filename = $dir.'/'.$name;
		
		// Check if file exists (and is correct length)
		$size = @filesize($filename);
		if ($size == $length) { self::stop('Latest update has already been downloaded: '.$name); }

		// Download update file
		echo 'Retrieving file: '.$url."\n";
		$result = file_put_contents($filename, fopen($url, 'r'));
		if ($result != $length) {
			unlink($filename);
			self::stop('Unable to download file: '.$result);
		}

		echo 'Saved file: '.$filename."\n";
	}


	// Get filename and length from a url
	static function getFilename($url) {
		$filename = $length = false;
		
		// Get real filename		
		$header = get_headers($url, 1);
		$response_code = substr($header[0], 9, 3);

		if ($response_code == '200') {
			$header = array_change_key_case($header, CASE_LOWER);
			if (!empty($header['content-disposition'])) {
				$tmp_name = explode('=', $header['content-disposition']);
				if ($tmp_name[1]) $filename = trim($tmp_name[1],'";\'');
			} else {
				$stripped_url = preg_replace('/\\?.*/', '', $url);
				$filename = basename($stripped_url);
			}
			
			if (!empty($header['content-length'])) { $length = $header['content-length']; }
		}

		return array($filename, $length);
	}	
	

	// Update the DB from a zip file
	static function updateDB() {

		$dbVersion = get_option('andalu_country_redirect_db');

		// Create country table if needed
		self::createCountryTable();

		$filename = self::getDBFile();
		echo 'Zip file: '.$filename."\n";
	
		// Open zip file
		$zip = zip_open($filename);
		if (!$zip) { self::stop('Unable to open zipfile: '.$filename); }

		while ($entry = zip_read($zip)) {
			$name = zip_entry_name($entry);
			$extension = pathinfo($name, PATHINFO_EXTENSION);
			if ($extension != 'csv') continue;

			if ($dbVersion == $name) { self::stop('Already imported: '.$name); }
			
			self::readZipFile($zip, $entry, $name);
		}
		zip_close($zip);

		self::stop();
	} 
	

	// Get the newest DB file
	static function getDBFile() {
		$files = array();
		
		// Check in upload directory
		$uploads = wp_upload_dir();
		$dir = $uploads['basedir'].'/country_redirect';
		foreach(glob($dir.'/GeoIP*.zip') as $filename) {
			$files[] = $filename;
		}
		
		// Check in plugin dir
		if (empty($files)) {
			foreach(glob(self::$dir.'db/GeoIP*.zip') as $filename) {
				$files[] = $filename;
			}
		}
		if (empty($files)) { return false; }

		rsort($files);
		return $files[0];
	}
	

	// Read the zipped DB file and parse the file
	static function readZipFile(&$zip, &$entry, $name) {
		echo 'Importing: '.$name."\n";
		if (zip_entry_open($zip, $entry)) {

			// Read from zip file and place in buffer (temporary file)
			$buffer = fopen('php://temp', 'w');
			if (!$buffer) { self::stop('Unable to open buffer');}  
			while($contents = zip_entry_read($entry)) {
				fputs($buffer, $contents);
			}

			// Parse buffer
			rewind($buffer);
			$count = 0;
			while (($fields = fgetcsv($buffer)) !== false) {
				if ($count++ < 2) continue; // Skip first two lines
				self::parseFields($fields);
				
				// Insert values at multiples of a 1000
				if (($count % 1000) == 0) { self::insertDBValues(); }
			}
			self::insertDBValues(); // Insert any remaining values
			
			if (!feof($buffer)) { self::stop('Unexpected end of file'); }
			fclose($buffer);
			echo 'Processed '.$count." lines\n";
			update_option('andalu_country_redirect_db', $name);

			zip_entry_close($entry);
		} else {
			echo 'Unable to open: '.$name."\n";
		}
	}

	// Parse fields
	static function parseFields($fields) {
		global $wpdb;
		
		// Extract fields
		list($beginIp, $endIp, $beginIpNum, $endIpNum, $countryCode, $countryName) = $fields;
		if (empty($beginIp) || empty($endIp) || empty($beginIpNum) || empty($endIpNum) || empty($countryCode) || empty($countryName)) return;

		self::$values[] = $wpdb->prepare('(%s, %s, %d, %d, %s, %s)', $beginIp, $endIp, $beginIpNum, $endIpNum, $countryCode, $countryName);
	}

	
	// Submit values to WP DB
	static function insertDBValues() {
		global $wpdb;
		if (empty(self::$values)) return;
		
		$table_name = $wpdb->prefix . self::$table;
		$sql = "INSERT INTO $table_name (begin_ip, end_ip, begin_ip_num, end_ip_num, country_code, country_name) VALUES ";
		$sql .= implode(',', self::$values);
		$sql .= ' ON DUPLICATE KEY UPDATE country_code=VALUES(country_code), country_name=VALUES(country_name)';
		self::$values = array(); // Clear values		

		$result = $wpdb->query($sql);
	}

	
	// Add database table
	static function createCountryTable() {
		global $wpdb;
		$table_name = $wpdb->prefix . self::$table;

		// Set character set		
		$charset_collate = '';
		if (!empty($wpdb->charset)) { $charset_collate = "DEFAULT CHARACTER SET {$wpdb->charset}"; }
		if (!empty($wpdb->collate)) { $charset_collate .= " COLLATE {$wpdb->collate}"; }
	
		$sql = "CREATE TABLE IF NOT EXISTS $table_name (
			begin_ip VARCHAR(15) NOT NULL,
			end_ip VARCHAR(15) NOT NULL,
			begin_ip_num INT UNSIGNED NOT NULL,
			end_ip_num INT UNSIGNED NOT NULL,
			country_code VARCHAR(2),
			country_name VARCHAR(50),
			UNIQUE KEY ip_range (begin_ip_num, end_ip_num)
		) $charset_collate ;";
	
		$result = $wpdb->query($sql);
	}


	// Wrapper for die function clear any statuses before dieing
	static function stop($error = '') {
		if (self::$updating) { delete_option(self::$settingsName.'_updating'); }
		die($error);
	}

}
Andalu_Country_Redirect::init();
endif;

?>