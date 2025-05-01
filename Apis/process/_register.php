<?php

session_start();

require_once "../lib/Database.php";
require_once "../auth/user.php";

$db = new Database_configure();
$pm = new password_manager_db();
$db_user = new User();
$pm_user = new User();

$_SESSION["reg_name"] = $_POST["username_register"];
$_SESSION["reg_email"] = $_POST["email_register"];
$_SESSION["reg_pass"] = $_POST["password_register"];
$_SESSION["reg_id"] = $db_user->GetID();

$db_user->SetName($_SESSION["reg_name"]);
$db_user->Setemail($_SESSION["reg_email"]);
$db_user->SetPassword($_SESSION["reg_pass"]);

$username = $db_user->Getname();
$email = $db_user->Getemail();
$password = $db_user->Getpassword();
$id = $_SESSION["reg_id"];

$con = $db->create_connection();
$con_pm = $pm->create_connection();

if($con == 200 and $con_pm == 200){
    $add_db_user = $db->addUser($username,$password,$email,$id);
    $add_pm_user = $pm->_addUser($username);
    if($add_db_user == 200 and $add_pm_user == 200 and $db->send_greeting_mail($username) == 200){
        ?> 
        <script>
            window.location.href = "../../pages/messages/register_success.php";
        </script> 
        <?
    } else if($add_db_user == 409 or $add_pm_user == 409){
        ?> 
        <script>
            window.location.href = "../../pages/messages/user_already_exist.php";
        </script> 
        <?
    } else {
        ?> 
        <script>
            window.location.href = "../../pages/messages/register_failed.php";
        </script> 
        <?
    }
}