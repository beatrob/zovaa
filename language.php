<?php

/**
 * @author roberto
 * @copyright 2013
 */


class Language
{
    private $page;
    public function __construct()
    {
        $this->page = $_SERVER['PHP_SELF'];
    }
    
    public function __toString()
    {
        $output =   '<div id="Language">
                        <a href="'.$this->page.'?lang=EN"><img border="0" width="32" height="32" src="images/United-Kingdom.png" align="absmiddle" /></a>
                        <a href="'.$this->page.'?lang=HU"><img border="0" width="32" height="32" src="images/Hungary.png" align="absmiddle" /></a>
                        <a href="'.$this->page.'?lang=SK"><img border="0" width="32" height="32" src="images/Slovakia.png" align="absmiddle" /></a>
                    </div>';
        return $output;
    }
}
?>