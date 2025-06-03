<?php
include "database.php";
$db = new Database_Configure();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['Name'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];
    
    if($username and $email and $password){
        if($db->create_account($username,$email,$password)){
            echo json_encode(array(
                'Status' => 200 //'DATA SUCCESSFULLY SEND'
            ),JSON_PRETTY_PRINT);
        }
        else{
            echo json_encode(array(
                'Status' => 101 //'DATA FAILED TO SEND'
            ),JSON_PRETTY_PRINT);
        }
    } else {
        echo json_encode(array(
            'Status' => 404 //'DATA NOT FOUND'
        ),JSON_PRETTY_PRINT);
    }
} else {
    echo json_encode(array(
        'Status' => 403 //'INVALID REQUEST FOUND'
    ),JSON_PRETTY_PRINT);
}