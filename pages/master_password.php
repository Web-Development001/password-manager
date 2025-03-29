<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Password Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #121212;
            color: white;
            display: grid;
            place-items: center;
            height: 100vh;
            text-align: center;
            padding: 10px;
        }

        .modal {
            display: flex;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(5px);
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .modal-content {
            background: #1f1f1f;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .modal-content h1 {
            font-size: 22px;
            margin-bottom: 10px;
            color: #4caf50;
        }

        .modal-content p {
            font-size: 14px;
            color: #bbb;
            margin-bottom: 15px;
        }

        .field {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-top: 15px;
        }

        input {
            padding: 12px;
            border: 2px solid #4caf50;
            border-radius: 5px;
            font-size: 16px;
            width: 100%;
            background: #292929;
            color: white;
            outline: none;
            transition: 0.3s;
        }

        input:focus {
            border-color: #66ff66;
            box-shadow: 0 0 10px rgba(76, 175, 80, 0.5);
        }

        .submit-button {
            background: #4caf50;
            color: white;
            font-weight: bold;
            padding: 12px;
            font-size: 16px;
            width: 100%;
            border: none;
            border-radius: 5px;
            transition: 0.3s ease-in-out;
            opacity: 0.5;
            cursor: not-allowed;
        }

        .submit-button.enabled {
            opacity: 1;
            cursor: pointer;
        }

        .submit-button:hover:enabled {
            background: #45a049;
            transform: scale(1.05);
        }

        #warn_message {
            color: red;
            font-size: 14px;
        }

        @media (max-width: 480px) {
            .modal-content {
                padding: 20px;
            }
            input, .submit-button {
                font-size: 14px;
                padding: 10px;
            }
        }
    </style>
</head>
<body>

    <div id="loginModal" class="modal">
        <div class="modal-content">
            <h1>Hello, <?=$_SESSION["log_username"];?>!</h1>
            <form action="../Apis/process/set_mp.php" method="post">
                <div class="field">
                    <script>
                        function check_length() {
                            var passwordField = document.getElementById("password");
                            var submitButton = document.getElementById("submitBtn");
                            var getMessage = document.getElementById("warn_message");
                            
                            if (passwordField.value.length > 7) {
                                submitButton.disabled = false;
                                submitButton.classList.add("enabled");
                                getMessage.textContent = "";
                            } else {
                                submitButton.disabled = true;
                                submitButton.classList.remove("enabled");
                                getMessage.textContent = "Enter at least 8 characters.";
                            }
                        }
                    </script>

                    <input required name="master_password" type="password" id="password" placeholder="Enter Password" oninput="check_length()">
                    <p id="warn_message">Enter at least 8 characters.</p>
                    <button type="submit" id="submitBtn" class="submit-button" disabled>create master password</button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
