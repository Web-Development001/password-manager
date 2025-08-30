<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <title>SecureVault Password Manager</title>
    <style>
        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --secondary: #10b981;
            --dark: #1f2937;
            --light: #f9fafb;
            --gray: #9ca3af;
            --danger: #ef4444;
            --success: #10b981;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #1e3a8a 0%, #0f172a 100%);
            color: var(--light);
            overflow-x: hidden;
            position: relative;
        }
        
        #bg-video {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
            z-index: -1;
            opacity: 0.2;
        }
        
        /* Header Styles */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.5rem 5%;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 100;
            backdrop-filter: blur(10px);
            background: rgba(15, 23, 42, 0.8);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--light);
        }
        
        .logo i {
            color: var(--primary);
        }
        
        .auth-buttons {
            display: flex;
            gap: 1rem;
        }
        
        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            outline: none;
        }
        
        .btn-login {
            background: transparent;
            border: 1px solid var(--primary);
            color: var(--primary);
        }
        
        .btn-login:hover {
            background: rgba(79, 70, 229, 0.1);
        }
        
        .btn-signup {
            background: var(--primary);
            color: white;
        }
        
        .btn-signup:hover {
            background: var(--primary-dark);
        }
        
        /* Hero Section */
        .hero {
            padding: 8rem 5% 4rem;
            text-align: center;
            max-width: 900px;
            margin: 0 auto;
        }
        
        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 1.5rem;
            background: linear-gradient(to right, #818cf8, #a5b4fc);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .hero p {
            font-size: 1.25rem;
            color: var(--gray);
            margin-bottom: 2.5rem;
            line-height: 1.6;
        }
        
        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            padding: 4rem 5%;
        }
        
        .feature-card {
            background: rgba(30, 41, 59, 0.5);
            border-radius: 1rem;
            padding: 2rem;
            text-align: center;
            transition: transform 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .feature-card:hover {
            transform: translateY(-5px);
            background: rgba(30, 41, 59, 0.8);
        }
        
        .feature-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: var(--primary);
        }
        
        .feature-card h3 {
            margin-bottom: 1rem;
            font-size: 1.5rem;
        }
        
        .feature-card p {
            color: var(--gray);
        }
        
        /* Form Container Styles */
        .form-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            backdrop-filter: blur(5px);
        }
        
        .form-modal.active {
            display: flex;
            animation: fadeIn 0.3s ease;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        .form-wrapper {
            background: rgba(15, 23, 42, 0.95);
            border-radius: 1.5rem;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.5);
            overflow: hidden;
            width: 90%;
            max-width: 450px;
            position: relative;
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transform: scale(0.9);
            transition: transform 0.3s ease;
        }
        
        .form-modal.active .form-wrapper {
            transform: scale(1);
        }
        
        .form-container {
            padding: 3rem 2.5rem;
        }
        
        .form-container form {
            display: flex;
            flex-direction: column;
            gap: 1.25rem;
        }
        
        .form-container h1 {
            font-size: 2rem;
            margin-bottom: 0.5rem;
            text-align: center;
        }
        
        .form-container p {
            text-align: center;
            margin-bottom: 2rem;
            color: var(--gray);
        }
        
        .form-container input {
            padding: 1rem 1.25rem;
            border: none;
            border-radius: 50px;
            background: rgba(30, 41, 59, 0.7);
            color: var(--light);
            outline: none;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }
        
        .form-container input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 2px rgba(99, 102, 241, 0.3);
        }
        
        .form-container button {
            padding: 1rem;
            border-radius: 50px;
            border: none;
            background: var(--primary);
            color: white;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.3s ease;
            margin-top: 0.5rem;
        }
        
        .form-container button:hover {
            background: var(--primary-dark);
        }
        
        .form-footer {
            text-align: center;
            margin-top: 1.5rem;
            color: var(--gray);
        }
        
        .form-footer a {
            color: var(--primary);
            text-decoration: none;
            cursor: pointer;
        }
        
        .form-footer a:hover {
            text-decoration: underline;
        }
        
        .close-btn {
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
            background: rgba(255, 255, 255, 0.1);
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 1001;
            transition: all 0.3s ease;
        }
        
        .close-btn:hover {
            background: rgba(255, 255, 255, 0.2);
        }
        
        /* Testimonials */
        .testimonials {
            padding: 4rem 5%;
            text-align: center;
        }
        
        .testimonials h2 {
            font-size: 2.5rem;
            margin-bottom: 3rem;
        }
        
        .testimonial-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }
        
        .testimonial-card {
            background: rgba(30, 41, 59, 0.5);
            border-radius: 1rem;
            padding: 2rem;
            text-align: left;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .testimonial-text {
            font-style: italic;
            margin-bottom: 1.5rem;
            color: var(--light);
        }
        
        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .author-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }
        
        .author-details h4 {
            margin-bottom: 0.25rem;
        }
        
        .author-details p {
            color: var(--gray);
            font-size: 0.9rem;
        }
        
        /* Footer */
        footer {
            background: rgba(15, 23, 42, 0.8);
            padding: 3rem 5%;
            text-align: center;
            margin-top: 4rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .footer-content {
            max-width: 900px;
            margin: 0 auto;
        }
        
        .footer-links {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin: 2rem 0;
        }
        
        .footer-links a {
            color: var(--gray);
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .footer-links a:hover {
            color: var(--primary);
        }
        
        .copyright {
            color: var(--gray);
            margin-top: 2rem;
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
            }
            
            .form-container {
                padding: 2rem;
            }
            
            .footer-links {
                flex-direction: column;
                gap: 1rem;
            }
        }
    </style>
</head>

<body>
    <video autoplay muted loop id="bg-video">
        <source src="bg-vedio.mp4" type="video/mp4" />
        Your browser does not support HTML5 video.
    </video>

    <header>
        <div class="logo">
            <i class="fas fa-lock"></i>
            <span>SecureVault</span>
        </div>
        <div class="auth-buttons">
            <button class="btn btn-login" id="header-login">Log In</button>
            <button class="btn btn-signup" id="header-signup">Sign Up</button>
        </div>
    </header>

    <section class="hero">
        <h1>Manage Passwords with Confidence</h1>
        <p>SecureVault keeps your passwords safe and helps you generate strong, unique passwords for all your accounts. Access your credentials anywhere, anytime.</p>
    </section>

    <section class="features">
        <div class="feature-card">
            <div class="feature-icon">
                <i class="fas fa-shield-alt"></i>
            </div>
            <h3>Military-Grade Security</h3>
            <p>Your data is encrypted with AES-256 encryption, the same standard used by governments and security experts worldwide.</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">
                <i class="fas fa-key"></i>
            </div>
            <h3>Password Generator</h3>
            <p>Create strong, unique passwords for all your accounts with our built-in password generator.</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">
                <i class="fas fa-sync-alt"></i>
            </div>
            <h3>Cross-Platform Sync</h3>
            <p>Access your passwords from any device, whether you're on your computer, phone, or tablet.</p>
        </div>
    </section>

    <section class="testimonials">
        <h2>What Our Users Say</h2>
        <div class="testimonial-cards">
            <div class="testimonial-card">
                <p class="testimonial-text">"SecureVault has completely changed how I manage my passwords. I no longer have to remember dozens of different passwords!"</p>
                <div class="testimonial-author">
                    <div class="author-avatar">JD</div>
                    <div class="author-details">
                        <h4>John Doe</h4>
                        <p>Software Engineer</p>
                    </div>
                </div>
            </div>
            <div class="testimonial-card">
                <p class="testimonial-text">"The peace of mind that comes with knowing my passwords are secure is priceless. Highly recommend SecureVault!"</p>
                <div class="testimonial-author">
                    <div class="author-avatar">SM</div>
                    <div class="author-details">
                        <h4>Sarah Miller</h4>
                        <p>Marketing Director</p>
                    </div>
                </div>
            </div>
            <div class="testimonial-card">
                <p class="testimonial-text">"I've tried many password managers, but SecureVault's interface and security features are unmatched. It just works!"</p>
                <div class="testimonial-author">
                    <div class="author-avatar">RJ</div>
                    <div class="author-details">
                        <h4>Robert Johnson</h4>
                        <p>Business Owner</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="footer-content">
            <div class="logo">
                <i class="fas fa-lock"></i>
                <span>SecureVault</span>
            </div>
            <div class="footer-links">
                <a href="#">About Us</a>
                <a href="#">Privacy Policy</a>
                <a href="#">Terms of Service</a>
                <a href="#">Contact</a>
                <a href="#">Support</a>
            </div>
            <p class="copyright">© 2023 SecureVault. All rights reserved.</p>
        </div>
    </footer>

    <!-- Login Modal -->
    <div class="form-modal" id="login-modal">
        <div class="form-wrapper">
            <div class="close-btn" id="close-login">
                <i class="fas fa-times"></i>
            </div>
            <div class="form-container">
                <h1>Welcome Back</h1>
                <p>Sign in to access your password vault</p>
                <form method="get">
                    <input type="text" placeholder="Username" id="user-l" required>
                    <input type="password" placeholder="Password" id="pass-l" required>
                    <small id="_err" style="color: var(--danger); display: block; text-align: center; margin-bottom: 1rem;"></small>
                    <button type="button" onclick="login()">Log in</button>
                </form>
                <div class="form-footer">
                    <p>Don't have an account? <a id="switch-to-signup">Sign up</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Signup Modal -->
    <div class="form-modal" id="signup-modal">
        <div class="form-wrapper">
            <div class="close-btn" id="close-signup">
                <i class="fas fa-times"></i>
            </div>
            <div class="form-container">
                <h1>Create Account</h1>
                <p>Join thousands of users who trust SecureVault</p>
                <form method="post">
                    <input type="text" placeholder="Username" id="user-s" required>
                    <input type="email" placeholder="Email" id="email-s" required>
                    <input type="password" placeholder="Password" id="pass-s" required>
                    <small id="err" style="color: var(--danger); display: block; text-align: center; margin-bottom: 1rem;"></small>
                    <button type="button" onclick="signup()">Sign Up</button>
                </form>
                <div class="form-footer">
                    <p>Already have an account? <a id="switch-to-login">Log in</a></p>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Get modal elements
        const loginModal = document.getElementById('login-modal');
        const signupModal = document.getElementById('signup-modal');
        const headerLogin = document.getElementById('header-login');
        const headerSignup = document.getElementById('header-signup');
        const closeLogin = document.getElementById('close-login');
        const closeSignup = document.getElementById('close-signup');
        const switchToSignup = document.getElementById('switch-to-signup');
        const switchToLogin = document.getElementById('switch-to-login');
        
        // Open login modal
        headerLogin.addEventListener('click', () => {
            loginModal.classList.add('active');
        });
        
        // Open signup modal
        headerSignup.addEventListener('click', () => {
            signupModal.classList.add('active');
        });
        
        // Close login modal
        closeLogin.addEventListener('click', () => {
            loginModal.classList.remove('active');
        });
        
        // Close signup modal
        closeSignup.addEventListener('click', () => {
            signupModal.classList.remove('active');
        });
        
        // Switch to signup from login
        switchToSignup.addEventListener('click', () => {
            loginModal.classList.remove('active');
            signupModal.classList.add('active');
        });
        
        // Switch to login from signup
        switchToLogin.addEventListener('click', () => {
            signupModal.classList.remove('active');
            loginModal.classList.add('active');
        });
        
        // Close when clicking outside
        window.addEventListener('click', (e) => {
            if (e.target === loginModal) {
                loginModal.classList.remove('active');
            }
            if (e.target === signupModal) {
                signupModal.classList.remove('active');
            }
        });
        
        function signup() {
            if(String(document.getElementById('email-s').value).includes('@')){
                let formData = new FormData();
                formData.append('user', document.getElementById('user-s').value);
                formData.append('pass', document.getElementById('pass-s').value);
                formData.append('mail', document.getElementById('email-s').value);
                fetch('http://192.168.139.86/API/signup.php',{
                    method:'POST',
                    body:formData
                })
                .then(response => response.json())
                .then(value => {
                    if(value['status'] === 200) document.getElementById('err').textContent = 'success'
                    window.location.reload()
                })
                .catch(err => {
                    alert(err)
                })
            } else document.getElementById('err').textContent = 'invalid email'
        }
        
        function login() {
            let login_data = new FormData()
            login_data.append('user',document.getElementById('user-l').value)
            login_data.append('pass',document.getElementById('pass-l').value)

            fetch('http://192.168.139.86/API/login.php',{
                method:'POST',
                headers: {
                    "Content-Type": "application/json"
                },
                body:login_data
            })
            .then(response => response.json())
            .then(value => {
                console.log(value)
                if(value['status'] === 200) document.getElementById('_err').textContent = 'login success!'
                window.location.href = 'main.html'
            })
            .catch(err => {
                document.getElementById('_err').textContent = err
            })
        }
    </script>
</body>

</html>