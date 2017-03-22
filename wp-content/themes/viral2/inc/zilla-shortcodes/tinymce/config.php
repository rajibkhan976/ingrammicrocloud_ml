<?php

/*-----------------------------------------------------------------------------------*/
/*	Highlight
/*-----------------------------------------------------------------------------------*/
$zilla_shortcodes['highlight'] = array(

	'no_preview' => true,

		'params' => array(
			'text' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Content', 'textdomain'),
				)
		),
		'shortcode' => '[highlight text="{{text}}"]',
		'popup_title' => __('Insert Highlighted Text', 'textdomain'),
	
);


/*-----------------------------------------------------------------------------------*/
/*	Countdown
/*-----------------------------------------------------------------------------------*/
$zilla_shortcodes['exquisite_countdown'] = array(

	'no_preview' => true,

		'params' => array(
			'year' => array(
				'std' => '2015',
				'type' => 'text',
				'label' => __('Year', 'textdomain'),
				),
			'month' => array(
				'std' => '7',
				'type' => 'text',
				'label' => __('Countdown Color', 'textdomain'),
				),
			'day' => array(
				'std' => '22',
				'type' => 'text',
				'label' => __('Countdown Color', 'textdomain'),
				),
		),
		'shortcode' => '[exquisite_countdown year="{{year}}" month="{{month}}" day="{{day}}"]',
		'popup_title' => __('Insert Countdown', 'textdomain'),
	
);


/*-----------------------------------------------------------------------------------*/
/*	Counter
/*-----------------------------------------------------------------------------------*/
$zilla_shortcodes['exquisite_counter'] = array(
	'no_preview' => true,
	'params' => array(
		'number' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Number', 'textdomain'),
			'desc' => __('Enter final number', 'textdomain'),
		),
		'color' => array(
			'std' => '#fff',
			'type' => 'text',
			'label' => __('Color', 'textdomain'),
			'desc' => __('Select counter color using hex code, e.g. #fff', 'textdomain')
			
		),
		'description' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Description', 'textdomain'),
			'desc' => __('Enter counter description', 'textdomain'),
		),
		'icon' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Fontawesome Icon Code', 'textdomain'),
			'desc' => __('Enter a fornawesome icon code, e.g. "fa-music". See the cheatsheet <a href="http://fortawesome.github.io/Font-Awesome/cheatsheet/" target=blank>here.</a>', 'textdomain'),
		)
		),
	'shortcode' => '[exquisite_counter number="{{number}}" color="{{color}}" description="{{description}}" icon="{{icon}}"]',	
	'popup_title' => __('Insert Counter Shortcode', 'textdomain')
);


/*-----------------------------------------------------------------------------------*/
/*	Accent
/*-----------------------------------------------------------------------------------*/
$zilla_shortcodes['accent'] = array(

	'no_preview' => true,

		'params' => array(
			'text' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Content', 'textdomain'),
				)
		),
		'shortcode' => '[accent text="{{text}}"]',
		'popup_title' => __('Insert Accented Text', 'textdomain'),
	
);


/*-----------------------------------------------------------------------------------*/
/*	Bullet Points
/*-----------------------------------------------------------------------------------*/
$zilla_shortcodes['exquisite_bullet'] = array(
	'params' => array(),
	'shortcode' => ' [exquisite_bullet]{{child_shortcode}}[/exquisite_bullet]', 
	'popup_title' => __('Insert Bullet Points', 'textdomain'),
	'no_preview' => true,
	
	// child shortcode is clonable & sortable
	'child_shortcode' => array(
		'params' => array(
			'point' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Bullet Point', 'textdomain'),
				)
		),
		'shortcode' => '[exquisite_point point="{{point}}"]',
		'clone_button' => __('Add Bullet Point', 'textdomain')
	)
);

/*-----------------------------------------------------------------------------------*/
/*	Social Small
/*-----------------------------------------------------------------------------------*/
$zilla_shortcodes['exquisite_social_small'] = array(
	'params' => array(),
	'shortcode' => ' [exquisite_social_small]{{child_shortcode}}[/exquisite_social_small]', 
	'popup_title' => __('Insert Social Shortcode', 'textdomain'),
	'no_preview' => true,
	
	// child shortcode is clonable & sortable
	'child_shortcode' => array(
		'params' => array(
			'network' => array(
				'type' => 'select',
				'label' => __('Social network', 'textdomain'),
				'options' => array(
					'fa_facebook' => 'Facebook',
					'fa_flickr' => 'Flickr',
					'fa_google_plus' => 'Googleplus',
					'fa_linkedin' => 'Linkedin',
					'fa_pinterest' => 'Pinterest',
					'fa_skype' => 'Skype',
					'fa_github' => 'Github',
					'fa_tumblr' => 'Tumblr',
					'fa_twitter' => 'Twitter',
					'fa_vimeo_square' => 'Vimeo',
					'fa_youtube' => 'Youtube',
					'fa_instagram' => 'Instagram',
					'fa_dribbble' => 'Dribbble',
					'fa_rss' => 'Rss',
					'fa_envelope' => 'Mail',
					'fa_foursquare' => 'Foursquare',
				)
			),
			'url' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Social Network URL', 'textdomain'),
			)
		),
		'shortcode' => '[{{network}} url="{{url}}"]',
		'clone_button' => __('Add Social Button', 'textdomain')
	)
);



/*-----------------------------------------------------------------------------------*/
/*	Agenda - Pictures
/*-----------------------------------------------------------------------------------*/
$zilla_shortcodes['agenda_pictures'] = array(
	'params' => array(),
	'shortcode' => '[agenda_pictures]{{child_shortcode}}[/agenda_pictures]', 
	'popup_title' => __('Insert Agenda Shortcode', 'textdomain'),
	'no_preview' => true,
	
	// child shortcode is clonable & sortable
	'child_shortcode' => array(
		'params' => array(
			'align' => array(
				'type' => 'select',
				'label' => __('Item Align', 'textdomain'),
				'options' => array(
					'left' => 'Left',
					'right' => 'Right',
				)
			),
			'url' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Image URL (square, proportional dimensions, eg. 200px x 200px)', 'textdomain'),
			),
			'content' => array(
				'std' => '',
				'type' => 'textarea',
				'label' => __('Content', 'textdomain'),
			)
		),
		'shortcode' => '[agenda_item_picture align="{{align}}" url="{{url}}"] {{content}} [/agenda_item_picture]',
		'clone_button' => __('Add Agenda Item', 'textdomain')
	)
);


/*-----------------------------------------------------------------------------------*/
/*	Agenda - Icons
/*-----------------------------------------------------------------------------------*/
$zilla_shortcodes['agenda_icons'] = array(
	'params' => array(),
	'shortcode' => '[agenda_icons]{{child_shortcode}}[/agenda_icons]', 
	'popup_title' => __('Insert Agenda Shortcode', 'textdomain'),
	'no_preview' => true,
	
	// child shortcode is clonable & sortable
	'child_shortcode' => array(
		'params' => array(
			'align' => array(
				'type' => 'select',
				'label' => __('Item Align', 'textdomain'),
				'options' => array(
					'left' => 'Left',
					'right' => 'Right',
				)
			),
			'icon' => array(
				'std' => '',
				'type' => 'text',
				'desc' => __('Enter a fornawesome icon code, e.g. "fa-music". See the cheatsheet <a href="http://fortawesome.github.io/Font-Awesome/cheatsheet/" target=blank>here.</a>', 'textdomain'),
			),
			'content' => array(
				'std' => '',
				'type' => 'textarea',
				'label' => __('Content', 'textdomain'),
			)
		),
		'shortcode' => '[agenda_item_icon align="{{align}}" icon="{{icon}}"] {{content}} [/agenda_item_icon]',
		'clone_button' => __('Add Agenda Item', 'textdomain')
	)
);
/*-----------------------------------------------------------------------------------*/
/*	Service
/*-----------------------------------------------------------------------------------*/
$zilla_shortcodes['exquisite_service'] = array(
	'no_preview' => true,
	'params' => array(
		'icon' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Fontawesome Icon Code', 'textdomain'),
			'desc' => __('Enter a fornawesome icon code, e.g. "fa-music". See the cheatsheet <a href="http://fortawesome.github.io/Font-Awesome/cheatsheet/" target=blank>here.</a>', 'textdomain'),
		),
		
		'name' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Name', 'textdomain'),
			'desc' => __('Enter service name', 'textdomain'),
		),
		
		'description' => array(
			'std' => '',
			'type' => 'textarea',
			'label' => __('Description', 'textdomain'),
			'desc' => __('Enter service description', 'textdomain'),
		),
		
		),
	'shortcode' => '[exquisite_service name="{{name}}" icon="{{icon}}" description="{{description}}"]',	
	'popup_title' => __('Insert Service Shortcode', 'textdomain')
);




/*-----------------------------------------------------------------------------------*/
/*	Fontawesome Big Icons
/*-----------------------------------------------------------------------------------*/
$zilla_shortcodes['exquisite_fontawesome_big'] = array(
	'no_preview' => true,
	'params' => array(
		'icon' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Fontawesome Icon Code', 'textdomain'),
			'desc' => __('Enter a fornawesome icon code, e.g. "fa-music". See the cheatsheet <a href="http://fortawesome.github.io/Font-Awesome/cheatsheet/" target=blank>here.</a>', 'textdomain'),
		)
		
		),
	'shortcode' => '[exquisite_fontawesome_big icon={{icon}}]',	
	'popup_title' => __('Insert FontAwesome Icon', 'textdomain')
);



/*-----------------------------------------------------------------------------------*/
/*	Fontawesome Small Icons
/*-----------------------------------------------------------------------------------*/
$zilla_shortcodes['exquisite_fontawesome_small'] = array(
	'no_preview' => true,
	'params' => array(
		'icon' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Fontawesome Icon Code', 'textdomain'),
			'desc' => __('Enter a fornawesome icon code, e.g. "fa-music". See the cheatsheet <a href="http://fortawesome.github.io/Font-Awesome/cheatsheet/" target=blank>here.</a>', 'textdomain'),
		)
		
		),
	'shortcode' => '[exquisite_fontawesome_small icon={{icon}}]',	
	'popup_title' => __('Insert FontAwesome Icon', 'textdomain')
);

/*-----------------------------------------------------------------------------------*/
/*	Colored Section
/*-----------------------------------------------------------------------------------*/
$zilla_shortcodes['exquisite_colored'] = array(
	'no_preview' => true,
	'params' => array(
		'bg_color' => array(
			'std' => '#fff',
			'type' => 'text',
			'label' => __('Background Color', 'textdomain'),
			'desc' => __('Select section background color using hex code, e.g. #000000', 'textdomain')
			
		),

		'content' => array(
			'std' => 'content',
			'type' => 'text',
			'label' => __('Section Content', 'textdomain')
		)

		),
	'shortcode' => '[exquisite_colored bg_color="{{bg_color}}"]{{content}}[/exquisite_colored]',	
	'popup_title' => __('Insert Colored Section Shortcode', 'textdomain')
);


/*-----------------------------------------------------------------------------------*/
/*	Background Image Section
/*-----------------------------------------------------------------------------------*/
$zilla_shortcodes['exquisite_bgimage'] = array(
	'no_preview' => true,
	'params' => array(
		'bg_image' => array(
			'type' => 'text',
			'label' => __('Background Image Url', 'textdomain'),
			'desc' => __('Enter background image url (minimum 1600x500px size is recommended)', 'textdomain')
			
		),

		'content' => array(
			'std' => 'content',
			'type' => 'text',
			'label' => __('Section Content', 'textdomain')
		)

		),
	'shortcode' => '[exquisite_bgimage bg_image="{{bg_image}}"]{{content}}[/exquisite_bgimage]',	
	'popup_title' => __('Insert BG Image Section Shortcode', 'textdomain')
);


/*-----------------------------------------------------------------------------------*/
/*	Carousel
/*-----------------------------------------------------------------------------------*/
$zilla_shortcodes['exquisite_carousel'] = array(
	'params' => array(),
	'shortcode' => ' [exquisite_carousel]{{child_shortcode}}[/exquisite_carousel]', 
	'popup_title' => __('Insert Carousel Shortcode', 'textdomain'),
	'no_preview' => true,
	
	// child shortcode is clonable & sortable
	'child_shortcode' => array(
		'params' => array(
			'content' => array(
				'type' => 'textarea',
				'label' => __('Insert Item Content', 'textdomain'),
				'desc' => __('Insert content of the carousel item (text, image url etc.)', 'textdomain')
			)
		),
		'shortcode' => '[item_content]{{content}}[/item_content]',
		'clone_button' => __('Add Item', 'textdomain')
	)
);


/*-----------------------------------------------------------------------------------*/
/*	Carousel - Single
/*-----------------------------------------------------------------------------------*/
$zilla_shortcodes['exquisite_carousel_single'] = array(
	'params' => array(),
	'shortcode' => ' [exquisite_carousel_single]{{child_shortcode}}[/exquisite_carousel_single]', 
	'popup_title' => __('Insert Carousel Shortcode', 'textdomain'),
	'no_preview' => true,
	
	// child shortcode is clonable & sortable
	'child_shortcode' => array(
		'params' => array(
			'content' => array(
				'type' => 'textarea',
				'label' => __('Insert Item Content', 'textdomain'),
				'desc' => __('Insert content of the carousel item (text, image url etc.)', 'textdomain')
			)
		),
		'shortcode' => '[item_content_single]{{content}}[/item_content_single]',
		'clone_button' => __('Add Item', 'textdomain')
	)
);

/*-----------------------------------------------------------------------------------*/
/*	Social big
/*-----------------------------------------------------------------------------------*/
$zilla_shortcodes['exquisite_social_big'] = array(
	'params' => array(),
	'shortcode' => ' [exquisite_social_big]{{child_shortcode}}[/exquisite_social_big]', 
	'popup_title' => __('Insert Social Shortcode', 'textdomain'),
	'no_preview' => true,
	
	// child shortcode is clonable & sortable
	'child_shortcode' => array(
		'params' => array(
			'network' => array(
				'type' => 'select',
				'label' => __('Social network', 'textdomain'),
				'options' => array(
					'fa_facebook' => 'Facebook',
					'fa_flickr' => 'Flickr',
					'fa_google_plus' => 'Googleplus',
					'fa_linkedin' => 'Linkedin',
					'fa_pinterest' => 'Pinterest',
					'fa_skype' => 'Skype',
					'fa_github' => 'Github',
					'fa_tumblr' => 'Tumblr',
					'fa_twitter' => 'Twitter',
					'fa_vimeo_square' => 'Vimeo',
					'fa_youtube' => 'Youtube',
					'fa_instagram' => 'Instagram',
					'fa_dribbble' => 'Dribbble',
					'fa_rss' => 'Rss',
					'fa_envelope' => 'Mail',
					'fa_foursquare' => 'Foursquare',
				)
			),
			'url' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Social Network URL', 'textdomain'),
			)
		),
		'shortcode' => '[{{network}} url="{{url}}"]',
		'clone_button' => __('Add Social Button', 'textdomain')
	)
);


/*-----------------------------------------------------------------------------------*/
/* Testimonial Carousel
/*-----------------------------------------------------------------------------------*/


$zilla_shortcodes['exquisite_testimonial_carousel'] = array(
	'params' => array(),
	'shortcode' => ' [exquisite_testimonial_carousel]{{child_shortcode}}[/exquisite_testimonial_carousel]', 
	'popup_title' => __('Insert Testimonial Carousel Shortcode', 'textdomain'),
	'no_preview' => true,
	
	// child shortcode is clonable & sortable
	'child_shortcode' => array(
			'params' => array(
				'name' => array(
					'std' => '',
					'type' => 'text',
					'label' => __('Name', 'textdomain'),
				),
				'company' => array(
					'std' => '',
					'type' => 'text',
					'label' => __('Company', 'textdomain'),
				),
				'testimonial' => array(
					'std' => '',
					'type' => 'textarea',
					'label' => __('Testimonial', 'textdomain'),
				),
		'color' => array(
			'std' => '#fff',
			'type' => 'text',
			'label' => __('Font Color (eg. #ffffff)', 'textdomain'),
		),
				
			'stars' => array(
				'type' => 'select',
				'label' => __('Number of start given', 'textdomain'),
				'options' => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5',
				)
			),
		
			),
		'shortcode' => '[exquisite_single_testimonial name="{{name}}" company="{{company}}" testimonial="{{testimonial}}" color="{{color}}" stars="{{stars}}"]',
		'clone_button' => __('Add Another Testimonial', 'textdomain')
	)
);

/*-----------------------------------------------------------------------------------*/
/*	Single Testimonial
/*-----------------------------------------------------------------------------------*/


$zilla_shortcodes['exquisite_single_testimonial'] = array(
	'no_preview' => true,
	'params' => array(
		'name' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Name', 'textdomain'),
		),
		
		'company' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Company', 'textdomain'),
		),
		
		'testimonial' => array(
			'std' => '',
			'type' => 'textarea',
			'label' => __('Testimonial', 'textdomain'),
		),
		
		'color' => array(
			'std' => '#fff',
			'type' => 'text',
			'label' => __('Font Color (eg. #ffffff)', 'textdomain'),
		),
		'stars' => array(
				'type' => 'select',
				'label' => __('Number of start given', 'textdomain'),
				'options' => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5',
				)
			),

	),
	'shortcode' => '[exquisite_single_testimonial name="{{name}}" company="{{company}}" testimonial="{{testimonial}}" color="{{color}}" stars="{{stars}}"]',
	'popup_title' => __('Insert Testimonial Shortcode', 'textdomain'),

);


/*-----------------------------------------------------------------------------------*/
/*	Team member config
/*-----------------------------------------------------------------------------------*/


$zilla_shortcodes['exquisite_team_member'] = array(
	'no_preview' => true,
	'params' => array(
		'first_name' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Member first name', 'textdomain'),
		),
		
		'last_name' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Member last name', 'textdomain'),
		),
		'function' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Member function', 'textdomain'),
		),
		
		'url' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Member photo url', 'textdomain'),
		),
		
		'description' => array(
			'std' => '',
			'type' => 'textarea',
			'label' => __('Description', 'textdomain'),
		)

	),
	'shortcode' => '[exquisite_team_member first_name="{{first_name}}" last_name="{{last_name}}" function="{{function}}" url="{{url}}" description="{{description}}"]
					{{child_shortcode}}[/exquisite_team_member]',
	'popup_title' => __('Insert Team Member Shortcode', 'textdomain'),
	// child shortcode is clonable & sortable
		'child_shortcode' => array(
		'params' => array(
			'network' => array(
				'type' => 'select',
				'label' => __('Social network', 'textdomain'),
				'options' => array(
					'fa_facebook' => 'Facebook',
					'fa_flickr' => 'Flickr',
					'fa_google_plus' => 'Googleplus',
					'fa_linkedin' => 'Linkedin',
					'fa_pinterest' => 'Pinterest',
					'fa_skype' => 'Skype',
					'fa_github' => 'Github',
					'fa_tumblr' => 'Tumblr',
					'fa_twitter' => 'Twitter',
					'fa_vimeo_square' => 'Vimeo',
					'fa_youtube' => 'Youtube',
					'fa_instagram' => 'Instagram',
					'fa_dribbble' => 'Dribbble',
					'fa_rss' => 'Rss',
					'fa_envelope' => 'Mail',
					'fa_foursquare' => 'Foursquare',
		
				)
			),
			'url' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Social Network URL', 'textdomain'),
			)
		),
		'shortcode' => '[{{network}} url="{{url}}"]',
		'clone_button' => __('Add Social Button', 'textdomain')
	)
);



/*-----------------------------------------------------------------------------------*/
/*	Button Config
/*-----------------------------------------------------------------------------------*/


$zilla_shortcodes['button'] = array(
	'no_preview' => true,
	'params' => array(
		'url' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Button URL', 'textdomain'),
			'desc' => __('Add the button\'s url eg http://example.com', 'textdomain')
		),
		'color' => array(
			'std' => '#000000',
			'type' => 'text',
			'label' => __('Button Color', 'textdomain'),
			'desc' => __('Select the button\'s color using hex code, e.g. #000000', 'textdomain')
			
		),
		'size' => array(
			'type' => 'select',
			'label' => __('Button Size', 'textdomain'),
			'desc' => __('Select the button\'s size', 'textdomain'),
			'options' => array(
				'small' => 'Small',
				'medium' => 'Medium',
				'large' => 'Large'
			)
		),
		'type' => array(
			'type' => 'select',
			'label' => __('Button Type', 'textdomain'),
			'desc' => __('Select the button\'s type', 'textdomain'),
			'options' => array(
				'round' => 'Round',
				'square' => 'Square'
			)
		),
		'target' => array(
			'type' => 'select',
			'label' => __('Button Target', 'textdomain'),
			'desc' => __('_self = open in same window. _blank = open in new window', 'textdomain'),
			'options' => array(
				'_self' => '_self',
				'_blank' => '_blank'
			)
		),
		'content' => array(
			'std' => 'Button Text',
			'type' => 'text',
			'label' => __('Button\'s Text', 'textdomain'),
			'desc' => __('Add the button\'s text', 'textdomain')
		)
	),
	'shortcode' => '[zilla_button url="{{url}}" color="{{color}}" size="{{size}}" type="{{type}}" target="{{target}}"] {{content}} [/zilla_button]',
	'popup_title' => __('Insert Button Shortcode', 'textdomain')
);





/*-----------------------------------------------------------------------------------*/
/*	Alert Config
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['alert'] = array(
	'no_preview' => true,
	'params' => array(
		'background' => array(
			'std' => '#ffe6e3',
			'type' => 'text',
			'label' => __('Background Color', 'textdomain'),
			'desc' => __('Select the alert\'s background color using hex code, e.g. #ffe6e3', 'textdomain'),
		),
		'border' => array(
			'std' => '#f2c3bf',
			'type' => 'text',
			'label' => __('Border Color', 'textdomain'),
			'desc' => __('Select the alert\'s border color using hex code, e.g. #e9d477', 'textdomain'),
		),
		'content' => array(
			'std' => 'Your Alert!',
			'type' => 'textarea',
			'label' => __('Alert Text', 'textdomain'),
			'desc' => __('Add the alert\'s text', 'textdomain'),
		)
		
	),
	'shortcode' => '[zilla_alert border="{{border}}" background="{{background}}"] {{content}} [/zilla_alert]',
	'popup_title' => __('Insert Alert Shortcode', 'textdomain')
);

/*-----------------------------------------------------------------------------------*/
/*	Toggle Config
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['toggle'] = array(
	'no_preview' => true,
	'params' => array(
		'title' => array(
			'type' => 'text',
			'label' => __('Toggle Content Title', 'textdomain'),
			'desc' => __('Add the title that will go above the toggle content', 'textdomain'),
			'std' => 'Title'
		),
		'content' => array(
			'std' => 'Content',
			'type' => 'textarea',
			'label' => __('Toggle Content', 'textdomain'),
			'desc' => __('Add the toggle content. Will accept HTML', 'textdomain'),
		),
		'state' => array(
			'type' => 'select',
			'label' => __('Toggle State', 'textdomain'),
			'desc' => __('Select the state of the toggle on page load', 'textdomain'),
			'options' => array(
				'open' => 'Open',
				'closed' => 'Closed'
			)
		),
		
	),
	'shortcode' => '[zilla_toggle title="{{title}}" state="{{state}}"] {{content}} [/zilla_toggle]',
	'popup_title' => __('Insert Toggle Content Shortcode', 'textdomain')
);


/*-----------------------------------------------------------------------------------*/
/*	Toggle Config 2
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['exquisite1_toggle'] = array(
	'no_preview' => true,
	'params' => array(
		'title' => array(
			'type' => 'text',
			'label' => __('Toggle Content Title', 'textdomain'),
			'desc' => __('Add the title that will go above the toggle content', 'textdomain'),
			'std' => 'Title'
		),
		'content' => array(
			'std' => 'Content',
			'type' => 'textarea',
			'label' => __('Toggle Content', 'textdomain'),
			'desc' => __('Add the toggle content. Will accept HTML', 'textdomain'),
		),
		'state' => array(
			'type' => 'select',
			'label' => __('Toggle State', 'textdomain'),
			'desc' => __('Select the state of the toggle on page load', 'textdomain'),
			'options' => array(
				'open' => 'Open',
				'closed' => 'Closed'
			)
		),
		
	),
	'shortcode' => '[exquisite1_toggle title="{{title}}" state="{{state}}"] {{content}} [/exquisite1_toggle]',
	'popup_title' => __('Insert Toggle Content Shortcode', 'textdomain')
);


/*-----------------------------------------------------------------------------------*/
/*	Toggle Config 3
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['exquisite2_toggle'] = array(
	'no_preview' => true,
	'params' => array(
		'title' => array(
			'type' => 'text',
			'label' => __('Toggle Content Title', 'textdomain'),
			'desc' => __('Add the title that will go above the toggle content', 'textdomain'),
			'std' => 'Title'
		),
		'content' => array(
			'std' => 'Content',
			'type' => 'textarea',
			'label' => __('Toggle Content', 'textdomain'),
			'desc' => __('Add the toggle content. Will accept HTML', 'textdomain'),
		),
		'state' => array(
			'type' => 'select',
			'label' => __('Toggle State', 'textdomain'),
			'desc' => __('Select the state of the toggle on page load', 'textdomain'),
			'options' => array(
				'open' => 'Open',
				'closed' => 'Closed'
			)
		),
		
	),
	'shortcode' => '[exquisite2_toggle title="{{title}}" state="{{state}}"] {{content}} [/exquisite2_toggle]',
	'popup_title' => __('Insert Toggle Content Shortcode', 'textdomain')
);



/*-----------------------------------------------------------------------------------*/
/*	Tabs Config
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['tabs'] = array(
    'params' => array(),
    'no_preview' => true,
    'shortcode' => '[zilla_tabs] {{child_shortcode}}  [/zilla_tabs]',
    'popup_title' => __('Insert Tab Shortcode', 'textdomain'),
    
    'child_shortcode' => array(
        'params' => array(
            'title' => array(
                'std' => 'Title',
                'type' => 'text',
                'label' => __('Tab Title', 'textdomain'),
                'desc' => __('Title of the tab', 'textdomain'),
            ),
            'content' => array(
                'std' => 'Tab Content',
                'type' => 'textarea',
                'label' => __('Tab Content', 'textdomain'),
                'desc' => __('Add the tabs content', 'textdomain')
            )
        ),
        'shortcode' => '[zilla_tab title="{{title}}"] {{content}} [/zilla_tab]',
        'clone_button' => __('Add Tab', 'textdomain')
    )
);


/*-----------------------------------------------------------------------------------*/
/*	Tabs2 Config
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['exquisite1_tabs'] = array(
    'params' => array(),
    'no_preview' => true,
    'shortcode' => '[exquisite1_tabs] {{child_shortcode}}  [/exquisite1_tabs]',
    'popup_title' => __('Insert Tab Shortcode', 'textdomain'),
    
    'child_shortcode' => array(
        'params' => array(
            'title' => array(
                'std' => 'Title',
                'type' => 'text',
                'label' => __('Tab Title', 'textdomain'),
                'desc' => __('Title of the tab', 'textdomain'),
            ),
            'content' => array(
                'std' => 'Tab Content',
                'type' => 'textarea',
                'label' => __('Tab Content', 'textdomain'),
                'desc' => __('Add the tabs content', 'textdomain')
            )
        ),
        'shortcode' => '[exquisite1_tab title="{{title}}"] {{content}} [/exquisite1_tab]',
        'clone_button' => __('Add Tab', 'textdomain')
    )
);



/*-----------------------------------------------------------------------------------*/
/*	Tabs3 Config
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['exquisite2_tabs'] = array(
    'params' => array(),
    'no_preview' => true,
    'shortcode' => '[exquisite2_tabs] {{child_shortcode}}  [/exquisite2_tabs]',
    'popup_title' => __('Insert Tab Shortcode', 'textdomain'),
    
    'child_shortcode' => array(
        'params' => array(
            'title' => array(
                'std' => 'Title',
                'type' => 'text',
                'label' => __('Tab Title', 'textdomain'),
                'desc' => __('Title of the tab', 'textdomain'),
            ),
            'content' => array(
                'std' => 'Tab Content',
                'type' => 'textarea',
                'label' => __('Tab Content', 'textdomain'),
                'desc' => __('Add the tabs content', 'textdomain')
            )
        ),
        'shortcode' => '[exquisite2_tab title="{{title}}"] {{content}} [/exquisite2_tab]',
        'clone_button' => __('Add Tab', 'textdomain')
    )
);


/*-----------------------------------------------------------------------------------*/
/*	Quote Config
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['exquisite_quote'] = array(
	'no_preview' => true,
	'params' => array(
		'quote' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Quote content', 'textdomain')
		),
		
		'source' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Quote source', 'textdomain'),
		)
		
	),
        'shortcode' => '[exquisite_quote quote="{{quote}}" source="{{source}}"]',
        'clone_button' => __('Add Quote', 'textdomain')
    
);

/*-----------------------------------------------------------------------------------*/
/*	Skills Config
/*-----------------------------------------------------------------------------------*/


$zilla_shortcodes['exquisite_skill'] = array(
	'no_preview' => true,
	'params' => array(
		'name' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Skill name', 'textdomain'),
			'desc' => __('Enter the skill name', 'textdomain'),
		),
		
		'percentage' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Percentage', 'textdomain'),
			'desc' => __('Set up % value', 'textdomain'),
		)
		
	),
	'shortcode' => '[exquisite_skill name="{{name}}" percentage="{{percentage}}"]',	
	'popup_title' => __('Insert Skillbar Shortcode', 'textdomain')
);


/*-----------------------------------------------------------------------------------*/
/*	Circle skills Config
/*-----------------------------------------------------------------------------------*/


$zilla_shortcodes['exquisite_circle_skill'] = array(
	'no_preview' => true,
	'params' => array(
		'name' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Skill name', 'textdomain'),
			'desc' => __('Enter the skill name', 'textdomain'),
		),
		
		'bg_color' => array(
			'std' => '#fff',
			'type' => 'text',
			'label' => __('Background Color', 'textdomain'),
			'desc' => __('Select skill background color using hex code, e.g. #000000', 'textdomain')
			
		),
		
		'description' => array(
			'std' => '',
			'type' => 'textarea',
			'label' => __('Skill description (optional)', 'textdomain'),
			'desc' => __('Enter skill description', 'textdomain'),
		),
		
		'percentage' => array(
			'std' => '90',
			'type' => 'text',
			'label' => __('Percentage', 'textdomain'),
			'desc' => __('Set up % value (without % character)', 'textdomain'),
		)
		
	),
	'shortcode' => '[exquisite_circle_skill name="{{name}}" percentage="{{percentage}}" description="{{description}}" bg_color={{bg_color}}]',	
	'popup_title' => __('Insert Circle Skillbar Shortcode', 'textdomain')
);

/*-----------------------------------------------------------------------------------*/
/*	Columns Config
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['columns'] = array(
	'params' => array(),
	'shortcode' => ' {{child_shortcode}} ', // as there is no wrapper shortcode
	'popup_title' => __('Insert Columns Shortcode', 'textdomain'),
	'no_preview' => true,
	
	// child shortcode is clonable & sortable
	'child_shortcode' => array(
		'params' => array(
			'column' => array(
				'type' => 'select',
				'label' => __('Column Type', 'textdomain'),
				'desc' => __('Select the type, ie width of the column.', 'textdomain'),
				'options' => array(
				'one_third' => 'One Third',
					'one_third_first' => 'One Third First',
					'one_third_last' => 'One Third Last',
					'two_thirds' => 'Two Thirds',
					'two_thirds_first' => 'Two Thirds First',
					'two_thirds_last' => 'Two Thirds Last',
					'one_half' => 'One Half',
					'one_half_first' => 'One Half First',
					'one_half_last' => 'One Half Last',
					'one_fourth' => 'One Fourth',
					'one_fourth_first' => 'One Fourth First',
					'one_fourth_last' => 'One Fourth Last',
					'three_fourth' => 'Three Fourth',
					'three_fourth_first' => 'Three Fourth First',
					'three_fourth_last' => 'Three Fourth Last'
				

				 
				)
			),
			'content' => array(
				'std' => '',
				'type' => 'textarea',
				'label' => __('Column Content', 'textdomain'),
				'desc' => __('Add the column content.', 'textdomain'),
			)
		),
		'shortcode' => '[{{column}}] {{content}} [/{{column}}] ',
		'clone_button' => __('Add Column', 'textdomain')
	)
);

/*-----------------------------------------------------------------------------------*/
/*	Lightbox Config
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['exquisite_lightbox'] = array(
	'no_preview' => true,
	'params' => array(
		'thumb' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Thumb URL', 'textdomain'),
			'desc' => __('Enter thumb image url', 'textdomain'),
		),
		
		'full' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Image URL', 'textdomain'),
			'desc' => __('Enter full image url (optional)', 'textdomain'),
		),
		
		'alt' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Alttext', 'textdomain'),
			'desc' => __('Enter alt text / photo caption', 'textdomain'),
		)
		
	),
	'shortcode' => '[exquisite_lightbox thumb_url="{{thumb}}" image_url="{{full}}" alt="{{alt}}"]',	
	'popup_title' => __('Insert Lightbox Shortcode', 'textdomain')
);


/*-----------------------------------------------------------------------------------*/
/*	Video Config
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['exquisite_video'] = array(
	'no_preview' => true,
	'params' => array(
		'type' => array(
			'type' => 'select',
			'label' => __('Video type', 'textdomain'),
			'desc' => __('Select video type', 'textdomain'),
			
	'options' => array(
				'vimeo' => 'Vimeo',
				'youtube' => 'Youtube'
			
			)
		),
		
		'video_id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Video ID', 'textdomain'),
			'desc' => __('Paste video ID (http://www.youtube.com/watch?v=<strong>nzY2Qcu5i2A</strong>)', 'textdomain'),
		)
	
		
	),
	'shortcode' => '[exquisite_video type="{{type}}" video_id="{{video_id}}"]',	
	'popup_title' => __('Insert Video Shortcode', 'textdomain')
);


/*-----------------------------------------------------------------------------------*/
/*	Slider Config
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['exquisite_slider'] = array(
	'params' => array(),
	'shortcode' => '[exquisite_slider] {{child_shortcode}} [/exquisite_slider]', // as there is no wrapper shortcode
	'popup_title' => __('Insert Slider Shortcode', 'textdomain'),
	'no_preview' => true,
	
	// child shortcode is clonable & sortable
	'child_shortcode' => array(
		'params' => array(
		
		'unique_id' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Unique ID', 'textdomain'),
				'desc' => __('Unique ID / name of the slider [use the same ID for all slides]', 'textdomain'),
			),	
		'slide_image' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Slide Image', 'textdomain'),
				'desc' => __('Insert slide image URL', 'textdomain'),
			),
			
		'target_image' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Target Image', 'textdomain'),
				'desc' => __('Insert  full sized slide URL for lightbox display (optional)', 'textdomain'),
			),
			
		'alt' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Alt Text', 'textdomain'),
				'desc' => __('Alt text (optional).', 'textdomain'),
			)

		),
		'shortcode' => '[exquisite_slide alt="{{alt}}" slide_image="{{slide_image}}" target_image="{{target_image}}" id="{{unique_id}}"]',
		'clone_button' => __('Add Another Slide', 'textdomain')
	)
);

?>