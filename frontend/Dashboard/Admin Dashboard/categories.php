<?php
require "../../../backend/connection.php";
require "./adminAuthentication.php";

$query = "SELECT * FROM `prodductcategory`";
$productCategory = mysqli_query($con, $query);



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
    <link rel="stylesheet" href="./Assets/css/categories.css">
</head>

<body>

    <!--------------------
        Edit form - start 
    ----------------------->



    <?php

    if (isset($_GET['id'])) {

        $id = $_GET['id'];

        $sql = "SELECT * FROM `prodductcategory` where categoryId='$id'";

        $query = mysqli_query($con, $sql);

        while ($row = mysqli_fetch_array($query)) {

    ?>

            <div id="editFormContainer" <?php if (isset($_GET['id'])) {
                                            echo 'style="display:block"';
                                        } else {
                                            echo 'style="display:none"';
                                        } ?>>
                <div class="formContainer">
                    <form action="../../../backend/dashboard/adminDashboard/editCategoryAdminDashboard.php" method="post" enctype="multipart/form-data">
                        <input type="text" style="display: none;" value="<?php echo $row['categoryId'] ?>" name="categoryId">
                        <div class="categoryName">
                            <p>Category Name</p>
                            <input type="text" value="<?php echo $row['categoryName'] ?>" name="categoryName">
                        </div>
                        <div class="categoryDetail">
                            <p>Category Description</p>
                            <textarea name="categoryDescription" rows="10"><?php echo $row['categoryDescription'] ?></textarea>
                        </div>
                        <div class="uploadFile">
                            <p>Image</p>
                            <input type="file" name="categoryImage">
                        </div>

                        <div class="btns">
                            <button type="submit" class="submit" name="submit">Submit</button>
                            <button type="button" class="close" name="close">Close</button>
                        </div>

                    </form>
                </div>
            </div>

    <?php }
    } ?>

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

            <div class="categoryContainer">
                <?php

                while ($row = mysqli_fetch_array($productCategory)) {
                ?>
                    <div class="categoryBox">
                        <div class="imageBox">
                            <img src="../../../backend/productCategoryImageUpload/<?php echo $row['categoryImage'] ?>">
                        </div>
                        <div class="categoryDetailBox">
                            <div class="categoryName">
                                <div> Name: <span><?php echo $row['categoryName'] ?></span></div>
                            </div>
                            <div class="categoryDescriptionTital">Category Description</div>
                            <div class="categoryDescription"><?php echo $row['categoryDescription'] ?></div>
                            <div class="categoryEditDelete">
                                <a class="categoryEdit" href="categories.php?id=<?php echo $row['categoryId'] ?>"><img src="./Assets/images/edit.png">Edit</a>
                                <a class="categoryDelete" href="../../../backend/dashboard/adminDashboard/deleteCategoryAdminDashboard.php?id=<?php echo $row['categoryId'] ?>"><img src="./Assets/images/delete.png" alt="Edit">delete</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
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
    <script src="./Assets/js/categories.js"></script>
    <script src="../../Assets/js/common.js"></script>
    <script src="./Assets/js/commonAdminDashboard.js"></script>

    <!--------------
     Fontawesome Kit 
    ---------------->
    <script src="https://kit.fontawesome.com/a669b51611.js" crossorigin="anonymous"></script>

</body>

</html>