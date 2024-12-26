<?php

require "../backend/connection.php";
require "../backend/login.php";

if (!isset($_SESSION['email'])) {
    header("location: ../frontend/login.php");
}

$selectCart = "SELECT `id`, `userId`, `productId`, `productName`, `productPrice`, `productImage`, `quantity`, `totalPrice` FROM `cart`";

$cart = mysqli_query($con, $selectCart);

if (mysqli_num_rows($cart) <= 0) {
    echo "empty Cart items";
    exit();
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!------------
     Google Fonts
     ------------->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <!-----------
     Custom CSS 
     ----------->
    <link rel="stylesheet" href="./Assets/css/checkout.css">
</head>

<body>

    <form action="../backend/checkout.php" method="post">
    <div id="checkout" class="checkout">

        <div class="billingAddress">

            <h2>Select Billing Address</h2>

            <div class="tableDataContainer">
                <div class='usersTable'>
                    <table id='table'>
                        <tr class="tableHeading">

                            <th>Your Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>gender</th>
                            <th>Address 1</th>
                            <th>Address 2</th>
                            <th>Address Type</th>
                            <th>Date of Birth</th>
                            <th>pincode</th>
                            <th>city</th>
                            <th>state</th>
                            <th>country</th>
                            <th>Select</th>

                        </tr>

                        <?php

                        $userId = $_SESSION['email'];
                        $selectUserAddress = "SELECT  `id`, `firstName`, `middleName`, `lastName`, `email`, `phone`, `gender`, `addressOne`, `addressTwo`, `dateOfBirth`, `pincode`, `city`, `state`, `country`, `addressType` FROM `useraddress` WHERE userId = '$userId' AND addressType='billing'";

                        $queryUserAddress = mysqli_query($con, $selectUserAddress);

                        if ($queryUserAddress->num_rows > 0) {
                            while ($row = mysqli_fetch_array($queryUserAddress)) {
                                echo "<tr class='tableData'>";
                                echo "<td>" . $row['firstName'] . " " . $row['middleName'] . " " . $row['lastName'] . "</td>";
                                echo "<td>" . $row['email'] . "</td>";
                                echo "<td>" . $row['phone'] . "</td>";
                                echo "<td>" . $row['gender'] . "</td>";
                                echo "<td>" . $row['addressOne'] . "</td>";
                                echo "<td>" . $row['addressTwo'] . "</td>";
                                echo "<td>" . $row['addressType'] . "</td>";
                                echo "<td>" . $row['dateOfBirth'] . "</td>";
                                echo "<td>" . $row['pincode'] . "</td>";
                                echo "<td>" . $row['city'] . "</td>";
                                echo "<td>" . $row['state'] . "</td>";
                                echo "<td>" . $row['country'] . "</td>";
                                echo "<td><input type='radio' value=" . $row['id'] . " name='selectBillingAddress'></td>";

                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='12'>No records found</td></tr>";
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>

        <div class="shippingAddress">
            <h2>Select Shipping Address</h2>

            <div class="tableDataContainer">
                <div class='usersTable'>
                    <table id='table'>
                        <tr class="tableHeading">

                            <th>Your Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>gender</th>
                            <th>Address 1</th>
                            <th>Address 2</th>
                            <th>Address Type</th>
                            <th>Date of Birth</th>
                            <th>pincode</th>
                            <th>city</th>
                            <th>state</th>
                            <th>country</th>
                            <th>Select</th>
                        </tr>

                        <?php

                        $userId = $_SESSION['email'];
                        $selectUserAddress = "SELECT  `id`, `firstName`, `middleName`, `lastName`, `email`, `phone`, `gender`, `addressOne`, `addressTwo`, `dateOfBirth`, `pincode`, `city`, `state`, `country`, `addressType` FROM `useraddress` WHERE userId = '$userId' AND addressType='shipping'";

                        $queryUserAddress = mysqli_query($con, $selectUserAddress);

                        if ($queryUserAddress->num_rows > 0) {
                            while ($row = mysqli_fetch_array($queryUserAddress)) {
                                echo "<tr class='tableData'>";
                                echo "<td>" . $row['firstName'] . " " . $row['middleName'] . " " . $row['lastName'] . "</td>";
                                echo "<td>" . $row['email'] . "</td>";
                                echo "<td>" . $row['phone'] . "</td>";
                                echo "<td>" . $row['gender'] . "</td>";
                                echo "<td>" . $row['addressOne'] . "</td>";
                                echo "<td>" . $row['addressTwo'] . "</td>";
                                echo "<td>" . $row['addressType'] . "</td>";
                                echo "<td>" . $row['dateOfBirth'] . "</td>";
                                echo "<td>" . $row['pincode'] . "</td>";
                                echo "<td>" . $row['city'] . "</td>";
                                echo "<td>" . $row['state'] . "</td>";
                                echo "<td>" . $row['country'] . "</td>";
                                echo "<td><input type='radio' value=".$row['id'] ." name='selectShippingAddress'></td>";

                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='12'>No records found</td></tr>";
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>


        <div class="payment">

            <h2>Payment Type</h2>

            <div class="typeOfPayment">

                <div class="tital">
                    <h5>Payment</h5>
                </div>

                <div class="detailPayment">
                    <div class="upi">
                        <br><input type="radio" value="UPI" name="payment"> UPI
                    </div><br>
                    <div class="cash">
                        <input type="radio" value="COD" name="payment"> Cash on Delivery
                    </div>
                </div>

            </div>

        </div>


        <button type="submit" class="buttons" name="order">Place Order</button>


    </div>
    </form>

</body>

</html>