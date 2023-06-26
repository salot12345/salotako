<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>
<body>
    <div class="main">
        <div class="box form-box">

          <?php

         include("sql/config.php");
         if (isset($_POST['submit'])) {
           $username = $_POST['username'];
           $email = $_POST['email'];
           $age = $_POST['age'];
           $password = $_POST['password'];

    
          //verify if the email is unique
          $verify_query = mysqli_query($con, "SELECT Email FROM proj WHERE Email= '$email'");

         if (mysqli_num_rows($verify_query) !=0 ) {
            echo "<div class = 'message'>
              <p>This email is already used, try another one</p>
              </div> <br>";
            echo "<a href = 'javascript:self.history.back()'><button class='btn'>Go Back</button";
          } else {

            mysqli_query($con, "INSERT INTO proj(Username,Email,Age,Password) VALUES('$username','$email','$age','$password')") or die ("Erroe Occured");

            echo "<div class = 'message'>
            <p>Registration Successfully</p>
            </div> <br>";
          echo "<a href = 'index.php'><button class='btn'>Login now!</button";
          }
          }
         else {
    
    

         ?>





            <header>Register</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="user" autocomplete="off"  required>
                </div>
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="age">Age</label>
                    <input type="number" name="age" id="age" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="text" name="password" id="pass" autocomplete="off" required>
                </div>
                <div class="Submit">
                    <input type="submit" class="btn" name="submit" value="submit" required>
                </div>
                <div class="link">
                Have an account? <a href="index.php">Sign in</a>
                </div>
                </div>
            </form>
           
        </div>
        <?php } ?>
    </div>
    
</body>
</html>