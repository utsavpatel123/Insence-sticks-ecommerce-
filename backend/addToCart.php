<?php


require "connection.php";
require "login.php";

// Get raw input data
$rawData = file_get_contents("php://input");
$data = json_decode($rawData, true);

if (isset($_SESSION['email'])) {

if (isset($data)) {
    
        $userId = $_SESSION['email'];
        $productId = $data['productId'];

        $selectCart = "SELECT `id`, `userId`, `productId`, `productName`, `productPrice`, `productImage`, `quantity`, `totalPrice` 
        FROM `cart` WHERE `productId` = '$productId' AND `userId` = '$userId'";
        $cartCheck = mysqli_query($con, $selectCart);

        if (mysqli_num_rows($cartCheck) > 0) {

           $row = mysqli_fetch_array($cartCheck);
           $quantity = $row['quantity'];
           $price = $row['productPrice']; 
           $productId = $row['productId']; 
           $userId = $row['userId']; 

            $productQuantity = $quantity + 1;
            
            $totalPrice = $productQuantity * $price; 

            $updateCart = "UPDATE `cart` SET `quantity`='$productQuantity',`totalPrice`='$totalPrice' WHERE productId='$productId' AND userId='$userId'";

         if (mysqli_query($con, $updateCart)) {
          echo json_encode('Product update to cart successfully');
         } else {
          echo json_encode('Error update product to cart');
         }


        } else {

            $selectProduct = "SELECT `id`,`productName`, `productImage`, `productPrice` FROM `product` WHERE id='$productId'";
            $product = mysqli_query($con, $selectProduct);

            if ($row = mysqli_fetch_array($product)) {
                $productId = $row['id'];
                $productName = $row['productName'];
                $productImage = $row['productImage'];
                $productPrice = $row['productPrice'];
                $quantity = $data['quantity']; 

                $insertCart = "INSERT INTO `cart`(`userId`,`productId`, `productName`, `productPrice`, `productImage`, `quantity`, `totalPrice`) 
                               VALUES ('$userId','$productId', '$productName', '$productPrice', '$productImage', '$quantity', '$productPrice')";

                if (mysqli_query($con, $insertCart)) {
                    echo json_encode('Product added to cart successfully');
                } else {
                    echo json_encode('Error adding product to cart');
                }
            }
        }
    } else {
        echo json_encode('product is not found!');
    }
}
else{
    echo json_encode('User not logged in');
}
