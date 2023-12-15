<?php
session_start();
require_once 'connect/connection.php';

        $email=$_SESSION["email"];
      
        if(isset($_POST['purchase']))
        {
            $q1="INSERT INTO  order_manager (`name`,email,`phone_no`, `dept_name`, `sem_name`, `registration`, `pay_mode`) VALUES ('$_POST[name]','$email','$_POST[phone_no]','$_POST[dept_name]','$_POST[sem_name]','$_POST[registration]','$_POST[pay_mode]')";
            {
                if(mysqli_query($connect,$q1))
                {   
                        $order_id=mysqli_insert_id($connect);
                        $q2="INSERT INTO user_orders(`order_id`, `item_name`, `price`, `quantity`) VALUES (?,?,?,?)";
                        $stmt=mysqli_prepare($connect,$q2);
                        if($stmt)
                        {   
                            $_SESSION['order_id'] = $order_id;
                            mysqli_stmt_bind_param($stmt,"isii",$order_id,$item_name,$price,$quantity);
                            foreach($_SESSION['cart'] as $key => $values)
                            {
                                $item_name=$values['item_name'];
                                $price=$values['price'];
                                $quantity=$values['Quantity'];
                               
                                mysqli_stmt_execute($stmt);
                            }
                        
                            echo"
                            <script>
                            alert('Order Placed');
                            window.location.href='invoice.php';
                            </script>
                            ";
                        }
                        else
                        {
                            echo"
                            <script>
                            alert('SQL Q prepare Error');
                            window.location.href='mycart.php';
                            </script>
                            ";
                        }
                }
                else
                {
                    echo "
                    <script>
                    alert('SQL ERROR');
                    window.location.href='mycart.php';
                    </script>";
                }
            }
        }
?>

