<?php
global $smof_data;

if ($smof_data['revolution_switch'] == 1) {
	$slider_id = $smof_data['revolution_slider_id'];
	if ($slider_id !== 'None') {
		echo '<div class="header">';
		putRevSlider($slider_id);
		echo '</div>';
	}

}
?>

	
