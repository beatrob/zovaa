<?php

/**
 * @author roberto
 * @copyright 2012
 */

class Settings
{
    const INETRFACE = "/SunlightApiary"; // e.g. "/SunlightApiary" 
    const THUMBNAIL_WIDTH = 300; // in pixels - used always in picture galeries
    const MAX_IMAGE_WITDH = 600; // if the thumbnail is not set set thi image size will be used
    const OPTIMIZED_IMAGE_WIDTH = 1024;
    const OPTIMIZED_IMAGE_HEIGHT = 728;
    const SERVER_NAME = "http://rob-pc";
    
    public static function ReplaceMagicStrings($str)
    {
        $str = str_replace('[@server]', Settings::SERVER_NAME, $str);
        return $str;
    }
}

?>