<?php

/**
 * @author roberto
 * @copyright 2012
 */

class TextHandler
{
    public static function ConvertLinebreakToBR($text)
    {
        return nl2br($text);
    }
    
    public static function ConvertBRToLinebreak($text)
    {
        return str_replace("<br />", "", $text);
    }
}

?>