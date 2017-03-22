(function($) {
"use strict";
 
 //   tinymce.init({
 //       selector: ".wp-editor-area",
 //       toolbar: "shortcodes",
  //      setup: function(editor) {


  //Shortcodes
            tinymce.PluginManager.add( 'zillaShortcodes', function( editor, url ) {

editor.addCommand("zillaPopup", function ( a, params )
{
var popup = params.identifier;
tb_show("Insert Zilla Shortcode", url + "/popup.php?popup=" + popup + "&width=" + 800);
});
     
                editor.addButton( 'zilla_button', {
                    type: 'splitbutton',
                  // image : 'MyCoolBtn.png',
                    image : url+'/images/icon.png',
title: 'Shortcodes',
onclick : function(e) {},
menu: [
{text: 'Highlight',onclick:function(){
editor.execCommand("zillaPopup", false, {title: 'Highlight',identifier: 'highlight'})
}},
{text: 'Accent Color',onclick:function(){
editor.execCommand("zillaPopup", false, {title: 'Accent Color',identifier: 'accent'})
}},
{text: 'Counter',onclick:function(){
editor.execCommand("zillaPopup", false, {title: 'Counter',identifier: 'exquisite_counter'})
}},
{text: 'Columns',onclick:function(){
editor.execCommand("zillaPopup", false, {title: 'Columns',identifier: 'columns'})
}},
{text: 'Alerts',onclick:function(){
editor.execCommand("zillaPopup", false, {title: 'Alerts',identifier: 'alert'})
}},
{text: 'Buttons',onclick:function(){
editor.execCommand("zillaPopup", false, {title: 'Buttons',identifier: 'button'})
}},
{text: 'Carousel',onclick:function(){
editor.execCommand("zillaPopup", false, {title: 'Carousel',identifier: 'exquisite_carousel'})
}},
{text: 'Carousel - Single',onclick:function(){
editor.execCommand("zillaPopup", false, {title: 'Carousel - Single',identifier: 'exquisite_carousel_single'})
}},
{text: 'Services',onclick:function(){
editor.execCommand("zillaPopup", false, {title: 'Services',identifier: 'exquisite_service'})
}},
{text: 'Bullet Points',onclick:function(){
editor.execCommand("zillaPopup", false, {title: 'Bullet Points',identifier: 'exquisite_bullet'})
}},
{text: 'Team members',onclick:function(){
editor.execCommand("zillaPopup", false, {title: 'Team members',identifier: 'exquisite_team_member'})
}},
{text: 'Quote',onclick:function(){
editor.execCommand("zillaPopup", false, {title: 'Quote',identifier: 'exquisite_quote'})
}},		
{text: 'Fontawesome Icons',onclick:function(){
editor.execCommand("zillaPopup", false, {title: 'Fontawesome Icons',identifier: 'exquisite_fontawesome_small'})
}},
{text: 'Skill Bar',onclick:function(){
editor.execCommand("zillaPopup", false, {title: 'Skill Bar',identifier: 'exquisite_skill'})
}},	
{text: 'Countdown',onclick:function(){
editor.execCommand("zillaPopup", false, {title: 'Countdown',identifier: 'exquisite_countdown'})
}},	
	
{text:'Agenda', menu:[
		{text: 'Agenda - Pictures',onclick:function(){
		editor.execCommand("zillaPopup", false, {title: 'Agenda - Pictures',identifier: 'agenda_pictures'})
		}},
		{text: 'Agenda - Icons',onclick:function(){
		editor.execCommand("zillaPopup", false, {title: 'Agenda - Icons',identifier: 'agenda_icons'})
		}}
		]},

{text:'Recent Items', menu:[
		{text: 'Recent Projects',onclick:function(){
		editor.execCommand("mceInsertContent", true, '[recent_projects]')
		}},
		{text: 'Recent Posts',onclick:function(){
		editor.execCommand("mceInsertContent", false, '[recent_posts]')
		}}
		]},


{text:'Toggles', menu:[
		{text: 'Toggle Style 1',onclick:function(){
		editor.execCommand("zillaPopup", false, {title: 'Toggle Style 1',identifier: 'toggle'})
		}},	
		{text: 'Toggle Style 2',onclick:function(){
		editor.execCommand("zillaPopup", false, {title: 'Toggle Style 2',identifier: 'exquisite1_toggle'})
		}},	
		{text: 'Toggle Style 3',onclick:function(){
		editor.execCommand("zillaPopup", false, {title: 'Toggle Style 3',identifier: 'exquisite2_toggle'})
		}}
		]},


{text:'Tabs', menu:[
		{text: 'Tabs Style 1',onclick:function(){
		editor.execCommand("zillaPopup", false, {title: 'Tabs Style 1',identifier: 'tabs'})
		}},	
		{text: 'Tabs Style 2',onclick:function(){
		editor.execCommand("zillaPopup", false, {title: 'Tabs Style 2',identifier: 'exquisite1_tabs'})
		}},	
		{text: 'Tabs Style 3',onclick:function(){
		editor.execCommand("zillaPopup", false, {title: 'Tabs Style 3',identifier: 'exquisite2_tabs'})
		}}
		]},


{text:'Page Sections', menu:[
		{text: 'Colored Page Section',onclick:function(){
		editor.execCommand("zillaPopup", false, {title: 'Colored Page Section',identifier: 'exquisite_colored'})
		}},	
		{text: 'Background Image Page Section',onclick:function(){
		editor.execCommand("zillaPopup", false, {title: 'Background Image Page Section',identifier: 'exquisite_bgimage'})
		}}
		]},
		
		
{text:'Media Shortcodes', menu:[
		{text: 'Photo Lightbox',onclick:function(){
		editor.execCommand("zillaPopup", false, {title: 'Photo Lightbox',identifier: 'exquisite_lightbox'})
		}},	
		{text: 'Slider',onclick:function(){
		editor.execCommand("zillaPopup", false, {title: 'Slider',identifier: 'exquisite_slider'})
		}},	
		{text: 'Video',onclick:function(){
		editor.execCommand("zillaPopup", false, {title: 'Video',identifier: 'exquisite_video'})
		}}
		]},



{text:'Testimonials', menu:[
		{text: 'Single Testimonial',onclick:function(){
		editor.execCommand("zillaPopup", false, {title: 'Single Testimonial',identifier: 'exquisite_single_testimonial'})
		}},	
		{text: 'Testimonial Carousel',onclick:function(){
		editor.execCommand("zillaPopup", false, {title: 'Testimonial Carousel',identifier: 'exquisite_testimonial_carousel'})
		}}
		]},
		
		
	
{text:'Social Icons', menu:[
		{text: 'Small Icons',onclick:function(){
		editor.execCommand("zillaPopup", false, {title: 'Small Icons',identifier: 'exquisite_social_small'})
		}},	
		{text: 'Large Icons',onclick:function(){
		editor.execCommand("zillaPopup", false, {title: 'Large Icons',identifier: 'exquisite_social_big'})
		}}
		]},
				
				

					]

					});

					});

				//	}

				//	});

 
})(jQuery);