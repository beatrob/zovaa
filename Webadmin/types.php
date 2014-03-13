<?php
require_once("master-head.php");
?>
<div class="SubTitle">ARTICLE AND IMAGE TYPES</div>
<?php
require_once("../framework/articletypemanager.php");
if(defined("UPDATE_MODE") && isset($updateDataArray)) ## handling update mode
{
    $artType = new UpdateArticleType("types.php", $updateDataArray["ID"], $updateDataArray["NAME"]);
    echo $artType;
}
else
{
    $artType = new AddArticleType("types.php");
    $artType->articletype_label = "New article & image type";
    $artType->submit_btn->value = "Add";
    echo $artType;
    try
    {
        $adminTable = new AdminTable("article_types");
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
