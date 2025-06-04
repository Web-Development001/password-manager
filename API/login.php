<?php
include 'database.php';
include 'response.php';

$db = new Database_Configure();

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $username = $_GET['Username_login'];
    $password = $_GET['Password_login'];
    $get_user_info = $db->search_account($username);

    if($username and $password){
        if($get_user_info['Name'] != $username) response(460);
        else if($get_user_info['Password'] != $password) response(461);
        else response(200);
    } else response(451);
}