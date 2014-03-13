<?php

/**
 * @author roberto
 * @copyright 2013
 */


class Social
{
    public function __toString()
    {
        $output =   '<div id="Social">
                        <a href="http://www.facebook.com/" target="_blank"><img border="0" width="32" height="32" src="images/facebook-48.png" align="absmiddle"/></a>
                        <a href="http://twitter.com/" target="_blank"><img border="0" width="32" height="32" src="images/twitter-48.png" align="absmiddle" /></a>
                        <a href="http://www.linkedin.com/" target="_blank"><img border="0" width="32" height="32" src="images/linkedin-48.png" align="absmiddle" /></a>
                     </div>';
        return $output;
    }
}

?>
