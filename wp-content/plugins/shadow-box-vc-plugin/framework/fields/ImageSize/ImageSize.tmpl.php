<?php
if(!function_exists('get_image_sizes_values')) {
	function get_image_sizes_values() {
		if ( ! function_exists( '_am_get_image_sizes' ) ) {
			function _am_get_image_sizes( $size = '' ) {

				global $_wp_additional_image_sizes;

				$sizes                        = array();
				$get_intermediate_image_sizes = get_intermediate_image_sizes();

				// Create the full array with sizes and crop info
				foreach ( $get_intermediate_image_sizes as $_size ) {

					if ( in_array( $_size, array( 'thumbnail', 'medium', 'large' ) ) ) {

						$sizes[ $_size ]['width']  = get_option( $_size . '_size_w' );
						$sizes[ $_size ]['height'] = get_option( $_size . '_size_h' );
						$sizes[ $_size ]['crop']   = (bool) get_option( $_size . '_crop' );

					} elseif ( isset( $_wp_additional_image_sizes[ $_size ] ) ) {

						$sizes[ $_size ] = array(
							'width'  => $_wp_additional_image_sizes[ $_size ]['width'],
							'height' => $_wp_additional_image_sizes[ $_size ]['height'],
							'crop'   => $_wp_additional_image_sizes[ $_size ]['crop']
						);

					}

				}

				// Get only 1 size if found
				if ( $size ) {

					if ( isset( $sizes[ $size ] ) ) {
						return $sizes[ $size ];
					} else {
						return false;
					}

				}

				return $sizes;
			}
		}

		$values = array( 'Original' => '' );
		$sizes  = _am_get_image_sizes();

		foreach ( $sizes as $name => $size ) {
			$sizeDesc = '';

			if ( $size['width'] && $size['height'] ) {
				$sizeDesc .= sprintf( '%sx%s', $size['width'], $size['height'] );
			} else {
				if ( $size['width'] && ! $size['height'] ) {
					$sizeDesc .= sprintf( '%sx auto', $size['width'] );
				} else if ( ! $size['width'] && $size['height'] ) {
					$sizeDesc .= sprintf( 'auto x %s', $size['height'] );
				}
			}

			$sizeDesc .= ' ' . ( $size['crop'] ? 'Crop' : 'Fit' ) . '';

			$values[ sprintf( "%s - %s", ucfirst( $name ), $sizeDesc ) ] = $name;
		}

		return $values;
	}
}
?>
<select class="wpb_vc_param_value am-imagesize"
        name="<?php echo $param_name; ?>"
	>
	<?php foreach(get_image_sizes_values() as $option=>$optionKey) { ?>
		<option value="<?php echo $optionKey; ?>" <?php am_e_if($currentValue == $optionKey, 'selected') ?>><?php echo $option; ?></option>
	<?php } ?>
</select>