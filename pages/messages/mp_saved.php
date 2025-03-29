<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Password Saved ✅</title>
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
            background-color: #8BC34A; /* Green color for success */
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
            background: #8bc34a;
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
    </style>
</head>

<body style="background-color: black;">
    <div id="card">
        <div id="upper-side">
            <svg id="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10" stroke="#fff" stroke-width="2" fill="none" />
                <path d="M7 12l3 3 6-6" stroke="#fff" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <h3 id="status">Master Password Saved</h3>
        </div>
        <div id="lower-side">
            <p id="message">Your master password has been successfully saved.</p>
            <a href="../../pages/pm.php" id="continueBtn">Continue</a>
        </div>
    </div>
</body>
</html>
