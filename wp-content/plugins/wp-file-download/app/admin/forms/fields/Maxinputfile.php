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
use Joomunited\WPFramework\v1_0_0\Factory;
use Joomunited\WPFramework\v1_0_0\Application;
defined( 'ABSPATH' ) || die();

class Maxinputfile extends Int {
    
    public function getfield($field){
            $attributes = $field['@attributes'];
            
            $attributes['value'] = (int)$attributes['value'];
            $attributes['type'] = 'text';

            $max_upload = (int)(ini_get('upload_max_filesize'));
            $max_post = (int)(ini_get('post_max_size'));
            $memory_limit = (int)(ini_get('memory_limit'));
            $maxupload = min($max_upload, $max_post, $memory_limit);
            
            if($attributes['value']==0){
                $attributes['value'] = $maxupload;
            }
            
            $html = '';
            if(!empty($attributes['type']) || ( !empty($attributes['hidden']) && $attributes['hidden']!='true')){
		$html .= '<div class="control-group">';
                if(!empty($attributes['label']) && $attributes['label']!='' && !empty($attributes['name']) && $attributes['name']!=''){
                    $html .= '<label class="control-label" for="'.$attributes['name'].'">'.__($attributes['label'],  Application::getInstance('wpfd')->getName()).'</label>';
                }
                $html.= '<div class="controls">';
            }
            if(empty($attributes['hidden']) || (!empty($attributes['hidden']) && $attributes['hidden']!='true')){
                $html.='<input';
            }else{
                $html.='<hidden';
            }
            
            if (!empty($attributes))
            {
                    foreach ($attributes as $attribute => $value)
                    {
                            if (in_array($attribute, array('type', 'id', 'class', 'placeholder', 'name', 'value')) and isset($value))
                            {
                                    $html .= ' ' . $attribute . '="' . $value . '"';
                            }
                    }
            }
            $html .= ' />';
            $html .= '<i>&nbsp;('.__('Server allows ','wpfd').$maxupload.'mo)</i>';
            if(!empty($attributes['help']) && $attributes['help']!=''){
                $html .= '<p class="help-block">'.$attributes['help'].'</p>';
            }
            if(!empty($attributes['type']) || (!empty($attributes['hidden']) && $attributes['hidden']!='true')){                    
                $html .= '</div></div>';
            }
            return $html;
    }

    
}