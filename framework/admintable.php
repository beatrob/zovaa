<?php

/**
 * @author roberto
 * @copyright 2012
 */

require_once "mysql/mysqlmanager.php";

class AdminTable
{
    private $tableData;
    private $table;
    public $pageIdToNameArray;
    public $typeIdToNameArray;
    public $albumIdToNameArray;
    
    public function __construct($table)
    {
        $this->table = $table;
        try
        {
            $mysqlMan = new MySqlManager();
            $this->tableData = $mysqlMan->SelectAllFromTable($table);
        }
        catch(Exception $ex)
        {
            throw new Exception($ex);
        }
        
    }
    
    private function shortenString($string)
    {
        if (strlen($string) >= 20) {
            return substr($string, 0, 10). " ... " . substr($string, -5);
        }
        return $string;
    }
    
    
    public function __toString()
    {
        echo "<table class='AdminTable'>";
        $first = true;
        $id;
        while($dataArray = mysql_fetch_assoc($this->tableData))
        {
            if($first)
            {
                echo "<tr>"; 
                $keys = array_keys($dataArray);
                foreach($keys as $k)
                {
                    echo "<td class='AdminTableHead'>".$k."</td>";
                }
                echo "<td class='AdminTableHead'>ACTION</td>";
                $first=false;
                echo "</tr>"; 
            }
            echo "<tr>"; 
            while (list($key, $value) = each($dataArray))
            {
                    $value = Settings::ReplaceMagicStrings($value);
                    if(strtolower($key) == 'id')
                    {
                        $id=$value;
                    }
                    if(isset($this->pageIdToNameArray)) # used by article.php
                    {
                        if($key=="PAGE_ID")
                        {
                            $value = $this->pageIdToNameArray[$value];
                        }
                    }
                    if(isset($this->typeIdToNameArray)) # used by article.php
                    {
                        if($key=="TYPE_ID")
                        {
                            $value = $this->typeIdToNameArray[$value];
                        }
                    }
                    if(isset($this->albumIdToNameArray)) # used by images.php
                    {
                        if($key=="ALBUM_ID")
                        {
                            $value = $this->albumIdToNameArray[$value];
                        }
                    }
                    if(substr_count($value, 'http://') > 0)
                    {
                        $value='<a href="'.$value.'" target="_blank">'.$value.'</a>';
                    }
                    else
                    {
                        if(substr_count($value, '<a') == 0)
                            $value=$this->shortenString($value);
                    }
                    echo "<td class='AdminTableColumn'>".$value."</td>";
            }
            echo "<td class='AdminTableColumn'>
                    <form method='POST' action='../framework/formhandler.php'>
                        <Input type='submit' value='CHANGE' />
                        <Input type='hidden' name='TABLE' value='".$this->table."' />
                        <Input type='hidden' name='ID' value='".$id."' />
                        <Input type='hidden' name='FORMNAME' value='UPDATERECORD' />
                        <Input type='hidden' name='ONSUCCESS' value='".basename($_SERVER['PHP_SELF'])."'/>
                    </form>".
                    "<form method='POST' action='../framework/formhandler.php' onsubmit='return confirm(\"Do you really want to delete this record?\")'>
                        <Input type='submit' value='DELETE' />
                        <Input type='hidden' name='TABLE' value='".$this->table."' />
                        <Input type='hidden' name='ID' value='".$id."' />
                        <Input type='hidden' name='FORMNAME' value='DELETERECORD' />
                        <Input type='hidden' name='ONSUCCESS' value='".basename($_SERVER['PHP_SELF'])."'/>
                    </form>".
                    "</td>";
            echo "</tr>";
        }
        echo "</table>";
        return '';
    }
}
?>