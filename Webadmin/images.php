<?php
require_once("master-head.php");
?>
<div class="SubTitle">Manage images</div>
<?php
require_once("../framework/imagemanager.php");
require_once("../framework/mysql/mysqlmanager.php");
require_once("../framework/admintable.php");

$mysqlMan = new MySqlManager();
$albumRecordList =  $mysqlMan->SelectAllFromTable("albums");
$albums = array();
while($a = mysql_fetch_assoc($albumRecordList))
{
    $albums[$a['ID']] = $a['NAME'];
}
mysql_data_seek($albumRecordList, 0);

if(defined("UPDATE_MODE") && isset($updateDataArray)) ## handling update mode
{
    $updateImage = new UpdateImage("images.php", $updateDataArray["ID"], $updateDataArray["URL"], $updateDataArray["THUMB_URL"], $updateDataArray["NAME"], $updateDataArray["ALBUM_ID"]);
    $updateImage->AddAlbums($albumRecordList);
    echo $updateImage;
}
else
{
    $uploadImage = new UploadImage("images.php");
    $uploadImage->AddAlbums($albumRecordList);
    echo $uploadImage;
    
    $adminTable = new AdminTable("images");
    $adminTable->albumIdToNameArray = $albums;
    echo $adminTable;   
}
?>
<?php
require_once("master-foot.php");
?>
