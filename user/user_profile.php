<?php

require_once 'connect/connection.php';
session_start();
$email = $_SESSION['email'];

/*if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
}*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/user_profile.css">

</head>
<body>
   
<div class="container">
   <div class="profile">
      <?php
         $select = mysqli_query($connect, "SELECT * FROM `user_form` WHERE email = '$email'") or die('query failed'); 
         $fetch = mysqli_fetch_array($select);
      ?>
      <h3><?php echo $fetch['name']; ?></h3>
      <h3><?php echo $fetch['email']; ?></h3>
      <h3><?php echo $fetch['registration']; ?></h3>
      <h3><?php echo $fetch['phno']; ?></h3>
      <h3><?php echo $fetch['dep']; ?></h3>
      <h3><?php echo $fetch['sem']; ?></h3>
      <a href="update_profile.php" class="btn">update profile</a>
      <a href="menu.php" class="delete-btn">go back</a>
   </div>
</div>

</body>
</html>