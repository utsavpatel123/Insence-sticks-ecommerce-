<?php
require "connection.php";

if (isset($_GET['userId']) && isset($_GET['productId'])) {

    $userId = $_GET['userId'];
    $productId = $_GET['productId'];

    $query = "DELETE FROM `cart` WHERE userId='$userId' AND productId='$productId'";
    $deleteQuery = mysqli_query($con, $query);

    if ($deleteQuery === true) {
        header("location: ../frontend/addToCart.php");
    }
    else{
        echo "error";
    }
}
else{
    echo "Cart Delete Error";
}
?>