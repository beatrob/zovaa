<?php

/**
 * @author roberto
 * @copyright 2012
 */

require_once "elements/input.php";
require_once "elements/form.php";
require_once "javascripts.php";

class AddLanguage extends Form
{
    /*labels*/
    public $language_label =  "Language shortcut";
    public $language_long_label = "Language name";
    /*buttons*/
    protected $language;
    protected $language_long;     
    
    public function SetInputLength($length)
    {
        $this->language_long->length = $length;
    }
    
    public function __construct($onsuccess)
    {
        parent::__construct($onsuccess, 'ADDLANGUAGE');
        $this->language = new Input("LANGUAGE");
        $this->language->length = "2";
        $this->language->size = "2";
        $this->language->max = "2";
        $this->language_long = new Input("NAME");
        $this->onSubmit = "validateLanguageForm()";
    }
    
    public function __toString()
    {
        $this->Add($this->language_label, $this->language);
        $this->Add($this->language_long_label, $this->language_long);
        $this->DrawForm();
        return '';
    }
}

class UpdateLanguage extends AddLanguage
{
    public function __construct($onsuccess, $language, $language_long)
    {
        parent::__construct($onsuccess);
        $this->language->value = $language;
        $this->language->readonly = "readonly";
        $this->language_long->value = $language_long;
        $this->ChangeFormName("UPDATELANGUAGE");
        $this->submit_btn->value = "UPDATE";
    }
}

?>