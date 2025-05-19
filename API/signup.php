<?php
include "database.php";
$db = new Database_Configure();

$username = $_POST['Name'];
$email = $_POST['Email'];
$password = $_POST['Password'];

if($db->create_account($username,$email,$password)) echo "Right";
else{
    echo "
    <center>
        <h1>Signup Failed</h1>
    </center>
    ";
}