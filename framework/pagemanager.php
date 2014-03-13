<?php

/**
 * @author roberto
 * @copyright 2012
 */

require_once "elements/input.php";
require_once "elements/form.php";
require_once "javascripts.php";

class AddPage extends Form
{
    /*labels*/
    public $page_label =  "Page name ";
    /*buttons*/
    protected $page;    
    
    public function SetInputLength($length)
    {
        $this->page->length = $length;
    }
    
    public function __construct($onsuccess)
    {
        parent::__construct($onsuccess, 'ADDPAGE');
        $this->page = new Input("PAGE");
        $this->onSubmit = "validateWebpageForm()";
    }
    
    public function __toString()
    {
        $this->Add($this->page_label, $this->page);
        $this->DrawForm();
        return '';
    }
}

class UpdatePage extends AddPage
{
    private $id;
    
    public function __construct($onsuccess, $id, $page)
    {
        parent::__construct($onsuccess);
        $this->page->value = $page;
        $this->id = new Input("ID");
        $this->id->value = $id;
        $this->id->readonly = "readonly";
        $this->Add("ID", $this->id);
        $this->ChangeFormName("UPDATEPAGE");
        $this->submit_btn->value = "UPDATE";
    }
}

?>