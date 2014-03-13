<?php

/**
 * @author roberto
 * @copyright 2012
 */

require_once("../framework/mysql/mysqlmanager.php");

$mysqlMan = new MySqlManager();
$pages = $mysqlMan->SelectPages();

?>
<div>
<table class="MenuTable">
<tr>
<td><a href='pages.php'>WEB PAGES</a></td>
<td><a href='articles.php'>ARTICLES</a></td>
<td><a href='types.php'>ARTICLE TYPES</a></td>
<td><a href='languages.php'>LANGUAGES</a></td>
<td><a href="albums.php">ALBUMS</a></td>
<td><a href='images.php'>IMAGES</a></td>
</tr>
</table>
</div>
<div>
<table class="MenuTable">
<tr>
<?php 
require_once("../settings.php");
while($page = mysql_fetch_array($pages))
{
    echo "<td>
            <a href='http://".
            $_SERVER['SERVER_NAME'].
            Settings::INETRFACE.
            "/Webadmin/index.php".
            "?p_name=".$page["NAME"].
            "'>".$page["NAME"]."</a>
        </td>";
}
?>
</tr>
</table>
</div>