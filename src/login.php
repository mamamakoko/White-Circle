<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Sign up
   </title>

   <link rel="stylesheet" href="../asset/style/login.css">
</head>

<body>
   <div class="container">
      <section id="formHolder">
         <!-- Brand Box -->
         <div class="brand">
            <a href="../index.php" class="logo">WELCOME!</a>

            <div class="heading">
               <h2>White Circle</h2>
               <br>
               <br>
               <p>"Carrying your World in Style"</p>
            </div>

            <div class="success-msg">
               <p>Great! You are one of our members now</p>
               <a href="#" class="profile">Your Profile</a>
            </div>
         </div>
      </section>

      <!-- Form Box -->
      <div class="form">

         <!-- Login Form -->
         <div class="login form-peice switched">
            <form class="login-form" action="login1.php" method="post">
               <div class="form-group">
                  <label for="loginemail">Email Adderss</label>
                  <input type="email" name="loginemail" id="loginemail" required>
               </div>

               <div class="form-group">
                  <label for="loginPassword">Password</label>
                  <input type="password" name="loginPassword" id="loginPassword" required>
               </div>

               <div class="CTA">
                  <input type="submit" name="login" value="Login">
                  <a href="#" class="switch">I'm New</a>
               </div>
               <a href="checkout.php?forgot_pass">Forgot password</a>
            </form>
         </div>
         <!-- End Login Form -->


         <!-- Signup Form -->
         <div class="signup">
            <form action="login1.php" class="signup-form" method="post">

               <div class="form-group">
                  <label for="name">Full Name</label>
                  <input type="text" name="username" id="name" class="name">
                  <span class="error"></span>
               </div>

               <div class="form-group">
                  <label for="email">Email Address</label>
                  <input type="email" name="emailAdress" id="email" class="email">
                  <span class="error"></span>
               </div>

               <div class="form-group">
                  <label for="phone">Phone Number - <small>Optional</small></label>
                  <input type="text" name="phone" id="phone">
               </div>


               <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" name="password" id="password" class="pass">
                  <span class="error"></span>
               </div>

               <div class="form-group">
                  <label for="passwordCon">Confirm Password</label>
                  <input type="password" name="passwordCon" id="passwordCon" class="passConfirm">
                  <span class="error"></span>
               </div>

               <div class="CTA">
                  <input type="submit" value="Signup" name="signup" id="submit">
                  <a href="#" class="switch">I have an account</a>
               </div>
            </form>
         </div><!-- End Signup Form -->
      </div>
   </div>

   </div>
</body>

</html>