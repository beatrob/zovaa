<?php

/**
 * @author roberto
 * @copyright 2012
 */

class Input
{
    public $name;
    public $type = "text";
    public $accept;
    public $align;
    public $alt;
    public $checked;
    public $readonly;
    public $max;
    public $size;
    public $length;
    public $value;
    public $css;
    public $onclick;
    
    
    public function __construct($name)
    {
        $this->name = $name;
    }
    
    public function __toString()
    {
        if(isset($this->readonly))
        {
            $this->readonly = " readonly='".$this->readonly."' ";
        }
        if(isset($this->checked))
        {
            $this->checked = " checked='checked' ";
        }
        
        if(isset($this->onclick))
        {
            $this->onclick = " onclick='".$this->onclick."' ";
        }
        return '<input '.$this->readonly.$this->onclick.'class="'.$this->css.'"  name="'.$this->name.'" type="'.$this->type.'" accept="'.$this->accept.'" align="'.$this->align.'" alt="'.$this->alt.'" '.$this->checked.' maxlength="'.$this->max.'" size="'.$this->size.'" length="'.$this->length.'" value="'.$this->value.'" />';    
    }
} 

?>