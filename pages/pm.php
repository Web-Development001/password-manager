<?php
require_once "../Apis/lib/Database.php";

session_start();
$username = $_SESSION["log_username"];

$getdb = new password_manager_db();
$ismp = $getdb->Is_master_password_exist($username);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Manager</title>
    <script src="../js/libs.js?v=2"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 text-white flex flex-col items-center justify-center min-h-screen p-4 relative">
    
    <!-- Top Navigation -->
    <div class="absolute top-4 left-4 flex items-center space-x-3">
        <div class="w-14 h-14 md:w-16 md:h-16 rounded-full bg-green-400 flex items-center justify-center">
            <svg class="w-8 h-8 md:w-10 md:h-10 text-white" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 12c2.761 0 5-2.239 5-5S14.761 2 12 2 7 4.239 7 7s2.239 5 5 5zm0 2c-3.337 0-6 2.663-6 6v2h12v-2c0-3.337-2.663-6-6-6z"></path>
            </svg>
        </div>
        <span class="text-lg md:text-xl font-bold">Hi, <?=$username?></span>
    </div>

    <div class="absolute top-4 right-4">
        <a href="setting.php" class="bg-gray-700 hover:bg-gray-600 px-3 md:px-4 py-2 rounded-lg font-semibold transition duration-300 shadow-md">
            Settings
        </a>
    </div>
    
    <!-- Password Manager Box -->
    <div class="bg-gray-800 p-6 md:p-8 rounded-xl shadow-xl w-full max-w-md text-center">
        <h1 class="text-xl md:text-2xl font-extrabold mb-4 text-blue-400">Password Manager</h1>
        <form action="../Apis/process/_pm.php" method="POST">
            <input id="title" name="title" type="text" placeholder="Title" class="w-full p-3 mb-3 rounded bg-gray-700 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <input id="password" name="password" type="password" placeholder="Password" class="w-full p-3 mb-3 rounded bg-gray-700 text-white placeholder-gray-400 focus:outline-none focus:ring-a2 focus:ring-blue-500">
            <button type="submit" id="savebtn" onclick="Isempty('title','password')" class="bg-blue-500 hover:bg-blue-600 w-full p-3 rounded-lg font-semibold transition duration-300">
                Save
            </button>
        </form>
    </div>
    
    <!-- Stored Passwords Box -->
    <div class="bg-gray-800 p-6 md:p-8 mt-6 rounded-xl shadow-xl w-full max-w-md text-center">
        <h2 class="text-xl md:text-2xl font-extrabold mb-4 text-green-400">Stored Passwords</h2>
        <form action="../Apis/process/chkmp.php" method="POST">
            <input id="masterPassword" name="masterPassword" type="password" placeholder="Enter Master Password" class="w-full p-3 mb-3 rounded bg-gray-700 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500" required>
            <button type="submit" class="bg-green-500 hover:bg-green-600 w-full p-3 rounded-lg font-semibold transition duration-300" <?php if (empty($ismp) or $ismp == 404) echo 'disabled'; else 'enable';?>>
                Unlock
            </button>
        </form>
        <ul id="passwordList" class="mt-4 space-y-2 text-left text-gray-300"></ul>
    </div>

</body>
</html>
