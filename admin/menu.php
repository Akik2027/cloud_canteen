<?php

  require_once 'connect/connection.php';
  include('nav.php');

  $sql = "SELECT * FROM foods";
  $all_foods = $connect->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="stylesheet" href="font/css/all.min.css">-->
    <link rel="stylesheet" href="css/menu2.css">
    <title>Ecommerce Website</title>
</head>
<body>
   <main>
      <?php
          while($row = mysqli_fetch_assoc($all_foods))
          {
          ?>
            <form method="POST"><br><br><br><br><br><br><br><br>
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
                        <p class="product_name"><?php echo $row["food"];  ?></p>
                        <p class="price"><b>Rs.<?php echo $row["price"]; ?></b></p>
                    </div>
                    
                     <button><?php echo"<a href = 'delete.php?food_id=$row[food_id]'"?></a>Remove From List</button>                 
                </div>
            </form>
          <?php
          }
      ?>
   </main>  
</body>
</html>