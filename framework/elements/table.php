<?php

/**
 * @author roberto
 * @copyright 2012
 */
class Table
{
    private $data = array();
    private $columns;
    public $align;
    
    public function __construct($columns)
    {
        $data = new ArrayObject();
        $this->columns = intval($columns);
        
    }
    
    public function __toString()
    {
        if(isset($this->align))
        {
            $this->align = ' align="'.$this->align.'" ';
        }
        $counter = 0;
        if($this->columns > 0)
        {
            echo "<table".$this->align."><tr>";
            foreach ($this->data as $data)
            {
                echo '<td>'.$data.'</td>';
                $counter ++;
                if($counter % $this->columns == 0){ echo "</tr><tr>"; }
            }
            echo "</tr></table>";
        }
        return "";
    }
        
    public function Add($value)
    {
        $this->data[] = $value;
    }
}


?>