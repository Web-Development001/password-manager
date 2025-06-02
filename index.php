<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="css/style.css" />
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
                <span>or use your email for registration</span>
                <br />
                <input type="text" placeholder="Name" id="Name" required />
                <input type="email" placeholder="Email" id="Email" required />
                <input type="password" placeholder="Password" id="Password" required />
                <small id="err"></small>
                <script type="module" src="js/utils.js"></script>
                <button type="button" id="signup-btn">Sign Up</button>
            </form>
        </div>

        <div class="form-container sign-in">
            <form method="post" action="">
                <h1>Sign In</h1>
                <span>or use your email password</span>
                <br />
                <input type="email" placeholder="Email" name="user_login" />
                <input type="password" placeholder="Password" name="password_login" />
                <!-- <a href="#">Forget Your Password?</a> -->
                <button class="btn" type="submit">Sign In</button>
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
