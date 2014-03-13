<?php

/**
 * @author roberto
 * @copyright 2012
 */

class Textarea
{
    private $name;
    public $cols;
    public $rows;
    public $value;

    public function __construct($name)
    {
        $this->name = $name;
    }
    
    public function __toString()
    {
        return '<textarea name="'.$this->name.'" cols="'.$this->cols.'" rows="'.$this->rows.'">'.$this->value.'</textarea>';
         
    }
} 

?>