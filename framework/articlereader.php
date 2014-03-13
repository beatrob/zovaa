<?php

/**
 * @author roberto
 * @copyright 2012
 */

require_once("mysql/mysqlmanager.php");

class ArticleReader
{
    private $pagename;
    private $language;
    private $mysqlManager;
    private $data;
    
    public function __construct($pagename, $language)
    {
        $this->pagename = $pagename;
        $this->language = $language;
        $this->mysqlManager = new MySqlManager();
    }
    
    private function writeArticle($data)
    {
        echo "<div class='Article'>";
        if($data["DISPLAY_TITLE"] == "1")
        {
            echo "<div class='ArticleTitle'>".$data["TITLE"]."</div>";
        }
        echo "<div class='ArticleText'>".$data["TEXT"]."</div>";
        if(isset($data['FOOTER']))
        {
            echo "<div class='ArticleFooter'>".$data["FOOTER"]."</div>";  
        }
        echo "</div>";
    }
    
    public function displayArticleById($id)
    {
        $d = $this->mysqlManager->ReadArticleByID($this->pagename, $this->language, $id);
        while($data = mysql_fetch_assoc($d))
        {
            $this->writeArticle($data);
        }
    }
    
    public function DisplayAllArticles()
    {
        $this->data = $this->mysqlManager->ReadAllArticles($this->pagename, $this->language);
        while($data = mysql_fetch_assoc($this->data))
        {
            $this->writeArticle($data);
        }
    }
}

?>