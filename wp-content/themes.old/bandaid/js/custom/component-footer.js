jQuery(document).ready(function($) {
	
	$('.newsletter-ajax-form').on('submit', function(e) {
		e.preventDefault();
 
		var $form = $(this);
 
		$.post($form.attr('action'), $form.serialize(), function(data) {
			if(data.error){
				$("#email_address").css('border', "1px solid red");
				$(".bg-success").html('').hide();
				$(".bg-danger").html(data.error_message).show('slow');
			}else{
				$(".bg-danger").html('').hide();
				$(".bg-success").html(data.success_message).show('slow');
				$("#email_address").css('border', "1px solid #ffffff");
				$("#email_address").val('');
			}
			
		}, 'json');
	});
 
});