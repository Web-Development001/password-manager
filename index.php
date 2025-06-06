<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <script src="js/libs.js"></script>
    <title>Password Manager</title>
</head>

<body>
    <video autoplay muted loop id="bg-video">
        <source src="bg-vedio.mp4" type="video/mp4" />
        Your browser does not support HTML5 video.
    </video>

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form method="post">
                <h1>Create Account</h1>
                <!-- <span>or use your email for registration</span> -->
                <br />
                <input type="text" placeholder="Username" id="Name" required>
                <input type="email" placeholder="Email" id="Email" required>
                <input type="password" placeholder="Password" id="Password" required>
                <small id="err" style="padding: 1cap;"></small>
                <button type="button" onclick="signup()" id="signup_btn">Sign Up</button>
            </form>
        </div>

        <div class="form-container sign-in">
            <form method="post">
                <h1>Sign In</h1>
                <!-- <span>or use your email password</span> -->
                <br />
                <input type="text" placeholder="Username" name="Username_login" id="Username_login">
                <input type="password" placeholder="Password" name="Password_login" id="Password_login">
                <small id="_err" style="padding: 1cap;"></small>
                <!-- <a href="#">Forget Your Password?</a> -->
                <button class="btn" type="button" onclick="login()">Log in</button>
            </form>
        </div>

        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Friend!</h1>
                    <p>Register with your personal details to use all of site features</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script src="js/script.js"></script>
</body>

</html>
