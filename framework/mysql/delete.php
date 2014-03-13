<?php

/**
 * @author roberto
 * @copyright 2012
 */
require_once('command.php');

class MysqlDelete extends MysqlCommand
{    
    private function DoDelete($table, $condition)
    {
        $mysqlQueryString = "DELETE FROM " .$table. " WHERE " .$condition;        
        MysqlCommand::Debug($mysqlQueryString);
        
        if(!mysql_query($mysqlQueryString))
        {
            throw new Exception(mysql_error());
        }
    }
    
    public function DeleteById($table, $id)
    {
        $this->DoDelete($table, "ID=".$id);
    }
}

?>