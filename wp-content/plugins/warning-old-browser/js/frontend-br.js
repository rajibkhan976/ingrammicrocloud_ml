jQuery(document).ready(function(){
	
	if (jQuery('.container_warning').length > 0) {
		jQuery('.close-br').live("click", function() { 
			if (window.veffect_easing == "Fade") {
				jQuery('.container_warning').fadeOut('slow');    
			} else if (window.veffect_easing == "SlideToggle") { 
				jQuery('.container_warning').slideToggle(120);    
			} 	
		});
	}	
	
	if (jQuery('#modal-wr').length > 0) {
		jQuery('#mdoal-wr-open').fancybox({
			maxWidth	: 500,
			maxHeight	: 200,
			fitToView	: false,
			width		: '70%',
			height		: '70%',
			autoSize	: false,
			closeClick	: false,
			openEffect	: 'none',
			closeEffect	: 'none',
			padding		: 0
		});
		jQuery('#mdoal-wr-open').trigger('click');
	}
	
});

