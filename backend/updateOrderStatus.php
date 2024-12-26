<?php
require "connection.php";
require "login.php";

// Get raw input data
$rawData = file_get_contents("php://input");
$data = json_decode($rawData, true);

if (isset($data)) {

    $arr = [];

        foreach ($data as $result) {
               $arr[] = $result;
        }

        $status = $arr[0];
        $userId = $arr[1];
        $orderId = $arr[2];
        $productId = $arr[3];

        $updateOrders = "UPDATE `orders` SET `action`='$status' WHERE user_id='$userId' AND product_id='$productId' AND orderId='$orderId'";
        $orders = mysqli_query($con, $updateOrders);
         
        if ($order=== true) {
            echo json_encode("upate succeessfully");
        }



}
else{
    echo json_encode("update File Error");
}

?>