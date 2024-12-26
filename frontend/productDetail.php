<?php
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    require "../backend/connection.php";
    require "../backend/login.php";
} else {
    echo "Product ID not provided.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>detailProduct</title>

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
    <link rel="stylesheet" href="./Assets/css/productDetail.css">

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
    <!----------------
     Product - start 
    ----------------->
    <?php
    $selectProduct = "SELECT * FROM `product` WHERE $product_id=`id`";
    $product = mysqli_query($con, $selectProduct);

    while ($row = mysqli_fetch_array($product)) {

        $catagoryId = $row['CatagoryId'];
        // echo $catagoryId;
        $selectCategoryProduct = "SELECT * FROM `product` WHERE $catagoryId=`CatagoryId`";
        $products = mysqli_query($con, $selectCategoryProduct);
    ?>
        <div class="product" id="product">
            <div class="productContainer">
                <div class="left">
                    <div class="productImage">
                        <img src="../backend/productImageUpload/<?php echo $row['productImage'] ?>" alt="">
                    </div><br>
                    <div class="smallProductImage">
                        <?php
                        while ($rowProducts = mysqli_fetch_array($products)) {
                            // echo $rowProducts['id'];
                        ?>
                            <div class="smallImagecontainer">
                                <img src="../backend/productImageUpload/<?php echo $rowProducts['productImage'] ?>"
                                    alt="categories1">
                            </div>

                        <?php } ?>

                    </div>
                </div>
                <div class="right productDetail">
                    <div class="productName">
                        <h4>
                            <?php echo $row['productName'] ?>
                        </h4>
                    </div><br>
                    <div class="rating">
                        <span class="rate">&#9733;</span>
                        <span class="rate">&#9733;</span>
                        <span class="rate">&#9733;</span>
                        <span class="rate">&#9733;</span>
                        <span class="rate">&#9733;</span>
                    </div><br>
                    <div class="price">
                        <h4>
                            $<?php echo $row['productPrice'] ?>
                        </h4>

                    </div><br><br>
                    <div class="productDescription">
                        <p>
                            <?php echo $row['productDescription'] ?>
                        </p>
                    </div><br><br>
                    <div class="quantity">
                        <h4>Quantity:</h4>
                        <input type="number" id="quantity" value="1">
                    </div><br><br>
                    <div class="addToCart">
                        <button type="button" id="cartButton" value="<?php echo $row['id']; ?>" data-userId="<?php if (isset($_SESSION['email'])) {
                                                                                                                    echo $_SESSION['email'];
                                                                                                                } else {
                                                                                                                    echo "";
                                                                                                                } ?>" class="buttons">Add To Cart</button>
                    </div>
                </div>
            </div>
            </div>
    <?php
    }
    ?>
    <!----------------
     Product - End 
    ----------------->


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
    <script src="./Assets/js/productDetail.js"></script>


    <!---------------
     Fontawesome Kit 
    ---------------->
    <script src="https://kit.fontawesome.com/a669b51611.js" crossorigin="anonymous"></script>

</body>

</html>