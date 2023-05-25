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
            <h3>Papalitan mo 'to kay lyme hihi</h3>
        </div>

        <div class="form-container">
            <form>
                <label for="firstName">First Name:</label>
                <input type="text" id="firstName" name="firstName" required><br><br>

                <label for="lastName">Last Name:</label>
                <input type="text" id="lastName" name="lastName" required><br><br>

                <label for="phoneNumber">Phone Number:</label>
                <input type="tel" id="phoneNumber" name="phoneNumber" required pattern="[0-9]{11}"><br><br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br><br>

                <input type="submit" value="Sign Up">


                <br><br>

                <input type="submit" value="Log in">
                <br>
                <br>
                <br>
                <a href="./signin.php"><small>Create an account</small></a>
            </form>
        </div>
    </div>


</body>

</html>