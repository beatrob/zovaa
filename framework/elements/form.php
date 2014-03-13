<?php

/**
 * @author roberto
 * @copyright 2012
 */

require_once "textarea.php";
require_once "input.php";
require_once "formtable.php";
require_once "config.php";


abstract class Form implements IPhpFiles
{
    private $data = array();
    protected $table;
    protected $onSuccess;
    protected $onFailure;
    public $onSubmit;
    protected $enctype;
    
    protected $formnamne; 
    public $submit_btn;
    public $submit_label = "Submit";
    
    public function __construct($onSucc, $formname)
    {
        $data = new ArrayObject();
        $this->onSuccess = new Input("ONSUCCESS");
        $this->onSuccess->type = 'hidden';
        $this->onSuccess->value = $onSucc;
        $this->submit_btn = new Input("SUBMIT");
        $this->submit_btn->type = "submit";
        $this->submit_btn->value = $this->submit_label;
        $this->formnamne = new Input("FORMNAME");
        $this->formnamne->type = "hidden";
        $this->formnamne->value = $formname; 
        $this->table = new FormTable();   
    }
    
    protected function ChangeFormName($formname)
    {
        $this->formnamne->value = $formname;
    }
    
    public function SetTableCssClass($col1_css, $col2_css, $table_css)
    {
        $this->table->SetCol1CssClass($col1_css);
        $this->table->SetCol2CssClass($col2_css);
        $this->table->SetTableCssClass($table_css);
    }
    
    public function SetOnFailure($onFailurePath)
    {
        $this->onFailure = new Input("ONFAILURE");
        $this->onFailure->type = "hidden";
        $this->onFailure->value = $onFailurePath;
    }
    
    public function Add($name, $value)
    {
        $this->data[$name] = $value;
    }
    
    public function DrawForm()
    {
        if(isset($this->onSubmit))
        {
            $this->onSubmit = ' onsubmit="return '.$this->onSubmit.'" ';
        }
        if(isset($this->enctype))
        {
            $this->enctype = ' enctype="'.$this->enctype.'" ';
        }
        echo '<div class="Form"><form',
              ' action="http://'.$_SERVER['SERVER_NAME'].Settings::INETRFACE.'/framework/formhandler.php"',
              ' method="POST"',
              $this->onSubmit,
              $this->enctype,
              ' name="',
              $this->formnamne->value,
              '" ',
              '>';
        foreach ($this->data as $name => $data)
        {
            $this->table->Add($name, $data);
        }
        $this->table->Add("", $this->submit_btn);
        echo $this->table;
        echo $this->formnamne;
        echo $this->onSuccess;
        echo $this->onFailure;
        echo '</form></div>';
    }
    
    abstract public function SetInputLength($length);
}

?>