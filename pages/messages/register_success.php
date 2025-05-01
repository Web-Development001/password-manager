<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered ✅</title>
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
        }

        #upper-side {
            padding: 2em;
            background-color: #8BC34A;
            color: #fff;
        }

        #checkmark {
            width: 60px;
            height: 60px;
            fill: #fff;
            margin-bottom: 10px;
        }

        #status {
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 1.2em;
            font-weight: bold;
        }

        #lower-side {
            padding: 2em;
        }

        #message {
            color: #757575;
            font-size: 1em;
            line-height: 1.5;
        }

        #contBtn {
            display: inline-block;
            margin-top: 1.5em;
            text-decoration: none;
            background: #8bc34a;
            color: #fff;
            padding: 0.8em 3em;
            border-radius: 25px;
            font-size: 1em;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        #contBtn:hover {
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
            <h3 id="status">Success</h3>
        </div>
        <div id="lower-side">
            <p id="message">Congratulations, your account has been successfully created.</p>
            <a href="../../index.php" id="contBtn">Continue</a>
        </div>
    </div>

</body>

</html>
