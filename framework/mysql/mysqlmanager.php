<?php

/**
 * @author roberto
 * @copyright 2012
 */
require_once('insert.php');
require_once('select.php');
require_once('delete.php');
require_once('update.php');
require_once('texthandler.php');

if (!function_exists("GetSQLValueString")) {
    function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
    {
      if (PHP_VERSION < 6) {
        $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
      }
    
      $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);
    
      switch ($theType) {
        case "text":
          $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
          break;    
        case "long":
        case "int":
          $theValue = ($theValue != "") ? intval($theValue) : "NULL";
          break;
        case "double":
          $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
          break;
        case "date":
          $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
          break;
        case "defined":
          $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
          break;
      }
      return $theValue;
    }
}

class MySqlManager
{
            
    public function InsertPage($pagename)
    {
        try
        {
            $data = array();
            $data = new ArrayObject();
            $data['NAME'] = GetSQLValueString($pagename, 'text');
            $data['MODIFIED'] = 'NOW()';
            $insert = new MysqlInsert();
            $insert->DoInsert('pages', $data);
        }
        catch(Exception $ex)
        {
            throw new Exception($ex);
        }
        
    }
    
    public function InsertArticleType($pagename)
    {
        try
        {
            $data = array();
            $data = new ArrayObject();
            $data['NAME'] = GetSQLValueString($pagename, 'text');
            $data['MODIFIED'] = 'NOW()';
            $insert = new MysqlInsert();
            $insert->DoInsert('article_types', $data);
        }
        catch(Exception $ex)
        {
            throw new Exception($ex);
        }
    }
    
    public function SelectPages()
    {
        try
        {
            $select = new MysqlSelect;
            $data = array( 1 => 'NAME', 2 => 'ID' );
            return $select->DoSelect('pages', $data);
        }
        catch(Exception $ex)
        {
            throw new Exception($ex);
        }
    }
    
    public function SelectAllFromTable($table)
    {
        try
        {
            $select = new MysqlSelect;
            return $select->DoSelect($table, null, null, null, "ID DESC");
        }
        catch(Exception $ex)
        {
            throw new Exception($ex);
        }
    }
    
    public function DeleteById($table, $id)
    {
        try
        {
            $_id;
            if(is_numeric($id))
            {
                $_id = GetSQLValueString($id, "int");
            }
            else
            {
                $_id = GetSQLValueString($id, "text");
            }
            $delete = new MysqlDelete;
            $delete->DeleteById($table, $_id);
        }
        catch(Exception $ex)
        {
            throw new Exception($ex);
        }
    }
    
    public function InsertLanguage($lang, $name)
    {
        try
        {
            $data = array();
            $data = new ArrayObject();
            $data['ID'] = GetSQLValueString($lang, 'text');
            $data['NAME'] = GetSQLValueString($name, 'text');
            $data['MODIFIED'] = 'NOW()';
            $insert = new MysqlInsert();
            $insert->DoInsert('languages', $data);
        }
        catch(Exception $ex)
        {
            throw new Exception($ex);
        }   
    }
    
    public function SelectById($table, $id)
    {
        try
        {
            $_id = $id;
            if(!is_int($id))
            {
                $_id=GetSQLValueString($id, "text");
            }
            $select = new MysqlSelect;
            return $select->DoSelect($table, null, "ID=".$_id." LIMIT 1");
        }
        catch(Exception $ex)
        {
            throw new Exception($ex);
        }
    }
    
    public function UpdateLanguage($id, $name)
    {
        try
        {
            $update = new MysqlUpdate();
            $input = array("ID"=>GetSQLValueString($id, "text"),
                            "NAME"=>GetSQLValueString($name, "text"),
                            "MODIFIED"=>"NOW()");
            return $update->DoUpdate("languages", $input, "ID=".GetSQLValueString($id, "text"));
        }
        catch(Exception $ex)
        {
            throw new Exception($ex);
        }
    }
    
    public function UpdatePage($id, $name)
    {
        try
        {
            $update = new MysqlUpdate();
            $input = array("ID"=>GetSQLValueString($id, "int"),
                            "NAME"=>GetSQLValueString($name, "text"),
                            "MODIFIED"=>"NOW()");
            return $update->DoUpdate("pages", $input, "ID=".GetSQLValueString($id, "int"));
        }
        catch(Exception $ex)
        {
            throw new Exception($ex);
        }
    }
    
    public function UpdateArticleType($id, $name)
    {
        try
        {
            $update = new MysqlUpdate();
            $input = array("ID"=>GetSQLValueString($id, "int"),
                            "NAME"=>GetSQLValueString($name, "text"),
                            "MODIFIED"=>"NOW()");
            return $update->DoUpdate("article_types", $input, "ID=".GetSQLValueString($id, "int"));
        }
        catch(Exception $ex)
        {
            throw new Exception($ex);
        }
    }
    
    public function InsertArticle($title, $text, $footer, $page_id, $user_id, $lang_id, $type_id, $weight, $display_title)
    {
        try
        {
            $insert = new MysqlInsert();
            $input = array ("TITLE"=>GetSQLValueString($title, "text"),
                            "TEXT"=>GetSQLValueString(TextHandler::ConvertLinebreakToBR($text), "text"),
                            "PAGE_ID"=>GetSQLValueString($page_id, "int"),
                            "USER_ID"=>GetSQLValueString($user_id, "int"),
                            "LANG_ID"=>GetSQLValueString($lang_id, "text"),
                            "TYPE_ID"=>GetSQLValueString($type_id, "int"),
                            "CREATED"=>"NOW()",
                            "MODIFIED"=>"NOW()");
            if(isset($footer))
            {
                $input["FOOTER"] = GetSQLValueString($footer, "text");
            }
            if(isset($weight))
            {
                $input["WEIGHT"] = GetSQLValueString($weight, "int");
            }
            if(isset($display_title))
            {
                $input["DISPLAY_TITLE"] = GetSQLValueString("1", "int");
            }
            else
            {
                $input["DISPLAY_TITLE"] = GetSQLValueString("0", "int");
            }
            $insert->DoInsert("articles", $input);
        }
        catch(Excpetion $ex)
        {
            throw new Exception($ex);
        }
    }
    
    public function UpdateArticle($id, $title, $text, $footer, $page_id, $user_id, $lang_id, $type_id, $weight, $display_title)
    {
        try
        {
            $update = new MysqlUpdate();
            $input = array ("TITLE"=>GetSQLValueString($title, "text"),
                            "TEXT"=>GetSQLValueString(TextHandler::ConvertLinebreakToBR($text), "text"),
                            "PAGE_ID"=>GetSQLValueString($page_id, "int"),
                            "USER_ID"=>GetSQLValueString($user_id, "int"),
                            "LANG_ID"=>GetSQLValueString($lang_id, "text"),
                            "TYPE_ID"=>GetSQLValueString($type_id, "int"),
                            "MODIFIED"=>"NOW()");
            if(isset($footer))
            {
                $input["FOOTER"] = GetSQLValueString($footer, "text");
            }
            if(isset($weight))
            {
                $input["WEIGHT"] = GetSQLValueString($weight, "int");
            }
            if(isset($display_title))
            {
                $input["DISPLAY_TITLE"] = GetSQLValueString("1", "int");
            }
            else
            {
                $input["DISPLAY_TITLE"] = GetSQLValueString("0", "int");
            }
            $update->DoUpdate("articles", $input, "ID=".GetSQLValueString($id, "int"));
        }
        catch(Excpetion $ex)
        {
            throw new Exception($ex);
        }
    }
    
    public function ReadAllArticles($pagename, $lang)
    {
        try
        {
            $select = new MysqlSelect();
            $select_input = array("a.id as ID", "a.title as TITLE", "a.text as TEXT", "a.footer as FOOTER", "p.name as PAGE", "t.name as TYPE", "a.lang_id as LANG", "a.modified as DATE", "a.DISPLAY_TITLE as DISPLAY_TITLE");
            $inner_join = "INNER JOIN article_types t ON t.ID = a.TYPE_ID ";
            $inner_join .= "INNER JOIN pages p ON p.ID = a.PAGE_ID ";
            $table = "articles a";
            $where = "p.name = ".GetSQLValueString($pagename, "text")." AND a.lang_id=".GetSQLValueString($lang, "text");
            return $select->DoSelect($table, $select_input, $where, $inner_join);
        }
        catch(exception $ex)
        {
            throw new Exception($ex);
        }
    }
    
    public function ReadArticleByID($pagename, $lang, $id)
    {
        try
        {
            $select = new MysqlSelect();
            $select_input = array("a.id as ID", "a.title as TITLE", "a.text as TEXT", "a.footer as FOOTER", "p.name as PAGE", "t.name as TYPE", "a.lang_id as LANG", "a.modified as DATE", "a.DISPLAY_TITLE as DISPLAY_TITLE");
            $inner_join = "INNER JOIN article_types t ON t.ID = a.TYPE_ID ";
            $inner_join .= "INNER JOIN pages p ON p.ID = a.PAGE_ID ";
            $table = "articles a";
            $where = "a.id = ".GetSQLValueString($id, "text")." AND p.name = ".GetSQLValueString($pagename, "text")." AND a.lang_id=".GetSQLValueString($lang, "text");
            return $select->DoSelect($table, $select_input, $where, $inner_join);
        }
        catch(exception $ex)
        {
            throw new Exception($ex);
        }
    }
    
    public function AddAlbum($name, $page_id, $columns, $displayname, $galery, $weight)
    {
        try
        {
            $insert = new MysqlInsert();
            $data = array("NAME"=>GetSQLValueString($name, "text"),
                            "PAGE_ID"=>GetSQLValueString($page_id, "int"),
                            "COLUMNS"=>GetSQLValueString($columns, "text"),
                            "MODIFIED"=>"NOW()");
            if(isset($displayname))
            {
                    $data["DISPLAY_NAME"] = GetSQLValueString("1", "int");
            }
            if(isset($galery))
            {
                    $data["GALERY"] = GetSQLValueString("1", "int");
            }
            if(isset($weight))
            {
                    $data["WEIGHT"] = GetSQLValueString($weight, "int");
            }
            $insert->DoInsert("albums", $data);
        }
        catch(exception $ex)
        {
            throw new Exception($ex);
        }
    }
    
    public function AddImage($name, $url, $album_id, $thumb_url, $width, $height)
    {
        try
        {
            $insert = new MysqlInsert();
            $data = array("NAME" => GetSQLValueString($name, "text"),
                            "URL" => GetSQLValueString($url, "text"),
                            "ALBUM_ID" => GetSQLValueString($album_id, "int"),
                            "CREATED" => "NOW()",
                            "MODIFIED" => "NOW()",
                            "WIDTH" => GetSQLValueString($width, "int"),
                            "HEIGHT" => GetSQLValueString($height, "int"));
            if(isset($thumb_url))
            {
                $data["THUMB_URL"] = GetSQLValueString($thumb_url, "text");
            }
            $insert->DoInsert("images", $data);
        }
        catch(exception $ex)
        {
            
        }
    }
    
    public function ReadAllAlbums($page)
    {
        try
        {
            $select = new MysqlSelect();
            $select_input = array("a.name as NAME", "a.id as ID", "a.display_name as DISPLAY_NAME", "a.columns as COLUMNS", "a.galery as GALERY");
            $inner_join = "INNER JOIN pages p ON p.ID = a.PAGE_ID ";
            $table = "albums a";
            $where = "p.name = ".GetSQLValueString($page, "text");
            return $select->DoSelect($table, $select_input, $where, $inner_join);
        }
        catch(exception $ex)
        {
            throw new Exception($ex);
        }
    }
    
    public function ReadAlbumByID($page, $id)
    {
        try
        {
            $select = new MysqlSelect();
            $select_input = array("a.name as NAME", "a.id as ID", "a.display_name as DISPLAY_NAME", "a.columns as COLUMNS", "a.galery as GALERY");
            $inner_join = "INNER JOIN pages p ON p.ID = a.PAGE_ID ";
            $table = "albums a";
            $where = "a.id = ".GetSQLValueString($id, "int")." AND p.name = ".GetSQLValueString($page, "text");
            return $select->DoSelect($table, $select_input, $where, $inner_join);
        }
        catch(exception $ex)
        {
            throw new Exception($ex);
        }
    }
    
    public function ReadAllImages($albumId)
    {
        try
        {
            $select = new MysqlSelect();
            $where = "ALBUM_ID=".GetSQLValueString($albumId, "int");
            return $select->DoSelect("images", null, $where);
        }
        catch(exception $ex)
        {
            throw new Exception($ex);
        }
    }
    
    public function UpdateAlbum($id, $name, $page_id, $columns, $galery, $display_name, $weight)
    {
        try
        {
            $update = new MysqlUpdate();
            $input = array ("NAME"=>GetSQLValueString($name, "text"),
                            "PAGE_ID"=>GetSQLValueString($page_id, "int"),
                            "COLUMNS"=>GetSQLValueString($columns, "int"),
                            "DISPLAY_NAME"=>GetSQLValueString($display_name, "int"),
                            "GALERY"=>GetSQLValueString($galery, "int"),
                            "MODIFIED"=>"NOW()");
            if(isset($weight))
            {
                $input["WEIGHT"] = GetSQLValueString($weight, "int");
            }
            $update->DoUpdate("albums", $input, "ID=".GetSQLValueString($id, "int"));
        }
        catch(Excpetion $ex)
        {
            throw new Exception($ex);
        }
    }
    
    public function UpdateImage($id, $name, $album)
    {
        try
        {
            $update = new MysqlUpdate();
            $input = array ("NAME"=>GetSQLValueString($name, "text"),
                            "ALBUM_ID"=>GetSQLValueString($album, "int"),
                            "MODIFIED"=>"NOW()");
            $update->DoUpdate("images", $input, "ID=".GetSQLValueString($id, "int"));
        }
        catch(Excpetion $ex)
        {
            throw new Exception($ex);
        }
    }
    
    public function GetUser($login, $password)
    {
        try
        {
            $select = new MysqlSelect();
            $where = "USER_NAME=".GetSQLValueString($login, "text")." AND PASSWORD=PASSWORD('".$password."') LIMIT 1";
            return $select->DoSelect("users", null, $where);
        }
        catch(exception $ex)
        {
            throw new Exception($ex);
        }
    }
    
    /*(SELECT id AS ID, weight as WEIGHT, '1' as ARTICLE FROM  `articles`  WHERE page_id =5)
UNION
(SELECT id AS ID, weight as WEIGHT, '0' as ARTICLE FROM  `albums`  WHERE page_id=5)
ORDER BY WEIGHT asc*/
    public function ReadWeights($pagename, $lang)
    {
        try
        {
            $select = new MysqlSelect();
            
            $select_input = array("a.id as ID", "a.weight as WEIGHT", "'1' as ARTICLE");
            $inner_join = "INNER JOIN article_types t ON t.ID = a.TYPE_ID ";
            $inner_join .= "INNER JOIN pages p ON p.ID = a.PAGE_ID ";
            $table = "articles a";
            $where = "p.name = ".GetSQLValueString($pagename, "text")." AND a.lang_id=".GetSQLValueString($lang, "text");
            $qs1 = $select->createQuerryString($table, $select_input, $where, $inner_join);
        
            $select_input = array("a.id as ID", "a.weight as WEIGHT", "'0' as ARTICLE");
            $inner_join = "INNER JOIN pages p ON p.ID = a.PAGE_ID ";
            $table = "albums a";
            $where = "p.name = ".GetSQLValueString($pagename, "text");
            $qs2 = $select->createQuerryString($table, $select_input, $where, $inner_join); 
            
            return  $select->doUnion($qs1, $qs2, "ORDER BY WEIGHT asc");      
        
        }
        catch(exception $ex)
        {
            throw new Exception($ex);
        }
    }
}

?>