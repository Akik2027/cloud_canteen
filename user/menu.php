<?php

    require_once 'connect/connection.php';
    include('nav.php');
    //include('ind.php');
    error_reporting(E_ERROR | E_PARSE);

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: ../singup1.php");
   exit;
}
  
  $sql = "SELECT * FROM foods";
  $all_foods = $connect->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="menu.css">
    <title>TAB</title>
</head>
<body><br><br><br>
<?php
         include('ind.php');
    ?>
    
        <center><h1 style="font-size: 60px;">&lt;/Todays Menu\&gt;</h1></center>
        <br>
    
<section id="menu-container">
  <main>
       <?php
    
          while($row = mysqli_fetch_assoc($all_foods))
          {
       ?>
            <form method="POST" action="manage_cart.php">
            <div class="card">
                <div class="image">
                    <img src="<?php echo $row["image"]; ?>" alt="">
                </div>
                <div class="caption">
                    <p class="rate">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                    </p>
                    <p class="product_name" ><?php echo $row["food"]; ?></p>
                    <p class="price" ><b>Rs.<?php echo $row["price"]; ?></b></p>
                    </div>
                        <button type="submit" name="add_to_cart">Add To Cart</button>
                        <input type="hidden" name="item_name" value="<?php echo $row["food"]; ?>">
                        <input type="hidden" name="price" value="<?php echo $row["price"]; ?>">
            </div>
            </form>
       <?php
          }
         
        ?>
   </main>  
</section>
    <div id="footer">
    <?php
         include('footer.php');
    ?>
    </div>
</body>
</html>