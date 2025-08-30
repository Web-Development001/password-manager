<?php

include 'database.php';
include_once 'externals.php';

// header('Access-Control-Allow-Origin:*');

$db = new Database_Configure();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $rn = random_int(10000000,99999999);
    $username = htmlspecialchars($_POST['user']);
    $password = htmlspecialchars($_POST['pass']);
    $email = htmlspecialchars($_POST['mail']);

    if(strpos($email,'@')){
        $api_calls = [$db->register($username,$email,$password,$rn),$db->set_user_informations($username)];

        if($api_calls[0] and $api_calls[1]) echo response(200);
        else echo response(500);
    } else echo response(406);
} else echo response(502);

