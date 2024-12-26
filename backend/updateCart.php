<?php 

require "connection.php";

$rawData = file_get_contents("php://input");
$data = json_decode($rawData, true);

$arr = [];

foreach($data as $result){
    $arr[] = $result;
}


   $productquantity = $arr[0];
   $userId = $arr[1];
   $productId = $arr[2];
   $productPrice = $arr[3];

  $productTotalPrice = ($productPrice * $productquantity);
   

  if ($productquantity > 0) {
    $updateCart = "UPDATE `cart` SET `quantity`='$productquantity', `totalPrice`='$productTotalPrice' WHERE `userId`='$userId' AND `productId`='$productId'";

    $cart = mysqli_query($con, $updateCart);
  
    if ($cart === true) {
      echo json_encode("Successfully Update Cart");
    }
  }

?>