<?php
if(!defined('SCRIPT'))
{
    define('SCRIPT', 'SCRIPT');

?>

<script>
    function validateArticleWriter()
    {
        var form=document.forms["INSERTARTICLE"];
        if(form==null)
        {
            var form=document.forms["UPDATEARTICLE"];
        }
        var x=form["TITLE"].value;
        if (x==null || x=="")
        {
          alert("Article title is empty!");
          return false;
        }
        x=form["TEXT"].value;
        if (x==null || x=="")
        {
          alert("Article text is empty!");
          return false;
        }
        x=form["LANG_ID"].value;
        if (x==null || x=="0")
        {
          alert("Please select language!");
          return false;
        }
        x=form["PAGE_ID"].value;
        if (x==null || x=="0")
        {
          alert("Please select page!");
          return false;
        }
        x=form["TYPE_ID"].value;
        if (x==null || x=="0")
        {
          alert("Please select article type!");
          return false;
        }
        x=form["WEIGHT"].value;
        if(x!=null && x!="")
        {
            if(isNaN(x))
            {
               alert("The weight must be a positive or negative number!");
               return false; 
            }
        }
    }
    
    function validateWebpageForm()
    {
        var form=document.forms["ADDPAGE"];
        if(form==null)
        {
            var form=document.forms["UPDATEPAGE"];
        }
        var x=form["PAGE"].value;
        if (x==null || x=="")
        {
          alert("Page name is empty!");
          return false;
        }
    }
    
    function validateArticleTypeForm()
    {
        var form=document.forms["ADDARTICLETYPE"];
        if(form==null)
        {
            var form=document.forms["UPDATEARTICLETYPE"];
        }
        var x=form["ARTICLETYPE"].value;
        if (x==null || x=="")
        {
          alert("Article type is empty!");
          return false;
        }
    }
    
    function validateLanguageForm()
    {
        var form=document.forms["ADDLANGUAGE"];
        if(form==null)
        {
            var form=document.forms["UPDATELANGUAGE"];
        }
        var x=form["LANGUAGE"].value;
        if (x==null || x=="")
        {
          alert("Language shortcut is empty!");
          return false;
        }
        var x=form["NAME"].value;
        if (x==null || x=="")
        {
          alert("Language name is empty!");
          return false;
        }
    }
    
    function validateAlbumForm()
    {
        var form=document.forms["ADDALBUM"];
        if(form==null)
        {
            var form=document.forms["UPDATEALBUM"];
        }
        var x=form["NAME"].value;
        if (x==null || x=="")
        {
          alert("Album name is empty!");
          return false;
        }
        var x=form["COLUMNS"].value;
        if (x==null || x=="")
        {
          alert("Column number is empty!");
          return false;
        }
        else if(isNaN(x))
        {
            alert("Column numbert must be a NUMBER between 1 and 99");
            return false;
        }
        else if(x > 99 || x < 1)
        {
            alert("Column numbert must be a NUMBER between 1 and 99");
            return false;
        }
        x=form["PAGE"].value;
        if (x==null || x=="0")
        {
          alert("Please select page!");
          return false;
        }
        x=form["WEIGHT"].value;
        if(x!=null && x!="")
        {
            if(isNaN(x))
            {
               alert("The weight must be a positive or negative number!");
               return false; 
            }
        }
    }
    
    function validateImageForm()
    {
        var form=document.forms["UPLOADIMAGE"];
        if(form==null)
        {
            var form=document.forms["UPLOADIMAGE"];
        }
        var x=form["NAME"].value;
        if (x==null || x=="")
        {
          alert("Image name is empty!");
          return false;
        }
        x = form["FILE"].value;
        if (x == '') {
            alert("Please select a file!");
            return false;
        }
        else {
            var Extension = x.substring(x.lastIndexOf('.') + 1).toLowerCase();
            if (Extension != "gif" && Extension != "png" && Extension != "bmp" && Extension != "jpeg" && Extension != "jpg") {
                alert("Only gif, png, bmp, jpeg or jpg files are allowed!");
                return false;
            }
        }
        x=form["ALBUM"].value;
        if (x==null || x=="0")
        {
          alert("Please select album!");
          return false;
        }
        
        var _body = document.getElementsByTagName('body') [0];
        var _div = document.createElement('div');
        _div.className = "Dim";
        _div.innerHTML = "<p>Uploading image...</p><p>Please wait!</p>";
        _body.appendChild(_div);
        return true;
    }
    
    function validateImageUpdateForm()
    {
        var form=document.forms["UPDATEIMAGE"];
        var x=form["NAME"].value;
        if (x==null || x=="")
        {
          alert("Image name is empty!");
          return false;
        }
        x=form["ALBUM"].value;
        if (x==null || x=="0")
        {
          alert("Please select album!");
          return false;
        }
        return true;
    }
    
    var myWind = ""
    function doAddNewAlbumWindow() {
      if (myWind == "" || myWind.closed || myWind.name == undefined) {
        myWind = window.open("choosealbum.php","subWindow","HEIGHT=100,WIDTH=350")
      } else{
        myWind.focus();
      }
    } 
</script>

<?php
}
?>
