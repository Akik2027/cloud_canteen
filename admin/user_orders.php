<?php
  require_once 'connect/connection.php';
  include('nav.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href = "https://cdn.jsdevlivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="user_order.css">
    <title>Document</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12"><br><br><br><br><br><br><br><br><br><br><br><br><br><br> 
                <table class="table text-center table-dark" border="3" align='center'>
                    <thead>
                        <tr align="center">
                            <th scope="col">Order ID</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Phone No</th>
                            <th scope="col">Depertment</th>
                            <th scope="col">Semester</th>
                            <th scope="col">Roll No</th>
                            <th scope="col">Pay Mode</th>
                            <th scope="col">Date</th>
                            <th scope="col">Time</th>
                            <th scope="col">Orders</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                           
                            $q1="SELECT * FROM order_manager";
                            $user_result=mysqli_query($connect,$q1);
                            while($user_fetch=mysqli_fetch_assoc($user_result))
                            {
                                echo
                                    "
                                    <tr align='center'>
                                        <td>$user_fetch[order_id]</td>
                                        <td>$user_fetch[name]</td>
                                        <td>$user_fetch[phone_no]</td>
                                        <td>$user_fetch[dept_name]</td>
                                        <td>$user_fetch[sem_name]</td>
                                        <td>$user_fetch[registration]</td>
                                        <td>$user_fetch[pay_mode]</td>
                                        <td>$user_fetch[Date]</td>
                                        <td>$user_fetch[time]</td>
                                        <td>
                                            <table class='table text-center table-dark'border='1' >
                                            <thead>
                                                <tr align='center'>
                                                    <th scope='col'>Item Name</th>
                                                    <th scope='col'>Price</th>
                                                    <th scope='col'>Quantaity</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                        ";
                                            $order_quary="SELECT * FROM user_orders WHERE order_id = '$user_fetch[order_id]'";
                                            $order_result=mysqli_query($connect,$order_quary);
                                            while($order_fetch=mysqli_fetch_assoc($order_result))
                                            {
                                                echo
                                                "<tr align='center'>
                                                    <td>$order_fetch[item_name]</td>
                                                    <td>$order_fetch[price]</td>
                                                    <td>$order_fetch[quantity]</td>
                                                </tr>

                                                ";
                                            }
                                            echo
                                            "
                                            </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                ";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>