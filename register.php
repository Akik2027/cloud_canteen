<?php session_start(); ?>

<?php
    include('connect/connection.php');

    if(isset($_POST["register"]))
    {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $Cpassword = $_POST["Cpassword"];

        if($password=$Cpassword)
		{
            $check_query = mysqli_query($connect, "SELECT * FROM user_signup where email ='$email'");
            $rowCount = mysqli_num_rows($check_query);

            if(!empty($email) && !empty($password))
            {
                if($rowCount > 0)
                {
                    ?>
                    <script>
                        alert("User with email already exist!");
                    </script>
                    <?php
                }
                else
                {
                    $password_hash = password_hash($password, PASSWORD_BCRYPT);

                    $result = mysqli_query($connect, "INSERT INTO user_signup (username,email, password, status) VALUES (' $username','$email', '$password_hash', 0)");
        
                    if($result)
                    {
                        $otp = rand(100000,999999);
                        $_SESSION['otp'] = $otp;
                        $_SESSION['mail'] = $email;
                        require "Mail/phpmailer/PHPMailerAutoload.php";
                        $mail = new PHPMailer;
        
                        $mail->isSMTP();
                        $mail->Host='smtp.gmail.com';
                        $mail->Port=587;
                        $mail->SMTPAuth=true;
                        $mail->SMTPSecure='tls';
        
                        $mail->Username='takeabite2023@gmail.com';
                        $mail->Password='lbdusqgkwkuvjevq';
        
                        $mail->setFrom('takeabite2023@gmail.com', 'OTP Verification');
                        $mail->addAddress($_POST["email"]);
        
                        $mail->isHTML(true);
                        $mail->Subject="Your verify code";
                        $mail->Body="<p>Dear user, </p> <h3>Your verify OTP code is $otp <br></h3>
                        <br><br>
                        <p>With regrads,</p>
                        <b>Take A Bite :)</b>";
                                if(!$mail->send())
                                {
                                    ?>
                                        <script>
                                            alert("<?php echo "Register Failed, Invalid Email "?>");
                                        </script>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                    <script>
                                        alert("<?php echo "Register Successfully, OTP sent to " . $email ?>");
                                        window.location.replace('verification.php');
                                    </script>
                                    <?php
                                }
                    }
                }
            }
        }
        else
            {
                ?>
                <script>
                        alert("<?php echo "your Password are not matched "?>");
                </script>
                <?php
            }
    }
?>

