<?php
/**
 * @author roberto
 * @copyright 2012
 */

session_start();
require_once("../settings.php");
require_once("../framework/sessionmanager.php");
SessionManager::ValidateSession();

# handling the update request
$updateDataArray;
if(isset($_GET["update"]))
{
    if(isset($_GET["id"]) && isset($_GET["table"]))
    {
        try
        {
            require_once("../framework/mysql/mysqlmanager.php");
            $mysqlManager = new MySqlManager();
            $retVal=$mysqlManager->SelectById($_GET["table"], $_GET["id"]);
            $updateDataArray = mysql_fetch_assoc($retVal);
            if(is_array($updateDataArray))
            {
                define("UPDATE_MODE", true); 
            } 
        }
        catch(exception $ex)
        {
            
        }
           
    }
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>SunlightApiary - Webadmin</title>
    <link rel="stylesheet" type="text/css" href="Style.css" />
    <link href="css/lightbox.css" rel="stylesheet" />
  </head>
  <body>
    <script src="js/jquery-1.7.2.min.js"></script>
    <script src="js/lightbox.js"></script>
    <div id="Content">
    <div id="Title">
        <table style="width: 100%;">
            <tr>
                <td><a href="../"><< zovaa.com</a></td>
                <td>Webadministrator</td>
                <td style="text-align: right;"><a href="../framework/formhandler.php?logoff=1">log off</a></td>
            </tr>
        </table>
    </div>
    <div id="Menu"><?php include("menu.php");?></div>
    <div id="PageContent">
<?php require_once("../framework/admintable.php"); ?>