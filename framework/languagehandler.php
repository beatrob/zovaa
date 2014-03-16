<?php

/**
 * @author roberto
 * @copyright 2012
 */
require_once("mysql/mysqlmanager.php");

class LanguageHandler
{
    public static function GetLanguage()
    {
        $default = "SK";
        if(isset($_GET['lang']))
        {
            $lang=$_GET['lang'];
            if($lang=="HU" || $lang=="SK" || $lang=="EN")
            {
                $_SESSION["LANG"] = $lang;
                return $lang;
            }
        }
        if(isset($_SESSION["LANG"]))
        {
            return $_SESSION["LANG"];
        }
        return $default;
    }
    
    private $drawFlags;
    private $languageList;
    
    public function __construct()
    {
        $myslMan = new MySqlManager();
        $res = $myslMan->SelectAllFromTable("languages");
        $this->languageList = array();
        while($l = mysql_fetch_assoc($res))
        {
            $this->languageList[] = $l["ID"];
        }
    }
    
    public function drawLanguageLinks()
    {
        $p_name = "";
        if(isset($_GET['p_name']))
        {
            $p_name="p_name=".$_GET["p_name"]."&";
        }
        echo "<div id='Languages'>";
        foreach($this->languageList as $lang)
        {
            echo "<a href='".$_SERVER["PHP_SELF"]."?".$p_name."lang=".$lang."'>".$lang."</a> ";
        }
        echo "</div>";
    }
}

?>