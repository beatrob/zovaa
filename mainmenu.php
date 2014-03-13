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
            case "HU" : $this->linkNames = array("index.php"=>"Főoldal", "apiary.php"=>"Méhészetünk", "galery.php"=>"Galéria", "offers.php"=>"Kínálatunk", "contact.php"=>"Elérhetőség" ); break;
            case "EN" : $this->linkNames = array("index.php"=>"Home", "apiary.php"=>"Apiary", "galery.php"=>"Galery", "offers.php"=>"Our products", "contact.php"=>"Contact us" ); break;
            case "SK" : $this->linkNames = array("index.php"=>"Domov", "apiary.php"=>"Včelárstvo", "galery.php"=>"Galeria", "offers.php"=>"Naša ponuka", "contact.php"=>"Kontakt" ); break;
            case "DE" : $this->linkNames = array("index.php"=>"Zuhause", "apiary.php"=>"Imkerei", "galery.php"=>"Galerie", "offers.php"=>"Angebot", "contact.php"=>"Kontakt" ); break;
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
                   <a href="apiary.php?lang='.$this->lang.'">'.$this->linkNames["apiary.php"].'</a>
                   <a href="galery.php?lang='.$this->lang.'">'.$this->linkNames["galery.php"].'</a>
                   <a href="offers.php?lang='.$this->lang.'">'.$this->linkNames["offers.php"].'</a>
                   <a href="contact.php?lang='.$this->lang.'">'.$this->linkNames["contact.php"].'</a>
                </div>';
        return $output;
    }
}

?>
