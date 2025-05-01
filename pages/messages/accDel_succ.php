<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Deleted ❌</title>
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
            background-color: #f44336; /* Red color for deletion */
            color: #fff;
        }

        #crossmark {
            width: 60px;
            height: 60px;
            fill: #fff;
            margin-bottom: 10px;
            animation: shake 0.6s ease-in-out infinite;
        }

        @keyframes shake {
            0%, 100% {
                transform: translateX(0);
            }
            25% {
                transform: translateX(-5px);
            }
            50% {
                transform: translateX(5px);
            }
            75% {
                transform: translateX(-5px);
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

        #homeBtn {
            display: inline-block;
            margin-top: 1.5em;
            text-decoration: none;
            background: #f44336;
            color: #fff;
            padding: 0.8em 3em;
            border-radius: 25px;
            font-size: 1.1em;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        #homeBtn:hover {
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

            #homeBtn {
                padding: 0.8em 2em;
            }

            #crossmark {
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
    <div id="card">
        <div id="upper-side">
            <svg id="crossmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10" stroke="#fff" stroke-width="2" fill="none" />
                <path d="M8 8l8 8M16 8l-8 8" stroke="#fff" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <h3 id="status">Account Deleted</h3>
        </div>
        <div id="lower-side">
            <p id="message">Your account has been successfully deleted.</p>
            <a href="../../index.php" id="homeBtn">Go to Home</a>
        </div>
    </div>
</body>
</html>
