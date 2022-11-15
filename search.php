<?php include 'connection.php'?>
<?php
    session_start();
    require 'check_if_added.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- latest compiled and minified CSS -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <!-- jquery library -->
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <!-- Latest compiled and minified javascript -->
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <!-- External CSS -->
        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>
    <body>
            <?php
                require 'header.php';
            ?>
<br>
<br>
<div class="container">
                <div class="row">
                    <div class="col-xs-4 col-xs-offset-4">
                        <form method="post">
                            <div class="form-group">
                                <input type="name" class="form-control" name="name" placeholder="Enter what you want ">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="search" name="hello">
                            </div>
                        </form>
                    </div>
                </div>
   </div>


<div class="container">
<div class="row">
    <?php
    if (isset($_POST['hello']))
{
$name=$_POST['name'];
$sql="select * from items where category like '%$name%' || name like '%$name%' ";
$res = mysqli_query($con,$sql);
    if (mysqli_num_rows($res)>0)
    {
   while($row=mysqli_fetch_assoc($res))
   {
 ?>

    <div class="col-md-3 col-sm-6">
        <div class="thumbnail">
            <a href="cart.php">
                <img src="img/<?php echo $row['file']?>" alt="Cannon">
            </a>
            <center>
                <div class="caption">
                    <h3><?php echo $row['name']?></h3>
                    <p><?php echo "Price: Rs. ".$row['price']?></p>
                    <?php if(!isset($_SESSION['email'])){  ?>
                        <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                        <?php
                        }
                        else{
                            if(check_if_added_to_cart(1)){
                                echo '<a href="#" class=btn btn-block btn-success disabled>Added to cart</a>';
                            }else{
                                ?>
                                <a href="cart_add.php?id=1" class="btn btn-block btn-primary" name="add" value="add" class="btn btn-block btr-primary">Add to cart</a>
                                <?php
                            }
                        }
                        ?>
                    
                </div>
            </center>
        </div>
    </div>
    
</div>
</div>

</div>
<?php
   }
}
else
   {
    echo "No result found";
   }
}

?>


