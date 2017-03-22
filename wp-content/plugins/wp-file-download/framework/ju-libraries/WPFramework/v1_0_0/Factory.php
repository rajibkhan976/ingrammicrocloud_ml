<?php
/**
 * WP Framework 
 *
 * @package WP File Download
 * @author Joomunited
 * @version 1.0
 */

namespace Joomunited\WPFramework\v1_0_0;

defined( 'ABSPATH' ) || die();

class Factory {

    protected static $application;
    
    protected static $document;

    public static function getApplication(){
            if (!self::$application){
                self::$application = Application::getInstance();
            }
            return self::$application;
    }    


    public static function getDbo(){
        Factory::getApplication()->getDbo();
    }


//    public static function getDocument(){
//            if (!self::$document){
//                self::$document = Document::getInstance();
//            }
//            return self::$document;
//    }    

}

?>
