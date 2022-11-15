<?php
    include "connection.php";
    
    if(isset($_POST['Enter']))
    {
       
        $ProductName = $_POST['name'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        $file =$_FILES['file'];
        $name = $_FILES['file']['name'];
        $temp = $_FILES['file']['tmp_name'];
    
        $location="./uploads/";
        $image=$location.$name;

        $target_dir="img/";
        $finalImage=$target_dir.$name;

        move_uploaded_file($temp,$finalImage);

         $insert = mysqli_query($con,"INSERT INTO items (name, price, category, file) VALUES ('$ProductName','$price','$category','$name')");
 
         if(!$insert)
         {
             echo mysqli_error($con);
         }
         else
         {
             echo "Records added successfully.";
             ?>

             <meta http-equiv="refresh" content="1;url=products.php" />
             <?php
         }
     
    }
        
?>