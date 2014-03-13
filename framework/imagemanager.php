<?php

/**
 * @author roberto
 * @copyright 2012
 */

require_once("filemanager.php");
require_once("javascripts.php");
require_once("elements/img.php");

class UploadImage extends UploadFile
{
    private $album;
    
    public function __construct($onSucc)
    {
        parent::__construct($onSucc, "UPLOADIMAGE");
        $this->createThumb = new Input("CREATETHUMB");
        $this->album = new Select("ALBUM");
        $this->submit_btn->value = "UPLOAD";
        $this->onSubmit = "validateImageForm()";
    }
    
    public function AddAlbums($albumRecords)
    {
        $this->album->Add("0", "---");
        while($record = mysql_fetch_assoc($albumRecords)) # languages
        {
            $this->album->Add($record["ID"], $record["NAME"]);
        }
    }
    
    public function __toString()
    {
        $this->Add("Select album", $this->album);
        $this->DrawForm();
        return '';
    }
}

class UpdateImage extends Form
{
    private $url;
    private $thumb_url;
    private $id;
    private $fileName;
    private $album;
    private $img;
    
    public function SetInputLength($length)
    {
        $this->fileName->size = $length;
        $this->fileName->length = $length;
    }
    
    public function __construct($onSucc, $id, $url, $thumb_url, $name, $album)
    {
        parent::__construct($onSucc, "UPDATEIMAGE");
        $this->url = $url;
        $this->thumb_url = $thumb_url;
        $this->id = new Input("ID");
        $this->id->value = $id;
        $this->id->readonly = "readonly";
        $this->fileName = new Input("NAME");
        $this->fileName->size = "25";
        $this->fileName->value = $name;
        $this->SetInputLength("25");
        $this->album = new Select("ALBUM");
        $this->album->selected = $album;
        $this->submit_btn->value = "UPDATE";
        $this->img = new Img($thumb_url);
        $this->onSubmit = "validateImageUpdateForm()";
        
    }
    
    public function AddAlbums($albumRecords)
    {
        $this->album->Add("0", "---");
        while($record = mysql_fetch_assoc($albumRecords)) # languages
        {
            $this->album->Add($record["ID"], $record["NAME"]);
        }
    }
    
    public function __toString()
    {
        $this->Add("Image: ", $this->img);
        $this->Add("ID", $this->id);
        $this->Add("Picture URL", $this->url);
        $this->Add("Thumb URL", $this->thumb_url);
        $this->Add("Picture name", $this->fileName);
        $this->Add("Select album", $this->album);
        $this->DrawForm();
        return '';
    }
}
?>