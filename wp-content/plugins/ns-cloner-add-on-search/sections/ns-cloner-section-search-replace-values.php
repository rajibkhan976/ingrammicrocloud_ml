<?php

class ns_cloner_section_search_replace_values extends ns_cloner_section {
	
	public $modes_supported = array('core','clone_over','search_replace');
	public $id = 'search_replace_values';
	public $ui_priority = 350;
	
	function init(){
		parent::init();
		add_filter( 'ns_cloner_search_items', array($this,'filter_clone_search') );
		add_filter( 'ns_cloner_replace_items', array($this,'filter_clone_replace') );
	}
	
	function render(){
		$this->open_section_box( $this->id, __('Search and Replace','ns-cloner'), '', __('Search & Replace','ns-cloner') );
		?>		
		<h5><?php _e('Enter your custom search/replace pairs','ns-cloner'); ?></h5>
		<ul class="ns-repeater">
			<li>
			<input type="text" name="custom_search[]" placeholder="<?php _e('Search for','ns-cloner'); ?>"/>
			<input type="text" name="custom_replace[]" placeholder="<?php _e('Replace with','ns-cloner'); ?>"/>
			<span class="ns-repeater-remove" title="remove">-</span>			
			</li>
		</ul>		
		<input type="button" class="button ns-repeater-add" value="<?php _e('Add Another','ns-cloner'); ?>" />
		<h5><?php _e('Case Sensitivity','ns-cloner'); ?></h5>
		<label><input type="checkbox" name="case_sensitive" /> <?php _e('Search should be case-sensitive','ns-cloner'); ?></label>
		<?php
		$this->close_section_box();
	}
	
	function filter_clone_search( $search ){
		if( isset($this->cloner->request['custom_search']) && is_array($this->cloner->request['custom_search']) ){
			$search = array_merge( $search, $this->cloner->request['custom_search'] );
		}
		return $search;
	}
	
	function filter_clone_replace( $replace ){
		if( isset($this->cloner->request['custom_replace']) && is_array($this->cloner->request['custom_replace']) ){
			$replace = array_merge( $replace, $this->cloner->request['custom_replace'] );
		}
		return $replace;
	}
	
}
