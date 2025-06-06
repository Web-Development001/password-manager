<?php
session_start();
$username = $_GET['user'];

if (isset($username)) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Manager</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/style1.css">
</head>
<body>
    <div class="main">
        <!-- Navbar -->
        <div class="navbar">
            <a href="#" class="logo">Hi, <?=htmlspecialchars($username)?> I am Password Manager</a>
            <div class="nav-links">
                <span class="item selected">Home</span>
                <span id="scroll" class="item">Get Started</span>
            </div>
            <div class="nav-buttons" id="navMenu">
                <button class="nav-btn selected">CREATE</button>
                <button class="nav-btn">SIGN IN</button>
            </div>
            <button class="toggler"><i class='bx bx-menu'></i></button>
        </div>

        <!-- Top Container -->
        <div class="top-container">
            <div class="info-box">
                <p class="header">SECURE YOUR PASSWORD</p>
                <p class="info-text"></p>
                <div class="info-buttons">
                    <button class="info-btn selected">Explore</button>
                    <button class="info-btn nav-btn">Create</button>
                </div>
            </div>
            <div class="nft-box">
                <img src="password.png" class="nft-pic">
                <div class="nft-content">
                    <div class="info">
                        <img src="logo.png" class="info-img">
                    </div>
                    <div class="likes">
                        <div class="icon-box">
                            <i class='bx bx-heart'></i> 258
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Get Started -->
        <div class="get-started">
            <p class="header">Getting Started</p>
            <p class="info-text">Password save and changes in the app</p>
            <div class="items-box">
                <div class="item-container">
                    <div class="item"><i class='bx bx-check-shield'></i></div>
                    <p>All secure your password</p>
                </div>
                <div class="item-container">
                    <div class="item"><i class='bx bx-wallet-alt'></i></div>
                    <p>Monthly payment</p>
                </div>
                <div class="item-container">
                    <div class="item"><i class='bx bx-money'></i></div>
                    <p>Always free of any charges</p>
                </div>
                <div class="item-container">
                    <div class="item"><i class='bx bx-rocket'></i></div>
                    <p>Very fast reply</p>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <div class="footer-header">Trust .</div>
            <div class="footer-links">
                <div class="link">
                    <h5>Marketplace</h5>
                    <p>Home</p>
                    <p>Get Started</p>
                    <p>Discover</p>
                    <p>Learn More</p>
                </div>
                <div class="link">
                    <h5>Company</h5>
                    <p>About Us</p>
                    <p>Services</p>
                    <p>Team Info</p>
                </div>
                <div class="link">
                    <h5>Contact</h5>
                    <p>Github</p>
                    <p>Instagram</p>
                    <p>Twitter</p>
                    <p>Facebook</p>
                </div>
            </div>
        </div>

        <div class="copyright">
            <p>Copyright 2025, company.</p>
        </div>
    </div>
    <script src="/js/index.js"></script>
</body>
</html>
<?php
} else {
    echo "You are not allowed to access this page without a username.";
}
?>
