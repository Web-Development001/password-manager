<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/libs.js"></script>
    <title>Password Manager</title>
</head>

<body>
    <video autoplay muted loop id="bg-video">
        <source src="bg-vedio.mp4" type="video/mp4">
        Your browser does not support HTML5 video.
    </video>


    <div class="container" id="container">
        <div class="form-container sign-up">
            <form method="post">
                <h1>Create Account</h1>
                <span>or use your email for registeration</span>
                <br>
                <input type="text" placeholder="Name" id="Name" required>
                <input type="email" placeholder="Email" id="Email" required>
                <input type="password" placeholder="Password" id="Password" required>
                <small id="err"></small>
                <button class="btn" onclick="">Sign Up</button>

                <script>
                    let invalids = '!&*().\\/<>';
                    let username = document.getElementById('Name');
                    let email = document.getElementById('Email');
                    let password = document.getElementById('Password');                    
                    const err = '';
                    let hasInvalid = false;

                    username.addEventListener('input', () => {
                        const err = document.getElementById('err');
                        hasInvalid = false;
                        for(let f of invalids){
                            if(username.value.includes(f)) {
                                hasInvalid = true;
                                break;
                            }
                            if(username.value == ''){
                                hasInvalid = null;
                            }
                        }
                        if(hasInvalid){
                            err.style.color = 'red';
                            err.textContent = 'Do not allowed : !&*().\\/<>';
                        } else if(hasInvalid == null){
                            err.textContent = '';
                        } else {
                            err.style.color = 'green';
                            err.textContent = 'Verified';
                        }
                    });

                    password.addEventListener('input', () => {
                        const err = document.getElementById('err');

                        if(password.value.length > 10){
                            err.style.color = 'green';
                            err.textContent = 'Verified';
                        } else {
                            err.style.color = 'red';
                            err.textContent = 'Password must above 10 character';
                        }
                    })

                </script>
            </form>
        </div>
        <div class="form-container sign-in">
            <form method="post" action="">
                <h1>Sign In</h1>
                <span>or use your email password</span>
                <br>
                <input type="email" placeholder="Email" name="Email_log">
                <input type="password" placeholder="Password" name="Password_log">
                <!-- <a href="#">Forget Your Password?</a> -->
                <button class="btn">Sign In</button>
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