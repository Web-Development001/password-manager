<?php
include "database.php";
$db = new Database_Configure();

$username = $_POST['Name'];
$email = $_POST['Email'];
$password = $_POST['Password'];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if($username and $email and $password){
        if($db->create_account($username,$email,$password)){
            echo json_encode(array(
                'Status' => 'DATA SUCCESSFULLY SEND'
            ),JSON_PRETTY_PRINT);
        }
        else{
            echo json_encode(array(
                'Status' => 'DATA FAILED TO SEND'
            ),JSON_PRETTY_PRINT);
        }
    } else {
        echo json_encode(array(
            'Status' => 'DATA NOT FOUND'
        ),JSON_PRETTY_PRINT);
    }
} else {
    echo json_encode(array(
        'Status' => 'INVALID REQUEST FOUND'
    ),JSON_PRETTY_PRINT);
}