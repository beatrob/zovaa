<?php

/**
 * @author roberto
 * @copyright 2012
 */
session_start();
require_once("language.php");
require_once("social.php");
require_once("mainmenu.php");
require_once("bottommenu.php");
require_once("framework/languagehandler.php");
require_once("framework/weightmanager.php");
require_once("settings.php");
define("LANG", LanguageHandler::GetLanguage());



class Master
{
    private $LanguageFlags;
    private $MainMenu;
    private $SocialMenu;
    private $BottomMenu;
    private $CurrentFile;
    private $MaxImageWidth;
    private $MetaTagFile;
    private $WeightManager;
    
    public function __construct($metaTagFile, $MaxImageWidth=null)
    {
        $this->MaxImageWidth = $MaxImageWidth;
        $this->LanguageFlags = new Language();
        $this->SocialMenu = new Social();
        $this->MainMenu = new MainMenu(constant("LANG"));
        $this->BottomMenu = new BottomMenu($this->MainMenu->GetLinkNames(), constant("LANG"));
        $this->CurrentFile = $_SERVER["PHP_SELF"];
        $this->MetaTagFile = $metaTagFile;
        $parts = Explode('/', $this->CurrentFile);
        $this->CurrentFile = $parts[count($parts) - 1];
        if(isset($this->MaxImageWidth))
        {
            $this->WeightManager = new WeightManager($this->CurrentFile, constant("LANG"), $this->MaxImageWidth);
        }
        else
        {
            $this->WeightManager = new WeightManager($this->CurrentFile, constant("LANG"));
        }
    }
    
    function displayContent()
    {
        $this->WeightManager->drawContentByWeight();    
    }
    
    function DrawHeader()
    {
        echo '<!DOCTYPE html>
                <html>
                    <head>
                    <meta charset="UTF-8"/>';
        if(isset($this->MetaTagFile))
        {
            require_once($this->MetaTagFile);
        }       
        echo '<link rel="stylesheet" type="text/css" href="Style.css" />
                        <link rel="shortcut icon" href="images/favicon.ico" />
                        <link href="lightbox/css/lightbox.css" rel="stylesheet" />
                        <script src="lightbox/js/jquery-1.7.2.min.js"></script>
                        <script src="lightbox/js/lightbox.js"></script>
                    </head>
                <body>';
                //-----------------------------------
                // GOOGLE analytics insert
               echo '<script type="text/javascript">
                      var _gaq = _gaq || [];
                      _gaq.push([\'_setAccount\', \'UA-39146072-1\']);
                      _gaq.push([\'_trackPageview\']);
                      (function() {
                        var ga = document.createElement(\'script\'); ga.type = \'text/javascript\'; ga.async = true;
                        ga.src = (\'https:\' == document.location.protocol ? \'https://ssl\' : \'http://www\') + \'.google-analytics.com/ga.js\';
                        var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(ga, s);
                      })();
                    </script>';
               //-----------------------------------
        echo '<div id="Frame">
                        <div id="HeaderImage">'.$this->LanguageFlags.$this->SocialMenu.$this->MainMenu.'</div>
                        <div id="HeaderShadow"></div>
            ';
    }
    
    function DrawFooter()
    {
        
        echo $this->BottomMenu.'</div>
            <div id="FrameBottom" ><br /></div>
            <div id="Copyright">
                <p>Sunlight Apiary<br/>© 2013</p>
                <p><a href="login.php">webadmin</a></p>
            </div>
            <div id="Bottom"> </div>
          </body>
        </html>';
    }
}
?>