<?php

/**
 * @author roberto
 * @copyright 2012
 */

require_once("mysql/mysqlmanager.php");
require_once("elements/table.php");
require_once("elements/img.php");
require_once("elements/galeryimg.php");

class AlbumReader
{
    private $page;
    private $albumsData;
    private $imagesData;
    private $mysqlManager;
    private $albumIds = array();
    private $maxImageWidth;
        
    public function __construct($page, $maxImageWidth = Settings::MAX_IMAGE_WITDH)
    {
        $this->page = $page;
        $this->mysqlManager = new MySqlManager();
        $this->maxImageWidth = $maxImageWidth;
    }
    
    private function drawAlbum($album)
    {
        $imageRecords = $this->mysqlManager->ReadAllImages($album["ID"]);
        $maxImageWidth = intval($this->maxImageWidth / intval($album['COLUMNS']));
        $table = new Table($album['COLUMNS']);
        $table->align = "center";
        echo '<div class="Album">';
            if(intval($album['DISPLAY_NAME']))
            {
                echo '<div class="AlbumTitle">'.$album['NAME'].'</div>';
            }
            echo '<div class="AlbumContent">';
                while($image = mysql_fetch_assoc($imageRecords))
                {
                    $image["URL"] = Settings::ReplaceMagicStrings($image["URL"]);
                    $image["THUMB_URL"] = Settings::ReplaceMagicStrings($image["THUMB_URL"]);
                    $img;
                    $image_width;
                    if($album["GALERY"] == "1") //handle galery setup
                    {
                        $thumb_url;
                        if(isset($image["THUMB_URL"]))
                        { 
                            $thumb_url = $image["THUMB_URL"];
                        }
                        else
                        {
                            $thumb_url = $image["URL"];
                        }
                        if(Settings::THUMBNAIL_WIDTH > $maxImageWidth)
                        {
                            $image_width = $maxImageWidth;
                        }                            
                        $img = new GaleryImg($image["URL"], $thumb_url, $image["NAME"], $album["NAME"]);
                        $img->SetImageWidth($image_width);
                    }
                    else // handle normal picture table setup
                    {
                        $img = new Img($image["URL"]);
                        if(intval($image["WIDTH"]) > $maxImageWidth)
                        {
                            $image_width = $maxImageWidth;
                        }
                        $img->width = $image_width;
                    }
                    $table->Add($img);
                } // end of image handling
            echo $table;
            echo '</div>';
        echo '</div>';
    }
    
    public function drawAlbumById($id)
    {
        $this->albumsData = $this->mysqlManager->ReadAlbumByID($this->page, $id);
        while($album = mysql_fetch_assoc($this->albumsData))
        {
            $this->drawAlbum($album);
        }   
    }
    
    public function __toString()
    {
        $this->albumsData = $this->mysqlManager->ReadAllAlbums($this->page);
        while($album = mysql_fetch_assoc($this->albumsData))
        {
            $this->drawAlbum($album);
        }   
        return '';
    }
}

?>