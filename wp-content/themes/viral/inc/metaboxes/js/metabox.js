jQuery(document).ready(function($){
$('#post-formats-select input').change(blogMeta);
	
	function blogMeta(){
		var format = $('#post-formats-select input:checked').attr('value');
		if(typeof format != 'undefined'){
			$('#post-body div[id^=shiv_blog-]').hide();
			$('#post-body #shiv_blog-'+format+'').stop(true,true).fadeIn(100);	
		}
	}
	$(window).load(function(){
		blogMeta();
	})
});



jQuery(document).ready(function($){
$('#page_template').change(pageMeta);
	
	function pageMeta(){
		var format = $('#page_template option:selected').attr('value');
		if(typeof format != 'undefined'){
			fot = format.substring(0, format.length - 4);
			$('#post-body div[id^=shiv_page-]').hide();
			$('#post-body #shiv_page-'+fot+'').stop(true,true).fadeIn(100);	
	
		}
	}
	$(window).load(function(){
		pageMeta();
	})
});