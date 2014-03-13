<?php
require_once("master-head.php");
?>
<?php 
require_once("../framework/articlereader.php");
require_once("../framework/languagehandler.php");
require_once("../framework/albumreader.php");
require_once("../framework/weightmanager.php");

define("LANGUAGE", LanguageHandler::GetLanguage());

$langs = new LanguageHandler();
$langs->drawLanguageLinks();

if(isset($_GET["p_name"]))
{
    echo "<p align='center'><font size='+2'><b>".$_GET["p_name"]." / ".constant("LANGUAGE")."</b></font></p>";
    $weightManager = new WeightManager($_GET["p_name"], constant("LANGUAGE"));
    $weightManager->drawContentByWeight();
    /*$reader = new ArticleReader($_GET["p_name"], constant("LANGUAGE"));
    $reader->DisplayAllArticles();
    $albums = new AlbumReader($_GET["p_name"]);
    echo $albums;*/
}
?>
<?php
require_once("master-foot.php");
?>
