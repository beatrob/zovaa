<?php
require_once "albumreader.php";
require_once "articlereader.php";
require_once "mysql/mysqlmanager.php";

class WeightManager
{
    private $mysqlManager;
    private $pagenamne;
    private $language;
    private $data;
    private $articleReader;
    private $albumReader;
    
    function __construct($pagename, $language, $maxImageWidth = Settings::MAX_IMAGE_WITDH)
    {
        $this->mysqlManager = new MySqlManager();
        $this->pagenamne = $pagename;
        $this->language = $language;
        $this->data = $this->mysqlManager->ReadWeights($pagename, $language);
        $this->articleReader = new ArticleReader($pagename, $language);
        $this->albumReader = new AlbumReader($pagename, $maxImageWidth);
    }
    
    public function drawContentByWeight()
    {
        if(isset($this->data))
        {
            while($data = mysql_fetch_assoc($this->data))
            {
                if($data["ARTICLE"] == "1")
                {
                    $this->articleReader->displayArticleById($data["ID"]);
                }
                else
                {
                    $this->albumReader->drawAlbumById($data["ID"]);
                }
            }
        }
    }
}

?>