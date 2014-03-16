<?php

/**
 * @author roberto
 * @copyright 2012
 */

require_once("command.php");

class MysqlSelect extends MysqlCommand
{    
    public function createQuerryString($table, $columns=null, $condition_string=null, $innerjoin_string=null, $orderby_string=null)
    {
        $mysqlQueryColumms = " * ";
        
        if(is_array($columns)) # columns to select
        {
            $mysqlQueryColumms = " ";
            foreach($columns as $column)
            {
                $mysqlQueryColumms .= $column.", ";
            }
            $mysqlQueryColumms = substr($mysqlQueryColumms, 0, strlen($mysqlQueryColumms) - 2);
        }
        
        $mysqlQueryCondition = ""; # condition array
        if(isset($condition_string))
        {
            $mysqlQueryCondition = " WHERE ".$condition_string." ";
        }
        if(isset($innerjoin_string))
        {
            $innerjoin_string = " ".$innerjoin_string." ";
        }
        if(isset($orderby_string))
        {
            $orderby_string = " ORDER BY ".$orderby_string." ";
        }
        $qs = "SELECT ".$mysqlQueryColumms. " FROM " .$table.$innerjoin_string.$mysqlQueryCondition.$orderby_string;
        MysqlCommand::Debug($qs);
        return $qs;
    }
    
    public function DoSelect($table, $columns=null, $condition_string=null, $innerjoin_string=null, $orderby_string=null)
    {
        $mysqlQueryString = $this->createQuerryString($table, $columns, $condition_string, $innerjoin_string, $orderby_string);
        return mysql_query($mysqlQueryString);
    }
    
    public function doUnion($qs1, $qs2, $condition)
    {
        $qs = "(".$qs1.") UNION (".$qs2.")";
        if($condition)
        {
            $qs .= " ".$condition;
        }
        MysqlCommand::Debug($qs);
        return mysql_query($qs);
    }
}

?>