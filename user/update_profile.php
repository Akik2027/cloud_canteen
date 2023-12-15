<?php

require_once 'connect/connection.php';
session_start();
$email = $_SESSION['email'];

if(isset($_POST['update_profile']))
{

   $update_name = mysqli_real_escape_string($connect, $_POST['update_name']);
   $update_email = mysqli_real_escape_string($connect, $_POST['update_email']);

   mysqli_query($connect, "UPDATE `user_form` SET name = '$update_name', email = '$update_email' WHERE email = '$email'") or die('query failed');

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>update profile</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/user_profile.css">

</head>
<body>
   
<div class="update-profile">

   <?php
      $select = mysqli_query($connect, "SELECT * FROM `user_form` WHERE email = '$email'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_array($select);
      }
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      
      <div class="flex">
         <div class="inputBox">
            <span>username :</span>
            <input type="text" name="update_name" value="<?php echo $fetch['name']; ?>"  class="box">
            <span>your email :</span>
            <input type="email" name="update_email" value="<?php echo $fetch['email']; ?>" class="box">
            <span>Phone No :</span>
            <input type="text" name="update_phno" value="<?php echo $fetch['phno']; ?>" class="box">
         </div>
         <div class="inputBox">
         <span>Depertment :</span>
            <input type="text" name="update_dep" value="<?php echo $fetch['dep']; ?>" class="box">
            <span>Registration :</span>
            <input type="text" name="update_registration" value="<?php echo $fetch['registration']; ?>" class="box">
            <span>Semester:</span>
            <input type="text" name="update_sem" value="<?php echo $fetch['sem']; ?>" class="box">
         </div>
        
      </div>
      <input type="submit" value="update profile" name="update_profile" class="btn">
      <a href="menu.php" class="delete-btn">go back</a>
   </form>

</div>

</body>
</html>