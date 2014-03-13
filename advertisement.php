<?php

/**
 * @author roberto
 * @copyright 2013
 */

require_once("master.php");
$master = new Master(null, 220);
?>
<!DOCTYPE html>
<html>
  <head>
  <style type="text/css">
    
    body
    {
        font-family: Verdana, Arial, Helvetica, Sans-serif;
    }
    
    .Article
    {
        margin-top: 10px;
        margin-bottom: 10px;
        font-family: Verdana, Arial, Helvetica, Sans-serif;
        font-size: 12px;
    }
    
    .ArticleTitle
    {
        font-size: 20px;
        font-weight: bold;
        letter-spacing: 0.2em;
        
        width : 99%;
        background-image: url('images/advert-title-bg.png');
        background-repeat: repeat-y;
        color: black;
        padding: 5px 5px 5px 5px;
    }
    
    .ArticleText
    {
        margin-top: 10px;
        margin-bottom: 10px;
        text-align: justify;
    }
    
    .ArticleFooter
    {
        background-color: #C8E2E8;
        padding: 5px 5px 5px 5px;
        font-style: italic;
    }
    
    .AlbumTitle
    {
        font-size: 20px;
        font-weight: bold;
        letter-spacing: 0.2em;
        
        width : 99%;
        background-image: url('images/advert-albumtitle-bg.png');
        background-repeat: repeat-y;
        color: black;
        padding: 5px 5px 5px 5px;
    }
  </style>
    <title></title>
  </head>
  <body>
  <?php $master->displayContent(); ?>
  </body>
</html>