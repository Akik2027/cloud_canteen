<?php
//session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <!--font awsome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" >
    <link rel="stylesheet" href="css/styl.css">
</head>
<body>
     <!--header section-->
<header>
    <div class="logo">
    <img src="img/TAB.jpg" alt="MyOnlineMeal.com"></div>
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
        <a href="home.php">Home</a>
        <a href="addfood.php">Add Food</a>
        <a href="menu.php">Menu</a>
        <a href="user_orders.php">Orders</a>
        <a href="logout.php">Log Out</a>
    </nav>
</header>

 <!--custom js file link-->
 <script src="js/script.js"></script>
</body>
</html>