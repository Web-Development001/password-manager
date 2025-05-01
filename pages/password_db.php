<?php
include "../Apis/lib/Database.php";
session_start();

$getdb = new password_manager_db();
$user = $_SESSION["log_username"];
$get_mp = $_SESSION['mp'];
$get_password_title = $getdb->fetchPasswordTitleByMasterPassword($get_mp);
$get_password = $getdb->fetchPasswordByMasterPassword($get_mp);
$getDate = $getdb->fetchDateByMasterPassword($get_mp);

print_r($_SESSION);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Database</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: white;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            flex-direction: column;
            position: relative;
        }

        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
        }

        .back-button button {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            background: #dc3545;
            color: white;
            font-size: 16px;
            cursor: pointer;
            font-weight: bold;
            transition: 0.3s;
        }

        .back-button button:hover {
            background: #c82333;
        }

        .container {
            width: 95%;
            max-width: 1400px;
            padding: 20px;
            text-align: center;
        }
        
        h2 {
            margin-bottom: 20px;
            font-size: 24px;
        }

        .table-container {
            overflow-x: auto;
            border-radius: 10px;
            width: 100%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #1e1e1e;
        }

        th, td {
            border: 1px solid #333;
            padding: 12px;
            text-align: left;
            color: white;
        }

        th {
            background: #0d6efd;
            color: white;
            text-align: center;
        }

        @media (max-width: 768px) {
            h2 {
                font-size: 20px;
            }

            th, td {
                font-size: 14px;
                padding: 8px;
            }
        }
    </style>
</head>
<body>

    <div class="back-button">
        <button onclick="goBack()">← Back</button>
    </div>

    <div class="container">
        <h2>Password Database</h2>

        <div class="table-container">
            <table id="passwordTable">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Password</th>
                        <th>Date Added</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $get_arrays_len = array('password_name_len' => sizeof($get_password_title),'password_len' => sizeof($get_password));
                    $getSizeOfInfo = ($get_arrays_len['password_name_len'] + $get_arrays_len['password_len']) / 2;
                    for($count = 1;$count < $getSizeOfInfo;$count++){
                        echo "
                        <tr>
                            <td><center>$get_password_title[$count]</center></td>
                            <td><center>$get_password[$count]</center></td>
                            <td><center>$getDate[$count]</center></td>
                        </tr>
                        ";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function goBack() {
            window.location.href = '../../pages/pm.php';
        }
    </script>

</body>
</html>


<?php

// echo "
// <tr>
//     <td>$gpt</td>
//     <td>$gp</td>
//     <td>$getCurrentDate</td>
// </tr>
// ";
