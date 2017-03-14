<?php
    include 'connection.php';
    include 'functions.php';


    $query="SELECT * FROM products";

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
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

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
                <a class="navbar-brand" href="index.php">TeleShopping</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="cart/cart.php"><span class="badge"><?php if (getCartCount($conn)>0) echo getCartCount($conn)?></span> Cart</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <div class="container">
        <div class="row">
           <div class="col-md-8 col-lg-offset-2">
               <h2>Products</h2>
               <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
               <hr>

               <?php
               if(mysqli_num_rows($result)>0){
                   while($row=mysqli_fetch_assoc($result)){
                       ?>
                       <div class="product-list clearfix">
                           <div class="pull-left product_details">
                               <div class="product_name_price">
                                   <h3><?php echo $row['name'] ?></h3>
                                   <h4 class="color-grey"><?php echo "#".$row['price'] ?></h4>
                               </div>
                           </div>
                           <?php $id=$row['id']; $name=$row['name']; $price=$row['price'];?>
                           <div class="pull-right">
                               <a class="btn btn-primary addBtn">Add to Cart</a><br>
                               <div class="modal-body" hidden>
                                   <form action="cart/add.php" method="post" >
                                       <div class="form-group">
                                           <input type="number" placeholder="Number of Items E.g 5" class="form-control"
                                                  name="product_count" value="product_count" required>
                                           <input type="number" name="id" value="<?php echo $id=$row['id']?>" hidden>
                                           <input type="number" name="price" value="<?php echo $id=$row['price']?>" hidden>
                                       </div>
                                       <button class="btn btn-default btn-sm" type="submit">Submit</button>
                                   </form>
                               </div>
                               <small class=""><?php if (checkIfAdded($id=$row['id'],$conn)) echo "Item added to Cart"?></small>
                           </div>
                       </div>
               <?php
                       }
                   }
               mysqli_close($conn);
               ?>

           </div>
        </div>




        <br><br>
        <div>
            <p class="text-center">&copy; TeleShopping 2017</p>
        </div>
    </div>

    <script src="js/jquery-3.0.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    <script>
        $('.addBtn').click(function () {
            $(this).siblings($('.modal-body')).slideToggle();
        });
    </script>
</body>
</html>