// Version 1.0
jQuery(document).ready(function($) {
"use strict";

	var results = $('#andalu-import-results');

	// Handle form submit	
	$('#andalu-import').submit(function() {
		var submitButton = $(this).prop('disabled', true),
			result = $('<div/>', { class: 'import-result' }).appendTo('#andalu-import-results');
		result.html('Updating DB... (Please Wait)');
		
		$.ajax({
			type: "POST",
			url: andalu_country_redirect.ajax_url,
			data: $(this).serialize(),
			success: function(response) {
				if (response) {
					result.html('Completed: <br/><pre>' + response + '</pre>').addClass('completed');
				} else {
					result.html('Empty response');
				}
			},
			error: function() {
				result.html('Error sending request');
			},
			complete: function() {
				submitButton.prop('disabled', false);
			}
		});

		return false;
	});


	// Handle add more
	$('.add-another').click(function(e) {
		var fields = $(this).prev('.redirect-rule'),
			newFields = fields.clone().insertAfter(fields);
			
		newFields.find('input').each(function() {
			$(this).val('');
			var t = $(this), name = t.attr('name'), num = parseInt(name.match(/\[([0-9]+)\]/)[1]) + 1;
			t.attr('name', name.replace(/\[([0-9]+)\]/, '[' + num + ']')).val('');
		});
		return false;
	});

});