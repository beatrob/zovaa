<?php

/**
 * @author roberto
 * @copyright 2012
 */


class BottomMenu
{
    private $linkNames;
    private $lang;
    
    public function __construct($linkNames, $lang)
    {
        $this->linkNames = $linkNames;
        $this->lang = $lang;
    }
    
    public function __toString()
    {
        $output = '<div id="BottomMenu">
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
