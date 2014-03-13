<?php

/**
 * @author roberto
 * @copyright 2012
 */

require_once("elements/form.php");
require_once("elements/input.php");
require_once("elements/select.php");

class UploadFile extends Form
{
    private $file;
    private $fileName;
    
    public function SetInputLength($length)
    {
        $this->fileName->size = $length;
        $this->fileName->length = $length;
    }
    
    public function __construct($onSucc, $formname="UPLOADFIlE")
    {
        parent::__construct($onSucc, $formname);
        $this->enctype = "multipart/form-data";
        $this->file = new Input("FILE");
        $this->file->type = "file";
        $this->fileName = new Input("NAME");
        $this->fileName->size = "25";
        $this->Add("File name", $this->fileName);
        $this->Add("Select file", $this->file);
    }
    
    public function __toString()
    {
        $this->DrawForm();
        return '';
    }
}


?>