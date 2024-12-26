<?php

require "../../../backend/connection.php";
require "../../../backend/login.php";

$rawData = file_get_contents("php://input");
$data = json_decode($rawData, true);

$arr = [];


if ($_SESSION['email']) {
    $userId = $_SESSION['email'];
}

foreach($data as $result){
    $arr[] =  $result;
}

 $reviewNumber = $arr[0];
 $productName = $arr[1];
 $reviewMessage = $arr[2];
  
   $insertReview = "INSERT INTO `feedback`(`userId`, `productName`, `reviewMessage`, `starNumber`) 
   VALUES ('$userId','$productName','$reviewMessage','$reviewNumber')";

   $insert = mysqli_query($con, $insertReview);

   if ($insert === true) {
       echo json_encode("true");
    }
    else{
        echo json_encode("insert error!");
   }

?>