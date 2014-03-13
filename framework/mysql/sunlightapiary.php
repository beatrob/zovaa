<?php

/**
 * @author roberto
 * @copyright 2012
 */

$hostname = "localhost";
$database = "basic";
$username= "sunlightapiary";
$password = "sunlightapiary";

$con = mysql_pconnect($hostname, $username, $password);
mysql_set_charset('utf8',$con);
if (!$con)
{
  die('Could not connect: ' . mysql_error());
}

mysql_select_db($database, $con);

?>