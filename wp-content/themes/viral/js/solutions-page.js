(function($){
	$(function(){
		$('#business-applications-title').mouseover(function() {
			$('#business-applications').removeClass('hidden');
		});
		$('#business-applications-title').mouseleave(function() {
			$('#business-applications').addClass('hidden');
		});

		$('#communication-collaboration-title').mouseover(function() {
			$('#communication-collaboration').removeClass('hidden');
		});
		$('#communication-collaboration-title').mouseleave(function() {
			$('#communication-collaboration').addClass('hidden');
		});

		$('#security-title').mouseover(function() {
			$('#security').removeClass('hidden');
		});
		$('#security-title').mouseleave(function() {
			$('#security').addClass('hidden');
		});

		$('#web-presence-title').mouseover(function() {
			$('#web-presence').removeClass('hidden');
		});
		$('#web-presence-title').mouseleave(function() {
			$('#web-presence').addClass('hidden');
		});

		$('#vertical-solutions-title').mouseover(function() {
			$('#vertical-solutions').removeClass('hidden');
		});
		$('#vertical-solutions-title').mouseleave(function() {
			$('#vertical-solutions').addClass('hidden');
		});

		$('#cloud-management-services-title').mouseover(function() {
			$('#cloud-management-services').removeClass('hidden');
		});
		$('#cloud-management-services-title').mouseleave(function() {
			$('#cloud-management-services').addClass('hidden');
		});

		$('#infrastructure-title').mouseover(function() {
			$('#infrastructure').removeClass('hidden');
		});
		$('#infrastructure-title').mouseleave(function() {
			$('#infrastructure').addClass('hidden');
		});	
	});
})(jQuery);