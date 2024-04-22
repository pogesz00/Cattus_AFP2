<head>
    <title>GeeksforGeeks Registration</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        function onSubmit(token) {
            document.getElementById("regform").submit();
        }

        function validateRecaptcha() {
            var response = grecaptcha.getResponse();
            if (response.length === 0) {
                alert("Captcha not validated");
                return false;
            } else {
                alert("Captcha validated");
                return true;
            }
        }

        document.addEventListener('DOMContentLoaded', (event) => {
            document.getElementById('regform').onsubmit = validateRecaptcha;
        });
    </script>
</head>
<body>
    <div class="main">
        <h1>Cattus Immortalis Est</h1>
        <h3>Enter your register information</h3>
        <form id="regform">
			<input type="text"
				id="first"
				name="first"
				placeholder="Enter your Username" required>

			<label for="password">
				Password:
			</label>
			<input type="password"
				id="password"
				name="password"
				placeholder="Enter your Password" required>


                <button class="g-recaptcha" 
                data-sitekey="your_site_key" 
                data-callback='onSubmit' 
                data-action='submit'>Submit</button>
    </form>
		<p>Already have an account? 
			<a href="login.html"
			style="text-decoration: none;">
				Login
			</a>
		</p>
	</div>
</body>

</html>
