<?php session_start() ?>


<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="icon" href="Favicon.png">

    <!-- Bootstrap CSS -->
    

    <title>Login Form</title>
    <style>
    * {
    margin: 5;
    padding: 0;
    position: relative;
}
body {
    background: #f0f4f3;
    font-family: 'Roboto', sans-serif;
}
.container {
background: #ededed;
border-radius: 10px;
height: 185px;
margin: 50% auto;
overflow: hidden;
width: 500px;
background:rgb(195, 34, 34);
background: linear-gradient(0deg, rgba(195,34,34,1) 0%, rgba(255,200,98,1) 100%);
box-shadow: 25px 30px 55px rgba(0, 0, 0, 0.623);
border-radius: 13px;
}
#h1 {
color: #060606;
text-decoration: none;
margin: 5% auto;
padding: 20% 0 25px;
}
.submit{
border: none;
border-radius: 25px;
cursor: pointer;
letter-spacing: 1px;
margin-top: 25px;
padding: 6px 15px;
text-transform: uppercase;
background:rgb(203, 29, 29);
background: linear-gradient(0deg, rgb(99, 89, 72) 0%, rgb(168, 198, 220) 100%);
box-shadow: 25px 30px 55px rgba(0, 0, 0, 0.623);
font-size: 14px;
}
</style>

</head>
<body>

<body style="background-size: cover; background-image: linear-gradient(rgb(0,0,0,0.4),rgb(0,0,0,0.4)), url('https://images.pexels.com/photos/70497/pexels-photo-70497.jpeg?cs=srgb&dl=pexels-robin-stickel-70497.jpg&fm=jpg');">
    <center>
    <div class="container">
        <h3>User Password Recover</h3>
        
                
                    
                    <div id="cover">
                        <form action="#" method="POST" name="recover_psw">
                            <div>
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                
                                    <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                </div>
                                <br>
                                <div>
                                <label for="new_psw" class="col-md-4 col-form-label text-md-right">New Password</label>
                                
                                    <input type="password" id="new_psw" class="form-control" name="password" required autofocus>
                                </div>
                            
                            <div>
                                <input class="submit" type="submit" value="Recover" name="recover">
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </center>
    </div>
    </div>

</main>
</body>
</html>

<?php 
    if(isset($_POST["recover"]))
    {
        include('connect/connection.php');
        $email = $_POST["email"];
        $psw = $_POST["password"];

        $hash = password_hash( $psw , PASSWORD_DEFAULT );

        $sql = mysqli_query($connect, "SELECT * FROM user_signup WHERE email='$email'");
        $query = mysqli_num_rows($sql);
  	    $fetch = mysqli_fetch_assoc($sql);

        if(mysqli_num_rows($sql) <= 0)
        {
            ?>
            <script>
                alert("<?php  echo "Sorry, no emails exists "?>");
            </script>
            <?php
        }
        else if($fetch["status"] == 0)
        {
            ?>
               <script>
                   alert("Sorry, your account must verify first, before you recover your password !");
                   window.location.replace("index.php");
               </script>
           <?php
        }
        else
        {
            $new_pass = $hash;
            mysqli_query($connect, "UPDATE user_signup SET password='$new_pass' WHERE email='$email'");
            ?>
            <script>
                window.location.replace("singup1.php");
                alert("<?php echo "your password has been succesful reset"?>");
            </script>
            <?php
        }
    }
?>
