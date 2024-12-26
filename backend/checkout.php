<?php

require "./connection.php";
require "./login.php";

if (isset($_POST['order'])) {

  $selectBillingAddress = $_POST['selectBillingAddress'];
  $selectShippingAddress = $_POST['selectShippingAddress'];
  $payment = $_POST['payment'];
  $userId = $_SESSION['email'];

  $insertCheckout = "INSERT INTO `checkout`( `userId`, `billingId`, `shippingId`, `paymentType`) VALUES ('$userId', '$selectBillingAddress','$selectShippingAddress','$payment')";
  $checkout = mysqli_query($con, $insertCheckout);

  if ($checkout === true) {
    $orderId = mysqli_insert_id($con);

    $selectCart = "SELECT `id`, `userId`, `productId`, `productName`, `productPrice`, `productImage`, `quantity`, `totalPrice` FROM `cart` WHERE userId='$userId'";
    $cart = mysqli_query($con, $selectCart);

    while ($row = mysqli_fetch_array($cart)) {
      $productId = $row['productId'];
      $productName = $row['productName'];
      $productPrice = $row['productPrice'];
      $quantity = $row['quantity'];
      $totalPrice = $row['totalPrice'];
      $action = "Pending";

      $insertOrder = "INSERT INTO `orders`(`orderId`, `product_id`,`productName`, `user_id`, `productPrice`, `quantity`, `total`, `action`) VALUES ('$orderId','$productId','$productName' ,'$userId','$productPrice','$quantity','$totalPrice', '$action')";
      $order = mysqli_query($con, $insertOrder);
    }

    if ($order === true) {
      $deleteCart = "DELETE FROM `cart`";
      $cart = mysqli_query($con, $deleteCart);
      header("location: ../frontend/dashboard/user dashboard/orderHistory.php");
    } else {
      echo "falied order";
    }
  }
} else {
  echo "order error";
}
