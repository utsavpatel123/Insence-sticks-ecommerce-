<?php

require "../../../backend/login.php";
require "./userAuthentication.php";
require "../../../backend/connection.php";

$selectProduct = "SELECT * FROM `product`";
$product = mysqli_query($con, $selectProduct);

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
    <link rel="stylesheet" href="./Assets/css/review.css">

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

            <div class="reviewForm">
                <div class="container">
                    <h3>Feedback Form</h3><br><br>
                    <form action="">
                        <select id="productName">
                         <option value="">--Select Product--</option> 
                         <?php while($row = mysqli_fetch_array($product)){ ?>
                         <option value="<?php echo $row['productName'] ?>"><?php echo $row['productName'] ?></option> 
                         <?php } ?>
                        </select>
                      
                        <p>Feedback</p>
                        <textarea rows="6" cols="20" id="reviewMessage" placeholder="Message"></textarea>
                        <div class="ratingStar">
                            <p>What's Your Experience ? </p>
                            <div class="stars">  
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            </div>
                        </div><br>
                        <button type="button" id="reviewButton" class="buttons">submit</button>
                    </form>
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
    <script src="./Assets/js/userReview.js"></script>
    <script src="../../Assets/js/common.js"></script>


    <!---------------
     Fontawesome Kit 
    ---------------->
    <script src="https://kit.fontawesome.com/a669b51611.js" crossorigin="anonymous"></script>
</body>

</html>