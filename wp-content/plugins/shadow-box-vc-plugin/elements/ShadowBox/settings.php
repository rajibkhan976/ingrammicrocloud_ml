<?php


class VcElements_ShadowBox_Settings extends Am_Element_BaseSettings {
	var $TAG_NAME   = 'am_shadow_box';
	var $title      = 'Shadow Box';
	var $category   = 'Content';

	public function getSettings() {
		return array(
			'weight'                  => 0,
			'show_settings_on_create' => false,
			'is_container'            => true,
			"as_parent"               => array( 'except' => 'am_shadow_box' ),
			"content_element"         => true,
			'js_view'                 => 'VcColumnView',
		);
	}

	public function initParams() {
		$general = $this->params->addGroup( '' );

		$general->add( 'Select2', 'type', 'Type' )->adminLabel()
		        ->value(
			        array(
				        'Bottom'            => '1',
				        'Bottom Big'        => '1-big',
				        'Left And Right'    => '2',
				        'Only Left'         => '3',
				        'Only Right'        => '3-r',
				        'Round'             => '4',
				        'Horizontal Curves' => '5',
				        'Vertical Curves'   => '6',
				        'Raised Box'        => '7',
				        'Inset'             => '9',
				        'Perspective'       => '10',
				        'Back'              => '11',
				        'Reflection'        => '12',
				        'Inside'            => '13',
				        'All Big'           => '14',
				        'All Small'         => '15',
				        'All Thin'          => '8',
				        'Two Layers'        => '16',
			        )
		        );

		$general->add( 'Color', 'bg_color', 'Background' )->adminLabel();
		$general->add( 'Color', 'color', 'Text Color' )->adminLabel();
		$general->add( 'Border', 'border', 'Border' )->adminLabel();
		$general->add( 'Margins4', 'margin', 'Margins' )->adminLabel();
		$general->add( 'Margins4', 'padding', 'Padding' )->adminLabel();
	}
}


if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_am_shadow_box extends WPBakeryShortCodesContainer {
	}
}