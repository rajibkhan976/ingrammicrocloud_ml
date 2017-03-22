<?php

class ns_cloner_addon_search_replace extends ns_cloner_addon {
	
	var $version = '1.0.4';
	
	function __construct(){
		$this->title = __( 'NS Cloner Content & Users', 'ns-cloner' );
		// set paths here since if we do that from the parent class they will be wrong
		$this->plugin_path = plugin_dir_path( dirname(__FILE__) ); 
		$this->plugin_url = plugin_dir_url( dirname(__FILE__) );
		parent::__construct();
		// unregister call-to-action placeholder sections which this addon creates the real thing for
		add_filter( 'ns_cloner_do_load_section_search_replace_cta', '__return_false' );	
	}

	function init( $cloner ){
		parent::init( $cloner );
		$this->cloner->register_mode(
			'search_replace',
			array(
				'title' => __( 'Search and Replace', 'ns-cloner' ),
				'button_text' => __( 'Go Search/Replace', 'ns-cloner' ),
				'description' => __ ( 'Instantly perform unlimited custom text replacements across any number of existing sites. Feel the power!', 'ns-cloner' ),
				'report_message' => __( 'Search and replace complete!', 'ns-cloner' ) 
			),
			array('additional_settings')
		);
		// this section is for the search_replace mode only and will allow target search/replacement sites to be selected
		$this->cloner->load_section( 'search-replace', $this->plugin_path );
		// this section is for all modes and allows user to enter custom search/replace values in a repeater
		$this->cloner->load_section( 'search-replace-values', $this->plugin_path );
	}

}

?>