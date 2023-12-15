<!DOCTYPE html>
<html lang="en" >
	<head>
	<meta charset="UTF-8">
		<title>Take A Bite</title>
	<link rel="stylesheet" href="style.css">
	<style>
		#container {
background: #ededed;
border-radius: 10px;
height: 550px;
overflow: hidden;
width: 1000px;
margin-top:9%;
box-shadow:25px 30px 55px rgba(0, 0, 0, 0.623) ;
margin-left:auto;
margin-right: auto;
		}
	</style>
	</head>
<body>
<!-- partial:index.partial.html -->

<div id="container">
<!-- Cover Box -->
<div id="cover">
<!-- Sign Up Section -->
<img src="TAB.jpg"  >
<h2 class="sign-up">ARE YOU HUNGRY ?</h2>
<p class="sign-up"> Create a account with your details<br>and <br>Taste our food , to prove us best ! </p>
<a class="button sign-up" href="#cover">Sign Up</a>
<!-- Sign In Section -->
<br>
<h2 class="sign-in">Welcome Back!</h2>
<br>
<p class="sign-in">To keep connected with us please<br> login with your personal info</p>
<br>
<a class="button sub sign-in" href="#">Sign In</a>
</div>
							<!-- Login Box -->
<div id="login">
	<h1>Sign In</h1>
		<form method="POST" action="login.php">
			<input type="email" name="email" placeholder="Email" ><br>
			<input type="text" name="username" placeholder="username" ><br>
			<input type="password" name="password" placeholder="Password" ><br>
			<a id="forgot-pass" href="recover_psw.php">Forgot your password?</a><br>
			<input class="submit-btn" name="login" type="submit" value="login">
		</form>
</div>
							<!-- Register Box -->
<div id="register">
	<h1>Create Account</h1>
		<form method="POST" action="register.php" >
			<input type="text" name="username" placeholder="username" ><br>
			<input type="email" name="email" placeholder="Email" ><br>
			<input type="password" name="password" placeholder="Password" ><br>
			<input type="password"  name="Cpassword" placeholder="Conform Password"><br>
			<input class="submit-btn" type="submit" name="register" value="register">
		</form>
</div>
</div> <!-- END Container -->
<!-- partial -->
</body>
</html>
