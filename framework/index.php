<?php

/**
 * @author roberto
 * @copyright 2012
 */

require_once "articlewriter.php";
require_once "addarticletype.php";
require_once "loginform.php";
require_once "registerform.php";
require_once "addpage.php";

$addPage = new AddPage("test.php");
$addArticle = new AddArticleType("test2.php");

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Hello HTML</title>
  <style type="text/css">
    .FormTableCol1 {
       padding: 15px 5px 5px 5px;
       text-align: right;
       vertical-align: text-top;
       font-weight: bold;
    }
    .ArticleWriterCol2 {
       padding: 15px 5px 5px 5px;
       text-align: left;
    }
  </style>
  </head>
  
  <body>
   <?php
        echo $_SERVER["DOCUMENT_ROOT"];
        echo $addPage;
        echo $addArticle;
        /*echo $articleWriter;
        echo '<br />';
        echo $loingForm;
        echo '<br />';
        echo $registerForm;*/
    ?>
  </body>

</html>