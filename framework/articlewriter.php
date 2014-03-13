<?php

/**
 * @author roberto
 * @copyright 2012
 */

require_once "elements/textarea.php";
require_once "elements/input.php";
require_once "elements/form.php";
require_once "elements/select.php";
require_once "mysql/texthandler.php";
require_once "elements/a.php";
require_once "javascripts.php";

class ArticleWriter extends Form
{
    /*buttons*/
    protected $title;
    protected $text;
    protected $footer;
    protected $user;
    protected $articleId;
    public $pages;
    public $types;
    public $languages;
    public $displayTitle;
    public $weight;
    
    public function SetTextAreaCols($cols)
    {
        $this->text->cols = $cols;
    }
    
    public function SetTextAreaRows($rows)
    {
        $this->text->rows = $rows;
    }
    
    
    public function SetInputLength($length)
    {
        $this->title->length = $length;
        $this->footer->lnegth = $length;
        $this->title->size = $length;
        $this->footer->size = $length;
    }
    
    public function AddLanguages($langs)
    {
        $this->languages->Add("0", "---");
        while($record = mysql_fetch_assoc($langs)) # languages
        {
            $this->languages->Add($record["ID"], $record["NAME"]);
        }
    }
    
    public function AddArticleTypes($types)
    {
        $this->types->Add("0", "---");
        while($record = mysql_fetch_assoc($types)) # languages
        {
            $this->types->Add($record["ID"], $record["NAME"]);
        }
    }
    
    public function AddPages($pages)
    {
        $this->pages->Add("0", "---");
        while($record = mysql_fetch_assoc($pages)) # languages
        {
            $this->pages->Add($record["ID"], $record["NAME"]);
        }
    }
    
    public function __construct($onSucc, $user="1", $formname = "INSERTARTICLE")
    {
        parent::__construct($onSucc, $formname);
        $this->title = new Input("TITLE");
        $this->user = new Input("USER_ID");
        $this->user->type = "hidden";
        $this->user->value = $user;
        $this->text = new Textarea("TEXT");
        $this->footer = new Input("FOOTER");
        $this->pages = new Select("PAGE_ID");
        $this->types = new Select("TYPE_ID");
        $this->languages = new Select("LANG_ID");
        $this->types->selected = $type_id;
        $this->articleId = new Input("ID");
        $this->articleId->type = "hidden";
        $this->text->cols = "60";
        $this->text->rows = "12";
        $this->addAlbumButton = new Input("ADD_ALBUM");
        $this->weight = new Input("WEIGHT");
        $this->displayTitle = new Input("DISPLAY_TITLE");
        $this->displayTitle->type = "checkbox";
        $this->displayTitle->value = "true";
        $this->displayTitle->checked = "checked";
        $this->onSubmit = "validateArticleWriter()";
    }
    
    public function __toString()
    {
        $this->Add("Title*", $this->title);
        $this->Add("Text*", $this->text);
        $this->Add("Add album to current position", $this->addAlbumButton);
        $this->Add("Foot note", $this->footer);
        $this->Add("Language*", $this->languages);
        $this->Add("Page*", $this->pages);
        $this->Add("Type*", $this->types);
        $this->Add("Display title", $this->displayTitle);
        $this->Add("Weight", $this->weight);
        $this->Add("HIDDEN1", $this->user);
        $this->Add("HIDDEN2", $this->articleId);
        $this->DrawForm();
        return '';
    }  
}

class ArticleUpdater extends ArticleWriter
{
  
    
    public function __construct($onSucc, $user="1", $id, $title, $text, $footer, $lang_id, $page_id, $type_id, $weight, $display_title)
    {
        parent::__construct($onSucc, $user, "UPDATEARTICLE");
        $this->title->value = $title;
        $this->text->value = TextHandler::ConvertBRToLinebreak($text);
        $this->footer->value = $footer;
        $this->languages->selected = $lang_id;
        $this->pages->selected = $page_id;
        $this->types->selected = $type_id;
        $this->submit_btn->value = "UPDATE";
        $this->articleId->value = $id;
        $this->weight->value = $weight;
        if($display_title == "1")
        {
            $this->displayTitle->checked = "checked";
        }
        else
        {
            $this->displayTitle->checked = null;
        }
    }
    
}

?>