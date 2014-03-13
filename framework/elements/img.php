<?php

/**
 * @author roberto
 * @copyright 2012
 */

class Img
{
    public $src;
    public $width;
    public $height;
    public $alt;
    public $border;
    
    
    public function __construct($src)
    {
        $this->src = " src='".$src."' ";
    }
    
    public function __toString()
    {
        if(isset($this->width))
        {
            $this->width = " width='".$this->width."' ";
        }
        if(isset($this->height))
        {
            $this->height = " height='".$this->height."' ";
        }
        if(isset($this->alt))
        {
            $this->alt = " alt='".$this->alt."' ";
        }
        if(isset($this->border))
        {
            $this->alt = " border='".$this->border."' ";
        }
        return '<img '.$this->src.$this->width.$this->height.$this->alt.$this->border.' />';    
    }
} 

?>