<!DOCTYPE html>
<html>

<head>
    <title>Sign Up</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-color: #f7f7f7;
            font-family: Arial, sans-serif;
        }

        h1 {
            color: #555;
            text-align: center;
        }

        form {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 50px auto;
            max-width: 400px;
            padding: 20px;
            width: 90%;
        }

        label {
            display: block;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="email"],
        input[type="password"],
        input[type="tel"],
        input[type="text"],
        select {
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            display: block;
            font-size: 16px;
            margin-bottom: 20px;
            padding: 10px;
            width: 100%;
        }

        select {
            color: #888;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            border: none;
            border-radius: 5px;
            color: #fff;
            cursor: pointer;
            font-size: 16px;
            padding: 10px;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #3e8e41;
        }

        .toggle-password {
            cursor: pointer;
            display: inline-block;
            margin-left: 10px;
            vertical-align: middle;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            right: 10px;
        }

        .form-row {
            display: flex;
            gap: 10px;
        }

        .form-row input[type="text"] {
            flex: 1;
        }
    </style>
    <script>
        function togglePasswordVisibility() {
            const passwordField = document.querySelector('#password');
            const toggleButton = document.querySelector('#toggle-password-button');
            if (passwordField.type === "password") {
                passwordField.type = "text";
                toggleButton.textContent = "Hide";
            } else {
                passwordField.type = "password";
                toggleButton.textContent = "Show";
            }
        }

        const passwordField = document.querySelector('#password');
        passwordField.addEventListener('input', (event) => {
            const password = event.target.value;
            if (password.length < 8) {
                passwordField.setCustomValidity('Password must be at least 8 characters long');
            } else {
                passwordField.setCustomValidity('');
            }
        });

    </script>
</head>

<body>
    <h1>Sign Up Form</h1>
    <form method="POST" action="signup.php">
        <label>Email:</label>
        <input type="email" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
        <label>Password:</label>
        <div style="position: relative;">
            <input type="password" name="password" id="password" required>
            <span class="toggle-password" id="toggle-password-button" onclick="togglePasswordVisibility()">Show</span>
        </div>
        <label>Phone:</label>
        <input type="tel" name="phone" required oninput="formatPhoneNumber(this)">
        <div class="form-row">
            <div>
                <label>First Name:</label>
                <input type="text" name="first_name" required>
            </div>
            <div>
                <label>Last Name:</label>
                <input type="text" name="last_name" required>
            </div>


        </div>

        <label>Gender:</label>
        <select name="gender">
            <option value="" disabled selected>Select your gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="nonbinary">Non-binary</option>
        </select>

        <input type="submit" value="Sign Up">
    </form>
</body>

</html>