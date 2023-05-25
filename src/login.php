<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../asset/style/login.css">

    <title>Log in</title>
</head>

<body>
    <div class="container">
        <div class="welcome">
            <h3>Welcome To White Cicle</h3>
            <small>Carrying your World with style</small>
        </div>

        <div class="form-container">
            <form action="./functions.php" method="post">
                <div class="input-label">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="input-label">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>


                <br><br>

                <input type="submit" value="Log in" name="logInForm">
                <br>
                <br>
                <br>
                <a href="./signin.php"><small>Create an account</small></a>
            </form>
        </div>
    </div>


</body>

</html>