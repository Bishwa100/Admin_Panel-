<?php
    session_start();
    require 'connection.php';
    if(!isset($_SESSION['email'])){
        header('location:index.php');
    }
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
        <div>
            <?php
                require 'header.php';
            ?>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col-xs-4 col-xs-offset-4">
                        <h1>Add Items</h1>
                        <form method="post" action="add_php.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="Name" class="form-control" name="name" placeholder="Enter Item Name">
                            </div>
                            <div class="form-group">
                                <input type="Name" class="form-control" name="price" placeholder="Enter Item Price">
                            </div>
                            <div class="form-group">
                                <input type="name" class="form-control" name="category" placeholder="Enter Item category">
                            </div>
                            <div class="form-group">
                                <h6>Enter Image of this Item</h6>
                                <input type="file" class="form-control" name="file" placeholder="New File">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary"  name ='Enter' value="Enter">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <br><br><br><br><br>
           
        </div>
    </body>
</html>
