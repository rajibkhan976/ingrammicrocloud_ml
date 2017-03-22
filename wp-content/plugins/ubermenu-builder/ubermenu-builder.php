<?php

/*
  Plugin Name: Ubermenu Builder
  Description: Builds menu from json
  Version: 1.0.2
  Author: Webby Scots
  Author URI: http://webbyscots.com/

  WP Inputs:
  JSON - https://us.dev4.cloud.im/api/megamenu/getmegamenuforalllang/
  Lang - en


 */

global $Ubermenu_Builder;
$Ubermenu_Builder = new Ubermenu_Builder();

class Ubermenu_Builder {

    private $textdomain = "ubermenu-builder";
    private $required_plugins = array('ubermenu');

    function have_required_plugins() {
        if (empty($this->required_plugins))
            return true;
        $active_plugins = (array) get_option('active_plugins', array());
        if (is_multisite()) {
            $active_plugins = array_merge($active_plugins, get_site_option('active_sitewide_plugins', array()));
        }
        foreach ($this->required_plugins as $key => $required) {
            $required = (!is_numeric($key)) ? "{$key}/{$required}.php" : "{$required}/{$required}.php";
            if (!in_array($required, $active_plugins) && !array_key_exists($required, $active_plugins))
                return false;
        }
        return true;
    }

    function __construct() {
        if (!$this->have_required_plugins())
            return;
        global $wpdb;
        $this->schedule_time = 'every_minute';
        //var_dump($wpdb->get_results("SELECT * FROM {$wpdb->prefix}options ORDER BY option_id DESC"));
        load_plugin_textdomain($this->textdomain, false, dirname(plugin_basename(__FILE__)) . '/languages');
        add_filter('ubermenu_instance_settings', array($this, 'add_settings'), 50, 2);
        add_filter('cron_schedules', array($this, 'cron_schedules'));
        add_action('plugins_loaded', array($this, 'setup_cron'));
        add_action('refresh_menu_json', array($this, 'menu_refresh'));

        // add_action('wp_head',array($this,'debug_cron'));
        // add_action('admin_head',array($this,'debug_cron'));
    }

    function debug_cron() {
        echo "DEBUGGING CRON <p/>";
        if (wp_next_scheduled('refresh_menu_json'))
            echo ("<p style='float:right'>Current time " . date("Y-m-d H:i:s", time()) . " - Scheduled refresh for  " . print_r(wp_next_scheduled('refresh_menu_json'), true) . date("Y-m-d H:i:s", wp_next_scheduled('refresh_menu_json')));
        $instances = ubermenu_get_menu_instances(true);

        foreach ($instances as $config_id) {
            $settings = get_option(UBERMENU_PREFIX . $config_id);

            if (!isset($settings['ingram_json_content']) || empty($settings['ingram_json_content']))
                continue;
            echo " JSON URL for ubermenu $config_id IS " . $settings['ingram_json_content'];
            echo "<br/><br/>And it brings: "; // print_r($this->file_get_contents($settings['ingram_json_content'],true));
            echo "<p/>";
        }
    }

    function setup_cron() {
        if (isset($_GET['import_menu_wswp'])) {
            include(plugin_dir_path(__FILE__) . "/import-menu.php");
            import_primary_menu();
            return;
        }
        $instances = ubermenu_get_menu_instances(true);
        foreach ($instances as $config_id) {
            $settings = get_option(UBERMENU_PREFIX . $config_id);
            if (!wp_next_scheduled('refresh_menu_json') || $this->schedule_time != wp_get_schedule('refresh_menu_json')) {
                if (wp_next_scheduled('refresh_menu_json')) {
                    wp_clear_scheduled_hook('refresh_menu_json');
                }
                wp_schedule_event(time(), $this->schedule_time, 'refresh_menu_json');
            }
        }
    }

    function menu_refresh() {
        ob_start();
        $instances = ubermenu_get_menu_instances(true);
        echo "BUILDING::" . "\r\n\r\n";
        foreach ($instances as $config_id) {
            $settings = get_option(UBERMENU_PREFIX . $config_id);
            $nav_menu = $settings['nav_menu_id'];
            echo "BUILDING $config_id got $nav_menu::" . "\r\n\r\n";
            if (!isset($settings['ingram_json_content']) || empty($settings['ingram_json_content']))
                continue;
            $lang = strtolower($settings['ingram_json_lang']);
            echo "\r\n\r\n got lang $lang";
            $json_contents = (ini_get('allow_url_fopen') || !strstr($settings['ingram_json_lang'], 'http')) ? strip_tags((string) file_get_contents($settings['ingram_json_content'])) : strip_tags((string) $this->file_get_contents($settings['ingram_json_content']));
            $json = json_decode($json_contents, true);
            $json = strstr($json, "Array") ? $json : json_decode($json, true);
            echo " \r\n\r\n got json " . print_r($json, true);
            foreach ($json['megamenu'] as $mmenu) {
                $megamenu = false;
                if (isset($mmenu[$lang])) {
                    $megamenu = $mmenu;
                    break;
                }
            };

            if (intval($nav_menu) > 0 && $megamenu) {
                if (isset($megamenu[$lang]['DisplayCategories']))
                    $category_items = $this->parse_struct($megamenu[$lang]);
                echo " \r\n\r\n Built cat items " . print_r($category_items, true);
                //if (isset($megamenu['en']['ExternalSites']))
                //$this->parse_struct($megamenu['en']['ExternalSites'],$menus[$loc],$links);
                $menu = wp_get_nav_menu_object($nav_menu);
                foreach ((array) wp_get_nav_menu_items($menu->term_id) as $menu_item) {
                    if (get_post_meta($menu_item->ID, '_ubermenu_custom_item_type', true) == "custom_content") {
                        $uber_settings = get_post_meta($menu_item->ID, '_ubermenu_settings', true);
                        $title = strtolower(trim(strip_tags($uber_settings['custom_content'])));
                        echo ("\r\n\r\n" . "ON title : $title");
                        if (isset($category_items[$title])) {
                            echo ("\r\n\r\n" . "got category items \r\n" . print_r($category_items[$title], true));
                            $current_links = get_posts(array(
                                'post_type' => 'nav_menu_item',
                                'numberposts' => -1,
                                'post_status' => 'any',
                                'meta_key' => '_menu_item_menu_item_parent',
                                'meta_value' => $menu_item->ID,
                                'meta_compare' => '=',
                            ));
                            echo ("\r\n\r\n" . "got current links \r\n" . print_r($current_links, true));

                            foreach ($current_links as $cl) {
                                if (strstr($cl->post_content, "[Custom]") || strstr($cl->post_content, "[Row]") || strstr($cl->post_content, "[Column]"))
                                    continue;
                                wp_delete_post($cl->ID, true);
                            }
                            foreach ($category_items[$title] as $item) {
                                wp_update_nav_menu_item($nav_menu, 0, array(
                                    'menu-item-title' => __($item['title'], $this->textdomain),
                                    'menu-item-classes' => sanitize_title($item['title']),
                                    'menu-item-url' => $item['url'],
                                    'menu-item-parent-id' => $menu_item->ID,
                                    'menu-item-status' => 'publish'));
                            }
                        }
                    }
                }
            }
        }
        //wp_mail("","Debug Cron",ob_get_contents());
    }

    function file_get_contents($url, $debug = false) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, $debug);
        $data = curl_exec($curl);
        if ($debug) {
            echo " DEBUG CURL: " . print_r($data, true);
        }
        curl_close($curl);
        return $data;
    }

    function parse_struct($struct) {
        $items = array();
        foreach ($struct['DisplayCategories'] as $item) {
            if (isset($item['SubCategories']) && is_array($item['SubCategories']) && !empty($item['SubCategories'])) {
                $items[strtolower($item['CategoryName'])] = array();
                foreach ($item['SubCategories'] as $key => $subitem) {
                    $items[strtolower($item['CategoryName'])][$key]['title'] = $subitem['CategoryName'];
                    $items[strtolower($item['CategoryName'])][$key]['url'] = $subitem['Url'];
                }
            }
        }
        foreach ($struct['ExternalSites'] as $key => $item) {
            $items['all cloud services'][$key]['title'] = $item['Title'];
            $items['all cloud services'][$key]['url'] = $item['Url'];
        }
        return $items;
    }

    function cron_schedules($schedules) {
        $schedules['tenmins'] = array(
            'interval' => 200,
            'display' => __('Ten Minutes')
        );
        return $schedules;
    }

    function add_settings($settings, $config_id) {
        if (is_admin()) {
            wp_enqueue_script('media-upload');
            wp_enqueue_script('thickbox');
            wp_enqueue_style('thickbox');
        }
        $settings[10] = array(
            'name' => 'ingram_json_content',
            'label' => __('Upload json for menu', $this->textdomain),
            'type' => 'file',
            'group' => 'basic',
        );
        // $settings[11] = array(
        //     'name' => 'ingram_json_lang',
        //     'label' => 'Enter ISO language code to pull items from (in json)',
        //     'type' => 'text',
        //     'group' => 'basic'
        // );
        return $settings;
    }

    function custom_file($args) {

        $value = esc_attr($this->get_option($args['id'], $args['section'], $args['std']));
        $size = isset($args['size']) && !is_null($args['size']) ? $args['size'] : 'regular';
        $id = $args['section'] . '_' . $args['id'] . '';
        $js_id = $args['section'] . '[' . $args['id'] . ']';
        $html = sprintf('<input type="text" class="%1$s-text" id="' . $id . '" name="%2$s[%3$s]" value="%4$s"/>', $size, $args['section'], $args['id'], $value);
        $html .= '<input type="button" class="button wpsf-browse" id="' . $id . '_button" value="Browse" />
		<script type="text/javascript">
		jQuery(document).ready(function($){
			$("#' . $id . '_button").click(function() {
                            console.log("CLICKER");
				tb_show("", "media-upload.php?post_id=0&amp;type=image&amp;TB_iframe=true");
				window.original_send_to_editor = window.send_to_editor;
				window.send_to_editor = function(response) {
					var url = $(response).attr(\'href\');
					if ( !url ) {
						url = $(response).attr(\'src\');
					};
					$("#' . $id . '").val(url);
					tb_remove();
					window.send_to_editor = window.original_send_to_editor;
				};
				return false;
			});
		});
		</script>';
        $html .= sprintf('<span class="description"> %s</span>', $args['desc']);

        echo $html;
    }

}
