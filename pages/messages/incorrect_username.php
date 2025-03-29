<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incorrect Username ❌</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #000;
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
            background-color: #d32f2f; /* Red color for error */
            color: #fff;
        }

        #error-icon {
            width: 60px;
            height: 60px;
            fill: #fff;
            margin-bottom: 10px;
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

        #retryBtn {
            display: inline-block;
            margin-top: 1.5em;
            text-decoration: none;
            background: #d32f2f;
            color: #fff;
            padding: 0.8em 3em;
            border-radius: 25px;
            font-size: 1.1em;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        #retryBtn:hover {
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.3);
        }

    </style>
</head>
<body>
    <div id="card">
        <div id="upper-side">
            <svg id="error-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10" stroke="#fff" stroke-width="2" fill="none" />
                <line x1="8" y1="8" x2="16" y2="16" stroke="#fff" stroke-width="2" stroke-linecap="round"/>
                <line x1="16" y1="8" x2="8" y2="16" stroke="#fff" stroke-width="2" stroke-linecap="round"/>
            </svg>
            <h3 id="status">Incorrect Username</h3>
        </div>
        <div id="lower-side">
            <p id="message">The username you entered is incorrect. Please check and try again.</p>
            <a href="../../index.php" id="retryBtn">Retry</a>
        </div>
    </div>
</body>
</html>
