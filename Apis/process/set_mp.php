<?php

session_start();

include_once "../lib/Database.php";
include_once "../auth/user.php";

$pm_user = new password_manager();
$pm_db = new password_manager_db();

$_SESSION['mp'] = $_POST["master_password"];
$pm_user->SetMasterPassword($_SESSION['mp']);

$get_mp = $pm_user->GetMasterPassword();

$con = $pm_db->create_connection();

if($con == 200){
    $send_mp = $pm_db->AddMasterPasswordByUser($get_mp,$_SESSION["log_username"]);
    if($send_mp == 200) include("../../pages/messages/mp_saved.php");
    else include("../../pages/messages/mp_failed.php");
} else {
    echo "Connection interrup, Try again after a moment . <a href=../../pages/pm.php>Click</a> to back";
}