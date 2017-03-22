<?php


class VcElements_ShadowBox_Render extends Am_Element_BaseRender {
	public function render( $atts, $content ) {
		$content = am_js_remove_wpautop( $content, true );

		$main         = $this->_->newAttributes();
		$insideStyles = $this->_->newAttributes();

		$main->css->add( 'am_shadowBox' );
		$main->css->add( 'am_shadowBox-' . ( $atts->type ? $atts->type : 1 ) );

		$atts->margin   && $main->style->margin = $atts->margin->value;
		$atts->border   && $insideStyles->style->border = $atts->border;
		$atts->padding  && $insideStyles->style->padding = $atts->padding->value;
		$atts->bg_color && $insideStyles->style->backgroundColor = $atts->bg_color;
		$atts->color    && $insideStyles->style->color = $atts->color;

		$this->_->style( 'main', __FILE__ );

		return '<div ' . $main . '>' .
		            '<div ' . $insideStyles . '>' .
		                $content .
		            '</div>' .
		       '</div>';
	}
}
