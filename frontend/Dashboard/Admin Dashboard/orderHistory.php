<?php
require "./adminAuthentication.php";
require "../../../backend/connection.php";

$selectOrders = "SELECT `id`, `orderId`, `product_id`, `productName`, `user_id`, `productPrice`, `quantity`, `total`, `action` FROM `orders`";
$orders = mysqli_query($con, $selectOrders);

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
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">


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
        <?php require "./leftSideLinks.php"; ?>
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
                        <div class="name">Name</div>
                        <div class="name">Product</div>
                        <div class="name">Product Price</div>
                        <div class="name">Quantity</div>
                        <div class="total">Total</div>
                        <div class="payment">Payment</div>
                        <div class="status">Status</div>
                    </li>
                    <?php
                    while ($row = mysqli_fetch_array($orders)) {
                        $orderId = $row['orderId'];
                        $productName = $row['productName'];
                        $productPrice = $row['productPrice'];
                        $quantity = $row['quantity'];
                        $total = $row['total'];
                        $quantity = $row['quantity'];
                        $userId = $row['user_id'];
                        $action = $row['action'];
                        $productId = $row['product_id'];

                        $selectUsersData = "SELECT `id`, `firstName`, `middleName`, `lastName`, `gender`, `dateOfBirth`, `number`, `email`, `password`, `address`, 
     `pincode`, `city`, `state`, `country` FROM `usersdata` WHERE email='$userId'";
                        $usersData = mysqli_query($con, $selectUsersData);

                        $userName = mysqli_fetch_array($usersData);
                        $firstName = $userName['firstName'];
                        $middleName = $userName['middleName'];
                        $lastName = $userName['lastName'];
                        $fullName = $middleName . " " . $firstName . " " . $lastName;

                        $selectCheckout = "SELECT `userId`, `orderId`, `billingId`, `shippingId`, `paymentType` FROM `checkout` WHERE orderId='$orderId'";
                        $checkout = mysqli_query($con, $selectCheckout);
                        $payment = mysqli_fetch_array($checkout);
                        $paymentType = $payment['paymentType'];
                    ?>

                        <li class="listOfHistory">
                            <div class="id"><?php echo $orderId ?></div>
                            <div class="name"><?php echo $fullName ?></div>
                            <div class="payment"><?php echo $productName ?></div>
                            <div class="payment"><?php echo $productPrice ?></div>
                            <div class="type"><?php echo $quantity ?></div>
                            <div class="total"><?php echo $total ?></div>
                            <div class="total"><?php echo $paymentType ?></div>

                            <div class="selectStatusBox">
                                <div class="status yellow"><?php echo $action ?></div>
                                <select class="action selectStatus">
                                    <option>select</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Shipped">Shipped</option>
                                    <option value="Delivered">Delivered</option>
                                </select>
                                <input type="text" style="display: none;" value="<?php echo $userId ?>" class="userId">
                                <input type="text" style="display: none;" value="<?php echo $orderId ?>" class="orderId">
                                <input type="text" style="display: none;" value="<?php echo $productId ?>" class="productId">
                            </div>

                        </li>
                    <?php } ?>
                </ul>

            </div>
        </div>
    </div>

    <!------------------
     Dashboard  - End 
    ------------------->




    <!---------
     Custom Js  
    ----------->
    <script src="../../Assets/js/common.js"></script>
    <script src="./Assets/js/commonAdminDashboard.js"></script>
    <script src="./Assets/js/orderHistory.js"></script>


    <!---------------
     Fontawesome Kit 
    ---------------->
    <script src="https://kit.fontawesome.com/a669b51611.js" crossorigin="anonymous"></script>
</body>

</html>