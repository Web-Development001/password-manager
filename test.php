<?

include "./Apis/lib/Database.php";

$getdb = new password_manager_db();
$getdate = $getdb->fetchDateByMasterPassword("11111111");

print_r($getdate);




