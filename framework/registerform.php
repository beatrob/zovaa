<?php

/**
 * @author roberto
 * @copyright 2012
 */

require_once "elements/form.php";
require_once "elements/input.php";

class RegisterForm extends Form
{
    /*labels*/
    public $u_name_label =  "Username";
    public $pwd_label = "Password";
    public $pwd_confirm_label = "Confirm password";
    public $email_label = "E-mail";

    /*input elements*/
    private $u_name;
    private $pwd;
    private $pwd_confirm;
    private $email;
        
    public function SetInputLength($length)
    {
        $this->u_name->length = $length;
        $this->pwd->lnegth = $length;
        $this->pwd_confirm->lnegth = $length;
        $this->email->lnegth = $length;
    }
    
    public function __construct($action, $method)
    {
        parent::__construct($action, $method);
        $this->u_name = new Input("USER_NAME");
        $this->pwd = new Input("PASSWORD");
        $this->pwd->type = "PASSWORD";
        $this->pwd_confirm = new Input("PASSWORD_CONFIRM");
        $this->pwd_confirm->type = "PASSWORD";
        $this->email = new Input("EMAIL");
        $this->email->value = '@';
    }
    
    public function __toString()
    {
        $this->Add($this->u_name_label, $this->u_name);
        $this->Add($this->pwd_label, $this->pwd);
        $this->Add($this->pwd_confirm_label, $this->pwd_confirm);
        $this->Add($this->email_label, $this->email);
        $this->DrawForm();
        return '';
    }
    
    
}

?>