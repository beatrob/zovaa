<?php

/**
 * @author roberto
 * @copyright 2012
 */
require_once("img.php");
require_once("a.php");

/*
<a href=\"".$row_obrTabulka['ODKAZ']. "\" rel=\"lightbox[".$chapter."]\" title=\"".$row_obrTabulka['NAZOV']."\"><img border=\"0\" src=\"".$row_obrTabulka['MINIATURA']."\"/></a>
**/
class GaleryImg
{
    private $img_url;
    private $thumb_url;
    private $img;
    private $a;
    private $album;
    
    public function __construct($img_url, $thumb_url, $name, $album)
    {
        $this->img_url = $img_url;
        $this->thumb_url = $thumb_url;
        $this->album = $album;
        $this->img = new Img($thumb_url);
        $this->img->border = "0"; 
        $this->a = new A($img_url);
        $this->a->rel = "lightbox[".$album."]";
        $this->a->title = '"'.$name.'"';
    }
    
    public function SetImageWidth($width)
    {
        $this->img->width = $width;
    }
    
    
    public function __toString()
    {
        $this->a->value = $this->img;
        
        return $this->a->__toString();    
    }
} 

?>