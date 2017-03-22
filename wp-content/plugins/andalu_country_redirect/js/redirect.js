// Version 1.0
jQuery(document).ready(function($) {
"use strict";

	var andaluCookie = {
		create: function(name, value, days) {
			var expires;
			if (days) {
				var date = new Date();
				date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
				expires = "; expires=" + date.toGMTString();
			} else {
				expires = "";
			}
			document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
		},
		read: function(name) {
			var nameEQ = escape(name) + "=";
			var ca = document.cookie.split(';');
			for (var i = 0; i < ca.length; i++) {
				var c = ca[i];
				while (c.charAt(0) === ' ') c = c.substring(1, c.length);
				if (c.indexOf(nameEQ) === 0) return unescape(c.substring(nameEQ.length, c.length));
			}
			return null;
		},
		erase: function(name) {
			this.create(name, "", -1);
		}
	},
	andalu_redirect_donotshow = andaluCookie.read('andalu_redirect_donotshow');

	if (!andalu_redirect_donotshow && typeof andalu_country_redirect != 'undefined' && andalu_country_redirect) {
		var html = '',
			bg = $('<div/>', { class: 'andalu-black-overlay' }).appendTo('body'),
			popup = $('<div/>', { class: 'andalu-popup' }).appendTo('body');

		html += '<a href="#" class="close">x</a>';
		html += '<h2>' + andalu_country_redirect.title + '</h2>';
		html += '<p>' + andalu_country_redirect.message + '</p>';
		html += '<p><label><input type="checkbox" name="donotshow" /> ' + andalu_country_redirect.donotshow + '</label></p>';
		html += '<div class="andalu-button-bar left"><button class="switch">' + andalu_country_redirect.switch + '</button><button class="stay">' + andalu_country_redirect.stay + '</button></div>';
		bg.fadeIn();
		popup.html(html).fadeIn();
		
		popup.on('click', 'button.switch', function() {
			if (popup.find('input[name="donotshow"]:checked').length) { andaluCookie.create('andalu_redirect_donotshow', 1); }
			window.location = andalu_country_redirect.url;
			return false;
		}).on('click', 'button.stay', function() {
			if (popup.find('input[name="donotshow"]:checked').length) { andaluCookie.create('andalu_redirect_donotshow', 1); }
			bg.fadeOut();
			popup.fadeOut();
			return false;
		}).on('click', 'a.close', function() {
			bg.fadeOut();
			popup.fadeOut();
			return false;
		});

	}

});