<?php
 require_once 'connect/connection.php';
 include('nav.php');

error_reporting(E_ERROR | E_PARSE);

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: ../singup1.html");
   exit;
}
?>
<html>
	<body><br><br><br><br>
	<?php
    
    echo"<div>";
    include('ind.php');
    echo"</div>";
    echo"<div>";
    
    echo"</div>";
   

    ?>
    <section id="menu-container">
        <?php
    include('menu.php');
    ?>
    </section>
    <?php
          include('footer.php');
    ?>
	</body>	
</html>
