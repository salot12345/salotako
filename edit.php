<?php
   session_start();

   include("sql/config.php");
   if(!isset($_SESSION['valid'])) {
    header("Location: index.php");
   }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Update Profile</title>
</head>
<body>
    <div class="navi">
        
        <div class="logo">
          <p class="Logo">Sherwin</p>
        </div>
        
        <div class="right-links">
        <a href="home.php">Home</a>
          <a href="logout.php"><button class="btn">Log out</button></a>
        </div>
      </div>
      <div class="main">
        <div class="box form-box">
             
          <?php

          if (isset($_POST['submit'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $age = $_POST['age'];

            $id = $_SESSION['id'];

            $edit_query = mysqli_query($con, "UPDATE proj SET Username='$username', Email='$email', Age= '$age' WHERE Id=$id ") or  die ("error");

            if ($edit_query) {
                echo "<div class = 'message'>
                <p>Profile Updated!</p>
                </div> <br>";
              echo "<a href = 'home.php'><button class='btn'>Go Back</button";
            }
          } else {

            $id = $_SESSION['id'];
            $query = mysqli_query($con, "SELECT * FROM proj WHERE ID = $id");

            while ($result = mysqli_fetch_assoc($query)) {
                $res_Uname = $result['Username'];
                $res_Email = $result['Email'];
                $res_Age = $result['Age'];
            }

          ?>



            <header>Update Profile</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" value="<?php echo $res_Uname; ?>" autocomplete="off"  >
                </div>
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" value="<?php echo $res_Email; ?>"
                     autocomplete="off" >
                </div>
                <div class="field input">
                    <label for="age">Age</label>
                    <input type="number" name="age" id="age" value="<?php echo $res_Age; ?>" autocomplete="off" >
                </div>
               
                <div class="Submit">
                    <input type="submit" class="btn" name="submit" value="Update" required>
                </div>
                
                </div>
            </form>
        </div>
       <?php } ?>
    </div>
</body>
</html>