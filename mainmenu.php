<?php

/**
 * @author roberto
 * @copyright 2012
 */


class MainMenu
{
    private $lang;
    private $linkNames;
    
    public function __construct($lang)
    {
        $this->lang = $lang;
        switch($lang)
        {
            case "HU" : $this->linkNames = array("index.php"=>"Főoldal", "technology.php"=>"Technika", "galery.php"=>"Galéria", "references.php"=>"Referencia", "contact.php"=>"Elérhetőség", "demo.php"=>"Demó" ); break;
            case "EN" : $this->linkNames = array("index.php"=>"Home", "technology.php"=>"Technology", "galery.php"=>"Galery", "references.php"=>"References", "contact.php"=>"Contact us", "demo.php"=>"Demo" ); break;
            case "SK" : $this->linkNames = array("index.php"=>"Domov", "technology.php"=>"Technika", "galery.php"=>"Galeria", "references.php"=>"Referencie", "contact.php"=>"Kontakt", "demo.php"=>"Demo" ); break;
        } 
    }
    
    public function GetLinkNames()
    {
        return $this->linkNames;
    }
    
    public function __toString()
    {
        $output = '<div id="MainMenu">
                   <a href="index.php?lang='.$this->lang.'">'.$this->linkNames["index.php"].'</a>
                   <a href="technology.php?lang='.$this->lang.'">'.$this->linkNames["technology.php"].'</a>
                   <a href="galery.php?lang='.$this->lang.'">'.$this->linkNames["galery.php"].'</a>
                   <a href="references.php?lang='.$this->lang.'">'.$this->linkNames["references.php"].'</a>
                   <a href="demo.php?lang='.$this->lang.'">'.$this->linkNames["demo.php"].'</a>
                   <a href="contact.php?lang='.$this->lang.'">'.$this->linkNames["contact.php"].'</a>
                </div>';
        return $output;
    }
}

?>
