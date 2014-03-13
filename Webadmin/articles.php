<?php
require_once("master-head.php");
?>
<div class="SubTitle">MANAGE AVAILABLE ARTICLES</div>
<?php
require_once("../framework/articlewriter.php");
require_once("../framework/mysql/mysqlmanager.php");

$mysqlMan = new MySqlManager();

# reading all teh languages, article types and pages
$langArray = $mysqlMan->SelectAllFromTable("languages");
$typesArray = $mysqlMan->SelectAllFromTable("article_types");
$pagesArray = $mysqlMan->SelectAllFromTable("pages");

# fatching the page IDs to names
$pageIdToNameArray = array();
while($rec = mysql_fetch_assoc($pagesArray))
{
    $pageIdToNameArray[$rec["ID"]] = $rec["NAME"];
}
mysql_data_seek($pagesArray, 0);

# fatching the article type IDs to names
$typeIdToNameArray = array();
while($rec = mysql_fetch_assoc($typesArray))
{
    $typeIdToNameArray[$rec["ID"]] = $rec["NAME"];
}
mysql_data_seek($typesArray, 0);





if(defined("UPDATE_MODE") && isset($updateDataArray)) ## handling update mode
{
    $articleUpdater = new ArticleUpdater("articles.php", "1",$updateDataArray["ID"], $updateDataArray["TITLE"], $updateDataArray["TEXT"], $updateDataArray["FOOTER"], $updateDataArray["LANG_ID"], $updateDataArray["PAGE_ID"], $updateDataArray["TYPE_ID"], $updateDataArray["WEIGHT"], $updateDataArray["DISPLAY_TITLE"]);
    $articleUpdater->AddPages($pagesArray);
    $articleUpdater->AddLanguages($langArray);
    $articleUpdater->AddArticleTypes($typesArray);
    echo $articleUpdater;
}
else
{
    $articleWriter = new ArticleWriter("articles.php");
    $articleWriter->submit_btn->value = "Add";
    $articleWriter->AddPages($pagesArray);
    $articleWriter->AddLanguages($langArray);
    $articleWriter->AddArticleTypes($typesArray);
    
    echo $articleWriter;
    
    try
    {
        $adminTable = new AdminTable("articles");
        $adminTable->pageIdToNameArray = $pageIdToNameArray;
        $adminTable->typeIdToNameArray = $typeIdToNameArray;
        echo $adminTable;    
    }
    catch(exception $e)
    {
        echo $e;
    }
}
?>
<?php
require_once("master-foot.php");
?>
