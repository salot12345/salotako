<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    
    <div class="main">
        <div class="box form-box">
            <?php
            include("sql/config.php");
            if(isset($_POST['submit'])) {
               $email = mysqli_real_escape_string($con, $_POST['email']);
               $password = mysqli_real_escape_string($con, $_POST['password']);

               $res = mysqli_query($con, "SELECT * FROM proj WHERE Email = '$email' AND Password = '$password' ") or die ("Error");
               $row = mysqli_fetch_assoc($res);

               if(is_array($row) && !empty($row)) {
                $_SESSION['valid'] = $row['Email'];
                $_SESSION['username'] = $row['Username'];
                $_SESSION['age'] = $row['Age'];
                $_SESSION['id'] = $row['ID'];
               }else{
                echo "<div class = 'message'>
                <p>Wrong username or password, please try again</p>
                </div> <br>";
              echo "<a href = 'index.php'><button class='btn'>Go Back</button";
               }
                if(isset($_SESSION['valid'])){
                    header("Location: home.php");
                }
                } else {
                  
            
            

               ?>
            <header>Login</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email"  required>
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="pass" autocomplete="off" required>
                </div>
                <div class="Submit">
                    <input type="submit" class="btn" name="submit" value="login" required>
                </div>
                <div class="link">
                Don't have an account? <a href="registration.php">Sign up</a>
                </div>
                </div>
            </form>
        </div>
        <?php } ?>

    </div>
                
</body>
</html>