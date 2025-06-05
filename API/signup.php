<?php
header('Content-Type: application/json');

include "database.php";
$db = new Database_Configure();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['Name'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];
    
    if($username and $email and $password){
        if($db->create_account($username,$email,$password) and $db->set_user_informations($username)) response(200);
        else response(101);
    } else response(404);
} else response(403);