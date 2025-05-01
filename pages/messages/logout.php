<?
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout Success ✅</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #1488EA;
            font-family: 'Source Sans Pro', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        #card {
            width: 100%;
            max-width: 350px;
            text-align: center;
            border-radius: 8px;
            overflow: hidden;
            background: #fff;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
            opacity: 0;
            transform: scale(0.9);
            animation: fadeInUp 0.5s ease-in-out forwards;
        }

        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: scale(0.9);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        #upper-side {
            padding: 2em;
            background-color: #F44336; /* Red color for logout */
            color: #fff;
        }

        #checkmark {
            width: 60px;
            height: 60px;
            fill: #fff;
            margin-bottom: 10px;
            animation: bounce 0.6s ease-in-out infinite;
        }

        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        #status {
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 1.4em;
            font-weight: bold;
            animation: slideIn 0.6s ease-in-out;
        }

        @keyframes slideIn {
            0% {
                transform: translateX(-20px);
                opacity: 0;
            }
            100% {
                transform: translateX(0);
                opacity: 1;
            }
        }

        #lower-side {
            padding: 2em;
        }

        #message {
            color: #757575;
            font-size: 1.1em;
            line-height: 1.5;
        }

        #continueBtn {
            display: inline-block;
            margin-top: 1.5em;
            text-decoration: none;
            background: #F44336;
            color: #fff;
            padding: 0.8em 3em;
            border-radius: 25px;
            font-size: 1.1em;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        #continueBtn:hover {
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.3);
        }

        @media (max-width: 600px) {
            #card {
                max-width: 90%;
            }

            #upper-side {
                padding: 1.5em;
            }

            #lower-side {
                padding: 1.5em;
            }

            #continueBtn {
                padding: 0.8em 2em;
            }

            #checkmark {
                width: 50px;
                height: 50px;
            }

            #status {
                font-size: 1.2em;
            }

            #message {
                font-size: 1em;
            }
        }
    </style>
</head>

<body style="background-color: black;">
    <script>
        // Show a message for 2 seconds, then redirect to the login page
        setTimeout(function() {
            window.location.replace("../../index.php");
        }, 2000); // 2000 milliseconds = 2 seconds
    </script>
    <div id="card">
        <div id="upper-side">
            <svg id="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10" stroke="#fff" stroke-width="2" fill="none" />
                <path d="M7 12l3 3 6-6" stroke="#fff" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <h3 id="status">Logout Successful</h3>
        </div>
        <div id="lower-side">
            <p id="message">You have been successfully logged out. See you again!</p>
        </div>
    </div>
</body>
</html>
