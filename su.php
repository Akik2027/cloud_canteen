<?php
 include('connect/connection.php');

if(isset($_POST["submit"])){
    $registration = $_POST["registration"];
    $name = $_POST["name"];
    $phno = $_POST["phno"];
    $email = $_POST["email"];
    $dep = $_POST["dep"];
    $sem = $_POST["sem"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $duplicate = mysqli_query($connect, "SELECT * FROM user_form WHERE name='$name' OR email='$email'");
    if(mysqli_num_rows($duplicate)>0)
    {
        echo "<div class='alert alert-danger'>Email already exists</div>";
    }
    else
    {
        if($password==$cpassword) 
        {
            $query = "INSERT INTO user_form (registration,name,phno,email,dep,sem,password,cpassword) VALUES('$registration','$name','$phno','$email','$dep','$sem','$password','$cpassword')";
            mysqli_query($connect, $query);
            echo "<div class='alert alert-success'>Registration successful</div>";
        }
        else 
        {
            echo "<div class='alert alert-danger'>password doesnot match</div>";
        }
   }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>info</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="offset-md-4 col-md-4">
    <form  method="post" >
    <h1 class="text-center">Register</h1>
        <div class="form-group">
        <label for="registration"> Registration No.</label>
        <input type="text" name="registration" placeholder="registration" id="registration" class = "form-control" required>
        </div>
        <div class="form-group">
        <label for="name"> Name:</label>
        <input type="text" name="name" placeholder="Name" id="name" class = "form-control" required>
        </div>
        <div class="form-group">
        <label for="phno"> Phone no:</label>
        <input type="text" name="phno" placeholder="phone no" id="phno" class = "form-control" required>
        </div>
        <div class="form-group">
        <label for="email"> Email:</label>
        <input type="email" name="email"  placeholder="email" id="email"  class = "form-control" required> 
        </div>
        <div class="form-group">
        <label for="dep"> Department:</label>
        <input type="text" name="dep"  placeholder="Department" id="dep"  class = "form-control" required>
        </div>
        <div class="form-group">
        <label for="sem"> Semester:</label>
        <input type="text" name="sem"  placeholder="Semester" id="sem"  class = "form-control" required>
        </div>
        <div class="form-group">
        <label for="password"> Password:</label>
        <input type="password" name="password"  placeholder="password" id="password"  class = "form-control" required>
        </div>
        <div class="form-group">
        <label for="cpassword"> Confirm password:</label>
        <input type="password" name="cpassword"  placeholder="confirm password" id="cpassword"  class = "form-control" required>
        </div>
        <div class="form-group my-3">
        <input type="submit" name="submit" class="form-control btn btn-success" value="submit">
        </div>
       
    </form>
            </div>
        </div>
    </div>
    
</body>
</html>