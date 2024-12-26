<?php
require "./adminAuthentication.php";
?>

<?php
require "../../../backend/connection.php";

$sql = "SELECT * FROM `product`";
$count = mysqli_query($con, $sql);

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
    -------------->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">

    <!-------------
        Custom CSS 
    --------------->
    <link rel="stylesheet" href="./Assets/css/products.css">
</head>

<body>

    <!--------------------
        Edit form - start 
    ----------------------->


    <?php
    
    if (isset($_GET['id'])) {
      
    $id = $_GET['id'];

$sql = "SELECT * FROM `product` where id='$id'";
$query = mysqli_query($con, $sql);

    while($row = mysqli_fetch_array($query)){

    ?>

    <div id="editFormContainer">
        <div class="formContainer">
            <form action="../../../backend/dashboard/adminDashboard/editProduct.php" method="post" enctype="multipart/form-data">
                <input type="number" name="productId" id="productId">
                <div class="productName">
                    <p>Product Name</p>
                    <input style="display: none;" type="text" name="productId" value="<?php echo $row['id'] ?>" >
                    <input type="text" name="productName" value="<?php echo $row['productName'] ?>" >
                </div>
                <div class="productDetail">
                    <p>Product Description</p>
                    <textarea name="productDescription" rows="5"><?php echo $row['productDescription'] ?></textarea>
                </div>
                <div class="productPrice">
                    <p>Price</p>
                    <input type="text" name="productPrice" value="<?php echo $row['productPrice'] ?>">
                </div>

                <div class="uploadFile">
                    <p>Image</p>
                    <input type="file" name="productImage" value="<?php echo $row['productImage'] ?>">
                </div>

                
                <div class="selectCatagory">
                    <p>Catagory</p>
                    <select name="categoryId">
                        <option value="insences1">-- Select Category --</option>
                        <?php while($row = mysqli_fetch_array($categoryQuery)){ ?>
                        <option value="<?php echo $row['categoryId'] ?>"><?php echo $row['categoryName'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="btns">
                    <button type="submit" class="submit" name="submit">Submit</button>
                    <button type="button" class="close" name="close">Close</button>
                </div>

            </form>
        </div>
    </div>

    
    <?php }} ?>

    <!--------------------
        Edit form - end 
    ---------------------->

    <!---------------------------
        Dashboard Header - start 
    ----------------------------->
    <?php require "../../dashboardHeader.php"; ?>
    <!----------------------------
        Dashboard Header - End 
    ----------------------------->

    <!--------------------
        Dashboard - start
    ---------------------->
    <div class="dashboardContainer" id="dashboardContainer">

<!-------------------------- 
        dashboard left side - start
        --------------------------->
        <?php require "./leftSideLinks.php"; ?>
        <!-------------------------- 
        dashboard left side - End
        --------------------------->

        <!------------------------------
            Dashboard Right side - start 
        -------------------------------->
        <div class="rightSide">
            <div class="productsContainer">
                <?php
                if ($count->num_rows > 0) {

                    while ($row = mysqli_fetch_array($count)) {
                        $catId = $row['CatagoryId'];
                    $selectCategory = "SELECT `categoryName`
                    FROM `prodductcategory` where categoryId = '$catId'";
                    $categoryQuery = mysqli_query($con, $selectCategory);
                             ?>

                     <div class="productsBox">
                    <div class="imageBox">
                        <img src="../../../backend/productImageUpload/<?php echo $row['productImage']?>">
                    </div>
                    <div class="productDetailBox">
                        <div class="productNameCatagory">
                            <div class="productName">Product Name: <span> <?php echo $row['productName'] ?> </span></div>
                            <?php while($catRow = mysqli_fetch_array($categoryQuery)){ ?>
                            <div class="CatagoryId">Product Category: <span> <?php echo $catRow['categoryName'] ?> </span></div>
                    <?php } ?>
                        </div>
                        <div class="description">Product Description:</div>
                        <div class="productDescription"> <?php echo $row['productDescription'] ?> </div>
                        <div class="productPriceDiscount">
                            <div class="productPrice">Product Price: <span> <?php echo $row['productPrice'] ?> &#8377</span></div>
                        </div>
                        <div class="productEditDelete">
                            <a class="productEdit" href="products.php?id=<?php echo $row['id'] ?>"><img src="./Assets/images/edit.png">Edit</a>
                            <a class="productDelete" href="../../../backend/dashboard/adminDashboard/adminProductDelete.php?id=<?php echo $row['id'] ?>"><img src="./Assets/images/delete.png" alt="Edit">delete</a>
                        </div>
                    </div>
                </div>
                <?php
                      }
                } else {
                    echo "<p>No products available.</p>";
                }
                ?>
            </div>


        </div>
        <!-----------------------------
            Dashboard Right side - End 
        ------------------------------->

    </div>
    <!------------------
        Dashboard - End 
    -------------------->

    <!----------------
        Custom JS 
    ------------------>
    <script src="./Assets/js/products.js"></script>
    <script src="../../Assets/js/common.js"></script>
    <script src="./Assets/js/commonAdminDashboard.js"></script>

    <!--------------
     Fontawesome Kit 
    ---------------->
    <script src="https://kit.fontawesome.com/a669b51611.js" crossorigin="anonymous"></script>

</body>

</html>

<?php
$con->close();
?>