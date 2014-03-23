<?php

/**
 * @author roberto
 * @copyright 2013
 */

require_once("master.php");
$master = new Master('meta/'.constant("LANG").'/galery.meta');
$master->headerDivName = "GaleryHeaderImage";
$master->DrawHeader();
?>
<div id="MainContent">
<div id="Left"><?php $master->displayContent(); ?></div>
<div id="Right"><iframe width="255" height="800px" frameborder="0" scrolling="no" src="advertisement.php"></iframe></div>
</div>

<?php $master->DrawFooter(); ?>