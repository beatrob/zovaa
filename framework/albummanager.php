<?php

/**
 * @author roberto
 * @copyright 2012
 */
require_once("elements/form.php");
require_once("elements/input.php");
require_once("elements/select.php");
require_once("javascripts.php");

class AddAlbum extends Form
{
    protected $name;
    protected $page;
    protected $columns;
    protected $displayname;
    protected $galery;
    protected $weight;
    
    public function SetInputLength($length)
    {
        $this->columns->length = $length;
        $this->columns->size = $length;
        $this->columns->max = $length;
    }
    
    public function AddPages($pagesRecords)
    {
        $this->page->Add("0", "---");
        while($record = mysql_fetch_assoc($pagesRecords)) # languages
        {
            $this->page->Add($record["ID"], $record["NAME"]);
        }
    }
    
    public function __construct($onSucc, $formname="ADDALBUM")
    {
        parent::__construct($onSucc, $formname);
        $this->name = new Input("NAME");
        $this->page = new Select("PAGE");
        $this->columns = new Input("COLUMNS");
        $this->submit_btn->value = "ADD";
        $this->SetInputLength("2");
        $this->displayname = new Input("DISPLAY_NAME");
        $this->displayname->type = "checkbox";
        $this->displayname->value = "true";
        $this->galery = new Input("GALERY");
        $this->galery->type = "checkbox";
        $this->galery->value = "true";
        $this->onSubmit = "validateAlbumForm()";
        $this->weight = new Input("WEIGHT");
    }
    
    public function __toString()
    {
        $this->Add("Album name", $this->name);
        $this->Add("Select page", $this->page);
        $this->Add("Number of columns", $this->columns);
        $this->Add("Display album name", $this->displayname);
        $this->Add("Picture galery", $this->galery);
        $this->Add("Weight", $this->weight);
        $this->DrawForm();
        return '';
    }
    
}

class UpdateAlbum extends AddAlbum
{
    public function __construct($onSucc, $id, $name, $page, $columns, $display_name, $galery, $weight)
    {
        parent::__construct($onSucc, "UPDATEALBUM");
        $this->id = new Input("ID");
        $this->id->value = $id;
        $this->id->readonly = "readonly";
        $this->Add("ID", $this->id);
        $this->name->value = $name;
        $this->page->selected = $page;
        $this->columns->value = $columns;
        if($display_name == "1")
        {
            $this->displayname->checked = "checked";
        }
        if($galery == "1")
        {
            $this->galery->checked = "checked";
        }
        $this->submit_btn->value = "UPDATE";
        $this->weight->value = $weight;
    }
}

?>