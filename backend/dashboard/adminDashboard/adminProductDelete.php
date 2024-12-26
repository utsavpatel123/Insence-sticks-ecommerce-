
<?php
require "../../connection.php";

$id = $_GET['id'];
$product = "SELECT productImage FROM `product` where id='$id'";

$query = mysqli_query($con, $product);

$deletequery =  "DELETE FROM `product` WHERE id='$id'"; 

$result = mysqli_query($con,$deletequery);

if ($result === true) {
    while ($row = mysqli_fetch_array($query)) {
        unlink("../../productImageUpload/{$row['productImage']}");

    }
    header("location: ../../../frontend/Dashboard/Admin Dashboard/products.php");
}
else{
    echo "product Delete Error";
}



?>