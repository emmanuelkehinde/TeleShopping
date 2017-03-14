<?php
include 'connection.php';

function getCartCount($conn){
    $query="SELECT * FROM cart";

    $result=mysqli_query($conn,$query);
    return mysqli_num_rows($result);
}

function getProductName($id,$conn)
{
    $q = "SELECT name FROM products WHERE id='$id'";
    $product_name="";
    $result = mysqli_query($conn, $q);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $product_name =  $row['name'];
        }
    }
    return $product_name;
}

function checkIfAdded($id,$conn){
    $q = "SELECT * FROM cart WHERE product_id='$id'";
    $result = mysqli_query($conn, $q);

    if (mysqli_num_rows($result) > 0) {
        return true;
    }else{
        return false;
    }
}

?>