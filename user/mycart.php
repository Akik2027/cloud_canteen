<?php
    
    include('connect/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="cart.css">
    <style>
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
<?php
   include('nav.php');
?><br><br><br><br><br><br><br><br><br><br><br><br>
    <h1>MY CART</h1>
    <div>
    <table>
        
            <tr>
                
                <th>sl no</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
        
            <tr>
                
                <div class="cart-info">
            <?php
           // $total=0;
           $email=$_SESSION["email"];
          // print_r($email);
           

            if(isset($_SESSION['cart']))
            {
                foreach($_SESSION['cart'] as $key=>$value )
                {   
                    $sr=$key+1;
                 //   $total=$total+$value['price'];
                    echo"
                    <tr align = 'center'>
                        <td><b>$sr</b></td>

                         <td>
                         <br> ";
                        ?>
                        <div class="cart-info">
                        <?php
                        $imagePath = '../Photos/'.$value['item_name'].'.jpg'  ; // Replace with the actual path to your image

                        if (file_exists($imagePath)) 
                        {
                            echo '<img src="' . $imagePath . '" alt="Image" width=90px/>';
                        } 
                        else
                        {
                             echo 'Image file not found.';
                        }
                    ?>
                    <?php
                        echo"
                        
                        <div class='pro'>
                        
                            <h2>$value[item_name]</h2>
                            <br>
                            <h3>price : $value[price]<input type='hidden' class = 'iprice' value = '$value[price]'></h3>
                                
                            <form action ='manage_cart.php' method = 'POST'>
                                <button name ='remove_item'>remove</button>
                                <input type = 'hidden' name = 'item_name' value='$value[item_name]'>
                                </form>
                        </div>
                        
                        </td>
                        
                            <form action ='manage_cart.php' method = 'POST'>
                               <td> <input type = 'number' class = 'iquantity' name = 'mod_quantity' onchange='this.form.submit()' value ='$value[Quantity]' min='1' max='10'>
                                <input type = 'hidden' name = 'item_name' value='$value[item_name]'>";?></td>
                            </form>
                           
                        
                            <td class = 'itotal' name ='itotal' value='itotal'></td>
                            <?php
                    
                }
                    
                }
                ?>
                    </tr>
                
                            </table>
                            
                            <div class="total-price">
                            <table>
                                <tr>
                                <div>
                                <td><h3> Grand Total</h3></td>
                                <td><h5 id =  "gtotal" name='gtotal' value='gtotal'></h5></td>
                                </tr >
                                <?php
                                if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0)
                                {
                                    $select = mysqli_query($connect, "SELECT * FROM `user_form` where email='$email'") or die('query failed');
                                    if(mysqli_num_rows($select) > 0){
                                        $fetch = mysqli_fetch_assoc($select);
                                    }
                                ?>
                                <div class="cont">  
                                <form action="purchase.php" method="POST"> 
                                <tr>
                                    
                                        <td><input type ="hidden" name ="name" value ="<?php echo $fetch['name']; ?>" placeholder="Enter your Name" require><br><br></td>
                                   
                                        <td><input type ="hidden" name ="phone_no"  value ="<?php echo $fetch['phno']; ?>" placeholder="Enter your Phone No"require><br><br></td>
                                   
                                        <td><input type ="hidden" name ="dept_name"  value ="<?php echo $fetch['dep']; ?>"placeholder="Enter your Department Name"require><br><br></td>
                                   
                                        
                                        <td><input type ="hidden" name ="sem_name"  value ="<?php echo $fetch['sem']; ?>"placeholder="Enter your Semester Name"require><br><br></td>
                                    
                                    
                                        <td><input type ="hidden" name ="registration"  value ="<?php echo $fetch['registration']; ?>"placeholder="Enter your Roll No"require><br><br></td>
                                    </tr>
                                        <td>Cash On Delevery</td>
                                        </label> 
                                        <td><input type ="radio" name ="pay_mode" value="COD" require></td>
                                    </tr>
                                    <tr>
                                        <td>
                                        <form action="purchase.php" method="post">
                                        <button class="submit" name="purchase">Place Order</button>
                                        
                                        </form>
                                        </td>
                                    </tr>  
                                </form>
                                </div>
                            <?php
                                }
                            ?>
    </div>
                            </table>
<script>
    var gt= 0;
    var iprice=document.getElementsByClassName('iprice');
    var iquantity=document.getElementsByClassName('iquantity');
    var itotal=document.getElementsByClassName('itotal');
    var gtotal=document.getElementById('gtotal');

    function subTotal()
    {
        gt=0;
        for(i=0;i<iprice.length;i++)
        {
            itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);

            gt=gt+(iprice[i].value)*(iquantity[i].value);
        }
        gtotal.innerText=gt;
    }
    subTotal();
</script>
</body>
</html>