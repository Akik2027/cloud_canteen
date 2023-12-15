<?php
    include('connect/connection.php');
    session_start();
    $email=$_SESSION["email"];
   
    $order_id=$_SESSION["order_id"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
   
    <link rel="stylesheet" href="invoice.css">
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
<div class="container mt-5 mb-3">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="d-flex flex-row p-2"> <img src="TAB.jpg" width="100" >
                    <div class="d-flex flex-column"> <span class="font-weight-bold">Tax Invoice</span> <small>OID<?php print_r($order_id); ?></small> </div>
                </div>
                <hr>
                <div class="table-responsive p-2">
                    <table class="table table-borderless">
                        <tbody>
                            <tr class="add">
                                <td>To</td>
                                <td>From</td>
                            </tr>

                            <tr class="content">
                            <?php
                                $select = mysqli_query($connect, "SELECT * FROM `order_manager` WHERE email = '$email'") or die('query failed'); 
                                $fetch = mysqli_fetch_array($select);
                            ?>
                           
                                <td class="font-weight-bold">
                                    
                                    USER NAME:<?php echo $fetch['name']; ?> <br>
                                    EMAIL ID:<?php echo $fetch['email']; ?> <br>
                                    REGISTRAION NO:<?php echo $fetch['registration']; ?><br>
                                    PHNOE NO:<?php echo $fetch['phone_no']; ?><br>
                                    DEPERTMENT NAME:<?php echo $fetch['dept_name']; ?> <br>
                                    SEMESTER:<?php echo $fetch['sem_name']; ?>
                                </td>
                                <td class="font-weight-bold">&lt;/<span> Take </span> A <span> Bite </span>\&gt; <br> College Food Court <br> BIMS</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <hr>
                <div class="products p-2">
                    <table class="table table-borderless">
                        <tbody>
                            <tr class="add">
                                <td>Product</td>
                                <td>Quantity</td>
                                <td>Price</td>

                                <td class="text-center">Total</td>
                            </tr>

                            <tr>
                
                            <div class="cart-info">
                            <?php
          
                              if(isset($_SESSION['cart']))
                                 {
                                 foreach($_SESSION['cart'] as $key=>$value )
                                    {   
                                        $sr=$key+1;
                                        echo"
                                        <td>
                                        <div class='pro'>
                                            <b>$value[item_name]</b>
                                        </td>
                                            
                                        <td> 
                                            <b>$value[Quantity]<input type = 'hidden' name = 'item_name' value='$value[item_name]'>
                                            <input type = 'hidden' class = 'iquantity' name = 'mod_quantity' onchange='this.form.submit()' value ='$value[Quantity]' min='1' max='10'>
                                            </b>
                                           
                                        </td>
                                        <td>
                                            <b>$value[price]<input type='hidden' class = 'iprice' value = '$value[price]'></b>
                                        </td> 
                                        <td class = 'itotal'></td>
                                </tr>";
                                   unset($_SESSION['cart']);
                                    }
                                }
                                ?>
                              
                                           

                        </tbody>
                    </table>
                </div>
                <hr>
                <div class="products p-2">
                    <table class="table table-borderless">
                        <tbody>
                            <tr class="add">
                                <td></td>
                                <td>___________</td>
                                <td>___________</td>
                                <td class="text-center">Total</td>
                            </tr>
                            <tr class="content">
                                <td></td>
                                <td>__________</td>
                                <td>__________</td>
                                <td class="text-center"><h5 id =  "gtotal"></h5></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <hr>
                <div class="address p-2">
                    <table class="table table-borderless">
                        <tbody>
                            <center><p>Please ! take <b>screenshort</b> before go back!</p></center>
                        <form action="menu.php" method="post">
                        <button class="submit">go back</button>
                        </form>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
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