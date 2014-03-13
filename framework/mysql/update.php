<?php

/**
 * @author roberto
 * @copyright 2012
 */

require_once("command.php");

class MysqlUpdate extends MysqlCommand
{    
    public function DoUpdate($table, $columns, $condition_string)
    {   
        $mysqlQueryColumms = " ";
        if(is_array($columns)) # columns to select
        {
            foreach($columns as $column => $value)
            {
                $mysqlQueryColumms .= $column."=".$value.", ";
            }
            $mysqlQueryColumms = substr($mysqlQueryColumms, 0, strlen($mysqlQueryColumms) - 2);
        }
        else
        {
            throw new Exception('Update columns must be type of array!');
        }
        
        $mysqlQueryCondition; # condition string
        if(isset($condition_string))
        {
            $mysqlQueryCondition = " WHERE ".$condition_string." ";
        }
        else
        {
            throw new Exception('Update condition missing!');
        }
       
        $mysqlQueryString = "UPDATE ".$table. " SET " .$mysqlQueryColumms.$mysqlQueryCondition;
        
        MysqlCommand::Debug($mysqlQueryString);
        
        return mysql_query($mysqlQueryString);
    }
}

?>