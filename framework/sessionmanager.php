<?php

/**
 * @author roberto
 * @copyright 2013
 */

class SessionManager
{
    
    public static function StartSession($id)
    {
        session_start();
         $_SESSION['ID'] = $id;    
    }
    
    public static function ValidateSession()
    {
        if(!isset($_SESSION['ID']))
        {
            header(sprintf("Location: %s", 'http://'.$_SERVER['SERVER_NAME'].Settings::INETRFACE."/login.php?permissiondenied=1"));
            exit(0);
        }
        return true;
    }
    
    public static function DestroySession()
    {
        session_destroy();
        header(sprintf("Location: %s", 'http://'.$_SERVER['SERVER_NAME'].Settings::INETRFACE."/index.php"));
        exit(0);
    }
}

?>