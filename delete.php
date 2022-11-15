<?php
    session_start();
    require 'check_if_added.php';
?>
<?php include 'connection.php'?>
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
        <div>
            <?php
                require 'header.php';
            ?>
            <div class="container">
                <div class="jumbotron">
                    <h1>Welcome to My Store!</h1>
                    <p>We have the best cameras, watches and shirts for you. No need to hunt around, we have all in one place.</p>
                </div>
            </div>
           
            <div class="container">
                <div class="row">
                    <?php
                    $sql = "select * from items order by id ASC ";
                    $res= mysqli_query($con, $sql);
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
                                    <h3></h3>
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
                                                <a href="delete1.php?id=<?php echo $row['id']?>" class="btn btn-block btn-primary" name="add" value="add" class="btn btn-block btr-primary">Delete</a>
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
                ?>
    </body>
</html>
