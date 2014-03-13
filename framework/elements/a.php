<?php

/**
 * @author roberto
 * @copyright 2012
 */

class A
{
    private $href;
    public $target;
    public $value;
    public $rel;
    public $title;
    public $onclick;
    
    
    public function __construct($href)
    {
        if($href!="")
        {
            $this->href = " href='".$href."' ";
        }
    }
    
    public function __toString()
    {
        if(isset($this->target))
        {
            $this->target = " target='".$this->target."' ";
        }
        if(isset($this->rel))
        {
            $this->rel = " rel='".$this->rel."' ";
        }
        if(isset($this->title))
        {
            $this->title = " title='".$this->title."' ";
        }
        if(isset($this->onclick))
        {
            $this->onclick = " onclick='".$this->onclick."' ";
        }
        return '<a '.$this->href.$this->target. $this->rel. $this->title. $this->onclick.'>'.$this->value.'</a>';    
    }
} 

?>