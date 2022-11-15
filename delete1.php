<?php
    require 'connection.php';
    session_start();
?>

<?php

    if (isset($_GET['id']))
    {
        $id = $_GET['id'];
        $sql1="SELECT * FROM items where id = '$id'";
        $res1=mysqli_query($con, $sql1);
        $row=mysqli_fetch_assoc($res1);


        $name = $_SESSION['email'];
        $product_name= $row['name'];
        echo $name;
        echo $product_name;
        $sql2="INSERT INTO delete_data (product_name	, delete_by) VALUES ('$product_name', '$name')";
        $res3=mysqli_query($con,$sql2);

        
        $target_dir="img/";
        $filen=$target_dir.$row['file'];
        unlink($filen);

        
        $sql= "DELETE FROM items where id = '$id'";
        $res=mysqli_query($con, $sql);
        
        
        if ($res)
        {
            echo "Delete Sucessful";
            ?>
            <meta http-equiv="refresh" content="1;url=products.php" />
       <?php
    }
    }
?>