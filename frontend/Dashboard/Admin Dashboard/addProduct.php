<?php   

require "../../../backend/connection.php";
require "./adminAuthentication.php";

$selectCategory = "SELECT `categoryId`, `categoryName` FROM `prodductcategory`";
$categoryQuery = mysqli_query($con, $selectCategory); 

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
    <link rel="stylesheet" href="./Assets/css/addProduct.css">

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
        <div class="addProductForm">
            <?php if (isset($_REQUEST['errors'])) { ?>
                <div class="errorMessage">
                    <?php echo $_REQUEST['errors']; ?>
                </div>
                <?php } ?>
            <div class="container">
                    <h3>Add Product</h3>
                    <form action="../../../backend/dashboard/adminDashboard/addProduct.php" method="post" enctype="multipart/form-data">
                        <input type="text" name="productName" placeholder="Product Name"><br>
                        <textarea rows="6" cols="47" name="productDescription" placeholder="Product detail"></textarea><br>
                       
                        <select name="productCatagory">
                            <option>--Select Categories--</option>
                        <?php while($row = mysqli_fetch_array($categoryQuery)){ ?>
                        <option value="<?php echo $row['categoryId'] ?>"><?php echo $row['categoryName'] ?></option>
                        <?php } ?>
                    </select><br>
                        
                        <input type="text" name="productPrice" placeholder="Product Price"><br>
                        <!-- <label for="productImage">Product Image</label> -->
                        <input type="file" name="productImage" id="productImage" ><br>
                        
                        <button type="submit" class="buttons" name="submit">submit</button>
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
    <script src="../../Assets/js/common.js"></script>   
    <script src="./Assets/js/commonAdminDashboard.js"></script> 


    <!---------------
     Fontawesome Kit 
    ---------------->
    <script src="https://kit.fontawesome.com/a669b51611.js" crossorigin="anonymous"></script>
</body>

</html>