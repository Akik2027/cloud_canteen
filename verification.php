<?php session_start() ?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Verification</title>
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
height: 150px;
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
<body style="background-size: cover; background-image: linear-gradient(rgb(0,0,0,0.4),rgb(0,0,0,0.4)), url('https://images.pexels.com/photos/70497/pexels-photo-70497.jpeg?cs=srgb&dl=pexels-robin-stickel-70497.jpg&fm=jpg');">
    <center>
    <div class="container">
                    <h1>Verification Account</h1>
                    <div id="cover">
                        <form action="#" method="POST">
                                <label for="email_address">OTP Code</label>
                                    <input type="text" id="otp" class="form-control" name="otp_code" required autofocus>
                                    <input class="submit" type="submit" value="Verify" name="verify">
                            
                    
                    </form>
                </div>
           
    </div>
    </center>
</main>
</body>
</html>
<?php 
    include('connect/connection.php');
    if(isset($_POST["verify"])){
        $otp = $_SESSION['otp'];
        $email = $_SESSION['mail'];
        $otp_code = $_POST['otp_code'];

        if($otp != $otp_code){
            ?>
           <script>
               alert("Invalid OTP code");
           </script>
           <?php
        }else{
            mysqli_query($connect, "UPDATE user_signup SET status = 1 WHERE email = '$email'");
            ?>
             <script>
                 alert("Verfiy account done, you may sign in now");
                   window.location.replace("singup1.php");
             </script>
             <?php
        }

    }

?>