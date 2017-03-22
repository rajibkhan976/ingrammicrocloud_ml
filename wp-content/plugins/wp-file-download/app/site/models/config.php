<?php
/**
 * WP File Download
 *
 * @package WP File Download
 * @author Joomunited
 * @version 1.0
 */

use Joomunited\WPFramework\v1_0_0\Model;

defined('ABSPATH') || die();

class WpfdModelConfig extends Model
{

    public function getGlobalConfig()
    {

        $defaultConfig = array('allowedext' => '7z,ace,bz2,dmg,gz,rar,tgz,zip,csv,doc,docx,html,key,keynote,odp,ods,odt,pages,pdf,pps,ppt,pptx,rtf,tex,txt,xls,xlsx,xml,bmp,exif,gif,ico,jpeg,jpg,png,psd,tif,tiff,aac,aif,aiff,alac,amr,au,cdda,flac,m3u,m4a,m4p,mid,mp3,mp4,mpa,ogg,pac,ra,wav,wma,3gp,asf,avi,flv,m4v,mkv,mov,mpeg,mpg,rm,swf,vob,wmv,css,img');
        $defaultConfig['deletefiles'] = 0;
        $defaultConfig['catparameters'] = 1;
        $defaultConfig['defaultthemepercategory'] = 'default';
        $defaultConfig['date_format'] = 'd-m-Y';
        $config = get_option('_wpfd_global_config', $defaultConfig);

        return (array)$config;
    }

    public function getConfig($theme_name = '')
    {

        if ($theme_name != '') {
            $theme = $theme_name;
        } else {
            $theme = get_option('wpfd_theme', 'default');
        }

        $deaults= array('default'=>'{"marginleft":"10","marginright":"10", "margintop":"10", "marginbottom":"10", "showsize":"1","showtitle":"1","showdescription":"1","showversion":"1","showhits":"1","showdownload":"1","bgdownloadlink":"#76bc58","colordownloadlink":"#ffffff","showdateadd":"1","showdatemodified":"0","showsubcategories":"1","showcategorytitle":"1","showbreadcrumb":"1","showfoldertree":"0"}',
                        'ggd'=>'{"ggd_marginleft":"10","ggd_marginright":"10", "ggd_margintop":"10", "ggd_marginbottom":"10", "ggd_showsize":"1","ggd_showtitle":"1","ggd_showdescription":"1","ggd_showversion":"1","ggd_showhits":"1","ggd_showdownload":"1","ggd_bgdownloadlink":"#76bc58","ggd_colordownloadlink":"#ffffff","ggd_showdateadd":"1","ggd_showdatemodified":"0","ggd_showsubcategories":"1","ggd_showcategorytitle":"1","ggd_showbreadcrumb":"1","ggd_showfoldertree":"0"}',
                        'table'=>'{"table_styling":"1","table_stylingmenu":"1","table_showsize":"1","table_showtitle":"1","table_showdescription":"1","table_showversion":"1","table_showhits":"1","table_showdownload":"1","table_bgdownloadlink":"#76bc58","table_colordownloadlink":"#ffffff","table_showdateadd":"1","table_showdatemodified":"0","table_showsubcategories":"1","table_showcategorytitle":"1","table_showbreadcrumb":"1","table_showfoldertree":"0"}',
                        'tree'=>'{"tree_showbgtitle":"1","tree_showtreeborder":"1","tree_showsize":"1","tree_showtitle":"1","tree_showdescription":"1","tree_showversion":"1","tree_showhits":"1","tree_showdownload":"1","tree_bgdownloadlink":"#76bc58","tree_colordownloadlink":"#ffffff","tree_showdateadd":"1","tree_showdatemodified":"0","tree_showsubcategories":"1","tree_showcategorytitle":"1"}',
        );
        $theme_params = get_option('wpfd_' . $theme . '_config', $deaults[$theme]);
        if (is_string($theme_params)) {
            $theme_params = json_decode($theme_params, true);
        }

        return $theme_params;
    }

    public function getFileConfig()
    {

        $defaultConfig = array(
            'singlebg'        => '#444444',
            'singlehover'     => '#888888',
            'singlefontcolor' => '#ffffff',
        );

        $config = get_option('_wpfd_global_file_config', $defaultConfig);

        return (array)$config;
    }

}