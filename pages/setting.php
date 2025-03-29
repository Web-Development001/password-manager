<?php
session_start();

require_once "../Apis/lib/settings.php";
require_once "../Apis/lib/Database.php";
$setting = new Setting($_SESSION["log_username"]);
$getdb = new password_manager_db();

$username = $setting->getUsername();
$email = $setting->getEmail();
$fingerprint = $setting->getFingerprint();
$is_mp = $getdb->Is_master_password_exist($username);
if (!empty($username)) {
    $username = $setting->getUsername();
    if (!empty($email)) {
        $email = $setting->getEmail();
        if (!empty($fingerprint)) {
            $fingerprint = $setting->getFingerprint();
        } else {
            $fingerprint = '❌';
        }
    } else {
        $email = '❌';
    }
} else {
    $username = '❌';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
    <script>
        function confirmDelete() {
            if (confirm("Are you sure you want to delete your account? This action cannot be undone.")) {
                window.location.href = "../pages/delete_account.php";
            }
        }
    </script>
</head>
<body class="bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 text-white flex flex-col items-center justify-center min-h-screen p-6">

    <!-- Back Button -->
    <div class="absolute top-4 left-4">
        <a href="pm.php" class="bg-gray-700 hover:bg-gray-600 px-6 py-3 rounded-lg font-semibold transition duration-300 shadow-md">
            Back
        </a>
    </div>

    <!-- Card Container -->
    <div class="bg-gray-800 p-10 rounded-2xl shadow-2xl w-full max-w-3xl text-center flex flex-col justify-between min-h-[550px]">

        <!-- Header -->
        <h1 class="text-4xl font-extrabold mb-6 text-blue-400">
            User Information
        </h1>

        <!-- User Details -->
        <div class="bg-gray-700 p-8 rounded-lg text-left space-y-6 text-lg mb-6">
            <div class="flex justify-between border-b border-gray-600 pb-2">
                <span class="text-gray-400">Username:</span>
                <span class="text-white"><?= $username; ?></span>
            </div>
            <div class="flex justify-between border-b border-gray-600 pb-2">
                <span class="text-gray-400">Email:</span>
                <span class="text-white"><?= $email; ?></span>
            </div>
            <div class="flex justify-between border-b border-gray-600 pb-2">
                <span class="text-gray-400">Fingerprint:</span>
                <span class="text-white"><?= $fingerprint; ?></span>
            </div>
            <div class="flex justify-between border-b border-gray-600 pb-2">
                <span class="text-gray-400">Is master password:</span>
                <span class="text-white">
                <?
                if (!empty($is_mp)) {
                    ?>✅<?
                } else {
                    ?>
                    <form action="../pages/master_password.php" method="post">
                        <button style="background-color: green; color: white; border: none; padding: 6px 30px; font-size: 16px; border-radius: 50px; cursor: pointer; transition: 0.3s;" 
                            onmouseover="this.style.backgroundColor='#218838'"
                            onmouseout="this.style.backgroundColor='green'">
                            Verify
                        </button>
                    </form>
                    <?
                }
                ?>
                </span>
            </div>
        </div>

        <!-- Buttons Container -->
        <div class="space-y-4 w-full">
            <!-- Logout Button -->
            <form action="../pages/messages/logout.php">
                <button type="submit" class="w-full p-3 rounded-full bg-red-500 hover:bg-red-600 font-semibold transition duration-300">
                    Logout
                </button>
            </form>

            <!-- Delete Account Button -->
            <form action="../Apis/process/deleteAcc.php" method="post">
                <button class="w-full p-3 rounded-full bg-gray-600 hover:bg-gray-700 font-semibold transition duration-300">
                    Delete Account
                </button>
            </form>
        </div>
    </div>

</body>
</html>
