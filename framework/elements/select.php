<?php

/**
 * @author roberto
 * @copyright 2012
 */
class Select
{
    private $data = array();
    public $selected;
    public $name;
    public $ident;
    
    public function __construct($name)
    {
        $data = new ArrayObject();
        $this->name = $name;
    }
    
    public function __toString()
    {
        if(isset($this->ident))
        {
            $this->ident = " id='". $this->ident ."' ";
        }
        $output = "<select ".$this->ident." name='".$this->name."'>";
        foreach ($this->data as $name => $data)
        {
            $selected = "";
            if(isset($this->selected))
            {
                if($this->selected == $name)
                {
                    $selected = "selected='selected'";
                }
            }
            $output .= "<option value='".$name."' ".$selected.">".$data."</option>";
        }
        $output .= "</select>";
        return $output;
    }
        
    public function Add($name, $value)
    {
        $this->data[$name] = $value;
    }
}


?>