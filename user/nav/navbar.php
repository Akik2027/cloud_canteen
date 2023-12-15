<?php
//session_start();
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
    <link rel="stylesheet" href="styl.css">
</head>
<body>
     <!--header section-->
<header>
    <div class="logo">
    <img src="TAB.jpg" alt="MyOnlineMeal.com"></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="logo2"><a href="#"><a href="#" class="text2" ></span>&lt;/</a><span> <a href="#"class="text">Take</a> </span> <a href="#"class="text2">A</a> <span> <a href="#"class="text">Bite</a></span><a href="#"class="text2">\&gt;</a></a>
    </div>

    <div id="menu-bar" color="white" class="fas fa-bars"></div> 

    <?php
        $count=0;
        if(isset($_SESSION['cart']))
        {
            $count=count($_SESSION['cart']);
        }
    ?>

    <nav  class="navbar">
        <a href="#home">Home</a>
        <a href="menu.php">Menu</a>
        <a href="mycart.php">MyBag[<?php echo $count ; ?>]</a>
        <a href="#gallery">Gallery</a>
        <a href="#review">Review</a>
        <a href="#order">Order</a>
        <a href="user_profile.php"> <i class="fas fa-user"></i></a>
    </nav>
</header>

 <!--custom js file link-->
 <script src="script.js"></script>
</body>
</html>