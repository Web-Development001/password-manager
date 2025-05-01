<?php

session_start();

include "../lib/Database.php";
include "../auth/user.php";

$pm_db = new password_manager_db();
$pm_user = new password_manager();

$_SESSION["password_title"] = $_POST["title"];
$_SESSION["password"] = $_POST["password"];

$pm_user->SetPasswordTitle($_SESSION["password_title"]);
$pm_user->SetPassword($_SESSION["password"]);

$pass_title = $pm_user->GetPasswordTitle();
$pass = $pm_user->GetPassword();
$getmp = $_SESSION['mp'];
$getUser = $_SESSION['log_username'];
$getCurrentDate = date("F j, Y, g:i a");

$con = $pm_db->create_connection();

if(isset($getmp)){
    if(isset($pass_title) and isset($pass)){
        if((empty($pass_title) and empty($pass)) or (empty($pass_title) or empty($pass))){
            ?>
            <!-- The below is reload page -->
            <script>
                window.location.href = '../../pages/pm.php';
            </script>
            <?
        } else {
            if($con == 200){
                $is_exist = $pm_db->Is_master_password_exist($_SESSION["log_username"]);
                if($is_exist == 404) {
                    ?> 
                    <script>
                        window.location.href = "../../pages/messages/mp_404.php";
                    </script> 
                    <?
                } else {
                    $get_master_pass = $pm_db->fetchMasterPassByuser($_SESSION["log_username"]);
                    $is_pass_send = $pm_db->AddPasswordCredenialsByMasterPassword($getUser,$getmp,$pass_title,$pass,$getCurrentDate);
        
                    if($is_pass_send == 200){
                        ?> 
                        <script>
                            window.location.href = "../../pages/messages/password_saved.php";
                        </script> 
                        <?
                    }
                    else {
                        ?> 
                        <script>
                            window.location.href = "../../pages/messages/pass_save_failed.php";
                        </script> 
                        <?
                    }
                    // print_r($_SESSION);
                }
            }
            
        }
    }
} else {
    ?> 
    <script>
        alert("Check to verify your master password and try again");
        window.location.href = '../../pages/pm.php';
    </script>
    <?
}
