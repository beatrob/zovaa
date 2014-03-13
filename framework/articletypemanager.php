<?php

/**
 * @author roberto
 * @copyright 2012
 */

require_once "elements/input.php";
require_once "elements/form.php";
require_once "javascripts.php";

class AddArticleType extends Form
{
    /*labels*/
    public $articletype_label =  "Article Type";
    /*buttons*/
    protected $articletype;    
    
    public function SetInputLength($length)
    {
        $this->articletype->length = $length;
    }
    
    public function __construct($onsuccess)
    {
        parent::__construct($onsuccess, 'ADDARTICLETYPE');
        $this->articletype = new Input("ARTICLETYPE");
        $this->onSubmit = "validateArticleTypeForm()";
    }
    
    public function __toString()
    {
        $this->Add($this->articletype_label, $this->articletype);
        $this->DrawForm();
        return '';
    }
}

class UpdateArticleType extends AddArticleType
{
    private $id;
    
    public function __construct($onsuccess, $id, $articletype)
    {
        parent::__construct($onsuccess);
        $this->articletype->value = $articletype;
        $this->id = new Input("ID");
        $this->id->value = $id;
        $this->id->readonly = "readonly";
        $this->Add("ID", $this->id);
        $this->ChangeFormName("UPDATEARTICLETYPE");
        $this->submit_btn->value = "UPDATE";
    }
}

?>