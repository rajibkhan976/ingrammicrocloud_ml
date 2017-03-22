<?php

class Am_Settings_Section_Documentation extends Am_Redux_Section {
	function sectionArgs() {
		return array(
			'title' => __( 'Documentation', $this->_->SLUG ),
			'icon'  => 'el-icon-question-sign'
		);
	}

	function init() {
		$this->_->style('redux/assets/markdown/markdown', $this->_->frameworkFILE);
		$this->_->requireFile('common/parsedown.php', $this->_->frameworkFILE);


		$this->addField( am_id(), 'raw',
			array(
				'content'   => Am_Common_Parsedown::instance()->setBreaksEnabled( true )->parse(
					file_get_contents( dirname( $this->_->__FILE__ ) . '/docs/documentation.md' ),
					$this->_->getUrl( 'docs/', $this->_->__FILE__ )
				)
			)
		);
	}
}
