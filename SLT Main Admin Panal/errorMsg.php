<!-- error.html -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login Error</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
          background: rgb(5,50,246);
        background: linear-gradient(45deg, rgba(5,50,246,1) 13%, rgba(5,50,246,1) 25%, rgba(86,163,232,1) 35%, rgba(65,156,238,1) 41%, rgba(65,156,238,1) 46%, rgba(65,156,238,1) 52%, rgba(65,156,238,1) 57%, rgba(126,186,240,1) 67%, rgba(1,133,252,1) 78%, rgba(5,50,246,1) 88%);
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            color: #ecf0f1;  /* Light gray text */
        }

        .error-container {
            text-align: center;
            background: #3498db;  /* Blue background */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            animation: fadeInUp 0.5s ease;
        }

        h1 {
            color: #e74c3c;  /* Red heading */
        }

        p {
            color: #ecf0f1;  /* Light gray text */
            margin-bottom: 20px;
        }

        .button {
            background: #e67e22;  /* Orange button */
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: background 0.3s ease;
        }

        .button:hover {
            background: #d35400;  /* Darker orange on hover */
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <div class="error-container">
        <h1>Oops! Login Failed</h1>
        <p>Seems like you entered an incorrect username or password. Give it another shot!</p>
        <button class="button" onclick="goBack()">Go Back</button>
    </div>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>

</html>
