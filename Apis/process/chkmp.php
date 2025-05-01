<?php
require_once "../lib/Database.php";

session_start();

$getdb = new password_manager_db();
$getmp = $getdb->fetchMasterPassByuser($_SESSION["log_username"]);
$_SESSION['mp'] = $_POST['masterPassword'];

if($_SESSION['mp'] == $getmp){
    ?>
    <script>
        window.location.href = "../../pages/password_db.php";
    </script>
    <?
} else {
    echo "incorrect master password";
    exit();
}