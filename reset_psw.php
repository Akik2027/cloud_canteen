<?php 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>

    <body>
    Reset Your Password         
        <form method="POST">
                <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>
                <input type="password" id="password" class="form-control" name="password" required autofocus>
                <input type="submit" value="Reset" name="reset">
        </form>
    </body>
</html>
<?php
//session_start() ;
    if(isset($_POST["reset"])){
        include('connect/connection.php');
        $psw = $_POST["password"];

        $hash = password_hash( $psw , PASSWORD_DEFAULT );

        $email = $_SESSION['email'];
        $sql = mysqli_query($connect, "SELECT * FROM login WHERE email='$email'");
        $query = mysqli_num_rows($sql);
  	    $fetch = mysqli_fetch_assoc($sql);

        if($email){
            $new_pass = $hash;
            mysqli_query($connect, "UPDATE login SET password='$new_pass' WHERE email='$email'");
            ?>
            <script>
                window.location.replace("singup.html");
                alert("<?php echo "your password has been succesful reset"?>");
            </script>
            <?php
        }else{
            ?>
            <script>
                alert("<?php echo "Please try again"?>");
            </script>
            <?php
        }
    }

?>

