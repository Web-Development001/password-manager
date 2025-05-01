<?php
session_start();

include_once "{$_SERVER["DOCUMENT_ROOT"]}/Apis/lib/Database.php";

$user = $_SESSION["log_username"];

$getdb = new Database_configure();
$get_password_man_db = new password_manager_db();

if($getdb->deleteUser($user) == 200 and $get_password_man_db->deleteUser($user) == 200){
    session_unset();
    session_destroy();
    ?>
    <script>
        window.location.href = "../../pages/messages/accDel_succ.php";
    </script>
    <?
    exit();
} else {
    echo "Error occured try again later";
}