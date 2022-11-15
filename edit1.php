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
                <div class="row">
                    <?php
                    if(isset($_GET['id']))
                    {
                        $id = $_GET['id'];
                    $sql = "select * from items where id='$id'";
                    $res= mysqli_query($con, $sql);
                    
                    if (mysqli_num_rows($res)>0)
                    {
                   while($row=mysqli_fetch_assoc($res))
                   {
                    
                 ?>


                <h1>Edit Items</h1>
                        <form method="post"  enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="Name" class="form-control" name="name" placeholder="<?php echo $row['name']?>">
                            </div>
                            <div class="form-group">
                                <input type="Name" class="form-control" name="price" placeholder="<?php echo "Price: Rs. ".$row['price']?>">
                            </div>
                            <div class="form-group">
                                <input type="name" class="form-control" name="category" placeholder="<?php echo $row['category']?>">
                            </div>
                            <div class="form-group">
                                <h6>Enter Image of this Item</h6>
                                <input type="file" class="form-control" name="file" placeholder="New File">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary"  name ='edit' value="Edit">
                            </div>
                        </form>
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
                                                <a href="edit1.php?id=<?php echo $row['id']?>" class="btn btn-block btn-primary" name="add" value="add" class="btn btn-block btr-primary">Edit Now</a>
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
            }
                ?>
    </body>
</html>

<?php

if (isset($_POST['edit']))
{
    $pname=$_POST['name'];
    $price=$_POST['price'];
    $category=$_POST['category'];
    $file =$_FILES['file'];
    $name = $_FILES['file']['name'];
    $temp = $_FILES['file']['tmp_name'];
    $edit=1;
    $edit_by= $_SESSION['email'];
    $location="./uploads/";
    $image=$location.$name;

    $target_dir="img/";
    $finalImage=$target_dir.$name;

    move_uploaded_file($temp,$finalImage);
    $sql = "select file from items where id='$id'";
    $res= mysqli_query($con, $sql);
    $row=mysqli_fetch_assoc($res);   
    $filen=$target_dir.$row['file'];
    unlink($filen);

    $sql1="UPDATE items SET name ='$pname' , price = '$price' , category= '$category' , file ='$name' , edit='$edit', edited_by='$edit_by' where id='$id'";
    $res1= mysqli_query($con,$sql1);
    //  $sql2="INSERT INTO items (edit, edited_by) VALUES ('$edit','$edit_by')";
   
    // $res2=mysqli_query($con,$sql2);
    if ($res1)
    {
        echo " Sucessfully Updated";
        ?>
        <meta http-equiv="refresh" content="1;url=products.php" />
    <?php 
    }
    else
    {
        echo "error";
    }
   
}
?>