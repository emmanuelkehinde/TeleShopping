<?php

include "../connection.php";


$product_id="";

    if (isset($_POST['id']) && isset($_POST['price']) && isset($_POST['product_count'])){
        $product_id=$_POST['id'];
        $price=$_POST['price'];
        $count=$_POST['product_count'];

        $query="INSERT INTO cart(id, product_id, unit_price, _count)
			VALUES(NULL, '$product_id','$price','$count')";

        if (mysqli_query($conn,$query)) {
            header("Location: ../index.php");
        }else{
            echo "Error: ".$query."<br>".mysqli_error($conn);
        }

        mysqli_close($conn);

    }

/**
 * Created by PhpStorm.
 * User: kehinde
 * Date: 3/14/17
 * Time: 1:06 PM
 */