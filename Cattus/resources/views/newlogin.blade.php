<!DOCTYPE html>
<html>
<head>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <title>GeeksforGeeks Registration</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Additional styling for the login form */
        .main {
            text-align: center;
            margin-top: 50px;
        }
        form {
            margin-top: 20px;
        }
        form label {
            display: block;
            margin-bottom: 10px;
            text-align: left;
        }
        form input[type="text"],
        form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button.g-recaptcha {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        button.g-recaptcha:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="main">
        <h1>Cattus Immortalis Est</h1>
        <h3>Enter your login information</h3>
        <form id="logform" onsubmit="return validateRecaptcha()">
            <label for="first">Username:</label>
            <input type="text" id="first" name="first" placeholder="Enter your Username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your Password" required>

            <button id="g-recaptchaasd" class="g-recaptcha" 
                data-sitekey="6LfPUKQpAAAAAGmDa6L_cYlIAqHO1xDd7v4Ed6HZ" 
                data-callback='onSubmit' 
                data-action='submit'>Submit</button>
        </form>
        <p>Not registered yet?
            <a href="register.html" style="text-decoration: none;">Register</a>
        </p>
    </div>

    <script>
        function onSubmit(token) {
            document.getElementById("logform").submit();
        }

        function validateRecaptcha() {
            var response = document.getElementById("g-recaptchaasd").getResponse();
            if (response.length === 0) {
                alert("reCAPTCHA not validated");
                return false;
            } else {
                alert("reCAPTCHA validated");
                return true;
            }
        }
    </script>
</body>
</html>