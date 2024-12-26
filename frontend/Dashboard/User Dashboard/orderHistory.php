<?php

require "../../../backend/login.php";
require "./userAuthentication.php"; 
require "../../../backend/connection.php";
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!------------
     Google Fonts
     ------------->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">


    <!-----------
     Custom CSS 
     ----------->
    <link rel="stylesheet" href="./Assets/css/orderHistory.css">

</head>

<body>


        <!----------------------
     Dashboard Header - start 
    ------------------------>
    <?php require "../../dashboardHeader.php"; ?>
    <!---------------------
     Dashboard Header - End 
    ---------------------->



    <!------------------
     Dashboard  - start 
    ------------------->
    <div class="dashboardContainer" id="dashboardContainer">

        <!-------------------------- 
        dashboard left side - start
        --------------------------->
        <?php require "./userLeftSideLinks.php"; ?> 
        <!-------------------------- 
        dashboard left side - End
        --------------------------->

        <!-------------------------- 
        dashboard Right side - start
        --------------------------->
        <div class="rightSide">
        <div class="orderHistoryBox">
    <ul>
        <li id="headerOflist">
            <div class="id">Order Id</div>
            <div class="name">Product</div>
            <div class="payment">Payment</div>
            <div class="quantity">Quantity</div>
            <div class="type">Price</div>
            <div class="total">Total</div>
            <div class="total">Status</div>
        </li>

        <?php 
        $userId = $_SESSION['email'];
        $selectOrder = "SELECT `id`, `orderId`, `product_id`, `productName`, `user_id`, `productPrice`, `quantity`, `total`,`action` FROM `orders` WHERE user_id='$userId'";
        $order = mysqli_query($con, $selectOrder);

        while ($row = mysqli_fetch_array($order)) {
           $orderId = $row['orderId'];
         $selectcheckout = "SELECT `userId`, `orderId`, `billingId`, `shippingId`, `paymentType` FROM `checkout` WHERE orderId='$orderId'";
         $checkout = mysqli_query($con, $selectcheckout);            

              $checkoutrow = mysqli_fetch_array($checkout);
                ?>
                <li class="listOfHistory">
                    <div class="id"><?php echo $row['orderId']; ?></div>
                    <div class="name"><?php echo $row['productName']; ?></div>
                    <div class="payment"><?php echo $checkoutrow['paymentType']; ?></div> 
                    <div class="quantity"><?php echo $row['quantity']; ?></div>
                    <div class="type"><?php echo $row['productPrice']; ?></div>
                    <div class="total"><?php echo $row['total']; ?></div>
                    <div class="total yellow" ><?php echo $row['action']; ?></div>
                </li>  
                <?php
            }
        ?>                 
    </ul>
</div>

    </div>
    <!-------------------------- 
        dashboard Right side - End
        --------------------------->

    </div>
    <!------------------
     Dashboard  - End 
    ------------------->





    <!---------
     Custom Js  
    ----------->
    <script src="../../Assets/js/common.js"></script>


    <!---------------
     Fontawesome Kit 
    ---------------->
    <script src="https://kit.fontawesome.com/a669b51611.js" crossorigin="anonymous"></script>
</body>

</html>