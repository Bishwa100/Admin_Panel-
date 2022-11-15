<?php
    require 'connection.php';
    session_start();
    $item_id=$_GET['id'];
    echo $item_id;
    $user_id=$_SESSION['id'];
    $delete_query="delete from users_items where  id='$item_id'";
    $delete_query_result=mysqli_query($con,$delete_query) or die(mysqli_error($con));
    header('location: cart.php');
?>