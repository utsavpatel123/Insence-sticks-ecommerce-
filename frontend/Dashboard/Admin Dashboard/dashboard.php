<?php
require "./adminAuthentication.php";
require "../../../backend/connection.php";

$selectCategory = "SELECT `categoryId`, `categoryName`, `categoryImage`, `categoryDescription` FROM `prodductcategory`";
$category = mysqli_query($con, $selectCategory);
 $categoryNumber = mysqli_num_rows($category);

 $selectUser = "SELECT * FROM `usersdata`";
 $user = mysqli_query($con, $selectUser);
 $userNumber = mysqli_num_rows($user);
 
 $selectProduct = "SELECT * FROM `product`";
 $product = mysqli_query($con, $selectProduct);
 $productNumber = mysqli_num_rows($product);
 
 $selectCheckout = "SELECT * FROM `checkout`";
 $checkout = mysqli_query($con, $selectCheckout);
 $checkoutNumber = mysqli_num_rows($checkout);


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
    <link rel="stylesheet" href="./Assets/css/dashboard.css">

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
            <div class="detailSection">
                <div class="detailSectionContainer">
                <div class="detailContainer">
                        <div class="imageContainer">
                            <div class="image">
                                <i class="fa-solid fa-recycle"></i>
                            </div>
                        </div>
         
                        <div class="detail">
                            <h6>Category</h6>
                            <p><?php echo $categoryNumber ?></p>
                        </div>
                        <div class="moreInfo">
                            <p>More Info</p>
                        </div>
                    </div>

                    <div class="detailContainer">
                        <div class="imageContainer">
                            <div class="image">
                                <i class="fa-solid fa-recycle"></i>
                            </div>
                        </div>
                        <div class="detail">
                            <h6>Product</h6>
                            <p><?php echo $productNumber ?></p>
                        </div>
                        <div class="moreInfo">
                            <p>More Info</p>
                        </div>
                    </div>

              

                    <div class="detailContainer">
                        <div class="imageContainer">
                            <div class="image">
                                <i class="fa-solid fa-recycle"></i>
                            </div>
                        </div>
                        <div class="detail">
                            <h6>Users</h6>
                            <p><?php echo $userNumber ?></p>
                        </div>
                        <div class="moreInfo">
                            <p>More Info</p>
                        </div>
                    </div>

                    <div class="detailContainer">
                        <div class="imageContainer">
                            <div class="image">
                                <i class="fa-solid fa-recycle"></i>
                            </div>
                        </div>
                        <div class="detail">
                            <h6>Orders</h6>
                            <p><?php echo $checkoutNumber ?></p>
                        </div>
                        <div class="moreInfo">
                            <p>More Info</p>
                        </div>
                    </div>
                    
                </div>

            </div>



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
    <script src="./Assets/js/commonAdminDashboard.js"></script>
    <script src="../../Assets/js/common.js"></script>


    <!---------------
     Fontawesome Kit 
    ---------------->
    <script src="https://kit.fontawesome.com/a669b51611.js" crossorigin="anonymous"></script>
</body>

</html>