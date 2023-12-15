<?php
    include('connect/connection.php');
    $login = false;

    if(isset($_POST["login"])){
        $email = mysqli_real_escape_string($connect, trim($_POST['email']));
        $username = mysqli_real_escape_string($connect, trim($_POST['username']));
        $password = trim($_POST['password']);

        $sql = mysqli_query($connect, "SELECT * FROM user_signup where email = '$email'");
        $count = mysqli_num_rows($sql);

            if($count > 0){
                $fetch = mysqli_fetch_assoc($sql);
                $hashpassword = $fetch["password"];
                
    
                if($fetch["status"] == 0){
                    ?>
                    <script>
                        alert("Please verify email account before login.");
                        window.location.replace("singup1.php");
                    </script>
                    <?php
                }else if(password_verify($password, $hashpassword)){
                    $login = true;
                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['email'] = $email;
                    $_SESSION['username'] = $username;
                   
                    ?>
                    <script>
                        alert("login in successfully");
                        window.location.replace("user/menu.php");
                    </script>
                    <?php
                }else{
                    ?>
                    <script>
                        alert("email or password invalid, please try again.");
                        window.location.replace("singup1.php");
                    </script>
                    <?php
                }
            }           
    }
?>