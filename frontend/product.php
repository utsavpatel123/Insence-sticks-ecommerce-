<?php

require "../backend/connection.php";
require "../backend/login.php";

$selectCategory = "SELECT * FROM `prodductcategory`";
$category = mysqli_query($con, $selectCategory);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>

    <!------------
     Google Fonts
     ------------->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">

    <!-----------
    Custom CSS 
    ----------->
    <link rel="stylesheet" href="./Assets/css/product.css">

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
    <!------------------
     Product - start 
    ------------------->
    <div id="product" class="product">
    <br><br><div class="productTitle">
            <p>Product <span>Title</span></p>
        </div>
        <br><br><br><br>
        <div class="productMenu">
            <div class="menu">
                <p>Categories: </p>
                <select id="categorySelect">
                    <option value="">default Categories</option>
                    <?php
                    while($row = mysqli_fetch_array($category)){
                    ?>
                    <option value="<?php echo $row['categoryId'] ?>"><?php echo $row['categoryName'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div><br><br>

        <div class="productContainer" id="productContainer">

        </div>

        <div class="productContainer" id="defaultProduct">

        <?php 

        $selectProduct = "SELECT `id`, `productName`, `productImage`, `productDescription`, `productPrice`,
         `CatagoryId` FROM `product`";
        $product = mysqli_query($con, $selectProduct);
         
      while($row = mysqli_fetch_array($product)){
           ?>

      <div class='individualProductBox productSwiperSlide'>
      <a href="productDetail.php?id=<?php echo $row['id']; ?>" style="color:#000;">
        <div class='individualProductImageContainer'>
            <img src='../backend/productImageUpload/<?php echo $row['productImage']; ?>'>
        </div>
        </a> 
        <p class ='productName'><?php echo $row['productName']; ?></p>
        <div class='productRating'>
            <span class='rate'>&#9733;</span>
            <span class='rate'>&#9733;</span>
            <span class='rate'>&#9733;</span>
            <span class='rate'>&#9733;</span>
            <span class='rate'>&#9733;</span>
        </div>
        <p class='productPrice'>&#8377; <?php echo $row['productPrice'] ?></p>
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



    <!------------------
     Product - End 
    ------------------->



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
    <script src="./Assets/js/product.js"></script>


    <!---------------
     Fontawesome Kit 
    ---------------->
    <script src="https://kit.fontawesome.com/a669b51611.js" crossorigin="anonymous"></script>
</body>

</html>