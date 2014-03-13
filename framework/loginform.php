<?php

/**
 * @author roberto
 * @copyright 2012
 */

require_once "elements/form.php";
require_once "elements/input.php";

class LoginForm extends Form
{
    /*labels*/
    public $u_name_label =  "Username";
    public $pwd_label = "Password";
    public $submit_label = "Submit";
    /*input elements*/
    private $u_name;
    private $pwd;
        
    public function SetInputLength($length)
    {
        $this->u_name->length = $length;
        $this->pwd->lnegth = $length;
    }
    
    public function __construct($onsuccess)
    {
        parent::__construct($onsuccess, "LOGINFORM");
        $this->u_name = new Input("USER_NAME");
        $this->pwd = new Input("PASSWORD");
        $this->pwd->type = "PASSWORD";
        $this->SetOnFailure("http://".$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF']."?failure=1");
    }
    
    public function __toString()
    {
        $this->Add($this->u_name_label, $this->u_name);
        $this->Add($this->pwd_label, $this->pwd);
        $this->DrawForm();
        return '';
    }
    
    
}

?>