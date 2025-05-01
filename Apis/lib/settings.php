<?php

include "Database.php";

class Setting {
    private $username,$pm_db;
    private $db_conf;

    function __construct($user)
    {
        $this->db_conf = new Database_configure();
        $this->pm_db = new password_manager_db();
        $this->username = $user;
    }

    function getEmail(){
        if(isset($this->username)){
            $this->db_conf->create_connection();
            $get_mail = $this->db_conf->GetemailbyUser($this->username);
            return $get_mail;
        } else {
            return 404;
        }
    }

    function getFingerprint(){
        if(isset($this->username)){
            $this->db_conf->create_connection();
            $finger_print = $this->db_conf->GetfingerprintbyUser($this->username);
            $get_finger_print = substr($finger_print,1,10);
            return $get_finger_print;
        } else {
            return 404;
        }
    }

    function getUsername(){
        if(isset($this->username)) return $this->username;
        else return 404;
    }

}
