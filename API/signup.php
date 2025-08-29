<?php

include 'database.php';
include 'externals.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
$db = new Database_Configure();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $rn = random_int(10000000,99999999);
    $username = $_POST['user'];
    $password = $_POST['pass'];
    $email = $_POST['mail'];

    if($db->register(htmlspecialchars($username),htmlspecialchars($email),htmlspecialchars($password),$rn)) echo response(200);
    else echo response(500);
} else echo response(502);