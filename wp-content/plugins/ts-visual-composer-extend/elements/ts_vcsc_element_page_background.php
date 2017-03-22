<?php
    global $VISUAL_COMPOSER_EXTENSIONS;
	
    $VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_VisualComposer_Element = array(
		"name"                              => __( "TS Page Background", "ts_visual_composer_extend" ),
		"base"                              => "TS_VCSC_Page_Background",
		"icon" 	                            => "ts-composer-element-icon-page-background",
		"class"                             => "",
		"category"                          => __( "VC Extensions", "ts_visual_composer_extend" ),
		"description"                       => __("Add a media background to your boxed page.", "ts_visual_composer_extend"),
		"admin_enqueue_js"            		=> "",
		"admin_enqueue_css"           		=> "",
		"params"                            => array(
			// Divider Settings
			array(
				"type"                      => "seperator",
				"heading"                   => "",
				"param_name"                => "seperator_1",
				"value"						=> "",
				"seperator"					=> "Background Settings",
				"description"               => ""
			),				
			array(
				"type"              		=> "dropdown",
				"heading"           		=> __( "Background Type", "ts_visual_composer_extend" ),
				"param_name"        		=> "type",
				"width"             		=> 300,
				"value"             		=> array(
					__( "Fixed Image", "ts_visual_composer_extend" )					=> "image",
					__( "Image Slideshow", "ts_visual_composer_extend" )				=> "slideshow",
					__( "Trianglify Pattern", "ts_visual_composer_extend" )				=> "triangle",
					__( "YouTube Video", "ts_visual_composer_extend" )					=> "youtube",
					__( "Selfhosted Video", "ts_visual_composer_extend" )				=> "video",
				),
				"admin_label" 				=> true,
				"description"       		=> __( "Select the type of element to be used for the background.", "ts_visual_composer_extend" ),
			),				
			array(
				"type"              		=> "switch_button",
				"heading"           		=> __( "Show On Mobile", "ts_visual_composer_extend" ),
				"param_name"        		=> "allow_mobile",
				"value"             		=> "false",
				"description"           	=> __( "Switch the toggle to allow the background to be shown on mobile devices (slider will only show first image).", "ts_visual_composer_extend" ),
				"dependency"        		=> array( 'element' => "type", 'value' => array('image', 'slideshow') ),
			),				
			array(
				"type"              		=> "attach_image",
				"heading"           		=> __( "Background Image", "ts_visual_composer_extend" ),
				"param_name"        		=> "fixed_image",
				"value"             		=> "",
				"description"       		=> __( "Select the image to be used for the page background.", "ts_visual_composer_extend" ),
				"dependency"        		=> array( 'element' => "type", 'value' => 'image' ),
			),
			array(
				"type"                  	=> "attach_images",
				"heading"               	=> __( "Select Images", "ts_visual_composer_extend" ),
				"param_name"            	=> "slide_images",
				"value"                 	=> "",
				"description"       		=> __( "Select the images to be used for the background slideshow.", "ts_visual_composer_extend" ),
				"dependency"        		=> array( 'element' => "type", 'value' => 'slideshow' ),
			),
			// Trianglify
			array(
				"type" 						=> "dropdown",
				"class" 					=> "",
				"heading" 					=> __( "Trianglify Pattern (X)", "ts_visual_composer_extend"),
				"param_name" 				=> "trianglify_colorsx",
				"value" 					=> array(
					__( "Random Pattern", "ts_visual_composer_extend")				=> "random",
					__( "Custom Pattern", "ts_visual_composer_extend")				=> "custom",
					__( "Yellow - Green", "ts_visual_composer_extend")				=> "YlGn",
					__( "Yellow - Green - Blue", "ts_visual_composer_extend")		=> "YlGnBu",
					__( "Blue - Green", "ts_visual_composer_extend")				=> "BuGn",
					__( "Green - Blue", "ts_visual_composer_extend")				=> "GnBu",
					__( "Purple - Blue - Green", "ts_visual_composer_extend")		=> "PuBuGn",
					__( "Purple - Blue", "ts_visual_composer_extend")				=> "PuBu",
					__( "Red - Purple", "ts_visual_composer_extend")				=> "RdPu",
					__( "Purple - Red", "ts_visual_composer_extend")				=> "PuRd",
					__( "Orange - Red", "ts_visual_composer_extend")				=> "OrRd",
					__( "Yellow - Orange - Red", "ts_visual_composer_extend")		=> "YlOrRd",
					__( "Yellow - Orange - Brown", "ts_visual_composer_extend")		=> "YlOrBr",
					__( "Purples", "ts_visual_composer_extend")						=> "Purples",
					__( "Blues", "ts_visual_composer_extend")						=> "Blues",
					__( "Greens", "ts_visual_composer_extend")						=> "Greens",
					__( "Oranges", "ts_visual_composer_extend")						=> "Oranges",
					__( "Reds", "ts_visual_composer_extend")						=> "Reds",
					__( "Greys", "ts_visual_composer_extend")						=> "Greys",
					__( "Orange - Purple", "ts_visual_composer_extend")				=> "PuOr",
					__( "Brown - Green", "ts_visual_composer_extend")				=> "BrBG",
					__( "Purple - Green", "ts_visual_composer_extend")				=> "PRGn",
					__( "Pink - Yellow - Green", "ts_visual_composer_extend")		=> "PiYG",
					__( "Red - Blue", "ts_visual_composer_extend")					=> "RdBu",
					__( "Red - Grey", "ts_visual_composer_extend")					=> "RdGy",
					__( "Red - Yellow - Blue", "ts_visual_composer_extend")			=> "RdYlBu",
					__( "Spectral", "ts_visual_composer_extend")					=> "Spectral",
					__( "Red - Yellow - Green", "ts_visual_composer_extend")		=> "RdYlGn",
					__( "Accent", "ts_visual_composer_extend")						=> "Accent",
					__( "Dark", "ts_visual_composer_extend")						=> "Dark2",
					__( "Paired", "ts_visual_composer_extend")						=> "Paired",
					__( "Pastel 1", "ts_visual_composer_extend")					=> "Pastel1",
					__( "Pastel 2", "ts_visual_composer_extend")					=> "Pastel2",
					__( "Set 1", "ts_visual_composer_extend")						=> "Set1",
					__( "Set 2", "ts_visual_composer_extend")						=> "Set2",
					__( "Set 3", "ts_visual_composer_extend")						=> "Set3",
				),
				"description" 				=> __("Select the horizontal pattern for the Trianglify background.", "ts_visual_composer_extend"),
				"dependency"        		=> array( 'element' => "type", 'value' => 'triangle' ),
			),
			array(
				"type" 						=> "advanced_gradient",
				"class" 					=> "",
				"heading" 					=> __("Trianglify Generator (X)", "ts_visual_composer_extend"),						
				"param_name" 				=> "trianglify_generatorx",
				"trianglify"				=> "true",
				"message_picker"			=> __("The exact position of the color stops does not matter, only their general order.", "ts_visual_composer_extend"),
				"label_picker"				=> __("Define Color Stops", "ts_visual_composer_extend"),	
				"description" 				=> __('Use the controls above to create a custom horizontal color set for the Trianglify background.', 'ts_visual_composer_extend'),
				"dependency"        		=> array( 'element' => "trianglify_colorsx", 'value' => 'custom' ),
			),
			array(
				"type" 						=> "dropdown",
				"class" 					=> "",
				"heading" 					=> __( "Trianglify Pattern (Y)", "ts_visual_composer_extend"),
				"param_name" 				=> "trianglify_colorsy",
				"value" 					=> array(
					__( "Match Horizontal", "ts_visual_composer_extend")			=> "match_x",
					__( "Random Pattern", "ts_visual_composer_extend")				=> "random",
					__( "Custom Pattern", "ts_visual_composer_extend")				=> "custom",
					__( "Yellow - Green", "ts_visual_composer_extend")				=> "YlGn",
					__( "Yellow - Green - Blue", "ts_visual_composer_extend")		=> "YlGnBu",
					__( "Blue - Green", "ts_visual_composer_extend")				=> "BuGn",
					__( "Green - Blue", "ts_visual_composer_extend")				=> "GnBu",
					__( "Purple - Blue - Green", "ts_visual_composer_extend")		=> "PuBuGn",
					__( "Purple - Blue", "ts_visual_composer_extend")				=> "PuBu",
					__( "Red - Purple", "ts_visual_composer_extend")				=> "RdPu",
					__( "Purple - Red", "ts_visual_composer_extend")				=> "PuRd",
					__( "Orange - Red", "ts_visual_composer_extend")				=> "OrRd",
					__( "Yellow - Orange - Red", "ts_visual_composer_extend")		=> "YlOrRd",
					__( "Yellow - Orange - Brown", "ts_visual_composer_extend")		=> "YlOrBr",
					__( "Purples", "ts_visual_composer_extend")						=> "Purples",
					__( "Blues", "ts_visual_composer_extend")						=> "Blues",
					__( "Greens", "ts_visual_composer_extend")						=> "Greens",
					__( "Oranges", "ts_visual_composer_extend")						=> "Oranges",
					__( "Reds", "ts_visual_composer_extend")						=> "Reds",
					__( "Greys", "ts_visual_composer_extend")						=> "Greys",
					__( "Orange - Purple", "ts_visual_composer_extend")				=> "PuOr",
					__( "Brown - Green", "ts_visual_composer_extend")				=> "BrBG",
					__( "Purple - Green", "ts_visual_composer_extend")				=> "PRGn",
					__( "Pink - Yellow - Green", "ts_visual_composer_extend")		=> "PiYG",
					__( "Red - Blue", "ts_visual_composer_extend")					=> "RdBu",
					__( "Red - Grey", "ts_visual_composer_extend")					=> "RdGy",
					__( "Red - Yellow - Blue", "ts_visual_composer_extend")			=> "RdYlBu",
					__( "Spectral", "ts_visual_composer_extend")					=> "Spectral",
					__( "Red - Yellow - Green", "ts_visual_composer_extend")		=> "RdYlGn",
					__( "Accent", "ts_visual_composer_extend")						=> "Accent",
					__( "Dark", "ts_visual_composer_extend")						=> "Dark2",
					__( "Paired", "ts_visual_composer_extend")						=> "Paired",
					__( "Pastel 1", "ts_visual_composer_extend")					=> "Pastel1",
					__( "Pastel 2", "ts_visual_composer_extend")					=> "Pastel2",
					__( "Set 1", "ts_visual_composer_extend")						=> "Set1",
					__( "Set 2", "ts_visual_composer_extend")						=> "Set2",
					__( "Set 3", "ts_visual_composer_extend")						=> "Set3",
				),
				"description" 				=> __("Select the vertical pattern for the Trianglify background.", "ts_visual_composer_extend"),
				"dependency"        		=> array( 'element' => "type", 'value' => 'triangle' ),
			),
			array(
				"type" 						=> "advanced_gradient",
				"class" 					=> "",
				"heading" 					=> __("Trianglify Generator (Y)", "ts_visual_composer_extend"),						
				"param_name" 				=> "trianglify_generatory",
				"trianglify"				=> "true",
				"message_picker"			=> __("The exact position of the color stops does not matter, only their general order.", "ts_visual_composer_extend"),
				"label_picker"				=> __("Define Color Stops", "ts_visual_composer_extend"),	
				"description" 				=> __('Use the controls above to create a custom vertical color set for the Trianglify background.', 'ts_visual_composer_extend'),
				"dependency"        		=> array( 'element' => "trianglify_colorsy", 'value' => 'custom' ),
			),
			array(
				"type"                  	=> "nouislider",
				"heading"               	=> __( "Trianglify Cellsize", "ts_visual_composer_extend" ),
				"param_name"            	=> "trianglify_cellsize",
				"value"                 	=> "75",
				"min"                   	=> "25",
				"max"                   	=> "150",
				"step"                  	=> "1",
				"unit"                  	=> '',
				"description"           	=> __( "Specify the size of the mesh used to generate triangles.", "ts_visual_composer_extend" ),
				"dependency"        		=> array( 'element' => "type", 'value' => 'triangle' ),
			),
			array(
				"type"                  	=> "nouislider",
				"heading"               	=> __( "Trianglify Variance", "ts_visual_composer_extend" ),
				"param_name"            	=> "trianglify_variance",
				"value"                 	=> "0.75",
				"min"                   	=> "0",
				"max"                   	=> "1",
				"step"                  	=> "0.01",
				"decimals"					=> "2",
				"unit"                  	=> '',
				"description"           	=> __( "Specify the amount of randomness used when generating triangles.", "ts_visual_composer_extend" ),
				"dependency"        		=> array( 'element' => "type", 'value' => 'triangle' ),
			),
			// Slideshow
			array(
				"type"              		=> "switch_button",
				"heading"           		=> __( "Shuffle Images", "ts_visual_composer_extend" ),
				"param_name"        		=> "slide_shuffle",
				"value"             		=> "false",
				"description"           	=> __( "Switch the toggle to shuffle the images for a random order.", "ts_visual_composer_extend" ),
				"dependency"        		=> array( 'element' => "type", 'value' => 'slideshow' ),
			),
			array(
				"type"              		=> "switch_button",
				"heading"           		=> __( "Show Controls", "ts_visual_composer_extend" ),
				"param_name"        		=> "slide_controls",
				"value"             		=> "true",
				"description"           	=> __( "Switch the toggle to show previous / next controls for the background slideshow.", "ts_visual_composer_extend" ),
				"dependency"        		=> array( 'element' => "type", 'value' => 'slideshow' ),
			),
			array(
				"type"              		=> "switch_button",
				"heading"           		=> __( "Use AutoPlay", "ts_visual_composer_extend" ),
				"param_name"        		=> "slide_auto",
				"value"             		=> "true",
				"description"           	=> __( "Switch the toggle to use an autoplay feature for the background slideshow.", "ts_visual_composer_extend" ),
				"dependency"        		=> array( 'element' => "type", 'value' => 'slideshow' ),
			),
			array(
				"type"              		=> "nouislider",
				"heading"           		=> __( "Transition Delay", "ts_visual_composer_extend" ),
				"param_name"        		=> "slide_delay",
				"value"             		=> "5000",
				"min"               		=> "2000",
				"max"               		=> "30000",
				"step"              		=> "100",
				"unit"              		=> 'ms',
				"description"       		=> __( "Select the delay between each slide transition.", "ts_visual_composer_extend" ),
				"dependency"        		=> array( 'element' => "slide_auto", 'value' => 'true' ),
			),
			array(
				"type"              		=> "switch_button",
				"heading"           		=> __( "Show Progress Bar", "ts_visual_composer_extend" ),
				"param_name"        		=> "slide_bar",
				"value"             		=> "true",
				"description"           	=> __( "Switch the toggle to show a progressbar for the delay timer.", "ts_visual_composer_extend" ),
				"dependency"        		=> array( 'element' => "slide_auto", 'value' => 'true' ),
			),
			array(
				"type"              		=> "dropdown",
				"heading"           		=> __( "Transition Type", "ts_visual_composer_extend" ),
				"param_name"        		=> "slide_transition",
				"width"             		=> 300,
				"value"             		=> array(
					__( "Random", "ts_visual_composer_extend" )							=> "random",
					__( "Fade 1", "ts_visual_composer_extend" )							=> "fade",
					__( "Fade 2", "ts_visual_composer_extend" )							=> "fade2",
					__( "Blur 1", "ts_visual_composer_extend" )							=> "blur",
					__( "Blur 2", "ts_visual_composer_extend" )							=> "blur2",						
					__( "Flash 1", "ts_visual_composer_extend" )						=> "flash",
					__( "Flash 2", "ts_visual_composer_extend" )						=> "flash2",
					__( "Negative 1", "ts_visual_composer_extend" )						=> "negative",
					__( "Negative 2", "ts_visual_composer_extend" )						=> "negative2",						
					__( "Burn 1", "ts_visual_composer_extend" )							=> "burn",
					__( "Burn 2", "ts_visual_composer_extend" )							=> "burn2",
					__( "Slide Left 1", "ts_visual_composer_extend" )					=> "slideLeft",
					__( "Slide Left 2", "ts_visual_composer_extend" )					=> "slideLeft2",
					__( "Slide Right 1", "ts_visual_composer_extend" )					=> "slideRight",
					__( "Slide Right 2", "ts_visual_composer_extend" )					=> "slideRight2",						
					__( "Slide Up 1", "ts_visual_composer_extend" )						=> "slideUp",
					__( "Slide Up 2", "ts_visual_composer_extend" )						=> "slideUp2",
					__( "Slide Down 1", "ts_visual_composer_extend" )					=> "slideDown",
					__( "Slide Down 2", "ts_visual_composer_extend" )					=> "slideDown2",						
					__( "Zoom In 1", "ts_visual_composer_extend" )						=> "zoomIn",
					__( "Zoom In 2", "ts_visual_composer_extend" )						=> "zoomIn2",
					__( "Zoom Out 1", "ts_visual_composer_extend" )						=> "zoomOut",
					__( "Zoom Out 2", "ts_visual_composer_extend" )						=> "zoomOut2",						
					__( "Swirl Left 1", "ts_visual_composer_extend" )					=> "swirlLeft",
					__( "Swirl Left 2", "ts_visual_composer_extend" )					=> "swirlLeft2",
					__( "Swirl Right 1", "ts_visual_composer_extend" )					=> "swirlRight",
					__( "Swirl Right 2", "ts_visual_composer_extend" )					=> "swirlRight2",
				),
				"description"           	=> __( "Select the effect type to be used to transition between each slide.", "ts_visual_composer_extend" ),
				"dependency"        		=> array( 'element' => "type", 'value' => 'slideshow' ),
			),
			array(
				"type"              		=> "nouislider",
				"heading"           		=> __( "Transition Duration", "ts_visual_composer_extend" ),
				"param_name"        		=> "slide_switch",
				"value"             		=> "2000",
				"min"               		=> "100",
				"max"               		=> "5000",
				"step"              		=> "100",
				"unit"              		=> 'ms',
				"description"       		=> __( "Select the duration each slide transition should last.", "ts_visual_composer_extend" ),
				"dependency"        		=> array( 'element' => "type", 'value' => 'slideshow' ),
			),
			array(
				"type"              		=> "dropdown",
				"heading"           		=> __( "Animation Type", "ts_visual_composer_extend" ),
				"param_name"        		=> "slide_animation",
				"width"             		=> 300,
				"value"             		=> array(
					__( "None", "ts_visual_composer_extend" )							=> "null",
					__( "Random", "ts_visual_composer_extend" )							=> "random",
					__( "KenBurns Center", "ts_visual_composer_extend" )				=> "kenburns",
					__( "KenBurns Left", "ts_visual_composer_extend" )					=> "kenburnsLeft",
					__( "KenBurns Right", "ts_visual_composer_extend" )					=> "kenburnsRight",
					__( "KenBurns Up", "ts_visual_composer_extend" )					=> "kenburnsUp",						
					__( "KenBurns Up Left", "ts_visual_composer_extend" )				=> "kenburnsUpLeft",
					__( "KenBurns Up Right", "ts_visual_composer_extend" )				=> "kenburnsUpRight",
					__( "KenBurns Down", "ts_visual_composer_extend" )					=> "kenburnsDown",
					__( "KenBurns Down Left", "ts_visual_composer_extend" )				=> "kenburnsDownLeft",						
					__( "KenBurns Down Right", "ts_visual_composer_extend" )			=> "kenburnsDownRight",
				),
				"description"           	=> __( "Select the animation type to be applied to each slide while shown.", "ts_visual_composer_extend" ),
				"dependency"        		=> array( 'element' => "type", 'value' => 'slideshow' ),
			),
			array(
				"type"              		=> "dropdown",
				"heading"           		=> __( "Horizontal Position", "ts_visual_composer_extend" ),
				"param_name"        		=> "slide_halign",
				"width"             		=> 300,
				"value"             		=> array(
					__( "Center", "ts_visual_composer_extend" )							=> "center",
					__( "Top", "ts_visual_composer_extend" )							=> "top",
					__( "Right", "ts_visual_composer_extend" )							=> "right",
					__( "Bottom", "ts_visual_composer_extend" )							=> "bottom",
					__( "Left", "ts_visual_composer_extend" )							=> "left",
				),
				"description"           	=> __( "Select the horizontal position of each image in the slideshow.", "ts_visual_composer_extend" ),
				"dependency"        		=> array( 'element' => "type", 'value' => 'slideshow' ),
			),
			array(
				"type"              		=> "dropdown",
				"heading"           		=> __( "Vertical Position", "ts_visual_composer_extend" ),
				"param_name"        		=> "slide_valign",
				"width"             		=> 300,
				"value"             		=> array(
					__( "Center", "ts_visual_composer_extend" )							=> "center",
					__( "Top", "ts_visual_composer_extend" )							=> "top",
					__( "Right", "ts_visual_composer_extend" )							=> "right",
					__( "Bottom", "ts_visual_composer_extend" )							=> "bottom",
					__( "Left", "ts_visual_composer_extend" )							=> "left",
				),
				"description"           	=> __( "Select the vertical position of each image in the slideshow.", "ts_visual_composer_extend" ),
				"dependency"        		=> array( 'element' => "type", 'value' => 'slideshow' ),
			),
			// Video Settings
			array(
				"type"              		=> "textfield",
				"heading"           		=> __( "YouTube Video ID", "ts_visual_composer_extend" ),
				"param_name"        		=> "video_youtube",
				"value"             		=> "",                    
				"description"       		=> __( "Enter the YouTube video ID.", "ts_visual_composer_extend" ),
				"dependency"        		=> array( 'element' => "type", 'value' => 'youtube' ),
			),				
			array(
				"type"                  	=> "textfield",
				"heading"               	=> __( "MP4 Video", "ts_visual_composer_extend" ),
				"param_name"            	=> "video_mp4",
				"value"                 	=> "",
				"description"           	=> __( "Enter the remote path to the MP4 version of the video.", "ts_visual_composer_extend" ),
				"dependency"        		=> array( 'element' => "type", 'value' => 'video' ),
			),
			array(
				"type"                  	=> "textfield",
				"heading"               	=> __( "WEBM Video", "ts_visual_composer_extend" ),
				"param_name"            	=> "video_webm",
				"value"                 	=> "",
				"description"           	=> __( "Enter the remote path to the WEBM version of the video.", "ts_visual_composer_extend" ),
				"dependency"        		=> array( 'element' => "type", 'value' => 'video' ),
			),
			array(
				"type"                  	=> "textfield",
				"heading"               	=> __( "OGV Video", "ts_visual_composer_extend" ),
				"param_name"            	=> "video_ogv",
				"value"                 	=> "",
				"description"           	=> __( "Enter the remote path to the OGV version of the video.", "ts_visual_composer_extend" ),
				"dependency"        		=> array( 'element' => "type", 'value' => 'video' ),
			),
			array(
				"type"              		=> "attach_image",
				"heading"           		=> __( "Poster Image", "ts_visual_composer_extend" ),
				"param_name"        		=> "video_image",
				"value"             		=> "",
				"description"       		=> __( "Select an image to be used as poster for the page background.", "ts_visual_composer_extend" ),
				"dependency"        		=> array( 'element' => "type", 'value' => 'video' ),
			),
			array(
				"type"              		=> "switch_button",
				"heading"           		=> __( "Mute Video", "ts_visual_composer_extend" ),
				"param_name"        		=> "video_mute",
				"value"             		=> "true",
				"description"           	=> __( "Switch the toggle to mute the video while playing.", "ts_visual_composer_extend" ),
				"dependency"        		=> array( 'element' => "type", 'value' => array('video', 'youtube') ),
			),
			array(
				"type"              		=> "switch_button",
				"heading"           		=> __( "Loop Video", "ts_visual_composer_extend" ),
				"param_name"        		=> "video_loop",
				"value"             		=> "false",
				"description"           	=> __( "Switch the toggle to loop the video after it has finished.", "ts_visual_composer_extend" ),
				"dependency"            	=> array( 'element' => "type", 'value' => array('video', 'youtube') ),
			),
			array(
				"type"              		=> "switch_button",
				"heading"           		=> __( "Start Video on Pageload", "ts_visual_composer_extend" ),
				"param_name"        		=> "video_start",
				"value"             		=> "false",
				"description"           	=> __( "Switch the toggle to if you want to start the video once the page has loaded.", "ts_visual_composer_extend" ),
				"dependency"            	=> array( 'element' => "type", 'value' => array('video', 'youtube') ),
			),
			array(
				"type"              		=> "switch_button",
				"heading"           		=> __( "Show Video Controls", "ts_visual_composer_extend" ),
				"param_name"        		=> "video_controls",
				"value"             		=> "true",
				"description"           	=> __( "Switch the toggle to if you want to show basic video controls.", "ts_visual_composer_extend" ),
				"dependency"            	=> array( 'element' => "type", 'value' => array('video', 'youtube') ),
			),
			// Noise / Raster Overlay
			array(
				"type"              		=> "switch_button",
				"heading"           		=> __( "Show Raster over Background", "ts_visual_composer_extend" ),
				"param_name"        		=> "video_raster",
				"value"             		=> "false",
				"description"           	=> __( "Switch the toggle to if you want to show a raster over the background.", "ts_visual_composer_extend" ),
				"dependency"        		=> array( 'element' => "type", 'value' => 'youtube' ),
				"group"						=> "Overlays",
			),				
			array(
				"type"              		=> "switch_button",
				"heading"           		=> __( "Show Raster over Background", "ts_visual_composer_extend" ),
				"param_name"        		=> "raster_use",
				"value"             		=> "false",
				"description"           	=> __( "Switch the toggle to if you want to show a raster over the background.", "ts_visual_composer_extend" ),
				"dependency"        		=> array( 'element' => "type", 'value' => array('image', 'slideshow', 'video', 'triangle') ),
				"group"						=> "Overlays",
			),
			array(
				"type"              		=> "background",
				"heading"           		=> __( "Raster Type", "ts_visual_composer_extend" ),
				"param_name"        		=> "raster_type",
				"height"             		=> 200,
				"pattern"             		=> $VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_Rasters_List,
				"value"						=> "",
				"encoding"          		=> "false",
				"asimage"					=> "false",
				"thumbsize"					=> 40,
				"description"       		=> __( "Select the raster pattern for the page background.", "ts_visual_composer_extend" ),
				"dependency"            	=> array( 'element' => "raster_use", 'value' => 'true' ),
				"group"						=> "Overlays",
			),
			// Color Overlay
			array(
				"type"						=> "switch_button",
				"heading"           		=> __( "Color Overlay", "ts_visual_composer_extend" ),
				"param_name"        		=> "overlay_use",
				"value"             		=> "false",
				"description"       		=> __( "Switch the toggle if you want to use a color overlay with the background; will only work with browser with RGBA support.", "ts_visual_composer_extend" ),
				"dependency"        		=> array( 'element' => "type", 'value' => array('image', 'slideshow', 'video', 'triangle') ),
				"group"						=> "Overlays",
			),
			array(
				"type"              		=> "colorpicker",
				"heading"           		=> __( "Overlay Color", "ts_visual_composer_extend" ),
				"param_name"        		=> "overlay_color",
				"value"            	 		=> "rgba(30,115,190,0.25)",
				"description" 				=> __("Define the overlay color; use the alpha channel setting to define the opacity of the overlay.", "ts_visual_composer_extend"),
				"dependency"            	=> array( 'element' => "overlay_use", 'value' => 'true' ),
				"group"						=> "Overlays",
			),
			// Load Custom CSS/JS File
			array(
				"type"                      => "load_file",
				"heading"                   => "",
				"param_name"                => "el_file",
				"value"                     => "",
				"file_type"                 => "js",
				"file_path"                 => "js/ts-visual-composer-extend-element.min.js",
				"description"               => ""
			),
		)
	);
	
	if ($VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_VisualComposer_LeanMap == "true") {
		return $VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_VisualComposer_Element;
	} else {			
		vc_map($VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_VisualComposer_Element);
	}
?>