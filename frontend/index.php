<?php

require "../backend/connection.php";
require "../backend/login.php";

$rawData = file_get_contents("php://input");
$data = json_decode($rawData, true);

if (isset($_SESSION['email'])) {

    $userId = $_SESSION['email'];
    if (isset($_COOKIE['productId'])) {
        $cartData = json_decode($_COOKIE['productId'], true);

        if (is_array($cartData) && count($cartData) > 0) {
            foreach ($cartData as $product) {

                $selectCart = "SELECT `productId` FROM `cart` WHERE `productId` = '$product' AND `userId`= '$userId'";
                $cartCheck = mysqli_query($con, $selectCart);

                if (mysqli_num_rows($cartCheck) > 0) {

                    continue;
                }

                $selectProduct = "SELECT `id`,`productName`, `productImage`, `productPrice` FROM `product` WHERE id='$product'";
                $result = mysqli_query($con, $selectProduct);

                while ($row = mysqli_fetch_assoc($result)) {
                    $productId = $row['id'];
                    $productName = $row['productName'];
                    $productPrice = $row['productPrice'];
                    $productImage = $row['productImage'];
                    $quantity = 1;

                    $insertQuery = "INSERT INTO `cart`(`userId`, `productId`, `productName`, `productPrice`, `productImage`, `quantity`) 
                                    VALUES ('$userId','$productId','$productName', '$productPrice', '$productImage','$quantity')";
                    $insertProduct = mysqli_query($con, $insertQuery);

                    if ($insertProduct) {
                        echo json_encode('Cart data inserted successfully');
                    } else {
                        echo json_encode('Error inserting cart data');
                    }
                }
            }
            setcookie("productData", "", time() - 3600, "/");
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <!-----------
     Custom CSS 
     ----------->
    <link rel="stylesheet" href="./Assets/css/index.css">

</head>

<!-- --------------------
    Header - start  
    --------------------- -->
<?php
require "header.php";
?>
<!-- --------------------
    Header - End  
    --------------------- -->

<!-- --------------------
    Product Details - start  
    --------------------- -->
<div class="productDetails" id="productDetails">
    <button class="productSwitchBtn leftBtn prev">&#10094; </button>
    <button class="productSwitchBtn rightBtn next"> &#10095;</button>
    <div class="productDetailsSetBox active">
        <div class="slider">
            <div class="slides">

                <?php

                $selectCategory = "SELECT `categoryName`, `categoryImage`, `categoryDescription` FROM `prodductcategory`";
                $category = mysqli_query($con, $selectCategory);

                while ($row = mysqli_fetch_array($category)) {

                ?>
                    <div class="slide b1">
                        <div class="productInfoBox">
                            <h5><?php echo $row['categoryName'] ?></h5>
                            <p><?php echo $row['categoryDescription'] ?></p>
                            <a class="buttons" href="#">see Product</a>
                        </div>
                        <div class="productImgBox">
                            <img src="../backend/productCategoryImageUpload/<?php echo $row['categoryImage'] ?>" alt="">
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="dotsContainer"></div>
</div>

<!-- --------------------
    Product Details - End  
    --------------------- -->


<!------------------
     Features - start 
    ------------------->
<div class="features" id="features">

    <div class="featuresContainer">
        <div class="featuresIcon">
            <i class="fa-solid fa-truck-fast"></i>
        </div>
        <div class="featuresInfo">
            <h4>Free Shipping</h4>
            <p>Free shipping over $100</p>
        </div>
    </div>
    <div class="featuresContainer">
        <div class="featuresIcon">
            <i class="fa-solid fa-lock"></i>
        </div>
        <div class="featuresInfo">
            <h4>Payment Secure</h4>
            <p>Got 100% Payment Safe</p>
        </div>
    </div>
    <div class="featuresContainer">
        <div class="featuresIcon">
            <i class="fa-solid fa-headphones"></i>
        </div>
        <div class="featuresInfo">
            <h4>Support 24/7</h4>
            <p>Top quialty 24/7 Support</p>
        </div>
    </div>
    <div class="featuresContainer">
        <div class="featuresIcon">
            <i class="fa-solid fa-hand-holding-dollar"></i>
        </div>
        <div class="featuresInfo">
            <h4>100% Money Back</h4>
            <p>Cutomers Money Backs</p>
        </div>
    </div>
    <div class="featuresContainer">
        <div class="featuresIcon">
            <i class="fa-solid fa-thumbs-up"></i>
        </div>
        <div class="featuresInfo">
            <h4>Quality Products</h4>
            <p>We Insure Product Quailty</p>
        </div>
    </div>


</div>
<!------------------
     Features - End 
    ------------------->





<!---------------------------
Product categories - start
---------------------------->
<div class="productCategories" id="productCategories">
    <div class="productCategoriesContainer">
        <h2>Product <span> Categories </span></h2>
        <?php

        $selectCategory = "SELECT `categoryName`, `categoryImage`, `categoryDescription` FROM `prodductcategory`";
        $category = mysqli_query($con, $selectCategory);

        while ($row = mysqli_fetch_array($category)) {

        ?>

            <div id="firstProductCategories" class="productCategoriesBox">
                <div class="productCategoriesImage">
                    <a href="product.php" class="goProductPage">See</a>
                    <img src="../backend/productCategoryImageUpload/<?php echo $row['categoryImage'] ?>" alt="">
                </div>
                <div class="productCategoriesInfo">
                    <h3><?php echo $row['categoryName'] ?></h3>
                    <p><?php echo $row['categoryDescription'] ?></p>
                    <a href="#" class="buttons">EXPLORE NOW</a>
                </div>

            </div>
        <?php } ?>
    </div>
</div>
<!---------------------------
Product categories - start
---------------------------->


<!--------------------
 ProductSlider - start 
--------------------->
<div class="productSlider" id="productSlider">
    <div class="headingAndButton">
        <div class="heading">
            <h5>Hot <span>New Arrival</span> You May Like</h5>
        </div>
        <div class="buttons">
            <div class="productSwiperButtonPrev" onclick="previousButton('manual')">&#10094;</div>
            <div class="productSwiperButtonNext" id="nextSliderButton" onclick="nextButtonClick('manual')">&#10095;
            </div>
        </div>
    </div>

    <div class="productsContainer">
        <div class="swiperContainer">
            <div class="swiperWrapper">

                <?php

                $selectProduct = "SELECT `id`,`productName`, `productImage`, `productPrice` FROM `product`";
                $product = mysqli_query($con, $selectProduct);

                while ($row = mysqli_fetch_array($product)) {

                ?>



                    <div class="individualProductBox productSwiperSlide">
                        <a href="productDetail.php?id=<?php echo $row['id']  ?>" style="color:#000;">
                            <div class="individualProductImageContainer">
                                <img src="../backend/productImageUpload/<?php echo $row['productImage'] ?>" alt="">
                            </div>
                        </a>
                        <p class="productName"><?php echo $row['productName'] ?></p>
                        <div class="productRating">
                            <span class="rate">&#9733;</span>
                            <span class="rate">&#9733;</span>
                            <span class="rate">&#9733;</span>
                            <span class="rate">&#9733;</span>
                            <span class="">&#9733;</span>
                        </div>
                        <p class="productPrice">&#8377;<?php echo $row['productPrice'] ?></p>
                        <br>

                        <button type="button" id="cartButton" value="<?php echo $row['id']; ?>" data-userId="<?php if (isset($_SESSION['email'])) {
                                                                                                                    echo $_SESSION['email'];
                                                                                                                } else {
                                                                                                                    echo "";
                                                                                                                } ?>" class="buttons">Add To Cart</button>
                    </div>

                <?php } ?>

            </div>
        </div>
    </div>
</div>
<!-------------------
ProductSlider - End
-------------------->



<!-------------------
Product -  start
-------------------->

<div class="product" id="product">

    <div class="productTital">
        <p><span>LATEST</span> PRODUCTS</p>
    </div>

    <div class="productContainer">
        <?php

        $selectProduct = "SELECT `id`,`productName`, `productImage`, `productPrice` FROM `product`";
        $product = mysqli_query($con, $selectProduct);

        while ($row = mysqli_fetch_array($product)) {

        ?>


            <div class="individualProductBox productSwiperSlide">
                <a href="productDetail.php?id=<?php echo $row['id']  ?>" style="color:#000;">
                    <div class="individualProductImageContainer">
                        <img src="../backend/productImageUpload/<?php echo $row['productImage'] ?>" alt="">
                    </div>
                </a>
                <p class="productName"><?php echo $row['productName'] ?></p>
                <div class="productRating">
                    <span class="rate">&#9733;</span>
                    <span class="rate">&#9733;</span>
                    <span class="rate">&#9733;</span>
                    <span class="rate">&#9733;</span>
                    <span class="">&#9733;</span>
                </div>
                <p class="productPrice">&#8377;<?php echo $row['productPrice'] ?></p>
                <br>

                <button type="button" id="cartButton" value="<?php echo $row['id']; ?>" data-userId="<?php if (isset($_SESSION['email'])) {
                                                                                                            echo $_SESSION['email'];
                                                                                                        } else {
                                                                                                            echo "";
                                                                                                        } ?>" class="buttons">Add To Cart</button>
            </div>

        <?php } ?>

    </div>
</div>
<!-------------------
Product -  End
-------------------->



<!----------------
Review - start 
----------------->

<?php

$selectReview = "
SELECT feedback.userId, feedback.productName, feedback.reviewMessage, feedback.starNumber, 
       usersdata.firstName, usersdata.middleName, usersdata.lastName 
FROM feedback 
JOIN usersdata ON feedback.userId = usersdata.email";
$review = mysqli_query($con, $selectReview);
if (!$review) {
    die("Error in SQL query: " . mysqli_error($con));
}
?>

<div class="customerReviewSlider" id="customerReviewSlider">
    <h4>Customer <span>Review</span></h4>
    <div class="customerReviewContainer">
        <div class="swiperContainer">

            <div class="swiperWrapper">

                <?php
                if (mysqli_num_rows($review) > 0) {

                    while ($row = mysqli_fetch_array($review)) {
                        $firstName = $row['firstName'];
                        $middleName = $row['middleName'];
                        $lastName = $row['lastName'];
                        $userName = $row['middleName'] . " " . $row['firstName'] . " " . $row['lastName'];

                ?>

                        <div class="individualProductBox reviewSwiperSlide">
                            <div class="userName">
                                <p>&#8220; <?php echo $userName; ?> &#8221;</p>
                            </div>
                            <br>
                            <p class="para"><?php echo $row['reviewMessage'] ?></p>
                            <h6>&#8220; <?php echo $row['productName'] ?> &#8221;</h6>
                            <br>
                            <div class="stars">
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                            <input type="text" id="starNumber" value="<?php echo $row['starNumber'] ?>" style="display: none">

                        </div>

                <?php } 
                }
                else{
                    echo "no review available";
                }
                ?>

            </div>
            <div class="swipperButton">
                <div class="productSwiperButtonPrev">&#10094;</div>
                <div class="productSwiperButtonNext">&#10095;</div>
            </div>
        </div>
    </div>
</div>
<!----------------
      Review - End 
    ----------------->


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
<script src="./Assets/js/index.js"></script>


<!---------------
     Fontawesome Kit 
    ---------------->
<script src="https://kit.fontawesome.com/a669b51611.js" crossorigin="anonymous"></script>

</body>

</html>