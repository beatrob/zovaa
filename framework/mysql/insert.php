<?php

/**
 * @author roberto
 * @copyright 2012
 */
require_once('command.php');

class MysqlInsert extends MysqlCommand
{    
    public function DoInsert($table, $data)
    {
        $mysqlQueryString = "INSERT INTO " .$table. " (";
        foreach ($data as $name => $value) # Adding the columns
        {
            $mysqlQueryString .= $name.", ";
        }
        $mysqlQueryString = substr($mysqlQueryString, 0, strlen($mysqlQueryString) - 2);
        $mysqlQueryString .= ") VALUES( ";
        foreach ($data as $name => $value) # Adding the columns
        {
            $mysqlQueryString .= $value.", ";
        }
        $mysqlQueryString = substr($mysqlQueryString, 0, strlen($mysqlQueryString) - 2);
        $mysqlQueryString .= ")";
        
        if(!mysql_query($mysqlQueryString))
        {
            throw new Exception(mysql_error());
        }
    }
}

?>