<?php

/**
 * @author roberto
 * @copyright 2012
 */
session_start();
require_once("mysql/mysqlmanager.php");
require_once("fileuploader.php");
require_once("sessionmanager.php");
require_once("../settings.php");

try
{
    if(isset($_GET["logoff"]))
    {
        SessionManager::DestroySession();
    }
    
    if(!isset($_POST["ONSUCCESS"]) || !isset($_POST["FORMNAME"]))
    {
        throw new Exception('Mandatory parameter missing!');
    }
    
    $mysqlMan = new MySqlManager();
    switch ($_POST["FORMNAME"])
    {
        case "LOGINFORM" :
            if(!isset($_POST["USER_NAME"]) || $_POST["USER_NAME"]=='' || 
                !isset($_POST["PASSWORD"]) || $_POST["PASSWORD"]=='' ||
                !isset($_POST["ONFAILURE"]) || $_POST["ONFAILURE"]=='' ||
                !isset($_POST["ONSUCCESS"]) || $_POST["ONSUCCESS"]=='')
            {
                throw new Exception('Mandatory parameter missing!');
            }
            $userRecords=$mysqlMan->GetUser($_POST["USER_NAME"], $_POST["PASSWORD"]);
            
            if($userRecords!='' && $user = mysql_fetch_assoc($userRecords))
            {
                // login success
                SessionManager::StartSession($user['ID']);
                header(sprintf("Location: %s", $_POST["ONSUCCESS"]));
                exit(0);
            }
            else // if login failed
            {
                header(sprintf("Location: %s", $_POST["ONFAILURE"]));
                exit(0);
            }
            break;
        case "ADDPAGE" : 
            if(!isset($_POST["PAGE"]) || $_POST["PAGE"]=='' )
            {
                throw new Exception('Page name missing!');
            }
            $mysqlMan->InsertPage($_POST['PAGE']);
            break;
            
        case "ADDLANGUAGE" : 
            if(!isset($_POST["LANGUAGE"]) || $_POST["LANGUAGE"]=='' || !isset($_POST["NAME"]) || $_POST["NAME"]=='')
            {
                throw new Exception('Language shortcut or language name missing!');
            }
            $mysqlMan->InsertLanguage($_POST['LANGUAGE'], $_POST["NAME"]);
            break;
        
        case "ADDARTICLETYPE" : 
            if(!isset($_POST["ARTICLETYPE"]) || $_POST["ARTICLETYPE"]=='' )
            {
                throw new Exception('Article type missing!');
            }
            $mysqlMan->InsertArticleType($_POST['ARTICLETYPE']);
            break;
        
        case "DELETERECORD" :
            if(!isset($_POST["ID"]) || $_POST["ID"]=='' || !isset($_POST["TABLE"]) || $_POST["TABLE"]=='' )
            {
                throw new Exception('ID or TABLE is missing!');
            }
            $mysqlMan->DeleteById($_POST['TABLE'], $_POST['ID']);
            break;
        case "UPDATERECORD" :
            if(!isset($_POST["ID"]) || $_POST["ID"]=='' || !isset($_POST["TABLE"]) || $_POST["TABLE"]=='' )
            {
                throw new Exception('ID or TABLE is missing!');
            }
            header(sprintf("Location: %s", 
                "http://".$_SERVER['SERVER_NAME'].Settings::INETRFACE."/Webadmin/".$_POST['ONSUCCESS']."?update=1&id=".$_POST['ID']."&table=".$_POST['TABLE']));
            exit(0);
            break;
        case "UPDATELANGUAGE" :
            if(!isset($_POST["LANGUAGE"]) || $_POST["LANGUAGE"]=='' || !isset($_POST["NAME"]) || $_POST["NAME"]=='' )
            {
                throw new Exception('ID or language name is missing!');
            }
            $mysqlMan->UpdateLanguage($_POST["LANGUAGE"], $_POST["NAME"]);
            $success="SUCCESS";
            break;
        case "UPDATEPAGE" :
            if(!isset($_POST["PAGE"]) || $_POST["PAGE"]=='' || !isset($_POST["ID"]) || $_POST["ID"]=='' )
            {
                throw new Exception('ID or page name is missing!');
            }
            $mysqlMan->UpdatePage($_POST["ID"], $_POST["PAGE"]);
            $success="SUCCESS";
            break;
        case "UPDATEARTICLETYPE" :
            if(!isset($_POST["ARTICLETYPE"]) || $_POST["ARTICLETYPE"]=='' || !isset($_POST["ID"]) || $_POST["ID"]=='' )
            {
                throw new Exception('ID or articletype is missing!');
            }
            $mysqlMan->UpdateArticleType($_POST["ID"], $_POST["ARTICLETYPE"]);
            $success="SUCCESS";
            break;
        case "INSERTARTICLE" :
            if(!isset($_POST["TITLE"]) || $_POST["TITLE"]=='' || 
                !isset($_POST["TEXT"]) || $_POST["TEXT"]==''  ||
                !isset($_POST["PAGE_ID"]) || $_POST["PAGE_ID"]=='' ||
                !isset($_POST["USER_ID"]) || $_POST["USER_ID"]=='' ||
                !isset($_POST["LANG_ID"]) || $_POST["LANG_ID"]=='' ||
                !isset($_POST["TYPE_ID"]) || $_POST["TYPE_ID"]=='')
            {
                throw new Exception('Mandatory parameter missing!');
            }
            $mysqlMan->InsertArticle($_POST["TITLE"], $_POST["TEXT"], $_POST["FOOTER"], $_POST["PAGE_ID"], $_POST["USER_ID"], $_POST["LANG_ID"], $_POST["TYPE_ID"], $_POST["WEIGHT"], $_POST["DISPLAY_TITLE"]);
            $success="SUCCESS";
            break;
         case "UPDATEARTICLE" :
            if(!isset($_POST["TITLE"]) || $_POST["TITLE"]=='' || 
                !isset($_POST["TEXT"]) || $_POST["TEXT"]==''  ||
                !isset($_POST["PAGE_ID"]) || $_POST["PAGE_ID"]=='' ||
                !isset($_POST["USER_ID"]) || $_POST["USER_ID"]=='' ||
                !isset($_POST["LANG_ID"]) || $_POST["LANG_ID"]=='' ||
                !isset($_POST["TYPE_ID"]) || $_POST["TYPE_ID"]=='' ||
                !isset($_POST["ID"]) || $_POST["ID"]=='')
            {
                throw new Exception('Mandatory parameter missing!');
            }
            $mysqlMan->UpdateArticle($_POST["ID"], $_POST["TITLE"], $_POST["TEXT"], $_POST["FOOTER"], $_POST["PAGE_ID"], $_POST["USER_ID"], $_POST["LANG_ID"], $_POST["TYPE_ID"], $_POST["WEIGHT"], $_POST["DISPLAY_TITLE"]);
            $success="SUCCESS";
            break;
         case "ADDALBUM" :
            if(!isset($_POST["NAME"]) || $_POST["NAME"]=='' ||
                !isset($_POST["PAGE"]) || $_POST["PAGE"]=='' ||
                !isset($_POST["COLUMNS"]) || $_POST["COLUMNS"]=='')
            {
               throw new Exception('Mandatory parameter missing!');     
            }
            $mysqlMan->AddAlbum($_POST['NAME'], $_POST['PAGE'], $_POST['COLUMNS'], $_POST['DISPLAY_NAME'], $_POST['GALERY'], $_POST["WEIGHT"], $_POST["WEIGHT"]);   
            $success="SUCCESS";
            break;
         case "UPLOADIMAGE" :
            if(!isset($_POST["NAME"]) || $_POST["NAME"]=='' ||
                !isset($_FILES["FILE"]) || $_FILES["FILE"]=='' ||
                !isset($_POST["ALBUM"]) || $_POST["ALBUM"]=='')
            {
                throw new Exception('Mandatory parameter missing!');
            }
            $fileMan = new FileUploader(uniqid(), array("jpg", "jpeg", "gif", "png"));
            if($fileMan->CheckImage($_FILES["FILE"]))
            {
                $url = $fileMan->SaveImage($_FILES["FILE"]);
                $fileMan->OptimizeImageSize();
                list($width, $height) = $fileMan->GetImageResolution();
                $thumb = $fileMan->CreateThumbnail();
                $mysqlMan->AddImage($_POST['NAME'], $url, $_POST['ALBUM'], $thumb, $width, $height);
            }
            else
            {
                throw new Exception('File upload error!');
            }
            break;
         case "UPDATEALBUM" :
            if(!isset($_POST["NAME"]) || $_POST["NAME"]=='' ||
                !isset($_POST["PAGE"]) || $_POST["PAGE"]=='' ||
                !isset($_POST["COLUMNS"]) || $_POST["COLUMNS"]=='' ||
                !isset($_POST["ID"]) || $_POST["ID"]=='')
                {
                    throw new Exception('Mandatory parameter missing!');
                }
                $galery = "0";
                $display_name = "0";
                if(isset($_POST["GALERY"]))
                {
                    $galery = "1";
                }
                if(isset($_POST["DISPLAY_NAME"]))
                {
                    $display_name = "1";
                }
                $mysqlMan->UpdateAlbum($_POST["ID"], $_POST["NAME"], $_POST["PAGE"], $_POST["COLUMNS"], $galery, $display_name, $_POST["WEIGHT"]);
            break;
         
         case "UPDATEIMAGE" :
            if(!isset($_POST["NAME"]) || $_POST["NAME"]=='' ||
                !isset($_POST["ID"]) || $_POST["ID"]=='' ||
                !isset($_POST["ALBUM"]) || $_POST["ALBUM"]=='')
            {
                throw new Exception('Mandatory parameter missing!');
            }
            $mysqlMan->UpdateImage($_POST["ID"], $_POST["NAME"], $_POST["ALBUM"]);
            break;
            
    }
    if(isset($success))
    {
        $success="?msg=".$success;
    }
    header(sprintf("Location: %s", "http://".$_SERVER['SERVER_NAME'].Settings::INETRFACE."/Webadmin/".$_POST['ONSUCCESS'].$success));
} 
catch(Exception $ex)
{
    echo('PHP FAILURE! ::  '.$ex);
}


?>