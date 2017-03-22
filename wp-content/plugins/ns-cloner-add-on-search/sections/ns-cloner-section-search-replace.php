<?php

class ns_cloner_section_search_replace extends ns_cloner_section {
	
	public $modes_supported = array('search_replace');
	public $id = 'search_replace';
	public $ui_priority = 100;
	
	function init(){
		parent::init();		
		// register core clone and copy steps - this func will only be called if we're in clone_over mode so no need to check
		add_filter( 'ns_cloner_pipeline_steps', array($this,'register_pipeline_step'), 200 );
	}
	
	function render(){
		$this->open_section_box( $this->id, __('Select Target Site(s)','ns-cloner') );
		?>
		
		<label for="search_replace_target_ids"><?php _e('Pick an existing site or sites to perform replacements on'); ?></label>
		<select name="search_replace_target_ids[]" multiple>
		  <?php $sites = function_exists('wp_get_sites')? wp_get_sites(array('limit'=>9999)) : get_blog_list(0,'all'); ?>
		  <?php foreach( $sites as $site ): ?>
			<option value="<?php echo $site['blog_id']; ?>">
				<?php $title = get_blog_details($site['blog_id'])->blogname; ?>
				<?php $url = is_subdomain_install()? "$site[domain]" : "$site[domain]$site[path]"; ?>
				<?php echo "$site[blog_id] - ".substr($title,0,30)." ($url)"; ?>
		  <?php endforeach; ?>
		</select>
		<p class="description"><?php _e( 'You can select multiple sites by pressing ctrl/&#8984; while clicking. Select all by clicking on one, then pressing ctrl/&#8984 + a.', 'ns-cloner' ); ?></p>
		<p class="description"><strong><?php _e('Please make sure you have backups of database and files as the sites you select will be permanently overwritten when you click the "Clone Over" button!'); ?></strong></p>
		
		<?php
		$this->close_section_box();
	}

	function validate( $errors ){
		if( !isset($this->cloner->request['search_replace_target_ids']) ){
			$errors[] = array('message'=>__('Please select at least one target site.','ns-cloner'),'section'=>$this->id);
		}
		return $errors;
	}
	
	function register_pipeline_step( $steps ){
		$steps['search_replace'] = array($this,'do_search_and_replace');
		return $steps; 
	}
	
	function do_search_and_replace(){
		// set count vars to keep track of numbers
		$count_tables_checked = $count_rows_checked = $count_items_checked =  $count_replacements_made = 0;
		
		// log the search and replace 
		$this->cloner->dlog( array( "String search targets:", $this->cloner->request['custom_search'] ) );
		$this->cloner->dlog( array( "String search replacements:", $this->cloner->request['custom_replace'] ) );
				
		// for each target site that has been selected, go through, set up vars and do replacements on all its tables
		foreach( $this->cloner->request['search_replace_target_ids'] as $target_id ){			
			$this->cloner->dlog_break();
			$this->cloner->dlog( "Starting Search & Replace for site $target_id" );
			$this->cloner->dlog_break();
			$this->cloner->set_up_target_vars( $target_id, array('prefix') );
			$tables = $this->cloner->get_site_tables( $this->cloner->target_db, $this->cloner->target_prefix );	
			foreach( $tables as $table ) {
				$count_these_replacements = 0;
				$quoted_table = ns_sql_backquote($table);				
				$this->cloner->dlog_break();
				$this->cloner->dlog( "Searching table: <b>$table</b>" );
				$this->cloner->dlog_break();
				// determine primary keys for this table so we know which values use as the "where" for updating
				$query = "DESCRIBE ".$quoted_table;
				$columns = $this->cloner->target_db->get_results( $query );
				$this->cloner->handle_any_db_errors( $this->cloner->target_db, $query );
				$primary_keys = array_filter( array_map( create_function('$col','return $col->Key=="PRI"? $col->Field : false;'), $columns ) );
				$this->cloner->dlog( array("Primary keys:",$primary_keys) );
				// no primary key = unable to do per row replacement so skip
				if( empty($primary_keys) ){
					$this->cloner->dlog( "SKIPPING table $quoted_table: no primary index found" );
					continue;
				}
				// fetch contents of table
				$query = "SELECT * FROM ".$quoted_table;
				$rows = $this->cloner->target_db->get_results( $query, ARRAY_A );
				$this->cloner->handle_any_db_errors( $this->cloner->target_db, $query );
				foreach( $rows as $row ){
					$data_to_fix = $edited_data = $row;
					// apply replacements to each item in row
					foreach( $edited_data as $key=>$value ){
						$count_these_replacements += ns_recursive_search_replace( $edited_data[$key], $this->cloner->request['custom_search'], $this->cloner->request['custom_replace'], array(), array(), isset($this->cloner->request['case_sensitive']) );
						$count_items_checked ++;
					}
					// the replacements changed something, so we need to run update query
					if( $edited_data !== $data_to_fix ){
						// get all values for primary key columns to use those as "where" concitions
						$primary_key_values = array_intersect_key( $data_to_fix, array_flip($primary_keys) );
						$edited_data = apply_filters( 'ns_cloner_search_replace_values', $edited_data, $table );
						$format = apply_filters( 'ns_cloner_search_replace_format', null, $table );
						$this->cloner->target_db->update(
							$table,
							$edited_data,
							$primary_key_values,
							$format
						);
						$this->cloner->dlog( $this->cloner->target_db->last_query, true );
						$this->cloner->handle_any_db_errors( $this->cloner->target_db, $this->cloner->target_db->last_query );
						do_action( 'ns_cloner_search_replace_after_update', $edited_data, $table );
					}
					$count_rows_checked++;
				}
				$count_replacements_made += $count_these_replacements;
				$this->cloner->dlog("Replacements made in <b>$table</b>: $count_these_replacements");
				$count_tables_checked++;
			}	
		}
		$this->cloner->dlog("Tables checked: $count_tables_checked");
		$this->cloner->dlog("Rows checked: $count_rows_checked");
		$this->cloner->dlog("Items checked: $count_items_checked");		
		$this->cloner->dlog("Replacements made: $count_replacements_made");
		$this->cloner->report[ __('Records searched','ns-cloner') ] = $count_rows_checked;
		$this->cloner->report[ __('Replacements made','ns-cloner') ] = $count_replacements_made;
	}
	
}
