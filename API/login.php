<?php
include 'database.php';
include_once 'externals.php';

$db = new Database_Configure();

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $user = htmlspecialchars($_GET['user']);
    $pass = htmlspecialchars($_GET['pass']);
    $getuser = $db->search_account($user,'Name');
    if($getuser){
        $getpass = $db->search_account($pass,'Password');
        if($getpass){
            echo "logged in";
        } else response(461);
    } else response(404);
} else response(502);