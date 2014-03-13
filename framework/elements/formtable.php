<?php

/**
 * @author roberto
 * @copyright 2012
 */
 
require_once("config.php");
 
class FormTable implements ICss
{
    private $col1_css_class;
    private $col2_css_class;
    private $table_css_class;
    private $data = array();
    
    public function __construct()
    {
        $data = new ArrayObject();
        $this->col1_css_class = constant("FormTable::FormTableCol1");
        $this->col2_css_class = constant("FormTable::FormTableCol2");
        $this->table_css_class = constant("FormTable::FormTable");
    }
    
    public function SetCol1CssClass($css_class)
    {
        $this->col1_css_class = $css_class;
    }
    
    public function SetCol2CssClass($css_class)
    {
        $this->col2_css_class = $css_class;
    }
    
    public function SetTableCssClass($css_class)
    {
        $this->table_css_class = $css_class;
    }

    public function __toString()
    {
        $addAfter = array();
        echo '<table width="100%" class="'.$this->table_css_class.'">';
        foreach ($this->data as $name => $data)
        {
            if(strpos($name, "HIDDEN") !== false)
            {
                $addAfter[] = $data;
            }
            else
            {
                echo '<tr><td width="30%" class="'.$this->col1_css_class.'">'.$name.'</td><td width="70%" class="'.$this->col2_css_class.'">'.$data.'<td/></tr>';    
            }
        }
        echo "</table>";
        foreach ($addAfter as $i => $value)
        {
           echo $addAfter[$i];    
        }
        return "";
    }
        
    public function Add($name, $value)
    {
        $this->data[$name] = $value;
    }
}


?>