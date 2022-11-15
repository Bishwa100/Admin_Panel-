<?php
    require 'connection.php';
    session_start();
    if (isset($_GET['id']))
    {
         $item_id=$_GET['id'];
        $user_id=$_SESSION['id'];
        $user_name=$_SESSION['email'];
        $sql="select * from items where id ='$item_id'";
        $res=mysqli_query($con, $sql);
        $row=mysqli_fetch_assoc($res);
        $item_name=$row['name'];
        $price=$row['price'];
        echo $item_name;
        $add_to_cart_query="insert into users_items(user_id,user_email,item_id,item_name,price,status) values ('$user_id','$user_name','$item_id','$item_name','$price','Added to cart')";
        $add_to_cart_result=mysqli_query($con,$add_to_cart_query) or die(mysqli_error($con));
        header('location: products.php');
    }
   
?>