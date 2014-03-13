<?php
require_once("master-head.php");
?>
<div class="SubTitle">MANAGE AVAILABLE WEBPAGES</div>
<?php
require_once("../framework/pagemanager.php");


if(defined("UPDATE_MODE") && isset($updateDataArray)) ## handling update mode
{
    $language = new UpdatePage("pages.php", $updateDataArray["ID"], $updateDataArray["NAME"]);
    echo $language;
}
else
{
   $page = new AddPage("pages.php");
    $page->page_label =  "New webpage";
    $page->submit_btn->value = "Add";
    echo $page;
    
    try
    {
        $adminTable = new AdminTable("pages");
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
