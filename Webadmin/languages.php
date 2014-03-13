<?php
require_once("master-head.php");
?>
<div class="SubTitle">MANAGE AVAILABLE LANGUAGES</div>
<?php
require_once("../framework/languagemanager.php");

if(defined("UPDATE_MODE") && isset($updateDataArray)) ## handling update mode
{
    $language = new UpdateLanguage("languages.php", $updateDataArray["ID"], $updateDataArray["NAME"]);
    echo $language;
}
else
{
    $language = new AddLanguage("languages.php");
    $language->submit_btn->value = "Add";
    echo $language;
    
    try
    {
        $adminTable = new AdminTable("languages");
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
