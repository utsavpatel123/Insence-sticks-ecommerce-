<?php

require "../backend/connection.php";
require "../backend/login.php";


if (isset($_COOKIE['productData'])) {
    $value = json_decode($_COOKIE['productData'], true);

    if (is_array($value)) {
        $data = []; // Initialize an array to store final data

        foreach ($value as $result) {
            $id = $result['productId'];
             $quantity = (int) $result['quantity']; // Cast quantity to integer

            // Query to get product details
            $selectProduct = "SELECT `id`, `productName`, `productImage`, `productPrice` 
                              FROM `product` WHERE id='$id'";
            $productResult = mysqli_query($con, $selectProduct); 

            // Fetch product details and append quantity
            while ($product = mysqli_fetch_assoc($productResult)) {
                 $price =  $product['productPrice']; // Cast product price to float
                 $total = $quantity * $price;  // Now multiplication works properly
                $product['total'] = $total; 
                $product['quantity'] = $quantity; 
                $data[] = $product;          
            }  
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>


    <!------------
     Google Fonts
     ------------->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">


    <!-----------
     Custom CSS 
     ----------->
    <link rel="stylesheet" href="./Assets/css/addToCart.css">

</head>

<body>
    
   <!-- --------------------
    Header - start  
    --------------------- -->
<?php
require "header.php"
?>
<!-- --------------------
    Header - End  
    --------------------- -->

    <!-- ---------------------
        Cart Section - Start 
    ------------------------->
    <div id="cart" class="cart">
        <br><br><br>
        <div class="cartTitle">
            <p>cart</p>
        </div><br><br><br>

        <div class="cartContainer">
            <div class="cartDetail">

                <div class="cartDetailHeading">
                    <p>image</p>
                    <p>product</p>
                    <p>price</p>
                    <p>quantity</p>
                    <p>total</p>
                    <p>Delete</p>
                </div><br><br>


                <?php

                if (isset($_SESSION['email'])) {

                    $userId =  $_SESSION['email'];
                    $selectCart = "SELECT * FROM `cart` WHERE userId='$userId'";

                    $cart = mysqli_query($con, $selectCart);

                    if (mysqli_num_rows($cart) > 0) {

                        while ($row = mysqli_fetch_array($cart)) {


                ?>

                            <div class="cartDetailRow">
                                <div class="imageContainer">
                                    <img src="../backend/productImageUpload/<?php echo $row['productImage'] ?>" alt="">
                                </div>
                                <div class="productName"><?php echo $row['productName'] ?></div>
                                <div class="productPrice" id="productPrice"><?php echo $row['productPrice'] ?></div>
                                <div class="productQuantity">
                                    <p>quantity:</p>
                                    <input type="text" id="loginUserQuantity" value="<?php echo $row['quantity'] ?>">
                                    <input type="text" style="display: none;" id="userId" value="<?php echo $userId ?>">
                                    <input type="text" style="display: none;" id="productId" value="<?php echo $row['productId'] ?>">
                                </div>
                                <div class="productTotal"><?php echo $row['totalPrice'] ?></div>
                                <a href="../backend/deleteCartItem.php?userId=<?php echo $userId; ?>&productId=<?php echo $row['productId']; ?>" style="color:black">

                                <div class="deleteButton"><i class="fa-solid fa-xmark"></i></div>
                                </a>
                            </div>

                        <?php }
                    } else {
                        echo "product is not Available";
                    }
                } else {
                    if (isset($_COOKIE['productData'])) {

                        foreach ($data as $product) {
                        ?>

                            <div class="cartDetailRow">
                                <div class="imageContainer">
                                    <img src="../backend/productImageUpload/<?php echo $product['productImage']; ?>" alt="">
                                </div>
                                <div class="productId" style="display: none;"><?php echo $product['id']; ?></div>
                                <div class="productName"><?php echo $product['productName']; ?></div>
                                <div class="productPrice"><?php echo $product['productPrice']; ?></div>
                                <div class="productQuantity">
                                    <p>quantity:</p>
                                    <input type="text" value="<?php echo $product['quantity']; ?>">
                                </div>
                                <div class="productTotal"><?php echo $product['total']; ?></div>
                                <div class="deleteButton"><i class="fa-solid fa-xmark"></i></div>
                            </div>
                <?php
                        }
                    } else {
                        echo "product is not Available";
                    }  
                } 
                 ?>
              <br><br>

                <div class="discountCoupon">

                    <input type="text" placeholder="Coupon Code">
                    <div class="couponButton">
                        <button type="button">APPLY COUPON</button>
                        <button type="submit" id="updateCart">UPDATE CART</button>
                    </div>
                </div><br><br>

                <div class="cartTotal">
                    <div class="total">CART TOTAL</div>
                </div><br><br>

                <div class="totalPrice">
<?php
if (isset($_SESSION['email'])) {
    $userId =  $_SESSION['email'];
$grandTotal = 0;
$selectCartQuery = "SELECT `totalPrice` FROM `cart` WHERE userId='$userId'";
$cartQuery = mysqli_query($con, $selectCartQuery);
  while($row = mysqli_fetch_array($cartQuery)){ 
    $grandTotal = $grandTotal + $row['totalPrice'];
  }
}
else{

    $grandTotal = 0;
}
 ?>
                    <p id="total"><?php echo $grandTotal; ?></p>
                </div><br><br>

                <div class="checkoutButton">
                    <a href="checkout.php">process to checkout</a>
                </div><br><br>

            </div>
        </div>

    </div>
    <!-- ---------------------
        Cart Section - End
    ------------------------->

    <!----------------
     Footer - start 
     ----------------->
    <?php
    require "footer.php"
    ?>
    <!---------------
     Footer - End 
     ----------------->


    <!---------
     Custom Js  
    ----------->
    <script src="./Assets/js/common.js"></script>
    <script src="./Assets/js/cart.js"></script>


    <!---------------
     Fontawesome Kit 
    ---------------->
    <script src="https://kit.fontawesome.com/a669b51611.js" crossorigin="anonymous"></script>

</body>

</html>