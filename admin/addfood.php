<?php include('nav.php'); ?>
<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Add Food</title>
      <link rel="stylesheet" href="st.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   </head><br><br><br><br><br>
   <body style="background-image: url('f3.jpeg');">

     
      <div class="container">
         <h1>Item Upload</h1>
         
         
         <div class="progress-bar">
            <div class="step">
               <p>
                 Image
               </p>
               <div class="bullet">
                  <span>1</span>
               </div>
               <div class="check fas fa-check"></div>
            </div>
            <div class="step">
               <p>
                  Id
               </p>
               <div class="bullet">
                  <span>2</span>
               </div>
               <div class="check fas fa-check"></div>
            </div>
            <div class="step">
               <p>
                  Name
               </p>
               <div class="bullet">
                  <span>3</span>
               </div>
               <div class="check fas fa-check"></div>
            </div>
            <div class="step">
               <p>
                  price
               </p>
               <div class="bullet">
                  <span>4</span>
               </div>
               <div class="check fas fa-check"></div>
            </div>
         </div>
         <div class="form-outer">
            <form method="POST" enctype="multipart/form-data">
               <div class="page slide-page">
                  <div class="title">
                     Food Details:
                  </div>
                  <div class="field">
                     <div class="label">
                        food image only jpg file acepeted
                     </div>
                     <input type="file" name="image">
                  </div>
            
                  <div class="field">
                     <button class="firstNext next">Next</button>
                  </div>
               </div>
               <div class="page">
                  <div class="title">
                     Identity:
                  </div>
                  <div class="field">
                     <div class="label">
                        Food Id
                     </div>
                     <input type="text" name ="food_id">
                  </div>
                  
                  <div class="field btns">
                     <button class="prev-1 prev">Previous</button>
                     <button class="next-1 next">Next</button>
                  </div>
               </div>
               <div class="page">
                  <div class="title">
                     Food Name:
                  </div>
                  <div class="field">
                     <div class="label">
                        Food Name
                     </div>
                     <input type="text" name="food">
                  </div>
                 
                  <div class="field btns">
                     <button class="prev-2 prev">Previous</button>
                     <button class="next-2 next">Next</button>
                  </div>
               </div>
               <div class="page">
                  <div class="title">
                     How Much:
                  </div>
                  <div class="field">
                     <div class="label">
                        price
                     </div>
                     <input type="text" name = "price">
                  </div>
                  
                  <div class="field btns">
                     <button class="prev-3 prev">Previous</button>
                     <button class="submit" name="submit">Submit</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
      <script src="js/j.js"></script>
   </body>
</html>
<?php
    include('connect/connection.php');
    if(isset($_POST['submit']))
    {
      $file_name = $_FILES['image']['name'];
      $file_tmp = $_FILES['image']['tmp_name'];
        $food_id=$_POST['food_id'];
        $food=$_POST['food'];
        $price=$_POST['price'];
       
        $allowed_extensions = array('jpg');  
        $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
       
        $upload_path="../Photos/" .$food.".".$file_extension;
       

        if(getimagesize($file_tmp) !== false && in_array($file_extension, $allowed_extensions))
         {
            
            if(move_uploaded_file($file_tmp, $upload_path))
            {
               $query="INSERT INTO foods (image,food_id,food,price) VALUES ('$upload_path','$food_id','$food','$price') limit 1";
               if(mysqli_query($connect,$query))
               {
                  echo"<script>alert ('File uploaded successfully.')</script>";
               }
               else
               {
                  echo"<script>alert ('Error uploading file.')</script>";
               }
            } 
         } 
         else
         {
            echo"<script>alert ('Invalid file type. Only JPG files are allowed.')</script>";
         }
      
 }
       
?>