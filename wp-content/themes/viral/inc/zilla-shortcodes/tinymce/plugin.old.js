(function ()
{
	// create zillaShortcodes plugin
	tinymce.create("tinymce.plugins.zillaShortcodes",
	{
		init: function ( ed, url )
		{
			ed.addCommand("zillaPopup", function ( a, params )
			{
				var popup = params.identifier;
				
				// load thickbox
				tb_show("Insert Shortcode", url + "/popup.php?popup=" + popup + "&width=" + 800);
			});
		},
		createControl: function ( btn, e )
		{
			if ( btn == "zilla_button" )
			{	
				var a = this;
				
				var btn = e.createSplitButton('zilla_button', {
                    title: "Insert Shortcode",
					image: ZillaShortcodes.plugin_folder +"/tinymce/images/icon.png",
					icons: false
                });

                btn.onRenderMenu.add(function (c, b)
				{					
					a.addWithPopup( b, "Highlight", "highlight" );
					a.addWithPopup( b, "Accent Color", "accent" );
					a.addWithPopup( b, "Counter", "exquisite_counter" );
					a.addWithPopup( b, "Columns", "columns" );
					a.addWithPopup( b, "Alerts", "alert" );
					a.addWithPopup( b, "Buttons", "button" );
					a.addWithPopup( b, "Carousel", "exquisite_carousel" );
					a.addWithPopup( b, "Carousel - Single", "exquisite_carousel_single" );
					a.addWithPopup( b, "Services", "exquisite_service" );
					a.addWithPopup( b, "Bullet Points", "exquisite_bullet" );
					a.addWithPopup( b, "Team members", "exquisite_team_member" );
					a.addWithPopup( b, "Quote", "exquisite_quote" );
					a.addWithPopup( b, "Fontawesome Icons", "exquisite_fontawesome_small" );
					a.addWithPopup( b, "Skill Bar", "exquisite_skill" );
					a.addWithPopup( b, "Countdown", "exquisite_countdown" );
					
					c=b.addMenu({title: "Recent Sections"});
					a.addImmediate( c, "Recent Projects", "[recent_projects]" );
					a.addImmediate( c, "Recent Posts", "[recent_posts]" );
					
					c=b.addMenu({title: "Agenda"});
					a.addWithPopup( c, "Agenda - Pictures", "agenda_pictures" );
					a.addWithPopup( c, "Agenda - Icons", "agenda_icons" );
					
					c=b.addMenu({title: "Toggles"});
					a.addWithPopup( c, "Toggle Style 1", "toggle" );
					a.addWithPopup( c, "Toggle Style 2", "exquisite1_toggle" );
					a.addWithPopup( c, "Toggle Style 3", "exquisite2_toggle" );
					
					
					
					
					c=b.addMenu({title: "Tabs"});
					a.addWithPopup( c, "Tabs Style 1", "tabs" );
					a.addWithPopup( c, "Tabs Style 2", "exquisite1_tabs" );
					a.addWithPopup( c, "Tabs Style 3", "exquisite2_tabs" );
					
					c=b.addMenu({title: "Page Section"});
					a.addWithPopup( c, "Colored Page Section", "exquisite_colored");
					a.addWithPopup( c, "Background Image Page Section", "exquisite_bgimage");
				
					c=b.addMenu({title: "Media Shortcodes"});
					a.addWithPopup( c, "Photo Lightbox", "exquisite_lightbox" );
					a.addWithPopup( c, "Slider", "exquisite_slider" );
					a.addWithPopup( c, "Video", "exquisite_video" );
					
					c=b.addMenu({title: "Testimonials"});
					a.addWithPopup( c, "Single Testimonial", "exquisite_single_testimonial" );
					a.addWithPopup( c, "Testimonial Carousel", "exquisite_testimonial_carousel" );

					c=b.addMenu({title: "Social Icons"});
					a.addWithPopup( c, "Small Icons", "exquisite_social_small" );
					a.addWithPopup( c, "Large Icons", "exquisite_social_big" );		
				});
                
                return btn;
			}
			
			return null;
		},
		addWithPopup: function ( ed, title, id ) {
			ed.add({
				title: title,
				onclick: function () {
					tinyMCE.activeEditor.execCommand("zillaPopup", false, {
						title: title,
						identifier: id
					})
				}
			})
		},
		addImmediate: function ( ed, title, sc) {
			ed.add({
				title: title,
				onclick: function () {
					tinyMCE.activeEditor.execCommand( "mceInsertContent", false, sc )
				}
			})
		},
		getInfo: function () {
			return {
				longname: 'Zilla Shortcodes',
				author: 'Orman Clark',
				authorurl: 'http://themeforest.net/user/ormanclark/',
				infourl: 'http://wiki.moxiecode.com/',
				version: "1.0"
			}
		}
	});
	
	// add zillaShortcodes plugin
	tinymce.PluginManager.add("zillaShortcodes", tinymce.plugins.zillaShortcodes);
})();