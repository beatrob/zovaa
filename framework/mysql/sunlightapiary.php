<?php

/**
 * @author roberto
 * @copyright 2012
 */

$hostname = "localhost";
$database = "base";
$username= "zovaa";
$password = "zovaa";

$con = mysql_pconnect($hostname, $username, $password);
mysql_set_charset('utf8',$con);
if (!$con)
{
  die('Could not connect: ' . mysql_error());
}

mysql_select_db($database, $con);

?>