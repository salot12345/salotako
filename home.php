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
    <link rel="stylesheet" href="style.css">
    <title>Home Page</title>
</head>
<body>
    <div class="navi">
      <div class="logo">
        <p class="Logo">Sherwin</p>
      </div>
      
      <div class="right-links">

        <?php

        $id = $_SESSION['id'];
        $query = mysqli_query($con, "SELECT * FROM proj WHERE ID = $id");

        while($result = mysqli_fetch_assoc($query)) {
            $res_Uname = $result['Username'];
            $res_Email = $result['Email'];
            $res_Age = $result['Age'];
            $res_id = $result['ID'];
        }
        
       


   
        ?>

        <a href = "edit.php">Update Profile</a>
        <a href="logout.php"><button class="btn">Log out</button></a>
      </div>
    </div>
    <main>

        <div class="main-box top">
            <div class="top">
                <div class="box">
                    <p>Hello <b><?php echo $res_Uname ?></b>, Welcome to my Page</p>
                </div>
                <div class="box">
                    <p>Your email is <b><?php echo $res_Email ?></b></p>
                </div>
            </div>
            <div class="bottom">
                <div class="box">
                <p>You are <b><?php echo $res_Age ?> years old</b></p>
                </div>
            </div>
        </div>
    </main>
</body>
</html>