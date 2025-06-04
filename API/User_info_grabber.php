<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'database.php';
include 'response.php';

class User_info_grabber {
    private $username,$password;
    private $email,$db,$get_datas;
    
    function __construct($username)
    {
        $this->username = $username;
        $this->db = new Database_Configure();
        $this->get_datas = $this->db->search_account($this->username);

        if($this->get_datas == false) response(401);
        else {
            $this->password = $this->get_datas['Password'];
            $this->email = $this->get_datas['Email'];
        }
    }

    function grab(){
        if($this->username and $this->password and $this->email){
            echo json_encode([
                'Username' => $this->username,
                'Email' => $this->email,
                'Password' => $this->password
            ],JSON_PRETTY_PRINT);
        } else response(404);
    }

}

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $username = $_GET['username'];
    $uia = new User_info_grabber($username);
    $uia->grab();
}