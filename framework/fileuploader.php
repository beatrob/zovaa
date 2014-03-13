<?php

/**
 * @author roberto
 * @copyright 2012
 */

require_once("imageresize.php");
require_once("../settings.php");

class FileUploader
{
    public $restrictionArray;
    private $filename;
    private $extension;
    
    public function __construct($filename, $restrictionArray)
    {
        define("FOLDER", "../uploads/");
        define("FILE_PATH", "[@server]".Settings::INETRFACE."/uploads/");
        $this->filename = $filename;
        $this->restrictionArray = $restrictionArray;
    }
    
    public function CheckImage($file)
    {
        $this->extension = strtolower(end(explode(".", $file["name"])));
        if(strpos($this->filename, '.') == false)
        {
            $this->filename .= '.'.$this->extension;
        }
        //echo "filename: ". $this->filename."<br />";
        //echo "filetype: ". $file["type"]."<br />";
        //echo "filesize: ". $file["size"]."<br />";
        if ((($file["type"] == "image/gif")
        || ($file["type"] == "image/jpeg")
        || ($file["type"] == "image/png")
        || ($file["type"] == "image/pjpeg"))
        && ($file["size"] < 3500000))
        {
          //echo "filetype: OK";
          if(isset($this->restrictionArray))
          {
            if(!in_array($this->extension, $this->restrictionArray))
            {
                throw new Exception("Extension not supported!");
            }
          }
          if ($file["error"] > 0)
          {
                throw new Exception("File upload error - detected in form action!");
                return false;
          }
          return true;          
        }
        throw new Exception("Filetype or filesize error!");
        return false;
    }
    
    public function SaveImage($file)
    {
        if (file_exists(constant("FILE_PATH").$this->filename))
        {
            throw new exception("File ". $this->filename. " already exists!");
        }
        else
        {
            move_uploaded_file($file["tmp_name"], constant("FOLDER").$this->filename);
            return constant("FILE_PATH").$this->filename;
        }
    }
    
    public function CreateThumbnail()
    {
        $imageResize = new resize(constant("FOLDER").$this->filename);
        $imageResize->resizeImage(Settings::THUMBNAIL_WIDTH, Settings::THUMBNAIL_WIDTH);
        $imageResize->saveImage(constant("FOLDER")."thumbs/thumb_".$this->filename);
        return constant("FILE_PATH")."thumbs/thumb_".$this->filename;
    }
    
    public function OptimizeImageSize()
    {
        list($width, $height) = $this->GetImageResolution();
        if($width > Settings::OPTIMIZED_IMAGE_WIDTH || $height > Settings::OPTIMIZED_IMAGE_HEIGHT)
        {
            $imageResize = new resize(constant("FOLDER").$this->filename);
            $imageResize->resizeImage(Settings::OPTIMIZED_IMAGE_WIDTH, Settings::OPTIMIZED_IMAGE_HEIGHT);
            $imageResize->saveImage(constant("FOLDER").$this->filename);
        }
    }
    
    public function GetImageResolution()
    {
        return getimagesize(constant("FOLDER").$this->filename);
    }
    
    
}

?>