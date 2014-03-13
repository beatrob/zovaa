<?php
require_once("master-head.php");
?>
<div class="SubTitle">Manage image albums</div>
<?php
require_once("../framework/mysql/mysqlmanager.php");
require_once("../framework/albummanager.php");
require_once("../framework/admintable.php");

$mysqlMan = new MySqlManager();
$pagesRecordList = $mysqlMan->SelectAllFromTable("pages");
$pages = array();
while($p=mysql_fetch_assoc($pagesRecordList))
{
    $pages[$p['ID']] = $p['NAME'];
}
mysql_data_seek($pagesRecordList, 0);    


if(defined("UPDATE_MODE") && isset($updateDataArray)) ## handling update mode
{
    $updateAlbum = new UpdateAlbum("albums.php", $updateDataArray["ID"], $updateDataArray["NAME"], $updateDataArray["PAGE_ID"], $updateDataArray["COLUMNS"],  $updateDataArray["DISPLAY_NAME"], $updateDataArray["GALERY"], $updateDataArray["WEIGHT"]);
    $updateAlbum->AddPages($pagesRecordList);
    echo($updateAlbum);
}
else
{
    $addAlbum = new AddAlbum("albums.php");
    $addAlbum->AddPages($pagesRecordList);
    echo $addAlbum;
    
    $adminTable = new AdminTable("albums");
    $adminTable->pageIdToNameArray = $pages;
    echo $adminTable;    
}
?>
<?php
require_once("master-foot.php");
?>
