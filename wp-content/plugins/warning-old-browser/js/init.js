jQuery(window).ready(function(){
		jQuery.fn.tzCheckbox = function(options){
		
		// Default On / Off labels:
		
		options = jQuery.extend({
			labels : ['ON','OFF']
		},options);
		
		return this.each(function(){
			var originalCheckBox = jQuery(this),
				labels = [];

				if(originalCheckBox.data('on')){
				labels[0] = originalCheckBox.data('on');
				labels[1] = originalCheckBox.data('off');
			}
			else labels = options.labels;

			// Creating the new checkbox markup:
			var checkBox = jQuery('<span>');
				 checkBox.addClass(this.checked?' tzCheckBox checked':'tzCheckBox');
			     checkBox.prepend('<span class="tzCBContent">'+labels[this.checked?0:1]+ '</span><span class="tzCBPart"></span>');

			// Inserting the new checkbox, and hiding the original:
			checkBox.insertAfter(originalCheckBox.hide());

			checkBox.click(function(){
				checkBox.toggleClass('checked');
				
				var isChecked = checkBox.hasClass('checked');
				
				// Synchronizing the original checkbox:
				originalCheckBox.attr('checked',isChecked);
				checkBox.find('.tzCBContent').html(labels[isChecked?0:1]);
			});
			
			// Listening for changes on the original and affecting the new one:
			originalCheckBox.bind('change',function(){
				checkBox.click();
			});
		});
	};
	
	
	jQuery('#ch_location').tzCheckbox({labels:['On','Off']});
	
	jQuery('#is_every_time_vis_panel').ezMark();
	jQuery('select').styler();
	
	var cpOptions = {
		defaultColor: false,
		change: function(event, ui){},
		clear: function() {},
		hide: true,
		palettes: true
	};

	jQuery('#bg_color').wpColorPicker(cpOptions);
	jQuery('#font_color').wpColorPicker(cpOptions);


	jQuery('#wr-options-form').submit(function() {
	         var data = jQuery(this).serialize();
	          jQuery.post(ajaxurl, data, function(response) {
	              var vRes = parseInt(jQuery.trim(response));
				  
				  if(vRes == 1) {
	                  show_message(1);
	                  t = setTimeout('fade_message()', 2000);
	              } else {
	                  show_message(2);
	                  t = setTimeout('fade_message()', 2000);
	              }
	          });
	          return false;
	 });
	 
	});
	
	function show_message(n) {
		if(n == 1) {
			jQuery('.save-options').html('<div class="icon-sc"></div><div class="text">Success saving</div>').show();
		} else {
			jQuery('.save-options').html('<div class="icon-al"></div><div class="text">Error saving</div>').show();
		}
	}
	     
	function fade_message() {
		jQuery('.save-options').fadeOut(1000);
		clearTimeout(t);
	}