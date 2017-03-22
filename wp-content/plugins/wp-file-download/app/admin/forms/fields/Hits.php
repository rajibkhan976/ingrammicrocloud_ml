<?php
/**
 * WP File Download
 *
 * @package WP File Download
 * @author Joomunited
 * @version 1.0
 */

namespace Joomunited\WP_File_Download\Admin\Fields;

use Joomunited\WPFramework\v1_0_0\Fields\Int;

defined( 'ABSPATH' ) || die();

class Hits extends Int {
    
    /**
    *  render <input> tag
    */
    public function getfield($field){
            $attributes = $field['@attributes'];
            $html = '';
            if(!empty($attributes['value'])){
                $attributes['value'] = (int)$attributes['value'];
            }else{
                $attributes['value'] = 0;
            }
            $html .= '<div class="form-inline">';
            $html.='<input type="text" disabled="disabled" ';
            if (!empty($attributes))
            {
                    foreach ($attributes as $attribute => $value)
                    {
                            if (in_array($attribute, array('id', 'class', 'name', 'value', 'size')) and isset($value))
                            {
                                    $html .= ' ' . $attribute . '="' . $value . '"';
                            }
                    }
            }
            $html .= ' />';
            $html .= '<button type="button" class="btn" onclick="jQuery(\'#'.$attributes['id'].'\').val(0);";" >'.__('Reset','wpfd').'</button><div class="clearfix"></div>';
            $html .= '</div>';
            return $html;
    }
}