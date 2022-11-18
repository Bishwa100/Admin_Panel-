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
                                <input type="submit" class="btn btn-primary" value="Apply Code" name="hi">
                            </div>
                        </form>
                    </div>
                </div>
   </div>


<div class="container">
<div class="row">
    <?php
    if (isset($_POST['hi']))
{
$name=$_POST['name'];
$sql="select * from coupon where coupon_code='$name' ";
$res = mysqli_query($con,$sql);
if(mysqli_num_rows($res)){
$row = mysqli_fetch_assoc($res);
$count = $row['status']+1;
    if ( $count<10)
    {
        $id=$row['id'];
       $sql1 = "update coupon set status='$count' where id='$id'";
       $res1 = mysqli_query($con,$sql1);
   ?>
    <script>
        window.alert("coupon code match");
        </script>
       <a href="cart.php?id=<?php echo $id?>" class="btn btn-primary">Goto Card Page</a>
        <?php
   }
}

else
   {
    ?>
    
    <script>
        window.alert("coupon code is worng");
        </script>
        <meta http-equiv="refresh" content="1;url=cart.php" />
<?php
   }
}

?>


