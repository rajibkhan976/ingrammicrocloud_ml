<style>
	.radio_cnt [type=radio] {
		width: auto;
	}

	.radio_cnt {
		float: left;
		margin-right: 20px;
		/*padding-bottom: 7px;*/
		/*padding-top: 6px;*/
		/*min-width: 70px;*/
	}
</style>
<?php
if ( empty( $currentValue ) ) {
	reset( $value );
	$currentValue = array_shift( array_slice( $value, 0, 1 ) );
}
?>
<?php foreach ( $value as $option => $optionKey ) { ?>
	<?php $id = am_id(); ?>
	<div class="radio_cnt">
		<input id="<?php echo $id; ?>" type="radio" name="<?php echo $param_name; ?>_radio"
		       value="<?php echo $optionKey; ?>" <?php am_e_if( $currentValue == $optionKey, 'checked' ) ?>>
		<label for="<?php echo $id; ?>"><?php echo $option; ?></label>
	</div>
<?php } ?>