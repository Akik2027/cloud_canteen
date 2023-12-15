<?php
include('connect/connection.php');
//error_reporting(0);

$food_id=$_GET['food_id'];

$query="DELETE FROM `foods` WHERE food_id='$food_id'";

$data=mysqli_query($connect,$query);
if($data)
{

	?>
        <script>           
            alert("Delete successfully");            
			window.location.replace('menu.php');            
        </script>
    <?php		          		
}
else
{
	?>
        <script>           
            alert("Failed to delete data");            
			window.location.replace('menu.php');            
        </script>
    <?php			
}
?>