<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="css/signup.css">
</head>
<body style="background-size: cover; background-image:  url('https://images.twinkl.co.uk/tw1n/image/private/t_630_eco/u/category/cooking-1614786358.png');">
    <div class="container">
        <form action="" method="post"class="form" >
            <h2>Log in</h2>
            For admin
            <input type="text" name="email" id="email" class="box" placeholder=" Email" required>
			<input type="password" name="password" id="password" class="box" placeholder="Password" required>
			<input class="submit-btn" type="submit"  id="submit" name="submit" value="Log in">
        </form>
        <div class="side">
         <img src="img/TAB.jpg">
        </div>
        </div>
</body>
</html>
<?php
	include('connect/connection.php');
	$login = false;
	if(isset($_POST["email"]))
	{
		$email=$_POST["email"];
		$password=$_POST["password"];
		$q="select*from admin_login where email='".$email."' and password='".$password."' limit 1";
		$r=mysqli_query($connect,$q);
		$n=mysqli_num_rows($r);
		if($n==1)
		{	
			$login = true;
			session_start();
			$_SESSION['loggedin'] = true;
			$_SESSION['email'] = $email;
			header("location:home.php");
		}
		else
		{
			?>
			<script>
				alert("Cheak Your Username & Password");
				  window.location.replace("login.php");
			</script>
			<?php
		}
	}
?>