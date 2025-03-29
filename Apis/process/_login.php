<?php

session_start();

include "../lib/Database.php";
include "../auth/authentication.php";

$db = new Database_configure();
$auth = new Authentication();

$con = $db->create_connection();

$_SESSION["log_username"] = $_POST["username_login"];
$_SESSION["log_password"] = $_POST["password_login"];

$username = $_SESSION["log_username"];
$password = $_SESSION["log_password"];

if(isset($username) and isset($password)){
    if($con == 200){
        $get_username = $auth->Usercmp($db,$username);
        $get_password = $auth->passwordcmp($db,$username,$password);

        if($get_username == 200 and $get_password == 200) include("../../pages/messages/login_success.php");
        else if($get_username == 404 and $get_password == 401) include("../../pages/messages/login_failed.php");
        else if($get_username == 404) include("../../pages/messages/incorrect_username.php");
        else if($get_password == 401) include("../../pages/messages/incorrect_password.php");
        else include("../../pages/messages/login_failed.php");
        
    } else {
        echo "Connnection Interrupt, please try again later\n";
        echo "<a href=index.php>Click me</a> to go home page";
    }
} else {
    echo "issues with session <a href=../index.php>Back</a>";
}
