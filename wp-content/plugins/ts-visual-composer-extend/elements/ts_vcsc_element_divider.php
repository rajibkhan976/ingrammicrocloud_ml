<?php
	global $VISUAL_COMPOSER_EXTENSIONS;
    $VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_VisualComposer_Element = array(
		"name"                      => __( "TS Divider", "ts_visual_composer_extend" ),
		"base"                      => "TS-VCSC-Divider",
		"icon" 	                    => "ts-composer-element-icon-divider",
		"class"                     => "",
		"category"                  => __( "VC Extensions", "ts_visual_composer_extend" ),
		"description"               => __("Place a divider line element", "ts_visual_composer_extend"),
		"js_view"     				=> ($VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_EditorLivePreview == "true" ? "TS_VCSC_DividerViewCustom" : ""),
		"admin_enqueue_js"			=> "",
		"admin_enqueue_css"			=> "",
		"params"                    => array(
			// Divider Settings
			array(
				"type"              => "seperator",
				"heading"           => "",
				"param_name"        => "seperator_1",
				"value"				=> "",
				"seperator"         => "Divider Settings",
				"description"       => ""
			),
			array(
				"type"              => "dropdown",
				"heading"           => __( "Divider Type", "ts_visual_composer_extend" ),
				"param_name"        => "divider_type",
				"width"             => 150,
				"value"             => array(
					__( 'Basic Line Divider', "ts_visual_composer_extend" )        		=> "ts-divider-border",
					__( 'Divider with Text', "ts_visual_composer_extend" )    			=> "ts-divider-lines",
					__( 'Divider with Image', "ts_visual_composer_extend" )   			=> "ts-divider-images",
					__( 'Divider with Icon', "ts_visual_composer_extend" )    			=> "ts-divider-icons",
					__( 'Divider To Top', "ts_visual_composer_extend" )       			=> "ts-divider-top",						
					__( 'Divider Arrow Down', "ts_visual_composer_extend" )       		=> "ts-divider-arrow",						
					__( 'Simple Style 1', "ts_visual_composer_extend" )					=> "ts-divider-one",
					__( 'Simple Style 2', "ts_visual_composer_extend" )					=> "ts-divider-two",
					__( 'Simple Style 3', "ts_visual_composer_extend" )					=> "ts-divider-three",
					__( 'Simple Style 4', "ts_visual_composer_extend" )					=> "ts-divider-four",
					__( 'Simple Style 5', "ts_visual_composer_extend" )					=> "ts-divider-five",
					__( 'Simple Style 6', "ts_visual_composer_extend" )					=> "ts-divider-six",
					__( 'Simple Style 7', "ts_visual_composer_extend" )					=> "ts-divider-seven",
				),
				"admin_label"       => true,
				"description"       => __( "Select the type of divider you want to use.", "ts_visual_composer_extend" )
			),
			array(
				"type"				=> "nouislider",
				"heading"			=> __( "Full Width Breakouts", "ts_visual_composer_extend" ),
				"param_name"		=> "divider_break_parents",
				"value"				=> "0",
				"min"				=> "0",
				"max"				=> "99",
				"step"				=> "1",
				"unit"				=> '',
				"admin_label"		=> true,
				"description"		=> __( "Define the number of parent containers the divider should attempt to break away from.", "ts_visual_composer_extend" ),
			),
			array(
				"type"              => "dropdown",
				"heading"           => __( "Divider Border Type", "ts_visual_composer_extend" ),
				"param_name"        => "divider_border_type",
				"width"             => 300,
				"value"             => array(
					__( "Solid Border", "ts_visual_composer_extend" )                  => "solid",
					__( "Dotted Border", "ts_visual_composer_extend" )                 => "dotted",
					__( "Dashed Border", "ts_visual_composer_extend" )                 => "dashed",
					__( "Double Border", "ts_visual_composer_extend" )                 => "double",
					__( "Grouve Border", "ts_visual_composer_extend" )                 => "groove",
					__( "Ridge Border", "ts_visual_composer_extend" )                  => "ridge",
					__( "Inset Border", "ts_visual_composer_extend" )                  => "inset",
					__( "Outset Border", "ts_visual_composer_extend" )                 => "outset"
				),
				"description"       => __( "Select the type of divider border.", "ts_visual_composer_extend" ),
				"dependency"        => array( 'element' => "divider_type", 'value' => array('ts-divider-border', 'ts-divider-lines', 'ts-divider-arrow', 'ts-divider-images', 'ts-divider-icons', 'ts-divider-top') )
			),
			array(
				"type"              => "nouislider",
				"heading"           => __( "Divider Border Thickness", "ts_visual_composer_extend" ),
				"param_name"        => "divider_border_thick",
				"value"             => "1",
				"min"               => "1",
				"max"               => "10",
				"step"              => "1",
				"unit"              => 'px',
				"description"       => __( "Define the thickness of the divider border.", "ts_visual_composer_extend" ),
				"dependency"        => array( 'element' => "divider_type", 'value' => array('ts-divider-border', 'ts-divider-lines', 'ts-divider-arrow', 'ts-divider-images', 'ts-divider-icons', 'ts-divider-top') )
			),
			array(
				"type"              => "colorpicker",
				"heading"           => __( "Divider Color", "ts_visual_composer_extend" ),
				"param_name"        => "divider_text_border",
				"value"             => "#eeeeee",
				"description"       => __( "Define the color of the divider line.", "ts_visual_composer_extend" ),
				"dependency"        => array( 'element' => "divider_type", 'value' => 'ts-divider-lines' )
			),
			array(
				"type"              => "colorpicker",
				"heading"           => __( "Divider Color", "ts_visual_composer_extend" ),
				"param_name"        => "divider_image_border",
				"value"             => "#eeeeee",
				"description"       => __( "Define the color of the divider line.", "ts_visual_composer_extend" ),
				"dependency"        => array( 'element' => "divider_type", 'value' => 'ts-divider-images' )
			),
			array(
				"type"              => "colorpicker",
				"heading"           => __( "Divider Color", "ts_visual_composer_extend" ),
				"param_name"        => "divider_icon_border",
				"value"             => "#eeeeee",
				"description"       => __( "Define the color of the divider line.", "ts_visual_composer_extend" ),
				"dependency"        => array( 'element' => "divider_type", 'value' => 'ts-divider-icons' )
			),
			array(
				"type"              => "colorpicker",
				"heading"           => __( "Divider Color", "ts_visual_composer_extend" ),
				"param_name"        => "divider_border_color",
				"value"             => "#eeeeee",
				"description"       => __( "Define the color of the divider border.", "ts_visual_composer_extend" ),
				"dependency"        => array( 'element' => "divider_type", 'value' => array('ts-divider-border', 'ts-divider-arrow'))
			),
			array(
				"type"              => "colorpicker",
				"heading"           => __( "Divider Color", "ts_visual_composer_extend" ),
				"param_name"        => "divider_top_border",
				"value"             => "#eeeeee",
				"description"       => __( "Define the color of the divider border.", "ts_visual_composer_extend" ),
				"dependency"        => array( 'element' => "divider_type", 'value' => 'ts-divider-top')
			),
			array(
				"type"              => "nouislider",
				"heading"           => __( "Divider Width", "ts_visual_composer_extend" ),
				"param_name"        => "divider_border_width",
				"value"             => "100",
				"min"               => "20",
				"max"               => "100",
				"step"              => "1",
				"unit"              => '%',
				"description"       => __( "Define the width of the divider border.", "ts_visual_composer_extend" ),
			),
			// Arrow Divider Settings
			array(
				"type"              => "nouislider",
				"heading"           => __( "Arrow Offset", "ts_visual_composer_extend" ),
				"param_name"        => "divider_arrow_offset",
				"value"             => "0",
				"min"               => "-50",
				"max"               => "50",
				"step"              => "1",
				"unit"              => 'px',
				"description"       => __( "Define an optional top offset for the divider arrow.", "ts_visual_composer_extend" ),
				"dependency"        => array( 'element' => "divider_type", 'value' => 'ts-divider-arrow' ),
			),
			array(
				"type"              => "nouislider",
				"heading"           => __( "Arrow Width", "ts_visual_composer_extend" ),
				"param_name"        => "divider_arrow_width",
				"value"             => "80",
				"min"               => "40",
				"max"               => "200",
				"step"              => "1",
				"unit"              => 'px',
				"description"       => __( "Define the width of the divider arrow.", "ts_visual_composer_extend" ),
				"dependency"        => array( 'element' => "divider_type", 'value' => 'ts-divider-arrow' ),
			),
			array(
				"type"              => "nouislider",
				"heading"           => __( "Arrow Height", "ts_visual_composer_extend" ),
				"param_name"        => "divider_arrow_height",
				"value"             => "40",
				"min"               => "20",
				"max"               => "100",
				"step"              => "1",
				"unit"              => 'px',
				"description"       => __( "Define the height of the divider arrow.", "ts_visual_composer_extend" ),
				"dependency"        => array( 'element' => "divider_type", 'value' => 'ts-divider-arrow' ),
			),
			array(
				"type"              => "nouislider",
				"heading"           => __( "Arrow Outline", "ts_visual_composer_extend" ),
				"param_name"        => "divider_arrow_outline",
				"value"             => "1",
				"min"               => "0",
				"max"               => "10",
				"step"              => "1",
				"unit"              => 'px',
				"description"       => __( "Define the width of the divider arrow outline.", "ts_visual_composer_extend" ),
				"dependency"        => array( 'element' => "divider_type", 'value' => 'ts-divider-arrow' ),
			),
			array(
				"type"              => "colorpicker",
				"heading"           => __( "Arrow Outer Color", "ts_visual_composer_extend" ),
				"param_name"        => "divider_arrow_color",
				"value"             => "#eeeeee",
				"description"       => __( "Define the outer background color for the divider arrow.", "ts_visual_composer_extend" ),
				"dependency"        => array( 'element' => "divider_type", 'value' => 'ts-divider-arrow' ),
			),
			array(
				"type"              => "colorpicker",
				"heading"           => __( "Arrow Inner Color", "ts_visual_composer_extend" ),
				"param_name"        => "divider_arrow_fill",
				"value"             => "#eeeeee",
				"description"       => __( "Define the inner background color for the divider arrow.", "ts_visual_composer_extend" ),
				"dependency"        => array( 'element' => "divider_type", 'value' => 'ts-divider-arrow' ),
			),
			// Text Divider Settings
			array(
				"type"              => "seperator",
				"heading"           => "",
				"param_name"        => "seperator_2",
				"value"				=> "",
				"seperator"         => "Content Settings",
				"description"       => "",
				"dependency"        => array( 'element' => "divider_type", 'value' => array('ts-divider-images', 'ts-divider-icons', 'ts-divider-lines', 'ts-divider-top') ),
				"group"				=> "Divider Content",
			),
			array(
				"type"              => "dropdown",
				"heading"           => __( "Divider Text Position", "ts_visual_composer_extend" ),
				"param_name"        => "divider_text_position",
				"width"             => 300,
				"value"             => array(
					__( "Center", "ts_visual_composer_extend" )                         => "center",
					__( "Left", "ts_visual_composer_extend" )                           => "left",
					__( "Right", "ts_visual_composer_extend" )                          => "right",
				),
				"description"       => __( "Select the position of the text in the divider.", "ts_visual_composer_extend" ),
				"dependency"        => array( 'element' => "divider_type", 'value' => 'ts-divider-lines' ),
				"group"				=> "Divider Content",
			),
			array(
				"type"              => "textfield",
				"heading"           => __( "Divider Text", "ts_visual_composer_extend" ),
				"param_name"        => "divider_text_content",
				"value"             => "",
				"description"       => __( "Enter the text within the divider.", "ts_visual_composer_extend" ),
				"dependency"        => array( 'element' => "divider_type", 'value' => 'ts-divider-lines' ),
				"group"				=> "Divider Content",
			),
			array(
				"type"              => "nouislider",
				"heading"           => __( "Font Size", "ts_visual_composer_extend" ),
				"param_name"        => "divider_text_size",
				"value"             => "20",
				"min"               => "10",
				"max"               => "50",
				"step"              => "1",
				"unit"              => 'px',
				"description"       => __( "Define the font size for the devider text.", "ts_visual_composer_extend" ),
				"dependency"        => array( 'element' => "divider_type", 'value' => 'ts-divider-lines' ),
				"group"				=> "Divider Content",
			),
			array(
				"type"              => "colorpicker",
				"heading"           => __( "Font Color", "ts_visual_composer_extend" ),
				"param_name"        => "divider_text_color",
				"value"             => "#676767",
				"description"       => __( "Define the font color for the devider text.", "ts_visual_composer_extend" ),
				"dependency"        => array( 'element' => "divider_type", 'value' => 'ts-divider-lines' ),
				"group"				=> "Divider Content",
			),
			// Image Divider Settings
			array(
				"type"              => "dropdown",
				"heading"           => __( "Divider Icon / Image Position", "ts_visual_composer_extend" ),
				"param_name"        => "divider_image_position",
				"width"             => 300,
				"value"             => array(
					__( "Center", "ts_visual_composer_extend" )                         => "center",
					__( "Left", "ts_visual_composer_extend" )                           => "left",
					__( "Right", "ts_visual_composer_extend" )                          => "right",
				),
				"description"       => __( "Select the position of the icon / image in the divider.", "ts_visual_composer_extend" ),
				"dependency"        => array( 'element' => "divider_type", 'value' => 'ts-divider-images' ),
				"group"				=> "Divider Content",
			),
			array(
				"type"              => "attach_image",
				"heading"           => __( "Select Image", "ts_visual_composer_extend" ),
				"param_name"        => "divider_image_content",
				"value"             => "",
				"description"       => __( "Image must have equal dimensions for scaling purposes (i.e. 100x100).", "ts_visual_composer_extend" ),
				"dependency"        => array( 'element' => "divider_type", 'value' => 'ts-divider-images' ),
				"group"				=> "Divider Content",
			),
			array(
				"type"              => "nouislider",
				"heading"           => __( "Image Size", "ts_visual_composer_extend" ),
				"param_name"        => "divider_image_size",
				"value"             => "40",
				"min"               => "20",
				"max"               => "100",
				"step"              => "1",
				"unit"              => 'px',
				"description"       => __( "Define the image size for the divider.", "ts_visual_composer_extend" ),
				"dependency"        => array( 'element' => "divider_type", 'value' => 'ts-divider-images' ),
				"group"				=> "Divider Content",
			),
			array(
				"type"              => "nouislider",
				"heading"           => __( "Image Repeat", "ts_visual_composer_extend" ),
				"param_name"        => "divider_image_repeat",
				"value"             => "1",
				"min"               => "1",
				"max"               => "5",
				"step"              => "1",
				"unit"              => 'x',
				"description"       => __( "Define how many times the image should be shown or repeated.", "ts_visual_composer_extend" ),
				"dependency"        => array( 'element' => "divider_type", 'value' => 'ts-divider-images' ),
				"group"				=> "Divider Content",
			),
			// Icon Divider Settings
			array(
				"type"              => "dropdown",
				"heading"           => __( "Divider Icon Position", "ts_visual_composer_extend" ),
				"param_name"        => "divider_icon_position",
				"width"             => 300,
				"value"             => array(
					__( "Center", "ts_visual_composer_extend" )                         => "center",
					__( "Left", "ts_visual_composer_extend" )                           => "left",
					__( "Right", "ts_visual_composer_extend" )                          => "right",
				),
				"description"       => __( "Select the position of the icon in the divider.", "ts_visual_composer_extend" ),
				"dependency"        => array( 'element' => "divider_type", 'value' => 'ts-divider-icons' ),
				"group"				=> "Divider Content",
			),		
			array(
				'type' 				=> $VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_IconSelectorType,
				'heading' 			=> __( 'Select Icon', 'ts_visual_composer_extend' ),
				'param_name' 		=> 'divider_icon_content',
				'value'				=> '',
				'source'			=> $VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_IconSelectorValue,
				'settings' 			=> array(
					'emptyIcon' 			=> false,
					'type' 					=> 'extensions',
					'iconsPerPage' 			=> $VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_IconSelectorPager,
					'source' 				=> $VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_IconSelectorSource,
				),
				"description"       => ($VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_EditorVisualSelector == "true" ? __( "Select the icon you want to display.", "ts_visual_composer_extend" ) : $VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_IconSelectorString),
				"dependency"        => array( 'element' => "divider_type", 'value' => 'ts-divider-icons' ),
				"group"				=> "Divider Content",
			),				
			array(
				"type"              => "colorpicker",
				"heading"           => __( "Icon Color", "ts_visual_composer_extend" ),
				"param_name"        => "divider_icon_color",
				"value"             => "#cccccc",
				"description"       => __( "Define the color of the icon.", "ts_visual_composer_extend" ),
				"dependency"        => array( 'element' => "divider_type", 'value' => 'ts-divider-icons' ),
				"group"				=> "Divider Content",
			),
			array(
				"type"              => "nouislider",
				"heading"           => __( "Icon Size", "ts_visual_composer_extend" ),
				"param_name"        => "divider_icon_size",
				"value"             => "40",
				"min"               => "20",
				"max"               => "100",
				"step"              => "1",
				"unit"              => 'px',
				"description"       => __( "Define the icon size for the divider.", "ts_visual_composer_extend" ),
				"dependency"        => array( 'element' => "divider_type", 'value' => 'ts-divider-icons' ),
				"group"				=> "Divider Content",
			),
			array(
				"type"              => "nouislider",
				"heading"           => __( "Icon Repeat", "ts_visual_composer_extend" ),
				"param_name"        => "divider_icon_repeat",
				"value"             => "1",
				"min"               => "1",
				"max"               => "5",
				"step"              => "1",
				"unit"              => 'x',
				"description"       => __( "Define how many times the icon should be shown or repeated.", "ts_visual_composer_extend" ),
				"dependency"        => array( 'element' => "divider_type", 'value' => 'ts-divider-icons' ),
				"group"				=> "Divider Content",
			),
			// To Top Divider Settings
			array(
				"type"              => "textfield",
				"heading"           => __( "To Top Text", "ts_visual_composer_extend" ),
				"param_name"        => "divider_top_content",
				"value"             => "",
				"description"       => __( "Enter the text for the divider.", "ts_visual_composer_extend" ),
				"dependency"        => array( 'element' => "divider_type", 'value' => 'ts-divider-top' ),
				"group"				=> "Divider Content",
			),				
			// Background Settings
			array(
				"type"              => "seperator",
				"heading"           => "",
				"param_name"        => "seperator_3",
				"value"				=> "",
				"seperator"			=> "Background Settings",
				"description"       => "",
				"dependency"        => array( 'element' => "divider_type", 'value' => array('ts-divider-lines', 'ts-divider-images', 'ts-divider-icons', 'ts-divider-top') ),
				"group" 			=> "Divider Content",
			),
			array(
				"type"              => "colorpicker",
				"heading"           => __( "Background Color", "ts_visual_composer_extend" ),
				"param_name"        => "divider_border_background",
				"value"             => "#F2F2F2",
				"description"       => __( "Define the color to be applied to the text / icon / image background.", "ts_visual_composer_extend" ),
				"dependency"        => array( 'element' => "divider_type", 'value' => array('ts-divider-lines', 'ts-divider-images', 'ts-divider-icons', 'ts-divider-top') ),
				"group"				=> "Divider Content",
			),		
			array(
				"type"              => "dropdown",
				"heading"           => __( "Background Radius", "ts_visual_composer_extend" ),
				"param_name"        => "divider_border_radius",
				"width"             => 300,
				"value"             => array(
					__( "None", "ts_visual_composer_extend" )                          => "",
					__( "Small Radius", "ts_visual_composer_extend" )                  => "ts-radius-small",
					__( "Medium Radius", "ts_visual_composer_extend" )                 => "ts-radius-medium",
					__( "Large Radius", "ts_visual_composer_extend" )                  => "ts-radius-large",
					__( "Full Circle", "ts_visual_composer_extend" )                   => "ts-radius-full"
				),
				"description"       => __( "Select the type of radius to be applied to the text / icon / image background.", "ts_visual_composer_extend" ),
				"dependency"        => array( 'element' => "divider_type", 'value' => array('ts-divider-lines', 'ts-divider-images', 'ts-divider-icons', 'ts-divider-top') ),
				"group"				=> "Divider Content",
			),
			// Other Divider Settings
			array(
				"type"              => "seperator",
				"heading"           => "",
				"param_name"        => "seperator_4",
				"value"				=> "",
				"seperator"			=> "Other Settings",
				"description"       => "",
				"group" 			=> "Other Settings",
			),
			array(
				"type"              => "nouislider",
				"heading"           => __( "Margin: Top", "ts_visual_composer_extend" ),
				"param_name"        => "margin_top",
				"value"             => "20",
				"min"               => "-50",
				"max"               => "500",
				"step"              => "1",
				"unit"              => 'px',
				"description"       => __( "Select the top margin for the element.", "ts_visual_composer_extend" ),
				"group" 			=> "Other Settings",
			),
			array(
				"type"              => "nouislider",
				"heading"           => __( "Margin: Bottom", "ts_visual_composer_extend" ),
				"param_name"        => "margin_bottom",
				"value"             => "20",
				"min"               => "-50",
				"max"               => "500",
				"step"              => "1",
				"unit"              => 'px',
				"description"       => __( "Select the bottom margin for the element.", "ts_visual_composer_extend" ),
				"group" 			=> "Other Settings",
			),
			array(
				"type"              => "textfield",
				"heading"           => __( "Define ID Name", "ts_visual_composer_extend" ),
				"param_name"        => "el_id",
				"value"             => "",
				"description"       => __( "Enter an unique ID for the element.", "ts_visual_composer_extend" ),
				"group" 			=> "Other Settings",
			),
			array(
				"type"              => "textfield",
				"heading"           => __( "Extra Class Name", "ts_visual_composer_extend" ),
				"param_name"        => "el_class",
				"value"             => "",
				"description"       => __( "Enter a class name for the element.", "ts_visual_composer_extend" ),
				"group" 			=> "Other Settings",
			),				
			/*array(
				"type" 				=> "css_editor",
				"heading"           => __( "CSS Styling", "ts_visual_composer_extend" ),
				"param_name" 		=> "css",
				"value"             => "",
				"description"       => __( "Use the settings above to apply some basic custom styling to the element. Not all styling options will be useful for the element, so use with caution.", "ts_visual_composer_extend" ),
				"group" 			=> "Other Settings",
			),*/
			// Load Custom CSS/JS File
			array(
				"type"              => "load_file",
				"heading"           => "",
				"param_name"        => "el_file",
				"value"             => "",
				"file_type"         => "js",
				"file_path"         => "js/ts-visual-composer-extend-element.min.js",
				"description"       => ""
			),
		)
	);
	
	if ($VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_VisualComposer_LeanMap == "true") {
		return $VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_VisualComposer_Element;
	} else {			
		vc_map($VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_VisualComposer_Element);
	}
?>