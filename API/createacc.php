<?php

include './database.php';

$db = new Database_Configure();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $rn = random_int(10000000,99999999);
    $username = htmlspecialchars($_POST['user']);
    $password = htmlspecialchars($_POST['pass']);
    $email = htmlspecialchars($_POST['mail']);

    echo $db->register($username,$email,$password,$rn);
}