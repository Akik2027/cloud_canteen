<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>

    <!--font awsome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" >
    <link rel="stylesheet" href="css/styl.css">
</head>
<body>
     <!--header section-->
<header>
    <div class="logo">
    <img src="TAB.jpg" alt="MyOnlineMeal.com">
     <?php
			if ($_SESSION['loggedin'])
			{
			echo "<h1><center>". $_SESSION['username']."</h1>";
			}
		?>
    </div>

    <div id="menu-bar" class="fas fa-bars"></div> 

    <?php
        $count=0;
        if(isset($_SESSION['cart']))
        {
            $count=count($_SESSION['cart']);
        }
    ?>

    <nav  class="navbar">
        <!--<a href="home.php">Home</a>-->
        <a href="menu.php">Home</a>
        <a href="mycart.php">MyBag[<?php echo $count ; ?>]</a>
        <a href="#gallery">Gallery</a>
        <a href="myorder.php">Order</a>
        <a href="logout.php">Log Out</a>
        <a href="user_profile.php"> <i class="fas fa-user"></i></a>
    </nav>
</header>

 <!--custom js file link-->
 <script src="js/script.js"></script>
</body>
</html>