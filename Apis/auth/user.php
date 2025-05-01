<?php

class User {
    private $username,$password;
    private $email,$id;

    function SetName($name){
        $this->username = $name;
    }

    function SetPassword($pass){
        $this->password = $pass;
    }

    function Setemail($email){
        $this->email = $email;
    }

    function Getname(){
        return trim($this->username);
    }

    function Getpassword(){
        return trim($this->password);
    }

    function Getemail(){
        return $this->email;
    }

    function GetID(){
        return rand(1,100000000);
    }
}

class password_manager {
    private $password_title,$password;
    private $master_password;

    function SetMasterPassword($mpass){
        $this->master_password = $mpass;
    }

    function SetPasswordTitle($title){
        $this->password_title = $title;
    }

    function SetPassword($pass){
        $this->password = $pass;
    }

    function GetMasterPassword(){
        return trim($this->master_password);
    }

    function GetPasswordTitle(){
        return trim($this->password_title);
    }

    function GetPassword(){
        return trim($this->password);
    }
}
