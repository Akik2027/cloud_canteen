<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="purchase.php" method="POST">
        <?php
        session_start();
         include('connect/connection.php');
         $email=$_SESSION["email"];
             $select = mysqli_query($connect, "SELECT * FROM `user_form` where email='$email'") or die('query failed');
             if(mysqli_num_rows($select) > 0)
             {
                 $fetch = mysqli_fetch_assoc($select);
             }
        ?>
       
            <input type ="text" name ="name" value ="<?php echo $fetch['name']; ?>" placeholder="Enter your Name" require><br><br>
            <input type ="text" name ="phone_no"  value ="<?php echo $fetch['phno']; ?>" placeholder="Enter your Phone No"require><br><br>
            <input type ="text" name ="dept_name"  value ="<?php echo $fetch['dep']; ?>"placeholder="Enter your Department Name"require><br><br>
            <input type ="text" name ="sem_name"  value ="<?php echo $fetch['sem']; ?>"placeholder="Enter your Semester Name"require><br><br>
            <input type ="text" name ="registration"  value ="<?php echo $fetch['registration']; ?>"placeholder="Enter your Roll No"require><br><br>
            <form>
                    <button  name ="purchase" >Place Order</button>
            </form> 
    <form>
</body>
</html>