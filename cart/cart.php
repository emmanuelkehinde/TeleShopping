<?php
    include '../connection.php';
    include '../functions.php';

    $total_amount=0;

    $query="SELECT * FROM cart";

    $result=mysqli_query($conn,$query);


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>TeleShopping</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">

</head>

<body>


    <nav class="navbar navbar-inverse">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.php">TeleShopping</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="badge"><?php if (getCartCount($conn)>0) echo getCartCount($conn)?></span> Cart</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <div class="container">
        <div class="row">
           <div class="col-md-8 col-lg-offset-2">
               <h2>Cart</h2>
               <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
               <hr>

               <?php
               if(mysqli_num_rows($result)>0){
                   while($row=mysqli_fetch_assoc($result)){

                       $item_price=$row['_count'] * $row['unit_price'];
                       $total_amount=$total_amount+$item_price;
                       ?>
                       <div class="product-list clearfix">
                           <div class="pull-left product_details">
                               <div class="product_name_price">
                                   <h3><?php echo getProductName($row['product_id'],$conn) ?></h3>
                                   <h6><?php echo "Number of Items: ".$row['_count'] ?></h6>
                                   <h6><?php echo "Unit Price: "."#".$row['unit_price'] ?></h6>
                               </div>
                           </div>
                           <div class="pull-right">
                               <h3><?php echo "#".$item_price ?></h3>
                               <a href="delete.php?id=<?php echo $row['id']?>" class="btn btn-danger">Delete</a>
                           </div>
                       </div>
               <?php
                       }
                   }
                   else
                       echo "<h3>You have no item in your Cart </h3>";

               mysqli_close($conn);
               ?>


               <div>
                   <h2>Total Amount: <?php echo "#".$total_amount?></h2>
                   <a href="#" class="btn btn-primary btn-lg">Checkout</a>
               </div>

           </div>
        </div>





        <br><br>
        <div>
            <p class="text-center">&copy; TeleShopping 2017</p>
        </div>
    </div>

    <script src="../js/jquery-3.0.0.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/script.js"></script>
</body>

</html>