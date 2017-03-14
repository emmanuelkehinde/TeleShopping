<?php

include "../connection.php";


    if (isset($_GET['id'])){
        $cart_id=$_GET['id'];
        $query="DELETE FROM cart WHERE id='$cart_id'";

        if (mysqli_query($conn,$query)) {
            header("Location: cart.php");
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