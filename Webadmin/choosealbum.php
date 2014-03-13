<!DOCTYPE html>
<html>
  <head>
    <title>Hello HTML</title>
  </head>
    <script>
    function addAlbum() {
        var sel = self.document.getElementById("SELECT_ALBUM");
        self.opener.document.forms[0].TEXT.value=self.opener.document.forms[0].TEXT.value + "\n[@album id=\"" + sel.options[sel.selectedIndex].value + "\" name=\"" + sel.options[sel.selectedIndex].text + "\"]\n";
    }
</script>
  <body>
<?php
require_once("../framework/elements/select.php");
require_once("../framework/mysql/mysqlmanager.php");

$mysqlMan = new MySqlManager;
$albums = $mysqlMan->SelectAllFromTable("albums");
$selectAlbum = new Select("SELECT_ALBUM");
$selectAlbum->ident = "SELECT_ALBUM";

while($rec = mysql_fetch_assoc($albums))
{
    $selectAlbum->Add($rec["ID"], $rec["NAME"]);
}




?>
<form>
<b>Please choose an album:</b> <br/>
<?php echo $selectAlbum; ?>
<br />
<input type="submit" onclick="addAlbum()" />
</form>
</body>
</html>